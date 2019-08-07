<?php
/**
 * Markdown Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-markdown-for-beaverbuilder">
	<?php
	if ( ! class_exists( 'Parsedown' ) ) {
		require_once 'Parsedown.php';
	}
	$bbvm_parsedown = new Parsedown();
	echo $bbvm_parsedown->text( $settings->markdown ); // phpcs:ignore
	?>
</div>
