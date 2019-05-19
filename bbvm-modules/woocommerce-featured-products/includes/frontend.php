<div class="fl-mediaron-woocommerce-featured-products-for-beaverbuilder">
	<?php if( ! empty( $settings->products ) ):?>
	<?php
	$woocommerce_product_ids = explode( ',', $settings->products );
	$products = wc_get_products( array( 'include' => $woocommerce_product_ids ) );
	setlocale(LC_MONETARY, $settings->currenty_locale);

	foreach( $products as $product ) {
		?>
		<div class="mediaron-woocommerce-product" id="mediaron-woocommerce-product-<?php echo absint( $product->get_id() ); ?>">
			<div class="mediaron-woocommerce-wrapper">
				<div class="mediaron-woocommerce-image">
					<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
					<?php
					$image_id = $product->get_image_id();
					$alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
					$image = wp_get_attachment_image( $image_id, $settings->photo_size, array( 'alt' => $alt ) );
					echo $image;
					?>
					</a>
				</div>
				<?php if ( 'yes' === $settings->show_title ): ?>
				<div class="mediaron-woocommerce-title">
					<h2><?php echo esc_html( $product->get_title() ); ?></h2>
				</div>
				<?php endif; ?>
				<?php if ( 'yes' === $settings->show_short_description ): ?>
				<div class="mediaron-woocommerce-short-description">
					<?php echo wp_trim_words( wp_strip_all_tags( $product->get_short_description(), true ), absint( $settings->short_description_trim_words ) ); ?>
				</div>
				<?php endif; ?>
				<div class="mediaron-woocommerce-price">
					<?php
					$price = $product->get_price();
					if( ! empty( $price ) ) {
						echo money_format( '%#0n', $price );
					}
					?>
				</div>
			</div>
			<?php if( 'yes' === $settings->show_view_details ): ?>
			<div class="mediaron-woocommerce-show-details">
				<div class="mediaron-woocommerce-show-details-button">
				<?php
				ob_start();
				?>
				<?php if ( ! empty( $settings->show_details_icon ) ) : ?><i class="<?php echo esc_attr( $settings->show_details_icon ); ?>"></i><?php endif; ?> <?php echo esc_html( $settings->show_details_text ); ?>
				<?php
				$show_details_text = ob_get_clean();
				$on_click_text = '';
				if( 'slidedown' === $settings->show_details_behavior ) {
					$on_click_text = sprintf( 'onclick="event.preventDefault();mediaron_woocommerce_featured_products_show_details(%s)"', esc_js( $product->get_id() ) );
				}
				if( 'lightbox' === $settings->show_details_behavior ) {
					$on_click_text = sprintf( 'onclick="event.preventDefault();mediaron_woocommerce_featured_products_show_details_lightbox(%s)"', esc_js( $product->get_id() ) );
				}
				printf( '<a href="%s" %s>%s</a>', esc_url( $product->get_permalink() ), $on_click_text, $show_details_text );
				?>
				</div>
				<div class="mediaron-woocommerce-show-details-content">
					<?php
					$description = $product->get_description();
					if( ! empty( $description ) ) {
						?>
						<div class="mediaron-woocommerce-description">
						<?php echo $description; ?>
						</div>
						<?php
					}
					?>
					<?php
					$sku = $product->get_sku();
					if( ! empty( $sku ) ) {
						?>
						<div class="mediaron-woocommerce-sku">
						<h3><?php esc_html_e( 'SKU', 'mediaron-bb-modules' ); ?></h3>
						<?php echo $sku; ?>
						</div>
						<?php
					}
					?>
					<?php
					$stock = $product->get_stock_quantity();
					if( $stock > 0 ) {
						?>
						<div class="mediaron-woocommerce-in-stock">
						<h3><?php esc_html_e( 'Stock', 'mediaron-bb-modules' ); ?></h3>
						<?php echo absint( $stock ); ?> <?php echo esc_html__( 'in stock', 'mediaron-bb-modules' ); ?>
						</div>
						<?php
					} else {
						?>
						<div class="mediaron-woocommerce-in-stock">
						<h3><?php esc_html_e( 'Stock', 'mediaron-bb-modules' ); ?></h3>
						<?php echo esc_html__( 'Out of stock', 'mediaron-bb-modules' ); ?>
						</div>
						<?php
					}
					?>
					<div class="mediaron-woocommerce-cart">
						<h3><?php esc_html_e( 'Purchase', 'mediaron-bb-modules' ); ?></h3>
						<?php echo do_shortcode( sprintf( '[add_to_cart id="%s" style="" show_price="false" quantity=1]', $product->get_id() ) ); ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php //echo '<pre>' . print_r( $product, true ) . '</pre>'; ?>
		</div>
		<?php
	}
	?>
	<?php endif; ?>
</div>