<?php
/**
 * Button Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-button-for-beaverbuilder-wrapper {
	text-align: <?php echo esc_html( $settings->button_alignment ); ?>;
}

.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-button-for-beaverbuilder.bbvm-button {
	display: inline-block;
	position: relative;
	padding: 10px 20px;
	box-sizing: border-box;
}
@-webkit-keyframes anim-trinculo {
	50% {
		opacity: 0;
		-webkit-transform: translate3d(100%, 0, 0);
		transform: translate3d(100%, 0, 0);
	}
	51% {
		opacity: 0;
		-webkit-transform: translate3d(-100%, 0, 0);
		transform: translate3d(-100%, 0, 0);
	}
	75% {
		opacity: 1;
		-webkit-transform: translate3d(5px, 0, 0);
		transform: translate3d(5px, 0, 0);
	}
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
}
@keyframes anim-trinculo {
	50% {
		opacity: 0;
		-webkit-transform: translate3d(100%, 0, 0);
		transform: translate3d(100%, 0, 0);
	}
	51% {
		opacity: 0;
		-webkit-transform: translate3d(-100%, 0, 0);
		transform: translate3d(-100%, 0, 0);
	}
	75% {
		opacity: 1;
		-webkit-transform: translate3d(5px, 0, 0);
		transform: translate3d(5px, 0, 0);
	}
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
}
@-webkit-keyframes anim-valentine-width {
	0% {
		opacity: 0;
		width: 0%;
	}
	25% {
		opacity: 0.2;
		width: 25%;
	}
	50% {
		opacity: 0.4;
		width: 50%;
	}
	75% {
		opacity: 0.6;
		width: 75%;
	}
	100% {
		opacity: 1;
		width: 100%;
	}
}
@keyframes anim-valentine-width {
	0% {
		opacity: 0;
		width: 0%;
	}
	25% {
		opacity: 0.2;
		width: 25%;
	}
	50% {
		opacity: 0.4;
		width: 50%;
	}
	75% {
		opacity: 0.6;
		width: 75%;
	}
	100% {
		opacity: 1;
		width: 100%;
	}
}
@-webkit-keyframes anim-valentine-height {
	0% {
		opacity: 0;
		height: 0%;
	}
	25% {
		opacity: 0.2;
		height: 25%;
	}
	50% {
		opacity: 0.4;
		height: 50%;
	}
	75% {
		opacity: 0.6;
		height: 75%;
	}
	100% {
		opacity: 1;
		height: 100%;
	}
}
@keyframes anim-valentine-height {
	0% {
		opacity: 0;
		height: 0%;
	}
	25% {
		opacity: 0.2;
		height: 25%;
	}
	50% {
		opacity: 0.4;
		height: 50%;
	}
	75% {
		opacity: 0.6;
		height: 75%;
	}
	100% {
		opacity: 1;
		height: 100%;
	}
}
<?php
$background_color       = false;
$background_color_hover = false;
$background_type        = $settings->button_background_type;
if ( 'color' === $background_type ) {
	$background_color = isset( $settings->button_background_color ) ? esc_attr( $settings->button_background_color ) : 'FFFFFF';
	$background_color = BBVapor_Modules_Pro::get_color( $background_color );

	$background_color_hover = isset( $settings->button_background_color_hover ) ? esc_attr( $settings->button_background_color_hover ) : 'FFFFFF';
	$background_color_hover = BBVapor_Modules_Pro::get_color( $background_color_hover );
}
if ( 'transparent' !== $background_type ) {
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'button_border',
			'selector'     => ".fl-node-$id .fl-bbvm-button-for-beaverbuilder",
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'button_radius',
			'selector'     => ".fl-node-$id .fl-bbvm-button-for-beaverbuilder.bbvm-button",
			'unit'         => 'px',
			'props'        => array(
				'border-top-left-radius'     => 'button_radius_top',
				'border-top-right-radius'    => 'button_radius_right',
				'border-bottom-left-radius'  => 'button_radius_bottom',
				'border-bottom-right-radius' => 'button_radius_left',
			),
		)
	);
}
?>
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?> {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color ) ); ?>;
	text-decoration: none;
	<?php
	if ( 'color' === $background_type ) {
		?>
		background-color: <?php echo esc_html( $background_color ); ?>;
		<?php
	} elseif ( 'gradient' === $background_type ) {
		?>
	background-image: <?php echo FLBuilderColor::gradient( $settings->button_background_gradient ); // phpcs:ignore ?>;
	transition: color 1s;
		<?php
	}
	?>
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>:hover {
	color: #<?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color_hover ) ); ?>;
	text-decoration: none;
	<?php
	if ( 'color' === $background_type ) {
		?>
		background: <?php echo esc_html( $background_color_hover ); ?>;
		<?php
	} elseif ( 'gradient' === $background_type ) {
		?>
	background-image: <?php echo FLBuilderColor::gradient( $settings->button_background_gradient_hover ); // phpcs:ignore ?>;
		<?php
	}
	?>
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.iris:not(:hover):before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	top: 0;
	left: 0;
	content: '';
	position: absolute;
	width: 10px;
	height: 10px;
	transform: translate3d(0,0,0);
	border-style: solid;
	border-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
	border-width: 2px 0 0 2px;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.iris:not(:hover):after {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	right: 0;
	bottom: 0;
	content: '';
	position: absolute;
	width: 10px;
	height: 10px;
	transform: translate3d(0,0,0);
	border-style: solid;
	border-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
	border-width: 0 2px 2px 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.prospero:not(:hover):before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	content: '';
	display: block;
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 2px;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.ferdinand:not(:hover):before {
	content: '';
	position: absolute;
	bottom: 0;
	right: 0;
	width: 100%;
	height: 2px;
	-webkit-transform: scale3d(0,5,1);
	transform: scale3d(0,5,1);
	-webkit-transform-origin: 0% 50%;
	transform-origin: 0% 50%;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.francisco:not(:hover):before {
	content: '';
	position: absolute;
	bottom: 100%;
	left: 0;
	width: 100%;
	height: 2px;
	opacity: 0;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
	opacity: 1;
	bottom: 0;
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.sebastion:not(:hover):before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 2px;
	transform: scale3d(1,1,1);
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.sebastion:not(:hover):after {
	content: '';
	position: absolute;
	width: 100%;
	height: 2px;
	-webkit-transform: scale3d(1,1,1);
	top: auto;
	bottom: 0;
	right: 0;
	-webkit-transform-origin: 100% 50%;
	transform-origin: 100% 50%;
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.trinculo:not(:hover) span {
	display: inline-block;
	-webkit-animation: anim-trinculo 0.6s forwards;
	animation: anim-trinculo 0.6s forwards;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.trinculo:not(:hover):before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	content: '';
	display: block;
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 4px;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.valentine:not(:hover):before {
	content: '';
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	width: 2px;
	-webkit-animation: anim-valentine-height 0.6s forwards;
	animation: anim-valentine-height 0.6s forwards;
	height: 100%;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.valentine:not(:hover):after {
	content: '';
	display: block;
	position: absolute;
	top: 0;
	right: 0;
	width: 2px;
	-webkit-animation: anim-valentine-height 0.6s forwards;
	animation: anim-valentine-height 0.6s forwards;
	height: 100%;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.valentine:not(:hover) span:after {
	content: '';
	display: block;
	position: absolute;
	top: 0;
	right: 0;
	height: 2px;
	-webkit-animation: anim-valentine-width 0.6s forwards;
	animation: anim-valentine-width 0.6s forwards;
	width: 100%;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.valentine:not(:hover) span:before {
	content: '';
	display: block;
	position: absolute;
	left: 0;
	bottom: 0;
	height: 2px;
	-webkit-animation: anim-valentine-width 0.6s forwards;
	animation: anim-valentine-width 0.6s forwards;
	width: 100%;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.stephano:not(:hover):before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	opacity: 1;
	bottom: -10px;
	left: 0;
	-webkit-transform-origin: left bottom;
	transform-origin: left bottom;
	-webkit-transform: rotate3d(0,0,1,-90deg);
	transform: rotate3d(0,0,1,-90deg);
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
	content: '';
	position: absolute;
	width: 10px;
	height: 2px;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.stephano:not(:hover) span:before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	opacity: 1;
	-webkit-transform: translate3d(0,0,0);
	-webkit-transform: translate3d(0,10px,0);
	transform: translate3d(0,10px,0);
	transition: transform 0.3s,opacity 0.3s;
	left: 0;
	content: '';
	position: absolute;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
	bottom: 0;
	width: 100%;
	height: 2px;
}
.fl-node-<?php echo esc_html( $id ); ?> .transparent.stephano:not(:hover):after {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	-webkit-transform: rotate3d(0,0,1,90deg);
	transform: rotate3d(0,0,1,90deg);
	transition: transform 0.3s,opacity 0.3s;
	-webkit-transform-origin: right bottom;
	transform-origin: right bottom;
	content: '';
	position: absolute;
	width: 10px;
	height: 2px;
	right: 0;
	bottom: -10px;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>:hover:before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	display: none;
	height: auto;
	width: auto;
	top: inherit;
	bottom: inherit;
	background: transparent;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>:hover:after {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	display: none;
	height: auto;
	width: auto;
	top: inherit;
	bottom: inherit;
	background: transparent;
}
.fl-node-<?php echo esc_html( $id ); ?> #<?php echo esc_html( $settings->button_id ); ?>:hover span:before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	display: none;
	height: auto;
	width: auto;
	top: inherit;
	bottom: inherit;
	background: transparent;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-iris:hover:before {
	display: inline-block;
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	top: 0;
	left: 0;
	content: '';
	position: absolute;
	width: 10px;
	height: 10px;
	transform: translate3d(0,0,0);
	border-style: solid;
	border-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
	border-width: 2px 0 0 2px;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-iris:hover:after {
	display: inline-block;
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	right: 0;
	bottom: 0;
	content: '';
	position: absolute;
	width: 10px;
	height: 10px;
	transform: translate3d(0,0,0);
	border-style: solid;
	border-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
	border-width: 0 2px 2px 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-prospero:hover:before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	content: '';
	display: block;
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 2px;
	background: #<?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-trinculo:hover span {
	display: inline-block;
	-webkit-animation: anim-trinculo 0.6s forwards;
	animation: anim-trinculo 0.6s forwards;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-trinculo:hover:before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	content: '';
	display: block;
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 4px;
	max-height: 4px;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-trinculo:hover span:after {
	display: none;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-valentine:hover {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-valentine:hover:before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	content: '';
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	width: 2px;
	-webkit-animation: anim-valentine-height 0.6s forwards;
	animation: anim-valentine-height 0.6s forwards;
	height: 100%;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-valentine:hover:after {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	content: '';
	display: block;
	position: absolute;
	top: 0;
	right: 0;
	width: 2px;
	-webkit-animation: anim-valentine-height 0.6s forwards;
	animation: anim-valentine-height 0.6s forwards;
	height: 100%;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-valentine:hover span:after {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	content: '';
	display: block;
	position: absolute;
	top: 0;
	right: 0;
	height: 2px;
	-webkit-animation: anim-valentine-width 0.6s forwards;
	animation: anim-valentine-width 0.6s forwards;
	width: 100%;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-valentine:hover span:before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	content: '';
	display: block;
	position: absolute;
	left: 0;
	bottom: 0;
	height: 2px;
	-webkit-animation: anim-valentine-width 0.6s forwards;
	animation: anim-valentine-width 0.6s forwards;
	width: 100%;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-ferdinand:hover:before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	display: inline-block;
	content: '';
	position: absolute;
	bottom: 0;
	right: 0;
	width: 100%;
	height: 2px;
	-webkit-transform: scale3d(0,5,1);
	transform: scale3d(0,5,1);
	-webkit-transform-origin: 0% 50%;
	transform-origin: 0% 50%;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-francisco:hover:before {
	display: inline-block;
	content: '';
	position: absolute;
	bottom: 100%;
	left: 0;
	width: 100%;
	height: 2px;
	opacity: 0;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
	opacity: 1;
	bottom: 0;
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-sebastion:hover:before {
	display: inline-block;
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 2px;
	transform: scale3d(1,1,1);
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-sebastion:hover:after {
	display: inline-block;
	content: '';
	position: absolute;
	right: 0;
	width: 100%;
	height: 2px;
	-webkit-transform: scale3d(1,1,1);
	top: auto;
	bottom: 0;
	-webkit-transform-origin: 100% 50%;
	transform-origin: 100% 50%;
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-stephano:hover:before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	display: inline-block;
	opacity: 1;
	bottom: -10px;
	left: 0;
	-webkit-transform-origin: left bottom;
	transform-origin: left bottom;
	-webkit-transform: rotate3d(0,0,1,-90deg);
	transform: rotate3d(0,0,1,-90deg);
	background-color: #<?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
	border-color: #<?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
	content: '';
	position: absolute;
	width: 10px;
	height: 2px;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-stephano:hover span:before {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	display: inline-block;
	opacity: 1;
	-webkit-transform: translate3d(0,0,0);
	-webkit-transform: translate3d(0,10px,0);
	transform: translate3d(0,10px,0);
	transition: transform 0.3s,opacity 0.3s;
	left: 0;
	content: '';
	position: absolute;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
	border-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
	bottom: 0;
	width: 100%;
	height: 2px;
}
.fl-node-<?php echo esc_html( $id ); ?> .hover-stephano:hover:after {
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	display: inline-block;
	-webkit-transform: rotate3d(0,0,1,90deg);
	transform: rotate3d(0,0,1,90deg);
	transition: transform 0.3s,opacity 0.3s;
	-webkit-transform-origin: right bottom;
	transform-origin: right bottom;
	content: '';
	position: absolute;
	width: 10px;
	height: 2px;
	right: 0;
	bottom: -10px;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
	border-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_style_border_color_hover ) ); ?>;
}
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-button-for-beaverbuilder.bbvm-button",
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
		'selector'     => ".fl-node-$id .fl-bbvm-button-for-beaverbuilder.bbvm-button",
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
		'selector'     => ".fl-node-$id .fl-bbvm-button-for-beaverbuilder.bbvm-button",
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-button-for-beaverbuilder.bbvm-button",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'min-width' => $settings->button_min_width . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-button-for-beaverbuilder.bbvm-button",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'min-width' => $settings->button_min_width_medium . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .fl-bbvm-button-for-beaverbuilder.bbvm-button",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'min-width' => $settings->button_min_width_responsive . 'px',
		),
	)
);
