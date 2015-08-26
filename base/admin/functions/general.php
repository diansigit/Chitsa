<?php 
	// Add theme support feature image
	add_theme_support( 'post-thumbnails' );

	// Removing Some Menu in Dashboard
	if(!function_exists('remove_menus')){
		function remove_menus()
		{
			global $submenu;
			remove_menu_page ( 'index.php' );							//Dashboard
			remove_submenu_page ( 'index.php', 'update-core.php' );		//Dashboard->Updates
  			//remove_menu_page( 'edit.php' );								//Post
			//remove_menu_page( 'upload.php' );               			//Media
  			//remove_menu_page( 'edit.php?post_type=page' );				//Pages
  			remove_menu_page( 'edit-comments.php' );					//Comments	
		}
		//add_action('admin_menu', 'remove_menus');
	}

	if(!function_exists('remove_admin_bar_links')){
		function remove_admin_bar_links() {
			global $wp_admin_bar;
			$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
			$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
			$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
			$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
			$wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
			$wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
			$wp_admin_bar->remove_menu('comments');   		// Remove Comments
			$wp_admin_bar->remove_menu('updates');     		// Remove Update Link
			//$wp_admin_bar->remove_menu('new-post');    		// Remove New Post
			$wp_admin_bar->remove_menu('new-media');   		// Remove New Page
			//$wp_admin_bar->remove_menu('new-page');     	// Remove New Media
		}
		//add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
	}

	// Rename label Post
	if(!function_exists('change_post_label')){
		function change_post_label() {
		    global $menu;
		    global $submenu;
		    $menu[5][0] = 'News';
		    $submenu['edit.php'][5][0] = 'News';
		    $submenu['edit.php'][10][0] = 'Add New';
		    $submenu['edit.php'][16][0] = 'News Tags';
		    echo '';
		}
		//add_action( 'admin_menu', 'change_post_label' );
	}
	if(!function_exists('change_post_object')){
		function change_post_object() {
		    global $wp_post_types;
		    $labels = &$wp_post_types['post']->labels;
		    $labels->name = 'News';
		    $labels->singular_name = 'News';
		    $labels->add_new = 'Add New';
		    $labels->add_new_item = 'Add New';
		    $labels->edit_item = 'Edit News';
		    $labels->new_item = 'News';
		    $labels->view_item = 'View News';
		    $labels->search_items = 'Search News';
		    $labels->not_found = 'No News found';
		    $labels->not_found_in_trash = 'No News found in Trash';
		    $labels->all_items = 'All News';
		    $labels->menu_name = 'News';
		    $labels->name_admin_bar = 'News';
		}
	 	//add_action( 'init', 'change_post_object' );
	}

	// Modify Footer Credits
	if(!function_exists('modify_footer_admin')){
		function modify_footer_admin(){  
			echo 'Developed by <a href="http://biginnovations.co" target="_blank">BIG 360</a>';  
		}  
		//add_filter('admin_footer_text', 'modify_footer_admin');
	}

	if(!function_exists('replace_footer_version')){
		function replace_footer_version(){
		  return 'West Java Inc. 1.0';
		}
		//add_filter('update_footer', 'replace_footer_version', '1234');
	}

	// add metabox to template page information guide
	if(!function_exists('add_meta_information_guide')){
		function add_meta_information_guide(){
			$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
			$template_file = get_post_meta($post_id, '_wp_page_template', true);


			if($template_file == 'template-guide.php'){
				$config = array(
					'title' 	=> __('Information Guide Options', 'theme_admin'),
					'group_id' 	=> 'information_guide',
					'context'	=> 'normal',
					'priority' 	=> 'high',
					'types' 	=> array( 'page' ),
					'multi' 	=> false
				);
				$options = array(
					array(
						'type' 			=> 'textare',
						'id' 			=> 'excerpt',
						'title' 		=> __('Kutipan', 'theme_admin'),
						'description' 	=> '',
						'default' 		=> ''
					),
				);
				new metaboxes_tool($config,$options);
			}
		}
		//add_action('admin_init','add_meta_information_guide');
	}

	//Custom Admin Logo Link
	if(!function_exists('change_wp_login_url')){
		function change_wp_login_url() 
		{
			return home_url('/'); ;  // OR ECHO YOUR OWN URL
		}
		//add_filter('login_headerurl', 'change_wp_login_url');
	}
 
	// Custom Admin Logo & alt text
	if(!function_exists('change_wp_login_title')){
		function change_wp_login_title() 
		{
			return 'Developed By BIG360'; // OR ECHO YOUR OWN ALT TEXT
		}
		//add_filter('login_headertitle', 'change_wp_login_title');
	}

	function my_login_logo() { ?>
	    <style type="text/css">
	        body.login div#login h1 a {
	            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/w-logo-blue.png);
	            background-size: 320px auto;
	            padding-bottom: 30px;
	            width: 320px;
	            height: 90px;
	        }
	        .wp-core-ui .button-primary{
	        	background: #3498db;
	        	border: none;
	        	box-shadow: none;
	        	font-size: 16px;
	        }
	        .wp-core-ui .button-primary:hover,
	        .wp-core-ui .button-primary:focus{
	        	background: #3071a9;
	        }
	        .wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large{
	        	height: 40px;
	        }
	    </style>
	<?php }
	//add_action( 'login_enqueue_scripts', 'my_login_logo' );

	function remove_empty_lines( $content ){
		// replace empty lines
		$content = preg_replace("/&nbsp;/", "", $content);
		return $content;
	}
	//add_action('content_save_pre', 'remove_empty_lines');
	
	// add / remove field in user profile form
	if (!function_exists('modify_contact_methods')) {
		function modify_contact_methods($profile_fields) {

			// Add new fields
			$profile_fields['twitter'] = 'Twitter Username';
			$profile_fields['facebook'] = 'Facebook URL';
			$profile_fields['gplus'] = 'Google+ URL';
			$profile_fields['instagram'] = 'Instagram';

			// Remove old fields
			unset($profile_fields['aim']);

			return $profile_fields;
		}
		add_filter('user_contactmethods', 'modify_contact_methods');
	}
	
?>