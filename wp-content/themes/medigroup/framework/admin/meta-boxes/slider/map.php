<?php

//Slider

$slider_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('slides'),
		'title' => esc_html__('Slide Background Type', 'medigroup'),
		'name'  => 'slides_type'
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_background_type',
		'type'          => 'imagevideo',
		'default_value' => 'image',
		'label'         => esc_html__('Slide Background Type', 'medigroup'),
		'description'   => esc_html__('Do you want to upload an image or video?', 'medigroup'),
		'parent'        => $slider_meta_box,
		'args'          => array(
			"dependence"             => true,
			"dependence_hide_on_yes" => "#mkd-meta-box-mkd_slides_video_settings",
			"dependence_show_on_yes" => "#mkd-meta-box-mkd_slides_image_settings"
		)
	)
);


//Slide Image

$slider_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope'           => array('slides'),
		'title'           => esc_html__('Slide Background Image', 'medigroup'),
		'name'            => 'mkd_slides_image_settings',
		'hidden_property' => 'mkd_slide_background_type',
		'hidden_values'   => array('video')
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_image',
		'type'        => 'image',
		'label'       => esc_html__('Slide Image', 'medigroup'),
		'description' => esc_html__('Choose background image', 'medigroup'),
		'parent'      => $slider_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_overlay_image',
		'type'        => 'image',
		'label'       => esc_html__('Overlay Image', 'medigroup'),
		'description' => esc_html__('Choose overlay image (pattern) for background image', 'medigroup'),
		'parent'      => $slider_meta_box
	)
);


//Slide Video

$video_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope'           => array('slides'),
		'title'           => esc_html__('Slide Background Video', 'medigroup'),
		'name'            => 'mkd_slides_video_settings',
		'hidden_property' => 'mkd_slide_background_type',
		'hidden_values'   => array('image')
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_video_webm',
		'type'        => 'text',
		'label'       => esc_html__('Video - webm', 'medigroup'),
		'description' => esc_html__('Path to the webm file that you have previously uploaded in Media Section', 'medigroup'),
		'parent'      => $video_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_video_mp4',
		'type'        => 'text',
		'label'       => esc_html__('Video - mp4', 'medigroup'),
		'description' => esc_html__('Path to the mp4 file that you have previously uploaded in Media Section', 'medigroup'),
		'parent'      => $video_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_video_ogv',
		'type'        => 'text',
		'label'       => esc_html__('Video - ogv', 'medigroup'),
		'description' => esc_html__('Path to the ogv file that you have previously uploaded in Media Section', 'medigroup'),
		'parent'      => $video_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_video_image',
		'type'        => 'image',
		'label'       => esc_html__('Video Preview Image', 'medigroup'),
		'description' => esc_html__('Choose background image that will be visible until video is loaded. This image will be shown on touch devices too.', 'medigroup'),
		'parent'      => $video_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_video_overlay',
		'type'          => 'yesempty',
		'default_value' => '',
		'label'         => esc_html__('Video Overlay Image', 'medigroup'),
		'description'   => esc_html__('Do you want to have a overlay image on video?', 'medigroup'),
		'parent'        => $video_meta_box,
		'args'          => array(
			"dependence"             => true,
			"dependence_hide_on_yes" => "",
			"dependence_show_on_yes" => "#mkd_mkd_slide_video_overlay_container"
		)
	)
);

$slide_video_overlay_container = medigroup_mikado_add_admin_container(array(
	'name'            => 'mkd_slide_video_overlay_container',
	'parent'          => $video_meta_box,
	'hidden_property' => 'mkd_slide_video_overlay',
	'hidden_values'   => array('', 'no')
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_video_overlay_image',
		'type'        => 'image',
		'label'       => esc_html__('Overlay Image', 'medigroup'),
		'description' => esc_html__('Choose overlay image (pattern) for background video.', 'medigroup'),
		'parent'      => $slide_video_overlay_container
	)
);


//Slide General

$general_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('slides'),
		'title' => esc_html__('Slide General', 'medigroup'),
		'name'  => 'mkd_slides_general_settings'
	)
);

medigroup_mikado_add_admin_section_title(
	array(
		'parent' => $general_meta_box,
		'name'   => 'mkd_text_content_title',
		'title'  => esc_html__('Slide Text Content', 'medigroup')
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_hide_title',
		'type'          => 'yesno',
		'default_value' => 'no',
		'label'         => esc_html__('Hide Slide Title', 'medigroup'),
		'description'   => esc_html__('Do you want to hide slide title?', 'medigroup'),
		'parent'        => $general_meta_box,
		'args'          => array(
			"dependence"             => true,
			"dependence_hide_on_yes" => "#mkd_mkd_slide_hide_title_container, #mkd-meta-box-mkd_slides_title",
			"dependence_show_on_yes" => ""
		)
	)
);

$slide_hide_title_container = medigroup_mikado_add_admin_container(array(
	'name'            => 'mkd_slide_hide_title_container',
	'parent'          => $general_meta_box,
	'hidden_property' => 'mkd_slide_hide_title',
	'hidden_value'    => 'yes'
));

