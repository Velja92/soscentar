<?php

$header_meta_box = medigroup_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'doctor', 'post'),
        'title' => esc_html__('Header', 'medigroup'),
        'name'  => 'header_meta'
    )
);

$temp_holder_show     = '';
$temp_holder_hide     = '';
$temp_array_type1     = array();
$temp_array_vertical  = array();
$temp_array_minimal   = array();
$temp_array_behaviour = array();
switch(medigroup_mikado_options()->getOptionValue('header_type')) {

    case 'header-type1':
        $temp_holder_show = '#mkd_mkd_header_type1_meta_container, #mkd_mkd_header_behaviour_meta_container';
        $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container';

        $temp_array_type1 = array(
            'hidden_value'  => 'default',
            'hidden_values' => array('', 'header-vertical', 'header-minimal')
        );

        $temp_array_vertical = array(
            'hidden_values' => array('', 'header-type1', 'header-minimal')
        );

        $temp_array_minimal = array(
            'hidden_value'  => 'default',
            'hidden_values' => array('', 'header-type1', 'header-vertical')
        );

        $temp_array_behaviour = array(
            'hidden_value' => 'header-vertical'
        );

        break;

    case 'header-vertical':
        $temp_holder_show = '#mkd_mkd_header_vertical_type_meta_container';
        $temp_holder_hide = '#mkd_mkd_header_type1_meta_container, #mkd_mkd_header_behaviour_meta_container, #mkd_mkd_header_minimal_type_meta_container';

        $temp_array_type1 = array(
            'hidden_values' => array('', 'header-vertical', 'header-minimal')
        );

        $temp_array_vertical = array(
            'hidden_value'  => 'default',
            'hidden_values' => array('', 'header-type1', 'header-minimal')
        );

        $temp_array_minimal = array(
            'hidden_value'  => 'default',
            'hidden_values' => array('', 'header-type1', 'header-vertical')
        );

        $temp_array_behaviour = array(
            'hidden_value'  => 'default',
            'hidden_values' => array('', 'header-vertical')
        );

        break;

    case 'header-minimal':
        $temp_holder_show = '#mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_behaviour_meta';
        $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_type1_meta_container';

        $temp_array_type1 = array(
            'hidden_value'  => 'default',
            'hidden_values' => array('', 'header-vertical', 'header-minimal',)
        );

        $temp_array_minimal = array(
            'hidden_value'  => 'default',
            'hidden_values' => array('', 'header-type1', 'header-vertical',)
        );

        $temp_array_vertical = array(
            'hidden_values' => array('', 'header-type1', 'header-minimal',)
        );

        $temp_array_behaviour = array(
            'hidden_values' => array('header-vertical')
        );

        break;
}

medigroup_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_header_type_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Choose Header Type', 'medigroup'),
        'description'   => esc_html__('Select header type layout', 'medigroup'),
        'parent'        => $header_meta_box,
        'options'       => array(
            ''                => esc_html__('Default', 'medigroup'),
            'header-type1'    => esc_html__('Standard Header', 'medigroup'),
            'header-vertical' => esc_html__('Vertical Header', 'medigroup'),
            'header-minimal'  => esc_html__('Minimal Header', 'medigroup'),
        ),
        'args'          => array(
            "dependence" => true,
            "hide"       => array(
                ""                => $temp_holder_hide,
                'header-type1'    => '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container',
                'header-vertical' => '#mkd_mkd_header_type1_meta_container, #mkd_mkd_header_behaviour_meta_container, #mkd_mkd_header_minimal_type_meta_container',
                'header-minimal'  => '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_type1_meta_container',
            ),
            "show"       => array(
                ""                => $temp_holder_show,
                "header-type1"    => '#mkd_mkd_header_type1_meta_container, #mkd_mkd_header_behaviour_meta_container',
                "header-vertical" => '#mkd_mkd_header_vertical_type_meta_container',
                'header-minimal'  => '#mkd_mkd_header_minimal_type_meta_container',
            )
        )
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_header_style_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Header Skin', 'medigroup'),
        'description'   => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'medigroup'),
        'parent'        => $header_meta_box,
        'options'       => array(
            ''             => '',
            'light-header' => esc_html__('Light', 'medigroup'),
            'dark-header'  => esc_html__('Dark', 'medigroup'),
        )
    )
);

