<?php
namespace Medigroup\Modules\MiniTextSliderItem;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class MiniTextSliderItem implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'mkd_mini_text_slider_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'      => esc_html__('Mikado Mini Text Slider Item', 'medigroup'),
			'base'      => $this->base,
			'icon'      => 'icon-wpb-mini-text-slider-item extended-custom-icon',
			'category'  => esc_html__('by MIKADO', 'medigroup'),
			'as_child' => array('only' => 'mkd_mini_text_slider'),
			'params'    => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'medigroup'),
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Subtitle', 'medigroup'),
					'param_name'  => 'subtitle',
					'admin_label' => true,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Text', 'medigroup'),
					'param_name'  => 'text',
					'admin_label' => true,
				),
			)
		));
	}

	public function render($atts, $content = null) {

		$args   = array(
			'title' => '',
			'subtitle' => '',
			'text' => ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '';

		$html .=
			'<div class="mkd-mts-item">'.
				'<div class="mkd-mts-item-inner">'.
					(!empty($title) ? '<h3>'.esc_html($title).'</h3>' : '').
					(!empty($subtitle) ? '<h4>'.esc_html($subtitle).'</h4>' : '').
					(!empty($text) ? '<p>'.esc_html($text).'</p>' : '').
				'</div>'.
			'</div>'
		;

		return $html;

	}

}
