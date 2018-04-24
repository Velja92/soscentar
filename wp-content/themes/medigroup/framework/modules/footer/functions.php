<?php

if(!function_exists('medigroup_mikado_get_footer_classes')) {
    /**
     * Return all footer classes
     *
     * @param $page_id
     *
     * @return string|void
     */
    function medigroup_mikado_get_footer_classes($page_id) {

        $footer_classes       = '';
        $footer_classes_array = array('mkd-page-footer');

        //is uncovering footer option set in theme options?
        if(medigroup_mikado_options()->getOptionValue('uncovering_footer') == 'yes') {
            $footer_classes_array[] = 'mkd-footer-uncover';
        }

        if(get_post_meta($page_id, 'mkd_disable_footer_meta', true) == 'yes') {
            $footer_classes_array[] = 'mkd-disable-footer';
        }

        //is some class added to footer classes array?
        if(is_array($footer_classes_array) && count($footer_classes_array)) {
            //concat all classes and prefix it with class attribute
            $footer_classes = esc_attr(implode(' ', $footer_classes_array));
        }

        return $footer_classes;

    }

}

if(!function_exists('medigroup_mikado_get_footer_top_border')) {
    /**
     * Return HTML for footer top border
     *
     * @return string
     */
    function medigroup_mikado_get_footer_top_border() {

        $footer_top_border = '';

        if(medigroup_mikado_options()->getOptionValue('footer_top_border_color')) {
            if(medigroup_mikado_options()->getOptionValue('footer_top_border_width') !== '') {
                $footer_border_height = medigroup_mikado_options()->getOptionValue('footer_top_border_width');
            } else {
                $footer_border_height = '1';
            }

            $footer_top_border = 'height: '.esc_attr($footer_border_height).'px; background-color: '.esc_attr(medigroup_mikado_options()->getOptionValue('footer_top_border_color')).';';
        }

        return $footer_top_border;
    }
}

if(!function_exists('medigroup_mikado_get_footer_bottom_border')) {
    /**
     * Return HTML for footer bottom border top
     *
     * @return string
     */
    function medigroup_mikado_get_footer_bottom_border() {

        $footer_bottom_border = '';

        if(medigroup_mikado_options()->getOptionValue('footer_bottom_border_color')) {
            if(medigroup_mikado_options()->getOptionValue('footer_bottom_border_width') !== '') {
                $footer_border_height = medigroup_mikado_options()->getOptionValue('footer_bottom_border_width');
            } else {
                $footer_border_height = '1';
            }

            $footer_bottom_border = 'height: '.esc_attr($footer_border_height).'px; background-color: '.esc_attr(medigroup_mikado_options()->getOptionValue('footer_bottom_border_color')).';';
        }

        return $footer_bottom_border;
    }
}


if(!function_exists('medigroup_mikado_get_footer_bottom_bottom_border')) {
    /**
     * Return HTML for footer bottom border bottom
     *
     * @return string
     */
    function medigroup_mikado_get_footer_bottom_bottom_border() {

        $footer_bottom_border = '';

        if(medigroup_mikado_options()->getOptionValue('footer_bottom_border_bottom_color')) {
            if(medigroup_mikado_options()->getOptionValue('footer_bottom_border_bottom_width') !== '') {
                $footer_border_height = medigroup_mikado_options()->getOptionValue('footer_bottom_border_bottom_width');
            } else {
                $footer_border_height = '1';
            }

            $footer_bottom_border = 'height: '.esc_attr($footer_border_height).'px; background-color: '.esc_attr(medigroup_mikado_options()->getOptionValue('footer_bottom_border_bottom_color')).';';
        }

        return $footer_bottom_border;
    }
}

if(!function_exists('medigroup_mikado_footer_top_classes')) {
    /**
     * Return classes for footer top
     *
     * @return string
     */
    function medigroup_mikado_footer_top_classes() {

        $footer_top_classes = array();

        if(medigroup_mikado_options()->getOptionValue('footer_in_grid') != 'yes') {
            $footer_top_classes[] = 'mkd-footer-top-full';
        }

        //footer aligment
        if(medigroup_mikado_options()->getOptionValue('footer_top_columns_alignment') != '') {
            $footer_top_classes[] = 'mkd-footer-top-aligment-'.medigroup_mikado_options()->getOptionValue('footer_top_columns_alignment');
        }


        return implode(' ', $footer_top_classes);
    }

}

if(!function_exists('medigroup_mikado_footer_body_classes')) {
    /**
     * @param $classes
     *
     * @return array
     */
    function medigroup_mikado_footer_body_classes($classes) {
        $background_image     = medigroup_mikado_get_meta_field_intersect('footer_background_image', medigroup_mikado_get_page_id());
        $enable_image_on_page = get_post_meta(medigroup_mikado_get_page_id(), 'mkd_enable_footer_image_meta', true);
        $is_footer_full_width = medigroup_mikado_options()->getOptionValue('footer_in_grid') !== 'yes';

        if($background_image !== '' && $enable_image_on_page !== 'yes') {
            $classes[] = 'mkd-footer-with-bg-image';
        }

        if($is_footer_full_width) {
            $classes[] = 'mkd-fullwidth-footer';
        }

        return $classes;
    }

    add_filter('body_class', 'medigroup_mikado_footer_body_classes');
}


if(!function_exists('medigroup_mikado_footer_page_styles')) {
    /**
     * @param $style
     *
     * @return array
     */
    function medigroup_mikado_footer_page_styles($style) {
        $background_image = get_post_meta(medigroup_mikado_get_page_id(), 'mkd_footer_background_image_meta', true);
        $page_prefix      = medigroup_mikado_get_unique_page_class();

        if($background_image !== '') {
            $footer_bg_image_style_array['background-image'] = 'url('.$background_image.')';

            $style[] = medigroup_mikado_dynamic_css('body.mkd-footer-with-bg-image'.$page_prefix.' .mkd-page-footer', $footer_bg_image_style_array);
        }

        return $style;
    }

    add_filter('medigroup_mikado_add_page_custom_style', 'medigroup_mikado_footer_page_styles');
}