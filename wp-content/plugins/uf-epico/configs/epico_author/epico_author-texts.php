<?php
/**
 *
 * Arquivo de configuração: Textos (Épico Autor)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Texts', 'uf-epico' ),
	'id'       => '235452',
	'master'   => 'title',
	'fields'   => array(
		'title'   => array(
			'label'   => esc_attr__( 'Title', 'uf-epico' ),
			'caption' => esc_attr__( 'Add here your name or another relevant text for the title.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => esc_attr__( 'About the author', 'uf-epico' ),
		),
		'intro_p' => array(
			'label'   => esc_attr__( 'Introductory text', 'uf-epico' ),
			'caption' => esc_attr__( 'A brief text to introduce the author or the website. This field allows the "strong" and "em HTML tags.', 'uf-epico' ),
			'type'    => 'textbox',
			'default' => esc_attr__( 'Add here your introductory text. You can apply the "strong" and "em" tags to the text, if necessary.', 'uf-epico' ),
		),
	),
	'multiple' => false,
);

