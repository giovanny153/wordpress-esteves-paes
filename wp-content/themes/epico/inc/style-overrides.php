<?php
/**
 * Funções de personalização de cores do tema
 *
 * @package   Epico
 * @since     1.0.0
 */

/*----------  Cores  ----------*/

/* Sobrescre a cor principal do estilo */
add_action( 'wp_enqueue_scripts', 'epico_main_color_override', 10 );

/* Altera a cor de fundo geral do blog */
add_action( 'wp_enqueue_scripts', 'epico_blog_bkg_color', 10 );

/* Cor de fundo da área do topo */
add_action( 'wp_enqueue_scripts', 'epico_sitetop_bkg_color', 10 );

/* Altera a cor de fundo do cabeçalho */
add_action( 'wp_enqueue_scripts', 'epico_header_bkg_color', 10 );

/* Altera a cor de fundo do menu mobile no cabeçalho */
add_action( 'wp_enqueue_scripts', 'epico_submenu_bkg_color', 10 );

/* Altera a cor de fundo do pré-footer */
add_action( 'wp_enqueue_scripts', 'epico_prefooter_bkg_color', 10 );

/* Altera a cor de fundo do footer */
add_action( 'wp_enqueue_scripts', 'epico_footer_bkg_color', 10 );

/* Altera a cor de fundo da landing page */
add_action( 'wp_enqueue_scripts', 'epico_landing_page_bkg_color', 10 );

/* Altera a cor de fundo da area da imagem de destaque na lista de posts */
add_action( 'wp_enqueue_scripts', 'epico_featured_area_bkg_color', 10 );

/* Altera a cor de fundo da area do texto dos posts nas listagens */
add_action( 'wp_enqueue_scripts', 'epico_posts_list_bkg_color', 10 );

/* Altera a cor de fundo dos itens da paginação na lista de posts/páginas */
add_action( 'wp_enqueue_scripts', 'epico_pagination_bkg_color', 10 );

/* Altera a cor de fundo do título das lista de posts adicionais */
add_action( 'wp_enqueue_scripts', 'epico_listings_title_bkg_color', 10 );


/*----------  Imagens de fundo  ----------*/

/* Altera a imagem de fundo do blog */
add_action( 'wp_enqueue_scripts', 'epico_blog_bkg_image', 10 );

/* Altera a imagem de fundo da área do topo  */
add_action( 'wp_enqueue_scripts', 'epico_sitetop_bkg_image', 10 );

/* Altera a imagem de fundo do cabeçalho */
add_action( 'wp_enqueue_scripts', 'epico_header_bkg_image', 10 );

/* Altera a imagem de fundo da área antes do rodapé */
add_action( 'wp_enqueue_scripts', 'epico_prefooter_bkg_image', 10 );

/* Altera a imagem de fundo do rodapé */
add_action( 'wp_enqueue_scripts', 'epico_footer_bkg_image', 10 );

/* Altera a imagem de fundo da landing page */
add_action( 'wp_enqueue_scripts', 'epico_landing_page_bkg_image', 10 );

/* Adiciona a image de destaque ao fundo do título das páginas */
add_action( 'wp_enqueue_scripts', 'epico_post_title_bkg_image', 10 );


/*----------  Tipografia  ----------*/

/* Adiciona estilos de tipografia de acordo com a selecao no painel */
add_action( 'wp_enqueue_scripts', 'epico_typography', 10 );


/*----------  Demais funções  ----------*/

/* Ajustes no CSS do botoes de compartilhamento de acordo com as opções ativadas  */
add_action( 'wp_enqueue_scripts', 'epico_social_total_parcial', 10 );

/* Adiciona largura total às barras primaria, antes e após dos artigos */
add_action( 'wp_enqueue_scripts', 'epico_full_width_primary', 10 );

/* Adiciona estilos do campo de codigo CSS personalizado no frontend */
add_action( 'wp_enqueue_scripts', 'epico_custom_css', 10 );



/**
 * Sobrescre a cor principal do estilo selecionado
 *
 * @since   1.0.0
 * @version 1.0.1
 * @return  string
 */
function epico_main_color_override() {

	$color_override_option = get_theme_mod( 'epico_color_override_option', 0 );

	$new_color_override = get_theme_mod( 'epico_color_override', '#81D742' );

	// Se o campo possui um valor definido
	if ( 1 == $color_override_option ) {

		// Define os estilos CSS customizados
		$custom_main_color = '.epc-ovr #footer ::-moz-selection,.epc-ovr #sidebar-promo ::-moz-selection,.epc-ovr section[class*="pop-id"] ::-moz-selection,.epc-ovr .capture-wrap ::-moz-selection{background:' . $new_color_override . '}.epc-ovr #footer ::selection,.epc-ovr #sidebar-promo ::selection,section[class*="pop-id"] ::selection,.epc-ovr .capture-wrap ::selection{background:' . $new_color_override . '}.epc-ovr[class*="epc-"] #sidebar-primary section[class*="epico_pages"] a,.epc-ovr[class*="epc-"] #sidebar-primary section[class*="epico_links"] a,.epc-ovr .wp-calendar>caption,.epc-ovr input[type="submit"],.epc-ovr #header #nav input.search-submit[type="submit"],.epc-ovr  #header .not-found input.search-submit[type="submit"],.epc-ovr.zen #sidebar-after-content .sb.capture-wrap form .uf-submit,.epc-ovr[class*="epc-"] .uberaviso,.epc-ovr[class*="epc-"] .fw.capture-wrap form .uf-submit,.epc-ovr[class*="epc-"] .sb.capture-wrap form .uf-submit,.epc-ovr[class*="epc-"] .sc.capture-wrap form .uf-submit,.epc-ovr[class*="epc-"] #sidebar-after-content .sb.capture-wrap form .uf-submit,.epc-ovr[class*="epc-"] .widget_epico_author-id a[class*="button"],.epc-ovr[class*="epc-"] input[type="submit"]{background:' . $new_color_override . '}.epc-ovr .pagination .page-numbers.current{background:' . $new_color_override . '!important}.epc-ovr #credits,.epc-ovr #footer .widget_tag_cloud a:hover,.epc-ovr .loop-meta,.epc-ovr #menu-primary-items .sub-menu li:hover,.epc-ovr .epc-button-border-primary,.epc-ovr #comments .comment-reply-link,.epc-ovr #footer .search-field:hover,.epc-ovr #footer .search-field:focus,.epc-ovr .author-profile,.epc-ovr.page-template-landing{border-color:' . $new_color_override . '!important}.epc-ovr[class*="epc-"] #sidebar-primary .widget_epico_pop-id,.epc-ovr[class*="epc-"] #footer .widget_social-id a:hover{border-color:' . $new_color_override . '}.epc-ovr .epc-button-border-primary,.epc-ovr #comments .comment-reply-link,.epc-ovr #footer .widget_social-id a:hover,.epc-ovr #sidebar-top li:hover::before,.epc-ovr #menu-primary .sub-menu li:hover::before,.epc-ovr #footer li:hover::before,.epc-ovr #menu-primary li.menu-item-has-children:hover::before,.epc-ovr #menu-secondary li:hover::before,.epc-ovr #search-toggle:hover::after,.epc-ovr .search-close .search-text,.epc-ovr #search-toggle::before,.epc-ovr #search-toggle:hover .search-text,.epc-ovr .search-text:hover,.epc-ovr #zen:hover i,.epc-ovr #zen.zen-active i,.epc-ovr #zen.zen-active:hover i,.epc-ovr.zen #footer a{color:' . epico_color_opacity( $new_color_override, .8 ) . '!important}.epc-ovr #sidebar-primary .widget_epico_pop-id h3[class*="title"]::before,.epc-ovr #sidebar-primary section[class*="epico_pages"] h3[class*="title"]::before{color:' . epico_color_opacity( $new_color_override, .8 ) . '}.epc-ovr[class*="epc-"] .fw.capture-wrap .uf-arrow svg polygon,.epc-ovr[class*="epc-"] .sb.capture-wrap .uf-arrow svg polygon,.epc-ovr[class*="epc-"] #sidebar-after-content .sb.capture-wrap .uf-arrow svg polygon,.epc-ovr.zen #sidebar-after-content .sb.capture-wrap .uf-arrow svg polygon{fill:' . $new_color_override . '}@media only screen and (max-width:680px){.epc-ovr #menu-primary>ul>li:hover::before,.epc-ovr #menu-primary li:hover::before,.epc-ovr #nav-toggle:hover .nav-text,.epc-ovr .nav-active #nav-toggle .nav-text{color:' . epico_color_opacity( $new_color_override, .8 ) . '!important}.epc-ovr #menu-primary-items>li:hover{border-color:' . epico_color_opacity( $new_color_override, .8 ) . '!important}.epc-ovr .nav-active #nav-toggle span::before,.epc-ovr .nav-active #nav-toggle span::after,.epc-ovr #nav-toggle:hover .screen-reader-text,.epc-ovr #nav-toggle:hover .screen-reader-text::after,.epc-ovr #nav-toggle:hover .screen-reader-text::before{background:' . $new_color_override . '!important}}@media only screen and (min-width:680px){.epc-ovr #header a{color:' . $new_color_override . '}}.epc-ovr #page #sidebar-primary .widget_epico_pop-id h3[class*="title"]::before,.epc-ovr #page #sidebar-primary .widget_epico_pop-id li:hover::before,.epc-ovr #page #sidebar-primary section[class*="epico_pages"] h3[class*="title"]::before,.epc-ovr #main-container a,.epc-ovr.plural .format-default .entry-author,.epc-ovr #breadcrumbs a,.epc-ovr #branding a,.epc-ovr #header #nav a:hover,.epc-ovr #footer .widget_tag_cloud a:hover::before,.epc-ovr #zen.zen-active:hover i,.epc-ovr.page-template-landing #footer a,.epc-ovr #main-container #sidebar-primary .widget_epico_pop-id a,.epc-ovr .uf-wrap .uf a{color:' . $new_color_override . '}.epc-ovr .pagination .page-numbers,.epc-ovr[class*="epc-"].plural .format-default .entry-author,.epc-ovr[class*="epc-"] .widget_epico_author-id a[class*="button"]{color:#fff!important}.epc-ovr #footer ::-moz-selection,.epc-ovr #sidebar-promo ::-moz-selection,.epc-ovr section[class*="pop-id"] ::-moz-selection,.epc-ovr .capture-wrap ::-moz-selection,.epc-ovr #footer ::selection,.epc-ovr #sidebar-promo ::selection,.epc-ovr section[class*="pop-id"] ::selection,.epc-ovr .capture-wrap ::selection,.epc-ovr .widget_social-id a,.epc-ovr .widget_epico_author-id a[class*="button"]{color:#fff}.epc-ovr.epc-1 .uf_epicoepico_pop a,.epc-ovr.epc-2 .uf_epicoepico_pop a,.epc-ovr.epc-3 .uf_epicoepico_pop a{color:#aebbc2}.epc-ovr #main-container a:hover,.epc-ovr.page-template-landing #footer a:hover{color:#344146}.epc-ovr input[type="submit"]:hover,.epc-ovr #nav input.search-submit[type="submit"]:hover,.epc-ovr .not-found input.search-submit[type="submit"]:hover,.epc-ovr #nav input.search-submit[type="submit"]:active,.epc-ovr .not-found input.search-submit[type="submit"]:active,.epc-ovr.zen #sidebar-after-content .sb.capture-wrap form .uf-submit:hover,.epc-ovr .pagination .page-numbers.current:active,.epc-ovr .pagination .page-numbers.current:hover{background:' . epico_color_opacity( $new_color_override, .6 ) . '!important}.epc-ovr .fw.capture-wrap form .uf-submit:hover,.epc-ovr .sb.capture-wrap form .uf-submit:hover,.epc-ovr .sc.capture-wrap form .uf-submit:hover,.epc-ovr #sidebar-after-content .sb.capture-wrap form .uf-submit:hover,.epc-ovr .widget_epico_author-id a[class*="button"]:hover,.epc-ovr[class*="epc-"] #sidebar-primary section[class*="epico_pages"] a:hover,.epc-ovr[class*="epc-"] #sidebar-primary section[class*="epico_links"] a:hover{background:' . epico_color_opacity( $new_color_override, .6 ) . '}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_main_color );
	}
}


