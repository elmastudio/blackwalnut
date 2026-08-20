<?php
/**
 * Black Walnut Theme Customizer
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since Black Walnut 1.0
 */
function blackwalnut_customize_register( $wp_customize ) {

	// Add custom sections.
	$wp_customize->add_section( 'blackwalnut_themeoptions', array(
		'title'         			=> __( 'Theme', 'blackwalnut' ),
		'priority'      			=> 135,
	) );

	$wp_customize->add_section( 'blackwalnut_fpone', array(
		'title'        			 => __( 'Front Page - Big Image', 'blackwalnut' ),
		'priority'     			 => 136,
	) );

	$wp_customize->add_section( 'blackwalnut_fptwo', array(
		'title'         			=> __( 'Front Page - Four Images', 'blackwalnut' ),
		'priority'      			=> 137,
	) );

	$wp_customize->add_section( 'blackwalnut_fpvideo', array(
		'title'         			=> __( 'Front Page - Video', 'blackwalnut' ),
		'priority'      			=> 138,
	) );

	// Add the custom settings and controls.
	$wp_customize->add_setting( 'header_textcolor' , array(
			'default'     			=> '#222222',
	) );

	$wp_customize->add_setting( 'background_color' , array(
			'default'    				=> '#f8f8f8',
	) );

	// Custom Colors.
	$wp_customize->add_setting( 'link_color' , array(
			'default'     			=> '#222222',
		'transport'   				=> 'refresh',
		'sanitize_callback'		=> 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'        				=> __( 'Link Color', 'blackwalnut' ),
		'section'    					=> 'colors',
		'settings'   					=> 'link_color',
	) ) );

	// Custom Theme Options.
	$wp_customize->add_setting( 'fixed_nav', array(
		'default'							=> '',
		'sanitize_callback' 	=> 'blackwalnut_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'fixed_nav', array(
		'label'								=> __( 'Fixed-position main menu', 'blackwalnut' ),
		'description'					=> __( '(visible on wider screens only)', 'blackwalnut' ),
		'section'							=> 'blackwalnut_themeoptions',
		'type'								=> 'checkbox',
		'priority'						=> 1,
	) );

	$wp_customize->add_setting( 'hide_singlethumb', array(
		'default'							=> '',
		'sanitize_callback' 	=> 'blackwalnut_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'hide_singlethumb', array(
		'label'								=> __( 'Hide Featured Image on single posts', 'blackwalnut' ),
		'section'							=> 'blackwalnut_themeoptions',
		'type'								=> 'checkbox',
		'priority'						=> 2,
	) );

	$wp_customize->add_setting( 'archive_excerpts', array(
		'default'							=> '',
		'sanitize_callback' 	=> 'blackwalnut_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'archive_excerpts', array(
		'label'								=> __( 'Automatic archive excerpts', 'blackwalnut' ),
		'description'					=> __( '(Show automatic excerpts on archives and search results.)', 'blackwalnut' ),
		'section'							=> 'blackwalnut_themeoptions',
		'type'								=> 'checkbox',
		'priority'						=> 3,
	) );

	$wp_customize->add_setting( 'blog_excerpts', array(
		'default'	                   => '',
		'sanitize_callback'          => 'blackwalnut_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'blog_excerpts', array(
		'label'		                   => __( 'Automatic blog excerpts', 'blackwalnut' ),
		'description'	               => __( '(Show automatic excerpts on blog.)', 'blackwalnut' ),
		'section'	                   => 'blackwalnut_themeoptions',
		'type'		                   => 'checkbox',
		'priority'	                 => 4,
	) );

	$wp_customize->add_setting( 'header_intro', array(
		'default'	                   => '',
		'type'		                   => 'theme_mod',
		'capability'                 => 'edit_theme_options',
		'transport'	                 => '',
		'sanitize_callback'	         => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'header_intro', array(
		'type' 		                   => 'textarea',
		'section'	                   => 'blackwalnut_themeoptions',
		'label'		                   => __( 'Front Page Header Intro Text', 'blackwalnut' ),
	) );

	$wp_customize->add_setting( 'credit_text', array(
		'default'                    => '',
		'sanitize_callback'          => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'credit_text', array(
		'label'                      => __( 'Custom Footer Credit Text', 'blackwalnut' ),
		'section'                    => 'blackwalnut_themeoptions',
		'type'                       => 'text',
	) );

	// Site Title Font Style
	$wp_customize->add_setting( 'title_font_style', array(
		'default' 		               => 'default',
		'sanitize_callback'          => 'blackwalnut_sanitize_title_style',
	) );

	$wp_customize->add_control( 'title_font_style', array(
		'label' 	                   => __( 'Site Title Font Style', 'blackwalnut' ),
		'section' 	                 => 'title_tagline',
		'priority' 	                 => 110,
		'type' 	                     => 'select',
		'choices' 			             => array(
					'default' 				     => __( 'non-serif (default)', 'blackwalnut' ),
					'nonserif-uppercase' 	 => __( 'non-serif uppercase', 'blackwalnut' ),
					'serif' 		           => __( 'serif', 'blackwalnut' ),
			'serif-uppercase' 		     => __( 'serif italic uppercase', 'blackwalnut' ),
		),
	) );

	// General Site Title Font Size
	$wp_customize->add_setting( 'title_font_size', array(
		'default'                    => '54',
		'type'                       => 'theme_mod',
		'capability'                 => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'title_font_size', array(
			'type' 			       => 'range',
			'priority' 		     => 120,
			'section' 		     => 'title_tagline',
			'label' 		       => __( 'Site Title Font Size', 'blackwalnut' ),
			'description'	     => __( 'Change the font size of your site title.', 'blackwalnut' ),
			'input_attrs' 	   => array(
					'min' 		     => 34,
					'max' 		     => 74,
			),
	) );

	// Front Page Site Title Font Size
	$wp_customize->add_setting( 'fp_title_font_size', array(
		'default'            => '54',
		'type'               => 'theme_mod',
		'capability'         => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'fp_title_font_size', array(
			'type' 			       => 'range',
			'priority' 		     => 130,
			'section' 		     => 'title_tagline',
			'label' 		       => __( 'Site Title Font Size on Front Page', 'blackwalnut' ),
			'description'	     => __( 'Change the font size of your site title only on the Front page.', 'blackwalnut' ),
			'input_attrs' 	   => array(
					'min' 		     => 54,
					'max' 		     => 108,
			),
	) );

	// Custom Front Page One Options.
	$wp_customize->add_setting( 'fpone_img_url', array(
		'default' 	         => '',
		'sanitize_callback'  => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'fpone_img_url', array(
		'label' 		         => __( 'Image URL', 'blackwalnut' ),
		'description'	       => __( 'Upload image under Media / Add New and paste the URL here (image width: 1200px).', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fpone',
		'type' 	             => 'text',
		'priority'			     => 1,
	) );

	$wp_customize->add_setting( 'fpone_link_url', array(
		'default' 	         => '',
		'sanitize_callback'  => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'fpone_link_url', array(
		'label' 		         => __( 'Link URL', 'blackwalnut' ),
		'description'	       => __( '(when the image is clicked)', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fpone',
		'type' 	             => 'text',
		'priority'			     => 2,
	) );

	$wp_customize->add_setting( 'fpone_text', array(
		'default'			       => '',
		'type'				       => 'theme_mod',
		'capability'		     => 'edit_theme_options',
		'transport'			     => '',
		'sanitize_callback'	 => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'fpone_text', array(
			'type' 				     => 'textarea',
		'section'			       => 'blackwalnut_fpone',
		'description'	       => __( 'Small slogan or intro text on image (HTML is allowed).', 'blackwalnut' ),
		'label'				       => __( 'Slogan Text', 'blackwalnut' ),
		'priority' 	         => 3,
	) );

	$wp_customize->add_setting( 'fpone_text_position', array(
		'default' 		       => 'bottomleft',
		'sanitize_callback'  => 'blackwalnut_sanitize_text_position',
	) );

	$wp_customize->add_control( 'fpone_text_position', array(
		'label' 	           => __( 'Slogan Text Position', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fpone',
		'priority' 	         => 4,
		'type' 	             => 'select',
		'choices' 			     => array(
					'topleft' 		 => __( 'Top Left', 'blackwalnut' ),
			'topright' 		     => __( 'Top Right', 'blackwalnut' ),
			'bottomright'	     => __( 'Bottom Right', 'blackwalnut' ),
			'bottomleft'	     => __( 'Bottom Left', 'blackwalnut' ),
		),
	) );

	$wp_customize->add_setting( 'fpone_text_color', array(
		'default' 		       => 'dark',
		'sanitize_callback'  => 'blackwalnut_sanitize_text_color',
	) );

	$wp_customize->add_control( 'fpone_text_color', array(
		'label' 	           => __( 'Slogan Text Color', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fpone',
		'priority' 	         => 4,
		'type' 	             => 'select',
		'choices' 			     => array(
					'dark' 		     => __( 'Dark', 'blackwalnut' ),
			'light' 		       => __( 'Light', 'blackwalnut' ),
		),
	) );


	// Custom Front Page Two Options.

	// First Image Settings
	$wp_customize->add_setting( 'fptwo_img_url_one', array(
		'default' 	         => '',
		'sanitize_callback'  => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'fptwo_img_url_one', array(
		'label' 		         => __( 'Image One - URL', 'blackwalnut' ),
		'description'	       => __( 'Upload image under Media / Add New and paste the URL here (image size: 595x595px).', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'type' 	             => 'text',
		'priority'			     => 1,
	) );

	$wp_customize->add_setting( 'fptwo_link_url_one', array(
		'default' 	         => '',
		'sanitize_callback'  => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'fptwo_link_url_one', array(
		'label' 		         => __( 'Image One - Link URL', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'type' 	             => 'text',
		'priority'			     => 2,
	) );

	$wp_customize->add_setting( 'fptwo_text_one', array(
		'default'			       => '',
		'type'				       => 'theme_mod',
		'capability'		     => 'edit_theme_options',
		'transport'			     => '',
		'sanitize_callback'	 => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'fptwo_text_one', array(
			'type' 				     => 'textarea',
		'section'			       => 'blackwalnut_fptwo',
		'description'	       => __( 'Small slogan or intro text on image (HTML is allowed).', 'blackwalnut' ),
		'label'				       => __( 'Image One - Slogan Text', 'blackwalnut' ),
		'priority' 	         => 3,
	) );

	$wp_customize->add_setting( 'fptwo_text_position_one', array(
		'default' 		       => 'bottomleft',
		'sanitize_callback'  => 'blackwalnut_sanitize_text_position',
	) );

	$wp_customize->add_control( 'fptwo_text_position_one', array(
		'label' 	           => __( 'Image One - Text Position', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'priority' 	         => 4,
		'type' 	             => 'select',
		'choices' 			     => array(
			'topleft' 		     => __( 'Top Left', 'blackwalnut' ),
			'topright' 		     => __( 'Top Right', 'blackwalnut' ),
			'bottomright'	     => __( 'Bottom Right', 'blackwalnut' ),
			'bottomleft'	     => __( 'Bottom Left', 'blackwalnut' ),
		),
	) );

	$wp_customize->add_setting( 'fptwo_text_color_one', array(
		'default' 		       => 'dark',
		'sanitize_callback'  => 'blackwalnut_sanitize_text_color',
	) );

	$wp_customize->add_control( 'fptwo_text_color_one', array(
		'label' 	           => __( 'Image One - Text Color', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'priority' 	         => 5,
		'type' 	             => 'select',
		'choices' 			     => array(
					'dark' 		     => __( 'Dark', 'blackwalnut' ),
			'light' 		       => __( 'Light', 'blackwalnut' ),
		),
	) );

	// Second Image Settings
	$wp_customize->add_setting( 'fptwo_img_url_two', array(
		'default' 	         => '',
		'sanitize_callback'  => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'fptwo_img_url_two', array(
		'label' 		         => __( 'Image Two - URL', 'blackwalnut' ),
		'description'	       => __( '(image size: 595x595px).', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'type' 	             => 'text',
		'priority'			     => 6,
	) );

	$wp_customize->add_setting( 'fptwo_link_url_two', array(
		'default' 	         => '',
		'sanitize_callback'  => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'fptwo_link_url_two', array(
		'label' 		         => __( 'Image Two - Link URL', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'type' 	             => 'text',
		'priority'			     => 7,
	) );

	$wp_customize->add_setting( 'fptwo_text_two', array(
		'default'			       => '',
		'type'				       => 'theme_mod',
		'capability'		     => 'edit_theme_options',
		'transport'			     => '',
		'sanitize_callback'	 => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'fptwo_text_two', array(
			'type' 				     => 'textarea',
		'section'			       => 'blackwalnut_fptwo',
		'label'				       => __( 'Image Two - Slogan Text', 'blackwalnut' ),
		'priority' 	         => 8,
	) );

	$wp_customize->add_setting( 'fptwo_text_position_two', array(
		'default' 		       => 'bottomleft',
		'sanitize_callback'  => 'blackwalnut_sanitize_text_position',
	) );

	$wp_customize->add_control( 'fptwo_text_position_two', array(
		'label' 	           => __( 'Image Two - Text Position', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'priority' 	         => 9,
		'type' 	             => 'select',
		'choices' 			     => array(
					'topleft' 		 => __( 'Top Left', 'blackwalnut' ),
			'topright' 		     => __( 'Top Right', 'blackwalnut' ),
			'bottomright'	     => __( 'Bottom Right', 'blackwalnut' ),
			'bottomleft'	     => __( 'Bottom Left', 'blackwalnut' ),
		),
	) );

	$wp_customize->add_setting( 'fptwo_text_color_two', array(
		'default' 		       => 'dark',
		'sanitize_callback'  => 'blackwalnut_sanitize_text_color',
	) );

	$wp_customize->add_control( 'fptwo_text_color_two', array(
		'label' 	           => __( 'Image Two - Text Color', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'priority' 	         => 10,
		'type' 	             => 'select',
		'choices' 			     => array(
					'dark' 		     => __( 'Dark', 'blackwalnut' ),
			'light' 		       => __( 'Light', 'blackwalnut' ),
		),
	) );

	// Third Image Settings
	$wp_customize->add_setting( 'fptwo_img_url_three', array(
		'default' 	         => '',
		'sanitize_callback'  => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'fptwo_img_url_three', array(
		'label' 		         => __( 'Image Three - URL', 'blackwalnut' ),
		'description'	       => __( '(image size: 595x595px).', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'type' 	             => 'text',
		'priority'			     => 11,
	) );

	$wp_customize->add_setting( 'fptwo_link_url_three', array(
		'default' 	         => '',
		'sanitize_callback'  => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'fptwo_link_url_three', array(
		'label' 		         => __( 'Image Three - Link URL', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'type' 	             => 'text',
		'priority'			     => 12,
	) );

	$wp_customize->add_setting( 'fptwo_text_three', array(
		'default'			       => '',
		'type'				       => 'theme_mod',
		'capability'		     => 'edit_theme_options',
		'transport'			     => '',
		'sanitize_callback'	 => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'fptwo_text_three', array(
			'type' 				     => 'textarea',
		'section'			       => 'blackwalnut_fptwo',
		'label'				       => __( 'Image Three - Slogan Text', 'blackwalnut' ),
		'priority' 	         => 13,
	) );

	$wp_customize->add_setting( 'fptwo_text_position_three', array(
		'default' 		       => 'bottomleft',
		'sanitize_callback'  => 'blackwalnut_sanitize_text_position',
	) );

	$wp_customize->add_control( 'fptwo_text_position_three', array(
		'label' 	           => __( 'Image Three - Text Position', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'priority' 	         => 14,
		'type' 	             => 'select',
		'choices' 			     => array(
					'topleft' 		 => __( 'Top Left', 'blackwalnut' ),
			'topright' 		     => __( 'Top Right', 'blackwalnut' ),
			'bottomright'	     => __( 'Bottom Right', 'blackwalnut' ),
			'bottomleft'	     => __( 'Bottom Left', 'blackwalnut' ),
		),
	) );

	$wp_customize->add_setting( 'fptwo_text_color_three', array(
		'default' 		       => 'dark',
		'sanitize_callback'  => 'blackwalnut_sanitize_text_color',
	) );

	$wp_customize->add_control( 'fptwo_text_color_three', array(
		'label' 	           => __( 'Image Three - Text Color', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'priority' 	         => 15,
		'type' 	             => 'select',
		'choices' 			     => array(
					'dark' 		     => __( 'Dark', 'blackwalnut' ),
			'light' 		       => __( 'Light', 'blackwalnut' ),
		),
	) );


	// Fourth Image Settings
	$wp_customize->add_setting( 'fptwo_img_url_four', array(
		'default' 	         => '',
		'sanitize_callback'  => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'fptwo_img_url_four', array(
		'label' 		         => __( 'Image Four - URL', 'blackwalnut' ),
		'description'	       => __( '(image size: 595x595px).', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'type' 	             => 'text',
		'priority'			     => 16,
	) );

	$wp_customize->add_setting( 'fptwo_link_url_four', array(
		'default' 	         => '',
		'sanitize_callback'  => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'fptwo_link_url_four', array(
		'label' 		         => __( 'Image Four - Link URL', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'type' 	             => 'text',
		'priority'			     => 17,
	) );

	$wp_customize->add_setting( 'fptwo_text_four', array(
		'default'			       => '',
		'type'				       => 'theme_mod',
		'capability'		     => 'edit_theme_options',
		'transport'			     => '',
		'sanitize_callback'	 => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'fptwo_text_four', array(
			'type' 				     => 'textarea',
		'section'			       => 'blackwalnut_fptwo',
		'label'				       => __( 'Image Four - Slogan Text', 'blackwalnut' ),
		'priority' 	         => 18,
	) );

	$wp_customize->add_setting( 'fptwo_text_position_four', array(
		'default' 		       => 'bottomleft',
		'sanitize_callback'  => 'blackwalnut_sanitize_text_position',
	) );

	$wp_customize->add_control( 'fptwo_text_position_four', array(
		'label' 	           => __( 'Image Four - Text Position', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'priority' 	         => 19,
		'type' 	             => 'select',
		'choices' 			     => array(
					'topleft' 		 => __( 'Top Left', 'blackwalnut' ),
			'topright' 		     => __( 'Top Right', 'blackwalnut' ),
			'bottomright'	     => __( 'Bottom Right', 'blackwalnut' ),
			'bottomleft'	     => __( 'Bottom Left', 'blackwalnut' ),
		),
	) );

	$wp_customize->add_setting( 'fptwo_text_color_four', array(
		'default' 		       => 'dark',
		'sanitize_callback'  => 'blackwalnut_sanitize_text_color',
	) );

	$wp_customize->add_control( 'fptwo_text_color_four', array(
		'label' 	           => __( 'Image Four - Text Color', 'blackwalnut' ),
		'section' 	         => 'blackwalnut_fptwo',
		'priority' 	         => 20,
		'type' 	             => 'select',
		'choices' 			     => array(
					'dark' 		     => __( 'Dark', 'blackwalnut' ),
			'light' 		       => __( 'Light', 'blackwalnut' ),
		),
	) );

	// Custom Front Page Video Options.
	$wp_customize->add_setting( 'fpvideo_video', array(
		'default'			       => '',
		'type'				       => 'theme_mod',
		'capability'		     => 'edit_theme_options',
		'transport'			     => '',
		'sanitize_callback'	 => 'esc_url',
	) );

	$wp_customize->add_control( 'fpvideo_video', array(
			'type' 				     => 'text',
		'section'			       => 'blackwalnut_fpvideo',
		'description'	       => __( 'Include the video embed code (video width 1200px).', 'blackwalnut' ),
		'label'				       => __( 'Video Embed code', 'blackwalnut' ),
		'priority' 	         => 1,
	) );


}
add_action( 'customize_register', 'blackwalnut_customize_register' );

/**
 * Sanitize Checkboxes.
 */
function blackwalnut_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Sanitize the Front Page Text Position values.
 */
function blackwalnut_sanitize_text_position( $fpone_text_position ) {
	if ( ! in_array( $fpone_text_position, array( 'bottomleft', 'bottomright', 'topleft', 'topright' ) ) ) {
		$fpone_text_position = 'bottomleft';
	}

	return $fpone_text_position;
}

/**
 * Sanitize the Front Page Color values.
 */
function blackwalnut_sanitize_text_color( $fpone_text_color ) {
	if ( ! in_array( $fpone_text_color, array( 'dark', 'light' ) ) ) {
		$fpone_text_position = 'dark';
	}

	return $fpone_text_color;
}

/**
 * Sanitize the Site Title Font Styles values.
 */
function blackwalnut_sanitize_title_style( $title_font_style ) {
	if ( ! in_array( $title_font_style, array( 'default', 'nonserif-uppercase', 'serif', 'serif-uppercase' ) ) ) {
		$title_font_style = 'default';
	}

	return $title_font_style;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blackwalnut_customize_preview_js() {
	wp_enqueue_script( 'blackwalnut-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20131221', true );
}
add_action( 'customize_preview_init', 'blackwalnut_customize_preview_js' );
