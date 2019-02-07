<?php
/**
 *
 * Arquivo de configuração: Botão (Épico Autor)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Button', 'uf-epico' ),
	'id'       => '51013100',
	'master'   => 'button_url',
	'fields'   => array(
		'button_url'  => array(
			'label'   => esc_attr__( 'Button link', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a link to a relevant page about the author or the website.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => 'https://',
		),
		'button_txt'  => array(
			'label'   => esc_attr__( 'Button text', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert a short phrase for the button.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => esc_attr__( 'Read more', 'uf-epico' ),
		),
		'target'      => array(
			'label'   => esc_attr__( 'Link target', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose one of the actions for the button when clicked.', 'uf-epico' ),
			'type'    => 'radio',
			'default' => esc_attr__( '*0||Open in new window,1||Open in the same window', 'uf-epico' ),
		),
	),
	'multiple' => false,
);

