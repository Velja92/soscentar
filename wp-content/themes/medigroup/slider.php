<?php
$medigroup_slider_shortcode = get_post_meta(medigroup_mikado_get_page_id(), 'mkd_page_slider_meta', true);
$medigroup_slider_shortcode = apply_filters('medigroup_mikado_slider_shortcode', $medigroup_slider_shortcode);

if(!empty($medigroup_slider_shortcode)) : ?>
	<div class="mkd-slider">
		<div class="mkd-slider-inner">
			<?php echo do_shortcode(wp_kses_post($medigroup_slider_shortcode)); // XSS OK ?>
		</div>
	</div>
<?php endif; ?>