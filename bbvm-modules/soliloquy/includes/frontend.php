<?php
/**
 * Soliloquy Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-soliloquy-for-beaverbuilder">
	<?php
	if ( '0' !== $settings->slider && ! empty( $settings->slider ) ) {
		soliloquy( $settings->slider );
	}
	?>
</div>
