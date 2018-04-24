<div id="mkd-testimonials<?php echo esc_attr($current_id) ?>" class="mkd-testimonial-content <?php echo esc_attr($testimonial_type); ?>">
	<div class="mkd-testimonial-content-inner">
		<div class="mkd-testimonial-text-holder">
			<div class="mkd-testimonial-quote-sign <?php echo esc_attr($light_class); ?>"><span class="icon_quotations"></span></div>
			<div class="mkd-testimonial-text-inner <?php echo esc_attr($light_class); ?>">
				<?php if ($show_title == 'yes' && $title != '') { ?>
				<h4><?php echo esc_html($title); ?></h4>
				<?php } ?>
				<p class="mkd-testimonial-text"><?php echo trim($text) ?></p>
				<?php if($show_author == "yes" && $author != '') { ?>
				<div class="mkd-testimonial-author">
					<h5 class="mkd-testimonial-author-text <?php echo esc_attr($light_class); ?>"><span class="mkd-testimonial-author-hyphen">- </span><span class="mkd-testimonial-author-name"><?php echo esc_attr($author); ?></span><?php if ($show_position == "yes" && $job !== '') echo '<span class="mkd-testimonial-author-separator">, </span><span class="mkd-testimonial-author-position">'.esc_html($job).'</span>'; ?></h5>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
