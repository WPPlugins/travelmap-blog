<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
/*
Plugin Name: TravelMap Blog
Plugin URI: https://wordpress.org/support/plugin/travelmap-blog/
Description: Display an interactive TravelMap on your Wordpress blog. Quickly show and update your itinerary with the latest geolocation technology.
Version: 0.1
Author: TravelMap
Author URI: https://travelmap.net
Text Domain: travel-map
Domain Path: /languages
*/

define('TRAVELMAP_TEMPLATES_DIR', plugin_dir_path( __FILE__ ).'templates/');
define('TRAVELMAP_ADMIN_ASSETS_PATH', plugin_dir_url(__FILE__).'admin/');
define('TRAVELMAP_ADMIN_IMG_PATH', TRAVELMAP_ADMIN_ASSETS_PATH.'img/');
define('TRAVELMAP_ADMIN_CSS_PATH', TRAVELMAP_ADMIN_ASSETS_PATH.'css/');
define('TRAVELMAP_ADMIN_JS_PATH', TRAVELMAP_ADMIN_ASSETS_PATH.'js/');

define('TRAVELMAP_IFRAME_DEFAULT_WIDTH', '100%');
define('TRAVELMAP_IFRAME_DEFAULT_HEIGHT', '500');

// Custom regexp with unit tests here : https://regex101.com/r/GMdGsR/2/tests
define('TRAVELMAP_URL_REGEXP', '/^(http|https):\/\/([A-Za-z0-9\-]+)\.travelmap\.(net|fr)(\/([A-Za-z0-9\-]+))?(\/)?$/');

function register_TravelMap_Widget_Iframe()
{
	register_widget('TravelMap_Widget_Iframe');
}

class TravelMap
{
	public function __construct()
	{
		include_once plugin_dir_path( __FILE__ ).'shortcodes/iframe.php';
		include_once plugin_dir_path( __FILE__ ).'widgets/iframe.php';
		add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
		add_action('widgets_init', 'register_TravelMap_Widget_Iframe');
		
		if (is_admin()) {
			add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
			add_action('admin_menu', array($this, 'add_admin_menu'), 20);
			add_action( 'wp_ajax_travelmap_generate_shortcode', array($this, 'ajax_generate_shortcode_handler') );
		}
	}

	public function enqueue_admin_scripts()
	{
		wp_enqueue_style(
			'travelmap', // handle
			TRAVELMAP_ADMIN_CSS_PATH.'travelmap.css', // src
			null, // dependencies
			false, // version
			'all' // media query
		);
		wp_enqueue_script(
			'travelmap-admin', // handle
			TRAVELMAP_ADMIN_JS_PATH.'travelmap.js', // src
			array('jquery'), // dependencies
			false, // version
			true // in footer ?
		);
		wp_localize_script(
			'travelmap-admin',
			'travelmapRegistry',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'generateShortcode_nonce' => wp_create_nonce( 'generate_shortcode' )
			)
		);
	}

	public function load_plugin_textdomain()
	{
		load_plugin_textdomain( 'travelmap-blog', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}

	public function add_admin_menu()
	{
		if (!current_user_can('manage_options')) {
			return;
		}
		add_menu_page(
			'TravelMap', // Page Title
			'TravelMap', // Menu Title
			'manage_options', // Capability
			'travelmap', // Menu Slug
			array($this, 'options_page_html'), // Display function,
			TRAVELMAP_ADMIN_IMG_PATH.'menu-options-page-icon.png' // menu icon // TODO - optimized by passing a base64-encoded SVG using a data URI to match the color theme
		);
	}

	public function ajax_generate_shortcode_handler() {
		check_ajax_referer('generate_shortcode');

		include( TRAVELMAP_TEMPLATES_DIR.'shortcode-message.php' );

		wp_die();
	}

	public function options_page_html()
	{
		include( TRAVELMAP_TEMPLATES_DIR.'page-options.php' );
	}
}

new TravelMap();