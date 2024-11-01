<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// ge the options
$wpes_options = $GLOBALS[ 'WPES' ]->get_options();

// disable_major_update
if ( $wpes_options[ 'disable_major_updates' ] == 1 ) {
	require_once( WPES_DIR . 'includes/modules/disable-major-update.php' );
}

// disable_comment
if ( $wpes_options[ 'disable_comments' ] == 1 ) {
	require_once( WPES_DIR . 'includes/modules/disable-comments.php' );	
}

// disable_post
if ( $wpes_options[ 'disable_posts' ] == 1 ) {
	require_once( WPES_DIR . 'includes/modules/disable-posts.php' );	
}

// disable_default_dashboard
if ( $wpes_options[ 'disable_default_dashboard' ] == 1 ) {
	require_once( WPES_DIR . 'includes/modules/disable-default-dashboard.php' );	
}

// enable_custom_dashboard
if ( $wpes_options[ 'enable_custom_dashboard' ] == 1 ) {
	require_once( WPES_DIR . 'includes/modules/enable-custom-dashboard.php' );	
}

// hide_wp_admin_header_menu
if ( $wpes_options[ 'hide_wp_admin_header_menu' ] == 1 ) {
	require_once( WPES_DIR . 'includes/modules/hide-wp-admin-header-menu.php' );
}

// hide_administration_menu
if ( $wpes_options[ 'hide_administration_menus' ] == 1 ) {
	require_once( WPES_DIR . 'includes/modules/hide-administration-menu.php' );
}

// admin_footer_left
if ( trim( $wpes_options[ 'admin_footer_left' ] ) != '' ) {
	require_once( WPES_DIR . 'includes/modules/admin-footer-left.php' );
}

// admin_footer_right
if ( trim( $wpes_options[ 'admin_footer_right' ] ) != '' ) {
	require_once( WPES_DIR . 'includes/modules/admin-footer-right.php' );
}

// login_logo
if ( $wpes_options[ 'use_custom_login_logo' ] == 1 && trim( $wpes_options[ 'login_logo' ] ) != '' ) {
	require_once( WPES_DIR . 'includes/modules/login-logo.php' );
}