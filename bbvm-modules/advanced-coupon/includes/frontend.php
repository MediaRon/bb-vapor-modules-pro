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
				<?php
				if ( ! empty( $settings->top_photo_link ) ) {
					echo wp_kses_post( BBVapor_Modules_Pro::get_starting_anchor( $settings, 'top_photo_link' ) );
				}
				echo sprintf( '<img src="%s" />', esc_url( $settings->top_photo_src ) );
				if ( ! empty( $settings->top_photo_link ) ) {
					echo '</a>';
				}
				?>
			</div>
			<?php
		endif;
		if ( 'yes' === $settings->enable_headline ) :
			?>
			<h2 class="bbvm-advanced-coupon-headline"><?php echo wp_kses_post( $settings->coupon_headline ); ?></h2>
			<?php
		endif;
		if ( 'yes' === $settings->enable_description ) :
			?>
			<div class="bbvm-advanced-coupon-description"><?php echo wp_kses_post( $settings->description ); ?></div>
			<?php
		endif;
		if ( 'yes' === $settings->enable_coupon ) :
			?>
			<div class="bbvm-advanced-coupon-code-wrapper">
				<span class="bbvm-advanced-coupon-code">
				<?php echo esc_html( $settings->coupon_code ); ?>
				</span>
			</div>
			<?php
		endif;
		?>
	</div>
</div>
