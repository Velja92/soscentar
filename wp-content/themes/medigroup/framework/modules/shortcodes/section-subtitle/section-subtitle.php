<?php
namespace Medigroup\Modules\Shortcodes\SectionSubtitle;

use Medigroup\Modules\Shortcodes\Lib;

class SectionSubtitle implements Lib\ShortcodeInterface {
	private $base;

	/**
	 * SectionSubtitle constructor.
	 */
	public function __construct() {
		$this->base = 'mkd_section_subtitle';

		add_action('vc_before_init', array($this, 'vcMap'));
	}


	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Section Subtitle', 'medigroup'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by MIKADO', 'medigroup'),
			'icon'                      => 'icon-wpb-section-subtitle extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__('Color', 'medigroup'),
					'param_name'  => 'color',
					'value'       => '',
					'save_always' => true,
					'admin_label' => true,
					'description' => esc_html__('Choose color of your subtitle', 'medigroup')
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Text Align', 'medigroup'),
					'param_name'  => 'text_align',
					'value'       => array(
						''       => '',
						esc_html__('Center', 'medigroup') => 'center',
						esc_html__('Left', 'medigroup')   => 'left',
						esc_html__('Right', 'medigroup')  => 'right'
					),
					'save_always' => true,
					'admin_label' => true,
					'description' => esc_html__('Choose alignment of your subtitle', 'medigroup')
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Text Transform', 'medigroup'),
					'param_name'  => 'text_transform',
					'value'       => array(
						''       => '',
						esc_html__('uppercase', 'medigroup') => 'uppercase',
						esc_html__('lowercase', 'medigroup')   => 'lowercase',
						esc_html__('capitalize', 'medigroup')  => 'capitalize',
						esc_html__('none', 'medigroup')  => 'none'
					),
					'save_always' => true,
					'admin_label' => true,
					'description' => esc_html__('Choose text transform of your subtitle', 'medigroup')
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__('Text', 'medigroup'),
					'param_name'  => 'text',
					'value'       => '',
					'save_always' => true,
					'admin_label' => true
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Width (%)', 'medigroup'),
					'param_name'  => 'width',
					'description' => esc_html__('Adjust the width of section subtitle in percentages. Ommit the unit', 'medigroup'),
					'value'       => '',
					'save_always' => true,
					'admin_label' => true
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'text'       => '',
			'color'      => '',
			'text_align' => '',
			'text_transform' => '',
			'width'      => ''
		);

		$params = shortcode_atts($default_atts, $atts);

		if($params['text'] !== '') {

			$params['styles']  = array();
			$params['classes'] = array('mkd-section-subtitle-holder');

			if($params['color'] !== '') {
				$params['styles'][] = 'color: '.$params['color'];
			}

			if($params['text_align'] !== '') {
				$params['styles'][] = 'text-align: '.$params['text_align'].';';

				$params['classes'][] = 'mkd-section-subtitle-'.$params['text_align'];
			}

			if($params['text_transform'] !== '') {
				$params['styles'][] = 'text-transform: '.$params['text_transform'].';';
			}

			$params['holder_styles'] = array();

			if($params['width'] !== '') {
				$params['holder_styles'][] = 'width: '.$params['width'].'%';
			}

			return medigroup_mikado_get_shortcode_module_template_part('templates/section-subtitle-template', 'section-subtitle', '', $params);
		}
	}

}
