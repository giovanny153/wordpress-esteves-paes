<?php
/**
 *
 * Arquivo de configuração: Ícone (Épico Capture)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Icon or image', 'uf-epico' ),
	'id'       => '1011141128',
	'master'   => 'icon',
	'fields'   => array(
		'icon'        => array(
			'label'   => esc_attr__( 'Default icon', 'uf-epico' ),
			'caption' => esc_attr__( 'You can add an icon next to the main title. Visit minha.uberfacil.com/icones to see all available icons. Just choose an icon and click on it to copy it\'s ID to the clipboard. Next, paste it here.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => 'fa fa-refresh',
		),
		'icon_upload' => array(
			'label'   => esc_attr__( 'Upload a custom icon', 'uf-epico' ),
			'caption' => esc_attr__( 'You can alternatively upload a custom image for your icon. We recommend a small image (maximum width: 200px), to preserve page performance.', 'uf-epico' ),
			'type'    => 'image',
			'default' => '',
		),
		'intro_img'     => array(
			'label'   => esc_attr__( 'Intro image', 'uf-epico' ),
			'caption' => esc_attr__( 'Replace the icon for an aside image to better illustrate the capture\'s intent (maximum width: 390px. Available only in the full page width version).', 'uf-epico' ),
			'type'    => 'image',
			'default' => '',
		),
		'alt_text'    => array(
			'label'   => esc_attr__( 'Image alt text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add an alternative text for your side image.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => 'Image',
		),		
		'bkg_img'     => array(
			'label'   => esc_attr__( 'Widget background image', 'uf-epico' ),
			'caption' => esc_attr__( 'Select a background image for the widget (optional).', 'uf-epico' ),
			'type'    => 'image',
			'default' => '',
		),
		'overlay'     => array(
			'label'   => esc_attr__( 'Overlay effect', 'uf-epico' ),
			'caption' => esc_attr__( 'You can add a color overlay effect to the background image.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'overlay_color' => array(
			'label'   => esc_attr__( 'Overlay color', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a color for the overlay effect.', 'uf-epico' ),
			'type'    => 'colorpicker',
			'default' => '#333333',
		),
		'animation'   => array(
			'label'   => esc_attr__( 'Icon or image animation', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose an animation style that will be applied to the aside image or to the icon.', 'uf-epico' ),
			'type'    => 'radio',
			'default' => esc_attr__( '1||Fade In Down,2||Fade In Up,3||Fade In,4||Bounce In,5||Shake,6||Swing,7||Roll In,*8||Rotate In', 'uf-epico' ),
		),
	),
	'scripts'  => array(
		'image-modal.js',
	),
	'multiple' => false,
);

