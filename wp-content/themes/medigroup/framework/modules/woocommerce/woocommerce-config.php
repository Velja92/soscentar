<?php
/**
 * Woocommerce configuration file
 */

// Adds theme support for woocommerce
add_theme_support('woocommerce');

// Disable the default WooCommerce stylesheet
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

if (!function_exists('medigroup_mikado_woocommerce_content')) {
	/**
	 * Output WooCommerce content.
	 *
	 * This function is only used in the optional 'woocommerce.php' template
	 * which people can add to their themes to add basic woocommerce support
	 * without hooks or modifying core templates.
	 *
	 * @access public
	 * @return void
	 */
	function medigroup_mikado_woocommerce_content()
	{

		if (is_singular('product')) {

			while (have_posts()) : the_post();

				wc_get_template_part('content', 'single-product');

			endwhile;

		} else {

			if (have_posts()) :

				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action('woocommerce_before_shop_loop');

				woocommerce_product_loop_start();

				woocommerce_product_subcategories();

				while (have_posts()) : the_post();

					wc_get_template_part('content', 'product');

				endwhile; // end of the loop.

				woocommerce_product_loop_end();

				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action('woocommerce_after_shop_loop');

			elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) :

				wc_get_template('loop/no-products-found.php');

			endif;
		}
	}
}

/*************** GENERAL FILTERS - begin ***************/

//Define number of products per page
add_filter('loop_shop_per_page', 'medigroup_mikado_woocommerce_products_per_page', 20);

//Set number of related products
add_filter('woocommerce_output_related_products_args', 'medigroup_mikado_woocommerce_related_products_args');

//Sale flash template override
add_filter('woocommerce_sale_flash', 'medigroup_mikado_woocommerce_sale_flash');
add_filter('woocommerce_product_thumbnails', 'medigroup_mikado_woocommerce_sale_flash_single');

//Replace default navigation on shop list
add_filter('woocommerce_pagination_args', 'medigroup_mikado_woo_pagination');

//Out of stock template
add_filter('woocommerce_product_thumbnails', 'medigroup_mikado_woocommerce_product_out_of_stock');
add_action('woocommerce_before_shop_loop_item_title', 'medigroup_mikado_woocommerce_product_out_of_stock', 10);
//TODO
//Add view all pagination for product lists
//	add_action('woocommerce_after_shop_loop', 'medigroup_mikado_woocommerce_view_all_pagination', 11);
//TODO
//Add additional html tags around woocommerce pagination
//add_action('woocommerce_after_shop_loop', 'medigroup_mikado_woo_view_all_pagination_additional_tag_before', 9);
//add_action('woocommerce_after_shop_loop', 'medigroup_mikado_woo_view_all_pagination_additional_tag_after', 12);


/*************** GENERAL FILTERS - end ***************/

/*************** PRODUCT LISTS FILTERS - begin ***************/

//Add additional html tags around product lists
add_action('woocommerce_before_shop_loop', 'medigroup_mikado_pl_holder_additional_tag_before', 35);
add_action('woocommerce_after_shop_loop', 'medigroup_mikado_pl_holder_additional_tag_after', 5);

//Add open additional html tag around product elements
add_action('woocommerce_before_shop_loop_item', 'medigroup_mikado_pl_inner_additional_tag_before', 5);

//Remove open and close link position
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

//Add additional html tags around image and marks
add_action('woocommerce_before_shop_loop_item_title', 'medigroup_mikado_pl_image_additional_tag_before', 5);
add_action('woocommerce_before_shop_loop_item_title', 'medigroup_mikado_pl_image_additional_tag_after', 15);

//Add end additional html tag around product elements
add_action('medigroup_mikado_woo_pl_info_below_image', 'medigroup_mikado_pl_inner_additional_tag_after', 17);

//Add open and close link position
add_action('medigroup_mikado_woo_pl_info_below_image', 'woocommerce_template_loop_product_link_open', 16);
add_action('medigroup_mikado_woo_pl_info_below_image', 'woocommerce_template_loop_product_link_close', 16);

//Add additional html around product info elements
add_action('medigroup_mikado_woo_pl_info_below_image', 'medigroup_mikado_pl_inner_text_additional_tag_before', 5);
add_action('medigroup_mikado_woo_pl_info_below_image', 'medigroup_mikado_pl_inner_text_additional_tag_after', 15);

//Add additional html at the end of product info elements
add_action('medigroup_mikado_woo_pl_info_below_image', 'medigroup_mikado_pl_text_wrapper_additional_tag_before', 20);
add_action('medigroup_mikado_woo_pl_info_below_image', 'medigroup_mikado_pl_text_wrapper_additional_tag_after', 30);

//Override product title with our own html
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('medigroup_mikado_woo_pl_info_below_image', 'medigroup_mikado_woocommerce_template_loop_product_title', 22);
//TODO
//Change rating star position
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
	add_action('medigroup_mikado_woo_pl_info_below_image', 'woocommerce_template_loop_rating', 24);

//Add additional html tags around rating star element
	add_action('medigroup_mikado_woo_pl_info_below_image', 'medigroup_mikado_pl_rating_additional_tag_before', 23);
	add_action('medigroup_mikado_woo_pl_info_below_image', 'medigroup_mikado_pl_rating_additional_tag_after', 25);

//	Add additional html tags around rating star element
//add_action('woocommerce_after_shop_loop_item_title', 'medigroup_mikado_pl_rating_additional_tag_before', 4);
//add_action('woocommerce_after_shop_loop_item_title', 'medigroup_mikado_pl_rating_additional_tag_after', 6);

//Change price position
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('medigroup_mikado_woo_pl_info_below_image', 'woocommerce_template_loop_price', 26);

//Change add to cart position
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('medigroup_mikado_woo_pl_info_below_image', 'woocommerce_template_loop_add_to_cart', 14);

//add_filter('woocommerce_get_price_html_from_to','medigroup_mikado_woocommerce_get_price_html_from_to');


/*************** PRODUCT LISTS FILTERS - end ***************/

/*************** PRODUCT SINGLE FILTERS - begin ***************/

//Add additional html around single product summary and images
add_action('woocommerce_before_single_product_summary', 'medigroup_mikado_single_product_content_additional_tag_before', 5);
add_action('woocommerce_after_single_product_summary', 'medigroup_mikado_single_product_content_additional_tag_after', 1);

//Add additional html around single product summary
add_action('woocommerce_before_single_product_summary', 'medigroup_mikado_single_product_summary_additional_tag_before', 30);
add_action('woocommerce_after_single_product_summary', 'medigroup_mikado_single_product_summary_additional_tag_after', 5);
//TODO
//Change title position
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
//add_action('woocommerce_single_product_summary', 'medigroup_mikado_woocommerce_template_single_title', 5);

//Change product meta position
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
//add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 25);

//Add social share (default woocommerce_share)
add_action('woocommerce_single_product_summary', 'medigroup_mikado_woocommerce_share', 28);
//TODO
//Change tabs position
//remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
//add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60);

//Remove in stock text from non grouped products
add_filter('woocommerce_get_stock_html','medigroup_mikado_remove_in_stock');

//Remove default titles from tabs
add_filter('woocommerce_product_description_heading','medigroup_mikado_woocommerce_tabs_heading');
add_filter('woocommerce_product_additional_information_heading','medigroup_mikado_woocommerce_tabs_heading');

//Reverse the order of link and text in the message
add_filter('wc_add_to_cart_message_html', 'medigroup_mikado_woocommerce_adjust_message', 10, 2);

/*************** PRODUCT SINGLE FILTERS - end ***************/