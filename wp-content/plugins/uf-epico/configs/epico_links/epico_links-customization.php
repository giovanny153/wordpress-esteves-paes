<?php
/**
 *
 * Arquivo de configuração: Personalização (Épico Links)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Customization', 'uf-epico' ),
	'id'       => '13783228',
	'master'   => 'target',
	'fields'   => array(
		'widget_id'   => array(
			'label'   => esc_attr__( 'Unique identifier', 'uf-epico' ),
			'caption' => esc_attr__( 'Enter an unique identifier for the widget. Use only regular alphabet letters and don\'t use special symbols.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
		'target'      => array(
			'label'   => esc_attr__( 'Link target', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose one of the actions for the post link when clicked.', 'uf-epico' ),
			'type'    => 'radio',
			'default' => esc_attr__( '0||Open in new window,*1||Open in the same window', 'uf-epico' ),
		),
		'link_bold'   => array(
			'label'   => esc_attr__( 'Font weight', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a font weight for the text', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||Normal,2||Bold', 'uf-epico' ),
			'inline'  => true,
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

