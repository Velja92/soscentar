<?php

if(!function_exists('medigroup_mikado_footer_options_map')) {
    /**
     * Add footer options
     */
    function medigroup_mikado_footer_options_map() {

        medigroup_mikado_add_admin_page(
            array(
                'slug'  => '_footer_page',
                'title' => esc_html__('Footer', 'medigroup'),
                'icon'  => 'fa fa-sort-amount-asc'
            )
        );

        $footer_panel = medigroup_mikado_add_admin_panel(
            array(
                'title' => esc_html__('Footer', 'medigroup'),
                'name'  => 'footer',
                'page'  => '_footer_page'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__('Uncovering Footer', 'medigroup'),
                'description'   => esc_html__('Enabling this option will make Footer gradually appear on scroll', 'medigroup'),
                'parent'        => $footer_panel,
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'footer_background_image',
                'type'        => 'image',
                'label'       => esc_html__('Background Image', 'medigroup'),
                'description' => esc_html__('Choose Background Image for Footer Area', 'medigroup'),
                'parent'      => $footer_panel
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'footer_in_grid',
                'default_value' => 'yes',
                'label'         => esc_html__('Footer in Grid', 'medigroup'),
                'description'   => esc_html__('Enabling this option will place Footer content in grid', 'medigroup'),
                'parent'        => $footer_panel,
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'show_footer_top',
                'default_value' => 'yes',
                'label'         => esc_html__('Show Footer Top', 'medigroup'),
                'description'   => esc_html__('Enabling this option will show Footer Top area', 'medigroup'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_show_footer_top_container'
                ),
                'parent'        => $footer_panel,
            )
        );

        $show_footer_top_container = medigroup_mikado_add_admin_container(
            array(
                'name'            => 'show_footer_top_container',
                'hidden_property' => 'show_footer_top',
                'hidden_value'    => 'no',
                'parent'          => $footer_panel
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_top_columns',
                'default_value' => '4',
                'label'         => esc_html__('Footer Top Columns', 'medigroup'),
                'description'   => esc_html__('Choose number of columns for Footer Top area', 'medigroup'),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '5' => '3(25%+25%+50%)',
                    '6' => '3(50%+25%+25%)',
                    '4' => '4'
                ),
                'parent'        => $show_footer_top_container,
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_top_columns_alignment',
                'default_value' => '',
                'label'         => esc_html__('Footer Top Columns Alignment', 'medigroup'),
                'description'   => esc_html__('Text Alignment in Footer Columns', 'medigroup'),
                'options'       => array(
                    'left'   => esc_html__('Left', 'medigroup'),
                    'center' => esc_html__('Center', 'medigroup'),
                    'right'  => esc_html__('Right', 'medigroup')
                ),
                'parent'        => $show_footer_top_container,
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'show_footer_bottom',
                'default_value' => 'yes',
                'label'         => esc_html__('Show Footer Bottom', 'medigroup'),
                'description'   => esc_html__('Enabling this option will show Footer Bottom area', 'medigroup'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_show_footer_bottom_container'
                ),
                'parent'        => $footer_panel,
            )
        );

        $show_footer_bottom_container = medigroup_mikado_add_admin_container(
            array(
                'name'            => 'show_footer_bottom_container',
                'hidden_property' => 'show_footer_bottom',
                'hidden_value'    => 'no',
                'parent'          => $footer_panel
            )
        );


        medigroup_mikado_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_bottom_columns',
                'default_value' => '3',
                'label'         => esc_html__('Footer Bottom Columns', 'medigroup'),
                'description'   => esc_html__('Choose number of columns for Footer Bottom area', 'medigroup'),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3'
                ),
                'parent'        => $show_footer_bottom_container,
            )
        );

    }

    add_action('medigroup_mikado_options_map', 'medigroup_mikado_footer_options_map');

}