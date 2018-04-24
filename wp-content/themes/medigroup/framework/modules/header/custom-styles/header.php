<?php

if(!function_exists('medigroup_mikado_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function medigroup_mikado_header_top_bar_styles() {
        global $medigroup_options;

        if($medigroup_options['top_bar_height'] !== '') {
            echo medigroup_mikado_dynamic_css('.mkd-top-bar', array('height' => $medigroup_options['top_bar_height'].'px'));
            echo medigroup_mikado_dynamic_css('.mkd-top-bar .mkd-logo-wrapper a', array('max-height' => $medigroup_options['top_bar_height'].'px'));
        }

        if($medigroup_options['top_bar_in_grid'] == 'yes') {
            $top_bar_grid_selector = '.mkd-top-bar .mkd-grid .mkd-vertical-align-containers';
            $top_bar_grid_styles   = array();
            if($medigroup_options['top_bar_grid_background_color'] !== '') {
                $grid_background_color        = $medigroup_options['top_bar_grid_background_color'];
                $grid_background_transparency = 1;

                if(medigroup_mikado_options()->getOptionValue('top_bar_grid_background_transparency')) {
                    $grid_background_transparency = medigroup_mikado_options()->getOptionValue('top_bar_grid_background_transparency');
                }

                $grid_background_color                   = medigroup_mikado_rgba_color($grid_background_color, $grid_background_transparency);
                $top_bar_grid_styles['background-color'] = $grid_background_color;
            }

            echo medigroup_mikado_dynamic_css($top_bar_grid_selector, $top_bar_grid_styles);
        }

        $background_color = medigroup_mikado_options()->getOptionValue('top_bar_background_color');
        $top_bar_styles   = array();
        if($background_color !== '') {
            $background_transparency = 1;
            if(medigroup_mikado_options()->getOptionValue('top_bar_background_transparency') !== '') {
                $background_transparency = medigroup_mikado_options()->getOptionValue('top_bar_background_transparency');
            }

            $background_color                   = medigroup_mikado_rgba_color($background_color, $background_transparency);
            $top_bar_styles['background-color'] = $background_color;
        }

        echo medigroup_mikado_dynamic_css('.mkd-top-bar', $top_bar_styles);
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_header_top_bar_styles');
}

if(!function_exists('medigroup_mikado_header_type1_logo_styles')) {
    /**
     * Generates styles for header type 1 logo
     */
    function medigroup_mikado_header_type1_logo_styles() {
        global $medigroup_options;
        $id                            = medigroup_mikado_get_page_id();
        $logo_area_header_type1_styles = array();
        $logo_link_styles              = array();
        $line_style1                   = array();
        $line_style2                   = array();
        $line_style3                   = array();
        $line_style4                   = array();


        if($medigroup_options['logo_area_background_color_header_type1'] !== '') {
            $logo_area_background_color        = $medigroup_options['logo_area_background_color_header_type1'];
            $logo_area_background_transparency = 1;

            if($medigroup_options['logo_area_background_transparency_header_type1'] !== '') {
                $logo_area_background_transparency = $medigroup_options['logo_area_background_transparency_header_type1'];
            }

            $logo_area_header_type1_styles['background-color'] = medigroup_mikado_rgba_color($logo_area_background_color, $logo_area_background_transparency);
        }

        // logo area start

        if(medigroup_mikado_options()->getOptionValue('logo_area_border_header_type1') == 'yes' &&
           medigroup_mikado_options()->getOptionValue('logo_area_border_color_header_type1') !== ''
        ) {

            $logo_border_color             = medigroup_mikado_get_meta_field_intersect('logo_area_border_color_header_type1', $id);
            $border_logo_area_transparency = medigroup_mikado_get_meta_field_intersect('logo_area_border_color_transparency_header_type1', $id);

            if($border_logo_area_transparency === '') {
                $border_logo_area_transparency = 1;
            }

            $border_logo_area_background_color_rgba = medigroup_mikado_rgba_color($logo_border_color, $border_logo_area_transparency);

            $logo_area_header_type1_styles['border-bottom'] = '1px solid '.$border_logo_area_background_color_rgba;

        }

        // logo area end

        // menu area start

        if(medigroup_mikado_options()->getOptionValue('menu_area_border_header_type1') == 'yes' &&
           medigroup_mikado_options()->getOptionValue('menu_area_border_color_header_type1') !== ''
        ) {

            $menu_area_border_color        = medigroup_mikado_get_meta_field_intersect('menu_area_border_color_header_type1', $id);
            $border_menu_area_transparency = medigroup_mikado_get_meta_field_intersect('menu_area_border_color_transparency_header_type1', $id);

            if($border_menu_area_transparency === '') {
                $border_menu_area_transparency = 1;
            }

            $border_menu_area_background_color_rgba = medigroup_mikado_rgba_color($menu_area_border_color, $border_menu_area_transparency);

            $menu_area_header_type1_styles['border-bottom'] = '1px solid '.$border_menu_area_background_color_rgba;

            $line_style1['border-left']      = '1px solid '.$border_menu_area_background_color_rgba;
            $line_style2['border-right']     = '1px solid '.$border_menu_area_background_color_rgba;
            $line_style3['border-right']     = '1px solid '.$border_menu_area_background_color_rgba;
            $line_style4['background-color'] = $border_menu_area_background_color_rgba;

        }

        //menu area end

        if($medigroup_options['logo_area_height_header_type1'] !== '') {
            $logo_area_header_type1_styles['height'] = medigroup_mikado_filter_px($medigroup_options['logo_area_height_header_type1']).'px';
            $logo_link_styles['max-height']          = medigroup_mikado_filter_px($medigroup_options['logo_area_height_header_type1']) * 0.9 .'px';
        }

        echo medigroup_mikado_dynamic_css('.mkd-header-type1 .mkd-page-header .mkd-logo-area', $logo_area_header_type1_styles);
        echo medigroup_mikado_dynamic_css('.mkd-header-type1 .mkd-page-header .mkd-menu-area', $menu_area_header_type1_styles);

        echo medigroup_mikado_dynamic_css('.mkd-header-type1 .mkd-menu-area .mkd-right-from-main-menu-widget:first-child', $line_style1);
        echo medigroup_mikado_dynamic_css('.mkd-header-type1 .mkd-menu-area .mkd-right-from-main-menu-widget', $line_style2);
        echo medigroup_mikado_dynamic_css('.mkd-header-type1 .mkd-menu-area .mkd-shopping-cart-holder', $line_style3);
        echo medigroup_mikado_dynamic_css('.mkd-page-header .mkd-sticky-header .mkd-shopping-cart-holder:after, .mkd-page-header .mkd-sticky-header .widget_mkd_search_opener:before, .mkd-page-header .mkd-sticky-header .mkd-shopping-cart-holder:before', $line_style4);

        $logo_link_selector = '.mkd-header-type1 .mkd-page-header .mkd-logo-area .mkd-logo-wrapper a';

        echo medigroup_mikado_dynamic_css($logo_link_selector, $logo_link_styles);

        $logo_area_grid_styles = array();

        echo medigroup_mikado_dynamic_css('.mkd-header-type1 .mkd-page-header .mkd-logo-area .mkd-grid .mkd-vertical-align-containers', $logo_area_grid_styles);
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_header_type1_logo_styles');
}

if(!function_exists('medigroup_mikado_header_type1_menu_area_styles')) {
    /**
     * Generates styles for header type 1 menu
     */
    function medigroup_mikado_header_type1_menu_area_styles() {
        global $medigroup_options;

        $menu_area_header_type1_styles = array();

        if($medigroup_options['menu_area_background_color_header_type1'] !== '') {
            $menu_area_background_color        = $medigroup_options['menu_area_background_color_header_type1'];
            $menu_area_background_transparency = 1;

            if($medigroup_options['menu_area_background_transparency_header_type1'] !== '') {
                $menu_area_background_transparency = $medigroup_options['menu_area_background_transparency_header_type1'];
            }

            $menu_area_header_type1_styles['background-color'] = medigroup_mikado_rgba_color($menu_area_background_color, $menu_area_background_transparency);

        }

        if($medigroup_options['menu_area_height_header_type1'] !== '') {
            $menu_area_header_type1_styles['height'] = medigroup_mikado_filter_px($medigroup_options['menu_area_height_header_type1']).'px';
        }

        echo medigroup_mikado_dynamic_css('.mkd-header-type1 .mkd-page-header .mkd-menu-area', $menu_area_header_type1_styles);

        $menu_area_grid_header_type1_styles = array();

        echo medigroup_mikado_dynamic_css('.mkd-header-type1 .mkd-page-header .mkd-menu-area .mkd-grid .mkd-vertical-align-containers', $menu_area_grid_header_type1_styles);
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_header_type1_menu_area_styles');
}

if(!function_exists('medigroup_mikado_vertical_menu_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function medigroup_mikado_vertical_menu_styles() {

        $vertical_header_styles = array();

        $vertical_header_selectors = array(
            '.mkd-header-vertical .mkd-vertical-area-background'
        );

        if(medigroup_mikado_options()->getOptionValue('vertical_header_background_color') !== '') {
            $vertical_header_styles['background-color'] = medigroup_mikado_options()->getOptionValue('vertical_header_background_color');
        }

        if(medigroup_mikado_options()->getOptionValue('vertical_header_transparency') !== '') {
            $vertical_header_styles['opacity'] = medigroup_mikado_options()->getOptionValue('vertical_header_transparency');
        }

        if(medigroup_mikado_options()->getOptionValue('vertical_header_background_image') !== '') {
            $vertical_header_styles['background-image'] = 'url('.medigroup_mikado_options()->getOptionValue('vertical_header_background_image').')';
        }


        echo medigroup_mikado_dynamic_css($vertical_header_selectors, $vertical_header_styles);
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_vertical_menu_styles');
}

if(!function_exists('medigroup_mikado_header_minimal_menu_area_styles')) {
    /**
     * Generates styles for header minimal menu
     */
    function medigroup_mikado_header_minimal_menu_area_styles() {
        global $medigroup_options;

        $menu_area_header_minimal_styles = array();

        if($medigroup_options['menu_area_background_color_header_minimal'] !== '') {
            $menu_area_background_color        = $medigroup_options['menu_area_background_color_header_minimal'];
            $menu_area_background_transparency = 1;

            if($medigroup_options['menu_area_background_transparency_header_minimal'] !== '') {
                $menu_area_background_transparency = $medigroup_options['menu_area_background_transparency_header_minimal'];
            }

            $menu_area_header_minimal_styles['background-color'] = medigroup_mikado_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if(medigroup_mikado_options()->getOptionValue('menu_area_border_header_minimal') == 'yes' &&
           medigroup_mikado_options()->getOptionValue('menu_area_border_color_header_minimal') !== ''
        ) {

            $menu_area_header_minimal_styles['border-bottom'] = '1px solid '.medigroup_mikado_options()->getOptionValue('menu_area_border_color_header_minimal');
        }

        if($medigroup_options['menu_area_height_header_minimal'] !== '') {
            $max_height = intval(medigroup_mikado_filter_px($medigroup_options['menu_area_height_header_minimal']) * 0.9).'px';
            echo medigroup_mikado_dynamic_css('.mkd-header-minimal .mkd-page-header .mkd-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_minimal_styles['height'] = medigroup_mikado_filter_px($medigroup_options['menu_area_height_header_minimal']).'px';

        }

        echo medigroup_mikado_dynamic_css('.mkd-header-minimal .mkd-page-header .mkd-menu-area', $menu_area_header_minimal_styles);

        $menu_area_grid_header_minimal_styles = array();

        if($medigroup_options['menu_area_in_grid_header_minimal'] == 'yes' && $medigroup_options['menu_area_grid_background_color_header_minimal'] !== '') {
            $menu_area_grid_background_color        = $medigroup_options['menu_area_grid_background_color_header_minimal'];
            $menu_area_grid_background_transparency = 1;

            if($medigroup_options['menu_area_grid_background_transparency_header_minimal'] !== '') {
                $menu_area_grid_background_transparency = $medigroup_options['menu_area_grid_background_transparency_header_minimal'];
            }

            $menu_area_grid_header_minimal_styles['background-color'] = medigroup_mikado_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        if(medigroup_mikado_options()->getOptionValue('menu_area_in_grid_border_header_minimal') == 'yes' &&
           medigroup_mikado_options()->getOptionValue('menu_area_in_grid_border_color_header_minimal') !== ''
        ) {

            $menu_area_grid_header_minimal_styles['border-bottom'] = '1px solid '.medigroup_mikado_options()->getOptionValue('menu_area_in_grid_border_color_header_minimal');

        } else if(medigroup_mikado_options()->getOptionValue('menu_area_in_grid_border_header_minimal') == 'no') {
            $menu_area_grid_header_minimal_styles['border'] = '0';
        }

        echo medigroup_mikado_dynamic_css('.mkd-header-minimal .mkd-page-header .mkd-menu-area .mkd-grid .mkd-vertical-align-containers', $menu_area_grid_header_minimal_styles);
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_header_minimal_menu_area_styles');
}


if(!function_exists('medigroup_mikado_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function medigroup_mikado_sticky_header_styles() {
        global $medigroup_options;

        if($medigroup_options['sticky_header_in_grid'] == 'yes' && $medigroup_options['sticky_header_grid_background_color'] !== '') {
            $sticky_header_grid_background_color        = $medigroup_options['sticky_header_grid_background_color'];
            $sticky_header_grid_background_transparency = 1;

            if($medigroup_options['sticky_header_grid_transparency'] !== '') {
                $sticky_header_grid_background_transparency = $medigroup_options['sticky_header_grid_transparency'];
            }

            echo medigroup_mikado_dynamic_css('.mkd-page-header .mkd-sticky-header .mkd-grid .mkd-vertical-align-containers', array('background-color' => medigroup_mikado_rgba_color($sticky_header_grid_background_color, $sticky_header_grid_background_transparency)));
        }

        if($medigroup_options['sticky_header_background_color'] !== '') {

            $sticky_header_background_color              = $medigroup_options['sticky_header_background_color'];
            $sticky_header_background_color_transparency = 1;

            if($medigroup_options['sticky_header_transparency'] !== '') {
                $sticky_header_background_color_transparency = $medigroup_options['sticky_header_transparency'];
            }

            echo medigroup_mikado_dynamic_css('.mkd-page-header .mkd-sticky-header .mkd-sticky-holder', array('background-color' => medigroup_mikado_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if($medigroup_options['sticky_header_height'] !== '') {
            $max_height = intval(medigroup_mikado_filter_px($medigroup_options['sticky_header_height']) * 0.9).'px';

            echo medigroup_mikado_dynamic_css('.mkd-page-header .mkd-sticky-header', array('height' => $medigroup_options['sticky_header_height'].'px'));
            echo medigroup_mikado_dynamic_css('.mkd-page-header .mkd-sticky-header .mkd-logo-wrapper a', array('max-height' => $max_height));
        }

        $sticky_menu_item_styles = array();
        if($medigroup_options['sticky_color'] !== '') {
            $sticky_menu_item_styles['color'] = $medigroup_options['sticky_color'];
        }
        if($medigroup_options['sticky_google_fonts'] !== '-1') {
            $sticky_menu_item_styles['font-family'] = medigroup_mikado_get_formatted_font_family($medigroup_options['sticky_google_fonts']);
        }
        if($medigroup_options['sticky_fontsize'] !== '') {
            $sticky_menu_item_styles['font-size'] = $medigroup_options['sticky_fontsize'].'px';
        }
        if($medigroup_options['sticky_lineheight'] !== '') {
            $sticky_menu_item_styles['line-height'] = $medigroup_options['sticky_lineheight'].'px';
        }
        if($medigroup_options['sticky_texttransform'] !== '') {
            $sticky_menu_item_styles['text-transform'] = $medigroup_options['sticky_texttransform'];
        }
        if($medigroup_options['sticky_fontstyle'] !== '') {
            $sticky_menu_item_styles['font-style'] = $medigroup_options['sticky_fontstyle'];
        }
        if($medigroup_options['sticky_fontweight'] !== '') {
            $sticky_menu_item_styles['font-weight'] = $medigroup_options['sticky_fontweight'];
        }
        if($medigroup_options['sticky_letterspacing'] !== '') {
            $sticky_menu_item_styles['letter-spacing'] = $medigroup_options['sticky_letterspacing'].'px';
        }

        $sticky_menu_item_selector = array(
            '.mkd-main-menu.mkd-sticky-nav > ul > li > a'
        );

        echo medigroup_mikado_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);

        $sticky_menu_item_hover_styles = array();
        if($medigroup_options['sticky_hovercolor'] !== '') {
            $sticky_menu_item_hover_styles['color'] = $medigroup_options['sticky_hovercolor'];
        }

        $sticky_menu_item_hover_selector = array(
            '.mkd-main-menu.mkd-sticky-nav > ul > li:hover > a',
            '.mkd-main-menu.mkd-sticky-nav > ul > li.mkd-active-item:hover > a',
            'body:not(.mkd-menu-item-first-level-bg-color) .mkd-main-menu.mkd-sticky-nav > ul > li:hover > a',
            'body:not(.mkd-menu-item-first-level-bg-color) .mkd-main-menu.mkd-sticky-nav > ul > li.mkd-active-item:hover > a'
        );

        echo medigroup_mikado_dynamic_css($sticky_menu_item_hover_selector, $sticky_menu_item_hover_styles);
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_sticky_header_styles');
}

if(!function_exists('medigroup_mikado_fixed_header_styles')) {
    /**
     * Generates styles for fixed haeder
     */
    function medigroup_mikado_fixed_header_styles() {
        global $medigroup_options;

        if($medigroup_options['fixed_header_grid_background_color'] !== '') {

            $fixed_header_grid_background_color              = $medigroup_options['fixed_header_grid_background_color'];
            $fixed_header_grid_background_color_transparency = 1;

            if($medigroup_options['fixed_header_grid_transparency'] !== '') {
                $fixed_header_grid_background_color_transparency = $medigroup_options['fixed_header_grid_transparency'];
            }

            echo medigroup_mikado_dynamic_css('.mkd-header-type1 .mkd-fixed-wrapper.fixed .mkd-grid .mkd-vertical-align-containers,
                                    .mkd-header-type3 .mkd-fixed-wrapper.fixed .mkd-grid .mkd-vertical-align-containers',
                array('background-color' => medigroup_mikado_rgba_color($fixed_header_grid_background_color, $fixed_header_grid_background_color_transparency)));
        }

        if($medigroup_options['fixed_header_background_color'] !== '') {

            $fixed_header_background_color              = $medigroup_options['fixed_header_background_color'];
            $fixed_header_background_color_transparency = 1;

            if($medigroup_options['fixed_header_transparency'] !== '') {
                $fixed_header_background_color_transparency = $medigroup_options['fixed_header_transparency'];
            }

            echo medigroup_mikado_dynamic_css('.mkd-header-type1 .mkd-fixed-wrapper.fixed .mkd-menu-area,
                                    .mkd-header-type3 .mkd-fixed-wrapper.fixed .mkd-menu-area',
                array('background-color' => medigroup_mikado_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency)));
        }

    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_fixed_header_styles');
}

if(!function_exists('medigroup_mikado_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function medigroup_mikado_main_menu_styles() {
        global $medigroup_options;

        if($medigroup_options['menu_color'] !== '' || $medigroup_options['menu_fontsize'] != '' || $medigroup_options['menu_fontstyle'] !== '' || $medigroup_options['menu_fontweight'] !== '' || $medigroup_options['menu_texttransform'] !== '' || $medigroup_options['menu_letterspacing'] !== '' || $medigroup_options['menu_google_fonts'] != "-1") { ?>
            .mkd-main-menu.mkd-default-nav > ul > li > a,
            .mkd-page-header #lang_sel > ul > li > a,
            .mkd-page-header #lang_sel_click > ul > li > a,
            .mkd-page-header #lang_sel ul > li:hover > a{
            <?php if($medigroup_options['menu_color']) { ?> color: <?php echo esc_attr($medigroup_options['menu_color']); ?>; <?php } ?>
            <?php if($medigroup_options['menu_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $medigroup_options['menu_google_fonts'])); ?>', sans-serif;
            <?php } ?>
            <?php if($medigroup_options['menu_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($medigroup_options['menu_fontsize']); ?>px; <?php } ?>
            <?php if($medigroup_options['menu_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($medigroup_options['menu_fontstyle']); ?>; <?php } ?>
            <?php if($medigroup_options['menu_fontweight'] !== '') { ?> font-weight: <?php echo esc_attr($medigroup_options['menu_fontweight']); ?>; <?php } ?>
            <?php if($medigroup_options['menu_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($medigroup_options['menu_texttransform']); ?>;  <?php } ?>
            <?php if($medigroup_options['menu_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($medigroup_options['menu_letterspacing']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($medigroup_options['menu_google_fonts'] != "-1") { ?>
            .mkd-page-header #lang_sel_list{
            font-family: '<?php echo esc_attr(str_replace('+', ' ', $medigroup_options['menu_google_fonts'])); ?>', sans-serif !important;
            }
        <?php } ?>

        <?php if($medigroup_options['menu_hovercolor'] !== '') { ?>
            .mkd-main-menu.mkd-default-nav > ul > li:hover > a,
            .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item:hover > a,
            body:not(.mkd-menu-item-first-level-bg-color) .mkd-main-menu.mkd-default-nav > ul > li:hover > a,
            body:not(.mkd-menu-item-first-level-bg-color) .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item:hover > a,
            .mkd-page-header #lang_sel ul li a:hover,
            .mkd-page-header #lang_sel_click > ul > li a:hover{
            color: <?php echo esc_attr($medigroup_options['menu_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($medigroup_options['menu_activecolor'] !== '') { ?>
            .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item > a,
            body:not(.mkd-menu-item-first-level-bg-color) .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item > a{
            color: <?php echo esc_attr($medigroup_options['menu_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($medigroup_options['menu_text_background_color'] !== '') { ?>
            .mkd-main-menu.mkd-default-nav > ul > li > a span.item_inner{
            background-color: <?php echo esc_attr($medigroup_options['menu_text_background_color']); ?>;
            }
        <?php } ?>

        <?php if($medigroup_options['menu_hover_background_color'] !== '') {
            $menu_hover_background_color = $medigroup_options['menu_hover_background_color'];

            if($medigroup_options['menu_hover_background_color_transparency'] !== '') {
                $menu_hover_background_color_rgb = medigroup_mikado_hex2rgb($menu_hover_background_color);
                $menu_hover_background_color     = 'rgba('.$menu_hover_background_color_rgb[0].', '.$menu_hover_background_color_rgb[1].', '.$menu_hover_background_color_rgb[2].', '.$medigroup_options['menu_hover_background_color_transparency'].')';
            } ?>

            .mkd-main-menu.mkd-default-nav > ul > li:hover > a span.item_inner,
            .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item:hover > a span.item_inner {
            background-color: <?php echo esc_attr($menu_hover_background_color); ?>;
            }
        <?php } ?>

        <?php if($medigroup_options['menu_active_background_color'] !== '') {
            $menu_active_background_color = $medigroup_options['menu_active_background_color'];

            if($medigroup_options['menu_active_background_color_transparency'] !== '') {
                $menu_active_background_color_rgb = medigroup_mikado_hex2rgb($menu_active_background_color);
                $menu_active_background_color     = 'rgba('.$menu_active_background_color_rgb[0].', '.$menu_active_background_color_rgb[1].', '.$menu_active_background_color_rgb[2].', '.$medigroup_options['menu_active_background_color_transparency'].')';
            }
            ?>
            .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item > a span.item_inner {
            background-color: <?php echo esc_attr($menu_active_background_color); ?>;
            }
        <?php } ?>


        <?php if($medigroup_options['menu_light_hovercolor'] !== '') { ?>
            .light .mkd-main-menu.mkd-default-nav > ul > li:hover > a,
            .light .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item:hover > a{
            color: <?php echo esc_attr($medigroup_options['menu_light_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($medigroup_options['menu_light_activecolor'] !== '') { ?>
            .light .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item > a{
            color: <?php echo esc_attr($medigroup_options['menu_light_activecolor']); ?> !important;
            }
        <?php } ?>

        <?php if($medigroup_options['menu_dark_hovercolor'] !== '') { ?>
            .dark .mkd-main-menu.mkd-default-nav > ul > li:hover > a,
            .dark .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item:hover > a{
            color: <?php echo esc_attr($medigroup_options['menu_dark_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($medigroup_options['menu_dark_activecolor'] !== '') { ?>
            .dark .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item > a{
            color: <?php echo esc_attr($medigroup_options['menu_dark_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($medigroup_options['menu_lineheight'] != "" || $medigroup_options['menu_padding_left_right'] !== '') { ?>
            .mkd-main-menu.mkd-default-nav > ul > li > a span.item_inner{
            <?php if($medigroup_options['menu_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($medigroup_options['menu_lineheight']); ?>px; <?php } ?>
            <?php if($medigroup_options['menu_padding_left_right']) { ?> padding: 0  <?php echo esc_attr($medigroup_options['menu_padding_left_right']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($medigroup_options['menu_margin_left_right'] !== '') { ?>
            .mkd-main-menu.mkd-default-nav > ul > li{
            margin: 0  <?php echo esc_attr($medigroup_options['menu_margin_left_right']); ?>px;
            }
        <?php } ?>

        <?php
        if($medigroup_options['dropdown_background_color'] != "" || $medigroup_options['dropdown_background_transparency'] != "") {

            //dropdown background and transparency styles
            $dropdown_bg_color_initial        = '#ffffff';
            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color        = $medigroup_options['dropdown_background_color'] !== "" ? $medigroup_options['dropdown_background_color'] : $dropdown_bg_color_initial;
            $dropdown_bg_transparency = $medigroup_options['dropdown_background_transparency'] !== "" ? $medigroup_options['dropdown_background_transparency'] : $dropdown_bg_transparency_initial;

            $dropdown_bg_color_rgb = medigroup_mikado_hex2rgb($dropdown_bg_color);

            ?>

            .mkd-drop-down .second .inner ul,
            .mkd-drop-down .second .inner ul,
            .mkd-drop-down .second .inner ul li ul,
            .shopping_cart_dropdown,
            li.narrow .second .inner ul,
            .mkd-main-menu.mkd-default-nav #lang_sel ul ul,
            .mkd-main-menu.mkd-default-nav #lang_sel_click  ul ul,
            .header-widget.widget_nav_menu ul ul,
            .mkd-drop-down .wide.wide_background .second{
            background-color: <?php echo esc_attr($dropdown_bg_color); ?>;
            background-color: rgba(<?php echo esc_attr($dropdown_bg_color_rgb[0]); ?>,<?php echo esc_attr($dropdown_bg_color_rgb[1]); ?>,<?php echo esc_attr($dropdown_bg_color_rgb[2]); ?>,<?php echo esc_attr($dropdown_bg_transparency); ?>);
            }

        <?php } //end dropdown background and transparency styles ?>

        <?php
        if($medigroup_options['dropdown_top_padding'] !== '') {

            if($medigroup_options['dropdown_top_padding'] !== '') {
                ?>
                li.narrow .second .inner ul,
                .mkd-drop-down .wide .second .inner > ul{
                padding-top: <?php echo esc_attr($medigroup_options['dropdown_top_padding']); ?>px;
                }
            <?php } ?>
        <?php } ?>

        <?php if($medigroup_options['dropdown_bottom_padding'] !== '') { ?>
            li.narrow .second .inner ul,
            .mkd-drop-down .wide .second .inner > ul{
            padding-bottom: <?php echo esc_attr($medigroup_options['dropdown_bottom_padding']); ?>px;
            }
        <?php } ?>

        <?php if($medigroup_options['dropdown_top_position'] !== '') { ?>
            header .mkd-drop-down .second {
            top: <?php echo esc_attr($medigroup_options['dropdown_top_position']).'%;'; ?>
            }
        <?php } ?>

        <?php if($medigroup_options['dropdown_color'] !== '' || $medigroup_options['dropdown_fontsize'] !== '' || $medigroup_options['dropdown_lineheight'] !== '' || $medigroup_options['dropdown_fontstyle'] !== '' || $medigroup_options['dropdown_fontweight'] !== '' || $medigroup_options['dropdown_google_fonts'] != "-1" || $medigroup_options['dropdown_texttransform'] !== '' || $medigroup_options['dropdown_letterspacing'] !== '') { ?>
            .mkd-drop-down .second .inner > ul > li > a,
            .mkd-drop-down .second .inner > ul > li > h4,
            .mkd-drop-down .wide .second .inner > ul > li > h4,
            .mkd-drop-down .wide .second .inner > ul > li > a,
            .mkd-drop-down .wide .second ul li ul li.menu-item-has-children > a,
            .mkd-drop-down .wide .second .inner ul li.sub ul li.menu-item-has-children > a,
            .mkd-drop-down .wide .second .inner > ul li.sub .flexslider ul li  h4 a,
            .mkd-drop-down .wide .second .inner > ul li .flexslider ul li  h4 a,
            .mkd-drop-down .wide .second .inner > ul li.sub .flexslider ul li  h4,
            .mkd-drop-down .wide .second .inner > ul li .flexslider ul li  h4,
            .mkd-main-menu.mkd-default-nav #lang_sel ul li li a,
            .mkd-main-menu.mkd-default-nav #lang_sel_click ul li ul li a,
            .mkd-main-menu.mkd-default-nav #lang_sel ul ul a,
            .mkd-main-menu.mkd-default-nav #lang_sel_click ul ul a{
            <?php if(!empty($medigroup_options['dropdown_color'])) { ?> color: <?php echo esc_attr($medigroup_options['dropdown_color']); ?>; <?php } ?>
            <?php if($medigroup_options['dropdown_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $medigroup_options['dropdown_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($medigroup_options['dropdown_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($medigroup_options['dropdown_fontsize']); ?>px; <?php } ?>
            <?php if($medigroup_options['dropdown_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($medigroup_options['dropdown_lineheight']); ?>px; <?php } ?>
            <?php if($medigroup_options['dropdown_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($medigroup_options['dropdown_fontstyle']); ?>;  <?php } ?>
            <?php if($medigroup_options['dropdown_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($medigroup_options['dropdown_fontweight']); ?>; <?php } ?>
            <?php if($medigroup_options['dropdown_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($medigroup_options['dropdown_texttransform']); ?>;  <?php } ?>
            <?php if($medigroup_options['dropdown_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($medigroup_options['dropdown_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($medigroup_options['dropdown_color'] !== '') { ?>
            .shopping_cart_dropdown ul li
            .item_info_holder .item_left a,
            .shopping_cart_dropdown ul li .item_info_holder .item_right .amount,
            .shopping_cart_dropdown .cart_bottom .subtotal_holder .total,
            .shopping_cart_dropdown .cart_bottom .subtotal_holder .total_amount{
            color: <?php echo esc_attr($medigroup_options['dropdown_color']); ?>;
            }
        <?php } ?>

        <?php if(!empty($medigroup_options['dropdown_hovercolor'])) { ?>
            .mkd-drop-down .second .inner > ul > li:hover > a,
            .mkd-drop-down .wide .second ul li ul li.menu-item-has-children:hover > a,
            .mkd-drop-down .wide .second .inner ul li.sub ul li.menu-item-has-children:hover > a,
            .mkd-main-menu.mkd-default-nav #lang_sel ul li li:hover a,
            .mkd-main-menu.mkd-default-nav #lang_sel_click ul li ul li:hover a,
            .mkd-main-menu.mkd-default-nav #lang_sel ul li:hover > a,
            .mkd-main-menu.mkd-default-nav #lang_sel_click ul li:hover > a{
            color: <?php echo esc_attr($medigroup_options['dropdown_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if(!empty($medigroup_options['dropdown_background_hovercolor'])) { ?>
            .mkd-drop-down li:not(.wide) .second .inner > ul > li:hover{
            background-color: <?php echo esc_attr($medigroup_options['dropdown_background_hovercolor']); ?>;
            }
        <?php } ?>

        <?php if(!empty($medigroup_options['dropdown_padding_top_bottom'])) { ?>
            .mkd-drop-down .wide .second>.inner>ul>li.sub>ul>li>a,
            .mkd-drop-down .second .inner ul li a,
            .mkd-drop-down .wide .second ul li a,
            .mkd-drop-down .second .inner ul.right li a{
            padding-top: <?php echo esc_attr($medigroup_options['dropdown_padding_top_bottom']); ?>px;
            padding-bottom: <?php echo esc_attr($medigroup_options['dropdown_padding_top_bottom']); ?>px;
            }
        <?php } ?>

        <?php if($medigroup_options['dropdown_wide_color'] !== '' || $medigroup_options['dropdown_wide_fontsize'] !== '' || $medigroup_options['dropdown_wide_lineheight'] !== '' || $medigroup_options['dropdown_wide_fontstyle'] !== '' || $medigroup_options['dropdown_wide_fontweight'] !== '' || $medigroup_options['dropdown_wide_google_fonts'] !== "-1" || $medigroup_options['dropdown_wide_texttransform'] !== '' || $medigroup_options['dropdown_wide_letterspacing'] !== '') { ?>
            .mkd-drop-down .wide .second .inner > ul > li > a{
            <?php if($medigroup_options['dropdown_wide_color'] !== '') { ?> color: <?php echo esc_attr($medigroup_options['dropdown_wide_color']); ?>; <?php } ?>
            <?php if($medigroup_options['dropdown_wide_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $medigroup_options['dropdown_wide_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($medigroup_options['dropdown_wide_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($medigroup_options['dropdown_wide_fontsize']); ?>px; <?php } ?>
            <?php if($medigroup_options['dropdown_wide_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($medigroup_options['dropdown_wide_lineheight']); ?>px; <?php } ?>
            <?php if($medigroup_options['dropdown_wide_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($medigroup_options['dropdown_wide_fontstyle']); ?>;  <?php } ?>
            <?php if($medigroup_options['dropdown_wide_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($medigroup_options['dropdown_wide_fontweight']); ?>; <?php } ?>
            <?php if($medigroup_options['dropdown_wide_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($medigroup_options['dropdown_wide_texttransform']); ?>;  <?php } ?>
            <?php if($medigroup_options['dropdown_wide_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($medigroup_options['dropdown_wide_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($medigroup_options['dropdown_wide_hovercolor'] !== '') { ?>
            .mkd-drop-down .wide .second .inner > ul > li:hover > a {
            color: <?php echo esc_attr($medigroup_options['dropdown_wide_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if(!empty($medigroup_options['dropdown_wide_background_hovercolor'])) { ?>
            .mkd-drop-down .wide .second .inner > ul > li:hover > a{
            background-color: <?php echo esc_attr($medigroup_options['dropdown_wide_background_hovercolor']); ?>
            }
        <?php } ?>

        <?php if($medigroup_options['dropdown_wide_padding_top_bottom'] !== '') { ?>
            .mkd-drop-down .wide .second>.inner > ul > li.sub > ul > li > a,
            .mkd-drop-down .wide .second .inner ul li a,
            .mkd-drop-down .wide .second ul li a,
            .mkd-drop-down .wide .second .inner ul.right li a{
            padding-top: <?php echo esc_attr($medigroup_options['dropdown_wide_padding_top_bottom']); ?>px;
            padding-bottom: <?php echo esc_attr($medigroup_options['dropdown_wide_padding_top_bottom']); ?>px;
            }
        <?php } ?>

        <?php if($medigroup_options['dropdown_color_thirdlvl'] !== '' || $medigroup_options['dropdown_fontsize_thirdlvl'] !== '' || $medigroup_options['dropdown_lineheight_thirdlvl'] !== '' || $medigroup_options['dropdown_fontstyle_thirdlvl'] !== '' || $medigroup_options['dropdown_fontweight_thirdlvl'] !== '' || $medigroup_options['dropdown_google_fonts_thirdlvl'] != "-1" || $medigroup_options['dropdown_texttransform_thirdlvl'] !== '' || $medigroup_options['dropdown_letterspacing_thirdlvl'] !== '') { ?>
            .mkd-drop-down .second .inner ul li.sub ul li a{
            <?php if($medigroup_options['dropdown_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($medigroup_options['dropdown_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($medigroup_options['dropdown_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $medigroup_options['dropdown_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($medigroup_options['dropdown_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($medigroup_options['dropdown_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($medigroup_options['dropdown_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($medigroup_options['dropdown_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($medigroup_options['dropdown_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($medigroup_options['dropdown_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($medigroup_options['dropdown_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($medigroup_options['dropdown_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($medigroup_options['dropdown_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($medigroup_options['dropdown_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($medigroup_options['dropdown_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($medigroup_options['dropdown_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($medigroup_options['dropdown_hovercolor_thirdlvl'] !== '') { ?>
            .mkd-drop-down .second .inner ul li.sub ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next),
            .mkd-drop-down .second .inner ul li ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next){
            color: <?php echo esc_attr($medigroup_options['dropdown_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($medigroup_options['dropdown_background_hovercolor_thirdlvl'] !== '') { ?>
            .mkd-drop-down .second .inner ul li.sub ul li:hover,
            .mkd-drop-down .second .inner ul li ul li:hover{
            background-color: <?php echo esc_attr($medigroup_options['dropdown_background_hovercolor_thirdlvl']); ?>;
            }
        <?php } ?>

        <?php if($medigroup_options['dropdown_wide_color_thirdlvl'] !== '' || $medigroup_options['dropdown_wide_fontsize_thirdlvl'] !== '' || $medigroup_options['dropdown_wide_lineheight_thirdlvl'] !== '' || $medigroup_options['dropdown_wide_fontstyle_thirdlvl'] !== '' || $medigroup_options['dropdown_wide_fontweight_thirdlvl'] !== '' || $medigroup_options['dropdown_wide_google_fonts_thirdlvl'] != "-1" || $medigroup_options['dropdown_wide_texttransform_thirdlvl'] !== '' || $medigroup_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?>
            .mkd-drop-down .wide .second .inner ul li.sub ul li a,
            .mkd-drop-down .wide .second ul li ul li a{
            <?php if($medigroup_options['dropdown_wide_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($medigroup_options['dropdown_wide_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($medigroup_options['dropdown_wide_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $medigroup_options['dropdown_wide_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($medigroup_options['dropdown_wide_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($medigroup_options['dropdown_wide_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($medigroup_options['dropdown_wide_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($medigroup_options['dropdown_wide_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($medigroup_options['dropdown_wide_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($medigroup_options['dropdown_wide_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($medigroup_options['dropdown_wide_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($medigroup_options['dropdown_wide_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($medigroup_options['dropdown_wide_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($medigroup_options['dropdown_wide_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($medigroup_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($medigroup_options['dropdown_wide_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($medigroup_options['dropdown_wide_hovercolor_thirdlvl'] !== '') { ?>
            .mkd-drop-down .wide .second .inner ul li.sub ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover,
            .mkd-drop-down .wide .second .inner ul li ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover{
            color: <?php echo esc_attr($medigroup_options['dropdown_wide_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($medigroup_options['dropdown_wide_background_hovercolor_thirdlvl'] !== '') { ?>
            .mkd-drop-down .wide .second .inner ul li.sub ul li:hover,
            .mkd-drop-down .wide .second .inner ul li ul li:hover{
            background-color: <?php echo esc_attr($medigroup_options['dropdown_wide_background_hovercolor_thirdlvl']); ?>;
            }
        <?php }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_main_menu_styles');
}

if(!function_exists('medigroup_mikado_vertical_main_menu_styles')) {
    /**
     * Generates styles for vertical main main menu
     */
    function medigroup_mikado_vertical_main_menu_styles() {
        $dropdown_styles = array();

        if(medigroup_mikado_options()->getOptionValue('vertical_dropdown_background_color') !== '') {
            $dropdown_styles['background-color'] = medigroup_mikado_options()->getOptionValue('vertical_dropdown_background_color');
        }

        $dropdown_selector = array(
            '.mkd-header-vertical .mkd-vertical-dropdown-float .menu-item .second',
            '.mkd-header-vertical .mkd-vertical-dropdown-float .second .inner ul ul'
        );

        echo medigroup_mikado_dynamic_css($dropdown_selector, $dropdown_styles);

        $fist_level_styles       = array();
        $fist_level_hover_styles = array();

        if(medigroup_mikado_options()->getOptionValue('vertical_menu_1st_color') !== '') {
            $fist_level_styles['color'] = medigroup_mikado_options()->getOptionValue('vertical_menu_1st_color');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_1st_google_fonts') !== '-1') {
            $fist_level_styles['font-family'] = medigroup_mikado_get_formatted_font_family(medigroup_mikado_options()->getOptionValue('vertical_menu_1st_google_fonts'));
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_1st_fontsize') !== '') {
            $fist_level_styles['font-size'] = medigroup_mikado_options()->getOptionValue('vertical_menu_1st_fontsize').'px';
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_1st_lineheight') !== '') {
            $fist_level_styles['line-height'] = medigroup_mikado_options()->getOptionValue('vertical_menu_1st_lineheight').'px';
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_1st_texttransform') !== '') {
            $fist_level_styles['text-transform'] = medigroup_mikado_options()->getOptionValue('vertical_menu_1st_texttransform');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_1st_fontstyle') !== '') {
            $fist_level_styles['font-style'] = medigroup_mikado_options()->getOptionValue('vertical_menu_1st_fontstyle');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_1st_fontweight') !== '') {
            $fist_level_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('vertical_menu_1st_fontweight');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_1st_letter_spacing') !== '') {
            $fist_level_styles['letter-spacing'] = medigroup_mikado_options()->getOptionValue('vertical_menu_1st_letter_spacing').'px';
        }

        if(medigroup_mikado_options()->getOptionValue('vertical_menu_1st_hover_color') !== '') {
            $fist_level_hover_styles['color'] = medigroup_mikado_options()->getOptionValue('vertical_menu_1st_hover_color');
        }

        $first_level_selector       = array(
            '.mkd-header-vertical .mkd-vertical-menu > ul > li > a'
        );
        $first_level_hover_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu > ul > li > a:hover',
            '.mkd-header-vertical .mkd-vertical-menu > ul > li > a.mkd-active-item'
        );

        echo medigroup_mikado_dynamic_css($first_level_selector, $fist_level_styles);
        echo medigroup_mikado_dynamic_css($first_level_hover_selector, $fist_level_hover_styles);

        $second_level_styles       = array();
        $second_level_hover_styles = array();

        if(medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_color') !== '') {
            $second_level_styles['color'] = medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_color');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_google_fonts') !== '-1') {
            $second_level_styles['font-family'] = medigroup_mikado_get_formatted_font_family(medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_google_fonts'));
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_fontsize') !== '') {
            $second_level_styles['font-size'] = medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_fontsize').'px';
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_lineheight') !== '') {
            $second_level_styles['line-height'] = medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_lineheight').'px';
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_texttransform') !== '') {
            $second_level_styles['text-transform'] = medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_texttransform');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_fontstyle') !== '') {
            $second_level_styles['font-style'] = medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_fontstyle');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_fontweight') !== '') {
            $second_level_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_fontweight');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_letter_spacing') !== '') {
            $second_level_styles['letter-spacing'] = medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_letter_spacing').'px';
        }

        if(medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_hover_color') !== '') {
            $second_level_hover_styles['color'] = medigroup_mikado_options()->getOptionValue('vertical_menu_2nd_hover_color');
        }

        $second_level_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu .second .inner > ul > li > a'
        );

        $second_level_hover_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu .second .inner > ul > li > a:hover',
            '.mkd-header-vertical .mkd-vertical-menu .second .inner > ul > li > a.mkd-active-item'
        );

        echo medigroup_mikado_dynamic_css($second_level_selector, $second_level_styles);
        echo medigroup_mikado_dynamic_css($second_level_hover_selector, $second_level_hover_styles);

        $third_level_styles       = array();
        $third_level_hover_styles = array();

        if(medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_color') !== '') {
            $third_level_styles['color'] = medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_color');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_google_fonts') !== '-1') {
            $third_level_styles['font-family'] = medigroup_mikado_get_formatted_font_family(medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_google_fonts'));
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_fontsize') !== '') {
            $third_level_styles['font-size'] = medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_fontsize').'px';
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_lineheight') !== '') {
            $third_level_styles['line-height'] = medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_lineheight').'px';
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_texttransform') !== '') {
            $third_level_styles['text-transform'] = medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_texttransform');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_fontstyle') !== '') {
            $third_level_styles['font-style'] = medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_fontstyle');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_fontweight') !== '') {
            $third_level_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_fontweight');
        }
        if(medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_letter_spacing') !== '') {
            $third_level_styles['letter-spacing'] = medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_letter_spacing').'px';
        }

        if(medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_hover_color') !== '') {
            $third_level_hover_styles['color'] = medigroup_mikado_options()->getOptionValue('vertical_menu_3rd_hover_color');
        }

        $third_level_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu .second .inner ul li ul li a'
        );

        $third_level_hover_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu .second .inner ul li ul li a:hover',
            '.mkd-header-vertical .mkd-vertical-menu .second .inner ul li ul li a.mkd-active-item'
        );

        echo medigroup_mikado_dynamic_css($third_level_selector, $third_level_styles);
        echo medigroup_mikado_dynamic_css($third_level_hover_selector, $third_level_hover_styles);
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_vertical_main_menu_styles');
}