<?php

if(!function_exists('medigroup_mikado_reset_options_map')) {
	/**
	 * Reset options panel
	 */
	function medigroup_mikado_reset_options_map() {

		medigroup_mikado_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'medigroup'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = medigroup_mikado_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'medigroup')
			)
		);

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'reset_to_defaults',
			'default_value' => 'no',
			'label'         => esc_html__('Reset to Defaults', 'medigroup'),
			'description'   => esc_html__('This option will reset all Mikado Options values to defaults', 'medigroup'),
			'parent'        => $panel_reset
		));

	}

	add_action('medigroup_mikado_options_map', 'medigroup_mikado_reset_options_map', 19);

}