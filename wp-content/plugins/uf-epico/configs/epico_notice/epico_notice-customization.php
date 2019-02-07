<?php
/**
 *
 * Arquivo de configuração: Personalizaçao (Épico Aviso)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Customization', 'uf-epico' ),
	'id'       => '51120110',
	'master'   => 'sticky',
	'fields'   => array(
		'widget_id'	=>	array(
			'label'		=> esc_attr__( 'Unique identifier','uf-epico'),
			'caption'	=> esc_attr__( 'Enter an unique identifier for the widget. Use only regular alphabet letters and don\'t use special symbols.','uf-epico'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'',
		),
		'target'      => array(
			'label'   => esc_attr__( 'Link target', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose an action for the button when is clicked.', 'uf-epico' ),
			'type'    => 'radio',
			'default' => esc_attr__( '*0||Open in new window,1||Open in the same window', 'uf-epico' ),
		),
		'sticky' => array(
			'label'   => esc_attr__( 'Sticky box', 'uf-epico' ),
			'caption' => esc_attr__( 'Do you want to fix the box at the top of the site?', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||Yes,*2||No', 'uf-epico' ),
			'inline'  => true,
		),
		'close'  => array(
			'label'   => esc_attr__( 'Close button', 'uf-epico' ),
			'caption' => esc_attr__( 'Do you want a close button in the corner? The notice will reapear after page load. If you want do dismiss it permanently, activate the option bellow.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||Yes,2||No', 'uf-epico' ),
			'inline'  => true,
		),
		'cookie' => array(
			'label'   => esc_attr__( 'Dismiss after close', 'uf-epico' ),
			'caption' => esc_attr__( 'This will add an action to the close button that will dismiss the box even after the page reload. After seven days, the box can appear again for the visitor.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||Yes,*2||No', 'uf-epico' ),
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

