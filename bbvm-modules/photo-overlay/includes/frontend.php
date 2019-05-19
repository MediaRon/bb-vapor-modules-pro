<?php
if( isset( $settings->overlay_photo ) && ! empty( $settings->overlay_photo ) ):
	$overlay_type = isset( $settings->overlay_type ) ? $settings->overlay_type : 'horizontal';
	$animation_type = isset( $settings->animation ) ? $settings->animation : 'none';
	$fig_class = '';
	if ( 'horizontal' === $overlay_type ) {
		$fig_class = isset( $settings->horizontal_overlay_type ) ? $settings->horizontal_overlay_type : 'top';
	} else if ( 'full' === $overlay_type ) {
		$fig_class = 'full';
	}
	$has_link = isset( $settings->overlay_link ) ? $settings->overlay_link : false;
?>
<div class="fl-bbvm-overlay-photo-for-beaverbuilder">
	<?php
	if( ! empty( $has_link ) ):
	?>
	<a href="<?php echo esc_url( $has_link ); ?>">
	<?php
	endif;
	?>
	<div class="fl-bbvm-overlay-photo <?php echo esc_attr( $overlay_type ); ?> <?php echo esc_attr( $fig_class ); ?> <?php echo esc_attr( $animation_type ); ?>">
		<figure>
			<?php
			$alt = get_post_meta( $settings->overlay_photo, '_wp_attachment_image_alt', true);
			?>
			<img src="<?php echo esc_url( $settings->overlay_photo_src ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
			<figcaption class="fl-bbvm-overlay-text <?php echo esc_attr( $fig_class ); ?>">
			<span class="fl-bbvm-overlay-text-content">
			<?php
			if( isset( $settings->overlay_text_icon ) && ! empty( $settings->overlay_text_icon ) ) {
				printf( '<i class="%s"></i>', esc_html( $settings->overlay_text_icon ) );
			}
			?>
			<?php echo esc_html( $settings->overlay_text ); ?></span>
			</figcaption>
		</figure>
	</div>
	<?php
	if( ! empty( $has_link ) ):
	?>
	</a>
	<?php
	endif;
	?>
</div>
<?php
endif;