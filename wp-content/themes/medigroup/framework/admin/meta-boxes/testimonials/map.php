<?php

//Testimonials

$testimonial_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('testimonials'),
		'title' => esc_html__('Testimonial', 'medigroup'),
		'name'  => 'testimonial_meta'
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_testimonial_title',
		'type'        => 'text',
		'label'       => esc_html__('Title', 'medigroup'),
		'description' => esc_html__('Enter testimonial title', 'medigroup'),
		'parent'      => $testimonial_meta_box,
	)
);


medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_testimonial_author',
		'type'        => 'text',
		'label'       => esc_html__('Author', 'medigroup'),
		'description' => esc_html__('Enter author name', 'medigroup'),
		'parent'      => $testimonial_meta_box,
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_testimonial_author_position',
		'type'        => 'text',
		'label'       => esc_html__('Job Position', 'medigroup'),
		'description' => esc_html__('Enter job position', 'medigroup'),
		'parent'      => $testimonial_meta_box,
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_testimonial_text',
		'type'        => 'text',
		'label'       => esc_html__('Text', 'medigroup'),
		'description' => esc_html__('Enter testimonial text', 'medigroup'),
		'parent'      => $testimonial_meta_box,
	)
);