<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_filter( 'update_footer', 'wpes_admin_footer_right', 9999 );
function wpes_admin_footer_right() {
	$wpes_options = $GLOBALS[ 'WPES' ]->get_options();	
	return $wpes_options[ 'admin_footer_right' ];
}