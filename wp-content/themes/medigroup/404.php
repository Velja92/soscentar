<?php get_header(); ?>

	<div class="mkd-container">
	<?php do_action('medigroup_mikado_after_container_open'); ?>
		<div class="mkd-container-inner mkd-404-page">
			<div class="mkd-page-not-found">
				<h2 class="title_404">404</h2>
                <h2>
					<?php if(medigroup_mikado_options()->getOptionValue('404_title')){
						echo esc_html(medigroup_mikado_options()->getOptionValue('404_title'));
					}
					else{
						esc_html_e('Page you are looking for is not found', 'medigroup');
					} ?>
				</h2>
				<p>
					<?php if(medigroup_mikado_options()->getOptionValue('404_text')){
						echo esc_html(medigroup_mikado_options()->getOptionValue('404_text'));
					}
					else{
						esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'medigroup');
					} ?>
				</p>
				<?php
					$params = array();
					if (medigroup_mikado_options()->getOptionValue('404_back_to_home')){
						$params['text'] = medigroup_mikado_options()->getOptionValue('404_back_to_home');
					}
					else{
						$params['text'] = esc_html__('Back to Home Page', 'medigroup');
					}
					$params['link'] = esc_url(home_url('/'));
					$params['target'] = '_self';
				echo medigroup_mikado_execute_shortcode('mkd_button',$params);?>
			</div>
		</div>
		<?php do_action('medigroup_mikado_before_container_close'); ?>
	</div>
<?php get_footer(); ?>