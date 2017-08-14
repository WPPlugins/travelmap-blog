<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php

class TravelMap_Widget_Iframe extends WP_Widget
{
	public function __construct()
	{
		parent::__construct(
			'travelmap_iframe',
			_x('TravelMap', 'widget', 'travelmap-blog'),
			array(
				'description' => _x('Embed your TravelMap', 'widget', 'travelmap-blog')
			)
		);
	}

	public function widget($args, $instance)
	{
		$iframeData = array(
			'url' => $instance['url'],
			'width' => $instance['width'],
			'height' => $instance['height']
		);

		echo $args['before_widget'];
		echo $args['before_title'];
		echo apply_filters('widget_title', $instance['title']);
		echo $args['after_title'];
		include( TRAVELMAP_TEMPLATES_DIR.'iframe.php' );
		echo $args['after_widget'];
	}

	public function form($instance)
	{
		include( TRAVELMAP_TEMPLATES_DIR.'widget-iframe-form.php' );
	}
}