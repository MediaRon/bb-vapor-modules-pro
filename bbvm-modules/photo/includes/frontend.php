<?php
/**
 * Photo Module
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.7.0
 */

if ( isset( $settings->image ) && ! empty( $settings->image ) ) :
	$attachment_id  = absint( $settings->image );
	$alt_text       = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
	$caption        = wp_get_attachment_caption( $attachment_id );
	$caption_output = '';
	if ( 'alt' === $settings->caption_type ) {
		$caption_output = $alt_text;
	} elseif ( 'caption' === $settings->caption_type ) {
		$caption_output = $caption;
	} elseif ( 'custom' === $settings->caption_type ) {
		$caption_output = $settings->caption_custom;
	}
	$overlay_type   = isset( $settings->overlay_type ) ? $settings->overlay_type : 'horizontal';
	$animation_type = isset( $settings->animation ) ? $settings->animation : 'regular';
	$fig_class      = '';
	$crop_type      = isset( $setting->image_appearance ) ? $settings->image_appearance : 'appearance-none';
	if ( 'horizontal' === $overlay_type ) {
		$fig_class = isset( $settings->horizontal_overlay_type ) ? $settings->horizontal_overlay_type : 'top';
	} elseif ( 'full' === $overlay_type ) {
		$fig_class = '';
	}
	?>
	<div class="bbvm-photo-wrapper">
		<?php if ( 'yes' === $settings->display_title ) : ?>
			<h2 class="bbvm-photo-title"><?php echo wp_kses_post( $settings->title_custom ); ?></h2>
		<?php endif; ?>
		<div class="bbvm-photo">
			<figure class="<?php echo esc_attr( $settings->filter_type ); ?> <?php echo esc_attr( $settings->crop_type ); ?> <?php echo esc_attr( $overlay_type ); ?> <?php echo esc_attr( $fig_class ); ?> <?php echo esc_attr( $animation_type ); ?> <?php echo esc_attr( $crop_type ); ?>">
				<?php
				if ( 'regular' === $settings->photo_link_select && 'yes' === $settings->link_option && ! empty( $settings->photo_url ) ) :
					echo wp_kses_post( BBVapor_Modules_Pro::get_starting_anchor( $settings, 'photo_url', 'bbvm-photo-link bbvm-photo-link-regular' ) );
					echo '</a>';
				endif;
				if ( 'lightbox' === $settings->photo_link_select && 'yes' === $settings->link_option ) :
					$lightbox_url = wp_get_attachment_url( $attachment_id, $settings->photo_lightbox_size );
					printf(
						'<a href="%s" title="%s" class="bbvm-photo-link bbvm-photo-link-lightbox"></a>',
						esc_url( $lightbox_url ),
						esc_attr( $caption_output )
					);
				endif;
				?>
				<?php if ( 'no' === $settings->background_image ) : ?>
					<img src="<?php echo esc_url( $settings->image_src ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>" />
				<?php endif; ?>
				<?php
				if ( ! empty( $caption_output && 'overlay' === $settings->caption_display && 'yes' === $settings->display_caption ) ) :
					?>
					<figcaption class="bbvm-photo-caption <?php echo esc_attr( $fig_class ); ?> <?php echo 'hover' === $settings->overlay_behavior ? 'hover-only' : ''; ?>">
						<span class="bbvm-photo-caption-content">
							<?php echo wp_kses_post( $caption_output ); ?>
						</span>
					</figcaption>
					<?php
				endif;
				?>
			</figure>
			<?php if ( ! empty( $caption_output ) && 'below' === $settings->caption_display && 'yes' === $settings->display_caption ) : ?>
				<figcaption class="bbvm-photo-caption bbvm-caption-below">
					<span class="bbvm-photo-caption-content">
						<?php echo wp_kses_post( $caption_output ); ?>
					</span>
				</figcaption>
			<?php endif; ?>
		</div>	
	</div>
	<?php
endif;
