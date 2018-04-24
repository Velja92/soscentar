<?php

/*** Video Post Format ***/

$video_post_format_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('post'),
		'title' => esc_html__('Video Post Format', 'medigroup'),
		'name'  => 'post_format_video_meta'
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_video_type_meta',
		'type'          => 'select',
		'label'         => esc_html__('Video Type', 'medigroup'),
		'description'   => esc_html__('Choose video type', 'medigroup'),
		'parent'        => $video_post_format_meta_box,
		'default_value' => 'youtube',
		'options'       => array(
			'youtube' => esc_html__('Youtube', 'medigroup'),
			'vimeo'   => esc_html__('Vimeo', 'medigroup'),
			'self'    => esc_html__('Self Hosted', 'medigroup')
		),
		'args'          => array(
			'dependence' => true,
			'hide'       => array(
				'youtube' => '#mkd_mkd_video_self_hosted_container',
				'vimeo'   => '#mkd_mkd_video_self_hosted_container',
				'self'    => '#mkd_mkd_video_embedded_container'
			),
			'show'       => array(
				'youtube' => '#mkd_mkd_video_embedded_container',
				'vimeo'   => '#mkd_mkd_video_embedded_container',
				'self'    => '#mkd_mkd_video_self_hosted_container'
			)
		)
	)
);

$mkd_video_embedded_container = medigroup_mikado_add_admin_container(
	array(
		'parent'          => $video_post_format_meta_box,
		'name'            => 'mkd_video_embedded_container',
		'hidden_property' => 'mkd_video_type_meta',
		'hidden_value'    => 'self'
	)
);

$mkd_video_self_hosted_container = medigroup_mikado_add_admin_container(
	array(
		'parent'          => $video_post_format_meta_box,
		'name'            => 'mkd_video_self_hosted_container',
		'hidden_property' => 'mkd_video_type_meta',
		'hidden_values'   => array('youtube', 'vimeo')
	)
);


medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_post_video_id_meta',
		'type'        => 'text',
		'label'       => esc_html__('Video ID', 'medigroup'),
		'description' => esc_html__('Enter Video ID', 'medigroup'),
		'parent'      => $mkd_video_embedded_container,

	)
);


medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_post_video_image_meta',
		'type'        => 'image',
		'label'       => esc_html__('Video Image', 'medigroup'),
		'description' => esc_html__('Upload video image', 'medigroup'),
		'parent'      => $mkd_video_self_hosted_container,

	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_post_video_webm_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Video WEBM', 'medigroup'),
		'description' => esc_html__('Enter video URL for WEBM format', 'medigroup'),
		'parent'      => $mkd_video_self_hosted_container,

	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_post_video_mp4_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Video MP4', 'medigroup'),
		'description' => esc_html__('Enter video URL for MP4 format', 'medigroup'),
		'parent'      => $mkd_video_self_hosted_container,

	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_post_video_ogv_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Video OGV', 'medigroup'),
		'description' => esc_html__('Enter video URL for OGV format', 'medigroup'),
		'parent'      => $mkd_video_self_hosted_container,

	)
);