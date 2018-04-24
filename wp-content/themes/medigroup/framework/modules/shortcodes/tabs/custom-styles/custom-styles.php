<?php
if(!function_exists('medigroup_mikado_tabs_typography_styles')) {
	function medigroup_mikado_tabs_typography_styles() {
		$selector              = '.mkd-tabs .mkd-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family           = medigroup_mikado_options()->getOptionValue('tabs_font_family');

		if(medigroup_mikado_is_font_option_valid($font_family)) {
			$tabs_tipography_array['font-family'] = medigroup_mikado_is_font_option_valid($font_family);
		}

		$text_transform = medigroup_mikado_options()->getOptionValue('tabs_text_transform');
		if(!empty($text_transform)) {
			$tabs_tipography_array['text-transform'] = $text_transform;
		}

		$font_style = medigroup_mikado_options()->getOptionValue('tabs_font_style');
		if(!empty($font_style)) {
			$tabs_tipography_array['font-style'] = $font_style;
		}

		$letter_spacing = medigroup_mikado_options()->getOptionValue('tabs_letter_spacing');
		if($letter_spacing !== '') {
			$tabs_tipography_array['letter-spacing'] = medigroup_mikado_filter_px($letter_spacing).'px';
		}

		$font_weight = medigroup_mikado_options()->getOptionValue('tabs_font_weight');
		if(!empty($font_weight)) {
			$tabs_tipography_array['font-weight'] = $font_weight;
		}

		echo medigroup_mikado_dynamic_css($selector, $tabs_tipography_array);
	}

	add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_tabs_typography_styles');
}

if(!function_exists('medigroup_mikado_tabs_inital_color_styles')) {
	function medigroup_mikado_tabs_inital_color_styles() {
		$selector = '.mkd-tabs .mkd-tabs-nav li a';
		$styles   = array();

		if(medigroup_mikado_options()->getOptionValue('tabs_color')) {
			$styles['color'] = medigroup_mikado_options()->getOptionValue('tabs_color');
		}
		if(medigroup_mikado_options()->getOptionValue('tabs_back_color')) {
			$styles['background-color'] = medigroup_mikado_options()->getOptionValue('tabs_back_color');
		}
		if(medigroup_mikado_options()->getOptionValue('tabs_border_color')) {
			$styles['border-color'] = medigroup_mikado_options()->getOptionValue('tabs_border_color');
		}

		echo medigroup_mikado_dynamic_css($selector, $styles);
	}

	add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_tabs_inital_color_styles');
}
if(!function_exists('medigroup_mikado_tabs_active_color_styles')) {
	function medigroup_mikado_tabs_active_color_styles() {
		$selector = '.mkd-tabs .mkd-tabs-nav li.ui-state-active a, .mkd-tabs .mkd-tabs-nav li.ui-state-hover a';
		$styles   = array();

		if(medigroup_mikado_options()->getOptionValue('tabs_color_active')) {
			$styles['color'] = medigroup_mikado_options()->getOptionValue('tabs_color_active');
		}
		if(medigroup_mikado_options()->getOptionValue('tabs_back_color_active')) {
			$styles['background-color'] = medigroup_mikado_options()->getOptionValue('tabs_back_color_active');
		}
		if(medigroup_mikado_options()->getOptionValue('tabs_border_color_active')) {
			$styles['border-color'] = medigroup_mikado_options()->getOptionValue('tabs_border_color_active');
		}

		echo medigroup_mikado_dynamic_css($selector, $styles);
	}

	add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_tabs_active_color_styles');
}