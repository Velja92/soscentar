<?php

class MedigroupMikadoBookingForm extends MedigroupMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkd_booking_form_widget', // Base ID
			esc_html__('Mikado Booking Form', 'medigroup') // Name
		);

		$this->setParams();
	}

	protected function setParams() {

		$opacity_array = array();
		$delta_opacity = 5;
		for ($i=100; $i>=0; $i=$i-$delta_opacity) {
			$opacity_array[strval($i)] = strval($i)."%";
		}

		$this->params = array(
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Title', 'medigroup'),
				'name'        => 'form_title'
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Slogan', 'medigroup'),
				'name'        => 'form_slogan',
				'description' => esc_html__('Appears in Booking Form above the title.', 'medigroup')
			),
			array(
				'type'        => 'dropdown',
				'title'       => esc_html__('Show Request Field?', 'medigroup'),
				'name'        => 'form_request',
				'options'     => array(
					'no' => esc_html__('No', 'medigroup'),
					'yes'  => esc_html__('Yes', 'medigroup')
				),
				'description' => esc_html__('Text area for user custom message. Works only in Vertical Layout.', 'medigroup')
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Button Text', 'medigroup'),
				'name'        => 'form_button_text'
			),
			array(
				'type'        => 'dropdown',
				'title'       => esc_html__('Form Layout', 'medigroup'),
				'name'        => 'form_layout',
				'options'     => array(
					'vertical' => esc_html__('Vertical', 'medigroup'),
					'horizontal'  => esc_html__('Horizontal', 'medigroup')
				),
				'description' => esc_html__('Horizontal is better for main menu widget area.', 'medigroup')
			),
			array(
				'type'        => 'dropdown',
				'title'       => esc_html__('Skin', 'medigroup'),
				'name'        => 'form_skin',
				'options'     => array(
					'light'  => esc_html__('Light', 'medigroup'),
					'dark' => esc_html__('Dark', 'medigroup')
				),
				'description' => ''
			),
			array(
				'type'        => 'dropdown',
				'title'       => esc_html__('Full Width?', 'medigroup'),
				'name'        => 'form_full_width',
				'options'     => array(
					'yes'  => esc_html__('Yes', 'medigroup'),
					'no' => esc_html__('No', 'medigroup')
				),
				'description' => ''
			),
			array(
				'type'        => 'dropdown',
				'title'       => esc_html__('Columns', 'medigroup'),
				'name'        => 'form_columns',
				'options'     => array(
					'1'  => esc_html__('One', 'medigroup'),
					'2' => esc_html__('Two', 'medigroup')
				),
				'description' => ''
			),
			array(
				'type'        => 'dropdown',
				'title'       => esc_html__('Background Opacity', 'medigroup'),
				'name'        => 'form_opacity',
				'options'     => $opacity_array
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Widget Text', 'medigroup'),
				'name'        => 'form_widget_text'
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Widget Link', 'medigroup'),
				'name'        => 'form_widget_link'
			),
		);

	}

	public function widget($args, $instance) {
		print $args['before_widget'];

		extract($instance);

		print medigroup_mikado_execute_shortcode('mkd_booking_form', array(
			'form_title' => $form_title,
			'form_slogan' => $form_slogan,
			'form_request' => $form_request,
			'form_button_text' => $form_button_text,
			'form_layout' => $form_layout,
			'form_skin' => $form_skin,
			'form_full_width' => $form_full_width,
			'form_columns' => $form_columns,
			'form_opacity' => $form_opacity,
			'form_widget_text' => $form_widget_text,
			'form_widget_link' => $form_widget_link,
		));

		print $args['after_widget'];
	}
}