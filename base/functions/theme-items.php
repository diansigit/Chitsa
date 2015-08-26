<?php
	
// Theme Hot News
if (!function_exists('theme_hot_news')){
	function theme_hot_news(){
		$args = array(
		    'post_type' 		=> 'post',
		    'post_status' 		=> 'publish',
		    'posts_per_page' 	=> 5,
		    'meta_query' 		=> array(
		        array(
		            'key' 		=> 'post_hot_article',
		            'value' 	=> 'on', 
		        )
		    ),
		);

		$query = query_posts($args);

		if (have_posts()) :
			$i = 0;
		?>
		<div class="hot-news-list">
			<div class="row">
				<div class="col-xs-12 col-md-6">
		<?php

			while (have_posts()) : the_post();
				
				if ($i==0) :
					$feature_image = theme_get_image(get_post_thumbnail_id(), '500', '347', true);
		?>
					<a href="<?php echo get_permalink(); ?>" class="hot-news-item">
						<img src="<?php echo $feature_image; ?>" alt="<?php the_title(); ?>">
						<div class="hot-news-overlay">
							<h2 class="hot-news-title"><span></span><?php the_title(); ?></h2>
						</div>
					</a>
				</div>
				<div class="col-xs-12 col-md-6 hot-news-secondary">
					<div class="row">
		<?php
				else:
					$feature_image = theme_get_image(get_post_thumbnail_id(), '500', '345', true);
		?>
						<div class="col-xs-12 col-sm-6">
							<a href="<?php echo get_permalink(); ?>" class="hot-news-item">
								<img src="<?php echo $feature_image; ?>" alt="<?php the_title(); ?>">
								<div class="hot-news-overlay">
									<h2 class="hot-news-title"><span></span><?php the_title(); ?></h2>
								</div>
							</a>
						</div>
		<?php
				endif;
				$i++;
			endwhile;
		?>
				
					</div><!-- /row -->
				</div><!-- /col -->
			</div><!-- /row -->
		</div><!-- /hot news list -->
		<?php
		endif;
		wp_reset_query();
	}
}

// Theme Banner
if (!function_exists('theme_banner')){
	function theme_banner(){
		$banner_image = theme_get_image(theme_options('content', 'banner_image'));

		if (!empty($banner_image)) :
	?>
			<div class="banner-container">
				<img src="<?php echo $banner_image; ?>" alt="Hutami Themes Banner">
			</div>
	<?php
		endif;
	}
}

// Theme Latest News
if (!function_exists('theme_latest_news')){
	function theme_latest_news(){
		$args = array(
		    'post_type' 		=> 'post',
		    'post_status' 		=> 'publish',
		    'posts_per_page' 	=> 10,
		);

		$query = query_posts($args);

		if (have_posts()) :
			$i = 0;
		?>
		<div class="latest-news panel">
			<h2 class="panel-title">
				<?php echo theme_options('home', 'latest_title'); ?> Latest Article
			</h2>
			<div class="panel-content">
		<?php  
			while (have_posts()) : the_post();
				$feature_image = theme_get_image(get_post_thumbnail_id(), '500', '345', true);
		?>
				<article id="post-<?php the_id(); ?>" <?php echo post_class(); ?>>
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<a href="<?php echo get_permalink(); ?>" class="meta-image">
								<img src="<?php echo $feature_image; ?>" alt="<?php the_title(); ?>">
							</a>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="entry-header">
								<span class="meta-category">
									<?php the_category('<span>•</span>'); ?>
								</span>
								<h2 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="entry-meta">
									<div class="meta-item date">
										<span class="updated"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
									</div>
									<!--<div class="meta-item comments">
										<a href="<?php echo get_permalink(); ?>#respond"><?php _e('Add Comment','theme_front'); ?></a>
									</div>-->
									<div class="meta-item views">
										<?php echo getPostViews(get_the_ID()); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
		<?php 
			endwhile;
		?>
				<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-primary btn-block btn-large">View All Post</a>
			</div>
		</div><!-- /hot news list -->
		<?php
		endif;
		wp_reset_query();
	}
}

// Theme Thumbnail Fallback
if (!function_exists('theme_thumb_fb')){
	function theme_thumb_fb($width = null, $height = null){
		if (theme_options('content', 'set_thumbnail_fallback') == 'on'){
			return theme_get_image(theme_options('content', 'thumbnail_fallback'), $width, $height, true);
		}else{
			return null;
		}
	}
}

?>