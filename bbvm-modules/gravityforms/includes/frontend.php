<?php
/**
 * Gravity Forms Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-gravityforms-for-beaverbuilder">
	<?php
	$display_title       = 'yes' === $settings->form_title ? true : false;
	$display_description = 'yes' === $settings->form_description ? true : false;
	$ajax_only           = 'yes' === $settings->ajax_only ? true : false;
	if ( 'custom' === $settings->form_title && ! empty( $settings->custom_title ) ) {
		printf( '<h3 class="form-heading">%s</h3>', esc_html( $settings->custom_title ) );
	}
	if ( 'custom' === $settings->form_description && ! empty( $settings->custom_description ) ) {
		printf( '<p class="form-description">%s</p>', esc_html( $settings->custom_description ) );
	}
	if ( '0' !== $settings->form && ! empty( $settings->form ) ) {
		gravity_form( $settings->form, $display_title, $display_description, false, null, $ajax_only, $settings->tabindex, true );
	}
	?>
</div>
