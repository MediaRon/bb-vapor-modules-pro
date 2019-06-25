<?php
global $bbvm_bb_woocommerce_add_to_cart;
$bbvm_bb_woocommerce_add_to_cart = $settings;
if ( ! function_exists( 'bbvm_bb_woocommerce_add_to_cart' ) ) {
	function bbvm_bb_woocommerce_add_to_cart() {
		global $bbvm_bb_woocommerce_add_to_cart, $woocommerce;
		ob_start();
		$cart_count = $woocommerce->cart->cart_contents_count; // Set variable for cart item count
		$cart_url   = wc_get_cart_url();  // Set Cart URL
		?>
		<div class="bbvm-bb-woocommerce-add-to-cart">
			<a class="bbvm-cart-contents" href="<?php echo esc_url( $cart_url ); ?>">
			<?php
			if ( $bbvm_bb_woocommerce_add_to_cart->icon && 'before_text' === $bbvm_bb_woocommerce_add_to_cart->icon_position ) {
				echo sprintf( '<i class="%s icon-before"></i> ', esc_attr( $bbvm_bb_woocommerce_add_to_cart->icon ) );
			}
			if ( $cart_count > 0 ) {
				echo sprintf( '<span class="cart-contents-count">%d </span>', absint( $cart_count ) );
			}
			echo wp_kses_post( $bbvm_bb_woocommerce_add_to_cart->text );
			if ( $bbvm_bb_woocommerce_add_to_cart->icon && 'after_text' === $bbvm_bb_woocommerce_add_to_cart->icon_position ) {
				echo sprintf( ' <i class="%s icon-after"></i>', esc_attr( $bbvm_bb_woocommerce_add_to_cart->icon ) );
			}
			?>
			</a>
		</div>
		<?php
		return ob_get_clean();
	}
}
if ( ! function_exists( 'bbvm_bb_woocommerce_add_to_cart_count' ) ) {
	function bbvm_bb_woocommerce_add_to_cart_count( $fragments ) {
		global $bbvm_bb_woocommerce_add_to_cart, $woocommerce;

		ob_start();

		$cart_count = $woocommerce->cart->cart_contents_count;
		$cart_url   = wc_get_cart_url();
		?>
		<a class="cart-contents" href="<?php echo esc_url( $cart_url ); ?>">
			<?php
			if ( $bbvm_bb_woocommerce_add_to_cart->icon && 'before_text' === $bbvm_bb_woocommerce_add_to_cart->icon_position ) {
				echo sprintf( '<i class="%s icon-before"></i>', esc_attr( $bbvm_bb_woocommerce_add_to_cart->icon ) );
			}
			if ( $cart_count > 0 ) {
				echo sprintf( '<span class="cart-contents-count">%d</span>', absint( $cart_count ) );
			}
			echo wp_kses_post( $bbvm_bb_woocommerce_add_to_cart->text );
			if ( $bbvm_bb_woocommerce_add_to_cart->icon && 'after_text' === $bbvm_bb_woocommerce_add_to_cart->icon_position ) {
				echo sprintf( '<i class="%s icon-after"></i>', esc_attr( $bbvm_bb_woocommerce_add_to_cart->icon ) );
			}
			?>
		</a>
		<?php
		$fragments['a.bbvm-cart-contents'] = ob_get_clean();
		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'bbvm_bb_woocommerce_add_to_cart_count' );
?>
<div class="fl-bbvm-woocommerce-add-to-cart-for-beaverbuilder">
	<p><?php echo wp_kses_post( bbvm_bb_woocommerce_add_to_cart() ); ?></p>
</div>
