<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php

class TravelMap_Shortcode_Iframe
{
	public function __construct()
	{
		add_shortcode('travelmap', array($this, 'travelmap_html'));
	}

	public function travelmap_html($atts, $content)
	{
		$iframeData = array(
			'url' => $atts['url'],
			'width' => $atts['width'],
			'height' => $atts['height']
		);
		ob_start();
		include( TRAVELMAP_TEMPLATES_DIR.'iframe.php' );
		$output = ob_get_clean();
		return $output;
	}
}

new TravelMap_Shortcode_Iframe();