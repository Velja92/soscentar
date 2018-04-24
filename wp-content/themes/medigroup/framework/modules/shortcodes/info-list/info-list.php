<?php
namespace Medigroup\Modules\InfoList;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * class Accordions
 */
class InfoList implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'mkd_info_list';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map(array(
			'name'                    => esc_html__('Info List', 'medigroup'),
			'base'                    => $this->base,
			'as_parent'               => array('only' => 'mkd_info_list_item'),
			'content_element'         => true,
			'category'                => esc_html__('by MIKADO', 'medigroup'),
			'icon'                    => 'icon-wpb-info-list extended-custom-icon',
			'show_settings_on_create' => true,
			'js_view'                 => 'VcColumnView',
			'params'                  => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'medigroup'),
					'param_name'  => 'title',
					'admin_label' => true,
					'value'       => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Button Text', 'medigroup'),
					'param_name'  => 'link_text',
					'admin_label' => true,
					'description' => esc_html__('Enter text for the button below the list items.', 'medigroup')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Button Link', 'medigroup'),
					'param_name'  => 'link',
					'admin_label' => true,
					'dependency'  => array('element' => 'link_text', 'not_empty' => true)
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Button Target', 'medigroup'),
					'param_name'  => 'target',
					'value'       => array(
						esc_html__('Self', 'medigroup')  => '_self',
						esc_html__('Blank', 'medigroup') => '_blank'
					),
					'save_always' => true,
					'admin_label' => true,
					'dependency'  => array('element' => 'link_text', 'not_empty' => true)
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'title' => '',
			'link_text' => '',
			'link' => '',
			'target' => ''
		);

		$params       = shortcode_atts($default_atts, $atts);
		extract($params);

		$params['content']   = $content;

		$output = '';

		$output .= medigroup_mikado_get_shortcode_module_template_part('templates/info-list-template', 'info-list', '', $params);

		return $output;
	}
}
