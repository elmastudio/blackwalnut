<?php
/**
 * Template Name: Contact Page
 *
 * Description: The page template for a Contact Page
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'page' );

			endwhile;
		?>

		<?php get_sidebar('contact'); ?>
		</div><!-- end #primary -->

<?php get_footer(); ?>