<?php
/**
 *
 * Arquivo de configuração: Editar cores (Épico Social)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Edit colors', 'uf-epico' ),
	'id'       => '15943012876',
	'master'   => 'override',
	'fields'=> array(
		'override'    => array(
			'label'   => esc_attr__( 'Edit widget colors', 'uf-epico' ),
			'caption' => esc_attr__( 'Enable this to allow the default widget colors to be overriden. Then you can define custom values using the options below.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'text_color'  => array(
			'label'   => esc_attr__( 'Text color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a color for the text.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#333333',
		),
		'icon_color'  => array(
			'label'   => esc_attr__( 'Icon color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select the icon\'s color.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'icon_bkg_color' => array(
			'label'   => esc_attr__( 'Icon background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select the icon\'s background color.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#00B2C2',
		),
		'icon_border_color' => array(
			'label'   => esc_attr__( 'Icon border color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select the icon\'s border color.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'bkg_color'   => array(
			'label'   => esc_attr__( 'Widget background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select the widget\'s background color.', 'uf-epico' ),
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

