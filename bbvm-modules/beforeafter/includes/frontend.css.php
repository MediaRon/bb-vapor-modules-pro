<?php
$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
$background_color = BBVapor_Modules_Pro::get_color( $background_color );

$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
$text_color = BBVapor_Modules_Pro::get_color( $text_color );

FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'typography',
		'selector'     => ".fl-node-$id .fl-bbvm-beforeafter-for-beaverbuilder .text-before, .fl-node-$id .fl-bbvm-beforeafter-for-beaverbuilder .text-after",
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-before,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-after {
	color: <?php echo esc_html( $text_color ); ?>;
	background: <?php echo esc_html( $background_color ); ?>;
	padding: 10px 20px;
	display: inline-block;
}
<?php
if ( 'no' === $settings->show_before_after_text ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-before,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-after {
	display: none;
}
	<?php
endif;
if ( 'hover' === $settings->style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .beforeafter-wrapper {
	text-align: center;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .beforeafter-wrapper figure {
	position: relative;
	display: inline-block;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure .after {
	visibility: hidden;
	opacity: 0;
	width: 0;
	height: 0;
	transition: visibility 0s, opacity <?php echo absint( $settings->transition_delay ); ?>s linear;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-before,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-after {
	position: absolute;
	top: 20px;
	left: 50%;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	transform: translateX(-50%);
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure .before {
	visibility: visible;
	opacity: 1;
	width: auto;
	height: auto;
	transition: visibility 0s, opacity <?php echo absint( $settings->transition_delay ); ?>s linear;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure:hover {
	z-index: 1;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure:hover .before {
	visibility: hidden;
	opacity: 0;
	width: 0;
	height: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure:hover .after {
	visibility: visible;
	opacity: 1;
	width: auto;
	height: auto;
}
	<?php
endif;
if ( 'fade' === $settings->style ) :
	?>
@keyframes bbvm-before-after-fadeIn {
	0% {opacity: 0}
	25% {opacity: 0.5;}
	50% { opacity: 1 }
	75% { opacity: 0.5 }
	100% {opacity: 0;}
}
@keyframes bbvm-before-after-fadeOut {
	0% {opacity: 1}
	25% {opacity: 0.5;}
	50% { opacity: 0 }
	75% { opacity: 0.5 }
	100% {opacity: 1;}
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-before,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-after {
	position: absolute;
	top: 20px;
	left: 50%;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	transform: translateX(-50%);
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .beforeafter-wrapper figure {
	position: relative;
	display: block;
	text-align: center;
	margin: 0 auto;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure .after {
	position: absolute;
	visibility: visible;
	opacity: 1;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	z-index: 1;
	-webkit-animation: bbvm-before-after-fadeIn <?php echo absint( $settings->transition_delay ); ?>s infinite;
	-moz-animation:    bbvm-before-after-fadeIn <?php echo absint( $settings->transition_delay ); ?>s infinite;
	-o-animation:      bbvm-before-after-fadeIn <?php echo absint( $settings->transition_delay ); ?>s infinite;
	animation: 		   bbvm-before-after-fadeIn <?php echo absint( $settings->transition_delay ); ?>s infinite;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure .before {
	position: absolute;
	visibility: visible;
	opacity: 1;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	z-index: 2;
	-webkit-animation: bbvm-before-after-fadeOut <?php echo absint( $settings->transition_delay ); ?>s infinite;
	-moz-animation:    bbvm-before-after-fadeOut <?php echo absint( $settings->transition_delay ); ?>s infinite;
	-o-animation:      bbvm-before-after-fadeOut <?php echo absint( $settings->transition_delay ); ?>s infinite;
	animation: 		   bbvm-before-after-fadeOut <?php echo absint( $settings->transition_delay ); ?>s infinite;
}
	<?php
endif;
if ( 'side' === $settings->style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .beforeafter-wrapper figure {
	position: relative;
	display: flex;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .beforeafter-wrapper figure > div {
	position: relative;
	width: 50%;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-before,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-after {
	position: absolute;
	bottom: 20px;
	left: 50%;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	transform: translateX(-50%);
}
	<?php
endif;
$separator_line_color = isset( $settings->separator_line_color ) ? esc_attr( $settings->separator_line_color ) : 'FFFFFF';
$separator_line_color = BBVapor_Modules_Pro::get_color( $separator_line_color );

$separator_background_color = isset( $settings->separator_background_color ) ? esc_attr( $settings->separator_background_color ) : 'FFFFFF';
$separator_background_color = BBVapor_Modules_Pro::get_color( $separator_background_color );

$separator_arrow_color = isset( $settings->separator_arrow_color ) ? esc_attr( $settings->separator_arrow_color ) : 'FFFFFF';
$separator_arrow_color = BBVapor_Modules_Pro::get_color( $separator_arrow_color );

if ( 'separator_horizontal' === $settings->style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-before,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-after {
	position: absolute;
	left: 20px;
	top: 50%;
	-webkit-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	transform: translateY(-50%);
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-after {
	left: auto;
	right: 20px;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .beforeafter-wrapper figure {
	position: relative;
	display: block;
	overflow: hidden;
	margin: 0 auto;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure .after {
	position: absolute;
	visibility: visible;
	opacity: 1;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	z-index: 1;
	background-image: url(<?php echo esc_url( $settings->image_after_src ); ?>);
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure .before {
	position: absolute;
	visibility: visible;
	opacity: 1;
	width: 50%;
	height: 100%;
	top: 0;
	left: 0;
	z-index: 2;
	background-image: url(<?php echo esc_url( $settings->image_before_src ); ?>);
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-horizontal-handle {
	position: absolute;
	left: 50%;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	transform: translateX(-50%);
	background-color: rgba(0,0,0,0.5);
	height: 100%;
	z-index: 20;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-horizontal-handle span.circle {
	position: absolute;
	left: 50%;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	transform: translateX(-50%);
	top: 50%;
	-webkit-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	transform: translateY(-50%);
	border-color: <?php echo esc_html( $separator_line_color ); ?>;
	border-width: 3px;
	<?php if ( 'circular' === $settings->separator_style ) : ?>
	border-radius: 100px;
	<?php endif; ?>
	height: 50px;
	width: 50px;
	margin-left: -25px;
	border: 3px solid <?php echo esc_html( $separator_line_color ); ?>;
	background: <?php echo esc_html( $separator_background_color ); ?>;
	z-index: 4;
	cursor: pointer;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-horizontal-handle span.circle .left-arrow {
	position: absolute;
	top: 50%;
	-webkit-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	transform: translateY(-50%);
	color: <?php echo esc_html( $separator_arrow_color ); ?>;
	font-weight: 900;
	left: 10px;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-horizontal-handle span.circle .right-arrow {
	position: absolute;
	top: 50%;
	-webkit-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	transform: translateY(-50%);
	color: <?php echo esc_html( $separator_arrow_color ); ?>;
	font-weight: 900;
	right: 10px;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-horizontal-handle:before,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-horizontal-handle:after {
	content: '';
	position: absolute;
	width: 3px;
	height: 9999px;
	left: 50%;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	transform: translateX(-50%);
	background: <?php echo esc_html( $separator_line_color ); ?>;
}
	<?php
endif;
if ( 'separator_vertical' === $settings->style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-before,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-after {
	position: absolute;
	top: 20px;
	left: 50%;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	transform: translateX(-50%);
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .text-after {
	top: auto;
	bottom: 20px;
	left: 50%;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	transform: translateX(-50%);
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .beforeafter-wrapper figure {
	position: relative;
	display: block;
	margin: 0 auto;
	overflow: hidden;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure .after {
	position: absolute;
	visibility: visible;
	opacity: 1;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	z-index: 1;
	background-image: url(<?php echo esc_url( $settings->image_after_src ); ?>);
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure .before {
	position: absolute;
	visibility: visible;
	opacity: 1;
	width: 100%;
	height: 50%;
	top: 0;
	left: 0;
	z-index: 2;
	background-image: url(<?php echo esc_url( $settings->image_before_src ); ?>);
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-vertical-handle {
	position: absolute;
	top: 50%;
	-webkit-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	transform: translateY(-50%);
	background-color: rgba(0,0,0,0.5);
	width: 100%;
	z-index: 20;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-vertical-handle span.circle {
	position: absolute;
	top: 50%;
	-webkit-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	transform: translateY(-50%);
	left: 50%;

	border-color: <?php echo esc_html( $separator_line_color ); ?>;
	border-width: 3px;
	<?php if ( 'circular' === $settings->separator_style ) : ?>
	border-radius: 100px;
	<?php endif; ?>
	height: 50px;
	width: 50px;
	margin-left: -25px;
	border: 3px solid <?php echo esc_html( $separator_line_color ); ?>;
	background: <?php echo esc_html( $separator_background_color ); ?>;
	z-index: 4;
	cursor: pointer;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-vertical-handle span.circle .left-arrow {
	position: absolute;
	left: 50%;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	transform: translateX(-50%);
	top: 2px;
	color: <?php echo esc_html( $separator_arrow_color ); ?>;
	font-weight: 900;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-vertical-handle span.circle .right-arrow {
	position: absolute;
	left: 50%;
	-webkit-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	transform: translateX(-50%);
	bottom: 2px;
	color: <?php echo esc_html( $separator_arrow_color ); ?>;
	font-weight: 900;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-vertical-handle:before,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .bbvm-vertical-handle:after {
	content: '';
	position: absolute;
	height: 3px;
	width: 9999px;
	top: 50%;
	-webkit-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	transform: translateY(-50%);
	background: <?php echo esc_html( $separator_line_color ); ?>;
}
	<?php
endif;
