<div class="mkd-comparision-table-holder mkd-cpt-table <?php if ($featured == 'yes') echo 'mkd-cpt-featured'; ?>">
	<div class="mkd-cpt-table-holder-inner">
		<?php if($display_border) : ?>
			<div class="mkd-cpt-table-border-top" <?php medigroup_mikado_inline_style($border_style); ?>>
			<?php if ($featured == 'yes' && $featured_text != '') : ?>
				<div class="mkd-cpt-border-text" <?php if ($featured_color != '') echo 'style="color: '.esc_attr($featured_color).';"'; ?>><?php echo esc_html($featured_text); ?></div>
			<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="mkd-cpt-table-head-holder">
			<div class="mkd-cpt-table-head-holder-inner">
				<?php if($title !== '') : ?>
					<h4 class="mkd-cpt-table-title"><?php echo esc_html($title); ?></h4>
				<?php endif; ?>

				<?php if($price !== '') : ?>
					<div class="mkd-cpt-table-price-holder">
						<?php if($currency !== '') : ?>
						<span class="mkd-cpt-table-currency"><?php echo esc_html($currency); ?></span><!--
						<?php else: ?>
							<!--
						<?php endif; ?>

						 --><span class="mkd-cpt-table-price"><?php echo esc_html($price); ?></span>

						<?php if($price_period !== '') : ?>
							<span class="mkd-cpt-table-period">
								/ <?php echo esc_html($price_period); ?>
							</span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="mkd-cpt-table-content">
			<?php echo do_shortcode(preg_replace('#^<\/p>|<p>$#', '', $content)); ?>
		</div>

		<div class="mkd-cpt-table-footer">
			<div class="mkd-cpt-table-btn">
				<a <?php medigroup_mikado_inline_style($btn_styles); ?> href="<?php echo esc_url($link); ?>">
					<span><?php echo esc_html($button_text); ?></span>
				</a>
			</div>
		</div>
	</div>
</div>