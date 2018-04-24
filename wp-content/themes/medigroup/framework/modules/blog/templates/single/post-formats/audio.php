<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkd-post-content">
        <div class="mkd-audio-image-holder">
            <?php medigroup_mikado_get_module_template_part('templates/single/parts/image', 'blog'); ?>

            <?php
            if(has_post_thumbnail()) :
                medigroup_mikado_get_module_template_part('templates/parts/audio', 'blog');
            endif;
            ?>
        </div>
        <div class="mkd-post-text">
            <div class="mkd-post-text-inner clearfix">
                <div class="mkd-post-info">
                    <?php medigroup_mikado_post_info(array('date' => 'yes')) ?>
                </div>
                <?php medigroup_mikado_get_module_template_part('templates/single/parts/title', 'blog'); ?>
                <?php the_content(); ?>
            </div>
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
    </div>
    <?php do_action('medigroup_mikado_before_blog_article_closed_tag'); ?>
</article>