/**
 * Altera a cor de fundo geral do blog
 *
 * @since   1.2.0
 * @version 1.0.1
 * @return  string
 */
function epico_blog_bkg_color() {

	$blog_bkg_color    = get_theme_mod( 'epico_blog_bkg_color', '#f7f5ee' );

	$element_color     = epico_readable_color( $blog_bkg_color );

	$element_color_alt = epico_readable_color( $blog_bkg_color );

	if ( ! empty( $blog_bkg_color ) && '#f7f5ee' != $blog_bkg_color ) {

		$custom_blog_bkg_color = 'body[class*="epc-s"]{background-color:' . $blog_bkg_color . '!important}.breadcrumb-trail .trail-item:nth-child(n+4) span::before,.breadcrumb-trail .trail-end,.epico-related-posts > h3.epico-related-posts-title,#respond,.epico-related-posts .fa-plus-square-o::before,.comment-respond label[for="author"]::before,.comment-respond label[for="email"]::before,.comment-respond label[for="url"]::before,.comment-respond label[for="comment"]::before,ia-info-toggle::after{color:' . $element_color_alt . '}.epico-related-posts>h3.epico-related-posts-title{border-bottom: 1px solid ' . $element_color_alt . '}.logged-in-as{border: 1px solid ' . $element_color_alt . '}.breadcrumb-trail .trail-item a,[class*="epc-s"] .epico-related-posts a,[class*="epc-s"] #respond a,[class*="epc-s"] #respond a:hover,[class*="epc-s"] #respond .logged-in-as::before,[class*="epc-s"] #breadcrumbs a{color: ' . $element_color . '}.zen .breadcrumb-trail .trail-item:nth-child(n+4) span::before,.zen .breadcrumb-trail .trail-end,.zen .epico-related-posts > h3.epico-related-posts-title,.zen #respond,.zen .epico-related-posts .fa-plus-square-o::before,.zen .comment-respond label[for="author"]::before,.zen .comment-respond label[for="email"]::before,.zen .comment-respond label[for="url"]::before,.zen .comment-respond label[for="comment"]::before,.zen ia-info-toggle::after,.zen #comments-template label{color:#777}.zen .epico-related-posts>h3.epico-related-posts-title{border-bottom: 1px solid #e4e4e4}.zen .logged-in-as{border: 1px solid #A1A1A1}.zen .breadcrumb-trail .trail-item a,.zen[class*="epc-s"] .epico-related-posts a,.zen[class*="epc-s"] #respond a,.zen[class*="epc-s"] #respond a:hover,.zen[class*="epc-s"] #respond .logged-in-as::before{color:#777}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_blog_bkg_color );
	}
}


/**
 * Altera a cor de fundo do topo do blog
 *
 * @since   1.10.0
 * @version 1.0.0
 * @return  string
 */
function epico_sitetop_bkg_color() {

	$sitetop_bkg_color = get_theme_mod( 'epico_sitetop_bkg_color', '#3f4f55' );

	if ( '#3f4f55' != $sitetop_bkg_color ) {

		$custom_sitetop_bkg_color = '[class*="epc-"] #page #sidebar-top{background:' . $sitetop_bkg_color . '}#header{border:none}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_sitetop_bkg_color );
	}
}


/**
 * Altera a cor de fundo do cabeçalho
 *
 * @since   1.7.12
 * @version 1.0.0
 * @return  string
 */
