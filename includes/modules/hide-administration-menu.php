<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Remove plugins and tools in menu	
add_action( 'admin_init', 'wpes_hide_administration_menu' );
function wpes_hide_administration_menu() {
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'plugins.php' );
    remove_submenu_page( 'themes.php', 'themes.php' );
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
}

// disable acf admin editor
add_filter( 'acf/settings/show_admin', '__return_false' );