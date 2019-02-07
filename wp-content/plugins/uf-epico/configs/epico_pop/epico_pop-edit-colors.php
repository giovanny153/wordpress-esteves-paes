<?php
/**
 *
 * Arquivo de configuração: Editar cores (Épico Pop)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Edit colors', 'uf-epico' ),
	'id'       => '13141114711',
	'master'   => 'override',
	'fields'   => array(
		'override'    => array(
			'label'   => esc_attr__( 'Edit widget colors', 'uf-epico' ),
			'caption' => esc_attr__( 'Enable this to allow the default widget colors to be overriden. Then you can define custom values using the options below.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '0||On,*1||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'bkg_color'   => array(
			'label'   => esc_attr__( 'Background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a background color for the widget.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#00B2C2',
		),
		'text_color'  => array(
			'label'   => esc_attr__( 'Main text color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a color for the widget main text.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'icon_color'  => array(
			'label'   => esc_attr__( 'Title icon color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a color for the icon in the title.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'title_bkg_color' => array(
			'label'   => esc_attr__( 'Titles\'s background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a background color for the title.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#009DAB',
		),
		'title_color' => array(
			'label'   => esc_attr__( 'Title\'s text color', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a color for the title\'s text.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'border_bottom_color' => array(
			'label'   => esc_attr__( 'Widget bottom border color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the widget bottom border.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#009DAB',
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

