<?php

if(!function_exists('medigroup_mikado_register_top_header_areas')) {
	/**
	 * Registers widget areas for top header bar when it is enabled
	 */
	function medigroup_mikado_register_top_header_areas() {
		$top_bar_layout = medigroup_mikado_options()->getOptionValue('top_bar_layout');

		register_sidebar(array(
			'name'          => esc_html__('Top Bar Left', 'medigroup'),
			'id'            => 'mkd-top-bar-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s mkd-top-bar-widget"><div class="mkd-top-bar-widget-inner">',
			'after_widget'  => '</div></div>'
		));

		//register this widget area only if top bar layout is three columns
		if($top_bar_layout === 'three-columns') {
			register_sidebar(array(
				'name'          => esc_html__('Top Bar Center', 'medigroup'),
				'id'            => 'mkd-top-bar-center',
				'before_widget' => '<div id="%1$s" class="widget %2$s mkd-top-bar-widget"><div class="mkd-top-bar-widget-inner">',
				'after_widget'  => '</div></div>'
			));
		}

		register_sidebar(array(
			'name'          => esc_html__('Top Bar Right', 'medigroup'),
			'id'            => 'mkd-top-bar-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s mkd-top-bar-widget"><div class="mkd-top-bar-widget-inner">',
			'after_widget'  => '</div></div>'
		));
	}

	add_action('widgets_init', 'medigroup_mikado_register_top_header_areas');
}

if(!function_exists('medigroup_mikado_header_vertical_widget_areas')) {
	/**
	 * Registers widget areas for vertical header
	 */
	function medigroup_mikado_header_vertical_widget_areas() {

			register_sidebar(array(
				'name'          => esc_html__('Vertical Area', 'medigroup'),
				'id'            => 'mkd-vertical-area',
				'before_widget' => '<div id="%1$s" class="widget %2$s mkd-vertical-area-widget">',
				'after_widget'  => '</div>',
				'description'   => esc_html__('Widgets added here will appear on the bottom of vertical menu', 'medigroup')
			));

	}

	add_action('widgets_init', 'medigroup_mikado_header_vertical_widget_areas');
}

if(!function_exists('medigroup_mikado_header_type1_widget_areas')) {
	/**
	 * Registers widget areas for header type 1
	 */
	function medigroup_mikado_header_type1_widget_areas() {

			register_sidebar(array(
				'name'          => esc_html__('Right From Logo', 'medigroup'),
				'id'            => 'mkd-right-from-logo',
				'before_widget' => '<div id="%1$s" class="widget %2$s mkd-right-from-logo-widget">',
				'after_widget'  => '</div>',
				'description'   => esc_html__('Widgets added here will appear on the right hand side from the logo', 'medigroup')
			));

			register_sidebar(array(
				'name'          => esc_html__('Right From Main Menu', 'medigroup'),
				'id'            => 'mkd-right-from-main-menu',
				'before_widget' => '<div id="%1$s" class="widget %2$s mkd-right-from-main-menu-widget"><div class="mkd-right-from-main-menu-widget-inner">',
				'after_widget'  => '</div></div>',
				'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'medigroup')
			));
		
	}

	add_action('widgets_init', 'medigroup_mikado_header_type1_widget_areas');
}

if(!function_exists('medigroup_mikado_register_mobile_header_areas')) {
	/**
	 * Registers widget areas for mobile header
	 */
	function medigroup_mikado_register_mobile_header_areas() {
		if(medigroup_mikado_is_responsive_on()) {
			register_sidebar(array(
				'name'          => esc_html__('Right From Mobile Logo', 'medigroup'),
				'id'            => 'mkd-right-from-mobile-logo',
				'before_widget' => '<div id="%1$s" class="widget %2$s mkd-right-from-mobile-logo">',
				'after_widget'  => '</div>',
				'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'medigroup')
			));
		}
	}

	add_action('widgets_init', 'medigroup_mikado_register_mobile_header_areas');
}

if(!function_exists('medigroup_mikado_register_sticky_header_areas')) {
	/**
	 * Registers widget area for sticky header
	 */
	function medigroup_mikado_register_sticky_header_areas() {
		if(in_array(medigroup_mikado_options()->getOptionValue('header_behaviour'), array(
			'sticky-header-on-scroll-up',
			'sticky-header-on-scroll-down-up'
		))) {
			register_sidebar(array(
				'name'          => esc_html__('Sticky Right', 'medigroup'),
				'id'            => 'mkd-sticky-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s mkd-sticky-right-widget"><div class="mkd-sticky-right-widget-inner">',
				'after_widget'  => '</div></div>',
				'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'medigroup')
			));
		}
	}

	add_action('widgets_init', 'medigroup_mikado_register_sticky_header_areas');
}