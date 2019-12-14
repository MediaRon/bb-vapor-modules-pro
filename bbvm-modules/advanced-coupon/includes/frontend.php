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
		if ( 'icon' === $settings->photo_icon && ! empty( $settings->icon ) ) :
			?>
			<div class="bbvm-advanced-coupon-icon"><span class="<?php echo esc_attr( $settings->icon ); ?>"></span></div>
			<?php
		endif;
		if ( 'photo' === $settings->photo_icon && ! empty( $settings->top_photo ) ) :
			?>
			<div class="bbvm-advanced-coupon-top-photo">
				<?php echo sprintf( '<img src="%s" />', esc_url( $settings->top_photo_src ) ); ?>
			</div>
			<?php
		endif;
		?>
		<h2 class="bbvm-advanced-coupon-headline"><?php echo wp_kses_post( $settings->coupon_headline ); ?></h2>
	</div>
</div>
