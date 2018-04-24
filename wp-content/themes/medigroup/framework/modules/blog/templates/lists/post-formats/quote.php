<?php
$image_url = '';
$image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
if (is_array($image_src)) 
    $image_url = $image_src[0];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkd-post-content">
        <div class="mkd-post-text" style="<?php if ($image_url != '') echo 'background-image: url('.esc_attr($image_url).')'; ?>">
            <div class="mkd-post-text-inner">
                <div class="mkd-post-title">
                    <h3>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), "mkd_post_quote_text_meta", true)); ?></a>
                    </h3>
                    <span class="quote_author">&mdash; <?php the_title(); ?></span>
                </div>
            </div>
            <div class="mkd-post-mark">
                <span aria-hidden="true" class="icon_quotations"></span>
            </div>
        </div>
    </div>
</article>