<?php

/*
 * Cria a secao, configuracoes e campos da secao `Sua marca`
 */
if ( class_exists( 'Kirki' ) ) {

	// Adiciona a seção `Sua marca`
	Kirki::add_section( 'branding', array(
		'title'      => esc_attr__( 'Branding', 'epico' ),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		)
	);

	// CAMPOS

	// Nome do blog
	Kirki::add_field( 'epico_config', array(
		'type'        => 'text',
		'settings'    => 'epico_site_name',
		'label'       => esc_attr__( 'Site title', 'epico' ),
		'description' => esc_attr__( 'How you would like to call your blog?', 'epico' ),
		'tooltip'     => esc_attr__( 'Choose the site title for the header of your site.', 'epico' ),
		'section'     => 'branding',
		'default'     => get_bloginfo( 'name' ),
		'priority'    => 1,
		)
	);

	// Imagem do logo
	Kirki::add_field( 'epico_config', array(
		'type'        => 'image',
		'settings'    => 'epico_logo_upload',
		'label'       => esc_attr__( 'Logo', 'epico' ),
		'description' => esc_attr__( 'Add a logo image instead of a title.', 'epico' ),
		'tooltip'     => esc_attr__( 'Tip: to keep your site performance optimized, upload an image file with 400 pixels width (maximum).', 'epico' ),
		'section'     => 'branding',
		'sanitize_callback' => 'wp_kses_post',
		'default'     => '',
		'priority'    => 2,
		)
	);

	// Largura do logo
	Kirki::add_field( 'epico_config', array(
		'type'        => 'slider',
		'settings'    => 'epico_logo_width',
		'label'       => esc_attr__( 'Logo image width', 'epico' ),
		'section'     => 'branding',
		'description' => esc_attr__( 'After the upload, you can fine tune the image width to perfect it in your layout. Width in pixels.', 'epico' ),
		'default'     => 280,
		'priority'    => 3,
		'choices'     => array(
			'min'     => 120,
			'max'     => 400,
			'step'    => 2,
			)
		)
	);
}
