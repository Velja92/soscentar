<?php
namespace MikadoBmiCalculator\Shortcodes;

use MikadoBmiCalculator\Lib\ShortcodeInterface;

class BmiCalculatorForm implements ShortcodeInterface {
	private $base;

	/**
	 * BmiCalculatorForm constructor.
	 */
	public function __construct() {
		$this->base = 'mkd_bmi_calculator';

		add_action('vc_before_init', array($this, 'vcMap'));
	}


	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Mikado BMI Calculator Form', 'mkd_bmi'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by MIKADO', 'mkd_bmi'),
			'icon'                      => 'extended-custom-icon icon-wpb-bmi-calculator',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Display BMI Chart', 'mkd_bmi'),
					'param_name'  => 'display_chart',
					'admin_label' => true,
					'value'       => array(
						esc_html('Yes', 'mkd_bmi') => 'yes',
						esc_html('No', 'mkd_bmi')  => 'no'
					),
					'save_always' => true
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('BMI Chart Title', 'mkd_bmi'),
					'param_name'  => 'chart_title',
					'admin_label' => true,
					'value'       => '',
					'save_always' => true
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Form Title', 'mkd_bmi'),
					'param_name'  => 'form_title',
					'admin_label' => true,
					'value'       => '',
					'save_always' => true
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__('Form Description', 'mkd_bmi'),
					'param_name'  => 'form_description',
					'admin_label' => true,
					'value'       => '',
					'save_always' => true
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'display_chart'    => '',
			'chart_title'      => '',
			'form_title'       => '',
			'form_description' => ''
		);

		$params = shortcode_atts($default_atts, $atts);

		return mkd_bmi_get_template_part('shortcodes/bmi-calculator-form/templates/bmi-calculator-form-template', '', $params, true);
	}
}