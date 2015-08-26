<?php

// Add .last to last menu item
// add_filter('wp_nav_menu','add_last_item_class');
function add_last_item_class($menuHTML) {
    $last_items_ids  = array();

    // Get all custom menus
    $menus = wp_get_nav_menus();
    
    // For each menu find last items
    foreach ( $menus as $menu_maybe ) {

        // Get items of specific menu
        if ( $menu_items = wp_get_nav_menu_items($menu_maybe->term_id) ) {

            $items = array();
            foreach ( $menu_items as $menu_item ) {
               $items[$menu_item->menu_item_parent][] .= $menu_item->ID;
            }

            // Find IDs of last items
            foreach ( $items as $item ) {
                $last_items_ids[] .= end($item);
            }
        }
    }

    foreach( $last_items_ids as $last_item_id ) {
        $items_add_class[] .= ' menu-item-'.$last_item_id;
        $replacement[]     .= ' menu-item-'.$last_item_id . ' last';
    }

    $menuHTML = str_replace($items_add_class, $replacement, $menuHTML);
    return $menuHTML;
}

function theme_options( $section = '', $field = '' ) {
	$theme_options = get_option( THEME_SLUG . '_options' );
	
	if ( !isset( $theme_options ) ) return null;
	
	if ( '' != $section && '' != $field ) return ( isset( $theme_options[$section][$field] ) ) ? $theme_options[$section][$field] : null;
	elseif ( '' != $section ) return ( isset( $theme_options[$section] ) ) ? $theme_options[$section] : null;
	else return ( isset( $theme_options ) ) ? $theme_options : null;
}

function theme_reset_options() {
	delete_option( THEME_SLUG . '_options' );
}

function getContrastYIQ( $hexcolor ){
	$r = hexdec( substr ( $hexcolor, 1, 2 ) );
	$g = hexdec( substr( $hexcolor, 3, 2 ) );
	$b = hexdec( substr( $hexcolor, 5, 2 ) );
	$yiq = ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000;
	return ( $yiq >= 128 ) ? '#333' : '#FFF';
}

function getDarkLightYIQ( $hexcolor ){
	$r = hexdec( substr ( $hexcolor, 1, 2 ) );
	$g = hexdec( substr( $hexcolor, 3, 2 ) );
	$b = hexdec( substr( $hexcolor, 5, 2 ) );
	$yiq = ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000;
	return ( $yiq >= 128 ) ? 'light' : 'dark';
}

function theme_get_attachment_src( $attachment_id ) {
	if( wp_get_attachment_url( $attachment_id ) ) return str_replace( ' ', '%20', wp_get_attachment_url( $attachment_id ) );
	else return $attachment_id;
}

function theme_get_image( $attachment_id, $width = null, $height = null, $crop = false ) {
    if( filter_var($attachment_id, FILTER_VALIDATE_URL) ) $image_url = $attachment_id;
    else $image_url = wp_get_attachment_url( $attachment_id );
   
    if( $width != null || $height != null ) {
        // $resized_image = fImg::resize( $image_url, $width, $height, $crop );
        $resized_image = aq_resize( $image_url, $width, $height, $crop, true );
        if($resized_image) {
            return $resized_image;
        } else {
            return $image_url;
        }
    } else {
        return $image_url;
    }
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 

?>