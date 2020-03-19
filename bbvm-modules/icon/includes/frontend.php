<?php
/**
 * Icon Module
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.2.1
 */

?>
<div class="bbvm-icon-wrapper">
	<div class="bbvm-icon">
		<?php
		if ( ! empty( $settings->link ) ) {
			echo wp_kses_post( BBVapor_Modules_Pro::get_starting_anchor( $settings, 'link' ) );
		}
		if ( 'icon' === $settings->icon_photo ) :
			?>
			<i aria-hidden="true" class="<?php echo esc_attr( $settings->icon ); ?>"></i>
			<?php
		else :
			?>
			<img src="<?php echo esc_url( $settings->image_src ); ?>" alt="" />
			<?php
		endif;
		if ( ! empty( $settings->link ) ) {
			echo '</a>';
		}
		?>
	</div><!-- bbvm-icon -->
	<div class="bbvm-text">
		<?php
		echo wp_kses_post( $settings->text );
		?>
	</div>
</div><!-- bbvm-icon-wrapper -->