$header_style_container = medigroup_mikado_add_admin_container(
    array(
        'parent' => $header_meta_box,
        'name'   => 'mkd_header_style_meta_container'
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_header_style_logo_area_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Header Logo Area Skin', 'medigroup'),
        'description'   => esc_html__('Choose a header style to make logo area elements in that predefined style', 'medigroup'),
        'parent'        => $header_style_container,
        'options'       => array(
            ''             => '',
            'light-header' => esc_html__('Light', 'medigroup'),
            'dark-header'  => esc_html__('Dark', 'medigroup'),
        )
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_header_style_menu_area_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Header Menu Area Skin', 'medigroup'),
        'description'   => esc_html__('Choose a header style to make menu area elements in that predefined style', 'medigroup'),
        'parent'        => $header_style_container,
        'options'       => array(
            ''             => '',
            'light-header' => esc_html__('Light', 'medigroup'),
            'dark-header'  => esc_html__('Dark', 'medigroup'),
        )
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'parent'        => $header_meta_box,
        'type'          => 'select',
        'name'          => 'mkd_enable_header_style_on_scroll_meta',
        'default_value' => '',
        'label'         => esc_html__('Enable Header Style on Scroll', 'medigroup'),
        'description'   => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'medigroup'),
        'options'       => array(
            ''    => '',
            'no'  => esc_html__('No', 'medigroup'),
            'yes' => esc_html__('Yes', 'medigroup'),
        )
    )
);

$header_type1_meta_container = medigroup_mikado_add_admin_container(
    array_merge(
        array(
            'parent'          => $header_meta_box,
            'name'            => 'mkd_header_type1_meta_container',
            'hidden_property' => 'mkd_header_type_meta',
        ),
        $temp_array_type1
    )
);

medigroup_mikado_add_admin_section_title(array(
    'name'   => 'logo_area_section',
    'parent' => $header_type1_meta_container,
    'title'  => esc_html__('Logo Area', 'medigroup'),
));

medigroup_mikado_add_meta_box_field(array(
    'name'          => 'mkd_logo_area_in_grid_header_type1_meta',
    'type'          => 'select',
    'label'         => esc_html__('Logo Area In Grid', 'medigroup'),
    'description'   => esc_html__('Set logo area content to be in grid', 'medigroup'),
    'parent'        => $header_type1_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => esc_html__('Default', 'medigroup'),
        'no'  => esc_html__('No', 'medigroup'),
        'yes' => esc_html__('Yes', 'medigroup'),
    )
));

medigroup_mikado_add_meta_box_field(
    array(
        'parent'      => $header_type1_meta_container,
        'type'        => 'color',
        'name'        => 'mkd_logo_area_background_color_header_type1_meta',
        'label'       => esc_html__('Background Color', 'medigroup'),
        'description' => esc_html__('Set background color for logo area on this page', 'medigroup'),
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'parent'      => $header_type1_meta_container,
        'type'        => 'text',
        'name'        => 'mkd_logo_area_background_transparency_header_type1_meta',
        'label'       => esc_html__('Background Transparency', 'medigroup'),
        'description' => esc_html__('Set background transparency for logo area on this page', 'medigroup'),
        'args'        => array(
            'col_width' => 3
        )
    )
);

medigroup_mikado_add_meta_box_field(array(
    'name'          => 'mkd_logo_area_border_header_type1_meta',
    'type'          => 'select',
    'label'         => esc_html__('Logo Area Border', 'medigroup'),
    'description'   => esc_html__('Set border on logo area on this page', 'medigroup'),
    'parent'        => $header_type1_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'medigroup'),
        'yes' => esc_html__('Yes', 'medigroup'),
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_border_bottom_color_logo_container',
            'no'  => '#mkd_border_bottom_color_logo_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_border_bottom_color_logo_container'
        )
    )
));

