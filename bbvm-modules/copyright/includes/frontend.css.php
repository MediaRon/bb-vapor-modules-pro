<?php
// Background Color
$background_color = isset( $settings->copyright_background_color ) ? esc_attr( $settings->copyright_background_color ) : 'FFFFFF';
if( 6 === strlen( $background_color ) ) {
	$background_color = '#' . $background_color;
}

// Text Color
$text_color = isset( $settings->copyright_text_color ) ? esc_attr( $settings->copyright_text_color ) : '000000';
if( 6 === strlen( $text_color ) ) {
	$text_color = '#' . $text_color;
}

// Padding
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'copyright_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-copyright-for-beaverbuilder",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'copyright_padding_top',
		'padding-right'  => 'copyright_padding_right',
		'padding-bottom' => 'copyright_padding_bottom',
		'padding-left' 	 => 'copyright_padding_left',
	),
) );
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-copyright-for-beaverbuilder {
	background-color: <?php echo $background_color; ?>;
	color: <?php echo $text_color; ?>;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'copyright_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-copyright-for-beaverbuilder",
) );