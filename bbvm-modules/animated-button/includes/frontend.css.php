.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-button-for-beaverbuilder-wrapper {
	text-align: <?php echo esc_html( $settings->button_alignment ); ?>;
}

.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-button-for-beaverbuilder.bbvm-button {
	display: inline-block;
	position: relative;
	padding: 10px 20px;
	box-sizing: border-box;
}
@-webkit-keyframes hvr-back-pulse {
	50% {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->animation_type_background_color ) ); ?>;
	}
}
@keyframes hvr-back-pulse {
	50% {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->animation_type_background_color ) ); ?>;
	}
}
<?php
$background_color = isset( $settings->button_background_color ) ? esc_attr( $settings->button_background_color ) : 'FFFFFF';
$background_color = BBVapor_Modules_Pro::get_color( $background_color );

$background_color_hover = isset( $settings->button_background_color_hover ) ? esc_attr( $settings->button_background_color_hover ) : 'FFFFFF';
$background_color_hover = BBVapor_Modules_Pro::get_color( $background_color_hover );

$button_style_border_color_hover = isset( $settings->button_style_border_color_hover ) ? esc_attr( $settings->button_style_border_color_hover ) : 'FFFFFF';
$button_style_border_color_hover = BBVapor_Modules_Pro::get_color( $button_style_border_color_hover );

$button_style_border_color = isset( $settings->button_style_border_color ) ? esc_attr( $settings->button_style_border_color ) : 'FFFFFF';
$button_style_border_color = BBVapor_Modules_Pro::get_color( $button_style_border_color );

$shadow_and_glow_color = isset( $settings->shadow_and_glow_color ) ? esc_attr( $settings->shadow_and_glow_color ) : 'FFFFFF';
$shadow_and_glow_color = BBVapor_Modules_Pro::get_color( $shadow_and_glow_color );

?>
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?> {
	color: #<?php echo esc_html( $settings->button_text_color ); ?>;
	background: <?php echo esc_html( $background_color ); ?>;
}

