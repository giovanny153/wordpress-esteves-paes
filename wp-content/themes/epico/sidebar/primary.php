<?php
/**
 * Template para a barra lateral principal
 *
 * Inclui todo o conteudo da tag <aside> principal
 *
 * @package    Épico
 * @subpackage Sidebar_Primary
 * @since      1.0.0
 */
?>
<?php

$site_layout = get_theme_mod( 'epico_sidebar_layout', 1 );

$site_layout = get_theme_mod( 'epico_sidebar_layout', 1 );

$sidebarClass = '';

if ( $site_layout == 0 && ! is_page_template( 'templates/page-full.php' ) ) {

	$sidebarClass = 'left';

} else if ( $site_layout == 1 && ! is_page_template( 'templates/page-full.php' ) ) {

	$sidebarClass = 'right';
} ?>

		<aside id="sidebar-primary" class="sidebar <?php echo esc_html( $sidebarClass ); ?>">

			<?php if ( is_active_sidebar( 'primary' ) ) : // Se possui widgets na area auxiliar. ?>

				<?php dynamic_sidebar( 'primary' ); // Apresenta a barra lateral primária. ?>

			<?php else : // Se a sidebar não possuir widgets. ?>

				<?php if ( ( is_singular() && ! is_page_template( 'templates/page-full.php' ) && $site_layout != 2 )
					  || ( is_home()    && $site_layout != 2 )
					  || ( is_archive() && $site_layout != 2 )
					  || ( is_search()  && $site_layout != 2 ) ) :  ?>

					<?php the_widget(
						'WP_Widget_Text',
						array(
							'title'  => __( 'Example Widget', 'epico' ),
							'text'   => sprintf( __( '<p>This is just an example widget to show how the Primary sidebar looks by default. To enhance your blog and get better results, install the companion Epico plugin and add here the special blog widgets. You can do this from the %scustomize screen%s, in the WordPress admin.</p>', 'epico' ), current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'customize.php' ) . '" onclick="return !window.open(this.href);">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
							'filter' => true,
						),
						array(
							'before_widget' => '<section class="widget widget_text widget_placeholder">',
							'after_widget'  => '</section>',
							'before_title'  => '<h4 class="widget-title">',
							'after_title'   => '</h4>',
						)
					); ?>

				<?php endif; // Finaliza a checagem por modelo de página ou opçao de largura total. ?>

			<?php endif; // Finaliza a checagem por widgets. ?>

			<?php hybrid_get_sidebar( 'after-primary' ); // Carrega o modelo sidebar/primary.php. ?>

		</aside><!-- #sidebar-primary -->