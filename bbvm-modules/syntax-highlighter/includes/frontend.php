<?php
global $SyntaxHighlighter;
$attributes = array(
	'title' => $settings->title
);
$code = $SyntaxHighlighter->shortcode_callback( $attributes, $settings->raw, $settings->code );
?>
<div class="fl-bbvm-syntax-highlighter-for-beaverbuilder">
	<?php echo $code; ?>
</div>
<script>
	if( typeof SyntaxHighlighter !== 'undefined' ) {
		SyntaxHighlighter.highlight();
	}
</script>