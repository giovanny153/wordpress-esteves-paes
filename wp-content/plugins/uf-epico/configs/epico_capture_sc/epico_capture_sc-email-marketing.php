<?php
/**
 *
 * Arquivo de configuração: Email marketing (Épico Capture - shortcode)
 *
 * @package   Uf_Epico
 * @author    Uberfácil contato@uberfacil.com
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2019 Uberfácil
 */

$group = array(
	'label'    => esc_attr__( 'Email marketing', 'uf-epico' ),
	'id'       => '2146812',
	'master'   => 'email_service',
	'fields'   => array(
		'email_service' => array(   // campo 01
			'label'   => esc_attr__( 'Email marketing service', 'uf-epico' ),
			'caption' => esc_attr__( 'Choose your e-mail marketing service and fill all required fields.', 'uf-epico' ),
			'type'    => 'dropdown',
			'default' => esc_attr__(  '*0||Select an option,1||MailChimp,2||Aweber,3||MadMimi,4||Campaign Monitor,5||e-Goi,6||Get Response,7||Mailee.Me,8||Mail Relay,9||Klick Mail,10||ArpReach,11||ActiveCampaign,12||RD Station,13||Lead Lovers,14||Sendy,15||Benchmark,16||Mailster,17||TrafficWave,18||InfusionSoft,19||Google Forms,20||MailPoet,21||Mautic,22||Lahar,999||Custom integration', 'uf-epico' ),
		),
		'form_action' => array(   // campo 02
			'label'   => esc_attr__( 'HTML Form action', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert your form action.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'list_id' => array(   // campo 03
			'label'   => esc_attr__( 'List ID', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert the unique ID of your list.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
		'group_id' => array(   // campo 04
			'label'   => esc_attr__( 'Group ID', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert the unique ID of your group.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
		'redirect_url' => array(   // campo 05
			'label'   => esc_attr__( 'Redirect URL', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert a custom redirect URL after your form submission.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'redirect_subscribed_url' => array(   // campo 06
			'label'   => esc_attr__( 'Already subscribed Redirect URL', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert a custom redirect URL for already subscribed visitors.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'webform_id'  => array(   // campo 07
			'label'   => esc_attr__( 'Unique ID', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert your unique ID.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
		'client_number' => array(   // campo 08
			'label'   => esc_attr__( 'Client identification', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert your client identification.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
		'email_field' => array(   // campo 09
			'label'   => esc_attr__( 'Email field ID', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert your e-mail field ID.', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
		'token'       => array(   // campo 10
			'label'   => esc_attr__( 'Unique Token', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert your token here.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'redirect_confirm_url' => array(   // campo 11
			'label'   => esc_attr__( 'Subscription confirmed page', 'uf-epico' ),
			'caption' => esc_attr__( 'Custom redirect URL for subscription confirmation.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'webform_id_alt' => array(   // campo 12
			'label'   => esc_attr__( 'Form ID', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert the unique ID of your form.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'tracking_code' => array(   // campo 13
			'label'   => esc_attr__( 'Tracking code', 'uf-epico' ),
			'caption' => esc_attr__( 'Insert the tracking code.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'campaign_id' => array(   // campo 14
			'label'   => esc_attr__( 'Campaign ID', 'uf-epico' ), // TrafficWave
			'caption' => esc_attr__( 'Insert the ID of your campaign.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'instructions'=> array(   // campo 15
			'label'   => esc_attr__( 'Mailster Instructions', 'uf-epico' ),
			'caption' => esc_attr__( 'Please also configure your Mailster form in "Newsletter > Forms" in your WordPress.', 'uf-epico' ),
			'type'    => 'paragraph',
			'default' => '',
		),
		'optin'       => array(   // campo 16
			'label'   => esc_attr__( 'Opt-in mode', 'uf-epico' ),
			'caption' => esc_attr__( 'Selec an opt-in mode.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||Single Opt-in,*2||Double opt-in', 'uf-epico' ),
			'inline'  => true,
		),
		'start_day'   => array(   // campo 17
			'label'   => esc_attr__( 'Start cycle day', 'uf-epico' ),
			'caption' => esc_attr__( 'Day of the autoresponder cycle (optional).', 'uf-epico' ),
			'type'    => 'smalltextfield',
			'default' => '',
		),
		'api_key'     => array(   // campo 18
			'label'   => esc_attr__( 'API Key', 'uf-epico' ),
			'caption' => esc_attr__( 'Your API Key.', 'uf-epico' ),
			'type'    => 'textfield',
			'default' => '',
		),
		'custom_html' => array(   // campo 19
			'label'   => esc_attr__( 'Custom Form code', 'uf-epico' ),
			'caption' => esc_attr__( 'Add a custom HTML Form code here.', 'uf-epico' ),
			'type'    => 'textarea',
			'default' => '',
		),
		'tracking'    => array(   // campo 20
			'label'   => esc_attr__( 'Lead tracking', 'uf-epico' ),
			'caption' => esc_attr__( 'Enable lead navigation tracking on your form. Important! You will also need to add your tracking code on the "Advanced" section of this pannel.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||Activate,*2||Deactivate', 'uf-epico' ),
			'inline'  => true,
		),
		'name_field'  => array(   // campo 21
			'label'   => esc_attr__( 'Name field', 'uf-epico' ),
			'caption' => esc_attr__( '"Name" field.', 'uf-epico' ),
			'type'    => 'onoff',
			'default' => esc_attr__( '1||Enable,*2||Disable', 'uf-epico' ),
			'inline'  => true,
		),
		'name_field_id'  => array(   // campo 22
			'label'     => esc_attr__( 'Name field ID', 'uf-epico' ),
			'caption'	=> esc_attr__( 'Insert below your name field ID.','uf-epico'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'',
		),
		'version'  => array(   // campo 23
			'label'     => esc_attr__( 'Version', 'uf-epico' ),
			'caption'	=> esc_attr__( 'Choose the MailPoet version.','uf-epico'),
			'type'    	=> 'onoff',
			'default' 	=> esc_attr__( '1||Version 2,*2||Version 3', 'uf-epico' ),
			'inline'  	=> true,
		),
		'redirect_error_url'	=>	array(   // campo 24
			'label'		=> esc_attr__( 'Subscription error page','uf-epico'),
			'caption'	=> esc_attr__( 'Insert below a custom redirect URL for subscription error.','uf-epico'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
		'gdpr_field_id'	=> array(   // campo 25
			'label'		=> esc_attr__( 'GDPR field ID','uf-epico'),
			'caption'	=> esc_attr__( 'Insert below the ID for the GDPR field.','uf-epico'),
			'type'		=> 'textfield',
			'default'	=> '',
		),
	),
	'multiple' => false,
);