$group_title_link = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Title Link', 'medigroup'),
	'name'        => 'group_title_link',
	'description' => esc_html__('Define styles for title', 'medigroup'),
	'parent'      => $slide_hide_title_container
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $group_title_link
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_link',
		'type'   => 'textsimple',
		'label'  => esc_html__('Link', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $row1,
		'type'          => 'selectsimple',
		'name'          => 'mkd_slide_title_target',
		'default_value' => '_self',
		'label'         => esc_html__('Target', 'medigroup'),
		'options'       => array(
			"_self"  => esc_html__("Self", 'medigroup'),
			"_blank" => esc_html__("Blank", 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_subtitle',
		'type'        => 'text',
		'label'       => esc_html__('Subtitle Text', 'medigroup'),
		'description' => esc_html__('Enter text for subtitle', 'medigroup'),
		'parent'      => $general_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_text',
		'type'        => 'text',
		'label'       => esc_html__('Body Text', 'medigroup'),
		'description' => esc_html__('Enter slide body text', 'medigroup'),
		'parent'      => $general_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_button_label',
		'type'        => 'text',
		'label'       => esc_html__('Button 1 Text', 'medigroup'),
		'description' => esc_html__('Enter text to be displayed on button 1', 'medigroup'),
		'parent'      => $general_meta_box
	)
);

$group_button1 = medigroup_mikado_add_admin_group(array(
	'title'  => esc_html__('Button 1 Link', 'medigroup'),
	'name'   => 'group_button1',
	'parent' => $general_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $group_button1
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_button_link',
		'type'          => 'textsimple',
		'label'         => esc_html__('Link', 'medigroup'),
		'default_value' => '',
		'parent'        => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $row1,
		'type'          => 'selectsimple',
		'name'          => 'mkd_slide_button_target',
		'default_value' => '_self',
		'label'         => esc_html__('Target', 'medigroup'),
		'options'       => array(
			"_self"  => esc_html__("Self", 'medigroup'),
			"_blank" => esc_html__("Blank", 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_button_label2',
		'type'        => 'text',
		'label'       => esc_html__('Button 2 Text', 'medigroup'),
		'description' => esc_html__('Enter text to be displayed on button 2', 'medigroup'),
		'parent'      => $general_meta_box
	)
);

$group_button2 = medigroup_mikado_add_admin_group(array(
	'title'  => esc_html__('Button 2 Link', 'medigroup'),
	'name'   => 'group_button2',
	'parent' => $general_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $group_button2
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_button_link2',
		'type'          => 'textsimple',
		'default_value' => '',
		'label'         => esc_html__('Link', 'medigroup'),
		'parent'        => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $row1,
		'type'          => 'selectsimple',
		'name'          => 'mkd_slide_button_target2',
		'default_value' => '_self',
		'label'         => esc_html__('Target', 'medigroup'),
		'options'       => array(
			"_self"  => esc_html__("Self", 'medigroup'),
			"_blank" => esc_html__("Blank", 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_text_content_top_margin',
		'type'        => 'text',
		'label'       => esc_html__('Text Content Top Margin', 'medigroup'),
		'description' => esc_html__('Enter top margin for text content', 'medigroup'),
		'parent'      => $general_meta_box,
		'args'        => array(
			'col_width' => 2,
			'suffix'    => 'px'
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_text_content_bottom_margin',
		'type'        => 'text',
		'label'       => esc_html__('Text Content Bottom Margin', 'medigroup'),
		'description' => esc_html__('Enter bottom margin for text content', 'medigroup'),
		'parent'      => $general_meta_box,
		'args'        => array(
			'col_width' => 2,
			'suffix'    => 'px'
		)
	)
);

medigroup_mikado_add_admin_section_title(
	array(
		'parent' => $general_meta_box,
		'name'   => 'mkd_graphic_title',
		'title'  => esc_html__('Slide Graphic', 'medigroup')
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_thumbnail',
		'type'        => 'image',
		'label'       => esc_html__('Slide Graphic', 'medigroup'),
		'description' => esc_html__('Choose slide graphic', 'medigroup'),
		'parent'      => $general_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_thumbnail_link',
		'type'        => 'text',
		'label'       => esc_html__('Graphic Link', 'medigroup'),
		'description' => esc_html__('Enter URL to link slide graphic', 'medigroup'),
		'parent'      => $general_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_graphic_top_padding',
		'type'        => 'text',
		'label'       => esc_html__('Graphic Top Padding', 'medigroup'),
		'description' => esc_html__('Enter top padding for slide graphic', 'medigroup'),
		'parent'      => $general_meta_box,
		'args'        => array(
			'col_width' => 2,
			'suffix'    => 'px'
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_graphic_bottom_padding',
		'type'        => 'text',
		'label'       => esc_html__('Graphic Bottom Padding', 'medigroup'),
		'description' => esc_html__('Enter bottom padding for slide graphic', 'medigroup'),
		'parent'      => $general_meta_box,
		'args'        => array(
			'col_width' => 2,
			'suffix'    => 'px'
		)
	)
);

medigroup_mikado_add_admin_section_title(
	array(
		'parent' => $general_meta_box,
		'name'   => 'mkd_general_styling_title',
		'title'  => esc_html__('General Styling', 'medigroup')
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $general_meta_box,
		'type'          => 'selectblank',
		'name'          => 'mkd_slide_header_style',
		'default_value' => '',
		'label'         => esc_html__('Header Style', 'medigroup'),
		'description'   => esc_html__('Header style will be applied when this slide is in focus', 'medigroup'),
		'options'       => array(
			"light" => esc_html__("Light", 'medigroup'),
			"dark"  => esc_html__("Dark", 'medigroup')
		)
	)
);

//Slide Behaviour

$behaviours_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('slides'),
		'title' => esc_html__('Slide Behaviours', 'medigroup'),
		'name'  => 'mkd_slides_behaviour_settings'
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_scroll_to_section',
		'type'        => 'text',
		'label'       => esc_html__('Scroll to Section', 'medigroup'),
		'description' => esc_html__('An arrow will appear to take viewers to the next section of the page. Enter the section anchor here, for example, \'#contact\'', 'medigroup'),
		'parent'      => $behaviours_meta_box
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_scroll_to_section_position',
		'type'        => 'select',
		'label'       => esc_html__('Scroll to Section Icon Position', 'medigroup'),
		'description' => esc_html__('Choose position for anchor icon - scroll to section', 'medigroup'),
		'parent'      => $behaviours_meta_box,
		'options'     => array(
			"in_content"       => esc_html__("In Text Content", 'medigroup'),
			"bottom_of_slider" => esc_html__("Bottom of the slide", 'medigroup')
		)
	)
);

medigroup_mikado_add_admin_section_title(
	array(
		'parent' => $behaviours_meta_box,
		'name'   => 'mkd_image_animation_title',
		'title'  => esc_html__('Slide Image Animation', 'medigroup')
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_enable_image_animation',
		'type'          => 'yesno',
		'default_value' => 'no',
		'label'         => esc_html__('Enable Image Animation', 'medigroup'),
		'description'   => esc_html__('Enabling this option will turn on a motion animation on the slide image', 'medigroup'),
		'parent'        => $behaviours_meta_box,
		'args'          => array(
			"dependence"             => true,
			"dependence_hide_on_yes" => "",
			"dependence_show_on_yes" => "#mkd_mkd_enable_image_animation_container"
		)
	)
);

$enable_image_animation_container = medigroup_mikado_add_admin_container(array(
	'name'            => 'mkd_enable_image_animation_container',
	'parent'          => $behaviours_meta_box,
	'hidden_property' => 'mkd_enable_image_animation',
	'hidden_value'    => 'no'
));

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $enable_image_animation_container,
		'type'          => 'select',
		'name'          => 'mkd_enable_image_animation_type',
		'default_value' => 'zoom_center',
		'label'         => esc_html__('Animation Type', 'medigroup'),
		'options'       => array(
			"zoom_center"       => esc_html__("Zoom In Center", 'medigroup'),
			"zoom_top_left"     => esc_html__("Zoom In to Top Left", 'medigroup'),
			"zoom_top_right"    => esc_html__("Zoom In to Top Right", 'medigroup'),
			"zoom_bottom_left"  => esc_html__("Zoom In to Bottom Left", 'medigroup'),
			"zoom_bottom_right" => esc_html__("Zoom In to Bottom Right", 'medigroup')
		)
	)
);

medigroup_mikado_add_admin_section_title(
	array(
		'parent' => $behaviours_meta_box,
		'name'   => 'mkd_content_animation_title',
		'title'  => esc_html__('Slide Content Entry Animations', 'medigroup')
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $behaviours_meta_box,
		'type'          => 'select',
		'name'          => 'mkd_slide_thumbnail_animation',
		'default_value' => 'flip',
		'label'         => esc_html__('Graphic Entry Animation', 'medigroup'),
		'description'   => esc_html__('Choose entry animation for graphic', 'medigroup'),
		'options'       => array(
			"flip"              => esc_html__("Flip", 'medigroup'),
			"fade"              => esc_html__("Fade In", 'medigroup'),
			"from_bottom"       => esc_html__("From Bottom", 'medigroup'),
			"from_top"          => esc_html__("From Top", 'medigroup'),
			"from_left"         => esc_html__("From Left", 'medigroup'),
			"from_right"        => esc_html__("From Right", 'medigroup'),
			"clip_anim_hor"     => esc_html__("Clip Animation Horizontal", 'medigroup'),
			"clip_anim_ver"     => esc_html__("Clip Animation Vertical", 'medigroup'),
			"clip_anim_puzzle"  => esc_html__("Clip Animation Puzzle", 'medigroup'),
			"without_animation" => esc_html__("No Animation", 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $behaviours_meta_box,
		'type'          => 'select',
		'name'          => 'mkd_slide_content_animation',
		'default_value' => 'all_at_once',
		'label'         => esc_html__('Content Entry Animation', 'medigroup'),
		'description'   => esc_html__('Choose entry animation for whole slide content group (title, subtitle, text, button)', 'medigroup'),
		'options'       => array(
			"all_at_once"       => esc_html__("All At Once", 'medigroup'),
			"one_by_one"        => esc_html__("One By One", 'medigroup'),
			"without_animation" => esc_html__("No Animation", 'medigroup')
		),
		'args'          => array(
			"dependence" => true,
			"hide"       => array(
				"all_at_once"       => "",
				"one_by_one"        => "",
				"without_animation" => "#mkd_mkd_slide_content_animation_container"
			),
			"show"       => array(
				"all_at_once"       => "#mkd_mkd_slide_content_animation_container",
				"one_by_one"        => "#mkd_mkd_slide_content_animation_container",
				"without_animation" => ""
			)
		)
	)
);

$slide_content_animation_container = medigroup_mikado_add_admin_container(array(
	'name'            => 'mkd_slide_content_animation_container',
	'parent'          => $behaviours_meta_box,
	'hidden_property' => 'mkd_slide_content_animation',
	'hidden_value'    => 'without_animation'
));

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $slide_content_animation_container,
		'type'          => 'select',
		'name'          => 'mkd_slide_content_animation_direction',
		'default_value' => 'from_bottom',
		'label'         => esc_html__('Animation Direction', 'medigroup'),
		'options'       => array(
			"from_bottom" => esc_html__("From Bottom", 'medigroup'),
			"from_top"    => esc_html__("From Top", 'medigroup'),
			"from_left"   => esc_html__("From Left", 'medigroup'),
			"from_right"  => esc_html__("From Right", 'medigroup'),
			"fade"        => esc_html__("Fade In", 'medigroup')
		)
	)
);

//Slide Title Styles

$title_style_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope'           => array('slides'),
		'title'           => esc_html__('Slide Title Style', 'medigroup'),
		'name'            => 'mkd_slides_title',
		'hidden_property' => 'mkd_slide_hide_title',
		'hidden_values'   => array('yes')
	)
);

$title_text_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Title Text Style', 'medigroup'),
	'description' => esc_html__('Define styles for title text', 'medigroup'),
	'name'        => 'mkd_title_text_group',
	'parent'      => $title_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $title_text_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Font Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_font_size',
		'type'   => 'textsimple',
		'label'  => esc_html__('Font Size (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_line_height',
		'type'   => 'textsimple',
		'label'  => esc_html__('Line Height (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_letter_spacing',
		'type'   => 'textsimple',
		'label'  => esc_html__('Letter Spacing (px)', 'medigroup'),
		'parent' => $row1
	)
);

$row2 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row2',
	'parent' => $title_text_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_font_family',
		'type'   => 'fontsimple',
		'label'  => esc_html__('Font Family', 'medigroup'),
		'parent' => $row2
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_title_font_style',
		'type'    => 'selectblanksimple',
		'label'   => esc_html__('Font Style', 'medigroup'),
		'parent'  => $row2,
		'options' => $medigroup_options_fontstyle
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_title_font_weight',
		'type'    => 'selectblanksimple',
		'label'   => esc_html__('Font Weight', 'medigroup'),
		'parent'  => $row2,
		'options' => $medigroup_options_fontweight
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_title_text_transform',
		'type'    => 'selectblanksimple',
		'label'   => esc_html__('Text Transform', 'medigroup'),
		'parent'  => $row2,
		'options' => $medigroup_options_texttransform
	)
);

