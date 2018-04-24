<h6 class="clearfix mkd-title-holder <?php if ($params['icon'] || $custom_icon != '') echo 'mkd-title-holder-w-icon'; ?>">
<span class="mkd-accordion-mark mkd-left-mark">
		<span class="mkd-accordion-mark-icon">
			<span class="icon_plus"></span>
			<span class="icon_minus-06"></span>
		</span>
</span>
<span class="mkd-tab-title">
		<span class="mkd-tab-title-inner">
			<?php if($params['icon'] && $custom_icon == '') { ?>
				<span class="mkd-icon-accordion-holder">
				 <?php echo medigroup_mikado_icon_collections()->renderIcon($icon, $icon_pack); ?>
			 </span>
			<?php } else if ($custom_icon != '') { ?>
			<span class="mkd-tab-custom-icon-holder">
			<?php 
				echo wp_get_attachment_image(
					$custom_icon, 
					'full', 
					true, 
					array(
						'class' => 'mkd-tab-custom-icon'
					)
				);
			?>
			</span><!--
			--><?php } ?>
			<?php echo '<span class="mkd-tab-title-main">'.esc_attr($title).'</span>'; ?>
			<?php if (!empty($brackets)) echo ' <span class="mkd-tab-brackets">('.esc_attr($brackets).')</span>'; ?>
		</span>
</span>
</h6>
<div class="mkd-accordion-content">
	<div class="mkd-accordion-content-inner">
		<?php echo do_shortcode($content) ?>

		<?php if(is_array($link_params) && count($link_params)) : ?>
			<a class="mkd-arrow-link" target="<?php echo esc_attr($link_params['link_target']); ?>" href="<?php echo esc_url($link_params['link']); ?>">
				<span class="mkd-al-icon">
					<span class="icon-arrow-right-circle"></span>
				</span>
				<span class="mkd-al-text"><?php echo esc_html($link_params['link_text']); ?></span>
			</a>
		<?php endif; ?>
	</div>
</div>
