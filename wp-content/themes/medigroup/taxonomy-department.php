<?php

$doctors = get_posts(array(
	'post_type' => 'doctor',
	'posts_per_page' => -1,
	'offset' => 0,
	'orderby' => 'title',
	'order' => 'ASC',
	'department' => get_queried_object()->slug
));
$docs_shortcode = '';
if (is_array($doctors) && count($doctors)) {
	$docs_shortcode .= '[mkd_cover_boxes columns="3"]';
	foreach($doctors as $doc) {
		$docs_shortcode .= '[mkd_cover_box_doctor doctor="'.$doc->ID.'"]';
	}
	$docs_shortcode .= '[/mkd_cover_boxes]';
}


?>
<?php get_header(); ?>
<?php medigroup_mikado_get_title(); ?>
<div class="mkd-container">
	<?php do_action('medigroup_mikado_after_container_open'); ?>
	<div class="mkd-container-inner clearfix">
		<div class="mkd-grid-row">
			<?php echo do_shortcode($docs_shortcode); ?>
		</div>
	</div>
	<?php do_action('medigroup_mikado_before_container_close'); ?>
</div>
<?php get_footer(); ?>