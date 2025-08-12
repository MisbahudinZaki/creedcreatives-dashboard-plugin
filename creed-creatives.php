<?php
/**
 * Plugin Name: CreedCreatives
 * Plugin URI:  https://example.com/creedcreatives
 * Description: Simple modular plugin to customize WP admin: branding, color theme and sidebar width.
 * Version:     0.1.0
 * Author:      <Your Name>
 * Author URI:  https://example.com
 * Text Domain: creed-creatives
 *
 * @package CreedCreatives
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Plugin constants
 */
define( 'CC_PLUGIN_FILE', __FILE__ );
define( 'CC_PLUGIN_DIR', plugin_dir_path( CC_PLUGIN_FILE ) );
define( 'CC_PLUGIN_URL',  plugin_dir_url( CC_PLUGIN_FILE ) );
define( 'CC_VERSION',     '0.1.0' );

/**
 * Basic autoload: if includes/class-loader.php exists, require it.
 * We'll create class-loader next (it will load includes and modules).
 */
$loader_file = CC_PLUGIN_DIR . 'includes/class-loader.php';
if ( file_exists( $loader_file ) ) {
	require_once $loader_file;
	if ( class_exists( 'CreedCreatives_Loader' ) ) {
		// Instantiate loader which will register hooks & modules.
		CreedCreatives_Loader::instance();
	}
} else {
	// Fallback minimal bootstrap so plugin does not fatally break if loader missing.
	add_action( 'admin_notices', function() {
		echo '<div class="notice notice-warning"><p><strong>CreedCreatives:</strong> loader missing (includes/class-loader.php). Please make sure plugin files are complete.</p></div>';
	} );
}

/**
 * Activation and deactivation hooks (call static methods on loader if available).
 */
register_activation_hook( CC_PLUGIN_FILE, function() {
	if ( class_exists( 'CreedCreatives_Loader' ) && method_exists( 'CreedCreatives_Loader', 'activate' ) ) {
		CreedCreatives_Loader::activate();
	}
} );

register_deactivation_hook( CC_PLUGIN_FILE, function() {
	if ( class_exists( 'CreedCreatives_Loader' ) && method_exists( 'CreedCreatives_Loader', 'deactivate' ) ) {
		CreedCreatives_Loader::deactivate();
	}
} );