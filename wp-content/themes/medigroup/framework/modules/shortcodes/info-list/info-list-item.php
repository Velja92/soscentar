<?php

namespace Medigroup\Modules\InfoListItem;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * class Accordions
 */
class InfoListItem implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'mkd_info_list_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(array(
				"name"                    => esc_html__('Info List Item', 'medigroup'),
				"base"                    => $this->base,
				"as_child"                => array('only' => 'mkd_info_list'),
				"category"                => esc_html__('by MIKADO', 'medigroup'),
				"icon"                    => "icon-wpb-info-list-item extended-custom-icon",
				"show_settings_on_create" => true,
				'params'                  => array_merge(
					array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Title', 'medigroup'),
							'param_name'  => 'title',
							'admin_label' => true,
							'value'       => '',
							'description' => esc_html__('Enter item title.', 'medigroup')
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Subtitle', 'medigroup'),
							'param_name'  => 'subtitle',
							'admin_label' => true,
							'value'       => '',
							'description' => esc_html__('Enter text to be displayed in brackets.', 'medigroup')
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Info Text', 'medigroup'),
							'param_name'  => 'info',
							'admin_label' => true,
							'description' => esc_html__('Enter text to be displayed as item info.', 'medigroup')
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Link', 'medigroup'),
							'param_name'  => 'link',
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Link Target', 'medigroup'),
							'param_name'  => 'target',
							'value'       => array(
								esc_html__('Self', 'medigroup')  => '_self',
								esc_html__('Blank', 'medigroup') => '_blank'
							),
							'save_always' => true,
							'admin_label' => true
						)
					)
				)
			));
		}
	}


	public function render($atts, $content = null) {

		$default_atts = (array(
			'title' => '',
			'subtitle' => '',
			'info' => '',
			'link' => '',
			'target' => ''
		));

		$params       = shortcode_atts($default_atts, $atts);

		extract($params);

		$output = '';

		$output .= medigroup_mikado_get_shortcode_module_template_part('templates/info-list-item-template', 'info-list', '', $params);

		return $output;

	}

}