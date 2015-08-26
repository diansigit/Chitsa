<?php 
	
	// Option
	$options = array(
		array(
			'title' 	=> __('Page Font Size Options (Text Sizer)', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'range',
					'id' 			=> 'font_size_small',
					'title' 		=> __('Font Size Small', 'theme_admin'),
					'description' 	=> __('10 - 18 px', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '14',
					'min' 			=> '10',
					'max' 			=> '18',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'font_size_medium',
					'title' 		=> __('Font Size Medium', 'theme_admin'),
					'description' 	=> __('18 - 28 px', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '24',
					'min' 			=> '18',
					'max' 			=> '28',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'font_size_large',
					'title' 		=> __('Font Size Large', 'theme_admin'),
					'description' 	=> __('24 - 36 px', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '28',
					'min' 			=> '24',
					'max' 			=> '36',
					'step' 			=> '1'
				),

			)
		)
	);
	
	$config = array(
		'title' 		=> __('Home', 'theme_admin'),
		'group_id' 		=> 'content',
		'active_first' 	=> false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>