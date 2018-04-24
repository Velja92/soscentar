<?php
if(!function_exists('medigroup_mikado_layerslider_overrides')) {
	/**
	 * Disables Layer Slider auto update box
	 */
	function medigroup_mikado_layerslider_overrides() {
		$GLOBALS['lsAutoUpdateBox'] = false;
	}

	add_action('layerslider_ready', 'medigroup_mikado_layerslider_overrides');
}
?>