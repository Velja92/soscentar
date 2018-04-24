<?php

if(!function_exists('medigroup_mikado_doctor_options_map')) {

	function medigroup_mikado_doctor_options_map() {

		$custom_sidebars = medigroup_mikado_get_custom_sidebars();

		medigroup_mikado_add_admin_page(array(
			'slug'  => '_doctors',
			'title' => esc_html__('Doctors', 'medigroup'),
			'icon'  => 'fa fa-user-md'
		));

		$panel = medigroup_mikado_add_admin_panel(array(
			'title' => esc_html__('Booking', 'medigroup'),
			'name'  => 'panel_doctor_booking',
			'page'  => '_doctors'
		));

		medigroup_mikado_add_admin_field(array(
			'name'        => 'doctor_booking_email',
			'type'        => 'text',
			'label'       => esc_html__('Email for Booking Requests', 'medigroup'),
			'description' => esc_html__('Enter the email to which booking requests will be sent. If left empty, they will be sent to the admin.', 'medigroup'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

		$panel = medigroup_mikado_add_admin_panel(array(
			'title' => esc_html__('Doctor Single', 'medigroup'),
			'name'  => 'panel_doctor_single',
			'page'  => '_doctors'
		));

        medigroup_mikado_add_admin_field(array(
            'name'        => 'doctor_single_sidebar_layout',
            'type'        => 'select',
            'label'       => esc_html__('Sidebar', 'medigroup'),
            'description' => esc_html__('Choose a sidebar layout on Doctor single pages', 'medigroup'),
            'parent'      => $panel,
            'options'     => array(
                'default'          => esc_html__('No Sidebar', 'medigroup'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'medigroup'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'medigroup'),
                'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left', 'medigroup'),
                'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left', 'medigroup'),
            )
        ));


        if(count($custom_sidebars) > 0) {
            medigroup_mikado_add_admin_field(array(
                'name'        => 'doctor_single_custom_sidebar',
                'type'        => 'selectblank',
                'label'       => esc_html__('Sidebar to Display', 'medigroup'),
                'description' => esc_html__('Choose a sidebar to display on Doctor single pages. Default is "Sidebar page"', 'medigroup'),
                'parent'      => $panel,
                'options'     => medigroup_mikado_get_custom_sidebars()
            ));
        }

		medigroup_mikado_add_admin_field(array(
			'name'          => 'doctor_single_hide_departments',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Department', 'medigroup'),
			'description'   => esc_html__('Enabling this option will disable department meta description on Doctor Single pages.', 'medigroup'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'doctor_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'medigroup'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'medigroup'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		medigroup_mikado_add_admin_field(array(
			'name'          => 'doctor_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination', 'medigroup'),
			'description'   => esc_html__('Enabling this option will turn off doctor pagination.', 'medigroup'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '#mkd_navigate_same_department_container'
			)
		));

		medigroup_mikado_add_admin_field(array(
			'name'        => 'doctor_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Doctor Single Slug', 'medigroup'),
			'description' => esc_html__('Enter if you wish to use a different Doctor Single slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'medigroup'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action('medigroup_mikado_options_map', 'medigroup_mikado_doctor_options_map', 15);

}