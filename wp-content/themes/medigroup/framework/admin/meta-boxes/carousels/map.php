<?php

//Carousels

$carousel_meta_box = medigroup_mikado_add_meta_box(
    array(
        'scope' => array('carousels'),
        'title' => esc_html__('Carousel', 'medigroup'),
        'name' => 'carousel_meta'
    )
);

    medigroup_mikado_add_meta_box_field(
        array(
            'name'        => 'mkd_carousel_image',
            'type'        => 'image',
            'label'       => esc_html__('Carousel Image', 'medigroup'),
            'description' => esc_html__('Choose carousel image (min width needs to be 215px)', 'medigroup'),
            'parent'      => $carousel_meta_box
        )
    );

    medigroup_mikado_add_meta_box_field(
        array(
            'name'        => 'mkd_carousel_hover_image',
            'type'        => 'image',
            'label'       => esc_html__('Carousel Hover Image', 'medigroup'),
            'description' => esc_html__('Choose carousel hover image (min width needs to be 215px)', 'medigroup'),
            'parent'      => $carousel_meta_box
        )
    );

    medigroup_mikado_add_meta_box_field(
        array(
            'name'        => 'mkd_carousel_item_link',
            'type'        => 'text',
            'label'       => esc_html__('Link', 'medigroup'),
            'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'medigroup'),
            'parent'      => $carousel_meta_box
        )
    );

    medigroup_mikado_add_meta_box_field(
        array(
            'name'        => 'mkd_carousel_item_target',
            'type'        => 'selectblank',
            'label'       => esc_html__('Target', 'medigroup'),
            'description' => esc_html__('Specify where to open the linked document', 'medigroup'),
            'parent'      => $carousel_meta_box,
            'options' => array(
            	'_self' => esc_html__('Self', 'medigroup'),
            	'_blank' => esc_html__('Blank', 'medigroup')
        	)
        )
    );