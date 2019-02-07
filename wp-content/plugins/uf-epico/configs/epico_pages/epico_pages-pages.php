<?php
/**
 *
 * Arquivo de configuração: Páginas (Épico Páginas)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Pages', 'uf-epico' ),
	'id'       => '12139311',
	'master'   => 'page_id',
	'fields'   => array(
		'page_id'     => array(
			'label'   => esc_attr__( 'Page selection', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a page to include in the list. You can add more links clicking "Add another", below.', 'uf-epico' ),
			'type'    => 'posttypeselector',
			'default' => 'page',
		),
		'page_title'  => array(
			'label'   => esc_attr__( 'Page title', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a text to the page link.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => esc_attr__( 'My special page', 'uf-epico' ),
		),
		'icon'        => array(
			'label'   => esc_attr__( 'Page icon', 'uf-epico' ),
			'caption' => esc_attr__( 'Select an icon to represent the page. Visit minha.uberfacil.com/icones to see all available icons. Just choose an icon and click on it to copy it\'s ID to the clipboard. Next, paste it here.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => 'fa fa-file-o',
		),
	),
	'multiple' => true,
);

