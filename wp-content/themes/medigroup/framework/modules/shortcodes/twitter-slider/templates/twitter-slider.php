<?php if($response->status) : ?>
    <?php if(is_array($response->data) && count($response->data)) : ?>
        <div class="mkd-twitter-slider clearfix<?php echo esc_attr($dark_nav)?>">
            <div class="mkd-twitter-slider-inner" <?php mkd_core_inline_style($tweet_styles); ?>>
                <?php foreach($response->data as $tweet) : ?>
                    <div class="item mkd-twitter-slider-item">
                        <div class="mkd-twitter-slider-item-text"><?php echo MikadoTwitterApi::getInstance()->getHelper()->getTweetText($tweet); ?></div>
                        <div class="mkd-twitter-slider-item-author"><?php echo MikadoTwitterApi::getInstance()->getHelper()->getTweetAuthor($tweet); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

<?php else: ?>
    <?php echo esc_html($response->message); ?>
<?php endif; ?>
