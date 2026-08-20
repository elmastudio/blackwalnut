<?php
/**
 * The template used for displaying page content.
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- end .entry-header -->

	<div class="entry-content cf">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'blackwalnut' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit this Page', 'blackwalnut' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->

</article><!-- end post-<?php the_ID(); ?> -->