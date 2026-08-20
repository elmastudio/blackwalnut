<?php
/**
 * The template for displaying all pages with
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

		<?php get_sidebar('page'); ?>
		</div><!-- end #primary -->

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}; ?>

<?php get_footer(); ?>