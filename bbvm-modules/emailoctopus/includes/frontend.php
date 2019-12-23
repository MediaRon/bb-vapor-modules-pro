<?php
/**
 * Emailoctopus Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.6.0
 */

?>
<div class="fl-bbvm-emailoctopus-for-beaverbuilder">
	<?php
	if ( '0' !== $settings->form ) {
		$emailoctopus = EmailOctopus::get_instance();
		echo $emailoctopus->shortcode( array( 'form_id' => $settings->form ) ); // phpcs:ignore
	}
	?>
</div>
