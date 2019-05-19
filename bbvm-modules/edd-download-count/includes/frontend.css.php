<?php
// Background Color
$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
if( 6 === strlen( $background_color ) ) {
	$background_color = '#' . $background_color;
}

// Text Color
$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
if( 6 === strlen( $text_color ) ) {
	$text_color = '#' . $text_color;
}
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-download-count-for-beaverbuilder {
	background-color: <?php echo $background_color; ?>;
	color: <?php echo $text_color; ?>;
}
<?php
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-download-count-for-beaverbuilder",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'padding_top',
		'padding-right'  => 'padding_right',
		'padding-bottom' => 'padding_bottom',
		'padding-left' 	 => 'padding_left',
	),
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-download-count-for-beaverbuilder",
) );