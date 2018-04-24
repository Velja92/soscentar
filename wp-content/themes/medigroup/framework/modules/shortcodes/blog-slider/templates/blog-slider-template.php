<div class="mkd-blog-slider-holder" <?php print $data_attribute; ?>>
    <?php if($query->have_posts()) : ?>
        <?php while($query->have_posts()) : $query->the_post(); ?>

            <div class="mkd-blog-slider-item">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php if($params['featured_image'] === 'yes'): ?>
                        <div class="mkd-post-image-content">
                            <div class="mkd-post-image">
                                <?php
                                medigroup_mikado_get_module_template_part('templates/lists/parts/image', 'blog', '', array('image_size' => 'medigroup_mikado_landscape'));
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="mkd-part-content">
                        <div class="mkd-bs-item-content">
                            <div class="mkd-bs-item-date">
                                <span><?php the_time(get_option('date_format')); ?></span>
                            </div>
                            <div class="mkd-bs-item-text">
                                <h4 class="mkd-bs-item-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <?php if($text_length != '0') {
                                    $excerpt = ($text_length > 0) ? mb_substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
                                    <p class="mkd-bs-item-excerpt"><?php echo esc_html($excerpt) ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="mkd-author-desc clearfix">
                            <div class="mkd-image-name clearfix">
                                <div class="mkd-author-image">
                                    <?php echo medigroup_mikado_kses_img(get_avatar(get_the_author_meta('ID'), 102)); ?>
                                </div>
                                <div class="mkd-author-name-holder">

                                    <div class="mkd-author">
                                        <h6 class="mkd-author-name">
                                            <?php echo '<span>'.esc_html__('by', 'medigroup').' </span>'; ?>
                                            <a href="<?php echo esc_url(medigroup_mikado_get_author_posts_url()); ?>">
                                                <?php echo medigroup_mikado_get_the_author_name(); ?>
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
        <p><?php esc_html_e('No posts were found.', 'medigroup'); ?></p>
    <?php endif; ?>
</div>