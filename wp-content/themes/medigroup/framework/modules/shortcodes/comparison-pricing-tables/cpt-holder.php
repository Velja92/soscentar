<?php

namespace Medigroup\Modules\Shortcodes\ComparisonPricingTables;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class ComparisonPricingTablesHolder implements ShortcodeInterface {
	private $base;

	/**
	 * ComparisonPricingTablesHolder constructor.
	 */
	public function __construct() {
		$this->base = 'mkd_comparison_pricing_tables_holder';

		add_action('vc_before_init', array($this, 'vcMap'));
	}


	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                    => esc_html__('Comparison Pricing Tables', 'medigroup'),
			'base'                    => $this->base,
			'as_parent'               => array('only' => 'mkd_comparison_pricing_table'),
			'content_element'         => true,
			'category'                => esc_html__('by MIKADO', 'medigroup'),
			'icon'                    => 'icon-wpb-pricing-tables extended-custom-icon',
			'show_settings_on_create' => true,
			'params'                  => array(
				array(
					'type'        => 'dropdown',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Columns', 'medigroup'),
					'param_name'  => 'columns',
					'value'       => array(
						esc_html__('Two', 'medigroup')   => 'mkd-two-columns',
						esc_html__('Three', 'medigroup') => 'mkd-three-columns',
						esc_html__('Four', 'medigroup')  => 'mkd-four-columns',
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Title', 'medigroup'),
					'param_name'  => 'title',
					'value'       => '',
					'save_always' => true
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Special Note', 'medigroup'),
					'param_name'  => 'special_note',
					'value'       => '',
					'save_always' => true
				),
				array(
					'type'        => 'exploded_textarea',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Features', 'medigroup'),
					'param_name'  => 'features',
					'value'       => '',
					'save_always' => true,
					'description' => esc_html__('Enter features. Separate each features with new line (enter).', 'medigroup')
				),
				array(
					'type'        => 'colorpicker',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Border Top Color', 'medigroup'),
					'param_name'  => 'border_top_color',
					'value'       => '',
					'save_always' => true
				)
			),
			'js_view'                 => 'VcColumnView'
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'columns'          => 'mkd-two-columns',
			'features'         => '',
			'title'            => '',
			'special_note'     => '',
			'border_top_color' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['features']       = $this->getFeaturesArray($params);
		$params['content']        = $content;
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['border_style']   = $this->getBorderStyles($params);
		$params['display_border'] = is_array($params['border_style']) && count($params['border_style']);

		return medigroup_mikado_get_shortcode_module_template_part('templates/cpt-holder-template', 'comparison-pricing-tables', '', $params);
	}

	private function getFeaturesArray($params) {
		$features = array();

		if(!empty($params['features'])) {
			$features = explode(',', $params['features']);
		}

		return $features;
	}

	private function getHolderClasses($params) {
		$classes = array('mkd-comparision-pricing-tables-holder');

		if($params['columns'] !== '') {
			$classes[] = $params['columns'];
		}

		return $classes;
	}

	private function getBorderStyles($params) {
		$styles = array();

		if($params['border_top_color'] !== '') {
			$styles[] = 'background-color: '.$params['border_top_color'];
		}

		return $styles;
	}

}