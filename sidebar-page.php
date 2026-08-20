<?php
/**
 * The Sidebar containing default page widget area
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

if ( ! is_active_sidebar( 'page-sidebar' ) ) {
	return;
}
?>
<div id="page-sidebar" class="default-sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'page-sidebar' ); ?>
</div><!-- end #page-sidebar -->