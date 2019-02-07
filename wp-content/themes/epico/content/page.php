<?php // Variaveis gerais

$compactloop       = get_theme_mod( 'epico_compact_loop', 1 );

$meta_style        = get_theme_mod( 'epico_icon_meta_style', 'icons' );

// Variaveis relativas a comentarios

$comment_threshold = get_theme_mod( 'epico_comment_threshold', 0 );

$comment_ammount   = get_comments_number();

// Variaveis relativas a imagens

$show_featured     = get_post_meta( get_the_ID(), 'epico-show-featured', TRUE );

$feature_thumb     = wp_get_attachment_image_src( get_post_thumbnail_id(), 'epico-tiny' );

$alt_text          = get_the_title();

$social_pages      = get_theme_mod( 'epico_socialpages', 0 );

$exclude_pages = get_theme_mod( 'epico_socialpages_exclude' );

// Define valor padrao da variavel (necessario ao is_post)

! $exclude_pages ? $excluded_pages = '9999999' : $excluded_pages = $exclude_pages;

?>

<article <?php hybrid_attr( 'post' ); ?>>

	<?php include( locate_template( '/inc/schema.php' ) ); // Adiciona codigo Schema.org para o post. ?>

	<?php if ( is_page() ) : // Se estiver visualizando uma pagina. ?>

		<header class="entry-header">

			<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

			<?php if ( 'on' === $show_featured ) : // Se o meta box da area de artigos tiver o valor configurado para `ligado` ?>

				<?php the_post_thumbnail(); ?>

			<?php endif; ?>

			<?php if ( $social_pages == 1 && ! is_page( $excluded_pages ) ) : ?>

				<?php include( locate_template( '/inc/social-buttons.php' ) ); // Adiciona codigo para botoes sociais. ?>

			<?php endif; ?>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-content' ); ?>>

			<?php the_content(); ?>

			<?php wp_link_pages(); ?>

		</div><!-- .entry-content -->

		<?php edit_post_link( __( 'Edit this page', 'epico' ) , '<footer class="entry-footer">', '</footer><!-- .entry-footer -->' ); ?>

	<?php else : // Se estiver visualizando uma listagem de paginas. ?>

		<?php if ( has_post_thumbnail() ) : ?>

			<span>

				<a class="img-hyperlink" href="<?php the_permalink() ?>" title="<?php the_title() ?>">

					<?php echo '<img src="' . esc_url( $feature_thumb[0] ) . '" alt="' . esc_attr( $alt_text ) .'" />'; ?>

				</a>

			</span>

		<?php else : ?>

			<a class="no-img-hyperlink" href="<?php the_permalink() ?>" title="<?php the_title() ?>"></a>

		<?php endif ?>

		<?php if ( 0 == $compactloop ) : // Se a listagem compacta NAO estiver ativada. ?>

			<div class="entry-byline">

				<span class="entry-author"><span><?php is_multi_author() ? the_author_posts_link() : the_author(); ?></span></span>

				<?php include( locate_template( array( 'content/date.php' ) ) ); // Adiciona o codigo para adicao de data - content/date.php. ?>

				<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( '%s', 'epico' ) ) ); ?>

				<?php if ( post_type_supports( get_post_type(), 'comments' ) ) : // Se o tipo de post suporta comentarios ?>

					<?php if ( comments_open() ) : // Se os comentarios estiverem abertos ?>

						<?php if ( $comment_ammount >= $comment_threshold ) : ?>

							<span <?php hybrid_attr( 'comments-link-wrap' ); ?>><?php comments_popup_link( __( 'Comment', 'epico' ),  __( '1 comment', 'epico' ), __( '% comments', 'epico' ) , 'comments-link', '' ); ?></span>

						<?php endif; // Finaliza a comparacao com o limiar de comentarios ?>

					<?php endif; // Finaliza chegagem por comentarios abertos. ?>

				<?php endif; // Finaliza chegagem por suporte a comentarios. ?>

			</div><!-- .entry-byline -->

			<header class="entry-header">

				<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark">', '</a></h2>' ); ?>

			</header><!-- .entry-header -->

			<div <?php hybrid_attr( 'entry-summary' ); ?>>

				<?php the_excerpt(); ?>

			</div><!-- .entry-summary -->

		<?php else : // Se a listagem compacta estiver ativada. ?>

			<?php if ( 'icons' == $meta_style ) : // Se o estilo de metadados do post for `Icone`. ?>

				<div class="entry-byline">

					<?php if ( $comment_ammount >= $comment_threshold ) : ?>

						<span <?php hybrid_attr( 'comments-link-wrap' ); ?>><?php comments_popup_link( '',  '1', '%' , 'comments-link', '' ); ?></span>

					<?php endif; // Finaliza a comparacao com o limiar de comentarios ?>

					<span class="entry-author"><span><?php is_multi_author() ? the_author_posts_link() : the_author(); ?></span></span>

				</div><!-- .entry-byline -->

			<?php endif; ?>

			<header class="entry-header">

				<?php if ( 'text' == $meta_style ) : // Se o estilo de metadados do post for `Texto`. ?>

					<div class="entry-byline-text">

						<?php if ( comments_open() && $comment_ammount >= $comment_threshold ) : ?>

							<span <?php hybrid_attr( 'comments-link-wrap' ); ?>><?php comments_popup_link( '',  '1', '%' , 'comments-link', '' ); ?></span>

						<?php endif; // Finaliza a comparacao com o limiar de comentarios ?>

						<?php if ( is_multi_author() ) : 	?>

							<span class="entry-author"><span><?php is_multi_author() ? the_author_posts_link() : the_author(); ?></span></span>

						<?php endif; ?>

					</div><!-- .entry-byline -->

				<?php endif; ?>

				<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark">', '</a></h2>' ); ?>

			</header><!-- .entry-header -->

			<div <?php hybrid_attr( 'entry-summary' ); ?>>

				<?php the_excerpt(); ?>

			</div><!-- .entry-summary -->

		<?php endif; // Finaliza checagem por ativacao da listagem compacta. ?>

	<?php endif; // Finaliza chegagem por posts unicos. ?>

	<?php if ( ! is_page_template( 'page-landing.php' ) ) {  // Checar se NAO e template de pagina zen ?>

		<?php include( locate_template( '/inc/zen-mode.php' ) ); // Adiciona codigo do modo Zen. ?>

	<?php } ?>

</article><!-- .entry -->