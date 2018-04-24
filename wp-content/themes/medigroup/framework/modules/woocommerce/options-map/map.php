<?php

if ( ! function_exists('medigroup_mikado_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function medigroup_mikado_woocommerce_options_map() {

		medigroup_mikado_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'medigroup'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = medigroup_mikado_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List', 'medigroup')
			)
		);

		medigroup_mikado_add_admin_field(array(
			'name'        	=> 'mkd_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns', 'medigroup'),
			'default_value'	=> 'mkd-woocommerce-columns-4',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product', 'medigroup'),
			'options'		=> array(
				'mkd-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)', 'medigroup'),
				'mkd-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)', 'medigroup')
			),
			'parent'      	=> $panel_product_list,
		));

		medigroup_mikado_add_admin_field(array(
			'name'        	=> 'mkd_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page', 'medigroup'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page', 'medigroup'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		medigroup_mikado_add_admin_field(array(
			'name'        	=> 'mkd_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag', 'medigroup'),
			'default_value'	=> 'h4',
			'description' 	=> '',
			'options'		=> array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'      	=> $panel_product_list,
		));
//TODO
//		/**
//		 * Single Product Settings
//		 */
//		$panel_single_product = medigroup_mikado_add_admin_panel(
//			array(
//				'page' => '_woocommerce_page',
//				'name' => 'panel_single_product',
//				'title' => 'Single Product'
//			)
//		);

//		medigroup_mikado_add_admin_field(array(
//			'name'        	=> 'mkd_single_product_title_tag',
//			'type'        	=> 'select',
//			'label'       	=> 'Single Product Title Tag',
//			'default_value'	=> 'h2',
//			'description' 	=> '',
//			'options'		=> array(
//				'h1' => 'h1',
//				'h2' => 'h2',
//				'h3' => 'h3',
//				'h4' => 'h4',
//				'h5' => 'h5',
//				'h6' => 'h6',
//			),
//			'parent'      	=> $panel_single_product,
//		));

		/**
		 * DropDown Cart Widget Settings
		 */
		$panel_dropdown_cart = medigroup_mikado_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_dropdown_cart',
				'title' => esc_html__('Dropdown Cart Widget', 'medigroup')
			)
		);

			medigroup_mikado_add_admin_field(array(
				'name'        	=> 'mkd_woo_dropdown_cart_description',
				'type'        	=> 'text',
				'label'       	=> esc_html__('Cart Description', 'medigroup'),
				'default_value'	=> '',
				'description' 	=> esc_html__('Enter dropdown cart description', 'medigroup'),
				'parent'      	=> $panel_dropdown_cart
			));
	}

	add_action( 'medigroup_mikado_options_map', 'medigroup_mikado_woocommerce_options_map', 21);
}