<?php

/**
 * Processa e envia os dados para o Lahar via API.
 *
 * @author  Marcio Duarte
 * @since   1.10.0
 * @license GPL-2.0+
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

add_action( 'admin_post_nopriv_lahar_api_send', 'epico_lahar_api_send' );
add_action( 'admin_post_lahar_api_send', 'epico_lahar_api_send' );

function epico_lahar_api_send() {

	//Obtém os dados básicos  enviados pelo formulário no front-end.
	$email      = $_POST[ 'email_contato' ];
	$first_name = ( isset( $_POST[ 'nome_contato' ] ) ? $_POST[ 'nome_contato' ] : '' );
	$form_name  = $_POST[ 'nome_formulario' ];
	$source     = $_POST[ 'url_origem' ];
	$gdpr       = ( isset( $_POST[ 'gdpr' ] ) ? $_POST[ 'gdpr' ] : '' );
	$widget_id  = $_POST[ 'wid' ];

	// Obtém os dados necessários à API do Lahar a partir da instância do widget.
	$widget_number    = absint( preg_replace( '/[^0-9]/', '', $widget_id ) );
	$widget_instances = get_option( 'widget_epico_capture_widget-id' );
	$widget_data      = $widget_instances[ $widget_number ];
	$token            = $widget_data[ 'token' ];
	$redirect         = ( ! empty( $widget_data[ 'redirect_url' ] ) ? $widget_data[ 'redirect_url' ] : get_home_url() );

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

	// API do Lahar
	$endpoint   = 'https://app.lahar.com.br/api/conversions';

	// Cancela tudo se os dados básicos não forem informados.
	if ( empty( $email ) || empty( $token ) ) {

		$error_message = __( '<p><strong>Error message:</strong> Email not informed or Lahar token not defined.</p>', 'uf-epico' );

		wp_die( '<h1>' . __( 'Sorry, something went wrong... ಠ_ಠ', 'uf_epico' ) . ' </h1><p>' . __( 'Please check your Épico Capture configuration.', 'uf_epico' ) . '</p>' . $error_message );

	} else {

		// Cria um array com todos os valores para o request
		$fields = array(
			'token_api_lahar' => esc_attr( $token ),
			'email_contato'   => sanitize_email( $email ),
			'nome_contato'    => esc_attr( $first_name ),
			'nome_formulario' => esc_attr( $form_name ),
			'url_origem'      => esc_url( $source ),
			'gdpr'            => esc_attr( $gdpr ),
			esc_attr( $source_field )    => esc_attr( $source_value ),
			esc_attr( $medium_field )    => esc_attr( $medium_value ),
			esc_attr( $campaign_field )  => esc_attr( $campaign_value ),
			esc_attr( $content_field )   => esc_attr( $content_value ),
			esc_attr( $term_field )      => esc_attr( $term_value ),
			esc_attr( $affiliate_field ) => esc_attr( $affiliate_value ),
			esc_attr( $landing_field )   => esc_url( $landing_value ),
			esc_attr( $ireferrer_field ) => esc_url( $ireferrer_value ),
			esc_attr( $lreferrer_field ) => esc_url( $lreferrer_value ),
			esc_attr( $visits_field )    => esc_attr( $visits_value ),
		);

		// Remove campos vazios do array.
		$fields = array_filter( $fields, 'strlen' );

		// Envia o request e armazena a resposta.
		$response = wp_safe_remote_post( esc_url_raw( $endpoint ), array(
			'timeout'     => 30,
			'body'        => $fields,
			)
		);

		// Obtém e processa a resposta.
		$response_body = wp_remote_retrieve_body( $response );
		$response_data = json_decode( $response_body );

		// Gerencia erros na resposta.
		if ( is_wp_error( $response ) || ( ! empty( $response_data->status ) && $response_data->status == "erro" ) ) {

			$error_message = ( ! empty( $response_data->data->error->message ) ? __( '<p><strong>Error message: </strong>', 'uf_epico' ) . $response_data->data->error->message . '</p>' : '' );

			wp_die( '<h1>' . __( 'Sorry, something went wrong... ಠ_ಠ', 'uf_epico' ) . ' </h1><p>' . __( 'Please check your Épico Capture configuration.', 'uf_epico' ) . '</p>' . $error_message );
		}

		// Redireciona.
		wp_redirect( esc_url( $redirect ) );

		die();
	}
}