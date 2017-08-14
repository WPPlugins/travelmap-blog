var $ = jQuery,
	travelmapRegistry = window.travelmapRegistry,
	TravelMap = function(){};

TravelMap.prototype.init = function () {
	this.initGenerateShortcodeAjax();
};

TravelMap.prototype.initGenerateShortcodeAjax = function() {
	$form = $('#travelmap-shortcode-form');
	$formMessage = $('#travelmap-shortcode-message');

	if (!$form) {
		return false;
	}

	$form.on('submit', function(e){
		var form = this,
			$form = $(form);
		e.preventDefault();
		$.post(travelmapRegistry.ajax_url, {
			_ajax_nonce: travelmapRegistry.generateShortcode_nonce,
			action: 'travelmap_generate_shortcode',
			iframe_url: $form.find('#iframe_url').val(),
			iframe_width: $form.find('#iframe_width').val(),
			iframe_height: $form.find('#iframe_height').val()
		}, function(data) {
			$formMessage.html(data);
		});
		return false;
	});
}

$(document).ready(function() {
	travelMap = new TravelMap();
	travelMap.init();
});