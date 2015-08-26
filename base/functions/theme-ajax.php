<?php 
	if (!function_exists('post_infinite_scroll')){
		function post_infinite_scroll(){
			$paged = $_POST['page_no'];
			$args = array(
				'post_type'		=> 'post',
				'post_status' 	=> 'publish',
				'paged'			=> $paged
			);

			query_posts($args);
			if (have_posts()) : 
				while (have_posts()) : the_post();
				get_template_part( 'content', 'infinite' );
				endwhile;
			endif;
			wp_reset_query();

			exit;
		}
		add_action('wp_ajax_post_infinite_scroll','post_infinite_scroll');
		add_action('wp_ajax_nopriv_post_infinite_scroll','post_infinite_scroll');
	}
?>