function epico_header_bkg_color() {

	// Cores do cabecalho

	$header_color        = get_theme_mod( 'epico_header_bkg_color', '#FFFFFF' );

	$header_text         = epico_readable_color( $header_color );

	$header_subdued      = epico_readable_alt_color( $header_color );

	$header_menu         = epico_color_lightness( $header_color, 0 );

	$header_menu_hover   = epico_color_lightness( $header_color, 2 );

	$header_menu_active  = epico_color_lightness( $header_color, 4 );

	$header_border       = epico_color_lightness( $header_color, 8 );

	$header_border_hover = epico_color_lightness( $header_color, 9 );

	$sitetop_bkg_color   = get_theme_mod( 'epico_sitetop_bkg_color', '#3f4f55' );

	$sitetop_icon_color  = epico_readable_color( $sitetop_bkg_color );

	$sitetop_text_color  = epico_readable_color( $sitetop_bkg_color );

	if ( ! in_array( $header_color, array( '#FFFFFF','#ffffff' ) ) ) {

		$custom_header_bkg_color = '#header #nav>a,#search-toggle,#header{background-color: ' . $header_color . '}[class*="epc-"] #header #menu-primary li.menu-item-has-children li a,[class*="epc-"] #search-wrap .search-form{background: ' . $header_menu . '}[class*="epc-"] #header #menu-primary li.menu-item-has-children li a:hover{background: ' . $header_menu_hover . '}[class*="epc-"] #header #menu-primary .sub-menu li a:active{background:  ' . $header_menu_active . ' !important}[class*="epc-"] .zen #header #nav .sub-menu a{border-top-color: ' . $header_color . '}#header #nav a:hover,#header #nav a,#site-title a,#menu-primary .sub-menu li:hover::before,#menu-secondary li:hover::before,#footer li:hover::before,[class*="epc-"] #menu-primary>ul>li:hover::before,[class*="epc-"] #menu-primary li.menu-item-has-children:hover::before,[class*="epc-"] #menu-primary>ul>li.menu-item-has-children:hover>a:hover::after,[class*="epc-"] #menu-primary>ul>li:hover a,[class*="epc-"] #menu-primary .sub-menu li:hover::before,.zen[class*="epc-"] #menu-primary .sub-menu li:hover::before,[class*="epc-"] #menu-secondary li:hover::before,[class*="epc-"] #search-toggle::after,[class*="epc-"] #search-toggle::before,[class*="epc-"] #search-toggle:hover .search-text,[class*="epc-"] .search-text,[class*="epc-"] .search-text:hover,[class*="epc-"] .search-close .search-text,[class*="epc-"] #header #nav-toggle .nav-text,[class*="epc-"] #header .nav-active #nav-toggle span::before,[class*="epc-"] #header .nav-active #nav-toggle span::after,[class*="epc-"] #header #nav-toggle:hover .screen-reader-text,[class*="epc-"] #header #nav-toggle:hover .screen-reader-text::after,[class*="epc-"]  #header #nav-toggle:hover .screen-reader-text::before{color: ' . $header_text . ' !important}[class*="epc-"] #menu-primary>ul>li::before,[class*="epc-"] #search-toggle::after,#menu-primary .sub-menu li::before,#menu-secondary li::before,#header #search-toggle::after,#header #search-toggle,.zen[class*="epc-"] #menu-primary .sub-menu li::before{ color: ' . $header_subdued . ' !important}#nav-toggle .screen-reader-text,#nav-toggle span::before,#nav-toggle span::after{background:' . $header_subdued . ' !important}.zen #nav-toggle span,.zen #nav-toggle span::before,.zen #nav-toggle span::after,.zen[class*="epc-"] #header #menu-primary #nav-toggle:hover .screen-reader-text,.zen[class*="epc-"] #header #menu-primary #nav-toggle:hover .screen-reader-text::after,.zen[class*="epc-"] #header #menu-primary #nav-toggle:hover .screen-reader-text::before{background:#ccc !important}[class*="epc-"] #menu-primary li.menu-item-has-children:hover,[class*="epc-"] #menu-primary>ul>li.menu-item-has-children:hover>a:hover::after,#nav-toggle .nav-text{background:' . $header_menu . '}#menu-primary>ul>li.menu-item-has-children:hover>a,#menu-primary>ul:not(:hover)>li.menu-item-has-children.active>a{box-shadow:none}.zen #header #nav .sub-menu a{border-top-style:solid;border-top-width:1px}.zen #header{border-top:10px solid #EDF1F2;background:#fff}.zen #header #nav a{color:#777;background:#fff}.zen #search-toggle::after,.zen #search-toggle::before{border-left:1px solid #ccc}.zen #menu-primary>a,.zen #search-toggle{border:1px solid #777 }.zen[class*="epc-"] #site-title a,.zen[class*="epc-"] #header #nav a{color:#777 !important}.zen[class*="epc-"] #header #menu-primary li.menu-item-has-children li a,.zen[class*="epc-"] #header #menu-primary li.menu-item-has-children:hover a{color:' . $header_text . ' !important}.zen #menu-primary .sub-menu li::before,.zen[class*="epc-"] #menu-primary>ul>li:hover a,.zen[class*="epc-"] #header #search-toggle::after,.zen[class*="epc-"] #header #search-toggle::before,.zen[class*="epc-"] #header #search-toggle:hover .search-text,.zen[class*="epc-"] #header .search-text,.zen[class*="epc-"] #header .search-text:hover,.zen[class*="epc-"] #header #nav-toggle .nav-text{color:#ccc !important}.zen #nav-toggle .nav-text{background: none !important}[class*="epc-s"] #page #sidebar-top{background-color: ' . $sitetop_bkg_color . ';color:' . $sitetop_text_color . '}[class*="epc-s"] #page #sidebar-top a{color:' . $sitetop_icon_color . '}@media only screen and (max-width:680px){.zen[class*="epc-"] #header #nav a{color:' . $header_text . ' !important}[class*="epc-"] #menu-primary-items a,[class*="epc-"] #menu-primary-items a:hover{border-bottom: 1px solid rgba(0,0,0,.2) !important;border-top:1px solid rgba(255,255,255,.2) !important}#header #menu-primary-items a,.zen #header #menu-primary-items a{background:#11242E}[class*="epc-"] #header #menu-primary-items a:hover{background: ' . $header_menu_hover . '}#header #nav a:active{background:' . $header_menu_active . ' !important}.zen #header #nav a:active{background:#fff !important}[class*="epc-"] #menu-primary-items>li:hover{border-left:5px solid ' . $header_border_hover . ' !important}[class*="epc-"] #page #menu-primary>a,[class*="epc-"] #page #search-toggle{border:1px solid ' . $header_subdued . '}.zen[class*="epc-"] #menu-primary>ul>li::before{color:' . $header_subdued . ' !important}.zen[class*="epc-"] #menu-primary>a,.zen[class*="epc-"] #search-toggle{border:1px solid #d0d9dc !important}#menu-primary>a,#search-toggle{border:1px solid rgba(255,255,255,.7)}#nav .search-form::before,#menu-primary>ul::before,.zen #menu-primary>ul::before{border-color:transparent transparent ' . $header_menu . ' transparent}[class*="epc-"] #header #menu-primary .nav-active #nav-toggle span::before,[class*="epc-"] #header #menu-primary .nav-active #nav-toggle span::after,[class*="epc-"] #header #menu-primary #nav-toggle:hover .screen-reader-text,[class*="epc-"] #header #menu-primary #nav-toggle:hover .screen-reader-text::after,[class*="epc-"] #header #menu-primary #nav-toggle:hover .screen-reader-text::before{background:' . $header_subdued . '!important}.zen #search-toggle::after,.zen #search-toggle::before{border-left:0}#menu-primary>a,.wordpress #header #menu-primary-items a,.wordpress #menu-primary-items a,wordpress #menu-primary-items a:hover{background-color:' . $header_color . '}.wordpress #menu-primary-items a{border-bottom:1px solid rgba(0,0,0,.2);border-top:1px solid rgba(255,255,255,.2)}[class*="epc-"] #menu-primary-items>li{border-left:5px solid ' . $header_border . '!important}.wordpress #menu-primary>ul>li.menu-item-has-children{border-top-left-radius:0px;border-top-right-radius:0px}}.search-form .search-submit,#header .search-field:hover,#header .search-field:focus{box-shadow: 0 0 0 5px ' . $header_border . '}#search-wrap .search-form{border-bottom: 5px solid ' . $header_border . '}@media only screen and (min-width:680px){#nav .search-form::before,.zen #menu-primary>ul::before{border-color:transparent transparent ' . $header_menu . ' transparent}[class*="epc-"] #menu-primary-items ul a{border-bottom: 1px solid rgba(0,0,0,.2) !important;border-top: 1px solid rgba(255,255,255,.2 ) !important}.zen[class*="epc-"] #menu-primary>ul>li::before{color:#ccc !important}.zen[class*="epc-"] #site-title a,.zen[class*="epc-"] #header #nav a{color: #777 !important}[class*="epc-"] #menu-primary-items .sub-menu li{border-left:5px solid ' . $header_border . ' !important}[class*="epc-"] #menu-primary-items .sub-menu li:hover{border-left:5px solid ' . $header_border_hover . ' !important}[class*="epc-"] #search-toggle::after,[class*="epc-"] #search-toggle::before,[class*="epc-"] #menu-primary>a{border-left:1px solid ' . $header_subdued . '}#search-toggle{border:none}#search-toggle::after,#search-toggle::before,#menu-primary>a{border-left:1px solid ' . $header_subdued . '}.zen #search-toggle{border:none}.zen[class*="epc-"] #menu-primary>ul>li.menu-item-has-children>a{background:none !important}}';

		if ( $header_color == $sitetop_bkg_color ) {
			$custom_header_bkg_color .= '#header{border-top:0px}';
		}

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_header_bkg_color );
	}
}


/**
 * Altera a cor de fundo do menu mobile do cabeçalho
 *
 * @since   1.10.0
 * @version 1.0.0
 * @return  string
 */
