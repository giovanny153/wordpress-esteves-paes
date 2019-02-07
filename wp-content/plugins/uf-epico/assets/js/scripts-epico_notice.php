<?php
/**
 *
 * Scripts para o Épico Aviso
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
	$("body").uberaviso({
		message: "<span class='<?php echo esc_attr( $custom_id ); ?>-text'><?php echo balanceTags( $atts[ 'text' ] ); ?></span> <?php if ( ! empty( $atts['button_text'] ) ) { ?> <a <?php echo( ( 0 == $atts['target'] ) ? "target='_blank' rel='noopener noreferrer'" : '' ) ?> id='<?php echo esc_attr( $custom_id ); ?>' class='<?php echo esc_attr( $custom_id ); ?>-button' href='<?php echo esc_url( $atts['button_url'] ); ?>'><?php echo esc_html( $atts['button_text'] ); ?></a><?php } ?>",
		align: "center",
		close: <?php if ( 1 == $atts['close'] ) { ?>true<?php } ?><?php if ( 2 == $atts['close'] ) { ?>false<?php } ?>,
		closeText: "<i class='fa fa-times-circle'></i>",
		closeAlign: "right",
		remember: <?php if ( 1 == $atts['cookie'] ) { ?>true<?php } ?><?php if ( 2 == $atts['cookie'] ) { ?>false<?php } ?>,
		expireIn: 7,
		cookieName: "<?php echo esc_attr( $custom_id ); ?>-uberaviso",
		colours: false,
		animate: true,
		fixed: <?php if ( 1 == $atts['sticky'] ) { ?>true<?php } ?><?php if ( 2 == $atts['sticky'] ) { ?>false<?php } ?>,
		fixedSpacer: <?php if ( 1 == $atts['sticky'] ) { ?>true<?php } ?><?php if ( 2 == $atts['sticky'] ) { ?>false<?php } ?>,
		zindex: 99999,
	});
});
}(jQuery));