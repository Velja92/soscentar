<?php
$tab_data_str = '';
$icon_html    = '';
$tab_data_str .= 'data-icon-pack="'.$icon_pack.'" ';
$icon_html .= medigroup_mikado_icon_collections()->renderIcon($icon, $icon_pack, array());
$tab_data_str .= 'data-icon-html="'.esc_attr($icon_html).'" ';

$image_url = '';
if ($custom_icon != '') {
	$image_src = wp_get_attachment_image_src($custom_icon, 'full', true);
	$image_url = $image_src[0];
}
$tab_data_str .= 'data-custom-icon-url="'.esc_attr($image_url).'" ';
?>
<li class="mkd-tab-slider-item" <?php print $tab_data_str; ?>>
    <div class="mkd-tab-slide-holder">
        <?php echo medigroup_mikado_get_shortcode_module_template_part('templates/slide-image', 'tab-slider', '', array('slide_image' => $slide_image)); ?>
        <?php echo medigroup_mikado_get_shortcode_module_template_part('templates/slide-content', 'tab-slider', '', array('content' => $content)); ?>
    </div>
</li>