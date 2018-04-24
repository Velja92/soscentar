<?php

class MedigroupMikadoWorkingHours extends MedigroupMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkd_working_hours_widget', // Base ID
            esc_html__('Mikado Working Hours', 'medigroup') // Name
        );

        $this->setParams();
    }

    protected function setParams() {

        $this->params = array(
            array(
                'type'  => 'textfield',
                'title' => esc_html__('Title', 'medigroup'),
                'name'  => 'title'
            ),

            array(
                'type'  => 'textfield',
                'title' => esc_html__('Custom Size (px) for Title', 'medigroup'),
                'name'  => 'custom_size_title'
            ),

            array(
                'type'  => 'textfield',
                'title' => esc_html__('Text', 'medigroup'),
                'name'  => 'text'
            ),

            array(
                'type'  => 'textfield',
                'title' => esc_html__('Custom Size (px) for Text', 'medigroup'),
                'name'  => 'custom_size_text'
            ),

            array(
                'type'  => 'textfield',
                'title' => esc_html__('Custom Size (px) for Day and Time', 'medigroup'),
                'name'  => 'custom_size_day'
            ),
            array(
                'type'  => 'textfield',
                'title' => esc_html__('Monday To Friday', 'medigroup'),
                'name'  => 'monday_to_friday',
            ),
            array(
                'type'  => 'textfield',
                'title' => esc_html__('Saturday', 'medigroup'),
                'name'  => 'saturday'
            ),
            array(
                'type'  => 'textfield',
                'title' => esc_html__('Sunday', 'medigroup'),
                'name'  => 'sunday'
            )
        );

    }

    public function widget($args, $instance) {
        print $args['before_widget'];

        extract($instance);

        print medigroup_mikado_execute_shortcode('mkd_working_hours', array(
                'title'             => $title,
                'custom_size_title' => $custom_size_title,
                'text'              => $text,
                'custom_size_text'  => $custom_size_text,
                'custom_size_day'   => $custom_size_day,
                'format'            => '5_1_1',
                'monday_to_friday'  => $monday_to_friday,
                'saturday'          => $saturday,
                'sunday'            => $sunday
            )
        );
        print $args['after_widget'];
    }
}