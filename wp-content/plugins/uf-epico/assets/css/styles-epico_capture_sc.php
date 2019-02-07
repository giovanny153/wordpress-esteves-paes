<?php
/**
 *
 * Estilos processados do Épico Capture (shortcode)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

if ( 1 == $atts['override'] ) {

	echo '#cs-' . esc_attr( $custom_id ) . '.sc{border:0px;background:' . esc_attr( $atts['bkg_color'] ) . ';border-bottom:10px solid ' . esc_attr( $atts['border_bottom_color'] ) . ';' . ( ( ! empty( $atts['bkg_img'] ) ) ? 'background-position: 50%;' : '' ) . '}#cs-' . esc_attr( $custom_id ) . '.sc .capture:nth-child(2){background:' . esc_attr( $atts['form_bkg_color'] ) . '}	#cs-' . esc_attr( $custom_id ) . '.sc .capture .capture-title{color:' . esc_attr( $atts['title_color'] ) . '}#cs-' . esc_attr( $custom_id ) . '.sc .capture .capture-icon i::before,	#cs-' . esc_attr( $custom_id ) . '.sc .capture-inner .capture-iconinner i::before{color:' . esc_attr( $atts['icon_color'] ) . '}	#cs-' . esc_attr( $custom_id ) . '.sc .capture .capture-intro{color:' . esc_attr( $atts['intro_color'] ) . '}#cs-' . esc_attr( $custom_id ) . '.sc .capture .capture-intro,#cs-' . esc_attr( $custom_id ) . '.sc .capture .capture-intro *{color:' . esc_attr( $atts['intro_color'] ) . '}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-email{background: ' . esc_attr( $atts['email_color'] ) . ';border: 1px solid rgba(0,0,0,0.2);color:' . esc_attr( $atts['email_text_color'] ) . '}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-email:focus{background: ' . esc_attr( $atts['email_color'] ) . ';border: 1px solid rgba(0,0,0,0.2)}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-email::-webkit-input-placeholder {color:' . esc_attr( $atts['email_placeholder_color'] ) . ' !important}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-email:-moz-placeholder{color:' . esc_attr( $atts['email_placeholder_color'] ) . ' !important;opacity:1}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-email::-moz-placeholder{color:' . esc_attr( $atts['email_placeholder_color'] ) . ' !important;opacity:1}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-email:-ms-input-placeholder{color:' . esc_attr( $atts['email_placeholder_color'] ) . ' !important}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-name::-webkit-input-placeholder {color:' . esc_attr( $atts['email_placeholder_color'] ) . ' !important}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-name:-moz-placeholder{color:' . esc_attr( $atts['email_placeholder_color'] ) . ' !important;opacity:1}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-name::-moz-placeholder{color:' . esc_attr( $atts['email_placeholder_color'] ) . ' !important;opacity:1}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-name:-ms-input-placeholder{color:' . esc_attr( $atts['email_placeholder_color'] ) . ' !important}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-submit:hover{background: ' . esc_attr( $atts['button_color_hover'] ) . '}#cs-' . esc_attr( $custom_id ) . '.sc.capture-wrap .capture-form{border-bottom: 0px}#cs-' . esc_attr( $custom_id ) . '.sc .capture form .uf-submit{background: ' . esc_attr( $atts['button_color'] ) . ' !important;color: ' . esc_attr( $atts['button_color_text'] ) . '}#cs-' . esc_attr( $custom_id ) . '.sc .uf-arrow svg polygon{fill:' . esc_attr( $atts['arrow_color'] ) . ' !important}';

	if ( false == $atts['bkg_img'] ) {

		echo '#cs-' . esc_attr( $custom_id ) . ' .capture-inner:last-child{background-color: ' . esc_attr( $atts['bkg_color'] ) . '}';
	}

	if ( '#63d1d0' !== $atts['link_color'] ) {

		echo '#cs-' , esc_attr( $custom_id ) , ' a,#cs-' , esc_attr( $custom_id ) , ' a:hover,#cs-' , esc_attr( $custom_id ) , ' .capture-notice.uf-checkbox:hover input[type="checkbox"] + i:before {color:' , esc_attr( $atts['link_color'] ) , '!important}';
	}
}