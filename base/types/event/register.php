<?php

add_action('init','register_event_post_type');
function register_event_post_type() {
	register_post_type( 'event',
		array(
			'labels' => array(
				'name' 					=> __('Event', 'theme_admin'),
				'singular_name' 		=> __('Event', 'theme_admin'),
				'add_new' 				=> __('Add New', 'theme_admin'),
				'add_new_item' 			=> __('Add New Event', 'theme_admin'),
				'edit_item' 			=> __('Edit Event', 'theme_admin'),
				'new_item' 				=> __('New Event', 'theme_admin'),
				'view_item' 			=> __('View Event', 'theme_admin'),
				'search_items' 			=> __('Search Events', 'theme_admin'),
				'not_found' 			=> __('No Events found', 'theme_admin'),
				'not_found_in_trash' 	=> __('No Events found in Trash', 'theme_admin'), 
				'parent_item_colon' 	=> '',
			),
			'singular_label' 		=> __('Event', 'theme_admin'),
			'public' 				=> true,
			'exclude_from_search' 	=> true,
			'show_ui' 				=> true,
			'capability_type' 		=> 'post',
			'hierarchical' 			=> false,
			'rewrite' 				=> array( 'with_front' => false, 'slug' => '/event' ),
			'query_var' 			=> false,
			'show_in_nav_menus'		=> false,
			'supports' 				=> array('title', 'editor', 'thumbnail'),
			'menu_position'			=> 31
		)
	);

	//register taxonomy for Platform
	register_taxonomy('event_location','event',array(
		'hierarchical' => true,
		'labels' => array(
			'name' 					=> __( 'Event Location', 'theme_admin' ),
			'singular_name' 		=> __( 'Event Location', 'theme_admin' ),
			'search_items' 			=>  __( 'Search Event Location', 'theme_admin' ),
			'popular_items' 		=> __( 'Popular Event Location', 'theme_admin' ),
			'all_items' 			=> __( 'All Event Location', 'theme_admin' ),
			'parent_item' 			=> null,
			'parent_item_colon' 	=> null,
			'edit_item' 			=> __( 'Edit Event Location', 'theme_admin' ), 
			'update_item' 			=> __( 'Update Event Location', 'theme_admin' ),
			'add_new_item' 			=> __( 'Add New Event Location', 'theme_admin' ),
			'new_item_name' 		=> __( 'New Event Location Name', 'theme_admin' ),
			'separate_items_with_commas' => __( 'Separate Event Location with commas', 'theme_admin' ),
			'add_or_remove_items' 	=> __( 'Add or remove Event Location', 'theme_admin' ),
			'choose_from_most_used'	=> __( 'Choose from the most used Event Location', 'theme_admin' ),
			'menu_name' 			=> __( 'Event Location', 'theme_admin' ),
		),
		'public' 			=> true,
		'show_in_nav_menus' => true,
		'show_ui' 			=> true,
		'show_tagcloud' 	=> false,
		'query_var' 		=> false,
		'rewrite'			=> array( 'with_front' => false, 'slug' => 'event-location' )
	));
}

add_action( 'admin_menu' , 'remove_locationboxes' );
function remove_locationboxes() {
    remove_meta_box( 'event_locationdiv' , 'event' , 'normal' ); 
}

