<?php
namespace Medigroup\Modules\Shortcodes\TabSliderItem;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class TabSliderItem implements ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'mkd_tab_slider_item';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                    => esc_html__('Tab Slider Item', 'medigroup'),
            'base'                    => $this->base,
            'category'                => esc_html__('by MIKADO', 'medigroup'),
            'icon'                    => 'icon-wpb-tab-slider-item extended-custom-icon',
            'as_parent'               => array('except' => 'vc_row'),
            'as_child'                => array('only' => 'mkd_tab_slider'),
            'is_container'            => true,
            'show_settings_on_create' => true,
            'params'                  => array_merge(
                array(
                    array(
                        'type'        => 'attach_image',
                        'admin_label' => true,
                        'heading'     => esc_html__('Slide Image', 'medigroup'),
                        'param_name'  => 'slide_image',
                        'value'       => '',
                        'description' => esc_html__('Select image from media library.', 'medigroup'),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Slide Title', 'medigroup'),
                        'param_name'  => 'slide_title',
                        'admin_label' => true
                    ),
                    array(
                        'type'       => 'attach_image',
                        'heading'    => esc_html__('Custom Icon', 'medigroup'),
                        'param_name' => 'custom_icon'
                    )
                ),
                \MedigroupMikadoIconCollections::get_instance()->getVCParamsArray(),
                array(
                    array(
                        'type'        => 'textarea_html',
                        'holder'      => 'div',
                        'class'       => '',
                        'heading'     => esc_html__('Content', 'medigroup'),
                        'param_name'  => 'content',
                        'value'       => '',
                        'description' => '',
                    )
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'image_position' => '',
            'slide_image'    => '',
            'slide_title'    => '',
            'custom_icon'   => ''
        );

        $default_atts = array_merge($default_atts, medigroup_mikado_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $iconPackName   = medigroup_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
        $params['icon'] = $params[$iconPackName];

        $params['content'] = $content;

        return medigroup_mikado_get_shortcode_module_template_part('templates/tab-slider-item', 'tab-slider', '', $params);
    }
}