.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-fade {
	background: <?php echo esc_html( $background_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-fade:hover {
	background: <?php echo esc_html( $background_color_hover ); ?>;
}

.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-back-pulse {
	background: <?php echo esc_html( $background_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-back-pulse:hover {
	background: <?php echo esc_html( $background_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-background:before {
	background: <?php echo esc_html( $background_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-background:hover:before {
	background: <?php echo esc_html( $background_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-radial-out {
	background: <?php echo esc_html( $background_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-radial-out:hover:before {
	background: <?php echo esc_html( $background_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-radial-in:hover {
	background: <?php echo esc_html( $background_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-radial-in:hover:before {
	background: <?php echo esc_html( $animation_type_background_color ); ?>;
	visibility: visible;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-rectangle-in:hover {
	background: <?php echo esc_html( $background_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-rectangle-in:hover:before {
	background: <?php echo esc_html( $background_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-shutter-in-horizontal:hover:before {
	background: <?php echo esc_html( $animation_type_background_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-shutter-in-horizontal:hover {
	background: <?php echo esc_html( $background_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-shutter-out-horizontal:hover:before {
	background: <?php echo esc_html( $background_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-shutter-out-horizontal:hover {
	background: <?php echo esc_html( $background_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-shutter-in-vertical:hover:before {
	background: <?php echo esc_html( $background_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-shutter-in-vertical:hover {
	background: <?php echo esc_html( $background_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-shutter-out-vertical:hover:before {
	background: <?php echo esc_html( $background_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-shutter-out-vertical:hover {
	background: <?php echo esc_html( $background_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-border-fade:hover {
	box-shadow: inset 0 0 0 4px <?php echo esc_html( $button_style_border_color_hover ); ?>, 0 0 1px rgba(0, 0, 0, 0);
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-hollow:hover {
	box-shadow: inset 0 0 0 4px <?php echo esc_html( $button_style_border_color_hover ); ?>, 0 0 1px rgba(0, 0, 0, 0);
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-trim:hover:before {
	border: <?php echo esc_html( $button_style_border_color_hover ); ?> solid 4px;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-ripple-out:before {
	border: <?php echo esc_html( $button_style_border_color ); ?> solid 6px;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-ripple-out:hover:before {
	border: <?php echo esc_html( $button_style_border_color_hover ); ?> solid 6px;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-ripple-in:hover:before {
	border: <?php echo esc_html( $button_style_border_color_hover ); ?> solid 6px;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-outline-out:before {
	border: <?php echo esc_html( $button_style_border_color ); ?> solid 4px;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-outline-in:before {
	border: <?php echo esc_html( $button_style_border_color_hover ); ?> solid 4px;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-underline-from-left:before {
	background: <?php echo esc_html( $button_style_border_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-underline-from-center:before {
	background: <?php echo esc_html( $button_style_border_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-underline-from-right:before {
	background: <?php echo esc_html( $button_style_border_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-reveal:before {
	border-color: <?php echo esc_html( $button_style_border_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-underline-reveal:before {
	background: <?php echo esc_html( $button_style_border_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-overline-reveal:before {
	background: <?php echo esc_html( $button_style_border_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-overline-from-left:before,
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-overline-from-center:before,
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-overline-from-right:before {
	background: <?php echo esc_html( $button_style_border_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-shadow:hover,
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-grow-shadow:hover {
	box-shadow: 0 10px 10px -10px <?php echo esc_html( $shadow_and_glow_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-float-shadow:hover:before {
	background: -webkit-radial-gradient(center, ellipse, <?php echo esc_html( $shadow_and_glow_color ); ?> 0%, rgba(0, 0, 0, 0) 80%);
	background: radial-gradient(ellipse at center, <?php echo esc_html( $shadow_and_glow_color ); ?> 0%, rgba(0, 0, 0, 0) 80%);
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-glow:hover {
	box-shadow: 0 0 8px <?php echo esc_html( $shadow_and_glow_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-shadow-radial:hover:before {
	background: -webkit-radial-gradient(50% 150%, ellipse, <?php echo esc_html( $shadow_and_glow_color ); ?> 0%, rgba(0, 0, 0, 0) 80%);
	background: radial-gradient(ellipse at 50% 150%, <?php echo esc_html( $shadow_and_glow_color ); ?> 0%, rgba(0, 0, 0, 0) 80%);
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-shadow-radial:hover:after {
	background: -webkit-radial-gradient(50% -50%, ellipse, <?php echo esc_html( $shadow_and_glow_color ); ?> 0%, rgba(0, 0, 0, 0) 80%);
	background: radial-gradient(ellipse at 50% -50%, <?php echo esc_html( $shadow_and_glow_color ); ?> 0%, rgba(0, 0, 0, 0) 80%);
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-box-shadow-outset:hover {
	box-shadow: 2px 2px 2px <?php echo esc_html( $shadow_and_glow_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-box-shadow-inset:hover {
	box-shadow: inset 2px 2px 2px <?php echo esc_html( $shadow_and_glow_color ); ?>, 0 0 1px rgba(0, 0, 0, 0);
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-top:before,
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-float-top:before {
	border-color: transparent transparent <?php echo esc_html( $background_color ); ?> transparent;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-top:hover:before,
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-float-top:hover:before {
	border-color: transparent transparent <?php echo esc_html( $background_color_hover ); ?> transparent;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-right:before,
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-float-right:before {
	border-color: transparent transparent transparent <?php echo esc_html( $background_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-right:hover:before,
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-float-right:hover:before {
	border-color: transparent transparent transparent <?php echo esc_html( $background_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-bottom:before,
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-float-bottom:before {
	border-color: <?php echo esc_html( $background_color ); ?> transparent transparent transparent;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-bottom:hover:before,
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-float-bottom:hover:before {
	border-color: <?php echo esc_html( $background_color_hover ); ?> transparent transparent transparent;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-left:before,
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-float-left:before {
	border-color: transparent <?php echo esc_html( $background_color ); ?> transparent transparent;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-left:hover:before,
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>.hvr-bubble-float-left:hover:before {
	border-color: transparent <?php echo esc_html( $background_color_hover ); ?> transparent transparent;
}

.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?> span {
	display: inline-block;
	position: relative;
	z-index: 2;
}

<?php
if ( 'background' !== $settings->button_animation ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>:hover {
		moz-transition: all .4s ease-in-out;
		-o-transition: all .4s ease-in-out;
		-webkit-transition: all .4s ease-in-out;
		transition: all .4s ease-in-out;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color_hover ) ); ?>;
		background: <?php echo esc_html( $background_color_hover ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>:hover:before {
		moz-transition: inherit;
		-o-transition: inherit;
		-webkit-transition: inherit;
		transition: inherit;
	}
	<?php
} else {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>:hover {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color_hover ) ); ?>;
	}
	<?php
}
?>
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-animated-button-for-beaverbuilder.bbvm-button",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'button_padding_top',
			'padding-right'  => 'button_padding_right',
			'padding-bottom' => 'button_padding_bottom',
			'padding-left'   => 'button_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_margin',
		'selector'     => ".fl-node-$id .fl-bbvm-animated-button-for-beaverbuilder.bbvm-button",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'button_margin_top',
			'margin-right'  => 'button_margin_right',
			'margin-bottom' => 'button_margin_bottom',
			'margin-left'   => 'button_margin_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-animated-button-for-beaverbuilder.bbvm-button",
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-animated-button-for-beaverbuilder.bbvm-button",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'min-width' => $settings->button_min_width . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-animated-button-for-beaverbuilder.bbvm-button",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'min-width' => $settings->button_min_width_medium . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-animated-button-for-beaverbuilder.bbvm-button",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'min-width' => $settings->button_min_width_responsive . 'px',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_radius',
		'selector'     => ".fl-node-$id .fl-bbvm-animated-button-for-beaverbuilder.bbvm-button",
		'unit'         => 'px',
		'props'        => array(
			'border-top-left-radius'     => 'button_radius_top',
			'border-top-right-radius'    => 'button_radius_right',
			'border-bottom-left-radius'  => 'button_radius_bottom',
			'border-bottom-right-radius' => 'button_radius_left',
		),
	)
);
