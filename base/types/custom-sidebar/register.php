<?php

add_action('init','register_sidebar_custom_post_type');
function register_sidebar_custom_post_type() {
	register_post_type( 'custom_sidebar',
		array(
			'labels' => array(
				'name' 								=> __('Custom Menus', 'theme_admin'),
				'singular_name' 			=> __('Custom Menu', 'theme_admin'),
				'add_new' 						=> __('Add New', 'theme_admin'),
				'add_new_item' 				=> __('Add New Menu', 'theme_admin'),
				'edit_item' 					=> __('Edit Custom Menu', 'theme_admin'),
				'new_item' 						=> __('New Custom Menu', 'theme_admin'),
				'view_item' 					=> __('View Custom Menu', 'theme_admin'),
				'search_items' 				=> __('Search Custom Menus', 'theme_admin'),
				'not_found' 					=> __('No Custom Menus found', 'theme_admin'),
				'not_found_in_trash' 	=> __('No Custom Menus found in Trash', 'theme_admin'), 
				'parent_item_colon' 	=> '',
			),
			'singular_label' 			=> __('Custom Menu', 'theme_admin'),
			'public' 							=> true,
			'exclude_from_search' => true,
			'show_ui' 						=> true,
			'capability_type' 		=> 'post',
			'hierarchical' 				=> false,
			'rewrite' 						=> array( 'with_front' => false ),
			'query_var' 					=> false,
			'show_in_nav_menus'		=> false,
			'supports' 						=> array(''),
			'menu_position' 			=> 9,
			'menu_icon'						=> THEME_CUSTOM_ASSETS_URI . '/images/sidebar.png'
		)
	);
}