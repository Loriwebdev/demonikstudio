<?php
/**
 * Plugin Name:   Kirki Toolkit
 * Plugin URI:    http://kirki.org
 * Description:   The ultimate WordPress Customizer Toolkit
 * Author:        Aristeides Stathopoulos
 * Author URI:    http://aristeides.com
 * Version:       3.0.15
 * Text Domain:   kirki
 *
 * GitHub Plugin URI: aristath/kirki
 * GitHub Plugin URI: https://github.com/aristath/kirki
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// No need to proceed if Kirki already exists.
if ( class_exists( 'Kirki' ) ) {
	return;
}

// Include the autoloader. codeless
include_once CODELESS_KIRKI_PATH . DIRECTORY_SEPARATOR . 'class-kirki-autoload.php';
new Kirki_Autoload();

if ( ! defined( 'KIRKI_PLUGIN_FILE' ) ) {
	define( 'KIRKI_PLUGIN_FILE', __FILE__ );
}

// Define the KIRKI_VERSION constant.
if ( ! defined( 'KIRKI_VERSION' ) ) {
	if ( ! function_exists( 'get_plugin_data' ) ) {
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
	}
	$data = get_plugin_data( KIRKI_PLUGIN_FILE );
	$version = ( isset( $data['Version'] ) ) ? $data['Version'] : false;
	define( 'KIRKI_VERSION', $version );
}

// Make sure the path is properly set. codeless
Kirki::$path = wp_normalize_path( CODELESS_KIRKI_PATH );
Kirki_Init::set_url();

if ( ! function_exists( 'Kirki' ) ) {
	// @codingStandardsIgnoreStart
	/**
	 * Returns an instance of the Kirki object.
	 */
	function Kirki() {
		$kirki = Kirki_Toolkit::get_instance();
		return $kirki;
	}
	// @codingStandardsIgnoreEnd

}

// Start Kirki.
global $kirki;
$kirki = Kirki();

// Instantiate the modules.
$kirki->modules = new Kirki_Modules();

Kirki::$url = plugins_url( '', __FILE__ );

// Instantiate classes.
new Kirki();
new Kirki_L10n();

// Include deprecated functions & methods. codeless
include_once wp_normalize_path( CODELESS_KIRKI_PATH . '/core/deprecated.php' );

// Include the ariColor library. codeless
include_once wp_normalize_path( CODELESS_KIRKI_PATH . '/lib/class-aricolor.php' );

// Add an empty config for global fields.
Kirki::add_config( '' );
// codeless
$custom_config_path = CODELESS_KIRKI_PATH . '/custom-config.php';
$custom_config_path = wp_normalize_path( $custom_config_path );
if ( file_exists( $custom_config_path ) ) {
	include_once $custom_config_path;
}

// Add upgrade notifications. codeless
include_once wp_normalize_path( CODELESS_KIRKI_PATH . '/upgrade-notifications.php' );

// Uncomment this line to see the demo controls in the customizer.
/* include_once CODELESS_KIRKI_PATH . '/example.php'; */
