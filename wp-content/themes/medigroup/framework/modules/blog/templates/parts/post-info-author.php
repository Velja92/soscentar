<?php
$author_url = get_author_posts_url(get_the_author_meta('ID'));
?>
<div class="mkd-post-info-author mkd-post-info-item">
	<a class="mkd-post-info-author-link mkd-author-image" href="<?php echo esc_url($author_url); ?>">
        <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
    </a>
    <?php esc_html_e('by', 'medigroup'); ?>
    <a class="mkd-post-info-author-link" href="<?php echo esc_url($author_url); ?>">
        <?php the_author_meta('display_name'); ?>
    </a>
</div>
