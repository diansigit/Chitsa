<?php 
	
	// Option
	$options = array(

		array(
			'title' 	=> __('Copyright', 'theme_admin'),
			'options' 	=> array(
							
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'copyright_text',
					'title' 		=> __('Copyright Text', 'theme_admin'),
					'description' 	=> __('copyright text you\'d like to display in footer', 'theme_admin'),
					'default' 		=> __('&copy; 2015 Hitami Theme', 'theme_admin')
				),			
			)
		),
	);
	
	$config = array(
		'title' 		=> __('Footer', 'theme_admin'),
		'group_id' 		=> 'footer',
		'active_first' 	=> false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>