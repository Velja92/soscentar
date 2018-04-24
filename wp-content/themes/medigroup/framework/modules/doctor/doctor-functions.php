<?php

if(!function_exists('medigroup_mikado_single_doctor')) {
	/**
	 * Loads holder template for doctor single
	 */
	function medigroup_mikado_single_doctor() {

		$params = array(
			'sidebar' => medigroup_mikado_sidebar_layout(),
			'holder_class'       => array(
				'mkd-doctor-single-holder'
			)
		);

		medigroup_mikado_get_module_template_part('templates/single/holder', 'doctor', '', $params);
	}
}

if(!function_exists('medigroup_mikado_doctor_get_info_part')) {
	/**
	 * Loads doctor info item based on passed param
	 *
	 * @param $part
	 */
	function medigroup_mikado_doctor_get_info_part($part) {

		medigroup_mikado_get_module_template_part('templates/single/parts/'.$part, 'doctor');
	}
}

if(!function_exists('medigroup_mikado_doctor_render_info_item')) {

	function medigroup_mikado_doctor_render_info_item($meta_name) {

		$html = '';
		$data = medigroup_mikado_doctor_get_data_for_meta($meta_name);

		if (!empty($data)) { 
			$html .=
				'<div class="mkd-doctor-info-item">'.
					'<div class="mkd-doctor-info-item-inner clearfix">'.
						'<div class="mkd-doctor-info-item-left"><h6>'. $data['key'] . '</h6></div>'.
						'<div class="mkd-doctor-info-item-right">'. $data['value'] .'</div>'.
					'</div>'.
				'</div>'
			;
		}

		return $html;
	}
}

if(!function_exists('medigroup_mikado_doctor_get_data_for_meta')) {

	function medigroup_mikado_doctor_get_data_for_meta($meta_name) {

		$data = array();
		$value = get_post_meta(get_the_ID(), $meta_name, true);

		if (!empty($value) && $value !== '') {

			switch ($meta_name) {
				case 'mkd_doctor_position':
				$data['key'] = __('Position', 'medigroup');
				$data['value'] = '<span>' . esc_html($value) . '</span>';
				break;

				case 'mkd_doctor_specialty':
				$data['key'] = __('Specialty', 'medigroup');
				$data['value'] = '<span>' . esc_html($value) . '</span>';
				break;

				case 'mkd_doctor_training':
				$data['key'] = __('Training', 'medigroup');
				$data['value'] = wp_autop($value);
				break;
			}
		}

		return $data;
	}
}