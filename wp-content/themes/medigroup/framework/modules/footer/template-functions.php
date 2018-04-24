<?php

if(!function_exists('medigroup_mikado_register_footer_sidebar')) {

	function medigroup_mikado_register_footer_sidebar() {

		register_sidebar(array(
			'name'          => esc_html__('Footer Column 1', 'medigroup'),
			'id'            => 'footer_column_1',
			'description'   => esc_html__('Footer Column 1', 'medigroup'),
			'before_widget' => '<div id="%1$s" class="widget mkd-footer-column-1 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="mkd-footer-widget-title">',
			'after_title'   => '</h4>'
		));

		register_sidebar(array(
			'name'          => esc_html__('Footer Column 2', 'medigroup'),
			'id'            => 'footer_column_2',
			'description'   => esc_html__('Footer Column 2', 'medigroup'),
			'before_widget' => '<div id="%1$s" class="widget mkd-footer-column-2 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="mkd-footer-widget-title">',
			'after_title'   => '</h4>'
		));

		register_sidebar(array(
			'name'          => esc_html__('Footer Column 3', 'medigroup'),
			'id'            => 'footer_column_3',
			'description'   => esc_html__('Footer Column 3', 'medigroup'),
			'before_widget' => '<div id="%1$s" class="widget mkd-footer-column-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="mkd-footer-widget-title">',
			'after_title'   => '</h4>'
		));

		register_sidebar(array(
			'name'          => esc_html__('Footer Column 4', 'medigroup'),
			'id'            => 'footer_column_4',
			'description'   => esc_html__('Footer Column 4', 'medigroup'),
			'before_widget' => '<div id="%1$s" class="widget mkd-footer-column-4 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="mkd-footer-widget-title">',
			'after_title'   => '</h4>'
		));

		register_sidebar(array(
			'name'          => esc_html__('Footer Bottom', 'medigroup'),
			'id'            => 'footer_text',
			'description'   => esc_html__('Footer Bottom', 'medigroup'),
			'before_widget' => '<div id="%1$s" class="widget mkd-footer-text %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="mkd-footer-widget-title">',
			'after_title'   => '</h4>'
		));

		register_sidebar(array(
			'name'          => esc_html__('Footer Bottom Left', 'medigroup'),
			'id'            => 'footer_bottom_left',
			'description'   => esc_html__('Footer Bottom Left', 'medigroup'),
			'before_widget' => '<div id="%1$s" class="widget mkd-footer-bottom-left %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="mkd-footer-widget-title">',
			'after_title'   => '</h4>'
		));

		register_sidebar(array(
			'name'          => esc_html__('Footer Bottom Right', 'medigroup'),
			'id'            => 'footer_bottom_right',
			'description'   => esc_html__('Footer Bottom Right', 'medigroup'),
			'before_widget' => '<div id="%1$s" class="widget mkd-footer-bottom-right %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="mkd-footer-widget-title">',
			'after_title'   => '</h4>'
		));

	}

	add_action('widgets_init', 'medigroup_mikado_register_footer_sidebar');

}

if(!function_exists('medigroup_mikado_get_footer')) {
	/**
	 * Loads footer HTML
	 */
	function medigroup_mikado_get_footer() {

		$parameters                          = array();
		$id                                  = medigroup_mikado_get_page_id();
		$parameters['footer_classes']        = medigroup_mikado_get_footer_classes($id);
		$parameters['display_footer_top']    = (medigroup_mikado_options()->getOptionValue('show_footer_top') == 'yes') ? true : false;
		$parameters['display_footer_bottom'] = (medigroup_mikado_options()->getOptionValue('show_footer_bottom') == 'yes') ? true : false;

		medigroup_mikado_get_module_template_part('templates/footer', 'footer', '', $parameters);

	}

}

if(!function_exists('medigroup_mikado_get_content_bottom_area')) {
	/**
	 * Loads content bottom area HTML with all needed parameters
	 */
	function medigroup_mikado_get_content_bottom_area() {

		$parameters = array();

		//Current page id
		$id = medigroup_mikado_get_page_id();

		//is content bottom area enabled for current page?
		$parameters['content_bottom_area'] = medigroup_mikado_get_meta_field_intersect('enable_content_bottom_area');
		if($parameters['content_bottom_area'] == 'yes') {
			//Sidebar for content bottom area
			$parameters['content_bottom_area_sidebar'] = medigroup_mikado_get_meta_field_intersect('content_bottom_sidebar_custom_display');
			//Content bottom area in grid
			$parameters['content_bottom_area_in_grid'] = medigroup_mikado_get_meta_field_intersect('content_bottom_in_grid');
			//Content bottom area background color
			$parameters['content_bottom_background_color'] = 'background-color: '.medigroup_mikado_get_meta_field_intersect('content_bottom_background_color');
		}

		medigroup_mikado_get_module_template_part('templates/parts/content-bottom-area', 'footer', '', $parameters);

	}

}