$border_bottom_color_logo_container = medigroup_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'border_bottom_color_logo_container',
    'parent'          => $header_type1_meta_container,
    'hidden_property' => 'mkd_logo_area_border_header_type1_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));

medigroup_mikado_add_meta_box_field(array(
    'name'        => 'mkd_logo_area_border_color_header_type1_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'medigroup'),
    'description' => esc_html__('Choose color of header bottom border on this page', 'medigroup'),
    'parent'      => $border_bottom_color_logo_container
));

medigroup_mikado_add_meta_box_field(array(
    'name'        => 'mkd_logo_area_border_color_transparency_header_type1_meta',
    'type'        => 'text',
    'label'       => esc_html__('Border Transparency', 'medigroup'),
    'description' => esc_html__('Choose Transparency of header bottom border on this page', 'medigroup'),
    'parent'      => $border_bottom_color_logo_container,
    'args'        => array(
        'col_width' => 3
    )
));

medigroup_mikado_add_admin_section_title(array(
    'name'   => 'menu_area_section',
    'parent' => $header_type1_meta_container,
    'title'  => esc_html__('Menu Area', 'medigroup'),
));

medigroup_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_in_grid_header_type1_meta',
    'type'          => 'select',
    'label'         => esc_html__('Menu Area In Grid', 'medigroup'),
    'description'   => esc_html__('Set menu area content to be in grid', 'medigroup'),
    'parent'        => $header_type1_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => esc_html__('Default', 'medigroup'),
        'no'  => esc_html__('No', 'medigroup'),
        'yes' => esc_html__('Yes', 'medigroup'),
    )
));

medigroup_mikado_add_meta_box_field(
    array(
        'parent'      => $header_type1_meta_container,
        'type'        => 'color',
        'name'        => 'mkd_menu_area_background_color_header_type1_meta',
        'label'       => esc_html__('Background Color', 'medigroup'),
        'description' => esc_html__('Set background color for menu area on this page', 'medigroup'),
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'parent'      => $header_type1_meta_container,
        'type'        => 'text',
        'name'        => 'mkd_menu_area_background_transparency_header_type1_meta',
        'label'       => esc_html__('Background Transparency', 'medigroup'),
        'description' => esc_html__('Set background transparency for menu area on this page', 'medigroup'),
        'args'        => array(
            'col_width' => 3
        )
    )
);

medigroup_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_border_header_type1_meta',
    'type'          => 'select',
    'label'         => esc_html__('Menu Area Border', 'medigroup'),
    'description'   => esc_html__('Set border on menu area on this page', 'medigroup'),
    'parent'        => $header_type1_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'medigroup'),
        'yes' => esc_html__('Yes', 'medigroup'),
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_border_bottom_color_menu_container',
            'no'  => '#mkd_border_bottom_color_menu_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_border_bottom_color_menu_container'
        )
    )
));

$border_bottom_color_menu_container = medigroup_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'border_bottom_color_menu_container',
    'parent'          => $header_type1_meta_container,
    'hidden_property' => 'mkd_menu_area_border_header_type1_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));

medigroup_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_border_color_header_type1_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'medigroup'),
    'description' => esc_html__('Choose color of header bottom border on this page', 'medigroup'),
    'parent'      => $border_bottom_color_menu_container
));

medigroup_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_border_color_transparency_header_type1_meta',
    'type'        => 'text',
    'label'       => esc_html__('Border Transparency', 'medigroup'),
    'description' => esc_html__('Choose Transparency of header bottom border on this page', 'medigroup'),
    'parent'      => $border_bottom_color_menu_container,
    'args'        => array(
        'col_width' => 3
    )
));

////////////////////////

$header_minimal_type_meta_container = medigroup_mikado_add_admin_container(
    array_merge(
        array(
            'parent' => $header_meta_box,
            'name' => 'mkd_header_minimal_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta',

        ),
        $temp_array_minimal
    )
);

