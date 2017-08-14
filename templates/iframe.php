<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
	$iframeData = isset($iframeData) && is_array($iframeData) ? $iframeData : array();
	$iframeDataDefaults = array(
		'url' => '',
		'width' => TRAVELMAP_IFRAME_DEFAULT_WIDTH,
		'height' => TRAVELMAP_IFRAME_DEFAULT_HEIGHT
	);
	foreach($iframeDataDefaults as $key => $defaultValue) {
		$iframeData[$key] = array_key_exists($key, $iframeData) && $iframeData[$key] != '' ? $iframeData[$key] : $defaultValue;
	}
?>
<iframe src="<?php echo esc_url($iframeData['url']);  ?>" width="<?php echo esc_attr($iframeData['width']);  ?>" height="<?php echo esc_attr($iframeData['height']);  ?>" scrolling="yes" class="travelmap-iframe" frameborder="0"></iframe>