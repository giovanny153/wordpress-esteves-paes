<div class="author-profile vcard" role="contentinfo">

	<h4 class="author-name fn n" itemscope itemtype="http://data-vocabulary.org/Person">

		<?php printf( __( 'About %s', 'epico' ), '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '"><span itemprop="name">' . get_the_author_meta( 'display_name' ) . '</span></a>' ); ?>

	</h4>

	<?php echo get_avatar( get_the_author_meta( 'user_email' ), '96' ); ?>

	<div class="author-description author-bio">

	<?php if ( $description = get_the_author_meta( 'description' ) ) { ?>

		<?php echo wpautop( $description ); ?>

	<?php } else { ?>

		<?php printf( __( '<p>This area is reserved for the author biography and must be edited for each site author. This setting can be found in the %sBiographical Info%s section, in the admin panel. If you wish to include links for the author\'s social networks, we recommend that you install the WordPress SEO plugin. After installed, it will appropriately create fields for each social network in the user administration panel. After filled, they will appear automatically here.</p>', 'epico' ), current_user_can( 'publish_posts' ) ? '<a href="' . admin_url( 'profile.php#email' ) . '" onclick="return !window.open(this.href);">' : '', current_user_can( 'publish_posts' ) ? '</a>' : '' ); ?>

	<?php } ?>

		<p class="social">

			<?php if ( $website = get_the_author_meta( 'user_url' ) ) { ?>
				<a target="_blank" rel="noopener" class="website" itemprop="url" href="<?php echo esc_url( $website ); ?>" title="<?php printf( esc_attr__( '%s’s website', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Website', 'epico' ); ?></a>
			<?php } ?>

			<?php if ( $facebook = get_the_author_meta( 'facebook' ) ) { ?>
				<a target="_blank" rel="noopener" class="facebook" itemprop="url" href="<?php echo esc_url( $facebook ); ?>" title="<?php printf( esc_attr__( '%s on Facebook', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Facebook', 'epico' ); ?></a>
			<?php } ?>

			<?php if ( $instagram = get_the_author_meta( 'instagram' ) ) { ?>
				<a target="_blank" rel="noopener" class="instagram" href="<?php echo esc_url( $instagram ); ?>" title="<?php printf( esc_attr__( '%s on Instagram', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Instagram', 'epico' ); ?></a>
			<?php } ?>

			<?php if ( $youtube = get_the_author_meta( 'youtube' ) ) { ?>
				<a target="_blank" rel="noopener" class="youtube" href="<?php echo esc_url( $youtube ); ?>" title="<?php printf( esc_attr__( '%s on Youtube', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Youtube', 'epico' ); ?></a>
			<?php } ?>

			<?php if ( $twitter = get_the_author_meta( 'twitter' ) ) { ?>
				<a target="_blank" rel="noopener" class="twitter" itemprop="url" href="<?php echo esc_url( "http://twitter.com/{$twitter}" ); ?>" title="<?php printf( esc_attr__( '%s on Twitter', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Twitter', 'epico' ); ?></a>
			<?php } ?>

			<?php if ( $pinterest = get_the_author_meta( 'pinterest' ) ) { ?>
				<a target="_blank" rel="noopener" class="pinterest" href="<?php echo esc_url( $pinterest ); ?>" title="<?php printf( esc_attr__( '%s on Pinterest', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Pinterest', 'epico' ); ?></a>
			<?php } ?>

			<?php if ( $linkedin = get_the_author_meta( 'linkedin' ) ) { ?>
				<a target="_blank" rel="noopener" class="linkedin" href="<?php echo esc_url( $linkedin ); ?>" title="<?php printf( esc_attr__( '%s on Linkedin', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Linkedin', 'epico' ); ?></a>
			<?php } ?>

			<?php if ( $whatsapp = get_the_author_meta( 'whatsapp' ) ) { ?>
				<a target="_blank" rel="noopener" class="whatsapp" href="https://wa.me/<?php echo esc_attr( the_author_meta( 'whatsapp' ) ); ?>" title="<?php printf( esc_attr__( '%s on WhatsApp', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'WhatsApp', 'epico' ); ?></a>
			<?php } ?>

			<?php if ( $telegram = get_the_author_meta( 'telegram' ) ) { ?>
				<a target="_blank" rel="noopener" class="telegram" href="https://t.me/<?php echo esc_attr( the_author_meta( 'telegram' ) ); ?>" title="<?php printf( esc_attr__( '%s on Telegram', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Telegram', 'epico' ); ?></a>
			<?php } ?>

			<?php if ( $viber = get_the_author_meta( 'viber' ) ) { ?>
				<a target="_blank" rel="noopener" class="viber" href="https://viber.me/<?php echo esc_attr( the_author_meta( 'viber' ) ); ?>" title="<?php printf( esc_attr__( '%s on Viber', 'epico' ), get_the_author_meta( 'display_name' ) ); ?>"><?php _e( 'Viber', 'epico' ); ?></a>
			<?php } ?>	

		</p>

	</div>

</div>