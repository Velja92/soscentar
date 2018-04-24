<?php

namespace MikadoCore\CPT\Doctors\Shortcodes;

use MikadoCore\Lib\ShortcodeInterface;

class BookingForm implements ShortcodeInterface {
    private $base;

    /**
     * ToursFilter constructor.
     */
    public function __construct() {
        $this->base = 'mkd_booking_form';

        add_action('vc_before_init_vc', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if(function_exists('vc_map')) {
            vc_map(array(
                'name'                      => esc_html__('Booking Form', 'mkd-core'),
                'base'                      => $this->base,
                'category'                  => esc_html__('by MIKADO', 'mkd-core'),
                'icon'                      => 'icon-wpb-booking-form extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params'                    => array(
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Title', 'mkd-core'),
                        'param_name'  => 'form_title',
                        'admin_label' => true,
                        'group'       => esc_html__('Form Content', 'mkd-core')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Slogan', 'mkd-core'),
                        'param_name'  => 'form_slogan',
                        'admin_label' => true,
                        'group'       => esc_html__('Form Content', 'mkd-core'),
                        'description' => esc_html__('Appears in Booking Form above the title.', 'mkd-core')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Show Request Field?', 'mkd-core'),
                        'param_name'  => 'form_request',
                        'value'       => array(
                            esc_html__('No', 'mkd-core')  => 'no',
                            esc_html__('Yes', 'mkd-core') => 'yes'
                        ),
                        'admin_label' => true,
                        'description' => esc_html__('A place for additional note by the user', 'mkd-core'),
                        'save_always' => true,
                        'group'       => esc_html__('Form Content', 'mkd-core')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Button Text', 'mkd-core'),
                        'param_name'  => 'form_button_text',
                        'admin_label' => true,
                        'group'       => esc_html__('Form Content', 'mkd-core'),
                        'description' => esc_html__('Appears in Booking Form above the title.', 'mkd-core')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Skin', 'mkd-core'),
                        'param_name'  => 'form_skin',
                        'value'       => array(
                            esc_html__('Light', 'mkd-core') => 'light',
                            esc_html__('Dark', 'mkd-core')  => 'dark'
                        ),
                        'admin_label' => true,
                        'save_always' => true,
                        'group'       => esc_html__('Design Options', 'mkd-core')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Full Width?', 'mkd-core'),
                        'param_name'  => 'form_full_width',
                        'value'       => array(
                            esc_html__('Yes', 'mkd-core') => 'yes',
                            esc_html__('No', 'mkd-core')  => 'no'
                        ),
                        'admin_label' => true,
                        'save_always' => true,

                        'group'       => esc_html__('Design Options', 'mkd-core')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Columns', 'mkd-core'),
                        'param_name'  => 'form_columns',
                        'value'       => array(
                            esc_html__('One', 'mkd-core')  => '1',
                            esc_html__('Two', 'mkd-core') => '2'
                        ),
                        'admin_label' => true,
                        'description' => esc_html__('A place for additional note by the user', 'mkd-core'),
                        'save_always' => true,
                        'group'       => esc_html__('Design Options', 'mkd-core')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Background Opacity (0-1)', 'mkd-core'),
                        'param_name'  => 'form_opacity',
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'mkd-core')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Floating Form', 'mkd-core'),
                        'param_name'  => 'form_floating',
                        'value'       => array(
                            esc_html__('No', 'mkd-core')  => 'no',
                            esc_html__('Yes', 'mkd-core') => 'yes'
                        ),
                        'admin_label' => true,
                        'description' => esc_html__('This option is used to put form in front of a section.', 'mkd-core'),
                        'save_always' => true,
                        'group'       => esc_html__('Design Options', 'mkd-core')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Floating Form Horizontal Position', 'mkd-core'),
                        'param_name'  => 'form_floating_h_position',
                        'value'       => array(
                            esc_html__('Left', 'mkd-core')  => 'left',
                            esc_html__('Center', 'mkd-core') => 'center',
                            esc_html__('Right', 'mkd-core') => 'right'
                        ),
                        'admin_label' => true,
                        'save_always' => true,
                        'dependency' => array('element' => 'form_floating', 'value' => array('yes')),
                        'group'       => esc_html__('Design Options', 'mkd-core')
                    )
                )
            ));
        }
    }

    public function render($atts, $content = null) {
        $args = array(
            'form_title'       => '',
            'form_slogan'       => '',
            'form_button_text'       => '',
            'form_skin'       => 'light',
            'form_full_width' => 'yes',
            'form_request' => 'no',
            'form_opacity' => '100',
            'form_layout' => 'vertical',
            'form_columns' => '1',
            'form_floating' => 'no',
            'form_floating_h_position' => 'left',
            'form_widget_text' => '',
            'form_widget_link' => ''
        );

        $params = shortcode_atts($args, $atts);

        return mkd_core_get_shortcode_module_template_part('booking-form/templates/booking-form-holder', 'doctors', '', $params);
    }
}