<?php

class Theme {
	
	var $widgets;
	var $options;
	var $shortcodes;
	
	// Initialize theme.
	function init( $options ) {
	
		// Define theme's constants.
		$this->theme_config( $options );

		// Theme support.
		add_action( 'after_setup_theme', array( &$this, 'theme_support' ) );

		// Load theme's core.
		$this->theme_functions();
		
		// Theme's plugins.
		$this->theme_plugins();
		
		// Theme's shortcodes.
		//$this->theme_shortcodes();
		
		// Theme's widgets.
		add_action( 'widgets_init', array( &$this, 'theme_widgets' ) );

		// Theme's sidebars
		$this->theme_sidebars();

		// Theme's post types
		$this->theme_types();
		
		// Theme's scripts
		add_action( 'wp_enqueue_scripts', array( &$this, 'theme_scripts' ), 0 );
		add_action( 'wp_enqueue_scripts', array( &$this, 'theme_fonts' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'theme_styles' ) );
		add_action(	'wp_head', array(&$this, 'theme_custom_header'));

		// Theme's admin.
		$this->theme_admin();
	}
	
	function theme_config( $options ) {
		
		$this->types = $options['theme_types'];
		$this->metas = $options['theme_custom_metas'];
		$this->menus = $options['theme_menus'];
		$this->sidebars = $options['theme_sidebars'];
		$this->options = $options['theme_options'];
		$this->plugins = $options['theme_plugins'];
		//$this->shortcodes = $options['theme_shortcodes'];
		
		// Get Theme Data from style.css
		$theme_data = wp_get_theme(get_option('template'));

		// Core
		define( 'THEME_NAME', $options['theme_name'] );
		define( 'THEME_SLUG', $options['theme_slug'] );
		define( 'THEME_VERSION', $theme_data['Version'] );

		define( 'THEME_URI', get_template_directory_uri());
		define( 'THEME_FRAMEWORK_URI', THEME_URI.'/base' );
		
		define( 'THEME_DIR', get_template_directory() );
		define( 'THEME_FRAMEWORK_DIR', THEME_DIR.'/base' );

		define( 'THEME_TYPES_DIR', THEME_FRAMEWORK_DIR.'/types' );
		define( 'THEME_OPTIONS_DIR', THEME_FRAMEWORK_DIR.'/options' );
		define( 'THEME_FUNCTIONS_DIR', THEME_FRAMEWORK_DIR.'/functions' );
		
		define( 'THEME_PLUGINS_DIR', THEME_FRAMEWORK_DIR.'/plugins' );
		define( 'THEME_PLUGINS_URI', THEME_FRAMEWORK_URI.'/plugins' );

		define( 'THEME_SHORTCODES_DIR', THEME_FRAMEWORK_DIR.'/shortcodes' );
		define( 'THEME_WIDGETS_DIR', THEME_FRAMEWORK_DIR.'/widgets' );
		
		// Admin
		define( 'THEME_ADMIN_DIR', THEME_FRAMEWORK_DIR.'/admin' );
		define( 'THEME_ADMIN_FUNCTIONS_DIR', THEME_ADMIN_DIR.'/functions' );

		define( 'THEME_ADMIN_ASSETS_DIR', THEME_FRAMEWORK_DIR.'/assets' );
		define( 'THEME_ADMIN_ASSETS_URI', THEME_FRAMEWORK_URI.'/assets' );

		/// Custom
		define( 'THEME_CUSTOM_DIR', THEME_FRAMEWORK_DIR.'/custom' );
		define( 'THEME_CUSTOM_URI', THEME_FRAMEWORK_URI.'/custom' );
		define( 'THEME_CUSTOM_ASSETS_URI', THEME_FRAMEWORK_URI.'/custom/assets' );

		// Styles
		define( 'THEME_ASSETS_STYLE', THEME_URI.'/assets/css');
		define( 'THEME_ASSETS_FONTS', THEME_URI.'/assets/fonts');
		
		// Javascript
		define( 'THEME_JS_LIBRARY', THEME_URI.'/assets/js/library');
		define( 'THEME_JS_PLUGINS', THEME_URI.'/assets/js/plugins');
	}
	
