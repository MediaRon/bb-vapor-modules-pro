<div class="fl-mediaron-card-group-for-beaverbuilder columns-<?php echo absint( $settings->columns ); ?>">
	<?php
	$count = 1;
	foreach( $settings->card as $card ) :
		?>
		<div class="fl-mediaron-card-wrapper">
			<div class="fl-mediaron-card" id="mediaron-card-<?php echo absint( $count ); ?>">
				<?php
				if( 'icon' === $card->photo_type ) {
					?>
					<div class="fl-mediaron-card-icon-header">
						<?php
						foreach( $card->icon as $icon ) {
							$icon = json_decode( $icon );
							if( ! isset( $icon->icon_group ) ) continue;
							printf( '<i class="%s mediaron-card-icon"></i>', $icon->icon_group );
						}
						?>
					</div>
					<?php
				}
				?>
				<?php
				if( 'photo' === $card->photo_type ) {
					?>
					<div class="fl-mediaron-card-photo-header">
						<img src="<?php echo esc_url( $card->photo_src ); ?>" class="<?php echo esc_attr( $card->photo_appearance ); ?>" />
					</div>
					<?php
				}
				?>
				<?php
				if( 'yes' === $card->display_heading ) {
					?>
					<div class="fl-mediaron-card-heading">
						<?php echo esc_html( $card->heading ); ?>
					</div>
					<?php
				}
				?>
				<?php
				if( 'yes' === $card->display_content ) {
					?>
					<div class="fl-mediaron-card-content">
						<?php echo esc_html( $card->content ); ?>
					</div>
					<?php
				}
				?>
				<?php
				if( 'yes' === $card->display_subheading ) {
					?>
					<div class="fl-mediaron-card-subheading">
						<?php echo esc_html( $card->subheading ); ?>
					</div>
					<?php
				}
				?>
				<?php
				if( 'yes' === $card->display_subheading_text ) {
					?>
					<div class="fl-mediaron-card-subheading-text">
						<?php echo esc_html( $card->subheading_text ); ?>
					</div>
					<?php
				}
				?>
				<?php
				if( 'yes' === $card->display_readmore_button ) {
					?>
					<div class="fl-mediaron-card-readmore">
						<a href="<?php echo esc_url( $card->readmore_link ); ?>">
						<?php
						if( 'none' !== $card->button_icon_display && 'before' === $card->button_icon_display ) {
							printf( '<i class="%s"></i>&nbsp;', $card->button_icon );
						}
						echo esc_html( $card->readmore_text );
						if( 'none' !== $card->button_icon_display && 'after' === $card->button_icon_display ) {
							printf( '&nbsp;<i class="%s"></i>', $card->button_icon );
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
	$count += 1;
	endforeach;
	?>
</div>