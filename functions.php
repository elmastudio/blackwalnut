<?php
/**
 * Black Walnut functions and definitions
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

 /*-----------------------------------------------------------------------------------*/
/* Sets up the content width value based on the theme's design.
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
		$content_width = 975;

function blackwalnut_adjust_content_width() {
		global $content_width;

		if ( is_page_template( 'full-width.php' ) )
				$content_width = 1530;
}
add_action( 'template_redirect', 'blackwalnut_adjust_content_width' );

/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/

function blackwalnut_setup() {

	// Make Black Walnut available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'blackwalnut', get_template_directory() . '/languages' );

	// Remove support form block widget screens.
	remove_theme_support( 'widgets-block-editor' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for default editor Styles in new editor.
	add_theme_support('editor-styles');

	// Add support for wider content.
	add_theme_support( 'align-wide' );

	// Add support responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for editor font sizes.


	// Disable custom editor font sizes.
	add_theme_support('disable-custom-font-sizes');

	// Add editor color palette.


	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'editor-style.css' ) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu().


	// Switch default core markup for search form, comment form, and comment to output valid HTML5.
	add_theme_support( 'html5', array (
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array (
		'image', 'quote'
	) );

	// Implement the Custom Header feature
	require get_template_directory() . '/inc/custom-header.php';

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'blackwalnut_custom_background_args', array(
		'default-color'	=> 'f8f8f8',
		'default-image'	=> '',
	) ) );

	// This theme uses post thumbnails.
	add_theme_support( 'post-thumbnails' );

}
add_action( 'after_setup_theme', 'blackwalnut_setup' );


/*-----------------------------------------------------------------------------------*/
/*  Returns the Google font stylesheet URL if available.
/*-----------------------------------------------------------------------------------*/