$title_background_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Background', 'medigroup'),
	'description' => esc_html__('Define background for title', 'medigroup'),
	'name'        => 'mkd_title_background_group',
	'parent'      => $title_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $title_background_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_background_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Background Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_bg_color_transparency',
		'type'   => 'textsimple',
		'label'  => esc_html__('Background Color Transparency (values 0-1)', 'medigroup'),
		'parent' => $row1
	)
);

$title_margin_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Margin Bottom (px)', 'medigroup'),
	'description' => esc_html__('Enter value for title bottom margin (default value is 14)', 'medigroup'),
	'name'        => 'mkd_title_margin_group',
	'parent'      => $title_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $title_margin_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_margin_bottom',
		'type'   => 'textsimple',
		'label'  => '',
		'parent' => $row1
	)
);

$title_padding_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Padding', 'medigroup'),
	'description' => esc_html__('Define padding for title', 'medigroup'),
	'name'        => 'mkd_title_padding_group',
	'parent'      => $title_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $title_padding_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_padding_top',
		'type'   => 'textsimple',
		'label'  => esc_html__('Top Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_padding_right',
		'type'   => 'textsimple',
		'label'  => esc_html__('Right Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_padding_bottom',
		'type'   => 'textsimple',
		'label'  => esc_html__('Bottom Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_padding_left',
		'type'   => 'textsimple',
		'label'  => esc_html__('Left Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

$slide_title_border = medigroup_mikado_add_meta_box_field(array(
	'label'         => esc_html__('Border', 'medigroup'),
	'description'   => esc_html__('Do you want to have a title border?', 'medigroup'),
	'name'          => 'mkd_slide_title_border',
	'type'          => 'yesno',
	'default_value' => 'no',
	'parent'        => $title_style_meta_box,
	'args'          => array(
		'dependence'             => true,
		'dependence_hide_on_yes' => '',
		'dependence_show_on_yes' => '#mkd_mkd_title_border_container'
	)
));

$title_border_container = medigroup_mikado_add_admin_container(array(
	'name'            => 'mkd_title_border_container',
	'parent'          => $title_style_meta_box,
	'hidden_property' => 'mkd_slide_title_border',
	'hidden_value'    => 'no'
));

$title_border_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Title Border', 'medigroup'),
	'description' => esc_html__('Define border for title', 'medigroup'),
	'name'        => 'mkd_title_border_group',
	'parent'      => $title_border_container
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $title_border_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_title_border_thickness',
		'type'   => 'textsimple',
		'label'  => esc_html__('Thickness (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_title_border_style',
		'type'    => 'selectsimple',
		'label'   => esc_html__('Style', 'medigroup'),
		'parent'  => $row1,
		'options' => array(
			"solid"  => "solid",
			"dashed" => "dashed",
			"dotted" => "dotted",
			"double" => "double",
			"groove" => "groove",
			"ridge"  => "ridge",
			"inset"  => "inset",
			"outset" => "outset"
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slider_title_border_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Color', 'medigroup'),
		'parent' => $row1
	)
);

//Slide Subtitle Styles

$subtitle_style_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('slides'),
		'title' => esc_html__('Slide Subtitle Style', 'medigroup'),
		'name'  => 'mkd_slides_subtitle'
	)
);

$subtitle_text_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Subtitle Text Style', 'medigroup'),
	'description' => esc_html__('Define styles for subtitle text', 'medigroup'),
	'name'        => 'mkd_subtitle_text_group',
	'parent'      => $subtitle_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $subtitle_text_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Font Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_font_size',
		'type'   => 'textsimple',
		'label'  => esc_html__('Font Size (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_line_height',
		'type'   => 'textsimple',
		'label'  => esc_html__('Line Height (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_letter_spacing',
		'type'   => 'textsimple',
		'label'  => esc_html__('Letter Spacing (px)', 'medigroup'),
		'parent' => $row1
	)
);

$row2 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row2',
	'parent' => $subtitle_text_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_font_family',
		'type'   => 'fontsimple',
		'label'  => esc_html__('Font Family', 'medigroup'),
		'parent' => $row2
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_subtitle_font_style',
		'type'    => 'selectblanksimple',
		'label'   => esc_html__('Font Style', 'medigroup'),
		'parent'  => $row2,
		'options' => $medigroup_options_fontstyle
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_subtitle_font_weight',
		'type'    => 'selectblanksimple',
		'label'   => esc_html__('Font Weight', 'medigroup'),
		'parent'  => $row2,
		'options' => $medigroup_options_fontweight
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_subtitle_text_transform',
		'type'    => 'selectblanksimple',
		'label'   => esc_html__('Text Transform', 'medigroup'),
		'parent'  => $row2,
		'options' => $medigroup_options_texttransform
	)
);

