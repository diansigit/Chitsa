<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Chitsa Theme
 * @subpackage Chitsa
 * @since Chitsa 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	
	<!-- Title -->    
    <?php if ( defined('WPSEO_VERSION') ) : ?>
		
        <title><?php wp_title(); ?></title>

	<?php else : ?>
        
    	<title><?php bloginfo( 'name' ); ?><?php wp_title( '|', true, 'left' ); ?></title>
  		<meta name="description" content="<?php bloginfo('description'); ?>">
    
    <?php endif; ?>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<script>(function(){document.documentElement.className='js'})();</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="sidebar" class="sidebar">
	

	<?php //get_sidebar(); ?>
</div><!-- .sidebar -->
<div id="page" class="hfeed site">
	<header id="header" class="site-header">
		<div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<?php 
						   /**
							* Displays a navigation menu
							* @param array $args Arguments
							*/
							wp_nav_menu( array(
								'menu_class'     => 'top-nav-menu list-inline',
								'theme_location' => 'top-menu',
							));
						?>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="social-menu-container pull-right">
						<?php 
						   /**
							* Displays a navigation menu
							* @param array $args Arguments
							*/
							wp_nav_menu( array(
								'menu_class'     => 'soc-nav-menu list-unstyled clear',
								'theme_location' => 'soc-menu',
								'walker'		 => new social_nav_menu
							));
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-header">
		<?php 
			$key = 'header';
			$logo_type = theme_options($key,'branding_type');

			// Text
			$branding_text = theme_options($key, 'branding_text');
			$branding_font_size = theme_options($key, 'branding_font_size');
			$branding_font_color = theme_options($key, 'branding_font_color');

			// Image
			$branding_image = theme_get_image(theme_options($key, 'branding_image'));
			$branding_image_retina = theme_get_image(theme_options($key, 'branding_image_retina'));
			$branding_image_retina = empty($branding_image_retina) ? $branding_image : $branding_image_retina;
			$branding_image_height = theme_options($key, 'branding_image_height');
			$branding_image_height = empty($branding_image_height) ? '' : 'style="height: '.$branding_image_height.'px;"';

			// Tag Line
			$branding_tagline = theme_options($key, 'branding_tagline_text');
		?>	
			<div class="container">
				<div class="site-branding">
					<a href="<?php echo home_url('/'); ?>" class="">
					<?php if($logo_type=='text'): ?>
						<div class="branding-text">
							<h1 style="color: <?php echo $branding_font_color; ?>; font-size: <?php echo $branding_font_size; ?>;"><?php echo $branding_text; ?></h1>
						</div>
					<?php else: ?>
						<div class="branding-image">
							<img src="<?php echo $branding_image ?>" alt="Branding Image" class="default-view" <?php echo $branding_image_height; ?>>
							<img src="<?php echo $branding_image_retina ?>" alt="Branding Image" class="retina-view" <?php echo $branding_image_height; ?>>
						</div>
					<?php endif; ?>
					<div class="branding-tagline">
						<p><?php echo $branding_tagline; ?></p>
					</div>
					</a>
				</div>
			</div>
		</div>
	</header><!-- .site-header -->
	<section id="content" class="site-content">
