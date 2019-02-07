<?php
/**
 * Template Name: Auxiliar mínima (construtores de página)
 * Template Post Type: post, page
 *
 * @package Épico
 * @since   1.7.16
 */
?>
<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?> class="no-js">

<head>
	<?php wp_head(); // wp_head ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<?php uberfacil_after_body(); // Hook personalizado - utilizado por padrao para o GTM ?>

	<div id="page">

		<div id="main-container">

			<div class="wrap">

				<main id="content" class="content" role="main" itemprop="mainContentOfPage" itemscope itemtype="https://schema.org/Blog">

					<?php if ( have_posts() ) : // Checa se algum post foi encontrado. ?>

						<?php while ( have_posts() ) : // Inicia o loop para os posts encontrados. ?>

							<?php the_post(); // Carrega o template post data. ?>

								<article <?php hybrid_attr( 'post' ); ?>>

										<div <?php hybrid_attr( 'entry-content' ); ?>>

											<?php the_content(); ?>

										</div><!-- .entry-content -->

								</article><!-- .entry -->

						<?php endwhile; // Finaliza o loop com os posts encontrados. ?>

					<?php endif; // Finaliza a checagem por posts. ?>

				</main><!-- #content -->

			</div><!-- .wrap -->

		</div><!-- #main-conteiner -->

	</div><!-- #page -->

	<?php wp_footer(); // Hook do WordPress para carregar estilos e javascript ao fim do HTML. ?>
