<?php 
	
	// Option
	$options = array(
		
		// Branding
		array(
				'title' 	=> 'Branding',
				'options' 	=> array(
					
					array(
						'type' 			=> 'input_file',
						'id' 			=> 'branding_favicon',
						'extensions' 	=> 'ico',
						'title' 		=> __('Favicon', 'theme_admin'),
						'description' 	=> __('must be "ico" file, you can generate it from <a href="http://tools.dynamicdrive.com/favicon/">here</a>', 'theme_admin')
					),
					array(
						'type' 			=> 'image',
						'id' 			=> 'branding_admin_logo',
						'title' 		=> __('WP Login Logo', 'theme_admin'),
						'description' 	=> __('logo to be shown on WP-Admin Login Page', 'theme_admin')
					)
					
				)
			),
		
		// Background
		array(
			'title' 	=> 'Background',
			'options' 	=> array(
				
				array(
					'type' 			=> 'color',
					'id' 			=> 'site_bg_color',
					'title' 		=> __('Background Color', 'theme_admin'),
					'description' 	=> __('choose color to use as background', 'theme_admin'),
					'default' 		=> '#00c5fb'
				),
				array(
					'type' 			=> 'radio_img',
					'id' 			=> 'site_bg_pattern',
					'title'		 	=> __('Background Pattern', 'theme_admin'),
					'description' 	=> __('choose pattern to overlay the background color', 'theme_admin'),
					'default' 		=> 'grid-black-2.png',
					'options' 		=> array(
						'none.png' 			=> __('None', 'theme_admin'),
						'grain.png' 		=> __('Grain', 'theme_admin'),
						'diagonal-1.png' 	=> __('Diagonal #1', 'theme_admin'),
						'diagonal-2.png' 	=> __('Diagonal #2', 'theme_admin'),
						'mosaic-1.png' 		=> __('Mosaic', 'theme_admin'),
						'pixcel.png' 		=> __('Pixcel', 'theme_admin'),
						'grid-black-1.png' 	=> __('Grid Black #1', 'theme_admin'),
						'grid-black-2.png' 	=> __('Grid Black #2', 'theme_admin'),
						'grid-black-3.png' 	=> __('Grid Black #3', 'theme_admin'),
						'grid-black-4.png' 	=> __('Grid Black #4', 'theme_admin'),
						'grid-white-1.png' 	=> __('Grid White #1', 'theme_admin'),
						'grid-white-2.png' 	=> __('Grid White #2', 'theme_admin'),
						'grid-white-3.png' 	=> __('Grid White #3', 'theme_admin'),
						'grid-white-4.png' 	=> __('Grid White #4', 'theme_admin'),
					),
					'images' 		=> array(
						'none.png' 			=> 'none.png',
						'grain.png' 		=> 'bg-pattern/grain.png',
						'diagonal-1.png' 	=> 'bg-pattern/diagonal-1.png',
						'diagonal-2.png' 	=> 'bg-pattern/diagonal-2.png',
						'mosaic-1.png' 		=> 'bg-pattern/mosaic-1.png',
						'pixcel.png'	 	=> 'bg-pattern/pixcel.png',
						'grid-black-1.png' 	=> 'bg-pattern/grid-black-1.png',
						'grid-black-2.png' 	=> 'bg-pattern/grid-black-2.png',
						'grid-black-3.png' 	=> 'bg-pattern/grid-black-3.png',
						'grid-black-4.png' 	=> 'bg-pattern/grid-black-4.png',
						'grid-white-1.png' 	=> 'bg-pattern/grid-white-1.png',
						'grid-white-2.png' 	=> 'bg-pattern/grid-white-2.png',
						'grid-white-3.png' 	=> 'bg-pattern/grid-white-3.png',
						'grid-white-4.png' 	=> 'bg-pattern/grid-white-4.png',
					)
				),

				array(
					'type' 			=> 'image',
					'id' 			=> 'site_bg_image',
					'title' 		=> __('Background Image', 'theme_admin'),
					'description' 	=> __('choose image to use as background', 'theme_admin')
				),
				/*
				array(
					'type' 			=> 'select',
					'id' 			=> 'site_bg_repeat',
					'title' 		=> __('Background Repeat', 'theme_admin'),
					'description' 	=> __('choose the repeat type of site background', 'theme_admin'),
					'default' 		=> 'stretch',
					'options' 		=> array(
						'stretch' 		=> __('Stretch', 'theme_admin'),
						'no-repeat' 	=> __('No Repeat', 'theme_admin'),
						'repeat' 		=> __('Repeat', 'theme_admin'),
						'repeat-x' 		=> __('Repeat X', 'theme_admin'),
						'repeat-y' 		=> __('Repeat Y', 'theme_admin')
					)
				),
				*/		
						
			)
		),	
		
	);
	
	$config = array(
		'title'			=> __('Appearance', 'theme_admin'),
		'group_id' 		=> 'appearance',
		'active_first' 	=> true
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>