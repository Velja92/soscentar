<?php

if(!function_exists('medigroup_mikado_page_options_map')) {

	function medigroup_mikado_page_options_map() {

		medigroup_mikado_add_admin_page(
			array(
				'slug'  => '_page_page',
				'title' => esc_html__('Page', 'medigroup'),
				'icon'  => 'fa fa-file-text-o'
			)
		);

		$custom_sidebars = medigroup_mikado_get_custom_sidebars();

		$panel_sidebar = medigroup_mikado_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_sidebar',
				'title' => esc_html__('Design Style', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_field(array(
			'name'          => 'page_sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__('Sidebar Layout', 'medigroup'),
			'description'   => esc_html__('Choose a sidebar layout for pages', 'medigroup'),
			'default_value' => 'default',
			'parent'        => $panel_sidebar,
			'options'       => array(
				'default'          => esc_html__('No Sidebar', 'medigroup'),
				'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'medigroup'),
				'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'medigroup'),
				'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left', 'medigroup'),
				'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left', 'medigroup')
			)
		));


		if(count($custom_sidebars) > 0) {
			medigroup_mikado_add_admin_field(array(
				'name'        => 'page_custom_sidebar',
				'type'        => 'selectblank',
				'label'       => esc_html__('Sidebar to Display', 'medigroup'),
				'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'medigroup'),
				'parent'      => $panel_sidebar,
				'options'     => $custom_sidebars
			));
		}

		medigroup_mikado_add_admin_field(array(
			'name'          => 'page_show_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'medigroup'),
			'description'   => esc_html__('Enabling this option will show comments on your page', 'medigroup'),
			'default_value' => 'yes',
			'parent'        => $panel_sidebar
		));

	}

	add_action('medigroup_mikado_options_map', 'medigroup_mikado_page_options_map', 9);

}