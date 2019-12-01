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
