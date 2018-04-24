<?php

if(!function_exists('medigroup_mikado_is_responsive_on')) {
	/**
	 * Checks whether responsive mode is enabled in theme options
	 * @return bool
	 */
	function medigroup_mikado_is_responsive_on() {
		return medigroup_mikado_options()->getOptionValue('responsiveness') !== 'no';
	}
}