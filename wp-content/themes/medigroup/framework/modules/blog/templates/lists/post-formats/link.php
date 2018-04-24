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
                <?php medigroup_mikado_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => 'h3')); ?>
            </div>
            <div class="mkd-post-mark">
                <span aria-hidden="true" class="icon_link"></span>
            </div>
        </div>
    </div>
</article>