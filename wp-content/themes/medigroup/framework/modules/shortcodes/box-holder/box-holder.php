<?php
namespace Medigroup\Modules\BoxHolder;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;
class BoxHolder implements ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'mkd_box_holder';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'            => esc_html__('Box Holder', 'medigroup'),
            'base'            => $this->base,
            'as_parent'       => array('except' => 'vc_row, vc_accordion, no_cover_boxes, no_portfolio_list, no_portfolio_slider'),
            'content_element' => true,
            'icon'            => 'icon-wpb-box-holder extended-custom-icon',
            'category'        => esc_html__('by MIKADO', 'medigroup'),
            'js_view'         => 'VcColumnView',
            'params'          => array(
                array(
                    'type'        => 'attach_image',
                    'class'       => '',
                    'heading'     => esc_html__('Background Image', 'medigroup'),
                    'param_name'  => 'background_image',
                    'value'       => '',
                    'description' => esc_html__('Background image for the back side of Box Item.', 'medigroup'),
                ),
            )
        ));
    }

    public function render($atts, $content = null) {

        $args = array(
            'background_image' => '',
        );

        $params = shortcode_atts($args, $atts);

        extract($params);

        $params['bckg_styles'] = $this->getItemBackStyles($params);

        $params['content'] = $content;

        return medigroup_mikado_get_shortcode_module_template_part('templates/box-item-holder', 'box-holder', '', $params);

    }


    private function getItemBackStyles($params) {
        $styles = array();

        if(($params['background_image']) !== '') {
            $styles[] = 'background-image: url('.wp_get_attachment_url($params['background_image']).')';;
        }

        return $styles;
    }


}