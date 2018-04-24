<?php

if(!function_exists('medigroup_mikado_get_button_html')) {
	/**
	 * Calls button shortcode with given parameters and returns it's output
	 *
	 * @param $params
	 *
	 * @return mixed|string
	 */
	function medigroup_mikado_get_button_html($params) {
		$button_html = medigroup_mikado_execute_shortcode('mkd_button', $params);
		$button_html = str_replace("\n", '', $button_html);
		return $button_html;
	}
}

if(!function_exists('medigroup_mikado_get_btn_hover_animation_types')) {
	/**
	 * @param bool $empty_val
	 *
	 * @return array
	 */
	function medigroup_mikado_get_btn_hover_animation_types($empty_val = false) {
		$types = array(
			'disable'         => esc_html__('Disable Animation', 'medigroup'),
			'fill-from-top'   => esc_html__('Fill From Top', 'medigroup'),
			'fill-from-left'  => esc_html__('Fill From Left', 'medigroup'),
			'fill-from-right' => esc_html__('Fill From Right', 'medigroup')
		);

		if($empty_val) {
			$types = array_merge(array(
				'' => 'Default'
			), $types);
		}

		return $types;
	}
}

if(!function_exists('mkd_get_btn_types')) {
	function medigroup_mikado_get_btn_types($empty_val = false) {
		$types = array(
			'outline'       => esc_html__('Outline', 'medigroup'),
			'solid'         => esc_html__('Solid', 'medigroup'),
			'white'         => esc_html__('White', 'medigroup'),
			'white-outline' => esc_html__('White Outline', 'medigroup'),
			'transparent'   => esc_html__('Transparent', 'medigroup'),
			'black'         => esc_html__('Black', 'medigroup')
		);

		if($empty_val) {
			$types = array_merge(array(
				'' => esc_html__('Default', 'medigroup')
			), $types);
		}

		return $types;
	}
}

if(!function_exists('mkd_get_btn_icon_html')) {
	function mkd_get_btn_icon_html($icon, $icon_pack) {
		$html = '';

		$html .= 
			'<span class="mkd-btn-icon-holder">'.
				medigroup_mikado_icon_collections()->renderIcon($icon, $icon_pack, array(
					'icon_attributes' => array(
						'class' => 'mkd-btn-icon-elem'
					)
				)).
			'</span>'
		;

		return $html;
	}
}