<?php

$config = array(
	'title' 	=> __('Event Location', 'theme_admin'),
	'group_id' 	=> 'location',
	'context'	=> 'normal',
	'priority' 	=> 'high',
	'types' 	=> array( 'event' ),
	'multi' 	=> false
);


global $wpdb;
$qt = 'SELECT * FROM '.$wpdb->terms.' AS t INNER JOIN '.$wpdb->term_taxonomy.' AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy =  "event_location" AND tt.parent = 0 ORDER BY  t.term_id ASC LIMIT 0 , 30';
$terms = $wpdb->get_results($qt, ARRAY_A);

$select = array(
	'00000' => __('Please Select Country', 'theme_admin')
);
foreach ($terms as $term) {
	$select[$term['term_id']] = __($term['name'], 'theme_admin');
}

$options = array(
	
	/*array(
		'type' 			=> 'text',
		'id' 			=> 'name',
		'title' 		=> __('Venue Name', 'theme_admin'),
		'description' 	=> __('', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'textarea',
		'id' 			=> 'address',
		'title' 		=> __('Address', 'theme_admin'),
		'description' 	=> __('', 'theme_admin'),
		'default' 		=> ''
	),*/
	array(
		'type' 			=> 'select',
		'id' 			=> 'country',
		'title' 		=> __('Country', 'theme_admin'),
		'description' 	=> __('*Required', 'theme_admin'),
		'default' 		=> '00000',
		'options'		=> $select
	),
	array(
		'type' 			=> 'select',
		'id' 			=> 'city',
		'title' 		=> __('City', 'theme_admin'),
		'description' 	=> __('*Required', 'theme_admin'),
		'default' 		=> '00000',
		'options'		=>	array(
			'00000'		=>	'Please Select City'
		),
	),
	/*array(
		'type' 			=> 'separator',
		'title' 		=> __('Google Maps Coordinate', 'theme_admin')
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'longitude',
		'title' 		=> __('Longitude', 'theme_admin'),
		'description' 	=> __('', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'longitude',
		'title' 		=> __('Latitude', 'theme_admin'),
		'description' 	=> __('', 'theme_admin'),
		'default' 		=> ''
	),*/

);
new metaboxes_tool($config,$options);

$config = array(
	'title' 	=> __('Event Schedule', 'theme_admin'),
	'group_id' 	=> 'schedule',
	'context'	=> 'side',
	'priority' 	=> 'low',
	'types' 	=> array( 'event' ),
	'multi' 	=> false
);
$options = array(
	array(
		'type' 			=> 'date',
		'id' 			=> 'date',
		'title' 		=> __('Event Date', 'theme_admin'),
		'description' 	=> __('', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'time',
		'id' 			=> 'hour',
		'title' 		=> __('Event Time', 'theme_admin'),
		'description' 	=> __('', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'date',
		'id' 			=> 'date_until',
		'title' 		=> __('Event Date', 'theme_admin'),
		'description' 	=> __('Until', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'time',
		'id' 			=> 'hour_until',
		'title' 		=> __('Event Time', 'theme_admin'),
		'description' 	=> __('Until', 'theme_admin'),
		'default' 		=> ''
	),

);
new metaboxes_tool($config,$options);

$config = array(
	'title' 	=> __('Event Info', 'theme_admin'),
	'group_id' 	=> 'contact',
	'context'	=> 'side',
	'priority' 	=> 'low',
	'types' 	=> array( 'event' ),
	'multi' 	=> false
);
$options = array(
	/*array(
		'type' 			=> 'text',
		'id' 			=> 'phone',
		'title' 		=> __('Phone Number', 'theme_admin'),
		'description' 	=> __('', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'email',
		'title' 		=> __('Email', 'theme_admin'),
		'description' 	=> __('', 'theme_admin'),
		'default' 		=> ''
	),*/
	array(
		'type' 			=> 'text',
		'id' 			=> 'website',
		'title' 		=> __('Website', 'theme_admin'),
		'description' 	=> __('', 'theme_admin'),
		'default' 		=> '#'
	),
);
new metaboxes_tool($config,$options);

?>