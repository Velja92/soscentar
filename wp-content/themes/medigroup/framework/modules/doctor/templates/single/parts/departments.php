<?php if(medigroup_mikado_options()->getOptionValue('doctor_single_hide_departments') !== 'yes') : ?>

	<?php
	$departments   = wp_get_post_terms(get_the_ID(), 'department');
	$dept_names = array();

	if(is_array($departments) && count($departments)) :
		foreach($departments as $department) {
			$dept_names[] = $department->name;
		}

		?>
		<div class="mkd-doctor-departments">
			<h6><?php echo esc_html(implode(', ', $dept_names)); ?></h6>
		</div>
	<?php endif; ?>

<?php endif; ?>