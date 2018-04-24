<div <?php medigroup_mikado_class_attribute($pricing_table_classes) ?>>
	<div class="mkd-price-table-inner">
		<?php if(!empty($label)) : ?>
			<div class="mkd-pt-label-holder">
				<div class="mkd-pt-label-inner" <?php if ($label_bgnd != '') echo 'style="background-color: '.esc_attr($label_bgnd).';"'; ?>>
					<div class="mkd-pt-label-content" <?php if ($label_color != '') echo 'style="color: '.esc_attr($label_color).';"'; ?>>
						<span><?php echo esc_html($label); ?></span>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<ul>
			<li class="mkd-table-title">
				<h2 <?php medigroup_mikado_inline_style($title_styles); ?> class="mkd-title-content"><?php echo esc_html($title) ?></h2>
			</li>
			<li class="mkd-table-prices">
				<div class="mkd-price-in-table">
					<?php if(!empty($price)) : ?>
						<h2 class="mkd-price">
							<?php echo esc_html($currency.$price); ?>
						</h2>
					<?php endif; ?>
				</div>
				<?php if(!empty($price_period)) : ?>
					<div class="mkd-pt-price-period">
						<span class="mkd-pt-price-period-content"><?php echo esc_html($price_period) ?></span>
					</div>
				<?php endif; ?>
			</li>
			<li class="mkd-table-content">
				<?php echo do_shortcode(preg_replace('#^<\/p>|<p>$#', '', $content)); ?>
			</li>
			<?php
			if(is_array($button_params) && count($button_params)) { ?>
				<li class="mkd-price-button">
					<?php echo medigroup_mikado_get_button_html($button_params); ?>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>
