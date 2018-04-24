<?php if(is_array($features) && count($features)) : ?>
	<div <?php medigroup_mikado_class_attribute($holder_classes); ?>>
		<div class="mkd-cpt-features-holder mkd-cpt-table">
			<?php if($display_border) : ?>
				<div class="mkd-cpt-table-border-top" <?php medigroup_mikado_inline_style($border_style); ?>></div>
			<?php endif; ?>

			<div class="mkd-cpt-features-title mkd-cpt-table-head-holder">
				<div class="mkd-cpt-table-head-holder-inner">
					<?php if ($special_note != '') echo '<h5 class="mkd-cpt-special-note">' . esc_html($special_note) .'</h5>'; ?>
					<?php if ($title != '') echo '<h5 class="mkd-cpt-main-title">' . esc_html($title) .'</h5>'; ?>
				</div>
			</div>
			<div class="mkd-cpt-features-list-holder mkd-cpt-table-content">
				<ul class="mkd-cpt-features-list">
					<?php foreach($features as $feature) : ?>
						<li class="mkd-cpt-features-item"><span><?php echo esc_html($feature); ?></span></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php echo do_shortcode($content); ?>
	</div>
<?php endif; ?>