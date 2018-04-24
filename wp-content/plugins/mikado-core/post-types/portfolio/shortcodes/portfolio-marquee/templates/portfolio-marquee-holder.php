<div <?php mkd_core_class_attribute($holder_classes); ?> <?php echo mkd_core_get_inline_attrs($holder_data); ?>>
	<div class="mkd-portfolio-marquee-inner">
	<?php if($query->have_posts()) : 
		while($query->have_posts()) : $query->the_post(); 
	?>
		<?php echo mkd_core_get_shortcode_module_template_part('portfolio-marquee/templates/portfolio-marquee-item', 'portfolio', '', $params); ?>
	<?php 
		endwhile; 
		wp_reset_postdata();
	else : ?>
		<p><?php esc_html_e('Sorry, no posts matched your criteria.', 'mkd-core'); ?></p>
	<?php endif; ?>
	</div>
</div>