<?php
namespace MikadoCore\CPT\Carousels;

use MikadoCore\Lib;

/**
 * Class CarouselRegister
 * @package MikadoCore\CPT\Carousels
 */
class CarouselRegister implements Lib\PostTypeInterface {
	/**
	 * @var string
	 */
	private $base;
	/**
	 * @var string
	 */
	private $taxBase;

	public function __construct() {
		$this->base    = 'carousels';
		$this->taxBase = 'carousels_category';
	}

	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Registers custom post type with WordPress
	 */
	public function register() {
		$this->registerPostType();
		$this->registerTax();
	}

	/**
	 * Registers custom post type with WordPress
	 */
	private function registerPostType() {
		global $medigroup_Framework;

		$menuPosition = 5;
		$menuIcon     = 'dashicons-admin-post';
		if(mkd_core_theme_installed()) {
			$menuPosition = $medigroup_Framework->getSkin()->getMenuItemPosition('carousel');
			$menuIcon     = $medigroup_Framework->getSkin()->getMenuIcon('carousel');
		}

		register_post_type($this->base,
			array(
				'labels'        => array(
					'name'          => __('Mikado Carousel', 'mkd-core'),
					'menu_name'     => __('Mikado Carousel', 'mkd-core'),
					'all_items'     => __('Carousel Items', 'mkd-core'),
					'add_new'       => __('Add New Carousel Item', 'mkd-core'),
					'singular_name' => __('Carousel Item', 'mkd-core'),
					'add_item'      => __('New Carousel Item', 'mkd-core'),
					'add_new_item'  => __('Add New Carousel Item', 'mkd-core'),
					'edit_item'     => __('Edit Carousel Item', 'mkd-core')
				),
				'public'        => false,
				'show_in_menu'  => true,
				'rewrite'       => array('slug' => 'carousels'),
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'has_archive'   => false,
				'hierarchical'  => false,
				'supports'      => array('title'),
				'menu_icon'     => $menuIcon
			)
		);
	}

	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => __('Carousels', 'taxonomy general name'),
			'singular_name'     => __('Carousel', 'taxonomy singular name'),
			'search_items'      => __('Search Carousels', 'mkd-core'),
			'all_items'         => __('All Carousels', 'mkd-core'),
			'parent_item'       => __('Parent Carousel', 'mkd-core'),
			'parent_item_colon' => __('Parent Carousel:', 'mkd-core'),
			'edit_item'         => __('Edit Carousel', 'mkd-core'),
			'update_item'       => __('Update Carousel', 'mkd-core'),
			'add_new_item'      => __('Add New Carousel', 'mkd-core'),
			'new_item_name'     => __('New Carousel Name', 'mkd-core'),
			'menu_name'         => __('Carousels', 'mkd-core'),
		);

		register_taxonomy($this->taxBase, array($this->base), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array('slug' => 'carousels-category'),
		));
	}

}