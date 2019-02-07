<?php // Variaveis gerais

$compactloop       = get_theme_mod( 'epico_compact_loop', 1 );

$categories        = get_the_category();

$separator         = ', ';

$output            = '';

$meta_style        = get_theme_mod( 'epico_icon_meta_style', 'icons' );

$display_tags      = get_theme_mod( 'epico_display_tags', 0 );


// Variaveis relativas a comentarios

$comment_threshold = get_theme_mod( 'epico_comment_threshold', 0 );

$comment_ammount   = get_comments_number();


// Variaveis relativas a imagens

$show_featured     = get_post_meta( get_the_ID(), 'epico-show-featured', TRUE );

$featured_bkg      = get_theme_mod( 'epico_post_title_bkg_img', 0 );

$thumb_small       = wp_get_attachment_image_src( get_post_thumbnail_id(), 'epico-small' );

$thumb_medium      = wp_get_attachment_image_src( get_post_thumbnail_id(), 'epico-medium' );

$thumb_large       = wp_get_attachment_image_src( get_post_thumbnail_id(), 'epico-large' );

$thumb_wide        = wp_get_attachment_image_src( get_post_thumbnail_id(), 'epico-wide' );

$alt_text          = get_the_title();


// Variaveis relativas aos botoes de compartilhamento

$social_posts      = get_theme_mod( 'epico_socialposts', 1 );

$social_exclude    = get_theme_mod( 'epico_socialposts_exclude' );


// Define valor padrao da variavel (necessario ao `is_post)

! $social_exclude ? $excluded_posts = '9999999' : $excluded_posts = $social_exclude;

?>

