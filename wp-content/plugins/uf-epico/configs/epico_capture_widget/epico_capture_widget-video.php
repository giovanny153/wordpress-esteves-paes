<?php
/**
 *
 * Arquivo de configuração: Editar cores (Épico Capture)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Video', 'uf-epico' ),
	'id'       => '121521305',
	'master'   => 'video_url',
	'fields'   => array(
		'modal_video'    => array(
			'label'   => esc_attr__( 'Video', 'uf-epico' ),
			'caption' => esc_attr__( "The video will play in a lightbox after clicking the central capture icon. After activating, please configure the options below. Note: this option only works when the \"Default version\" option is activated in the \"Customization\" tab of the widget.", "uf-epico" ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||Activate video,*2||Deactivate video', 'uf-epico' ),
			'inline'  => true,
		),
		'video_url'   => array(
			'label'   => esc_attr__( 'Video URL', 'uf-epico' ),
			'caption' => esc_attr__( 'Full video URL (Youtube or Vimeo only).', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'autoplay'    => array(
			'label'   => esc_attr__( 'Autoplay', 'uf-epico' ),
			'caption' => esc_attr__( 'Autoplay the video after the click.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||On,2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'loop'    => array(
			'label'   => esc_attr__( 'Loop video', 'uf-epico' ),
			'caption' => esc_attr__( 'Continuous play of the video (loop).', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'showinfo'    => array(
			'label'   => esc_attr__( 'Video information', 'uf-epico' ),
			'caption' => esc_attr__( "Display the video information.", "uf-epico" ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||On,2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'video_tooltip'    => array(
			'label'   => esc_attr__( 'Tooltip', 'uf-epico' ),
			'caption' => esc_attr__( "Display a tooltip on mouse hover.", "uf-epico" ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||On,2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'tooltip_fixed'    => array(
			'label'   => esc_attr__( 'Fix tooltip', 'uf-epico' ),
			'caption' => esc_attr__( "Always display the tooltip.", "uf-epico" ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'tooltip_text'    => array(
			'label'   => esc_attr__( 'Tooltip text', 'uf-epico' ),
			'caption' => esc_attr__( "Text for the tooltip.", "uf-epico" ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'Click to open the video', 'uf-epico' ),
		),
		'tooltip_color'    => array(
			'label'   => esc_attr__( 'Tooltip color', 'uf-epico' ),
			'caption' => esc_attr__( "Choose the color for the tooltip.", "uf-epico" ),
			'type'    => 'colorpicker',
			'default' => '#8c979b',
		),
		'youtube_section'    => array(
			'label'   => esc_attr__( 'Youtube', 'uf-epico' ),
			'caption' => esc_attr__( "Youtube exclusive options", "uf-epico" ),
			'type'    => 'paragraph',
			'default' => '',
		),
		'branding'    => array(
			'label'   => esc_attr__( 'Branding', 'uf-epico' ),
			'caption' => esc_attr__( "Remove the Youtube logo in the video control.", "uf-epico" ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'cc_load_policy' => array(
			'label'   => esc_attr__( 'Closed captions', 'uf-epico' ),
			'caption' => esc_attr__( "Display closed captions inside the video.", "uf-epico" ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||On,*2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'fullscreen'    => array(
			'label'   => esc_attr__( 'Fullscreen', 'uf-epico' ),
			'caption' => esc_attr__( 'Fullscreen mode button.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||On,2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'related'    => array(
			'label'   => esc_attr__( 'Related videos', 'uf-epico' ),
			'caption' => esc_attr__( 'Related videos after the video ends.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||On,2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'nocookie'   => array(
			'label'   => esc_attr__( 'Cookie', 'uf-epico' ),
			'caption' => esc_attr__( 'Track with cookie.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||On,2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'controls'    => array(
			'label'   => esc_attr__( 'Controls', 'uf-epico' ),
			'caption' => esc_attr__( 'Video controls.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '*1||On,2||Off', 'uf-epico' ),
			'inline'  => true,
		),
		'videostart'    => array(
			'label'   => esc_attr__( 'Start', 'uf-epico' ),
			'caption' => esc_attr__( "Start playing at (in seconds).", "uf-epico" ),
			'type'    => 'smalltextfield',
			'default' => '0',
		),
		'videoend'    => array(
			'label'   => esc_attr__( 'End', 'uf-epico' ),
			'caption' => esc_attr__( "Stop playing at (in seconds).", "uf-epico" ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
	),
	'styles'   => array(
		'toggles.css',

	),
	'scripts'  => array(
		'toggles-min.js',
		'colorpicker.js',
	),
	'multiple' => false,
);

