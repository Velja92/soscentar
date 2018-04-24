<div class="mkd-doctor-single-team">

<?php
$team_title = get_post_meta(get_the_ID(), 'mkd_doctor_team_title', true);
if ($team_title != '') { ?>
	<h3><?php echo esc_html($team_title); ?></h3>
<?php 
} 
?>

<?php
$team_text = get_post_meta(get_the_ID(), 'mkd_doctor_team_text', true);
if ($team_text != '') { 
	echo wp_kses_post($team_text);
} 
?>

<?php 
$linked_docs = '';
$linked_doctors = get_post_meta(get_the_ID(), 'mkd_doctor_similar', true);
if (is_array($linked_doctors) && count($linked_doctors)) {

	$linked_docs .= '[mkd_team_slider columns="3"]';

	foreach($linked_doctors as $doc) {
		$linked_docs .= 
			'[mkd_team '.
			'team_mode="doctor" '.
			'team_doctor="'.$doc.'" '.
			'team_social_icon_pack="font_elegant" '.
			'team_social_icon_type="circle" '.
			'team_type="main-info-below-image" ';

		$socials = array(
			'mkd_doctor_facebook' => 'social_facebook',
			'mkd_doctor_twitter' => 'social_twitter',
			'mkd_doctor_skype' => 'social_skype',
			'mkd_doctor_linkedin' => 'social_linkedin',
			'mkd_doctor_instagram' => 'social_instagram',
			'mkd_doctor_gplus' => 'social_googleplus'
		);
		$k = 1;
		foreach ($socials as $key=>$value) {
			$meta_temp = get_post_meta(intval($doc), $key, true);
			if ($meta_temp != '') {
				$linked_docs .= 'team_social_fe_icon_'.$k.'="'.$value.'" team_social_icon_'.$k.'_link="'.$meta_temp.'" team_social_icon_'.$k.'_target="_blank" ';
				$k++;
			}
		}
		
		$linked_docs .=	']';
	}

	$linked_docs .= '[/mkd_team_slider]';
}

if ($linked_docs != '') {
	echo do_shortcode($linked_docs);
}
?>

</div>