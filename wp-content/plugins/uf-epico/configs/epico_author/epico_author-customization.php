<?php
/**
 *
 * Arquivo de configuração: Personalização (Épico Autor)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Customization', 'uf-epico' ),
	'id'       => '640901326',
	'master'   => 'override',
	'fields'   => array(
		'widget_id'   => array(
			'label'   => esc_attr__( 'Unique identifier', 'uf-epico' ),
			'caption' => esc_attr__( 'Enter an unique identifier for the widget. Use only regular alphabet letters and don\'t use special symbols.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
		'stripes'     => array(
			'label'   => esc_attr__( 'Stripes effect', 'uf-epico' ),
			'caption' => esc_attr__( 'Add or remove the stripes effect.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||On,2||Off', 'uf-epico' ),
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

