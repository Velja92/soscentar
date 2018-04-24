<?php

if(!function_exists('medigroup_mikado_social_options_map')) {

	function medigroup_mikado_social_options_map() {

		medigroup_mikado_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__('Social Networks', 'medigroup'),
				'icon'  => 'fa fa-share-alt'
			)
		);

		/**
		 * Enable Social Share
		 */
		$panel_social_share = medigroup_mikado_add_admin_panel(array(
			'page'  => '_social_page',
			'name'  => 'panel_social_share',
			'title' => esc_html__('Enable Social Share', 'medigroup')
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Social Share', 'medigroup'),
			'description'   => esc_html__('Enabling this option will allow social share on networks of your choice', 'medigroup'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_panel_social_networks, #mkd_panel_show_social_share_on'
			),
			'parent'        => $panel_social_share
		));

		$panel_show_social_share_on = medigroup_mikado_add_admin_panel(array(
			'page'            => '_social_page',
			'name'            => 'panel_show_social_share_on',
			'title'           => esc_html__('Show Social Share On', 'medigroup'),
			'hidden_property' => 'enable_social_share',
			'hidden_value'    => 'no'
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_post',
			'default_value' => 'no',
			'label'         => esc_html__('Posts', 'medigroup'),
			'description'   => esc_html__('Show Social Share on Blog Posts', 'medigroup'),
			'parent'        => $panel_show_social_share_on
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_page',
			'default_value' => 'no',
			'label'         => esc_html__('Pages', 'medigroup'),
			'description'   => esc_html__('Show Social Share on Pages', 'medigroup'),
			'parent'        => $panel_show_social_share_on
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_attachment',
			'default_value' => 'no',
			'label'         => esc_html__('Media', 'medigroup'),
			'description'   => esc_html__('Show Social Share for Images and Videos', 'medigroup'),
			'parent'        => $panel_show_social_share_on
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_portfolio-item',
			'default_value' => 'no',
			'label'         => esc_html__('Portfolio Item', 'medigroup'),
			'description'   => esc_html__('Show Social Share for Portfolio Items', 'medigroup'),
			'parent'        => $panel_show_social_share_on
		));

		if(medigroup_mikado_is_woocommerce_installed()) {
			medigroup_mikado_add_admin_field(array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_product',
				'default_value' => 'no',
				'label'         => esc_html__('Product', 'medigroup'),
				'description'   => esc_html__('Show Social Share for Product Items', 'medigroup'),
				'parent'        => $panel_show_social_share_on
			));
		}

		/**
		 * Social Share Networks
		 */
		$panel_social_networks = medigroup_mikado_add_admin_panel(array(
			'page'            => '_social_page',
			'name'            => 'panel_social_networks',
			'title'           => esc_html__('Social Networks', 'medigroup'),
			'hidden_property' => 'enable_social_share',
			'hidden_value'    => 'no'
		));

		/**
		 * Facebook
		 */
		medigroup_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'facebook_title',
			'title'  => esc_html__('Share on Facebook', 'medigroup')
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_facebook_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'medigroup'),
			'description'   => esc_html__('Enabling this option will allow sharing via Facebook', 'medigroup'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_facebook_share_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_facebook_share_container = medigroup_mikado_add_admin_container(array(
			'name'            => 'enable_facebook_share_container',
			'hidden_property' => 'enable_facebook_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'facebook_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'medigroup'),
			'parent'        => $enable_facebook_share_container
		));

		/**
		 * Twitter
		 */
		medigroup_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'twitter_title',
			'title'  => esc_html__('Share on Twitter', 'medigroup')
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_twitter_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'medigroup'),
			'description'   => esc_html__('Enabling this option will allow sharing via Twitter', 'medigroup'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_twitter_share_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_twitter_share_container = medigroup_mikado_add_admin_container(array(
			'name'            => 'enable_twitter_share_container',
			'hidden_property' => 'enable_twitter_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'twitter_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'medigroup'),
			'parent'        => $enable_twitter_share_container
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'text',
			'name'          => 'twitter_via',
			'default_value' => '',
			'label'         => esc_html__('Via', 'medigroup'),
			'parent'        => $enable_twitter_share_container
		));

		/**
		 * Google Plus
		 */
		medigroup_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'google_plus_title',
			'title'  => esc_html__('Share on Google Plus', 'medigroup')
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_google_plus_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'medigroup'),
			'description'   => esc_html__('Enabling this option will allow sharing via Google Plus', 'medigroup'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_google_plus_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_google_plus_container = medigroup_mikado_add_admin_container(array(
			'name'            => 'enable_google_plus_container',
			'hidden_property' => 'enable_google_plus_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'google_plus_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'medigroup'),
			'parent'        => $enable_google_plus_container
		));

		/**
		 * Linked In
		 */
		medigroup_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'linkedin_title',
			'title'  => esc_html__('Share on LinkedIn', 'medigroup')
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_linkedin_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'medigroup'),
			'description'   => esc_html__('Enabling this option will allow sharing via LinkedIn', 'medigroup'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_linkedin_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_linkedin_container = medigroup_mikado_add_admin_container(array(
			'name'            => 'enable_linkedin_container',
			'hidden_property' => 'enable_linkedin_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'linkedin_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'medigroup'),
			'parent'        => $enable_linkedin_container
		));

		/**
		 * Tumblr
		 */
		medigroup_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'tumblr_title',
			'title'  => esc_html__('Share on Tumblr', 'medigroup')
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_tumblr_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'medigroup'),
			'description'   => esc_html__('Enabling this option will allow sharing via Tumblr', 'medigroup'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_tumblr_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_tumblr_container = medigroup_mikado_add_admin_container(array(
			'name'            => 'enable_tumblr_container',
			'hidden_property' => 'enable_tumblr_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'tumblr_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'medigroup'),
			'parent'        => $enable_tumblr_container
		));

		/**
		 * Pinterest
		 */
		medigroup_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'pinterest_title',
			'title'  => esc_html__('Share on Pinterest', 'medigroup')
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_pinterest_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'medigroup'),
			'description'   => esc_html__('Enabling this option will allow sharing via Pinterest', 'medigroup'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_pinterest_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_pinterest_container = medigroup_mikado_add_admin_container(array(
			'name'            => 'enable_pinterest_container',
			'hidden_property' => 'enable_pinterest_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'pinterest_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'medigroup'),
			'parent'        => $enable_pinterest_container
		));

		/**
		 * VK
		 */
		medigroup_mikado_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'vk_title',
			'title'  => esc_html__('Share on VK', 'medigroup')
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_vk_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'medigroup'),
			'description'   => esc_html__('Enabling this option will allow sharing via VK', 'medigroup'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkd_enable_vk_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_vk_container = medigroup_mikado_add_admin_container(array(
			'name'            => 'enable_vk_container',
			'hidden_property' => 'enable_vk_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		medigroup_mikado_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'vk_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'medigroup'),
			'parent'        => $enable_vk_container
		));

		if(defined('MIKADO_TWITTER_FEED_VERSION')) {
			$twitter_panel = medigroup_mikado_add_admin_panel(array(
				'title' => esc_html__('Twitter', 'medigroup'),
				'name'  => 'panel_twitter',
				'page'  => '_social_page'
			));

			medigroup_mikado_add_admin_twitter_button(array(
				'name'   => 'twitter_button',
				'parent' => $twitter_panel
			));
		}

		if(defined('MIKADO_INSTAGRAM_FEED_VERSION')) {
			$instagram_panel = medigroup_mikado_add_admin_panel(array(
				'title' => esc_html__('Instagram', 'medigroup'),
				'name'  => 'panel_instagram',
				'page'  => '_social_page'
			));

			medigroup_mikado_add_admin_instagram_button(array(
				'name'   => 'instagram_button',
				'parent' => $instagram_panel
			));
		}
	}

	add_action('medigroup_mikado_options_map', 'medigroup_mikado_social_options_map', 15);
}