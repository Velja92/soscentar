<?php // This line is needed for mixItUp gutter ?>
    <article class="mkd-portfolio-item mix <?php echo esc_attr($categories) ?>">
        <?php if($params['portfolio_hover_type'] == 'standard') : ?>
            <a href="<?php echo esc_url($item_link); ?>" class="mkd-ptf-item-link"></a>
        <?php endif; ?>
        <div class="mkd-ptf-item-image-holder">
            <?php if($params['portfolio_hover_type'] == 'gradient') : ?>
                <a class="mkd-ptf-portfolio-overlay-icon" href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" data-rel="prettyPhoto[portfolio-standard]">
                    <span class="mkd-ptf-portfolio-overlay-bg"></span>
                    <div class="mkd-portfolio-overlay-icon">
                        <?php echo medigroup_mikado_icon_collections()->renderIcon('icon_plus', 'font_elegant'); ?>
                    </div>
                </a>
            <?php endif; ?>
            <?php if($use_custom_image_size && (is_array($custom_image_sizes) && count($custom_image_sizes))) : ?>
                <?php echo medigroup_mikado_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $custom_image_sizes[0], $custom_image_sizes[1]); ?>
            <?php else: ?>
                <?php the_post_thumbnail($thumb_size); ?>
            <?php endif; ?>

            <?php
            $video_meta = get_post_meta(get_the_ID(), 'mkd_portfolio_images', true);
            $video_meta = empty($video_meta) ? array() : $video_meta;
            $is_video   = false;
            foreach($video_meta as $video) {
                if(!empty($video['portfoliovideotype'])) {
                    $is_video = true;
                }
            }
            if($is_video) {
                echo '<div class="mkd-ptf-video-marker"><span class="arrow_triangle-right_alt2"></span></div>';
            }
            ?>
        </div>
        <?php if($params['portfolio_hover_type'] == 'standard') : ?>
            <div class="mkd-ptf-item-text-overlay">
                <div class="mkd-ptf-item-text-overlay-inner">
                    <div class="mkd-ptf-item-text-holder" <?php if ($text_align != '') echo 'style="text-align: '.esc_attr($text_align).';"';?>>
                        <<?php echo esc_attr($title_tag) ?> class="mkd-ptf-item-title"><?php
                        if($bottom_link == '') { ?><a href="<?php echo esc_url($item_link); ?>"><?php }
                            echo esc_attr(get_the_title());
                            if($bottom_link == '') { ?></a><?php }
                    ?></<?php echo esc_attr($title_tag) ?>>
                    <?php if($bottom_link !== '') { ?>
                        <div class="mkd-ptf-bottom-link">
                            <a href="<?php echo esc_url($item_link); ?>"><?php echo esc_html($bottom_link); ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            </div>
        <?php endif; ?>
    </article>
<?php // This line is needed for mixItUp gutter ?>