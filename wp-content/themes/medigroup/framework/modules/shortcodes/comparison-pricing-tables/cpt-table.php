<?php

namespace Medigroup\Modules\Shortcodes\ComparisonPricingTables;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class ComparisonPricingTable implements ShortcodeInterface {
	private $base;

	/**
	 * ComparisonPricingTable constructor.
	 */
	public function __construct() {
		$this->base = 'mkd_comparison_pricing_table';

		add_action('vc_before_init', array($this, 'vcMap'));
	}


	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Comparison Pricing Table', 'medigroup'),
			'base'                      => $this->base,
			'icon'                      => 'icon-wpb-pricing-table extended-custom-icon',
			'category'                  => esc_html__('by MIKADO', 'medigroup'),
			'allowed_container_element' => 'vc_row',
			'as_child'                  => array('only' => 'mkd_comparison_pricing_tables_holder'),
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
					'dependency'  => array('element' => 'title', 'not_empty' => true),
					'group'       => esc_html__('Design Options', 'medigroup')
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Price', 'medigroup'),
					'param_name'  => 'price',
					'description' => esc_html__('Default value is 100', 'medigroup')
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Currency', 'medigroup'),
					'param_name'  => 'currency',
					'description' => esc_html__('Default mark is $', 'medigroup')
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Price Period', 'medigroup'),
					'param_name'  => 'price_period',
					'description' => esc_html__('Default label is monthly', 'medigroup')
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
					'heading'     => esc_html__('Mark As Featured', 'medigroup'),
					'param_name'  => 'featured',
					'value'       => array(
						esc_html__('No', 'medigroup')      => 'no',
						esc_html__('Yes', 'medigroup')     => 'yes'
					),
					'save_always' => true,
					'description' => esc_html__('Featured tables are more prominent, with thick and labeled top border.', 'medigroup')
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Border Label', 'medigroup'),
					'param_name'  => 'featured_text',
					'dependency'  => array('element' => 'featured', 'value' => 'yes')
				),
				array(
					'type'        => 'textarea_html',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Content', 'medigroup'),
					'param_name'  => 'content',
					'value'       => '<li>'.esc_html__('content content content', 'medigroup').'</li><li>'.esc_html__('content content content', 'medigroup').'</li><li>'.esc_html__('content content content', 'medigroup').'</li>',
					'description' => '',
					'admin_label' => false
				),
				array(
					'type'        => 'colorpicker',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Border Top Color', 'medigroup'),
					'param_name'  => 'border_top_color',
					'value'       => '',
					'save_always' => true,
					'group'       => esc_html__('Design Options', 'medigroup'),
				),
				array(
					'type'        => 'colorpicker',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Border Label Text Color', 'medigroup'),
					'param_name'  => 'featured_color',
					'value'       => '',
					'save_always' => true,
					'group'       => esc_html__('Design Options', 'medigroup'),
					'dependency'  => array('element' => 'featured', 'value' => 'yes')
				),
				array(
					'type'        => 'colorpicker',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Button Background Color', 'medigroup'),
					'param_name'  => 'btn_background_color',
					'value'       => '',
					'save_always' => true,
					'group'       => esc_html__('Design Options', 'medigroup')
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'title'                => 'Basic Plan',
			'title_size'           => '',
			'price'                => '100',
			'currency'             => '',
			'price_period'         => '',
			'show_button'          => 'yes',
			'link'                 => '',
			'button_text'          => 'button',
			'featured'			   => 'no',
			'featured_text'		   => '',
			'border_top_color'     => '',
			'featured_color'	   => '',
			'btn_background_color' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['content']        = $content;
		$params['border_style']   = $this->getBorderStyles($params);
		$params['display_border'] = is_array($params['border_style']) && count($params['border_style'] || $params['featured'] == 'yes');
		$params['btn_styles']     = $this->getBtnStyles($params);

		return medigroup_mikado_get_shortcode_module_template_part('templates/cpt-table-template', 'comparison-pricing-tables', '', $params);
	}

	private function getBorderStyles($params) {
		$styles = array();

		if($params['border_top_color'] !== '') {
			$styles[] = 'background-color: '.$params['border_top_color'];
		}

		return $styles;
	}

	private function getBtnStyles($params) {
		$styles = array();

		if($params['btn_background_color'] !== '') {
			$styles[] = 'background-color: '.$params['btn_background_color'];
		}

		return $styles;
	}

}