<?php
/**
 * Classe principal do Plugin Epico.
 *
 * @package   Uf_Epico
 * @author    Uberfácil <contato@uberfacil.com>
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com/temas/epico
 * @copyright 2014-2019 Uberfácil
 */

class Uf_Epico {

	/**
	 * @var      string
	 */
	const VERSION = '1.10.21';
	/**
	 * @var      object
	 */
	protected static $instance = NULL;
	/**
	 * @var      string
	 */
	protected $plugin_slug = 'uf-epico';
	/**
	 * @var      array
	 */
	protected $element_instances = array();
	/**
	 * @var      array
	 */
	protected $element_css_once = array();
	/**
	 * @var      array
	 */
	protected $elements = array();
	/**
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = NULL;

	/**
	 * Inicializa o plugin configurando filtros e funcões de administracao.
	 *
	 */
	private function __construct() {

		// Adiciona links adicionais na descricao do plugin
		add_filter( 'plugin_row_meta',  array( $this, 'epico_add_plugin_page_links' ), 10, 2 );

		// Ativa o plugin quando o novo blog e adicionado no WordPress MU.
		add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

		// Carrega a folha de estilo e os scripts do admin.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_stylescripts' ) );

		// Detecta o elemento antes de renderizar a pagina para que possamos embutir os scripts e estilos necessários.
		if ( ! is_admin() ) {
			add_action( 'wp', array( $this, 'detect_elements' ) );
		}

		// Ativa o post type
		add_action( 'init', array( $this, 'activate_post_types' ) );

		// Adiciona o botao modal de insercao de shortcodes
		if ( is_admin() ) {
			add_action( 'media_buttons', array( $this, 'shortcode_insert_button' ), 11 );
			add_action( 'admin_footer', array( $this, 'shortcode_modal_template' ) );
		}

		// Adiciona os shortcodes.
		add_shortcode( 'epico_capture_sc', array( $this, 'render_element' ) );
		$this->elements = array_merge( $this->elements, array(
			'shortcodes' => array(
				'epico_capture_sc' => '1',
			)
		) );
	}

