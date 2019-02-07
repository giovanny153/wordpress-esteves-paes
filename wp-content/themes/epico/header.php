<?php
/**
 * Template de cabecalho para o tema
 *
 * Apresenta a secao <head> ate a tag <header>
 *
 * @package    Épico
 * @subpackage Header
 * @since      1.0.0
 */
?>
<!doctype html>

<html <?php language_attributes( 'html' ); ?> class="no-js">

<head>
	<?php wp_head(); // wp_head ?>
</head>

<body <?php echo ( is_singular( 'post' ) ? body_class() : hybrid_attr( 'body' ) ); ?>>

	<?php uberfacil_after_body(); // Hook personalizado - utilizado por padrao para o GTM ?>

	<div id="page">

	<?php if ( ! is_404() ) :  // Checar se NAO e pagina 404 ?>

		<?php hybrid_get_sidebar( 'top' ); // Mostra a sidebar do topo. ?>

	<?php endif; ?>

		<header <?php hybrid_attr( 'header' ); ?>>

			<div class="wrap">

				<div id="branding">

				<?php // Opcoes do customizador para a area de branding

				$site_name  = get_theme_mod( 'epico_site_name', get_bloginfo( 'name', 'epico' ) );

				$logo_id    = get_theme_mod( 'epico_logo_upload' );

				$logo_width = get_theme_mod( 'epico_logo_width', 280 ); ?>

				<?php if ( $logo_id ) : // Utiliza o logotipo se estiver configurado. Caso contrario, usa o titulo do site. ?>

					<p id="site-title" itemscope itemtype="https://schema.org/Organization">

						<a itemprop="url" href="<?php echo esc_url( home_url() ); ?>" rel="home" title="Homepage">

							<meta itemprop="name" content="<?php echo esc_attr( $site_name ); ?>">

							<img style="width: <?php echo esc_attr( $logo_width ); ?>px" id="logo" itemprop="image logo" src="<?php echo esc_url( $logo_id ); ?>" alt="<?php echo esc_attr( $site_name ); ?>" />

						</a>

					</p>

				<?php else : ?>

					<p id="site-title" itemscope itemtype="https://schema.org/Organization">

						<a itemprop="url" href="<?php echo esc_url( home_url() ); ?>" rel="home" title="Homepage">

							<span itemprop="name"><?php echo esc_attr( $site_name ); ?></span>

						</a>

					</p>

				<?php endif; ?>

				</div><!-- #branding -->

				<div class="nav" id="nav">

					<?php hybrid_get_menu( 'primary' ); // Carrega o template em menu/primary.php. ?>

				<div id="search-wrap">

					<a id="search-toggle" href="#" title="<?php _e( 'Search', 'epico' ); ?>"><span class="search-text"><?php _e( 'Search', 'epico' ); ?></span></a>

					<?php get_search_form(); ?>

				</div>

				</div>

			</div><!-- .wrap -->

		</header><!-- #header -->

			<?php if ( ! is_404() ) :  // Checar se NAO esta na pagina 404 ?>

				<?php hybrid_get_sidebar( 'promo' ); // Mostra sidebar-promo. ?>

			<?php endif; // Fim da opcao para checar pagina 404. ?>
