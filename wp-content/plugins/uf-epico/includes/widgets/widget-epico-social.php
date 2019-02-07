<?php
/**
 * Widget Épico Social
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */

class Widget_Epico_Social extends WP_Widget {

	/*--------------------------------------------------*/
	/* Construtor
	/*--------------------------------------------------*/

	/**
	 * Especifica o nome da classe e a descrição, instancia o widget,
	 * carrega arquivos de localização e inclui folhas de estilo e JavaScript necessárias.
	 *
	 */
	public function __construct() {

		parent::__construct( 'social-id', __( 'Épico Social', 'uf-epico' ), array( 'description' => __( 'Easily add social network buttons.', 'uf-epico' ) ), array( 'width' => 495 ) );

		// Registra os estilos e os scripts para o admin
		add_action( 'admin_print_styles-widgets.php', array( $this, 'register_admin_styles_scripts' ) );

		// Register os estilos para o frontend
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );

	} // Fim do construtor

	/*--------------------------------------------------*/
	/* Funções da API de widgets do WordPress
	/*--------------------------------------------------*/

	/**
	 * Produz o conteúdo do widget.
	 *
	 * @param    array    args        O array de elementos de formulário
	 * @param    array    instance    A instância atual do widget
	 */
	public function widget( $args, $instance ) {

		if ( empty( $instance ) ) {
			return;
		}

		if ( isset( $instance['__cur_tab__'] ) ) {
			unset( $instance['__cur_tab__'] );
		}
		extract( $args, EXTR_SKIP );

		echo $before_widget;

		$element = Uf_Epico::get_instance();
		echo $element->render_element( $instance, '', 'social' );

		echo $after_widget;

	} // Fim do widget

	/**
	 * Processa as opções do widget para serem salvas.
	 *
	 * @param    array    new_instance    A nova instância de valores a serem gerados através da atualização.
	 * @param    array    old_instance    A instância valores anteriores, antes da atualização.
	 */
	public function update( $new_instance, $old_instance ) {

		return $new_instance;

	} // Fim do widget

	/**
	 * Gera o formulário de administração para o widget.
	 *
	 * @param    array    instance    O array de chaves e valores para o widget.
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( (array) $instance );

		// Exibe os campos do widget
		if ( file_exists( self::get_path( dirname( __DIR__ ) ) . 'configs/fieldgroups-social.php' ) ) {
			include self::get_path( dirname( __DIR__ ) ) . 'configs/fieldgroups-social.php';
		} else {
			return;
		}

		echo "<input type=\"hidden\" name=\"uf_epico-widget\">\r\n";
		$groups  = array();
		$setsize = 'full';

		echo "<div style=\"position: relative;\">\r\n";

		foreach ( $configfiles as $key => $fieldfile ) {
			include $fieldfile;
			$group['id'] = uniqid( 'uf-epico' );
			$groups[]    = $group;
		}

		echo "<input type=\"hidden\" name=\"" . self::get_field_name( '__cur_tab__' ) . "\" id=\"" . self::get_field_id( '__cur_tab__' ) . "\" value=\"" . ( ! empty( $instance['__cur_tab__'] ) ? $instance['__cur_tab__'] : 0 ) . "\">";
		echo "<div class=\"uf-epico-widget-config-nav\">\r\n";
		echo "	<ul>\r\n";
		foreach ( $groups as $key => $group ) {
			echo "		<li class=\"" . ( ! empty( $instance['__cur_tab__'] ) ? ( $instance['__cur_tab__'] == $key ? "current" : "" ) : ( $key === 0 ? "current" : "" ) ) . "\">\r\n";
			echo "			<a data-tabkey=\"" . $key . "\" data-tabset=\"" . self::get_field_id( '__cur_tab__' ) . "\" title=\"" . $group['label'] . "\" href=\"#row" . self::get_field_id( '__row' . $group['id'] ) . "\"><strong>" . $group['label'] . "</strong></a>\r\n";
			echo "		</li>\r\n";
		}

		echo "	</ul>\r\n";
		echo "</div>\r\n";
		$setsize = null;

		echo "<div class=\"uf-epico-widget-config-content " . $setsize . "\">\r\n";
		foreach ( $groups as $key => $group ) {
			echo "<div id=\"row" . self::get_field_id( '__row' . $group['id'] ) . "\" class=\"uf-epico-groupbox group\" " . ( ! empty( $instance['__cur_tab__'] ) ? ( $instance['__cur_tab__'] == $key ? "" : "style=\"display:none;\"" ) : ( $key === 0 ? "" : "style=\"display:none;\"" ) ) . ">\r\n";
			if ( count( $groups ) > 1 || empty( $setsize ) ) {
				echo "<h3>" . $group['label'] . "</h3>";
			}
			$this->group( $group, $instance );
			echo "</div>\r\n";
		}

		echo '</div>';
		echo "</div>\r\n";
		echo "<hr class=\"widget-footer\">\r\n";
	} // Fim da apresentação dos campos

	/**
	 * Gera um grupo de campos para o widget.
	 *
	 */
	// Constrói a instância
	/**
	 * Obtém o caminho atual
	 *
	 */
	static function get_path( $src = null ) {
		return plugin_dir_path( $src );
	}

	/*--------------------------------------------------*/
	/* Funções públicas
	/*--------------------------------------------------*/


	public function group( $group, $instance ) {
		$depth = 1;

		foreach ( $group['fields'] as $field => $settings ) {
			if ( ! empty( $instance[ $field ] ) && ! empty( $group['multiple'] ) ) {
				if ( count( $instance[ $field ] ) > $depth ) {
					$depth = count( $instance[ $field ] );
				}
			}
		}

		for ( $i = 0; $i < $depth; $i ++ ) {
			if ( $i > 0 ) {
				echo '  <div class="button button-primary right uf-epico-removeRow" style="margin:5px 5px 0;">' . __( 'Remove', 'uf-epico' ) . '</div>';
			}
			echo "<div class=\"form-table rowGroup groupitems\" id=\"groupitems\" ref=\"items\">\r\n";
			foreach ( $group['fields'] as $field => $settings ) {

				$id      = self::get_field_id( 'field_' . $field ) . '_' . $i;
				$groupid = $group['id'];
				$name    = self::get_field_name( $field );
				$single  = true;
				$value   = $settings['default'];
				if ( ! empty( $group['multiple'] ) ) {
					$name = self::get_field_name( $field ) . '[' . $i . ']';
					if ( isset( $instance[ $field ][ $i ] ) ) {
						$value = $instance[ $field ][ $i ];
					}
				} else {
					if ( isset( $instance[ $field ] ) ) {
						$value = $instance[ $field ];
					}
				}
				$label = ( ! empty( $settings['caption'] ) ? $settings['caption'] : $settings['label'] );

				echo '<div class="uf-epico-field-row"><p><label class="uf-epico_widget_label" for="' . $id . '">' . $label . '</p></label>';
				include self::get_path( dirname( __DIR__ ) ) . 'includes/fields/field-' . $settings['type'] . '.php';
				echo '</div>';
			}
			echo "</div>\r\n";
		}
		if ( ! empty( $group['multiple'] ) ) {
			echo "<div><button class=\"button uf-epico-add-group-row\" type=\"button\" data-field=\"" . self::get_field_id( 'ref' ) . "\" data-rowtemplate=\"group-" . $group['id'] . "-tmpl\">" . __( 'Add Another', 'uf-epico' ) . "</button></div>\r\n";
		}

		// Coloca o modelo html para os campos repetidos.
		if ( ! empty( $group['multiple'] ) ) {
			echo "<script type=\"text/html\" id=\"group-" . $group['id'] . "-tmpl\">\r\n";
			echo '  <div class="button button-primary right uf-epico-removeRow" style="margin:5px 5px 0;">' . __( 'Remove', 'uf-epico' ) . '</div>';
			echo "	<div class=\"form-table rowGroup groupitems\" id=\"groupitems\" ref=\"items\">\r\n";
			foreach ( $group['fields'] as $field => $settings ) {
				$id      = self::get_field_id( 'field_{{id}}_' . $field );
				$groupid = $group['id'];
				$name    = self::get_field_name( $field );
				$single  = true;
				if ( ! empty( $group['multiple'] ) ) {
					$name = self::get_field_name( $field ) . '[__count__]';
				}
				$label   = $settings['label'];
				$caption = $settings['caption'];
				$value   = $settings['default'];
				echo '<div class="uf-epico-field-row"><p><label class="uf-epico_widget_label" for="' . $id . '">' . $label . '</p></label>';
				include self::get_path( dirname( __DIR__ ) ) . 'includes/fields/field-' . $settings['type'] . '.php';
				echo '</div>';
			}
			echo "	</div>\r\n";
			echo "</script>";
		}
	} // Fim do register_admin_styles

	/**
	 * Registra e embute estilos específicos do admin.
	 *
	 */
	public function register_admin_styles_scripts() {

		wp_enqueue_media();
		wp_enqueue_script( 'media-upload' );

		if ( file_exists( self::get_path( dirname( __DIR__ ) ) . 'configs/fieldgroups-social.php' ) ) {
			include self::get_path( dirname( __DIR__ ) ) . 'configs/fieldgroups-social.php';
		} else {
			return;
		}
		foreach ( $configfiles as $key => $fieldfile ) {
			include $fieldfile;
			if ( ! empty( $group['scripts'] ) ) {
				foreach ( $group['scripts'] as $script ) {
					wp_enqueue_script( 'uf-epico-' . strtok( $script, '.' ), self::get_url( 'assets/js/' . $script, dirname( __DIR__ ) ), array( 'jquery' ) );
				}
			}
			if ( ! empty( $group['styles'] ) ) {
				foreach ( $group['styles'] as $style ) {
					wp_enqueue_style( 'uf-epico-' . strtok( $style, '.' ), self::get_url( 'assets/css/' . $style, dirname( __DIR__ ) ) );
				}
			}
		}

		wp_enqueue_style( 'uf-epico-panel-styles', self::get_url( 'assets/css/panel-min.css', dirname( __DIR__ ) ) );
		wp_enqueue_script( 'uf-epico-panel-script', self::get_url( 'assets/js/panel.js', dirname( __DIR__ ) ), array( 'jquery' ) );

	} // Fim do register_widget_styles

	/**
	 * Obtém a URL atual
	 *
	 */
	static function get_url( $src = null, $path = null ) {
		if ( ! empty( $path ) ) {
			return plugins_url( $src, $path );
		}

		return trailingslashit( plugins_url( $path, __FILE__ ) );
	}

/**
	 * Registra e embute estilos específicos do widget.
	 *
	 */
	public function register_widget_styles() {
		if ( is_active_widget( false, false, $this->id_base, true ) ) {
			$widget_settings = get_option( 'widget_' . $this->id_base );
			$sidebars        = get_option( 'sidebars_widgets' );
			foreach ( $sidebars as $sidebarid => $sidebar ) {
				if ( is_active_sidebar( $sidebarid ) && $sidebarid != 'wp_inactive_widgets' && false === strpos( $sidebarid, 'orphaned_widgets' ) ) {
					foreach ( $widget_settings as $key => $settings ) {
						if ( in_array( $this->id_base . '-' . $key, $sidebar ) ) {
							if ( empty( $element ) ) {
								$element = Uf_Epico::get_instance();
							}
							echo $element->render_element( $settings, '', 'social', true );

						}
					}
				}
			}
		}

	}

} // Fim da classe

add_action( 'widgets_init', create_function( '', 'register_widget("Widget_Epico_Social");' ) );
