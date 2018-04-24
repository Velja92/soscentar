<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php

$medigroup_id = get_option('woocommerce_shop_page_id');
$medigroup_shop = get_post($medigroup_id);
$medigroup_sidebar = medigroup_mikado_sidebar_layout();

if(get_post_meta($medigroup_id, 'mkd_page_background_color', true) != ''){
	$medigroup_background_color = 'background-color: '.esc_attr(get_post_meta($medigroup_id, 'mkd_page_background_color', true));
}else{
    $medigroup_background_color = '';
}

$medigroup_content_style = '';
if(get_post_meta($medigroup_id, 'mkd_content-top-padding', true) != '') {
	if(get_post_meta($medigroup_id, 'mkd_content-top-padding-mobile', true) == 'yes') {
        $medigroup_content_style = 'padding-top:'.esc_attr(get_post_meta($medigroup_id, 'mkd_content-top-padding', true)).'px !important';
	} else {
        $medigroup_content_style = 'padding-top:'.esc_attr(get_post_meta($medigroup_id, 'mkd_content-top-padding', true)).'px';
	}
}

if ( get_query_var('paged') ) {
	$medigroup_paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
    $medigroup_paged = get_query_var('page');
} else {
    $medigroup_paged = 1;
}

get_header();

medigroup_mikado_get_title();
do_action('medigroup_mikado_before_slider_action');
get_template_part('slider');
do_action('medigroup_mikado_after_slider_action');

//Woocommerce content
if ( ! is_singular('product') ) { ?>
	<div class="mkd-container" <?php medigroup_mikado_inline_style($medigroup_background_color); ?>>
		<div class="mkd-container-inner clearfix" <?php medigroup_mikado_inline_style($medigroup_content_style); ?>>
			<?php
			switch( $medigroup_sidebar ) {
				case 'sidebar-33-right': ?>
					<div class="mkd-two-columns-66-33 mkd-content-has-sidebar mkd-woocommerce-with-sidebar clearfix">
						<div class="mkd-column1">
							<div class="mkd-column-inner">
								<?php medigroup_mikado_woocommerce_content(); ?>
							</div>
						</div>
						<div class="mkd-column2">
							<?php get_sidebar();?>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-25-right': ?>
					<div class="mkd-two-columns-75-25 mkd-content-has-sidebar mkd-woocommerce-with-sidebar clearfix">
						<div class="mkd-column1 mkd-content-left-from-sidebar">
							<div class="mkd-column-inner">
								<?php medigroup_mikado_woocommerce_content(); ?>
							</div>
						</div>
						<div class="mkd-column2">
							<?php get_sidebar();?>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-33-left': ?>
					<div class="mkd-two-columns-33-66 mkd-content-has-sidebar mkd-woocommerce-with-sidebar clearfix">
						<div class="mkd-column1">
							<?php get_sidebar();?>
						</div>
						<div class="mkd-column2">
							<div class="mkd-column-inner">
								<?php medigroup_mikado_woocommerce_content(); ?>
							</div>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-25-left': ?>
					<div class="mkd-two-columns-25-75 mkd-content-has-sidebar mkd-woocommerce-with-sidebar clearfix">
						<div class="mkd-column1">
							<?php get_sidebar();?>
						</div>
						<div class="mkd-column2 mkd-content-right-from-sidebar">
							<div class="mkd-column-inner">
								<?php medigroup_mikado_woocommerce_content(); ?>
							</div>
						</div>
					</div>
				<?php
					break;
				default:
					medigroup_mikado_woocommerce_content();
			} ?>		
		</div>
	</div>			
<?php } else { ?>
	<div class="mkd-container" <?php medigroup_mikado_inline_style($medigroup_background_color); ?>>
		<div class="mkd-container-inner clearfix" <?php medigroup_mikado_inline_style($medigroup_content_style); ?>>
			<?php medigroup_mikado_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>