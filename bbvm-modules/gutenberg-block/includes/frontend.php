<?php
/**
 * Gutenberg Block Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 3.0.0
 */

$block = get_post( $settings->gutenberg_reusable_block );
if ( $block ) {
	$post_content = $block->post_content;

	echo do_blocks( $post_content ); // phpcs:ignore
}
