<?php
/**
 * The template for displaying the footer.
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */
?>

</div><!-- end .main-container -->

<footer id="colophon" class="site-footer cf" role="contentinfo">

	<?php get_sidebar( 'footer' ); ?>

	<div id="site-info">
		<ul class="credit" role="contentinfo">
			<?php if ( get_theme_mod( 'credit_text' ) ) : ?>
				<li><?php echo wp_kses_post( get_theme_mod( 'credit_text' ) ); ?></li>
			<?php else : ?>
			<li class="copyright"> &copy; <?php echo date('Y'); ?> <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo(); ?>.</a>
				<?php
					/* Include Privacy Policy link. */
					if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( '<span>', '</span>', 'blackwalnut');
					}
				?>
			</li>
			<li class="wp-credit">
				<?php _e('Proudly powered by', 'blackwalnut') ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'blackwalnut' ) ); ?>" ><?php _e('WordPress.', 'blackwalnut') ?></a>
			</li>
			<li>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'blackwalnut' ), 'Black Walnut', '<a href="https://www.elmastudio.de/en/" rel="designer">Elmastudio</a>' ); ?>
			</li>
			<?php endif; ?>
		</ul><!-- end .credit -->
	</div><!-- end #site-info -->
	<div class="top"><span><?php _e('Top', 'blackwalnut') ?></span></div>
</footer><!-- end #colophon -->
</div><!-- end .wrap-all -->

<?php wp_footer(); ?>

</body>
</html>
