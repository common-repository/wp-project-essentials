<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_filter( 'admin_footer_text', 'wpes_admin_footer_left', 9999 );
function wpes_admin_footer_left() {
	$wpes_options = $GLOBALS[ 'WPES' ]->get_options();	
	return $wpes_options[ 'admin_footer_left' ];
}