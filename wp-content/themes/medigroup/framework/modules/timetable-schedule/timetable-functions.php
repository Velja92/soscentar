<?php

if(!function_exists('medigroup_mikado_timetable_assets')) {
	/**
	 * Loads all assets for timetable plugin
	 */
	function medigroup_mikado_timetable_assets() {
		wp_enqueue_style('themename_mikado_timetable', MIKADO_ASSETS_ROOT.'/css/timetable-schedule.min.css');
	}

	add_action('wp_enqueue_scripts', 'medigroup_mikado_timetable_assets', 20);
}