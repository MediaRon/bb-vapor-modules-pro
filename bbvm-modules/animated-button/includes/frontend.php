<?php
$classes = array();
if ( 'yes' === $settings->icon_animation ) {
	if ( 'none' !== $settings->icon_animation_hover ) {
		$classes[] = esc_attr( $settings->icon_animation_hover );
	}
}
if( '2d' === $settings->button_animation ) {
	if ( 'none' !== $settings->animation_type_2d ) {
		$classes[] = esc_attr( $settings->animation_type_2d );
	}
}
if( 'background' === $settings->button_animation ) {
	if ( 'none' !== $settings->animation_type_background ) {
		$classes[] = esc_attr( $settings->animation_type_background );
		$classes[] = 'hvr-background';
	}
}
if( 'border' === $settings->button_animation ) {
	if ( 'none' !== $settings->animation_type_border ) {
		$classes[] = esc_attr( $settings->animation_type_border );
		$classes[] = 'hvr-border';
	}
}
if( 'shadow_glow' === $settings->button_animation ) {
	if ( 'none' !== $settings->shadow_and_glow ) {
		$classes[] = esc_attr( $settings->shadow_and_glow );
		$classes[] = 'hvr-shadow-glow';
	}
}
if( 'speech' === $settings->button_animation ) {
	if ( 'none' !== $settings->speech_bubble ) {
		$classes[] = esc_attr( $settings->speech_bubble );
		$classes[] = 'hvr-speech-bubble';
	}
}
if( 'curls' === $settings->button_animation ) {
	if ( 'none' !== $settings->curls ) {
		$classes[] = esc_attr( $settings->curls );
		$classes[] = 'hvr-curls';
	}
}
$classes = implode(' ', $classes );
?>

<div class="fl-bbvm-animated-button-for-beaverbuilder-wrapper">
<a class="fl-bbvm-animated-button-for-beaverbuilder bbvm-button <?php echo $classes; ?>" id="<?php echo esc_attr( $settings->button_id ); ?>" href="<?php echo esc_url( $settings->button_link ); ?>"><span><?php echo ! empty( $settings->button_icon ) && 'before' === $settings->button_icon_location ? sprintf( '<i class="%s hvr-icon" /></i>&nbsp;', esc_attr( $settings->button_icon ) ) : ''; ?><?php echo esc_html( $settings->button_text ); ?><?php echo ! empty( $settings->button_icon ) && 'after' === $settings->button_icon_location ? sprintf( '&nbsp;<i class="%s hvr-icon" /></i>', esc_attr( $settings->button_icon ) ) : ''; ?></span></a>
</div>