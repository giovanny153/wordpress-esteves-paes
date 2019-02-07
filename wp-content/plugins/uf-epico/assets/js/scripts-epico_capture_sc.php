<?php
/**
 *
 * Scripts para o Épico Capture (versão shortcode)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */
?>
(function ($) {
	"use strict";

	$(function () {

		var $captureSc = $('#cs-<?php echo esc_attr( $custom_id ); ?>');

		<?php if ( true == $atts[ 'bkg_img' ] ) { ?>

			function convertHexa(hex,opacity){
				var hex = hex.replace('#','');
				var r = parseInt(hex.substring(0,2), 16);
				var g = parseInt(hex.substring(2,4), 16);
				var b = parseInt(hex.substring(4,6), 16);

				var result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
				return result;
			}

			<?php if(1 == $atts[ 'overlay' ] ) { ?>

			if ( $captureSc.length ) {

				$captureSc.css(
					'background','-webkit-linear-gradient('	+ convertHexa( "<?php echo sanitize_hex_color( $atts['overlay_color'] ); ?>", 80 ) + ',' + convertHexa( "<?php echo sanitize_hex_color( $atts['overlay_color'] ); ?>", 70 ) + '), url(<?php echo $atts['bkg_img']; ?>) 50%'
				).css(
					'background','linear-gradient(' + convertHexa("<?php echo sanitize_hex_color( $atts['overlay_color'] ); ?>", 80) + ',' + convertHexa( "<?php echo sanitize_hex_color( $atts['overlay_color'] ); ?>",70) + '), url(<?php echo esc_url( $atts['bkg_img'] ); ?>) 50%'
				).css(
					'background-size','cover'
				);
			}

			<?php } else { ?>

			if ( $captureSc.length ) {

				$captureSc.css({
					'background' : 'transparent url(<?php echo esc_url( $atts['bkg_img'] ); ?>) 50%',
					'background-size' : 'cover'
				});
			}

			<?php } ?>

		<?php } ?>

	    <?php if ( '1' == $atts[ 'gdpr' ] ) { ?>

	        $( '#cs-<?php echo esc_attr( $custom_id ); ?> .uf-gdpr label' ).click( function() {
	            $( this ).closest('.uf-gdpr').toggleClass( 'checked' );
	        });

	    <?php } ?>
	});
}(jQuery));
