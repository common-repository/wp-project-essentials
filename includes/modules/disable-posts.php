<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'init', 'wpes_unregister_post_type_post', 11 );
function wpes_unregister_post_type_post() {
    global $wp_post_types;

    if ( isset( $wp_post_types[ 'post' ] ) ) {
        unset( $wp_post_types[ 'post' ] );
        return true;
    }
    return false;
}