<?php
namespace Medigroup\Modules\Shortcodes\IconWithText;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class IconWithText
 * @package Medigroup\Modules\Shortcodes\IconWithText
 */
class IconWithText implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     *
     */
    public function __construct() {
        $this->base = 'mkd_icon_with_text';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     *
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Icon With Text', 'medigroup'),
            'base'                      => $this->base,
            'icon'                      => 'icon-wpb-icon-with-text extended-custom-icon',
            'category'                  => esc_html__('by MIKADO', 'medigroup'),
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                medigroup_mikado_icon_collections()->getVCParamsArray(array(), '', true),
                array(
                    array(
                        'type'       => 'attach_image',
                        'heading'    => esc_html__('Custom Icon', 'medigroup'),
                        'param_name' => 'custom_icon'
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Position', 'medigroup'),
                        'param_name'  => 'icon_position',
                        'value'       => array(
                            esc_html__('Top', 'medigroup')             => 'top',
                            esc_html__('Left', 'medigroup')            => 'left',
                            esc_html__('Left From Title', 'medigroup') => 'left-from-title',
                            esc_html__('Right', 'medigroup')           => 'right'
                        ),
                        'description' => esc_html__('Icon Position', 'medigroup'),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Type', 'medigroup'),
                        'param_name'  => 'icon_type',
                        'value'       => array(
                            esc_html__('Normal', 'medigroup') => 'normal',
                            esc_html__('Circle', 'medigroup') => 'circle',
                            esc_html__('Square', 'medigroup') => 'square'
                        ),
                        'save_always' => true,
                        'admin_label' => true,
                        'group'       => esc_html__('Icon Settings', 'medigroup'),
                        'description' => esc_html__('This attribute doesn\'t work when Icon Position is Top. In This case Icon Type is Normal', 'medigroup'),
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Size', 'medigroup'),
                        'param_name'  => 'icon_size',
                        'value'       => array(
                            esc_html__('Tiny', 'medigroup')       => 'mkd-icon-tiny',
                            esc_html__('Small', 'medigroup')      => 'mkd-icon-small',
                            esc_html__('Medium', 'medigroup')     => 'mkd-icon-medium',
                            esc_html__('Large', 'medigroup')      => 'mkd-icon-large',
                            esc_html__('Very Large', 'medigroup') => 'mkd-icon-huge'
                        ),
                        'admin_label' => true,
                        'save_always' => true,
                        'group'       => esc_html__('Icon Settings', 'medigroup'),
                        'description' => esc_html__('This attribute doesn\'t work when Icon Position is Top', 'medigroup')
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Custom Icon Size (px)', 'medigroup'),
                        'param_name' => 'custom_icon_size',
                        'group'      => esc_html__('Icon Settings', 'medigroup')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Animation', 'medigroup'),
                        'param_name'  => 'icon_animation',
                        'value'       => array(
                            esc_html__('No', 'medigroup')  => '',
                            esc_html__('Yes', 'medigroup') => 'yes'
                        ),
                        'group'       => esc_html__('Icon Settings', 'medigroup'),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Icon Animation Delay (ms)', 'medigroup'),
                        'param_name' => 'icon_animation_delay',
                        'group'      => esc_html__('Icon Settings', 'medigroup'),
                        'dependency' => array('element' => 'icon_animation', 'value' => array('yes'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Icon Margin', 'medigroup'),
                        'param_name'  => 'icon_margin',
                        'value'       => '',
                        'description' => esc_html__('Margin should be set in a top right bottom left format', 'medigroup'),
                        'admin_label' => true,
                        'group'       => esc_html__('Icon Settings', 'medigroup'),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Shape Size (px)', 'medigroup'),
                        'param_name'  => 'shape_size',
                        'description' => '',
                        'admin_label' => true,
                        'group'       => esc_html__('Icon Settings', 'medigroup')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Icon Color', 'medigroup'),
                        'param_name' => 'icon_color',
                        'group'      => esc_html__('Icon Settings', 'medigroup')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Icon Hover Color', 'medigroup'),
                        'param_name' => 'icon_hover_color',
                        'group'      => esc_html__('Icon Settings', 'medigroup')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Background Color', 'medigroup'),
                        'param_name'  => 'icon_background_color',
                        'description' => esc_html__('Icon Background Color (only for square and circle icon type)', 'medigroup'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings', 'medigroup')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Hover Background Color', 'medigroup'),
                        'param_name'  => 'icon_hover_background_color',
                        'description' => esc_html__('Icon Hover Background Color (only for square and circle icon type)', 'medigroup'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings', 'medigroup')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Border Color', 'medigroup'),
                        'param_name'  => 'icon_border_color',
                        'description' => esc_html__('Only for Square and Circle Icon type', 'medigroup'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings', 'medigroup')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Border Hover Color', 'medigroup'),
                        'param_name'  => 'icon_border_hover_color',
                        'description' => esc_html__('Only for Square and Circle Icon type', 'medigroup'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings', 'medigroup')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Border Width', 'medigroup'),
                        'param_name'  => 'icon_border_width',
                        'description' => esc_html__('Only for Square and Circle Icon type', 'medigroup'),
                        'dependency'  => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                        'group'       => esc_html__('Icon Settings', 'medigroup')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Title', 'medigroup'),
                        'param_name'  => 'title',
                        'value'       => '',
                        'admin_label' => true
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => esc_html__('Title Tag', 'medigroup'),
                        'param_name' => 'title_tag',
                        'value'      => array(
                            ''   => '',
                            'h2' => 'h2',
                            'h3' => 'h3',
                            'h4' => 'h4',
                            'h5' => 'h5',
                            'h6' => 'h6',
                        ),
                        'dependency' => array('element' => 'title', 'not_empty' => true),
                        'group'      => esc_html__('Text Settings', 'medigroup')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Title Text Transform', 'medigroup'),
                        'param_name'  => 'title_text_transform',
                        'value'       => array_flip(medigroup_mikado_get_text_transform_array(true)),
                        'save_always' => true,
                        'group'       => esc_html__('Text Settings', 'medigroup')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Title Text Font Weight', 'medigroup'),
                        'param_name'  => 'title_text_font_weight',
                        'value'       => array_flip(medigroup_mikado_get_font_weight_array(true)),
                        'save_always' => true,
                        'group'       => esc_html__('Text Settings', 'medigroup')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Title Color', 'medigroup'),
                        'param_name' => 'title_color',
                        'dependency' => array('element' => 'title', 'not_empty' => true),
                        'group'      => esc_html__('Text Settings', 'medigroup')
                    ),
                    array(
                        'type'       => 'textarea',
                        'heading'    => esc_html__('Text', 'medigroup'),
                        'param_name' => 'text'
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading'    => esc_html__('Text Color', 'medigroup'),
                        'param_name' => 'text_color',
                        'dependency' => array('element' => 'text', 'not_empty' => true),
                        'group'      => esc_html__('Text Settings', 'medigroup')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Link', 'medigroup'),
                        'param_name'  => 'link',
                        'value'       => '',
                        'admin_label' => true
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Link Text', 'medigroup'),
                        'param_name' => 'link_text',
                        'dependency' => array('element' => 'link', 'not_empty' => true)
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => esc_html__('Target', 'medigroup'),
                        'param_name' => 'target',
                        'value'      => array(
                            ''      => '',
                            esc_html__('Self', 'medigroup')  => '_self',
                            esc_html__('Blank', 'medigroup') => '_blank'
                        ),
                        'dependency' => array('element' => 'link', 'not_empty' => true),
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Text Left Padding (px)', 'medigroup'),
                        'param_name' => 'text_left_padding',
                        'dependency' => array('element' => 'icon_position', 'value' => array('left')),
                        'group'      => esc_html__('Text Settings', 'medigroup')
                    ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__('Text Right Padding (px)', 'medigroup'),
                        'param_name' => 'text_right_padding',
                        'dependency' => array('element' => 'icon_position', 'value' => array('right')),
                        'group'      => esc_html__('Text Settings', 'medigroup')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Space Between Title and Text (px)', 'medigroup'),
                        'param_name'  => 'title_bottom_margin',
                        'group'       => esc_html__('Text Settings', 'medigroup'),
                        'description' => esc_html__('Default is 10.', 'medigroup')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Font Size for Text(px)', 'medigroup'),
                        'param_name'  => 'text_fs',
                        'group'       => esc_html__('Text Settings', 'medigroup'),
                        'description' => esc_html__('Default is 10.', 'medigroup')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Content Alignment', 'medigroup'),
                        'param_name'  => 'alignment',
                        'value'       => array(
                            esc_html__('Default', 'medigroup') => '',
                            esc_html__('Center', 'medigroup')  => 'center',
                            esc_html__('Left', 'medigroup')    => 'left',
                            esc_html__('Right', 'medigroup')   => 'right'
                        ),
                        'description' => esc_html__('Alignment of the icon and the text', 'medigroup'),
                        'save_always' => true,
                    )
                )
            )
        ));
    }

    /**
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'alignment'                   => '',
            'custom_icon'                 => '',
            'icon_position'               => '',
            'icon_type'                   => '',
            'icon_size'                   => '',
            'custom_icon_size'            => '',
            'icon_animation'              => '',
            'icon_animation_delay'        => '',
            'icon_margin'                 => '',
            'shape_size'                  => '',
            'icon_color'                  => '',
            'icon_hover_color'            => '',
            'icon_background_color'       => '',
            'icon_hover_background_color' => '',
            'icon_border_color'           => '',
            'icon_border_hover_color'     => '',
            'icon_border_width'           => '',
            'title'                       => '',
            'text_fs'                     => '',
            'title_tag'                   => 'h5',
            'title_text_transform'        => '',
            'title_text_font_weight'      => '',
            'title_color'                 => '',
            'text'                        => '',
            'text_color'                  => '',
            'link'                        => '',
            'link_text'                   => '',
            'target'                      => '_self',
            'text_left_padding'           => '',
            'text_right_padding'          => '',
            'title_bottom_margin'         => ''
        );

        $default_atts = array_merge($default_atts, medigroup_mikado_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $params['icon_parameters']    = $this->getIconParameters($params);
        $params['holder_classes']     = $this->getHolderClasses($params);
        $params['holder_styles']     = $this->getHolderStyles($params);
        $params['title_styles']       = $this->getTitleStyles($params);
        $params['content_styles']     = $this->getContentStyles($params);
        $params['text_styles']        = $this->getTextStyles($params);
        $params['custom_icon_styles'] = $this->getCustomIconStyles($params);

        return medigroup_mikado_get_shortcode_module_template_part('templates/iwt', 'icon-with-text', $params['icon_position'], $params);
    }

    /**
     * Returns parameters for icon shortcode as a string
     *
     * @param $params
     *
     * @return array
     */
    private function getIconParameters($params) {
        $params_array = array();

        if(empty($params['custom_icon'])) {
            $iconPackName = medigroup_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

            $params_array['icon_pack']   = $params['icon_pack'];
            $params_array[$iconPackName] = $params[$iconPackName];

            if(!empty($params['icon_size'])) {
                $params_array['size'] = $params['icon_size'];
            }

            if(!empty($params['custom_icon_size'])) {
                $params_array['custom_size'] = $params['custom_icon_size'];
            }

            if(!empty($params['icon_type'])) {
                $params_array['type'] = $params['icon_type'];
            }

            $params_array['shape_size'] = $params['shape_size'];

            if(!empty($params['icon_border_color'])) {
                $params_array['border_color'] = $params['icon_border_color'];
            }

            if(!empty($params['icon_border_hover_color'])) {
                $params_array['hover_border_color'] = $params['icon_border_hover_color'];
            }

            if(!empty($params['icon_border_width'])) {
                $params_array['border_width'] = $params['icon_border_width'];
            }

            if(!empty($params['icon_background_color'])) {
                $params_array['background_color'] = $params['icon_background_color'];
            }

            if(!empty($params['icon_hover_background_color'])) {
                $params_array['hover_background_color'] = $params['icon_hover_background_color'];
            }

            $params_array['icon_color'] = $params['icon_color'];

            if(!empty($params['icon_hover_color'])) {
                $params_array['hover_icon_color'] = $params['icon_hover_color'];
            }

            $params_array['icon_animation']       = $params['icon_animation'];
            $params_array['icon_animation_delay'] = $params['icon_animation_delay'];
            $params_array['margin']               = $params['icon_margin'];
        }

        return $params_array;
    }

    /**
     * Returns array of holder classes
     *
     * @param $params
     *
     * @return array
     */
    private function getHolderClasses($params) {
        $classes = array('mkd-iwt', 'clearfix');

        if(!empty($params['icon_position'])) {
            switch($params['icon_position']) {
                case 'top':
                    $classes[] = 'mkd-iwt-icon-top';
                    break;
                case 'left':
                    $classes[] = 'mkd-iwt-icon-left';
                    break;
                case 'right':
                    $classes[] = 'mkd-iwt-icon-right';
                    break;
                case 'left-from-title':
                    $classes[] = 'mkd-iwt-left-from-title';
                    break;
                default:
                    break;
            }
        }

        if(!empty($params['icon_size'])) {
            $classes[] = 'mkd-iwt-'.str_replace('mkd-', '', $params['icon_size']);
        }

        return $classes;
    }

    private function getHolderStyles($params) {
        $styles = array();

        if(!empty($params['alignment'])) {
            $styles[] = 'text-align: '.$params['alignment'].';';
        }

        return $styles;
    }

    private function getTitleStyles($params) {
        $styles = array();

        if(!empty($params['title_color'])) {
            $styles[] = 'color: '.$params['title_color'];
        }

        if(!empty($params['title_text_transform'])) {
            $styles[] = 'text-transform: '.$params['title_text_transform'];
        }

        if(!empty($params['title_text_font_weight'])) {
            $styles[] = 'font-weight: '.$params['title_text_font_weight'];
        }

        if($params['title_bottom_margin'] !== '') {
            $styles[] = 'margin-bottom: '.$params['title_bottom_margin'].'px';
        }

        return $styles;
    }

    private function getTextStyles($params) {
        $styles = array();

        if(!empty($params['text_color'])) {
            $styles[] = 'color: '.$params['text_color'];
        }

        if(!empty($params['text_fs'])) {
            $styles[] = 'font-size:'.medigroup_mikado_filter_px($params['text_fs']).'px';
        }

        return $styles;
    }

    private function getContentStyles($params) {
        $styles = array();

        if($params['icon_position'] == 'left' && !empty($params['text_left_padding'])) {
            $styles[] = 'padding-left: '.medigroup_mikado_filter_px($params['text_left_padding']).'px';
        }

        if($params['icon_position'] == 'right' && !empty($params['text_right_padding'])) {
            $styles[] = 'padding-right: '.medigroup_mikado_filter_px($params['text_right_padding']).'px';
        }

        return $styles;
    }

    private function getCustomIconStyles($params) {
        $styles = array();

        if(!empty($params['icon_margin'])) {
            $styles[] = 'margin: '.$params['icon_margin'];
        }

        return $styles;
    }
}