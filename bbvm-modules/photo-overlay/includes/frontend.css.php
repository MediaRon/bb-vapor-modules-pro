<?php
// Background Color
$background_color = isset( $settings->overlay_background_color ) ? esc_attr( $settings->overlay_background_color ) : 'FFFFFF';
if( 6 === strlen( $background_color ) ) {
	$background_color = '#' . $background_color;
}

// Text Color
$text_color = isset( $settings->overlay_text_color ) ? esc_attr( $settings->overlay_text_color ) : '000000';
if( 6 === strlen( $text_color ) ) {
	$text_color = '#' . $text_color;
}

// Padding
$padding_dimensions = isset( $settings->overlay_padding_top ) ? $settings->overlay_padding_top : false;
$padding = 0;
if ( false !== $padding_dimensions ) {
	$padding = sprintf( '%dpx %dpx %dpx %dpx', $settings->overlay_padding_top, $settings->overlay_padding_right, $settings->overlay_padding_bottom, $settings->overlay_padding_left );
}
?>
@keyframes bbvm-fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo {
	position: relative;
	overflow: hidden;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo figure {
	position: relative;
	display: inline-block;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo.horizontal {
	position: relative;
	box-sizing: border-box;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo.horizontal figcaption.top {
	background-color: <?php echo $background_color; ?>;
	color: <?php echo $text_color; ?>;
	position: absolute;
	width: 100%;
	top: 0;
	left: 0;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo.horizontal.fade figcaption.top {
	background-color: <?php echo $background_color; ?>;
	color: <?php echo $text_color; ?>;
	position: absolute;
	width: 100%;
	opacity: 0;
	top: 0;
	left: 0;
	-webkit-animation: bbvm-fadein 2s;
	-moz-animation: bbvm-fadein 2s;
	-ms-animation: bbvm-fadein 2s;
	-o-animation: bbvm-fadein 2s;
	animation: bbvm-fadein 2s;
	opacity: 1;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo.horizontal.middle figure {
	position: relative;
	display: flex;
	align-items: center;
	justify-content: center;
	text-align: center;
	object-fit: cover;
	width: 100%;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo.horizontal.middle figure img {
	width: 100%;
	object-fit: cover;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo.horizontal.middle figcaption {
	background-color: <?php echo $background_color; ?>;
	color: <?php echo $text_color; ?>;
	position: absolute;
	width: 100%;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo.horizontal.middle.fade figcaption {
	background-color: <?php echo $background_color; ?>;
	color: <?php echo $text_color; ?>;
	position: absolute;
	width: 100%;
	opacity: 0;
	-webkit-animation: bbvm-fadein 2s;
	-moz-animation: bbvm-fadein 2s;
	-ms-animation: bbvm-fadein 2s;
	-o-animation: bbvm-fadein 2s;
	animation: bbvm-fadein 2s;
	opacity: 1;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo.horizontal figcaption.bottom {
	background-color: <?php echo $background_color; ?>;
	color: <?php echo $text_color; ?>;
	position: absolute;
	width: 100%;
	bottom: 0;
	left: 0;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo.horizontal.fade figcaption.bottom {
	background-color: <?php echo $background_color; ?>;
	color: <?php echo $text_color; ?>;
	position: absolute;
	width: 100%;
	bottom: 0;
	left: 0;
	opacity: 0;
	-webkit-animation: bbvm-fadein 2s;
	-moz-animation: bbvm-fadein 2s;
	-ms-animation: bbvm-fadein 2s;
	-o-animation: bbvm-fadein 2s;
	animation: bbvm-fadein 2s;
	opacity: 1;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo.full figcaption {
	display: flex;
	align-items: center;
	justify-content: center;
	position: absolute;
	background-color: <?php echo $background_color; ?>;
	color: <?php echo $text_color; ?>;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-overlay-photo.full.fade figcaption {
	display: flex;
	align-items: center;
	justify-content: center;
	position: absolute;
	background-color: <?php echo $background_color; ?>;
	color: <?php echo $text_color; ?>;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	opacity: 0;
	-webkit-animation: bbvm-fadein 2s;
	-moz-animation: bbvm-fadein 2s;
	-ms-animation: bbvm-fadein 2s;
	-o-animation: bbvm-fadein 2s;
	animation: bbvm-fadein 2s;
	opacity: 1;
}

<?php
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'overlay_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-overlay-text",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'overlay_padding_top',
		'padding-right'  => 'overlay_padding_right',
		'padding-bottom' => 'overlay_padding_bottom',
		'padding-left' 	 => 'overlay_padding_left',
	),
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'overlay_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-overlay-text",
) );