<?php

/**
 * Processa e envia os dados para o Infusionsoft via API.
 *
 * @author  Marcio Duarte
 * @since   1.10.0
 * @license GPL-2.0+
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

// Inclui o SDK.
if ( ! class_exists( 'Infusionsoft_Classloader') ) {
    require_once( 'infusionsoft/infusionsoft.php' );
}

// Recebe os dados do formulário e envia para processamento.
add_action( 'admin_post_nopriv_is_api_send', 'epico_is_api_send' );
add_action( 'admin_post_is_api_send', 'epico_is_api_send' );

function epico_is_api_send() {

	//Obtém os dados básicos enviados pelo formulário no front-end.
	$email     = $_POST[ 'is-email' ];
	$name      = ( isset( $_POST[ 'is-name' ] ) ? $_POST[ 'is-name' ] : '' );
	$gdpr      = ( isset( $_POST[ 'gdpr' ] ) ? $_POST[ 'gdpr' ] : '' );
	$widget_id = $_POST[ 'wid' ];

	// Obtém os dados necessários à API a partir da instância do widget.
	$widget_number    = absint( preg_replace( '/[^0-9]/', '', $widget_id ) );
	$widget_instances = get_option( 'widget_epico_capture_widget-id' );
	$widget_data      = $widget_instances[ $widget_number ];
	$appid            = $widget_data[ 'webform_id' ];
	$apikey           = $widget_data[ 'api_key' ];
	$redirect         = ( ! empty( $widget_data[ 'redirect_url' ] ) ? $widget_data[ 'redirect_url' ] : get_home_url() );

	// Nomes dos campos UTM personalizados configurados no painel do Épico.
	$source_field     = get_theme_mod( 'epico_utm_source',       'utm_source' );
	$medium_field     = get_theme_mod( 'epico_utm_medium',       'utm_medium' );
	$campaign_field   = get_theme_mod( 'epico_utm_campaign',     'utm_campaign' );
	$content_field    = get_theme_mod( 'epico_utm_content',      'utm_content' );
	$term_field       = get_theme_mod( 'epico_utm_term',         'utm_term' );
	$affiliate_field  = get_theme_mod( 'epico_affiliate',        'affiliate' );
	$landing_field    = get_theme_mod( 'epico_initial_landing',  'initial_landing' );
	$ireferrer_field  = get_theme_mod( 'epico_initial_referrer', 'initial_referrer' );
	$lreferrer_field  = get_theme_mod( 'epico_last_referrer',    'last_referrer' );
	$visits_field     = get_theme_mod( 'epico_visits',           'visits' );

	// Valores dos parâmetros UTM opcionais definidos no front-end.
	$source_value     = ( isset( $_POST[ $source_field ] )     ? $_POST[ $source_field ] : '' );
	$medium_value     = ( isset( $_POST[ $medium_field ] )     ? $_POST[ $medium_field ] : '' );
	$campaign_value   = ( isset( $_POST[ $campaign_field ] )   ? $_POST[ $campaign_field ] : '' );
	$content_value    = ( isset( $_POST[ $content_field ] )    ? $_POST[ $content_field ] : '' );
	$term_value       = ( isset( $_POST[ $term_field ] )       ? $_POST[ $term_field ] : '' );
	$affiliate_value  = ( isset( $_POST[ $affiliate_field ] )  ? $_POST[ $affiliate_field ] : '' );
	$landing_value    = ( isset( $_POST[ $landing_field ] )    ? $_POST[ $landing_field ] : '' );
	$ireferrer_value  = ( isset( $_POST[ $ireferrer_field  ] ) ? $_POST[ $ireferrer_field  ] : '' );
	$lreferrer_value  = ( isset( $_POST[ $lreferrer_field ] )  ? $_POST[ $lreferrer_field ] : '' );
	$visits_value     = ( isset( $_POST[ $visits_field ] )     ? $_POST[ $visits_field ] : '' );

	// Cancela tudo se os dados básicos não estiverem presentes.
	if ( empty( $email ) || empty( $appid ) || empty( $apikey ) ) {

		$error_message = __( '<p><strong>Error message:</strong> Either the App ID, API key or the e-mail was not entered. Please contact the website owner.</p>', 'uf-epico' );

		wp_die( '<h1>' . __( 'Sorry, something went wrong... ಠ_ಠ', 'uf_epico' ) . ' </h1><p>' . __( 'Please check your list ID or API key inside the Épico Capture panel.', 'uf_epico' ) . '</p>' . $error_message );

	} else {

		// Inicia a classe Infusionsoft_App com as credenciais da API.
		$app = new Infusionsoft_App( $appid, $apikey );

		// Adiciona o App do IS à classe AppPool.
		Infusionsoft_AppPool::addApp( $app );

		// Cria um novo objeto `contact` no IS.
		$contact = new Infusionsoft_Contact();
		$fields  = array(
			'_gdpr' => esc_attr( $gdpr ),
			'_' . esc_attr( $source_field )    => esc_attr( $source_value ),
			'_' . esc_attr( $medium_field )    => esc_attr( $medium_value ),
			'_' . esc_attr( $campaign_field )  => esc_attr( $campaign_value ),
			'_' . esc_attr( $content_field )   => esc_attr( $content_value ),
			'_' . esc_attr( $term_field )      => esc_attr( $term_value ),
			'_' . esc_attr( $affiliate_field ) => esc_attr( $affiliate_value ),
			'_' . esc_attr( $landing_field )   => esc_attr( $landing_value ),
			'_' . esc_attr( $ireferrer_field ) => esc_attr( $ireferrer_value ),
			'_' . esc_attr( $lreferrer_field ) => esc_attr( $lreferrer_value ),
			'_' . esc_attr( $visits_field )    => esc_attr( $visits_value ),
		);

		// Remove do array campos personalizados não definidos no painel.
		$fields = array_filter( $fields, 'strlen' );

		// Adiciona cada um dos campos personalizados ao objeto `contact` eq os prepara para envio.
		foreach( $fields as $key => $value ) {
			$contact->addCustomField( $key );
			$contact->$key = $value;
		}

		// Prepara os dados do contato principais para envio.
		$contact->Email     = $email;
		$contact->FirstName = $name;

		// Confere se o appid é válido checando se a URL da app existe.
		$isUrl    = 'https://' . $appid . '.infusionsoft.com';
		$response = wp_remote_head( $isUrl );

		// Gerenciando erros na resposta.
		if ( is_wp_error( $response ) || ! 302 === wp_remote_retrieve_response_code( $response ) ) {

			// Se o appid não for válido ou se a reqisição não puder ser enviada, mostra uma mensagem de erro.
			$error_message = '<p><strong>' . __( 'The Infusionsoft ID informed in the Épico Capture is incorrect .', 'uf_epico' ) . '</strong></p>';

			wp_die( '<h1>' . __( 'Sorry, something went wrong... ಠ_ಠ', 'uf_epico' ) . ' </h1>' . $error_message . '<p>' . __( 'Please notify the blog owner.', 'uf_epico' ) . '</p>' );
		}

		// Salva os dados no IS.
		$contact->save();

		// Redireciona.
		wp_redirect( esc_url( $redirect ) );

		die();
	}
}