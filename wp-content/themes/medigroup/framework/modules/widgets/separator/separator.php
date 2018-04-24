<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class MedigroupMikadoSeparatorWidget extends MedigroupMikadoWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'mkd_separator_widget', // Base ID
			esc_html__('Mikado Separator Widget', 'medigroup') // Name
		);

		$this->setParams();
	}

	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'title'   => esc_html__('Type', 'medigroup'),
				'name'    => 'type',
				'options' => array(
					'normal'     => esc_html__('Normal', 'medigroup'),
					'full-width' => esc_html__('Full Width', 'medigroup')
				)
			),
			array(
				'type'    => 'dropdown',
				'title'   => esc_html__('Position', 'medigroup'),
				'name'    => 'position',
				'options' => array(
					'center' => esc_html__('Center', 'medigroup'),
					'left'   => esc_html__('Left', 'medigroup'),
					'right'  => esc_html__('Right', 'medigroup')
				)
			),
			array(
				'type'    => 'dropdown',
				'title'   => esc_html__('Style', 'medigroup'),
				'name'    => 'border_style',
				'options' => array(
					'solid'  => esc_html__('Solid', 'medigroup'),
					'dashed' => esc_html__('Dashed', 'medigroup'),
					'dotted' => esc_html__('Dotted', 'medigroup')
				)
			),
			array(
				'type'  => 'textfield',
				'title' => esc_html__('Color', 'medigroup'),
				'name'  => 'color'
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Width', 'medigroup'),
				'name'        => 'width',
				'description' => ''
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Thickness (px)', 'medigroup'),
				'name'        => 'thickness',
				'description' => ''
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Top Margin', 'medigroup'),
				'name'        => 'top_margin',
				'description' => ''
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Bottom Margin', 'medigroup'),
				'name'        => 'bottom_margin',
				'description' => ''
			)
		);
	}

	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget($args, $instance) {

		extract($args);

		//prepare variables
		$params = '';

		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params .= " $key='$value' ";
			}
		}

		echo '<div class="widget mkd-separator-widget">';

		//finally call the shortcode
		echo do_shortcode("[mkd_separator $params]"); // XSS OK

		echo '</div>'; //close div.mkd-separator-widget
	}
}