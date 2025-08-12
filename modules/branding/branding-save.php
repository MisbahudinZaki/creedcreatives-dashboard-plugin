<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Simpan pengaturan branding
 */
function cc_save_branding_settings() {
    // Cek hak akses
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( __( 'You are not allowed to do this.', 'creed-creatives' ) );
    }

    // Cek nonce
    if ( ! isset( $_POST['cc_nonce'] ) || ! wp_verify_nonce( $_POST['cc_nonce'], 'cc_save_branding' ) ) {
        wp_die( __( 'Invalid nonce specified.', 'creed-creatives' ) );
    }

    // Sanitasi data
    $settings = [
        'accent_color'          => sanitize_hex_color( $_POST['accent_color'] ?? '' ),
        'menu_item_color'       => sanitize_hex_color( $_POST['menu_item_color'] ?? '' ),
        'admin_bar_bg_color'    => sanitize_hex_color( $_POST['admin_bar_bg_color'] ?? '' ),
        'admin_menu_bg_color'   => sanitize_hex_color( $_POST['admin_menu_bg_color'] ?? '' ),
        'admin_submenu_bg_color'=> sanitize_hex_color( $_POST['admin_submenu_bg_color'] ?? '' ),
    ];

    // Simpan ke database
    update_option( 'cc_branding_settings', $settings );

    // Redirect kembali ke halaman branding
    wp_safe_redirect( admin_url( 'admin.php?page=cc-branding&status=success' ) );
    exit;
}
add_action( 'admin_post_cc_save_branding', 'cc_save_branding_settings' );