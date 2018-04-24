<?php
namespace MikadoCore\CPT\Doctors;

use MikadoCore\Lib\PostTypeInterface;

/**
 * Class DoctorsRegister
 * @package MikadoCore\CPT\Doctors
 */
class DoctorsRegister implements PostTypeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base    = 'doctor';
		$this->taxBase = 'department';

		add_filter('single_template', array($this, 'registerSingleTemplate'));
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
	 * Registers doctor single template if one doesn't exist in theme.
	 * Hooked to single_template filter
	 *
	 * @param $single string current template
	 *
	 * @return string string changed template
	 */
	public function registerSingleTemplate($single) {
		global $post;

		if($post->post_type == $this->base) {
			if(!file_exists(get_template_directory().'/single-'.$this->base.'.php')) {
				return MIKADO_CORE_CPT_PATH.'/doctors/templates/single-'.$this->base.'.php';
			}
		}

		return $single;
	}

	/**
	 * Registers custom post type with WordPress
	 */
	private function registerPostType() {
		global $medigroup_Framework, $medigroup_options;

		$menuPosition = 5;
		$menuIcon     = 'dashicons-admin-post';
		$slug         = $this->base;

		if(mkd_core_theme_installed()) {
			$menuPosition = $medigroup_Framework->getSkin()->getMenuItemPosition('doctors');
			$menuIcon     = $medigroup_Framework->getSkin()->getMenuIcon('doctors');

			if(isset($medigroup_options['doctor_single_slug'])) {
				if($medigroup_options['doctor_single_slug'] != "") {
					$slug = $medigroup_options['doctor_single_slug'];
				}
			}
		}

		register_post_type($this->base,
			array(
				'labels'        => array(
					'name'          => esc_html__('Doctors', 'mkd-core'),
					'singular_name' => esc_html__('Doctor', 'mkd-core'),
					'add_item'      => esc_html__('New Doctor', 'mkd-core'),
					'add_new_item'  => esc_html__('Add New Doctor', 'mkd-core'),
					'edit_item'     => esc_html__('Edit Doctor', 'mkd-core')
				),
				'public'        => true,
				'has_archive'   => true,
				'rewrite'       => array('slug' => $slug),
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'supports'      => array(
					'title',
					'editor',
					'thumbnail',
					'excerpt',
					'page-attributes',
					'comments'
				),
				'menu_icon'     => $menuIcon
			)
		);
	}

	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => esc_html__('Departments', 'taxonomy general name'),
			'singular_name'     => esc_html__('Department', 'taxonomy singular name'),
			'search_items'      => esc_html__('Search Departments', 'mkd-core'),
			'all_items'         => esc_html__('All Departments', 'mkd-core'),
			'parent_item'       => esc_html__('Parent Department', 'mkd-core'),
			'parent_item_colon' => esc_html__('Parent Department:', 'mkd-core'),
			'edit_item'         => esc_html__('Edit Department', 'mkd-core'),
			'update_item'       => esc_html__('Update Department', 'mkd-core'),
			'add_new_item'      => esc_html__('Add New Department', 'mkd-core'),
			'new_item_name'     => esc_html__('New Department Name', 'mkd-core'),
			'menu_name'         => esc_html__('Departments', 'mkd-core'),
		);

		register_taxonomy($this->taxBase, array($this->base), array(
			'hierarchical' => true,
			'labels'       => $labels,
			'show_ui'      => true,
			'query_var'    => true,
			'rewrite'      => array('slug' => 'department'),
		));
	}
}