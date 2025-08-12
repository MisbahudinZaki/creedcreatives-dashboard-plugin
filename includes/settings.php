<?php
/**
 * Settings handler untuk CreedCreatives Dashboard
 *
 * @package CreedCreatives
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Simpan pengaturan global
 */
function cc_update_settings( $settings ) {
    update_option( 'cc_branding_settings', $settings );
}
