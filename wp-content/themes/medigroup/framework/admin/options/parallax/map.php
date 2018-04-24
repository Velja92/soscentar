<?php

if(!function_exists('medigroup_mikado_parallax_options_map')) {
	/**
	 * Parallax options page
	 */
	function medigroup_mikado_parallax_options_map() {

		$panel_parallax = medigroup_mikado_add_admin_panel(
			array(
				'page'  => '_elements_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__('Parallax', 'medigroup')
			)
		);

		medigroup_mikado_add_admin_field(array(
			'type'          => 'onoff',
			'name'          => 'parallax_on_off',
			'default_value' => 'off',
			'label'         => esc_html__('Parallax on touch devices', 'medigroup'),
			'description'   => esc_html__('Enabling this option will allow parallax on touch devices', 'medigroup'),
			'parent'        => $panel_parallax
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'text',
			'name'          => 'parallax_min_height',
			'default_value' => '400',
			'label'         => esc_html__('Parallax Min Height', 'medigroup'),
			'description'   => esc_html__('Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'medigroup'),
			'args'          => array(
				'col_width' => 3,
				'suffix'    => 'px'
			),
			'parent'        => $panel_parallax
		));

	}

	add_action('medigroup_mikado_options_map', 'medigroup_mikado_parallax_options_map');

}