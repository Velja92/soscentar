<?php
namespace Medigroup\Modules\PricingTable;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTable implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'mkd_pricing_table';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Pricing Table', 'medigroup'),
			'base'                      => $this->base,
			'icon'                      => 'icon-wpb-pricing-table extended-custom-icon',
			'category'                  => esc_html__('by MIKADO', 'medigroup'),
			'allowed_container_element' => 'vc_row',
			'as_child'                  => array('only' => 'mkd_pricing_tables'),
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Title', 'medigroup'),
					'param_name'  => 'title',
					'value'       => esc_html__('Basic Plan', 'medigroup'),
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Title Size (px)', 'medigroup'),
					'param_name'  => 'title_size',
					'value'       => '',
					'description' => '',
					'dependency'  => array('element' => 'title', 'not_empty' => true)
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Price', 'medigroup'),
					'param_name'  => 'price'
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Currency', 'medigroup'),
					'param_name'  => 'currency'
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Price Period', 'medigroup'),
					'param_name'  => 'price_period'
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Label', 'medigroup'),
					'param_name'  => 'label',
					'save_always' => ''
				),
				array(
					'type'        => 'colorpicker',
					'admin_label' => true,
					'heading'     => esc_html__('Label Background Color', 'medigroup'),
					'param_name'  => 'label_bgnd',
					'save_always' => ''
				),
				array(
					'type'        => 'colorpicker',
					'admin_label' => true,
					'heading'     => esc_html__('Label Text Color', 'medigroup'),
					'param_name'  => 'label_color',
					'save_always' => ''
				),
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__('Show Button', 'medigroup'),
					'param_name'  => 'show_button',
					'value'       => array(
						esc_html__('Default', 'medigroup') => '',
						esc_html__('Yes', 'medigroup')     => 'yes',
						esc_html__('No', 'medigroup')      => 'no'
					),
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Button Text', 'medigroup'),
					'param_name'  => 'button_text',
					'dependency'  => array('element' => 'show_button', 'value' => 'yes')
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Button Link', 'medigroup'),
					'param_name'  => 'link',
					'dependency'  => array('element' => 'show_button', 'value' => 'yes')
				),
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__('Active', 'medigroup'),
					'param_name'  => 'active',
					'value'       => array(
						esc_html__('No', 'medigroup')  => 'no',
						esc_html__('Yes', 'medigroup') => 'yes'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type'        => 'textarea_html',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Content', 'medigroup'),
					'param_name'  => 'content',
					'value'       => '<li>'.esc_html__('content content content', 'medigroup').'</li><li>'.esc_html__('content content content', 'medigroup').'</li><li>'.esc_html__('content content content', 'medigroup').'</li>',
					'description' => ''
				)
			)
		));
	}

	public function render($atts, $content = null) {

		$args   = array(
			'title'        => esc_html__('Basic Plan', 'medigroup'),
			'title_size'   => '',
			'price'        => '100',
			'currency'     => '',
			'price_period' => '',
			'label'        => '',
			'label_bgnd'   => '',
			'label_color'  => '',
			'active'       => 'no',
			'show_button'  => 'yes',
			'link'         => '',
			'button_text'  => 'button'
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html                  = '';
		$pricing_table_clasess = 'mkd-price-table';

		if($active == 'yes') {
			$pricing_table_clasess .= ' mkd-pt-active';
		}

		$params['pricing_table_classes'] = $pricing_table_clasess;
		$params['content']               = $content;
		$params['button_params']         = $this->getButtonParams($params);

		$params['title_styles'] = array();

		if(!empty($params['title_size'])) {
			$params['title_styles'][] = 'font-size: '.medigroup_mikado_filter_px($params['title_size']).'px';
		}

		$html .= medigroup_mikado_get_shortcode_module_template_part('templates/pricing-table-template', 'pricing-table', '', $params);

		return $html;

	}

	private function getButtonParams($params) {
		$buttonParams = array();

		if($params['show_button'] === 'yes' && $params['button_text'] !== '') {
			$buttonParams = array(
				'link' => $params['link'],
				'text' => $params['button_text'],
				'size' => 'medium'
			);

			$buttonParams['type']       = $params['active'] === 'yes' ? 'white' : 'solid';
			$buttonParams['hover_type'] = $params['active'] === 'yes' ? 'white' : 'outline';
		}

		return $buttonParams;
	}

}
