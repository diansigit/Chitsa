<?php

$config = array(
	'title' 	=> __('Post Options', 'theme_admin'),
	'group_id' 	=> 'post',
	'types' 	=> array( 'post' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'multi' 	=> false,
	'classes'	=> array()
);
$options = array(
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'hot_article',
		'title' 		=> __('Hot News', 'theme_admin'),
		'description' 	=> __('Untuk menampilkan post sebagai hot post','theme_admin'),
		'default' 		=> 'off'
	)
);
new metaboxes_tool($config,$options);

// Globalize $post
global $post;
// Get the page template post meta
//echo "string";
$id = (isset($_GET['post']))? $_GET['post'] : 0;
$page_template = get_post_meta( $id, '_wp_page_template', true );
// If the current page uses our specific
// template, then output our post meta

// Trial Page Template
$is_show = ( 'template-trial.php' == $page_template ) ? "option-is-show" : "option-is-hide";
// Shortcode Meta
$config = array(
	'title' 	=> __('Trial Page Options', 'theme_admin'),
	'group_id' 	=> 'trial_page',
	'types' 	=> array( 'page' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'multi' 	=> false,
	'classes'	=> array($is_show)
);
$options = array(
	array(
		'type' 			=> 'text',
		'id' 			=> 'menu_title',
		'title' 		=> __('Home Menu Title', 'theme_admin'),
		'description' 	=> __('This title need to display in home menu', 'theme_admin'),
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'menu_subtitle',
		'title' 		=> __('Home Menu Subtitle', 'theme_admin'),
		'description' 	=> __('This Subtitle need to display in home menu', 'theme_admin'),
	),
	array(
		'type' 			=> 'color',
		'id' 			=> 'theme_color',
		'title' 		=> __('Theme Color', 'theme_admin'),
		'description' 	=> __('Set theme color for page appearance', 'theme_admin'),
		'default' 		=> '#ef5026'
	),
	array(
		'type' 			=> 'separator',
		'title' 		=> __('Inner Logo', 'theme_admin'),
	),
	array(
		'type' 			=> 'color',
		'id' 			=> 'inner_font_color',
		'title' 		=> __('Header Font Color', 'theme_admin'),
		'description' 	=> __('Set color for font header appearance', 'theme_admin'),
		'default' 		=> '#000000'
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'inner_logo',
		'title' 		=> __('Logo Image', 'theme_admin'),
		'description' 	=> __('Upload your logo here and enter the height of it below', 'theme_admin')
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'inner_logo_retina',
		'title' 		=> __('Retina Logo Image', 'theme_admin'),
		'description' 	=> __('Upload at exactly 2x the size of your standard logo. Supplying this will keep your logo crisp on screens with a higher pixel density.', 'theme_admin')
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'inner_logo_height',
		'title' 		=> __('Logo Height', 'theme_admin'),
		'description' 	=> __('Don\'t include "px" in the string. e.g. 30', 'theme_admin'),
		'default' 		=> '',
	),
	array(
		'type' 			=> 'separator',
		'title' 		=> __('Home Logo', 'theme_admin'),
	),
	array(
		'type' 			=> 'color',
		'id' 			=> 'home_font_color',
		'title' 		=> __('Home Excerpt / Menu Font Color', 'theme_admin'),
		'description' 	=> __('Set color for excerpt or menu home appearance', 'theme_admin'),
		'default' 		=> '#000000'
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'home_logo',
		'title' 		=> __('Logo Image', 'theme_admin'),
		'description' 	=> __('Upload your logo here and enter the height of it below', 'theme_admin')
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'home_logo_retina',
		'title' 		=> __('Retina Logo Image', 'theme_admin'),
		'description' 	=> __('Upload at exactly 2x the size of your standard logo. Supplying this will keep your logo crisp on screens with a higher pixel density.', 'theme_admin')
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'home_logo_height',
		'title' 		=> __('Logo Height', 'theme_admin'),
		'description' 	=> __('Don\'t include "px" in the string. e.g. 30', 'theme_admin'),
		'default' 		=> '',
	),
);
//new metaboxes_tool($config,$options);

?>