function epico_submenu_bkg_color() {

	// Cores do sub-menu e do menu mobile

	$header_color         = get_theme_mod( 'epico_header_bkg_color', '#FFFFFF' );

	$submenu_color        = get_theme_mod( 'epico_submenu_bkg_color', '#344146' );

	$submenu_text         = epico_readable_color( $submenu_color );

	$submenu              = epico_color_lightness( $submenu_color, 0 );

	$submenu_subdued      = epico_readable_alt_color( $submenu_color );

	$submenu_active       = epico_color_lightness( $submenu_color, 6 );

	$submenu_hover        = epico_color_lightness( $submenu_color, 4 );

	$submenu_border       = epico_color_lightness( $submenu_color, 8 );

	$submenu_border_hover = epico_color_lightness( $submenu_color, 9 );

	if ( '#344146' !== $submenu_color ) {

		$custom_submenu_bkg_color = '[class*="epc-"] #header #menu-primary li.menu-item-has-children li a,[class*="epc-"] #header #menu-primary li.menu-item-has-children:hover,[class*="epc-"] #header #menu-primary>ul>li.menu-item-has-children:hover>a:hover::after,[class*="epc-"] #header #search-wrap .search-form{background: ' . $submenu . '}[class*="epc-"] #header #menu-primary .sub-menu li:before{color:' . $submenu_text . '}[class*="epc-"] #header #menu-primary li.menu-item-has-children li a,[class*="epc-"] #header #menu-primary li.menu-item-has-children:hover a,[class*="epc-"] #header #menu-primary li.menu-item-has-children:hover::before,[class*="epc-"] #header #menu-primary li.menu-item-has-children:hover::after,[class*="epc-"] #menu-primary>ul>li.menu-item-has-children:hover>a:hover::after,[class*="epc-"] #menu-primary .sub-menu li:hover::before{color:' . $submenu_text . ' !important}[class*="epc-"] #header #menu-primary li.menu-item-has-children li a:hover{background: ' . $submenu_hover . '}[class*="epc-"] #header #menu-primary .sub-menu li a:active{background:  ' . $submenu_active . ' !important}[class*="epc-"] .zen #header #nav .sub-menu a{border-top-color: ' . $submenu_color . '}#menu-primary .sub-menu li::before.zen[class*="epc-"] #menu-primary .sub-menu li::before{ color: ' . $submenu_subdued . ' !important}[class*="epc-"] #header #nav .search-form::before{border-color:transparent transparent ' . $submenu . ' transparent}[class*="epc-"] #header #search-wrap .search-form{border-bottom:5px solid ' . $submenu_border_hover . '}@media only screen and (max-width:680px){[class*="epc-"] #header #menu-primary>ul:before,[class*="epc-"] #header #nav .search-form:before{border-color: transparent transparent ' . $submenu . ' transparent}[class*="epc-"] #menu-primary>ul>li::before,#menu-primary .sub-menu li::before,#menu-secondary li::before,#header #search-toggle,.zen[class*="epc-"] #menu-primary .sub-menu li::before,.zen[class*="epc-"] #menu-primary>ul>li::before{color: ' . $submenu_subdued . ' !important}.zen[class*="epc-"] #header #nav a,[class*="epc-"] #header #menu-primary-items a{color:' . $submenu_text . ' !important}[class*="epc-"] #menu-primary-items a,[class*="epc-"] #menu-primary-items a:hover{border-bottom: 1px solid rgba(0,0,0,.2) !important;border-top:1px solid rgba(255,255,255,.2) !important}#header #menu-primary-items a,.zen #header #menu-primary-items a{background:#11242E}[class*="epc-"] #header #menu-primary-items a:hover{background: ' . $submenu_hover . '}[class*="epc-"] #header #menu-primary li:hover::before{color:' . $submenu_text . '!important}[class*="epc-"] #header #menu-primary-items>li:hover{border-left:5px solid ' . $submenu_border_hover . '}[class*="epc-"] #header #search-wrap .search-form{border-bottom:5px solid ' . $submenu_border_hover . '}[class*="epc-"] #page #search-wrap #search-toggle{border-left:0px}.zen[class*="epc-"] #menu-primary>a,.zen[class*="epc-"] #search-toggle{border:1px solid #d0d9dc !important}[class*="epc-"] #header #nav .search-form::before,#menu-primary>ul::before,.zen #search-toggle::after,.zen #menu-primary>ul::before{border-color:transparent transparent ' . $submenu . ' transparent}.wordpress #header #menu-primary-items a,.wordpress #menu-primary-items a,[class*="epc-"] #header #search-wrap .search-form{background-color:' . $submenu . '}.wordpress #menu-primary-items a{border-bottom:1px solid rgba(0,0,0,.2);border-top:1px solid rgba(255,255,255,.2)}[class*="epc-"] #menu-primary-items>li{border-left:5px solid ' . $submenu_border . '!important}.wordpress #menu-primary>ul>li.menu-item-has-children{border-top-left-radius:0px;border-top-right-radius:0px}}[class*="epc-"] #header #nav input.search-submit,[class*="epc-"] #header #nav .search-field:hover,[class*="epc-"] #header #nav .search-field:focus{box-shadow: 0 0 0 5px ' . $submenu_border . '}#search-wrap .search-form{border-bottom: 5px solid ' . $submenu_border . '}@media only screen and (min-width:680px){[class*="epc-"] #nav .search-form::before{border-color:transparent transparent ' . $submenu . ' transparent}[class*="epc-"] #menu-primary-items ul a{border-bottom: 1px solid rgba(0,0,0,.2) !important;border-top: 1px solid rgba(255,255,255,.2 ) !important}.zen[class*="epc-"] #menu-primary>ul>li::before{color:#ccc !important}[class*="epc-"] #menu-primary-items .sub-menu li{border-left:5px solid ' . $submenu_border . ' !important}[class*="epc-"] #menu-primary-items .sub-menu li:hover{border-left:5px solid ' . $submenu_border_hover . ' !important}[class*="epc-"] #menu-primary-items .sub-menu li a:hover{background-color:' . $submenu_hover . '}.zen[class*="epc-"] #menu-primary>ul>li.menu-item-has-children>a{background:none !important}}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_submenu_bkg_color );
	}
}


/**
 * Altera a cor de fundo da área pré-rodapé
 *
 * @since   1.10.0
 * @version 1.0.0
 * @return  string
 */
function epico_prefooter_bkg_color() {

	// Cores da área antes do rodape

	$prefooter_color = get_theme_mod( 'epico_prefooter_bkg_color', '#ffffff' );

	$prefooter_text  = epico_readable_color( $prefooter_color );

	if ( ! in_array( $prefooter_color, array( '#FFFFFF','#ffffff' ) ) ) {

		$custom_prefooter_bkg_color = '.wordpress[class*="epc-"] #sidebar-subsidiary{background-color:' . $prefooter_color . ';color:' . $prefooter_text . ';border-bottom:0px;}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_prefooter_bkg_color );
	}
}


/**
 * Altera a cor de fundo do rodapé
 *
 * @since   1.10.0
 * @version 1.0.0
 * @return  string
 */
function epico_footer_bkg_color() {

	// Cores do rodape

	$footer_color        = get_theme_mod( 'epico_footer_bkg_color', '#344146' );

	$footer_text         = epico_readable_color( $footer_color );

	$footer_subdued      = epico_color_opacity( $footer_text, .6 );

	$footer_subdued_aux  = epico_color_opacity( $footer_text, .2 );

	$footer_icon         = epico_readable_alt_color( $footer_color );

	if ( '#344146' !== $footer_color ) {

		$custom_footer_bkg_color = '.wordpress[class*="epc-"] #footer,.wordpress[class*="epc-"] #credits,[class*="epc-"] #footer .wrap .wp-calendar a{background-color:' . $footer_color . '}[class*="epc-"] #footer .wrap{color:' . $footer_subdued. ' !important}[class*="epc-"] #footer .wrap .menu li::before,[class*="epc-"] #footer .wrap .widget li::before{color:' . $footer_icon . ' !important}[class*="epc-"] #footer .wrap a,[class*="epc-"] #footer .wrap .menu li:hover::before,[class*="epc-"] #footer .wrap .widget li:hover::before,[class*="epc-"].zen #footer #menu-secondary a:hover,[class*="epc-"].zen #footer  #menu-secondary li:hover::before,[class*="epc-"].zen #menu-secondary li:hover::before{color:' . $footer_text . ' !important}[class*="epc-"] #footer .wrap .wp-calendar>caption{background-color:' . $footer_subdued_aux . '}[class*="epc-"] #footer .wrap td,[class*="epc-"] #footer .wrap th{border-bottom:1px solid ' . $footer_subdued_aux . '}[class*="epc-"] #footer .wrap .search-field{border:1px solid rgba(0,0,0,.2);background:#fff;box-shadow:0 0 0 0 ' . $footer_subdued_aux . '}[class*="epc-"] #footer .wrap .search-field:hover,[class*="epc-"] #footer .wrap .search-field:focus{border:1px solid rgba(0,0,0,.2);box-shadow:0 0 0 5px ' . $footer_subdued_aux . '}[class*="epc-"] #footer .widget_tag_cloud a{color:#fff !important}[class*="epc-"] #footer #sidebar-footer .widget_social-id a{background:' . $footer_subdued_aux . ';box-shadow: 0 0 0 10px ' . $footer_color . ';border: 1px solid ' . $footer_color . '}[class*="epc-"] #footer #sidebar-footer .widget_social-id a:hover{box-shadow: 0 0 0 10px ' . $footer_subdued . ';border: 1px solid ' . $footer_subdued . '}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_footer_bkg_color );
	}
}


/**
 * Altera a cor de fundo da pagina landing
 *
 * @since   1.2.0
 * @version 1.0.1
 * @return  string
 */
function epico_landing_page_bkg_color() {

	$landing_bkg_color = get_theme_mod( 'epico_landing_bkg_color', '#FFFFFF' );

	if ( ! empty( $landing_bkg_color ) ) {

		$custom_landing_bkg_color = '.page-template-tpl-helper-pb[class*="epc-"],.page-template-tpl-helper-pb-alt[class*="epc-"],.page-template-tpl-helper-min-pb[class*="epc-"],.page-template-landing[class*="epc-"]{background-color:' . $landing_bkg_color . '!important;}.page-template-landing[class*="epc-"] #page,.page-template-tpl-helper-min-pb[class*="epc-"] #page{border-top: none !important}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_landing_bkg_color );
	}
}


/**
 * Altera a cor de fundo da area da imagem de destaque na lista de posts
 *
 * @since   1.9.0
 * @version 1.0.1
 * @return  string
 */
