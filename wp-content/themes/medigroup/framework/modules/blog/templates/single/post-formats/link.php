<?php
$image_url = '';
$image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
if (is_array($image_src))
	$image_url = $image_src[0];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkd-post-content">
        <div class="mkd-post-text" style="<?php if ($image_url != '') echo 'background-image: url('.esc_attr($image_url).')'; ?>">
            <div class="mkd-post-text-inner clearfix">
                <div class="mkd-post-mark">
                    <span aria-hidden="true" class="icon_link"></span>
                </div>
                <h3 class="mkd-post-title">
                    <a href="<?php echo esc_html(get_post_meta(get_the_ID(), "mkd_post_link_link_meta", true)); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </h3>
            </div>
        </div>
        <div class="mkd-post-info">
            <?php medigroup_mikado_post_info(array('date' => 'yes')) ?>
        </div>
        <?php the_content(); ?>
        <div class="mkd-info-share-holder clearfix">
            <div class="mkd-post-info">
                <?php medigroup_mikado_post_info(array(
                    'author'   => 'yes',
                    'like'     => 'yes',
                    'comments' => 'yes',
                    'category' => 'yes'
                )) ?>
            </div>
            <div class="mkd-share-icons-single">
                <?php $post_info_array['share'] = medigroup_mikado_options()->getOptionValue('enable_social_share') == 'yes'; ?>
                <?php if($post_info_array['share'] == 'yes'): ?>
                    <span class="mkd-share-label"><?php esc_html_e('Share', 'medigroup'); ?></span>
                <?php endif; ?>
                <?php echo medigroup_mikado_get_social_share_html(array(
                    'type'      => 'list',
                    'icon_type' => 'normal'
                )); ?>
            </div>
        </div>
    </div>
    <?php do_action('medigroup_mikado_before_blog_article_closed_tag'); ?>
</article>