<?php
namespace Medigroup\Modules\MiniTextSlider;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class MiniTextSlider implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'mkd_mini_text_slider';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'      => esc_html__('Mikado Mini Text Slider', 'medigroup'),
			'base'      => $this->base,
			'icon'      => 'icon-wpb-mini-text-slider extended-custom-icon',
			'category'  => esc_html__('by MIKADO', 'medigroup'),
			'content_element' => true,
			'as_parent' => array('only' => 'mkd_mini_text_slider_item'),
			'js_view'   => 'VcColumnView',
			'params'    => array(
			),
			'show_settings_on_create' => false
		));
	}

	public function render($atts, $content = null) {

		$args   = array(

		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '';

		$html .= 
			'<div class="mkd-mini-text-slider">'.
				'<div class="mkd-mts-inner">'.
					do_shortcode($content).
				'</div>'.
			'</div>'
		;

		return $html;

	}

}
