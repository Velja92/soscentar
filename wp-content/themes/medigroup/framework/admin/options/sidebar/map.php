<?php

if(!function_exists('medigroup_mikado_sidebar_options_map')) {

	function medigroup_mikado_sidebar_options_map() {

		$panel_widgets = medigroup_mikado_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_widgets',
				'title' => esc_html__('Widgets', 'medigroup')
			)
		);

		/**
		 * Navigation style
		 */
		medigroup_mikado_add_admin_field(array(
			'type'          => 'color',
			'name'          => 'sidebar_background_color',
			'default_value' => '',
			'label'         => esc_html__('Sidebar Background Color', 'medigroup'),
			'description'   => esc_html__('Choose background color for sidebar', 'medigroup'),
			'parent'        => $panel_widgets
		));

		$group_sidebar_padding = medigroup_mikado_add_admin_group(array(
			'name'   => 'group_sidebar_padding',
			'title'  => esc_html__('Padding', 'medigroup'),
			'parent' => $panel_widgets
		));

		$row_sidebar_padding = medigroup_mikado_add_admin_row(array(
			'name'   => 'row_sidebar_padding',
			'parent' => $group_sidebar_padding
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_top',
			'default_value' => '',
			'label'         => esc_html__('Top Padding', 'medigroup'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_right',
			'default_value' => '',
			'label'         => esc_html__('Right Padding', 'medigroup'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_bottom',
			'default_value' => '',
			'label'         => esc_html__('Bottom Padding', 'medigroup'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_left',
			'default_value' => '',
			'label'         => esc_html__('Left Padding', 'medigroup'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'select',
			'name'          => 'sidebar_alignment',
			'default_value' => '',
			'label'         => esc_html__('Text Alignment', 'medigroup'),
			'description'   => esc_html__('Choose text aligment', 'medigroup'),
			'options'       => array(
				'left'   => esc_html__('Left', 'medigroup'),
				'center' => esc_html__('Center', 'medigroup'),
				'right'  => esc_html__('Right', 'medigroup')
			),
			'parent'        => $panel_widgets
		));

	}

	add_action('medigroup_mikado_options_map', 'medigroup_mikado_sidebar_options_map');

}