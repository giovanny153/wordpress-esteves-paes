<?php
/**
 * Template para renderizar o Épico Capture (versão shortcode)
 *
 * @package   Uf_Epico
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */

global $wp;

// Obtem a URL parcial da pagina.
$parcial_url = is_home() ? 'homepage' : add_query_arg( array(), $wp->request );

 // Obtem a URL completa.
$full_url = home_url( add_query_arg( array(), $wp->request ) );

// Variavel para redirecionamentos via JS.
$submitted = 'submitted_' . str_replace('-', '_', $custom_id );

echo '<!--[if IE]>
<div'
. ( isset( $custom_id ) ? ' id="cs-' . esc_attr( $custom_id ) . '" ' : '' )
. ' class="capture-wrap uf-wrap ie"><![endif]--><!--[if !IE]><!-->
<div' . ( isset( $custom_id ) ? ' id="cs-' . esc_attr( $custom_id ) . '" ' : '' )
. ' class="capture-wrap uf-wrap sc'
. ( 1 == $atts[ 'full_width' ] ? ' alignfull' : '' )
. '"><!--<![endif]-->';

	echo '<div class="capture uf ' . ( ( 1 == $atts[ 'compact' ] ) ? 'uf-compact' : '' ) . '">';

		echo '<div class="capture-container uf-container">';

			echo '<div class="capture-container uf-container capture-inner">';

				if( 0 == $atts[ 'title_tag' ] ){

					echo '<h4 itemprop="headline"';
				}

				if( 1 == $atts[ 'title_tag' ] ){

					echo '<h3 itemprop="headline"';
				}

				if( 2 == $atts[ 'title_tag' ] ){

					echo '<p itemprop="text"';
				}

				echo ' class="capture-title uf-title ' . ( 1 == $atts[ 'disable_animation' ] ?'fadeinleft':'').'">' . balanceTags( $atts[ 'title' ] );

				if( 0 == $atts[ 'title_tag' ] ){

					echo '</h4>';
				}

				if( 1 == $atts[ 'title_tag' ] ){

					echo '</h3>';
				}

				if( 2 == $atts[ 'title_tag' ] ){

					echo '</p>';
				}

				if( 2 == $atts[ 'compact' ] ) {

					if ( true == $atts[ 'icon_upload' ] ) {

						echo '<p itemprop="text" class="capture-icon uf-icon"><img src="' . esc_url( $atts[ 'icon_upload' ] ) . '" class="icon';

						if ( 1 == $atts[ 'disable_animation' ] ) {

							if ( 1 == $atts[ 'animation' ] ) {

								echo ' fadeindown';
							}

							if ( 2 == $atts[ 'animation' ] ) {

								echo ' fadeinup';
							}

							if ( 3 == $atts[ 'animation' ] ) {

								echo ' fadein';
							}

							if ( 4 == $atts[ 'animation' ] ) {

								echo ' bouncein';
							}

							if ( 5 == $atts[ 'animation' ] ) {

								echo ' shake';
							}

							if ( 6 == $atts[ 'animation' ] ) {

								echo ' swing';
							}

							if ( 7 == $atts[ 'animation' ] ) {

								echo ' rollin';
							}

							if ( 8 == $atts[ 'animation' ] ) {

								echo ' rotatein';
							}

						}

						echo '" /></p>';

					} else {

						echo '<p class="capture-icon uf-icon"><i class="' . esc_attr( $atts[ 'icon' ] );

						if ( 1 == $atts[ 'disable_animation' ] ) {

							if ( 1 == $atts[ 'animation' ] ) {

								echo ' fadeindown';
							}

							if ( 2 == $atts[ 'animation' ] ) {

								echo ' fadeinup';
							}

							if ( 3 == $atts[ 'animation' ] ) {

								echo ' fadein';
							}

							if ( 4 == $atts[ 'animation' ] ) {

								echo ' bouncein';
							}

							if ( 5 == $atts[ 'animation' ] ) {

								echo ' shake';
							}

							if ( 6 == $atts[ 'animation' ] ) {

								echo ' swing';
							}

							if ( 7 == $atts[ 'animation' ] ) {

								echo ' rollin';
							}

							if ( 8 == $atts[ 'animation' ] ) {

								echo ' rotatein';
							}
						}

						echo '"></i></p>';
					}
				}

				echo '<p itemprop="text" class="capture-intro uf-intro ' . ( 1 == $atts[ 'disable_animation' ] ? 'fadeinright' : '' ) . '">' . balanceTags( $atts[ 'intro_p' ] , true );

					if ( 2 == $atts[ 'compact' ] ) {

						echo '<span class="uf-arrow"><svg fill="#00D0CF" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 46.322 60">><polygon' . ( ( 1 == $atts[ 'override' ] ) ? ' fill="' . esc_attr( $atts[ 'arrow_color' ] ) . '"' : '' ) . ' points="33.831,36.839 23.161,0 12.491,36.839 0,36.839 23.161,60 46.322,36.839"/></svg></span>';
					}

				echo '</p></div>';

			echo '</div>';

		echo '<div class="capture capture-form uf ' . ( 1 == $atts[ 'disable_animation' ] ? 'animated' : '' ) . '">';

			echo '<div class="capture-container uf-container ' . ( 1 == $atts[ 'name_field' ] ? 'uf-fields' : 'uf-field' ) . '">';

			if ( ! empty( $atts[ 'notice' ] ) ) {

				echo '<p itemprop="text" class="capture-notice uf-notice' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinleft' : '' ) . ( '1' == $atts[ 'gdpr' ] ? ' uf-gdpr"><label for="' . esc_attr( $custom_id ) . '-gdpr"><i class="fa fa-lg icon-checkbox"></i>' : '">' );

						echo balanceTags( $atts[ 'notice' ], true );

					echo ( '1' == $atts[ 'gdpr' ] ? '</label>' : '' );

				echo '</p>';
			}

			/*=============================================
			=        SERVIÇOS DE EMAIL MARKETING          =
			=============================================*/

			if ( 1 == $atts[ 'email_service' ] ) { // MailChimp.

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="post" action="' . ( isset( $atts[ 'form_action' ] ) ? esc_url( $atts[ 'form_action' ] ) . '&ORIGEM=[' . esc_attr( $custom_id ) . __( ']%20in%20[', 'uf-epico' ) . $parcial_url . ']' : '' ) . '" name="mc-embedded-subscribe-form" ' . ( 1 == $atts[ 'new_window' ] &&  ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) , '>';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="FNAME" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="email" value="" name="EMAIL" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" type="submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" name="subscribe" id="mc-embedded-subscribe">

					</span>';

				echo '</form>';
			}

			if ( 2 == $atts[ 'email_service' ] ) { // AWeber

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="post" accept-charset="iso-8859-1" action="https://www.aweber.com/scripts/addlead.pl" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					echo '<input type="hidden" name="listname" value="' . ( isset( $atts[ 'list_id' ] ) ? esc_attr( $atts[ 'list_id' ] ) : '' ) . '">

					<input type="hidden" name="redirect" value="' . ( isset( $atts[ 'redirect_url' ] ) ? esc_url( $atts[ 'redirect_url' ] ) : '' ) . '">

					<input type="hidden" name="custom Origem" value="' . ( isset( $custom_id ) ? esc_attr( $custom_id ) : 'Épico Capture' ) . '">';

					if ( ! empty( $atts[ 'redirect_subscribed_url' ] ) ) {

						echo '<input type="hidden" name="meta_redirect_onlist" value="' . esc_url( $atts[ 'redirect_subscribed_url' ] ) . '" >';
					}

					echo '<input type="hidden" name="meta_message" value="1">';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="custom gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="name" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="email" value="" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 3 == $atts[ 'email_service' ] ) { // MadMimi

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="post" accept-charset="UTF-8" action="' . ( isset( $atts[ 'form_action' ] ) ? esc_url( $atts[ 'form_action' ] ) : '' ) . '" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="signup[gdpr]" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="signup[first_name]" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" name="signup[email]" type="text" value="" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" type="submit" value="' . ( isset( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '">

					</span>

				</form>';
			}

			if ( 4 == $atts[ 'email_service' ] ) { // Campaign Monitor

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="POST" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					echo '<input type="hidden" name="action" value="cm_api_send">

					<input type="hidden" id="' . ( isset( $custom_id ) ? esc_attr( $custom_id ) . '_wid' : '' ) . '" name="wid" value="">';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="cm-name" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" name="cm-email" type="email" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>
				</form>
				<script>
					(function ($) {
						"use strict";
						$(function () {
							$("#' . ( isset( $custom_id ) ? esc_attr( $custom_id ) . '_wid' : '' ) . '").val($("#' . ( isset( $custom_id ) ? esc_attr( $custom_id ) . '_wid' : '' ) . '").closest("section").prop("id"));
						});
					}(jQuery));
				</script>';
			}

			if ( 5 == $atts[ 'email_service' ] ) { // e-Goi

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="post" enctype="multipart/form-data" action="' . ( isset( $atts[ 'form_action' ] ) ? esc_url( $atts[ 'form_action' ] ) : '' ) . '" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					echo '<input type="hidden" name="lista" value="' . ( isset( $atts[ 'list_id' ] ) ? esc_attr( $atts[ 'list_id' ] ) : '' ) . '">

					<input type="hidden" name="cliente" value="' . esc_attr( $atts[ 'client_number' ] ) . '">

					<input type="hidden" name="lang" id="lang_id" value="br">

					<input type="hidden" name="formid" id="formid" value="' . ( isset( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id' ] ) : '' ) . '">';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="' . ( isset( $atts[ 'name_field_id' ] ) ? esc_attr( $atts[ 'name_field_id' ] ) : '' ) . '" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="email" name="' . ( isset( $atts[ 'email_field' ] ) ? esc_attr( $atts[ 'email_field' ] ) : '' ) . '" easylabel="E-mail" alt="" id="' . ( isset( $atts[ 'email_field' ] ) ? esc_attr( $atts[ 'email_field' ] ) : '' ) . '" value="" easyvalidation="true" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 6 == $atts[ 'email_service' ] ) { // Get Response

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '"  method="post" accept-charset="utf-8" action="https://app.getresponse.com/add_subscriber.html" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="custom_gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="name" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="email" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit" name="submit">

						<input type="hidden" name="campaign_token" value="' . ( isset( $atts[ 'token' ] ) ? esc_attr( $atts[ 'token' ] ) : '' ) . '">

						<input type="hidden" name="thankyou_url" value="' . ( isset( $atts[ 'redirect_url' ] ) ? esc_url( $atts[ 'redirect_url' ] ) : '' ) . '"/>

						' . ( isset( $atts[ 'start_day' ] ) ? '<input type="hidden" name="start_day" value="' . esc_attr( $atts[ 'start_day' ] ) . '"/>' : '' ) . '

					</span>

				</form>';
			}

			if ( 7 == $atts[ 'email_service' ] ) { // Mailee Me

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="post" action="' . ( isset( $atts[ 'form_action' ] ) ? esc_url( $atts[ 'form_action' ] ) : '' ) . '" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					echo '<input name="key" type="hidden" value="' . ( isset( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id' ] ) : '' ) . '">

					<input name="lists[]" type="hidden" value="' . ( isset( $atts[ 'list_id' ] ) ? esc_attr( $atts[ 'list_id' ] ) : '' ) . '">

					<input type="hidden" name="url_ok" value="' . ( isset( $atts[ 'redirect_url' ] ) ? esc_url( $atts[ 'redirect_url' ] ) : '' ) . '">

					<input type="hidden" name="url_error" value="' . ( isset( $atts[ 'redirect_error_url' ] ) ? esc_url( $atts[ 'redirect_error_url' ] ) : '' ) . '">';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="dynamic_attributes[gdpr]" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="name" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="email" value="" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 8 == $atts[ 'email_service' ] ) { // Mail Relay

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="post" enctype="application/x-www-form-urlencoded" action="' . ( isset( $atts[ 'form_action' ] ) ? esc_url( $atts[ 'form_action' ] ) : '' ) . '" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					echo '<input type="hidden" name="name" id="name" value="-" />

					<input type="hidden" name="groups[]" value="' . ( isset( $atts[ 'list_id' ] ) ? esc_attr( $atts[ 'list_id' ] ) : '' ) . '" />';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="f_gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="name" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="email" value="" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<input type="hidden" name="successUrl" value="' . ( isset( $atts[ 'redirect_url' ] ) ? esc_url( $atts[ 'redirect_url' ] ) : '' ) . '" id="successUrl">

					<input type="hidden" name="errorUrl" value="' . ( isset( $atts[ 'redirect_error_url' ] ) ? esc_url( $atts[ 'redirect_error_url' ] ) : '' ) . '" id="errorUrl">

					<input type="hidden" name="confirmationUrl" value="' . ( isset( $atts[ 'redirect_confirm_url' ] ) ? esc_url( $atts[ 'redirect_confirm_url' ] ) : '' ) . '" id="confirmationUrl">

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 9 == $atts[ 'email_service' ] ) { // KlickMail

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="post" action="https://www.klickmail.com.br/api/subscriber/signin.html" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . ' accept-charset="UTF-8">';

					echo '<input type="hidden" name="apikey" value="' . ( isset( $atts[ 'api_key' ] ) ? esc_attr( $atts[ 'api_key' ] ) : '' ) . '" />';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="fields[fieldFirstName]" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="email" value="" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="FormSubmit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 10 == $atts[ 'email_service' ] ) { // Arpreach

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="post" action="' . ( isset( $atts[ 'form_action' ] ) ? esc_url( $atts[ 'form_action' ] ) : '' ) . '" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="first_name" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" id="email_address" name="email_address" value="" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" type="submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '">

					</span>

				</form>';
			}

			if ( 11 == $atts[ 'email_service' ] ) { // Active Campaign

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="post" enctype="multipart/form-data" action="' . ( isset( $atts[ 'form_action' ] ) ? esc_url( $atts[ 'form_action' ] ) . '/proc.php' : '' ) . '" accept-charset="utf-8" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					echo '<input type="hidden" name="u" value="' . ( isset( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id' ] ) : '' ) . '">

					<input type="hidden" name="f" value="' . ( isset( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id' ] ) : '' ) . '">

					<input type="hidden" name="s">

					<input type="hidden" name="c" value="0">

					<input type="hidden" name="m" value="0">

					<input type="hidden" name="act" value="sub">

					<input type="hidden" name="v" value="2">';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="fullname" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="email" name="email" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 12 == $atts[ 'email_service' ] ) { // RD Station

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="POST" action="' . ( isset( $atts[ 'redirect_url' ] ) ? esc_url( $atts[ 'redirect_url' ] ) : $full_url ) . '" ' . ( 1 == $atts[ 'new_window' ] ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="name" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="email" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 13 == $atts[ 'email_service' ] ) { // Lead Lovers

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="post" action="' . ( isset( $atts[ 'webform_id' ] ) ? 'https://paginas.rocks/Pages/Index/' . esc_attr( $atts[ 'webform_id' ] ) : '' ) . '" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>

					<input type="hidden" name="id" value="' . ( isset( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id' ] ) : '' ) . '">

					<input name="pid" type="hidden" value="' . ( isset( $atts[ 'webform_id_alt' ] ) ? esc_attr( $atts[ 'webform_id_alt' ] ) : '' ) . '" />

					<input name="list_id" type="hidden" value="' . ( isset( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id' ] ) : '' ) . '" />

					<input name="provider" type="hidden" value="leadlovers" />';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="name" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="email" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<input type="hidden" name="source" value="' . $full_url . '" />

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __('Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

					<img style="display: none;" src="https://llimages.com/redirect/redirect.aspx?A=V&p=' . ( isset( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id_alt' ] ) : '' ) . '&m=' . ( isset( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id' ] ) : '' ) . '" />

				</form>';
			}

			if ( 14 == $atts[ 'email_service' ] ) { // Sendy

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="POST" action="' . ( isset( $atts[ 'form_action' ] ) ? esc_url( $atts[ 'form_action' ] ) : '' ) . '/subscribe" accept-charset="utf-8" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					echo '<input type="hidden" name="list" value="' . ( isset( $atts[ 'list_id' ] ) ? esc_attr( $atts[ 'list_id' ] ) : '' ) . '">';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="name" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="email" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="sub-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 15 == $atts[ 'email_service' ] ) { // Benchmark

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="POST" action="https://lb.benchmarkemail.com//code/lbform" accept-charset="UTF-8" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					echo '<input type="hidden" name="successurl" value="' . ( isset( $atts[ 'redirect_url' ] ) ? esc_url( $atts[ 'redirect_url' ] ) : '' ) . '" >

					<input type="hidden" name="token" value="' . ( isset( $atts[ 'token' ] ) ? esc_attr( $atts[ 'token' ] ) : '' ) . '">

					<input type="hidden" name="doubleoptin" value="" />';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="fldfirstname" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="fldEmail" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" krydebug="1751" name="submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 16 == $atts[ 'email_service' ] ) { // Mailster

				echo '<form class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" action="' . get_site_url() . '/mailster/subscribe" method="post" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>

						<input name="_action" type="hidden" value="subscribe">

						<input name="_referer" type="hidden" value="' . $full_url . '/">

						<input name="_nonce" type="hidden" value="' . ( ! empty( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id' ] ) : '0' ) . '">

						<input name="formid" type="hidden" value="' . ( ! empty( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id_alt' ] ) : '0' ) . '">';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="firstname" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="email" name="email" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 17 == $atts[ 'email_service' ] ) { // Trafficwave

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" name"="TRWVLCPForm" method="POST" action="https://www.trafficwave.net/cgi-bin/autoresp/inforeq.cgi" accept-charset="UTF-8" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>

					<input type="hidden" name="trwvid" value="' . ( isset( $atts[ 'client_number' ] ) ? esc_attr( $atts[ 'client_number' ] ) : '' ) . '">

					<input type="hidden" name="series" value="' . ( isset( $atts[ 'campaign_id' ] ) ? esc_attr( $atts[ 'campaign_id' ] ) : '' ) . '">

					<input type="hidden" name="subscrLandingURL" value="' . ( isset( $atts[ 'redirect_url' ] ) ? esc_url( $atts[ 'redirect_url' ] ) : '' ) . '" >

					<input type="hidden" name="confirmLandingURL" value="' . ( isset( $atts[ 'redirect_confirm_url' ] ) ? esc_url( $atts[ 'redirect_confirm_url' ] ) : '' ) . '" >';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="da_gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="da_name" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';

					} else {

						echo '<input type="hidden" name="da_name" value="-">';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="da_email" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 18 == $atts[ 'email_service' ] ) { // InfusionSoft

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="POST" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . '>';

					echo '<input type="hidden" name="action" value="is_api_send">

					<input type="hidden" id="' . ( isset( $custom_id ) ? esc_attr( $custom_id ) . '_wid' : '' ) . '" name="wid" value="">';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="is-name" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" name="is-email" type="email" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>
				</form>
				<script>
					(function ($) {
						"use strict";
						$(function () {
							$("#' . ( isset( $custom_id ) ? esc_attr( $custom_id ) . '_wid' : '' ) . '").val($("#' . ( isset( $custom_id ) ? esc_attr( $custom_id ) . '_wid' : '' ) . '").closest("section").prop("id"));
						});
					}(jQuery));
				</script>';
			}

			if ( 19 == $atts[ 'email_service' ] ) { // Google Forms

				echo '<script type="text/javascript">var ' . $submitted . ' = false;</script>

				<iframe id="no-target-' . esc_attr( $custom_id ) . '" name="no-target-' . esc_attr( $custom_id ) . '" style="visibility:hidden;display:none" onload="if(' . $submitted . '){';

					if ( 2 == $atts[ 'new_window' ] ) {

						echo 'window.location=\'' . ( isset( $atts[ 'redirect_url' ] ) ? esc_url( $atts[ 'redirect_url' ] ) : esc_url( $current_url ) ) . '\'';

					} else {

						echo 'window.open(\'' . ( isset( $atts[ 'redirect_url' ] ) ? esc_url( $atts[ 'redirect_url' ] ) : esc_url( $current_url ) ) . '\', \'_blank\' )';
					}

				echo ';}"></iframe>';

				echo '<form id="uf-input-form-' . esc_attr( $custom_id ) . '" ' . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="POST" action="' . ( isset( $atts[ 'form_action' ] ) ? esc_url( $atts[ 'form_action' ] ) : '' ) . '" accept-charset="UTF-8" target="no-target-' . esc_attr( $custom_id ) . '" onsubmit="' . $submitted . '=true;">';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="' . ( isset( $atts[ 'gdpr_field_id' ] ) ? esc_attr( $atts[ 'gdpr_field_id' ] ) : '' ) . '" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="' . ( isset( $atts[ 'name_field_id' ] ) ? esc_attr( $atts[ 'name_field_id' ] ) : '' ) . '" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input id="uf-input-email-' . esc_attr( $custom_id ) . '" class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="email" name="' . ( isset( $atts[ 'email_field' ] ) ? esc_attr( $atts[ 'email_field' ] ) : '' ) . '" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input id="uf-form-submit-' . esc_attr( $custom_id ) . '" class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 20 == $atts[ 'email_service' ] ) { // Mail Poet

				$target = ( 1 == $atts[ 'new_window' ]  && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' );

				if ( 1 == $atts[ 'version' ] ) {

					echo '<script type="text/javascript">var ' . $submitted . ' = false;</script>

					<iframe id="no-target-' . esc_attr( $custom_id ) . '" name="no-target-' . esc_attr( $custom_id ) . '" style="visibility:hidden;display:none" onload="if(' . $submitted . '){';

					if ( 2 == $atts[ 'new_window' ] ) {

						echo 'window.location=\'' . ( isset( $atts[ 'redirect_url' ] ) ? esc_url( $atts[ 'redirect_url' ] ) : esc_url( $current_url ) ) . '\'';

					} else {

						echo 'window.open(\'' . ( isset( $atts[ 'redirect_url' ] ) ? esc_url( $atts[ 'redirect_url' ] ) : esc_url( $current_url ) ) . '\', \'_blank\' )';
					}

					echo ';}"></iframe>';
				}

				echo '<form class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" ' . ( 1 == $atts[ 'version' ] ? 'action="#wysija" onsubmit="' . $submitted . '=true;" target="no-target-' . esc_attr( $custom_id ) . '"' : 'action="' . esc_url( admin_url( 'admin-post.php' ) ) . '" ' . $target ) . ' method="POST" accept-charset="UTF-8">';

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="' . ( 1 == $atts[ 'version' ] ? 'wysija[user][firstname]' : 'first_name' ) . '" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="email" name="' . ( 1 == $atts[ 'version' ] ? 'wysija[user][email]' : 'email' ) . '" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>';

					if ( 1 == $atts[ 'version' ] ) {

						echo '<input type="hidden" name="form_id" value="' . ( isset( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id' ] ) : '' ) . '" />

						<input type="hidden" name="action" value="save" />

						<input type="hidden" name="controller" value="subscribers" />

						<input type="hidden" value="1" name="wysija-page" />

						<input type="hidden" name="wysija[user_list][list_ids]" value="' . ( isset( $atts[ 'list_id' ] ) ? esc_attr( $atts[ 'list_id' ] ) : '' ) . '" />';

					} else {

						if ( '1' == $atts[ 'gdpr' ] ) {

							echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="data[cf_gdpr]" value="">';
						}

						echo '<input type="hidden" name="action" value="mailpoet_form">

						<input type="hidden" name="source" value="' . ( empty( $atts[ 'redirect_url' ] ) ? $full_url : esc_url( $atts[ 'redirect_url' ] ) ) . '">

						<input type="hidden" name="list_id" value="' . ( isset( $atts[ 'list_id' ] ) ? esc_attr( $atts[ 'list_id' ] ) : '' ) . '" />';
					}

					echo '<span class="capture-wrapicon uf-wrapicon">

						<input id="uf-form-submit-' . esc_attr( $custom_id ) . '" class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 21 == $atts[ 'email_service' ] ) { // Mautic

				$form_action = esc_url( $atts[ 'form_action' ] );

				$form_action = rtrim( $form_action, '/' );

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="POST" action="' . $form_action . '/form/submit?formId=' . esc_attr( $atts[ 'webform_id' ] ) . '" accept-charset="UTF-8" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . ' autocomplete="false" role="form">';

					echo '<input type="hidden" name="mauticform[formId]" value="' . ( ! empty( $atts[ 'webform_id' ] ) ? esc_attr( $atts[ 'webform_id' ] ) : '' ) . '" />

					<input type="hidden" name="mauticform[return]" value="" />';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="mauticform[gdpr]" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="mauticform[nome]" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="mauticform[email]" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<input class="uf-mautic" type="text" value="" name="mauticform[email2]">

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>';
			}

			if ( 22 == $atts[ 'email_service' ] ) { // Lahar

				echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="POST" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '" accept-charset="UTF-8" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . ' autocomplete="false" role="form">';

					echo '<input type="hidden" name="action" value="lahar_api_send">

					<input type="hidden" id="' . ( isset( $custom_id ) ? esc_attr( $custom_id ) . '_wid' : '' ) . '" name="wid" value="">

					<input type="hidden" name="nome_formulario" value="' . ( isset( $custom_id ) ? esc_attr( $custom_id ) : '' ) . '" />

					<input type="hidden" name="url_origem" value="' . $full_url . '" />';

					if ( '1' == $atts[ 'gdpr' ] ) {

						echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
					}

					if ( 1 == $atts[ 'name_field' ] ) {

						echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" value="" name="nome_contato" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
					}

					echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="email_contato" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>

					<span class="capture-wrapicon uf-wrapicon">

						<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

					</span>

				</form>
					<script>
						(function ($) {
							"use strict";
							$(function () {
								$("#' . ( isset( $custom_id ) ? esc_attr( $custom_id ) . '_wid' : '' ) . '").val($("#' . ( isset( $custom_id ) ? esc_attr( $custom_id ) . '_wid' : '' ) . '").closest("section").prop("id"));
							});
						}(jQuery));
					</script>';
			}

			if ( 999 == $atts[ 'email_service' ] ) { // Formulario personalizado

				if ( ! empty( $atts[ 'custom_html' ] ) ) {

					$custom_html = $atts[ 'custom_html' ];

					if ( preg_match_all( '/<form (.+?)>/', $custom_html, $matches ) ) {

						foreach ( $matches[1] as $match ) {

							foreach ( wp_kses_hair( $match, array( 'http', 'https' ) ) as $attr ) {

								$form[ $attr['name'] ] = $attr['value'];
							}

							echo '<form ' . ( isset( $custom_id ) ? 'id="' . esc_attr( $custom_id ) . '" ' : '' ) . ' class="uf-form' . ( 1 == $atts[ 'disable_animation' ] ? ' fadeinright' : '' ) . '" method="POST" action="' . $form['action'] . '" accept-charset="UTF-8" ' . ( 1 == $atts[ 'new_window' ] && ! wp_is_mobile() ? 'target="_blank" rel="noopener noreferrer"' : '' ) . ' autocomplete="false" role="form">';

						}
					}

					if ( preg_match_all( '/<input (.+?)>/', $custom_html, $matches ) ) {

						foreach ( $matches[1] as $match ) {

							foreach ( wp_kses_hair( $match, array( 'http', 'https' ) ) as $attr ) {

								$input[ $attr['name'] ] = $attr['value'];
							}

							$name = isset( $input['name'] ) ? $input['name'] : '';

							$type = isset( $input['type'] ) ? $input['type'] : '';

							$class = isset( $input['class'] ) ? $input['class'] : '';

							if ( $type == 'hidden' ) {

								echo '<input type="hidden" value="' . $input['value'] . '" name="' . $input['name'] . '" />';
							}

							if ( '1' == $atts[ 'gdpr' ] ) {

								echo '<input id="' . esc_attr( $custom_id ) . '-gdpr" class="uf-checkbox" type="checkbox" name="gdpr" value="">';
							}

							if ( $type == 'text' && 1 == $atts[ 'name_field' ] && ( stripos( $name, 'name' ) !== false || stripos( $name, 'cmp2' ) !== false || stripos( $class, 'name' ) !== false ) ) {

								echo '<span class="uf-wrapinput uf-input-name"><input class="uf-name ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="text" name="' . $input['name'] . '" placeholder="' . ( isset( $atts[ 'placeholder_name' ] ) ? ' ' . esc_attr( $atts[ 'placeholder_name' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="First Name"><i class="uf-validation-icon"></i></span>';
							}

							if ( ( $type == 'email' || $type == 'text' ) && ( stripos( $name, 'email' ) !== false || stripos( $class, 'email' ) !== false ) ) {

								echo '<span class="uf-wrapinput uf-input-email"><input class="uf-email ' . ( 1 == $atts[ 'disable_animation' ] ? 'pulse' : '' ) . '" type="email" name="' . $input['name'] . '" placeholder="' . ( isset( $atts[ 'placeholder' ] ) ? ' ' . esc_attr( $atts[ 'placeholder' ] ) : '' ) . '"  autocomplete="desligar" aria-required="true" aria-label="Email" spellcheck="false"><i class="uf-validation-icon"></i></span>';
							}
						}
					}

					echo '<span class="capture-wrapicon uf-wrapicon">

							<input class="uf-submit" name="uf-submit" value="' . ( ! empty( $atts[ 'placeholder_submit' ] ) ? esc_attr( $atts[ 'placeholder_submit' ] ) : __( 'Subscribe!', 'uf-epico' ) ) . '" type="submit">

						</span>

					</form>';
				}
			}

			echo '</div>';

		echo '</div>';

	echo '</div>';

echo '</div>';