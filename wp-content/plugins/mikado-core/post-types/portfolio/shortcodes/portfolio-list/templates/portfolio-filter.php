<div class="mkd-portfolio-filter-holder">
	<div class="mkd-portfolio-filter-holder-inner">
		<?php
		$rand_number = rand();
		if(is_array($filter_categories) && count($filter_categories)) { ?>
			<ul>
				<li data-class="filter_<?php print esc_attr($rand_number); ?>" class="filter_<?php print esc_attr($rand_number); ?>" data-filter="all">
					<span><?php print __('All', 'mkd-core') ?></span>
				</li>
				<?php foreach($filter_categories as $cat) { ?>
					<li data-class="filter_<?php print $rand_number ?>" class="filter_<?php print esc_attr($rand_number); ?>" data-filter=".portfolio_category_<?php print esc_attr($cat->term_id); ?>">
						<span><?php print esc_html($cat->name); ?></span>
					</li>
				<?php } ?>
			</ul>
		<?php } ?>
	</div>
</div>