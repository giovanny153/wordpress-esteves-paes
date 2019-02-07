<?php
/**
 *
 * Arquivo de configuração: Título (Épico Social)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Title', 'uf-epico' ),
	'id'       => '0141515210',
	'master'   => 'title',
	'fields'   => array(
		'title' => array(
			'label'   => esc_attr__( 'Title', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a title for the widget. Leave it blank to ommit it in the frontend.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'Follow us!', 'uf-epico' ),
		),
	),
	'multiple' => false,
);

