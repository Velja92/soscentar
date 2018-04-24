<?php
$icon_html = medigroup_mikado_icon_collections()->renderIcon($icon, $icon_pack);
?>

<div class="mkd-message-icon-holder">
	<div class="mkd-message-icon" <?php medigroup_mikado_inline_style($icon_attributes); ?>>
		<div class="mkd-message-icon-inner">
			<?php
			print $icon_html;
			?>
		</div>
	</div>
</div>

