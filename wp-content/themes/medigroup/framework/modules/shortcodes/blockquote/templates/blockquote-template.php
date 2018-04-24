<?php
/**
 * Blockquote shortcode template
 */
?>

<blockquote class="mkd-blockquote-shortcode" <?php medigroup_mikado_inline_style($blockquote_style); ?> >
	<span class="mkd-icon-quotations-holder">
		<span aria-hidden="true" class="icon_quotations"></span>
	</span>
	<h4 class="mkd-blockquote-text">
		<span><?php echo esc_attr($text); ?></span>
	</h4>
</blockquote>