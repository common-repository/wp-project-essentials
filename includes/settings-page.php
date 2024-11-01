<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div class="wrap" id="feslider-settings">

	<?php
		// Saved notification
		if ( isset( $_REQUEST[ 'updated' ] ) && $_REQUEST[ 'updated' ] == 1 ) {
		    echo "<div id='message' class='updated'><p><strong>Settings saved</strong></p></div>";
		}
	?>

	<form method="post" action="<?php echo admin_url( 'admin.php' ); ?>">

		<!-- key for admin_action -->
		<input type="hidden" name="action" value="wp-project-essentials" />

		<!-- nonce -->
		<?php wp_nonce_field( 'wp-project-essentials' ); ?>

		<div class="postbox ">
			<div class="hndle ui-sortable-handle">
				<span>Project Essentials</span>
				<span class="sub"></span>
				<a class="about-us-button" href="#">About Us</a>
			</div>
			<div class="inside">
				<div class="field-group">
					<label>Disable Major Updates</label>

  					<ul class='tg-list'>
  						<li class='tg-list-item'>
			    			<?php 
			    				$form_field->print_checkbox_naked( 
			    					array( array( 
			    						'name' => 'wpes[disable_major_updates]', 
			    						'value' => 1, 'saved_value' => $options[ 'disable_major_updates' ] 
			    					) ), 
			    					"class='tgl tgl-light' id='disable_major_updates'" 
			    				) 
			    			?>
			    			<label class='tgl-btn' for='disable_major_updates'></label>
			  			</li>
			  		</ul>
			  		<span>Disallow plugins and themes to install, edit and update. Also just allowed core minor (bug-fix) update and disable the major</span>
				</div>

				<div class="field-group">
					<label>Disable Comments</label>

  					<ul class='tg-list'>
  						<li class='tg-list-item'>
			    			<?php 
			    				$form_field->print_checkbox_naked( 
			    					array( array( 
			    						'name' => 'wpes[disable_comments]', 
			    						'value' => 1, 'saved_value' => $options[ 'disable_comments' ] 
			    					) ), 
			    					"class='tgl tgl-light' id='disable_comments'" 
			    				) 
			    			?>
			    			<label class='tgl-btn' for='disable_comments'></label>
			  			</li>
			  		</ul>
			  		<span>Simply ignore the posts comments</span>
				</div>

				<div class="field-group">
					<label>Disable Post Type Posts</label>

  					<ul class='tg-list'>
  						<li class='tg-list-item'>
			    			<?php 
			    				$form_field->print_checkbox_naked( 
			    					array( array( 
			    						'name' => 'wpes[disable_posts]', 
			    						'value' => 1, 'saved_value' => $options[ 'disable_posts' ] 
			    					) ), 
			    					"class='tgl tgl-light' id='disable_posts'" 
			    				) 
			    			?>
			    			<label class='tgl-btn' for='disable_posts'></label>
			  			</li>
			  		</ul>
			  		<span>Remove unwanted blog-post engine</span>
				</div>

				<div class="field-group">
					<label>Disable Default Dashboard Items</label>

  					<ul class='tg-list'>
  						<li class='tg-list-item'>
			    			<?php 
			    				$form_field->print_checkbox_naked( 
			    					array( array( 
			    						'name' => 'wpes[disable_default_dashboard]', 
			    						'value' => 1, 'saved_value' => $options[ 'disable_default_dashboard' ] 
			    					) ), 
			    					"class='tgl tgl-light' id='disable_default_dashboard'" 
			    				) 
			    			?>
			    			<label class='tgl-btn' for='disable_default_dashboard'></label>
			  			</li>
			  		</ul>
			  		<span>Clean up the dashboard</span>
				</div>

				<div class="field-group">
					<label>Enable Custom Welcome Dashboard</label>

  					<ul class='tg-list'>
  						<li class='tg-list-item'>
			    			<?php 
			    				$form_field->print_checkbox_naked( 
			    					array( array( 
			    						'name' => 'wpes[enable_custom_dashboard]', 
			    						'value' => 1, 'saved_value' => $options[ 'enable_custom_dashboard' ] 
			    					) ), 
			    					"class='tgl tgl-light' id='enable_custom_dashboard'" 
			    				) 
			    			?>
			    			<label class='tgl-btn' for='enable_custom_dashboard'></label>
			  			</li>
			  		</ul>
			  		<span>A minimalist dashboard item that contains some basic information</span>
				</div>

				<div class="field-group">
					<label>Hide WordPress Dropdown Menu on Admin Header</label>

  					<ul class='tg-list'>
  						<li class='tg-list-item'>
			    			<?php 
			    				$form_field->print_checkbox_naked( 
			    					array( array( 
			    						'name' => 'wpes[hide_wp_admin_header_menu]', 
			    						'value' => 1, 'saved_value' => $options[ 'hide_wp_admin_header_menu' ] 
			    					) ), 
			    					"class='tgl tgl-light' id='hide_wp_admin_header_menu'" 
			    				) 
			    			?>
			    			<label class='tgl-btn' for='hide_wp_admin_header_menu'></label>
			  			</li>
			  		</ul>
			  		<span>Hide unwanted WordPress icon</span>
				</div>

				<div class="field-group">
					<label>Hide Administration Menus</label>

  					<ul class='tg-list'>
  						<li class='tg-list-item'>
			    			<?php 
			    				$form_field->print_checkbox_naked( 
			    					array( array( 
			    						'name' => 'wpes[hide_administration_menus]', 
			    						'value' => 1, 'saved_value' => $options[ 'hide_administration_menus' ] 
			    					) ), 
			    					"class='tgl tgl-light' id='hide_administration_menus'" 
			    				) 
			    			?>
			    			<label class='tgl-btn' for='hide_administration_menus'></label>
			  			</li>
			  		</ul>
			  		<span>Hide Tools, Plugins, Themes and Theme Editor menu. Also hide ACF editor menu if exist.</span>
				</div>

				<div class="field-group">
					<label>Use Custom Login Logo</label>

  					<ul class='tg-list'>
  						<li class='tg-list-item'>
			    			<?php 
			    				$form_field->print_checkbox_naked( 
			    					array( array( 
			    						'name' => 'wpes[use_custom_login_logo]', 
			    						'value' => 1, 'saved_value' => $options[ 'use_custom_login_logo' ] 
			    					) ), 
			    					"class='tgl tgl-light' id='use_custom_login_logo'" 
			    				) 
			    			?>
			    			<label class='tgl-btn' for='use_custom_login_logo'></label>
			  			</li>
			  		</ul>
			  		<span>Replace WordPress logo on the login page.</span>
				</div>

				<div class="field-group">
					<label>Login Logo</label>
					<?php
						new HRS_FileUploader( array(
							'input_name' => 'wpes[login_logo]',
							'input_thumbnail_name' => 'wpes[login_logo_thumbnail]',
							'selected_url' => $options[ 'login_logo' ],
							'thumbnail' => $options[ 'login_logo_thumbnail' ],
						) );
					?>
				</div>

				<div class="field-group">
					<label>Admin Footer Left</label>
					<input type="text" name="wpes[admin_footer_left]" value="<?php echo esc_attr( $options[ 'admin_footer_left' ] ) ?>">
					<span>Thank you for creating with <a href="https://wordpress.org" target="_blank">WordPress</a></span>
				</div>

				<div class="field-group">
					<label>Admin Footer Right</label>
					<input type="text" name="wpes[admin_footer_right]" value="<?php echo esc_attr( $options[ 'admin_footer_right' ] ) ?>">
					<span>Version X.Y.Z</span>
				</div>

				<div class="text-align-right">
					<input type="submit" class="button button-primary" value="Save Settings">
				</div>
			</div>
		</div>

	</form>
</div>

<a href="https://wordpress.org/support/plugin/wp-project-essentials/reviews/#new-post" class="support-5-stars" target="_blank">
	Enjoy the plugin?, support us by share your 5 stars rating :)
	<span class="stars">
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
	</span>
</a>