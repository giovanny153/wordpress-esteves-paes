<?php
/**
 *
 * Arquivo de configuração: Imagem (Épico Autor)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Image', 'uf-epico' ),
	'id'       => '1523167',
	'master'   => 'img_src',
	'fields'   => array(
		'img_src' => array(
			'label'   => esc_attr__( 'Author image upload', 'uf-epico' ),
			'caption' => esc_attr__( 'Upload an image file with 200px x 200px maximum. If your image is bigger than that, you can edit within WordPress itself. (<strong>Edit image</strong> will appear after the upload).', 'uf-epico' ),
			'type'    => 'image',
			'default' => '',
		),
		'img_alt' => array(
			'label'   => esc_attr__( 'Image alt text', 'uf-epico' ),
			'caption' => esc_attr__( 'The IMG tag needs an alternative text, useful for screen readers and search engine optimization.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
	),
	'scripts'  => array(
		'image-modal.js',
	),
	'multiple' => false,
);

