<?php
/**
 * Branding Module
 * Mengatur warna, logo, dan ukuran sidebar
 *
 * @package CreedCreatives
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Tambahkan menu Branding
 */
function cc_branding_menu() {
        add_menu_page(
        __( 'Branding Settings', 'creed-creatives' ),
        __( 'CreedCreatives', 'creed-creatives' ), // ← diubah
        'manage_options',
        'cc-branding',
        'cc_branding_admin_page',
        'dashicons-art',
        59
    );
}
add_action( 'admin_menu', 'cc_branding_menu' );

// di modules/branding/branding.php — tambahkan ini
if ( file_exists( CC_PATH . 'modules/branding/branding-save.php' ) ) {
    require_once CC_PATH . 'modules/branding/branding-save.php';
}


/**
 * Load Assets hanya di halaman branding
 */
function cc_branding_assets( $hook ) {
    if ( $hook !== 'toplevel_page_cc-branding' ) {
        return;
    }

    // Color Picker bawaan WP
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );

    // CSS & JS custom
    wp_enqueue_style( 'cc-branding-css', CC_URL . 'modules/branding/css/branding.css', [], CC_VERSION );
    wp_enqueue_script( 'cc-branding-js', CC_URL . 'modules/branding/js/branding.js', [ 'wp-color-picker', 'jquery' ], CC_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'cc_branding_assets' );

/**
 * Tampilkan halaman admin branding
 */
function cc_branding_admin_page() {
    include CC_PATH . 'modules/branding/branding-admin.php';
}
