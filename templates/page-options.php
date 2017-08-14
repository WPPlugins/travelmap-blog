<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="wrap">
	<h1 class="travelmap-page-title"><?php echo get_admin_page_title(); ?></h1>
	<div class="travelmap-message">
		<?php
			$linkUrl = esc_url('https://travelmap.net', 'create account notice','travelmap-blog');
			$linkTitle = esc_attr_x('Create a TravelMap account', 'create account notice','travelmap-blog');
			$linkLabel = esc_html_x('travelmap.net', 'create account notice','travelmap-blog');
			$createAccountLink = '<a href="'.$linkUrl.'" target="_blank" title="'.$linkTitle.'">'.$linkLabel.'</a>';
		?>
		<p><strong><?php printf(esc_html__("Important: You need a TravelMap account to use and manage this plugin! You can quickly create one on %s", 'travelmap-blog'), $createAccountLink); ?></strong></p>
	</div>
	<p><?php esc_html_e('There are 2 ways to display a TravelMap on your blog :', 'travelmap-blog'); ?></p>
	<h2><?php esc_html_e('1 : Using a Widget - to embed your Map on all pages', 'travelmap-blog') ?></h2>
	<div>
		<p><?php echo nl2br(esc_html__("Go to the widgets settings page (Appearance -> Widgets).\nFind the TravelMap widget, drag and drop it into the widget area of your choice.\nSet the url of your TravelMap blog (e.g. https://username.travelmap.net).\nSave the widget.", 'travelmap-blog')); ?></p>
	</div>
	
	<h2><?php esc_html_e('2 : Using a Shortcode - to embed your Map on a specific post or page', 'travelmap-blog') ?></h2>
	<div>
		<p><?php esc_html_e('Generate a shortcode (short piece of code contained in brackets) using the form below and paste it in your editor :', 'travelmap-blog') ?></p>
		<div>
			<form id="travelmap-shortcode-form" action="" method="post">
				<?php
					$iframeUrl = isset($_POST['iframe_url']) && $_POST['iframe_url'] ? $_POST['iframe_url'] : '';
					$iframeWidth = isset($_POST['iframe_width']) && $_POST['iframe_width'] ? $_POST['iframe_width'] : TRAVELMAP_IFRAME_DEFAULT_WIDTH;
					$iframeHeight = isset($_POST['iframe_height']) && $_POST['iframe_height'] ? $_POST['iframe_height'] : TRAVELMAP_IFRAME_DEFAULT_HEIGHT;
				?>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row">
								<label for="iframe_url"><?php echo esc_html_x( 'TravelMap url* :', 'shortcode form', 'travelmap-blog' ); ?></label>
							</th>
							<td>
								<input class="widefat" placeholder="<?php echo esc_attr_x( 'https://username.travelmap.net', 'shortcode form', 'travelmap-blog' ); ?>" id="iframe_url" name="iframe_url" type="text" value="<?php echo esc_url($iframeUrl); ?>" />
								<br>
				        		<span class="description"></span>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="iframe_width"><?php echo esc_html_x( 'Map width :', 'shortcode form', 'travelmap-blog' ); ?></label>
							</th>
							<td>
								<input class="widefat" id="iframe_width" name="iframe_width" type="text" value="<?php echo esc_attr($iframeWidth); ?>" />
								<br>
				        		<span class="description"></span>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="iframe_height"><?php echo esc_html_x( 'Map height :', 'shortcode form', 'travelmap-blog' ); ?></label>
							</th>
							<td>
								<input class="widefat" id="iframe_height" name="iframe_height" type="text" value="<?php echo esc_attr($iframeHeight); ?>" />
								<br>
				        		<span class="description"></span>
							</td>
						</tr>
					</tbody>
				</table>
				<p class="submit">
					<input class="button-primary" type="submit" value="<?php echo esc_attr_x('Generate shortcode', 'shortcode form', 'travelmap-blog'); ?>">
				</p>
			</form>
			<div id="travelmap-shortcode-message">
				<?php include( TRAVELMAP_TEMPLATES_DIR.'shortcode-message.php' ); ?>
			</div>
		</div>
	</div>
	<div class="travelmap-note">
		<p><?php esc_html_e("Note: This is the first version of the plugin. For now you have to go on TravelMap to update your itinerary but in the future we want to integrate the admin directly into WordPress.", 'travelmap-blog'); ?></p>
	</div>
</div>