<?php
/**
 *
 * Estilos processados do Épico Aviso
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

if ( 1 == $atts['override'] ) {

    echo '.uberaviso{background:' . esc_attr( $atts['bkg_color'] ) . ' !important;color:' . esc_attr( $atts['text_color'] ) . ' !important}.uberaviso .' . esc_attr( $custom_id ) . '-button{color:' . esc_attr( $atts['button_text_color'] ) . ' !important;background:' . esc_attr( $atts['button_color'] ) . ' !important}.uberaviso .' . esc_attr( $custom_id ) . '-button:hover{background:' . esc_attr( $atts['button_bkg_color_hover'] ) . ' !important}.uberaviso-close{color:' . esc_attr( $atts['button_color'] ) . ' !important}.uberaviso-close:hover{color:' . esc_attr( $atts['button_bkg_color_hover'] ) . ' !important}';

}
