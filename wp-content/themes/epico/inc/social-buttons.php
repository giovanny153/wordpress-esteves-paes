<?php

/**
 * Opcoes do customizador para a area de botoes sociais
 *
 * @package		Epico
 * @subpackage	Social buttons
 * @version    1.0.0
 * @since      1.0.0
 *
 */

$social_sticky        = get_theme_mod( 'epico_socialstickybox', 1 );

$social_partial_count = get_theme_mod( 'epico_socialpartialcount', 0 );

$social_close         = get_theme_mod( 'epico_socialclose', 1 );

$social_styles        = get_theme_mod( 'epico_socialstyles', 0 );

$social_facebook      = get_theme_mod( 'epico_socialfacebook', 1 );

$social_twitter       = get_theme_mod( 'epico_socialtwitter', 1 );

$social_linkedin      = get_theme_mod( 'epico_sociallinkedin', 1 );

$social_pinterest     = get_theme_mod( 'epico_socialpinterest', 1 );

$social_whatsapp      = get_theme_mod( 'epico_socialwhatsapp', 1 );

$social_telegram      = get_theme_mod( 'epico_socialtelegram', 1 );

$social_viber         = get_theme_mod( 'epico_socialviber', 1 );

$button_count         =   $social_facebook + $social_twitter + $social_linkedin
						+ $social_pinterest + $social_whatsapp
                        + $social_telegram + $social_viber;

$whatsapp_desktop     = get_theme_mod( 'epico_whatsapp_desktop', 'mobile' );

$telegram_desktop     = get_theme_mod( 'epico_telegram_desktop', 'mobile' );

$detect               = new Epico_Mobile_Detect; // mobile-detect/mobile-detect.php ?>