$subtitle_background_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Background', 'medigroup'),
	'description' => esc_html__('Define background for subtitle', 'medigroup'),
	'name'        => 'mkd_subtitle_background_group',
	'parent'      => $subtitle_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $subtitle_background_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_background_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Background Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_bg_color_transparency',
		'type'   => 'textsimple',
		'label'  => esc_html__('Background Color Transparency (values 0-1)', 'medigroup'),
		'parent' => $row1
	)
);

$subtitle_margin_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Margin Bottom (px)', 'medigroup'),
	'description' => esc_html__('Enter value for subtitle bottom margin (default value is 14)', 'medigroup'),
	'name'        => 'mkd_subtitle_margin_group',
	'parent'      => $subtitle_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $subtitle_margin_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_margin_bottom',
		'type'   => 'textsimple',
		'label'  => '',
		'parent' => $row1
	)
);

$subtitle_padding_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Padding', 'medigroup'),
	'description' => esc_html__('Define padding for subtitle', 'medigroup'),
	'name'        => 'mkd_subtitle_padding_group',
	'parent'      => $subtitle_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $subtitle_padding_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_padding_top',
		'type'   => 'textsimple',
		'label'  => esc_html__('Top Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_padding_right',
		'type'   => 'textsimple',
		'label'  => esc_html__('Right Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_padding_bottom',
		'type'   => 'textsimple',
		'label'  => esc_html__('Bottom Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_subtitle_padding_left',
		'type'   => 'textsimple',
		'label'  => esc_html__('Left Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

//Slide Text Styles

$text_style_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('slides'),
		'title' => esc_html__('Slide Text Style', 'medigroup'),
		'name'  => 'mkd_slides_text'
	)
);

$text_common_text_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Text Color and Size', 'medigroup'),
	'description' => esc_html__('Define text color and size', 'medigroup'),
	'name'        => 'mkd_text_common_text_group',
	'parent'      => $text_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $text_common_text_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Font Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_font_size',
		'type'   => 'textsimple',
		'label'  => esc_html__('Font Size (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_line_height',
		'type'   => 'textsimple',
		'label'  => esc_html__('Line Height (px)', 'medigroup'),
		'parent' => $row1
	)
);

$text_without_separator_padding_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Padding', 'medigroup'),
	'description' => esc_html__('Define padding for text', 'medigroup'),
	'name'        => 'mkd_text_without_separator_padding_group',
	'parent'      => $text_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $text_without_separator_padding_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_padding_top',
		'type'   => 'textsimple',
		'label'  => esc_html__('Top Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_padding_right',
		'type'   => 'textsimple',
		'label'  => esc_html__('Right Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_padding_bottom',
		'type'   => 'textsimple',
		'label'  => esc_html__('Bottom Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_padding_left',
		'type'   => 'textsimple',
		'label'  => esc_html__('Left Padding (px)', 'medigroup'),
		'parent' => $row1
	)
);

$text_without_separator_text_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Text Style', 'medigroup'),
	'description' => esc_html__('Define styles for slide text', 'medigroup'),
	'name'        => 'mkd_text_without_separator_text_group',
	'parent'      => $text_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $text_without_separator_text_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_letter_spacing',
		'type'   => 'textsimple',
		'label'  => esc_html__('Letter Spacing (px)', 'medigroup'),
		'parent' => $row1
	)
);

$row2 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row2',
	'parent' => $text_without_separator_text_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_font_family',
		'type'   => 'fontsimple',
		'label'  => esc_html__('Font Family', 'medigroup'),
		'parent' => $row2
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_text_font_style',
		'type'    => 'selectblanksimple',
		'label'   => esc_html__('Font Style', 'medigroup'),
		'parent'  => $row2,
		'options' => $medigroup_options_fontstyle
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_text_font_weight',
		'type'    => 'selectblanksimple',
		'label'   => esc_html__('Font Weight', 'medigroup'),
		'parent'  => $row2,
		'options' => $medigroup_options_fontweight
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_text_text_transform',
		'type'    => 'selectblanksimple',
		'label'   => esc_html__('Text Transform', 'medigroup'),
		'parent'  => $row2,
		'options' => $medigroup_options_texttransform
	)
);

$text_without_separator_background_group = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Background', 'medigroup'),
	'description' => esc_html__('Define background for text', 'medigroup'),
	'name'        => 'mkd_text_without_separator_background_group',
	'parent'      => $text_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $text_without_separator_background_group
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_background_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Background Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_bg_color_transparency',
		'type'   => 'textsimple',
		'label'  => esc_html__('Background Color Transparency (values 0-1)', 'medigroup'),
		'parent' => $row1
	)
);

//Slide Buttons Styles

$buttons_style_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('slides'),
		'title' => esc_html__('Slide Buttons Style', 'medigroup'),
		'name'  => 'mkd_slides_buttons'
	)
);

medigroup_mikado_add_admin_section_title(
	array(
		'parent' => $buttons_style_meta_box,
		'name'   => 'mkd_button_1_styling_title',
		'title'  => esc_html__('Button 1', 'medigroup')
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_button_size',
		'type'          => 'selectblank',
		'parent'        => $buttons_style_meta_box,
		'label'         => esc_html__('Size', 'medigroup'),
		'description'   => esc_html__('Choose button size', 'medigroup'),
		'default_value' => '',
		'options'       => array(
			""                => esc_html__("Default", 'medigroup'),
			"small"           => esc_html__("Small", 'medigroup'),
			"medium"          => esc_html__("Medium", 'medigroup'),
			"large"           => esc_html__("Large", 'medigroup'),
			"huge"            => esc_html__("Extra Large", 'medigroup'),
			"huge-full-width" => esc_html__("Extra Large Full Width", 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_button_type',
		'type'          => 'selectblank',
		'parent'        => $buttons_style_meta_box,
		'label'         => esc_html__('Type', 'medigroup'),
		'description'   => esc_html__('Choose button type', 'medigroup'),
		'default_value' => '',
		'options'       => array(
			""        => esc_html__("Default", 'medigroup'),
			"outline" => esc_html__("Outline", 'medigroup'),
			"solid"   => esc_html__("Solid", 'medigroup')
		)
	)
);

$buttons_style_group_1 = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Text Style', 'medigroup'),
	'description' => esc_html__('Define text style', 'medigroup'),
	'name'        => 'mkd_buttons_style_group_1',
	'parent'      => $buttons_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $buttons_style_group_1
));

/*
medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_button_font_family',
		'type'        => 'fontsimple',
		'label'       => 'Font Family',
		'parent'      => $row1
	)
);
*/

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_font_size',
		'type'   => 'textsimple',
		'label'  => esc_html__('Text Size(px)', 'medigroup'),
		'parent' => $row1
	)
);

/*
medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_button_font_style',
		'type'        => 'selectblanksimple',
		'label'       => 'Font Style',
		'parent'      => $row1,
		'options'     => $medigroup_options_fontstyle
	)
);
*/

medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_button_font_weight',
		'type'    => 'selectblanksimple',
		'label'   => esc_html__('Font Weight', 'medigroup'),
		'parent'  => $row1,
		'options' => $medigroup_options_fontweight
	)
);
/*
$row2 = medigroup_mikado_add_admin_row(array(
	'name' => 'row2',
	'parent' => $buttons_style_group_1
));


	medigroup_mikado_add_meta_box_field(
		array(
			'name'        => 'mkd_slide_button_letter_spacing',
			'type'        => 'textsimple',
			'label'       => 'Letter Spacing(px)',
			'parent'      => $row2
		)
	);

	medigroup_mikado_add_meta_box_field(
		array(
			'name'        => 'mkd_slide_button_line_height',
			'type'        => 'textsimple',
			'label'       => 'Line Height (px)',
			'parent'      => $row2
		)
	);
	*/

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_text_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Text Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_text_hover_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Text Hover Color', 'medigroup'),
		'parent' => $row1
	)
);

