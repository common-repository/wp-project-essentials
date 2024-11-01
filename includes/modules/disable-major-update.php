<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// disable updater, plugins & editor	
add_action( 'init', 'wpes_disable_major_update' , 11 );
function wpes_disable_major_update() {
    # Disable the Plugin and Theme Editor
    define( 'DISALLOW_FILE_EDIT', true );

    # Disable Plugin and Theme Update and Installation
    define( 'DISALLOW_FILE_MODS', true );
    
    # Disable WordPress Auto Updates
    define( 'AUTOMATIC_UPDATER_DISABLED', true );

    # Enable Core Updates For Minor Releases
    define( 'WP_AUTO_UPDATE_CORE', 'minor' );
}

// disable updater notification	
add_action( 'admin_head', 'wpes_disable_updater_notices' , 10 );
function wpes_disable_updater_notices() {
    remove_action( 'admin_notices', 'update_nag', 3 );
    remove_action( 'admin_notices', 'maintenance_nag', 10 );
}