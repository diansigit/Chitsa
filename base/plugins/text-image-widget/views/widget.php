<?php
/**
 * Widget template. This template can be overriden using the "sp_template_image-widget_widget.php" filter.
 * See the readme.txt file for more info.
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

echo $this->get_image_html( $instance, true );

if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }

if ( !empty( $description ) ) {
	if(ICL_LANGUAGE_CODE=="en"){
		$more ='<More...';
	}elseif (ICL_LANGUAGE_CODE=="de") {
		$more ='Mehr...';
	}else{
		$more ='More...';
	}
	echo '<div class="'.$this->widget_options['classname'].'-description" >';
	if(!empty($instance['link'])){
		echo wpautop( $description.'<a href="'.$instance['link'].'" class="widget_sp_image-more-link">'.$more.'</a>' );
	}else{
		echo wpautop( $description );
	}
	echo "</div>";
}
echo $after_widget;
?>