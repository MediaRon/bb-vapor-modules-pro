<?php
global $mediaron_bb_woocommerce_add_to_cart;
$mediaron_bb_woocommerce_add_to_cart = $settings;
if( ! function_exists( 'mediaron_bb_woocommerce_add_to_cart' ) ) {
	function mediaron_bb_woocommerce_add_to_cart() {
		global $mediaron_bb_woocommerce_add_to_cart, $woocommerce;
		ob_start();
		$cart_count = $woocommerce->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL

        ?>
		<div class="mediaron-bb-woocommerce-add-to-cart">
			<a class="mediaron-cart-contents" href="<?php echo esc_url( $cart_url ); ?>">
			<?php if ( $mediaron_bb_woocommerce_add_to_cart->icon && 'before_text' === $mediaron_bb_woocommerce_add_to_cart->icon_position ) {
				echo sprintf( '<i class="%s icon-before"></i> ', esc_attr( $mediaron_bb_woocommerce_add_to_cart->icon ) );
			}
			if( $cart_count > 0 ) {
				echo sprintf( '<span class="cart-contents-count">%d </span>', absint( $cart_count ) );
			}
			echo $mediaron_bb_woocommerce_add_to_cart->text;
			if ( $mediaron_bb_woocommerce_add_to_cart->icon && 'after_text' === $mediaron_bb_woocommerce_add_to_cart->icon_position ) {
				echo sprintf( ' <i class="%s icon-after"></i>', esc_attr( $mediaron_bb_woocommerce_add_to_cart->icon ) );
			}
			?>
			</a>
		</div>
		<?php
    	return ob_get_clean();
	}
}
if( ! function_exists( 'mediaron_bb_woocommerce_add_to_cart_count' ) ) {
	function mediaron_bb_woocommerce_add_to_cart_count( $fragments ) {
		global $mediaron_bb_woocommerce_add_to_cart, $woocommerce;

		ob_start();

		$cart_count = $woocommerce->cart->cart_contents_count;
		$cart_url = wc_get_cart_url();
		?>
		<a class="cart-contents" href="<?php echo esc_url( $cart_url ); ?>">
			<?php if ( $mediaron_bb_woocommerce_add_to_cart->icon && 'before_text' === $mediaron_bb_woocommerce_add_to_cart->icon_position ) {
				echo sprintf( '<i class="%s icon-before"></i>', esc_attr( $mediaron_bb_woocommerce_add_to_cart->icon ) );
			}
			if( $cart_count > 0 ) {
				echo sprintf( '<span class="cart-contents-count">%d</span>', absint( $cart_count ) );
			}
			echo $mediaron_bb_woocommerce_add_to_cart->text;
			if ( $mediaron_bb_woocommerce_add_to_cart->icon && 'after_text' === $mediaron_bb_woocommerce_add_to_cart->icon_position ) {
				echo sprintf( '<i class="%s icon-after"></i>', esc_attr( $mediaron_bb_woocommerce_add_to_cart->icon ) );
			}
			?>
		</a>
		<?php
		$fragments['a.mediaron-cart-contents'] = ob_get_clean();
		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'mediaron_bb_woocommerce_add_to_cart_count' );
?>
<div class="fl-mediaron-woocommerce-add-to-cart-for-beaverbuilder">
	<p><?php echo mediaron_bb_woocommerce_add_to_cart(); ?></p>
</div>