<?php
namespace Medigroup\Modules\ProductList;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class ProductList
 */

class ProductList implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'mkd_product_list';

		add_action('vc_before_init', array($this,'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Mikado Product List', 'medigroup'),
			'base' => $this->base,
			'icon' => 'icon-wpb-product-list extended-custom-icon',
			'category' => esc_html__('by MIKADO', 'medigroup'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__('Number of Products', 'medigroup'),
					'param_name' => 'number_of_posts',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__('Number of Columns', 'medigroup'),
					'param_name' => 'number_of_columns',
					'value' => array(
						esc_html__('Two', 'medigroup') => '2',
						esc_html__('Three', 'medigroup') => '3',
						esc_html__('Four', 'medigroup') => '4',
						esc_html__('Five', 'medigroup') => '5',
						esc_html__('Six', 'medigroup') => '6'
					),
					'description' => '',
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__('Order By', 'medigroup'),
					'param_name' => 'order_by',
					'value' => array(
						esc_html__('Title', 'medigroup') => 'title',
						esc_html__('Date', 'medigroup') => 'date',
						esc_html__('Random', 'medigroup') => 'rand',
						esc_html__('Post Name', 'medigroup') => 'name',
						esc_html__('ID', 'medigroup') => 'id',
						esc_html__('Menu Order', 'medigroup') => 'menu_order'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__('Order', 'medigroup'),
					'param_name' => 'order',
					'value' => array(
						esc_html__('ASC', 'medigroup') => 'ASC',
						esc_html__('DESC', 'medigroup') => 'DESC'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Choose Sorting Taxonomy', 'medigroup'),
					'param_name' => 'taxonomy_to_display',
					'value' => array(
						esc_html__('Category', 'medigroup') => 'category',
						esc_html__('Tag', 'medigroup') => 'tag',
						esc_html__('Id', 'medigroup') => 'id'
					),
					'save_always' => true,
					'admin_label' => true,
					'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display.', 'medigroup')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Enter Taxonomy Values', 'medigroup'),
					'param_name' => 'taxonomy_values',
					'value' => '',
					'admin_label' => true,
					'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'medigroup')
				)
			)
		) );
	}

	public function render($atts, $content = null) {

		$default_atts = array(
			'number_of_posts' 		  => '8',
			'number_of_columns' 	  => '4',
			'order_by' 				  => '',
			'order' 				  => '',
			'taxonomy_to_display' 	  => 'category',
			'taxonomy_values' 		  => '',
		);

		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['holder_classes'] = $this->getHolderClasses($params);

		$queryArray = $this->generateProductQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;

		$html = medigroup_mikado_get_shortcode_module_template_part('templates/product-list-template', 'product-list', '', $params);
		return $html;
	}

	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses($params){
		$holderClasses = '';

		$columnNumber = $this->getColumnNumberClass($params);

		$holderClasses .= $columnNumber;

		return $holderClasses;
	}

	/**
	 * Generates columns number classes for product list holder
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getColumnNumberClass($params){

		$columnsNumber = '';
		$columns = $params['number_of_columns'];

		switch ($columns) {
			case 2:
				$columnsNumber = 'mkd-two-columns';
				break;
			case 3:
				$columnsNumber = 'mkd-three-columns';
				break;
			case 4:
				$columnsNumber = 'mkd-four-columns';
				break;
			case 5:
				$columnsNumber = 'mkd-five-columns';
				break;
			case 6:
				$columnsNumber = 'mkd-six-columns';
				break;
			default:
				$columnsNumber = 'mkd-four-columns';
				break;
		}

		return $columnsNumber;
	}

	/**
	 * Generates query array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function generateProductQueryArray($params){

		$queryArray = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => $params['number_of_posts'],
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'meta_query' => WC()->query->get_meta_query()
		);

		if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category') {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}

		if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag') {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}

		if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id') {
			$idArray = $params['taxonomy_values'];
			$ids = explode(',', $idArray);
			$queryArray['post__in'] = $ids;
		}

		return $queryArray;
	}
}