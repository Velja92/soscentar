<?php
namespace Medigroup\Modules\CoverBox;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class CoverBox implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'mkd_cover_box';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                    => esc_html__('Cover Box', 'medigroup'),
					'base'                    => $this->base,
					'as_child'                => array('only' => 'mkd_cover_boxes'),
					'as_parent'               => array('except' => 'vc_row, vc_accordion'),
					'content_element'         => true,
					'category'                => esc_html__('by MIKADO', 'medigroup'),
					'icon'                    => 'icon-wpb-cover-box extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
                        array(
                            'type'        => 'attach_image',
                            'admin_label' => true,
                            'heading'     => esc_html__('Box Image', 'medigroup'),
                            'param_name'  => 'box_image',
                            'value'       => ''
                        )
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'box_image'       => ''
		);

		$params = shortcode_atts($args, $atts);
		
		$params['content'] = $content;

		$html = medigroup_mikado_get_shortcode_module_template_part('templates/cover-box-template', 'cover-boxes', '', $params);

		return $html;
	}
}
