<?php

if(!function_exists('medigroup_mikado_load_elements_map')) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function medigroup_mikado_load_elements_map() {

		medigroup_mikado_add_admin_page(
			array(
				'slug'  => '_elements_page',
				'title' => esc_html__('Elements', 'medigroup'),
				'icon'  => 'fa fa-code'
			)
		);

		do_action('medigroup_mikado_options_elements_map');

	}

	add_action('medigroup_mikado_options_map', 'medigroup_mikado_load_elements_map');

}