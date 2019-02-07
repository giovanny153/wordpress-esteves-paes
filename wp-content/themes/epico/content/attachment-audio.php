<?php if ( is_attachment() ) : // Se estiver vendo um anexo unico. ?>

	<article <?php hybrid_attr( 'post' ); ?>>

		<meta itemprop="inLanguage" content="<?php echo get_bloginfo('language'); ?>"/>

		<?php hybrid_attachment(); // Funcao para lidar com anexos que nao sejam imagens. ?>

		<header class="entry-header">

			<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

			<?php include( locate_template( '/inc/social-buttons.php' ) ); // Adiciona codigo para botoes sociais. ?>

		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php the_content(); ?>

			<?php wp_link_pages(); ?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php include( locate_template( 'content/date.php' ) ); // Adiciona o codigo para insercao da data - content/date.php. ?>

			<?php edit_post_link( __( 'Edit this post', 'epico' ) ); ?>

		</footer><!-- .entry-footer -->

	</article><!-- .entry -->

	<div class="attachment-meta">

		<div class="media-info">

			<h3><?php _e( 'Audio Info', 'epico' ); ?></h3>

			<ul>
				<?php hybrid_media_meta( 'artist', array( 'before' => '<li> ' . esc_html__( 'Artist', 'epico' ), 'after' => '</li>' ) ); ?>

				<?php hybrid_media_meta( 'album', array( 'before' => '<li> ' . esc_html__( 'Album', 'epico' ), 'after' => '</li>' ) ); ?>

				<?php hybrid_media_meta( 'year', array( 'before' => '<li> ' . esc_html__( 'Year', 'epico' ), 'after' => '</li>' ) ); ?>

				<?php hybrid_media_meta( 'file_name', array( 'before' => '<li> ' . esc_html__( 'File name', 'epico' ), 'after' => '</li>' ) ); ?>

				<?php hybrid_media_meta( 'file_type', array( 'before' => '<li> ' . esc_html__( 'Type', 'epico' ), 'after' => '</li>' ) ); ?>

				<?php hybrid_media_meta( 'mime_type', array( 'before' => '<li> ' . esc_html__( 'Mime Type', 'epico' ), 'after' => '</li>' ) ); ?>

			</ul>

		</div><!-- .media-info -->

	</div><!-- .attachment-meta -->

<?php else : // Se NAO estiver vendo um anexo unico. ?>

	<article <?php hybrid_attr( 'post' ); ?>>

		<?php if ( has_post_thumbnail() ): ?>

			<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">

				<?php the_post_thumbnail() ?>

			</a>

		<?php endif ?>


		<header class="entry-header">

			<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-summary' ); ?>>

			<?php the_excerpt(); ?>

		</div><!-- .entry-summary -->

	</article><!-- .entry -->

<?php endif; // Finaliza checagem por anexos. ?>