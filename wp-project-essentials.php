<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Plugin Name: WP Project Essentials
 * Plugin URI:
 * Description: A plugin that gather many minor admin-side customization that often needed for a WordPress project
 * Version: 1.0.1
 * Author: Haris Ainur Rozak
 * Author URI: https://harisrozak.github.io
 */

define( "WPES", 'wp-project-essentials' );
define( "WPES_DIR", plugin_dir_path( __FILE__ ) );
define( "WPES_URL", plugin_dir_url( __FILE__ ) );
define( "WPES_BASENAME", plugin_basename( __FILE__ ) );

Class WPES {
	// lies required WP hooks
	public function __construct() {
		add_filter( 'plugin_action_links_' . WPES_BASENAME, array( $this, 'plugin_action_links' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 10, 1 );
		add_action( 'admin_action_wp-project-essentials', array( $this, 'save_options' ) );
	}

	// add setting link to plugin list
	public function plugin_action_links( $links ) {
		$links[] = sprintf( "<a href='%s'>%s</a>", admin_url( 'options-general.php?page=wp-project-essentials' ), __( 'Settings', 'wp-project-essentials' ) );
		return $links;
	}

	// register admin page
	public function admin_menu() {
		add_submenu_page(
	        'options-general.php',
	        __( 'Project Essentials', 'wp-project-essentials' ),
	        __( 'Project Essentials', 'wp-project-essentials' ),
	        'activate_plugins',
	        'wp-project-essentials',
	        array( $this, 'settings_page' )
	    );
	}

	// load settings page
	public function settings_page() {
		// load form library
		require_once( WPES_DIR . 'includes/form-library.php' );
		$form_field = new HRS_FormLibrary();

		// load library uploader
		require_once( WPES_DIR . 'includes/file-uploader.php' );

		// load some required vars
		$options = $this->get_options();
		$login_styles = $this->login_styles;

		// load settings page
		require_once( WPES_DIR . 'includes/settings-page.php' );

		// load about us part
		require_once( WPES_DIR . 'about/about-html.php' );
	}

	// enqueue custom style on plugin settings page
	public function admin_enqueue_scripts( $hook ) {
		// show only on posts new form
    	if ( $hook != 'settings_page_wp-project-essentials' ) return;

    	// style admin
    	wp_enqueue_style( 'wpes-admin', WPES_URL . "assets/style-admin.css" );    	
    	wp_enqueue_style( 'checkbox-switch', WPES_URL . "assets/style-checkbox-switch.css" );    	

    	// load about us part
		require_once( WPES_DIR . 'about/admin-enqueue-script.php' );		
	}

	// get plugin settings
	public function get_options() {
		// set default options
		$default_options = array(
			'disable_major_updates' => 0,
			'disable_comments' => 0,
			'disable_posts' => 0,
			'disable_default_dashboard' => 0,
			'enable_custom_dashboard' => 0,
			'hide_wp_admin_header_menu' => 0,
			'hide_administration_menus' => 0,
			'admin_footer_left' => '',
			'admin_footer_right' => '',
			'use_custom_login_logo' => 0,
			'login_logo' => WPES_URL . "assets/logo.png",
			'login_logo_thumbnail' => WPES_URL . "assets/logo.png",
		);

		// get options
		$options = get_option( 'wp-project-essentials', $default_options );

		return $options;
	}

	// login styles selections
	public $login_styles = array(
		array( 'value' => 'default', 'label' => 'Default' ),
		array( 'value' => 'theme-blue-purple', 'label' => 'Blue Purple' ),
		array( 'value' => 'theme-clean-green', 'label' => 'Clean Green' ),
		array( 'value' => 'theme-coffee-brown', 'label' => 'Coffee Brown' ),
	);


	public function save_options() {
		// check nonce
		check_admin_referer( 'wp-project-essentials' );

		// sanitize and validate post data
		$post_data = $_POST['wpes'];
		$sanitized_data = array(
			'disable_major_updates' => intval( $post_data[ 'disable_major_updates' ] ),
			'disable_comments' => intval( $post_data[ 'disable_comments' ] ),
			'disable_posts' => intval( $post_data[ 'disable_posts' ] ),
			'disable_default_dashboard' => intval( $post_data[ 'disable_default_dashboard' ] ),
			'enable_custom_dashboard' => intval( $post_data[ 'enable_custom_dashboard' ] ),
			'hide_wp_admin_header_menu' => intval( $post_data[ 'hide_wp_admin_header_menu' ] ),
			'hide_administration_menus' => intval( $post_data[ 'hide_administration_menus' ] ),
			'admin_footer_left' => sanitize_text_field( $post_data[ 'admin_footer_left' ] ),
			'admin_footer_right' => sanitize_text_field( $post_data[ 'admin_footer_right' ] ),
			'use_custom_login_logo' => intval( $post_data[ 'use_custom_login_logo' ] ),
			'login_logo' => sanitize_text_field( $post_data[ 'login_logo' ] ),
			'login_logo_thumbnail' => sanitize_text_field( $post_data[ 'login_logo_thumbnail' ] ),
		);

		// save the options
	    update_option( 'wp-project-essentials', $sanitized_data );

	    // redirect
	    wp_redirect( add_query_arg( 'updated', '1', $_SERVER['HTTP_REFERER'] ) );
	    exit();
	}
}

$GLOBALS[ 'WPES' ] = new WPES();

require_once( WPES_DIR . 'includes/apply-settings.php' );