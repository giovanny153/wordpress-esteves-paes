<?php
/**
 *
 * Previne o Epico de rodar em setups nao suportados.
 *
 * @package Épico
 * @since   Épico 1.9
 */

/**
 * Previne que o tema seja ativado em setups nao suportados e retorna ao tema padrao.
 *
 * @since Epico 1.9
 */
function epico_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'epico_upgrade_notice' );
}
add_action( 'after_switch_theme', 'epico_switch_theme' );

/**
 * Adiciona a mensagem de que o tema nao pode ser atualizado.
 *
 * @since Epico 1.9
 *
 * @global string $wp_version versao do WordPress.
 * @global string $is_IIS     servidor IIS.
 * @global string $is_iis7    versao 7 do servidor IIS.
 * @global string $is_apache  servidor Apache.
 * @global string $is_apache  versao do PHP.
 */
function epico_upgrade_notice() {

	if ( $GLOBALS['is_IIS'] || $GLOBALS['is_iis7'] ) {
		$server = 'Microsoft IIS'; 
	} elseif ( $GLOBALS['is_apache'] ) {		
		$server = 'Apache';
	} else {
		$server = 'Nginx';
	}

	$message = sprintf( __( '<strong>Oops! Looks like your server does not met the minimum requirements to run Epico</strong>.<br/><br/><em>Epico requires:</em><ul><li>• Apache or Nginx server</li><li>• WordPress version 4.7 or higher</li><li>• PHP 5.3 or higher</li></ul><em><br/>You are running:</em><br/><ul><li>• %1s server</li><li>• WordPress version %2s</li><li>• PHP version %3s</li></ul><br/>So, please upgrade your setup and try again.', 'epico' ), $server, $GLOBALS['wp_version'], PHP_VERSION );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Previne que o customizador seja carregado em setups nao suportados.
 *
 * @since Epico 1.9
 *
 * @global string $wp_version versao do WordPress.
 * @global string $is_IIS     servidor IIS.
 * @global string $is_iis7    versao 7 do servidor IIS.
 * @global string $is_apache  servidor Apache.
 * @global string $is_apache  versao do PHP.
 */
function epico_customize() {

	if ( $GLOBALS['is_IIS'] || $GLOBALS['is_iis7'] ) {
		$server = 'Microsoft IIS'; 
	} elseif ( $GLOBALS['is_apache'] ) {		
		$server = 'Apache';
	} else {
		$server = 'Nginx';
	}

	wp_die( sprintf( __( '<p><strong>Oops! Looks like your server does not met the minimum requirements to run Epico.</strong><p><p><em>Epico requires:</em></p><ul><li>Apache or Nginx server</li><li>WordPress version 4.7 or higher</li><li>PHP 5.3 or higher</li></ul><p><em>You are running:</em></p><ul><li>%1s server</li><li>WordPress version %2s</li><li>PHP version %3s</li></ul><p>So, please upgrade your setup and try again.</p>', 'epico' ), $server, $GLOBALS['wp_version'], PHP_VERSION ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'epico_customize' );

/**
 * Previne que a previsualizacao do tema seja carregada em setups nao suportados.
 *
 * @since Epico 1.9
 *
 * @global string $wp_version versao do WordPress.
 * @global string $is_IIS     servidor IIS.
 * @global string $is_iis7    versao 7 do servidor IIS.
 * @global string $is_apache  servidor Apache.
 * @global string $is_apache  versao do PHP.
 */
function epico_preview() {

	if ( $GLOBALS['is_IIS'] || $GLOBALS['is_iis7'] ) {
		$server = 'Microsoft IIS'; 
	} elseif ( $GLOBALS['is_apache'] ) {		
		$server = 'Apache';
	} else {
		$server = 'Nginx';
	}

	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( '<p><strong>Oops! Looks like your server does not met the minimum requirements to run Epico</strong><p><p><em>Epico requires:</em></p><ul><li>Apache or Nginx server</li><li>WordPress version 4.7 or higher</li><li>PHP 5.3 or higher</li></ul><p><em>You are running:</em></p><ul><li>%1s server</li><li>WordPress version %2s</li><li>PHP version %3s</li></ul><p>So, please upgrade your setup and try again.</p>', 'epico' ), $server, $GLOBALS['wp_version'], PHP_VERSION ) );
	}
}
add_action( 'template_redirect', 'epico_preview' );
