<?php
/**
 * The Sidebar containing default page widget area
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

if ( ! is_active_sidebar( 'contact-sidebar' ) ) {
	return;
}
?>
<div id="contact-sidebar" class="default-sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'contact-sidebar' ); ?>
</div><!-- end #contact-sidebar -->