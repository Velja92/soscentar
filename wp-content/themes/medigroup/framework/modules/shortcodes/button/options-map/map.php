<?php

if(!function_exists('medigroup_mikado_button_map')) {
	function medigroup_mikado_button_map() {
		$panel = medigroup_mikado_add_admin_panel(array(
			'title' => esc_html__('Button', 'medigroup'),
			'name'  => 'panel_button',
			'page'  => '_elements_page'
		));

		medigroup_mikado_add_admin_field(array(
			'name'        => 'button_hover_animation',
			'type'        => 'select',
			'label'       => esc_html__('Hover Animation', 'medigroup'),
			'description' => esc_html__('Choose default hover animation type', 'medigroup'),
			'parent'      => $panel,
			'options'     => medigroup_mikado_get_btn_hover_animation_types()
		));

		//Typography options
		medigroup_mikado_add_admin_section_title(array(
			'name'   => 'typography_section_title',
			'title'  => esc_html__('Typography', 'medigroup'),
			'parent' => $panel
		));

		$typography_group = medigroup_mikado_add_admin_group(array(
			'name'        => 'typography_group',
			'title'       => esc_html__('Typography', 'medigroup'),
			'description' => esc_html__('Setup typography for all button types', 'medigroup'),
			'parent'      => $panel
		));

		$typography_row = medigroup_mikado_add_admin_row(array(
			'name'   => 'typography_row',
			'next'   => true,
			'parent' => $typography_group
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'fontsimple',
			'name'          => 'button_font_family',
			'default_value' => '',
			'label'         => 'Font Family',
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'button_text_transform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'medigroup'),
			'options'       => medigroup_mikado_get_text_transform_array()
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'button_font_style',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'medigroup'),
			'options'       => medigroup_mikado_get_font_style_array()
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'textsimple',
			'name'          => 'button_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'medigroup'),
			'args'          => array(
				'suffix' => 'px'
			)
		));

		$typography_row2 = medigroup_mikado_add_admin_row(array(
			'name'   => 'typography_row2',
			'next'   => true,
			'parent' => $typography_group
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'button_font_weight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'medigroup'),
			'options'       => medigroup_mikado_get_font_weight_array()
		));

		//Outline type options
		medigroup_mikado_add_admin_section_title(array(
			'name'   => 'type_section_title',
			'title'  => esc_html__('Types', 'medigroup'),
			'parent' => $panel
		));

		$outline_group = medigroup_mikado_add_admin_group(array(
			'name'        => 'outline_group',
			'title'       => esc_html__('Outline Type', 'medigroup'),
			'description' => esc_html__('Setup outline button type', 'medigroup'),
			'parent'      => $panel
		));

		$outline_row = medigroup_mikado_add_admin_row(array(
			'name'   => 'outline_row',
			'next'   => true,
			'parent' => $outline_group
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $outline_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_outline_text_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'medigroup'),
			'description'   => ''
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $outline_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_outline_hover_text_color',
			'default_value' => '',
			'label'         => esc_html__('Text Hover Color', 'medigroup'),
			'description'   => ''
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $outline_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_outline_hover_bg_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Background Color', 'medigroup'),
			'description'   => ''
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $outline_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_outline_border_color',
			'default_value' => '',
			'label'         => esc_html__('Border Color', 'medigroup'),
			'description'   => ''
		));

		$outline_row2 = medigroup_mikado_add_admin_row(array(
			'name'   => 'outline_row2',
			'next'   => true,
			'parent' => $outline_group
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $outline_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_outline_hover_border_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Border Color', 'medigroup'),
			'description'   => ''
		));

		//Solid type options
		$solid_group = medigroup_mikado_add_admin_group(array(
			'name'        => 'solid_group',
			'title'       => esc_html__('Solid Type', 'medigroup'),
			'description' => esc_html__('Setup solid button type', 'medigroup'),
			'parent'      => $panel
		));

		$solid_row = medigroup_mikado_add_admin_row(array(
			'name'   => 'solid_row',
			'next'   => true,
			'parent' => $solid_group
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $solid_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_text_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'medigroup'),
			'description'   => ''
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $solid_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_hover_text_color',
			'default_value' => '',
			'label'         => esc_html__('Text Hover Color', 'medigroup'),
			'description'   => ''
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $solid_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_bg_color',
			'default_value' => '',
			'label'         => esc_html__('Background Color', 'medigroup'),
			'description'   => ''
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $solid_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_hover_bg_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Background Color', 'medigroup'),
			'description'   => ''
		));

		$solid_row2 = medigroup_mikado_add_admin_row(array(
			'name'   => 'solid_row2',
			'next'   => true,
			'parent' => $solid_group
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $solid_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_border_color',
			'default_value' => '',
			'label'         => esc_html__('Border Color', 'medigroup'),
			'description'   => ''
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $solid_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_hover_border_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Border Color', 'medigroup'),
			'description'   => ''
		));
	}

	add_action('medigroup_mikado_options_elements_map', 'medigroup_mikado_button_map');
}