function epico_featured_area_bkg_color() {

	$featured_area_bkg_color = get_theme_mod( 'epico_featured_img_bkg_color', '' );

	$featured_text_color     = epico_readable_color( $featured_area_bkg_color );

	$featured_icon_color     = epico_readable_alt_color( $featured_area_bkg_color );

	if ( ! empty( $featured_area_bkg_color ) ) {

		$custom_featured_bkg_color = '[class*="epc-s"].plural #page article .img-hyperlink, [class*="epc-s"].plural #page article .no-img-hyperlink, [class*="epc-s"].plural #page .format-default .entry-byline{background:' . $featured_area_bkg_color . '}[class*="epc-s"].plural #page article.format-default .entry-byline a{color: ' . $featured_text_color . '}[class*="epc-s"].plural.epc-loop-f #page .format-default .entry-byline .comments-link-wrap::after{background:linear-gradient(to right, ' . epico_color_opacity( $featured_area_bkg_color, 0 ) . ' 10px,' . epico_color_opacity( $featured_area_bkg_color, 1 ) . ' 50px)}[class*="epc-s"].plural #page article.format-default .entry-byline span:hover a{color: ' . epico_color_opacity( $featured_text_color, .5 ) . '}[class*="epc-s"].plural #page article.format-default .entry-byline span{color: ' . epico_color_opacity( $featured_text_color, .5 ) . '}[class*="epc-s"].plural #page .format-default .entry-byline span::before,[class*="epc-s"].plural.epc-loop-c .format-default .entry-byline a::before{color:' . epico_color_opacity( $featured_icon_color, .4 ) . '}[class*="epc-s"].plural #page .format-default .entry-byline span.entry-terms:hover::before,[class*="epc-s"].plural #page .format-default .entry-byline span.comments-link-wrap:hover::before,[class*="epc-s"].plural #page .format-default .entry-byline span.multi-author:hover::before,[class*="epc-s"].plural.epc-loop-c .format-default .entry-byline *:hover::before{color:' . epico_color_opacity( $featured_icon_color, .2 ) . '}[class*="epc-s"].plural.epc-loop-f .format-default .entry-byline>span:nth-child(1n),[class*="epc-s"].plural.epc-loop-c .format-default .entry-byline{border-top:1px solid ' . epico_color_opacity( $featured_icon_color, .1 ) . '}[class*="epc-s"].plural.epc-loop-c .format-default.has-post-thumbnail .entry-byline,[class*="epc-s"].plural.epc-loop-f .format-default.has-post-thumbnail .entry-byline>span:last-child{border-top:0px}@media screen and (min-width: 480px){[class*="epc-s"].plural.epc-loop-c .format-default{background:-webkit-gradient(left top, right top, color-stop(0, ' . $featured_area_bkg_color . '), color-stop(200px, ' . $featured_area_bkg_color . '), color-stop(200px, #FFFFFF), color-stop(100, #FFFFFF));background: linear-gradient(to right, ' . $featured_area_bkg_color . ' 0, ' . $featured_area_bkg_color . ' 200px, #FFFFFF 200px, #FFFFFF 600px);}}@media screen and (min-width: 680px){[class*="epc-s"].plural.epc-loop-c .format-default{background:-webkit-gradient(left top, right top, color-stop(0, ' . $featured_area_bkg_color . '), color-stop(250px, ' . $featured_area_bkg_color . '), color-stop(250px, #FFFFFF), color-stop(100, #FFFFFF));background: linear-gradient(to right, ' . $featured_area_bkg_color . ' 0, ' . $featured_area_bkg_color . ' 250px, #FFFFFF 250px, #FFFFFF 1200px)}}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_featured_bkg_color );
	}
}


/**
 * Altera a cor de fundo da area dos posts nas listagens
 *
 * @since   1.9.0
 * @version 1.0.1
 * @return  string
 */
function epico_posts_list_bkg_color() {

	$posts_bkg_color    = get_theme_mod( 'epico_posts_bkg_color', '#FFFFFF' );

	$featured_bkg_color = get_theme_mod( 'epico_featured_img_bkg_color', '' );

	$color_pallete      = get_theme_mod( 'epico_color_palettes', 0 );

	if ( $featured_bkg_color ) {

		$stop_color = $featured_bkg_color;

	} elseif ( ! $featured_bkg_color && $color_pallete == 0 ) {

		$stop_color = '#d7d3c7';

	} elseif ( ! $featured_bkg_color && $color_pallete > 0 && $color_pallete <= 5 ) {

		$stop_color = '#b3c2c7';

	} else {

		$stop_color = '#dddddd';

	}

	$post_text_color = epico_readable_color( $posts_bkg_color );

	$post_icon_color = epico_readable_alt_color( $posts_bkg_color );

	if ( ! empty( $posts_bkg_color ) && ! in_array( $posts_bkg_color, array( '#FFFFFF','#ffffff' ) ) ) {

		$custom_posts_bkg_color = '[class*="epc-s"].plural article,[class*="epc-s"].plural.epc-meta-text article,[class*="epc-s"].plural.epc-meta-icons article,[class*="epc-s"].plural.epc-meta-none article,[class*="epc-s"].plural article.format-default,[class*="epc-s"].plural #page article.format-default::before,[class*="epc-s"].plural article.format-chat::before,[class*="epc-s"].plural article .more-link span,[class*="epc-s"].plural #page article.format-aside{background:' . $posts_bkg_color . '}.plural:not(.search) article.format-default:not(#post-0):after,.plural article.format-chat:after{background: linear-gradient(rgba(255,255,255,0.001) 0px, ' . $posts_bkg_color . ')}@media screen and (min-width: 480px){[class*="epc-s"].plural.epc-loop-c .format-default{background:-webkit-gradient(left top, right top, color-stop(0, ' . $stop_color . '), color-stop(200px, ' . $stop_color . '), color-stop(200px, ' . $posts_bkg_color . '), color-stop(100, ' . $posts_bkg_color . '));background: linear-gradient(to right, ' . $stop_color . ' 0, ' . $stop_color . ' 200px, ' . $posts_bkg_color . ' 200px, ' . $posts_bkg_color . ' 600px);}}@media screen and (min-width: 680px){[class*="epc-s"].plural.epc-loop-c .format-default{background:-webkit-gradient(left top, right top, color-stop(0, ' . $stop_color . '), color-stop(250px, ' . $stop_color . '), color-stop(250px, ' . $posts_bkg_color . '), color-stop(100, ' . $posts_bkg_color . '));background: linear-gradient(to right, ' . $stop_color . ' 0, ' . $stop_color . ' 250px, ' . $posts_bkg_color . ' 250px, ' . $posts_bkg_color . ' 1200px)}}[class*="epc-s"].plural article .more-link span{box-shadow:0 0 20px 2px ' . $posts_bkg_color . '}[class*="epc-s"].plural article.format-default::after,[class*="epc-s"].plural article.format-chat::after{background:linear-gradient(' . epico_color_opacity( $posts_bkg_color, 0 ) . ' 0px,' . epico_color_opacity( $posts_bkg_color, 1 ) . ')}[class*="epc-s"].plural article .entry-footer,[class*="epc-s"].plural article .entry-content,[class*="epc-s"].plural article .entry-content blockquote p,[class*="epc-s"].plural article .entry-summary,[class*="epc-s"].plural article .entry-summary small:first-child{color: ' . epico_color_opacity( $post_text_color, .6 ) . '}[class*="epc-s"].plural article .entry-summary small:first-child{border-right: 1px solid ' . $post_icon_color . '}[class*="epc-s"].plural .format-aside,[class*="epc-s"].plural .format-status,[class*="epc-s"].plural .format-quote{border-left-color:' . epico_color_opacity( $post_text_color, .2 ) . '}[class*="epc-s"].plural article .entry-footer {border-top: 1px solid ' . epico_color_opacity( $post_icon_color, .3 ) . '}[class*="epc-s"].plural.epc-meta-text .format-default .entry-byline-text .entry-author a,[class*="epc-s"].plural.epc-meta-text .format-default .entry-byline-text .category>a,[class*="epc-s"].plural.epc-meta-text .format-default .entry-byline-text .comments-link-wrap>a{border:1px solid ' . epico_color_opacity( $post_icon_color, .3 ) . '}[class*="epc-s"].plural article .entry-footer a::before,[class*="epc-s"].plural article .entry-footer a::after,[class*="epc-s"].plural article .entry-footer time::before,[class*="epc-s"].plural article .entry-summary small:first-child::before,[class*="epc-s"].plural .format-quote p:first-child::after,[class*="epc-s"].plural .format-quote p:first-child::before,[class*="epc-s"].plural .format-aside p:first-child::before,[class*="epc-s"].plural article .entry-content blockquote p::before,[class*="epc-s"].plural.epc-meta-text .format-default .entry-byline-text .category a:first-child::before,[class*="epc-s"].plural.epc-meta-text .format-default .entry-byline-text .entry-author a::before,[class*="epc-s"].plural.epc-meta-text .format-default .comments-link-wrap a:first-child::before{color:' . epico_color_opacity( $post_icon_color, .4 ) . '}[class*="epc-s"].epc-meta-text #page .entry-byline-text>span a:hover,[class*="epc-s"].epc-meta-text #page .entry-byline-text>span a:active{color:' . epico_color_opacity( $post_icon_color, .2 ) . ';border:1px solid ' . epico_color_opacity( $post_icon_color, .2 ) . '}[class*="epc-s"].plural.epc-meta-text .format-default .entry-byline-text .category a:first-child:hover::before,[class*="epc-s"].plural.epc-meta-text .format-default .comments-link-wrap a:first-child:hover::before{color:' . epico_color_opacity( $post_icon_color, .2 ) . '}[class*="epc-"].plural #page article .entry-title a,[class*="epc-"].plural #page article .entry-byline-text a,[class*="epc-"].plural #page article .more-link span,[class*="epc-"].plural #page article .more-link,[class*="epc-"].plural #main-container article .entry-footer a,[class*="epc-"].plural #main-container article.format-aside .permalink{color:' . $post_text_color . '}[class*="epc-"].plural #page article .entry-title a:hover,[class*="epc-"].plural #page article .more-link:hover,[class*="epc-"].plural #page article .more-link:hover span,[class*="epc-"].plural #main-container article .entry-footer a:hover{color:' . epico_color_opacity( $post_text_color, .5 ) . '}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_posts_bkg_color );
	}
}


/**
 * Altera a cor de fundo da paginação
 *
 * @since   1.9.0
 * @version 1.0.1
 * @return  string
 */
function epico_pagination_bkg_color() {

	$pagination_bkg_color       = get_theme_mod( 'epico_pagination_bkg_color', '#d6d3c7' );

	$pagination_bkg_color_hover = epico_color_lightness( $pagination_bkg_color, 3 );

	$pagination_text_color      = epico_readable_color( $pagination_bkg_color );

	if ( ! empty( $pagination_bkg_color ) && '#d6d3c7' !== $pagination_bkg_color ) {

		$custom_pagination_bkg_color = '[class*="epc-s"].plural .pagination a.page-numbers,[class*="epc-s"].plural .pagination span.dots,[class*="epc-s"].plural .pagination span.dots:hover{color:' . $pagination_text_color . ';background:' . $pagination_bkg_color . '}[class*="epc-s"].plural .pagination a.page-numbers:hover{background:' . $pagination_bkg_color_hover . '}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_pagination_bkg_color );
	}
}


