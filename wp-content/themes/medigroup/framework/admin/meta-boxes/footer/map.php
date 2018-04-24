<?php

$footer_meta_box = medigroup_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'doctor', 'post'),
        'title' => esc_html__('Footer', 'medigroup'),
        'name'  => 'footer_meta'
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_enable_footer_image_meta',
        'type'          => 'yesno',
        'default_value' => 'no',
        'label'         => esc_html__('Disable Footer Image for this Page', 'medigroup'),
        'description'   => esc_html__('Enabling this option will hide footer image on this page', 'medigroup'),
        'parent'        => $footer_meta_box,
        'args'          => array(
            'dependence'             => true,
            'dependence_hide_on_yes' => '#mkd_mkd_footer_background_image_meta',
            'dependence_show_on_yes' => ''
        )
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'name'            => 'mkd_footer_background_image_meta',
        'type'            => 'image',
        'label'           => esc_html__('Background Image', 'medigroup'),
        'description'     => esc_html__('Choose Background Image for Footer Area on this page', 'medigroup'),
        'parent'          => $footer_meta_box,
        'hidden_property' => 'mkd_enable_footer_background_image_meta',
        'hidden_value'    => 'yes'
    )
);
medigroup_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_disable_footer_meta',
        'type'          => 'yesno',
        'default_value' => 'no',
        'label'         => esc_html__('Disable Footer for this Page', 'medigroup'),
        'description'   => esc_html__('Enabling this option will hide footer on this page', 'medigroup'),
        'parent'        => $footer_meta_box,
    )
);