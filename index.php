<?php
/**
 * The main template file.
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">

		<div class="post-container">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'content', get_post_format() );

				endwhile;
		?>
		</div><!-- end .post-container -->

		<?php
		// Previous/next post navigation.
		blackwalnut_content_nav( 'nav-below' ); ?>
	</div><!-- end #primary -->

<?php get_footer(); ?>