/*
$row3 = medigroup_mikado_add_admin_row(array(
	'name' => 'row3',
	'parent' => $buttons_style_group_1
));

	medigroup_mikado_add_meta_box_field(
		array(
			'name'        => 'mkd_slide_button_text_align',
			'type'        => 'selectblanksimple',
			'label'       => 'Text Align',
			'parent'      => $row3,
			'options'     => array(
				"left" => "Left",
				"center" => "Center",
				"right" => "Right"
			)
		)
	);

	medigroup_mikado_add_meta_box_field(
		array(
			'name'        => 'mkd_slide_button_text_transform',
			'type'        => 'selectblanksimple',
			'label'       => 'Text Transform',
			'parent'      => $row3,
			'options'     => $medigroup_options_texttransform
		)
	);
*/

$buttons_style_group_2 = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Background', 'medigroup'),
	'description' => esc_html__('Define background', 'medigroup'),
	'name'        => 'mkd_buttons_style_group_2',
	'parent'      => $buttons_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $buttons_style_group_2
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_background_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Background Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_background_hover_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Background Hover Color', 'medigroup'),
		'parent' => $row1
	)
);

/*
$buttons_style_group_3 = medigroup_mikado_add_admin_group(array(
	'title' => 'Size',
	'description' => 'Define button size',
	'name' => 'mkd_buttons_style_group_3',
	'parent' => $buttons_style_meta_box
));
	$row1 = medigroup_mikado_add_admin_row(array(
		'name' => 'row1',
		'parent' => $buttons_style_group_3
	));

		medigroup_mikado_add_meta_box_field(
			array(
				'name'        => 'mkd_slide_button_width',
				'type'        => 'textsimple',
				'label'       => 'Width (px)',
				'parent'      => $row1
			)
		);

		medigroup_mikado_add_meta_box_field(
			array(
				'name'        => 'mkd_slide_button_height',
				'type'        => 'textsimple',
				'label'       => 'Height (px)',
				'parent'      => $row1
			)
		);
		*/

$buttons_style_group_4 = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Border', 'medigroup'),
	'description' => esc_html__('Define border style', 'medigroup'),
	'name'        => 'mkd_buttons_style_group_4',
	'parent'      => $buttons_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $buttons_style_group_4
));

/*
medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_button_border_width',
		'type'        => 'textsimple',
		'label'       => 'Border Width (px)',
		'parent'      => $row1
	)
);
medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_button_border_radius',
		'type'        => 'textsimple',
		'label'       => 'Border Radius (px)',
		'parent'      => $row1
	)
);
*/
medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_border_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Border Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_border_hover_color',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Border Hover Color', 'medigroup'),
		'parent' => $row1
	)
);

$buttons_style_group_5 = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Margin (px)', 'medigroup'),
	'description' => esc_html__('Please insert margin in format (top right bottom left) i.e. 5px 5px 5px 5px', 'medigroup'),
	'name'        => 'mkd_buttons_style_group_5',
	'parent'      => $buttons_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $buttons_style_group_5
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_margin1',
		'type'   => 'textsimple',
		'label'  => '',
		'parent' => $row1
	)
);
/*
$buttons_style_group_6 = medigroup_mikado_add_admin_group(array(
	'title' => 'Padding (px)',
	'description' => 'Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px',
	'name' => 'mkd_buttons_style_group_6',
	'parent' => $buttons_style_meta_box
));

	$row1 = medigroup_mikado_add_admin_row(array(
		'name' => 'row1',
		'parent' => $buttons_style_group_6
	));

		medigroup_mikado_add_meta_box_field(
			array(
				'name'        => 'mkd_slide_button_padding',
				'type'        => 'textsimple',
				'label'       => '',
				'parent'      => $row1
			)
		);
*/

/*
$buttons_style_group_7 = medigroup_mikado_add_admin_group(array(
	'title' => 'Button Hover Animation',
	'description' => 'Define hover animation for button',
	'name' => 'mkd_buttons_style_group_7',
	'parent' => $buttons_style_meta_box
));

	$row1 = medigroup_mikado_add_admin_row(array(
		'name' => 'row1',
		'parent' => $buttons_style_group_7
	));

		medigroup_mikado_add_meta_box_field(
			array(
				'name'        => 'mkd_slide_button1_hover_button_animation',
				'type'        => 'selectblanksimple',
				'label'       => 'Hover Animation',
				'parent'      => $row1,
				'options'     => array(
					"fill_from_top" => "Fill From Top",
					"fill_from_left" => "Fill From Left",
					"fill_from_bottom" => "Fill From Bottom"
				)
			)
		);
*/
//init icon pack hide and show array. It will be populated dinamically from collections array
$button1_icon_pack_hide_array = array();
$button1_icon_pack_show_array = array();

//do we have some collection added in collections array?
if(is_array($medigroup_IconCollections->iconCollections) && count($medigroup_IconCollections->iconCollections)) {
	//get collections params array. It will contain values of 'param' property for each collection
	$button1_icon_collections_params = $medigroup_IconCollections->getIconCollectionsParams();

	//foreach collection generate hide and show array
	foreach($medigroup_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
		$button1_icon_pack_hide_array[$dep_collection_key] = '';
		$button1_icon_pack_hide_array["no_icon"]           = "";

		//button1_icon_size is input that is always shown when some icon pack is activated and hidden if 'no_icon' is selected
		$button1_icon_pack_hide_array["no_icon"] .= "#mkd_slider_button1_icon_size,";

		//we need to include only current collection in show string as it is the only one that needs to show
		$button1_icon_pack_show_array[$dep_collection_key] = '#mkd_slider_button1_icon_size, #mkd_button1_icon_'.$dep_collection_object->param.'_container';

		//for all collections param generate hide string
		foreach($button1_icon_collections_params as $button1_icon_collections_param) {
			//we don't need to include current one, because it needs to be shown, not hidden
			if($button1_icon_collections_param !== $dep_collection_object->param) {
				$button1_icon_pack_hide_array[$dep_collection_key] .= '#mkd_button1_icon_'.$button1_icon_collections_param.'_container,';
			}

			$button1_icon_pack_hide_array["no_icon"] .= '#mkd_button1_icon_'.$button1_icon_collections_param.'_container,';
		}

		//remove remaining ',' character
		$button1_icon_pack_hide_array[$dep_collection_key] = rtrim($button1_icon_pack_hide_array[$dep_collection_key], ',');
		$button1_icon_pack_hide_array["no_icon"]           = rtrim($button1_icon_pack_hide_array["no_icon"], ',');
	}

}

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_button1_icon_pack',
		'type'          => 'select',
		'label'         => esc_html__('Button 1 Icon Pack', 'medigroup'),
		'description'   => esc_html__('Choose icon pack for the first button', 'medigroup'),
		'default_value' => 'no_icon',
		'parent'        => $buttons_style_meta_box,
		'options'       => $medigroup_IconCollections->getIconCollectionsEmpty("no_icon"),
		'args'          => array(
			"dependence" => true,
			"hide"       => $button1_icon_pack_hide_array,
			"show"       => $button1_icon_pack_show_array
		)
	)
);

//echo var_dump($button1_icon_pack_hide_array); die();

