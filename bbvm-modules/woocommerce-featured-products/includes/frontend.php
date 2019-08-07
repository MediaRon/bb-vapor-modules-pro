<?php
/**
 * WooCommerce Featured Products.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-woocommerce-featured-products-for-beaverbuilder">
	<?php if ( ! empty( $settings->products ) ) : ?>
		<?php
		$woocommerce_product_ids = explode( ',', $settings->products );
		$products                = wc_get_products( array( 'include' => $woocommerce_product_ids ) );
		setlocale( LC_MONETARY, $settings->currenty_locale );

		foreach ( $products as $product ) {
			?>
			<div class="bbvm-woocommerce-product" id="bbvm-woocommerce-product-<?php echo absint( $product->get_id() ); ?>">
				<div class="bbvm-woocommerce-wrapper">
					<div class="bbvm-woocommerce-image">
						<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
						<?php
						$image_id = $product->get_image_id();
						$alt      = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
						$image    = wp_get_attachment_image( $image_id, $settings->photo_size, array( 'alt' => $alt ) );
						echo wp_kses_post( $image );
						?>
						</a>
					</div>
					<?php if ( 'yes' === $settings->show_title ) : ?>
					<div class="bbvm-woocommerce-title">
						<h2><?php echo esc_html( $product->get_title() ); ?></h2>
					</div>
					<?php endif; ?>
					<?php if ( 'yes' === $settings->show_short_description ) : ?>
					<div class="bbvm-woocommerce-short-description">
						<?php echo wp_kses_post( wp_trim_words( wp_strip_all_tags( $product->get_short_description(), true ), absint( $settings->short_description_trim_words ) ) ); ?>
					</div>
					<?php endif; ?>
					<div class="bbvm-woocommerce-price">
						<?php
						$price = $product->get_price();
						if ( ! empty( $price ) ) {
							echo esc_html( money_format( '%#0n', $price ) );
						}
						?>
					</div>
				</div>
				<?php if ( 'yes' === $settings->show_view_details ) : ?>
				<div class="bbvm-woocommerce-show-details">
					<div class="bbvm-woocommerce-show-details-button">
					<?php
					ob_start();
					?>
					<?php if ( ! empty( $settings->show_details_icon ) ) : ?>
						<i class="<?php echo esc_attr( $settings->show_details_icon ); ?>"></i>
					<?php endif; ?>
					<?php echo esc_html( $settings->show_details_text ); ?>
					<?php
					$show_details_text = ob_get_clean();
					$on_click_text     = '';
					if ( 'slidedown' === $settings->show_details_behavior ) {
						$on_click_text = sprintf( 'onclick="event.preventDefault();bbvm_woocommerce_featured_products_show_details(%s)"', esc_js( $product->get_id() ) );
					}
					if ( 'lightbox' === $settings->show_details_behavior ) {
						$on_click_text = sprintf( 'onclick="event.preventDefault();bbvm_woocommerce_featured_products_show_details_lightbox(%s)"', esc_js( $product->get_id() ) );
					}
					echo sprintf( '<a href="%s" %s>%s</a>', esc_url( $product->get_permalink() ), $on_click_text, $show_details_text ); // phpcs:ignore
					?>
					</div>
					<div class="bbvm-woocommerce-show-details-content">
						<?php
						$description = $product->get_description();
						if ( ! empty( $description ) ) {
							?>
							<div class="bbvm-woocommerce-description">
							<?php echo wp_kses_post( $description ); ?>
							</div>
							<?php
						}
						?>
						<?php
						$sku = $product->get_sku();
						if ( ! empty( $sku ) ) {
							?>
							<div class="bbvm-woocommerce-sku">
							<h3><?php esc_html_e( 'SKU', 'bb-vapor-modules-pro' ); ?></h3>
							<?php echo esc_html( $sku ); ?>
							</div>
							<?php
						}
						?>
						<?php
						$stock = $product->get_stock_quantity();
						if ( $stock > 0 ) {
							?>
							<div class="bbvm-woocommerce-in-stock">
							<h3><?php esc_html_e( 'Stock', 'bb-vapor-modules-pro' ); ?></h3>
							<?php echo absint( $stock ); ?> <?php echo esc_html__( 'in stock', 'bb-vapor-modules-pro' ); ?>
							</div>
							<?php
						} else {
							?>
							<div class="bbvm-woocommerce-in-stock">
							<h3><?php esc_html_e( 'Stock', 'bb-vapor-modules-pro' ); ?></h3>
							<?php echo esc_html__( 'Out of stock', 'bb-vapor-modules-pro' ); ?>
							</div>
							<?php
						}
						?>
						<div class="bbvm-woocommerce-cart">
							<h3><?php esc_html_e( 'Purchase', 'bb-vapor-modules-pro' ); ?></h3>
							<?php echo do_shortcode( sprintf( '[add_to_cart id="%s" style="" show_price="false" quantity=1]', $product->get_id() ) ); ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<?php
		}
		?>
	<?php endif; ?>
</div>
