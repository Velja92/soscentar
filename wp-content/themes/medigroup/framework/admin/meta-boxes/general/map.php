<?php

$general_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('page', 'portfolio-item', 'doctor', 'post'),
		'title' => esc_html__('General', 'medigroup'),
		'name'  => 'general_meta'
	)
);


medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_page_background_color_meta',
		'type'          => 'color',
		'default_value' => '',
		'label'         => esc_html__('Page Background Color', 'medigroup'),
		'description'   => esc_html__('Choose background color for page content', 'medigroup'),
		'parent'        => $general_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_page_padding_meta',
		'type'          => 'text',
		'default_value' => '',
		'label'         => esc_html__('Page Padding', 'medigroup'),
		'description'   => esc_html__('Insert padding in format 10px 10px 10px 10px', 'medigroup'),
		'parent'        => $general_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_page_content_behind_header_meta',
		'type'          => 'yesno',
		'default_value' => 'no',
		'label'         => esc_html__('Always put content behind header', 'medigroup'),
		'description'   => esc_html__('Enabling this option will put page content behind page header', 'medigroup'),
		'parent'        => $general_meta_box,
		'args'          => array(
			'suffix' => 'px'
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_page_slider_meta',
		'type'          => 'text',
		'default_value' => '',
		'label'         => esc_html__('Slider Shortcode', 'medigroup'),
		'description'   => esc_html__('Paste your slider shortcode here', 'medigroup'),
		'parent'        => $general_meta_box
	)
);

if(medigroup_mikado_options()->getOptionValue('smooth_pt_true_ajax') === 'yes') {
	medigroup_mikado_add_meta_box_field(
		array(
			'name'          => 'mkd_page_transition_type',
			'type'          => 'selectblank',
			'label'         => esc_html__('Page Transition', 'medigroup'),
			'description'   => esc_html__('Choose the type of transition to this page', 'medigroup'),
			'parent'        => $general_meta_box,
			'default_value' => '',
			'options'       => array(
				'no-animation' => esc_html__('No animation', 'medigroup'),
				'fade'         => esc_html__('Fade', 'medigroup')
			)
		)
	);
}

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_page_comments_meta',
		'type'        => 'selectblank',
		'label'       => esc_html__('Show Comments', 'medigroup'),
		'description' => esc_html__('Enabling this option will show comments on your page', 'medigroup'),
		'parent'      => $general_meta_box,
		'default_value' => 'yes',
		'options'     => array(
			'yes' => esc_html__('Yes', 'medigroup'),
			'no'  => esc_html__('No', 'medigroup')
		)
	)
);