if(is_array($medigroup_IconCollections->iconCollections) && count($medigroup_IconCollections->iconCollections)) {
	//foreach icon collection we need to generate separate container that will have dependency set
	//it will have one field inside with icons dropdown
	foreach($medigroup_IconCollections->iconCollections as $collection_key => $collection_object) {
		$icons_array = $collection_object->getIconsArray();

		//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
		$icon_collections_keys = $medigroup_IconCollections->getIconCollectionsKeys();

		//unset current one, because it doesn't have to be included in dependency that hides icon container
		unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

		$button1_icon_hide_values   = $icon_collections_keys;
		$button1_icon_hide_values[] = "no_icon";
		$button1_icon_container     = medigroup_mikado_add_admin_container(array(
			'name'            => "button1_icon_".$collection_object->param."_container",
			'parent'          => $buttons_style_meta_box,
			'hidden_property' => 'mkd_button1_icon_pack',
			'hidden_value'    => '',
			'hidden_values'   => $button1_icon_hide_values
		));

		medigroup_mikado_add_meta_box_field(
			array(
				'name'    => "button1_icon_".$collection_object->param,
				'type'    => 'select',
				'label'   => esc_html__('Button 1 Icon', 'medigroup'),
				'parent'  => $button1_icon_container,
				'options' => $icons_array
			)
		);
	}

}
/*
medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'slider_button1_icon_size',
		'type'        => 'text',
		'label'       => 'Icon Size (px)',
		'description' => 'Define size for icon in button',
		'parent'      => $buttons_style_meta_box,
		'hidden_property' => 'mkd_button1_icon_pack',
		'hidden_values' => array('no_icon')
	)
);
*/


medigroup_mikado_add_admin_section_title(
	array(
		'parent' => $buttons_style_meta_box,
		'name'   => 'mkd_button_2_styling_title',
		'title'  => esc_html__('Button 2', 'medigroup')
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_button_size2',
		'type'          => 'selectblank',
		'parent'        => $buttons_style_meta_box,
		'label'         => esc_html__('Size', 'medigroup'),
		'description'   => esc_html__('Choose button size', 'medigroup'),
		'default_value' => '',
		'options'       => array(
			""                => esc_html__("Default", 'medigroup'),
			"small"           => esc_html__("Small", 'medigroup'),
			"medium"          => esc_html__("Medium", 'medigroup'),
			"large"           => esc_html__("Large", 'medigroup'),
			"huge"            => esc_html__("Extra Large", 'medigroup'),
			"huge-full-width" => esc_html__("Extra Large Full Width", 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_button_type2',
		'type'          => 'selectblank',
		'parent'        => $buttons_style_meta_box,
		'label'         => esc_html__('Type', 'medigroup'),
		'description'   => esc_html__('Choose button type', 'medigroup'),
		'default_value' => '',
		'options'       => array(
			""        => esc_html__("Default", 'medigroup'),
			"outline" => esc_html__("Outline", 'medigroup'),
			"solid"   => esc_html__("Solid", 'medigroup')
		)
	)
);

$buttons2_style_group_1 = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Text Style', 'medigroup'),
	'description' => esc_html__('Define text style', 'medigroup'),
	'name'        => 'mkd_buttons2_style_group_1',
	'parent'      => $buttons_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $buttons2_style_group_1
));
/*
medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_button_font_family2',
		'type'        => 'fontsimple',
		'label'       => 'Font Family',
		'parent'      => $row1
	)
);
*/
medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_font_size2',
		'type'   => 'textsimple',
		'label'  => esc_html__('Text Size(px)', 'medigroup'),
		'parent' => $row1
	)
);
/*
medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_button_font_style2',
		'type'        => 'selectblanksimple',
		'label'       => 'Font Style',
		'parent'      => $row1,
		'options'     => $medigroup_options_fontstyle
	)
);
*/
medigroup_mikado_add_meta_box_field(
	array(
		'name'    => 'mkd_slide_button_font_weight2',
		'type'    => 'selectblanksimple',
		'label'   => esc_html__('Font Weight', 'medigroup'),
		'parent'  => $row1,
		'options' => $medigroup_options_fontweight
	)
);
/*
$row2 = medigroup_mikado_add_admin_row(array(
	'name' => 'row2',
	'parent' => $buttons2_style_group_1
));

	medigroup_mikado_add_meta_box_field(
		array(
			'name'        => 'mkd_slide_button_letter_spacing2',
			'type'        => 'textsimple',
			'label'       => 'Letter Spacing(px)',
			'parent'      => $row2
		)
	);

	medigroup_mikado_add_meta_box_field(
		array(
			'name'        => 'mkd_slide_button_line_height2',
			'type'        => 'textsimple',
			'label'       => 'Line Height (px)',
			'parent'      => $row2
		)
	);
	*/
medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_text_color2',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Text Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_text_hover_color2',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Text Hover Color', 'medigroup'),
		'parent' => $row1
	)
);
/*
$row3 = medigroup_mikado_add_admin_row(array(
	'name' => 'row3',
	'parent' => $buttons2_style_group_1
));

	medigroup_mikado_add_meta_box_field(
		array(
			'name'        => 'mkd_slide_button_text_align2',
			'type'        => 'selectblanksimple',
			'label'       => 'Text Align',
			'parent'      => $row3,
			'options'     => array(
				"left" => "Left",
				"center" => "Center",
				"right" => "Right"
			)
		)
	);

	medigroup_mikado_add_meta_box_field(
		array(
			'name'        => 'mkd_slide_button_text_transform2',
			'type'        => 'selectblanksimple',
			'label'       => 'Text Transform',
			'parent'      => $row3,
			'options'     => $medigroup_options_texttransform
		)
	);
	*/
$buttons2_style_group_2 = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Background', 'medigroup'),
	'description' => esc_html__('Define background', 'medigroup'),
	'name'        => 'mkd_buttons2_style_group_2',
	'parent'      => $buttons_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $buttons2_style_group_2
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_background_color2',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Background Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_background_hover_color2',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Background Hover Color', 'medigroup'),
		'parent' => $row1
	)
);
/*
$buttons2_style_group_3 = medigroup_mikado_add_admin_group(array(
	'title' => 'Size',
	'description' => 'Define button size',
	'name' => 'mkd_buttons2_style_group_3',
	'parent' => $buttons_style_meta_box
));

	$row1 = medigroup_mikado_add_admin_row(array(
		'name' => 'row1',
		'parent' => $buttons2_style_group_3
	));

		medigroup_mikado_add_meta_box_field(
			array(
				'name'        => 'mkd_slide_button_width2',
				'type'        => 'textsimple',
				'label'       => 'Width (px)',
				'parent'      => $row1
			)
		);

		medigroup_mikado_add_meta_box_field(
			array(
				'name'        => 'mkd_slide_button_height2',
				'type'        => 'textsimple',
				'label'       => 'Height (px)',
				'parent'      => $row1
			)
		);
		*/

$buttons2_style_group_4 = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Border', 'medigroup'),
	'description' => esc_html__('Define border style', 'medigroup'),
	'name'        => 'mkd_buttons2_style_group_4',
	'parent'      => $buttons_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $buttons2_style_group_4
));

/*
medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_button_border_width2',
		'type'        => 'textsimple',
		'label'       => 'Border Width (px)',
		'parent'      => $row1
	)
);
medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_button_border_radius2',
		'type'        => 'textsimple',
		'label'       => 'Border Radius (px)',
		'parent'      => $row1
	)
);
*/

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_border_color2',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Border Color', 'medigroup'),
		'parent' => $row1
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_border_hover_color2',
		'type'   => 'colorsimple',
		'label'  => esc_html__('Border Hover Color', 'medigroup'),
		'parent' => $row1
	)
);

