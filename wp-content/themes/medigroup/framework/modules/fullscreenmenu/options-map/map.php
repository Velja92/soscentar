<?php

if(!function_exists('medigroup_mikado_fullscreen_menu_options_map')) {

    function medigroup_mikado_fullscreen_menu_options_map() {

        $fullscreen_panel = medigroup_mikado_add_admin_panel(
            array(
                'title'           => esc_html__('Fullscreen Menu', 'medigroup'),
                'name'            => 'panel_fullscreen_menu',
                'page'            => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'header-standard',
                    'header-vertical'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'select',
                'name'          => 'fullscreen_menu_animation_style',
                'default_value' => 'fade-push-text-right',
                'label'         => esc_html__('Fullscreen Menu Overlay Animation', 'medigroup'),
                'description'   => esc_html__('Choose animation type for fullscreen menu overlay', 'medigroup'),
                'options'       => array(
                    'fade-push-text-right' => esc_html__('Fade Push Text Right', 'medigroup'),
                    'fade-push-text-top'   => esc_html__('Fade Push Text Top', 'medigroup'),
                    'fade-text-scaledown'  => esc_html__('Fade Text Scaledown', 'medigroup')
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'image',
                'name'          => 'fullscreen_logo',
                'default_value' => '',
                'label'         => esc_html__('Logo in Fullscreen Menu Overlay', 'medigroup'),
                'description'   => esc_html__('Place logo in top left corner of fullscreen menu overlay', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'yesno',
                'name'          => 'fullscreen_in_grid',
                'default_value' => 'no',
                'label'         => esc_html__('Fullscreen Menu in Grid', 'medigroup'),
                'description'   => esc_html__('Enabling this option will put fullscreen menu content in grid', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'selectblank',
                'name'          => 'fullscreen_alignment',
                'default_value' => '',
                'label'         => esc_html__('Fullscreen Menu Alignment', 'medigroup'),
                'description'   => esc_html__('Choose alignment for fullscreen menu content', 'medigroup'),
                'options'       => array(
                    "left"   => esc_html__("Left", 'medigroup'),
                    "center" => esc_html__("Center", 'medigroup'),
                    "right"  => esc_html__("Right", 'medigroup'),
                )
            )
        );

        $background_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'background_group',
                'title'       => esc_html__('Background', 'medigroup'),
                'description' => esc_html__('Select a background color and transparency for Fullscreen Menu (0 = fully transparent, 1 = opaque)', 'medigroup')

            )
        );

        $background_group_row = medigroup_mikado_add_admin_row(
            array(
                'parent' => $background_group,
                'name'   => 'background_group_row'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $background_group_row,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $background_group_row,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_background_transparency',
                'default_value' => '',
                'label'         => esc_html__('Transparency (values:0-1)', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'image',
                'name'          => 'fullscreen_menu_background_image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'medigroup'),
                'description'   => esc_html__('Choose a background image for Fullscreen Menu background', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'image',
                'name'          => 'fullscreen_menu_pattern_image',
                'default_value' => '',
                'label'         => esc_html__('Pattern Background Image', 'medigroup'),
                'description'   => esc_html__('Choose a pattern image for Fullscreen Menu background', 'medigroup')
            )
        );

//1st level style group
        $first_level_style_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'first_level_style_group',
                'title'       => esc_html__('1st Level Style', 'medigroup'),
                'description' => esc_html__('Define styles for 1st level in Fullscreen Menu', 'medigroup')
            )
        );

        $first_level_style_row1 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $first_level_style_group,
                'name'   => 'first_level_style_row1'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_color',
                'default_value' => '',
                'label'         => esc_html__('Hover Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_active_color',
                'default_value' => '',
                'label'         => esc_html__('Active Text Color', 'medigroup'),
            )
        );

        $first_level_style_row2 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $first_level_style_group,
                'name'   => 'first_level_style_row2'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row2,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Hover Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row2,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_active_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Active Color', 'medigroup'),
            )
        );

        $first_level_style_row3 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $first_level_style_group,
                'name'   => 'first_level_style_row3'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row3,
                'type'          => 'fontsimple',
                'name'          => 'fullscreen_menu_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row3,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_fontsize',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row3,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_lineheight',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $first_level_style_row4 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $first_level_style_group,
                'name'   => 'first_level_style_row4'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row4,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'medigroup'),
                'options'       => medigroup_mikado_get_font_style_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row4,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'medigroup'),
                'options'       => medigroup_mikado_get_font_weight_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row4,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_letterspacing',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $first_level_style_row4,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_texttransform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'medigroup'),
                'options'       => medigroup_mikado_get_text_transform_array()
            )
        );

