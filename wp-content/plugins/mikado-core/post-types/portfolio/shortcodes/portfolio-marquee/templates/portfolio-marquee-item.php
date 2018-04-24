<div <?php mkd_core_class_attribute(get_post_class('mkd-ptfm-item')); ?>>
	<?php if(has_post_thumbnail()) : ?>
	<div class="mkd-ptfm-item-image">
		<a href="<?php esc_url(the_permalink()); ?>" target="<?php echo esc_attr($target); ?>">

		<?php if($use_custom_image_size && (is_array($custom_image_sizes) && count($custom_image_sizes))) : ?>
			<?php echo medigroup_mikado_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $custom_image_sizes[0], $custom_image_sizes[1]); ?>
		<?php else: ?>
			<?php the_post_thumbnail($thumb_size); ?>
		<?php endif; ?>

		<?php if ($overlay_on_hover == 'yes'): ?>
			<div class="mkd-ptfm-item-hover"></div>
			<div class="mkd-ptfm-item-icon"><span class="icon_plus"></span></div>
		<?php endif; ?>

		</a>
	</div>
	<?php endif; ?>
</div>