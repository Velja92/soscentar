<?php

add_action('after_setup_theme', 'medigroup_mikado_meta_boxes_map_init', 1);
function medigroup_mikado_meta_boxes_map_init() {
	/**
	 * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
	 * and loads map.php file in each.
	 *
	 * @see http://php.net/manual/en/function.glob.php
	 */

	do_action('medigroup_mikado_before_meta_boxes_map');

	global $medigroup_options;
	global $medigroup_Framework;
	global $medigroup_options_fontstyle;
	global $medigroup_options_fontweight;
	global $medigroup_options_texttransform;
	global $medigroup_options_fontdecoration;
	global $medigroup_options_arrows_type;

	foreach(glob(MIKADO_FRAMEWORK_ROOT_DIR.'/admin/meta-boxes/*/map.php') as $meta_box_load) {
		include_once $meta_box_load;
	}

	do_action('medigroup_mikado_meta_boxes_map');

	do_action('medigroup_mikado_after_meta_boxes_map');
}