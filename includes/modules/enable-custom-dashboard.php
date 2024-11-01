<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * load custom css on dashboard
 */
add_action( 'admin_enqueue_scripts', 'wpes_enqueue_scripts' );
function wpes_enqueue_scripts() {
    $screen = get_current_screen();
    if ( isset( $screen->base ) && $screen->base != 'dashboard' ) return;
    wp_enqueue_style( 'awd-admin-style', plugins_url( 'style.css', __FILE__ ) );
}

/**
 * Add a widget to the dashboard.
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
add_action( 'wp_dashboard_setup', 'wpes_init_widgets' );
function wpes_init_widgets() {
    $user = wp_get_current_user();
    $display_name = ucfirst( $user->data->display_name );

    wp_add_dashboard_widget(
        "astahub_welcome_dashboard", // Widget slug.
        "Welcome Back $display_name", // Title.
        "wpes_custom_dashboard_display" // Display function.
    );  
}

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function wpes_custom_dashboard_display() {
    // Display whatever it is you want to show.
    wpes_custom_dashboard_string_last_login();
    wpes_custom_dashboard_user_actions();
}

/**
 * Capture user login and add it as timestamp in user meta data
 */ 
add_action( 'wp_login', 'wpes_record_last_login', 10, 2 );
function wpes_record_last_login( $user_login, $user ) {
    $last_login = get_user_meta( $user->ID, 'last_login_current', true );
    
    if( $last_login ) {
        update_user_meta( $user->ID, 'last_login', $last_login );
    }
    else {
        update_user_meta( $user->ID, 'last_login', time() );    
    }

    update_user_meta( $user->ID, 'last_login_current', time() );
}
 
/**
 * Display last login time
 */  
function wpes_custom_dashboard_string_last_login() { 
    $user = wp_get_current_user();
    $last_login = get_user_meta( $user->ID, 'last_login', true );
    
    // last login
    if( $last_login ) {
        $icon = '<span class="dashicons dashicons-backup"></span>';
        printf( '<p>%s Your last login: %s</p>', 
            $icon, 
            esc_html( date( 'd F Y', $last_login ) ) 
        );    
    }
    else {
        $icon = '<span class="dashicons dashicons-backup"></span>';
        printf( '<p>%s This is your first login, at least on our record</p>', $icon );
    }

    // users info
    if( current_user_can( 'manage_options' ) ) {
        $icon = '<span class="dashicons dashicons-groups"></span>';
        $count_users = count_users();

        printf(
            '<p>%s You have %s total user(s) <a href="%s">[Show Me]</a></p>', 
            $icon, 
            esc_html( $count_users[ 'total_users' ] ),
            esc_url( admin_url( 'users.php' ) )
        );
    }
} 

/**
 * Dashboard welcome widget actions
 */
function wpes_custom_dashboard_user_actions() {
?>
	<style type="text/css">
		#astahub_welcome_dashboard .inside {
			padding-bottom: 0;
		}
		.awd-actions {
			border-top: 1px solid #eee;
		    padding: 0;
		    margin: 0 -11px;
		    height: 40px;
		    display: block;
		    position: relative;
		}
		.awd-actions a,
		.awd-actions a span {
			height: 40px;
		    line-height: 40px;
		}
		.awd-actions a {
			display: inline-block;
		    padding: 0;
		    width: 33.33%;
		    text-decoration: none;
		    border: 0;
		    float: left;
		    box-shadow: none !important;
		    text-align: center;
		}
		.awd-actions::before,
		.awd-actions::after {
			content: "";
            left: 33.33%;
            height: 40px;
            top: 0;
            position: absolute;
            width: 1px;
            background: #eeeeee;
		}
		.awd-actions::after {
			right: 33.33%;
            left: auto;
		}
	</style>

    <div class="awd-actions">        
        <?php if ( current_user_can( 'manage_options' ) ): ?>
            <a href="<?php echo esc_url( admin_url( 'user-new.php' ) ); ?>">
                <span class="dashicons dashicons-admin-users"></span> Add User
            </a>
        <?php endif ?>

        <a href="<?php echo esc_url( admin_url( 'profile.php' ) ); ?>">
            <span class="dashicons dashicons-edit"></span> Change Password
        </a>
        <a href="<?php echo esc_url( wp_logout_url() ); ?>">
            <span class="dashicons dashicons-lock"></span> Log Out
        </a>
    </div>
<?php
}