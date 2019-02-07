<?php

/**
 * Processa e envia os dados para o Campaign Monitor via API.
 *
 * @author  Marcio Duarte
 * @since   1.10.0
 * @license GPL-2.0+
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

add_action( 'admin_post_nopriv_cm_api_send', 'epico_cm_api_send' );
add_action( 'admin_post_cm_api_send', 'epico_cm_api_send' );

function epico_cm_api_send() {

	//Obtém os dados básicos enviados pelo formulário no front-end.
	$email     = $_POST[ 'cm-email' ];
	$name      = ( isset( $_POST[ 'cm-name' ] ) ? $_POST[ 'cm-name' ] : '' );
	$gdpr      = ( isset( $_POST[ 'gdpr' ] ) ? $_POST[ 'gdpr' ] : '' );
	$widget_id = $_POST[ 'wid' ];

	// Obtém os dados necessários à API a partir da instância do widget.
	$widget_number    = absint( preg_replace( '/[^0-9]/', '', $widget_id ) );
	$widget_instances = get_option( 'widget_epico_capture_widget-id' );
	$widget_data      = $widget_instances[ $widget_number ];
	$listid           = $widget_data[ 'list_id' ];
	$apikey           = $widget_data[ 'api_key' ];
	$redirect         = $widget_data[ 'redirect_url' ];

	// Nomes dos campos UTM personalizados configurados no painel do Épico
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

	// API do CM
	$endpoint= 'https://api.createsend.com/api/v3.2/subscribers/' . $listid . '.json';

	// Cancela tudo se os dados básicos não foram informados.
	if ( empty( $email ) || empty( $listid ) || empty( $apikey ) ) {

		$error_message = __( '<p><strong>Error message:</strong> Either the List ID, API key or the e-mail was not entered.</p>', 'uf-epico' );

		wp_die( '<h1>' . __( 'Sorry, something went wrong... ಠ_ಠ', 'uf_epico' ) . ' </h1><p>' . __( 'Please check your list ID or API key inside the Épico Capture panel.', 'uf_epico' ) . '</p>' . $error_message );

	} else {

		// Cria um array com todos os valores para o request
		$fields = array(
			'EmailAddress' => sanitize_email( $email ),
			'Name'         => esc_attr( $name ),
			'CustomFields' => array(
				array(
		            'Key'   => 'gdpr',
		            'Value' => esc_url( $gdpr ),
		        	),
				array(
		            'Key'   => esc_attr( $source_field ),
		            'Value' => esc_url( $source_value ),
		        	),
				array(
		            'Key'   => esc_attr( $medium_field ),
		            'Value' => esc_attr( $medium_value ),
		        	),
				array(
		            'Key'   => esc_attr( $campaign_field ),
		            'Value' => esc_attr( $campaign_value ),
		        	),
				array(
		            'Key'   => esc_attr( $content_field ),
		            'Value' => esc_attr( $content_value ),
		        	),
				array(
		            'Key'   => esc_attr( $term_field ),
		            'Value' => esc_attr( $term_value ),
		        	),
				array(
		            'Key'   => esc_attr( $affiliate_field ),
		            'Value' => esc_attr( $affiliate_value ),
		        	),
				array(
		            'Key'   => esc_attr( $landing_field ),
		            'Value' => esc_url( $landing_value ),
		        	),
				array(
		            'Key'   => esc_attr( $ireferrer_field ),
		            'Value' => esc_url( $ireferrer_value ),
		        	),
				array(
		            'Key'   => esc_attr( $lreferrer_field ),
		            'Value' => esc_url( $lreferrer_value ),
		        	),
				array(
		            'Key'   => esc_attr( $visits_field ),
		            'Value' => esc_attr( $visits_value ),
		        	),
				),
			'ConsentToTrack' => 'Unchanged',
			'Resubscribe'    => 'true',
			);

		// Remove campos vazios do array.
		$fields = array_filter( $fields, 'strlen' );

		// Autenticação: a senha não é necessária, apenas a chave de API.
		$basicauth = 'Basic ' . base64_encode( esc_attr( $apikey ) . ': "x"' );

		$headers = array(
			'Authorization' => $basicauth,
			'Content-type'  => 'application/json; charset=utf-8',
			);

		// Envia o request e armazena a resposta.
		$response = wp_safe_remote_post( esc_url_raw( $endpoint ), array(
			'headers'     => $headers,
			'timeout'     => 30,
			'body'        => json_encode( $fields ),
			'data_format' => 'body',
			)
		);

		// Obtém a resposta e a processa.
		$response_body = wp_remote_retrieve_body( $response );
		$response_data = json_decode( $response_body );

		// Gerenciando erros na resposta.
		if ( is_wp_error( $response ) || ( ! empty( $response_data->Code ) ) ) {

			$error_message = ( ! empty( $response_data->Message ) ? __( '<p><strong>Error message: </strong>', 'uf_epico' ) . $response_data->Message . '</p>' : '' );

			wp_die( '<h1>' . __( 'Sorry, something went wrong... ಠ_ಠ', 'uf_epico' ) . ' </h1><p>' . __( 'Please notify the blog owner.', 'uf_epico' ) . '</p>' . $error_message );

		}

		// Redireciona se o processo correu bem.
		wp_redirect( esc_url( $redirect ) );

		die();
	}
}