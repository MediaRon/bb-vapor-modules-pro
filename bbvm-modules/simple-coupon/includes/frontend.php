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
		echo sprintf( '<h2 class="bbvm-simple-coupon-headline">%s</h2>', wp_kses_post( $settings->sales_text ) );
		echo sprintf( '<div class="bbvm-simple-coupon-wrapper"><span class="bbvm-simple-coupon">%s</span></div>', wp_kses_post( $settings->coupon_code ) );

		// Show button.
		if ( 'yes' === $settings->show_cta ) {
			?>
			<div class="bbvm-simple-coupon-button">
				<a href="<?php echo esc_url( $settings->button_link ); ?>">
				<?php
				if ( ! empty( $settings->button_icon ) ) {
					echo sprintf( '<span class="%s"></span>', esc_attr( $settings->button_icon ) );
				}
				?>
				<?php echo esc_html( $settings->button_text ); ?>
			</a>
			</div>
			<?php
		}
		// Show Disclaimer.
		if ( 'yes' === $settings->show_disclaimer ) :
			?>
			<div class="bbvm-simple-coupon-disclaimer">
				<?php
					echo wp_kses_post( $settings->disclaimer_text );
				?>
			</div>
			<?php
		endif;
		?>
	</div>
</div>
