<?php

$title_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('page', 'portfolio-item', 'doctor', 'post'),
		'title' => esc_html__('Title', 'medigroup'),
		'name'  => 'title_meta'
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_show_title_area_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Show Title Area', 'medigroup'),
		'description'   => esc_html__('Disabling this option will turn off page title area', 'medigroup'),
		'parent'        => $title_meta_box,
		'options'       => array(
			''    => '',
			'no'  => esc_html__('No', 'medigroup'),
			'yes' => esc_html__('Yes', 'medigroup')
		),
		'args'          => array(
			"dependence" => true,
			"hide"       => array(
				""    => "",
				"no"  => "#mkd_mkd_show_title_area_meta_container",
				"yes" => ""
			),
			"show"       => array(
				""    => "#mkd_mkd_show_title_area_meta_container",
				"no"  => "",
				"yes" => "#mkd_mkd_show_title_area_meta_container"
			)
		)
	)
);

$show_title_area_meta_container = medigroup_mikado_add_admin_container(
	array(
		'parent'          => $title_meta_box,
		'name'            => 'mkd_show_title_area_meta_container',
		'hidden_property' => 'mkd_show_title_area_meta',
		'hidden_value'    => 'no'
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_title_area_type_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Title Area Type', 'medigroup'),
		'description'   => esc_html__('Choose title type', 'medigroup'),
		'parent'        => $show_title_area_meta_container,
		'options'       => array(
			''           => '',
			'standard'   => esc_html__('Standard', 'medigroup'),
			'breadcrumb' => esc_html__('Breadcrumb', 'medigroup')
		),
		'args'          => array(
			"dependence" => true,
			"hide"       => array(
				"standard"   => "",
				"standard"   => "",
				"breadcrumb" => "#mkd_mkd_title_area_type_meta_container"
			),
			"show"       => array(
				""           => "#mkd_mkd_title_area_type_meta_container",
				"standard"   => "#mkd_mkd_title_area_type_meta_container",
				"breadcrumb" => ""
			)
		)
	)
);

$title_area_type_meta_container = medigroup_mikado_add_admin_container(
	array(
		'parent'          => $show_title_area_meta_container,
		'name'            => 'mkd_title_area_type_meta_container',
		'hidden_property' => 'mkd_title_area_type_meta',
		'hidden_value'    => '',
		'hidden_values'   => array('breadcrumb'),
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_title_area_enable_breadcrumbs_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Enable Breadcrumbs', 'medigroup'),
		'description'   => esc_html__('This option will display Breadcrumbs in Title Area', 'medigroup'),
		'parent'        => $title_area_type_meta_container,
		'options'       => array(
			''    => '',
			'no'  => esc_html__('No', 'medigroup'),
			'yes' => esc_html__('Yes', 'medigroup')
		),
	)
);

