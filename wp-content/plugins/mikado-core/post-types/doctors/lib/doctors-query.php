<?php
namespace MikadoCore\CPT\Doctors\Lib;

class DoctorsQuery {
	/**
	 * @var private instance of current class
	 */
	private static $instance;

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {
	}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {
	}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {
	}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	public function queryVCParams() {
		return array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Order By', 'mkd-core'),
				'param_name'  => 'order_by',
				'value'       => array(
					esc_html__('Menu Order', 'mkd-core') => 'menu_order',
					esc_html__('Title', 'mkd-core')      => 'title',
					esc_html__('Date', 'mkd-core')       => 'date'
				),
				'admin_label' => true,
				'save_always' => true,
				'description' => '',
				'group'       => esc_html__('Query Options', 'mkd-core')
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Order', 'mkd-core'),
				'param_name'  => 'order',
				'value'       => array(
					esc_html__('ASC', 'mkd-core')  => 'ASC',
					esc_html__('DESC', 'mkd-core') => 'DESC',
				),
				'admin_label' => true,
				'save_always' => true,
				'description' => '',
				'group'       => esc_html__('Query Options', 'mkd-core')
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('One-Department Doctors List', 'mkd-core'),
				'param_name'  => 'department',
				'value'       => '',
				'admin_label' => true,
				'description' => esc_html__('Enter one department slug (leave empty to show all departments)', 'mkd-core'),
				'group'       => esc_html__('Query Options', 'mkd-core')
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Number of Doctors Per Page', 'mkd-core'),
				'param_name'  => 'number',
				'value'       => '-1',
				'admin_label' => true,
				'description' => '(enter -1 to show all)',
				'group'       => esc_html__('Query Options', 'mkd-core')
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Show Only Doctors with Listed IDs', 'mkd-core'),
				'param_name'  => 'selected_doctors',
				'value'       => '',
				'admin_label' => true,
				'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)', 'mkd-core'),
				'group'       => esc_html__('Query Options', 'mkd-core')
			)
		);
	}

	public function getShortcodeAtts() {
		return array(
			'order_by'          => 'date',
			'order'             => 'ASC',
			'number'            => '-1',
			'department'          => '',
			'selected_doctors' => '',
			'next_page'         => ''
		);
	}

	public function buildQueryObject($params) {
		$queryArray = array(
			'post_type'      => 'doctor',
			'orderby'        => $params['order_by'],
			'order'          => $params['order'],
			'posts_per_page' => $params['number']
		);

		if(!empty($params['department'])) {
			$queryArray['department'] = $params['department'];
		}

		$doctoriDs = null;
		if(!empty($params['selected_doctors'])) {
			$doctoriDs             = explode(',', $params['selected_doctors']);
			$queryArray['post__in'] = $doctoriDs;
		}

		if(!empty($params['next_page'])) {
			$queryArray['paged'] = $params['next_page'];

		} else {
			$queryArray['paged'] = 1;
		}

		return new \WP_Query($queryArray);
	}
}