<?php
if(!function_exists('medigroup_mikado_design_styles')) {
    /**
     * Generates general custom styles
     */
    function medigroup_mikado_design_styles() {

        $preload_background_styles = array();

        if(medigroup_mikado_options()->getOptionValue('preload_pattern_image') !== "") {
            $preload_background_styles['background-image'] = 'url('.medigroup_mikado_options()->getOptionValue('preload_pattern_image').') !important';
        } else {
            $preload_background_styles['background-image'] = 'url('.esc_url(MIKADO_ASSETS_ROOT."/img/preload_pattern.png").') !important';
        }

        echo medigroup_mikado_dynamic_css('.mkd-preload-background', $preload_background_styles);

        if(medigroup_mikado_options()->getOptionValue('google_fonts')) {
            $font_family = medigroup_mikado_options()->getOptionValue('google_fonts');
            if(medigroup_mikado_is_font_option_valid($font_family)) {
                echo medigroup_mikado_dynamic_css('body', array('font-family' => medigroup_mikado_get_font_option_val($font_family)));
            }
        }

        if(medigroup_mikado_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
                'a',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a',
                '.select2-results .select2-highlighted',
                '.mkd-comment-holder .mkd-comment-reply-holder a.comment-edit-link:before',
                '.mkd-comment-holder .mkd-comment-reply-holder a.comment-reply-link:before',
                '.mkd-pagination li.active span',
                '.mkd-page-not-found h2.title_404',
                '.mkd-like.liked',
                'aside.mkd-sidebar .widget.mkd-latest-posts-widget .mkd-blog-list-holder.mkd-image-in-box h6.mkd-item-title a:hover',
                'aside.mkd-sidebar .widget.widget_categories ul li a:hover',
                'aside.mkd-sidebar .widget.widget_nav_menu .current-menu-item>a',
                'aside.mkd-sidebar .widget.widget_nav_menu ul.menu li a:hover',
                'aside.mkd-sidebar .widget.widget_recent_comments li.recentcomments a:hover',
                'aside.mkd-sidebar .widget.widget_meta ul li a:hover',
                'aside.mkd-sidebar .widget.widget_pages ul li a:hover',
                'aside.mkd-sidebar .widget.widget_recent_entries ul li a:hover',
                'aside.mkd-sidebar .widget.widget_archive ul li a:hover',
                '.mkd-main-menu ul li.mkd-active-item a',
                '.mkd-main-menu ul li:hover a',
                '.mkd-main-menu ul .mkd-menu-featured-icon',
                '.mkd-main-menu>ul>li.mkd-active-item>a',
                'body:not(.mkd-menu-item-first-level-bg-color) .mkd-main-menu>ul>li:hover>a',
                '.mkd-drop-down .second .inner ul li.sub ul li:hover>a',
                '.mkd-drop-down .second .inner>ul>li:hover>a',
                '.mkd-drop-down .menu_icon_wrapper',
                '.mkd-drop-down .wide .second .inner>ul>li>a:hover',
                '.mkd-drop-down .wide .second .inner ul li.sub .flexslider ul li a:hover',
                '.mkd-drop-down .wide .second ul li .flexslider ul li a:hover',
                '.mkd-drop-down .wide .second .inner ul li.sub .flexslider.widget_flexslider .menu_recent_post_text a:hover',
                '.mkd-mobile-header .mkd-mobile-nav a:hover',
                '.mkd-mobile-header .mkd-mobile-nav h4:hover',
                '.mkd-mobile-header .mkd-mobile-menu-opener a:hover',
                '.mkd-page-header .mkd-sticky-header .mkd-main-menu>ul>li:hover>a',
                'body:not(.mkd-menu-item-first-level-bg-color) .mkd-page-header .mkd-sticky-header .mkd-main-menu>ul>li:hover>a',
                '.mkd-page-header .mkd-search-opener:hover',
                'footer .mkd-footer-top-holder .widget.mkd-latest-posts-widget .mkd-blog-list h6.mkd-item-title a:hover',
                'footer .mkd-footer-top-holder .widget ul li a:hover',
                'footer .mkd-footer-top-holder .widget.widget_product_tag_cloud .tagcloud a:hover',
                'footer .mkd-footer-top-holder .widget.widget_tag_cloud .tagcloud a:hover',
                'footer .mkd-footer-top-holder .widget.widget_mkd_twitter_widget .mkd_tweet_text:hover a',
                '.mkd-title .mkd-title-holder h1',
                '.mkd-side-menu-button-opener:hover',
                '.mkd-side-menu .widget.widget_recent_entries ul li:hover a',
                '.mkd-side-menu a.mkd-close-side-menu span',
                'nav.mkd-fullscreen-menu ul li a:hover',
                'nav.mkd-fullscreen-menu ul li ul li a',
                '.mkd-search-cover .mkd-search-close a:hover',
                '.mkd-search-slide-header-bottom .mkd-search-submit:hover',
                '.mkd-portfolio-single-holder .mkd-portfolio-author-holder h6.mkd-author-position',
                '.mkd-portfolio-single-holder .mkd-portfolio-single-nav .mkd-single-nav-content-holder .mkd-single-nav-label-holder:hover',
                '.mkd-doctor-single-holder .mkd-doctor-single-info .mkd-doctor-info-item:hover .mkd-doctor-info-item-left h6',
                '.mkd-team .mkd-team-info .mkd-team-name',
                '.mkd-counter-holder .mkd-counter',
                '.wpb_widgetised_column .widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li a:not(.remove):hover',
                '.wpb_widgetised_column .widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li .remove:hover',
                '.wpb_widgetised_column .widget.woocommerce.widget_layered_nav_filters a:hover',
                '.mkd-countdown .countdown-amount',
                '.mkd-countdown .countdown-period',
                '.mkd-cover-boxes .mkd-cb-content .mkd-cb-doc h4',
                '.mkd-info-list .mkd-info-list-item:hover .mkd-ili-left',
                '.mkd-info-list .mkd-info-list-item .mkd-info-list-item-inner:hover .mkd-ili-title',
                '.mkd-message .mkd-message-inner a.mkd-close i:hover',
                '.mkd-ordered-list ol>li:before',
                '.mkd-icon-list-item .mkd-icon-list-icon-holder',
                '.mkd-blog-slider-holder .mkd-bs-item-bottom-section .mkd-bs-item-author a:hover',
                '.mkd-blog-slider-holder .mkd-bs-item-bottom-section .mkd-bs-item-categories a:hover',
                '.mkd-blog-slider-holder .owl-next:hover',
                '.mkd-blog-slider-holder .owl-prev:hover',
                '.mkd-bmi-calculator-holder .mkd-bmic-legend sup',
                '.mkd-working-hours-holder.mkd-working-hours-light .mkd-wh-title-holder .mkd-wh-title',
                '.mkd-testimonials-holder-inner .testimonials-grid .mkd-testimonial-quote-sign',
                '.mkd-testimonials-holder-inner .testimonials-grid .mkd-testimonials-job',
                '.mkd-testimonial-content.testimonials-slider .mkd-testimonial-quote-sign',
                '.mkd-tabs.mkd-horizontal .mkd-tabs-nav li.ui-tabs-active a',
                '.mkd-tabs.mkd-vertical .mkd-tabs-nav li.ui-tabs-active a',
                '.mkd-accordion-holder .mkd-title-holder.ui-state-active .mkd-accordion-mark',
                '.mkd-accordion-holder .mkd-title-holder.ui-state-hover .mkd-accordion-mark',
                '.mkd-blog-list-holder .mkd-item-info-section>div>a:hover',
                '.mkd-blog-list-holder.mkd-grid-type-2 .mkd-post-item-author-holder a:hover',
                '.mkd-blog-list-holder.mkd-masonry .mkd-post-item-author-holder a:hover',
                '.mkd-blog-list-holder.mkd-image-in-box h6.mkd-item-title a:hover',
                '.mkd-btn.mkd-btn-outline',
                '.post-password-form input.mkd-btn-outline[type=submit]',
                'input.mkd-btn-outline.wpcf7-form-control.wpcf7-submit',
                '.mkd-btn.mkd-btn-white',
                '.post-password-form input.mkd-btn-white[type=submit]',
                'input.mkd-btn-white.wpcf7-form-control.wpcf7-submit',
                '.mkd-btn.mkd-btn-transparent',
                '.post-password-form input.mkd-btn-transparent[type=submit]',
                'input.mkd-btn-transparent.wpcf7-form-control.wpcf7-submit',
                'blockquote .mkd-icon-quotations-holder',
                '.mkd-video-button-play .mkd-video-button-wrapper',
                '.mkd-dropcaps',
                '.mkd-mini-text-slider .owl-controls .owl-next',
                '.mkd-mini-text-slider .owl-controls .owl-prev',
                '.mkd-comparision-pricing-tables-holder .mkd-cpt-features-holder .mkd-cpt-features-title.mkd-cpt-table-head-holder .mkd-cpt-special-note',
                '.mkd-pl-holder .mkd-pl-item .product-title',
                '.mkd-pl-holder .mkd-pl-item .product-price span',
                '.mkd-icon-progress-bar .mkd-ipb-active',
                '.mkd-booking-form.dark .mkd-bf-form-button .mkd-btn.mkd-btn-small',
                '.mkd-booking-form.dark .mkd-bf-form-button .post-password-form input.mkd-btn-small[type=submit]',
                '.mkd-booking-form.dark .mkd-bf-form-button input.mkd-btn-small.wpcf7-form-control.wpcf7-submit',
                '.post-password-form .mkd-booking-form.dark .mkd-bf-form-button input.mkd-btn-small[type=submit]',
                '.mkd-booking-form.light .mkd-bf-motto h4',
                '.mkd-booking-form.light .mkd-bf-form-response-holder',
                '.mkd-blog-holder article.sticky .mkd-post-title a',
                '.mkd-filter-blog-holder li.mkd-active',
                '.single .mkd-author-description .mkd-author-description-text-holder .mkd-author-position',
                '.single .mkd-single-tags-holder .mkd-single-tags-title',
                '.single .mkd-single-tags-holder .mkd-tags a:hover',
                'article .mkd-category span.icon_tags',
                '.woocommerce-page .mkd-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
                'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
                '.woocommerce-page .mkd-content .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
                'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
                '.woocommerce-pagination .page-numbers li a.current',
                '.woocommerce-pagination .page-numbers li a:hover',
                '.woocommerce-pagination .page-numbers li span.current',
                '.woocommerce-pagination .page-numbers li span:hover',
                '.woocommerce-page .mkd-content .mkd-quantity-buttons .mkd-quantity-minus:hover',
                '.woocommerce-page .mkd-content .mkd-quantity-buttons .mkd-quantity-plus:hover',
                'div.woocommerce .mkd-quantity-buttons .mkd-quantity-minus:hover',
                'div.woocommerce .mkd-quantity-buttons .mkd-quantity-plus:hover',
                '.select2-drop .select2-results .select2-highlighted',
                '.mkd-woo-single-page .woocommerce-tabs ul.tabs>li.active a',
                '.mkd-woo-single-page .woocommerce-tabs ul.tabs>li:hover a',
                '.mkd-single-product-summary .price',
                'ul.products>.product .mkd-pl-text-wrapper .price>*',
                '.mkd-woocommerce-page.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a',
                '.mkd-woocommerce-page.woocommerce-account .woocommerce table.shop_table td.order-number a:hover',
                '.mkd-sidebar .widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li a:not(.remove):hover',
                '.mkd-sidebar .widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li .remove:hover',
                '.mkd-sidebar .widget.woocommerce.widget_layered_nav_filters a:hover',
                '.mkd-shopping-cart-dropdown ul li .remove',
                '.mkd-shopping-cart-dropdown ul li .remove:hover',
                '.mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-view-cart:hover',
                'blockquote .mkd-blockquote-text'
            );

            $color_important_selector = array(
                '.mkd-btn.mkd-btn-hover-white:not(.mkd-btn-custom-hover-color):hover',
                '.post-password-form input.mkd-btn-hover-white[type=submit]:not(.mkd-btn-custom-hover-color):hover',
                'input.mkd-btn-hover-white.wpcf7-form-control.wpcf7-submit:not(.mkd-btn-custom-hover-color):hover',
                '.mkd-twitter-slider.mkd-nav-dark .slick-slider .slick-dots li.slick-active button:before',
            );

            $background_color_selector = array(
                '.mkd-heartbeat-spinner:after',
                '.mkd-heartbeat-spinner:before',
                '.mkd-st-loader .pulse',
                '.mkd-st-loader .double_pulse .double-bounce1',
                '.mkd-st-loader .double_pulse .double-bounce2',
                '.mkd-st-loader .cube',
                '.mkd-st-loader .rotating_cubes .cube1',
                '.mkd-st-loader .rotating_cubes .cube2',
                '.mkd-st-loader .stripes>div',
                '.mkd-st-loader .wave>div',
                '.mkd-st-loader .two_rotating_circles .dot1',
                '.mkd-st-loader .two_rotating_circles .dot2',
                '.mkd-st-loader .five_rotating_circles .container1>div',
                '.mkd-st-loader .five_rotating_circles .container2>div',
                '.mkd-st-loader .five_rotating_circles .container3>div',
                '.mkd-st-loader .atom .ball-1:before',
                '.mkd-st-loader .atom .ball-2:before',
                '.mkd-st-loader .atom .ball-3:before',
                '.mkd-st-loader .atom .ball-4:before',
                '.mkd-st-loader .clock .ball:before',
                '.mkd-st-loader .mitosis .ball',
                '.mkd-st-loader .lines .line1',
                '.mkd-st-loader .lines .line2',
                '.mkd-st-loader .lines .line3',
                '.mkd-st-loader .lines .line4',
                '.mkd-st-loader .fussion .ball',
                '.mkd-st-loader .fussion .ball-1',
                '.mkd-st-loader .fussion .ball-2',
                '.mkd-st-loader .fussion .ball-3',
                '.mkd-st-loader .fussion .ball-4',
                '.mkd-st-loader .wave_circles .ball',
                '.mkd-st-loader .pulse_circles .ball',
                '.mkd-carousel-pagination .owl-page.active span',
                '.mkd-drop-down .narrow .second li:not(.mkd-menu-item-with-icon)>a:before',
                '.mkd-header-vertical .mkd-vertical-dropdown-float .menu-item .second .inner ul li a:before',
                '.mkd-header-vertical .mkd-vertical-menu>ul>li>a:before',
                '.mkd-header-vertical .mkd-vertical-menu>ul>li>a:after',
                '.mkd-side-menu .widget .searchform input[type=submit]',
                '.mkd-side-menu-slide-from-right .mkd-side-menu .widget .searchform input[type=submit]',
                '.mkd-fullscreen-menu-opener:hover .mkd-line',
                '.mkd-fullscreen-menu-opener.opened:hover .mkd-line:after',
                '.mkd-fullscreen-menu-opener.opened:hover .mkd-line:before',
                '.mkd-team .mkd-team-social-holder:before',
                '.wpb_widgetised_column .widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
                '.wpb_widgetised_column .widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range',
                '.mkd-icon-shortcode.circle',
                '.mkd-icon-shortcode.square',
                '.mkd-progress-bar .mkd-progress-content-outer .mkd-progress-content',
                '.mkd-blog-slider-holder .mkd-bs-item-date',
                '.mkd-working-hours-holder',
                '.mkd-price-table .mkd-price-table-inner .mkd-pt-label-holder .mkd-pt-label-inner',
                '.mkd-price-table.mkd-pt-active .mkd-price-table-inner',
                '.mkd-pie-chart-doughnut-holder .mkd-pie-legend ul li .mkd-pie-color-holder',
                '.mkd-pie-chart-pie-holder .mkd-pie-legend ul li .mkd-pie-color-holder',
                '.mkd-accordion-holder.mkd-boxed .mkd-title-holder.ui-state-active',
                '.mkd-accordion-holder.mkd-boxed .mkd-title-holder.ui-state-hover',
                '.mkd-blog-list-holder.mkd-grid-type-2 .mkd-item-date',
                '.mkd-blog-list-holder.mkd-masonry .mkd-item-date',
                '.mkd-btn.mkd-btn-solid',
                '.post-password-form input[type=submit]',
                'input.wpcf7-form-control.wpcf7-submit',
                '.mkd-btn.mkd-btn-hover-solid .mkd-btn-helper',
                '.post-password-form input.mkd-btn-hover-solid[type=submit] .mkd-btn-helper',
                'input.mkd-btn-hover-solid.wpcf7-form-control.wpcf7-submit .mkd-btn-helper',
                '.mkd-dropcaps.mkd-circle',
                '.mkd-dropcaps.mkd-square',
                '.mkd-comparision-pricing-tables-holder .mkd-cpt-table .mkd-cpt-table-btn a',
                '.mkd-comparision-pricing-tables-holder .mkd-cpt-table.mkd-cpt-featured .mkd-cpt-table-border-top',
                '.mkd-booking-form',
                '.widget_mkd_booking_form_widget',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-100',
                '.widget_mkd_call_to_action_button .mkd-call-to-action-button',
                '.mkd-blog-holder.mkd-blog-type-masonry .format-quote .mkd-post-content',
                '.mkd-blog-holder.mkd-blog-type-masonry .format-link .mkd-post-content',
                '.mkd-blog-holder article .mkd-post-info .mkd-post-info-date',
                '.mkd-blog-holder.mkd-blog-single.mkd-blog-standard article.format-quote .mkd-post-content .mkd-post-text',
                '.single .mkd-single-tags-holder .mkd-tags a',
                '.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.woocommerce-page .mkd-content a.added_to_cart',
                '.woocommerce-page .mkd-content a.button',
                '.woocommerce-page .mkd-content button[type=submit]',
                '.woocommerce-page .mkd-content input[type=submit]',
                'div.woocommerce a.added_to_cart',
                'div.woocommerce a.button',
                'div.woocommerce button[type=submit]',
                'div.woocommerce input[type=submit]',
                '.woocommerce-page .mkd-content a.added_to_cart:hover',
                '.woocommerce-page .mkd-content a.button:hover',
                '.woocommerce-page .mkd-content button[type=submit]:hover',
                '.woocommerce-page .mkd-content input[type=submit]:hover',
                'div.woocommerce a.added_to_cart:hover',
                'div.woocommerce a.button:hover',
                'div.woocommerce button[type=submit]:hover',
                'div.woocommerce input[type=submit]:hover',
                '.woocommerce .mkd-on-sale',
                'ul.products>.product .mkd-pl-inner .mkd-pl-text>a',
                'ul.products>.product .mkd-pl-inner .mkd-pl-text .added_to_cart',
                '.mkd-sidebar .widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
                '.mkd-sidebar .widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range',
                '.mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-view-cart',
                '.mkd-portfolio-list-holder-outer.mkd-portfolio-gallery-hover article .mkd-ptf-item-text-overlay',
                '.mkd-landing-gallery .mkd-landing-gallery-hover',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-95',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-90',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-85',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-80',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-75',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-70',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-65',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-60',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-55',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-50',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-45',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-40',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-35',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-30',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-25',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-o0-20',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-15',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-10',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-5',
                '.widget_mkd_booking_form_widget .mkd-booking-form.mkd-bf-layout-horizontal .mkd-booking-form-inner.mkd-bf-bgnd-op-0'
            );

            $background_color_important_selector = array(
                '.mkd-btn.mkd-btn-hover-solid:not(.mkd-btn-custom-hover-bg):not(.mkd-btn-with-animation):hover',
                '.post-password-form input.mkd-btn-hover-solid[type=submit]:not(.mkd-btn-custom-hover-bg):not(.mkd-btn-with-animation):hover',
                'input.mkd-btn-hover-solid.wpcf7-form-control.wpcf7-submit:not(.mkd-btn-custom-hover-bg):not(.mkd-btn-with-animation):hover',
                'ul.products>.product .mkd-pl-inner .mkd-pl-text .add_to_cart_button:hover'
            );

            $border_color_selector = array(
                '.mkd-st-loader .pulse_circles .ball',
                '.wpcf7-form-control.wpcf7-date:focus',
                '.wpcf7-form-control.wpcf7-number:focus',
                '.wpcf7-form-control.wpcf7-quiz:focus',
                '.wpcf7-form-control.wpcf7-select:focus',
                '.wpcf7-form-control.wpcf7-text:focus',
                '.wpcf7-form-control.wpcf7-textarea:focus',
                '#respond input[type=text]:focus',
                '#respond input[type=email]:focus',
                '#respond textarea:focus',
                '.post-password-form input[type=password]:focus',
                '.mkd-bmi-calculator-holder input[type=text]:focus',
                '.mkd-bmi-calculator-holder select:focus',
                '.mkd-bmi-calculator-holder textarea:focus',
                '.mkd-bmi-calculator-holder .select2-container.select2-container-active .select2-choice',
                '.mkd-accordion-holder.mkd-boxed .mkd-title-holder.ui-state-active',
                '.mkd-accordion-holder.mkd-boxed .mkd-title-holder.ui-state-hover',
                '.mkd-btn.mkd-btn-solid',
                '.post-password-form input[type=submit]',
                'input.wpcf7-form-control.wpcf7-submit',
                '.mkd-btn.mkd-btn-outline',
                '.post-password-form input.mkd-btn-outline[type=submit]',
                'input.mkd-btn-outline.wpcf7-form-control.wpcf7-submit',
                '.single .mkd-single-tags-holder .mkd-tags a',
                '.woocommerce-page .mkd-content input[type=password]:focus',
                '.woocommerce-page .mkd-content input[type=text]:focus',
                '.woocommerce-page .mkd-content input[type=email]:focus',
                '.woocommerce-page .mkd-content input[type=tel]:focus',
                '.woocommerce-page .mkd-content textarea:focus',
                'div.woocommerce input[type=password]:focus',
                'div.woocommerce input[type=text]:focus',
                'div.woocommerce input[type=email]:focus',
                'div.woocommerce input[type=tel]:focus',
                'div.woocommerce textarea:focus',
                '.mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-view-cart'
            );

            $border_color_important_selector = array(
                '.mkd-btn.mkd-btn-hover-solid:not(.mkd-btn-custom-border-hover):hover',
                '.post-password-form input.mkd-btn-hover-solid[type=submit]:not(.mkd-btn-custom-border-hover):hover',
                'input.mkd-btn-hover-solid.wpcf7-form-control.wpcf7-submit:not(.mkd-btn-custom-border-hover):hover'
            );

            $border_top_color_selector = array(
                '.mkd-progress-bar .mkd-progress-number-wrapper.mkd-floating .mkd-down-arrow'
            );

            $border_bottom_color_selector = array(
                '.mkd-btn.mkd-btn-underline-on-hover .mkd-btn-text:after', 
                '.post-password-form input.mkd-btn-underline-on-hover[type=submit] .mkd-btn-text:after', 
                'input.mkd-btn-underline-on-hover.wpcf7-form-control.wpcf7-submit .mkd-btn-text:after'
            );

            echo medigroup_mikado_dynamic_css($color_selector, array('color' => medigroup_mikado_options()->getOptionValue('first_color')));
            echo medigroup_mikado_dynamic_css($color_important_selector, array('color' => medigroup_mikado_options()->getOptionValue('first_color').'!important'));
            echo medigroup_mikado_dynamic_css('::selection', array('background' => medigroup_mikado_options()->getOptionValue('first_color')));
            echo medigroup_mikado_dynamic_css('::-moz-selection', array('background' => medigroup_mikado_options()->getOptionValue('first_color')));
            echo medigroup_mikado_dynamic_css($background_color_selector, array('background-color' => medigroup_mikado_options()->getOptionValue('first_color')));
            echo medigroup_mikado_dynamic_css($background_color_important_selector, array('background-color' => medigroup_mikado_options()->getOptionValue('first_color').'!important'));
            echo medigroup_mikado_dynamic_css($border_color_selector, array('border-color' => medigroup_mikado_options()->getOptionValue('first_color')));
            echo medigroup_mikado_dynamic_css($border_color_important_selector, array('border-color' => medigroup_mikado_options()->getOptionValue('first_color').'!important'));
            echo medigroup_mikado_dynamic_css($border_top_color_selector, array('border-top-color' => medigroup_mikado_options()->getOptionValue('first_color')));
            echo medigroup_mikado_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => medigroup_mikado_options()->getOptionValue('first_color')));
        }

        if(medigroup_mikado_options()->getOptionValue('page_background_color')) {
            $background_color_selector = array(
                '.mkd-content .mkd-content-inner > .mkd-container',
                '.mkd-content .mkd-content-inner > .mkd-full-width'
            );
            echo medigroup_mikado_dynamic_css($background_color_selector, array('background-color' => medigroup_mikado_options()->getOptionValue('page_background_color')));
        }

        if(medigroup_mikado_options()->getOptionValue('selection_color')) {
            echo medigroup_mikado_dynamic_css('::selection', array('background' => medigroup_mikado_options()->getOptionValue('selection_color')));
            echo medigroup_mikado_dynamic_css('::-moz-selection', array('background' => medigroup_mikado_options()->getOptionValue('selection_color')));
        }

        $boxed_background_style = array();
        if(medigroup_mikado_options()->getOptionValue('page_background_color_in_box')) {
            $boxed_background_style['background-color'] = medigroup_mikado_options()->getOptionValue('page_background_color_in_box');
        }

        if(medigroup_mikado_options()->getOptionValue('boxed_background_image')) {
            $boxed_background_style['background-image']    = 'url('.esc_url(medigroup_mikado_options()->getOptionValue('boxed_background_image')).')';
            $boxed_background_style['background-position'] = 'center 0px';
            $boxed_background_style['background-repeat']   = 'no-repeat';
        }

        if(medigroup_mikado_options()->getOptionValue('boxed_pattern_background_image')) {
            $boxed_background_style['background-image']    = 'url('.esc_url(medigroup_mikado_options()->getOptionValue('boxed_pattern_background_image')).')';
            $boxed_background_style['background-position'] = '0px 0px';
            $boxed_background_style['background-repeat']   = 'repeat';
        }

        if(medigroup_mikado_options()->getOptionValue('boxed_background_image_attachment')) {
            $boxed_background_style['background-attachment'] = (medigroup_mikado_options()->getOptionValue('boxed_background_image_attachment'));
        }

        echo medigroup_mikado_dynamic_css('.mkd-boxed .mkd-wrapper', $boxed_background_style);
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_design_styles');
}