	function theme_support() {
		if( function_exists( 'add_theme_support' ) ) {
			// WordPress Navigation Menu
			register_nav_menus( $this->menus );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
			) );
		}
	}

	function theme_functions() {
		require_once( THEME_FUNCTIONS_DIR . '/aq_resizer.php' );
		require_once( THEME_FUNCTIONS_DIR . '/general.php' );
		require_once( THEME_FUNCTIONS_DIR . '/theme-items.php' );
		require_once( THEME_FUNCTIONS_DIR . '/theme-ajax.php' );
		require_once( THEME_FUNCTIONS_DIR . '/walker.php' );
	}

	function theme_plugins() {
		foreach ( $this->plugins as $plugin ) {
			require_once( THEME_PLUGINS_DIR . '/' . $plugin . '/' . $plugin . '.php' );
		}
	}
	
	function theme_shortcodes() {
		require_once( THEME_SHORTCODES_DIR . '/fix.php' );			// Fix
		
		// Enable Shortcode in Text Widget
		add_filter('widget_text', 'do_shortcode');
		add_filter( 'widget_text', 'theme_formatter', 99 );
		
		foreach ( $this->shortcodes as $shortcode ) {
			require_once( THEME_SHORTCODES_DIR . '/' . $shortcode . '.php' );
		}
	}
	
	function theme_widgets() {

	}

	function theme_sidebars() {
		foreach( $this->sidebars as $theme_sidebar ){
			register_sidebar($theme_sidebar);
		}
	}
	
	function theme_types() {
		foreach( $this->types as $type ) {
			require_once( THEME_TYPES_DIR . '/' . $type . '/register.php' );
		}
	}
	
	function theme_scripts() {
		
		if ( !is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ){
		
			/////////// JS Libs
			
			// Conditionizr
			wp_enqueue_script( 'conditionizr', 'http://cdnjs.cloudflare.com/ajax/libs/conditionizr.js/2.2.0/conditionizr.min.js?ver=2.2.0' );
			
			// Modernizr
			wp_enqueue_script( 'modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js?ver=2.6.2' );
			
			// Respond
			wp_enqueue_script( 'respond', THEME_JS_LIBRARY . '/respond.min.js' );
			
			// Jquery
			wp_deregister_script( 'jquery' );
			wp_enqueue_script( 'jquery', THEME_JS_LIBRARY . '/jquery.js', false, THEME_VERSION, false  );
			
			// Bootstrap
			wp_enqueue_script( 'bootstrap', THEME_JS_PLUGINS . '/bootstrap/bootstrap.js', false, THEME_VERSION, true );
			
			// Equalheight
			wp_enqueue_script( 'jquery-equalheight', THEME_JS_PLUGINS . '/equalheight/jquery.equalheight.js', false, THEME_VERSION, true );

			// Carousel
			wp_enqueue_script( 'jquery-carousel', THEME_JS_PLUGINS .'/carousel/owl.carousel.min.js', false, THEME_VERSION, true );
			
			// Comment
			wp_enqueue_script( 'comment' );
			wp_enqueue_script( 'comment-reply' );

			// Theme App Scripts
			wp_enqueue_script( 'theme-core', THEME_URI . '/assets/js/app.js', false, THEME_VERSION, 'all' );
			wp_enqueue_script( 'theme-core-script', THEME_URI . '/assets/js/scripts.js', false, THEME_VERSION, 'all' );

		}
	}

	function theme_fonts() {
		
		if ( !is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ){
		
			// Oswald
			//wp_enqueue_style( 'oswald-google-fonts', 'http://fonts.googleapis.com/css?family=Oswald:400,300,700', false, THEME_VERSION );
			
			// Opensans
			wp_enqueue_style( 'opensans-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700', false, THEME_VERSION );
		
			// Genericons Fonts
			//wp_enqueue_style( 'genericons-fonts', THEME_ASSETS_STYLE . '/genericons.css', false, THEME_VERSION );
		}
	}

	function theme_styles() {
		
		if ( !is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ){
		
			// Bootstrap
			//wp_enqueue_style( 'bootstrap', THEME_ASSETS_STYLE . '/bootstrap.min.css', false, THEME_VERSION );
			wp_enqueue_style( 'bootstrap-grid', THEME_ASSETS_STYLE . '/bootstrap.grid.min.css', false, THEME_VERSION );

			// Font Awesome
			wp_enqueue_style( 'fontawesome-css', THEME_ASSETS_STYLE . '/font-awesome.min.css', false, THEME_VERSION );
			
			// Owl Carousel
			wp_enqueue_style( 'owlcarousel-css', THEME_ASSETS_STYLE . '/owl.carousel.css', false, THEME_VERSION );
			
			// Standard style.css
			wp_enqueue_style( 'theme-css', get_stylesheet_uri(), false, THEME_VERSION );
		}
	}

	function theme_custom_header() {
		include( THEME_CUSTOM_DIR . '/custom-header.php' );
	}

	function theme_admin() {
		if ( is_admin() || ( in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) ) {
			require_once( THEME_ADMIN_DIR . '/admin.php' );
			$admin = new Theme_admin();
			$admin->init( $this );
		}
	}

}

?>