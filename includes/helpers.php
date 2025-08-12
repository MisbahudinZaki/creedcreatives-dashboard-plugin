<?php
/**
 * Helpers functions untuk CreedCreatives Dashboard
 *
 * @package CreedCreatives
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Contoh helper untuk ambil option dengan default
 */
function cc_get_option( $key, $default = '' ) {
    $options = get_option( 'cc_branding_settings', [] );
    return isset( $options[ $key ] ) ? $options[ $key ] : $default;
}
