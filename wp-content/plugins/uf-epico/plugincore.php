<?php
/**
 * @package   Uf_Epico
 * @author    Uberfácil <contato@uberfacil.com>
 * @license   GPL-2.0+
 * @link      https://www.uberfacil.com
 * @copyright 2014-2016 Uberfácil
 *
 * @wordpress-plugin
 * Plugin Name: Épico
 * Plugin URI:  https://www.uberfacil.com/temas/epico
 * Description: Includes advanced functionality for the Épico theme and helps you to create your author platform on the Web with specialized widgets and shortcodes. Note: this plugin is compatible with the Épico theme only.
 * Version:     1.10.21
 * Author:      Uberfácil
 * Author URI:  https://www.uberfacil.com
 * Text Domain: uf-epico
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// Abortar caso este arquivo seja chamado diretamente
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define constante do caminho até o plugin
define( 'EPICO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Inclui todas as integrações
require_once( EPICO_PLUGIN_DIR . 'class-uf-epico.php' );
require_once( EPICO_PLUGIN_DIR . 'vendor/campaign-monitor/cm-form-process.php' );
require_once( EPICO_PLUGIN_DIR . 'vendor/mailpoet/mailpoet-form-process.php' );
require_once( EPICO_PLUGIN_DIR . 'vendor/lahar/lahar-form-process.php' );
require_once( EPICO_PLUGIN_DIR . 'vendor/infusionsoft/is-form-process.php' );

//  Inclui todos os widgets
foreach ( glob( EPICO_PLUGIN_DIR . 'includes/widgets/*.php' ) as $file ) {
    require_once $file;
}

// Carrega instancia da classe
add_action( 'plugins_loaded', array( 'Uf_Epico', 'get_instance' ) );

// Conecta o atualizador ao init
add_action( 'init', 'epico_plugin_updater_init' );

// Carrega o `text domain` do plugin
add_action( 'plugins_loaded', 'epico_load_plugin_textdomain' );

/**
 * Carrega e ativa a classe de atualizacoes do plugin
 * @since 1.0.0
 */
function epico_plugin_updater_init() {

	/* Carrega o atualizador do Plugin */
	require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'vendor/class-epico-plugin-updater.php' );

	/* Configuracao do atualizador */
	$config = array(
		'base'      => plugin_basename( __FILE__ ),
		'dashboard' => TRUE,
		'username'  => TRUE,
		'key'       => '',
		'repo_uri'  => 'https://minha.uberfacil.com/',
		'repo_slug' => 'epico-plugin',
	);

	/* Carrega a classe do atualizador */
	new Epico_Plugin_Updater( $config );
}

/**
 * Carrega o arquivo de traducao
 *
 * @since 1.0.0
 */
function epico_load_plugin_textdomain() {

	load_plugin_textdomain( 'uf-epico', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
