<?php
/**
 * Class Loader
 * Memuat semua file yang dibutuhkan plugin
 *
 * @package CreedCreatives
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Stop direct access
}

/**
 * Load core includes
 */
require_once CC_PATH . 'includes/helpers.php';
require_once CC_PATH . 'includes/settings.php';
require_once CC_PATH . 'includes/hooks.php';

/**
 * Load modules
 * Hanya load file utama modul, misalnya branding.php
 */
$modules = [
    'branding',
    // Tambahkan modul lain nanti di sini
];

foreach ( $modules as $module ) {
    $module_path = CC_PATH . "modules/{$module}/{$module}.php";
    if ( file_exists( $module_path ) ) {
        require_once $module_path;
    }
}
