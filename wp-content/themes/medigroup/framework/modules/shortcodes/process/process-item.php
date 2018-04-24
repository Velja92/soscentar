<?php
namespace Medigroup\Modules\Shortcodes\Process;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessItem implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'mkd_process_item';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                    => esc_html__('Process Item', 'medigroup'),
			'base'                    => $this->getBase(),
			'as_child'                => array('only' => 'mkd_process_holder'),
			'category'                => esc_html__('by MIKADO', 'medigroup'),
			'icon'                    => 'icon-wpb-call-to-action extended-custom-icon',
			'show_settings_on_create' => true,
			'params'                  => array(
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__('Image', 'medigroup'),
					'param_name' => 'image'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'medigroup'),
					'param_name'  => 'title',
					'save_always' => true,
					'admin_label' => true
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__('Text', 'medigroup'),
					'param_name'  => 'text',
					'save_always' => true,
					'admin_label' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Highlight Item?', 'medigroup'),
					'param_name'  => 'highlighted',
					'value'       => array(
						esc_html__('No', 'medigroup')  => 'no',
						esc_html__('Yes', 'medigroup') => 'yes'
					),
					'save_always' => true,
					'admin_label' => true
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'image'       => '',
			'title'       => '',
			'text'        => '',
			'highlighted' => ''
		);

		$params = shortcode_atts($default_atts, $atts);

		$params['item_classes'] = array(
			'mkd-process-item-holder'
		);

		if($params['highlighted'] === 'yes') {
			$params['item_classes'][] = 'mkd-pi-highlighted';
		}

		return medigroup_mikado_get_shortcode_module_template_part('templates/process-item-template', 'process', '', $params);
	}

}