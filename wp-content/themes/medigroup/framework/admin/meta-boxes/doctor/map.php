<?php

if(!function_exists('medigroup_mikado_map_doctor_single')) {
    function medigroup_mikado_map_doctor_single() {

        $meta_box = medigroup_mikado_add_meta_box(array(
            'scope' => 'doctor',
            'title' => esc_html__('Doctor Info', 'medigroup'),
            'name'  => 'doctor_info_meta_box'
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'mkd_doctor_position',
            'type'        => 'text',
            'label'       => esc_html__('Position', 'medigroup'),
            'description' => esc_html__('The doctor\'s role within the team', 'medigroup'),
            'parent'      => $meta_box
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'mkd_doctor_specialty',
            'type'        => 'text',
            'label'       => esc_html__('Specialty', 'medigroup'),
            'description' => esc_html__('The doctor\'s area of expertise', 'medigroup'),
            'parent'      => $meta_box
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'mkd_doctor_degrees',
            'type'        => 'text',
            'label'       => esc_html__('Degrees', 'medigroup'),
            'description' => esc_html__('Enter all the degrees the doctor holds.', 'medigroup'),
            'parent'      => $meta_box
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'mkd_doctor_bio',
            'type'        => 'textarea',
            'label'       => esc_html__('Short Biography', 'medigroup'),
            'description' => esc_html__('Briefly describe the doctor and their expertise. Use <p> tag to denote paragraphs.', 'medigroup'),
            'parent'      => $meta_box
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'mkd_doctor_training',
            'type'        => 'textarea',
            'label'       => esc_html__('Training', 'medigroup'),
            'description' => esc_html__('Enter the training and additional education the doctor has received. Use <p> tag to denote paragraphs.', 'medigroup'),
            'parent'      => $meta_box
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'mkd_doctor_certificates',
            'type'        => 'multipleimages',
            'label'       => esc_html__('Certificates', 'medigroup'),
            'description' => esc_html__('Upload images for certificates.', 'medigroup'),
            'parent'      => $meta_box
        ));

        $contact_group = medigroup_mikado_add_admin_group(array(
            'name'        => 'mkd_doctor_contact',
            'title'       => esc_html__('Contact Information', 'medigroup'),
            'parent'      => $meta_box
        ));

            $row1 = medigroup_mikado_add_admin_row(array(
                'name'        => 'row1',
                'parent'      => $contact_group
            ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_telephone',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('Telephone', 'medigroup'),
                    'parent'      => $row1
                ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_email',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('Email', 'medigroup'),
                    'parent'      => $row1
                ));

            $row2 = medigroup_mikado_add_admin_row(array(
                'name'        => 'row2',
                'parent'      => $contact_group
            ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_street',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('Street and Number', 'medigroup'),
                    'parent'      => $row2
                ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_city',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('City', 'medigroup'),
                    'parent'      => $row2
                ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_zip',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('Postal Code', 'medigroup'),
                    'parent'      => $row2
                ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_state',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('State', 'medigroup'),
                    'parent'      => $row2
                ));

        $social_group = medigroup_mikado_add_admin_group(array(
            'name'        => 'mkd_doctor_social',
            'title'       => esc_html__('Social Networks', 'medigroup'),
            'parent'      => $meta_box
        ));

            $row1 = medigroup_mikado_add_admin_row(array(
                'name'        => 'row1',
                'parent'      => $social_group
            ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_facebook',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('Facebook Page', 'medigroup'),
                    'parent'      => $row1
                ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_twitter',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('Twitter', 'medigroup'),
                    'parent'      => $row1
                ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_skype',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('Skype', 'medigroup'),
                    'parent'      => $row1
                ));

            $row2 = medigroup_mikado_add_admin_row(array(
                'name'        => 'row2',
                'parent'      => $social_group
            ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_linkedin',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('Linkedin', 'medigroup'),
                    'parent'      => $row2
                ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_instagram',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('Instagram', 'medigroup'),
                    'parent'      => $row2
                ));

                medigroup_mikado_add_meta_box_field(array(
                    'name'        => 'mkd_doctor_gplus',
                    'type'        => 'textsimple',
                    'label'       => esc_html__('Google+', 'medigroup'),
                    'parent'      => $row2
                ));

        medigroup_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_doctor_workdays',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Work Days', 'medigroup'),
                'description' => esc_html__('Choose days of the week when this doctor is available', 'medigroup'),
                'parent' => $meta_box,
                'options' => array(
                    'monday' => esc_html__('Monday', 'medigroup'),
                    'test' => esc_html__('Tuesday', 'medigroup'),
                    'wednesday' => esc_html__('Wednesday', 'medigroup'),
                    'thursday' => esc_html__('Thursday', 'medigroup'),
                    'friday' => esc_html__('Friday', 'medigroup'),
                    'saturday' => esc_html__('Saturday', 'medigroup'),
                    'sunday' => esc_html__('Sunday', 'medigroup')
                ),
                'args' => array(
                    'enable_empty_checkbox' => false,
                    'inline_checkbox_class' => true
                )
            )
        );


        $meta_box = medigroup_mikado_add_meta_box(array(
            'scope' => 'doctor',
            'title' => esc_html__('Doctor Team', 'medigroup'),
            'name'  => 'doctor_team_meta_box'
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'mkd_doctor_team_title',
            'type'        => 'text',
            'label'       => esc_html__('Team Section Title', 'medigroup'),
            'parent'      => $meta_box
        ));

        medigroup_mikado_add_meta_box_field(array(
            'name'        => 'mkd_doctor_team_text',
            'type'        => 'textarea',
            'label'       => esc_html__('Team Section Text', 'medigroup'),
            'description' => esc_html__('Describe the doctor\'s team and their expertise. Use <p> tag to denote paragraphs.', 'medigroup'),
            'parent'      => $meta_box
        ));

        $all_doctors = array();
        $doctors = get_posts(array(
            'post_type' => 'doctor',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'offset' => 0
        ));
        wp_reset_postdata();
        foreach ($doctors as $doctor) {
            $all_doctors[strval($doctor->ID)] = $doctor->post_title;
        }

        medigroup_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_doctor_similar',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Doctors to Display', 'medigroup'),
                'description' => esc_html__('Choose doctors that should be displayed on this doctor\'s page.', 'medigroup'),
                'parent' => $meta_box,
                'options' => $all_doctors,
                'args' => array(
                    'enable_empty_checkbox' => false,
                    'inline_checkbox_class' => true
                )
            )
        );
    }

    add_action('medigroup_mikado_meta_boxes_map', 'medigroup_mikado_map_doctor_single');
}