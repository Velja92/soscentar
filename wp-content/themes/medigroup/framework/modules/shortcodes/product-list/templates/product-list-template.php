<div class="mkd-pl-holder <?php echo esc_attr($holder_classes) ?>">
	<div class="mkd-pl-outer clearfix">
		<?php if ($query_result->have_posts()): while ($query_result->have_posts()) :
			$query_result->the_post(); ?>
			<?php
			$product = medigroup_mikado_return_woocommerce_global_variable();
			?>
			<div class="mkd-pl-item">
				<div class="mkd-pl-item-inner">
					<div class="product-thumbnail">
						<?php echo get_the_post_thumbnail(get_the_ID(), 'single_product_large_thumbnail_size'); ?>
					</div>
					<h6 class="product-title"><a href=" <?php echo get_the_permalink();?>"><?php the_title(); ?></a></h6>
					<div class="product-categories">
						<?php print $product->get_categories();?>
					</div>
					<div class="product-price">
						<?php print $product->get_price_html();?>
					</div>
					<div class="add-to-cart-holder">
					<?php
					echo sprintf('<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s" data-title="%s">%s</a>',
						esc_url($product->add_to_cart_url()),
						esc_attr(isset($quantity) ? $quantity : 1),
						esc_attr($product->id),
						esc_attr($product->get_sku()),
						esc_attr('mkd-btn mkd-btn-small mkd-btn-solid mkd-btn-hover-outline'),
						esc_html($product->add_to_cart_text()),
						esc_html($product->add_to_cart_text())
					);
					?>
					</div>
				</div>
			</div>
		<?php endwhile;
		else: ?>
			<div class="mkd-pl-messsage">
				<p><?php esc_html_e('No posts were found.', 'medigroup'); ?></p>
			</div>
		<?php endif;
		wp_reset_postdata();
		?>
	</div>
</div>