$buttons2_style_group_5 = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Margin (px)', 'medigroup'),
	'description' => esc_html__('Please insert margin in format (top right bottom left) i.e. 5px 5px 5px 5px', 'medigroup'),
	'name'        => 'mkd_buttons2_style_group_5',
	'parent'      => $buttons_style_meta_box
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $buttons2_style_group_5
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_button_margin2',
		'type'   => 'textsimple',
		'label'  => '',
		'parent' => $row1
	)
);

/*
$buttons2_style_group_6 = medigroup_mikado_add_admin_group(array(
	'title' => 'Padding (px)',
	'description' => 'Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px',
	'name' => 'mkd_buttons2_style_group_6',
	'parent' => $buttons_style_meta_box
));

	$row1 = medigroup_mikado_add_admin_row(array(
		'name' => 'row1',
		'parent' => $buttons2_style_group_6
	));

		medigroup_mikado_add_meta_box_field(
			array(
				'name'        => 'mkd_slide_button_padding2',
				'type'        => 'textsimple',
				'label'       => '',
				'parent'      => $row1
			)
		);

$buttons2_style_group_7 = medigroup_mikado_add_admin_group(array(
	'title' => 'Button Hover Animation',
	'description' => 'Define hover animation for button',
	'name' => 'mkd_buttons2_style_group_7',
	'parent' => $buttons_style_meta_box
));

	$row1 = medigroup_mikado_add_admin_row(array(
		'name' => 'row1',
		'parent' => $buttons2_style_group_7
	));

		medigroup_mikado_add_meta_box_field(
			array(
				'name'        => 'mkd_slide_button2_hover_button_animation',
				'type'        => 'selectblanksimple',
				'label'       => 'Hover Animation',
				'parent'      => $row1,
				'options'     => array(
					"fill_from_top" => "Fill From Top",
					"fill_from_left" => "Fill From Left",
					"fill_from_bottom" => "Fill From Bottom"
				)
			)
		);
		*/

//init icon pack hide and show array. It will be populated dinamically from collections array
$button2_icon_pack_hide_array = array();
$button2_icon_pack_show_array = array();

//do we have some collection added in collections array?
if(is_array($medigroup_IconCollections->iconCollections) && count($medigroup_IconCollections->iconCollections)) {
	//get collections params array. It will contain values of 'param' property for each collection
	$button2_icon_collections_params = $medigroup_IconCollections->getIconCollectionsParams();

	//foreach collection generate hide and show array
	foreach($medigroup_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
		$button2_icon_pack_hide_array[$dep_collection_key] = '';
		$button2_icon_pack_hide_array["no_icon"]           = "";

		//button2_icon_size is input that is always shown when some icon pack is activated and hidden if 'no_icon' is selected
		$button2_icon_pack_hide_array["no_icon"] .= "#mkd_slider_button2_icon_size,";

		//we need to include only current collection in show string as it is the only one that needs to show
		$button2_icon_pack_show_array[$dep_collection_key] = '#mkd_slider_button2_icon_size, #mkd_button2_icon_'.$dep_collection_object->param.'_container';

		//for all collections param generate hide string
		foreach($button2_icon_collections_params as $button2_icon_collections_param) {
			//we don't need to include current one, because it needs to be shown, not hidden
			if($button2_icon_collections_param !== $dep_collection_object->param) {
				$button2_icon_pack_hide_array[$dep_collection_key] .= '#mkd_button2_icon_'.$button2_icon_collections_param.'_container,';
			}

			$button2_icon_pack_hide_array["no_icon"] .= '#mkd_button2_icon_'.$button2_icon_collections_param.'_container,';
		}

		//remove remaining ',' character
		$button2_icon_pack_hide_array[$dep_collection_key] = rtrim($button2_icon_pack_hide_array[$dep_collection_key], ',');
		$button2_icon_pack_hide_array["no_icon"]           = rtrim($button2_icon_pack_hide_array["no_icon"], ',');
	}

}

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_button2_icon_pack',
		'type'          => 'select',
		'label'         => esc_html__('Button 2 Icon Pack', 'medigroup'),
		'description'   => esc_html__('Choose icon pack for the first button', 'medigroup'),
		'default_value' => 'no_icon',
		'parent'        => $buttons_style_meta_box,
		'options'       => $medigroup_IconCollections->getIconCollectionsEmpty("no_icon"),
		'args'          => array(
			"dependence" => true,
			"hide"       => $button2_icon_pack_hide_array,
			"show"       => $button2_icon_pack_show_array
		)
	)
);

//echo var_dump($button2_icon_pack_hide_array); die();

if(is_array($medigroup_IconCollections->iconCollections) && count($medigroup_IconCollections->iconCollections)) {
	//foreach icon collection we need to generate separate container that will have dependency set
	//it will have one field inside with icons dropdown
	foreach($medigroup_IconCollections->iconCollections as $collection_key => $collection_object) {
		$icons_array = $collection_object->getIconsArray();

		//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
		$icon_collections_keys = $medigroup_IconCollections->getIconCollectionsKeys();

		//unset current one, because it doesn't have to be included in dependency that hides icon container
		unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

		$button2_icon_hide_values   = $icon_collections_keys;
		$button2_icon_hide_values[] = "no_icon";
		$button2_icon_container     = medigroup_mikado_add_admin_container(array(
			'name'            => "button2_icon_".$collection_object->param."_container",
			'parent'          => $buttons_style_meta_box,
			'hidden_property' => 'mkd_button2_icon_pack',
			'hidden_value'    => '',
			'hidden_values'   => $button2_icon_hide_values
		));

		medigroup_mikado_add_meta_box_field(
			array(
				'name'    => "button2_icon_".$collection_object->param,
				'type'    => 'select',
				'label'   => esc_html__('Button 2 Icon', 'medigroup'),
				'parent'  => $button2_icon_container,
				'options' => $icons_array
			)
		);
	}

}
/*
medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'slider_button2_icon_size',
		'type'        => 'text',
		'label'       => 'Icon Size (px)',
		'description' => 'Define size for icon in button',
		'parent'      => $buttons_style_meta_box,
		'hidden_property' => 'mkd_button2_icon_pack',
		'hidden_values' => array('no_icon')
	)
);
*/


//Slide Content Positioning

