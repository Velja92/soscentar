<?php
$dept_doc = array();
$departments = get_terms(array(
	'taxonomy' => 'department'
));
if (is_array($departments) && count($departments)) {
	foreach($departments as $dept) {
		$dept_doc[$dept->name] = array();
		$doctors = get_posts(array(
			'post_type' => 'doctor',
			'posts_per_page' => -1,
			'offset' => 0,
			'orderby' => 'title',
			'order' => 'ASC',
			'department' => $dept->slug
		));
		if (is_array($doctors) && count($doctors)) {
			foreach ($doctors as $doc) {
				$dept_doc[$dept->name][] = $doc->post_title;
			}
		}
	}
}
?>
<div class="mkd-booking-form mkd-bf-layout-<?php echo esc_attr($form_layout); ?> <?php echo esc_attr($form_skin); ?> <?php if ($form_floating == 'yes') { echo "mkd-bf-floating mkd-bf-floating-".esc_attr($form_floating_h_position); } ?>" data-depts-doctors="<?php echo esc_attr(json_encode($dept_doc))?>">

	<?php if ($form_layout == 'horizontal') : ?>
	<div class="mkd-booking-form-widget-button">
		<a target="_blank" href="<?php echo $form_widget_link != '' ? esc_url($form_widget_link) : '#'; ?>"><?php echo esc_html($form_widget_text); ?></a>
	</div>
	<?php endif; ?>

	<div class="mkd-booking-form-inner <?php if ($form_layout == 'horizontal') echo "mkd-bf-bgnd-op-".esc_attr($form_opacity); ?>">

		<?php if ($form_slogan != '' && $form_layout == 'vertical') : ?>
		<div class="mkd-bf-motto"><h4><?php echo esc_html($form_slogan); ?></h4></div>
		<?php endif; ?>

		<?php if ($form_title != '' || $form_layout == 'horizontal') : ?>
		<div class="mkd-bf-title"><h2><?php echo esc_html($form_title); ?></h2></div>
		<?php endif; ?>

		<div class="mkd-bf-form-fields mkd-bf-columns-<?php echo esc_attr($form_columns); ?>">
			<form method="POST">

				<div class="mkd-bf-form-item mkd-bf-narrow">
					<select class="mkd-bf-select-field mkd-bf-select-department" name="mkd-booking-department">
						<option value=""><?php $form_layout == 'vertical' ? esc_html_e('Select Department', 'mkd-core') : esc_html_e('Department', 'mkd-core'); ?></option>
						<?php
						foreach ($dept_doc as $dept=>$docs) {
						?>
						<option value="<?php echo esc_attr($dept); ?>"><?php echo esc_html($dept); ?></option>
						<?php
						}
						?>
					</select>
				</div>

				<div class="mkd-bf-form-item mkd-bf-narrow">
					<select class="mkd-bf-select-field mkd-bf-select-doctor" name="mkd-booking-doctor">
						<option value=""><?php $form_layout == 'vertical' ? esc_html_e('Select Doctor', 'mkd-core') : esc_html_e('Doctor', 'mkd-core'); ?></option>
					</select>
				</div>

                <div class="mkd-bf-form-item mkd-bf-name mkd-bf-narrow">
                    <input type="text" class="mkd-bf-input-name" name="mkd-booking-name" placeholder="<?php _e('Your Full Name', 'mkd-core'); ?>">
                </div>

                <div class="mkd-bf-form-item mkd-bf-contact mkd-bf-narrow">
                    <input type="text" class="mkd-bf-input-contact" name="mkd-booking-contact" placeholder="<?php _e('Phone', 'mkd-core'); ?>">
                </div>

				<div class="mkd-bf-form-item mkd-date mkd-bf-narrow">
					<input type="text" class="mkd-bf-input-date" name="mkd-booking-date" placeholder="<?php _e('Date', 'mkd-core'); ?>">
					<div class="mkd-bf-field-icon-holder"></div>
				</div>

				<div class="mkd-bf-form-item mkd-time mkd-bf-narrow">
					<input type="text" class="mkd-bf-input-time" name="mkd-booking-time" placeholder="<?php _e('Time', 'mkd-core'); ?>">
					<div class="mkd-bf-field-icon-holder"></div>
				</div>

				<?php if ($form_request == 'yes') : ?>
				<div class="mkd-bf-form-item mkd-bf-wide">
					<textarea class="mkd-bf-input-request" name="mkd-booking-request" placeholder="<?php _e('Special request...', 'mkd-core'); ?>"></textarea>
				</div>
				<?php endif; ?>

				<span class="nonce"><?php wp_nonce_field('mkd_validate_booking_form', 'mkd_nonce_booking_form_'.rand()); ?></span>
				<?php echo '<script type="application/javascript">if (typeof MikadoAjaxUrl === "undefined") {var MikadoAjaxUrl = "'.admin_url('admin-ajax.php').'"; }</script>'; ?>

				<?php if ($form_layout == 'vertical') : ?>
				<div class="mkd-bf-form-response-holder"></div>
				<?php endif; ?>

				<div class="mkd-bf-form-button">
					<?php echo medigroup_mikado_execute_shortcode('mkd_button', array(
						'html_type'    => 'input',
						'input_name'   => 'mkd-booking-submit',
						'text'         => $form_button_text != '' ? esc_html($form_button_text) : esc_attr__('Book', 'mkd-core'),
						'size'         => 'small',
						'type'         => $form_skin == 'dark' ? 'white' : '',
						'hover_type'   => $form_skin == 'dark' ? 'white' : '',
						'custom_attrs' => array(
							'data-sending-label' => esc_attr__('Sending...', 'mkd-core')
						)
					)); ?>
				</div>

				<?php if ($form_layout == 'horizontal') : ?>
				<div class="mkd-bf-form-response-holder"></div>
				<?php endif; ?>

			</form>
		</div>

	</div>
</div>