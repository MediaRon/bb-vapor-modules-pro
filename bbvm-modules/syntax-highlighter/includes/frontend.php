<?php
/**
 * Syntax Highlighter Evolved Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

global $SyntaxHighlighter; // phpcs:ignore
$attributes = array(
	'title' => $settings->title,
);
$code       = $SyntaxHighlighter->shortcode_callback( $attributes, $settings->raw, $settings->code ); // phpcs:ignore
?>
<div class="fl-bbvm-syntax-highlighter-for-beaverbuilder">
	<?php echo $code; // phpcs:ignore ?>
</div>
<script>
	if( typeof SyntaxHighlighter !== 'undefined' ) {
		SyntaxHighlighter.highlight();
	}
</script>
