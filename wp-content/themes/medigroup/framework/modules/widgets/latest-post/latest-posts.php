<?php

class MedigroupMikadoLatestPosts extends MedigroupMikadoWidget {
	protected $params;

	public function __construct() {
		parent::__construct(
			'mkd_latest_posts_widget', // Base ID
			esc_html__('Mikado Latest Post', 'medigroup'), // Name
			array('description' => esc_html__('Display posts from your blog', 'medigroup'),) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name'  => 'title',
				'type'  => 'textfield',
				'title' => esc_html__('Title', 'medigroup')
			),
			array(
				'name'    => 'type',
				'type'    => 'dropdown',
				'title'   => esc_html__('Type', 'medigroup'),
				'options' => array(
					'minimal'      => esc_html__('Minimal', 'medigroup'),
					'image-in-box' => esc_html__('Image in box', 'medigroup')
				)
			),
			array(
				'name'  => 'number_of_posts',
				'type'  => 'textfield',
				'title' => esc_html__('Number of posts', 'medigroup')
			),
			array(
				'name'    => 'order_by',
				'type'    => 'dropdown',
				'title'   => esc_html__('Order By', 'medigroup'),
				'options' => array(
					'title' => esc_html__('Title', 'medigroup'),
					'date'  => esc_html__('Date', 'medigroup')
				)
			),
			array(
				'name'    => 'order',
				'type'    => 'dropdown',
				'title'   => esc_html__('Order', 'medigroup'),
				'options' => array(
					'ASC'  => esc_html__('ASC', 'medigroup'),
					'DESC' => esc_html__('DESC', 'medigroup')
				)
			),
			array(
				'name'    => 'image_size',
				'type'    => 'dropdown',
				'title'   => esc_html__('Image Size', 'medigroup'),
				'options' => array(
					'original'  => esc_html__('Original', 'medigroup'),
					'landscape' => esc_html__('Landscape', 'medigroup'),
					'square'    => esc_html__('Square', 'medigroup'),
					'custom'    => esc_html__('Custom', 'medigroup')
				)
			),
			array(
				'name'  => 'custom_image_size',
				'type'  => 'textfield',
				'title' => esc_html__('Custom Image Size', 'medigroup')
			),
			array(
				'name'  => 'category',
				'type'  => 'textfield',
				'title' => esc_html__('Category Slug', 'medigroup')
			),
			array(
				'name'  => 'text_length',
				'type'  => 'textfield',
				'title' => esc_html__('Number of characters', 'medigroup')
			),
			array(
				'name'    => 'title_tag',
				'type'    => 'dropdown',
				'title'   => esc_html__('Title Tag', 'medigroup'),
				'options' => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6"
				)
			)
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content        = '';
		$params         = array();
		$params['type'] = 'image_in_box';

		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params[$key] = $value;
			}
		}
		if(empty($params['title_tag'])) {
			$params['title_tag'] = 'h6';
		}
		echo '<div class="widget mkd-latest-posts-widget">';

		if(!empty($instance['title'])) {
			print $args['before_title'].$instance['title'].$args['after_title'];
		}

		echo medigroup_mikado_execute_shortcode('mkd_blog_list', $params);

		echo '</div>'; //close mkd-latest-posts-widget
	}
}
