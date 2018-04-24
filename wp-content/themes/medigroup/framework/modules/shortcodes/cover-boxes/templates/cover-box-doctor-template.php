<?php
$doctor_id = intval($doctor);

$box_image = get_post_thumbnail_id($doctor_id);

$box_html = '<div class="mkd-cb-doc">';
$name = get_the_title($doctor_id);
if ($name != '') {
	$box_html .= '<h4><a href="'.get_permalink($doctor_id).'" target="_blank">' . esc_html($name) . '</a></h4>';
}
$position = get_post_meta($doctor_id, 'mkd_doctor_position', true);
if ($position != '') {
	$box_html .= '<h6>' . esc_html($position) . '</h6>';
}
$box_html .= do_shortcode('[vc_empty_space height="15px"]');
$bio = get_post_meta($doctor_id, 'mkd_doctor_bio', true);
if ($bio != '') {
	$has_p_tags = strpos($bio, '<p>') > -1;
	$box_html .= !$has_p_tags ? '<p>'.$bio.'</p>' : $bio;
}
$box_html .= do_shortcode('[vc_empty_space height="32px"]');
$certs = get_post_meta($doctor_id, 'mkd_doctor_certificates', true);
if($certs != '') {
	$certs = explode(',', $certs);
}
if(is_array($certs) && count($certs)) {
	$box_html .= '<div class="mkd-cb-doc-certs">';
	foreach($certs as $cert) {
		$box_html .= wp_get_attachment_image($cert, 'full');
	}
	$box_html .= '</div>';
}
$box_html .= '</div>';

?>
<div class="mkd-cover-box">
	<div class="mkd-cover-box-inner">
		<div class="mkd-cb-content clearfix">
			<div class="mkd-cb-img"><?php echo wp_get_attachment_image($box_image, 'full'); ?></div>
			<div class="mkd-cb-desc"><?php echo wp_kses_post($box_html); ?></div>
		</div>
	</div>
</div>