<?php
/**
 * Advanced Photo Overlay Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.6.8
 */

if ( isset( $settings->image ) && ! empty( $settings->image ) ) :
	var_dump( $settings->image );
	?>
	<div class="bbvm-photo-wrapper">
		<h2>Title</h2>
		<div class="bbvm-photo">

		</div>
		<figcaption>Caption</figcaption>
	</div>
	<?php
endif;
