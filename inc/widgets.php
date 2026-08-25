<?php
/**
 * Black Walnut Custom Widgets
 *
 *
 * @package Black Walnut
 * @since Black Walnut 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Black Walnut Widget: Quote
/*-----------------------------------------------------------------------------------*/

class blackwalnut_quote extends WP_Widget {
	
	public function __construct() {
		parent::__construct( 'blackwalnut_quote', __( 'Quote (Black Walnut)', 'blackwalnut' ), array(
			'classname'   => 'widget_blackwalnut_quote',
			'description' => __( 'A quote or text slogan.', 'blackwalnut' ),
		) );
	}

	public function widget($args, $instance) {
		/* __php8_keys */ $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'quotetext' => '', 'quoteauthor' => '' ) );
		extract( $args );
		$title = $instance['title'];
		$quotetext = $instance['quotetext'];
		$quoteauthor = $instance['quoteauthor'];

		echo $before_widget; ?>

		<?php if($title != '')
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>

			<div class="quote-wrap">
				<blockquote class="quote-text"><?php echo ( wp_kses_post(wpautop($quotetext))  ); ?>
				<?php if($quoteauthor != '') {
					echo '<cite class="quote-author"> ' . ( wp_kses_post($quoteauthor) ) . ' </cite>';
				}
				?>
				</blockquote>
			</div><!-- end .quote-wrap -->

	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();
	   }

   function update($new_instance, $old_instance) {

   		$instance['title'] = $new_instance['title'];
   		$instance['quotetext'] = $new_instance['quotetext'];
   		$instance['quoteauthor'] = $new_instance['quoteauthor'];

       return $new_instance;
   }

   function form($instance) {
		/* __php8_keys */ $instance = wp_parse_args( (array) $instance, array( 'title' => null, 'quotetext' => null, 'quoteauthor' => null ) );
   		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
   		$quotetext = isset( $instance['quotetext'] ) ? esc_attr( $instance['quotetext'] ) : '';
   		$quoteauthor = isset( $instance['quoteauthor'] ) ? esc_attr( $instance['quoteauthor'] ) : '';
	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','blackwalnut'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('quotetext'); ?>"><?php _e('Quote Text:','blackwalnut'); ?></label>
		<textarea name="<?php echo $this->get_field_name('quotetext'); ?>" class="widefat" rows="8" cols="12" id="<?php echo $this->get_field_id('quotetext'); ?>"><?php echo( $quotetext ); ?></textarea>
	</p>

	<p>
	<label for="<?php echo $this->get_field_id('quoteauthor'); ?>"><?php _e('Quote Author (optional):','blackwalnut'); ?></label>
	<input type="text" name="<?php echo $this->get_field_name('quoteauthor'); ?>" value="<?php echo esc_attr($quoteauthor); ?>" class="widefat" id="<?php echo $this->get_field_id('quoteauthor'); ?>" />
	</p>

	<?php
	}
}


/**
 * Registered on widgets_init, which is where WordPress asks for it.
 * At file scope the widget's constructor translated its own name before
 * init, which WordPress 6.7 reports on every request.
 */
function blackwalnut_register_widgets() {
	register_widget( 'blackwalnut_quote' );
}
add_action( 'widgets_init', 'blackwalnut_register_widgets' );
