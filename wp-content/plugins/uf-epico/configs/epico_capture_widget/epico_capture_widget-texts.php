<?php
/**
 *
 * Arquivo de configuração: Textos (Épico Capture)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Texts', 'uf-epico' ),
	'id'       => '458101112',
	'master'   => 'title',
	'fields'   => array(
		'title'       => array(
			'label'   => esc_attr__( 'Title', 'uf-epico' ),
			'caption' => esc_attr__( 'Main title for the subscription form. Optimized for 6 words maximum.', 'uf-epico' ),
			'type'    => 'textbox',
			'default' => esc_attr__( 'Focus, impact and creativity', 'uf-epico' ),
		),
		'title_inner' => array(
			'label'   => esc_attr__( "Capture's short version title", "uf-epico" ),
			'caption' => esc_attr__( "Add a text for the title of the Capture's short version. Important! in order to make this work, activate also the Capture's short version in the Customization tab.", "uf-epico" ),
			'type'    => 'textbox',
			'default' => esc_attr__( 'Focus, impact and creativity', 'uf-epico' ),
		),
		'title_tag'   => array(
			'label'   => esc_attr__( 'Title tag', 'uf-epico' ),
			'caption' => esc_attr__( 'Change the header level.', 'uf-epico' ),
			'type'    => 'dropdown',
			'default' => esc_attr__( '*0||Header level 4 (h4),1||Header level 3 (h3),2||Header level 2 (h2),3||Header level 1 (h1),4||Paragraph (p)', 'uf-epico' ),
		),
		'intro_p'     => array(
			'label'   => esc_attr__( 'Intro text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a brief introductory text (not available in the short version of the widget).', 'uf-epico' ),
			'type'    => 'textbox',
			'default' => esc_attr__( 'Enter your e-mail address below to get free blog updates!', 'uf-epico' ),
		),
		'notice'      => array(
			'label'   => esc_attr__( 'Anti-spam notice', 'uf-epico' ),
			'caption' => esc_attr__( 'Text for the anti-spam notice that sits close to the subscription form. Optimized for 10 words maximum.', 'uf-epico' ),
			'type'    => 'textbox',
			'default' => esc_attr__( 'Your e-mail is completely SAFE with us!', 'uf-epico' ),
		),
		'gdpr'	=> array(
			'label'		=> esc_attr__( 'Consent checkbox','uf-epico'),
			'caption'	=> esc_attr__( 'GDPR: activate this option to add an additional checkbox inside the anti-spam notice, useful for enforcing the GDPR law. Note: you must review the anti-spam notice text to explicitly ask for consent. Also, you need to add a new custom field named "gdpr" in your email marketing service to receive the data sent by the Épico Capture widget.','uf-epico'),
			'type'    	=> 'onoff',
			'default'   => esc_attr__( '1||Activate,*2||Deactivate', 'uf-epico' ),
			'inline'  	=> true,
		),
		'placeholder' => array(
			'label'   => esc_attr__( 'Email field text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add here the placeholder text that will show up inside the e-mail field.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'Enter your email', 'uf-epico' ),
		),
		'placeholder_name' => array(
			'label'   => esc_attr__( 'Name field text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add here the placeholder text that will show up inside the name field. Note: you must also activate the name field option in the Email Marketing tab.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'Enter your name', 'uf-epico' ),
		),
		'placeholder_submit' => array(
			'label'   => esc_attr__( 'Button text', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a text for the submit button.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'Subscribe!', 'uf-epico' ),
		),
	),
	'multiple' => false,
);

