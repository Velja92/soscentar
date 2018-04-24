<div class="mkd-doctor-single-info">

<?php if (($meta_temp = get_post_meta(get_the_ID(), 'mkd_doctor_specialty', true)) != '') { ?>
	<div class="mkd-doctor-info-item">
		<div class="mkd-doctor-info-item-inner clearfix">
			<div class="mkd-doctor-info-item-left"><h6><?php _e('Specialty', 'medigroup'); ?></h6></div>
			<div class="mkd-doctor-info-item-right"><?php echo esc_html($meta_temp); ?></div>
		</div>
	</div>
<?php } ?>

<?php if (($meta_temp = get_post_meta(get_the_ID(), 'mkd_doctor_degrees', true)) != '') { ?>
	<div class="mkd-doctor-info-item">
		<div class="mkd-doctor-info-item-inner clearfix">
			<div class="mkd-doctor-info-item-left"><h6><?php _e('Degrees', 'medigroup'); ?></h6></div>
			<div class="mkd-doctor-info-item-right"><?php echo esc_html($meta_temp); ?></div>
		</div>
	</div>
<?php } ?>

<?php if (($meta_temp = get_post_meta(get_the_ID(), 'mkd_doctor_training', true)) != '') { ?>
	<div class="mkd-doctor-info-item">
		<div class="mkd-doctor-info-item-inner mkd-training clearfix">
			<div class="mkd-doctor-info-item-left"><h6><?php _e('Training', 'medigroup'); ?></h6></div>
			<div class="mkd-doctor-info-item-right"><?php echo wp_kses($meta_temp, array('p' => array())); ?></div>
		</div>
	</div>
<?php } ?>

<?php 
$contact_html = '';

$doctor_telephone = get_post_meta(get_the_ID(), 'mkd_doctor_telephone', true);
$doctor_email = get_post_meta(get_the_ID(), 'mkd_doctor_email', true);
if ($doctor_telephone != '' || $doctor_email != '') {
	$contact_html .= 
		'<div class="mkd-doctor-contact-block clearfix">'.
			'<div class="mkd-dcb-icon-holder">'.
				'<i class="mkd-dcb-icon lnr lnr-smartphone"></i>'.
			'</div>'.
			'<div class="mkd-dcb-text-holder">'.
				'<h6>'.esc_html($doctor_telephone).'</h6>'.
				'<p>'.esc_html($doctor_email).'</p>'.
			'</div>'.
		'</div>'
	;
}

$doctor_street = get_post_meta(get_the_ID(), 'mkd_doctor_street', true);
$doctor_city = get_post_meta(get_the_ID(), 'mkd_doctor_city', true);
$doctor_zip = get_post_meta(get_the_ID(), 'mkd_doctor_zip', true);
$doctor_state = get_post_meta(get_the_ID(), 'mkd_doctor_state', true);
if ($doctor_street != '' || $doctor_city != '' || $doctor_zip != '' || $doctor_state != '') {
	$contact_html .= 
		'<div class="mkd-doctor-contact-block clearfix">'.
			'<div class="mkd-dcb-icon-holder">'.
				'<i class="mkd-dcb-icon lnr lnr-map-marker"></i>'.
			'</div>'.
			'<div class="mkd-dcb-text-holder">'.
				'<h6>'.esc_html($doctor_street).'</h6>'.
				'<p>'.esc_html($doctor_city).', '.esc_html($doctor_zip).', '.esc_html($doctor_state).'</p>'.
			'</div>'.
		'</div>'
	;
}
?>
<?php if ($contact_html != '') { ?>
	<div class="mkd-doctor-info-item">
		<div class="mkd-doctor-info-item-inner mkd-contact clearfix">
			<div class="mkd-doctor-info-item-left"><h6><?php _e('Contact Info', 'medigroup'); ?></h6></div>
			<div class="mkd-doctor-info-item-right"><?php echo wp_kses_post($contact_html); ?></div>
		</div>
	</div>
<?php } ?>

<?php if (is_array($meta_temp = get_post_meta(get_the_ID(), 'mkd_doctor_workdays', true)) && count($meta_temp)) { ?>
	<div class="mkd-doctor-info-item">
		<div class="mkd-doctor-info-item-inner mkd-working-days clearfix">
			<div class="mkd-doctor-info-item-left"><h6><?php _e('Work Days', 'medigroup'); ?></h6></div>
			<div class="mkd-doctor-info-item-right"><?php
				foreach($meta_temp as $workday) {
					echo '<span class="icon_check mkd-doctor-checkmark"></span><span class="mkd-doctor-workday">' . ucfirst($workday) . '</span>';
				} 
			?></div>
		</div>
	</div>
<?php } ?>

</div>