if(!function_exists('medigroup_mikado_get_footer_top')) {
	/**
	 * Return footer top HTML
	 */
	function medigroup_mikado_get_footer_top() {

		$parameters = array();

		$parameters['footer_top_border']         = medigroup_mikado_get_footer_top_border();
		$parameters['footer_top_border_in_grid'] = (medigroup_mikado_options()->getOptionValue('footer_top_border_in_grid') == 'yes') ? 'mkd-in-grid' : '';
		$parameters['footer_in_grid']            = (medigroup_mikado_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
		$parameters['footer_top_classes']        = medigroup_mikado_footer_top_classes();
		$parameters['footer_top_columns']        = medigroup_mikado_options()->getOptionValue('footer_top_columns');

		medigroup_mikado_get_module_template_part('templates/parts/footer-top', 'footer', '', $parameters);

	}

}

if(!function_exists('medigroup_mikado_get_footer_bottom')) {
	/**
	 * Return footer bottom HTML
	 */
	function medigroup_mikado_get_footer_bottom() {

		$parameters = array();

		$parameters['footer_bottom_border']         = medigroup_mikado_get_footer_bottom_border();
		$parameters['footer_bottom_border_in_grid'] = (medigroup_mikado_options()->getOptionValue('footer_bottom_border_in_grid') == 'yes') ? 'mkd-in-grid' : '';
		$parameters['footer_in_grid']               = (medigroup_mikado_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
		$parameters['footer_bottom_columns']        = medigroup_mikado_options()->getOptionValue('footer_bottom_columns');
		$parameters['footer_bottom_border_bottom']  = medigroup_mikado_get_footer_bottom_bottom_border();

		medigroup_mikado_get_module_template_part('templates/parts/footer-bottom', 'footer', '', $parameters);

	}

}

//Functions for loading sidebars

if(!function_exists('medigroup_mikado_get_footer_sidebar_25_25_50')) {

	function medigroup_mikado_get_footer_sidebar_25_25_50() {
		medigroup_mikado_get_module_template_part('templates/sidebars/sidebar-three-columns-25-25-50', 'footer');
	}

}

if(!function_exists('medigroup_mikado_get_footer_sidebar_50_25_25')) {

	function medigroup_mikado_get_footer_sidebar_50_25_25() {
		medigroup_mikado_get_module_template_part('templates/sidebars/sidebar-three-columns-50-25-25', 'footer');
	}

}

if(!function_exists('medigroup_mikado_get_footer_sidebar_four_columns')) {

	function medigroup_mikado_get_footer_sidebar_four_columns() {
		medigroup_mikado_get_module_template_part('templates/sidebars/sidebar-four-columns', 'footer');
	}

}

if(!function_exists('medigroup_mikado_get_footer_sidebar_three_columns')) {

	function medigroup_mikado_get_footer_sidebar_three_columns() {
		medigroup_mikado_get_module_template_part('templates/sidebars/sidebar-three-columns', 'footer');
	}

}

if(!function_exists('medigroup_mikado_get_footer_sidebar_two_columns')) {

	function medigroup_mikado_get_footer_sidebar_two_columns() {
		medigroup_mikado_get_module_template_part('templates/sidebars/sidebar-two-columns', 'footer');
	}

}

if(!function_exists('medigroup_mikado_get_footer_sidebar_one_column')) {

	function medigroup_mikado_get_footer_sidebar_one_column() {
		medigroup_mikado_get_module_template_part('templates/sidebars/sidebar-one-column', 'footer');
	}

}

if(!function_exists('medigroup_mikado_get_footer_bottom_sidebar_three_columns')) {

	function medigroup_mikado_get_footer_bottom_sidebar_three_columns() {
		medigroup_mikado_get_module_template_part('templates/sidebars/sidebar-bottom-three-columns', 'footer');
	}

}

if(!function_exists('medigroup_mikado_get_footer_bottom_sidebar_two_columns')) {

	function medigroup_mikado_get_footer_bottom_sidebar_two_columns() {
		medigroup_mikado_get_module_template_part('templates/sidebars/sidebar-bottom-two-columns', 'footer');
	}

}

if(!function_exists('medigroup_mikado_get_footer_bottom_sidebar_one_column')) {

	function medigroup_mikado_get_footer_bottom_sidebar_one_column() {
		medigroup_mikado_get_module_template_part('templates/sidebars/sidebar-bottom-one-column', 'footer');
	}

}

