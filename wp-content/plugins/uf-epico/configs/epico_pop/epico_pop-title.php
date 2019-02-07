<?php
/**
 *
 * Arquivo de configuração: Título (Épico Pop)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Title', 'uf-epico' ),
	'id'       => '134108214',
	'master'   => 'title',
	'fields'   => array(
		'title' => array(
			'label'   => esc_attr__( 'Title text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a title for the widget. Leave it blank to ommit it in the frontend.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'Popular posts', 'uf-epico' ),
		),
		'icon'  => array(
			'label'   => esc_attr__( 'Icon', 'uf-epico' ),
			'caption' => esc_attr__( 'You can add an icon next to the main title. Visit minha.uberfacil.com/icones to see all available icons. Just choose an icon and click on it to copy it\'s ID to the clipboard. Next, paste it here.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => 'fa fa-star',
		),
	),
	'multiple' => false,
);

