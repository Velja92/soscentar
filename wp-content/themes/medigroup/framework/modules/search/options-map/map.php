<?php

if(!function_exists('medigroup_mikado_search_options_map')) {

	function medigroup_mikado_search_options_map() {

		medigroup_mikado_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__('Search', 'medigroup'),
				'icon'  => 'fa fa-search'
			)
		);

		$search_panel = medigroup_mikado_add_admin_panel(
			array(
				'title' => esc_html__('Search', 'medigroup'),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_type',
				'default_value' => 'search-dropdown',
				'label'         => esc_html__('Select Search Type', 'medigroup'),
				'description'   => esc_html__("Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with transparent header)", 'medigroup'),
				'options'       => array(
					'search-slides-from-header-bottom' => esc_html__('Slide From Header Bottom', 'medigroup'),
					'search-covers-header'             => esc_html__('Search Covers Header', 'medigroup'),
					'fullscreen-search'                => esc_html__('Fullscreen Search', 'medigroup'),
					'search-slides-from-window-top'    => esc_html__('Slide from Window Top', 'medigroup'),
					'search-dropdown'                  => esc_html__('Search Dropdown', 'medigroup')
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'search-slides-from-header-bottom' => '#mkd_search_animation_container',
						'search-covers-header'             => '#mkd_search_height_container, #mkd_search_animation_container',
						'fullscreen-search'                => '#mkd_search_height_container',
						'search-slides-from-window-top'    => '#mkd_search_height_container, #mkd_search_animation_container'
					),
					'show'       => array(
						'search-slides-from-header-bottom' => '#mkd_search_height_container',
						'search-covers-header'             => '',
						'fullscreen-search'                => '#mkd_search_animation_container',
						'search-slides-from-window-top'    => ''
					)
				)
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_awesome',
				'label'         => esc_html__('Search Icon Pack', 'medigroup'),
				'description'   => esc_html__('Choose icon pack for search icon', 'medigroup'),
				'options'       => medigroup_mikado_icon_collections()->getIconCollectionsExclude(array(
					'linea_icons',
					'simple_line_icons',
					'dripicons'
				))
			)
		);

		$search_height_container = medigroup_mikado_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_height_container',
				'hidden_property' => 'search_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'search-covers-header',
					'fullscreen-search',
					'search-slides-from-window-top'
				)
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_height_container,
				'type'          => 'text',
				'name'          => 'search_height',
				'default_value' => '',
				'label'         => esc_html__('Search bar height', 'medigroup'),
				'description'   => esc_html__('Set search bar height', 'medigroup'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		$search_animation_container = medigroup_mikado_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_animation_container',
				'hidden_property' => 'search_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'search-covers-header',
					'search-slides-from-header-bottom',
					'search-slides-from-window-top'
				)
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_animation_container,
				'type'          => 'select',
				'name'          => 'search_animation',
				'default_value' => 'search-fade',
				'label'         => esc_html__('Fullscreen Search Overlay Animation', 'medigroup'),
				'description'   => esc_html__('Choose animation for fullscreen search overlay', 'medigroup'),
				'options'       => array(
					'search-fade'        => esc_html__('Fade', 'medigroup'),
					'search-from-circle' => esc_html__('Circle appear', 'medigroup')
				)
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'search_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__('Search area in grid', 'medigroup'),
				'description'   => esc_html__('Set search area to be in grid', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__('Initial Search Icon in Header', 'medigroup')
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'header_search_icon_size',
				'default_value' => '',
				'label'         => esc_html__('Icon Size', 'medigroup'),
				'description'   => esc_html__('Set size for icon', 'medigroup'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		$search_icon_color_group = medigroup_mikado_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__('Icon Colors', 'medigroup'),
				'description' => esc_html__('Define color style for icon', 'medigroup'),
				'name'        => 'search_icon_color_group'
			)
		);

		$search_icon_color_row = medigroup_mikado_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row'
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_color',
				'label'  => esc_html__('Color', 'medigroup')
			)
		);
		medigroup_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_hover_color',
				'label'  => esc_html__('Hover Color', 'medigroup')
			)
		);
		medigroup_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_light_search_icon_color',
				'label'  => esc_html__('Light Header Icon Color', 'medigroup')
			)
		);
		medigroup_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_light_search_icon_hover_color',
				'label'  => esc_html__('Light Header Icon Hover Color', 'medigroup')
			)
		);

		$search_icon_color_row2 = medigroup_mikado_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row2',
				'next'   => true
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'   => 'colorsimple',
				'name'   => 'header_dark_search_icon_color',
				'label'  => esc_html__('Dark Header Icon Color', 'medigroup')
			)
		);
		medigroup_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'   => 'colorsimple',
				'name'   => 'header_dark_search_icon_hover_color',
				'label'  => esc_html__('Dark Header Icon Hover Color', 'medigroup')
			)
		);


		$search_icon_background_group = medigroup_mikado_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__('Icon Background Style', 'medigroup'),
				'description' => esc_html__('Define background style for icon', 'medigroup'),
				'name'        => 'search_icon_background_group'
			)
		);

		$search_icon_background_row = medigroup_mikado_add_admin_row(
			array(
				'parent' => $search_icon_background_group,
				'name'   => 'search_icon_background_row'
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_background_row,
				'type'          => 'colorsimple',
				'name'          => 'search_icon_background_color',
				'default_value' => '',
				'label'         => esc_html__('Background Color', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_background_row,
				'type'          => 'colorsimple',
				'name'          => 'search_icon_background_hover_color',
				'default_value' => '',
				'label'         => esc_html__('Background Hover Color', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'enable_search_icon_text',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Search Icon Text', 'medigroup'),
				'description'   => esc_html__("Enable this option to show 'Search' text next to search icon in header", 'medigroup'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkd_enable_search_icon_text_container'
				)
			)
		);

		$enable_search_icon_text_container = medigroup_mikado_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'enable_search_icon_text_container',
				'hidden_property' => 'enable_search_icon_text',
				'hidden_value'    => 'no'
			)
		);

		$enable_search_icon_text_group = medigroup_mikado_add_admin_group(
			array(
				'parent'      => $enable_search_icon_text_container,
				'title'       => esc_html__('Search Icon Text', 'medigroup'),
				'name'        => 'enable_search_icon_text_group',
				'description' => esc_html__('Define Style for Search Icon Text', 'medigroup')
			)
		);

		$enable_search_icon_text_row = medigroup_mikado_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row'
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'colorsimple',
				'name'          => 'search_icon_text_color',
				'label'         => esc_html__('Text Color', 'medigroup'),
				'default_value' => ''
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'colorsimple',
				'name'          => 'search_icon_text_color_hover',
				'label'         => esc_html__('Text Hover Color', 'medigroup'),
				'default_value' => ''
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_fontsize',
				'label'         => esc_html__('Font Size', 'medigroup'),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_lineheight',
				'label'         => esc_html__('Line Height', 'medigroup'),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$enable_search_icon_text_row2 = medigroup_mikado_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row2',
				'next'   => true
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_texttransform',
				'label'         => esc_html__('Text Transform', 'medigroup'),
				'default_value' => '',
				'options'       => medigroup_mikado_get_text_transform_array()
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_icon_text_google_fonts',
				'label'         => esc_html__('Font Family', 'medigroup'),
				'default_value' => '-1',
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_fontstyle',
				'label'         => esc_html__('Font Style', 'medigroup'),
				'default_value' => '',
				'options'       => medigroup_mikado_get_font_style_array(),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_fontweight',
				'label'         => esc_html__('Font Weight', 'medigroup'),
				'default_value' => '',
				'options'       => medigroup_mikado_get_font_weight_array(),
			)
		);

		$enable_search_icon_text_row3 = medigroup_mikado_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row3',
				'next'   => true
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row3,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_letterspacing',
				'label'         => esc_html__('Letter Spacing', 'medigroup'),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$search_icon_spacing_group = medigroup_mikado_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__('Icon Spacing', 'medigroup'),
				'description' => esc_html__('Define padding and margins for Search icon', 'medigroup'),
				'name'        => 'search_icon_spacing_group'
			)
		);

		$search_icon_spacing_row = medigroup_mikado_add_admin_row(
			array(
				'parent' => $search_icon_spacing_group,
				'name'   => 'search_icon_spacing_row'
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'search_padding_left',
				'default_value' => '',
				'label'         => esc_html__('Padding Left', 'medigroup'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'search_padding_right',
				'default_value' => '',
				'label'         => esc_html__('Padding Right', 'medigroup'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'search_margin_left',
				'default_value' => '',
				'label'         => esc_html__('Margin Left', 'medigroup'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'search_margin_right',
				'default_value' => '',
				'label'         => esc_html__('Margin Right', 'medigroup'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		medigroup_mikado_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'search_form_title',
				'title'  => esc_html__('Search Bar', 'medigroup')
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'color',
				'name'          => 'search_background_color',
				'default_value' => '',
				'label'         => esc_html__('Background Color', 'medigroup'),
				'description'   => esc_html__('Choose a background color for Select search bar', 'medigroup')
			)
		);

		$search_input_text_group = medigroup_mikado_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__('Search Input Text', 'medigroup'),
				'description' => esc_html__('Define style for search text', 'medigroup'),
				'name'        => 'search_input_text_group'
			)
		);

		$search_input_text_row = medigroup_mikado_add_admin_row(
			array(
				'parent' => $search_input_text_group,
				'name'   => 'search_input_text_row'
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_input_text_row,
				'type'          => 'colorsimple',
				'name'          => 'search_text_color',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_input_text_row,
				'type'          => 'colorsimple',
				'name'          => 'search_text_disabled_color',
				'default_value' => '',
				'label'         => esc_html__('Disabled Text Color', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_input_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_text_fontsize',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'medigroup'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_input_text_row,
				'type'          => 'selectblanksimple',
				'name'          => 'search_text_texttransform',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'medigroup'),
				'options'       => medigroup_mikado_get_text_transform_array()
			)
		);

		$search_input_text_row2 = medigroup_mikado_add_admin_row(
			array(
				'parent' => $search_input_text_group,
				'name'   => 'search_input_text_row2'
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_input_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_input_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_text_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'medigroup'),
				'options'       => medigroup_mikado_get_font_style_array(),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_input_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_text_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'medigroup'),
				'options'       => medigroup_mikado_get_font_weight_array()
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_input_text_row2,
				'type'          => 'textsimple',
				'name'          => 'search_text_letterspacing',
				'default_value' => '',
				'label'         => esc_html__('Letter Spacing', 'medigroup'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$search_label_text_group = medigroup_mikado_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__('Search Label Text', 'medigroup'),
				'description' => 'Define style for search label text',
				'name'        => 'search_label_text_group'
			)
		);

		$search_label_text_row = medigroup_mikado_add_admin_row(
			array(
				'parent' => $search_label_text_group,
				'name'   => 'search_label_text_row'
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_label_text_row,
				'type'          => 'colorsimple',
				'name'          => 'search_label_text_color',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_label_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_label_text_fontsize',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'medigroup'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_label_text_row,
				'type'          => 'selectblanksimple',
				'name'          => 'search_label_text_texttransform',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'medigroup'),
				'options'       => medigroup_mikado_get_text_transform_array()
			)
		);

		$search_label_text_row2 = medigroup_mikado_add_admin_row(
			array(
				'parent' => $search_label_text_group,
				'name'   => 'search_label_text_row2',
				'next'   => true
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_label_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_label_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_label_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_label_text_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'medigroup'),
				'options'       => medigroup_mikado_get_font_style_array()
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_label_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_label_text_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'medigroup'),
				'options'       => medigroup_mikado_get_font_weight_array()
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_label_text_row2,
				'type'          => 'textsimple',
				'name'          => 'search_label_text_letterspacing',
				'default_value' => '',
				'label'         => esc_html__('Letter Spacing', 'medigroup'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$search_icon_group = medigroup_mikado_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__('Search Icon', 'medigroup'),
				'description' => esc_html__('Define style for search icon', 'medigroup'),
				'name'        => 'search_icon_group'
			)
		);

		$search_icon_row = medigroup_mikado_add_admin_row(
			array(
				'parent' => $search_icon_group,
				'name'   => 'search_icon_row'
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_row,
				'type'          => 'colorsimple',
				'name'          => 'search_icon_color',
				'default_value' => '',
				'label'         => esc_html__('Icon Color', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_row,
				'type'          => 'colorsimple',
				'name'          => 'search_icon_hover_color',
				'default_value' => '',
				'label'         => esc_html__('Icon Hover Color', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_row,
				'type'          => 'colorsimple',
				'name'          => 'search_icon_disabled_color',
				'default_value' => '',
				'label'         => esc_html__('Icon Disabled Color', 'medigroup'),
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_size',
				'default_value' => '',
				'label'         => esc_html__('Icon Size', 'medigroup'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$search_close_icon_group = medigroup_mikado_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__('Search Close', 'medigroup'),
				'description' => esc_html__('Define style for search close icon', 'medigroup'),
				'name'        => 'search_close_icon_group'
			)
		);

		$search_close_icon_row = medigroup_mikado_add_admin_row(
			array(
				'parent' => $search_close_icon_group,
				'name'   => 'search_icon_row'
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_close_icon_row,
				'type'          => 'colorsimple',
				'name'          => 'search_close_color',
				'label'         => esc_html__('Icon Color', 'medigroup'),
				'default_value' => ''
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_close_icon_row,
				'type'          => 'colorsimple',
				'name'          => 'search_close_hover_color',
				'label'         => esc_html__('Icon Hover Color', 'medigroup'),
				'default_value' => ''
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_close_icon_row,
				'type'          => 'textsimple',
				'name'          => 'search_close_size',
				'label'         => esc_html__('Icon Size', 'medigroup'),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$search_bottom_border_group = medigroup_mikado_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__('Search Bottom Border', 'medigroup'),
				'description' => esc_html__('Define style for Search text input bottom border (for Fullscreen search type)', 'medigroup'),
				'name'        => 'search_bottom_border_group'
			)
		);

		$search_bottom_border_row = medigroup_mikado_add_admin_row(
			array(
				'parent' => $search_bottom_border_group,
				'name'   => 'search_icon_row'
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_bottom_border_row,
				'type'          => 'colorsimple',
				'name'          => 'search_border_color',
				'label'         => esc_html__('Border Color', 'medigroup'),
				'default_value' => ''
			)
		);

		medigroup_mikado_add_admin_field(
			array(
				'parent'        => $search_bottom_border_row,
				'type'          => 'colorsimple',
				'name'          => 'search_border_focus_color',
				'label'         => esc_html__('Border Focus Color', 'medigroup'),
				'default_value' => ''
			)
		);

	}

	add_action('medigroup_mikado_options_map', 'medigroup_mikado_search_options_map', 6);

}