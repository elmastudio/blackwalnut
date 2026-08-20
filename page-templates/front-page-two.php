<?php
/**
 * Template Name: Front Page - Four Images
 *
 * Description: A page template for a Custom Front Page with four images
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

get_header(); ?>

<div id="primary" class="site-content cf" role="main">

	<div class="front-two-wrap cf">

		<div id="img-container-one" class="img-container">
		<?php if ( get_theme_mod( 'fptwo_img_url_one' ) && get_theme_mod( 'fptwo_link_url_one' ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'fptwo_link_url_one') ); ?>" class="fp-img-link"><img src="<?php echo esc_url( get_theme_mod( 'fptwo_img_url_one') ); ?>" alt=""></a>
		<?php elseif ( get_theme_mod( 'fptwo_img_url_one' ) ) : ?>
			<img src="<?php echo esc_url( get_theme_mod( 'fptwo_img_url_one') ); ?>" alt="">
		<?php endif; ?>
		<?php if ( get_theme_mod( 'fptwo_text_one' ) && get_theme_mod( 'fptwo_img_url_one' ) ) : ?>
			<div id="front-two-slogan-one" class="front-two-slogan">
				<?php echo wp_kses_post( wpautop( get_theme_mod( 'fptwo_text_one' ) ) ); ?>
			</div><!-- end #front-two-slogan-one -->
		<?php endif; ?>
		</div><!-- end #img-container-one -->

		<div id="img-container-two" class="img-container">
		<?php if ( get_theme_mod( 'fptwo_img_url_two' ) && get_theme_mod( 'fptwo_link_url_two' ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'fptwo_link_url_two') ); ?>" class="fp-img-link"><img src="<?php echo esc_url( get_theme_mod( 'fptwo_img_url_two') ); ?>" alt=""></a>
		<?php elseif ( get_theme_mod( 'fptwo_img_url_two' ) ) : ?>
			<img src="<?php echo esc_url( get_theme_mod( 'fptwo_img_url_two') ); ?>" alt="">
		<?php endif; ?>
		<?php if ( get_theme_mod( 'fptwo_text_two' ) && get_theme_mod( 'fptwo_img_url_two' ) ) : ?>
			<div id="front-two-slogan-two" class="front-two-slogan">
				<?php echo wp_kses_post( wpautop( get_theme_mod( 'fptwo_text_two' ) ) ); ?>
			</div><!-- end #front-two-slogan-two -->
		<?php endif; ?>
		</div><!-- end #img-container-two -->

		<div id="img-container-three" class="img-container">
		<?php if ( get_theme_mod( 'fptwo_img_url_three' ) && get_theme_mod( 'fptwo_link_url_three' ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'fptwo_link_url_three') ); ?>" class="fp-img-link"><img src="<?php echo esc_url( get_theme_mod( 'fptwo_img_url_three') ); ?>" alt=""></a>
		<?php elseif ( get_theme_mod( 'fptwo_img_url_three' ) ) : ?>
			<img src="<?php echo esc_url( get_theme_mod( 'fptwo_img_url_three') ); ?>" alt="">
		<?php endif; ?>
		<?php if ( get_theme_mod( 'fptwo_text_three' ) && get_theme_mod( 'fptwo_img_url_three' ) ) : ?>
			<div id="front-two-slogan-three" class="front-two-slogan">
				<?php echo wp_kses_post( wpautop( get_theme_mod( 'fptwo_text_three' ) ) ); ?>
			</div><!-- end #front-two-slogan-three -->
		<?php endif; ?>
		</div><!-- end #img-container-three -->

		<div id="img-container-four" class="img-container">
		<?php if ( get_theme_mod( 'fptwo_img_url_four' ) && get_theme_mod( 'fptwo_link_url_four' ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'fptwo_link_url_four') ); ?>" class="fp-img-link"><img src="<?php echo esc_url( get_theme_mod( 'fptwo_img_url_four') ); ?>" alt=""></a>
		<?php elseif ( get_theme_mod( 'fptwo_img_url_four' ) ) : ?>
			<img src="<?php echo esc_url( get_theme_mod( 'fptwo_img_url_four') ); ?>" alt="">
		<?php endif; ?>
		<?php if ( get_theme_mod( 'fptwo_text_four' ) && get_theme_mod( 'fptwo_img_url_four' ) ) : ?>
			<div id="front-two-slogan-four" class="front-two-slogan">
				<?php echo wp_kses_post( wpautop( get_theme_mod( 'fptwo_text_four' ) ) ); ?>
			</div><!-- end #front-two-slogan-four -->
		<?php endif; ?>
		</div><!-- end #img-container-four -->

	</div><!-- end .front-two-wrap -->
</div><!-- end #primary -->

<?php get_footer(); ?>