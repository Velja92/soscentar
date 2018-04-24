<?php

if(!function_exists('medigroup_mikado_register_sidebars')) {
	/**
	 * Function that registers theme's sidebars
	 */
	function medigroup_mikado_register_sidebars() {

		register_sidebar(array(
			'name'          => esc_html__('Sidebar', 'medigroup'),
			'id'            => 'sidebar',
			'description'   => esc_html__('Default Sidebar', 'medigroup'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5><span class="mkd-sidearea-title">',
			'after_title'   => '</span></h5>'
		));
	
	}

	add_action('widgets_init', 'medigroup_mikado_register_sidebars');
}

if(!function_exists('medigroup_mikado_add_support_custom_sidebar')) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates MedigroupMikadoSidebar object
	 */
	function medigroup_mikado_add_support_custom_sidebar() {
		add_theme_support('MedigroupMikadoSidebar');
		if(get_theme_support('MedigroupMikadoSidebar')) {
			new MedigroupMikadoSidebar();
		}
	}

	add_action('after_setup_theme', 'medigroup_mikado_add_support_custom_sidebar');
}
