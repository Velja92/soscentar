<?php do_action('medigroup_mikado_before_page_title'); ?>
<?php if($show_title_area) { ?>
<?php
$position_text = get_post_meta(get_the_ID(), 'mkd_doctor_position', true);
?>

	<div class="mkd-title mkd-title-doctor <?php echo medigroup_mikado_title_classes(); ?>" <?php medigroup_mikado_inline_style($title_styles); ?> data-height="<?php echo esc_attr(intval(preg_replace('/[^0-9]+/', '', $title_height), 10)); ?>" <?php echo esc_attr($title_background_image_width); ?>>
		<div class="mkd-title-image"><?php if($title_background_image_src != "") { ?>
				<img src="<?php echo esc_url($title_background_image_src); ?>" alt="&nbsp;"/> <?php } ?></div>
		<div class="mkd-title-holder" <?php medigroup_mikado_inline_style($title_holder_height); ?>>
			<div class="mkd-container clearfix">
				<div class="mkd-container-inner">
					<div class="mkd-title-subtitle-holder" style="<?php echo esc_attr($title_subtitle_holder_padding); ?>">
						<div class="mkd-title-subtitle-holder-inner">
							<?php if (has_post_thumbnail()) { ?><div class="mkd-doctor-title-image"><?php the_post_thumbnail('medigroup_mikado_square'); ?></div><?php } ?>
							<h1 <?php medigroup_mikado_inline_style($title_color); ?>>
								<span><?php medigroup_mikado_title_text(); ?></span>
							</h1>
							<?php if (!empty($position_text)) { ?><span class="mkd-subtitle" <?php medigroup_mikado_inline_style($subtitle_color); ?>><span><?php echo esc_html($position_text); ?></span></span><?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>
<?php do_action('medigroup_mikado_after_page_title'); ?>