<div <?php echo ( $social_sticky == 1 ? 'id="social-bar-sticky"' : '' ); ?> class="social-bar">

	<ul class="social-likes social-likes_notext <?php echo ( $social_styles == 0 ? 'social-likes-colorful' : '' ); echo ( $button_count > 5 ? ' social-likes-hide-partial-counters' : '' ); ?>">

		<?php if ( $social_facebook == 1 ) : ?>

			<li class="social-likes__widget social-likes__widget_facebook" title="<?php _e( 'Share on Facebook', 'epico' ); ?>">

				<a data-network="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( esc_url( get_permalink() ) ); ?>" class="social-likes__button social-likes__button_facebook">

					<span class="social-likes__icon social-likes__icon_facebook"></span>

				</a>

			</li>

		<?php endif; ?>

		<?php if ( $social_twitter == 1 ) : ?>

			<li class="social-likes__widget social-likes__widget_twitter" title="<?php _e( 'Share on Twitter', 'epico' ); ?>">

				<a data-network="twitter" href="https://twitter.com/intent/tweet?url=<?php echo urlencode( esc_url( get_permalink() ) ); ?>&text=<?php echo urlencode( get_the_title() ); ?>" class="social-likes__button social-likes__button_twitter">

					<span class="social-likes__icon social-likes__icon_twitter"></span>

				</a>

			</li>

		<?php endif; ?>

		<?php if ( $social_pinterest == 1 ) : ?>

		<?php $thumb_id        = get_post_thumbnail_id();
			  $thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'thumbnail-size', true );
			  $thumb_url       = $thumb_url_array[0]; ?>

			<li class="social-likes__widget social-likes__widget_pinterest" data-media="<?php echo esc_url( $thumb_url ); ?>" title="<?php _e( 'Share on Pinterest', 'epico' ); ?>">

				<a data-network="pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode( esc_url( get_permalink() ) ); ?>&media=<?php echo esc_url( $thumb_url ); ?>&description=<?php echo urlencode( get_the_title() ); ?>" class="social-likes__button social-likes__button_pinterest">

					<span class="social-likes__icon social-likes__icon_pinterest"></span>

				</a>

			</li>

		<?php endif; ?>

		<?php if ( $social_linkedin == 1 ) : ?>

			<li class="social-likes__widget social-likes__widget_linkedin" title="<?php _e( 'Share on LinkedIn', 'epico' ); ?>">

				<a data-network="linkedin" href="https://www.linkedin.com/shareArticle?mini=false&url=<?php echo urlencode( esc_url( get_permalink() ) ); ?>&title=<?php echo urlencode( get_the_title() ); ?>&source=<?php esc_url( get_site_url() ); ?>" class="social-likes__button social-likes__button_linkedin">

					<span class="social-likes__icon social-likes__icon_linkedin"></span>

				</a>

			</li>

		<?php endif; ?>

		<?php if ( $social_whatsapp == 1 && ! $detect->isTablet() && ( $detect->isMobile() || $whatsapp_desktop == 'mobile_desktop' ) ) : ?>

			<li class="social-likes__widget social-likes__widget_whatsapp" title="<?php _e( 'Share via WhatsApp', 'epico' ); ?>">

				<?php if ( $detect->isIphone() || $detect->isAndroidOS() || $detect->isWindowsPhoneOS() ) : ?>

					<a class="social-likes__button social-likes__button_whatsapp" href="whatsapp://send?text=<?php echo urlencode( get_the_title() ) . '%20-%20' .  urlencode( esc_url( get_permalink() ) ); ?>%3Futm_source%3DWhatsApp%26utm_medium%3Dartigo%26utm_campaign%3Dwhatsapp">

				<?php else : ?>

					<a class="social-likes__button social-likes__button_whatsapp" href="https://web.whatsapp.com/send?text=<?php echo urlencode( get_the_title() ) . '%20-%20' .  urlencode( esc_url( get_permalink() ) ); ?>">

				<?php endif; ?>

						<span class="social-likes__icon social-likes__icon_whatsapp"></span>

					</a>
			</li>

		<?php endif; ?>

		<?php if ( $social_telegram == 1 && ! $detect->isTablet() && ( $detect->isMobile() || $telegram_desktop == 'mobile_desktop' ) ) : // Botão do Telegram ?>

			<li class="social-likes__widget social-likes__widget_telegram" title="<?php _e( 'Share via Telegram', 'epico' ); ?>">

				<?php if ( $detect->isIphone() || $detect->isAndroidOS() || $detect->isWindowsPhoneOS() ) : ?>

					<a href="tg://msg_url?url=<?php echo urlencode( esc_url( get_permalink() ) ) . '&text=' . urlencode( get_the_title() ); ?>">

				<?php else : ?>

					<a href="https://t.me/share/url?url=<?php echo urlencode( esc_url( get_permalink() ) ) . '&text=' . urlencode( get_the_title() ); ?>">

				<?php endif; ?>

					<span class="social-likes__button social-likes__button_telegram">
						<span class="social-likes__icon social-likes__icon_telegram"></span>
					</span>
				</a>
			</li>

		<?php endif; ?>

		<?php if ( $social_viber == 1 && $detect->isMobile() && ! $detect->isTablet()) : // Botão do Viber ?>

			<li class="social-likes__widget social-likes__widget_viber" title="<?php _e( 'Share via Viber', 'epico' ); ?>">
				<a href="viber://forward?text=<?php echo urlencode( get_the_title() ) . ' ' . urlencode( esc_url( get_permalink() ) ) . '%3Futm_source%3DViber%26utm_medium%3Dartigo%26utm_campaign%3DViber"'; ?>">
					<span class="social-likes__button social-likes__button_viber">
						<span class="social-likes__icon social-likes__icon_viber"></span>
					</span>
				</a>
			</li>

		<?php endif; ?>

	</ul>

	<?php if ( $social_close == 1 ) : ?>

		<span id="social-close" aria-hidden="true"><i class="fa fa-times-circle fadein"></i></span>

	<?php endif; ?>

</div>
