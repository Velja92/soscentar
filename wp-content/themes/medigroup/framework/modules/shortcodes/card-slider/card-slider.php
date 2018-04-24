<?php
namespace Medigroup\Modules\CardSlider;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class CardSlider implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'mkd_card_slider';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'      => esc_html__('Mikado Card Slider', 'medigroup'),
			'base'      => $this->base,
			'icon'      => 'icon-wpb-card-slider extended-custom-icon',
			'category'  => esc_html__('by MIKADO', 'medigroup'),
			'content_element' => true,
			'as_parent' => array('only' => 'mkd_card'),
			'js_view'   => 'VcColumnView',
			'params'    => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Image Position on Cards', 'medigroup'),
					'param_name'  => 'image_position',
					'admin_label' => true,
					'value'		  => array(
						esc_html__('Inside', 'medigroup')	=> 'inside',
						esc_html__('Above', 'medigroup')		=> 'above',
						esc_html__('Overlap', 'medigroup')	=> 'overlap'
					),
					'save_always' => true,
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Circular Image', 'medigroup'),
					'param_name'  => 'circular',
					'admin_label' => true,
					'value'		  => array(
						esc_html__('No', 'medigroup')	=> 'no',
						esc_html__('Yes', 'medigroup')	=> 'yes'
					),
					'save_always' => true,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Space Between Image and Text (px)', 'medigroup'),
					'param_name'  => 'space',
					'admin_label' => true,
					'value'		  => '',
					'save_always' => true,
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Number of Columns', 'medigroup'),
					'param_name'  => 'columns',
					'admin_label' => true,
					'value'		  => array(
						''		=> '',
						esc_html__('One', 'medigroup')	=> '1',
						esc_html__('Two', 'medigroup')	=> '2',
						esc_html__('Three', 'medigroup')	=> '3',
						esc_html__('Four', 'medigroup')	=> '4',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Space Between Cards (px)', 'medigroup'),
					'param_name'  => 'separation',
					'admin_label' => true,
					'value'		  => '',
					'save_always' => true,
				),
			)
		));
	}

	public function render($atts, $content = null) {

		$args   = array(
			'image_position' => '',
			'circular' => '',
			'card_color' => '',
			'space' => '',
			'columns' => '4',
			'separation' => ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$class = $image_position !== '' ? 'mkd-card-image-'.$image_position : '';
		$class .= $circular === 'yes' ? ' mkd-card-circular' : '';

		$data = $space !== '' ? (' data-space="' . esc_attr($space) .'"') : '';
		$data .= $columns !== '' ? (' data-columns="' . esc_attr($columns) .'"') : '';
		$data .= $separation !== '' ? (' data-separation="' . esc_attr($separation) .'"') : '';

		$html = '';

		$html .= 
			'<div class="mkd-card-slider '.esc_attr($class).'" '. $data .'>'.
				'<div class="mkd-card-slider-inner">'.
					do_shortcode($content).
				'</div>'.
			'</div>'
		;

		return $html;

	}

}
