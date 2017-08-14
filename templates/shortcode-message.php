<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php if (isset($_POST['iframe_url']) && preg_match(TRAVELMAP_URL_REGEXP, $_POST['iframe_url'])): ?>
	<?php
		$shortcode = '[travelmap';
		$shortcode .= ' url="'. esc_url($_POST['iframe_url']) .'"';
		if (isset($_POST['iframe_width']) && $_POST['iframe_width'] != '') {
			$shortcode .= ' width="'. esc_attr($_POST['iframe_width']) .'"';
		}
		if (isset($_POST['iframe_height']) && $_POST['iframe_height'] != '') {
			$shortcode .= ' height="'. esc_attr($_POST['iframe_height']) .'"';
		}
		$shortcode .= ']';
	?>
	<div class="travelmap-message travelmap-message--success">
		<p>
			<?php esc_html_e("Generated shortcode :", 'travelmap-blog') ?>
			<br>
			<span class="travelmap-shortcode">
				<?php echo $shortcode; ?>
			</span>
		</p>
		<p><?php esc_html_e("You can now copy the generated shortcode and paste it into the editor of one of your page or post. Save it, you should now be able to see your map !", 'travelmap-blog') ?></p>
	</div>
<?php elseif (isset($_POST['iframe_url'])): ?>
	<div class="travelmap-message travelmap-message--error">
		<p><strong><?php esc_html_e('A TravelMap url is required', 'travelmap-blog'); ?></strong></p>
	</div>
<?php endif; ?>