<?php
/**
 * Calendly Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.4.0
 */

if ( isset( $settings->calendar_name ) && '' !== $settings->calendar_name ) :
	?>
<div class="fl-bbvm-calendly-for-beaverbuilder">
	<?php
	if ( 'inline' === $settings->calendar_type ) :
		?>
		<!-- Calendly inline widget begin -->
		<div class="calendly-inline-widget" data-url="https://calendly.com/<?php echo esc_attr( $settings->calendar_name ); ?>" style="min-width:320px;height:630px;"></div>
		<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script><?php // phpcs:ignore ?>
		<!-- Calendly inline widget end -->
		<?php
	endif;
	?>
</div>
	<?php
endif;
