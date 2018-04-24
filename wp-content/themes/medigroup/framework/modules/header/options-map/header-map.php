<?php

if(!function_exists('medigroup_mikado_header_options_map')) {

    function medigroup_mikado_header_options_map() {

        medigroup_mikado_add_admin_page(
            array(
                'slug'  => '_header_page',
                'title' => esc_html__('Header', 'medigroup'),
                'icon'  => 'fa fa-header'
            )
        );

        $panel_header = medigroup_mikado_add_admin_panel(
            array(
                'page'  => '_header_page',
                'name'  => 'panel_header',
                'title' => esc_html__('Header', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header,
                'type'          => 'radiogroup',
                'name'          => 'header_type',
                'default_value' => 'header-type1',
                'label'         => esc_html__('Choose Header Type', 'medigroup'),
                'description'   => esc_html__('Select the type of header you would like to use', 'medigroup'),
                'options'       => array(
                    'header-type1'    => array(
                        'image' => MIKADO_FRAMEWORK_ROOT.'/admin/assets/img/header-standard.png',
                        'label' => esc_html__('Standard', 'medigroup')
                    ),
                    'header-vertical' => array(
                        'image' => MIKADO_FRAMEWORK_ROOT.'/admin/assets/img/header-vertical.png',
                        'label' => esc_html__('Vertical', 'medigroup')
                    ),
                    'header-minimal'  => array(
                        'image' => MIKADO_FRAMEWORK_ROOT.'/admin/assets/img/header-minimal.png',
                        'label' => esc_html__('Minimal', 'medigroup')
                    )
                ),
                'args'          => array(
                    'use_images'  => true,
                    'hide_labels' => true,
                    'dependence'  => true,
                    'show'        => array(
                        'header-type1'    => '#mkd_panel_header_type1,#mkd_header_behaviour,#mkd_panel_fixed_header,#mkd_panel_sticky_header,#mkd_panel_main_menu',
                        'header-vertical' => '#mkd_panel_header_vertical,#mkd_panel_vertical_main_menu',
                        'header-minimal'  => '#mkd_panel_header_minimal,#mkd_header_behaviour,#mkd_panel_fullscreen_menu,#mkd_panel_sticky_header',
                    ),
                    'hide'        => array(
                        'header-type1'    => '#mkd_panel_header_type2,#mkd_panel_header_type3,#mkd_panel_header_type4,#mkd_panel_header_standard,#mkd_panel_header_vertical,#mkd_panel_vertical_main_menu,#mkd_panel_header_minimal',
                        'header-vertical' => '#mkd_panel_header_type1,#mkd_panel_header_type2,#mkd_panel_header_type3,#mkd_panel_header_type4,#mkd_panel_header_standard,#mkd_header_behaviour,#mkd_panel_fixed_header,#mkd_panel_sticky_header,#mkd_panel_main_menu,#mkd_panel_header_minimal',
                        'header-minimal'  => '#mkd_panel_header_type1,#mkd_panel_main_menu,#mkd_panel_header_vertical,#mkd_panel_header_vertical',
                    )
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'          => $panel_header,
                'type'            => 'select',
                'name'            => 'header_behaviour',
                'default_value'   => 'sticky-header-on-scroll-up',
                'label'           => esc_html__('Choose Header behaviour', 'medigroup'),
                'description'     => esc_html__('Select the behaviour of header when you scroll down to page', 'medigroup'),
                'options'         => array(
                    'no-behavior'                     => esc_html__('No Behavior', 'medigroup'),
                    'sticky-header-on-scroll-up'      => esc_html__('Sticky on scrol up', 'medigroup'),
                    'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'medigroup'),
                    'fixed-on-scroll'                 => esc_html__('Fixed on scroll', 'medigroup')
                ),
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array('header-vertical'),
                'args'            => array(
                    'dependence' => true,
                    'show'       => array(
                        'sticky-header-on-scroll-up'      => '#mkd_panel_sticky_header',
                        'sticky-header-on-scroll-down-up' => '#mkd_panel_sticky_header',
                        'fixed-on-scroll'                 => '#mkd_panel_fixed_header'
                    ),
                    'hide'       => array(
                        'sticky-header-on-scroll-up'      => '#mkd_panel_fixed_header',
                        'sticky-header-on-scroll-down-up' => '#mkd_panel_fixed_header',
                        'fixed-on-scroll'                 => '#mkd_panel_sticky_header',
                        'no-behavior'                     => '#mkd_panel_fixed_header, #mkd_panel_fixed_header, #mkd_panel_sticky_header'
                    )
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'top_bar',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Top Bar', 'medigroup'),
                'description'   => esc_html__('Enabling this option will show top bar area', 'medigroup'),
                'parent'        => $panel_header,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_top_bar_container"
                )
            )
        );

        $top_bar_container = medigroup_mikado_add_admin_container(array(
            'name'            => 'top_bar_container',
            'parent'          => $panel_header,
            'hidden_property' => 'top_bar',
            'hidden_value'    => 'no'
        ));

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $top_bar_container,
                'type'          => 'select',
                'name'          => 'top_bar_layout',
                'default_value' => 'three-columns',
                'label'         => esc_html__('Choose top bar layout', 'medigroup'),
                'description'   => esc_html__('Select the layout for top bar', 'medigroup'),
                'options'       => array(
                    'two-columns'   => esc_html__('Two columns', 'medigroup'),
                    'three-columns' => esc_html__('Three columns', 'medigroup')
                ),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        'two-columns'   => '#mkd_top_bar_layout_container',
                        'three-columns' => '#mkd_top_bar_two_columns_layout_container'
                    ),
                    'show'       => array(
                        'two-columns'   => '#mkd_top_bar_two_columns_layout_container',
                        'three-columns' => '#mkd_top_bar_layout_container'
                    )
                )
            )
        );

        $top_bar_layout_container = medigroup_mikado_add_admin_container(array(
            'name'            => 'top_bar_layout_container',
            'parent'          => $top_bar_container,
            'hidden_property' => 'top_bar_layout',
            'hidden_value'    => '',
            'hidden_values'   => array('two-columns'),
        ));

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $top_bar_layout_container,
                'type'          => 'select',
                'name'          => 'top_bar_column_widths',
                'default_value' => '30-30-30',
                'label'         => esc_html__('Choose column widths', 'medigroup'),
                'description'   => '',
                'options'       => array(
                    '30-30-30' => '33% - 33% - 33%',
                    '25-50-25' => '25% - 50% - 25%'
                )
            )
        );

        $top_bar_two_columns_layout = medigroup_mikado_add_admin_container(array(
            'name'            => 'top_bar_two_columns_layout_container',
            'parent'          => $top_bar_container,
            'hidden_property' => 'top_bar_layout',
            'hidden_value'    => '',
            'hidden_values'   => array('three-columns'),
        ));

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $top_bar_two_columns_layout,
                'type'          => 'select',
                'name'          => 'top_bar_two_column_widths',
                'default_value' => '50-50',
                'label'         => esc_html__('Choose column widths', 'medigroup'),
                'description'   => '',
                'options'       => array(
                    '50-50' => '50% - 50%',
                    '33-66' => '33% - 66%',
                    '66-33' => '66% - 33%'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'top_bar_in_grid',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Top Bar in grid', 'medigroup'),
                'description'   => esc_html__('Set top bar content to be in grid', 'medigroup'),
                'parent'        => $top_bar_container,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_top_bar_in_grid_container"
                )
            )
        );

        $top_bar_in_grid_container = medigroup_mikado_add_admin_container(array(
            'name'            => 'top_bar_in_grid_container',
            'parent'          => $top_bar_container,
            'hidden_property' => 'top_bar_in_grid',
            'hidden_value'    => 'no'
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'top_bar_grid_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Grid Background Color', 'medigroup'),
            'description' => esc_html__('Set grid background color for top bar', 'medigroup'),
            'parent'      => $top_bar_in_grid_container
        ));


        medigroup_mikado_add_admin_field(array(
            'name'        => 'top_bar_grid_background_transparency',
            'type'        => 'text',
            'label'       => esc_html__('Grid Background Transparency', 'medigroup'),
            'description' => esc_html__('Set grid background transparency for top bar', 'medigroup'),
            'parent'      => $top_bar_in_grid_container,
            'args'        => array('col_width' => 3)
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'top_bar_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Background Color', 'medigroup'),
            'description' => esc_html__('Set background color for top bar', 'medigroup'),
            'parent'      => $top_bar_container
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'top_bar_background_transparency',
            'type'        => 'text',
            'label'       => esc_html__('Background Transparency', 'medigroup'),
            'description' => esc_html__('Set background transparency for top bar', 'medigroup'),
            'parent'      => $top_bar_container,
            'args'        => array('col_width' => 3)
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'top_bar_height',
            'type'        => 'text',
            'label'       => esc_html__('Top bar height', 'medigroup'),
            'description' => esc_html__('Enter top bar height (Default is 40px)', 'medigroup'),
            'parent'      => $top_bar_container,
            'args'        => array(
                'col_width' => 2,
                'suffix'    => 'px'
            )
        ));

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header,
                'type'          => 'select',
                'name'          => 'header_style',
                'default_value' => '',
                'label'         => esc_html__('Header Skin', 'medigroup'),
                'description'   => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'medigroup'),
                'options'       => array(
                    ''             => '',
                    'light-header' => esc_html__('Light', 'medigroup'),
                    'dark-header'  => esc_html__('Dark', 'medigroup')
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header,
                'type'          => 'yesno',
                'name'          => 'enable_header_style_on_scroll',
                'default_value' => 'no',
                'label'         => esc_html__('Enable Header Style on Scroll', 'medigroup'),
                'description'   => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'medigroup'),
            )
        );

        $panel_header_type1 = medigroup_mikado_add_admin_panel(
            array(
                'page'            => '_header_page',
                'name'            => 'panel_header_type1',
                'title'           => esc_html__('Header Type 1', 'medigroup'),
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'header-vertical',
                    'header-minimal'
                )
            )
        );

        medigroup_mikado_add_admin_section_title(
            array(
                'parent' => $panel_header_type1,
                'name'   => 'logo_area_title',
                'title'  => esc_html__('Logo Area', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_type1,
                'type'          => 'yesno',
                'name'          => 'logo_area_in_grid_header_type1',
                'default_value' => 'yes',
                'label'         => esc_html__('Logo area in grid', 'medigroup'),
                'description'   => esc_html__('Set logo area content to be in grid', 'medigroup'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_logo_area_in_grid_header_type1_container'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_type1,
                'type'          => 'color',
                'name'          => 'logo_area_background_color_header_type1',
                'default_value' => '',
                'label'         => esc_html__('Background color', 'medigroup'),
                'description'   => esc_html__('Set background color for logo area', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_type1,
                'type'          => 'text',
                'name'          => 'logo_area_background_transparency_header_type1',
                'default_value' => '',
                'label'         => esc_html__('Background transparency', 'medigroup'),
                'description'   => esc_html__('Set background transparency for logo area', 'medigroup'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_type1,
                'type'          => 'yesno',
                'name'          => 'logo_area_border_header_type1',
                'default_value' => 'yes',
                'label'         => esc_html__('Logo Area Border', 'medigroup'),
                'description'   => esc_html__('Set border on logo area', 'medigroup'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_logo_area_border_header_type1_container'
                )
            )
        );

        $logo_area_border_header_type1_container = medigroup_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_type1,
                'name'            => 'logo_area_border_header_type1_container',
                'hidden_property' => 'logo_area_border_header_type1',
                'hidden_value'    => 'no'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $logo_area_border_header_type1_container,
                'type'          => 'color',
                'name'          => 'logo_area_border_color_header_type1',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'medigroup'),
                'description'   => esc_html__('Set border color for logo area', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $logo_area_border_header_type1_container,
                'type'          => 'text',
                'name'          => 'logo_area_border_color_transparency_header_type1',
                'default_value' => '',
                'label'         => esc_html__('Border Transparency', 'medigroup'),
                'description'   => esc_html__('Set border color transparency for logo area', 'medigroup'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_type1,
                'type'          => 'text',
                'name'          => 'logo_area_height_header_type1',
                'default_value' => '',
                'label'         => esc_html__('Height', 'medigroup'),
                'description'   => esc_html__('Enter logo area height (default is 96px)', 'medigroup'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_section_title(
            array(
                'parent' => $panel_header_type1,
                'name'   => 'menu_area_title',
                'title'  => esc_html__('Menu Area', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_type1,
                'type'          => 'yesno',
                'name'          => 'menu_area_in_grid_header_type1',
                'default_value' => 'yes',
                'label'         => esc_html__('Menu area in grid', 'medigroup'),
                'description'   => esc_html__('Set menu area content to be in grid', 'medigroup'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_in_grid_header_type1_container'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_type1,
                'type'          => 'color',
                'name'          => 'menu_area_background_color_header_type1',
                'default_value' => '',
                'label'         => esc_html__('Background color', 'medigroup'),
                'description'   => esc_html__('Set background color for menu area', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_type1,
                'type'          => 'text',
                'name'          => 'menu_area_background_transparency_header_type1',
                'default_value' => '',
                'label'         => esc_html__('Background transparency', 'medigroup'),
                'description'   => esc_html__('Set background transparency for menu area', 'medigroup'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

//

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_type1,
                'type'          => 'yesno',
                'name'          => 'menu_area_border_header_type1',
                'default_value' => 'yes',
                'label'         => esc_html__('Menu Area Border', 'medigroup'),
                'description'   => esc_html__('Set border on menu area', 'medigroup'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_border_header_type1_container'
                )
            )
        );

        $menu_area_border_header_type1_container = medigroup_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_type1,
                'name'            => 'menu_area_border_header_type1_container',
                'hidden_property' => 'menu_area_border_header_type1',
                'hidden_value'    => 'no'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_border_header_type1_container,
                'type'          => 'color',
                'name'          => 'menu_area_border_color_header_type1',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'medigroup'),
                'description'   => esc_html__('Set border color for menu area', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_border_header_type1_container,
                'type'          => 'text',
                'name'          => 'menu_area_border_color_transparency_header_type1',
                'default_value' => '',
                'label'         => esc_html__('Border Transparency', 'medigroup'),
                'description'   => esc_html__('Set border color transparency for menu area', 'medigroup'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_type1,
                'type'          => 'text',
                'name'          => 'menu_area_height_header_type1',
                'default_value' => '',
                'label'         => esc_html__('Height', 'medigroup'),
                'description'   => esc_html__('Enter menu area height (default is 60px)', 'medigroup'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        ///


        $panel_header_minimal = medigroup_mikado_add_admin_panel(
            array(
                'page'            => '_header_page',
                'name'            => 'panel_header_minimal',
                'title'           => esc_html__('Header Minimal', 'medigroup'),
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'header-type1',
                    'header-vertical'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'yesno',
                'name'          => 'menu_area_in_grid_header_minimal',
                'default_value' => 'no',
                'label'         => esc_html__('Header In Grid', 'medigroup'),
                'description'   => esc_html__('Set header content to be in grid', 'medigroup'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_in_grid_header_minimal_container'
                )
            )
        );

        $menu_area_in_grid_header_minimal_container = medigroup_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_minimal,
                'name'            => 'menu_area_in_grid_header_minimal_container',
                'hidden_property' => 'menu_area_in_grid_header_minimal',
                'hidden_value'    => 'no'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_minimal_container,
                'type'          => 'color',
                'name'          => 'menu_area_grid_background_color_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Grid Background Color', 'medigroup'),
                'description'   => esc_html__('Set grid background color for header area', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_minimal_container,
                'type'          => 'text',
                'name'          => 'menu_area_grid_background_transparency_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Grid Background Transparency', 'medigroup'),
                'description'   => esc_html__('Set grid background transparency for header', 'medigroup'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_minimal_container,
                'type'          => 'yesno',
                'name'          => 'menu_area_in_grid_border_header_minimal',
                'default_value' => 'no',
                'label'         => esc_html__('Grid Area Border', 'medigroup'),
                'description'   => esc_html__('Set border on grid area', 'medigroup'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_in_grid_border_header_minimal_container'
                )
            )
        );

        $menu_area_in_grid_border_header_minimal_container = medigroup_mikado_add_admin_container(
            array(
                'parent'          => $menu_area_in_grid_header_minimal_container,
                'name'            => 'menu_area_in_grid_border_header_minimal_container',
                'hidden_property' => 'menu_area_in_grid_border_header_minimal',
                'hidden_value'    => 'no'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_border_header_minimal_container,
                'type'          => 'color',
                'name'          => 'menu_area_in_grid_border_color_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'medigroup'),
                'description'   => esc_html__('Set border color for grid area', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'color',
                'name'          => 'menu_area_background_color_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Background color', 'medigroup'),
                'description'   => esc_html__('Set background color for header', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'text',
                'name'          => 'menu_area_background_transparency_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Background transparency', 'medigroup'),
                'description'   => esc_html__('Set background transparency for header', 'medigroup'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'yesno',
                'name'          => 'menu_area_border_header_minimal',
                'default_value' => 'yes',
                'label'         => esc_html__('Header Area Border', 'medigroup'),
                'description'   => esc_html__('Set border on header area', 'medigroup'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_border_header_minimal_container'
                )
            )
        );

        $menu_area_border_header_minimal_container = medigroup_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_minimal,
                'name'            => 'menu_area_border_header_minimal_container',
                'hidden_property' => 'menu_area_border_header_minimal',
                'hidden_value'    => 'no'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_border_header_minimal_container,
                'type'          => 'color',
                'name'          => 'menu_area_border_color_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'medigroup'),
                'description'   => esc_html__('Set border color for header area', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'text',
                'name'          => 'menu_area_height_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Height', 'medigroup'),
                'description'   => esc_html__('Enter header height (default is 92px)', 'medigroup'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        do_action('medigroup_mikado_header_options_map');


        ///


        $panel_header_vertical = medigroup_mikado_add_admin_panel(
            array(
                'page'            => '_header_page',
                'name'            => 'panel_header_vertical',
                'title'           => esc_html__('Header Vertical', 'medigroup'),
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'header-type1',
                    'header-minimal'
                )
            )
        );

        medigroup_mikado_add_admin_field(array(
            'name'        => 'vertical_header_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Background Color', 'medigroup'),
            'description' => esc_html__('Set background color for vertical menu', 'medigroup'),
            'parent'      => $panel_header_vertical
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'vertical_header_transparency',
            'type'        => 'text',
            'label'       => esc_html__('Transparency', 'medigroup'),
            'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'medigroup'),
            'parent'      => $panel_header_vertical,
            'args'        => array(
                'col_width' => 1
            )
        ));

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'vertical_header_background_image',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'medigroup'),
                'description'   => esc_html__('Set background image for vertical menu', 'medigroup'),
                'parent'        => $panel_header_vertical
            )
        );

        $panel_sticky_header = medigroup_mikado_add_admin_panel(
            array(
                'title'           => esc_html__('Sticky Header', 'medigroup'),
                'name'            => 'panel_sticky_header',
                'page'            => '_header_page',
                'hidden_property' => 'header_behaviour',
                'hidden_values'   => array(
                    'fixed-on-scroll',
                    'no-behavior'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'scroll_amount_for_sticky',
                'type'        => 'text',
                'label'       => esc_html__('Scroll Amount for Sticky', 'medigroup'),
                'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height)', 'medigroup'),
                'parent'      => $panel_sticky_header,
                'args'        => array(
                    'col_width' => 2,
                    'suffix'    => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'sticky_header_in_grid',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Sticky Header in grid', 'medigroup'),
                'description'   => esc_html__('Set sticky header content to be in grid', 'medigroup'),
                'parent'        => $panel_sticky_header,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_sticky_header_in_grid_container"
                )
            )
        );

        $sticky_header_in_grid_container = medigroup_mikado_add_admin_container(array(
            'name'            => 'sticky_header_in_grid_container',
            'parent'          => $panel_sticky_header,
            'hidden_property' => 'sticky_header_in_grid',
            'hidden_value'    => 'no'
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'sticky_header_grid_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Grid Background Color', 'medigroup'),
            'description' => esc_html__('Set grid background color for sticky header', 'medigroup'),
            'parent'      => $sticky_header_in_grid_container
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'sticky_header_grid_transparency',
            'type'        => 'text',
            'label'       => esc_html__('Sticky Header Grid Transparency', 'medigroup'),
            'description' => esc_html__('Enter transparency for sticky header grid (value from 0 to 1)', 'medigroup'),
            'parent'      => $sticky_header_in_grid_container,
            'args'        => array(
                'col_width' => 1
            )
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'sticky_header_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Background Color', 'medigroup'),
            'description' => esc_html__('Set background color for sticky header', 'medigroup'),
            'parent'      => $panel_sticky_header
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'sticky_header_transparency',
            'type'        => 'text',
            'label'       => esc_html__('Sticky Header Transparency', 'medigroup'),
            'description' => esc_html__('Enter transparency for sticky header (value from 0 to 1)', 'medigroup'),
            'parent'      => $panel_sticky_header,
            'args'        => array(
                'col_width' => 1
            )
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'sticky_header_height',
            'type'        => 'text',
            'label'       => esc_html__('Sticky Header Height', 'medigroup'),
            'description' => esc_html__('Enter height for sticky header (default is 60px)', 'medigroup'),
            'parent'      => $panel_sticky_header,
            'args'        => array(
                'col_width' => 2,
                'suffix'    => 'px'
            )
        ));

        $group_sticky_header_menu = medigroup_mikado_add_admin_group(array(
            'title'       => esc_html__('Sticky Header Menu', 'medigroup'),
            'name'        => 'group_sticky_header_menu',
            'parent'      => $panel_sticky_header,
            'description' => esc_html__('Define styles for sticky menu items', 'medigroup'),
        ));

        $row1_sticky_header_menu = medigroup_mikado_add_admin_row(array(
            'name'   => 'row1',
            'parent' => $group_sticky_header_menu
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'sticky_color',
            'type'        => 'colorsimple',
            'label'       => esc_html__('Text Color', 'medigroup'),
            'description' => '',
            'parent'      => $row1_sticky_header_menu
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'sticky_hovercolor',
            'type'        => 'colorsimple',
            'label'       => esc_html__('Hover/Active color', 'medigroup'),
            'description' => '',
            'parent'      => $row1_sticky_header_menu
        ));

        $row2_sticky_header_menu = medigroup_mikado_add_admin_row(array(
            'name'   => 'row2',
            'parent' => $group_sticky_header_menu
        ));

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'sticky_google_fonts',
                'type'          => 'fontsimple',
                'label'         => esc_html__('Font Family', 'medigroup'),
                'default_value' => '-1',
                'parent'        => $row2_sticky_header_menu,
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'textsimple',
                'name'          => 'sticky_fontsize',
                'label'         => esc_html__('Font Size', 'medigroup'),
                'default_value' => '',
                'parent'        => $row2_sticky_header_menu,
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'textsimple',
                'name'          => 'sticky_lineheight',
                'label'         => esc_html__('Line height', 'medigroup'),
                'default_value' => '',
                'parent'        => $row2_sticky_header_menu,
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'selectblanksimple',
                'name'          => 'sticky_texttransform',
                'label'         => esc_html__('Text transform', 'medigroup'),
                'default_value' => '',
                'options'       => medigroup_mikado_get_text_transform_array(),
                'parent'        => $row2_sticky_header_menu
            )
        );

        $row3_sticky_header_menu = medigroup_mikado_add_admin_row(array(
            'name'   => 'row3',
            'parent' => $group_sticky_header_menu
        ));

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'selectblanksimple',
                'name'          => 'sticky_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'medigroup'),
                'options'       => medigroup_mikado_get_font_style_array(),
                'parent'        => $row3_sticky_header_menu
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'selectblanksimple',
                'name'          => 'sticky_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'medigroup'),
                'options'       => medigroup_mikado_get_font_weight_array(),
                'parent'        => $row3_sticky_header_menu
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'textsimple',
                'name'          => 'sticky_letterspacing',
                'label'         => esc_html__('Letter Spacing', 'medigroup'),
                'default_value' => '',
                'parent'        => $row3_sticky_header_menu,
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $panel_fixed_header = medigroup_mikado_add_admin_panel(
            array(
                'title'           => esc_html__('Fixed Header', 'medigroup'),
                'name'            => 'panel_fixed_header',
                'page'            => '_header_page',
                'hidden_property' => 'header_behaviour',
                'hidden_values'   => array(
                    'sticky-header-on-scroll-up',
                    'sticky-header-on-scroll-down-up',
                    'no-behavior'
                )
            )
        );

        medigroup_mikado_add_admin_field(array(
            'name'          => 'fixed_header_grid_background_color',
            'type'          => 'color',
            'default_value' => '',
            'label'         => esc_html__('Grid Background Color', 'medigroup'),
            'description'   => esc_html__('Set grid background color for fixed header', 'medigroup'),
            'parent'        => $panel_fixed_header
        ));

        medigroup_mikado_add_admin_field(array(
            'name'          => 'fixed_header_grid_transparency',
            'type'          => 'text',
            'default_value' => '',
            'label'         => esc_html__('Header Transparency Grid', 'medigroup'),
            'description'   => esc_html__('Enter transparency for fixed header grid (value from 0 to 1)', 'medigroup'),
            'parent'        => $panel_fixed_header,
            'args'          => array(
                'col_width' => 1
            )
        ));

        medigroup_mikado_add_admin_field(array(
            'name'          => 'fixed_header_background_color',
            'type'          => 'color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'medigroup'),
            'description'   => esc_html__('Set background color for fixed header', 'medigroup'),
            'parent'        => $panel_fixed_header
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'fixed_header_transparency',
            'type'        => 'text',
            'label'       => esc_html__('Header Transparency', 'medigroup'),
            'description' => esc_html__('Enter transparency for fixed header (value from 0 to 1)', 'medigroup'),
            'parent'      => $panel_fixed_header,
            'args'        => array(
                'col_width' => 1
            )
        ));


        $panel_main_menu = medigroup_mikado_add_admin_panel(
            array(
                'title'           => esc_html__('Main Menu', 'medigroup'),
                'name'            => 'panel_main_menu',
                'page'            => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values'   => array('header-vertical', 'header-minimal')
            )
        );

        medigroup_mikado_add_admin_section_title(
            array(
                'parent' => $panel_main_menu,
                'name'   => 'main_menu_area_title',
                'title'  => esc_html__('Main Menu General Settings', 'medigroup')
            )
        );

        $drop_down_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'drop_down_group',
                'title'       => esc_html__('Main Dropdown Menu', 'medigroup'),
                'description' => esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'medigroup')
            )
        );

        $drop_down_row1 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name'   => 'drop_down_row1',
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $drop_down_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $drop_down_row1,
                'type'          => 'textsimple',
                'name'          => 'dropdown_background_transparency',
                'default_value' => '',
                'label'         => esc_html__('Transparency', 'medigroup'),
            )
        );

        $drop_down_padding_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'drop_down_padding_group',
                'title'       => esc_html__('Main Dropdown Menu Padding', 'medigroup'),
                'description' => esc_html__('Choose a top/bottom padding for dropdown menu', 'medigroup')
            )
        );

        $drop_down_padding_row = medigroup_mikado_add_admin_row(
            array(
                'parent' => $drop_down_padding_group,
                'name'   => 'drop_down_padding_row',
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $drop_down_padding_row,
                'type'          => 'textsimple',
                'name'          => 'dropdown_top_padding',
                'default_value' => '',
                'label'         => esc_html__('Top Padding', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $drop_down_padding_row,
                'type'          => 'textsimple',
                'name'          => 'dropdown_bottom_padding',
                'default_value' => '',
                'label'         => esc_html__('Bottom Padding', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_main_menu,
                'type'          => 'select',
                'name'          => 'menu_dropdown_appearance',
                'default_value' => 'default',
                'label'         => esc_html__('Main Dropdown Menu Appearance', 'medigroup'),
                'description'   => esc_html__('Choose appearance for dropdown menu', 'medigroup'),
                'options'       => array(
                    'dropdown-default'           => esc_html__('Default', 'medigroup'),
                    'dropdown-slide-from-bottom' => esc_html__('Slide From Bottom', 'medigroup'),
                    'dropdown-slide-from-top'    => esc_html__('Slide From Top', 'medigroup'),
                    'dropdown-animate-height'    => esc_html__('Animate Height', 'medigroup'),
                    'dropdown-slide-from-left'   => esc_html__('Slide From Left', 'medigroup')
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_main_menu,
                'type'          => 'text',
                'name'          => 'dropdown_top_position',
                'default_value' => '',
                'label'         => esc_html__('Dropdown position', 'medigroup'),
                'description'   => esc_html__('Enter value in percentage of entire header height', 'medigroup'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => '%'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_main_menu,
                'type'          => 'yesno',
                'name'          => 'enable_wide_menu_background',
                'default_value' => 'no',
                'label'         => esc_html__('Enable Full Width Background for Wide Dropdown Type', 'medigroup'),
                'description'   => esc_html__('Enabling this option will show full width background  for wide dropdown type', 'medigroup'),
            )
        );

        $first_level_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'first_level_group',
                'title'       => esc_html__('1st Level Menu', 'medigroup'),
                'description' => esc_html__('Define styles for 1st level in Top Navigation Menu', 'medigroup')
            )
        );

        $first_level_row1 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row1'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'menu_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'menu_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Hover Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'menu_activecolor',
                'default_value' => '',
                'label'         => esc_html__('Active Text Color', 'medigroup'),
            )
        );

        $first_level_row2 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row2',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row2,
                'type'          => 'colorsimple',
                'name'          => 'menu_text_background_color',
                'default_value' => '',
                'label'         => esc_html__('Text Background Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row2,
                'type'          => 'colorsimple',
                'name'          => 'menu_hover_background_color',
                'default_value' => '',
                'label'         => esc_html__('Hover Text Background Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row2,
                'type'          => 'colorsimple',
                'name'          => 'menu_active_background_color',
                'default_value' => '',
                'label'         => esc_html__('Active Text Background Color', 'medigroup'),
            )
        );

        $first_level_row3 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row3',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'colorsimple',
                'name'          => 'menu_light_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Light Menu Hover Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'colorsimple',
                'name'          => 'menu_light_activecolor',
                'default_value' => '',
                'label'         => esc_html__('Light Menu Active Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'colorsimple',
                'name'          => 'menu_light_border_color',
                'default_value' => '',
                'label'         => esc_html__('Light Menu Border Hover/Active Color', 'medigroup'),
            )
        );

        $first_level_row4 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row4',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row4,
                'type'          => 'colorsimple',
                'name'          => 'menu_dark_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Dark Menu Hover Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row4,
                'type'          => 'colorsimple',
                'name'          => 'menu_dark_activecolor',
                'default_value' => '',
                'label'         => esc_html__('Dark Menu Active Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row4,
                'type'          => 'colorsimple',
                'name'          => 'menu_dark_border_color',
                'default_value' => '',
                'label'         => esc_html__('Dark Menu Border Hover/Active Color', 'medigroup'),
            )
        );

        $first_level_row5 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row5',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row5,
                'type'          => 'fontsimple',
                'name'          => 'menu_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row5,
                'type'          => 'textsimple',
                'name'          => 'menu_fontsize',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row5,
                'type'          => 'textsimple',
                'name'          => 'menu_hover_background_color_transparency',
                'default_value' => '',
                'label'         => esc_html__('Hover Background Color Transparency', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row5,
                'type'          => 'textsimple',
                'name'          => 'menu_active_background_color_transparency',
                'default_value' => '',
                'label'         => esc_html__('Active Background Color Transparency', 'medigroup'),
            )
        );

        $first_level_row6 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row6',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row6,
                'type'          => 'selectblanksimple',
                'name'          => 'menu_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'medigroup'),
                'options'       => medigroup_mikado_get_font_style_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row6,
                'type'          => 'selectblanksimple',
                'name'          => 'menu_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'medigroup'),
                'options'       => medigroup_mikado_get_font_weight_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row6,
                'type'          => 'textsimple',
                'name'          => 'menu_letterspacing',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row6,
                'type'          => 'selectblanksimple',
                'name'          => 'menu_texttransform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'medigroup'),
                'options'       => medigroup_mikado_get_text_transform_array()
            )
        );

        $first_level_row7 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row7',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row7,
                'type'          => 'textsimple',
                'name'          => 'menu_lineheight',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row7,
                'type'          => 'textsimple',
                'name'          => 'menu_padding_left_right',
                'default_value' => '',
                'label'         => esc_html__('Padding Left/Right', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row7,
                'type'          => 'textsimple',
                'name'          => 'menu_margin_left_right',
                'default_value' => '',
                'label'         => esc_html__('Margin Left/Right', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'second_level_group',
                'title'       => esc_html__('2nd Level Menu', 'medigroup'),
                'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu', 'medigroup')
            )
        );

        $second_level_row1 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name'   => 'second_level_row1'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Color', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_background_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Background Color', 'medigroup')
            )
        );

        $second_level_row2 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name'   => 'second_level_row2',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row2,
                'type'          => 'fontsimple',
                'name'          => 'dropdown_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_fontsize',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_lineheight',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_padding_top_bottom',
                'default_value' => '',
                'label'         => esc_html__('Padding Top/Bottom', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_row3 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name'   => 'second_level_row3',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font style', 'medigroup'),
                'options'       => medigroup_mikado_get_font_style_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font weight', 'medigroup'),
                'options'       => medigroup_mikado_get_font_weight_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'textsimple',
                'name'          => 'dropdown_letterspacing',
                'default_value' => '',
                'label'         => esc_html__('Letter spacing', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_texttransform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'medigroup'),
                'options'       => medigroup_mikado_get_text_transform_array()
            )
        );

        $second_level_wide_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'second_level_wide_group',
                'title'       => esc_html__('2nd Level Wide Menu', 'medigroup'),
                'description' => esc_html__('Define styles for 2nd level in Wide Menu', 'medigroup')
            )
        );

        $second_level_wide_row1 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $second_level_wide_group,
                'name'   => 'second_level_wide_row1'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Color', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_background_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Background Color', 'medigroup')
            )
        );

        $second_level_wide_row2 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $second_level_wide_group,
                'name'   => 'second_level_wide_row2',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row2,
                'type'          => 'fontsimple',
                'name'          => 'dropdown_wide_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_fontsize',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_lineheight',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_padding_top_bottom',
                'default_value' => '',
                'label'         => esc_html__('Padding Top/Bottom', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_wide_row3 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $second_level_wide_group,
                'name'   => 'second_level_wide_row3',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font style', 'medigroup'),
                'options'       => medigroup_mikado_get_font_style_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font weight', 'medigroup'),
                'options'       => medigroup_mikado_get_font_weight_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row3,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_letterspacing',
                'default_value' => '',
                'label'         => esc_html__('Letter spacing', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_texttransform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'medigroup'),
                'options'       => medigroup_mikado_get_text_transform_array()
            )
        );

        $third_level_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'third_level_group',
                'title'       => esc_html__('3nd Level Menu', 'medigroup'),
                'description' => esc_html__('Define styles for 3nd level in Top Navigation Menu', 'medigroup')
            )
        );

        $third_level_row1 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $third_level_group,
                'name'   => 'third_level_row1'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_color_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_hovercolor_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Color', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_background_hovercolor_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Background Color', 'medigroup')
            )
        );

        $third_level_row2 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $third_level_group,
                'name'   => 'third_level_row2',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row2,
                'type'          => 'fontsimple',
                'name'          => 'dropdown_google_fonts_thirdlvl',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_fontsize_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_lineheight_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $third_level_row3 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $third_level_group,
                'name'   => 'third_level_row3',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_fontstyle_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font style', 'medigroup'),
                'options'       => medigroup_mikado_get_font_style_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_fontweight_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font weight', 'medigroup'),
                'options'       => medigroup_mikado_get_font_weight_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => 'dropdown_letterspacing_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Letter spacing', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_texttransform_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'medigroup'),
                'options'       => medigroup_mikado_get_text_transform_array()
            )
        );


        /***********************************************************/
        $third_level_wide_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'third_level_wide_group',
                'title'       => esc_html__('3rd Level Wide Menu', 'medigroup'),
                'description' => esc_html__('Define styles for 3rd level in Wide Menu', 'medigroup')
            )
        );

        $third_level_wide_row1 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $third_level_wide_group,
                'name'   => 'third_level_wide_row1'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_color_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_hovercolor_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Color', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_background_hovercolor_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Background Color', 'medigroup')
            )
        );

        $third_level_wide_row2 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $third_level_wide_group,
                'name'   => 'third_level_wide_row2',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row2,
                'type'          => 'fontsimple',
                'name'          => 'dropdown_wide_google_fonts_thirdlvl',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_fontsize_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_lineheight_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $third_level_wide_row3 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $third_level_wide_group,
                'name'   => 'third_level_wide_row3',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_fontstyle_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font style', 'medigroup'),
                'options'       => medigroup_mikado_get_font_style_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_fontweight_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font weight', 'medigroup'),
                'options'       => medigroup_mikado_get_font_weight_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row3,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_letterspacing_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Letter spacing', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_texttransform_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'medigroup'),
                'options'       => medigroup_mikado_get_text_transform_array()
            )
        );

        $panel_vertical_main_menu = medigroup_mikado_add_admin_panel(
            array(
                'title'           => esc_html__('Vertical Main Menu', 'medigroup'),
                'name'            => 'panel_vertical_main_menu',
                'page'            => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values'   => array(
                    'header-type1',
                    'header-minimal'
                )
            )
        );

        $drop_down_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $panel_vertical_main_menu,
                'name'        => 'vertical_drop_down_group',
                'title'       => esc_html__('Main Dropdown Menu', 'medigroup'),
                'description' => esc_html__('Set a style for dropdown menu', 'medigroup')
            )
        );

        $vertical_drop_down_row1 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name'   => 'mkd_drop_down_row1',
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $vertical_drop_down_row1,
                'type'          => 'colorsimple',
                'name'          => 'vertical_dropdown_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'medigroup'),
            )
        );

        $group_vertical_first_level = medigroup_mikado_add_admin_group(array(
            'name'        => 'group_vertical_first_level',
            'title'       => esc_html__('1st level', 'medigroup'),
            'description' => esc_html__('Define styles for 1st level menu', 'medigroup'),
            'parent'      => $panel_vertical_main_menu
        ));

        $row_vertical_first_level_1 = medigroup_mikado_add_admin_row(array(
            'name'   => 'row_vertical_first_level_1',
            'parent' => $group_vertical_first_level
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_1st_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'medigroup'),
            'parent'        => $row_vertical_first_level_1
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_1st_hover_color',
            'default_value' => '',
            'label'         => esc_html__('Hover/Active Color', 'medigroup'),
            'parent'        => $row_vertical_first_level_1
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_1st_fontsize',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'medigroup'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_first_level_1
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_1st_lineheight',
            'default_value' => '',
            'label'         => esc_html__('Line Height', 'medigroup'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_first_level_1
        ));

        $row_vertical_first_level_2 = medigroup_mikado_add_admin_row(array(
            'name'   => 'row_vertical_first_level_2',
            'parent' => $group_vertical_first_level,
            'next'   => true
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_1st_texttransform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'medigroup'),
            'options'       => medigroup_mikado_get_text_transform_array(),
            'parent'        => $row_vertical_first_level_2
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'fontsimple',
            'name'          => 'vertical_menu_1st_google_fonts',
            'default_value' => '-1',
            'label'         => esc_html__('Font Family', 'medigroup'),
            'parent'        => $row_vertical_first_level_2
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_1st_fontstyle',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'medigroup'),
            'options'       => medigroup_mikado_get_font_style_array(),
            'parent'        => $row_vertical_first_level_2
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_1st_fontweight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'medigroup'),
            'options'       => medigroup_mikado_get_font_weight_array(),
            'parent'        => $row_vertical_first_level_2
        ));

        $row_vertical_first_level_3 = medigroup_mikado_add_admin_row(array(
            'name'   => 'row_vertical_first_level_3',
            'parent' => $group_vertical_first_level,
            'next'   => true
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_1st_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'medigroup'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_first_level_3
        ));

        $group_vertical_second_level = medigroup_mikado_add_admin_group(array(
            'name'        => 'group_vertical_second_level',
            'title'       => esc_html__('2nd level', 'medigroup'),
            'description' => esc_html__('Define styles for 2nd level menu', 'medigroup'),
            'parent'      => $panel_vertical_main_menu
        ));

        $row_vertical_second_level_1 = medigroup_mikado_add_admin_row(array(
            'name'   => 'row_vertical_second_level_1',
            'parent' => $group_vertical_second_level
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_2nd_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'medigroup'),
            'parent'        => $row_vertical_second_level_1
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_2nd_hover_color',
            'default_value' => '',
            'label'         => esc_html__('Hover/Active Color', 'medigroup'),
            'parent'        => $row_vertical_second_level_1
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_2nd_fontsize',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'medigroup'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_second_level_1
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_2nd_lineheight',
            'default_value' => '',
            'label'         => esc_html__('Line Height', 'medigroup'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_second_level_1
        ));

        $row_vertical_second_level_2 = medigroup_mikado_add_admin_row(array(
            'name'   => 'row_vertical_second_level_2',
            'parent' => $group_vertical_second_level,
            'next'   => true
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_2nd_texttransform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'medigroup'),
            'options'       => medigroup_mikado_get_text_transform_array(),
            'parent'        => $row_vertical_second_level_2
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'fontsimple',
            'name'          => 'vertical_menu_2nd_google_fonts',
            'default_value' => '-1',
            'label'         => esc_html__('Font Family', 'medigroup'),
            'parent'        => $row_vertical_second_level_2
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_2nd_fontstyle',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'medigroup'),
            'options'       => medigroup_mikado_get_font_style_array(),
            'parent'        => $row_vertical_second_level_2
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_2nd_fontweight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'medigroup'),
            'options'       => medigroup_mikado_get_font_weight_array(),
            'parent'        => $row_vertical_second_level_2
        ));

        $row_vertical_second_level_3 = medigroup_mikado_add_admin_row(array(
            'name'   => 'row_vertical_second_level_3',
            'parent' => $group_vertical_second_level,
            'next'   => true
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_2nd_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'medigroup'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_second_level_3
        ));

        $group_vertical_third_level = medigroup_mikado_add_admin_group(array(
            'name'        => 'group_vertical_third_level',
            'title'       => esc_html__('3rd level', 'medigroup'),
            'description' => esc_html__('Define styles for 3rd level menu', 'medigroup'),
            'parent'      => $panel_vertical_main_menu
        ));

        $row_vertical_third_level_1 = medigroup_mikado_add_admin_row(array(
            'name'   => 'row_vertical_third_level_1',
            'parent' => $group_vertical_third_level
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_3rd_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'medigroup'),
            'parent'        => $row_vertical_third_level_1
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_3rd_hover_color',
            'default_value' => '',
            'label'         => esc_html__('Hover/Active Color', 'medigroup'),
            'parent'        => $row_vertical_third_level_1
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_3rd_fontsize',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'medigroup'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_third_level_1
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_3rd_lineheight',
            'default_value' => '',
            'label'         => esc_html__('Line Height', 'medigroup'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_third_level_1
        ));

        $row_vertical_third_level_2 = medigroup_mikado_add_admin_row(array(
            'name'   => 'row_vertical_third_level_2',
            'parent' => $group_vertical_third_level,
            'next'   => true
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_3rd_texttransform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'medigroup'),
            'options'       => medigroup_mikado_get_text_transform_array(),
            'parent'        => $row_vertical_third_level_2
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'fontsimple',
            'name'          => 'vertical_menu_3rd_google_fonts',
            'default_value' => '-1',
            'label'         => esc_html__('Font Family', 'medigroup'),
            'parent'        => $row_vertical_third_level_2
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_3rd_fontstyle',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'medigroup'),
            'options'       => medigroup_mikado_get_font_style_array(),
            'parent'        => $row_vertical_third_level_2
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_3rd_fontweight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'medigroup'),
            'options'       => medigroup_mikado_get_font_weight_array(),
            'parent'        => $row_vertical_third_level_2
        ));

        $row_vertical_third_level_3 = medigroup_mikado_add_admin_row(array(
            'name'   => 'row_vertical_third_level_3',
            'parent' => $group_vertical_third_level,
            'next'   => true
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_3rd_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'medigroup'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_third_level_3
        ));

        $panel_mobile_header = medigroup_mikado_add_admin_panel(array(
            'title' => esc_html__('Mobile header', 'medigroup'),
            'name'  => 'panel_mobile_header',
            'page'  => '_header_page'
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_header_height',
            'type'        => 'text',
            'label'       => esc_html__('Mobile Header Height', 'medigroup'),
            'description' => esc_html__('Enter height for mobile header in pixels', 'medigroup'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_header_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Mobile Header Background Color', 'medigroup'),
            'description' => esc_html__('Choose color for mobile header', 'medigroup'),
            'parent'      => $panel_mobile_header
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_menu_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Mobile Menu Background Color', 'medigroup'),
            'description' => esc_html__('Choose color for mobile menu', 'medigroup'),
            'parent'      => $panel_mobile_header
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_menu_separator_color',
            'type'        => 'color',
            'label'       => esc_html__('Mobile Menu Item Separator Color', 'medigroup'),
            'description' => esc_html__('Choose color for mobile menu horizontal separators', 'medigroup'),
            'parent'      => $panel_mobile_header
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_logo_height',
            'type'        => 'text',
            'label'       => esc_html__('Logo Height For Mobile Header', 'medigroup'),
            'description' => esc_html__('Define logo height for screen size smaller than 1000px', 'medigroup'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_logo_height_phones',
            'type'        => 'text',
            'label'       => esc_html__('Logo Height For Mobile Devices', 'medigroup'),
            'description' => esc_html__('Define logo height for screen size smaller than 480px', 'medigroup'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));

        medigroup_mikado_add_admin_section_title(array(
            'parent' => $panel_mobile_header,
            'name'   => 'mobile_header_fonts_title',
            'title'  => esc_html__('Typography', 'medigroup')
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_text_color',
            'type'        => 'color',
            'label'       => esc_html__('Navigation Text Color', 'medigroup'),
            'description' => esc_html__('Define color for mobile navigation text', 'medigroup'),
            'parent'      => $panel_mobile_header
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_text_hover_color',
            'type'        => 'color',
            'label'       => esc_html__('Navigation Hover/Active Color', 'medigroup'),
            'description' => esc_html__('Define hover/active color for mobile navigation text', 'medigroup'),
            'parent'      => $panel_mobile_header
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_font_family',
            'type'        => 'font',
            'label'       => esc_html__('Navigation Font Family', 'medigroup'),
            'description' => esc_html__('Define font family for mobile navigation text', 'medigroup'),
            'parent'      => $panel_mobile_header
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_font_size',
            'type'        => 'text',
            'label'       => esc_html__('Navigation Font Size', 'medigroup'),
            'description' => esc_html__('Define font size for mobile navigation text', 'medigroup'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_line_height',
            'type'        => 'text',
            'label'       => esc_html__('Navigation Line Height', 'medigroup'),
            'description' => esc_html__('Define line height for mobile navigation text', 'medigroup'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_text_transform',
            'type'        => 'select',
            'label'       => esc_html__('Navigation Text Transform', 'medigroup'),
            'description' => esc_html__('Define text transform for mobile navigation text', 'medigroup'),
            'parent'      => $panel_mobile_header,
            'options'     => medigroup_mikado_get_text_transform_array(true)
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_font_style',
            'type'        => 'select',
            'label'       => esc_html__('Navigation Font Style', 'medigroup'),
            'description' => esc_html__('Define font style for mobile navigation text', 'medigroup'),
            'parent'      => $panel_mobile_header,
            'options'     => medigroup_mikado_get_font_style_array(true)
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_font_weight',
            'type'        => 'select',
            'label'       => esc_html__('Navigation Font Weight', 'medigroup'),
            'description' => esc_html__('Define font weight for mobile navigation text', 'medigroup'),
            'parent'      => $panel_mobile_header,
            'options'     => medigroup_mikado_get_font_weight_array(true)
        ));

        medigroup_mikado_add_admin_section_title(array(
            'name'   => 'mobile_opener_panel',
            'parent' => $panel_mobile_header,
            'title'  => esc_html__('Mobile Menu Opener', 'medigroup')
        ));

        medigroup_mikado_add_admin_field(array(
            'name'          => 'mobile_icon_pack',
            'type'          => 'select',
            'label'         => esc_html__('Mobile Navigation Icon Pack', 'medigroup'),
            'default_value' => 'font_awesome',
            'description'   => esc_html__('Choose icon pack for mobile navigation icon', 'medigroup'),
            'parent'        => $panel_mobile_header,
            'options'       => medigroup_mikado_icon_collections()->getIconCollectionsExclude(array(
                'linea_icons',
                'simple_line_icons'
            ))
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_icon_color',
            'type'        => 'color',
            'label'       => esc_html__('Mobile Navigation Icon Color', 'medigroup'),
            'description' => esc_html__('Choose color for icon header', 'medigroup'),
            'parent'      => $panel_mobile_header
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_icon_hover_color',
            'type'        => 'color',
            'label'       => esc_html__('Mobile Navigation Icon Hover Color', 'medigroup'),
            'description' => esc_html__('Choose hover color for mobile navigation icon ', 'medigroup'),
            'parent'      => $panel_mobile_header
        ));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'mobile_icon_size',
            'type'        => 'text',
            'label'       => esc_html__('Mobile Navigation Icon size', 'medigroup'),
            'description' => esc_html__('Choose size for mobile navigation icon ', 'medigroup'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));
    }

    add_action('medigroup_mikado_options_map', 'medigroup_mikado_header_options_map', 3);

}