<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function blackwalnut_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' 		=> 'primary',
		'footer_widgets' 	=> array( 'footer-1', 'footer-2', 'footer-3' ),
		'footer'    		=> 'main-container',
	) );
}
add_action( 'after_setup_theme', 'blackwalnut_jetpack_setup' );