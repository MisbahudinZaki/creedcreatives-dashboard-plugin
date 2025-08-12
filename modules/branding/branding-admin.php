<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Ambil pengaturan dari database
$settings = get_option( 'cc_branding_settings', [] );

// Default jika kosong
$defaults = [
    'accent_color'          => '#0073aa',
    'menu_item_color'       => '#ffffff',
    'admin_bar_bg_color'    => '#23282d',
    'admin_menu_bg_color'   => '#23282d',
    'admin_submenu_bg_color'=> '#32373c',
];

$settings = wp_parse_args( $settings, $defaults );
?>

<div class="wrap">
    <h1><?php _e( 'Branding Settings', 'creed-creatives' ); ?></h1>

    <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
        <?php wp_nonce_field( 'cc_save_branding', 'cc_nonce' ); ?>
        <input type="hidden" name="action" value="cc_save_branding">

        <table class="form-table">
            <tr>
                <th scope="row"><label for="accent_color"><?php _e( 'Accent Color', 'creed-creatives' ); ?></label></th>
                <td><input type="text" id="accent_color" name="accent_color" value="<?php echo esc_attr( $settings['accent_color'] ); ?>" class="cc-color-field" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="menu_item_color"><?php _e( 'Menu Item Color', 'creed-creatives' ); ?></label></th>
                <td><input type="text" id="menu_item_color" name="menu_item_color" value="<?php echo esc_attr( $settings['menu_item_color'] ); ?>" class="cc-color-field" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="admin_bar_bg_color"><?php _e( 'Admin Bar Bg Color', 'creed-creatives' ); ?></label></th>
                <td><input type="text" id="admin_bar_bg_color" name="admin_bar_bg_color" value="<?php echo esc_attr( $settings['admin_bar_bg_color'] ); ?>" class="cc-color-field" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="admin_menu_bg_color"><?php _e( 'Admin Menu Bg Color', 'creed-creatives' ); ?></label></th>
                <td><input type="text" id="admin_menu_bg_color" name="admin_menu_bg_color" value="<?php echo esc_attr( $settings['admin_menu_bg_color'] ); ?>" class="cc-color-field" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="admin_submenu_bg_color"><?php _e( 'Admin Submenu Bg Color', 'creed-creatives' ); ?></label></th>
                <td><input type="text" id="admin_submenu_bg_color" name="admin_submenu_bg_color" value="<?php echo esc_attr( $settings['admin_submenu_bg_color'] ); ?>" class="cc-color-field" /></td>
            </tr>
        </table>

        <?php submit_button( __( 'Save Changes', 'creed-creatives' ) ); ?>
    </form>
</div>
