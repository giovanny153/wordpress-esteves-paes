<?php
/**
 *
 * Arquivo de configuração: Editar cores (Épico Capture - shortcode)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Edit colors', 'uf-epico' ),
	'id'       => '121521305',
	'master'   => 'override',
	'fields'   => array(
		'override'    => array(
			'label'   => esc_attr__( 'Edit widget colors', 'uf-epico' ),
			'caption' => esc_attr__( 'Enable this to allow the default widget colors to be overriden. Then you can define custom values using the options below.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'bkg_color'   => array(
			'label'   => esc_attr__( 'Widget background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a background color for the widget.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'form_bkg_color' => array(
			'label'   => esc_attr__( 'Subscribe form background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a background color for the subscribe form.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#EFF1F1',
		),
		'title_color'  => array(
			'label'   => esc_attr__( 'Title color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the widget title.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#687E87',
		),
		'icon_color'  => array(
			'label'   => esc_attr__( 'Icon color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the icon.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#B3C1C7',
		),
		'arrow_color' => array(
			'label'   => esc_attr__( 'Arrow color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the arrow.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#00C7C0',
		),
		'intro_color' => array(
			'label'   => esc_attr__( 'Intro text color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the introductory text.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#687E87',
		),
		'link_color'  => array(
			'label'   => esc_attr__( 'Link color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for links added to the text fields.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#63d1d0',
		),
		'email_color' => array(
			'label'   => esc_attr__( 'Field background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a background color for the Field.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'email_text_color' => array(
			'label'   => esc_attr__( 'Field text color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the field\'s text.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#687E87',
		),
		'email_placeholder_color' => array(
			'label'   => esc_attr__( 'Field placeholder color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the field\'s placeholder text.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#687E87',
		),
		'button_color' => array(
			'label'   => esc_attr__( 'Submit button background color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a background color for the submit button.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FF613D',
		),
		'button_color_hover' => array(
			'label'   => esc_attr__( 'Submit button background color (hover)', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose background color for the submit button\'s hover state.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FF7657',
		),
		'button_color_text'   => array(
			'label'   => esc_attr__( 'Submit button text color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the submit button\'s text.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#FFFFFF',
		),
		'border_bottom_color' => array(
			'label'   => esc_attr__( 'Widget bottom border color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the widget bottom border.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#B3C1C7',
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