medigroup_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_in_grid_header_minimal_meta',
    'type'          => 'select',
    'label'         => esc_html__('Header In Grid', 'medigroup'),
    'description'   => esc_html__('Set header content to be in grid', 'medigroup'),
    'parent'        => $header_minimal_type_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => esc_html__('Default', 'medigroup'),
        'no'  => esc_html__('No', 'medigroup'),
        'yes' => esc_html__('Yes', 'medigroup'),
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''      => '#mkd_menu_area_in_grid_header_minimal_container',
            'no'    => '#mkd_menu_area_in_grid_header_minimal_container',
            'yes'   => ''
        ),
        'show'       => array(
            ''      => '',
            'no'    => '',
            'yes'   => '#mkd_menu_area_in_grid_header_minimal_container'
        )
    )
));

$menu_area_in_grid_header_minimal_container = medigroup_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'menu_area_in_grid_header_minimal_container',
    'parent'          => $header_minimal_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_header_minimal_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('','no')
));


medigroup_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_grid_background_color_header_minimal_meta',
        'type'        => 'color',
        'label'       => esc_html__('Grid Background Color', 'medigroup'),
        'description' => esc_html__('Set grid background color for header area', 'medigroup'),
        'parent'      => $menu_area_in_grid_header_minimal_container
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_grid_background_transparency_header_minimal_meta',
        'type'        => 'text',
        'label'       => esc_html__('Grid Background Transparency', 'medigroup'),
        'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'medigroup'),
        'parent'      => $menu_area_in_grid_header_minimal_container,
        'args'        => array(
            'col_width' => 2
        )
    )
);

medigroup_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_in_grid_border_header_minimal_meta',
    'type'          => 'select',
    'label'         => esc_html__('Grid Area Border', 'medigroup'),
    'description'   => esc_html__('Set border on grid area', 'medigroup'),
    'parent'        => $menu_area_in_grid_header_minimal_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'medigroup'),
        'yes' => esc_html__('Yes', 'medigroup'),
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''      => '#mkd_menu_area_in_grid_border_header_minimal_container',
            'no'    => '#mkd_menu_area_in_grid_border_header_minimal_container',
            'yes'   => ''
        ),
        'show'       => array(
            ''      => '',
            'no'    => '',
            'yes'   => '#mkd_menu_area_in_grid_border_header_minimal_container'
        )
    )
));

$menu_area_in_grid_border_header_minimal_container = medigroup_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'menu_area_in_grid_border_header_minimal_container',
    'parent'          => $header_minimal_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_border_header_minimal_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('','no')
));

medigroup_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_in_grid_border_color_header_minimal_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'medigroup'),
    'description' => esc_html__('Set border color for grid area', 'medigroup'),
    'parent'      => $menu_area_in_grid_border_header_minimal_container
));


medigroup_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_background_color_header_minimal_meta',
        'type'        => 'color',
        'label'       => esc_html__('Background Color', 'medigroup'),
        'description' => esc_html__('Choose a background color for header area', 'medigroup'),
        'parent'      => $header_minimal_type_meta_container
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_background_transparency_header_minimal_meta',
        'type'        => 'text',
        'label'       => esc_html__('Transparency', 'medigroup'),
        'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'medigroup'),
        'parent'      => $header_minimal_type_meta_container,
        'args'        => array(
            'col_width' => 2
        )
    )
);

medigroup_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_border_header_minimal_meta',
    'type'          => 'select',
    'label'         => esc_html__('Header Area Border', 'medigroup'),
    'description'   => esc_html__('Set border on header area', 'medigroup'),
    'parent'        => $header_minimal_type_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'medigroup'),
        'yes' => esc_html__('Yes', 'medigroup'),
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''      => '#mkd_border_bottom_color_container',
            'no'    => '#mkd_border_bottom_color_container',
            'yes'   => ''
        ),
        'show'       => array(
            ''      => '',
            'no'    => '',
            'yes'   => '#mkd_border_bottom_color_container'
        )
    )
));

