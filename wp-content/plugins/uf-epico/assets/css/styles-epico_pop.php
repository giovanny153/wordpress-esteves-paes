<?php
/**
 *
 * Estilos processados do Épico Pop
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

if ( 0 == $atts['override'] ) {

	echo '#sidebar-primary .widget_epico_pop-id{background-color:' . esc_attr( $atts['bkg_color'] ) . ' !important;color:' . esc_attr( $atts['text_color'] ) . ' !important;border-bottom: 10px solid ' . esc_attr( $atts['border_bottom_color'] ) . ' !important}ul.' . esc_attr( $custom_id ) . '-list a.' . esc_attr( $custom_id ) . '-link{color:' . esc_attr( $atts['text_color'] ) . ' !important}h3.' . esc_attr( $custom_id ) . '-title{background:' . esc_attr( $atts['title_bkg_color'] ) . ' !important;color:' . esc_attr( $atts['title_color'] ) . ' !important}h3.' . esc_attr( $custom_id ) . '-title:before{color:' . esc_attr( $atts['icon_color'] ) . ' !important}ul.' . esc_attr( $custom_id ) . '-list li:before{color:rgba(0, 0, 0, 0.2) !important}ul.' . esc_attr( $custom_id ) . '-list li:hover:before{color:rgba(0, 0, 0, 0.4) !important}';

}