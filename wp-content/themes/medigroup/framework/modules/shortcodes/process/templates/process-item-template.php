<div <?php medigroup_mikado_class_attribute($item_classes); ?>>
	<div class="mkd-pi-holder-inner clearfix">
		<?php if(!empty($image)) : ?>
			<div class="mkd-pi-image-holder">
				<?php echo wp_get_attachment_image($image, 'full'); ?>
			</div>
		<?php endif; ?>
		<div class="mkd-pi-content-holder">
			<?php if(!empty($title)) : ?>
				<div class="mkd-pi-title-holder">
					<h5 class="mkd-pi-title"><?php echo esc_html($title); ?></h5>
				</div>
			<?php endif; ?>

			<?php if(!empty($text)) : ?>
				<div class="mkd-pi-text-holder">
					<p><?php echo esc_html($text); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>