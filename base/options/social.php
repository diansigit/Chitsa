<?php 
	
	// Option
	$options = array(
		array(
			'title' 	=> __('Social Links', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'text',
					'id' 			=> 'email',
					'title' 		=> __('Email', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> '',
					'settings'		=> array(),
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'twitter',
					'title' 		=> __('Twitter', 'theme_admin'),
					'description' 	=> 'Enter your twitter. Exp: http://twitter.com/YourID',
					'default' 		=> 'http://twitter.com/',
					'settings'		=> array(),
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'facebook',
					'title' 		=> __('Facebook', 'theme_admin'),
					'description' 	=> 'Enter your facebook. Exp: http://facebook.com/YourID',
					'default' 		=> 'http://facebook.com/',
					'settings'		=> array(),
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'linkedin',
					'title' 		=> __('LinkedIn', 'theme_admin'),
					'description' 	=> 'Enter your linkedin.',
					'default' 		=> 'http://linkedin.com/',
					'settings'		=> array(),
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'youtube',
					'title' 		=> __('Youtube', 'theme_admin'),
					'description' 	=> 'Enter your youtube.',
					'default' 		=> 'http://youtube.com/',
					'settings'		=> array(),
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'gplus',
					'title' 		=> __('Google Plus', 'theme_admin'),
					'description' 	=> 'Enter your google plus.',
					'default' 		=> 'http://plus.google.com/',
					'settings'		=> array(),
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'instagram',
					'title' 		=> __('Instagram', 'theme_admin'),
					'description' 	=> 'Enter your instagram. Exp: http://instagram.com/YourID',
					'default' 		=> 'http://instagram.com/',
					'settings'		=> array(),
				),

			)
		)
	);
	
	$config = array(
		'title' 		=> __('Contact', 'theme_admin'),
		'group_id' 		=> 'social',
		'active_first' 	=> false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>