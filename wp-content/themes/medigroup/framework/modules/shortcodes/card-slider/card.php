<?php
namespace Medigroup\Modules\Card;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class Card implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'mkd_card';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'      => esc_html__('Mikado Card', 'medigroup'),
			'base'      => $this->base,
			'icon'      => 'icon-wpb-card extended-custom-icon',
			'category'  => esc_html__('by MIKADO', 'medigroup'),
			'as_child' => array('only' => 'mkd_card_slider'),
			'params'    => array(
				array(
					'type'		=> 'attach_image',
					'heading'	=> esc_html__('Image', 'medigroup'),
					'param_name' => 'image',
					'admin_label' => true,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'medigroup'),
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Text', 'medigroup'),
					'param_name'  => 'text',
					'admin_label' => true,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Link', 'medigroup'),
					'param_name'  => 'link',
					'admin_label' => true,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Link Text', 'medigroup'),
					'param_name'  => 'link_text',
					'admin_label' => true,
					'dependency'  => array('element' => 'link', 'not_empty' => true),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Link Target', 'medigroup'),
					'param_name'  => 'link_target',
					'admin_label' => true,
					'value'		  => array(
						esc_html__('Same window', 'medigroup')			=> '_self',
						esc_html__('New window', 'medigroup')			=> '_blank'
					),
					'save_always' => true,
					'dependency'  => array('element' => 'link', 'not_empty' => true),
				),
			)
		));
	}

	public function render($atts, $content = null) {

		$args   = array(
			'image' => '',
			'title' => '',
			'text' => '',
			'link' => '',
			'link_text' => '',
			'link_target' => ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		return medigroup_mikado_get_shortcode_module_template_part('templates/card', 'card-slider', '', $params);

	}

}
