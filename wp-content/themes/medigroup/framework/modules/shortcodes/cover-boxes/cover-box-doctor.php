<?php
namespace Medigroup\Modules\CoverBoxDoctor;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class CoverBoxDoctor implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'mkd_cover_box_doctor';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

        $all_doctors = array();
        $doctors = get_posts(array(
            'post_type' => 'doctor',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'offset' => 0
        ));
        wp_reset_postdata();
        foreach ($doctors as $doctor) {
            $all_doctors[$doctor->post_title] = strval($doctor->ID);
        }

		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                    => esc_html__('Doctor Cover Box', 'medigroup'),
					'base'                    => $this->base,
					'as_child'                => array('only' => 'mkd_cover_boxes'),
					'category'                => esc_html__('by MIKADO', 'medigroup'),
					'icon'                    => 'icon-wpb-cover-box-doctor extended-custom-icon',
					'show_settings_on_create' => true,
					'params'                  => array(
                        array(
							'type'       => 'dropdown',
							'heading'    => esc_html__('Choose a Doctor', 'medigroup'),
							'param_name' => 'doctor',
							'value'      => $all_doctors,
							'save_always' => true
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'doctor'       => ''
		);

		$params = shortcode_atts($args, $atts);

		$html = medigroup_mikado_get_shortcode_module_template_part('templates/cover-box-doctor-template', 'cover-boxes', '', $params);

		return $html;
	}
}
