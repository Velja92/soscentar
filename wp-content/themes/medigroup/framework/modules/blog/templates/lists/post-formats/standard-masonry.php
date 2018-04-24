<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkd-post-content">
        <?php medigroup_mikado_get_module_template_part('templates/lists/parts/image', 'blog'); ?>
        <div class="mkd-post-text">
            <div class="mkd-post-text-inner">
                <div class="mkd-post-info">
                    <?php medigroup_mikado_post_info(array('date' => 'yes')) ?>
                </div>
                <?php medigroup_mikado_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => 'h4')); ?>
                <?php
                medigroup_mikado_excerpt($excerpt_length);
                $args_pages = array(
                    'before'      => '<div class="mkd-single-links-pages"><div class="mkd-single-links-pages-inner">',
                    'after'       => '</div></div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '%'
                );

                wp_link_pages($args_pages);
                ?>
            </div>
            <div class="mkd-info-share-holder clearfix">
                <div class="mkd-post-info">
                    <?php medigroup_mikado_post_info(array('author' => 'yes')) ?>
                </div>
            </div>
        </div>
    </div>
</article>