if(!function_exists('medigroup_mikado_h1_styles')) {

    function medigroup_mikado_h1_styles() {

        $h1_styles = array();

        if(medigroup_mikado_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = medigroup_mikado_options()->getOptionValue('h1_color');
        }
        if(medigroup_mikado_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = medigroup_mikado_get_formatted_font_family(medigroup_mikado_options()->getOptionValue('h1_google_fonts'));
        }
        if(medigroup_mikado_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h1_fontsize')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h1_lineheight')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = medigroup_mikado_options()->getOptionValue('h1_texttransform');
        }
        if(medigroup_mikado_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = medigroup_mikado_options()->getOptionValue('h1_fontstyle');
        }
        if(medigroup_mikado_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('h1_fontweight');
        }
        if(medigroup_mikado_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if(!empty($h1_styles)) {
            echo medigroup_mikado_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_h1_styles');
}

if(!function_exists('medigroup_mikado_h2_styles')) {

    function medigroup_mikado_h2_styles() {

        $h2_styles = array();

        if(medigroup_mikado_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = medigroup_mikado_options()->getOptionValue('h2_color');
        }
        if(medigroup_mikado_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = medigroup_mikado_get_formatted_font_family(medigroup_mikado_options()->getOptionValue('h2_google_fonts'));
        }
        if(medigroup_mikado_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h2_fontsize')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h2_lineheight')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = medigroup_mikado_options()->getOptionValue('h2_texttransform');
        }
        if(medigroup_mikado_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = medigroup_mikado_options()->getOptionValue('h2_fontstyle');
        }
        if(medigroup_mikado_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('h2_fontweight');
        }
        if(medigroup_mikado_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if(!empty($h2_styles)) {
            echo medigroup_mikado_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_h2_styles');
}

if(!function_exists('medigroup_mikado_h3_styles')) {

    function medigroup_mikado_h3_styles() {

        $h3_styles = array();

        if(medigroup_mikado_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = medigroup_mikado_options()->getOptionValue('h3_color');
        }
        if(medigroup_mikado_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = medigroup_mikado_get_formatted_font_family(medigroup_mikado_options()->getOptionValue('h3_google_fonts'));
        }
        if(medigroup_mikado_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h3_fontsize')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h3_lineheight')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = medigroup_mikado_options()->getOptionValue('h3_texttransform');
        }
        if(medigroup_mikado_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = medigroup_mikado_options()->getOptionValue('h3_fontstyle');
        }
        if(medigroup_mikado_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('h3_fontweight');
        }
        if(medigroup_mikado_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if(!empty($h3_styles)) {
            echo medigroup_mikado_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_h3_styles');
}

if(!function_exists('medigroup_mikado_h4_styles')) {

    function medigroup_mikado_h4_styles() {

        $h4_styles = array();

        if(medigroup_mikado_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = medigroup_mikado_options()->getOptionValue('h4_color');
        }
        if(medigroup_mikado_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = medigroup_mikado_get_formatted_font_family(medigroup_mikado_options()->getOptionValue('h4_google_fonts'));
        }
        if(medigroup_mikado_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h4_fontsize')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h4_lineheight')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = medigroup_mikado_options()->getOptionValue('h4_texttransform');
        }
        if(medigroup_mikado_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = medigroup_mikado_options()->getOptionValue('h4_fontstyle');
        }
        if(medigroup_mikado_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('h4_fontweight');
        }
        if(medigroup_mikado_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if(!empty($h4_styles)) {
            echo medigroup_mikado_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_h4_styles');
}

if(!function_exists('medigroup_mikado_h5_styles')) {

    function medigroup_mikado_h5_styles() {

        $h5_styles = array();

        if(medigroup_mikado_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = medigroup_mikado_options()->getOptionValue('h5_color');
        }
        if(medigroup_mikado_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = medigroup_mikado_get_formatted_font_family(medigroup_mikado_options()->getOptionValue('h5_google_fonts'));
        }
        if(medigroup_mikado_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h5_fontsize')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h5_lineheight')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = medigroup_mikado_options()->getOptionValue('h5_texttransform');
        }
        if(medigroup_mikado_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = medigroup_mikado_options()->getOptionValue('h5_fontstyle');
        }
        if(medigroup_mikado_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('h5_fontweight');
        }
        if(medigroup_mikado_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5'
        );

        if(!empty($h5_styles)) {
            echo medigroup_mikado_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_h5_styles');
}

if(!function_exists('medigroup_mikado_h6_styles')) {

    function medigroup_mikado_h6_styles() {

        $h6_styles = array();

        if(medigroup_mikado_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = medigroup_mikado_options()->getOptionValue('h6_color');
        }
        if(medigroup_mikado_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = medigroup_mikado_get_formatted_font_family(medigroup_mikado_options()->getOptionValue('h6_google_fonts'));
        }
        if(medigroup_mikado_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h6_fontsize')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h6_lineheight')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = medigroup_mikado_options()->getOptionValue('h6_texttransform');
        }
        if(medigroup_mikado_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = medigroup_mikado_options()->getOptionValue('h6_fontstyle');
        }
        if(medigroup_mikado_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('h6_fontweight');
        }
        if(medigroup_mikado_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if(!empty($h6_styles)) {
            echo medigroup_mikado_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_h6_styles');
}

if(!function_exists('medigroup_mikado_text_styles')) {

    function medigroup_mikado_text_styles() {

        $text_styles = array();

        if(medigroup_mikado_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = medigroup_mikado_options()->getOptionValue('text_color');
        }
        if(medigroup_mikado_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = medigroup_mikado_get_formatted_font_family(medigroup_mikado_options()->getOptionValue('text_google_fonts'));
        }
        if(medigroup_mikado_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('text_fontsize')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('text_lineheight')).'px';
        }
        if(medigroup_mikado_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = medigroup_mikado_options()->getOptionValue('text_texttransform');
        }
        if(medigroup_mikado_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = medigroup_mikado_options()->getOptionValue('text_fontstyle');
        }
        if(medigroup_mikado_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('text_fontweight');
        }
        if(medigroup_mikado_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = medigroup_mikado_filter_px(medigroup_mikado_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if(!empty($text_styles)) {
            echo medigroup_mikado_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_text_styles');
}

if(!function_exists('medigroup_mikado_link_styles')) {

    function medigroup_mikado_link_styles() {

        $link_styles = array();

        if(medigroup_mikado_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = medigroup_mikado_options()->getOptionValue('link_color');
        }
        if(medigroup_mikado_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = medigroup_mikado_options()->getOptionValue('link_fontstyle');
        }
        if(medigroup_mikado_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = medigroup_mikado_options()->getOptionValue('link_fontweight');
        }
        if(medigroup_mikado_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = medigroup_mikado_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if(!empty($link_styles)) {
            echo medigroup_mikado_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_link_styles');
}

if(!function_exists('medigroup_mikado_link_hover_styles')) {

    function medigroup_mikado_link_hover_styles() {

        $link_hover_styles = array();

        if(medigroup_mikado_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = medigroup_mikado_options()->getOptionValue('link_hovercolor');
        }
        if(medigroup_mikado_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = medigroup_mikado_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if(!empty($link_hover_styles)) {
            echo medigroup_mikado_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(medigroup_mikado_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = medigroup_mikado_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if(!empty($link_heading_hover_styles)) {
            echo medigroup_mikado_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_link_hover_styles');
}

if(!function_exists('medigroup_mikado_smooth_page_transition_styles')) {

    function medigroup_mikado_smooth_page_transition_styles() {

        $loader_style = array();

        if(medigroup_mikado_options()->getOptionValue('smooth_pt_bgnd_color') !== '') {
            $loader_style['background-color'] = medigroup_mikado_options()->getOptionValue('smooth_pt_bgnd_color');
        }

        $loader_selector = array('.mkd-smooth-transition-loader');

        if(!empty($loader_style)) {
            echo medigroup_mikado_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(medigroup_mikado_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
            $spinner_style['background-color'] = medigroup_mikado_options()->getOptionValue('smooth_pt_spinner_color');
        }

        $spinner_selectors = array(
            '.mkd-heartbeat-spinner:before',
            '.mkd-heartbeat-spinner:after',
            '.mkd-st-loader .pulse',
            '.mkd-st-loader .double_pulse .double-bounce1',
            '.mkd-st-loader .double_pulse .double-bounce2',
            '.mkd-st-loader .cube',
            '.mkd-st-loader .rotating_cubes .cube1',
            '.mkd-st-loader .rotating_cubes .cube2',
            '.mkd-st-loader .stripes > div',
            '.mkd-st-loader .wave > div',
            '.mkd-st-loader .two_rotating_circles .dot1',
            '.mkd-st-loader .two_rotating_circles .dot2',
            '.mkd-st-loader .five_rotating_circles .container1 > div',
            '.mkd-st-loader .five_rotating_circles .container2 > div',
            '.mkd-st-loader .five_rotating_circles .container3 > div',
            '.mkd-st-loader .atom .ball-1:before',
            '.mkd-st-loader .atom .ball-2:before',
            '.mkd-st-loader .atom .ball-3:before',
            '.mkd-st-loader .atom .ball-4:before',
            '.mkd-st-loader .clock .ball:before',
            '.mkd-st-loader .mitosis .ball',
            '.mkd-st-loader .lines .line1',
            '.mkd-st-loader .lines .line2',
            '.mkd-st-loader .lines .line3',
            '.mkd-st-loader .lines .line4',
            '.mkd-st-loader .fussion .ball',
            '.mkd-st-loader .fussion .ball-1',
            '.mkd-st-loader .fussion .ball-2',
            '.mkd-st-loader .fussion .ball-3',
            '.mkd-st-loader .fussion .ball-4',
            '.mkd-st-loader .wave_circles .ball',
            '.mkd-st-loader .pulse_circles .ball'
        );

        if(!empty($spinner_style)) {
            echo medigroup_mikado_dynamic_css($spinner_selectors, $spinner_style);
        }
    }

    add_action('medigroup_mikado_style_dynamic', 'medigroup_mikado_smooth_page_transition_styles');
}