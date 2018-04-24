<?php

if(!function_exists('medigroup_mikado_footer_bg_image_styles')) {
    /**
     * Outputs background image styles for footer
     */
    function medigroup_mikado_footer_bg_image_styles() {
        $background_image = medigroup_mikado_options()->getOptionValue('footer_background_image');

        if($background_image !== '') {
            $footer_bg_image_styles['background-image'] = 'url('.$background_image.')';

            echo medigroup_mikado_dynamic_css('body.mkd-footer-with-bg-image .mkd-page-footer', $footer_bg_image_styles);
        }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_footer_bg_image_styles');
}
