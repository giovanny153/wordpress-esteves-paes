<?php $date_type = get_theme_mod( 'epico_date_type', 'published' ); ?>

<li <?php hybrid_attr( 'comment' ); ?>>

	<article>

		<header class="comment-meta">

			<?php echo get_avatar( $comment ); ?>

			<cite <?php hybrid_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite><br />

			<?php if ( 'none' !== $date_type ) : // Checagem de exibe a data de publicacao. ?>

				<time <?php hybrid_attr( 'comment-published' ); ?>><?php printf( __( '%s ago', 'epico' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>

			<?php endif; ?>

			<a <?php hybrid_attr( 'comment-permalink' ); ?>><?php _e( 'Permalink', 'epico' ); ?></a>

			<?php edit_comment_link(); ?>

		</header><!-- .comment-meta -->

		<div <?php hybrid_attr( 'comment-content' ); ?>>

			<?php if ( '0' == $comment->comment_approved ) : ?>

				<p class="comment-moderation">

					<?php _e( 'Your comment is awaiting moderation.', 'epico' ); ?>

				</p>

			<?php endif; ?>

			<?php comment_text(); ?>

		</div><!-- .comment-content -->

		<?php hybrid_comment_reply_link(); ?>

	</article>

<?php ?>
