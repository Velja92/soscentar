<div class="mkd-testimonials-holder-inner">
	<div id="mkd-testimonials<?php echo esc_attr($current_id) ?>" class="mkd-testimonial-content <?php echo esc_attr($testimonial_type); ?><?php echo esc_attr($columns_number); ?>">
		<div class="mkd-testimonial-quote-sign <?php echo esc_attr($light_class); ?>"><span class="icon_quotations"></span></div>
		<div class="mkd-testimonial-text-inner <?php echo esc_attr($light_class); ?>">
			<p class="mkd-testimonial-text <?php echo esc_attr($light_class); ?>"><?php echo trim($text) ?></p>
			<?php if($show_author == "yes") { ?>
				<div class="mkd-testimonial-author">
					<?php if(has_post_thumbnail($current_id)) { ?>
						<div class="mkd-testimonial-image-holder">
							<?php esc_html(the_post_thumbnail($current_id)) ?>
						</div>
					<?php } ?>
					<h6 class="mkd-testimonial-author-text <?php echo esc_attr($light_class); ?>"><?php echo esc_attr($author) ?></h6>
					<?php if($show_position == "yes" && $job !== '') { ?>
						<h6 class="mkd-testimonials-job <?php echo esc_attr($light_class); ?>"><?php echo esc_attr($job) ?></h6>
					<?php } ?>

				</div>
			<?php } ?>
		</div>

	</div>
</div>