medigroup_mikado_add_meta_box_field(array(
	'name'        => 'mkd_title_text_size_meta',
	'type'        => 'select',
	'label'       => esc_html__('Choose Title Text Size', 'medigroup'),
	'description' => esc_html__('Choose predefined size for title text', 'medigroup'),
	'parent'      => $title_area_type_meta_container,
	'options'     => array(
		''       => esc_html__('Default', 'medigroup'),
		'medium' => esc_html__('Medium', 'medigroup'),
		'large'  => esc_html__('Large', 'medigroup')
	)
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_title_area_animation_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Animations', 'medigroup'),
		'description'   => esc_html__('Choose an animation for Title Area', 'medigroup'),
		'parent'        => $show_title_area_meta_container,
		'options'       => array(
			''           => '',
			'no'         => esc_html__('No Animation', 'medigroup'),
			'right-left' => esc_html__('Text right to left', 'medigroup'),
			'left-right' => esc_html__('Text left to right', 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_title_area_vertial_alignment_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Vertical Alignment', 'medigroup'),
		'description'   => esc_html__('Specify title vertical alignment', 'medigroup'),
		'parent'        => $show_title_area_meta_container,
		'options'       => array(
			''              => '',
			'header_bottom' => esc_html__('From Bottom of Header', 'medigroup'),
			'window_top'    => esc_html__('From Window Top', 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_title_area_content_alignment_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Horizontal Alignment', 'medigroup'),
		'description'   => esc_html__('Specify title horizontal alignment', 'medigroup'),
		'parent'        => $show_title_area_meta_container,
		'options'       => array(
			''       => '',
			'left'   => esc_html__('Left', 'medigroup'),
			'center' => esc_html__('Center', 'medigroup'),
			'right'  => esc_html__('Right', 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_title_text_color_meta',
		'type'        => 'color',
		'label'       => esc_html__('Title Color', 'medigroup'),
		'description' => esc_html__('Choose a color for title text', 'medigroup'),
		'parent'      => $show_title_area_meta_container
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_title_breadcrumb_color_meta',
		'type'        => 'color',
		'label'       => esc_html__('Breadcrumb Color', 'medigroup'),
		'description' => esc_html__('Choose a color for breadcrumb text', 'medigroup'),
		'parent'      => $show_title_area_meta_container
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_title_area_background_color_meta',
		'type'        => 'color',
		'label'       => esc_html__('Background Color', 'medigroup'),
		'description' => esc_html__('Choose a background color for Title Area', 'medigroup'),
		'parent'      => $show_title_area_meta_container
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_hide_background_image_meta',
		'type'          => 'yesno',
		'default_value' => 'no',
		'label'         => esc_html__('Hide Background Image', 'medigroup'),
		'description'   => esc_html__('Enable this option to hide background image in Title Area', 'medigroup'),
		'parent'        => $show_title_area_meta_container,
		'args'          => array(
			"dependence"             => true,
			"dependence_hide_on_yes" => "#mkd_mkd_hide_background_image_meta_container",
			"dependence_show_on_yes" => ""
		)
	)
);

$hide_background_image_meta_container = medigroup_mikado_add_admin_container(
	array(
		'parent'          => $show_title_area_meta_container,
		'name'            => 'mkd_hide_background_image_meta_container',
		'hidden_property' => 'mkd_hide_background_image_meta',
		'hidden_value'    => 'yes'
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_title_area_background_image_meta',
		'type'        => 'image',
		'label'       => esc_html__('Background Image', 'medigroup'),
		'description' => esc_html__('Choose an Image for Title Area', 'medigroup'),
		'parent'      => $hide_background_image_meta_container
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_title_area_background_image_responsive_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Background Responsive Image', 'medigroup'),
		'description'   => esc_html__('Enabling this option will make Title background image responsive', 'medigroup'),
		'parent'        => $hide_background_image_meta_container,
		'options'       => array(
			''    => '',
			'no'  => esc_html__('No', 'medigroup'),
			'yes' => esc_html__('Yes', 'medigroup')
		),
		'args'          => array(
			"dependence" => true,
			"hide"       => array(
				""    => "",
				"no"  => "",
				"yes" => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta"
			),
			"show"       => array(
				""    => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta",
				"no"  => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta",
				"yes" => ""
			)
		)
	)
);

$title_area_background_image_responsive_meta_container = medigroup_mikado_add_admin_container(
	array(
		'parent'          => $hide_background_image_meta_container,
		'name'            => 'mkd_title_area_background_image_responsive_meta_container',
		'hidden_property' => 'mkd_title_area_background_image_responsive_meta',
		'hidden_value'    => 'yes'
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_title_area_background_image_parallax_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Background Image in Parallax', 'medigroup'),
		'description'   => esc_html__('Enabling this option will make Title background image parallax', 'medigroup'),
		'parent'        => $title_area_background_image_responsive_meta_container,
		'options'       => array(
			''         => '',
			'no'       => esc_html__('No', 'medigroup'),
			'yes'      => esc_html__('Yes', 'medigroup'),
			'yes_zoom' => esc_html__('Yes, with zoom out', 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(array(
	'name'        => 'mkd_title_area_height_meta',
	'type'        => 'text',
	'label'       => esc_html__('Height', 'medigroup'),
	'description' => esc_html__('Set a height for Title Area', 'medigroup'),
	'parent'      => $show_title_area_meta_container,
	'args'        => array(
		'col_width' => 2,
		'suffix'    => 'px'
	)
));

medigroup_mikado_add_meta_box_field(array(
	'name'          => 'mkd_disable_title_bottom_border_meta',
	'type'          => 'yesno',
	'label'         => esc_html__('Disable Title Bottom Border', 'medigroup'),
	'description'   => esc_html__('This option will disable title area bottom border', 'medigroup'),
	'parent'        => $show_title_area_meta_container,
	'default_value' => 'no'
));

medigroup_mikado_add_meta_box_field(array(
	'name'          => 'mkd_title_area_subtitle_meta',
	'type'          => 'text',
	'default_value' => '',
	'label'         => esc_html__('Subtitle Text', 'medigroup'),
	'description'   => esc_html__('Enter your subtitle text', 'medigroup'),
	'parent'        => $show_title_area_meta_container,
	'args'          => array(
		'col_width' => 6
	)
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_subtitle_color_meta',
		'type'        => 'color',
		'label'       => esc_html__('Subtitle Color', 'medigroup'),
		'description' => esc_html__('Choose a color for subtitle text', 'medigroup'),
		'parent'      => $show_title_area_meta_container
	)
);