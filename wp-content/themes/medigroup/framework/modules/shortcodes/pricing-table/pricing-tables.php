<?php
namespace Medigroup\Modules\PricingTables;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTables implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'mkd_pricing_tables';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map(array(
			'name'                    => esc_html__('Pricing Tables', 'medigroup'),
			'base'                    => $this->base,
			'as_parent'               => array('only' => 'mkd_pricing_table'),
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
					'type'        => 'dropdown',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Appear effect', 'medigroup'),
					'param_name'  => 'appear_effect',
					'value'       => array(
						esc_html__('Yes', 'medigroup')   => 'yes',
						esc_html__('No', 'medigroup') => 'no',
					),
					'save_always' => true,
					'description' => ''
				)
			),
			'js_view'                 => 'VcColumnView'
		));

	}

	public function render($atts, $content = null) {
		$args = array(
			'columns' => 'mkd-two-columns',
			'appear_effect'	=> 'yes'
		);

		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '<div class="mkd-pricing-tables clearfix '.$columns.' mkd-appear-effect-'.$appear_effect.'">';
		$html .= medigroup_mikado_remove_auto_ptag($content);
		$html .= '</div>';

		return $html;
	}

}
