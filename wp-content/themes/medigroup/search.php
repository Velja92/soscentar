<?php
$medigroup_sidebar              = medigroup_mikado_sidebar_layout();
$medigroup_excerpt_length_array = medigroup_mikado_blog_lists_number_of_chars();

$medigroup_excerpt_length = 0;
if(is_array($medigroup_excerpt_length_array) && array_key_exists('standard', $medigroup_excerpt_length_array)) {
    $medigroup_excerpt_length = $medigroup_excerpt_length_array['standard'];
}

?>

<?php get_header(); ?>
<?php
global $wp_query;

if(get_query_var('paged')) {
	$medigroup_paged = get_query_var('paged');
} elseif(get_query_var('page')) {
    $medigroup_paged = get_query_var('page');
} else {
    $medigroup_paged = 1;
}

if(medigroup_mikado_options()->getOptionValue('blog_page_range') != "") {
	$medigroup_blog_page_range = esc_attr(medigroup_mikado_options()->getOptionValue('blog_page_range'));
} else {
	$medigroup_blog_page_range = $wp_query->max_num_pages;
}
?>
<?php medigroup_mikado_get_title(); ?>
	<div class="mkd-container">
		<?php do_action('medigroup_mikado_after_container_open'); ?>
		<div class="mkd-container-inner clearfix">
			<div class="mkd-container">
				<?php do_action('medigroup_mikado_after_container_open'); ?>
				<div class="mkd-container-inner">
					<div class="mkd-blog-holder mkd-blog-type-standard">
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="mkd-post-content">
									<div class="mkd-post-text">
										<div class="mkd-post-text-inner">
											<div class="mkd-post-info">
												<?php medigroup_mikado_post_info(array(
													'date'     => 'yes',
													'category' => 'yes',
													'comments' => 'yes',
													'like'     => 'yes'
												)) ?>
											</div>
											<h2 class="mkd-post-title">
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
											</h2>
											<?php if(get_post_type() === 'post') : ?>
												<?php medigroup_mikado_excerpt($medigroup_excerpt_length); ?>
											<?php endif; ?>
										</div>

										<div class="mkd-author-desc clearfix">
											<div class="mkd-image-name">
												<div class="mkd-author-image">
													<?php echo medigroup_mikado_kses_img(get_avatar(get_the_author_meta('ID'), 102)); ?>
												</div>
												<div class="mkd-author-name-holder">
													<h5 class="mkd-author-name">
														<?php
														if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
															echo esc_attr(get_the_author_meta('first_name'))." ".esc_attr(get_the_author_meta('last_name'));
														} else {
															echo esc_attr(get_the_author_meta('display_name'));
														}
														?>
													</h5>
												</div>
											</div>
											<div class="mkd-share-icons">
												<?php $post_info_array['share'] = medigroup_mikado_options()->getOptionValue('enable_social_share') == 'yes'; ?>
												<?php if($post_info_array['share'] == 'yes'): ?>
													<span class="mkd-share-label"><?php esc_html_e('Share', 'medigroup'); ?></span>
												<?php endif; ?>
												<?php echo medigroup_mikado_get_social_share_html(array(
													'type'      => 'list',
													'icon_type' => 'normal'
												)); ?>
											</div>
										</div>
									</div>
								</div>
							</article>
						<?php endwhile; ?>
							<?php
							if(medigroup_mikado_options()->getOptionValue('pagination') == 'yes') {
								medigroup_mikado_pagination($wp_query->max_num_pages, $medigroup_blog_page_range, $medigroup_paged);
							}
							?>
						<?php else: ?>
							<div class="entry">
								<p><?php esc_html_e('No posts were found.', 'medigroup'); ?></p>
							</div>
						<?php endif; ?>
					</div>
					<?php do_action('medigroup_mikado_before_container_close'); ?>
				</div>
			</div>
		</div>
		<?php do_action('medigroup_mikado_before_container_close'); ?>
	</div>
<?php get_footer(); ?>