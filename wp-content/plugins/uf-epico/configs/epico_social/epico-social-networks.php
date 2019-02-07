<?php
/**
 *
 * Arquivo de configuração: Redes sociais (Épico Social)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Social networks', 'uf-epico' ),
	'id'       => '91261146',
	'master'   => 'social',
	'fields'   => array(
		'social'      => array(
			'label'   => esc_attr__( 'Social network', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose a social network to include in the widget. You can add more links to social networks clicking "Add another", below.', 'uf-epico' ),
			'type'    => 'dropdown',
			'default' => esc_attr__( '*1||Facebook,2||YouTube,4||Twitter,5||LinkedIn,6||Flickr,7||FourSquare,8||Pinterest,9||Instagram,10||Soundcloud,11||Slideshare,12||Snapchat,13||Twitch,14||RSS,15||Slack', 'uf-epico' ),
		),
		'social_link' => array(
			'label'   => esc_attr__( 'Profile link', 'uf-epico' ),
			'caption' => esc_attr__( 'Add the link to your profile, including the https://', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => esc_attr__( 'https://www.your-social-network.com/MyProfile', 'uf-epico' ),
		),
	),
	'multiple' => true,
);

