<div class="fl-mediaron-button-group-for-beaverbuilder">
	<?php
	foreach( $settings->button as $button ) {
		?>
		<div class="mediaron-button-wrapper">
		<a class="mediaron-button" id="<?php echo esc_attr( $button->button_id ); ?>" href="<?php echo esc_url( $button->button_link ); ?>"><span><?php echo ! empty( $button->button_icon ) ? sprintf( '<i class="%s" /></i>&nbsp;', esc_attr( $button->button_icon ) ) : ''; ?><?php echo esc_html( $button->button_text ); ?></span></a></div>
		<?php
	}
	?>
</div>