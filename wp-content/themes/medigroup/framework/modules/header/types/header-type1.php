<?php
namespace Medigroup\Modules\Header\Types;

use Medigroup\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Type 1 layout and option
 *
 * Class HeaderType1
 */
class HeaderType1 extends HeaderType {
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;
    protected $mobileHeaderHeight;

    /**
     * Sets slug property which is the same as value of option in DB
     */
    public function __construct() {
        $this->slug = 'header-type1';

        if(!is_admin()) {
            $logoAreaHeight       = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('logo_area_height_header_type1'));
            $this->logoAreaHeight = $logoAreaHeight !== '' ? intval($logoAreaHeight) : 96;

            $menuAreaHeight       = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('menu_area_height_header_type1'));
            $this->menuAreaHeight = $menuAreaHeight !== '' ? intval($menuAreaHeight) : 60;

            $mobileHeaderHeight       = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('mobile_header_height'));
            $this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? $mobileHeaderHeight : 100;

            add_action('wp', array($this, 'setHeaderHeightProps'));

            add_filter('medigroup_mikado_js_global_variables', array($this, 'getGlobalJSVariables'));
            add_filter('medigroup_mikado_per_page_js_vars', array($this, 'getPerPageJSVariables'));
            add_filter('medigroup_mikado_add_page_custom_style', array($this, 'headerPerPageStyles'));
        }
    }

    public function headerPerPageStyles($style) {
        $id           = medigroup_mikado_get_page_id();
        $class_prefix = medigroup_mikado_get_unique_page_class();

        $main_logo_area_style = array();
        $main_menu_area_style = array();
        $line_style1          = array();
        $line_style2          = array();
        $line_style3          = array();

        $main_logo_area_selector = array($class_prefix.'.mkd-header-type1 .mkd-logo-area');
        $main_menu_area_selector = array($class_prefix.'.mkd-header-type1 .mkd-page-header .mkd-menu-area');
        $line_selector1          = array($class_prefix.'.mkd-header-type1 .mkd-menu-area .mkd-right-from-main-menu-widget:first-child');
        $line_selector2          = array($class_prefix.'.mkd-header-type1 .mkd-menu-area .mkd-right-from-main-menu-widget');
        $line_selector3          = array($class_prefix.'.mkd-header-type1 .mkd-menu-area .mkd-shopping-cart-holder');

        /* logo area style - start */

        $logo_area_background_color        = medigroup_mikado_get_meta_field_intersect('logo_area_background_color_header_type1', $id);
        $logo_area_background_transparency = medigroup_mikado_get_meta_field_intersect('logo_area_background_transparency_header_type1', $id);
        $disable_logo_area_border          = medigroup_mikado_get_meta_field_intersect('logo_area_border_header_type1', $id) == 'no';
        $border_logo_area_transparency     = medigroup_mikado_get_meta_field_intersect('logo_area_border_color_transparency_header_type1', $id);

        if(!$disable_logo_area_border) {
            $logo_border_color = get_post_meta($id, 'mkd_logo_area_border_color_header_type1_meta', true);

            if($border_logo_area_transparency === '') {
                $border_logo_area_transparency = 1;
            }

            $border_logo_area_background_color_rgba = medigroup_mikado_rgba_color($logo_border_color, $border_logo_area_transparency);
            if($border_logo_area_background_color_rgba !== null) {
                $main_logo_area_style['border-bottom'] = '1px solid '.$border_logo_area_background_color_rgba;
            }
        }

        if($logo_area_background_transparency === '') {
            $logo_area_background_transparency = 1;
        }

        $logo_area_background_color_rgba = medigroup_mikado_rgba_color($logo_area_background_color, $logo_area_background_transparency);

        if($logo_area_background_color_rgba !== null) {
            $main_logo_area_style['background-color'] = $logo_area_background_color_rgba;
        }

        /* logo area style - end */

        /* menu area style - start */

        $menu_area_background_color        = medigroup_mikado_get_meta_field_intersect('menu_area_background_color_header_type1', $id);
        $menu_area_background_transparency = medigroup_mikado_get_meta_field_intersect('menu_area_background_transparency_header_type1', $id);
        $disable_menu_area_border          = medigroup_mikado_get_meta_field_intersect('menu_area_border_header_type1', $id) == 'no';
        $border_menu_area_transparency     = medigroup_mikado_get_meta_field_intersect('menu_area_border_color_transparency_header_type1', $id);
//
        if(!$disable_menu_area_border) {
            $menu_border_color = get_post_meta($id, 'mkd_menu_area_border_color_header_type1_meta', true);

            if($border_menu_area_transparency === '') {
                $border_menu_area_transparency = 1;
            }

            $border_menu_area_background_color_rgba = medigroup_mikado_rgba_color($menu_border_color, $border_menu_area_transparency);
            if($border_menu_area_background_color_rgba !== null) {
                $main_menu_area_style['border-bottom'] = '1px solid '.$border_menu_area_background_color_rgba;
                $line_style1['border-left']            = '1px solid '.$border_menu_area_background_color_rgba;
                $line_style2['border-right']           = '1px solid '.$border_menu_area_background_color_rgba;
                $line_style3['border-right']           = '1px solid '.$border_menu_area_background_color_rgba;
            }
        }

        //
        if($menu_area_background_transparency === '') {
            $menu_area_background_transparency = 1;
        }


        $menu_area_background_color_rgba = medigroup_mikado_rgba_color($menu_area_background_color, $menu_area_background_transparency);

        if($menu_area_background_color_rgba !== null) {
            $main_menu_area_style['background-color'] = $menu_area_background_color_rgba;
        }

        /* menu area style - end */

        $style[] = medigroup_mikado_dynamic_css($main_logo_area_selector, $main_logo_area_style);
        $style[] = medigroup_mikado_dynamic_css($main_menu_area_selector, $main_menu_area_style);
        $style[] = medigroup_mikado_dynamic_css($line_selector1, $line_style1);
        $style[] = medigroup_mikado_dynamic_css($line_selector2, $line_style2);
        $style[] = medigroup_mikado_dynamic_css($line_selector3, $line_style3);

        return $style;
    }

    /**
     * Loads template file for this header type
     *
     * @param array $parameters associative array of variables that needs to passed to template
     */
    public function loadTemplate($parameters = array()) {
        $id  = medigroup_mikado_get_page_id();

        $parameters['logo_area_in_grid'] = medigroup_mikado_get_meta_field_intersect('logo_area_in_grid_header_type1', $id) == 'yes' ? true : false;
        $parameters['menu_area_in_grid'] = medigroup_mikado_get_meta_field_intersect('menu_area_in_grid_header_type1', $id) == 'yes' ? true : false;

        $parameters = apply_filters('medigroup_mikado_header_type1_parameters', $parameters);

        medigroup_mikado_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps() {
        $this->heightOfTransparency         = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight                 = $this->calculateHeaderHeight();
        $this->mobileHeaderHeight           = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return int
     */
    public function calculateHeightOfTransparency() {
        $id                 = medigroup_mikado_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'mkd_logo_area_background_color_header_type1_meta', true) !== '') {
            $logoAreaTransparent = get_post_meta($id, 'mkd_logo_area_background_color_header_type1_meta', true) !== '' &&
                                   get_post_meta($id, 'mkd_logo_area_background_transparency_header_type1_meta', true) !== '1';
        } else {
            $logoAreaTransparent = medigroup_mikado_options()->getOptionValue('logo_area_background_color_header_type1') !== '' &&
                                   medigroup_mikado_options()->getOptionValue('logo_area_background_transparency_header_type1') !== '1';
        }

        if(get_post_meta($id, 'mkd_menu_area_background_color_header_type1_meta', true) !== '') {
            $menuAreaTransparent = get_post_meta($id, 'mkd_menu_area_background_color_header_type1_meta', true) !== '' &&
                                   get_post_meta($id, 'mkd_menu_area_background_transparency_header_type1_meta', true) !== '1';
        } else {
            $menuAreaTransparent = medigroup_mikado_options()->getOptionValue('menu_area_background_color_header_type1') !== '' &&
                                   medigroup_mikado_options()->getOptionValue('menu_area_background_transparency_header_type1') !== '1';
        }

        $sliderExists        = get_post_meta($id, 'mkd_page_slider_meta', true) !== '';
        $contentBehindHeader = get_post_meta($id, 'mkd_page_content_behind_header_meta', true) === 'yes';

        if($sliderExists || $contentBehindHeader) {
            $menuAreaTransparent = true;
            $logoAreaTransparent = true;
        }


        if($logoAreaTransparent || $menuAreaTransparent) {
            if($logoAreaTransparent) {
                $transparencyHeight = $this->logoAreaHeight + $this->menuAreaHeight;

                if(($sliderExists && medigroup_mikado_is_top_bar_enabled())
                   || medigroup_mikado_is_top_bar_enabled() && medigroup_mikado_is_top_bar_transparent()
                ) {
                    $transparencyHeight += medigroup_mikado_get_top_bar_height();
                }
            }

            if(!$logoAreaTransparent && $menuAreaTransparent) {
                $transparencyHeight = $this->menuAreaHeight;
            }
        }

        return $transparencyHeight;
    }

    /**
     * Returns height of completely transparent header parts
     *
     * @return int
     */
    public function calculateHeightOfCompleteTransparency() {
        $id                 = medigroup_mikado_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'mkd_logo_area_background_color_header_type1_meta', true) !== '') {
            $logoAreaTransparent = get_post_meta($id, 'mkd_logo_area_background_color_header_type1_meta', true) !== '' &&
                                   get_post_meta($id, 'mkd_logo_area_background_transparency_header_type1_meta', true) === '0';
        } else {
            $logoAreaTransparent = medigroup_mikado_options()->getOptionValue('logo_area_background_color_header_type1') !== '' &&
                                   medigroup_mikado_options()->getOptionValue('logo_area_background_transparency_header_type1') === '0';
        }

        if(get_post_meta($id, 'mkd_menu_area_background_color_header_type1_meta', true) !== '') {
            $menuAreaTransparent = get_post_meta($id, 'mkd_menu_area_background_color_header_type1_meta', true) !== '' &&
                                   get_post_meta($id, 'mkd_menu_area_background_transparency_type1_meta', true) === '0';
        } else {
            $menuAreaTransparent = medigroup_mikado_options()->getOptionValue('menu_area_background_color_header_type1') !== '' &&
                                   medigroup_mikado_options()->getOptionValue('menu_area_background_transparency_header_type1') === '0';
        }

        if($logoAreaTransparent || $menuAreaTransparent) {
            if($logoAreaTransparent) {
                $transparencyHeight = $this->logoAreaHeight + $this->menuAreaHeight;

                if(medigroup_mikado_is_top_bar_enabled() && medigroup_mikado_is_top_bar_completely_transparent()) {
                    $transparencyHeight += medigroup_mikado_get_top_bar_height();
                }
            }

            if(!$logoAreaTransparent && $menuAreaTransparent) {
                $transparencyHeight = $this->menuAreaHeight;
            }
        }

        return $transparencyHeight;
    }


    /**
     * Returns total height of header
     *
     * @return int|string
     */
    public function calculateHeaderHeight() {
        $headerHeight = $this->logoAreaHeight + $this->menuAreaHeight;
        if(medigroup_mikado_is_top_bar_enabled()) {
            $headerHeight += medigroup_mikado_get_top_bar_height();
        }

        return $headerHeight;
    }

    /**
     * Returns total height of mobile header
     *
     * @return int|string
     */
    public function calculateMobileHeaderHeight() {
        $mobileHeaderHeight = $this->mobileHeaderHeight;

        return $mobileHeaderHeight;
    }

    /**
     * Returns global js variables of header
     *
     * @param $globalVariables
     *
     * @return int|string
     */
    public function getGlobalJSVariables($globalVariables) {
        $globalVariables['mkdLogoAreaHeight'] = $this->logoAreaHeight;
        $globalVariables['mkdMenuAreaHeight'] = $this->menuAreaHeight;
        $globalVariables['mkdMobileHeaderHeight'] = $this->mobileHeaderHeight;

        return $globalVariables;
    }

    /**
     * Returns per page js variables of header
     *
     * @param $perPageVars
     *
     * @return int|string
     */
    public function getPerPageJSVariables($perPageVars) {
        $perPageVars['mkdHeaderTransparencyHeight'] = 0;

        return $perPageVars;
    }
}