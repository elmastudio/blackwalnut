<?php
/**
 * Template Name: Front Page - Big Image
 *
 * Description: A page template for a Custom Front Page with one Big Image
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">

		<div class="front-one-wrap">

		<?php if ( get_theme_mod( 'fpone_img_url' ) && get_theme_mod( 'fpone_link_url' ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'fpone_link_url') ); ?>" class="fp-img-link">
				<img src="<?php echo esc_url( get_theme_mod( 'fpone_img_url') ); ?>" alt="">
			</a>

		<?php elseif ( get_theme_mod( 'fpone_img_url' ) ) : ?>
			<img src="<?php echo esc_url( get_theme_mod( 'fpone_img_url') ); ?>" alt="">
		<?php endif; ?>

		<?php if ( get_theme_mod( 'fpone_text' ) && get_theme_mod( 'fpone_img_url' ) ) : ?>
			<div class="front-one-slogan">
				<?php echo wp_kses_post( wpautop( get_theme_mod( 'fpone_text' ) ) ); ?>
			</div><!-- end .front-one-slogan -->
			<?php endif; ?>

		</div><!-- end .front-one-wrap -->
	</div><!-- end #primary -->

<?php get_footer(); ?>