$border_bottom_color_minimal_container = medigroup_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'border_bottom_color_container',
    'parent'          => $header_minimal_type_meta_container,
    'hidden_property' => 'mkd_menu_area_border_header_minimal_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('','no')
));

medigroup_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_border_color_header_minimal_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'medigroup'),
    'description' => esc_html__('Choose color of header bottom border', 'medigroup'),
    'parent'      => $border_bottom_color_minimal_container
));

medigroup_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_fullscreen_menu_background_image_meta',
        'type'          => 'image',
        'default_value' => '',
        'label'         => esc_html__('Fullscreen Background Image', 'medigroup'),
        'description'   => esc_html__('Set background image for Fullscreen Menu', 'medigroup'),
        'parent'        => $header_minimal_type_meta_container
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_disable_fullscreen_menu_background_image_meta',
        'type'          => 'yesno',
        'default_value' => 'no',
        'label'         => esc_html__('Disable Fullscreen Background Image', 'medigroup'),
        'description'   => esc_html__('Enabling this option will hide background image in Fullscreen Menu', 'medigroup'),
        'parent'        => $header_minimal_type_meta_container
    )
);

///////////////////////

$header_vertical_type_meta_container = medigroup_mikado_add_admin_container(
    array_merge(
        array(
            'parent'          => $header_meta_box,
            'name'            => 'mkd_header_vertical_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta'
        ),
        $temp_array_vertical
    )
);

medigroup_mikado_add_admin_section_title(array(
    'name'   => 'logo_area_section',
    'parent' => $header_vertical_type_meta_container,
    'title'  => esc_html__('Vertical Header', 'medigroup'),
));

medigroup_mikado_add_meta_box_field(array(
    'name'        => 'mkd_vertical_header_background_color_meta',
    'type'        => 'color',
    'label'       => esc_html__('Background Color', 'medigroup'),
    'description' => esc_html__('Set background color for vertical menu', 'medigroup'),
    'parent'      => $header_vertical_type_meta_container
));

medigroup_mikado_add_meta_box_field(array(
    'name'        => 'mkd_vertical_header_transparency_meta',
    'type'        => 'text',
    'label'       => esc_html__('Transparency', 'medigroup'),
    'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'medigroup'),
    'parent'      => $header_vertical_type_meta_container,
    'args'        => array(
        'col_width' => 1
    )
));

medigroup_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_vertical_header_background_image_meta',
        'type'          => 'image',
        'default_value' => '',
        'label'         => esc_html__('Background Image', 'medigroup'),
        'description'   => esc_html__('Set background image for vertical menu', 'medigroup'),
        'parent'        => $header_vertical_type_meta_container
    )
);

medigroup_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_disable_vertical_header_background_image_meta',
        'type'          => 'yesno',
        'default_value' => 'no',
        'label'         => esc_html__('Disable Background Image', 'medigroup'),
        'description'   => esc_html__('Enabling this option will hide background image in Vertical Menu', 'medigroup'),
        'parent'        => $header_vertical_type_meta_container
    )
);

