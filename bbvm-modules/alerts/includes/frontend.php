<div class="fl-bbvm-alerts-for-beaverbuilder">
	<?php
	if ( 'yes' === $settings->show_icon && ! empty( $settings->icon ) ):
	?>
	<div class="fl-bbvm-alert-icon"><i class="<?php echo $settings->icon; ?>"></i></div>
	<?php
	endif;
	?>
	<div class="fl-bbvm-alert-text"><?php echo wp_kses_post( $settings->alert_text ); ?></div>
	<?php
	if ( 'yes' === $settings->show_button && ! empty( $settings->button_location ) && ! empty( $settings->button_text ) ):
	?>
	<div class="fl-bbvm-alert-button"><a href="<?php echo esc_url( $settings->button_location ); ?>"><?php echo esc_html( $settings->button_text ); ?></a></div>
	<?php
	endif;
	?>
</div>