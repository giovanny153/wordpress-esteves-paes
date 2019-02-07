<?php
/**
 *
 * Estilos processados do Épico Social
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

if ( 1 == $atts['override'] ) {

	echo '[class*=epc-s] .uf_epicosocial.es-' . esc_attr( $custom_id ) . ' li>a{background:' . esc_attr( $atts['icon_bkg_color'] ) . ';border:1px solid ' . esc_attr( $atts['icon_border_color'] ) . '}[class*=epc-s] .widget_social-id #es-' . esc_attr( $custom_id ) . ' li > a:before{color:' . esc_attr( $atts['icon_color'] ) . '}#es-' . esc_attr( $custom_id ) . '{background:' . esc_attr( $atts['bkg_color'] ) . '}.widget_social-id h3.' . esc_attr( $custom_id ) . '-title{color:' . esc_attr( $atts['text_color'] ) . '}';
}
