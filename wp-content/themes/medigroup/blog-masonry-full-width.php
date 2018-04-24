<?php
	/*
	Template Name: Blog: Masonry Full Width
	*/
?>
<?php get_header(); ?>

<?php medigroup_mikado_get_title(); ?>
<?php get_template_part('slider'); ?>

	<div class="mkd-full-width">
		<div class="mkd-full-width-inner clearfix">
			<?php medigroup_mikado_get_blog('masonry-full-width'); ?>
		</div>
	</div>
<?php get_footer(); ?>