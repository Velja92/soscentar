<?php
namespace Medigroup\Modules\Shortcodes\BlogSlider;

use Medigroup\Modules\Shortcodes\Lib\ShortcodeInterface;

class BlogSlider implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_blog_slider';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map(array(
            'name'                      => esc_html__('Blog Slider', 'medigroup'),
            'base'                      => $this->base,
            'icon'                      => 'icon-wpb-blog-slider extended-custom-icon',
            'category'                  => esc_html__('by MIKADO', 'medigroup'),
            'allowed_container_element' => 'vc_row',
            'params'                    => array(
                array(
                    'type'        => 'textfield',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Number of Posts', 'medigroup'),
                    'param_name'  => 'number_of_posts',
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Number of Posts to show in row', 'medigroup'),
                    'param_name'  => 'posts_to_show',
                    'value'       => array(
                        '3' => 3,
                        '4' => 4
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Set Featured Image', 'medigroup'),
                    'param_name'  => 'featured_image',
                    'value'       => array(
                        esc_html__('Yes', 'medigroup') => 'yes',
                        esc_html__('No', 'medigroup')  => 'no'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Order By', 'medigroup'),
                    'param_name'  => 'order_by',
                    'value'       => array(
                        esc_html__('Title', 'medigroup') => 'title',
                        esc_html__('Date', 'medigroup')  => 'date'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Order', 'medigroup'),
                    'param_name'  => 'order',
                    'value'       => array(
                        esc_html__('ASC', 'medigroup')  => 'ASC',
                        esc_html__('DESC', 'medigroup') => 'DESC'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type'        => 'textfield',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Category Slug', 'medigroup'),
                    'param_name'  => 'category',
                    'description' => esc_html__('Leave empty for all or use comma for list', 'medigroup')
                ),
                array(
                    'type'        => 'textfield',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Text length', 'medigroup'),
                    'param_name'  => 'text_length',
                    'description' => esc_html__('Number of characters', 'medigroup')
                )
            )
        ));

    }

    public function render($atts, $content = null) {

        $default_atts = array(
            'number_of_posts' => '',
            'posts_to_show'   => 3,
            'featured_image'   => 'yes',
            'order_by'        => '',
            'order'           => '',
            'category'        => '',
            'text_length'     => '90',
        );

        $params = shortcode_atts($default_atts, $atts);

        $queryParams = $this->generateBlogQueryArray($params);

        $query = new \WP_Query($queryParams);

        $params['query']          = $query;
        $params['data_attribute'] = $this->getDataAttribute($params);

        return medigroup_mikado_get_shortcode_module_template_part('templates/blog-slider-template', 'blog-slider', '', $params);
    }


    /**
     * Generates query array
     *
     * @param $params
     *
     * @return array
     */
    public function generateBlogQueryArray($params) {

        $queryArray = array(
            'orderby'        => $params['order_by'],
            'order'          => $params['order'],
            'posts_per_page' => $params['number_of_posts'],
            'category_name'  => $params['category']
        );

        return $queryArray;
    }

    private function getDataAttribute($params) {
        $data_attribute = '';
        $data_attribute .= ' data-posts_to_show="'.$params['posts_to_show'].'"';

        return $data_attribute;
    }
}