<div class="fl-bbvm-card-for-beaverbuilder">
	<?php
	if( 'icon' === $settings->photo_type ) {
		?>
		<div class="fl-bbvm-card-icon-header">
			<?php
			foreach( $settings->icon as $icon ) {
				if( ! isset( $icon->icon_group ) ) continue;
				printf( '<i class="%s bbvm-card-icon"></i>', $icon->icon_group );
			}
			?>
		</div>
		<?php
	}
	?>
	<?php
	if( 'photo' === $settings->photo_type ) {
		?>
		<div class="fl-bbvm-card-photo-header">
			<img src="<?php echo esc_url( $settings->photo_src ); ?>" class="<?php echo esc_attr( $settings->photo_appearance ); ?>" />
		</div>
		<?php
	}
	?>
	<?php
	if( 'yes' === $settings->display_heading ) {
		?>
		<div class="fl-bbvm-card-heading">
			<?php echo esc_html( $settings->heading ); ?>
		</div>
		<?php
	}
	?>
	<?php
	if( 'yes' === $settings->display_content ) {
		?>
		<div class="fl-bbvm-card-content">
			<?php echo esc_html( $settings->content ); ?>
		</div>
		<?php
	}
	?>
	<?php
	if( 'yes' === $settings->display_subheading ) {
		?>
		<div class="fl-bbvm-card-subheading">
			<?php echo esc_html( $settings->subheading ); ?>
		</div>
		<?php
	}
	?>
	<?php
	if( 'yes' === $settings->display_subheading_text ) {
		?>
		<div class="fl-bbvm-card-subheading-text">
			<?php echo esc_html( $settings->subheading_text ); ?>
		</div>
		<?php
	}
	?>
	<?php
	if( 'yes' === $settings->display_readmore_button ) {
		?>
		<div class="fl-bbvm-card-readmore">
			<a href="<?php echo esc_url( $settings->readmore_link ); ?>">
			<?php
			if( 'none' !== $settings->button_icon_display && 'before' === $settings->button_icon_display ) {
				printf( '<i class="%s"></i>&nbsp;', $settings->button_icon );
			}
			echo esc_html( $settings->readmore_text );
			if( 'none' !== $settings->button_icon_display && 'after' === $settings->button_icon_display ) {
				printf( '&nbsp;<i class="%s"></i>', $settings->button_icon );
			}
			?>
			</a>
		</div>
		<?php
	}
	?>
</div>