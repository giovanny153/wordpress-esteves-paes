<?php

/**
 * Processa formularios do MailPoet v3 via API.
 *
 * @author Marcio Duarte
 * @since  1.9.0
 * @license GPL-2.0+
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

add_action( 'admin_post_nopriv_mailpoet_form', 'epico_process_form' );
add_action( 'admin_post_mailpoet_form', 'epico_process_form' );

function epico_process_form() {

	// Registra os dados básicos enviados pelo formulário.
	$email      = sanitize_text_field( $_POST['email'] );
	$first_name = sanitize_text_field( $_POST['first_name'] );
	$lists      = array( sanitize_text_field( $_POST['list_id'] ) );
	$location   = sanitize_text_field( $_POST['source'] );

	// Se os dados básicos não forem informados, cancela tudo.
	if ( ! isset( $email ) || ! isset( $lists ) ) {

	   die();
	}

	// Só continua o processamento se o plugin do MailPoet estiver ativado.
	if ( is_plugin_active( 'mailpoet/mailpoet.php' ) ) {

		// Prepara o array para o envio.
	    $subscriber_data = array(
	        'email'      => $email,
	        'first_name' => $first_name,
	    );

	    // Processa o request e retorna `erro` caso algo tenha saído errado.
	    try {
	        $subscriber = \MailPoet\API\API::MP('v1')->addSubscriber( $subscriber_data, $lists, $options );
	    } catch( Exception $exception ) {
	        echo 'Erro: ', $exception->getMessage(), '\n';

	    }

	    // Redireciona.
		wp_redirect( $location );

		die();

	}

	// Mensagem de erro.
	echo sprintf(
	    '<div style="background:#f0f4f4;display:flex;align-items:center;justify-content:center;height:100vh;font-family:Source Sans Pro,Helvetica Neue,Helvetica,Arial,sans-serif;line-height:1.6rem"><div style="max-width:29rem;text-align:center;"><h1 style="color:#ea5d39;font-weight:300;position:relative;margin:1rem 0 2rem;">%s</h1><p style="font-size:1rem;color:rgb(86, 99, 103);">%s</p><div></div>',
	    __( 'Sorry, something went wrong... ಠ_ಠ', 'uf_epico' ),
	    __( 'The MailPoet (v3) plugin is disabled and the e-mail could not be saved in the database. Please contact the website admin to activate the plugin before trying again.', 'uf_epico' )
	);

	die();
}