	/**
	 * Retorna uma instância desta classe.
	 *
	 * @return    object    Uma unica instância desta classe.
	 */
	public static function get_instance() {

		// Se a unica instância nao tiver sido definida, configure-a agora.
		if ( NULL == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * WordPress MU: Dispara quando o plugin está sendo ativado.
	 *
	 * @param    boolean $network_wide Retorna TRUE se o superadmin do WordPress MU usa a acao "Network Activate", FALSE se o WordPress MU estiver desativado ou o plugin estiver ativado em um blog individual.
	 */
	public static function activate( $network_wide ) {
		if ( function_exists( 'is_multisite' ) && is_multisite() ) {
			if ( $network_wide ) {

				// Obtem todos os IDs de blogs
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {
					switch_to_blog( $blog_id );
					self::single_activate();
				}
				restore_current_blog();
			} else {
				self::single_activate();
			}
		} else {
			self::single_activate();
		}
	}

	/**
	 * Obtem todos os IDs de blogs de blogs na rede atual quando:
	 * - não são arquivados
	 * - não são spam
	 * - não foram excluidos
	 *
	 * @return    array|FALSE    Os ID dos blogs. Retorna FALSE se não corresponderem.
	 */
	private static function get_blog_ids() {
		global $wpdb;

		// Obtenha um array de IDs de blog
		$sql = "SELECT blog_id FROM $wpdb->blogs
			WHERE archived = '0' AND spam = '0'
			AND deleted = '0'";

		return $wpdb->get_col( $sql );
	}

	/**
	 *  WordPress MU: Dispara quando o plugin está sendo desativado em cada site da rede.
	 *
	 */
	private static function single_activate() {
		// TODO: Definir a funcionalidade de ativacao aqui se necessario.
	}

	/**
	 *  WordPress MU: Dispara quando o plugin está sendo desativado.
	 *
	 * @param  boolean $network_wide TRUE se o superadmin do WordPress MU utiliza a acao "Desativar rede", FALSE se o WordPress MU estiver desativada ou o plugin estiver desativado em um blog individual.
	 */
	public static function deactivate( $network_wide ) {
		if ( function_exists( 'is_multisite' ) && is_multisite() ) {
			if ( $network_wide ) {

				// Obter todos os IDs de blogs
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {
					switch_to_blog( $blog_id );
					self::single_deactivate();
				}
				restore_current_blog();
			} else {
				self::single_deactivate();
			}
		} else {
			self::single_deactivate();
		}
	}

	/**
	 * WordPress MU: Dispara quando o plugin está sendo desativado em cada site da rede.
	 *
	 */
	private static function single_deactivate() {
		// TODO: Definir a funcionalidade de desativacao aqui se necessario.
	}

	/**
	 * Usa a função wp_kses do WP para limpar algumas das tags html, mas permitindo alguns atributos específicos.
	 *
	 * @param  str $buffer Buffer de string
	 *
	 * @return str Texto limpo
	 */
	public static function strip_tags( $buffer ) {

		$allowed_tags = array(
			'input' => array(
				'name'  => array(),
				'value' => array(),
				'type'  => array(
					'hidden' => array(),
					'email'  => array(),
				),
			),
			'form'  => array(
				'action' => array(),
			),
		);

		$allowed_protocols = array( 'http', 'https' );

		$buffer = wp_kses( $buffer, $allowed_tags, $allowed_protocols );

		$buffer = trim( $buffer );

		return $buffer;
	}

	public static function filter_form_html( $string ) {
		$result = preg_replace( '/(<.*?\b[^>]*>).*?(<\/.*?>)/i', '$1$2', $string );

		return $result;
	}

	/**
	 * WordPress MU: Dispara quando um novo site é ativado.
	 *
	 * @param    int $blog_id - ID do novo blog.
	 */
	public function activate_new_site( $blog_id ) {
		if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
			return;
		}

		switch_to_blog( $blog_id );
		self::single_activate();
		restore_current_blog();
	}

	/**
	 * Registra os post types.
	 *
	 * @return    NULL
	 */
	public function activate_post_types() {

		$args = array(
			'labels'              => array(
				'name'               => __( 'Capture (shortcode)', 'uf-epico' ),
				'singular_name'      => __( 'Capture', 'uf-epico' ),
				'add_new'            => __( 'Add new', 'uf-epico' ),
				'add_new_item'       => __( 'Add new Capture', 'uf-epico' ),
				'edit_item'          => __( 'Edit Capture', 'uf-epico' ),
				'all_items'          => __( 'All Captures', 'uf-epico' ),
				'view_item'          => __( 'View Capture', 'uf-epico' ),
				'search_items'       => __( 'Search Captures', 'uf-epico' ),
				'not_found'          => __( 'No Capture defined', 'uf-epico' ),
				'not_found_in_trash' => __( 'No Capture found in trash', 'uf-epico' ),
				'parent_item_colon'  => '',
				'menu_name'          => __( 'Capture', 'uf-epico' )
			),
			'public'              => FALSE,
			'publicly_queryable'  => FALSE,
			'show_ui'             => TRUE,
			'show_in_menu'        => TRUE,
			'query_var'           => TRUE,
			'rewrite'             => FALSE,
			'exclude_from_search' => TRUE,
			'capability_type'     => 'post',
			'has_archive'         => TRUE,
			'hierarchical'        => FALSE,
			'menu_position'       => 100,
			'show_in_rest'        => FALSE,
			'menu_icon'           => "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj48c3ZnIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9IjAgMCAxNyAxNyIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiBzdHlsZT0iZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS1taXRlcmxpbWl0OjEuNDE0MjE7Ij48cGF0aCBkPSJNMi40NzksMi40NzljLTEuNTk2LDEuNjEzIC0yLjQ3OSwzLjczNiAtMi40NzksNi4wMTFjMCwyLjI3NiAwLjg4Myw0LjM5OCAyLjQ3OSw2LjAxMWMxLjU5NiwxLjYxNCAzLjczNiwyLjQ4IDYuMDExLDIuNDhjMi4yNzYsMCA0LjM5OCwtMC44ODMgNi4wMTEsLTIuNDhjMS42MTQsLTEuNTk2IDIuNDgsLTMuNzM1IDIuNDgsLTYuMDExYzAsLTEuOTM1IC0wLjYyOSwtMy43NTIgLTEuODM0LC01LjI2NGMtMC45NTEsLTEuMjA1IC0yLjIwOCwtMi4xMjIgLTMuNjUxLC0yLjY2NmwwLDEuOGMwLjkxNywwLjQ0MiAxLjczMiwxLjEwNCAyLjM2LDEuOTAyYzAuOTY4LDEuMjIzIDEuNDc3LDIuNjgzIDEuNDc3LDQuMjQ1YzAsMy43NyAtMy4wNzMsNi44NDMgLTYuODQzLDYuODQzYy0zLjc2OSwwIC02Ljg0MywtMy4wOSAtNi44NDMsLTYuODZjMCwtMy4zNzkgMi41MTMsLTYuMjgzIDUuODU4LC02Ljc1OGwwLjE1MywtMC4wMzRsMCw2Ljc5MmMwLDAuNDU5IDAuMzc0LDAuODMyIDAuODMyLDAuODMyYzAuNDU5LDAgMC44MzIsLTAuMzczIDAuODMyLC0wLjgzMmwwLC04LjQ5bC0wLjgzMiwwYy0yLjI3NSwwIC00LjM5OCwwLjg4MyAtNi4wMTEsMi40NzlsMCwwWk00LjY1Myw1Ljc1NmMtMC40NTksMCAtMC44MzIsMC4zNzQgLTAuODMyLDAuODMybDAsMS45MDJjMCwyLjU2NCAyLjA4OCw0LjY1MyA0LjY1Miw0LjY1M2MyLjU2NCwwIDQuNjcsLTIuMDg5IDQuNjcsLTQuNjUzbDAsLTEuOTE5YzAsLTAuNDU4IC0wLjM3NCwtMC44MzIgLTAuODMyLC0wLjgzMmMtMC40NTksMCAtMC44MTUsMC4zNzQgLTAuODE1LDAuODMybDAsMS45MTljMCwxLjY2NCAtMS4zNDIsMy4wMDYgLTMuMDA2LDMuMDA2Yy0xLjY2NCwwIC0zLjAwNSwtMS4zNDIgLTMuMDA1LC0zLjAwNmwwLC0xLjkxOWMwLC0wLjQ1OCAtMC4zNzQsLTAuODE1IC0wLjgzMiwtMC44MTVsMCwwWiIgc3R5bGU9ImZpbGw6IzllYTNhODtmaWxsLXJ1bGU6bm9uemVybzsiLz48L3N2Zz4=",
			'supports'            => array(
				'title',

			),
		);
		register_post_type( 'epico_capture_sc', $args );
		$this->elements = array_merge( $this->elements, array(
			'posttypes' => array(
				'epico_capture_sc' => 'element',
			)
		) );

		add_action( 'add_meta_boxes', array( $this, 'add_metabox' ), 5, 4 );
		add_action( 'add_meta_boxes_epico_capture_sc',  array( $this, 'remove_style_meta_box' ), 10, 2 );
		add_action( 'save_post', array( $this, 'save_post_metaboxes' ), 1, 2 );
		add_filter( 'manage_epico_capture_sc_posts_columns', array( $this, 'posts_column' ), 10, 2 );
		add_action( 'manage_epico_capture_sc_posts_custom_column', array( $this, 'custom_postcolumn' ), 10, 2 );
		add_filter( 'post_updated_messages', array( $this, 'updated_messages' ) );
	}

	/**
	 * Mensagens de configuracao do post type.
	 *
	 * @return    array
	 */
	function updated_messages( $messages ) {
		global $post, $post_ID;


		$messages[ 'epico_capture_sc' ] = array(
			0  => '', // Nao utilizado. As mensagens comecam no indice 1.
			1  => sprintf( __( 'Capture updated.', 'uf-epico' ), esc_url( get_permalink( $post_ID ) ) ),
			2  => __( 'Custom field updated.', 'uf-epico' ),
			3  => __( 'Custom field deleted.', 'uf-epico' ),
			4  => __( 'Capture updated.', 'uf-epico' ),

			/* Tradutores: %s e a data e hora da revisao. */
			5  => isset( $_GET[ 'revision' ] ) ? sprintf( __( 'Capture restored to revision from %s', 'uf-epico' ), wp_post_revision_title( (int) $_GET[ 'revision' ], FALSE ) ) : FALSE,
			6  => sprintf( __( 'Capture published.', 'uf-epico' ), esc_url( get_permalink( $post_ID ) ) ),
			7  => __( 'Capture saved.', 'uf-epico' ),
			8  => sprintf( __( 'Capture submitted.', 'uf-epico' ), esc_url( add_query_arg( 'preview', 'TRUE', get_permalink( $post_ID ) ) ) ),
			9  => sprintf( __( 'Capture scheduled for: <strong>%1$s</strong>.', 'uf-epico' ), // translators: Publish box date format, see https://php.net/date
				date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
			10 => sprintf( __( 'Capture draft updated.', 'uf-epico' ), esc_url( add_query_arg( 'preview', 'TRUE', get_permalink( $post_ID ) ) ) ),
		);

		return $messages;
	}

	/**
	 * Configura os metaboxes.
	 *
	 * @return    NULL
	 */
	function add_metabox( $slug, $post ) {
		global $post;

		if ( ! empty( $post ) ) {
			wp_enqueue_media();
			wp_enqueue_script( 'media-upload' );

			wp_enqueue_script( $this->plugin_slug . '-panel-script-sc', self::get_url( 'assets/js/panel-sc.js', __FILE__ ), array( 'jquery' ), self::VERSION );
			add_meta_box( '458101112', __( 'Texts', 'uf-epico' ), array(
				$this,
				'render_metabox'
			), 'epico_capture_sc', 'normal'/* ou `side */, 'core', array(
				'slug' => 'epico_capture_sc',
				'file' => 'texts'
			) );
			add_meta_box( '1011141128', __( 'Icon', 'uf-epico' ), array(
				$this,
				'render_metabox'
			), 'epico_capture_sc', 'normal'/* ou `side */, 'core', array(
				'slug' => 'epico_capture_sc',
				'file' => 'icon'
			) );
			add_meta_box( '2146812', __( 'Email Marketing', 'uf-epico' ), array(
				$this,
				'render_metabox'
			), 'epico_capture_sc', 'normal'/* ou `side */, 'core', array(
				'slug' => 'epico_capture_sc',
				'file' => 'email-marketing'
			) );
			add_meta_box( '01130151', __( 'Customization', 'uf-epico' ), array(
				$this,
				'render_metabox'
			), 'epico_capture_sc', 'normal'/* ou `side */, 'core', array(
				'slug' => 'epico_capture_sc',
				'file' => 'customization'
			) );
			add_meta_box( '121521305', __( 'Edit colors', 'uf-epico' ), array(
				$this,
				'render_metabox'
			), 'epico_capture_sc', 'normal'/* ou `side */, 'core', array(
				'slug' => 'epico_capture_sc',
				'file' => 'edit-colors'
			) );
		}

	}

	/**
	 * Remove o metabox `Estilo` do menu Capture.
	 *
	 */
	function remove_style_meta_box() {

		remove_meta_box( 'hybrid-post-style', 'epico_capture_sc', 'side' );
	}


	/**
	 * Obtem a URL atual.
	 *
	 */
	static function get_url( $src = NULL, $path = NULL ) {
		if ( ! empty( $path ) ) {
			return plugins_url( $src, $path );
		}

		return trailingslashit( plugins_url( $path, __FILE__ ) );
	}

	/**
	 * Renderiza as metaboxes.
	 *
	 * @return    NULL
	 */
	function render_metabox( $post, $args ) {
		global $post;

		if ( ! empty( $post ) ) {

			// Inclui as vistas do metabox.
			echo '<input type="hidden" name="uf_epico_metabox" id="uf_epico_metabox" value="' . wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />';
			echo '<input type="hidden" name="uf_epico_metabox_prefix[]" value="' . $args[ 'args' ][ 'slug' ] . '" />';

			include self::get_path( __FILE__ ) . 'configs/' . $post->post_type . '/' . $post->post_type . '-' . $args[ 'args' ][ 'file' ] . '.php';

			echo "<div class=\"group uf-epico-row-sorter\" id=\"rowitems\">\r\n";

			// Constroi a instancia.
			$depth    = 1;
			$instance = get_post_meta( $post->ID, $args[ 'args' ][ 'slug' ], TRUE );
			if ( ! empty( $group['multiple'] ) ) {
				foreach ( $group[ 'fields' ] as $field => $settings ) {
					if ( isset( $instance[ $field ] ) ) {
						if ( count( $instance[ $field ] ) > $depth ) {
							$depth = count( $instance[ $field ] );
						}
					}
				}
			}
			for ( $i = 0; $i < $depth; $i ++ ) {

				if ( $i > 0 ) {
					echo '  <div class="button button-primary right uf-epico-removeRow" style="margin-top:5px;">' . __( 'Remove', 'uf-epico' ) . '</div>';
				}

				echo "<table class=\"form-table rowGroup groupitems " . ( ! empty( $group['multiple'] ) ? 'group-multiple row-sorter' : '' ) . "\" id=\"groupitems_" . $i . "\" ref=\"items\">\r\n";
				echo "	<tbody>\r\n";
				foreach ( $group[ 'fields' ] as $field => $settings ) {
					$id      = 'field_' . $field;
					$groupid = $args[ 'id' ];
					$name    = $args[ 'args' ][ 'slug' ] . '[' . $field . ']';
					$single  = TRUE;
					$value   = $settings['default'];
					if ( ! empty( $group['multiple'] ) ) {
						$name = $args[ 'args' ][ 'slug' ] . '[' . $field . '][]';
						if ( isset( $instance[ $field ][ $i ] ) ) {
							$value = $instance[ $field ][ $i ];
						}
					} else {
						if ( isset( $instance[ $field ] ) ) {
							$value = $instance[ $field ];
						}
					}
					$label   = $settings['label'];
					$caption = $settings['caption'];
					echo "<tr valign=\"top\">\r\n";
					echo "<th scope=\"row\">\r\n";
					echo "<label for=\"" . $id . "\">" . $label . "</label>\r\n";
					echo "</th>\r\n";
					echo "<td>\r\n";
					include self::get_path( __FILE__ ) . 'includes/fields/field-' . $settings[ 'type' ] . '.php';
					if ( ! empty( $caption ) ) {
						echo '<p class="description">' . $caption . '</p>';
					}
					echo "</td>\r\n";
					echo "</tr>\r\n";

				}
				echo "	</tbody>\r\n";
				echo "</table>\r\n";
			}
			if ( ! empty( $group['multiple'] ) ) {
				echo "<div class=\"toolrow\"><button class=\"button uf-epico-add-group-row\" type=\"button\" data-rowtemplate=\"group-" . $args[ 'id' ] . "-tmpl\">" . __( 'Add Another', 'uf-epico' ) . "</button></div>\r\n";
			}
			echo "</div>\r\n";

			// Coloque o modelo html para campos repetidos.
			if ( ! empty( $group['multiple'] ) ) {
				echo "<script type=\"text/html\" id=\"group-" . $args[ 'id' ] . "-tmpl\">\r\n";
				echo '  <div class="button button-primary right uf-epico-removeRow" style="margin-top:5px;">' . __( 'Remove', 'uf-epico' ) . '</div>';
				echo "	<table class=\"form-table rowGroup groupitems " . ( ! empty( $group['multiple'] ) ? 'group-multiple row-sorter' : '' ) . "\" id=\"groupitems\" ref=\"items\">\r\n";
				echo "		<tbody>\r\n";
				foreach ( $group[ 'fields' ] as $field => $settings ) {

					$id      = 'field_{{id}}';
					$groupid = $args[ 'id' ];
					$name    = $args[ 'args' ][ 'slug' ] . '[' . $field . ']';
					$single  = TRUE;
					if ( ! empty( $group['multiple'] ) ) {
						$name = $args[ 'args' ][ 'slug' ] . '[' . $field . '][]';
					}
					$label   = $settings['label'];
					$caption = $settings['caption'];
					$value   = $settings['default'];
					echo "<tr valign=\"top\">\r\n";
					echo "<th scope=\"row\">\r\n";
					echo "<label for=\"" . $id . "\">" . $label . "</label>\r\n";
					echo "</th>\r\n";
					echo "<td>\r\n";
					include self::get_path( __FILE__ ) . 'includes/fields/field-' . $settings[ 'type' ] . '.php';
					if ( ! empty( $caption ) ) {
						echo '<p class="description">' . $caption . '</p>';
					}

					echo "</td>\r\n";
					echo "</tr>\r\n";

				}
				echo "		</tbody>\r\n";
				echo "	</table>\r\n";
				echo "</script>";
			}
		}
	}

	/**
	 * Obtem a URL atual.
	 *
	 */
	static function get_path( $src = NULL ) {
		return plugin_dir_path( $src );

	}

	/**
	 * Colunas personalizadas para o post type.
	 *
	 * @return    columns
	 */
	function posts_column( $hd ) {
		unset( $hd['date'] );
		$hd['shortcode_slug'] = __( 'Shortcode', 'uf-epico' );
		$hd['date']           = __( 'Date', 'uf-epico' );

		return $hd;
	}

	/**
	 * Insere uma coluna personalizada no post type.
	 *
	 */
	function custom_postcolumn( $col, $id ) {
		echo '[' . sanitize_text_field( $_GET['post_type'] ) . ' id="' . $id . '"]';
	}

	/**
	 * Registra e embute a folha de estilo especifica para o admin.
	 *
	 * @return    NULL
	 */
	public function enqueue_admin_stylescripts() {

		$screen = get_current_screen();

		global $pagenow;

		if ( $pagenow == 'update-core.php' ) {
			wp_enqueue_script( $this->plugin_slug . '-icon', self::get_url( 'assets/js/plugin-icon.js', __FILE__ ), array( 'jquery' ), self::VERSION );
			wp_localize_script( $this->plugin_slug . '-icon', 'ufEpico', array(
				'pluginsUrl'    => plugins_url(),
				'pluginVersion' => self::VERSION,
			));
		}

		if ( $screen->post_type == 'epico_capture_sc' && $screen->base == 'post' ) {
			wp_enqueue_script( $this->plugin_slug . '-image-script-image-modal-js', self::get_url( 'assets/js/image-modal.js', __FILE__ ), array( 'jquery' ), self::VERSION );
		}

		if ( $screen->post_type == 'epico_capture_sc' && $screen->base == 'post' ) {
			wp_enqueue_style( $this->plugin_slug . '-onoff-styles-toggles-css', self::get_url( 'assets/css/toggles.css', __FILE__ ), array(), self::VERSION );
			wp_enqueue_script( $this->plugin_slug . '-onoff-script-toggles-min-js', self::get_url( 'assets/js/toggles-min.js', __FILE__ ), array( 'jquery' ), self::VERSION );
		}

		if ( $screen->post_type == 'epico_capture_sc' && $screen->base == 'post' ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( $this->plugin_slug . '-script-color-picker-sc-js', self::get_url( 'assets/js/colorpicker-sc.js', __FILE__ ), array( 'wp-color-picker' ), self::VERSION );
		}

		if ( $screen->base == 'post' ) {
			wp_enqueue_script( $this->plugin_slug . '-shortcode-modal-script', self::get_url( 'assets/js/shortcode-modal.js', __FILE__ ), array( 'jquery' ), self::VERSION );
			wp_enqueue_script( $this->plugin_slug . '-panel-script', self::get_url( 'assets/js/panel.js', __FILE__ ), array( 'jquery' ), self::VERSION );
			wp_enqueue_style( $this->plugin_slug . '-panel-styles', self::get_url( 'assets/css/panel-min.css', __FILE__ ), array(), self::VERSION );
			wp_enqueue_script( $this->plugin_slug . '-image-script-image-modal-js', self::get_url( 'assets/js/image-modal.js', __FILE__ ), array( 'jquery' ), self::VERSION );
			wp_enqueue_style( $this->plugin_slug . '-onoff-styles-toggles-css', self::get_url( 'assets/css/toggles.css', __FILE__ ), array(), self::VERSION );
			wp_enqueue_script( $this->plugin_slug . '-onoff-script-toggles-min-js', self::get_url( 'assets/js/toggles-min.js', __FILE__ ), array( 'jquery' ), self::VERSION );
		}

		if ( $screen->base == 'widgets' ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( $this->plugin_slug . '-script-color-picker-js', self::get_url( 'assets/js/colorpicker.js', __FILE__ ), array( 'wp-color-picker' ), self::VERSION );
		}

		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		if ( in_array( $screen->id, $this->plugin_screen_hook_suffix ) ) {
			$slug = array_search( $screen->id, $this->plugin_screen_hook_suffix );

			if ( file_exists( self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $slug . '.php' ) ) {
				include self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $slug . '.php';
			} else {
				return;
			}

			if ( ! empty( $configfiles ) ) {
				wp_enqueue_media();
				wp_enqueue_script( 'media-upload' );

				foreach ( $configfiles as $key => $fieldfile ) {
					include $fieldfile;
					if ( ! empty( $group['scripts'] ) ) {
						foreach ( $group['scripts'] as $script ) {
							if ( is_array( $script ) ) {
								foreach ( $script as $remote => $location ) {
									$infoot = FALSE;
									if ( $location == 'footer' ) {
										$infoot = TRUE;
									}
									if ( FALSE !== strpos( $remote, '.' ) ) {
										wp_enqueue_script( $this->plugin_slug . '-' . strtok( basename( $remote ), '.' ), $remote, array( 'jquery' ), FALSE, $infoot );
									} else {
										wp_enqueue_script( $remote, FALSE, array(), FALSE, $infoot );
									}
								}
							} else {
								if ( FALSE !== strpos( $script, '.' ) ) {
									wp_enqueue_script( $this->plugin_slug . '-' . strtok( $script, '.' ), self::get_url( 'assets/js/' . $script, __FILE__ ), array( 'jquery' ), FALSE, TRUE );
								} else {
									wp_enqueue_script( $script );
								}
							}
						}
					}
					if ( ! empty( $group['styles'] ) ) {
						foreach ( $group['styles'] as $style ) {
							if ( is_array( $style ) ) {
								foreach ( $style as $remote ) {
									wp_enqueue_style( $this->plugin_slug . '-' . strtok( basename( $remote ), '.' ), $remote );
								}
							} else {
								wp_enqueue_style( $this->plugin_slug . '-' . strtok( $style, '.' ), self::get_url( 'assets/css/' . $style, __FILE__ ) );
							}
						}
					}
				}
			}
			wp_enqueue_style( $this->plugin_slug . '-admin-styles', self::get_url( 'assets/css/panel-min.css', __FILE__ ), array(), self::VERSION );
			wp_enqueue_script( $this->plugin_slug . '-admin-scripts', self::get_url( 'assets/js/panel.js', __FILE__ ), array(), self::VERSION );
		}
	}

	/**
	 * Insere o modelo no rodape.
	 *
	 */
	public function footer_template() {

		echo $this->render_element( get_option( "_epico_global_assets_options" ), FALSE, 'epico_global_assets' );

	}

	/**
	 * Renderiza o elemento.
	 *
	 */
	public function render_element( $atts, $content, $slug, $head = FALSE ) {

		$raw_atts = $atts;

		// Este e um ID do post type?
		if ( ! empty( $atts[ 'id' ] ) ) {
			$content = get_post_field( 'post_content', $atts[ 'id' ] );
			$atts    = get_post_meta( $atts[ 'id' ], $slug, TRUE );
		}

		if ( ! empty( $head ) ) {
			$instanceID = $this->element_instance_id( 'uf_epico' . $slug, 'header' );
		} else {
			$instanceID = $this->element_instance_id( 'uf_epico' . $slug, 'footer' );
		}

		// Define a ID personalizada com base na entrada do usuário (1.2.1 em diante).
		if ( empty( $atts[ 'widget_id' ] ) ) {
			$custom_id = $instanceID;
		} else {
			$custom_id = $atts[ 'widget_id' ];
			$custom_id = sanitize_file_name( $custom_id );
		}

		if ( file_exists( self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $slug . '.php' ) ) {
			include self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $slug . '.php';

			$defaults = array();
			foreach ( $configfiles as $file ) {

				include $file;
				foreach ( $group[ 'fields' ] as $variable => $conf ) {
					if ( ! empty( $group['multiple'] ) ) {
						$value = array( $this->process_value( $conf[ 'type' ], $conf['default'] ) );
					} else {
						$value = $this->process_value( $conf[ 'type' ], $conf['default'] );
					}
					if ( ! empty( $group['multiple'] ) ) {
						if ( isset( $atts[ $variable . '_1' ] ) ) {
							$index = 1;
							$value = array();
							while ( isset( $atts[ $variable . '_' . $index ] ) ) {
								$value[] = $this->process_value( $conf[ 'type' ], $atts[ $variable . '_' . $index ] );
								$index ++;
							}
						} elseif ( isset( $atts[ $variable ] ) ) {
							if ( is_array( $atts[ $variable ] ) ) {
								foreach ( $atts[ $variable ] as &$varval ) {
									$varval = $this->process_value( $conf[ 'type' ], $varval );
								}
								$value = $atts[ $variable ];
							} else {
								$value[] = $this->process_value( $conf[ 'type' ], $atts[ $variable ] );
							}
						}
					} else {
						if ( isset( $atts[ $variable ] ) ) {
							$value = $this->process_value( $conf[ 'type' ], $atts[ $variable ] );
						}
					}

					if ( ! empty( $group['multiple'] ) && ! empty( $value ) ) {
						foreach ( $value as $key => $val ) {
							$groups[ $group['master'] ][ $key ][ $variable ] = $val;
						}
					}
					$defaults[ $variable ] = $value;
				}
			}
			$atts = $defaults;
		}

		// Puxa os assets.
		$assets = array();
		if ( file_exists( self::get_path( __FILE__ ) . 'assets/assets-' . $slug . '.php' ) ) {
			include self::get_path( __FILE__ ) . 'assets/assets-' . $slug . '.php';
		}

		ob_start();
		if ( file_exists( self::get_path( __FILE__ ) . 'includes/templates/template-' . $slug . '.php' ) ) {
			include self::get_path( __FILE__ ) . 'includes/templates/template-' . $slug . '.php';
		} else if ( file_exists( self::get_path( __FILE__ ) . 'includes/templates/template-' . $slug . '.html' ) ) {
			include self::get_path( __FILE__ ) . 'includes/templates/template-' . $slug . '.html';
		}
		$out = ob_get_clean();

		if ( ! empty( $head ) ) {

			// Processa cabecalhos CSS.
			if ( file_exists( self::get_path( __FILE__ ) . 'assets/css/styles-' . $slug . '.php' ) ) {
				ob_start();
				include self::get_path( __FILE__ ) . 'assets/css/styles-' . $slug . '.php';
				$this->element_header_styles[] = ob_get_clean();

				// Adiciona estilos inline do plugin apos estilos do tema.
				add_action( 'wp_enqueue_scripts', array(
					$this,
					'header_styles'
				), 15 );
			} else if ( file_exists( self::get_path( __FILE__ ) . 'assets/css/styles-' . $slug . '.css' ) ) {
				wp_enqueue_style( $this->plugin_slug . '-' . $slug . '-styles', self::get_url( 'assets/css/styles-' . $slug . '.css', __FILE__ ), array(), self::VERSION );
			}
			// Processa cabecalhos JS.
			if ( file_exists( self::get_path( __FILE__ ) . 'assets/js/scripts-' . $slug . '.php' ) ) {
				ob_start();
				include self::get_path( __FILE__ ) . 'assets/js/scripts-' . $slug . '.php';
				$this->element_footer_scripts[] = ob_get_clean();

				// Adiciona estilos inline do plugin apos estilos do tema.
				add_action( 'wp_enqueue_scripts', array(
					$this,
					'footer_scripts'
				), 15 );
			} else if ( file_exists( self::get_path( __FILE__ ) . 'assets/js/scripts-' . $slug . '.js' ) ) {
				wp_enqueue_script( $this->plugin_slug . '-' . $slug . '-script', self::get_url( 'assets/js/scripts-' . $slug . '.js', __FILE__ ), array( 'jquery' ), self::VERSION, TRUE );
			}
			// Limpa o shortcode para verificacao de cabecalho.
			ob_start();
			do_shortcode( $out );
			ob_get_clean();

			return;
		}

		return do_shortcode( $out );
	}

	/**
	 * Cria e registra um ID de instância.
	 *
	 */
	public function element_instance_id( $id, $process ) {

		$this->element_instances[ $id ][ $process ][] = TRUE;
		$count = count( $this->element_instances[ $id ][ $process ] );

		if ( $count > 1 ) {
			return $id . ( $count - 1 );
		}

		return $id;
	}

	/**
	 * Processa o valor de um campo.
	 *
	 */
	public function process_value( $type, $value ) {

		switch ( $type ) {
			default:
				return $value;
				break;
			case "image":
				$attachment = explode( ',', $value );
				if ( floatval( $attachment[0] ) > 0 ) {
					$image = wp_get_attachment_image_src( $attachment[0], $attachment[1] );
					$value = $image[0];
				}
				break;

		}

		return $value;

	}

	/**
	 * Insere o botao de midia do shortcode.
	 *
	 */
	function shortcode_insert_button() {
		global $post;
		if ( ! empty( $post ) ) {
			echo "<a id=\"uf-epico-shortcodeinsert\" title=\"" . __( 'Shortcodes', 'uf-epico' ) . "\" style=\"padding-left: 0.4em;\" class=\"button uf-epico-editor-button\" href=\"#inst\">\n";
			echo "	<img src=\"" . self::get_url( __FILE__ ) . "assets/images/icon.svg\" width=\"17px\" height=\"17px\" alt=\"" . __( "Insert Shortcode", "uf-epico" ) . "\" style=\"padding:0 3px 1px;\" /> " . __( 'Capture', 'uf-epico' ) . "\n";
			echo "</a>\n";
		}
	}

	/**
	 * Insere o modal do shortcode.
	 *
	 *
	 */
	function shortcode_modal_template() {
		$screen = get_current_screen();

		if ( $screen->base != 'post' ) {
			return;
		}

		echo "<script type=\"text/html\" id=\"uf-epico-shortcode-panel-tmpl\">\r\n";
		echo "	<div tabindex=\"0\" id=\"uf-epico-shortcode-panel\" class=\"hidden\">\r\n";
		echo "		<div class=\"media-modal-backdrop\"></div>\r\n";
		echo "		<div class=\"uf-epico-modal-modal\">\r\n";
		echo "			<div class=\"uf-epico-modal-content\">\r\n";
		echo "				<div class=\"uf-epico-modal-header\">\r\n";
		echo "					<a title=\"Close\" href=\"#\" class=\"media-modal-close\">\r\n";
		echo "						<span class=\"media-modal-icon\"></span>\r\n";
		echo "					</a>\r\n";
		echo "					<h2 style=\"background: url(" . self::get_url( '/assets/images/icon.svg', __FILE__ ) . ") no-repeat scroll 0px 2px transparent;background-size: 17px;padding-left: 23px;\">" . __( 'Capture', 'uf-epico' ) . " <small>" . __( "Shortcodes", "uf-epico" ) . "</small></h2>\r\n";
		echo "				</div>\r\n";
		echo "				<div class=\"uf-epico-modal-body\">\r\n";
		echo "					<span id=\"uf-epico-categories\">\r\n";
		echo "					<span class=\"uf-epico-autoload\" data-shortcode=\"epico_capture_sc\"></span>\r\n";
		echo "					</span>\r\n";
		echo "					<div id=\"uf-epico-shortcode-config\" class=\"uf-epico-shortcode-config\">\r\n";
		echo "					</div>\r\n";
		echo "				</div>\r\n";
		echo "				<div class=\"uf-epico-modal-footer\">\r\n";
		echo "					<button class=\"button button-primary button-large\" id=\"uf-epico-insert-shortcode\">" . __( "Insert Shortcode", "uf-epico" ) . "</button>\r\n";
		echo "				</div>\r\n";
		echo "			</div>\r\n";
		echo "		</div>\r\n";
		echo "	</div>\r\n";
		echo "</script>\r\n";

		foreach ( $this->elements['shortcodes'] as $shortcode => $type ) {
			$this->render_shortcode_panel( $shortcode, $type, TRUE );
		}

	}

	/**
	 * Processa o painel de configuracao do shortcode.
	 *
	 * @return    NULL
	 */
	function render_shortcode_panel( $shortcode, $type = 1, $template = FALSE ) {


		if ( ! empty( $template ) ) {
			echo "<script type=\"text/html\" id=\"uf-epico-" . $shortcode . "-config-tmpl\">\r\n";
		}
		echo "<input id=\"uf-epico-shortcodekey\" class=\"configexclude\" type=\"hidden\" value=\"" . $shortcode . "\">\r\n";
		echo "<input id=\"uf-epico-shortcodetype\" class=\"configexclude\" type=\"hidden\" value=\"" . $type . "\">\r\n";
		echo "<input id=\"uf-epico-default-content\" class=\"configexclude\" type=\"hidden\" value=\" " . __( 'Your content goes here', 'uf-epico' ) . " \">\r\n";

		if ( ! empty( $this->elements[ 'posttypes' ][ $shortcode ] ) ) {
			$posts = get_posts( array( 'post_type' => $shortcode ) );

			if ( empty( $posts ) ) {
				echo 'No items available';
			} else {
				foreach ( $posts as $post ) {
					echo '<div class="posttype-item"><label><input type="radio" value="' . $post->ID . '" name="id"> ' . $post->post_title . '</label></div>';
				}
			}
			if ( ! empty( $template ) ) {
				echo "</script>\r\n";
			}

			return;
		}

		if ( file_exists( self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $shortcode . '.php' ) ) {
			include self::get_path( __FILE__ ) . 'configs/fieldgroups-' . $shortcode . '.php';
		} else {
			if ( ! empty( $template ) ) {
				echo "</script>\r\n";
			}

			return;
		}

		$groups = array();
		echo "<div class=\"uf-epico-shortcode-config-nav\">\r\n";
		echo "	<ul>\r\n";
		foreach ( $configfiles as $key => $fieldfile ) {
			include $fieldfile;
			$groups[] = $group;
			echo "		<li class=\"" . ( $key === 0 ? "current" : "" ) . "\">\r\n";
			echo "			<a title=\"" . $group['label'] . "\" href=\"#row" . $group['master'] . "\"><strong>" . $group['label'] . "</strong></a>\r\n";
			echo "		</li>\r\n";
		}
		echo "	</ul>\r\n";
		echo "</div>\r\n";

		echo "<div class=\"uf-epico-shortcode-config-content " . ( count( $configfiles ) > 1 ? "" : "full" ) . "\">\r\n";
		foreach ( $groups as $key => $group ) {
			echo "<div class=\"group\" " . ( $key === 0 ? "" : "style=\"display:none;\"" ) . " id=\"row" . $group['master'] . "\">\r\n";
			echo "<h3 class=\"uf-epico-config-header\">" . $group['label'] . "</h3>\r\n";
			echo "<table class=\"form-table rowGroup groupitems\" id=\"groupitems\" ref=\"items\">\r\n";
			echo "	<tbody>\r\n";
			foreach ( $group[ 'fields' ] as $field => $settings ) {

				$id      = 'field_' . $field;
				$groupid = $group[ 'id' ];
				$name    = $field;
				$single  = TRUE;
				if ( ! empty( $group['multiple'] ) ) {
					$name = $field . '[]';
				}
				$label   = $settings['label'];
				$caption = $settings['caption'];
				$value   = $settings['default'];
				echo "<tr valign=\"top\">\r\n";
				echo "<th scope=\"row\">\r\n";
				echo "<label for=\"" . $id . "\">" . $label . "</label>\r\n";
				echo "</th>\r\n";
				echo "<td>\r\n";
				include self::get_path( __FILE__ ) . 'includes/fields/field-' . $settings[ 'type' ] . '.php';
				if ( ! empty( $caption ) ) {
					echo "<p class=\"description\">" . $caption . "</p>\r\n";
				}
				echo "</td>\r\n";
				echo "</tr>\r\n";
			}
			echo "	</tbody>\r\n";
			echo "</table>\r\n";

			if ( ! empty( $group['multiple'] ) ) {
				echo "<div class=\"toolrow\"><button class=\"button uf-epico-add-group-row\" type=\"button\" data-rowtemplate=\"group-" . $group[ 'id' ] . "-tmpl\">" . __( 'Add Another', 'uf-epico' ) . "</button></div>\r\n";
			}
			echo "</div>\r\n";
		}
		echo "</div>\r\n";

		if ( ! empty( $template ) ) {
			echo "</script>\r\n";
		}

		// Obtem os modelos de loop.
		foreach ( $groups as $group ) {

			// Coloque o modelo html para campos repetidos.
			if ( ! empty( $group['multiple'] ) ) {
				echo "<script type=\"text/html\" id=\"group-" . $group[ 'id' ] . "-tmpl\">\r\n";
				echo '  <div class="button button-primary right uf-epico-removeRow" style="margin:5px 5px 0;">' . __( 'Remove', 'uf-epico' ) . '</div>';
				echo "	<table class=\"form-table rowGroup groupitems\" id=\"groupitems\" ref=\"items\">\r\n";
				echo "		<tbody>\r\n";
				foreach ( $group[ 'fields' ] as $field => $settings ) {

					$id      = 'field_{{id}}';
					$groupid = $group[ 'id' ];
					$name    = $field . '[__count__]';
					$single  = TRUE;
					$label   = $settings[ 'label' ];
					$caption = $settings[ 'caption' ];
					$value   = $settings[ 'default' ];
					echo "<tr valign=\"top\">\r\n";
					echo "<th scope=\"row\">\r\n";
					echo "<label for=\"" . $id . "\">" . $label . "</label>\r\n";
					echo "</th>\r\n";
					echo "<td>\r\n";
					include self::get_path( __FILE__ ) . 'includes/fields/field-' . $settings[ 'type' ] . '.php';
					if ( ! empty( $caption ) ) {
						echo "<p class=\"description\">" . $caption . "</p>\r\n";
					}
					echo "</td>\r\n";
					echo "</tr>\r\n";

				}
				echo "		</tbody>\r\n";
				echo "	</table>\r\n";
				echo "</script>";
			}
		}
	}

	/**
	 * Configura as metaboxes.
	 *
	 * @return    NULL
	 */
	public function get_post_meta( $id, $key = NULL, $single = FALSE ) {

		if ( ! empty( $key ) ) {

			if ( file_exists( self::get_path( __FILE__ ) . 'configs/fieldgroups-uf_epico.php' ) ) {
				include self::get_path( __FILE__ ) . 'configs/fieldgroups-uf_epico.php';
			} else {
				return;
			}

			$field_type = 'text';
			foreach ( $configfiles as $config => $file ) {
				include $file;
				if ( isset( $group[ 'fields' ][ $key ][ 'type' ] ) ) {
					$field_type = $group[ 'fields' ][ $key ][ 'type' ];
					break;
				}
			}
			$key = 'uf_epico_' . $key;
		}
		if ( FALSE === $single ) {
			$metas = get_post_meta( $id, $key );
			foreach ( $metas as $key => &$value ) {
				$value = $this->process_value( $field_type, $value );
			}

			return $metas;
		}

		return $this->process_value( $field_type, get_post_meta( $id, $key, $single ) );

	}

	/**
	 * Salve os dados da metabox.
	 *
	 *
	 */
	function save_post_metaboxes( $pid, $post ) {

		if ( ! isset( $_POST[ 'uf_epico_metabox' ] ) || ! isset( $_POST[ 'uf_epico_metabox_prefix' ] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST[ 'uf_epico_metabox' ], plugin_basename( __FILE__ ) ) ) {
			return $post->ID;
		}
		if ( ! current_user_can( 'edit_post', $post->ID ) ) {
			return $post->ID;
		}
		if ( $post->post_type == 'revision' ) {
			return;
		}

		foreach ( $_POST[ 'uf_epico_metabox_prefix' ] as $prefix ) {
			if ( ! isset( $_POST[ $prefix ] ) ) {
				continue;
			}

			delete_post_meta( $post->ID, $prefix );
			add_post_meta( $post->ID, $prefix, $_POST[ $prefix ] );
		}
	}

	/**
	 * Detecta elementos utilizados na pagina para nos permitir embutir estilos e scripts necessários.
	 *
	 */
	public function detect_elements() {

		global $wp_query;

		// Este e um post type?
		if ( isset( $this->elements[ 'posttypes' ] ) ) {
			$this_post_type = get_post_type();
			if ( isset( $this->elements[ 'posttypes' ][ $this_post_type ] ) ) {
				if ( $this->elements[ 'posttypes' ][ $this_post_type ] === 'browsable' ) {
					// Navegavel - processar elemento sobre o conteudo.
					foreach ( $wp_query->posts as $key => &$post ) {
						// Processa a parte do cabecalho
						$this->render_element( array( 'id' => $post->ID ), $post->post_content, $this_post_type, TRUE );
						// Renderiza parte do conteudo e substitui o conteudo
						$post->post_content = $this->render_element( array( 'id' => $post->ID ), $post->post_content, $this_post_type );
					}
				}
			}
		}

		// Encontre shortcodes usados dentro de postagens.
		foreach ( $wp_query->posts as $key => &$post ) {
			$shortcodes = self::get_used_shortcodes( $post->post_content );
			if ( ! empty( $shortcodes[2] ) ) {
				foreach ( $shortcodes[2] as $foundkey => $shortcode ) {
					$atts = array();
					if ( ! empty( $shortcodes[3][ $foundkey ] ) ) {
						$atts = shortcode_parse_atts( $shortcodes[3][ $foundkey ] );
					}

					// Processa a parte do cabecalho.
					$this->render_element( $atts, $post->post_content, $shortcode, TRUE );
				}
			}
		}

		wp_enqueue_style( 'epico_global_assets-epico_capture_styles', self::get_url( '/assets/css/capture-styles-min.css', __FILE__ ), FALSE, self::VERSION );
		wp_enqueue_script( 'jquery', FALSE, FALSE, FALSE, FALSE );
		wp_enqueue_script( 'epico_global_assets-epico_capture_plugin', self::get_url( '/assets/js/capture-plugin-min.js', __FILE__ ), array( 'jquery', ), self::VERSION, TRUE );
		wp_localize_script( 'epico_global_assets-epico_capture_plugin', 'uf_ajax', array(
			 'ajax_url' => admin_url( 'admin-ajax.php'),
		 ));

		$this->render_element( get_option( "_epico_global_assets_options" ), FALSE, 'epico_global_assets', TRUE );

		add_action( 'wp_footer', array( $this, 'footer_template' ) );

		add_filter( 'plugin_row_meta', 'add_plugin_page_links', 10, 2 );
	}

	function get_used_shortcodes( $content, $return = array(), $internal = TRUE, $preview = FALSE ) {

		$regex = self::get_regex();

		preg_match_all( '/' . $regex . '/s', $content, $found );

		foreach ( $found[5] as $innerContent ) {
			if ( ! empty( $innerContent ) ) {
				$new = self::get_used_shortcodes( $innerContent, $found, $internal );
				if ( ! empty( $new ) ) {
					foreach ( $new as $key => $val ) {
						$found[ $key ] = array_merge( $found[ $key ], $val );
					}
				}
			}
		}

		return $found;
	}

	/**
	 * Obtem uma lista de shortcodes utilizados no conteudo fornecido.
	 *
	 * @return    array
	 */
	function get_regex() {

		// Isso facilita o ciclo e obtem os codigos usados para inclusao
		$validcodes = join( '|', array_map( 'preg_quote', array_keys( $this->elements[ 'shortcodes' ] ) ) );

		return '\\['                           // Bracket de abertura
			   . '(\\[?)'                      // 1: Bracket de abertura opcional para escapar codigos curtos: [[tag]]
			   . "($validcodes)"               // 2: somente codigos selecionados
			   . '\\b'                         // Limite de palavra
			   . '('                           // 3: desenrolar o loop: dentro da tag do shortcode de abertura
			   . '[^\\]\\/]*'                  // Nao e um bracket de fechamento ou barra inclinada
			   . '(?:' . '\\/(?!\\])'          // Uma barra inclinada nao seguida por um bracket de fechamento
			   . '[^\\]\\/]*'                  // Nao e um bracket de fechamento ou barra inclinada
			   . ')*?' . ')' . '(?:' . '(\\/)' // 4: tag de fechamento automático ...
			   . '\\]'                         // ... e bracket de fechamento
			   . '|' . '\\]'                   // bracket de fechamento
			   . '(?:' . '('                   // 5: desenrolar o loop: opcionalmente, qualquer coisa entre a tag de abertura e de fechamento do shortcode
			   . '[^\\[]*+'                    // Nao e um bracket de abertura
			   . '(?:' . '\\[(?!\\/\\2\\])'    // Um bracket de abertura nao seguido pela tag de fechamento do shortcode
			   . '[^\\[]*+'                    // Nao e um bracket de abertura
			   . ')*+' . ')' . '\\[\\/\\2\\]'  // Fechamento da tag do shortcode
			   . ')?' . ')' . '(\\]?)';        // 6: segundo bracket de fechamento opcional para escapar shortcodes: [[tag]]

	}

	/**
	 * Renderiza quaisquer estilos para o cabecalho.
	 *
	 */
	public function header_styles() {
		if ( ! empty( $this->element_header_styles ) ) {

			$custom_styles = '';

			foreach ( $this->element_header_styles as $styles ) {
				$custom_styles .= $styles . "\r\n";
			}

			wp_add_inline_style( 'style', $custom_styles );
		}
	}

	/**
	 * Renderiza quaisquer scripts para o rodape.
	 *
	 */
	public function footer_scripts() {
		if ( ! empty( $this->element_footer_scripts ) ) {

			$custom_scripts = '';

			foreach ( $this->element_footer_scripts as $scripts ) {
				$custom_scripts .= $scripts . "\r\n";
			}

			wp_add_inline_script( 'epico_global_assets-epico_capture_plugin', $custom_scripts );
		}
	}

	/**
	 * Insere link personalizado na descricao do plugin.
	 *
	 * @since 1.4.4
	 */
	public function epico_add_plugin_page_links( $links, $file ) {

		if ( $file == 'uf-epico/plugincore.php' ) {

			$links[] = '<a href="https://twitter.com/uberfacil">' . __( 'Follow us on Twitter!', 'uf-epico' ) . '</a> | <a href="https://www.facebook.com/uberfacil">' . __( 'Follow us on Facebook', 'uf-epico' ) . '</a>';
		}

		return $links;
	}

	/**
	 * Obtem IDs da URL de videos.
	 *
	 * @since 1.10.0
	 */
	public function epico_get_id_from_url( $url ) {

		$parts = wp_parse_url( $url );

		if ( isset( $parts['query'] ) ) {
			parse_str( $parts['query'], $qs );

			if ( isset( $qs['v'] ) ) {
				return $qs['v'];
			} else if ( isset( $qs['vi'] ) ) {
				return $qs['vi'];
			}
		}

		if ( isset( $parts['path'] ) ) {
			$path = explode( '/', trim( $parts['path'], '/' ) );
			return $path[ count( $path ) -1 ];
		}

		return false;
	}
}
