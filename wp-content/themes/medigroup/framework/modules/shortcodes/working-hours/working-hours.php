<?php
namespace Medigroup\Modules\Shortcodes\WorkingHours;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class WorkingHours implements ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'mkd_working_hours';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Mikado Working Hours', 'medigroup'),
            'base'                      => $this->base,
            'category'                  => esc_html__('by MIKADO', 'medigroup'),
            'icon'                      => 'icon-wpb-working-hours extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                medigroup_mikado_icon_collections()->getVCParamsArray(array(), '', true),
                array(
                    array(
                        'type'        => 'colorpicker',
                        'admin_label' => true,
                        'heading'     => esc_html__('Background Color', 'medigroup'),
                        'param_name'  => 'bckg_color',
                        'description' => ''
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'admin_label' => true,
                        'heading'     => esc_html__('Text Color', 'medigroup'),
                        'param_name'  => 'text_color',
                        'description' => ''
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Title', 'medigroup'),
                        'param_name'  => 'title',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'admin_label' => true,
                        'heading'     => esc_html__('Custom Size (px) for Title', 'medigroup'),
                        'param_name'  => 'custom_size_title',
                        'value'       => ''
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Font Weight for Title', 'medigroup'),
                        'param_name'  => 'font_weight_title',
                        'value'       => array_flip(medigroup_mikado_get_font_weight_array(true)),
                        'admin_label' => true,
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Text Transform for Title', 'medigroup'),
                        'param_name'  => 'text_transform_title',
                        'value'       => array_flip(medigroup_mikado_get_text_transform_array(true)),
                        'admin_label' => true,
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Text', 'medigroup'),
                        'param_name'  => 'text',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'admin_label' => true,
                        'heading'     => esc_html__('Custom Size (px) for Text', 'medigroup'),
                        'param_name'  => 'custom_size_text',
                        'value'       => ''
                    ),
                    array(
                        'type'        => 'textfield',
                        'admin_label' => true,
                        'heading'     => esc_html__('Custom Size (px) for Day and Time', 'medigroup'),
                        'param_name'  => 'custom_size_day',
                        'value'       => ''
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Show Button?', 'medigroup'),
                        'param_name'  => 'wh_button',
                        'admin_label' => true,
                        'value'       => array(
                            esc_html__('Yes', 'medigroup') => 'yes',
                            esc_html__('No', 'medigroup')  => 'no'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Format', 'medigroup'),
                        'param_name'  => 'format',
                        'admin_label' => true,
                        'value'       => array(
                            esc_html__('Work Days + Weekend', 'medigroup')                     => '5_2',
                            esc_html__('Work Days + Saturday + Sunday', 'medigroup')           => '5_1_1',
                            esc_html__('Same Throught the Week', 'medigroup')                  => '7',
                            esc_html__('Mon + Tue + Wed + Thu + Fri + Weekend', 'medigroup')   => '1_1_1_1_1_2',
                            esc_html__('Mon + Tue + Wed + Thu + Fri + Sat + Sun', 'medigroup') => '1_1_1_1_1_1_1',
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Monday To Sunday', 'medigroup'),
                        'param_name'  => 'monday_to_sunday',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Settings', 'medigroup'),
                        'dependency'  => array('element' => 'format', 'value' => array('7'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Monday To Friday', 'medigroup'),
                        'param_name'  => 'monday_to_friday',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Settings', 'medigroup'),
                        'dependency'  => array('element' => 'format', 'value' => array('5_2', '5_1_1'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Weekend', 'medigroup'),
                        'param_name'  => 'weekend',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Settings', 'medigroup'),
                        'dependency'  => array('element' => 'format', 'value' => array('5_2', '1_1_1_1_1_2'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Monday', 'medigroup'),
                        'param_name'  => 'monday',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Settings', 'medigroup'),
                        'dependency'  => array('element' => 'format', 'value' => array('1_1_1_1_1_2', '1_1_1_1_1_1_1'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Tuesday', 'medigroup'),
                        'param_name'  => 'tuesday',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Settings', 'medigroup'),
                        'dependency'  => array('element' => 'format', 'value' => array('1_1_1_1_1_2', '1_1_1_1_1_1_1'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Wednesday', 'medigroup'),
                        'param_name'  => 'wednesday',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Settings', 'medigroup'),
                        'dependency'  => array('element' => 'format', 'value' => array('1_1_1_1_1_2', '1_1_1_1_1_1_1'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Thursday', 'medigroup'),
                        'param_name'  => 'thursday',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Settings', 'medigroup'),
                        'dependency'  => array('element' => 'format', 'value' => array('1_1_1_1_1_2', '1_1_1_1_1_1_1'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Friday', 'medigroup'),
                        'param_name'  => 'friday',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Settings', 'medigroup'),
                        'dependency'  => array('element' => 'format', 'value' => array('1_1_1_1_1_2', '1_1_1_1_1_1_1'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Saturday', 'medigroup'),
                        'param_name'  => 'saturday',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Settings', 'medigroup'),
                        'dependency'  => array('element' => 'format', 'value' => array('5_1_1', '1_1_1_1_1_1_1'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Sunday', 'medigroup'),
                        'param_name'  => 'sunday',
                        'admin_label' => true,
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Settings', 'medigroup'),
                        'dependency'  => array('element' => 'format', 'value' => array('5_1_1', '1_1_1_1_1_1_1'))
                    )
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'bckg_color'           => '',
            'text_color'           => '',
            'title'                => '',
            'custom_size_title'    => '',
            'font_weight_title'    => '',
            'text_transform_title' => '',
            'text'                 => '',
            'custom_size_text'     => '',
            'custom_size_day'      => '',
            'wh_button'            => '',
            'format'               => '',
            'monday_to_friday'     => '',
            'weekend'              => '',
            'monday'               => '',
            'tuesday'              => '',
            'wednesday'            => '',
            'thursday'             => '',
            'friday'               => '',
            'saturday'             => '',
            'sunday'               => '',
            'monday_to_sunday'     => ''
        );

        $default_atts = array_merge($default_atts, medigroup_mikado_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $iconPackName   = medigroup_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
        $params['icon'] = $iconPackName ? $params[$iconPackName] : '';

        $params['working_hours'] = $this->getWorkingHours($params);
        $params['wh_colors']     = $this->getBckgStyles($params);
        $params['bckg_color']    = $this->getIconStyles($params);
        $params['title_color']   = $this->getTitleStyles($params);
        $params['text_size']     = $this->getTextStyles($params);
        $params['date_size']     = $this->getDayStyles($params);
        $params['show_icon']     = !empty($params['icon']);

        return medigroup_mikado_get_shortcode_module_template_part('templates/working-hours-template', 'working-hours', '', $params);
    }

    private function getWorkingHours($params) {
        $workingHours = array();

        if(!empty($params['format']) && $params['format'] === '5_2') {
            if(!empty($params['monday_to_friday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Monday - Friday', 'medigroup'),
                    'time'  => $params['monday_to_friday']
                );
            }

            if(!empty($params['weekend'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Saturday - Sunday', 'medigroup'),
                    'time'  => $params['weekend']
                );
            }
        } else if(!empty($params['format']) && $params['format'] === '1_1_1_1_1_1_1') {
            if(!empty($params['monday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Monday', 'medigroup'),
                    'time'  => $params['monday']
                );
            }

            if(!empty($params['tuesday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Tuesday', 'medigroup'),
                    'time'  => $params['tuesday']
                );
            }

            if(!empty($params['wednesday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Wednesday', 'medigroup'),
                    'time'  => $params['wednesday']
                );
            }

            if(!empty($params['thursday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Thursday', 'medigroup'),
                    'time'  => $params['thursday']
                );
            }

            if(!empty($params['friday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Friday', 'medigroup'),
                    'time'  => $params['friday']
                );
            }

            if(!empty($params['saturday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Saturday', 'medigroup'),
                    'time'  => $params['saturday']
                );
            }

            if(!empty($params['sunday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Sunday', 'medigroup'),
                    'time'  => $params['sunday']
                );
            }
        } else if(!empty($params['format']) && $params['format'] === '1_1_1_1_1_2') {
            if(!empty($params['monday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Monday', 'medigroup'),
                    'time'  => $params['monday']
                );
            }

            if(!empty($params['tuesday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Tuesday', 'medigroup'),
                    'time'  => $params['tuesday']
                );
            }

            if(!empty($params['wednesday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Wednesday', 'medigroup'),
                    'time'  => $params['wednesday']
                );
            }

            if(!empty($params['thursday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Thursday', 'medigroup'),
                    'time'  => $params['thursday']
                );
            }

            if(!empty($params['friday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Friday', 'medigroup'),
                    'time'  => $params['friday']
                );
            }

            if(!empty($params['weekend'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Saturday - Sunday', 'medigroup'),
                    'time'  => $params['weekend']
                );
            }
        } else if(!empty($params['format']) && $params['format'] === '5_1_1') {
            if(!empty($params['monday_to_friday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Monday - Friday', 'medigroup'),
                    'time'  => $params['monday_to_friday']
                );
            }

            if(!empty($params['saturday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Saturday', 'medigroup'),
                    'time'  => $params['saturday']
                );
            }

            if(!empty($params['sunday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Sunday', 'medigroup'),
                    'time'  => $params['sunday']
                );
            }
        } else if(!empty($params['format']) && $params['format'] === '7') {
            if(!empty($params['monday_to_sunday'])) {
                $workingHours[] = array(
                    'label' => esc_html__('Monday - Sunday', 'medigroup'),
                    'time'  => $params['monday_to_sunday']
                );
            }
        }

        return $workingHours;
    }

    private function getBckgStyles($params) {
        $styles = array();

        if($params['bckg_color'] !== '') {
            $styles[] = 'background-color: '.$params['bckg_color'];
        }

        if($params['text_color'] !== '') {
            $styles[] = 'color: '.$params['text_color'];
        }

        return $styles;
    }

    private function getIconStyles($params) {
        $styles = array();

        if($params['bckg_color'] !== '') {
            $styles[] = 'background-color: '.$params['bckg_color'];
        }

        return $styles;
    }

    private function getTitleStyles($params) {
        $styles = array();

        if($params['text_color'] !== '') {
            $styles[] = 'color: '.$params['text_color'];
        }

        if(!empty($params['custom_size_title'])) {
            $styles[] = 'font-size:'.medigroup_mikado_filter_px($params['custom_size_title']).'px';
        }

        if(!empty($params['font_weight_title'])) {
            $styles[] = 'font-weight: '.$params['font_weight_title'];
        }

        if(!empty($params['text_transform_title'])) {
            $styles[] = 'text-transform: '.$params['text_transform_title'];
        }

        return $styles;
    }

    private function getTextStyles($params) {
        $styles = array();

        if(!empty($params['custom_size_text'])) {
            $styles[] = 'font-size:'.medigroup_mikado_filter_px($params['custom_size_text']).'px';
        }

        return $styles;
    }

    private function getDayStyles($params) {
        $styles = array();

        if(!empty($params['custom_size_day'])) {
            $styles[] = 'font-size:'.medigroup_mikado_filter_px($params['custom_size_day']).'px';
        }

        return $styles;
    }
}
