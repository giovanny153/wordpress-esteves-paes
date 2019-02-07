<?php
/**
 *
 * Estilos processados do Épico Links
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

if ( 1 == $atts['override'] ) {

	echo 'ul.' . esc_attr( $custom_id ) . '-list li a{background-color:' . esc_attr( $atts['bkg_color'] ) . ' !important;color:' . esc_attr( $atts['text_color'] ) . '!important}ul.' . esc_attr( $custom_id ) . '-list li a:hover{background-color:' . esc_attr( $atts['bkg_color_hover'] ) . ' !important}ul.' . esc_attr( $custom_id ) . '-list li a:before{color: ' . esc_attr( $atts['icon_color'] ) . ' !important}';
}

if ( 2 == $atts['link_bold'] ) {

	echo '#page #sidebar-primary section[class*="epico_links"] li a{font-weight:600}';
}
