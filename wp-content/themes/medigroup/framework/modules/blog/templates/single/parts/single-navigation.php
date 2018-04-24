<?php if(medigroup_mikado_options()->getOptionValue('blog_single_navigation') == 'yes') { ?>
    <?php $navigation_blog_through_category = medigroup_mikado_options()->getOptionValue('blog_navigation_through_same_category') ?>
    <div class="mkd-blog-single-navigation clearfix" xmlns="http://www.w3.org/1999/html">
        <div class="mkd-blog-single-navigation-inner clearfix">
            <?php if($has_prev_post) : ?>
                <div class="mkd-blog-single-prev clearfix">
                    <h6>
                        <a class="clearfix" href="<?php echo esc_url($prev_post['link']); ?>">
                            <span class="mkd-icon-stack-left"><?php echo medigroup_mikado_icon_collections()->renderIcon('lnr-chevron-left', 'linear_icons') ?></span>
                            <span class="mkd-prev-post-title"><?php echo esc_html($prev_post['title']); ?></span>
                        </a>
                    </h6>
                </div> <!-- close div.blog_prev -->
            <?php endif; ?>
            <?php if($has_next_post) : ?>
                <div class="mkd-blog-single-next clearfix">
                    <h6>
                        <a class="clearfix" href="<?php echo esc_url($next_post['link']); ?>">
                            <span class="mkd-icon-stack-right"><?php echo medigroup_mikado_icon_collections()->renderIcon('lnr-chevron-right', 'linear_icons') ?></span>
                            <span class="mkd-next-post-title"><?php echo esc_html($next_post['title']); ?></span>
                        </a>
                    </h6>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php } ?>