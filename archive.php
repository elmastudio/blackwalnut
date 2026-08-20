<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

get_header(); ?>

<div id="primary" class="site-content cf" role="main">

	<?php if ( have_posts() ) : ?>

		<header class="archive-header">
			<h1 class="archive-title">
					<?php
						if ( is_category() ) :
							printf( __( 'All posts filed under %s', 'blackwalnut' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						elseif ( is_tag() ) :
							printf( __( 'All posts tagged: %s', 'blackwalnut' ), '<span>' . single_tag_title( '', false ) . '</span>' );

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'blackwalnut' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'blackwalnut' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'blackwalnut' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'blackwalnut' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'blackwalnut' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'blackwalnut' ) ) . '</span>' );

						else :
							_e( 'Archives', 'blackwalnut' );

						endif;
					?>
			</h1>
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
			</header><!-- end .archive-header -->

		<div class="post-container">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; // end of the loop. ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'blackwalnut' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'blackwalnut' ); ?></p>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>
		</div><!-- end .post-container -->

		<?php
		// Previous/next post navigation.
		blackwalnut_content_nav( 'nav-below' ); ?>

</div><!-- end #primary -->

<?php get_footer(); ?>