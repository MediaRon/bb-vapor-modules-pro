<?php
// Background Color
$background_color = isset( $settings->breadcrumb_background_color ) ? esc_attr( $settings->breadcrumb_background_color ) : 'FFFFFF';
$background_color = BBVapor_Modules_Pro::get_color( $background_color );

// Text Color
$text_color = isset( $settings->breadcrumb_text_color ) ? esc_attr( $settings->breadcrumb_text_color ) : '000000';
$text_color = BBVapor_Modules_Pro::get_color( $text_color );

// Link Color
$link_color = isset( $settings->breadcrumb_link_color ) ? esc_attr( $settings->breadcrumb_link_color ) : 'inherit';
$link_color = BBVapor_Modules_Pro::get_color( $link_color );

// Link Hover Color
$link_hover_color = isset( $settings->breadcrumb_link_hover_color ) ? esc_attr( $settings->breadcrumb_link_hover_color ) : 'inherit';
$link_hover_color = BBVapor_Modules_Pro::get_color( $link_hover_color );

// Font
$font        = isset( $settings->breadcrumb_font ) ? $settings->breadcrumb_font : 'inherit';
$font_family = 'inherit';
$font_weight = 'inherit';
if ( is_array( $font ) ) {
	$font_family = $font['family'];
	$font_weight = $font['weight'];
}

// Align
$align = isset( $settings->breadcrumb_text_align ) ? $settings->breadcrumb_text_align : 'left';

// Padding
$padding_dimensions = isset( $settings->breadcrumb_padding_top ) ? $settings->breadcrumb_padding_top : false;
$padding = 0;
if ( false !== $padding_dimensions ) {
	$padding = sprintf( '%dpx %dpx %dpx %dpx', $settings->breadcrumb_padding_top, $settings->breadcrumb_padding_right, $settings->breadcrumb_padding_bottom, $settings->breadcrumb_padding_left );
}
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-breadcrumbs-for-beaverbuilder {
	background-color: <?php echo esc_html( $background_color ); ?>;
	color: <?php echo esc_html( $text_color ); ?>;
	padding: <?php echo esc_html( $padding ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-breadcrumbs-for-beaverbuilder a {
	color: <?php echo esc_html( $link_color ); ?>;
	text-decoration: none;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-breadcrumbs-for-beaverbuilder a:hover {
	color: <?php echo esc_html( $link_hover_color ); ?>;
	text-decoration: none;
}
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'breadcrumb_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-breadcrumbs-for-beaverbuilder",
	)
);
