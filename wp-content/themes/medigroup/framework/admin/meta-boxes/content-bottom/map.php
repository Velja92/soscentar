<?php

$content_bottom_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('page', 'portfolio-item', 'doctor', 'post'),
		'title' => esc_html__('Content Bottom', 'medigroup'),
		'name' => 'content_bottom_meta'
	)
);

	medigroup_mikado_add_meta_box_field(
		array(
			'name' => 'mkd_enable_content_bottom_area_meta',
			'type' => 'selectblank',
			'default_value' => '',
			'label' => esc_html__('Enable Content Bottom Area', 'medigroup'),
			'description' => esc_html__('This option will enable Content Bottom area on pages', 'medigroup'),
			'parent' => $content_bottom_meta_box,
			'options' => array(
				'no' => esc_html__('No', 'medigroup'),
				'yes' => esc_html__('Yes', 'medigroup')
			),
			'args' => array(
				'dependence' => true,
				'hide' => array(
					'' => '#mkd_mkd_show_content_bottom_meta_container',
					'no' => '#mkd_mkd_show_content_bottom_meta_container'
				),
				'show' => array(
					'yes' => '#mkd_mkd_show_content_bottom_meta_container'
				)
			)
		)
	);

	$show_content_bottom_meta_container = medigroup_mikado_add_admin_container(
		array(
			'parent' => $content_bottom_meta_box,
			'name' => 'mkd_show_content_bottom_meta_container',
			'hidden_property' => 'mkd_enable_content_bottom_area_meta',
			'hidden_value' => '',
			'hidden_values' => array('','no')
		)
	);

		medigroup_mikado_add_meta_box_field(
			array(
				'name' => 'mkd_content_bottom_sidebar_custom_display_meta',
				'type' => 'selectblank',
				'default_value' => '',
				'label' => esc_html__('Sidebar to Display', 'medigroup'),
				'description' => esc_html__('Choose a Content Bottom sidebar to display', 'medigroup'),
				'options' => medigroup_mikado_get_custom_sidebars(),
				'parent' => $show_content_bottom_meta_container
			)
		);

		medigroup_mikado_add_meta_box_field(
			array(
				'type' => 'selectblank',
				'name' => 'mkd_content_bottom_in_grid_meta',
				'default_value' => '',
				'label' => esc_html__('Display in Grid', 'medigroup'),
				'description' => esc_html__('Enabling this option will place Content Bottom in grid', 'medigroup'),
				'options' => array(
					'no' => esc_html__('No', 'medigroup'),
					'yes' => esc_html__('Yes', 'medigroup')
				),
				'parent' => $show_content_bottom_meta_container
			)
		);

		medigroup_mikado_add_meta_box_field(
			array(
				'type' => 'color',
				'name' => 'mkd_content_bottom_background_color_meta',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'medigroup'),
				'description' => esc_html__('Choose a background color for Content Bottom area', 'medigroup'),
				'parent' => $show_content_bottom_meta_container
			)
		);