/**
 * Altera a cor de fundo do título das lista de posts adicionais
 *
 * @since   1.9.0
 * @version 1.0.1
 * @return  string
 */
function epico_listings_title_bkg_color() {

	$cat_title_bkg_color      = get_theme_mod( 'epico_cattitle_bkg_color', '#c7d2d4' );

	$cat_title_text_color     = epico_readable_color( $cat_title_bkg_color );

	$cat_title_text_color_alt = epico_readable_alt_color( $cat_title_bkg_color );

	if ( ! empty( $cat_title_bkg_color ) && '#c7d2d4' !== $cat_title_bkg_color ) {

		$custom_cat_title_bkg_color = '[class*="epc-s"].plural .loop-meta{background:' . $cat_title_bkg_color . '}[class*="epc-s"].plural .loop-meta h1,[class*="epc-s"].plural .loop-meta p,[class*="epc-s"].plural #page .loop-meta li::before{color:' . $cat_title_text_color . ';background:' . $cat_title_bkg_color . '}[class*="epc-s"].plural #page .loop-meta a{color:' . $cat_title_text_color_alt . '!important}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_cat_title_bkg_color );
	}
}

/**
 * Altera a imagem de fundo do blog
 *
 * @since   1.10.0
 * @version 1.0.0
 * @return  string
 */
function epico_blog_bkg_image() {

	$blog_bkg_image = get_theme_mod( 'epico_blog_bkg_img', '' );

	if ( ! empty( $blog_bkg_image[ 'background-image' ] ) ) {

		$custom_blog_bkg_image = 'body.epc-custom-bkg,body.epc-custom-bkg.custom-background{background-image:url(' . $blog_bkg_image[ 'background-image' ] . ');background-size:' . $blog_bkg_image[ 'background-size' ] . '!important;background-position:' . $blog_bkg_image[ 'background-position' ] . ';background-repeat:' . $blog_bkg_image[ 'background-repeat' ] . ';background-attachment:' . $blog_bkg_image[ 'background-attachment' ] . '}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_blog_bkg_image );
	}
}


/**
 * Altera a imagem de fundo da área do topo
 *
 * @since   1.10.0
 * @version 1.0.0
 * @return  string
 */
function epico_sitetop_bkg_image() {

	$sitetop_bkg_image = get_theme_mod( 'epico_sitetop_bkg_img', '' );

	if ( ! empty( $sitetop_bkg_image[ 'background-image' ] ) ) {

		$custom_sitetop_bkg_image = '#sidebar-top{background-image:url(' . $sitetop_bkg_image[ 'background-image' ] . ');background-size:' . $sitetop_bkg_image[ 'background-size' ] . '!important;background-position:' . $sitetop_bkg_image[ 'background-position' ] . ';background-repeat:' . $sitetop_bkg_image[ 'background-repeat' ] . ';background-attachment:' . $sitetop_bkg_image[ 'background-attachment' ] . '}#header{border:none}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_sitetop_bkg_image );
	}
}


/**
 * Altera a imagem de fundo do cabecalho
 *
 * @since   1.10.0
 * @version 1.0.0
 * @return  string
 */
function epico_header_bkg_image() {

	$header_bkg_image = get_theme_mod( 'epico_header_bkg_img', '' );

	if ( ! empty( $header_bkg_image[ 'background-image' ] ) ) {

		$custom_header_bkg_image = '#header{background-image:url(' . $header_bkg_image[ 'background-image' ] . ');background-size:' . $header_bkg_image[ 'background-size' ] . '!important;background-position:' . $header_bkg_image[ 'background-position' ] . ';background-repeat:' . $header_bkg_image[ 'background-repeat' ] . ';background-attachment:' . $header_bkg_image[ 'background-attachment' ] . '}@media screen and (min-width:680px){#header #search-toggle,#header #menu-primary-items a:hover{background:transparent}}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_header_bkg_image );
	}
}


/**
 * Altera a imagem de fundo do pré-rodapé
 *
 * @since   1.10.0
 * @version 1.0.0
 * @return  string
 */
function epico_prefooter_bkg_image() {

	$prefooter_bkg_image = get_theme_mod( 'epico_prefooter_bkg_img', '' );

	if ( ! empty( $prefooter_bkg_image[ 'background-image' ] ) ) {

		$custom_prefooter_bkg_image = '#sidebar-subsidiary{background-image:url(' . $prefooter_bkg_image[ 'background-image' ] . ');background-size:' . $prefooter_bkg_image[ 'background-size' ] . '!important;background-position:' . $prefooter_bkg_image[ 'background-position' ] . ';background-repeat:' . $prefooter_bkg_image[ 'background-repeat' ] . ';background-attachment:' . $prefooter_bkg_image[ 'background-attachment' ] . '}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_prefooter_bkg_image );
	}
}


/**
 * Altera a imagem de fundo do rodapé
 *
 * @since   1.10.0
 * @version 1.0.0
 * @return  string
 */
function epico_footer_bkg_image() {

	$footer_bkg_image = get_theme_mod( 'epico_footer_bkg_img', '' );

	if ( ! empty( $footer_bkg_image[ 'background-image' ] ) ) {

		$custom_footer_bkg_image = '[class*="epc-"] #footer{background-image:url(' . $footer_bkg_image[ 'background-image' ] . ');background-size:' . $footer_bkg_image[ 'background-size' ] . '!important;background-position:' . $footer_bkg_image[ 'background-position' ] . ';background-repeat:' . $footer_bkg_image[ 'background-repeat' ] . ';background-attachment:' . $footer_bkg_image[ 'background-attachment' ] . '}[class*="epc-"] #credits{background-color:transparent}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_footer_bkg_image );
	}
}


/**
 * Altera a imagem de fundo da pagina landing
 *
 * @since   1.2.0
 * @version 1.0.1
 * @return  string
 */
function epico_landing_page_bkg_image() {

	$landing_bkg_image = get_theme_mod( 'epico_landing_bkg_img', '' );

	if ( ! empty( $landing_bkg_image['background-image'] ) ) {

		$custom_landing_bkg_image = '.page-template-landing[class*="epc-"]{background-image: url("' . $landing_bkg_image['background-image'] . '");background-size:' . $landing_bkg_image['background-size'] . '!important;background-position:' . $landing_bkg_image['background-position'] . ';background-repeat:' . $landing_bkg_image['background-repeat'] . ';background-attachment:' . $landing_bkg_image['background-attachment'] . '}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_landing_bkg_image );
	}
}


/**
 * Altera a imagem de fundo da pagina landing
 *
 * @since   1.2.0
 * @version 1.0.1
 * @return  string
 */
function epico_post_title_bkg_image() {

	global $post;

	$featured_bkg_post_title = get_theme_mod( 'epico_post_title_bkg_img', 0 );

	if ( 1 == $featured_bkg_post_title && has_post_thumbnail( $post->ID ) ) {

		$post_bkg_image_wide       = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'epico-wide' );

		$post_bkg_image_large      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'epico-large' );

		$post_bkg_image_medium     = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'epico-medium' );

		$post_bkg_image_small      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'epico-small' );

		$post_bkg_image_tiny       = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'epico-tiny' );

		$post_bkg_image_wide_url   = $post_bkg_image_wide[0];

		$post_bkg_image_large_url  = $post_bkg_image_large[0];

		$post_bkg_image_medium_url = $post_bkg_image_medium[0];

		$post_bkg_image_small_url  = $post_bkg_image_small[0];

		$post_bkg_image_tiny_url   = $post_bkg_image_tiny[0];

		$custom_post_title_bkg_image  = '.singular-post .entry-title{padding:3rem;background:url(' . $post_bkg_image_small_url . ') no-repeat center center;background-size:cover;color:#fff;display:flex;align-items:center;justify-content:center;min-height:20rem}@media only screen and (min-width:480px){.singular-post .entry-title{text-shadow:0 0 40px rgba(55,71,78,0.2),0 0 5px rgba(55,71,78,0.3),0 0 1px rgba(55,71,78,0.3);background-image:url(' . $post_bkg_image_medium_url . ');min-height:25rem}}@media only screen and (min-width:680px){.singular-post .entry-title{background-image:url(' . $post_bkg_image_large_url . ');min-height:30rem}}@media only screen and (min-width:1020px){.singular-post .entry-title{background-image:url(' . $post_bkg_image_wide_url . ');min-height:35rem}}@media only screen and (min-width:1220px){.singular-post .entry-title{min-height:30rem}}@media only screen and (min-width:1410px){.singular-post .entry-title{min-height:35rem}}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_post_title_bkg_image );
	}
}


/**
 * Adiciona estilos de tipografia de acordo com a selecao no painel
 *
 * @since   1.5.0
 * @version 1.0.0
 * @return  string
 */
