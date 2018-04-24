<?php

namespace Medigroup\Modules\AccordionTab;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * class Accordions
 */
class AccordionTab implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'mkd_accordion_tab';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(array(
				"name"                    => esc_html__('Mikado Accordion Tab', 'medigroup'),
				"base"                    => $this->base,
				"as_parent"               => array('except' => 'vc_row'),
				"as_child"                => array('only' => 'mkd_accordion'),
				'is_container'            => true,
				"category"                => esc_html__('by MIKADO', 'medigroup'),
				"icon"                    => "icon-wpb-accordion-section extended-custom-icon",
				"show_settings_on_create" => true,
				"js_view"                 => 'VcColumnView',
				'params'                  => array_merge(
					medigroup_mikado_icon_collections()->getVCParamsArray(array(), '', true),
					array(
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__('Custom Icon', 'medigroup'),
							'param_name' => 'custom_icon',
							'description' => esc_html__('For best results, use icons not larger than 32x32.', 'medigroup')
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Title', 'medigroup'),
							'param_name'  => 'title',
							'admin_label' => true,
							'value'       => esc_html__('Section', 'medigroup'),
							'description' => esc_html__('Enter accordion section title.', 'medigroup')
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Text in Brackets', 'medigroup'),
							'param_name'  => 'brackets',
							'admin_label' => true,
							'description' => esc_html__('Enter text to be displayed in brackets next to the title.', 'medigroup')
						),
						array(
							'type'        => 'el_id',
							'heading'     => esc_html__('Section ID', 'medigroup'),
							'param_name'  => 'el_id',
							'description' => sprintf(esc_html__('Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'medigroup'), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">'.esc_html__('link', 'medigroup').'</a>'),
						),
					)
				)
			));
		}
	}


	public function render($atts, $content = null) {

		$default_atts = (array(
			'custom_icon' => '',
			'title' => 'Accordion Title',
			'brackets' => '',
			'el_id' => ''
		));

		$default_atts = array_merge($default_atts, medigroup_mikado_icon_collections()->getShortcodeParams());
		$params       = shortcode_atts($default_atts, $atts);

		$iconPackName   = medigroup_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$params['icon'] = $iconPackName ? $params[$iconPackName] : '';

		$params['link_params'] = $this->getLinkParams($params);

		extract($params);
		$params['content'] = $content;

		$output = '';

		$output .= medigroup_mikado_get_shortcode_module_template_part('templates/accordion-template', 'accordions', '', $params);

		return $output;

	}

	private function getLinkParams($params) {
		$linkParams = array();

		if(!empty($params['link']) && !empty($params['link_text'])) {
			$linkParams['link']      = $params['link'];
			$linkParams['link_text'] = $params['link_text'];

			$linkParams['link_target'] = !empty($params['link_target']) ? $params['link_target'] : '_self';
		}

		return $linkParams;
	}

}