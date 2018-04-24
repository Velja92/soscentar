<?php
namespace MikadoCore\CPT\Portfolio\Shortcodes;

use MikadoCore\Lib;
use MikadoCore\CPT\Portfolio\Lib as PortfolioLib;

/**
 * Class PortfolioList
 * @package MikadoCore\CPT\Portfolio\Shortcodes
 */
class PortfolioList implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * PortfolioList constructor.
     */
    public function __construct() {
        $this->base = 'mkd_portfolio_list';

        add_action('vc_before_init', array($this, 'vcMap'));

        add_action('wp_ajax_nopriv_mkd_core_portfolio_ajax_load_more', array($this, 'loadMorePortfolios'));
        add_action('wp_ajax_mkd_core_portfolio_ajax_load_more', array($this, 'loadMorePortfolios'));
    }


    /**
     * Loads portfolios via AJAX
     */
    public function loadMorePortfolios() {
        $shortcodeParams = $this->getShortcodeParamsFromPost();

        $html           = '';
        $portfolioQuery = PortfolioLib\PortfolioQuery::getInstance();
        $queryResults   = $portfolioQuery->buildQueryObject($shortcodeParams);


        $shortcodeParams['thumb_size']            = $this->getImageSize($shortcodeParams);
        $shortcodeParams['use_custom_image_size'] = false;
        if($shortcodeParams['thumb_size'] === 'custom' && !empty($shortcodeParams['custom_image_dimensions'])) {
            $shortcodeParams['use_custom_image_size'] = true;
            $shortcodeParams['custom_image_sizes']    = $this->getCustomImageSize($shortcodeParams['custom_image_dimensions']);
        }

        if($queryResults->have_posts()) {
            while($queryResults->have_posts()) {
                $queryResults->the_post();

                $shortcodeParams['current_id'] = get_the_ID();

                $shortcodeParams['icon_html']     = $this->getPortfolioIconsHtml($shortcodeParams);
                $shortcodeParams['category_html'] = $this->getItemCategoriesHtml($shortcodeParams);
                $shortcodeParams['categories']    = $this->getItemCategories($shortcodeParams);
                $shortcodeParams['item_link']     = $this->getItemLink($shortcodeParams);

                $html .= mkd_core_get_shortcode_module_template_part('portfolio-list/templates/'.$shortcodeParams['type'], 'portfolio', '', $shortcodeParams);
            }

            wp_reset_postdata();
        } else {
            $html .= '<p>'.esc_html__('Sorry, no posts matched your criteria.', 'mkd-core').'</p>';
        }

        $returnObj = array(
            'html' => $html,
        );

        echo json_encode($returnObj);
        exit;
    }

    /**
     * Prepares shortcode params array from $_POST and returns it
     *
     * @return array
     */
    private function getShortcodeParamsFromPost() {
        $shortcodeParams = array();

        if(!empty($_POST['type'])) {
            $shortcodeParams['type'] = $_POST['type'];
        }

        if(!empty($_POST['columns'])) {
            $shortcodeParams['columns'] = $_POST['columns'];
        }

        if(!empty($_POST['gridSize'])) {
            $shortcodeParams['grid_size'] = $_POST['gridSize'];
        }

        if(!empty($_POST['orderBy'])) {
            $shortcodeParams['order_by'] = $_POST['orderBy'];
        }

        if(!empty($_POST['order'])) {
            $shortcodeParams['order'] = $_POST['order'];
        }

        if(!empty($_POST['number'])) {
            $shortcodeParams['number'] = $_POST['number'];
        }
        if(!empty($_POST['imageSize'])) {
            $shortcodeParams['image_size'] = $_POST['imageSize'];
        }

        if(!empty($_POST['customImageDimensions'])) {
            $shortcodeParams['custom_image_dimensions'] = $_POST['customImageDimensions'];
        }

        if(!empty($_POST['filter'])) {
            $shortcodeParams['filter'] = $_POST['filter'];
        }

        if(!empty($_POST['filterOrderBy'])) {
            $shortcodeParams['filter_order_by'] = $_POST['filterOrderBy'];
        }

        if(!empty($_POST['category'])) {
            $shortcodeParams['category'] = $_POST['category'];
        }

        if(!empty($_POST['selectedProjectes'])) {
            $shortcodeParams['selected_projectes'] = $_POST['selectedProjectes'];
        }

        if(!empty($_POST['showLoadMore'])) {
            $shortcodeParams['show_load_more'] = $_POST['showLoadMore'];
        }

        if(!empty($_POST['titleTag'])) {
            $shortcodeParams['title_tag'] = $_POST['titleTag'];
        }

        if(!empty($_POST['nextPage'])) {
            $shortcodeParams['next_page'] = $_POST['nextPage'];
        }

        if(!empty($_POST['activeFilterCat'])) {
            $shortcodeParams['active_filter_cat'] = $_POST['activeFilterCat'];
        }

        if(!empty($_POST['showExcerpt'])) {
            $shortcodeParams['show_excerpt'] = $_POST['showExcerpt'];
        }

        if(!empty($_POST['space_between_portfolio_items'])) {
            $shortcodeParams['space_between_portfolio_items'] = $_POST['spaceBetweenPortfolioItems'];
        }

        return $shortcodeParams;
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     *
     * @see vc_map
     */
    public function vcMap() {
        if(function_exists('vc_map')) {
            vc_map(array(
                    'name'                      => esc_html__('Portfolio List', 'mkd-core'),
                    'base'                      => $this->getBase(),
                    'category'                  => esc_html__('by MIKADO', 'mkd-core'),
                    'icon'                      => 'icon-wpb-portfolio extended-custom-icon',
                    'allowed_container_element' => 'vc_row',
                    'params'                    => array_merge(
                        array(
                            array(
                                'type'        => 'dropdown',
                                'heading'     => esc_html__('Portfolio List Template', 'mkd-core'),
                                'param_name'  => 'type',
                                'value'       => array(
                                    esc_html__('Standard', 'mkd-core') => 'standard',
                                    esc_html__('Gallery', 'mkd-core')  => 'gallery'
                                ),
                                'admin_label' => true,
                                'description' => '',
                                'group'       => esc_html__('Layout Options', 'mkd-core')
                            ),
                            array(
                                'type'        => 'dropdown',
                                'heading'     => esc_html__('Title Tag', 'mkd-core'),
                                'param_name'  => 'title_tag',
                                'value'       => array(
                                    ''   => '',
                                    'h2' => 'h2',
                                    'h3' => 'h3',
                                    'h4' => 'h4',
                                    'h5' => 'h5',
                                    'h6' => 'h6',
                                ),
                                'admin_label' => true,
                                'description' => '',
                                'group'       => esc_html__('Layout Options', 'mkd-core')
                            ),
                            array(
                                'type'        => 'dropdown',
                                'heading'     => esc_html__('Image Proportions', 'mkd-core'),
                                'param_name'  => 'image_size',
                                'value'       => array(
                                    esc_html__('Original', 'mkd-core')  => 'full',
                                    esc_html__('Square', 'mkd-core')    => 'square',
                                    esc_html__('Landscape', 'mkd-core') => 'landscape',
                                    esc_html__('Portrait', 'mkd-core')  => 'portrait',
                                    esc_html__('Custom', 'mkd-core')    => 'custom'
                                ),
                                'save_always' => true,
                                'admin_label' => true,
                                'description' => '',
                                'dependency'  => array('element' => 'type', 'value' => array('standard', 'gallery')),
                                'group'       => esc_html__('Layout Options', 'mkd-core')
                            ),
                            array(
                                'type'        => 'textfield',
                                'admin_label' => true,
                                'heading'     => esc_html__('Image Dimensions', 'mkd-core'),
                                'param_name'  => 'custom_image_dimensions',
                                'value'       => '',
                                'description' => esc_html__('Enter custom image dimensions. Enter image size in pixels: 200x100 (Width x Height)', 'mkd-core'),
                                'group'       => esc_html__('Layout Options', 'mkd-core'),
                                'dependency'  => array('element' => 'image_size', 'value' => 'custom')
                            ),
                            array(
                                'type'        => 'dropdown',
                                'heading'     => esc_html__('Show Load More', 'mkd-core'),
                                'param_name'  => 'show_load_more',
                                'value'       => array(
                                    esc_html__('Yes', 'mkd-core') => 'yes',
                                    esc_html__('No', 'mkd-core')  => 'no'
                                ),
                                'save_always' => true,
                                'admin_label' => true,
                                'description' => esc_html__('Default value is Yes', 'mkd-core'),
                                'group'       => esc_html__('Layout Options', 'mkd-core')
                            ),
                            array(
                                'type'        => 'dropdown',
                                'heading'     => esc_html__('Number of Columns', 'mkd-core'),
                                'param_name'  => 'columns',
                                'value'       => array(
                                    ''      => '',
                                    esc_html__('One', 'mkd-core')   => 'one',
                                    esc_html__('Two', 'mkd-core')   => 'two',
                                    esc_html__('Three', 'mkd-core') => 'three',
                                    esc_html__('Four', 'mkd-core')  => 'four',
                                    esc_html__('Five', 'mkd-core')  => 'five',
                                    esc_html__('Six', 'mkd-core')   => 'six'
                                ),
                                'admin_label' => true,
                                'description' => esc_html__('Default value is Three', 'mkd-core'),
                                'dependency'  => array('element' => 'type', 'value' => array('standard', 'gallery')),
                                'group'       => esc_html__('Layout Options', 'mkd-core')
                            ),
                            array(
                                'type'        => 'dropdown',
                                'heading'     => esc_html__('Text Alignment', 'mkd-core'),
                                'param_name'  => 'text_align',
                                'value'       => array(
                                    esc_html__('Left', 'mkd-core')   => 'left',
                                    esc_html__('Center', 'mkd-core')   => 'center',
                                    esc_html__('Right', 'mkd-core') => 'right'
                                ),
                                'admin_label' => true,
                                'save_always' => true,
                                'dependency'  => array('element' => 'type', 'value' => array('standard', 'gallery')),
                                'group'       => esc_html__('Layout Options', 'mkd-core')
                            ),
                            array(
                                'type'        => 'dropdown',
                                'heading'     => esc_html__('Enable Category Filter', 'mkd-core'),
                                'param_name'  => 'filter',
                                'value'       => array(
                                    esc_html__('No', 'mkd-core')  => 'no',
                                    esc_html__('Yes', 'mkd-core') => 'yes'
                                ),
                                'admin_label' => true,
                                'save_always' => true,
                                'description' => esc_html__('Default value is No', 'mkd-core'),
                                'group'       => esc_html__('Layout Options', 'mkd-core')
                            ),
                            array(
                                'type'        => 'dropdown',
                                'heading'     => esc_html__('Filter Order By', 'mkd-core'),
                                'param_name'  => 'filter_order_by',
                                'value'       => array(
                                    esc_html__('Name', 'mkd-core')  => 'name',
                                    esc_html__('Count', 'mkd-core') => 'count',
                                    esc_html__('Id', 'mkd-core')    => 'id',
                                    esc_html__('Slug', 'mkd-core')  => 'slug'
                                ),
                                'admin_label' => true,
                                'save_always' => true,
                                'description' => esc_html__('Default value is Name', 'mkd-core'),
                                'dependency'  => array('element' => 'filter', 'value' => array('yes')),
                                'group'       => esc_html__('Layout Options', 'mkd-core')
                            ),
                            array(
                                'type'        => 'dropdown',
                                'heading'     => esc_html__('Space Between Portfolio Items', 'mkd-core'),
                                'param_name'  => 'space_between_portfolio_items',
                                'value'       => array(
                                    ''    => '',
                                    esc_html__('Yes', 'mkd-core') => 'yes',
                                    esc_html__('No', 'mkd-core')  => 'no'
                                ),
                                'admin_label' => true,
                                'save_always' => true,
                                'dependency'  => array('element' => 'type', 'value' => array('gallery')),
                                'group'       => esc_html__('Layout Options', 'mkd-core')
                            ),
                            array(
                                'type'       => 'dropdown',
                                'heading'    => esc_html__('Portfolio Hover Type', 'mkd-core'),
                                'param_name' => 'portfolio_hover_type',
                                'value'      => array(
                                    esc_html__('Standard', 'mkd-core') => 'standard',
                                    esc_html__('Gradient', 'mkd-core') => 'gradient'
                                ),
                                'dependency' => array(
                                    'element' => 'type',
                                    'value'   => array('gallery')
                                ),
                                'group'      => esc_html__('Layout Options', 'mkd-core')
                            ),
                            array(
                                'type'        => 'dropdown',
                                'heading'     => esc_html__('Show Excerpt?', 'mkd-core'),
                                'param_name'  => 'show_excerpt',
                                'value'       => array(
                                    ''    => '',
                                    esc_html__('Yes', 'mkd-core') => 'yes',
                                    esc_html__('No', 'mkd-core')  => 'no'
                                ),
                                'admin_label' => true,
                                'save_always' => true,
                                'dependency'  => array('element' => 'type', 'value' => array('standard')),
                                'group'       => esc_html__('Layout Options', 'mkd-core')
                            )
                        ),
                        PortfolioLib\PortfolioQuery::getInstance()->queryVCParams()
                    )
                )
            );
        }
    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     *
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            'type'                          => 'standard',
            'columns'                       => 'three',
            'text_align'                    => 'left',
            'grid_size'                     => 'three',
            'image_size'                    => 'full',
            'filter'                        => 'no',
            'filter_order_by'               => 'name',
            'show_load_more'                => 'yes',
            'title_tag'                     => 'h6',
            'portfolio_slider'              => '',
            'portfolios_shown'              => '',
            'space_between_portfolio_items' => '',
            'show_excerpt'                  => 'yes',
            'custom_image_dimensions'       => '',
            'portfolio_hover_type'          => 'standard'
        );

        $portfolioQuery = PortfolioLib\PortfolioQuery::getInstance();

        $args   = array_merge($args, $portfolioQuery->getShortcodeAtts());
        $params = shortcode_atts($args, $atts);

        extract($params);

        $queryResults            = $portfolioQuery->buildQueryObject($params);
        $params['query_results'] = $queryResults;

        $classes  = $this->getPortfolioClasses($params);
        $dataAtts = $this->getDataAtts($params);
        $dataAtts .= ' data-max-num-pages = '.$queryResults->max_num_pages;

        $html = '';

        $html .= '<div class = "mkd-portfolio-list-holder-outer '.$classes.'" '.$dataAtts.'>';

        if($filter == 'yes' && ($type == 'standard' || $type == 'gallery')) {
            $params['filter_categories'] = $this->getFilterCategories($params);
            $html .= mkd_core_get_shortcode_module_template_part('portfolio-list/templates/portfolio-filter', 'portfolio', '', $params);
        }

        $html .= '<div class = "mkd-portfolio-list-holder ' .$portfolio_hover_type. ' clearfix" >';

        $params['thumb_size']            = $this->getImageSize($params);
        $params['use_custom_image_size'] = false;
        if($params['thumb_size'] === 'custom' && !empty($params['custom_image_dimensions'])) {
            $params['use_custom_image_size'] = true;
            $params['custom_image_sizes']    = $this->getCustomImageSize($params['custom_image_dimensions']);
        }

        if($queryResults->have_posts()) {
            while($queryResults->have_posts()) {
                $queryResults->the_post();

                $params['current_id'] = get_the_ID();

                $params['icon_html']     = $this->getPortfolioIconsHtml($params);
                $params['category_html'] = $this->getItemCategoriesHtml($params);
                $params['categories']    = $this->getItemCategories($params);
                $params['item_link']     = $this->getItemLink($params);
                $params['bottom_link']   = $this->getBottomLink($params);

                $html .= mkd_core_get_shortcode_module_template_part('portfolio-list/templates/'.$type, 'portfolio', '', $params);
            }

            if($type == 'standard' || ($params['space_between_portfolio_items'] == 'yes' && $type == 'gallery')) {
                switch($columns) {
                    case 'two':
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        break;
                    case 'three':
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        break;
                    case 'four':
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        break;
                    case 'five':
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        break;
                    case 'six':
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        $html .= '<div class="mkd-ptf-gap"></div>';
                        break;
                    default:
                        break;
                }
            }
        } else {
            $html .= '<p>'.esc_html__('Sorry, no posts matched your criteria.').'</p>';
        }

        $html .= '</div>'; //close mkd-portfolio-list-holder

        if($show_load_more == 'yes') {
            $html .= mkd_core_get_shortcode_module_template_part('portfolio-list/templates/load-more-template', 'portfolio', '', $params);
        }

        wp_reset_postdata();

        $html .= '</div>'; // close mkd-portfolio-list-holder-outer
        return $html;
    }

    /**
     * Generates portfolio icons html
     *
     * @param $params
     *
     * @return html
     */
    public function getPortfolioIconsHtml($params) {

        $html       = '';
        $id         = $params['current_id'];
        $slug_list_ = 'pretty_photo_gallery';

        $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full'); //original size
        $large_image          = $featured_image_array[0];

        $html .= '<div class="mkd-item-icons-holder">';

        $html .= '<a class="mkd-portfolio-lightbox" title="'.get_the_title($id).'" href="'.$large_image.'" data-rel="prettyPhoto['.$slug_list_.']"></a>';


        if(function_exists('medigroup_mikado_like_portfolio_list')) {
            $html .= medigroup_mikado_like_portfolio_list($id);
        }

        $html .= '<a class="mkd-preview" title="Go to Project" href="'.$this->getItemLink($params).'" data-type="portfolio_list"></a>';

        $html .= '</div>';

        return $html;

    }

    /**
     * Generates portfolio classes
     *
     * @param $params
     *
     * @return string
     */
    public function getPortfolioClasses($params) {
        $classes   = array();
        $type      = $params['type'];
        $columns   = $params['columns'];
        $grid_size = $params['grid_size'];
        switch($type):
            case 'standard':
                $classes[] = 'mkd-ptf-standard';
                $classes[] = 'mkd-ptf-with-spaces';
                break;
            case 'gallery':
                $classes[] = 'mkd-ptf-gallery';

                if($params['space_between_portfolio_items'] == 'yes') {
                    $classes[] = 'mkd-ptf-with-spaces';
                }

                $classes[] = 'mkd-portfolio-gallery-hover';

                break;
        endswitch;

        if(empty($params['portfolio_slider'])) { // portfolio slider mustn't have this classes

            if($type == 'standard' || $type == 'gallery') {
                switch($columns):
                    case 'one':
                        $classes[] = 'mkd-ptf-one-column';
                        break;
                    case 'two':
                        $classes[] = 'mkd-ptf-two-columns';
                        break;
                    case 'three':
                        $classes[] = 'mkd-ptf-three-columns';
                        break;
                    case 'four':
                        $classes[] = 'mkd-ptf-four-columns';
                        break;
                    case 'five':
                        $classes[] = 'mkd-ptf-five-columns';
                        break;
                    case 'six':
                        $classes[] = 'mkd-ptf-six-columns';
                        break;
                endswitch;
            }
            if($params['show_load_more'] == 'yes') {
                $classes[] = 'mkd-ptf-load-more';
            }

        }

        if($params['filter'] == 'yes') {
            $classes[] = 'mkd-ptf-has-filter';
        }

        if(!empty($params['portfolio_slider']) && $params['portfolio_slider'] == 'yes') {
            $classes[] = 'mkd-portfolio-slider-holder';
        }

        return implode(' ', $classes);

    }

    /**
     * Generates portfolio image size
     *
     * @param $params
     *
     * @return string
     */
    public function getImageSize($params) {

        $thumb_size = 'full';
        $type       = $params['type'];

        if($type == 'standard' || $type == 'gallery') {
            if(!empty($params['image_size'])) {
                $image_size = $params['image_size'];

                switch($image_size) {
                    case 'landscape':
                        $thumb_size = 'medigroup_mikado_landscape';
                        break;
                    case 'portrait':
                        $thumb_size = 'medigroup_mikado_portrait';
                        break;
                    case 'square':
                        $thumb_size = 'medigroup_mikado_square';
                        break;
                    case 'full':
                        $thumb_size = 'full';
                        break;
                    case 'custom':
                        $thumb_size = 'custom';
                        break;
                    default:
                        $thumb_size = 'full';
                        break;
                }
            }
        }


        return $thumb_size;
    }

    /**
     * Generates portfolio item categories ids.This function is used for filtering
     *
     * @param $params
     *
     * @return array
     */
    public function getItemCategories($params) {
        $id                    = $params['current_id'];
        $category_return_array = array();

        $categories = wp_get_post_terms($id, 'portfolio-category');

        foreach($categories as $cat) {
            $category_return_array[] = 'portfolio_category_'.$cat->term_id;
        }

        return implode(' ', $category_return_array);
    }

    /**
     * Generates portfolio item categories html based on id
     *
     * @param $params
     *
     * @return html
     */
    public function getItemCategoriesHtml($params) {
        $id = $params['current_id'];

        $categories    = wp_get_post_terms($id, 'portfolio-category');
        $category_html = '<div class="mkd-ptf-category-holder">';
        $k             = 1;
        foreach($categories as $cat) {
            $category_html .= '<span>'.$cat->name.'</span>';
            if(count($categories) != $k) {
                $category_html .= ' / ';
            }
            $k++;
        }
        $category_html .= '</div>';

        return $category_html;
    }

    /**
     * Generates filter categories array
     *
     * @param $params
     *
     *
     *
     *
     * * @return array
     */
    public function getFilterCategories($params) {

        $cat_id       = 0;
        $top_category = '';

        if(!empty($params['category'])) {

            $top_category = get_term_by('slug', $params['category'], 'portfolio-category');
            if(isset($top_category->term_id)) {
                $cat_id = $top_category->term_id;
            }

        }

        $args = array(
            'child_of' => $cat_id,
            'order_by' => $params['filter_order_by']
        );

        $filter_categories = get_terms('portfolio-category', $args);

        return $filter_categories;

    }

    /**
     * Generates datta attributes array
     *
     * @param $params
     *
     * @return array
     */
    public function getDataAtts($params) {

        $data_attr          = array();
        $data_return_string = '';

        if(get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif(get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        if(!empty($paged)) {
            $data_attr['data-next-page'] = $paged + 1;
        }

        if(!empty($params['type'])) {
            $data_attr['data-type'] = $params['type'];
        }

        if(!empty($params['columns'])) {
            $data_attr['data-columns'] = $params['columns'];
        }

        if(!empty($params['grid_size'])) {
            $data_attr['data-grid-size'] = $params['grid_size'];
        }

        if(!empty($params['order_by'])) {
            $data_attr['data-order-by'] = $params['order_by'];
        }

        if(!empty($params['order'])) {
            $data_attr['data-order'] = $params['order'];
        }

        if(!empty($params['number'])) {
            $data_attr['data-number'] = $params['number'];
        }

        if(!empty($params['image_size'])) {
            $data_attr['data-image-size'] = $params['image_size'];
        }

        if(!empty($params['custom_image_dimensions'])) {
            $data_attr['data-custom-image-dimensions'] = $params['custom_image_dimensions'];
        }

        if(!empty($params['filter'])) {
            $data_attr['data-filter'] = $params['filter'];
        }

        if(!empty($params['filter_order_by'])) {
            $data_attr['data-filter-order-by'] = $params['filter_order_by'];
        }

        if(!empty($params['category'])) {
            $data_attr['data-category'] = $params['category'];
        }

        if(!empty($params['selected_projectes'])) {
            $data_attr['data-selected-projects'] = $params['selected_projectes'];
        }

        if(!empty($params['show_load_more'])) {
            $data_attr['data-show-load-more'] = $params['show_load_more'];
        }

        if(!empty($params['title_tag'])) {
            $data_attr['data-title-tag'] = $params['title_tag'];
        }

        if(!empty($params['portfolio_slider']) && $params['portfolio_slider'] == 'yes') {
            $data_attr['data-items'] = $params['portfolios_shown'];
        }

        $data_attr['data-show-excerpt'] = empty($params['show_excerpt']) ? 'no' : $params['show_excerpt'];

        foreach($data_attr as $key => $value) {
            if($key !== '') {
                $data_return_string .= $key.'= '.esc_attr($value).' ';
            }
        }

        return $data_return_string;
    }


    /**
     * Checks if portfolio has external link and returns it. Else returns link to portfolio single page
     *
     * @param $params
     *
     * @return false|mixed|string
     */
    public function getItemLink($params) {

        $id             = $params['current_id'];
        $portfolio_link = get_permalink($id);
        if(get_post_meta($id, 'portfolio_external_link', true) !== '') {
            $portfolio_link = get_post_meta($id, 'portfolio_external_link', true);
        }

        return $portfolio_link;

    }


    /**
     * Checks if portfolio has bottom link and returns it. Else returns blank
     *
     * @param $params
     *
     * @return false|mixed|string
     */
    public function getBottomLink($params) {

        $id          = $params['current_id'];
        $bottom_link = '';
        $temp_meta   = get_post_meta($id, 'portfolio_bottom_link', true);
        if($temp_meta !== '') {
            $bottom_link = $temp_meta;
        }

        return $bottom_link;

    }

    private function getCustomImageSize($customImageSize) {
        $imageSize = trim($customImageSize);
        //Find digits
        preg_match_all('/\d+/', $imageSize, $matches);
        if(!empty($matches[0])) {
            return array(
                $matches[0][0],
                $matches[0][1]
            );
        }

        return false;
    }
}