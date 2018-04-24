<?php

if (!function_exists('medigroup_mikado_woocommerce_products_per_page')) {
	/**
	 * Function that sets number of products per page. Default is 12
	 * @return int number of products to be shown per page
	 */
	function medigroup_mikado_woocommerce_products_per_page()
	{

		$products_per_page = 12;

		if (medigroup_mikado_options()->getOptionValue('mkd_woo_products_per_page')) {
			$products_per_page = medigroup_mikado_options()->getOptionValue('mkd_woo_products_per_page');
		}
		if (isset($_GET['woo-products-count']) && $_GET['woo-products-count'] === 'view-all') {
			$products_per_page = 9999;
		}

		return $products_per_page;
	}
}

if (!function_exists('medigroup_mikado_woocommerce_related_products_args')) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 * @param $args array array of args for the query
	 * @return mixed array of changed args
	 */
	function medigroup_mikado_woocommerce_related_products_args($args)
	{

		if (medigroup_mikado_options()->getOptionValue('mkd_woo_product_list_columns')) {

			$related = medigroup_mikado_options()->getOptionValue('mkd_woo_product_list_columns');
			switch ($related) {
				case 'mkd-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'mkd-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}

		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;
	}
}

if (!function_exists('medigroup_mikado_woocommerce_template_loop_product_title')) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function medigroup_mikado_woocommerce_template_loop_product_title()
	{

		$tag = medigroup_mikado_options()->getOptionValue('mkd_products_list_title_tag');
		if ($tag === '') {
			$tag = 'h6';
		}
		the_title('<' . $tag . ' class="mkd-product-list-title"><a href="' . get_the_permalink() . '">', '</a></' . $tag . '>');
	}
}
//TODO
//if (!function_exists('medigroup_mikado_woocommerce_template_single_title')) {
//	/**
//	 * Function for overriding product title template in Single Product template
//	 */
//	function medigroup_mikado_woocommerce_template_single_title()
//	{
//
//		$tag = medigroup_mikado_options()->getOptionValue('mkd_single_product_title_tag');
//		if ($tag === '') {
//			$tag = 'h1';
//		}
//		the_title('<' . $tag . '  itemprop="name" class="mkd-single-product-title">', '</' . $tag . '>');
//	}
//}

if (!function_exists('medigroup_mikado_woocommerce_sale_flash')) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function medigroup_mikado_woocommerce_sale_flash()
	{
		if(!is_single()) {
			return '<div class="mkd-on-sale-holder"><span class="mkd-on-sale">' . esc_html__('SALE', 'medigroup') . '</span></div>';
		}
	}
}

if (!function_exists('medigroup_mikado_woocommerce_sale_flash_single')){
	/**
	 * Function for overriding Sale Flash Template on Single product page
	 * @return string
	 */
	function medigroup_mikado_woocommerce_sale_flash_single()
	{
		global $product;
		if ($product->is_on_sale()) {
			print '<div class="mkd-on-sale-holder"><span class="mkd-on-sale">' . esc_html__('SALE', 'medigroup') . '</span></div>';
		}
	}
}

if (!function_exists('medigroup_mikado_woocommerce_product_out_of_stock')) {
	/**
	 * Function for adding Out Of Stock Template
	 *
	 * @return string
	 */
	function medigroup_mikado_woocommerce_product_out_of_stock()
	{

		global $product;

		if (!$product->is_in_stock()) {
			print '<div class="mkd-out-of-stock-holder"><span class="mkd-out-of-stock">' . esc_html__('SOLD', 'medigroup') . '</span></div>';
		}
	}
}

if (!function_exists('medigroup_mikado_woocommerce_view_all_pagination')) {
	/**
	 * Function for adding New WooCommerce Pagination Template
	 *
	 * @return string
	 */
	function medigroup_mikado_woocommerce_view_all_pagination()
	{

		global $wp_query;

		if ($wp_query->max_num_pages <= 1) {
			return;
		}

		$html = '';

		if (get_option('woocommerce_shop_page_id')) {
			$html .= '<div class="mkd-woo-view-all-pagination">';
			$html .= '<a href="' . get_permalink(get_option('woocommerce_shop_page_id')) . '?woo-products-count=view-all">' . esc_html__('View All', 'medigroup') . '</a>';
			$html .= '</div>';
		}

		print $html;
	}
}

if (!function_exists('medigroup_mikado_woo_view_all_pagination_additional_tag_before')) {
	function medigroup_mikado_woo_view_all_pagination_additional_tag_before()
	{

		print '<div class="mkd-woo-pagination-holder"><div class="mkd-woo-pagination-inner">';
	}
}

if (!function_exists('medigroup_mikado_woo_view_all_pagination_additional_tag_after')) {
	function medigroup_mikado_woo_view_all_pagination_additional_tag_after()
	{

		print '</div></div>';
	}
}

if (!function_exists('medigroup_mikado_single_product_content_additional_tag_before')) {
	function medigroup_mikado_single_product_content_additional_tag_before()
	{

		print '<div class="mkd-single-product-content">';
	}
}

