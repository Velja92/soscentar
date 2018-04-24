<?php
/*
Template Name: Landing Page
*/
$medigroup_sidebar = medigroup_mikado_sidebar_layout();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * medigroup_mikado_header_meta hook
	 *
	 * @see medigroup_mikado_header_meta() - hooked with 10
	 * @see mkd_user_scalable_meta() - hooked with 10
	 */
	if(!medigroup_mikado_is_ajax_request()) {
		do_action('medigroup_mikado_header_meta');
	}
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if((!medigroup_mikado_is_ajax_request()) && medigroup_mikado_options()->getOptionValue('smooth_page_transitions') == "yes") {
	$ajax_class = medigroup_mikado_options()->getOptionValue('smooth_pt_true_ajax') === 'yes' ? 'mkd-ajax' : 'mkd-mimic-ajax';
	?>
	<div class="mkd-smooth-transition-loader <?php echo esc_attr($ajax_class); ?>">
		<div class="mkd-st-loader">
			<div class="mkd-st-loader1">
				<?php echo medigroup_mikado_loading_spinners(true); ?>
			</div>
		</div>
	</div>
<?php } ?>

<div class="mkd-wrapper">
	<div class="mkd-wrapper-inner">
		<div class="mkd-content">
			<?php if(medigroup_mikado_is_ajax_enabled()) { ?>
				<div class="mkd-meta">
					<?php do_action('medigroup_mikado_ajax_meta'); ?>
					<span id="mkd-page-id"><?php echo esc_html($wp_query->get_queried_object_id()); ?></span>

					<div class="mkd-body-classes"><?php echo esc_html(implode(',', get_body_class())); ?></div>
				</div>
			<?php } ?>
			<div class="mkd-content-inner">
				<?php medigroup_mikado_get_title(); ?>
				<?php get_template_part('slider'); ?>
				<div class="mkd-full-width">
					<div class="mkd-full-width-inner">
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							<div class="mkd-grid-row">
								<div <?php echo medigroup_mikado_get_content_sidebar_class(); ?>>
									<?php the_content(); ?>
									<?php do_action('medigroup_mikado_page_after_content'); ?>
								</div>

								<?php if(!in_array($medigroup_sidebar, array('default', ''))) : ?>
									<div <?php echo medigroup_mikado_get_sidebar_holder_class(); ?>>
										<?php get_sidebar(); ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endwhile; endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>