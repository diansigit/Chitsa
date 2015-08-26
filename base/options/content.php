<?php 
	
	// Option
	$options = array(
		array(
			'title' 	=> __('Page', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'set_thumbnail_fallback',
					'toggle'	 	=> 'toggle-thumbnail-fb',
					'title' 		=> __('Thumbnail Fallback', 'theme_admin'),
					'description' 	=> __('Turn on if you want set default featured image fallback', 'theme_admin'),
					'default' 		=> 'on'
				),
				array(
					'type' 			=> 'image',
					'id' 			=> 'thumbnail_fallback',
					'toggle_group'	=> 'toggle-thumbnail-fb',
					'title' 		=> __('Featured Image Fallback', 'theme_admin'),
					'description' 	=> '',
				),
				
			)
		),

	);
	
	$config = array(
		'title' 		=> __('Content', 'theme_admin'),
		'group_id' 		=> 'content',
		'active_first' 	=> false
	);
	
return array( 'options' => $options, 'config' => $config );

?>