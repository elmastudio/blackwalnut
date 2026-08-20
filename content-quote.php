<?php
/**
 * The post template for Quotes
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

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

			<div class="entry-content">
				<?php the_content( __( 'Read More', 'blackwalnut' ) ); ?>
			</div><!-- end .entry-content -->

</article><!-- end post -<?php the_ID(); ?> -->