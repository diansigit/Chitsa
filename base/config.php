<?php

$theme_config = array(
	'theme_name' 	=> __('Chitsa', 'theme_admin'), 
	'theme_slug' 	=> 'chitsa',
	
	// Theme Types
	'theme_types' => array(),
	
	// Theme Custom Meta
	'theme_custom_metas' => array( 'page' ),
	
	// Theme Menus
	'theme_menus' => array(
		'sidebar-menu' 	=> __('Sidebar Menu','theme_admin'),
		'top-menu' 		=> __('Top Menu','theme_admin'),
		'soc-menu'		=> __('Social Menu','theme_admin'),
	),

	// Theme Sidebar
	'theme_sidebars' => array(
		array(
			'id' 			=> 'home-1st',
			'name' 			=> __('Home Widget 1st Column', 'theme_admin'),
			'description' 	=> __('Home Widget 1st Column', 'theme_admin'),
			'before_widget' => '<article id="%1$s" class="widget %2$s">',
			'after_widget'  => '</article>',
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>'
		),
		array(
			'id' 			=> 'home-2nd',
			'name' 			=> __('Home Widget 2nd Column', 'theme_admin'),
			'description' 	=> __('Home Widget 2nd Column', 'theme_admin'),
			'before_widget' => '<article id="%1$s" class="widget %2$s">',
			'after_widget'  => '</article>',
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>'
		),
		array(
			'id' 			=> 'blog',
			'name' 			=> __('Blog - Sidebar Widget Area', 'theme_admin'),
			'description' 	=> __('Blog - Sidebar Widget Area', 'theme_admin'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>'
		),
	),

	// Theme Plugin
	'theme_plugins' => array(
		'wp-pagenavi',
		'text-image-widget',
	),
	
	// Theme Shortcode
	'theme_shortcodes' => array(),

	// Theme Options
	'theme_options' => array(
		//'appearance'=> __('Appearance', 'theme_admin'),
		'header'	=> __('Header', 'theme_admin'),
		'content'	=> __('Content', 'theme_admin'),
		'footer' 	=> __('Footer', 'theme_admin'),
		//'font'		=> __('Font', 'theme_admin'),
		//'home'		=> __('Home', 'theme_admin')
	),
	
);