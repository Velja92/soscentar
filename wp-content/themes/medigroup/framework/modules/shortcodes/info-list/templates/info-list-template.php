<div class="mkd-info-list">
    <div class="mkd-info-list-inner">
        <?php if($title != '') : ?>
            <h4 class="mkd-info-list-title"><?php echo esc_html($title); ?></h4>
        <?php endif; ?>

        <div class="mkd-info-list-items">
            <?php echo do_shortcode($content); ?>
        </div>

        <?php
        if($link_text != '' && $link != '') {
            echo medigroup_mikado_get_button_html(array(
                'size'               => 'small',
                'type'               => 'transparent',
                'hover_type'         => 'white',
                'underline_on_hover' => 'yes',
                'text'               => $link_text,
                'link'               => $link,
                'target'             => $target,
                'icon_pack'          => 'font_elegant',
                'fe_icon'            => 'arrow_right',
                'icon_position'      => 'left',
                'font_size'          => '13',
                'custom_class'       => 'mkd-info-list-button'
            ));
        }
        ?>
    </div>
</div>