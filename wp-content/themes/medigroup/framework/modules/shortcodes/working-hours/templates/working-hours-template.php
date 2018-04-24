<div class="mkd-working-hours-holder" <?php medigroup_mikado_inline_style($wh_colors); ?>>
    <?php if($show_icon) : ?>
        <div class="mkd-wh-icon-holder" <?php medigroup_mikado_inline_style($bckg_color); ?>>
            <span class="mkd-wh-icon">
                    <?php echo medigroup_mikado_icon_collections()->renderIcon($icon, $icon_pack, array(
                        'icon_attributes' => array(
                            'class' => 'mkd-btn-icon-elem'
                        )
                    )); ?>
            </span>
        </div>
    <?php endif; ?>
    <div class="mkd-wh-holder-inner">
        <div class="mkd-wh-holder-items">
        <?php if(is_array($working_hours) && count($working_hours)) : ?>
            <?php if($title !== '') : ?>
                <div class="mkd-wh-title-holder">
                    <h4 class="mkd-wh-title" <?php medigroup_mikado_inline_style($title_color); ?>><?php echo esc_html($title); ?></h4>
                </div>
            <?php endif; ?>

            <?php if($text !== '') : ?>
                <div class="mkd-wh-text-holder" <?php medigroup_mikado_inline_style($text_size); ?>>
                    <p><?php echo esc_html($text); ?></p>
                </div>
            <?php endif; ?>

            <?php foreach($working_hours as $working_hour) : ?>
                <div class="mkd-wh-item clearfix">
					<span class="mkd-wh-day" <?php medigroup_mikado_inline_style($date_size); ?>>
						<?php echo esc_html($working_hour['label']).':'; ?>
					</span>
					<span class="mkd-wh-hours" <?php medigroup_mikado_inline_style($date_size); ?>>
						<?php if(isset($working_hour['time']) && $working_hour['time'] !== '') : ?>
                            <span class="mkd-wh-from"><?php echo esc_html($working_hour['time']); ?></span>
                        <?php endif; ?>
					</span>
                </div>
            <?php endforeach; ?>
        </div>
            <?php if($wh_button === 'yes'){ ?>
                <div class="mkd-wh-button">
                    <?php echo medigroup_mikado_get_button_html(array(
                        'type' => 'solid',
                        'text' => esc_html('Make an appointment', 'medigroup')
                    )); ?>
                </div>
            <?php } ?>

        <?php else: ?>
            <p><?php esc_html_e('Working hours haven\'t been set', 'medigroup'); ?></p>
        <?php endif; ?>
    </div>
</div>