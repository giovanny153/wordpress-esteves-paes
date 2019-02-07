<?php

/*
 * Cria a secao, configuracoes e campos da secao `Design e layout`
 */
if ( class_exists( 'Kirki' ) ) {

    // Adiciona a seção `Design e Layout`
    Kirki::add_section( 'design_layout', array(
        'title'      => esc_attr__( 'Design and layout', 'epico' ),
        'priority'   => 20,
        'capability' => 'edit_theme_options',
        )
    );

    // Adiciona a seção `Layout`
    Kirki::add_section( 'layout', array(
        'title'    => esc_attr__( 'Layout', 'epico' ),
        'priority' => 10,
        'section'  => 'design_layout',
        )
    );

    // Adiciona a seção `Typography`
    Kirki::add_section( 'typography', array(
        'title'    => esc_attr__( 'Typography', 'epico' ),
        'priority' => 20,
        'section'  => 'design_layout',
        )
    );

    // Adiciona a seção `Cores`
    Kirki::add_section( 'blog_colors', array(
        'title'    => esc_attr__( 'Colors', 'epico' ),
        'priority' => 30,
        'section'  => 'design_layout',
        )
    );

    // Adiciona a seção `Imagens de fundo`
    Kirki::add_section( 'background_images', array(
        'title'    => esc_attr__( 'Background images', 'epico' ),
        'priority' => 40,
        'section'  => 'design_layout',
        )
    );


    // CAMPOS
    // Intro do painel `Design e Layout`
    Kirki::add_field( 'epico_config', array(
        'type'        => 'custom',
        'settings'    => 'epico_design_layout_header',
        'section'     => 'design_layout',
        'default'     => __( '<div class="epc-tip">Tip: here you will find controls to change your blog’s  global styling. To change widget styles, go to the <a target="_blank" rel="noopener noreferrer" href="javascript:wp.customize.panel(\'widgets\').focus();">Widgets section</a>, where you can change each widget individually.</div>', 'epico'),
        'priority'    => 10,
    ) );


    /*----------  Cores  ----------*/

    // Paletas de cor
    Kirki::add_field( 'epico_config', array(
        'type'        => 'radio-image',
        'settings'    => 'epico_color_palettes',
        'label'       => esc_attr__( 'Color palettes', 'epico' ),
        'tooltip'     => esc_attr__( 'Customize your site colors with one of these color palletes. To see all the variations between the palette options, first add some widgets from the Epico plugin.', 'epico' ),
        'section'     => 'blog_colors',
        'priority'    => 10,
        'default'     => '0',
        'choices'     => array(
            '0' => get_template_directory_uri() . '/img/icons/pallete01.png',
            '1' => get_template_directory_uri() . '/img/icons/pallete02.png',
            '2' => get_template_directory_uri() . '/img/icons/pallete03.png',
            '3' => get_template_directory_uri() . '/img/icons/pallete04.png',
            '4' => get_template_directory_uri() . '/img/icons/pallete05.png',
            '5' => get_template_directory_uri() . '/img/icons/pallete06.png',
            '6' => get_template_directory_uri() . '/img/icons/pallete07.png',
            '7' => get_template_directory_uri() . '/img/icons/pallete08.png',
            '8' => get_template_directory_uri() . '/img/icons/pallete09.png',
            )
        )
    );

    // Sobrescrever cor principal
    Kirki::add_field( 'epico_config', array(
        'type'        => 'switch',
        'settings'    => 'epico_color_override_option',
        'label'       => esc_attr__( 'Override style main color', 'epico' ),
        'tooltip'     => esc_attr__( 'Check this if you want to override the pallete accent color and define a new custom color.', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => 0,
        'priority'    => 20,
        )
    );

    // Cor principal
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_color_override',
        'label'       => esc_attr__( 'New main color', 'epico' ),
        'description' => esc_attr__( 'Choose a value to automatically override the pallete\'s main color.', 'epico' ),
        'tooltip'     => esc_attr__( 'Here you can specify a custom color for the main elements of the template, overriding the chosen pallete. The neutral tones will remain the same.', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '#81D742',
        'priority'    => 30,
        'choices'     => array(
            'alpha' => true,
            ),
        'active_callback' => array(
            array(
                'setting'  => 'epico_color_override_option',
                'value'    => '1',
                'operator' => '==',
                ),
            ),
        )
    );

    // Cor de fundo do blog
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_blog_bkg_color',
        'label'       => esc_attr__( 'Blog background colors', 'epico' ),
        'description' => esc_attr__( 'Main background color', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '#f7f5ee',
        'priority'    => 40,
        'choices'     => array(
            'alpha' => true,
            ),
        )
    );

    // Cor de fundo da área do topo
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_sitetop_bkg_color',
        'description' => esc_attr__( 'Site top (above the blog header)', 'epico' ),
        'tooltip'     => esc_attr__( 'This will appear only if a widget was added to the “site top” widget area.', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '#3f4f55',
        'priority'    => 45,
        'choices'     => array(
            'alpha' => true,
            ),
        )
    );

    // Cor de fundo do cabecalho
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_header_bkg_color',
        'description' => esc_attr__( 'Header', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '#FFFFFF',
        'priority'    => 50,
        'choices'     => array(
            'alpha' => true,
            ),
        )
    );

    // Cor de fundo do submenu e menu mobile
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_submenu_bkg_color',
        'description' => esc_attr__( 'Mobile menu and submenu', 'epico' ),
        'tooltip'     => esc_attr__( 'Visible only if sub items was added to any item in the main menu.', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '#344146',
        'priority'    => 55,
        'choices'     => array(
            'alpha' => true,
            ),
        )
    );

    // Cor de fundo da área antes do rodapé
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_prefooter_bkg_color',
        'description' => esc_attr__( 'Prefooter', 'epico' ),
        'tooltip'     => esc_attr__( 'The background color will appear only if a widget was added to the prefooter widget area.', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '#ffffff',
        'priority'    => 60,
        'choices'     => array(
            'alpha' => true,
            ),
        )
    );

    // Cor de fundo do rodapé
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_footer_bkg_color',
        'description' => esc_attr__( 'Footer', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '#344146',
        'priority'    => 70,
        'choices'     => array(
            'alpha' => true,
            ),
        )
    );

    // Cor de fundo da area da imagem do post na listagem
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_featured_img_bkg_color',
        'description' => esc_attr__( 'Featured image area', 'epico' ),
        'tooltip'     => esc_attr__( 'This color control only affects the featured image area in post listings.', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '',
        'priority'    => 80,
        'choices'     => array(
            'alpha' => false,
            ),
        )
    );

    // Cor de fundo da area de texto do post na listagem
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_posts_bkg_color',
        'description' => esc_attr__( 'Post excerpt in listings', 'epico' ),
        'tooltip'     => esc_attr__( 'This option will change the background of the post excerpt area in listings.', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '#ffffff',
        'priority'    => 90,
        'choices'     => array(
            'alpha' => true,
            ),
        )
    );

    // Cor de fundo da barra de enderecos do navegador (mobile apenas)
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_address_bar_color',
        'description' => esc_attr__( 'Browser address bar color (mobile)', 'epico' ),
        'tooltip'     => esc_attr__( 'This only affects the browser address bar on mobile. The mobile browsers affected are: Chrome, Safari, Firefox OS, Opera, Windows Phone browser and Vivaldi.', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => NULL,
        'priority'    => 100,
        'choices'     => array(
            'alpha' => true,
            ),
        )
    );

    // Cor dos itens da paginação
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_pagination_bkg_color',
        'description' => esc_attr__( 'Pagination numbers', 'epico' ),
        'tooltip'     => esc_attr__( 'This option will change the background of the pagination\'s items on post and page listings.', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '#d6d3c7',
        'priority'    => 110,
        'choices'     => array(
            'alpha' => true,
            ),
        )
    );

    // Cor da caixa de título de categorias (loop meta)
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_cattitle_bkg_color',
        'description' => esc_attr__( 'Archive category title', 'epico' ),
        'tooltip'     => esc_attr__( 'This option will change the background of the title on category listings.', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '#c7d2d4',
        'priority'    => 115,
        'choices'     => array(
            'alpha' => true,
            ),
        )
    );

    // Cor de fundo da landing page
    Kirki::add_field( 'epico_config', array(
        'type'        => 'color',
        'settings'    => 'epico_landing_bkg_color',
        'description' => esc_attr__( 'Landing pages', 'epico' ),
        'tooltip'     => esc_attr__( 'This color will appear on the background of pages which have the following page templates applied: Landing Page, Landing Page (minimal), Auxiliary (page builders), Auxiliary alternative (page builders) and Auxiliary minimal (page builders). Note that the color will not appear on the page if a background image for these page templates is also defined.', 'epico' ),
        'section'     => 'blog_colors',
        'default'     => '#FFFFFF',
        'priority'    => 120,
        'choices'     => array(
            'alpha' => true,
            ),
        )
    );


    /*----------  Imagens de fundo  ----------*/

    // Intro do painel `Imagens de fundo`
    Kirki::add_field( 'epico_config', array(
        'type'        => 'custom',
        'settings'    => 'epico_background_images_header',
        'section'     => 'background_images',
        'default'     => '<div class="epc-tip">' . esc_html__( 'Tip: optimize your images before uploading them in this section in order not to hinder your blog loading performance.', 'epico' ) . '</div>',
        'priority'    => 5,
    ) );

    // Imagem de fundo do título do post
    Kirki::add_field( 'epico_config', array(
        'type'        => 'checkbox',
        'settings'    => 'epico_post_title_bkg_img',
        'label'       => esc_attr__( 'Featured image as post title background', 'epico' ),
        'description' => esc_attr__( 'Check this option if you want to automatically add the featured image as a background image in post titles.', 'epico' ),
        'tooltip'     => esc_attr__( 'The featured image will be stretched in the available space, below the post title text. It\'s recommended to optimize the image to prevent negative impacts in your blog loading performance.', 'epico' ),
        'section'     => 'background_images',
        'default'     => 0,
        'priority'    => 7,
        )
    );

    // Imagem de fundo do blog
    Kirki::add_field( 'epico_config', array(
        'type'        => 'background',
        'settings'    => 'epico_blog_bkg_img',
        'label'       => esc_attr__( 'Blog\'s background image', 'epico' ),
        'section'     => 'background_images',
        'tooltip'     => esc_attr__( 'This image will appear in every section of the blog, except in pages with the Landing Page template applied.', 'epico' ),
        'priority'    => 10,
        'default'     => array(
            'background-image'      => get_background_image() ? get_background_image() : '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
            ),
        )
    );

    // Imagem de fundo da área do topo
    Kirki::add_field( 'epico_config', array(
        'type'        => 'background',
        'settings'    => 'epico_sitetop_bkg_img',
        'label'       => esc_attr__( 'Site top background image', 'epico' ),
        'tooltip'     => esc_attr__( 'After uploading your image, you should also change de site top\'s background color to match your images\'s color. This will appear only if a widget was added to the “site top” widget area.', 'epico' ),
        'section'     => 'background_images',
        'priority'    => 15,
        'default'     => array(
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
            ),
        )
    );

    // Imagem de fundo do cabeçalho
    Kirki::add_field( 'epico_config', array(
        'type'        => 'background',
        'settings'    => 'epico_header_bkg_img',
        'label'       => esc_attr__( 'Header background image', 'epico' ),
        'tooltip'     => esc_attr__( 'After uploading your image, you should also change de header\'s background color to match your images\'s color.', 'epico' ),
        'section'     => 'background_images',
        'priority'    => 20,
        'default'     => array(
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
            ),
        )
    );

    // Imagem de fundo da área antes do rodapé
    Kirki::add_field( 'epico_config', array(
        'type'        => 'background',
        'settings'    => 'epico_prefooter_bkg_img',
        'label'       => esc_attr__( 'Prefooter background image', 'epico' ),
        'tooltip'     => esc_attr__( 'After uploading your image, you should also change de prefooter\'s background color to match your images\'s color.', 'epico' ),
        'section'     => 'background_images',
        'priority'    => 30,
        'default'     => array(
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
            ),
        )
    );

    // Imagem de fundo do rodapé
    Kirki::add_field( 'epico_config', array(
        'type'        => 'background',
        'settings'    => 'epico_footer_bkg_img',
        'label'       => esc_attr__( 'Footer background image', 'epico' ),
        'tooltip'     => esc_attr__( 'After uploading your image, you should also change de footer\'s background color to match your images\'s color.', 'epico' ),
        'section'     => 'background_images',
        'priority'    => 40,
        'default'     => array(
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
            ),
        )
    );

    // Imagem de fundo da landing page
    Kirki::add_field( 'epico_config', array(
        'type'        => 'background',
        'settings'    => 'epico_landing_bkg_img',
        'label'       => esc_attr__( 'Background image for landing pages ', 'epico' ),
        'section'     => 'background_images',
        'tooltip'     => esc_attr__( 'This image will appear on the background of pages which have the following page templates applied: Landing Page, Landing Page (minimal), Auxiliary (page builders), Auxiliary alternative (page builders) and Auxiliary minimal (page builders).', 'epico' ),
        'priority'    => 50,
        'default'     => array(
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
            ),
        )
    );


    /*----------  Tipos de letra  ----------*/

    // Tipografia dos titulos
    Kirki::add_field( 'epico_config', array(
        'type'        => 'radio-image',
        'settings'    => 'epico_typography',
        'label'       => esc_attr__( 'Header font', 'epico' ),
        'tooltip'     => esc_attr__( 'Choose one typographic style to use with the site headers.', 'epico' ),
        'section'     => 'typography',
        'priority'    => 10,
        'default'     => '0',
        'choices'     => array(
            '0' => get_template_directory_uri() . '/img/icons/header-default-font.png',
            '1' => get_template_directory_uri() . '/img/icons/header-alt-font-1.png',
            '2' => get_template_directory_uri() . '/img/icons/header-alt-font-2.png',
            '3' => get_template_directory_uri() . '/img/icons/header-alt-font-3.png',
            '4' => get_template_directory_uri() . '/img/icons/header-alt-font-4.png',
            '5' => get_template_directory_uri() . '/img/icons/header-alt-font-5.png',
            '6' => get_template_directory_uri() . '/img/icons/header-alt-font-6.png',
            )
        )
    );

    // Tipografia dos textos
    Kirki::add_field( 'epico_config', array(
        'type'        => 'radio-image',
        'settings'    => 'epico_typography_text',
        'label'       => esc_attr__( 'Text font', 'epico' ),
        'tooltip'     => esc_attr__( 'Choose one typographic style for the text of your articles.', 'epico' ),
        'section'     => 'typography',
        'priority'    => 20,
        'default'     => '0',
        'choices'     => array(
            '0' => get_template_directory_uri() . '/img/icons/text-default-font.png',
            '1' => get_template_directory_uri() . '/img/icons/text-alt-font-1.png',
            '2' => get_template_directory_uri() . '/img/icons/text-alt-font-2.png',
            '3' => get_template_directory_uri() . '/img/icons/text-alt-font-3.png',
            )
        )
    );


    /*----------  Layout  ----------*/

    // Layout do blog
    Kirki::add_field( 'epico_config', array(
        'type'        => 'radio-image',
        'settings'    => 'epico_sidebar_layout',
        'label'       => esc_attr__( 'Blog layout', 'epico' ),
        'tooltip'     => esc_attr__( 'Choose a layout for your content: sidebar on the left, sidebar on the right or no sidebar. Tip: the “sidebar left” or “sidebar right” options can be overwritten individually in posts and pages by applying a page template without the sidebar.', 'epico' ),
        'section'     => 'layout',
        'priority'    => 10,
        'default'     => '1',
        'choices'     => array(
            '0' => get_template_directory_uri() . '/img/icons/sidebar-left.png',
            '1' => get_template_directory_uri() . '/img/icons/sidebar-right.png',
            '2' => get_template_directory_uri() . '/img/icons/no-sidebar.png',
            )
        )
    );

    // Listagem compacta de posts
    Kirki::add_field( 'epico_config', array(
        'type'        => 'checkbox',
        'settings'    => 'epico_compact_loop',
        'label'       => esc_attr__( 'Compact listing of posts', 'epico' ),
        'tooltip'     => esc_attr__( 'This will enable a more compact display of posts in various listings: archives, blogs, categories, tags and taxonomies.', 'epico' ),
        'section'     => 'layout',
        'default'     => 1,
        'priority'    => 20,
        )
    );

    // Estilo de metadata dos posts na listagem compacta
    Kirki::add_field( 'epico_config', array(
        'type'        => 'radio-image',
        'settings'    => 'epico_icon_meta_style',
        'label'       => esc_attr__( 'Post metadata layout in compact listing', 'epico' ),
        'section'     => 'layout',
        'active_callback' => array(
            array(
                'setting'  => 'epico_compact_loop',
                'value'    => '1',
                'operator' => '==',
            ),
        ),
        'default'     => 'icons',
        'priority'    => 30,
        'choices'     => array(
            'icons' => get_template_directory_uri() . '/img/icons/metadata-icons.png',
            'text'  => get_template_directory_uri() . '/img/icons/metadata-text.png',
            'none'  => get_template_directory_uri() . '/img/icons/metadata-none.png',
            )
        )
    );

    // Tempo de leitura
    Kirki::add_field( 'epico_config', array(
        'type'        => 'checkbox',
        'settings'    => 'epico_reading_time',
        'label'       => esc_attr__( 'Estimated reading time of posts', 'epico' ),
        'tooltip'     => esc_attr__( 'A small notice with the estimated reading time of the post will appear right above the post\'s text. After activating this, you must resave your old posts to calculate the reading time for them.', 'epico' ),
        'section'     => 'layout',
        'default'     => 1,
        'priority'    => 40,
        )
    );

    // Excluir tempo de leitura de paginas
    Kirki::add_field( 'epico_config', array(
        'type'        => 'select',
        'settings'    => 'epico_reading_time_exclude',
        'label'       => esc_attr__( 'Ignore reading time in pages', 'epico' ),
        'description' => esc_attr__( 'If you want to remove the reading time from certain pages, select them below.', 'epico' ),
        'tooltip'     => esc_attr__( 'The reading time does not make sense in some page types. Pages with contact forms or with video only will not benefit for this information. To correct this behavior, this option will remove the reading time only from the pages you select in the text field. This setting works only for pages, not posts.', 'epico' ),
        'section'     => 'layout',
        'default'     => NULL,
        'priority'    => 50,
        'multiple'    => 999,
        'active_callback' => array(
            array(
                'setting'  => 'epico_reading_time',
                'value'    => '1',
                'operator' => '==',
            ),
        ),
        'choices'     => Kirki_Helper::get_posts( array( 'post_type' => 'page', 'orderby' => 'modified', 'posts_per_page' => 50 ) ),
        )
    );

    // Modo Zen
    Kirki::add_field( 'epico_config', array(
        'type'        => 'checkbox',
        'settings'    => 'epico_zenmode',
        'label'       => esc_attr__( 'Zen mode (focused reading)', 'epico' ),
        'tooltip'     => esc_attr__( 'This will add a small icon for the Zen mode (or focused reading mode), right above the post or page title. The Zen mode will allow the site visitor to temporally remove all layout distractions from the site’s interface, like sidebars, widgets and background colors or images.', 'epico' ),
        'section'     => 'layout',
        'default'     => 1,
        'priority'    => 60,
        )
    );

    // Texto do link de ativacao do modo Zen
    Kirki::add_field( 'epico_config', array(
        'type'        => 'text',
        'settings'    => 'epico_zenmode_text',
        'label'       => esc_attr__( 'Zen mode button text', 'epico' ),
        'tooltip'     => esc_attr__( 'Specify the text that will show when the mouse is hovering over the Zen mode icon.', 'epico' ),
        'section'     => 'layout',
        'active_callback' => array(
            array(
                'setting'  => 'epico_zenmode',
                'value'    => '1',
                'operator' => '==',
            ),
        ),
        'default'     => esc_attr__( 'Focused reading', 'epico' ),
        'priority'    => 70,
        )
    );

    // Apresentacao da caixa do autor
    Kirki::add_field( 'epico_config', array(
        'type'        => 'checkbox',
        'settings'    => 'epico_author_box_switch',
        'label'       => esc_attr__( 'Author box', 'epico' ),
        'description' => esc_attr__( 'Enable or disable the author box below posts.', 'epico' ),
        'tooltip'     => esc_attr__( 'Uncheck to remove the author box feature from articles, located at the end of the post content. Pages are automatically ignored by default.', 'epico' ),
        'section'     => 'layout',
        'default'     => 1,
        'priority'    => 80,
        )
    );

    // Apresentacao dos artigos relacionados
    Kirki::add_field( 'epico_config', array(
        'type'        => 'checkbox',
        'settings'    => 'epico_related_posts_switch',
        'label'       => esc_attr__( 'Related posts', 'epico' ),
        'description' => esc_attr__( 'Enable or disable the automatic related posts feature.', 'epico' ),
        'tooltip'     => esc_attr__( 'Uncheck to remove the related posts feature from articles. Pages are automatically ignored by default.', 'epico' ),
        'section'     => 'layout',
        'default'     => 1,
        'priority'    => 90,
        )
    );

    // Número de posts a serem apresentados nos artigos relacionados
    Kirki::add_field( 'epico_config', array(
        'type'        => 'number',
        'settings'    => 'epico_related_posts_number',
        'label'       => esc_attr__( 'Number of posts to show', 'epico' ),
        'tooltip'     => esc_attr__( 'Choose the number of posts to insert in the related posts area.', 'epico' ),
        'section'     => 'layout',
        'active_callback' => array(
            array(
                'setting'  => 'epico_related_posts_switch',
                'value'    => '1',
                'operator' => '==',
            ),
        ),
        'default'     => 6,
        'priority'    => 95,
        'choices'     => array(
            'min'  => '3',
            'max'  => '18',
            'step' => '1',
            )
        )
    );

    // Apresentacao da navegacao de posts
    Kirki::add_field( 'epico_config', array(
        'type'        => 'checkbox',
        'settings'    => 'epico_post_nav_switch',
        'label'       => esc_attr__( 'Post navigation', 'epico' ),
        'description' => esc_attr__( 'Enable or disable the automatic post navigation feature.', 'epico' ),
        'tooltip'     => esc_attr__( 'Uncheck to remove the navigation posts feature from articles, before the comment form. Pages are automatically ignored by default.', 'epico' ),
        'section'     => 'layout',
        'default'     => 1,
        'priority'    => 100,
        )
    );

    // Apresentacao das colunas da sidebar
    Kirki::add_field( 'epico_config', array(
        'type'        => 'checkbox',
        'settings'    => 'epico_columns_switch',
        'label'       => esc_attr__( 'Columns in the “Sidebar” area', 'epico' ),
        'description' => esc_attr__( 'Widgets in two columns in the “Sidebar” area.', 'epico' ),
        'tooltip'     => esc_attr__( 'Disable to prevent widgets placed in the “sidebar” area to appear in two columns. This only occurs in the following situations: 1) when the blog is viewed on mobile, with the device in landscape orientation. 2) when the “no sidebar” layout option is selected in the panel (Design and Layout tab). 3) When any page templates without a sidebar are applied to pages and/or posts.', 'epico' ),
        'section'     => 'layout',
        'default'     => 1,
        'priority'    => 110,
        'active_callback' => array(
            array(
                'setting'  => 'epico_sidebar_layout',
                'value'    => '2',
                'operator' => '==',
                )
            )
        )
    );

    // Area Auxliar primaria (sidebar) com largura total
    Kirki::add_field( 'epico_config', array(
        'type'        => 'checkbox',
        'settings'    => 'epico_full_width_primary',
        'label'       => esc_attr__( 'Full width “sidebar” area', 'epico' ),
        'description' => esc_attr__( 'This will stretch the main “sidebar” widget area to the full width of the window.', 'epico' ),
        'tooltip'     => esc_attr__( 'This only works when the “No sidebar” option is also activated. You can use this to better acomodate modules from page builder plugins.', 'epico' ),
        'section'     => 'layout',
        'default'     => 0,
        'priority'    => 115,
        'active_callback' => array(
            array(
                'setting'  => 'epico_sidebar_layout',
                'value'    => '2',
                'operator' => '==',
                ),
            array(
                'setting'  => 'epico_columns_switch',
                'value'    => '0',
                'operator' => '==',
                ),
            )
        )
    );

    // Remoção das margens dos widgets na área Auxliar primaria (sidebar) com largura total
    Kirki::add_field( 'epico_config', array(
        'type'        => 'checkbox',
        'settings'    => 'epico_widget_margins_full_sidebar',
        'label'       => esc_attr__( 'Remove margins between widgets in “sidebar” area', 'epico' ),
        'description' => esc_attr__( 'Select to remove the space that separate the widgets in the full width “sidebar” area.', 'epico' ),
        'tooltip'     => esc_attr__( 'This only works when the “No sidebar” option is also activated. You can use this to create more interesting layouts in the sidebar area using multiple widgets and other elements from page builders.', 'epico' ),
        'section'     => 'layout',
        'default'     => 0,
        'priority'    => 117,
        'active_callback' => array(
            array(
                'setting'  => 'epico_sidebar_layout',
                'value'    => '2',
                'operator' => '==',
                ),
            array(
                'setting'  => 'epico_columns_switch',
                'value'    => '0',
                'operator' => '==',
                ),
            array(
                'setting'  => 'epico_full_width_primary',
                'value'    => '1',
                'operator' => '==',
                ),
            )
        )
    );

    // Apresentacao de tags
    Kirki::add_field( 'epico_config', array(
        'type'        => 'checkbox',
        'settings'    => 'epico_display_tags',
        'label'       => esc_attr__( 'Display tags', 'epico' ),
        'description' => esc_attr__( 'Check this to display post tags at the end of your content.', 'epico' ),
        'tooltip'     => esc_attr__( 'Keep this unchecked if you wish to remove tags from your posts.', 'epico' ),
        'section'     => 'layout',
        'default'     => 0,
        'priority'    => 120,
        )
    );

    // Controle do numero de comentarios
    Kirki::add_field( 'epico_config', array(
        'type'        => 'number',
        'settings'    => 'epico_comment_threshold',
        'label'       => esc_attr__( 'Threshold for number of comments', 'epico' ),
        'description' => esc_attr__( 'Choose a threshold from which the number of comments will appear in your content.', 'epico' ),
        'tooltip'     => esc_attr__( 'Here you can choose to display the number of comments in your posts only after a certain threshold is reached. Note: this does not work with the Facebook Comments WordPress plugin.', 'epico' ),
        'section'     => 'layout',
        'default'     => 0,
        'priority'    => 130,
        'choices'     => array(
            'min'  => '0',
            'max'  => '30',
            'step' => '1',
            )
        )
    );

    // Mostrar a data de atualização no lugar da data de publicacao
    Kirki::add_field( 'epico_config', array(
        'type'        => 'radio',
        'settings'    => 'epico_date_type',
        'label'       => esc_attr__( 'Type of date to display', 'epico' ),
        'description' => esc_attr__( 'Select the type of date you want do display in your posts.', 'epico' ),
        'tooltip'     => esc_attr__( 'The date is displayed right below the post title. The published date is the date when the post was first published in WordPress. The modified date is the date when the post was updated in WordPress after the first publication.', 'epico' ),
        'section'     => 'layout',
        'default'     => 'published',
        'priority'    => 140,
        'choices'     => array(
            'published'  => esc_attr__( 'Published date', 'epico' ),
            'modified'   => esc_attr__( 'Modified date (if available)', 'epico' ),
            'both'       => esc_attr__( 'Display both dates', 'epico' ),
            'none'       => esc_attr__( 'Hide dates', 'epico' ),
            )
        )
    );

    // Remover data de publicacao a partir de determinada data
    Kirki::add_field( 'epico_config', array(
        'type'        => 'number',
        'settings'    => 'epico_date_threshold',
        'label'       => esc_attr__( 'Remove date on older posts', 'epico' ),
        'description' => esc_attr__( 'This will remove the published date from posts older than the number of days specified below.', 'epico' ),
        'tooltip'     => esc_attr__( 'Here you can choose to display the date in your posts for fresh articles only. Posts older than the days specified here will have the date automatically removed.', 'epico' ),
        'section'     => 'layout',
        'default'     => 0,
        'priority'    => 150,
        'choices'     => array(
            'min'  => '0',
            'max'  => '3000',
            'step' => '1',
            ),
        'active_callback' => array(
            array(
                'setting'  => 'epico_date_type',
                'value'    => array(
                    'published',
                    'modified',
                    'both'
                    ),
                'operator' => 'contains',
                )
            )
        )
    );
}
