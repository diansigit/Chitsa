<?php

add_filter( 'manage_edit-event_columns', 'edit_event_columns' );
function edit_event_columns( $columns ) {
	$columns = array(
		'cb' 		=> '<input type="checkbox" />',
		'title' 	=> __( 'Event Name', 'theme_admin' ),
		'time' 		=> __( 'Event Date Time', 'theme_admin' ),
		'venue'	 	=> __( 'Event Location', 'theme_admin' ),
		'url'		=> __( 'Event Website', 'theme_admin' ),
		//'date' 		=> __( 'Publish', 'theme_admin' ),
	);

	return $columns;
}

add_action( 'manage_posts_custom_column', 'manage_event_columns' );
function manage_event_columns( $column ) {
	global $post;

	$post_id = $post->ID;
	$key_location = 'location_';
	$key_schedule = 'schedule_';
	$key_contact = 'contact_';
	$single = true;

	$country_id = get_post_meta( $post_id, $key_location.'country',  $single);
	$country_name = get_term_by('id', $country_id, 'event_location')->name;
	$city_id = get_post_meta( $post_id, $key_location.'city', $single );
	$city_name = get_term_by('id', $city_id, 'event_location')->name;
	$location = '<span style="text-transform: uppercase">'.$country_name.'</span> ('.$city_name.')';

	$date = get_post_meta( $post_id, $key_schedule.'date', $single );
	$date_fmt = !empty($date) ? date_format(date_create($date), 'd F Y') : '';
	$time = get_post_meta( $post_id, $key_schedule.'hour', $single );
	$date_time = !empty($time) && !empty($date_fmt) ? $date_fmt.' '.$time : $date_fmt;
	$date_until = get_post_meta( $post_id, $key_schedule.'date_until', $single );
	$date_until_fmt = !empty($date_until) ? date_format(date_create($date_until), 'd F Y') : '';
	$time_until = get_post_meta( $post_id, $key_schedule.'hour_until', $single );
	$date_time_until = !empty($time_until) && !empty($date_until_fmt) ? ' - '.$date_until_fmt.' '.$time_until : (!empty($date_until_fmt) ? ' - '.$date_until_fmt : '');
	$date_time_fmt = !empty($date_time) ? $date_time.$date_time_until : ''; 

	$url = get_post_meta( $post_id, $key_contact.'website', $single );
	$website = !empty($url) ? '<a href="'.$url.'">'.$url.'</a>' : '';
	
	if ( $post->post_type == "event" ) {
		switch( $column ) {

			case 'time':
				echo $date_time_fmt;
				break;

			case 'venue':
				echo $location;
				break;

			case 'url':
				echo $website;
				break;
		}
	}
}

function title_save_pre_event($title) {
	if ( isset( $_REQUEST['post_type'] ) && isset( $_REQUEST['action'] ) ) {
		if ( $_REQUEST['post_type'] == 'event' && $_REQUEST['action'] == 'editpost' ) {
			$sidebar_name = $_POST['event']['name'];
			return $sidebar_name;
		}
	}
	return $title;
}
//add_filter ('title_save_pre', 'title_save_pre_event');

?>