<?php
/**
 * Opcoes do customizador avancado
 */

// Finaliza se o customizador nao estiver instalado
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

if ( is_customize_preview() ) {
	load_theme_textdomain( 'epico', get_template_directory().'/languages' );
}

// Define opcoes gerais do painel
function epico_customizer_config( $config ) {
	return wp_parse_args( array(
		'logo_image'  => get_template_directory_uri() . '/img/logo.png',
		'description' => esc_attr__( 'O tema Épico, da Uberfácil, é a solução ideal para você criar o seu blog profissional! Neste painel você encontra todas as opções para personalizar o seu Épico como achar melhor!', 'epico' ),
	), $config );
}

add_filter( 'kirki/config', 'epico_customizer_config' );

// Adiciona as traducoes especificas do framework
add_filter( 'kirki/epico_theme/l10n', function( $l10n ) {
	$l10n['background-color']      = esc_attr__( 'Background Color', 'epico');
	$l10n['background-image']      = esc_attr__( 'Background Image', 'epico');
	$l10n['no-repeat']             = esc_attr__( 'No Repeat', 'epico');
	$l10n['repeat-all']            = esc_attr__( 'Repeat All', 'epico');
	$l10n['repeat-x']              = esc_attr__( 'Repeat Horizontally', 'epico');
	$l10n['repeat-y']              = esc_attr__( 'Repeat Vertically', 'epico');
	$l10n['inherit']               = esc_attr__( 'Inherit', 'epico');
	$l10n['background-repeat']     = esc_attr__( 'Background Repeat', 'epico');
	$l10n['cover']                 = esc_attr__( 'Cover', 'epico');
	$l10n['contain']               = esc_attr__( 'Contain', 'epico');
	$l10n['background-size']       = esc_attr__( 'Background Size', 'epico');
	$l10n['fixed']                 = esc_attr__( 'Fixed', 'epico');
	$l10n['scroll']                = esc_attr__( 'Scroll', 'epico');
	$l10n['background-attachment'] = esc_attr__( 'Background Attachment', 'epico');
	$l10n['left-top']              = esc_attr__( 'Left Top', 'epico');
	$l10n['left-center']           = esc_attr__( 'Left Center', 'epico');
	$l10n['left-bottom']           = esc_attr__( 'Left Bottom', 'epico');
	$l10n['right-top']             = esc_attr__( 'Right Top', 'epico');
	$l10n['right-center']          = esc_attr__( 'Right Center', 'epico');
	$l10n['right-bottom']          = esc_attr__( 'Right Bottom', 'epico');
	$l10n['center-top']            = esc_attr__( 'Center Top', 'epico');
	$l10n['center-center']         = esc_attr__( 'Center Center', 'epico');
	$l10n['center-bottom']         = esc_attr__( 'Center Bottom', 'epico');
	$l10n['background-position']   = esc_attr__( 'Background Position', 'epico');
	$l10n['background-opacity']    = esc_attr__( 'Background Opacity', 'epico');
	$l10n['on']                    = esc_attr__( 'On', 'epico');
	$l10n['off']                   = esc_attr__( 'Off', 'epico');
	$l10n['all']                   = esc_attr__( 'All', 'epico');
	$l10n['cyrillic']              = esc_attr__( 'Cyrillic', 'epico');
	$l10n['cyrillic-ext']          = esc_attr__( 'Cyrillic Extended', 'epico');
	$l10n['devanagari']            = esc_attr__( 'Devanagari', 'epico');
	$l10n['greek']                 = esc_attr__( 'Greek', 'epico');
	$l10n['greek-ext']             = esc_attr__( 'Greek Extended', 'epico');
	$l10n['khmer']                 = esc_attr__( 'Khmer', 'epico');
	$l10n['latin']                 = esc_attr__( 'Latin', 'epico');
	$l10n['latin-ext']             = esc_attr__( 'Latin Extended', 'epico');
	$l10n['vietnamese']            = esc_attr__( 'Vietnamese', 'epico');
	$l10n['hebrew']                = esc_attr__( 'Hebrew', 'epico');
	$l10n['arabic']                = esc_attr__( 'Arabic', 'epico');
	$l10n['bengali']               = esc_attr__( 'Bengali', 'epico');
	$l10n['gujarati']              = esc_attr__( 'Gujarati', 'epico');
	$l10n['tamil']                 = esc_attr__( 'Tamil', 'epico');
	$l10n['telugu']                = esc_attr__( 'Telugu', 'epico');
	$l10n['thai']                  = esc_attr__( 'Thai', 'epico');
	$l10n['serif']                 = _x( 'Serif', 'font style', 'epico');
	$l10n['sans-serif']            = _x( 'Sans Serif', 'font style', 'epico');
	$l10n['monospace']             = _x( 'Monospace', 'font style', 'epico');
	$l10n['font-family']           = esc_attr__( 'Font Family', 'epico');
	$l10n['font-size']             = esc_attr__( 'Font Size', 'epico');
	$l10n['font-weight']           = esc_attr__( 'Font Weight', 'epico');
	$l10n['line-height']           = esc_attr__( 'Line Height', 'epico');
	$l10n['font-style']            = esc_attr__( 'Font Style', 'epico');
	$l10n['letter-spacing']        = esc_attr__( 'Letter Spacing', 'epico');
	$l10n['top']                   = esc_attr__( 'Top', 'epico');
	$l10n['bottom']                = esc_attr__( 'Bottom', 'epico');
	$l10n['left']                  = esc_attr__( 'Left', 'epico');
	$l10n['right']                 = esc_attr__( 'Right', 'epico');
	$l10n['color']                 = esc_attr__( 'Color', 'epico');
	$l10n['add-image']             = esc_attr__( 'Add Image', 'epico');
	$l10n['change-image']          = esc_attr__( 'Change Image', 'epico');
	$l10n['remove']                = esc_attr__( 'Remove', 'epico');
	$l10n['no-image-selected']     = esc_attr__( 'No Image Selected', 'epico');
	$l10n['select-font-family']    = esc_attr__( 'Select a font-family', 'epico');
	$l10n['variant']               = esc_attr__( 'Variant', 'epico');
	$l10n['subsets']               = esc_attr__( 'Subset', 'epico');
	$l10n['size']                  = esc_attr__( 'Size', 'epico');
	$l10n['height']                = esc_attr__( 'Height', 'epico');
	$l10n['spacing']               = esc_attr__( 'Spacing', 'epico');
	$l10n['ultra-light']           = esc_attr__( 'Ultra-Light 100', 'epico');
	$l10n['ultra-light-italic']    = esc_attr__( 'Ultra-Light 100 Italic', 'epico');
	$l10n['light']                 = esc_attr__( 'Light 200', 'epico');
	$l10n['light-italic']          = esc_attr__( 'Light 200 Italic', 'epico');
	$l10n['book']                  = esc_attr__( 'Book 300', 'epico');
	$l10n['book-italic']           = esc_attr__( 'Book 300 Italic', 'epico');
	$l10n['regular']               = esc_attr__( 'Normal 400', 'epico');
	$l10n['italic']                = esc_attr__( 'Normal 400 Italic', 'epico');
	$l10n['medium']                = esc_attr__( 'Medium 500', 'epico');
	$l10n['medium-italic']         = esc_attr__( 'Medium 500 Italic', 'epico');
	$l10n['semi-bold']             = esc_attr__( 'Semi-Bold 600', 'epico');
	$l10n['semi-bold-italic']      = esc_attr__( 'Semi-Bold 600 Italic', 'epico');
	$l10n['bold']                  = esc_attr__( 'Bold 700', 'epico');
	$l10n['bold-italic']           = esc_attr__( 'Bold 700 Italic', 'epico');
	$l10n['extra-bold']            = esc_attr__( 'Extra-Bold 800', 'epico');
	$l10n['extra-bold-italic']     = esc_attr__( 'Extra-Bold 800 Italic', 'epico');
	$l10n['ultra-bold']            = esc_attr__( 'Ultra-Bold 900', 'epico');
	$l10n['ultra-bold-italic']     = esc_attr__( 'Ultra-Bold 900 Italic', 'epico');
	$l10n['invalid-value']         = esc_attr__( 'Invalid Value', 'epico');
	$l10n['select-file']           = esc_attr__( 'Select File', 'epico');
	$l10n['reset']                 = esc_attr__( '%s Reset', 'epico');
	$l10n['no-file-selected']      = esc_attr__( 'No File Selected', 'epico');


	return $l10n;
} );

// Agrupa configuracoes compartilhadas para evitar duplicidade
Kirki::add_config( 'epico_config', array(
	'capability'     => 'edit_theme_options',
	'option_type'    => 'theme_mod',
	'disable_output' => true,
	)
);


// /* Inclui as secoes e campos do painel */
include_once( $epico_dir . '/lib/kirki/epico-panels/branding.php' );
include_once( $epico_dir . '/lib/kirki/epico-panels/layout.php'   );
include_once( $epico_dir . '/lib/kirki/epico-panels/social.php'   );
include_once( $epico_dir . '/lib/kirki/epico-panels/footer.php'   );
include_once( $epico_dir . '/lib/kirki/epico-panels/advanced.php' );
