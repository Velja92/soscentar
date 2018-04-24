<?php

if(!function_exists('medigroup_mikado_portfolio_options_map')) {

	function medigroup_mikado_portfolio_options_map() {

		medigroup_mikado_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio', 'medigroup'),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel = medigroup_mikado_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single', 'medigroup'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_template',
			'type'          => 'select',
			'label'         => esc_html__('Portfolio Type', 'medigroup'),
			'default_value' => 'small-images',
			'description'   => esc_html__('Choose a default type for Single Project pages', 'medigroup'),
			'parent'        => $panel,
			'options'       => array(
				'small-images'      => esc_html__('Portfolio small images', 'medigroup'),
				'small-slider'      => esc_html__('Portfolio small slider', 'medigroup'),
				'big-images'        => esc_html__('Portfolio big images', 'medigroup'),
				'big-slider'        => esc_html__('Portfolio big slider', 'medigroup'),
				'custom'            => esc_html__('Portfolio custom', 'medigroup'),
				'full-width-custom' => esc_html__('Portfolio full width custom', 'medigroup'),
				'gallery'           => esc_html__('Portfolio gallery', 'medigroup')
			)
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images', 'medigroup'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images.', 'medigroup'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos', 'medigroup'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.', 'medigroup'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories', 'medigroup'),
			'description'   => esc_html__('Enabling this option will disable category meta description on Single Projects.', 'medigroup'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date', 'medigroup'),
			'description'   => esc_html__('Enabling this option will disable date meta on Single Projects.', 'medigroup'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'medigroup'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'medigroup'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text', 'medigroup'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages', 'medigroup'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination', 'medigroup'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality.', 'medigroup'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '#mkd_navigate_same_category_container'
			)
		));

		$container_navigate_category = medigroup_mikado_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_nav_same_category',
			'type'          => 'yesno',
			'label'         => esc_html__('Enable Pagination Through Same Category', 'medigroup'),
			'description'   => esc_html__('Enabling this option will make portfolio pagination sort through current category.', 'medigroup'),
			'parent'        => $container_navigate_category,
			'default_value' => 'no'
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_numb_columns',
			'type'          => 'select',
			'label'         => esc_html__('Number of Columns', 'medigroup'),
			'default_value' => 'three-columns',
			'description'   => esc_html__('Enter the number of columns for Portfolio Gallery type', 'medigroup'),
			'parent'        => $panel,
			'options'       => array(
				'two-columns'   => esc_html__('2 columns', 'medigroup'),
				'three-columns' => esc_html__('3 columns', 'medigroup'),
				'four-columns'  => esc_html__('4 columns', 'medigroup')
			)
		));

		medigroup_mikado_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug', 'medigroup'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'medigroup'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action('medigroup_mikado_options_map', 'medigroup_mikado_portfolio_options_map', 14);

}