function epico_typography() {

	$title_font = get_theme_mod( 'epico_typography', 1 );
	$text_font  = get_theme_mod( 'epico_typography_text', 1 );

	// Fontes de titulo adicionais
	if ( 3 == $title_font ) {

		// Playfair
		$custom_title_font = '.epc-pf h1,.epc-pf h2,.epc-pf h3,.epc-pf h4,.epc-pf h5,.epc-pf h6,.epc-pf #site-title,.epc-pf .widget-title,.epc-pf .widgettitle,.epc-pf .capture-title,.epc-pf #sidebar-primary section[class*="epico_pages"] a,.epc-pf #sidebar-primary section[class*="epico_links"] a{font-family:Playfair Display,Helvetica Neue,Helvetica,Arial,sans-serif;font-weight:300!important}.epc-pf h1{font-size:2.6rem}.epc-pf h2{font-size:1.9rem}.epc-pf h3{font-size:1.5rem}.epc-pf h4{font-size:1.3rem}.epc-pf h5{font-size:1.125rem}.epc-pf h6{font-size:.88889rem}.epc-pf .widget h3{font-size:1.42383rem}';

	} else if ( 4 == $title_font ) {

		// Roboto Sans
		$custom_title_font = '.epc-bt h1,.epc-bt h2,.epc-bt h3,.epc-bt h4,.epc-bt h5,.epc-bt h6,.epc-bt #site-title,.epc-bt .widget-title,.epc-bt .widgettitle,.epc-bt .capture-title,.epc-bt #sidebar-primary section[class*="epico_pages"] a,.epc-bt #sidebar-primary section[class*="epico_links"] a{font-family:Bitter,Georgia,serif;font-weight:400!important}.epc-bt h1{font-size:2.4rem}.epc-bt h2{font-size:1.8rem}.epc-bt h3{font-size:1.4rem}.epc-bt h4{font-size:1.2rem}.epc-bt h5{font-size:1rem}.epc-bt h6{font-size:.8rem}.epc-bt .widget h3{font-size:1.42383rem}.epc-bt .epico-related-posts>h3.epico-related-posts-title,.epc-bt #respond #reply-title{font-size:1.60203rem}';

	} else if ( 5 == $title_font ) {

		// Noto Serif
		$custom_title_font = '.epc-ns h1,.epc-ns h2,.epc-ns h3,.epc-ns h4,.epc-ns h5,.epc-ns h6,.epc-ns #site-title,.epc-ns .widget-title,.epc-ns .widgettitle,.epc-ns .capture-title,.epc-ns #sidebar-primary section[class*="epico_pages"] a,.epc-ns #sidebar-primary section[class*="epico_links"] a{font-family:Noto Serif,Georgia,serif;font-weight:300!important}.epc-ns h1{font-size:2.45rem}.epc-ns h2{font-size:1.8rem}.epc-ns h3{font-size:1.38rem}.epc-ns h4{font-size:1.22rem}.epc-ns h5{font-size:1rem}.epc-ns h6{font-size:.8rem}.epc-ns .widget h3{font-size:1.42383rem}.epc-ns .epico-related-posts>h3.epico-related-posts-title,.epc-ns #respond #reply-title{font-size:1.60203rem}@media only screen and (min-width:520px){.epc-ns #site-title{font-size:2.26578rem}}@media only screen and (min-width:1410px){.epc-ns .capture-wrap.fw .capture .capture-title{font-size:44px}}';

	} else if ( 6 == $title_font ) {

		// System font
		$custom_title_font = '.epc-sys h1,.epc-sys h2,.epc-sys h3,.epc-sys h4,.epc-sys h5,.epc-sys h6,.epc-sys #site-title,.epc-sys .widget-title,.epc-sys .widgettitle,.epc-sys .capture-title,.epc-sys .capture-title.uf-title-inner,.epc-sys #sidebar-primary section[class*="epico_pages"] a,.epc-sys #sidebar-primary section[class*="epico_links"] a{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;font-weight:300!important}';

	} else {

		$custom_title_font = NULL;
	}

	// Fontes de texto adicionais
	if ( 1 == $text_font ) {

		// Noto Serif
		$custom_text_font = '.epc-nst,.epc-nst label,.epc-nst textarea,.epc-nst input:not([type=submit]):not([type=radio]):not([type=checkbox]):not([type=file]),.epc-nst select[multiple=multiple],.epc-nst.epc-button,.epc-nst input[type="submit"],.epc-nst a.uf-button,button.uf-button,.epc-nst .not-found input.search-submit[type="submit"],.epc-nst #nav input.search-submit[type="submit"],.epc-nst #comments .comment-reply-link,.epc-nst #comments .comment-reply-login,.epc-nst .widget_epico_author-id a[class*="button"],.epc-nst.wordpress div.uberaviso a[class*="button"],.epc-nst.wordpress .mejs-controls a:focus>.mejs-offscreen,.epc-nst .format-quote p:first-child::before,.epc-nst .format-quote p:first-child::after,.epc-nst .epico-related-posts h4.related-post-title,.epc-nst .placeholder,.epc-nst .editor-tag{font-family:Noto Serif,Georgia,serif}.epc-nst li.fa,.epc-nst li.fa::before,.epc-nst .fa,.epc-nst textarea.fa,.epc-nst input:not([type=submit]):not([type=radio]):not([type=checkbox]):not([type=file]).fa,.epc-nst .not-found input.search-submit[type="submit"],.epc-nst #search-wrap input.fa[type="search"],.epc-nst #nav input.search-submit[type="submit"],.epc-nst #respond #submit,.epc-nst .capture-wrap form input[class*="uf-"]{font-family:FontAwesome,Noto Serif,Georgia,serif!important}.epc-nst main{font-size:.9rem}.epc-nst #menu-primary li a,.epc-nst .author-profile,.epc-nst .nav-posts span,.epc-nst #sidebar-promo-inner .widget,.epc-nst #branding,.epc-nst #sidebar-footer .widget{font-size:.78889rem}.epc-nst .entry-byline>*,.epc-nst .entry-footer>*{font-size:.69012rem}.epc-nst #sidebar-primary section[class*="epico_pages"] li>a:first-child,.epc-nst #sidebar-primary section[class*="epico_links"] li>a:first-child{font-size:1.06563rem}.epc-nst .widget h3,.epc-nst .widget_social-id h3{font-size:1.30181rem}.epc-nst textarea,.epc-nst input:not([type=submit]):not([type=radio]):not([type=checkbox]):not([type=file]){font-size:.9rem}.epc-nst .nav-posts{font-size:1.025rem}.epc-nst #sidebar-top .widget,.epc-nst #breadcrumbs nav,.epc-nst .credit{font-size:.69012rem}.epc-nst .uberaviso{font-size:16px}@media only screen and (min-width:480px){.epc-nst .epico-related-posts h4.related-post-title{font-size:.9rem}}@media only screen and (min-width:680px){.epc-nst #sidebar-primary .widget,.epc-nst #after-primary,.epc-nst #sidebar-promo-home .widget,.epc-nst #sidebar-subsidiary .widget,.epc-nst #sidebar-before-content .widget,.epc-nst #after-primary .widget{font-size:.78889rem}.epc-nst #search-toggle::after{top:1px}}@media only screen and (min-width:1020px){.epc-nst.gecko #search-toggle::before,.epc-nst.ie #search-toggle::before{top:30px}.epc-nst .capture-wrap.fw .capture .capture-intro{font-size:19px}}@media only screen and (min-width:1410px){.epc-nst.gecko #search-toggle::before,.epc-nst.ie #search-toggle::before{top:33px}.epc-nst .capture-wrap.fw .capture .capture-notice{font-size:13px}.epc-nst .capture-wrap.fw.ip .capture .uf-fields .capture-notice{font-size:24px}.epc-nst #search-toggle::after{top:0}}@media only screen and (max-width:680px){.epc-nst #search-toggle::after{right:19px}.epc-nst #menu-primary li a{font-size:1.125rem}.epc-nst #menu-primary li ul a{font-size:0.88889rem}}@media only screen and (max-width:480px){.epc-nst #search-toggle::after{right:20px}}';

	} else if ( 2 == $text_font ) {

		// Proza Libre
		$custom_text_font = '.epc-plt,.epc-plt label,.epc-plt textarea,.epc-plt input:not([type=submit]):not([type=radio]):not([type=checkbox]):not([type=file]),.epc-plt select[multiple=multiple],.epc-plt.epc-button,input[type="submit"],.epc-plt a.uf-button,button.uf-button,.epc-plt .not-found input.search-submit[type="submit"],.epc-plt #nav input.search-submit[type="submit"],.epc-plt #comments .comment-reply-link,.epc-plt #comments .comment-reply-login,.epc-plt .widget_epico_author-id a[class*="button"],.epc-plt.wordpress div.uberaviso a[class*="button"],.epc-plt.wordpress .mejs-controls a:focus>.mejs-offscreen,.epc-plt .format-quote p:first-child::before,.epc-plt .format-quote p:first-child::after,.epc-plt .epico-related-posts h4.related-post-title,.epc-plt .placeholder,.epc-plt .editor-tag,.comment-moderation{font-family:Proza Libre,Georgia,serif}.epc-plt li.fa,.epc-plt li.fa::before,.epc-plt .fa,.epc-plt textarea.fa,.epc-plt input:not([type=submit]):not([type=radio]):not([type=checkbox]):not([type=file]).fa,.epc-plt .not-found input.search-submit[type="submit"],.epc-plt #search-wrap input.fa[type="search"],.epc-plt #nav input.search-submit[type="submit"],.epc-plt #respond #submit,.epc-plt .capture-wrap form input[class*="uf-"]{font-family:FontAwesome,Proza Libre,Georgia,serif!important}.epc-plt main{font-size:.9rem}.epc-plt #menu-primary li a,.epc-plt .author-profile,.epc-plt .nav-posts span,.epc-plt #sidebar-promo-inner .widget,.epc-plt #branding,.epc-plt #sidebar-footer .widget{font-size:.78889rem}.epc-plt .entry-byline>*,.epc-plt .entry-footer>*{font-size:.69012rem}.epc-plt #sidebar-primary section[class*="epico_pages"] li>a:first-child,.epc-plt #sidebar-primary section[class*="epico_links"] li>a:first-child{font-size:1.06563rem}.epc-plt .widget h3,.epc-plt .widget_social-id h3{font-size:1.30181rem}.epc-plt textarea,.epc-plt input:not([type=submit]):not([type=radio]):not([type=checkbox]):not([type=file]){font-size:.9rem}.epc-plt .nav-posts{font-size:1.025rem}.epc-plt #sidebar-top .widget,.epc-plt #breadcrumbs nav,.epc-plt .credit{font-size:.69012rem}.epc-plt .uberaviso{font-size:16px}@media only screen and (min-width:480px){.epc-plt .epico-related-posts h4.related-post-title{font-size:.9rem}}@media only screen and (min-width:680px){.epc-plt #sidebar-primary .widget,.epc-plt #after-primary,.epc-plt #sidebar-promo-home .widget,.epc-plt #sidebar-subsidiary .widget,.epc-plt #sidebar-before-content .widget,.epc-plt #after-primary .widget{font-size:.78889rem}.epc-plt #search-toggle::after{top:-1px}}@media only screen and (min-width:1020px){.epc-plt.gecko #search-toggle::before,.epc-plt.ie #search-toggle::before{top:30px}.epc-plt .capture-wrap.fw .capture .capture-intro{font-size:19px}}@media only screen and (min-width:1410px){.epc-plt.gecko #search-toggle::before,.epc-plt.ie #search-toggle::before{top:31px}.epc-plt .capture-wrap.fw .capture .capture-notice{font-size:13px}.epc-plt .capture-wrap.fw.ip .capture .uf-fields .capture-notice{font-size:24px}.epc-plt #search-toggle::after{top:-2px}}@media only screen and (max-width:680px){.epc-plt #menu-primary li a{font-size:1.125rem}.epc-plt #menu-primary li ul a{font-size:0.88889rem}.epc-plt #search-toggle::after{right:22px}}@media only screen and (max-width:480px){.epc-plt #search-toggle::after{right:23px}}';

	} else if ( 3 == $text_font ) {

		// System font
		$custom_text_font = '.epc-syst,.epc-syst label,.epc-syst textarea,.epc-syst input:not([type=submit]):not([type=radio]):not([type=checkbox]):not([type=file]),.epc-syst select[multiple=multiple],.epc-syst.epc-button,.epc-syst input[type="submit"],.epc-syst a.uf-button,button.uf-button,.epc-syst .not-found input.search-submit[type="submit"],.epc-syst #nav input.search-submit[type="submit"],.epc-syst #comments .comment-reply-link,.epc-syst #comments .comment-reply-login,.epc-syst .widget_epico_author-id a[class*="button"],.epc-syst.wordpress div.uberaviso a[class*="button"],.epc-syst.wordpress .mejs-controls a:focus>.mejs-offscreen,.epc-syst .format-quote p:first-child::before,.epc-syst .format-quote p:first-child::after,.epc-syst .epico-related-posts h4.related-post-title,.epc-syst .placeholder,.epc-syst .editor-tag,.epc-syst .uf-title-inner{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif}.epc-syst li.fa,.epc-syst li.fa::before,.epc-syst .fa,.epc-syst textarea.fa,.epc-syst input:not([type=submit]):not([type=radio]):not([type=checkbox]):not([type=file]).fa,.epc-syst .not-found input.search-submit[type="submit"],.epc-syst #search-wrap input.fa[type="search"],.epc-syst #nav input.search-submit[type="submit"],.epc-syst #respond #submit,.epc-syst .capture-wrap form input[class*="uf-"]{font-family:FontAwesome,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif!important}';

	} else {

		$custom_text_font = NULL;
	}

	// Adiciona os estilos de tipografia inline (depende da folha de estilos principal ter sido carregada)

	if ( ! empty( $custom_title_font ) ) {

		wp_add_inline_style( 'style', $custom_title_font );
	}

	if ( ! empty( $custom_text_font ) ) {

		wp_add_inline_style( 'style', $custom_text_font );
	}
}


