<?php // This line is needed for mixItUp gutter ?>
	<article class="mkd-portfolio-item mix <?php echo esc_attr($categories) ?>">
		<div class="mkd-ptf-item-image-holder">
			<a href="<?php echo esc_url($item_link); ?>">
				<?php if($use_custom_image_size && (is_array($custom_image_sizes) && count($custom_image_sizes))) : ?>
					<?php echo medigroup_mikado_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $custom_image_sizes[0], $custom_image_sizes[1]); ?>
				<?php else: ?>
					<?php the_post_thumbnail($thumb_size); ?>
				<?php endif; ?>

				<?php 
				$video_meta = get_post_meta(get_the_ID(), 'mkd_portfolio_images', true);
				$video_meta = empty($video_meta) ? array() : $video_meta;
				$is_video = false;
				foreach($video_meta as $video) {
					if (!empty($video['portfoliovideotype'])) {
						$is_video = true;
					}
				}
				if ($is_video) echo '<div class="mkd-ptf-video-marker"><span class="arrow_triangle-right_alt2"></span></div>';
				?>
			</a>
		</div>
		<div class="mkd-ptf-item-text-holder" <?php if ($text_align != '') echo 'style="text-align: '.esc_attr($text_align).';"';?>>
			<<?php echo esc_attr($title_tag) ?> class="mkd-ptf-item-title"><?php
			if ($bottom_link == '') { ?><a href="<?php echo esc_url($item_link); ?>"><?php }
				echo esc_attr(get_the_title()); 
			if ($bottom_link == '') { ?></a><?php } 
		?></<?php echo esc_attr($title_tag) ?>>

		<?php if($show_excerpt === 'yes') : ?>
			<div class="mkd-ptf-item-excerpt">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>

		<?php if($bottom_link !== '') { ?>
			<div class="mkd-ptf-bottom-link">
				<a href="<?php echo esc_url($item_link); ?>"><?php echo esc_html($bottom_link); ?></a>
			</div>
		<?php } ?>
		</div>
	</article>
<?php // This line is needed for mixItUp gutter ?>