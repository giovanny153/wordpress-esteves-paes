<?php
/**
 *
 * Arquivo de configuração: Personalização (Épico Social)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Customization', 'uf-epico' ),
	'id'       => '1410100146',
	'master'   => 'override',
	'fields'=> array(
		'widget_id'   => array(
			'label'   => esc_attr__( 'Unique identifier', 'uf-epico' ),
			'caption' => esc_attr__( 'Enter an unique identifier for the widget. Use only regular alphabet letters and don\'t use special symbols.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
		'target'   => array(
			'label'   => esc_attr__( 'Link target', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose one of the actions for social network button when clicked.', 'uf-epico' ),
			'type'    => 'radio',
			'default' => esc_attr__( '*0||Open in new window,1||Open in the same window', 'uf-epico' ),
		),
		'alignment'   => array(
			'label'   => esc_attr__( 'Alignment', 'uf-epico' ),
			'caption' => esc_attr__( 'Define an alignment for widget contents (icons and text).', 'uf-epico' ),
			'type'    => 'radio',
			'default' => esc_attr__( '*0||Center,1||Left,2||Right', 'uf-epico' ),
		),
	),
	'styles'   => array(
		'toggles.css',

	),
	'scripts'  => array(
		'toggles-min.js',
	),
	'multiple' => false,
);

