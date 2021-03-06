<?php
/**
 * Photo Overlay Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

// Background Color.
$background_color = isset( $settings->overlay_background_color ) ? esc_attr( $settings->overlay_background_color ) : 'FFFFFF';
$background_color = BBVapor_Modules_Pro::get_color( $background_color );

// Text Color.
$text_color = isset( $settings->overlay_text_color ) ? esc_attr( $settings->overlay_text_color ) : '000000';
$text_color = BBVapor_Modules_Pro::get_color( $text_color );

// Padding.
$padding_dimensions = isset( $settings->overlay_padding_top ) ? $settings->overlay_padding_top : false;
$padding            = 0;
if ( false !== $padding_dimensions ) {
	$padding = sprintf( '%dpx %dpx %dpx %dpx', $settings->overlay_padding_top, $settings->overlay_padding_right, $settings->overlay_padding_bottom, $settings->overlay_padding_left );
}
?>
@keyframes bbvm-fadein {
	from { opacity: 0; }
	to   { opacity: 1; }
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo {
	position: relative;
	overflow: hidden;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo figure,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo figure {
	position: relative;
	display: inline-block;
	padding: 0;
	margin: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo figcaption {
	padding; 0;
	margin: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo.horizontal {
	position: relative;
	box-sizing: border-box;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo.horizontal figcaption.top {
	background-color: <?php echo esc_html( $background_color ); ?>;
	color: <?php echo esc_html( $text_color ); ?>;
	position: absolute;
	width: 100%;
	top: 0;
	left: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo.horizontal.fade figcaption.top {
	background-color: <?php echo esc_html( $background_color ); ?>;
	color: <?php echo esc_html( $text_color ); ?>;
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
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo.horizontal.middle figure {
	position: relative;
	display: flex;
	align-items: center;
	justify-content: center;
	text-align: center;
	object-fit: cover;
	width: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo.horizontal.middle figure img {
	width: 100%;
	object-fit: cover;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo.horizontal.middle figcaption {
	background-color: <?php echo esc_html( $background_color ); ?>;
	color: <?php echo esc_html( $text_color ); ?>;
	position: absolute;
	width: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo.horizontal.middle.fade figcaption {
	background-color: <?php echo esc_html( $background_color ); ?>;
	color: <?php echo esc_html( $text_color ); ?>;
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
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo.horizontal figcaption.bottom {
	background-color: <?php echo esc_html( $background_color ); ?>;
	color: <?php echo esc_html( $text_color ); ?>;
	position: absolute;
	width: 100%;
	bottom: 0;
	left: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo.horizontal.fade figcaption.bottom {
	background-color: <?php echo esc_html( $background_color ); ?>;
	color: <?php echo esc_html( $text_color ); ?>;
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
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo.full figcaption {
	display: flex;
	align-items: center;
	justify-content: center;
	position: absolute;
	background-color: <?php echo esc_html( $background_color ); ?>;
	color: <?php echo esc_html( $text_color ); ?>;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-overlay-photo.full.fade figcaption {
	display: flex;
	align-items: center;
	justify-content: center;
	position: absolute;
	background-color: <?php echo esc_html( $background_color ); ?>;
	color: <?php echo esc_html( $text_color ); ?>;
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
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'image_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-overlay-photo, .fl-node-$id .fl-bbvm-overlay-photo img",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'image_padding_top',
			'padding-right'  => 'image_padding_right',
			'padding-bottom' => 'image_padding_bottom',
			'padding-left'   => 'image_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'overlay_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-overlay-text",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'overlay_padding_top',
			'padding-right'  => 'overlay_padding_right',
			'padding-bottom' => 'overlay_padding_bottom',
			'padding-left'   => 'overlay_padding_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'overlay_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-overlay-text .fl-bbvm-overlay-text-content *",
	)
);
