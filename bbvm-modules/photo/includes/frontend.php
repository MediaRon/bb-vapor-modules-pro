<?php
/**
 * Advanced Photo Overlay Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.6.8
 */

if ( isset( $settings->image ) && ! empty( $settings->image ) ) :
	$attachment_id = absint( $settings->image );
	$alt_text      = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
	$caption       = wp_get_attachment_caption( $attachment_id );
	?>
	<div class="bbvm-photo-wrapper">
		<h2>Title</h2>
		<div class="bbvm-photo">

		</div>
		<?php
		$caption_output = '';
		if ( 'alt' === $settings->caption_type ) {
			$caption_output = $alt_text;
		} elseif ( 'caption' === $settings->caption_type ) {
			$caption_output = $caption;
		} elseif ( 'custom' === $settings->caption_type ) {
			$caption_output = $settings->caption_custom;
		}
		if ( ! empty( $caption_output ) ) :
			?>
			<figcaption class="bbvm-photo-caption">
				<?php echo wp_kses_post( $caption_output ); ?>
			</figcaption>
			<?php
		endif;
		?>
	</div>
	<?php
endif;
