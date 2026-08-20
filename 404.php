<?php
/**
 * The template for displaying 404 error pages.
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">

		<article id="post-0" class="page no-results not-found cf">

				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'blackwalnut' ); ?></h1>
				</header><!--end .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try another search term?', 'blackwalnut' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- end .entry-content -->
		</article><!-- end #post-0 -->
		<?php get_sidebar(); ?>

</div><!-- end #primary -->

<?php get_footer(); ?>