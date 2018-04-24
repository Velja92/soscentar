<?php

if(!function_exists('medigroup_mikado_map_portfolio_settings')) {
    function medigroup_mikado_map_portfolio_settings() {
        $meta_box = medigroup_mikado_add_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'medigroup'),
            'name'  => 'portfolio_settings_meta_box'
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'mkd_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       => esc_html__('Portfolio Type', 'medigroup'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'medigroup'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                  => esc_html__('Default', 'medigroup'),
                'small-images'      => esc_html__('Portfolio small images', 'medigroup'),
                'small-slider'      => esc_html__('Portfolio small slider', 'medigroup'),
                'big-images'        => esc_html__('Portfolio big images', 'medigroup'),
                'big-slider'        => esc_html__('Portfolio big slider', 'medigroup'),
                'custom'            => esc_html__('Portfolio custom', 'medigroup'),
                'full-width-custom' => esc_html__('Portfolio full width custom', 'medigroup'),
                'gallery'           => esc_html__('Portfolio gallery', 'medigroup')
            )
        ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label'       => esc_html__('"Back To" Link', 'medigroup'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'medigroup'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'portfolio_bottom_link',
            'type'        => 'text',
            'label'       => esc_html__('Bottom Link', 'medigroup'),
            'description' => esc_html__('This link will be displayed in Portfolio List. Leave blank to have the title behave as the link to the portfolio.', 'medigroup'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label'       => esc_html__('Portfolio External Link', 'medigroup'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'medigroup'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Masonry', 'medigroup'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'medigroup'),
            'parent'      => $meta_box,
            'options'     => array(
                'default'            => esc_html__('Default', 'medigroup'),
                'large_width'        => esc_html__('Large width', 'medigroup'),
                'large_height'       => esc_html__('Large height', 'medigroup'),
                'large_width_height' => esc_html__('Large width/height', 'medigroup')
            )
        ));
    }

    add_action('medigroup_mikado_meta_boxes_map', 'medigroup_mikado_map_portfolio_settings');
}