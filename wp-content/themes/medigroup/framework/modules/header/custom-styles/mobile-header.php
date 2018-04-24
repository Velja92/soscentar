<?php

if(!function_exists('medigroup_mikado_mobile_header_general_styles')) {
	/**
	 * Generates general custom styles for mobile header
	 */
	function medigroup_mikado_mobile_header_general_styles() {
		$mobile_header_styles = array();
		if(medigroup_mikado_options()->getOptionValue('mobile_header_height') !== '') {
			$mobile_header_styles['height'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('mobile_header_height')).'px';
		}

		if(medigroup_mikado_options()->getOptionValue('mobile_header_background_color')) {
			$mobile_header_styles['background-color'] = medigroup_mikado_options()->getOptionValue('mobile_header_background_color');
		}

		echo medigroup_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-header-inner', $mobile_header_styles);
	}

	add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_mobile_header_general_styles');
}

if(!function_exists('medigroup_mikado_mobile_navigation_styles')) {
	/**
	 * Generates styles for mobile navigation
	 */
	function medigroup_mikado_mobile_navigation_styles() {
		$mobile_nav_styles = array();
		if(medigroup_mikado_options()->getOptionValue('mobile_menu_background_color')) {
			$mobile_nav_styles['background-color'] = medigroup_mikado_options()->getOptionValue('mobile_menu_background_color');
		}

		echo medigroup_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-nav', $mobile_nav_styles);

		$mobile_nav_item_styles = array();
		if(medigroup_mikado_options()->getOptionValue('mobile_menu_separator_color') !== '') {
			$mobile_nav_item_styles['border-bottom-color'] = medigroup_mikado_options()->getOptionValue('mobile_menu_separator_color');
		}

		if(medigroup_mikado_options()->getOptionValue('mobile_text_color') !== '') {
			$mobile_nav_item_styles['color'] = medigroup_mikado_options()->getOptionValue('mobile_text_color');
		}

		if(medigroup_mikado_is_font_option_valid(medigroup_mikado_options()->getOptionValue('mobile_font_family'))) {
			$mobile_nav_item_styles['font-family'] = medigroup_mikado_get_formatted_font_family(medigroup_mikado_options()->getOptionValue('mobile_font_family'));
		}

		if(medigroup_mikado_options()->getOptionValue('mobile_font_size') !== '') {
			$mobile_nav_item_styles['font-size'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('mobile_font_size')).'px';
		}

		if(medigroup_mikado_options()->getOptionValue('mobile_line_height') !== '') {
			$mobile_nav_item_styles['line-height'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('mobile_line_height')).'px';
		}

		if(medigroup_mikado_options()->getOptionValue('mobile_text_transform') !== '') {
			$mobile_nav_item_styles['text-transform'] = medigroup_mikado_options()->getOptionValue('mobile_text_transform');
		}

		if(medigroup_mikado_options()->getOptionValue('mobile_font_style') !== '') {
			$mobile_nav_item_styles['font-style'] = medigroup_mikado_options()->getOptionValue('mobile_font_style');
		}

		if(medigroup_mikado_options()->getOptionValue('mobile_font_weight') !== '') {
			$mobile_nav_item_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('mobile_font_weight');
		}

		$mobile_nav_item_selector = array(
			'.mkd-mobile-header .mkd-mobile-nav a',
			'.mkd-mobile-header .mkd-mobile-nav h4'
		);

		echo medigroup_mikado_dynamic_css($mobile_nav_item_selector, $mobile_nav_item_styles);

		$mobile_nav_item_hover_styles = array();
		if(medigroup_mikado_options()->getOptionValue('mobile_text_hover_color') !== '') {
			$mobile_nav_item_hover_styles['color'] = medigroup_mikado_options()->getOptionValue('mobile_text_hover_color');
		}

		$mobile_nav_item_selector_hover = array(
			'.mkd-mobile-header .mkd-mobile-nav a:hover',
			'.mkd-mobile-header .mkd-mobile-nav h4:hover'
		);

		echo medigroup_mikado_dynamic_css($mobile_nav_item_selector_hover, $mobile_nav_item_hover_styles);
	}

	add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_mobile_navigation_styles');
}

if(!function_exists('medigroup_mikado_mobile_logo_styles')) {
	/**
	 * Generates styles for mobile logo
	 */
	function medigroup_mikado_mobile_logo_styles() {
		if(medigroup_mikado_options()->getOptionValue('mobile_logo_height') !== '') { ?>
			@media only screen and (max-width: 1000px) {
			<?php echo medigroup_mikado_dynamic_css(
				'.mkd-mobile-header .mkd-mobile-logo-wrapper a',
				array('height' => medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('mobile_logo_height')).'px !important')
			); ?>
			}
		<?php }

		if(medigroup_mikado_options()->getOptionValue('mobile_logo_height_phones') !== '') { ?>
			@media only screen and (max-width: 480px) {
			<?php echo medigroup_mikado_dynamic_css(
				'.mkd-mobile-header .mkd-mobile-logo-wrapper a',
				array('height' => medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('mobile_logo_height_phones')).'px !important')
			); ?>
			}
		<?php }

		if(medigroup_mikado_options()->getOptionValue('mobile_header_height') !== '') {
			$max_height = intval(medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('mobile_header_height')) * 0.9).'px';
			echo medigroup_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-logo-wrapper a', array('max-height' => $max_height));
		}
	}

	add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_mobile_logo_styles');
}

if(!function_exists('medigroup_mikado_mobile_icon_styles')) {
	/**
	 * Generates styles for mobile icon opener
	 */
	function medigroup_mikado_mobile_icon_styles() {
		$mobile_icon_styles = array();
		if(medigroup_mikado_options()->getOptionValue('mobile_icon_color') !== '') {
			$mobile_icon_styles['color'] = medigroup_mikado_options()->getOptionValue('mobile_icon_color');
		}

		if(medigroup_mikado_options()->getOptionValue('mobile_icon_size') !== '') {
			$mobile_icon_styles['font-size'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('mobile_icon_size')).'px';
		}

		echo medigroup_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-menu-opener a', $mobile_icon_styles);

		if(medigroup_mikado_options()->getOptionValue('mobile_icon_hover_color') !== '') {
			echo medigroup_mikado_dynamic_css(
				'.mkd-mobile-header .mkd-mobile-menu-opener a:hover',
				array('color' => medigroup_mikado_options()->getOptionValue('mobile_icon_hover_color')));
		}
	}

	add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_mobile_icon_styles');
}