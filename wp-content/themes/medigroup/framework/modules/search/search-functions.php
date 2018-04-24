<?php

if(!function_exists('medigroup_mikado_search_body_class')) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function medigroup_mikado_search_body_class($classes) {

		if(is_active_widget(false, false, 'mkd_search_opener')) {

			$classes[] = 'mkd-'.medigroup_mikado_options()->getOptionValue('search_type');

			if(medigroup_mikado_options()->getOptionValue('search_type') == 'fullscreen-search') {

				$classes[] = 'mkd-'.medigroup_mikado_options()->getOptionValue('search_animation');

			}

		}

		return $classes;

	}

	add_filter('body_class', 'medigroup_mikado_search_body_class');
}

if(!function_exists('medigroup_mikado_get_search')) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function medigroup_mikado_get_search() {

		if(medigroup_mikado_active_widget(false, false, 'mkd_search_opener')) {

			$search_type = medigroup_mikado_options()->getOptionValue('search_type');

			if($search_type == 'search-covers-header') {
				medigroup_mikado_set_position_for_covering_search();

				return;
			} else if($search_type == 'search-slides-from-window-top' || $search_type == 'search-slides-from-header-bottom') {
				medigroup_mikado_set_search_position_in_menu($search_type);
				if(medigroup_mikado_is_responsive_on()) {
					medigroup_mikado_set_search_position_mobile();
				}

				return;
			} elseif($search_type === 'search-dropdown') {
				medigroup_mikado_set_dropdown_search_position();

				return;
			}

			medigroup_mikado_load_search_template();

		}
	}

}

if(!function_exists('medigroup_mikado_set_position_for_covering_search')) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function medigroup_mikado_set_position_for_covering_search() {

		$containing_sidebar = medigroup_mikado_active_widget(false, false, 'mkd_search_opener');

		foreach($containing_sidebar as $sidebar) {

			if(strpos($sidebar, 'top-bar') !== false) {
				add_action('medigroup_mikado_after_header_top_html_open', 'medigroup_mikado_load_search_template');
			} else if(strpos($sidebar, 'main-menu') !== false) {
				add_action('medigroup_mikado_after_header_menu_area_html_open', 'medigroup_mikado_load_search_template');
			} else if(strpos($sidebar, 'mobile-logo') !== false) {
				add_action('medigroup_mikado_after_mobile_header_html_open', 'medigroup_mikado_load_search_template');
			} else if(strpos($sidebar, 'logo') !== false) {
				add_action('medigroup_mikado_after_header_logo_area_html_open', 'medigroup_mikado_load_search_template');
			} else if(strpos($sidebar, 'sticky') !== false) {
				add_action('medigroup_mikado_after_sticky_menu_html_open', 'medigroup_mikado_load_search_template');
			}

		}

	}

}

if(!function_exists('medigroup_mikado_set_search_position_in_menu')) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function medigroup_mikado_set_search_position_in_menu($type) {

		add_action('medigroup_mikado_after_header_menu_area_html_open', 'medigroup_mikado_load_search_template');
		if($type == 'search-slides-from-header-bottom') {
			add_action('medigroup_mikado_after_sticky_menu_html_open', 'medigroup_mikado_load_search_template');
		}

	}
}

if(!function_exists('medigroup_mikado_set_search_position_mobile')) {
	/**
	 * Hooks search template to mobile header
	 */
	function medigroup_mikado_set_search_position_mobile() {

		add_action('medigroup_mikado_after_mobile_header_html_open', 'medigroup_mikado_load_search_template');

	}

}

if(!function_exists('medigroup_mikado_load_search_template')) {
	/**
	 * Loads HTML template with parameters
	 */
	function medigroup_mikado_load_search_template() {
		global $medigroup_IconCollections;

		$search_type = medigroup_mikado_options()->getOptionValue('search_type');

		$search_icon       = '';
		$search_icon_close = '';
		if(medigroup_mikado_options()->getOptionValue('search_icon_pack') !== '') {
			$search_icon       = $medigroup_IconCollections->getSearchIcon(medigroup_mikado_options()->getOptionValue('search_icon_pack'), true);
			$search_icon_close = $medigroup_IconCollections->getSearchClose(medigroup_mikado_options()->getOptionValue('search_icon_pack'), true);
		}

		$parameters = array(
			'search_in_grid'    => medigroup_mikado_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
			'search_icon'       => $search_icon,
			'search_icon_close' => $search_icon_close
		);

		medigroup_mikado_get_module_template_part('templates/types/'.$search_type, 'search', '', $parameters);

	}

}

if(!function_exists('medigroup_mikado_set_dropdown_search_position')) {
	function medigroup_mikado_set_dropdown_search_position() {
		add_action('medigroup_mikado_after_search_opener', 'medigroup_mikado_load_search_template');
	}
}