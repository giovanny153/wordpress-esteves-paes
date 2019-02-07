<?php
/**
 *
 * Arquivo de configuração: Personalização (Épico Capture - shortcode)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Customization', 'uf-epico' ),
	'id'       => '01130151',
	'master'   => 'disable_animation',
	'fields'   => array(
		'widget_id'   => array(
			'label'   => esc_attr__( 'Unique identifier', 'uf-epico' ),
			'caption' => esc_attr__( 'Enter an unique identifier for the widget. Use only regular alphabet letters and don\'t use special symbols.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'compact'  => array(
			'label'   => esc_attr__( 'Compact version', 'uf-epico' ),
			'caption' => esc_attr__( 'This will reduce the box size considerably. To compact the box even more, let the text fields empty in the "Texts" tab above.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'full_width'  => array(
			'label'   => esc_attr__( 'Wide version', 'uf-epico' ),
			'caption' => esc_attr__( 'This will fully expand the box to the content\'s width.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'new_window'  => array(
			'label'   => esc_attr__( 'Open in new window', 'uf-epico' ),
			'caption' => esc_attr__( 'Would you like to open a new window after the visitor clicks the submit button?', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||New window,2||Same window', 'uf-epico' ),
			'inline'  => true,
		),
		'disable_animation' => array(
			'label'   => esc_attr__( 'Animations', 'uf-epico' ),
			'caption' => esc_attr__( 'You can disable all animations if necessary.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||Animations On,2||Animations Off', 'uf-epico' ),
			'inline'  => true,
		),
	),
	'styles'   => array(
		'toggles.css',

	),
	'scripts'  => array(
		'toggles-min.js',
		'image-modal.js',
		'colorpicker.js',
	),
	'multiple' => false,
);

