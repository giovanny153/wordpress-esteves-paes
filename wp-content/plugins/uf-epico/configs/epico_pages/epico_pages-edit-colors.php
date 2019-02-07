<?php
/**
 *
 * Arquivo de configuração: Editar cores (Épico Páginas)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Edit colors', 'uf-epico' ),
	'id'       => '1231311413',
	'master'   => 'override',
	'fields'    => array(
		'override'    => array(
			'label'   => esc_attr__( 'Edit widget colors', 'uf-epico' ),
			'caption' => esc_attr__( 'Enable this to allow the default widget colors to be overriden. Then you can define custom values using the options below.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'bkg_color'   => array(
			'label'   => esc_attr__( 'Background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a background color for the widget.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#00B2C2',
		),
		'bkg_color_hover'   => array(
			'label'   => esc_attr__( 'Background color (hover)', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a background color for the hover state.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#0099a7',
		),
		'text_color' => array(
			'label'   => esc_attr__( 'Text color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a color for the text of the link.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'icon_color' => array(
			'label'   => esc_attr__( 'Icon color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a color for the icon.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
	),
	'styles'   => array(
		'toggles.css',

	),
	'scripts'  => array(
		'toggles-min.js',
		'colorpicker.js',
	),
	'multiple' => false,
);

