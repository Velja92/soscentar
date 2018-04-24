<?php
namespace Medigroup\Modules\OrderedList;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class OrderedList implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'mkd_list_ordered';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map(array(
			'name'                      => esc_html__('List - Ordered', 'medigroup'),
			'base'                      => $this->base,
			'icon'                      => 'icon-wpb-ordered-list extended-custom-icon',
			'category'                  => esc_html__('by MIKADO', 'medigroup'),
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textarea_html',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__('Content', 'medigroup'),
					'param_name'  => 'content',
					'value'       => '<ol><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ol>',
					'description' => ''
				)
			)
		));

	}

	public function render($atts, $content = null) {
		$html = '';
		$html .= '<div class= "mkd-ordered-list" >'.medigroup_mikado_remove_auto_ptag($content, true).'</div>';

		return $html;
	}

}

