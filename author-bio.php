<?php
/**
 * The template for displaying Author bios
 *
 * @package Chitsa Theme
 * @subpackage Chitsa
 * @since Chitsa 1.0
 */
?>

<div class="author-info">
	<section class="author-content">
		<div class="author-avatar">
			<?php
			/**
			 * Filter the author bio avatar size.
			 *
			 * @since Chitsa 1.0
			 *
			 * @param int $size The avatar height and width size in pixels.
			 */
			$author_bio_avatar_size = apply_filters( 'twentyfifteen_author_bio_avatar_size', 112 );

			echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
			?>
		</div><!-- .author-avatar -->

		<div class="author-description">
			<h3 class="author-title"><?php echo get_the_author(); ?></h3>

			<p class="author-bio">
				<?php the_author_meta( 'description' ); ?>
			</p><!-- .author-bio -->

		</div><!-- .author-description -->
	</section>
	<footer class="author-footer">
		<div class="row">
			<div class="col-xs-12 col-sm-5">
				<a class="author-link btn btn-primary btn-large" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<?php printf( __( 'View all posts by %s', 'twentyfifteen' ), get_the_author() ); ?>
				</a>
			</div>
			<div class="col-xs-12 col-sm-7">
				<div class="author-contact">
					<?php
						$url = get_the_author_meta('user_url');
						$twitter = get_the_author_meta('twitter');
						$fb = get_the_author_meta('facebook');
						$gplus = get_the_author_meta('gplus');
						$instagram = get_the_author_meta('instagram');
					?>
					<?php if (!empty($url)) : ?>
						<a href="<?php echo $url; ?>" class="author-contact-link"><i class="fa fa-link"></i></a>
					<?php endif; ?>
					<?php if (!empty($fb)) : ?>
						<a href="<?php echo $fb; ?>" class="author-contact-link"><i class="fa fa-facebook-square"></i></a>
					<?php endif; ?>
					<?php if (!empty($twitter)) : ?>
						<a href="<?php echo $twitter; ?>" class="author-contact-link"><i class="fa fa-twitter"></i></a>
					<?php endif; ?>
					<?php if (!empty($gplus)) : ?>
						<a href="<?php echo $gplus; ?>" class="author-contact-link"><i class="fa fa-google-plus-square"></i></a>
					<?php endif; ?>
					<?php if (!empty($instagram)) : ?>
						<a href="<?php echo $instagram; ?>" class="author-contact-link"><i class="fa fa-instagram"></i></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</footer>
</div><!-- .author-info -->
