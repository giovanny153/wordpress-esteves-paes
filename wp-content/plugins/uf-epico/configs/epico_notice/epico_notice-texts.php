<?php
/**
 *
 * Arquivo de configuração: Textos (Épico Aviso)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Texts', 'uf-epico' ),
	'id'       => '0141515210',
	'master'   => 'text',
	'fields'   => array(
		'text'        => array(
			'label'   => esc_attr__( 'Notice text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a brief text for the notice (10 words is a good limit)', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'We have an important announcement for you!', 'uf-epico' ),
		),
		'button_text' => array(
			'label'   => esc_attr__( 'Button text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add some text for the button located right after the main text. Remove the text to ommit the button from the layout.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'Click here', 'uf-epico' ),
		),
		'button_url'  => array(
			'label'   => esc_attr__( 'Button link', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a link for the button, including the https://', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => 'https://',
		),
	),
	'multiple' => false,
);

