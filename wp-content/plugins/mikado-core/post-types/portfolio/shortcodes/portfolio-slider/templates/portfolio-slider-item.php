<li <?php post_class(); ?>>
	<div class="mkd-ptfs-item">
		<?php if(has_post_thumbnail()) : ?>
		<div class="mkd-ptfs-item-image">
			<a href="<?php esc_url(the_permalink()); ?>">
				<?php if($use_custom_image_size && (is_array($custom_image_sizes) && count($custom_image_sizes))) : ?>
					<?php echo medigroup_mikado_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $custom_image_sizes[0], $custom_image_sizes[1]); ?>
				<?php else: ?>
					<?php the_post_thumbnail($thumb_size); ?>
				<?php endif; ?>
			</a>
		</div>
		<div class="mkd-ptfs-item-content">
			<<?php echo esc_attr($title_tag); ?> class="mkd-ptfs-item-title">
			<a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a>
		</<?php echo esc_attr($title_tag); ?>>
		<div class="mkd-ptfs-item-excerpt-holder">
			<p><?php echo esc_html($caller->itemExcerpt($excerpt_length)); ?></p>
		</div>
	</div>
	<?php endif; ?>
	</div>
</li>