$content_positioning_meta_box = medigroup_mikado_add_meta_box(
	array(
		'scope' => array('slides'),
		'title' => esc_html__('Slide Content Positioning', 'medigroup'),
		'name'  => 'mkd_content_positioning_settings'
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $content_positioning_meta_box,
		'type'          => 'selectblank',
		'name'          => 'mkd_slide_content_alignment',
		'default_value' => '',
		'label'         => esc_html__('Text Alignment', 'medigroup'),
		'description'   => esc_html__('Choose an alignment for the slide text', 'medigroup'),
		'options'       => array(
			"left"   => esc_html__("Left", 'medigroup'),
			"center" => esc_html__("Center", 'medigroup'),
			"right"  => esc_html__("Right", 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $content_positioning_meta_box,
		'type'          => 'selectblank',
		'name'          => 'mkd_slide_separate_text_graphic',
		'default_value' => 'no',
		'label'         => esc_html__('Separate Graphic and Text Positioning', 'medigroup'),
		'description'   => esc_html__('Do you want to separately position graphic and text?', 'medigroup'),
		'options'       => array(
			"no"  => esc_html__("No", 'medigroup'),
			"yes" => esc_html__("Yes", 'medigroup')
		),
		'args'          => array(
			"dependence" => true,
			"hide"       => array(
				""   => "#mkd_mkd_slide_graphic_positioning_container",
				"no" => "#mkd_mkd_slide_graphic_positioning_container, #mkd_mkd_content_vertical_positioning_group_container"
			),
			"show"       => array(
				"yes" => "#mkd_mkd_slide_graphic_positioning_container, #mkd_mkd_content_vertical_positioning_group_container"
			)
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_content_vertical_middle',
		'type'          => 'yesno',
		'default_value' => 'no',
		'label'         => esc_html__('Vertically Align Content to Middle', 'medigroup'),
		'parent'        => $content_positioning_meta_box,
		'args'          => array(
			"dependence"             => true,
			"dependence_hide_on_yes" => "#mkd_mkd_slide_content_vertical_middle_no_container",
			"dependence_show_on_yes" => "#mkd_mkd_slide_content_vertical_middle_yes_container"
		)
	)
);

$slide_content_vertical_middle_yes_container = medigroup_mikado_add_admin_container(array(
	'name'            => 'mkd_slide_content_vertical_middle_yes_container',
	'parent'          => $content_positioning_meta_box,
	'hidden_property' => 'mkd_slide_content_vertical_middle',
	'hidden_value'    => 'no'
));

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $slide_content_vertical_middle_yes_container,
		'type'          => 'selectblank',
		'name'          => 'mkd_slide_content_vertical_middle_type',
		'default_value' => '',
		'label'         => esc_html__('Align Content Vertically Relative to the Height Measured From', 'medigroup'),
		'options'       => array(
			"bottom_of_header" => esc_html__("Bottom of Header", 'medigroup'),
			"window_top"       => esc_html__("Window Top", 'medigroup')
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_vertical_content_full_width',
		'type'          => 'yesno',
		'default_value' => 'no',
		'label'         => esc_html__('Content Holder Full Width', 'medigroup'),
		'description'   => esc_html__('Do you want to set slide content holder to full width?', 'medigroup'),
		'parent'        => $slide_content_vertical_middle_yes_container
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_vertical_content_width',
		'type'        => 'text',
		'label'       => esc_html__('Content Width', 'medigroup'),
		'description' => esc_html__('Enter Width for Content Area', 'medigroup'),
		'parent'      => $slide_content_vertical_middle_yes_container,
		'args'        => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

$group_space_around_content = medigroup_mikado_add_admin_group(array(
	'title'  => esc_html__('Space Around Content in Slide', 'medigroup'),
	'name'   => 'group_space_around_content',
	'parent' => $slide_content_vertical_middle_yes_container
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $group_space_around_content
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_vertical_content_left',
		'type'   => 'textsimple',
		'label'  => esc_html__('From Left', 'medigroup'),
		'parent' => $row1,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_vertical_content_right',
		'type'   => 'textsimple',
		'label'  => esc_html__('From Right', 'medigroup'),
		'parent' => $row1,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

$slide_content_vertical_middle_no_container = medigroup_mikado_add_admin_container(array(
	'name'            => 'mkd_slide_content_vertical_middle_no_container',
	'parent'          => $content_positioning_meta_box,
	'hidden_property' => 'mkd_slide_content_vertical_middle',
	'hidden_value'    => 'yes'
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'          => 'mkd_slide_content_full_width',
		'type'          => 'yesno',
		'default_value' => 'no',
		'label'         => esc_html__('Content Holder Full Width', 'medigroup'),
		'description'   => esc_html__('Do you want to set slide content holder to full width?', 'medigroup'),
		'parent'        => $slide_content_vertical_middle_no_container,
		'args'          => array(
			"dependence"             => true,
			"dependence_hide_on_yes" => "#mkd_mkd_slide_content_width_container",
			"dependence_show_on_yes" => ""
		)
	)
);

$slide_content_width_container = medigroup_mikado_add_admin_container(array(
	'name'            => 'mkd_slide_content_width_container',
	'parent'          => $slide_content_vertical_middle_no_container,
	'hidden_property' => 'mkd_slide_content_full_width',
	'hidden_value'    => 'yes'
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_slide_content_width',
		'type'        => 'text',
		'label'       => esc_html__('Content Holder Width', 'medigroup'),
		'description' => esc_html__('Enter Width for Content Holder Area', 'medigroup'),
		'parent'      => $slide_content_width_container,
		'args'        => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

$group_space_around_content = medigroup_mikado_add_admin_group(array(
	'title'  => esc_html__('Space Around Content in Slide', 'medigroup'),
	'name'   => 'group_space_around_content',
	'parent' => $slide_content_vertical_middle_no_container
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $group_space_around_content
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_content_top',
		'type'   => 'textsimple',
		'label'  => esc_html__('From Top', 'medigroup'),
		'parent' => $row1,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_content_left',
		'type'   => 'textsimple',
		'label'  => esc_html__('From Left', 'medigroup'),
		'parent' => $row1,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_content_bottom',
		'type'   => 'textsimple',
		'label'  => esc_html__('From Bottom', 'medigroup'),
		'parent' => $row1,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_content_right',
		'type'   => 'textsimple',
		'label'  => esc_html__('From Right', 'medigroup'),
		'parent' => $row1,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

$row2 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row2',
	'parent' => $group_space_around_content
));

$content_vertical_positioning_group_container = medigroup_mikado_add_admin_container_no_style(array(
	'name'            => 'mkd_content_vertical_positioning_group_container',
	'parent'          => $row2,
	'hidden_property' => 'mkd_slide_separate_text_graphic',
	'hidden_value'    => 'no'
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_text_width',
		'type'   => 'textsimple',
		'label'  => esc_html__('Text Holder Width', 'medigroup'),
		'parent' => $content_vertical_positioning_group_container,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

$slide_graphic_positioning_container = medigroup_mikado_add_admin_container(array(
	'name'            => 'mkd_slide_graphic_positioning_container',
	'parent'          => $slide_content_vertical_middle_no_container,
	'hidden_property' => 'mkd_slide_separate_text_graphic',
	'hidden_value'    => 'no'
));

medigroup_mikado_add_meta_box_field(
	array(
		'parent'        => $slide_graphic_positioning_container,
		'type'          => 'selectblank',
		'name'          => 'mkd_slide_graphic_alignment',
		'default_value' => 'left',
		'label'         => esc_html__('Choose an alignment for the slide graphic', 'medigroup'),
		'options'       => array(
			"left"   => esc_html__("Left", 'medigroup'),
			"center" => esc_html__("Center", 'medigroup'),
			"right"  => esc_html__("Right", 'medigroup')
		)
	)
);

$group_graphic_positioning = medigroup_mikado_add_admin_group(array(
	'title'       => esc_html__('Graphic Positioning', 'medigroup'),
	'description' => esc_html__('Positioning for slide graphic', 'medigroup'),
	'name'        => 'group_graphic_positioning',
	'parent'      => $slide_graphic_positioning_container
));

$row1 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row1',
	'parent' => $group_graphic_positioning
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_graphic_top',
		'type'   => 'textsimple',
		'label'  => esc_html__('From Top', 'medigroup'),
		'parent' => $row1,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_graphic_left',
		'type'   => 'textsimple',
		'label'  => esc_html__('From Left', 'medigroup'),
		'parent' => $row1,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_graphic_bottom',
		'type'   => 'textsimple',
		'label'  => esc_html__('From Bottom', 'medigroup'),
		'parent' => $row1,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_graphic_right',
		'type'   => 'textsimple',
		'label'  => esc_html__('From Right', 'medigroup'),
		'parent' => $row1,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);

$row2 = medigroup_mikado_add_admin_row(array(
	'name'   => 'row2',
	'parent' => $group_graphic_positioning
));

medigroup_mikado_add_meta_box_field(
	array(
		'name'   => 'mkd_slide_graphic_width',
		'type'   => 'textsimple',
		'label'  => esc_html__('Graphic Holder Width', 'medigroup'),
		'parent' => $row2,
		'args'   => array(
			'col_width' => 2,
			'suffix'    => '%'
		)
	)
);