<article <?php hybrid_attr( 'post' ); ?>>

	<?php include( locate_template( '/inc/schema.php' ) ); // Adiciona codigo Schema.org para o post. ?>

	<?php if ( is_singular( get_post_type() ) ) : // Se estiver vendo um post unico. ?>

		<header class="entry-header">

			<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

			<div class="entry-byline">

				<span class="entry-author <?php echo is_multi_author() ? 'multi-author' : '' ; ?>"><span><?php is_multi_author() ? the_author_posts_link() : the_author(); ?></span></span>

				<?php include( locate_template( 'content/date.php' ) ); // Adiciona o codigo para insercao da data - content/date.php. ?>

				<?php if ( $comment_ammount >= $comment_threshold ) : ?>

					<?php comments_popup_link( __( 'Comment', 'epico' ),  __( '1 comment', 'epico' ), __( '% comments', 'epico' ) , 'comments-link', '' ); ?>

				<?php else : ?>

					<?php comments_popup_link( __( 'Comment', 'epico' ),  __( 'Comment', 'epico' ), __( 'Comment', 'epico' ) , 'comments-link', '' ); ?>

				<?php endif; // Finaliza a comparacao com o limiar de comentarios ?>

				<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( '%s', 'epico' ) ) ); ?>

				<?php edit_post_link( __( 'Edit this post', 'epico' ) ); ?>

			</div><!-- .entry-byline -->

			<?php if ( has_post_thumbnail() && 'on' === $show_featured && 0 == $featured_bkg ) : // Se o meta box da area de artigos tiver o valor configurado para `ligado` e a opção de imagem de fundo do título estiver desligada ?>

				<picture>

					<?php echo '<source media="(min-width: 1020px)" srcset="' . esc_url( $thumb_wide[0] ) . '">'; ?>

					<?php echo '<source media="(min-width: 768px)" srcset="' . esc_url( $thumb_large[0] ) . '">'; ?>

					<?php echo '<source media="(min-width: 480px)" srcset="' . esc_url( $thumb_medium[0] ) . '">'; ?>

					<?php echo '<source srcset="' . esc_url( $thumb_small[0] ) . '">'; ?>

					<?php echo '<img class="responsive-img" src="' . esc_url( $thumb_small[0] ) . '" alt="' . esc_attr( $alt_text ) .'">'; ?>

				</picture>

			<?php endif; ?>

			<?php if ( $social_posts == 1 & ! is_attachment() && ! is_single( $excluded_posts ) ) : ?>

				<?php include( locate_template( '/inc/social-buttons.php' ) ); // Adiciona codigo para botoes sociais. ?>

			<?php endif; ?>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-content' ); ?>>

			<?php the_content(); ?>

			<?php wp_link_pages(); ?>

		</div><!-- .entry-content -->

		<?php if ( 1 == $display_tags && has_tag() ) : // Se as tags existirem ou estiverem sendo apresentadas ?>

			<footer class="entry-footer">

				<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'epico' ) ) ); ?>

			</footer><!-- .entry-footer -->

		<?php endif; ?>

	<?php else : // Se estiver visualizado a listagem de artigos (ou seja, se NAO estiver visualizando um post unico). ?>

		<?php if ( has_post_thumbnail() ) : ?>

			<a class="img-hyperlink" href="<?php the_permalink() ?>" title="<?php the_title() ?>">

				<picture>

					<?php echo '<source media="(min-width: 1020px)" srcset="' . esc_url( $thumb_medium[0] ) . '">'; ?>

					<?php echo '<source srcset="' . esc_url( $thumb_small[0] ) . '">'; ?>

					<?php echo '<img src="' . esc_url( $thumb_small[0] ) . '" alt="' . esc_attr( $alt_text ) .'">'; ?>

				</picture>

			</a>

		<?php else : ?>

			<a class="no-img-hyperlink" href="<?php the_permalink() ?>" title="<?php the_title() ?>"></a>

		<?php endif; ?>

		<?php if ( 0 == $compactloop ) : // Se a listagem compacta NAO estiver ativada. ?>

			<div class="entry-byline">

				<?php if ( post_type_supports( get_post_type(), 'comments' ) ) : // Se o tipo de post suporta comentarios ?>

					<?php if ( comments_open() ) : // Se os comentarios estiverem abertos ?>

						<?php if ( $comment_ammount >= $comment_threshold ) : ?>

							<span <?php hybrid_attr( 'comments-link-wrap' ); ?>><?php comments_popup_link( __( 'Comment', 'epico' ),  __( '1 comment', 'epico' ), __( '% comments', 'epico' ) , 'comments-link', '' ); ?></span>

						<?php else : ?>

							<span <?php hybrid_attr( 'comments-link-wrap' ); ?>><?php comments_popup_link( __( 'Comment', 'epico' ),  __( 'Comment', 'epico' ), __( 'Comment', 'epico' ) , 'comments-link', '' ); ?></span>

						<?php endif; // Finaliza a comparacao com o limiar de comentarios ?>

					<?php endif; // Finaliza chegagem por comentarios abertos. ?>

				<?php endif; // Finaliza chegagem por suporte a comentarios. ?>

				<?php if ( $categories ) : ?>

					<?php foreach( array_slice( $categories, 0, 1 ) as $category ) { ?>

						<?php $output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . __( 'Main category:','epico' ) . ' ' . esc_attr( sprintf( __( "%s" ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator; ?>

					<?php } ?>

					<?php echo '<span class="entry-terms category">' . trim( $output, $separator ) . '</span>'; ?>

				<?php endif; ?>

				<span class="entry-author <?php echo is_multi_author() ? 'multi-author' : '' ; ?>"><span><?php is_multi_author() ? the_author_posts_link() : the_author(); ?></span></span>

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

					<?php if ( $categories ) : ?>

						<?php foreach( array_slice( $categories, 0, 1 ) as $category ) { ?>

							<?php $output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . __( 'Main category:','epico' ) . ' ' . esc_attr( sprintf( __( "%s" ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator; ?>

						<?php } ?>

						<?php echo '<span class="entry-terms category">' . trim( $output, $separator ) . '</span>'; ?>

					<?php endif; ?>

					<?php if ( is_multi_author() ) : // Se o blog tiver mais de um autor. ?>

						<span class="entry-author <?php echo is_multi_author() ? 'multi-author' : '' ; ?>"><span><?php the_author_posts_link(); ?></span></span>

					<?php endif; // Finaliza a checagem por multiplos autores. ?>

				</div><!-- .entry-byline -->

			<?php endif; ?>

			<header class="entry-header">

				<?php if ( 'text' == $meta_style ) : // Se o estilo de metadados do post for `Texto`. ?>

					<div class="entry-byline-text">

						<?php if ( comments_open() && $comment_ammount >= $comment_threshold ) : ?>

							<span <?php hybrid_attr( 'comments-link-wrap' ); ?>><?php comments_popup_link( '',  '1', '%' , 'comments-link', '' ); ?></span>

						<?php endif; // Finaliza a comparacao com o limiar de comentarios ?>

						<?php if ( $categories ) : ?>

							<?php foreach( array_slice( $categories, 0, 1 ) as $category ) { ?>

								<?php $output .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . __( 'Main category:','epico' ) . ' ' . esc_attr( sprintf( __( "%s" ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator; ?>

							<?php } ?>

							<?php echo '<span class="entry-terms category">' . trim( $output, $separator ) . '</span>'; ?>

						<?php endif; ?>

						<?php if ( is_multi_author() ) : // Se o blog tiver mais de um autor. ?>

							<span class="entry-author multi-author"><span><?php the_author_posts_link(); ?></span></span>

						<?php endif; // Finaliza a checagem por multiplos autores. ?>

					</div><!-- .entry-byline -->

				<?php endif; ?>

				<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark">', '</a></h2>' ); ?>

			</header><!-- .entry-header -->

			<div <?php hybrid_attr( 'entry-summary' ); ?>>

				<?php the_excerpt(); ?>

			</div><!-- .entry-summary -->

		<?php endif; // Finaliza checagem por ativacao da listagem compacta. ?>

	<?php endif; // Finaliza chegagem por posts unicos e listas de artigos. ?>

	<?php include( locate_template( '/inc/zen-mode.php' ) ); // Adiciona codigo do modo Zen. ?>

</article><!-- .entry -->
