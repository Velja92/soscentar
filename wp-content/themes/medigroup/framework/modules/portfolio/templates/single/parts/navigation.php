<?php if(medigroup_mikado_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>

	<?php
	$back_to_link      = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
	$nav_same_category = medigroup_mikado_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
	?>

	<div class="mkd-portfolio-single-nav">
		<?php if($has_prev_post) : ?>
			<div class="mkd-portfolio-prev <?php if($prev_post_has_image) {
				echo esc_attr('mkd-single-nav-with-image');
			} ?>">
				<?php if($prev_post_has_image) : ?>
					<div class="mkd-single-nav-image-holder">
						<a href="<?php echo esc_url($prev_post['link']); ?>">
							<?php echo medigroup_mikado_kses_img($prev_post['image']); ?>
						</a>
					</div>
				<?php endif; ?>

				<div class="mkd-single-nav-content-holder">
					<h6>
						<a href="<?php echo esc_url($prev_post['link']); ?>">
							<?php echo esc_html($prev_post['title']); ?>
						</a>
					</h6>
					<a class="mkd-single-nav-label-holder" href="<?php echo esc_url($prev_post['link']) ?>">
			            <span class="mkd-single-nav-arrow">
					        <?php echo medigroup_mikado_icon_collections()->renderIcon('arrow_carrot-left_alt2', 'font_elegant') ?>
			            </span>
						<span class="mkd-single-nav-label"><?php esc_html_e('Previous', 'medigroup') ?></span>
					</a>
				</div>
			</div>
		<?php endif; ?>

		<?php if($back_to_link !== '') : ?>
			<div class="mkd-portfolio-back-btn">
				<a href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
					<span class="fa fa-th-large"></span>
				</a>
			</div>
		<?php endif; ?>

		<?php if($has_next_post) : ?>
			<div class="mkd-portfolio-next <?php if($next_post_has_image) {
				echo esc_attr('mkd-single-nav-with-image');
			} ?>">
				<?php if($next_post_has_image) : ?>
					<div class="mkd-single-nav-image-holder">
						<a href="<?php echo esc_url($next_post['link']); ?>">
							<?php echo medigroup_mikado_kses_img($next_post['image']); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="mkd-single-nav-content-holder">
					<h6>
						<a href="<?php echo esc_url($next_post['link']); ?>">
							<?php echo esc_html($next_post['title']); ?>
						</a>
					</h6>
					<a class="mkd-single-nav-label-holder" href="<?php echo esc_url($next_post['link']) ?>">
						<span class="mkd-single-nav-label"><?php esc_html_e('Next', 'medigroup') ?></span>
			            <span class="mkd-single-nav-arrow">
				            <?php echo medigroup_mikado_icon_collections()->renderIcon('arrow_carrot-right_alt2', 'font_elegant') ?>
			            </span>
					</a>
				</div>
			</div>
		<?php endif; ?>
	</div>

<?php endif; ?>