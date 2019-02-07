<?php
/**
 * Template Name: Largura total
 * Template Post Type: post, page
 *
 * @package Épico
 * @since   1.0.2
 */
?>
<?php get_header(); // Carrega o template header.php. ?>

	<?php hybrid_get_menu( 'breadcrumbs' ); // Carrega o template menu/breadcrumbs.php. ?>

	<div id="main-container">

		<div class="wrap">

			<main id="content" class="content" role="main" itemprop="mainContentOfPage" itemscope itemtype="https://schema.org/Blog">

				<?php if ( have_posts() ) : // Checa se algum post foi encontrado. ?>

					<?php while ( have_posts() ) : // Inicia o loop para os posts encontrados. ?>

						<?php the_post(); // Carrega o template post data. ?>

						<?php hybrid_get_content_template(); // Carrega um dos templates em content/*.php. ?>

						<?php if ( is_singular() ) : // Se estiver visualizando um post unico ou pagina. ?>

							<?php hybrid_get_sidebar( 'after-content' ); // Mostra a area de widget after-content. ?>

							<?php if ( is_singular( 'post' ) ) : // Se estiver visualizando um post unico. ?>

								<?php $authorbox_switch = get_theme_mod( 'epico_author_box_switch', 1 ); ?>

								<?php if ( $authorbox_switch == 1 ) locate_template( array( 'content/author-box.php' ), true ); // Carrega o template da caixa do autor ?>

								<?php $related_switch = get_theme_mod( 'epico_related_posts_switch', 1 ); ?>

								<?php $related_number = get_theme_mod( 'epico_related_posts_number', 6 ); ?>

								<?php $related        = epico_get_related_posts( get_the_ID(), $related_number ); ?>

								<?php if ( $related->have_posts() && $related_switch == 1 ) : ?>

									<div class="epico-related-posts">

										<h3 class="epico-related-posts-title"><i class="fa fa-plus-square-o" ></i> <?php echo __( "Related posts", "epico" ); ?></h3>

										<ul>
											<?php while( $related->have_posts() ): $related->the_post(); ?>
												<li>
													<?php if ( has_post_thumbnail() ) : ?>

														<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'epico-rel-posts'); ?>

														<div class="wrap-img-relpost">

															<a class="img-hyperlink" href="<?php echo wp_make_link_relative(get_permalink()) ?>" title="<?php the_title() ?>">

																<img src="<?php echo $thumb[0] . '"' . ' alt="' . epico_get_thumbnail_field() . '"' . ' title="' . epico_get_thumbnail_field( 'title' ); ?>" />

															</a>

														</div>

													<?php else : ?>

														<div class="wrap-img-relpost">

															<a class="img-hyperlink rel-default" href="<?php echo wp_make_link_relative(get_permalink()) ?>" title="<?php the_title() ?>">

																<img src="<?php echo get_template_directory_uri() . '/img/icons/rel_post_default.svg"' . ' alt="' . __( "Thumbnail", "epico") . ' title="' . __( "Post image", "epico"); ?>" />

															</a>

														</div>

													<?php endif; ?>

													<?php the_title( '<h4 ' . hybrid_get_attr( 'related-post-title' ) . '><a href="' . wp_make_link_relative(get_permalink()) . '" rel="bookmark" itemprop="url">', '</a></h4>' ); ?>

												</li>

											<?php endwhile; ?>

										</ul>

									</div>

								<?php endif;

								wp_reset_postdata(); ?>

								<?php $navposts_switch = get_theme_mod( 'epico_post_nav_switch', 1 ); ?>

								<?php if ( $navposts_switch == 1 ) locate_template( array( 'content/nav-posts.php' ), true ); // Carrega o template da navegacao de artigos ?>

							<?php endif; // Finaliza a chegagem de posts unicos. ?>

							<?php comments_template( '', true ); // Carrega o template comments.php. ?>

						<?php endif; // Finaliza a chegagem de posts unicos ou paginas. ?>

					<?php endwhile; // Finaliza o loop com os posts encontrados. ?>

				<?php endif; // Finaliza a checagem por posts. ?>

			</main><!-- #content -->

			<?php hybrid_get_sidebar( 'primary' ); // Carrega o template sidebar/primary.php. ?>

		</div><!-- .wrap -->

	</div><!-- #main-conteiner -->

	<?php get_footer(); // Carrega o template footer.php template. ?>