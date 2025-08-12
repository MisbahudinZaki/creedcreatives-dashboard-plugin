<?php
/**
 * Hooks utama CreedCreatives Dashboard
 *
 * @package CreedCreatives
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Output CSS dinamis di admin
 */
function cc_output_branding_css() {
    $settings = get_option( 'cc_branding_settings', [] );
    if ( empty( $settings ) ) return;

    ?>
    <style>
        /* Accent Color */
        #adminmenu .wp-has-current-submenu a.wp-has-current-submenu,
        #adminmenu .wp-menu-open a.menu-top,
        .wrap h1 {
            color: <?php echo esc_attr( $settings['accent_color'] ?? '#0073aa' ); ?>;
        }

        /* Menu Item Color */
        #adminmenu a {
            color: <?php echo esc_attr( $settings['menu_item_color'] ?? '#ffffff' ); ?>;
        }

        /* Admin Bar Background */
        #wpadminbar {
            background-color: <?php echo esc_attr( $settings['admin_bar_bg_color'] ?? '#23282d' ); ?>;
        }

        /* Admin Menu Background */
        #adminmenu {
            background-color: <?php echo esc_attr( $settings['admin_menu_bg_color'] ?? '#23282d' ); ?>;
        }

        /* Admin Submenu Background */
        #adminmenu .wp-submenu {
            background-color: <?php echo esc_attr( $settings['admin_submenu_bg_color'] ?? '#32373c' ); ?>;
        }
    </style>
    <?php
}
add_action( 'admin_head', 'cc_output_branding_css' );
