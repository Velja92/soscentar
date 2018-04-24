<?php

if(!function_exists('medigroup_mikado_general_options_map')) {
    /**
     * General options page
     */
    function medigroup_mikado_general_options_map() {

        medigroup_mikado_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'medigroup'),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_logo = medigroup_mikado_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_logo',
                'title' => esc_html__('Logo', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'parent'        => $panel_logo,
                'type'          => 'yesno',
                'name'          => 'hide_logo',
                'default_value' => 'no',
                'label'         => esc_html__('Hide Logo', 'medigroup'),
                'description'   => esc_html__('Enabling this option will hide logo image', 'medigroup'),
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "#mkd_hide_logo_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_logo_container = medigroup_mikado_add_admin_container(
            array(
                'parent'          => $panel_logo,
                'name'            => 'hide_logo_container',
                'hidden_property' => 'hide_logo',
                'hidden_value'    => 'yes'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'logo_image',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo.png",
                'label'         => esc_html__('Logo Image - Default', 'medigroup'),
                'description'   => esc_html__('Choose a default logo image to display ', 'medigroup'),
                'parent'        => $hide_logo_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_dark',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo_black.png",
                'label'         => esc_html__('Logo Image - Dark', 'medigroup'),
                'description'   => esc_html__('Choose a default logo image to display ', 'medigroup'),
                'parent'        => $hide_logo_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_light',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo_white.png",
                'label'         => esc_html__('Logo Image - Light', 'medigroup'),
                'description'   => esc_html__('Choose a default logo image to display ', 'medigroup'),
                'parent'        => $hide_logo_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_sticky',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo_sticky.png",
                'label'         => esc_html__('Logo Image - Sticky', 'medigroup'),
                'description'   => esc_html__('Choose a default logo image to display ', 'medigroup'),
                'parent'        => $hide_logo_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_vertical',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo_white.png",
                'label'         => esc_html__('Logo Image - Vertical Header', 'medigroup'),
                'description'   => esc_html__('Choose a default logo image to display on vertilcal header', 'medigroup'),
                'parent'        => $hide_logo_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_mobile',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo.png",
                'label'         => esc_html__('Logo Image - Mobile', 'medigroup'),
                'description'   => esc_html__('Choose a default logo image to display ', 'medigroup'),
                'parent'        => $hide_logo_container
            )
        );

        $panel_design_style = medigroup_mikado_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Appearance', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup'),
                'description'   => esc_html__('Choose a default Google font for your site', 'medigroup'),
                'parent'        => $panel_design_style
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'medigroup'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = medigroup_mikado_add_admin_container(
            array(
                'parent'          => $panel_design_style,
                'name'            => 'additional_google_fonts_container',
                'hidden_property' => 'additional_google_fonts',
                'hidden_value'    => 'no'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup'),
                'description'   => esc_html__('Choose additional Google font for your site', 'medigroup'),
                'parent'        => $additional_google_fonts_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup'),
                'description'   => esc_html__('Choose additional Google font for your site', 'medigroup'),
                'parent'        => $additional_google_fonts_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup'),
                'description'   => esc_html__('Choose additional Google font for your site', 'medigroup'),
                'parent'        => $additional_google_fonts_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup'),
                'description'   => esc_html__('Choose additional Google font for your site', 'medigroup'),
                'parent'        => $additional_google_fonts_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'medigroup'),
                'description'   => esc_html__('Choose additional Google font for your site', 'medigroup'),
                'parent'        => $additional_google_fonts_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'google_font_weight',
                'type'          => 'checkboxgroup',
                'default_value' => '',
                'label'         => esc_html__('Google Fonts Style & Weight', 'medigroup'),
                'description'   => esc_html__('Choose a default Google font weights for your site. Impact on page load time', 'medigroup'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    '100'       => esc_html__('100 Thin', 'medigroup'),
                    '100italic' => esc_html__('100 Thin Italic', 'medigroup'),
                    '200'       => esc_html__('200 Extra-Light', 'medigroup'),
                    '200italic' => esc_html__('200 Extra-Light Italic', 'medigroup'),
                    '300'       => esc_html__('300 Light', 'medigroup'),
                    '300italic' => esc_html__('300 Light Italic', 'medigroup'),
                    '400'       => esc_html__('400 Regular', 'medigroup'),
                    '400italic' => esc_html__('400 Regular Italic', 'medigroup'),
                    '500'       => esc_html__('500 Medium', 'medigroup'),
                    '500italic' => esc_html__('500 Medium Italic', 'medigroup'),
                    '600'       => esc_html__('600 Semi-Bold', 'medigroup'),
                    '600italic' => esc_html__('600 Semi-Bold Italic', 'medigroup'),
                    '700'       => esc_html__('700 Bold', 'medigroup'),
                    '700italic' => esc_html__('700 Bold Italic', 'medigroup'),
                    '800'       => esc_html__('800 Extra-Bold', 'medigroup'),
                    '800italic' => esc_html__('800 Extra-Bold Italic', 'medigroup'),
                    '900'       => esc_html__('900 Ultra-Bold', 'medigroup'),
                    '900italic' => esc_html__('900 Ultra-Bold Italic', 'medigroup')
                ),
                'args'          => array(
                    'enable_empty_checkbox' => true,
                    'inline_checkbox_class' => true
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'google_font_subset',
                'type'          => 'checkboxgroup',
                'default_value' => '',
                'label'         => esc_html__('Google Fonts Subset', 'medigroup'),
                'description'   => esc_html__('Choose a default Google font subsets for your site', 'medigroup'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    'latin'        => esc_html__('Latin', 'medigroup'),
                    'latin-ext'    => esc_html__('Latin Extended', 'medigroup'),
                    'cyrillic'     => esc_html__('Cyrillic', 'medigroup'),
                    'cyrillic-ext' => esc_html__('Cyrillic Extended', 'medigroup'),
                    'greek'        => esc_html__('Greek', 'medigroup'),
                    'greek-ext'    => esc_html__('Greek Extended', 'medigroup'),
                    'vietnamese'   => esc_html__('Vietnamese', 'medigroup')
                ),
                'args'          => array(
                    'enable_empty_checkbox' => true,
                    'inline_checkbox_class' => true
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'first_color',
                'type'        => 'color',
                'label'       => esc_html__('First Main Color', 'medigroup'),
                'description' => esc_html__('Choose the most dominant theme color. Default color is #ff1d4d', 'medigroup'),
                'parent'      => $panel_design_style
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'page_background_color',
                'type'        => 'color',
                'label'       => esc_html__('Page Background Color', 'medigroup'),
                'description' => esc_html__('Choose the background color for page content. Default color is #ffffff', 'medigroup'),
                'parent'      => $panel_design_style
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'selection_color',
                'type'        => 'color',
                'label'       => esc_html__('Text Selection Color', 'medigroup'),
                'description' => esc_html__('Choose the color users see when selecting text', 'medigroup'),
                'parent'      => $panel_design_style
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'medigroup'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_boxed_container"
                )
            )
        );

        $boxed_container = medigroup_mikado_add_admin_container(
            array(
                'parent'          => $panel_design_style,
                'name'            => 'boxed_container',
                'hidden_property' => 'boxed',
                'hidden_value'    => 'no'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'page_background_color_in_box',
                'type'        => 'color',
                'label'       => esc_html__('Page Background Color', 'medigroup'),
                'description' => esc_html__('Choose the page background color outside box.', 'medigroup'),
                'parent'      => $boxed_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'boxed_background_image',
                'type'        => 'image',
                'label'       => esc_html__('Background Image', 'medigroup'),
                'description' => esc_html__('Choose an image to be displayed in background', 'medigroup'),
                'parent'      => $boxed_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'boxed_pattern_background_image',
                'type'        => 'image',
                'label'       => esc_html__('Background Pattern', 'medigroup'),
                'description' => esc_html__('Choose an image to be used as background pattern', 'medigroup'),
                'parent'      => $boxed_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Attachment', 'medigroup'),
                'description'   => esc_html__('Choose background image attachment', 'medigroup'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'  => esc_html__('Fixed', 'medigroup'),
                    'scroll' => esc_html__('Scroll', 'medigroup')
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Initial Width of Content', 'medigroup'),
                'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid"', 'medigroup'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    ""          => esc_html__("1100px - default", 'medigroup'),
                    "grid-1300" => "1300px",
                    "grid-1200" => "1200px",
                    "grid-1000" => "1000px",
                    "grid-800"  => "800px"
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'preload_pattern_image',
                'type'        => 'image',
                'label'       => esc_html__('Preload Pattern Image', 'medigroup'),
                'description' => esc_html__('Choose preload pattern image to be displayed until images are loaded ', 'medigroup'),
                'parent'      => $panel_design_style
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'element_appear_amount',
                'type'        => 'text',
                'label'       => esc_html__('Element Appearance', 'medigroup'),
                'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'medigroup'),
                'parent'      => $panel_design_style,
                'args'        => array(
                    'col_width' => 2,
                    'suffix'    => 'px'
                )
            )
        );

        $panel_settings = medigroup_mikado_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Behavior', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Smooth Scroll', 'medigroup'),
                'description'   => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'medigroup'),
                'parent'        => $panel_settings
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'medigroup'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'medigroup'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_page_transitions_container"
                )
            )
        );

        $page_transitions_container = medigroup_mikado_add_admin_container(
            array(
                'parent'          => $panel_settings,
                'name'            => 'page_transitions_container',
                'hidden_property' => 'smooth_page_transitions',
                'hidden_value'    => 'no'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'   => 'smooth_pt_bgnd_color',
                'type'   => 'color',
                'label'  => esc_html__('Page Loader Background Color', 'medigroup'),
                //'description'   => 'Enabling this option will perform a smooth transition between pages when clicking on links.',
                'parent' => $page_transitions_container
            )
        );

        $group_pt_spinner_animation = medigroup_mikado_add_admin_group(array(
            'name'        => 'group_pt_spinner_animation',
            'title'       => esc_html__('Loader Style', 'medigroup'),
            'description' => esc_html__('Define styles for loader spinner animation', 'medigroup'),
            'parent'      => $page_transitions_container
        ));

        $row_pt_spinner_animation = medigroup_mikado_add_admin_row(array(
            'name'   => 'row_pt_spinner_animation',
            'parent' => $group_pt_spinner_animation
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label'         => esc_html__('Spinner Type', 'medigroup'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                "heartbeat"                 => esc_html__("Heartbeat", 'medigroup'),
                "pulse"                 => esc_html__("Pulse", 'medigroup'),
                "double_pulse"          => esc_html__("Double Pulse", 'medigroup'),
                "cube"                  => esc_html__("Cube", 'medigroup'),
                "rotating_cubes"        => esc_html__("Rotating Cubes", 'medigroup'),
                "stripes"               => esc_html__("Stripes", 'medigroup'),
                "wave"                  => esc_html__("Wave", 'medigroup'),
                "two_rotating_circles"  => esc_html__("2 Rotating Circles", 'medigroup'),
                "five_rotating_circles" => esc_html__("5 Rotating Circles", 'medigroup'),
                "atom"                  => esc_html__("Atom", 'medigroup'),
                "clock"                 => esc_html__("Clock", 'medigroup'),
                "mitosis"               => esc_html__("Mitosis", 'medigroup'),
                "lines"                 => esc_html__("Lines", 'medigroup'),
                "fussion"               => esc_html__("Fussion", 'medigroup'),
                "wave_circles"          => esc_html__("Wave Circles", 'medigroup'),
                "pulse_circles"         => esc_html__("Pulse Circles", 'medigroup'),
            )
        ));

        medigroup_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'medigroup'),
            'parent'        => $row_pt_spinner_animation
        ));

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'smooth_pt_true_ajax',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('True AJAX Transitions', 'medigroup'),
                'description'   => esc_html__('Choose whether to load pages using AJAX or refresh the browser window, only mimicking AJAX behavior.', 'medigroup'),
                'parent'        => $page_transitions_container,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_true_ajax_params_container"
                )
            )
        );

        $true_ajax_params_container = medigroup_mikado_add_admin_container(
            array(
                'parent'          => $page_transitions_container,
                'name'            => 'true_ajax_params_container',
                'hidden_property' => 'smooth_pt_true_ajax',
                'hidden_value'    => 'no'
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'default_page_transition',
                'type'          => 'select',
                'default_value' => 'fade',
                'label'         => esc_html__('Page Transition', 'medigroup'),
                'description'   => esc_html__('Choose the default type of transition between pages', 'medigroup'),
                'parent'        => $true_ajax_params_container,
                'options'       => array(
                    'no-animation' => 'No animation',
                    'fade'         => 'Fade'
                )
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'internal_no_ajax_links',
                'type'        => 'textarea',
                'label'       => esc_html__('List of Internal URLs Loaded Without AJAX (Comma-Separated)', 'medigroup'),
                'description' => esc_html__('To disable AJAX transitions on certain pages, enter their full URLs here (for example: http://www.mydomain.com/forum/)', 'medigroup'),
                'parent'      => $true_ajax_params_container
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'elements_animation_on_touch',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Elements Animation on Mobile/Touch Devices', 'medigroup'),
                'description'   => esc_html__('Enabling this option will allow elements (shortcodes) to animate on mobile / touch devices', 'medigroup'),
                'parent'        => $panel_settings
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'medigroup'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'medigroup'),
                'parent'        => $panel_settings
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'medigroup'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'medigroup'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = medigroup_mikado_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'custom_css',
                'type'        => 'textarea',
                'label'       => esc_html__('Custom CSS', 'medigroup'),
                'description' => esc_html__('Enter your custom CSS here', 'medigroup'),
                'parent'      => $panel_custom_code
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'custom_js',
                'type'        => 'textarea',
                'label'       => esc_html__('Custom JS', 'medigroup'),
                'description' => esc_html__('Enter your custom Javascript here', 'medigroup'),
                'parent'      => $panel_custom_code
            )
        );
        $panel_google_api = medigroup_mikado_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_google_api',
                'title' => esc_html__('Google API', 'medigroup')
            )
        );

        medigroup_mikado_add_admin_field(
            array(
                'name'        => 'google_maps_api_key',
                'type'        => 'text',
                'label'       => esc_html__('Google Maps Api Key', 'medigroup'),
                'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our documentation. Temporarily you can use "AIzaSyAidINa74sv7bt7Y3vqjKjM7m0PgJN1bhk"', 'medigroup'),
                'parent'      => $panel_google_api
            )
        );
    }

    add_action('medigroup_mikado_options_map', 'medigroup_mikado_general_options_map', 1);

}