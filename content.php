<?php
/**
 * The default template for displaying content
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>

			<div class="entry-details">
				<div class="entry-date">
					<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
				</div><!-- end .entry-date -->
			<?php edit_post_link( __( 'Edit', 'blackwalnut' ), '<div class="entry-edit">', '</div>' ); ?>
		</div><!-- end .entry-details -->
	</header><!-- end .entry-header -->

	<?php if ( '' != get_the_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'blackwalnut' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(); ?></a>
		</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

		<?php if ( get_theme_mod('blog_excerpts') || get_theme_mod('archive_excerpts') &&  is_archive() || is_search() ) : // Only display excerpts for archives and search results and if the automatic excerpt theme option is chosen. ?>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Read More', 'blackwalnut' ) ); ?>
				<?php
					wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'blackwalnut' ),
					'after'  => '</div>',
					) );
				?>
			</div><!-- end .entry-content -->
		<?php endif; ?>

</article><!-- end post -<?php the_ID(); ?> -->