//2nd level style group
        $second_level_style_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'second_level_style_group',
                'title'       => esc_html__('2nd Level Style', 'medigroup'),
                'description' => esc_html__('Define styles for 2nd level in Fullscreen Menu', 'medigroup')
            )
        );

        $second_level_style_row1 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $second_level_style_group,
                'name'   => 'second_level_style_row1'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_color_2nd',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_color_2nd',
                'default_value' => '',
                'label'         => esc_html__('Hover Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_background_color_2nd',
                'default_value' => '',
                'label'         => esc_html__('Background Hover Color', 'medigroup'),
            )
        );

        $second_level_style_row2 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $second_level_style_group,
                'name'   => 'second_level_style_row2'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row2,
                'type'          => 'fontsimple',
                'name'          => 'fullscreen_menu_google_fonts_2nd',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row2,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_fontsize_2nd',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row2,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_lineheight_2nd',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_style_row3 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $second_level_style_group,
                'name'   => 'second_level_style_row3'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontstyle_2nd',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'medigroup'),
                'options'       => medigroup_mikado_get_font_style_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontweight_2nd',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'medigroup'),
                'options'       => medigroup_mikado_get_font_weight_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row3,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_letterspacing_2nd',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $second_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_texttransform_2nd',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'medigroup'),
                'options'       => medigroup_mikado_get_text_transform_array()
            )
        );

        $third_level_style_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'third_level_style_group',
                'title'       => esc_html__('3rd Level Style', 'medigroup'),
                'description' => esc_html__('Define styles for 3rd level in Fullscreen Menu', 'medigroup')
            )
        );

        $third_level_style_row1 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $third_level_style_group,
                'name'   => 'third_level_style_row1'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_color_3rd',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_color_3rd',
                'default_value' => '',
                'label'         => esc_html__('Hover Text Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'fullscreen_menu_hover_background_color_3rd',
                'default_value' => '',
                'label'         => esc_html__('Background Hover Color', 'medigroup'),
            )
        );

        $third_level_style_row2 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $third_level_style_group,
                'name'   => 'second_level_style_row2'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row2,
                'type'          => 'fontsimple',
                'name'          => 'fullscreen_menu_google_fonts_3rd',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row2,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_fontsize_3rd',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row2,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_lineheight_3rd',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $third_level_style_row3 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $third_level_style_group,
                'name'   => 'second_level_style_row3'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontstyle_3rd',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'medigroup'),
                'options'       => medigroup_mikado_get_font_style_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_fontweight_3rd',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'medigroup'),
                'options'       => medigroup_mikado_get_font_weight_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row3,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_letterspacing_3rd',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $third_level_style_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'fullscreen_menu_texttransform_3rd',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'medigroup'),
                'options'       => medigroup_mikado_get_text_transform_array()
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'select',
                'name'          => 'fullscreen_menu_icon_size',
                'label'         => esc_html__('Fullscreen Menu Icon Size', 'medigroup'),
                'description'   => esc_html__('Choose predefined size for Fullscreen Menu icon', 'medigroup'),
                'default_value' => 'normal',
                'options'       => array(
                    'normal' => esc_html__('Normal', 'medigroup'),
                    'medium' => esc_html__('Medium', 'medigroup'),
                    'large'  => esc_html__('Large', 'medigroup')
                )

            )
        );

        $icon_colors_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'fullscreen_menu_icon_colors_group',
                'title'       => esc_html__('Full Screen Menu Icon Style', 'medigroup'),
                'description' => esc_html__('Define styles for Fullscreen Menu Icon', 'medigroup')
            )
        );

        $icon_colors_row1 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $icon_colors_group,
                'name'   => 'icon_colors_row1'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row1,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_icon_color',
                'label'  => esc_html__('Color', 'medigroup'),
            )
        );
        medigroup_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row1,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'medigroup'),
            )
        );
        $icon_colors_row2 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $icon_colors_group,
                'name'   => 'icon_colors_row2',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row2,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_light_icon_color',
                'label'  => esc_html__('Light Menu Icon Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row2,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_light_icon_hover_color',
                'label'  => esc_html__('Light Menu Icon Hover Color', 'medigroup'),
            )
        );

        $icon_colors_row3 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $icon_colors_group,
                'name'   => 'icon_colors_row3',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row3,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_dark_icon_color',
                'label'  => esc_html__('Dark Menu Icon Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row3,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_dark_icon_hover_color',
                'label'  => esc_html__('Dark Menu Icon Hover Color', 'medigroup'),
            )
        );

        $icon_colors_row4 = medigroup_mikado_add_admin_row(
            array(
                'parent' => $icon_colors_group,
                'name'   => 'icon_colors_row4',
                'next'   => true
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row4,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_icon_background_color',
                'label'  => esc_html__('Background Color', 'medigroup'),
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent' => $icon_colors_row4,
                'type'   => 'colorsimple',
                'name'   => 'fullscreen_menu_icon_background_hover_color',
                'label'  => esc_html__('Background Hover Color', 'medigroup'),
            )
        );

        $icon_spacing_group = medigroup_mikado_add_admin_group(
            array(
                'parent'      => $fullscreen_panel,
                'name'        => 'icon_spacing_group',
                'title'       => esc_html__('Full Screen Menu Icon Spacing', 'medigroup'),
                'description' => esc_html__('Define padding and margin for full screen menu icon', 'medigroup')
            )
        );

        $icon_spacing_row = medigroup_mikado_add_admin_row(
            array(
                'parent' => $icon_spacing_group,
                'name'   => 'icon_spacing_row'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_icon_padding_left',
                'default_value' => '',
                'label'         => esc_html__('Padding Left', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_icon_padding_right',
                'default_value' => '',
                'label'         => esc_html__('Padding Right', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_icon_margin_left',
                'default_value' => '',
                'label'         => esc_html__('Margin Left', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'fullscreen_menu_icon_margin_right',
                'default_value' => '',
                'label'         => esc_html__('Margin Right', 'medigroup'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

    }

    add_action('medigroup_mikado_options_map', 'medigroup_mikado_fullscreen_menu_options_map', 4);

}