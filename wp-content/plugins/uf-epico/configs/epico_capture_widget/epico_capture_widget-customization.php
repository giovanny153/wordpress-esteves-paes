<?php
/**
 *
 * Arquivo de configuração: Personalização (Épico Capture).
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Customization', 'uf-epico' ),
	'id'       => '1512313',
	'master'   => 'sidebar',
	'fields'   => array(
		'widget_id'   => array(
			'label'   => esc_attr__( 'Unique identifier', 'uf-epico' ),
			'caption' => esc_attr__( 'Enter an unique identifier for the widget. Use only regular alphabet letters and don\'t use special symbols.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
		'sidebar'     => array(
			'label'   => esc_attr__( 'Span page width', 'uf-epico' ),
			'caption' => esc_attr__( 'You can use the widget in the sidebar or spanning the whole width of your layout, if your theme allows.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||Full page width,*2||Sidebar', 'uf-epico' ),
			'inline'  => true,
		),
		'sticky'      => array(
			'label'   => esc_attr__( 'Fixed on scroll', 'uf-epico' ),
			'caption' => esc_attr__( '(Note: this option is effective only for the widget area after the main sidebar). The widget can stay fixed as you scroll down or scroll normally with the content. To make the fixed option work, activate above the option (Sidebar).', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||Fixed postion,*2||Scroll normally', 'uf-epico' ),
			'inline'  => true,
		),
		'innerpages'  => array(
			'label'   => esc_attr__( 'Short version', 'uf-epico' ),
			'caption' => esc_attr__( 'You can display a short version of the widget, containing just the subscription form.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||Short version,*2||Default version', 'uf-epico' ),
			'inline'  => true,
		),
		'alsohome'    => array(
			'label'   => esc_attr__( 'Short version placement', 'uf-epico' ),
			'caption' => esc_attr__( 'Here you can choose where to apply the short version (turn on the short version first, right above).', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||All pages,*2||Just inner pages', 'uf-epico' ),
			'inline'  => true,
		),
		'close_btn'   => array(
			'label'   => esc_attr__( 'Close button', 'uf-epico' ),
			'caption' => esc_attr__( 'Would you like a close button in the right top corner of the widget? (Sidebar version only)', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||Add close button,2||Omit close button', 'uf-epico' ),
			'inline'  => true,
		),
		'show_arrow'   => array(
			'label'   => esc_attr__( 'Display arrow', 'uf-epico' ),
			'caption' => esc_attr__( 'Add an arrow icon below the introduction text pointing to the form (full page width version only).', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||Add arrow,2||Remove arrow', 'uf-epico' ),
			'inline'  => true,
		),
		'new_window'  => array(
			'label'   => esc_attr__( 'Open in new window', 'uf-epico' ),
			'caption' => esc_attr__( 'Would you like to open a new window after the visitor clicks the submit button?', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||New window,2||Same window', 'uf-epico' ),
			'inline'  => true,
		),
		'disable_animation' => array(
			'label'   => esc_attr__( 'Animations', 'uf-epico' ),
			'caption' => esc_attr__( 'You can disable all animations if necessary.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||Animations On,2||Animations Off', 'uf-epico' ),
			'inline'  => true,
		),
	),
	'styles'   => array(
		'toggles.css',

	),
	'scripts'  => array(
		'toggles-min.js',
		'image-modal.js',
		'colorpicker.js',
	),
	'multiple' => false,
);

