<div class="mkd-post-info-comments-holder mkd-post-info-item">
    <a class="mkd-post-info-comments" href="<?php comments_link(); ?>">
		<span class="mkd-post-info-comments-icon">
			<?php echo medigroup_mikado_icon_collections()->renderIcon('icon_comment_alt', 'font_elegant'); ?>
		</span>
        <?php comments_number('0 '.esc_html__('comments', 'medigroup'), '1 '.esc_html__('comment', 'medigroup'), '% '.esc_html__('comments', 'medigroup')); ?>
    </a>
</div>