<?php
/**
 *
 * Arquivo de configuração: Links (Épico Links)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Links', 'uf-epico' ),
	'id'       => '12139311',
	'master'   => 'link_url',
	'fields'   => array(
		'link_url'  => array(
			'label'   => esc_attr__( 'Blog address (URL)', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert an URL for your link.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => 'https://',
		),
		'link_text' => array(
			'label'   => esc_attr__( 'Link text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a text to your link.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => esc_attr__( 'My special link', 'uf-epico' ),
		),
		'icon'      => array(
			'label'   => esc_attr__( 'Link icon', 'uf-epico' ),
			'caption' => esc_attr__( 'Select an icon to represent the link destination. Visit minha.uberfacil.com/icones to see all available icons. Just choose an icon and click on it to copy it\'s ID to the clipboard. Next, paste it here.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => 'fa fa-link',
		),
	),
	'multiple' => true,
);

