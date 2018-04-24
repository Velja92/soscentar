<?php
namespace Medigroup\Modules\CoverBoxes;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class CoverBoxes implements ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'mkd_cover_boxes';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'      => esc_html__('Cover Boxes', 'medigroup'),
            'base'      => $this->base,
            'icon'      => 'icon-wpb-cover-boxes extended-custom-icon',
            'category'  => esc_html__('by MIKADO', 'medigroup'),
            'as_parent' => array('only' => 'mkd_cover_box,mkd_cover_box_doctor'),
            'js_view'   => 'VcColumnView',
            'params'    => array(
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Boxes per Row', 'medigroup'),
                    'param_name'  => 'columns',
                    'value'       => array(
                        'One'   => '1',
                        'Two'   => '2',
                        'Three' => '3'
                    ),
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Active Boxes - Two Columns', 'medigroup'),
                    'param_name'  => 'active_two_columns',
                    'value'       => '',
                    'admin_label' => true,
                    'dependency'  => array('element' => 'columns', 'value' => array('2', '3')),
                    'description' => esc_html__('Comma-separated list of active boxes when two boxes fit in a row, e.g. "2,3,6".', 'medigroup')
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Active Boxes - Three Columns', 'medigroup'),
                    'param_name'  => 'active_three_columns',
                    'value'       => '',
                    'admin_label' => true,
                    'dependency'  => array('element' => 'columns', 'value' => array('3')),
                    'description' => esc_html__('Comma-separated list of active boxes when three boxes fit in a row, e.g. "2,4,7".', 'medigroup')
                )
            )
        ));
    }

    public function render($atts, $content = null) {

        $args   = array(
            'columns'          => '',
            'active_two_columns'          => '',
            'active_three_columns'          => ''
        );
        $params = shortcode_atts($args, $atts);
        extract($params);

        $html = '';

        $html .= '<div class="mkd-cover-boxes" data-columns="'.esc_attr($columns).'" '.($active_two_columns != '' ? 'data-active-two="'.esc_attr($active_two_columns) : '').'" '.($active_three_columns != '' ? 'data-active-three="'.esc_attr($active_three_columns) : '').'"><div class="mkd-cover-boxes-inner clearfix">';
        $html .= do_shortcode($content);
        $html .= '</div></div>';

        return $html;

    }

}
