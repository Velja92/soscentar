<?php

$medigroup_custom_sidebars = medigroup_mikado_get_custom_sidebars();

$medigroup_sidebar_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('page', 'portfolio-item', 'doctor', 'post'),
		'title' => esc_html__('Sidebar', 'medigroup'),
		'name'  => 'sidebar_meta'
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_sidebar_meta',
		'type'        => 'select',
		'label'       => esc_html__('Layout', 'medigroup'),
		'description' => esc_html__('Choose the sidebar layout', 'medigroup'),
		'parent'      => $medigroup_sidebar_meta_box,
		'options'     => array(
			''                 => esc_html__('Default', 'medigroup'),
			'no-sidebar'       => esc_html__('No Sidebar', 'medigroup'),
			'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'medigroup'),
			'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'medigroup'),
			'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left', 'medigroup'),
			'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left', 'medigroup'),
		)
	)
);

if(count($medigroup_custom_sidebars) > 0) {
	medigroup_mikado_add_meta_box_field(array(
		'name'        => 'mkd_custom_sidebar_meta',
		'type'        => 'selectblank',
		'label'       => esc_html__('Choose Widget Area in Sidebar', 'medigroup'),
		'description' => esc_html__('Choose Custom Widget area to display in Sidebar', 'medigroup'),
		'parent'      => $medigroup_sidebar_meta_box,
		'options'     => $medigroup_custom_sidebars
	));
}