if(medigroup_mikado_options()->getOptionValue('header_type') != 'header-vertical') {
    $sticky_amount_container = medigroup_mikado_add_admin_container_no_style(array(
        'name'            => 'sticky_amount_container',
        'parent'          => $header_meta_box,
        'hidden_property' => 'header_behaviour',
        'hidden_values'   => array('sticky-header-on-scroll-up', 'fixed-on-scroll')
    ));

    $sticky_amount_group = medigroup_mikado_add_admin_group(array(
        'name'        => 'sticky_amount_group',
        'title'       => esc_html__('Scroll Amount for Sticky Header Appearance', 'medigroup'),
        'parent'      => $sticky_amount_container,
        'description' => esc_html__('Enter the amount of pixels for sticky header appearance, or set browser height to "Yes" for predefined sticky header appearance amount', 'medigroup'),
    ));

    $sticky_amount_row = medigroup_mikado_add_admin_row(array(
        'name'   => 'sticky_amount_group',
        'parent' => $sticky_amount_group
    ));

    medigroup_mikado_add_meta_box_field(
        array(
            'name'   => 'mkd_scroll_amount_for_sticky_meta',
            'type'   => 'textsimple',
            'label'  => esc_html__('Amount in px', 'medigroup'),
            'parent' => $sticky_amount_row,
            'args'   => array(
                'suffix' => 'px'
            )
        )
    );

    medigroup_mikado_add_meta_box_field(
        array(
            'name'          => 'mkd_scroll_amount_for_sticky_fullscreen_meta',
            'type'          => 'yesnosimple',
            'label'         => esc_html__('Browser Height', 'medigroup'),
            'default_value' => 'no',
            'parent'        => $sticky_amount_row
        )
    );

    medigroup_mikado_add_admin_section_title(array(
        'name'   => 'top_bar_section_title',
        'parent' => $header_meta_box,
        'title'  => esc_html__('Top Bar', 'medigroup'),
    ));

    $top_bar_global_option      = medigroup_mikado_options()->getOptionValue('top_bar');
    $top_bar_default_dependency = array(
        '' => '#mkd_top_bar_container_no_style'
    );

    $top_bar_show_array = array(
        'yes' => '#mkd_top_bar_container_no_style'
    );

    $top_bar_hide_array = array(
        'no' => '#mkd_top_bar_container_no_style'
    );

    if($top_bar_global_option === 'yes') {
        $top_bar_show_array           = array_merge($top_bar_show_array, $top_bar_default_dependency);
        $top_bar_container_hide_array = array('no');
    } else {
        $top_bar_hide_array           = array_merge($top_bar_hide_array, $top_bar_default_dependency);
        $top_bar_container_hide_array = array('', 'no');
    }

    medigroup_mikado_add_meta_box_field(array(
        'name'          => 'mkd_top_bar_meta',
        'type'          => 'select',
        'label'         => esc_html__('Enable Top Bar on This Page', 'medigroup'),
        'description'   => esc_html__('Enabling this option will enable top bar on this page', 'medigroup'),
        'parent'        => $header_meta_box,
        'default_value' => '',
        'options'       => array(
            ''    => esc_html__('Default', 'medigroup'),
            'yes' => esc_html__('Yes', 'medigroup'),
            'no'  => esc_html__('No', 'medigroup'),
        ),
        'args'          => array(
            'dependence' => true,
            'show'       => $top_bar_show_array,
            'hide'       => $top_bar_hide_array
        )
    ));

    $top_bar_container = medigroup_mikado_add_admin_container_no_style(array(
        'name'            => 'top_bar_container_no_style',
        'parent'          => $header_meta_box,
        'hidden_property' => 'top_bar',
        'hidden_value'    => 'no',
        'hidden_values'   => $top_bar_container_hide_array
    ));

    medigroup_mikado_add_meta_box_field(array(
        'name'    => 'mkd_top_bar_skin_meta',
        'type'    => 'select',
        'label'   => esc_html__('Top Bar Skin', 'medigroup'),
        'options' => array(
            ''      => esc_html__('Default', 'medigroup'),
            'light' => esc_html__('Light', 'medigroup'),
            'dark'  => esc_html__('Dark', 'medigroup'),
        ),
        'parent'  => $top_bar_container
    ));

    medigroup_mikado_add_meta_box_field(array(
        'name'   => 'mkd_top_bar_background_color_meta',
        'type'   => 'color',
        'label'  => esc_html__('Top Bar Background Color', 'medigroup'),
        'parent' => $top_bar_container
    ));

    medigroup_mikado_add_meta_box_field(array(
        'name'        => 'mkd_top_bar_background_transparency_meta',
        'type'        => 'text',
        'label'       => esc_html__('Top Bar Background Color Transparency', 'medigroup'),
        'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'medigroup'),
        'parent'      => $top_bar_container,
        'args'        => array(
            'col_width' => 3
        )
    ));
}