<?php

if(!function_exists('medigroup_mikado_tabs_map')) {
	function medigroup_mikado_tabs_map() {

		$panel = medigroup_mikado_add_admin_panel(array(
			'title' => esc_html__('Tabs', 'medigroup'),
			'name'  => 'panel_tabs',
			'page'  => '_elements_page'
		));

		//Typography options
		medigroup_mikado_add_admin_section_title(array(
			'name'   => 'typography_section_title',
			'title'  => esc_html__('Tabs Navigation Typography', 'medigroup'),
			'parent' => $panel
		));

		$typography_group = medigroup_mikado_add_admin_group(array(
			'name'        => 'typography_group',
			'title'       => esc_html__('Tabs Navigation Typography', 'medigroup'),
			'description' => esc_html__('Setup typography for tabs navigation', 'medigroup'),
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
			'name'          => 'tabs_font_family',
			'default_value' => '',
			'label'         => esc_html__('Font Family', 'medigroup'),
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'tabs_text_transform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'medigroup'),
			'options'       => medigroup_mikado_get_text_transform_array()
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'tabs_font_style',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'medigroup'),
			'options'       => medigroup_mikado_get_font_style_array()
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'textsimple',
			'name'          => 'tabs_letter_spacing',
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
			'name'          => 'tabs_font_weight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'medigroup'),
			'options'       => medigroup_mikado_get_font_weight_array()
		));

		//Initial Tab Color Styles

		medigroup_mikado_add_admin_section_title(array(
			'name'   => 'tab_color_section_title',
			'title'  => esc_html__('Tab Navigation Color Styles', 'medigroup'),
			'parent' => $panel
		));
		$tabs_color_group = medigroup_mikado_add_admin_group(array(
			'name'        => 'tabs_color_group',
			'title'       => esc_html__('Tab Navigation Color Styles', 'medigroup'),
			'description' => esc_html__('Set color styles for tab navigation', 'medigroup'),
			'parent'      => $panel
		));
		$tabs_color_row   = medigroup_mikado_add_admin_row(array(
			'name'   => 'tabs_color_row',
			'next'   => true,
			'parent' => $tabs_color_group
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_color',
			'default_value' => '',
			'label'         => esc_html__('Color', 'medigroup')
		));
		medigroup_mikado_add_admin_field(array(
			'parent'        => $tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_back_color',
			'default_value' => '',
			'label'         => esc_html__('Background Color', 'medigroup')
		));
		medigroup_mikado_add_admin_field(array(
			'parent'        => $tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_border_color',
			'default_value' => '',
			'label'         => esc_html__('Border Color', 'medigroup')
		));

		//Active Tab Color Styles

		$active_tabs_color_group = medigroup_mikado_add_admin_group(array(
			'name'        => 'active_tabs_color_group',
			'title'       => esc_html__('Active and Hover Navigation Color Styles', 'medigroup'),
			'description' => esc_html__('Set color styles for active and hover tabs', 'medigroup'),
			'parent'      => $panel
		));
		$active_tabs_color_row   = medigroup_mikado_add_admin_row(array(
			'name'   => 'active_tabs_color_row',
			'next'   => true,
			'parent' => $active_tabs_color_group
		));

		medigroup_mikado_add_admin_field(array(
			'parent'        => $active_tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_color_active',
			'default_value' => '',
			'label'         => esc_html__('Color', 'medigroup')
		));
		medigroup_mikado_add_admin_field(array(
			'parent'        => $active_tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_back_color_active',
			'default_value' => '',
			'label'         => esc_html__('Background Color', 'medigroup')
		));
		medigroup_mikado_add_admin_field(array(
			'parent'        => $active_tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_border_color_active',
			'default_value' => '',
			'label'         => esc_html__('Border Color', 'medigroup')
		));

	}

	add_action('medigroup_mikado_options_elements_map', 'medigroup_mikado_tabs_map');
}