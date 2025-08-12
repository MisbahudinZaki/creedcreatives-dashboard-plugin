<?php
/**
 * Plugin Name: CreedCreatives Dashboard
 * Plugin URI:  https://yourwebsite.com
 * Description: Custom WordPress Dashboard Manager - ubah warna, logo, dan ukuran sidebar admin.
 * Version:     1.0.0
 * Author:      Zaki
 * Author URI:  https://yourwebsite.com
 * Text Domain: creed-creatives
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Stop direct access
}

/**
 * Define constants
 */
define( 'CC_VERSION', '1.0.0' );
define( 'CC_PATH', plugin_dir_path( __FILE__ ) );
define( 'CC_URL', plugin_dir_url( __FILE__ ) );
define( 'CC_ASSETS', CC_URL . 'assets/' );

/**
 * Load textdomain for translations
 */
function cc_load_textdomain() {
    load_plugin_textdomain( 'creed-creatives', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'cc_load_textdomain' );

/**
 * Include loader
 */
require_once CC_PATH . 'includes/class-loader.php';

/**
 * Activation Hook
 */
function cc_activate() {
    // Bisa diisi default option misal warna default
    if ( ! get_option( 'cc_branding_settings' ) ) {
        update_option( 'cc_branding_settings', [
            'accent_color'         => '#0073aa',
            'menu_item_color'      => '#ffffff',
            'admin_bar_bg_color'   => '#23282d',
            'admin_menu_bg_color'  => '#23282d',
            'admin_submenu_bg_color'=> '#32373c',
        ] );
    }
}
register_activation_hook( __FILE__, 'cc_activate' );

/**
 * Deactivation Hook
 */
function cc_deactivate() {
    // Tidak menghapus data agar user bisa aktifkan kembali tanpa reset
}
register_deactivation_hook( __FILE__, 'cc_deactivate' );

/**
 * Uninstall Hook
 * File uninstall.php akan dipanggil
 */
