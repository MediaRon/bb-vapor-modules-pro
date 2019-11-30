<?php
/**
 * Simple Coupon
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.5.5
 */

?>
<div class="fl-bbvm-simple-coupon">
	<div class="bbvm-simple-coupon-text">
		<?php
		$sales_text = $settings->sales_text;
		$sales_text = str_replace( '{bbvm_simple_coupon}', sprintf( '<span class="bbvm-simple-coupon">%s</span>', $settings->coupon_code ), $sales_text );
		echo wp_kses_post( $sales_text );
		?>
	</div>
</div>
