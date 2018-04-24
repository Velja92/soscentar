<button type="submit" <?php medigroup_mikado_inline_style($button_styles); ?> <?php medigroup_mikado_class_attribute($button_classes); ?> <?php echo medigroup_mikado_get_inline_attrs($button_data); ?> <?php echo medigroup_mikado_get_inline_attrs($button_custom_attrs); ?>>
	<?php 
	if($show_icon && $icon_position == 'left') : 
		echo mkd_get_btn_icon_html($icon, $icon_pack);
	endif; 
	?>
	<span class="mkd-btn-text"><?php echo esc_html($text); ?></span>
	<?php 
	if($show_icon && $icon_position == 'right') : 
		echo mkd_get_btn_icon_html($icon, $icon_pack);
	endif; 
	?>

	<?php if($display_helper) : ?>
		<span class="mkd-btn-helper" <?php medigroup_mikado_inline_style($helper_styles); ?>></span>
	<?php endif; ?>

</button>