/**
 * Corrige espacamentos dos botoes no mobile de acordo com as opcoes ativadas
 *
 * @since   1.5.0
 * @version 1.0.0
 * @return  string
 */
function epico_social_total_parcial() {

	$social_total         = get_theme_mod( 'epico_socialcounter', 1 );

	$social_parcial       = get_theme_mod( 'epico_socialpartialcount', 1 );

	$social_btn_facebook  = get_theme_mod( 'epico_socialfacebook', 1 );

	$social_btn_twitter   = get_theme_mod( 'epico_socialtwitter', 1 );

	$social_btn_pinterest = get_theme_mod( 'epico_socialpinterest', 1 );

	$social_btn_linkedin  = get_theme_mod( 'epico_sociallinkedin', 1 );

	$social_btn_whatsapp  = get_theme_mod( 'epico_socialwhatsapp', 1 );

	// Soma a quantidade de botoes
	$social_button_sum = $social_btn_facebook + $social_btn_twitter + $social_btn_pinterest + $social_btn_linkedin + $social_btn_whatsapp;

	// Entre 3 e 4 botoes: ajusta espacamentos e mantem contadores parciais
	if ( 0 == $social_total && 1 == $social_parcial && $social_button_sum >= 2 && $social_button_sum <= 3 ) {

		$custom_social_total_parcial = '@media screen and (max-width:420px){.social-bar{padding:1.6rem .5rem}.social-likes__counter{padding:0 .4em}.social-likes__button,.social-likes__icon{width:1.8em}.social-total-shares{right:-15px}.social-likes+.social-total-shares{margin:0;padding:0 5px}#social-bar-sticky #social-close{right:-23px;position:relative}.sticky-active .social-likes{position:relative;left:-20px}.sticky-active .social-total-shares{right:0}.sticky-active #social-bar-sticky #social-close{right:10px}}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_social_total_parcial );

		// Entre 2 e 3 botoes: ajusta espacamentos e mantem contadores parciais + totais
	} else if ( 1 == $social_total && 1 == $social_parcial && $social_button_sum >= 2 && $social_button_sum <= 3 ) {

		$custom_social_total_parcial = '@media screen and (max-width:420px){.social-bar{padding:1.6rem .5rem}.social-likes__counter{padding:0 .5em}.social-likes__button,.social-likes__icon{width:1.5em}.social-total-shares{right:-15px}.social-likes+.social-total-shares{margin:0;padding:0 5px}#social-bar-sticky #social-close{right:-23px;position:relative}.sticky-active .social-likes{position:relative;left:-20px}.sticky-active .social-total-shares{right:0}.sticky-active #social-bar-sticky #social-close{right:5px}}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_social_total_parcial );

		// Remove contadores parciais se houver + de 3 botoes e mantem totais
	} else if ( ( 1 == $social_total || 0 == $social_total ) && 1 == $social_parcial && $social_button_sum > 3 ) {

		$custom_social_total_parcial = '@media screen and (max-width:420px){.social-likes__counter{display:none}.sticky-active .social-total-shares{right:0}.sticky-active #social-bar-sticky #social-close{right:5px}}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_social_total_parcial );
	}
}


/**
 * Adiciona largura total às barras primaria, antes e após dos artigos
 *
 * @since   1.10.0
 * @version 1.0.0
 * @return  string
 */
function epico_full_width_primary() {

	$full_width_primary = get_theme_mod( 'epico_full_width_primary', 0 );

	if ( 1 == $full_width_primary ) {

		$custom_full_width_primary = '.epc-no-sdbr.epc-full-prim #sidebar-primary,.epc-no-sdbr.epc-full-prim #sidebar-after-primary,.page-template-full.epc-full-prim #sidebar-primary,.page-template-full.epc-full-prim #sidebar-after-primary,.post-template-page-full.epc-full-prim #sidebar-primary,.post-template-page-full.epc-full-prim #sidebar-after-primary{width:100vw!important;margin-left:calc((-100vw + 100%)/2)}.epc-full-prim #main-container .sidebar section[class^="widget"],.epc-no-sdbr.epc-full-prim #main-container #sidebar-after-primary section[class^="widget"],.epc-no-sdbr.epc-full-prim .sb.capture-wrap,.page-template-full.epc-no-sdbr.epc-full-prim #main-container .sidebar section[class^="widget"],.page-template-full.epc-full-prim #main-container #sidebar-after-primary section[class^="widget"],.page-template-full.epc-full-prim .sb.capture-wrap,.post-template-page-full.epc-full-prim #main-container .sidebar section[class^="widget"],.post-template-page-full.epc-full-prim #main-container #sidebar-after-primary section[class^="widget"],.post-template-page-full.epc-full-prim .sb.capture-wrap{border-radius:0}';

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_full_width_primary );
	}
}


/**
 * Adiciona os estilos CSS personalizados do painel
 *
 * @since   1.7.12
 * @version 1.0.0
 * @return  string
 */
function epico_custom_css() {

	$custom_css_styles         = get_theme_mod( 'epico_custom_css' );
	$custom_css_styles_decoded = wp_specialchars_decode( $custom_css_styles, ENT_QUOTES );

	if ( ! empty( $custom_css_styles_decoded ) ) {

		// Adiciona o estilo inline (depende da folha de estilos principal ter sido carregada)
		wp_add_inline_style( 'style', $custom_css_styles_decoded );
	}
}
