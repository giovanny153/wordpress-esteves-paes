<?php

/*
 * Cria a secao, configuracoes e campos da secao `Avancado`
 */
if ( class_exists( 'Kirki' ) ) {

	// Adiciona a seção `Avancado`
	Kirki::add_section( 'advanced', array(
		'title'      => esc_attr__( 'Advanced', 'epico' ),
		'priority'   => 50,
		'capability' => 'edit_theme_options',
		)
	);

	// CAMPOS

	// Campo de codigo CSS personalizado
	Kirki::add_field( 'epico_config', array(
		'type'        => 'code',
		'settings'    => 'epico_custom_css',
		'label'       => esc_attr__( 'Custom CSS', 'epico' ),
		'description' => esc_attr__( 'Add custom CSS styles if needed.', 'epico' ),
		// 'tooltip'     => esc_attr__( 'These styles will be included in the Head tag in your HTML.', 'epico' ),
		'section'     => 'advanced',
		'default'     => '',
		'priority'    => 10,
		'sanitize_callback' => 'esc_html',
		'choices'     => array(
			'language' => 'css',
			),
		)
	);


	// Campo de codigo JS personalizado
	Kirki::add_field( 'epico_config', array(
		'type'        => 'code',
		'settings'    => 'epico_custom_js_header',
		'label'       => esc_attr__( 'Custom javascript (“head” tag).', 'epico' ),
		'description' => esc_attr__( 'Add custom Javascript here if needed.', 'epico' ),
		'tooltip'     => esc_attr__( 'This Javascript snippet will be included inside the “head” tag in your HTML.', 'epico' ),
		'section'     => 'advanced',
		'default'     => '',
		'priority'    => 20,
		'sanitize_callback' => 'epico_sanitize_js',
		'choices'     => array(
			'language' => 'js',
			),
		)
	);

	// Campo de codigo JS personalizado
	Kirki::add_field( 'epico_config', array(
		'type'        => 'code',
		'settings'    => 'epico_custom_js',
		'label'       => esc_attr__( 'Custom Javascript (before the closing “body” tag).', 'epico' ),
		'description' => esc_attr__( 'Add custom Javascript here if needed.', 'epico' ),
		'tooltip'     => esc_attr__( 'This Javascript snippet will be included before the end of the “body” tag in your HTML.', 'epico' ),
		'section'     => 'advanced',
		'default'     => '',
		'priority'    => 20,
		'sanitize_callback' => 'epico_sanitize_js',
		'choices'     => array(
			'language' => 'js',
			),
		)
	);

	// Campo para ignorar estilos do Epico em paginas
	Kirki::add_field( 'epico_config', array(
		'type'        => 'select',
		'settings'    => 'epico_page_ids',
		'label'       => esc_attr__( 'Ignore styles in pages', 'epico' ),
		'description' => esc_attr__( 'If you want to remove theme styles from certain pages to avoid conflicts with page builder plugins, select below the pages that should be ignored by the Epico theme.', 'epico' ),
		'tooltip'     => esc_attr__( 'If you use some kind of page builder plugin to create pages, please identify this pages here. This will remove all Epico styles in these pages. This setting works only for pages, not posts.', 'epico' ),
		'section'     => 'advanced',
		'default'     => null,
		'priority'    => 30,
		'multiple'    => 999,
		'choices'     => Kirki_Helper::get_posts(
			array(
				'post_type'      => 'page',
				'orderby'        => 'modified',
				'posts_per_page' => 50
				)
			),
		)
	);

	// Campo para ignorar estilos do Epico em categorias
	Kirki::add_field( 'epico_config', array(
		'type'        => 'select',
		'settings'    => 'epico_category_ids',
		'label'       => esc_attr__( 'Ignore styles in categories', 'epico' ),
		'description' => esc_attr__( 'If you want to remove theme styles from certain categories to avoid conflicts with page builder plugins, select below the categories that should be ignored by the Epico theme.', 'epico' ),
		'tooltip'     => esc_attr__( 'If you use some kind of page builder plugin to create categories, please identify the categories here. This will remove all Epico styles in these categories. This setting works only for categories, not tags.', 'epico' ),
		'section'     => 'advanced',
		'default'     => null,
		'priority'    => 35,
		'multiple'    => 999,
		'choices'     => Kirki_Helper::get_terms(
			array(
				'taxonomy'   => 'category',
				'hide_empty' => true,
				)
			),
		)
	);

	// Campo Google Tag Manager
	Kirki::add_field( 'epico_config', array(
		'type'              => 'text',
		'settings'          => 'epico_gtm',
		'label'             => esc_attr__( 'Google Tag Manager', 'epico' ),
		'description'       => esc_attr__( 'If you want to track user behaviour in your website using the free Google Tag Manager, paste your GTM ID in the field below, in the following format: GTM-AB123CD.', 'epico' ),
		'tooltip'           => esc_attr__( 'The Google Tag Manager is a free tool from Google that allows digital marketing professionals manage their campaigns with more independence from developers, offering powerful tools to track user behaviour in your website.', 'epico' ),
		'section'           => 'advanced',
		'sanitize_callback' => 'sanitize_html_class',
		'default'           => '',
		'priority'          => 40,
		)
	);

	// Campo do Processador de parâmetros UTM
	Kirki::add_field( 'epico_config', array(
		'type'        => 'switch',
		'settings'    => 'epico_utm_processor',
		'label'       => esc_attr__( 'UTM Processor', 'epico' ),
		'tooltip'     => esc_attr__( 'Activate to automatically collect and send UTM parameters present in your URL to your email marketing service. You must also create custom fields in your email marketing service that exactly match the names defined in the fields below (activate first to show the fields).', 'epico' ),
		'section'     => 'advanced',
		'default'     => 0,
		'priority'    => 50,
		)
	);

    // Intro do `Processador de UTMs`
    Kirki::add_field( 'epico_config', array(
        'type'        => 'custom',
        'settings'    => 'epico_utm_processor_header',
        'section'     => 'advanced',
        'default'     => __( '<span class="description customize-control-description">Get more information about your leads based on UTM parameters from links to your content, that you share outside your blog. You can find more information about this feature in your <a target="_blank" rel="noopener noreferrer" href="https://minha.uberfacil.com/wp-login.php?redirect_to=processador_de_utms">client area</a>.</span><p>After activating this option, below you can attribute custom names for the UTM fields if your email marketing service demands. Don\'t use spaces or special characters. Leave blank the fields you don\'t want to use.</p>', 'epico' ),
        'priority'    => 55,
    ) );

    // Serviço de email marketing a ser utilizado
	Kirki::add_field( 'epico_config', array(
		'type'        => 'select',
		'settings'    => 'epico_utm_email_service',
		'label'       => __( 'Select your email marketing service', 'epico' ),
		'section'     => 'advanced',
		'default'     => 'mailchimp',
		'priority'    => 57,
		'multiple'    => 1,
		'choices'     => array(
			'1'  => esc_attr__( 'ActiveCampaign', 'epico' ),
			'2'  => esc_attr__( 'ArpReach', 'epico' ),
			'3'  => esc_attr__( 'Aweber', 'epico' ),
			'4'  => esc_attr__( 'Benchmark', 'epico' ),
			'5'  => esc_attr__( 'Campaign Monitor', 'epico' ),
			'6'  => esc_attr__( 'e-Goi', 'epico' ),
			'7'  => esc_attr__( 'Get Response', 'epico' ),
			'8'  => esc_attr__( 'Google Forms', 'epico' ),
			'9'  => esc_attr__( 'InfusionSoft', 'epico' ),
			'10' => esc_attr__( 'Klick Mail', 'epico' ),
			'11' => esc_attr__( 'Lahar', 'epico' ),
			'12' => esc_attr__( 'Lead Lovers', 'epico' ),
			'13' => esc_attr__( 'MadMimi', 'epico' ),
			'14' => esc_attr__( 'Mail Relay', 'epico' ),
			'15' => esc_attr__( 'MailChimp', 'epico' ),
			'16' => esc_attr__( 'Mailee.Me', 'epico' ),
			'17' => esc_attr__( 'MailPoet', 'epico' ),
			'18' => esc_attr__( 'Mailster', 'epico' ),
			'19' => esc_attr__( 'Mautic', 'epico' ),
			'20' => esc_attr__( 'RD Station', 'epico' ),
			'21' => esc_attr__( 'Sendy', 'epico' ),
			'22' => esc_attr__( 'TrafficWave', 'epico' ),
		),
		'active_callback' => array(
		    array(
		        'setting'  => 'epico_utm_processor',
		        'value'    => 1,
		        'operator' => '==',
		        ),
		    )
		)
	);


	// Campos personalizados para o utm_source
	Kirki::add_field( 'epico_config', array(
		'type'        => 'text',
		'settings'    => 'epico_utm_source',
		'label'       => esc_attr__( 'UTM Source', 'epico' ),
		'tooltip'     => esc_attr__( 'The content of the utm_source parameter. Enter a new custom name if needed or leave at the default. This name must match the value of the custom field created on your email marketing service.', 'epico' ),
		'section'     => 'advanced',
		'default'     => 'utm_source',
		'priority'    => 60,
		'sanitize_callback' => 'sanitize_text_field',
		'active_callback' => array(
		    array(
		        'setting'  => 'epico_utm_processor',
		        'value'    => 1,
		        'operator' => '==',
		        ),
		    )
		)
	);

	// Campo personalizado para o utm_medium
	Kirki::add_field( 'epico_config', array(
		'type'        => 'text',
		'settings'    => 'epico_utm_medium',
		'label'       => esc_attr__( 'UTM Medium', 'epico' ),
		'tooltip'     => esc_attr__( 'The content of the utm_medium parameter. Enter a new custom name if needed or leave at the default. This name must match the value of the custom field created on your email marketing service.', 'epico' ),
		'section'     => 'advanced',
		'default'     => 'utm_medium',
		'priority'    => 70,
		'sanitize_callback' => 'sanitize_text_field',
		'active_callback' => array(
		    array(
		        'setting'  => 'epico_utm_processor',
		        'value'    => 1,
		        'operator' => '==',
		        ),
		    )
		)
	);

	// Campo personalizado para o utm_campaign
	Kirki::add_field( 'epico_config', array(
		'type'        => 'text',
		'settings'    => 'epico_utm_campaign',
		'label'       => esc_attr__( 'UTM Campaign', 'epico' ),
		'tooltip'     => esc_attr__( 'The content of the utm_campaign parameter. Enter a new custom name if needed or leave at the default. This name must match the value of the custom field created on your email marketing service.', 'epico' ),
		'section'     => 'advanced',
		'default'     => 'utm_campaign',
		'priority'    => 80,
		'sanitize_callback' => 'sanitize_text_field',
		'active_callback' => array(
		    array(
		        'setting'  => 'epico_utm_processor',
		        'value'    => 1,
		        'operator' => '==',
		        ),
		    )
		)
	);

	// Campo personalizado para o utm_content
	Kirki::add_field( 'epico_config', array(
		'type'        => 'text',
		'settings'    => 'epico_utm_content',
		'label'       => esc_attr__( 'UTM Content', 'epico' ),
		'tooltip'     => esc_attr__( 'The content of the utm_content parameter. Enter a new custom name if needed or leave at the default. This name must match the value of the custom field created on your email marketing service.', 'epico' ),
		'section'     => 'advanced',
		'default'     => 'utm_content',
		'priority'    => 90,
		'sanitize_callback' => 'sanitize_text_field',
		'active_callback' => array(
		    array(
		        'setting'  => 'epico_utm_processor',
		        'value'    => 1,
		        'operator' => '==',
		        ),
		    )
		)
	);

	// Campo personalizado para o utm_term
	Kirki::add_field( 'epico_config', array(
		'type'        => 'text',
		'settings'    => 'epico_utm_term',
		'label'       => esc_attr__( 'UTM Term', 'epico' ),
		'tooltip'     => esc_attr__( 'The content of the utm_term parameter. Enter a new custom name if needed or leave at the default. This name must match the value of the custom field created on your email marketing service.', 'epico' ),
		'section'     => 'advanced',
		'default'     => 'utm_term',
		'priority'    => 100,
		'sanitize_callback' => 'sanitize_text_field',
		'active_callback' => array(
		    array(
		        'setting'  => 'epico_utm_processor',
		        'value'    => 1,
		        'operator' => '==',
		        ),
		    )
		)
	);

	// Campo personalizado para o campo `initial referrer
	Kirki::add_field( 'epico_config', array(
		'type'        => 'text',
		'settings'    => 'epico_initial_referrer',
		'label'       => esc_attr__( 'Initial referrer', 'epico' ),
		'tooltip'     => esc_attr__( 'The link of the initial referrer. Enter a new custom name if needed or leave at the default. This name must match the value of the custom field created on your email marketing service.', 'epico' ),
		'section'     => 'advanced',
		'default'     => 'initial_referrer',
		'priority'    => 110,
		'sanitize_callback' => 'sanitize_text_field',
		'active_callback' => array(
		    array(
		        'setting'  => 'epico_utm_processor',
		        'value'    => 1,
		        'operator' => '==',
		        ),
		    )
		)
	);

	// Campo personalizado para o campo `last referrer`
	Kirki::add_field( 'epico_config', array(
		'type'        => 'text',
		'settings'    => 'epico_last_referrer',
		'label'       => esc_attr__( 'Last referrer', 'epico' ),
		'tooltip'     => esc_attr__( 'The link of the most recent referrer. Enter a new custom name if needed or leave at the default. This name must match the value of the custom field created on your email marketing service.', 'epico' ),
		'section'     => 'advanced',
		'default'     => 'last_referrer',
		'priority'    => 120,
		'sanitize_callback' => 'sanitize_text_field',
		'active_callback' => array(
		    array(
		        'setting'  => 'epico_utm_processor',
		        'value'    => 1,
		        'operator' => '==',
		        ),
		    )
		)
	);

	// Campo personalizado para o campo `initial landing page`
	Kirki::add_field( 'epico_config', array(
		'type'        => 'text',
		'settings'    => 'epico_initial_landing',
		'label'       => esc_attr__( 'Initial landing page', 'epico' ),
		'tooltip'     => esc_attr__( 'The initial landing page that lead the visitor to your blog. Enter a new custom name if needed or leave at the default. This name must match the value of the custom field created on your email marketing service.', 'epico' ),
		'section'     => 'advanced',
		'default'     => 'initial_landing',
		'sanitize_callback' => 'sanitize_text_field',
		'priority'    => 130,
		'active_callback' => array(
		    array(
		        'setting'  => 'epico_utm_processor',
		        'value'    => 1,
		        'operator' => '==',
		        ),
		    )
		)
	);

	// Campo personalizado para o campo `visits`
	Kirki::add_field( 'epico_config', array(
		'type'        => 'text',
		'settings'    => 'epico_visits',
		'label'       => esc_attr__( 'Visits', 'epico' ),
		'tooltip'     => esc_attr__( 'The number of visits the subscriber had on your page. Enter a new custom name if needed or leave at the default. This name must match the value of the custom field created on your email marketing service.', 'epico' ),
		'section'     => 'advanced',
		'default'     => 'visits',
		'priority'    => 140,
		'sanitize_callback' => 'sanitize_text_field',
		'active_callback' => array(
		    array(
		        'setting'  => 'epico_utm_processor',
		        'value'    => 1,
		        'operator' => '==',
		        ),
		    )
		)
	);

	// Campo personalizado para o campo `affiliate`
	Kirki::add_field( 'epico_config', array(
		'type'        => 'text',
		'settings'    => 'epico_affiliate',
		'label'       => esc_attr__( 'Affiliate', 'epico' ),
		'tooltip'     => esc_attr__( 'The affiliate\'s identification, if presente as a parameter. Enter a new custom name if needed or leave at the default. This name must match the value of the custom field created on your email marketing service.', 'epico' ),
		'section'     => 'advanced',
		'default'     => 'affiliate',
		'priority'    => 150,
		'sanitize_callback' => 'sanitize_text_field',
		'active_callback' => array(
		    array(
		        'setting'  => 'epico_utm_processor',
		        'value'    => 1,
		        'operator' => '==',
		        ),
		    )
		)
	);
}

/**
 * Filtra o código JS personalizado inserido no painel
 * Aparência > Personalizar, na seção Avançado
 *
 * @since  1.10.0
 * @return string
 */
function epico_sanitize_js( $value ) {

	$allowed_html = array(
	    'script' => array(
	        'src' => array(),
	        'async' => array(),
	        'defer' => array(),
	        'type' => array()
	    )
	);

	return esc_html( wp_kses( $value, $allowed_html ) );
}