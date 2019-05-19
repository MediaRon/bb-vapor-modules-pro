.fl-node-<?php echo $id; ?> .fl-bbvm-spacer-gap {
	clear: both;
	width: 100%;
}
<?php
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-spacer-gap",
	'media' => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'height' => $settings->spacer . 'px'
	),
) );
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-spacer-gap",
	'media' => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'height' => $settings->spacer_medium . 'px'
	),
) );
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-spacer-gap",
	'media' => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'height' => $settings->spacer_responsive . 'px'
	),
) );