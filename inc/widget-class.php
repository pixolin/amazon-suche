<?php

/**
 * Widget Class
 */
class AmazonSucheWidget extends WP_Widget {

	/**
	 * Set up the Widget
	 *
	 * @method __construct
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'amazonsuche_widget',
			'description' => 'Amazon Suche',
		);
		parent::__construct( 'amazonsuche', 'Amazon Suche', $widget_ops );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		echo $this->amazon_script( $instance['partner_id'] );

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'Amazon Suche';
		$partner_id = $instance['partner_id'];
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Titel:</label><br />
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'partner_id' ) ); ?>">Partner-ID:</label><br />
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'partner_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'partner_id' ) ); ?>" type="text" value="<?php echo esc_attr( $partner_id ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['partner_id'] = ( ! empty( $new_instance['partner_id'] ) ) ? strip_tags( $new_instance['partner_id'] ) : '';
		return $instance;
	}

	/**
	 * JavaScript provided by Amazon
	 *
	 * @method amazon_script
	 * @return var $return        returns the JavaScript provided by Amazon
	 */
	public function amazon_script( $partner_id ) {

		$out =
			'<script charset="utf-8" type="text/javascript">
			amzn_assoc_ad_type = "responsive_search_widget";
			amzn_assoc_tracking_id = "' . esc_attr( $partner_id ) . '";
			amzn_assoc_marketplace = "amazon";
			amzn_assoc_region = "DE";
			amzn_assoc_placement = "";
			amzn_assoc_search_type = "search_box";
			amzn_assoc_width = "auto";
			amzn_assoc_height = "auto";
			amzn_assoc_default_search_category = "";
			amzn_assoc_default_search_key = "";
			amzn_assoc_theme = "light";
			amzn_assoc_bg_color = "FFFFFF";
			</script>
			<script src="//z-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1&MarketPlace=DE&internal=1">
			</script>';

		return $out;
	}

} // class Foo_Widget
