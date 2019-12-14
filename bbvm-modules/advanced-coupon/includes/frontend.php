<?php
/**
 * Advanced Coupon
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.5.6
 */

?>
<div class="fl-bbvm-advanced-coupon-wrapper">
	<div class="bbvm-advanced-coupon">
		<?php
		if ( 'yes' === $settings->show_icon && ! empty( $settings->icon ) ):
			?>
			<div class="bbvm-advanced-coupon-icon"><span class="<?php echo esc_attr( $settings->icon ); ?>"></span></div>
			<?php
		endif;
		?>
		<h2 class="bbvm-advanced-coupon-headline"><?php echo wp_kses_post( $settings->coupon_headline ); ?></h2>
	</div>
</div>
