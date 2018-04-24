<div <?php medigroup_mikado_class_attribute($holder_classes); ?>>
	<div class="mkd-iwt-content-holder">
		<div class="mkd-iwt-icon-title-holder">
			<div class="mkd-iwt-icon-holder">
				<?php echo medigroup_mikado_get_shortcode_module_template_part('templates/icon', 'icon-with-text', '', array('icon_parameters' => $icon_parameters)); ?>
			</div>
			<div class="mkd-iwt-title-holder">
				<<?php echo esc_attr($title_tag); ?> <?php medigroup_mikado_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
		</div>
	</div>
	<div class="mkd-iwt-text-holder">
		<p <?php medigroup_mikado_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>

		<?php if(!empty($link) && !empty($link_text)) : ?>
			<a class="mkd-iwt-link" href="<?php echo esc_attr($link); ?>" <?php medigroup_mikado_inline_attr($target, 'target'); ?>><?php echo esc_html($link_text); ?></a>
		<?php endif; ?>
	</div>
</div>
</div>