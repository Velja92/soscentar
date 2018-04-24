<div class="mkd-card">
	<div class="mkd-card-inner">
		<div class="mkd-card-image-holder">
			<div class="mkd-card-image-wrapper">
				<div class="mkd-card-behind-image"></div>
				<?php echo wp_get_attachment_image($image, 'full', false, array('class' => 'mkd-card-image')); ?>
			</div>
			<div class="mkd-card-below-image"></div>
		</div>
		<div class="mkd-card-text-holder">
            <?php if($title != ''){ ?>
                <h5><?php echo esc_html($title); ?></h5>
            <?php } ?>
            <?php if($text != ''){ ?>
                <p><?php echo esc_html($text); ?></p>
            <?php } ?>
			<?php if($link != '' && $link_text !== ''){ ?>
                <a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_text); ?></a>
            <?php } ?>
		</div>
	</div>
</div>