if (!function_exists('medigroup_mikado_single_product_content_additional_tag_after')) {
	function medigroup_mikado_single_product_content_additional_tag_after()
	{

		print '</div>';
	}
}

if (!function_exists('medigroup_mikado_single_product_summary_additional_tag_before')) {
	function medigroup_mikado_single_product_summary_additional_tag_before()
	{

		print '<div class="mkd-single-product-summary">';
	}
}

if (!function_exists('medigroup_mikado_single_product_summary_additional_tag_after')) {
	function medigroup_mikado_single_product_summary_additional_tag_after()
	{

		print '</div>';
	}
}

if (!function_exists('medigroup_mikado_pl_holder_additional_tag_before')) {
	function medigroup_mikado_pl_holder_additional_tag_before()
	{

		print '<div class="mkd-pl-main-holder">';
	}
}

if (!function_exists('medigroup_mikado_pl_holder_additional_tag_after')) {
	function medigroup_mikado_pl_holder_additional_tag_after()
	{

		print '</div>';
	}
}

if (!function_exists('medigroup_mikado_pl_inner_additional_tag_before')) {
	function medigroup_mikado_pl_inner_additional_tag_before()
	{

		print '<div class="mkd-pl-inner">';
	}
}

if (!function_exists('medigroup_mikado_pl_inner_additional_tag_after')) {
	function medigroup_mikado_pl_inner_additional_tag_after()
	{

		print '</div>';
	}
}

if (!function_exists('medigroup_mikado_pl_image_additional_tag_before')) {
	function medigroup_mikado_pl_image_additional_tag_before()
	{

		print '<div class="mkd-pl-image">';
	}
}

if (!function_exists('medigroup_mikado_pl_image_additional_tag_after')) {
	function medigroup_mikado_pl_image_additional_tag_after()
	{

		print '</div>';
	}
}

if (!function_exists('medigroup_mikado_pl_inner_text_additional_tag_before')) {
	function medigroup_mikado_pl_inner_text_additional_tag_before()
	{

		print '<div class="mkd-pl-text">';
	}
}

if (!function_exists('medigroup_mikado_pl_inner_text_additional_tag_after')) {
	function medigroup_mikado_pl_inner_text_additional_tag_after()
	{

		print '</div>';
	}
}

if (!function_exists('medigroup_mikado_pl_text_wrapper_additional_tag_before')) {
	function medigroup_mikado_pl_text_wrapper_additional_tag_before()
	{

		print '<div class="mkd-pl-text-wrapper clearfix"><div class="mkd-product-title-rating-holder">';
	}
}

if (!function_exists('medigroup_mikado_pl_text_wrapper_additional_tag_after')) {
	function medigroup_mikado_pl_text_wrapper_additional_tag_after()
	{

		print '</div>';
	}
}

if (!function_exists('medigroup_mikado_pl_rating_additional_tag_before')) {
	function medigroup_mikado_pl_rating_additional_tag_before()
	{
		global $product;

		if (get_option('woocommerce_enable_review_rating') !== 'no') {

			$rating_html = wc_get_rating_html( $product->get_average_rating() );

			if ($rating_html !== '') {
				print '<div class="mkd-pl-rating-holder">';
			}
		}
	}
}

if (!function_exists('medigroup_mikado_pl_rating_additional_tag_after')) {
	function medigroup_mikado_pl_rating_additional_tag_after()
	{
		global $product;

		if (get_option('woocommerce_enable_review_rating') !== 'no') {

			$rating_html = wc_get_rating_html( $product->get_average_rating() );

			if ($rating_html !== '') {
				print '</div>';
			}
		}
		print '</div>';
	}
}

if (!function_exists('medigroup_mikado_woo_pagination')) {
	function medigroup_mikado_woo_pagination($args)
	{
		$args['prev_text'] = '';
		$args['next_text'] = '';
		return $args;

	}
}

if(!function_exists('medigroup_mikado_remove_in_stock')){
	function medigroup_mikado_remove_in_stock(){
		return '';
	}
}

if(!function_exists('medigroup_mikado_woocommerce_get_price_html_from_to')){
	function medigroup_mikado_woocommerce_get_price_html_from_to($price = '', $from = '', $to = '', $product = null){
		global $product;

		$from         = $product->get_display_price();
		$to = $product->get_display_price( $product->get_regular_price() );

		$price = '<ins>' . ( ( is_numeric( $to ) ) ? wc_price( $to ) : $to ) . '</ins><del>' . ( ( is_numeric( $from ) ) ? wc_price( $from ) : $from ) . '</del>';

		return $price;
	}
}

if(!function_exists('medigroup_mikado_comments_open')){
	function medigroup_mikado_comments_open($open = false, $post_id = null){
			return false;
	}
}

if(!function_exists('medigroup_mikado_woocommerce_tabs_heading')){
	function medigroup_mikado_woocommerce_tabs_heading($title=''){
		return '';
	}
}

if(!function_exists('medigroup_mikado_woocommerce_adjust_message')){

	function medigroup_mikado_woocommerce_adjust_message($message, $product_id){
		$arr = explode('</a>', $message);
		$message = $arr[1] . $arr[0] . '</a>';

		return $message;
	}

}