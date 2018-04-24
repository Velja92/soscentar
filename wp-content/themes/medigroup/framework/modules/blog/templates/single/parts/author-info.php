<?php
if(isset($post_id)){
    $id = $post_id;
}else{
    $id = get_the_ID();
}
$post = get_post($id);
$author_id = $post->post_author;

$author_info_box   = esc_attr(medigroup_mikado_options()->getOptionValue('blog_author_info'));
$author_info_email = esc_attr(medigroup_mikado_options()->getOptionValue('blog_author_info_email'));
$social_networks   = medigroup_mikado_get_user_custom_fields();

?>
<?php if($author_info_box === 'yes' && get_the_author_meta('description', $author_id) !== "") { ?>
    <div class="mkd-author-description">
        <div class="mkd-author-description-inner clearfix">
            <div class="mkd-author-description-image">
                <?php echo medigroup_mikado_kses_img(get_avatar(get_the_author_meta('ID'), 300, null, null, array('height' => 200, 'width' => 300))); ?>
            </div>
            <div class="mkd-author-description-text-holder">
                <h5 class="mkd-author-name">
                    <?php
                    if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
                        echo esc_attr(get_the_author_meta('first_name'))." ".esc_attr(get_the_author_meta('last_name'));
                    } else {
                        echo esc_attr(get_the_author_meta('display_name'));
                    }
                    ?>
                </h5>

                <?php if(get_the_author_meta('position') !== '') : ?>
                    <div class="mkd-author-position-holder">
                        <h6 class="mkd-author-position"><?php echo esc_html(get_the_author_meta('position')); ?></h6>
                    </div>
                <?php endif; ?>

                <?php if($author_info_email === 'yes' && is_email(get_the_author_meta('email'))) { ?>
                    <p class="mkd-author-email"><?php echo sanitize_email(get_the_author_meta('email')); ?></p>
                <?php } ?>
                <?php if(get_the_author_meta('description') != "") { ?>
                    <div class="mkd-author-text">
                        <p><?php echo esc_attr(get_the_author_meta('description')); ?></p>
                    </div>
                <?php } ?>
                <?php if(is_array($social_networks) && count($social_networks)) { ?>

                    <div class="mkd-author-social-holder clearfix">
                        <?php foreach($social_networks as $network) { ?>
                            <a href="<?php echo esc_attr($network['link']) ?>" target="blank">
                                <?php echo medigroup_mikado_icon_collections()->renderIcon($network['class'], 'font_awesome'); ?>
                            </a>
                        <?php } ?>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>