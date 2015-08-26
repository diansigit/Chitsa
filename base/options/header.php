<?php 
	
	// Option
	$options = array(
		// Header
		array(
			'title' 	=> __('Header Container', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'color',
					'id' 			=> 'top_header_bg_color',
					'title' 		=> __('Top Header BG Color', 'theme_admin'),
					'description' 	=> __('background color of top header section', 'theme_admin'),
					'default' 		=> '#FFFFFF'
				),

				array(
					'type' 			=> 'color',
					'id' 			=> 'top_header_font_color',
					'title' 		=> __('Top Header Font Color', 'theme_admin'),
					'description' 	=> __('font color of top header section', 'theme_admin'),
					'default' 		=> '#FFFFFF'
				),

				array(
					'type' 			=> 'color',
					'id' 			=> 'header_bg_color',
					'title' 		=> __('Header BG Color', 'theme_admin'),
					'description' 	=> __('background color of header section', 'theme_admin'),
					'default' 		=> '#FFFFFF'
				),

				array(
					'type' 			=> 'color',
					'id' 			=> 'header_font_color',
					'title' 		=> __('THeader Font Color', 'theme_admin'),
					'description' 	=> __('font color of header section', 'theme_admin'),
					'default' 		=> '#FFFFFF'
				),
						
			)
		),
			
		// Logo
		array(
			'title' 	=> __('Logo', 'theme_admin'),
			'options' 	=> array(

				array(
					'type' 			=> 'radio_img',
					'id' 			=> 'branding_type',
					'toggle' 		=> 'toggle-branding-type',
					'title' 		=> __('Logo Type', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> 'text',
					'options' 		=> array(
						'text' 			=> __('Text', 'theme_admin'),
						'image' 		=> __('Image', 'theme_admin'),
					),
					'images' 		=> array(
						'text' 			=> 'branding-type/text.png',
						'image' 		=> 'branding-type/image.png',
					)
				),
				
				// Text
				array(
					'type' 			=> 'text',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-text',
					'id' 			=> 'branding_text',
					'title' 		=> __('Branding Text', 'theme_admin'),
					'description' 	=> __('', 'theme_admin'),
				),	

				array(
					'type' 			=> 'range',
					'id' 			=> 'branding_font_size',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-text',
					'title' 		=> __('Font Size', 'theme_admin'),
					'description' 	=> __('24 - 72 px', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '30',
					'min' 			=> '24',
					'max' 			=> '72',
					'step' 			=> '2'
				),
				
				array(
					'type' 			=> 'color',
					'id' 			=> 'branding_font_color',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-text',
					'title' 		=> __('Font Color', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> '#333333'
				),
				
							
				// Image
				array(
					'type' 			=> 'image',
					'id' 			=> 'branding_image',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-image',
					'title' 		=> __('Logo Image', 'theme_admin'),
					'description' 	=> __('Upload your logo here and enter the height of it below', 'theme_admin')
				),

				array(
					'type' 			=> 'image',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-image',
					'id' 			=> 'branding_image_retina',
					'title' 		=> __('Retina Logo Image', 'theme_admin'),
					'description' 	=> __('Upload at exactly 2x the size of your standard logo. Supplying this will keep your logo crisp on screens with a higher pixel density.', 'theme_admin')
				),

				array(
					'type' 			=> 'text',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-image',
					'id' 			=> 'branding_image_height',
					'title' 		=> __('Logo Height', 'theme_admin'),
					'description' 	=> __('Don\'t include "px" in the string. e.g. 30', 'theme_admin'),
					'default' 	=> '70',
				),	

				// Tag line	=> array(			
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'branding_tagline_text',
					'title' 		=> __('Tagline Text', 'theme_admin'),
					'description' 	=> __('', 'theme_admin'),
				),		
					
			)
		),
		
	);
	
	$config = array(
		'title' 		=> __('Header', 'theme_admin'),
		'group_id' 		=> 'header',
		'active_first' 	=> true
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>