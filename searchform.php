<?php
/**
 * Template for displaying the standard search forms
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */
?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s" class="screen-reader-text"><span><?php _e( 'Search', 'blackwalnut' ); ?></span></label>
	<input type="text" class="search-field" name="s" id="s" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'blackwalnut' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'blackwalnut' ); ?>" />
</form>