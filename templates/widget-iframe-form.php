<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
	$title = isset($instance['title']) ? $instance['title'] : esc_html_x('TravelMap', 'widget form', 'travelmap-blog');
	$url = isset($instance['url']) ? $instance['url'] : '';
	$width = isset($instance['width']) ? $instance['width'] : TRAVELMAP_IFRAME_DEFAULT_WIDTH;
	$height = isset($instance['height']) ? $instance['height'] : TRAVELMAP_IFRAME_DEFAULT_HEIGHT;
?>
<p>
	<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php echo esc_html_x( 'Title :', 'widget form', 'travelmap-blog' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_name( 'url' ); ?>"><?php echo esc_html_x( 'TravelMap url :', 'widget form', 'travelmap-blog' ); ?></label>
	<input class="widefat" placeholder="<?php echo esc_attr_x( 'https://username.travelmap.net', 'widget form', 'travelmap-blog' ); ?>" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_url($url); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_name( 'width' ); ?>"><?php echo esc_html_x( 'Map width :', 'widget form', 'travelmap-blog' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo esc_attr($width); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_name( 'height' ); ?>"><?php echo esc_html_x( 'Map height :', 'widget form', 'travelmap-blog' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr($height); ?>" />
</p>