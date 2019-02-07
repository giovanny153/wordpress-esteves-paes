<?php // Variaveis

$comment_threshold = get_theme_mod( 'epico_comment_threshold', 0 );

$comment_ammount   = get_comments_number();

$display_tags      = get_theme_mod( 'epico_display_tags', 0 );?>

<article <?php hybrid_attr( 'post' ); ?>>

	<?php include( locate_template( '/inc/schema.php' ) ); // Adiciona codigo Schema.org para o post. ?>

	<?php if ( is_singular( get_post_type() ) ) : // Se estiver visualizando um post unico. ?>

		<header class="entry-header">

			<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

			<div class="entry-byline">

				<?php hybrid_post_format_link(); ?>

				<span <?php hybrid_attr( 'entry-author' ); ?>><span><?php is_multi_author() ? the_author_posts_link() : the_author(); ?></span></span>

				<?php include( locate_template( array( 'content/date.php' ) ) ); // Adiciona o codigo para adicao de data - content/date.php. ?>

				<?php if ( $comment_ammount >= $comment_threshold ) : ?>

					<?php comments_popup_link( __( 'Comment', 'epico' ),  __( '1 comment', 'epico' ), __( '% comments', 'epico' ) , 'comments-link', '' ); ?>

				<?php endif; // Finaliza a comparacao com o limiar de comentarios ?>

				<?php edit_post_link( __( 'Edit this post', 'epico' ) ); ?>

			</div><!-- .entry-byline -->

			<?php include( locate_template( '/inc/social-buttons.php' ) ); // Adiciona codigo para botoes sociais. ?>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-content' ); ?>>

			<?php the_content(); ?>

			<?php wp_link_pages(); ?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( '%s', 'epico' ) ) ); ?>

			<?php if ( 1 == $display_tags && has_tag() ) : // Se as tags existirem ou estiverem sendo apresentadas ?>

				<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( '%s', 'epico' ) ) ); ?>

			<?php endif; ?>

		</footer><!-- .entry-footer -->

	<?php else : // Se estiver visualizando a listagem de artigos. ?>

		<div <?php hybrid_attr( 'entry-content' ); ?>>

			<?php the_content(); ?>

		</div><!-- .entry-content -->

	<?php endif; // Finaliza checagem por posts. ?>

</article><!-- .entry -->