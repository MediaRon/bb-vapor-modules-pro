<?php
/**
 * Card Group Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-card-group-for-beaverbuilder columns-<?php echo absint( $settings->columns ); ?>">
	<?php
	$count = 1;
	foreach ( $settings->card as $card ) :
		?>
		<div class="fl-bbvm-card-wrapper">
			<div class="fl-bbvm-card" id="bbvm-card-<?php echo absint( $count ); ?>">
				<?php
				if ( 'icon' === $card->photo_type ) {
					?>
					<div class="fl-bbvm-card-icon-header">
						<?php
						foreach ( $card->icon as $icon ) {
							$icon = json_decode( $icon );
							if ( ! isset( $icon->icon_group ) ) {
								continue;
							}
							printf( '<i class="%s bbvm-card-icon"></i>', esc_attr( $icon->icon_group ) );
						}
						?>
					</div>
					<?php
				}
				?>
				<?php
				if ( 'photo' === $card->photo_type ) {
					?>
					<div class="fl-bbvm-card-photo-header">
						<img src="<?php echo esc_url( $card->photo_src ); ?>" class="<?php echo esc_attr( $card->photo_appearance ); ?>" />
					</div>
					<?php
				}
				?>
				<?php
				if ( 'yes' === $card->display_heading ) {
					?>
					<div class="fl-bbvm-card-heading">
						<?php echo esc_html( $card->heading ); ?>
					</div>
					<?php
				}
				?>
				<?php
				if ( 'yes' === $card->display_content ) {
					?>
					<div class="fl-bbvm-card-content">
						<?php echo esc_html( $card->content ); ?>
					</div>
					<?php
				}
				?>
				<?php
				if ( 'yes' === $card->display_subheading ) {
					?>
					<div class="fl-bbvm-card-subheading">
						<?php echo esc_html( $card->subheading ); ?>
					</div>
					<?php
				}
				?>
				<?php
				if ( 'yes' === $card->display_subheading_text ) {
					?>
					<div class="fl-bbvm-card-subheading-text">
						<?php echo esc_html( $card->subheading_text ); ?>
					</div>
					<?php
				}
				?>
				<?php
				if ( 'yes' === $card->display_readmore_button ) {
					?>
					<div class="fl-bbvm-card-readmore">
						<a href="<?php echo esc_url( $card->readmore_link ); ?>">
						<?php
						if ( 'none' !== $card->button_icon_display && 'before' === $card->button_icon_display ) {
							printf( '<i class="%s"></i>&nbsp;', esc_attr( $card->button_icon ) );
						}
						echo esc_html( $card->readmore_text );
						if ( 'none' !== $card->button_icon_display && 'after' === $card->button_icon_display ) {
							printf( '&nbsp;<i class="%s"></i>', esc_attr( $card->button_icon ) );
						}
						?>
						</a>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<?php
		$count++;
	endforeach;
	?>
</div>
