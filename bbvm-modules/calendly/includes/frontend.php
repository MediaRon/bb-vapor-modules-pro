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
		$url = sprintf( 'https://calendly.com/%s', esc_attr( $settings->calendar_name ) );
		if ( 'yes' === $settings->hide_page_details ) {
			$url = add_query_arg(
				array(
					'hide_landing_page_details' => '1',
				),
				$url
			);
		}
		$url = add_query_arg(
			array(
				'background_color' => $settings->background_color,
				'text_color'       => $settings->text_color,
				'primary_color'    => $settings->button_color,
			),
			$url
		);
		?>
		<!-- Calendly inline widget begin -->
		<div class="calendly-inline-widget" data-url="<?php echo esc_url_raw( $url ); ?>" style="min-width:320px;height:630px;"></div>
		<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script><?php // phpcs:ignore ?>
		<!-- Calendly inline widget end -->
		<?php
	endif;
	?>
</div>
	<?php
endif;
