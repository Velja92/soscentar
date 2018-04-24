<div class="mkd-container">
	<div class="mkd-container-inner clearfix">
		<div class="mkd-grid-row">
		    <div <?php echo medigroup_mikado_get_content_sidebar_class(); ?>>
		        <div <?php medigroup_mikado_class_attribute($holder_class); ?>>
					<?php if(post_password_required()) {
						echo get_the_password_form();
					} else {
						//load content
						medigroup_mikado_get_module_template_part('templates/single/parts/content', 'doctor');

						//load doctor info
						medigroup_mikado_get_module_template_part('templates/single/parts/info', 'doctor');

						//load doctor team
						medigroup_mikado_get_module_template_part('templates/single/parts/team', 'doctor');

						//load doctor comments
						medigroup_mikado_get_module_template_part('templates/single/parts/comments', 'doctor');

					} ?>
				</div>
		    </div>

		    <?php if(!in_array($sidebar, array('default', ''))) : ?>
		        <div <?php echo medigroup_mikado_get_sidebar_holder_class(); ?>>
		            <?php get_sidebar(); ?>
		        </div>
		    <?php endif; ?>
		</div>		
	</div>
</div>

