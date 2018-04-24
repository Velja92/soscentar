<?php
namespace Medigroup\Modules\Shortcodes\Button;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class Button that represents button shortcode
 * @package Medigroup\Modules\Shortcodes\Button
 */
class Button implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	/**
	 * Sets base attribute and registers shortcode with Visual Composer
	 */
	public function __construct() {
		$this->base = 'mkd_button';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base attribute
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer
	 */
	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Button', 'medigroup'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by MIKADO', 'medigroup'),
			'icon'                      => 'icon-wpb-button extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Size', 'medigroup'),
						'param_name'  => 'size',
						'value'       => array(
							esc_html__('Default', 'medigroup')                => '',
							esc_html__('Small', 'medigroup')                  => 'small',
							esc_html__('Medium', 'medigroup')                 => 'medium',
							esc_html__('Large', 'medigroup')                  => 'large',
							esc_html__('Extra Large', 'medigroup')            => 'huge',
							esc_html__('Extra Large Full Width', 'medigroup') => 'huge-full-width'
						),
						'save_always' => true,
						'admin_label' => true
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Type', 'medigroup'),
						'param_name'  => 'type',
						'value'       => array_flip(medigroup_mikado_get_btn_types(true)),
						'save_always' => true,
						'admin_label' => true
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Hover Type', 'medigroup'),
						'param_name'  => 'hover_type',
						'value'       => array_flip(medigroup_mikado_get_btn_types(true)),
						'save_always' => true,
						'admin_label' => true
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Text', 'medigroup'),
						'param_name'  => 'text',
						'admin_label' => true
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
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Custom CSS class', 'medigroup'),
						'param_name'  => 'custom_class',
						'admin_label' => true
					)
				),
				medigroup_mikado_icon_collections()->getVCParamsArray(array(), '', true),
				array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Icon Position', 'medigroup'),
						'param_name'  => 'icon_position',
						'value'       => array(
							esc_html__('Left', 'medigroup')                => 'left',
							esc_html__('Right', 'medigroup')                  => 'right'
						),
						'admin_label' => true,
						'save_always' => true,
						'dependency'  => array('element' => 'icon_pack', 'value' => medigroup_mikado_icon_collections()->getIconCollectionsKeys())
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Hover Animation', 'medigroup'),
						'param_name'  => 'hover_animation',
						'group'       => esc_html__('Hover Animation', 'medigroup'),
						'value'       => array_flip(medigroup_mikado_get_btn_hover_animation_types(true)),
						'admin_label' => true,
						'group'       => 'Design Options'
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Underline on Hover', 'medigroup'),
						'param_name'  => 'underline_on_hover',
						'group'       => esc_html__('Hover Animation', 'medigroup'),
						'value'       => array(
							esc_html__('Default', 'medigroup') => '',
							esc_html__('Yes', 'medigroup')	  => 'yes',
							esc_html__('No', 'medigroup')	  => 'no'
						),
						'admin_label' => true,
						'group'       => esc_html__('Design Options', 'medigroup')
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Color', 'medigroup'),
						'param_name'  => 'color',
						'group'       => esc_html__('Design Options', 'medigroup'),
						'admin_label' => true
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Hover Color', 'medigroup'),
						'param_name'  => 'hover_color',
						'group'       => esc_html__('Design Options', 'medigroup'),
						'admin_label' => true
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Background Color', 'medigroup'),
						'param_name'  => 'background_color',
						'admin_label' => true,
						'dependency'  => array('element' => 'type', 'value' => array('solid')),
						'group'       => esc_html__('Design Options', 'medigroup')
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Hover Background Color', 'medigroup'),
						'param_name'  => 'hover_background_color',
						'admin_label' => true,
						'group'       => esc_html__('Design Options', 'medigroup')
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Border Color', 'medigroup'),
						'param_name'  => 'border_color',
						'admin_label' => true,
						'group'       => esc_html__('Design Options', 'medigroup')
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Hover Border Color', 'medigroup'),
						'param_name'  => 'hover_border_color',
						'admin_label' => true,
						'group'       => esc_html__('Design Options', 'medigroup')
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Font Size (px)', 'medigroup'),
						'param_name'  => 'font_size',
						'admin_label' => true,
						'group'       => esc_html__('Design Options', 'medigroup')
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Font Weight', 'medigroup'),
						'param_name'  => 'font_weight',
						'value'       => array_flip(medigroup_mikado_get_font_weight_array(true)),
						'admin_label' => true,
						'group'       => esc_html__('Design Options', 'medigroup'),
						'save_always' => true
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Padding', 'medigroup'),
						'param_name'  => 'padding',
						'description' => esc_html__('Insert padding in format: 0px 0px 1px 0px', 'medigroup'),
						'admin_label' => true,
						'group'       => esc_html__('Design Options', 'medigroup')
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Margin', 'medigroup'),
						'param_name'  => 'margin',
						'description' => esc_html__('Insert margin in format: 0px 0px 1px 0px', 'medigroup'),
						'admin_label' => true,
						'group'       => esc_html__('Design Options', 'medigroup')
					)
				)
			) //close array_merge
		));
	}

	/**
	 * Renders HTML for button shortcode
	 *
	 * @param array $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
		$default_atts = array(
			'size'                   => '',
			'type'                   => '',
			'hover_type'             => '',
			'text'                   => '',
			'link'                   => '',
			'target'                 => '',
			'icon_position'          => 'left',
			'color'                  => '',
			'hover_color'            => '',
			'underline_on_hover'	 => '',
			'background_color'       => '',
			'hover_background_color' => '',
			'border_color'           => '',
			'hover_border_color'     => '',
			'font_size'              => '',
			'font_weight'            => '',
			'padding'                 => '',
			'margin'                 => '',
			'custom_class'           => '',
			'html_type'              => 'anchor',
			'input_name'             => '',
			'hover_animation'        => '',
			'custom_attrs'           => array()
		);

		$default_atts = array_merge($default_atts, medigroup_mikado_icon_collections()->getShortcodeParams());
		$params       = shortcode_atts($default_atts, $atts);

		if($params['html_type'] !== 'input') {
			$iconPackName   = medigroup_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
			$params['icon'] = $iconPackName ? $params[$iconPackName] : '';
		}

		$params['size'] = !empty($params['size']) ? $params['size'] : 'medium';
		$params['type'] = !empty($params['type']) ? $params['type'] : 'solid';


		$params['link']   = !empty($params['link']) ? $params['link'] : '#';
		$params['target'] = !empty($params['target']) ? $params['target'] : '_self';

		$params['hover_animation'] = $this->getHoverAnimation($params);

		//prepare params for template
		$params['button_classes']      = $this->getButtonClasses($params);
		$params['button_custom_attrs'] = !empty($params['custom_attrs']) ? $params['custom_attrs'] : array();
		$params['button_styles']       = $this->getButtonStyles($params);
		$params['button_data']         = $this->getButtonDataAttr($params);
		$params['show_icon']           = !empty($params['icon']);
		$params['display_helper']      = $params['hover_animation'] !== '' && ($params['hover_type'] !== 'outline' || $params['hover_type'] !== 'white-outline');
		$params['helper_styles']       = $this->getHelperStyles($params);

		return medigroup_mikado_get_shortcode_module_template_part('templates/'.$params['html_type'], 'button', '', $params);
	}

	/**
	 * Returns array of button styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getButtonStyles($params) {
		$styles = array();

		if(!empty($params['color'])) {
			$styles[] = 'color: '.$params['color'];
		}

		if(!empty($params['background_color']) && $params['type'] !== 'outline') {
			$styles[] = 'background-color: '.$params['background_color'];
		}

		if(!empty($params['border_color'])) {
			$styles[] = 'border-color: '.$params['border_color'];
		}

		if(!empty($params['font_size'])) {
			$styles[] = 'font-size: '.medigroup_mikado_filter_px($params['font_size']).'px';
		}

		if(!empty($params['font_weight'])) {
			$styles[] = 'font-weight: '.$params['font_weight'];
		}

		if(!empty($params['padding'])) {
			$styles[] = 'padding: '.$params['padding'];
		}

		if(!empty($params['margin'])) {
			$styles[] = 'margin: '.$params['margin'];
		}

		return $styles;
	}

	/**
	 *
	 * Returns array of button data attr
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getButtonDataAttr($params) {
		$data = array();

		if(!empty($params['hover_background_color']) && ($params['hover_animation'] === '' || $params['hover_animation'] === 'disable')) {
			$data['data-hover-bg-color'] = $params['hover_background_color'];
		}

		if(!empty($params['hover_color'])) {
			$data['data-hover-color'] = $params['hover_color'];
		}

		if(!empty($params['hover_color'])) {
			$data['data-hover-color'] = $params['hover_color'];
		}

		if(!empty($params['hover_border_color'])) {
			$data['data-hover-border-color'] = $params['hover_border_color'];
		}

		return $data;
	}

	/**
	 * Returns array of HTML classes for button
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getButtonClasses($params) {
		$buttonClasses = array(
			'mkd-btn',
			'mkd-btn-'.$params['size'],
			'mkd-btn-'.$params['type']
		);

		if(!empty($params['hover_background_color'])) {
			$buttonClasses[] = 'mkd-btn-custom-hover-bg';
		}

		if(!empty($params['hover_border_color'])) {
			$buttonClasses[] = 'mkd-btn-custom-border-hover';
		}

		if(!empty($params['hover_color'])) {
			$buttonClasses[] = 'mkd-btn-custom-hover-color';
		}

		if(!empty($params['icon'])) {
			$buttonClasses[] = 'mkd-btn-icon';
			if ($params['icon_position'] == 'left') {
				$buttonClasses[] = 'mkd-btn-icon-left';
			}
			else if ($params['icon_position'] == 'right') {
				$buttonClasses[] = 'mkd-btn-icon-right';
			}
		}

		if(!empty($params['custom_class'])) {
			$buttonClasses[] = $params['custom_class'];
		}

		if(!empty($params['hover_animation']) && $params['hover_animation'] !== 'disable') {
			$buttonClasses[] = 'mkd-btn-'.$params['hover_animation'];
			$buttonClasses[] = 'mkd-btn-with-animation';
		}

		if(!empty($params['underline_on_hover']) && $params['underline_on_hover'] == 'yes') {
			$buttonClasses[] = 'mkd-btn-underline-on-hover';
		}

		$hoverType       = $this->getHoverStyle($params);
		$buttonClasses[] = 'mkd-btn-hover-'.$hoverType;

		return $buttonClasses;
	}

	private function getHoverStyle($params) {
		if(!empty($params['hover_type'])) {
			$hoverType = $params['hover_type'];
		} else {
			switch($params['type']) {
				case 'outline':
				case 'white':
				case 'black':
					$hoverType = 'solid';
					break;
				case 'solid':
					$hoverType = 'outline';
					break;
				default:
					$hoverType = 'outline';
					break;
			}
		}

		return $hoverType;
	}

	private function getHoverAnimation($params) {
		if(!empty($params['hover_animation']) && ($params['hover_type'] !== 'outline' || $params['hover_type'] !== 'white-outline')) {
			return $params['hover_animation'];
		}

		return medigroup_mikado_options()->getOptionValue('button_hover_animation');
	}

	private function getHelperStyles($params) {
		$styles = array();

		if($params['display_helper']) {
			if(!empty($params['hover_background_color'])) {
				$styles[] = 'background-color: '.$params['hover_background_color'];
			}
		}

		return $styles;
	}
}