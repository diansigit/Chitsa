<?php

class Theme_admin {
	
	var $theme;
	
	function init( $theme ) {
		
		$this->theme = $theme;

		// Redirect index.php (dashboard)
		//add_action('load-index.php', array( &$this,'redirect_dashboard') );

		// Add admin functions
		$this->functions();
			
		// Add setting menu
		add_action('admin_menu', array(&$this,'add_option_menu'), 10 );

		// Add custom post types
		$this->theme_types();

		// Add custom metas
		$this->theme_metas();

		// Support Ajax call
		$this->ajax_call();
	}

	// Redirect Dashboard
	// =================================== //
	function redirect_dashboard(){
		if( is_admin() ) {
			$screen = get_current_screen();
			if( $screen->base == 'dashboard' ) {
				if(current_user_can( 'edit_theme_options' )){
					wp_redirect( admin_url( 'admin.php?page=theme_setting' ) );
				}else{
					wp_redirect( admin_url( 'edit.php' ));
				}
			}
		}
	}

	// Admin functions
	// =================================== //
	
	function functions() {
		require_once(THEME_ADMIN_FUNCTIONS_DIR .'/general.php');
		// Include CSS for Admin
		require_once(THEME_ADMIN_FUNCTIONS_DIR .'/admin-head.php');
		// Input generator tool
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/input-tool.php' );		
		// Metabox generator tool
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/meta-tool.php' );
		// Media Upload
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/media-upload.php' );
	}
	
	// Custom Post Types
	// =================================== //
	function theme_types() {
		foreach( $this->theme->types as $type ) {
			require_once( THEME_TYPES_DIR.'/'.$type.'/register.php' );
			require_once( THEME_TYPES_DIR.'/'.$type.'/manage.php' );
			require_once( THEME_TYPES_DIR.'/'.$type.'/content.php' );
		}
	}

	// Custom Meta
	// =================================== //
	function theme_metas() {
		foreach( $this->theme->metas as $meta ) {
			require_once( THEME_TYPES_DIR.'/'.$meta.'/content.php' );
		}
	}


	// Theme options menu
	// =================================== //
	
	function add_option_menu() {
		// Admin theme main menu
		//$update_bubble = ( is_theme_update() ) ? '<span class="update-plugins count-1"><span class="update-count">Updates</span></span>' : '';
		add_menu_page( THEME_NAME, 'Theme Options', 'edit_theme_options', 'theme_setting', array( &$this, 'load_option_menu' ), THEME_ADMIN_ASSETS_URI . '/images/service.png', 3 );
		
		// Admin theme sub menu
		add_submenu_page('theme_setting', __('Options', 'theme_admin'), __('Options', 'theme_admin'), 'edit_theme_options', 'theme_setting', array(&$this,'load_option_menu'));
		//add_theme_page(__('Options', 'theme_admin'), __('Options', 'theme_admin'), 'edit_theme_options', 'theme_setting', array(&$this,'load_option_menu'));
	}
	
	function load_option_menu() {
		// Setting page
		$sections = $this->theme->options;
		
		if( $_GET['page'] == 'theme_setting' )
		include_once( THEME_ADMIN_FUNCTIONS_DIR.'/' . str_replace('_', '-', $_GET['page']) . '.php' );
	}
	
	// Admin AJAX handlerer
	// =================================== //
	function ajax_call() {
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/admin-ajax.php' );
	}
	
}

?>