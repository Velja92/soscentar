<?php

if(!function_exists('medigroup_mikado_error_404_options_map')) {

	function medigroup_mikado_error_404_options_map() {

		medigroup_mikado_add_admin_page(array(
			'slug'  => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'medigroup'),
			'icon'  => 'fa fa-exclamation-triangle'
		));

		$panel_404_options = medigroup_mikado_add_admin_panel(array(
			'page'  => '__404_error_page',
			'name'  => 'panel_404_options',
			'title' => esc_html__('404 Page Option', 'medigroup')
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => '404_title',
			'default_value' => '',
			'label'         => esc_html__('Title', 'medigroup'),
			'description'   => esc_html__('Enter title for 404 page', 'medigroup')
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => '404_text',
			'default_value' => '',
			'label'         => esc_html__('Text', 'medigroup'),
			'description'   => esc_html__('Enter text for 404 page', 'medigroup')
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => '404_back_to_home',
			'default_value' => '',
			'label'         => esc_html__('Back to Home Button Label', 'medigroup'),
			'description'   => esc_html__('Enter label for "Back to Home" button', 'medigroup')
		));

	}

	add_action('medigroup_mikado_options_map', 'medigroup_mikado_error_404_options_map', 17);

}