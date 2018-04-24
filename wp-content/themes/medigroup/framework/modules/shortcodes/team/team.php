<?php
namespace Medigroup\Modules\Team;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Team
 */
class Team implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'mkd_team';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see mkd_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		$team_social_icons_array = array();
		for($x = 1; $x < 6; $x++) {
			$teamIconCollections = medigroup_mikado_icon_collections()->getCollectionsWithSocialIcons();
			foreach($teamIconCollections as $collection_key => $collection) {

				$team_social_icons_array[] = array(
					'type'       => 'dropdown',
					'heading'    => sprintf(esc_html__('Social Icon %1$d', 'medigroup'), $x),
					'param_name' => 'team_social_'.$collection->param.'_'.$x,
					'value'      => $collection->getSocialIconsArrayVC(),
					'dependency' => Array('element' => 'team_social_icon_pack', 'value' => array($collection_key))
				);

			}

			$team_social_icons_array[] = array(
				'type'       => 'textfield',
				'heading'    => sprintf(esc_html__('Social Icon %1$d Link', 'medigroup'), $x),
				'param_name' => 'team_social_icon_'.$x.'_link',
				'dependency' => array(
					'element' => 'team_social_icon_pack',
					'value'   => medigroup_mikado_icon_collections()->getIconCollectionsKeys()
				),
				'description' => esc_html__("In Doctor Team Mode this value will override social link for chosen doctor. Leave blank to use the original social link.", 'medigroup')
			);

			$team_social_icons_array[] = array(
				'type'       => 'dropdown',
				'heading'    => sprintf(esc_html__('Social Icon %1$d Target', 'medigroup'), $x),
				'param_name' => 'team_social_icon_'.$x.'_target',
				'value'      => array(
					''      => '',
					esc_html__('Self', 'medigroup')  => '_self',
					esc_html__('Blank', 'medigroup') => '_blank'
				),
				'dependency' => Array('element' => 'team_social_icon_'.$x.'_link', 'not_empty' => true)
			);

		}

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

		vc_map(array(
			'name'                      => esc_html__('Team', 'medigroup'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by MIKADO', 'medigroup'),
			'icon'                      => 'icon-wpb-team extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Team Mode', 'medigroup'),
						'param_name' => 'team_mode',
						'value'      => array(
							esc_html__('Doctor', 'medigroup')  => 'doctor',
							esc_html__('Custom Team Member', 'medigroup') => 'custom',
						),
						'save_always' => true,
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Choose a Doctor', 'medigroup'),
						'param_name' => 'team_doctor',
						'value'      => $all_doctors,
						'dependency' => array('element' => 'team_mode', 'value' => array('doctor')),
						'save_always' => true
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Display Doctor\'s Short Biography?', 'medigroup'),
						'param_name' => 'team_display_bio',
						'value'      => array(
							esc_html__('No', 'medigroup')  => 'no',
							esc_html__('Yes', 'medigroup') => 'yes',
						),
						'save_always' => true,
						'dependency' => array('element' => 'team_mode', 'value' => array('doctor'))
					),
					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Image', 'medigroup'),
						'param_name' => 'team_image',
						'dependency' => array('element' => 'team_mode', 'value' => array('custom'))
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Set Dark/Light Type', 'medigroup'),
						'param_name' => 'dark_light_type',
						'value'      => array(
							esc_html__('Dark', 'medigroup')  => 'dark',
							esc_html__('Light', 'medigroup') => 'light',
						),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Name', 'medigroup'),
						'admin_label' => true,
						'param_name'  => 'team_name',
						'dependency' => array('element' => 'team_mode', 'value' => array('custom'))
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Name Tag', 'medigroup'),
						'param_name' => 'team_name_tag',
						'value'      => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						),
						'dependency' => array('element' => 'team_name', 'not_empty' => true)
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Link on the Name', 'medigroup'),
						'admin_label' => true,
						'param_name'  => 'team_name_link',
						'dependency' => array('element' => 'team_name', 'not_empty' => true)
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Link Target on the Name', 'medigroup'),
						'admin_label' => true,
						'param_name'  => 'team_name_link_target',
						'value'		  => array(
							esc_html__('Blank', 'medigroup') => '_blank',
							esc_html__('Self', 'medigroup') => 'self'
						),
						'save_always' => true,
						'dependency' => array('element' => 'team_name_link', 'not_empty' => true)
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Position', 'medigroup'),
						'admin_label' => true,
						'param_name'  => 'team_position',
						'dependency' => array('element' => 'team_mode', 'value' => array('custom'))
					),
					array(
						'type'        => 'textarea',
						'heading'     => esc_html__('Description', 'medigroup'),
						'admin_label' => true,
						'param_name'  => 'team_description',
						'dependency' => array('element' => 'team_mode', 'value' => array('custom'))
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Social Icon Pack', 'medigroup'),
						'description' => esc_html__('Social icons show on hover.', 'medigroup'),
						'param_name'  => 'team_social_icon_pack',
						'admin_label' => true,
						'value'       => array_merge(array('' => ''), medigroup_mikado_icon_collections()->getIconCollectionsVCExclude('linea_icons')),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Social Icons Type', 'medigroup'),
						'param_name'  => 'team_social_icon_type',
						'value'       => array(
							esc_html__('Normal', 'medigroup') => 'normal',
							esc_html__('Circle', 'medigroup') => 'circle',
							esc_html__('Square', 'medigroup') => 'square'
						),
						'save_always' => true,
						'dependency'  => array(
							'element' => 'team_social_icon_pack',
							'value'   => medigroup_mikado_icon_collections()->getIconCollectionsKeys()
						)
					),
				),
				$team_social_icons_array
			)
		));

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'team_mode'            => '',
			'team_doctor'            => '',
			'team_image'            => '',
			'team_name'             => '',
			'team_name_tag'         => 'h5',
			'team_name_link'        => '',
			'team_name_link_target' => '',
			'team_display_bio'      => '',
			'team_position'         => '',
			'team_description'      => '',
			'team_social_icon_pack' => '',
			'team_social_icon_type' => 'normal_social',
			'dark_light_type'       => ''
		);

		$team_social_icons_form_fields = array();
		$number_of_social_icons        = 5;

		for($x = 1; $x <= $number_of_social_icons; $x++) {

			foreach(medigroup_mikado_icon_collections()->iconCollections as $collection_key => $collection) {
				$team_social_icons_form_fields['team_social_'.$collection->param.'_'.$x] = '';
			}

			$team_social_icons_form_fields['team_social_icon_'.$x.'_link']   = '';
			$team_social_icons_form_fields['team_social_icon_'.$x.'_target'] = '';

		}

		$args = array_merge($args, $team_social_icons_form_fields);

		$params = shortcode_atts($args, $atts);

		$params = $this->adjustForDoctors($params, $number_of_social_icons);

		$counter_classes = '';

		if($params['dark_light_type'] == 'light') {
			$counter_classes .= 'light';
		}

		$params['light_class'] = $counter_classes;

		$params['number_of_social_icons'] = 5;
		$params['team_name_tag']          = $this->getTeamNameTag($params, $args);
		$params['team_image_src']         = $this->getTeamImage($params);
		$params['team_social_icons']      = $this->getTeamSocialIcons($params);

		//Get HTML from template based on type of team
		$html = medigroup_mikado_get_shortcode_module_template_part('templates/team-template', 'team', '', $params);

		return $html;

	}

	/**
	 * Adjust $params in case Doctor Mode has been chosen
	 *
	 * @param $params
	 *
	 * @return mixed
	 */
	private function adjustForDoctors($params, $number_of_social_icons) {

		if ($params['team_mode'] == 'doctor') {
			$doctor_id = intval($params['team_doctor']);

			$params['team_name'] = get_the_title($doctor_id);
			$params['team_image'] = get_post_thumbnail_id($doctor_id);
			$params['team_position'] = get_post_meta($doctor_id, 'mkd_doctor_position', true);
			$params['team_description'] = $params['team_display_bio'] == 'yes' ? get_post_meta($doctor_id, 'mkd_doctor_bio', true) : '';
			$params['team_name_link'] = get_permalink($doctor_id);
			$params['team_name_link_target'] = '_blank';

			$social_links = array(
				'facebook' => get_post_meta($doctor_id, 'mkd_doctor_facebook', true),
				'twitter' => get_post_meta($doctor_id, 'mkd_doctor_twitter', true),
				'linkedin' => get_post_meta($doctor_id, 'mkd_doctor_linkedin', true),
				'skype' => get_post_meta($doctor_id, 'mkd_doctor_skype', true),
				'instagram' => get_post_meta($doctor_id, 'mkd_doctor_instagram', true),
				'googleplus' => get_post_meta($doctor_id, 'mkd_doctor_gplus', true),
			);
			foreach ($social_links as $key=>$value) {
				for ($i=1; $i<=$number_of_social_icons; $i++) {
					foreach(medigroup_mikado_icon_collections()->iconCollections as $collection_key => $collection) {
						if (strpos($params['team_social_'.$collection->param.'_'.$i], $key) !== false && $params['team_social_icon_'.$i.'_link'] == '' && $value != '') { 
							$params['team_social_icon_'.$i.'_link'] = $value;
						}
					}
				}
			}

		}

		return $params;

	}

	/**
	 * Return correct heading value. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 *
	 * @return mixed
	 */
	private function getTeamNameTag($params, $args) {

		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

		return (in_array($params['team_name_tag'], $headings_array)) ? $params['team_name_tag'] : $args['team_name_tag'];

	}

	/**
	 * Return Team image
	 *
	 * @param $params
	 *
	 * @return false|string
	 */
	private function getTeamImage($params) {

		if(is_numeric($params['team_image'])) {
			$team_image_src = wp_get_attachment_url($params['team_image']);
		} else {
			$team_image_src = $params['team_image'];
		}

		return $team_image_src;

	}

	private function getTeamSocialIcons($params) {

		extract($params);
		$social_icons = array();

		if($team_social_icon_pack !== '') {

			$icon_pack                    = medigroup_mikado_icon_collections()->getIconCollection($team_social_icon_pack);
			$team_social_icon_type_label  = 'team_social_'.$icon_pack->param;
			$team_social_icon_param_label = $icon_pack->param;

			for($i = 1; $i <= $number_of_social_icons; $i++) {

				$team_social_icon   = ${$team_social_icon_type_label.'_'.$i};
				$team_social_link   = ${'team_social_icon_'.$i.'_link'};
				$team_social_target = ${'team_social_icon_'.$i.'_target'};

				if($team_social_icon !== '') {

					$team_icon_params                                = array();
					$team_icon_params['icon_pack']                   = $team_social_icon_pack;
					$team_icon_params[$team_social_icon_param_label] = $team_social_icon;
					$team_icon_params['link']                        = ($team_social_link !== '') ? $team_social_link : '';
					$team_icon_params['target']                      = ($team_social_target !== '') ? $team_social_target : '';
					$team_icon_params['type']                        = ($team_social_icon_type !== '') ? $team_social_icon_type : '';

					$social_icons[] = medigroup_mikado_execute_shortcode('mkd_icon', $team_icon_params);
				}

			}

		}

		return $social_icons;

	}

}