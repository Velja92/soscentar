<?php

if(!function_exists('medigroup_mikado_register_widgets')) {

	function medigroup_mikado_register_widgets() {

		$widgets = array(
			'MedigroupMikadoLatestPosts',
			'MedigroupMikadoSearchOpener',
			'MedigroupMikadoSideAreaOpener',
			'MedigroupMikadoStickySidebar',
			'MedigroupMikadoSocialIconWidget',
			'MedigroupMikadoSeparatorWidget',
			'MedigroupMikadoCallToActionButton',
			'MedigroupMikadoBookingForm',
			'MedigroupMikadoHtmlWidget',
			'MedigroupMikadoWorkingHours'
		);

		foreach($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'medigroup_mikado_register_widgets');