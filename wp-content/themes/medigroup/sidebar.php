<?php
$medigroup_sidebar = medigroup_mikado_get_sidebar();
?>
<div class="mkd-column-inner">
	<aside class="mkd-sidebar">
		<?php
		if(is_active_sidebar($medigroup_sidebar)) {
			dynamic_sidebar($medigroup_sidebar);
		}
		?>
	</aside>
</div>
