<?php
/**
 *
 * Estilos processados do Épico Autor
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

if ( 1 == $atts['override'] ) {

	echo 'h3.' . esc_attr( $custom_id ) . '-title,p.' . esc_attr( $custom_id ) . '-intro{color:' . esc_attr( $atts['text_color'] ) . ' !important}a.' . esc_attr( $custom_id ) . '-button{color:' . esc_attr( $atts['button_text_color'] ) . ' !important;background-color: ' . esc_attr( $atts['button_color'] ) . ' !important}a.' . esc_attr( $custom_id ) . '-button:hover{background: ' . esc_attr( $atts['button_color_hover'] ) . ' !important}section[id*="epico_author"].widget_epico_author-id{background-color: ' . esc_attr( $atts['bkg_color'] ) . ' !important;border-bottom: 10px solid ' . esc_attr( $atts['bkg_color'] ) . ' !important;color: ' . esc_attr( $atts['text_color'] ) . ' !important;background-image:none!important;box-shadow:none!important}';
}

if ( 2 == $atts['stripes'] ) {

	echo '[class*=epc-] #sidebar-primary .widget_epico_author-id:after{background:none!important}';

}