<?php
/**
 * The Template for displaying single posts.
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

get_header(); ?>

<div class="content-wrap cf">
	<div id="primary" class="site-content cf" role="main">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'single' );

			endwhile;
		?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}; ?>

	<?php
		// Previous/next post navigation.
		blackwalnut_post_nav( 'nav-single' ); ?>

	</div><!-- end #primary -->

	<?php get_sidebar(); ?>

	</div><!-- end .content-wrap -->

<?php get_footer(); ?>