function blackwalnut_font_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by the used fonts translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_code_pro = _x( 'on', 'Source Code Pro: on or off', 'blackwalnut' );

	$playfair_display = _x( 'on', 'PT Serif: on or off', 'blackwalnut' );

	if ( 'off' !== $source_code_pro || 'off' !== $montserrat || 'off' !== $playfair_display ) {
		$font_families = array();

		if ( 'off' !== $source_code_pro )
			$font_families[] = 'Source Code Pro:300,400,600';

		if ( 'off' !== $playfair_display )
			$font_families[] = 'Playfair Display:400italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}


/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/

function blackwalnut_scripts() {
	global $wp_styles;

	// Loads JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

	// Add Google fonts, used in the main stylesheet.
	wp_enqueue_style( 'blackwalnut-fonts', blackwalnut_font_url(), array(), null );

	// Loads main stylesheet.
	wp_enqueue_style( 'blackwalnut-style', get_stylesheet_uri(), array(), '20150206' );

	wp_enqueue_script( 'blackwalnut-transform', get_template_directory_uri() . '/js/transform.js', array(), '20150420', true );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	// FitVids for responsive videos
	wp_enqueue_script( 'blackwalnut-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1' );

	// Loads Custom Black Walnut JavaScript functionality
	wp_enqueue_script( 'blackwalnut-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150206',true );

	// Loads Custom Black Walnut Masonry JavaScript functionality
	wp_enqueue_script( 'blackwalnut-masonry', get_template_directory_uri() . '/js/masonry.js', array( 'jquery', 'jquery-masonry' ), '20150206', true );

}
add_action( 'wp_enqueue_scripts', 'blackwalnut_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Load block editor styles.
/*-----------------------------------------------------------------------------------*/
function blackwalnut_block_editor_styles() {
 wp_enqueue_style( 'blackwalnut-block-editor-styles', get_template_directory_uri() . '/block-editor.css');
 wp_enqueue_style( 'blackwalnut-fonts', blackwalnut_font_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'blackwalnut_block_editor_styles' );

/*-----------------------------------------------------------------------------------*/
/* Sets the authordata global when viewing an author archive.
/*-----------------------------------------------------------------------------------*/

function blackwalnut_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'blackwalnut_setup_author' );


/*-----------------------------------------------------------------------------------*/
/* Add custom max excerpt lengths.
/*-----------------------------------------------------------------------------------*/

function blackwalnut_excerpt_length( $length ) {
	return 65;
}
add_filter( 'excerpt_length', 'blackwalnut_excerpt_length', 999 );


/*-----------------------------------------------------------------------------------*/
/* Replace "[...]" with an ellipsis in excerpts.
/*-----------------------------------------------------------------------------------*/

function blackwalnut_auto_excerpt_more( $more ) {
	return ' &hellip;';
}
add_filter( 'excerpt_more', 'blackwalnut_auto_excerpt_more' );


/*-----------------------------------------------------------------------------------*/
/* Add Theme Customizer CSS
/*-----------------------------------------------------------------------------------*/

function blackwalnut_customize_css() {
		?>
	<style type="text/css" id="blackwalnut-themeoptions-css">

		/* --- Custom Site Title Font Style --- */
		<?php if ('serif-uppercase' == get_theme_mod( 'title_font_style' ) ) { ?>
		.site-branding p.site-title, .site-branding h1.site-title {font-family: 'Playfair Display', serif; font-weight: normal; letter-spacing: 2px; font-style: italic; text-transform: uppercase;}
		<?php } ?>
		<?php if ('nonserif-uppercase' == get_theme_mod( 'title_font_style' ) ) { ?>
		.site-branding p.site-title, .site-branding h1.site-title {letter-spacing: 2px; text-transform: uppercase;}
		<?php } ?>
		<?php if ('serif' == get_theme_mod( 'title_font_style' ) ) { ?>
		.site-branding p.site-title, .site-branding h1.site-title {font-family: 'Playfair Display', serif; font-weight: normal; letter-spacing: 2px;}
		<?php } ?>

		/* --- Custom Site Title Font Size --- */
		<?php if ('54' != get_theme_mod( 'title_font_size' ) ) { ?>
		@media screen and (min-width: 1023px) {
		.site-branding p.site-title { font-size:<?php echo get_theme_mod('title_font_size'); ?>px; }
		}
		<?php } ?>

		<?php if ('54' != get_theme_mod( 'fp_title_font_size' ) ) { ?>
		@media screen and (min-width: 1023px) {
		.site-branding h1.site-title { font-size:<?php echo get_theme_mod('fp_title_font_size'); ?>px; }
		.home .site-branding {max-width: 630px;}
		}
		<?php } ?>

		/* --- Custom Colors --- */
		<?php if ('#f8f8f8' != get_theme_mod( 'background_color' ) ) { ?>
		body {background:<?php echo get_theme_mod('background_color', '#f8f8f8'); ?>;}
		@media screen and (min-width: 1240px) {
			#site-nav {background: #<?php echo get_theme_mod('background_color', '#f8f8f8'); ?>;}
		}
		<?php } ?>

		<?php if ('#222222' != get_theme_mod( 'link_color' ) ) { ?>
		a { color: <?php echo get_theme_mod('link_color', '#222222'); ?>;}
		.entry-content a,
		.comment-details .comment-author a,
		#colophon a:hover,
		#colophon .textwidget a,
		.intro-wrap a,
		.more-info-btn span,
		a.comment-reply-link {
			border-bottom: 1px solid  <?php echo get_theme_mod('link_color', '#222222'); ?>;
		}
		.entry-content a:hover,
		.comment-details .comment-author a:hover,
		#colophon .textwidget a:hover,
		.intro-wrap a:hover,
		.entry-content .blue a:hover {
			border-bottom: 1px solid #ccc;
		}
		<?php } ?>

		<?php if ('#222222' != get_theme_mod( 'header_textcolor' ) ) { ?>
			.site-branding p.site-title a, .site-branding h1.site-title a {color: #<?php echo get_theme_mod('header_textcolor', '#222222'); ?>;}
		<?php } ?>

		/* --- Main Nav fixed-positionend --- */
		<?php if ( '' != get_theme_mod( 'fixed_nav' ) ) { ?>
		@media screen and (min-width: 1130px) {
		.sticky-content {margin-top: 0;}
		.sticky-element .sticky-anchor {display: block !important;}
		.sticky-content.fixed {position: fixed !important; top: 0 !important; left:0; right: 0; z-index: 10000;}
		}
		<?php } ?>

		/* --- Front Page - Big Image --- */
		<?php if ('bottomright' == get_theme_mod( 'fpone_text_position' ) ) { ?>
		@media screen and (min-width: 767px) {
		.front-one-slogan {right: 60px; left: auto; text-align: right;}
		}
		<?php } ?>
		<?php if ('topleft' == get_theme_mod( 'fpone_text_position' ) ) { ?>
		@media screen and (min-width: 767px) {
		.front-one-slogan {bottom: auto; top: 60px;}
		}
		<?php } ?>
		<?php if ('topright' == get_theme_mod( 'fpone_text_position' ) ) { ?>
		@media screen and (min-width: 767px) {
		.front-one-slogan {bottom: auto; top: 60px; right: 60px; left: auto; text-align: right;}
		}
		<?php } ?>
		<?php if ('light' == get_theme_mod( 'fpone_text_color' ) ) { ?>
		@media screen and (min-width: 767px) {
		.front-one-slogan p, .front-one-slogan p a {color: #f8f8f8;}
		.front-one-slogan p a {border-bottom: 3px solid #f8f8f8;}
		}
		<?php } ?>

		/* --- Front Page - Four Images --- */
		<?php if ('bottomright' == get_theme_mod( 'fptwo_text_position_one' ) ) { ?>
		#front-two-slogan-one {right: 20px; left: auto;}
		<?php } ?>
		<?php if ('topleft' == get_theme_mod( 'fptwo_text_position_one' ) ) { ?>
		#front-two-slogan-one {bottom: auto; top: 30px;}
		<?php } ?>
		<?php if ('topright' == get_theme_mod( 'fptwo_text_position_one' ) ) { ?>
		#front-two-slogan-one {bottom: auto; top: 30px; right: 20px; left: auto;}
		<?php } ?>
		<?php if ('light' == get_theme_mod( 'fptwo_text_color_one' ) ) { ?>
		#img-container-one {background: #222;}
		#front-two-slogan-one p, #front-two-slogan-one p a {color: #f8f8f8;}
		#front-two-slogan-one p a {border-bottom: 3px solid #f8f8f8;}
		.front-two-wrap #front-two-slogan-one p a {border-bottom: 2px solid #f8f8f8;}
		<?php } ?>

		<?php if ('bottomright' == get_theme_mod( 'fptwo_text_position_two' ) ) { ?>
		#front-two-slogan-two {right: 20px; left: auto;}
		<?php } ?>
		<?php if ('topleft' == get_theme_mod( 'fptwo_text_position_two' ) ) { ?>
		#front-two-slogan-two {bottom: auto; top: 30px;}
		<?php } ?>
		<?php if ('topright' == get_theme_mod( 'fptwo_text_position_two' ) ) { ?>
		#front-two-slogan-two {bottom: auto; top: 30px; right: 20px; left: auto;}
		<?php } ?>
		<?php if ('light' == get_theme_mod( 'fptwo_text_color_two' ) ) { ?>
		#front-two-slogan-two p, #front-two-slogan-two p a {color: #f8f8f8;}
		#front-two-slogan-two p a {border-bottom: 3px solid #f8f8f8;}
		<?php } ?>

		<?php if ('bottomright' == get_theme_mod( 'fptwo_text_position_three' ) ) { ?>
		#front-two-slogan-three {right: 20px; left: auto;}
		<?php } ?>
		<?php if ('topleft' == get_theme_mod( 'fptwo_text_position_three' ) ) { ?>
		#front-two-slogan-three {bottom: auto; top: 30px;}
		<?php } ?>
		<?php if ('topright' == get_theme_mod( 'fptwo_text_position_three' ) ) { ?>
		#front-two-slogan-three {bottom: auto; top: 30px; right: 20px; left: auto;}
		<?php } ?>
		<?php if ('light' == get_theme_mod( 'fptwo_text_color_three' ) ) { ?>
		#front-two-slogan-three p, #front-two-slogan-three p a {color: #f8f8f8;}
		#front-two-slogan-three p a {border-bottom: 3px solid #f8f8f8;}
		<?php } ?>

		<?php if ('bottomright' == get_theme_mod( 'fptwo_text_position_four' ) ) { ?>
		#front-two-slogan-four {right: 20px; left: auto;}
		<?php } ?>
		<?php if ('topleft' == get_theme_mod( 'fptwo_text_position_four' ) ) { ?>
		#front-two-slogan-four {bottom: auto; top: 30px;}
		<?php } ?>
		<?php if ('topright' == get_theme_mod( 'fptwo_text_position_four' ) ) { ?>
		#front-two-slogan-four {bottom: auto; top: 30px; right: 20px; left: auto;}
		<?php } ?>
		<?php if ('light' == get_theme_mod( 'fptwo_text_color_four' ) ) { ?>
		#front-two-slogan-four p, #front-two-slogan-four p a {color: #f8f8f8;}
		#front-two-slogan-four p a {border-bottom: 3px solid #f8f8f8;}
		<?php } ?>
	</style>
		<?php
}
add_action( 'wp_head', 'blackwalnut_customize_css');


/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/

add_filter('use_default_gallery_style', '__return_false');


/**
 * Callback to change just html output on a comment.
 */
function blackwalnut_comments_callback($comment, $args, $depth){
	//checks if were using a div or ol|ul for our output
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment">

			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 80 ); ?>
			</div>

				<div class="comment-details cf">
					<span class="comment-author">
						<?php printf( wp_kses_post( sprintf( '%s', get_comment_author_link() ) ) ); ?>
					</span><!-- end .comment-author -->
					<span class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
						/* translators: 1: date */
							printf( __( '%1$s', 'blackwalnut' ),
							get_comment_date());
						?></a>
					</span><!-- end .comment-time -->
					<span class="comment-edit">
						<?php edit_comment_link( __( 'Edit', 'blackwalnut' ));?>
					</span><!-- end .comment-edit -->
				</div><!-- end .comment-details -->

				<div class="comment-text">
				<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'blackwalnut' ); ?></p>
					<?php endif; ?>
				</div><!-- end .comment-text -->
			<?php if ( comments_open () ) : ?>
				<div class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'blackwalnut' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
			<?php endif; ?>

		</article><!-- end .comment -->
	<?php
}

/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/

function blackwalnut_widgets_init() {

	register_sidebar( array (
		'name' => __( 'Blog Sidebar', 'blackwalnut' ),
		'id' => 'blog-sidebar',
		'description' => __( 'Widgets appear in a right-aligned sidebar on single posts.', 'blackwalnut' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Page Sidebar', 'blackwalnut' ),
		'id' => 'page-sidebar',
		'description' => __( 'Widgets appear on pages using the Default Page template.', 'blackwalnut' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Contact Sidebar', 'blackwalnut' ),
		'id' => 'contact-sidebar',
		'description' => __( 'Widgets appear on pages using the Contact Page template.', 'blackwalnut' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer: 3-columns (left)', 'blackwalnut' ),
		'id' => 'footer-1',
		'description' => __( 'First widget area of the three-column Footer widget area.', 'blackwalnut' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer: 3-columns (center)', 'blackwalnut' ),
		'id' => 'footer-2',
		'description' => __( 'Second widget area of the three-column Footer widget area.', 'blackwalnut' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer: 3-columns (right)', 'blackwalnut' ),
		'id' => 'footer-3',
		'description' => __( 'Third widget area of the three-column Footer widget area.', 'blackwalnut' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


}
add_action( 'widgets_init', 'blackwalnut_widgets_init' );


if ( ! function_exists( 'blackwalnut_content_nav' ) ) :


/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous pages when applicable.
/*-----------------------------------------------------------------------------------*/

function blackwalnut_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="nav-wrap cf">
			<nav id="<?php echo $nav_id; ?>">
				<div class="nav-previous"><?php next_posts_link( __( '<span>Previous</span>', 'blackwalnut'  ) ); ?></div><span class="separator"><?php _e('|', 'blackwalnut') ?></span></span><div class="nav-next"><?php previous_posts_link( __( '<span>Next</span>', 'blackwalnut' ) ); ?></div>
			</nav>
		</div><!-- end .nav-wrap -->
	<?php endif;
}

endif; // blackwalnut_content_nav


/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous post when applicable.
/*-----------------------------------------------------------------------------------*/

function blackwalnut_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<div class="nav-wrap cf">
		<nav id="nav-single">
			<div class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">Previous</span>', 'blackwalnut' ) ); ?></div><span class="separator"><?php _e('|', 'blackwalnut') ?></span><div class="nav-next"><?php next_post_link('%link', __( '<span class="meta-nav">Next</span>', 'blackwalnut' ) ); ?></div>
		</nav><!-- #nav-single -->
	</div><!-- end .nav-wrap -->
	<?php
}


/*-----------------------------------------------------------------------------------*/
/* Extends the default WordPress body classes
/*-----------------------------------------------------------------------------------*/
function blackwalnut_body_class( $classes ) {

	if ( is_page_template( 'page-templates/front-page-one.php' ) )
		$classes[] = 'bw-front';

	if ( is_page_template( 'page-templates/front-page-two.php' ) )
		$classes[] = 'bw-front';

	if ( get_theme_mod( 'header_intro')  !== ''  )
		$classes[] = 'header-big';

	if ( is_page_template( 'page-templates/front-page-two.php' ) )
		$classes[] = 'bw-front-two';

	if ( is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'bw-fullwidth';

	if ( is_page_template( 'page-templates/menu-page.php' ) )
		$classes[] = 'bw-menu';

	if ( is_page_template( 'page-templates/testimonials-page.php' ) )
		$classes[] = 'bw-testimonials';

	if ( is_page_template( 'page-templates/menu-page.php' ) )
		$classes[] = 'bw-custom-page';

	if ( is_page_template( 'page-templates/testimonials-page.php' ) )
		$classes[] = 'bw-custom-page';

	if ( is_page_template( 'page-templates/contact-page.php' ) )
		$classes[] = 'bw-contact';

	if ( is_page_template( 'page-templates/centered-page.php' ) )
		$classes[] = 'bw-centered';

	return $classes;
}
add_filter( 'body_class', 'blackwalnut_body_class' );


/*-----------------------------------------------------------------------------------*/
/* Customizer additions
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer.php';

/*-----------------------------------------------------------------------------------*/
/* Load Jetpack compatibility file.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/jetpack.php';

/*-----------------------------------------------------------------------------------*/
/* Grab the Black Walnut Custom widgets.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/widgets.php' );

/*-----------------------------------------------------------------------------------*/
/* Grab the Black Walnut Custom shortcodes.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/shortcodes.php' );

/*-----------------------------------------------------------------------------------*/
/* Add One Click Demo Import code.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/demo-installer.php';

/**
 * Registrations that carry translated labels.
 *
 * WordPress 6.7 loads translations at init, so a __() call during
 * after_setup_theme is too early and logs a notice on every request.
 * These moved out of the setup function unchanged; only the hook differs.
 */
function blackwalnut_i18n_setup() {
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'small', 'blackwalnut' ),
			'shortName' => __( 'S', 'blackwalnut' ),
			'size' => 13,
			'slug' => 'small'
		),
		array(
			'name' => __( 'regular', 'blackwalnut' ),
			'shortName' => __( 'M', 'blackwalnut' ),
			'size' => 16,
			'slug' => 'regular'
		),
		array(
			'name' => __( 'large', 'blackwalnut' ),
			'shortName' => __( 'L', 'blackwalnut' ),
			'size' => 18,
			'slug' => 'large'
		),
		array(
			'name' => __( 'larger', 'blackwalnut' ),
			'shortName' => __( 'XL', 'blackwalnut' ),
			'size' => 22,
			'slug' => 'larger'
		)
	) );

	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'dark grey', 'blackwalnut' ),
			'slug' => 'dark-grey',
			'color' => '#444444',
		),
		array(
			'name' => __( 'light grey', 'blackwalnut' ),
			'slug' => 'light-grey',
			'color' => '#f4f4f4',
		),
		array(
			'name' => __( 'white', 'blackwalnut' ),
			'slug' => 'white',
			'color' => '#ffffff',
		),
		array(
			'name' => __( 'light yellow', 'blackwalnut' ),
			'slug' => 'light-yellow',
			'color' => '#ffffcc',
		),
		array(
			'name' => __( 'light red', 'blackwalnut' ),
			'slug' => 'light-red',
			'color' => '#fff0f1',
		),
		array(
			'name' => __( 'light green', 'blackwalnut' ),
			'slug' => 'light-green',
			'color' => '#e7f3e0',
		),
		array(
			'name' => __( 'light blue', 'blackwalnut' ),
			'slug' => 'light-blue',
			'color' => '#eef6fe',
		),
	) );

	register_nav_menus( array (
		'primary' => __( 'Primary menu', 'blackwalnut' ),
	) );
}
add_action( 'init', 'blackwalnut_i18n_setup' );
