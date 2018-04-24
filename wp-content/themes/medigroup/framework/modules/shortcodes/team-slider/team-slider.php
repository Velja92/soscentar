<?php
namespace Medigroup\Modules\Shortcodes\TeamSlider;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class TeamSlider implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'mkd_team_slider';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'      => esc_html__('Mikado Team Slider', 'medigroup'),
			'base'      => $this->base,
			'icon'      => 'icon-wpb-team-slider extended-custom-icon',
			'category'  => esc_html__('by MIKADO', 'medigroup'),
			'content_element' => true,
			'as_parent' => array('only' => 'mkd_team'),
			'js_view'   => 'VcColumnView',
			'params'    => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Number of Columns', 'medigroup'),
					'param_name' => 'columns',
					'value'      => array(
						esc_html__('Three', 'medigroup')  => '3',
						esc_html__('Four', 'medigroup') => '4',
					),
					'save_always' => true,
				)
			)
		));
	}

	public function render($atts, $content = null) {

		$args   = array(
			'columns' => '4',
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '';

		$html .= 
			'<div class="mkd-team-slider" data-columns="'.esc_attr($columns).'">'.
				'<div class="mkd-team-slider-inner">'.
					do_shortcode($content).
				'</div>'.
			'</div>'
		;

		return $html;

	}

}
