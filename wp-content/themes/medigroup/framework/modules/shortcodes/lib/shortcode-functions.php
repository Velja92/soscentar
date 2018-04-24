<?php

if(!function_exists('medigroup_mikado_remove_auto_ptag')) {
	function medigroup_mikado_remove_auto_ptag($content, $autop = false) {
        if($autop) {
            $content = preg_replace('#^<\/p>|<p>$#', '', $content);
        }

        return do_shortcode($content);
	}
}