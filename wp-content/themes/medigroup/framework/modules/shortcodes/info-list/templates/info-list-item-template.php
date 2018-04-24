<div class="mkd-info-list-item">
	<?php if (!empty($link)) : ?>
	<a class="mkd-ili-link" href="<?php echo esc_url($link);?>" target="<?php echo esc_attr($target); ?>">
	<?php endif; ?>
		<div class="mkd-info-list-item-inner">
			<span class="mkd-ili-left"><?php if ($title != '') echo '<span class="mkd-ili-title">' . esc_html($title) . '</span>'; ?><?php if ($subtitle != '') echo '<span class="mkd-ili-subtitle">(' . esc_html($subtitle) . ')</span>'; ?></span>
			<span class="mkd-ili-right"><?php echo esc_html($info); ?></span>
		</div>
	<?php if (!empty($link)) : ?>
	</a>
	<?php endif; ?>
</div>