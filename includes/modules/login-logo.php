<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'login_enqueue_scripts', 'wpes_login_enqueue_scripts' );	
function wpes_login_enqueue_scripts() {
	// get options
	$wpes_options = $GLOBALS[ 'WPES' ]->get_options();
	$login_logo_url = $wpes_options[ 'login_logo' ];

	// apply options
    $custom_css = sprintf( "
        body.login div#login h1 a { 
        	background-image: url(%s);
        }
	", esc_url( $login_logo_url ) );

	// apply custom css as inline style
	wp_enqueue_style( 'custom-login', WPES_URL . 'assets/style-login.css', array() );
    wp_add_inline_style( 'custom-login', $custom_css );
}