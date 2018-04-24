<?php

/**
 * Widget that adds search icon that triggers opening of search form
 *
 * Class Mikado_Search_Opener
 */
class MedigroupMikadoSearchOpener extends MedigroupMikadoWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'mkd_search_opener', // Base ID
			esc_html__('Mikado Search Opener', 'medigroup') // Name
		);

		$this->setParams();
	}

	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'name'        => 'search_icon_size',
				'type'        => 'textfield',
				'title'       => esc_html__('Search Icon Size (px)', 'medigroup'),
				'description' => esc_html__('Define size for Search icon', 'medigroup')
			),
			array(
				'name'        => 'search_icon_color',
				'type'        => 'textfield',
				'title'       => esc_html__('Search Icon Color', 'medigroup'),
				'description' => esc_html__('Define color for Search icon', 'medigroup')
			),
			array(
				'name'        => 'search_icon_hover_color',
				'type'        => 'textfield',
				'title'       => esc_html__('Search Icon Hover Color', 'medigroup'),
				'description' => esc_html__('Define hover color for Search icon', 'medigroup')
			),
			array(
				'name'        => 'show_label',
				'type'        => 'dropdown',
				'title'       => esc_html__('Enable Search Icon Text', 'medigroup'),
				'description' => esc_html__('Enable this option to show \'Search\' text next to search icon in header', 'medigroup'),
				'options'     => array(
					''    => '',
					'yes' => esc_html__('Yes', 'medigroup'),
					'no'  => esc_html__('No', 'medigroup')
				)
			),
			array(
				'name'        => 'close_icon_position',
				'type'        => 'dropdown',
				'title'       => esc_html__('Close icon stays on opener place', 'medigroup'),
				'description' => esc_html__('Enable this option to set close icon on same position like opener icon', 'medigroup'),
				'options'     => array(
					'yes' => esc_html__('Yes', 'medigroup'),
					'no'  => esc_html__('No', 'medigroup')
				)
			)
		);
	}

	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget($args, $instance) {
		global $medigroup_options, $medigroup_IconCollections;

		$search_type_class           = 'mkd-search-opener';
		$fullscreen_search_overlay   = false;
		$search_opener_styles        = array();
		$show_search_text            = $instance['show_label'] == 'yes' || $medigroup_options['enable_search_icon_text'] == 'yes' ? true : false;
		$close_icon_on_same_position = $instance['close_icon_position'] == 'yes' ? true : false;

		if(isset($medigroup_options['search_type']) && $medigroup_options['search_type'] == 'fullscreen-search') {
			if(isset($medigroup_options['search_animation']) && $medigroup_options['search_animation'] == 'search-from-circle') {
				$fullscreen_search_overlay = true;
			}
		}

		if(isset($medigroup_options['search_type']) && $medigroup_options['search_type'] == 'search_covers_header') {
			if(isset($medigroup_options['search_cover_only_bottom_yesno']) && $medigroup_options['search_cover_only_bottom_yesno'] == 'yes') {
				$search_type_class .= ' search_covers_only_bottom';
			}
		}

		if(!empty($instance['search_icon_size'])) {
			$search_opener_styles[] = 'font-size: '.$instance['search_icon_size'].'px';
		}

		if(!empty($instance['search_icon_color'])) {
			$search_opener_styles[] = 'color: '.$instance['search_icon_color'];
		}

		print $args['before_widget'];

		?>

		<a <?php echo medigroup_mikado_get_inline_attr($instance['search_icon_hover_color'], 'data-hover-color'); ?>
			<?php if($close_icon_on_same_position) {
				echo medigroup_mikado_get_inline_attr('yes', 'data-icon-close-same-position');
			} ?>
			<?php medigroup_mikado_inline_style($search_opener_styles); ?>
			<?php medigroup_mikado_class_attribute($search_type_class); ?> href="javascript:void(0)">
			<?php if(isset($medigroup_options['search_icon_pack'])) {
				$medigroup_IconCollections->getSearchIcon($medigroup_options['search_icon_pack'], false);
			} ?>
			<?php if($show_search_text) { ?>
				<span class="mkd-search-icon-text"><?php esc_html_e('Search', 'medigroup'); ?></span>
			<?php } ?>
		</a>

		<?php if($fullscreen_search_overlay) { ?>
			<div class="mkd-fullscreen-search-overlay"></div>
		<?php } ?>

		<?php do_action('medigroup_mikado_after_search_opener'); ?>

		<?php print $args['after_widget']; ?>
	<?php }
}