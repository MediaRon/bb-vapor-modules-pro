<?php
/**
 * Button Group Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-button-group-for-beaverbuilder">
	<?php
	$count = 0;
	foreach ( $settings->button as $button ) {
		$classes = array();
		if ( 'none' !== $button->transition && ( 'color' === $button->button_background_type || 'gradient' === $button->button_background_type ) ) {
			$classes[] = esc_attr( $button->transition );
			$classes[] = 'hvr-background';
		}
		?>
		<div class="bbvm-button-wrapper button-<?php echo absint( $count ); ?> <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<a class="bbvm-button " id="<?php echo esc_attr( $button->button_id ); ?>" href="<?php echo esc_url( $button->button_link ); ?>"><span><?php echo ! empty( $button->button_icon ) ? sprintf( '<i class="%s" /></i>&nbsp;', esc_attr( $button->button_icon ) ) : ''; ?><?php echo esc_html( $button->button_text ); ?></span></a></div>
		<?php
		$count++;
	}
	?>
</div>
