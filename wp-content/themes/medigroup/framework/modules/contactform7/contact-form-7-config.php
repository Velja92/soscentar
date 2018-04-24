<?php
if(!function_exists('medigroup_mikado_contact_form_map')) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function medigroup_mikado_contact_form_map() {

		vc_add_param('contact-form-7', array(
			'type'        => 'dropdown',
			'heading'     => esc_html__('Style', 'medigroup'),
			'param_name'  => 'html_class',
			'value'       => array(
				esc_html__('Default', 'medigroup')        => 'default',
				esc_html__('Custom Style 1', 'medigroup') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'medigroup') => 'cf7_custom_style_2'
			),
			'description' => esc_html__('You can style each form element individually in Mikado Options > Contact Form 7', 'medigroup')
		));

	}

	add_action('vc_after_init', 'medigroup_mikado_contact_form_map');
}
?>