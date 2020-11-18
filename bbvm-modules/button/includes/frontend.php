<?php
/**
 * Button Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

$bbvm_classes = array();
if ( 'transparent' === $settings->button_background_type ) {
	$bbvm_classes[] = 'transparent';
}
if ( 'transparent' === $settings->button_background_type && 'none' !== $settings->button_style ) {
	$bbvm_classes[] = $settings->button_style;
}
if ( 'transparent' === $settings->button_background_type && 'none' !== $settings->button_style_hover ) {
	$bbvm_classes[] = 'hover-' . $settings->button_style_hover;
}
if ( 'none' !== $settings->transition && ( 'color' === $settings->button_background_type || 'gradient' === $settings->button_background_type ) ) {
	$bbvm_classes[] = esc_attr( $settings->transition );
	$bbvm_classes[] = 'hvr-background';
}
?>
<div class="fl-bbvm-button-for-beaverbuilder-wrapper">
<a class="fl-bbvm-button-for-beaverbuilder bbvm-button <?php echo esc_attr( implode( ' ', $bbvm_classes ) ); ?>" id="<?php echo esc_attr( $settings->button_id ); ?>" href="<?php echo esc_url( $settings->button_link ); ?>"><span><?php echo ! empty( $settings->button_icon ) ? sprintf( '<i class="%s" /></i>&nbsp;', esc_attr( $settings->button_icon ) ) : ''; ?><?php echo esc_html( $settings->button_text ); ?></span></a>
</div>
