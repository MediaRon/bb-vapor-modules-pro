<?php
/**
 * Content Scroller Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-responsive-for-beaverbuilder {
	display: none;
}
.ast-container {
	margin: 0 !important;
	padding: 0 !important;
	width: 100% !important;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-for-beaverbuilder {
	display: block;
	position: relative;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-for-beaverbuilder-waypoint {
	position: absolute;
	height: 500px;
	top: 0;
	width: 100%;
	z-index: 400;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-for-beaverbuilder.stuck {

}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-item {
	height: 100%;
	height: 100vh;
	top: 0;
	left: 0;
	width: 100%;
	z-index: 1000;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-item .bbvm-content-scroller-item {
	width: 50%;
	height: 100%;
	height: 100vh;
	float: right;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-item-responsive {
	overflow: hidden;
	position: relative;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-item-responsive .bbvm-content-scroller-content-responsive {
	width: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-wrapper,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-responsive-wrapper {
	width: 50%;
	height: 100%;
	height: 100vh;
	top: 0;
	float: left;
	position: relative;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-wrapper video,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-responsive-wrapper video {
	position: absolute;
	top: 0;
	left: 0;
	width: auto;
	height: auto;
	min-width: 100%;
	min-height: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-wrapper .bbvm-content-scroller-item {
	width: 100%;
	height: 100%;
	height: 100vh;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-wrapper .bbvm-content-scroller-item.bbvm-content-scroller-bg {
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-wrapper.stuck {
	position: fixed;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-content-wrapper,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-content-responsive-wrapper {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
	top: 0;
	right: 0;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-content {
	height: 100%;
	width: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	z-index: 1000;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-content-responsive {
	height: 100vh;
	width: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-content *,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-content-responsive * {
	text-align: center;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-bg-responsive {
	height: 100vh;
	overflow: hidden;
	position: relative;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-wrapper .bbvm-content-scroller-bg {
	-webkit-transition: background 0.8s linear;
	-moz-transition: background 0.8s linear;
	-o-transition: background 0.8s linear;
	-ms-transition: background 0.8s linear;
	transition: background 0.8s linear;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-for-beaverbuilder:after,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-items:after,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-responsive-for-beaverbuilder:after {
	content: "";
	display: table;
	clear: both;
}
.stuck {
	z-index: 500;
}
.stuck .bbvm-content-scroller-item-wrapper {
	position: fixed;
	top: 0;
	left: 0;
	height: 100vh;
	width: 50%;
	float: left;
	z-index: 500;
}
.stuck .bbvm-content-scroller-item {
	z-index: 500;
}
.sticky-wrapper {
	z-index: 1000;
}
<?php
$count         = 1;
$form_settings = $settings->scroller_content;
foreach ( $form_settings as $form_setting ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .count-<?php echo absint( $count ); ?> * {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $form_setting->content_color ) ); ?>;
	}
	<?php
	$count++;
}
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'padding',
		'selector'     => ".fl-node-$id .bbvm-content-scroller-wrapper",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'padding_top',
			'padding-right'  => 'padding_right',
			'padding-bottom' => 'padding_bottom',
			'padding-left'   => 'padding_left',
		),
	)
);
?>
@media only screen and (max-width: 800px) {
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-item-responsive {
		overflow: hidden;
		display: flex;
		flex-wrap: wrap-reverse;
		width: 100% !important;
		position: relative;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-wrapper.stuck {
		position: relative;
		display: none;
	}
	.stuck .bbvm-content-scroller-item-wrapper {
		position: relative;
		display: none;
	}
	.fl-bbvm-content-scroller-for-beaverbuilder-waypoint {
		display: none
		height: 0;
	}
	.fl-bbvm-content-scroller-content-responsive-wrapper {
		width: 100%;
	}
	.fl-bbvm-content-scroller-responsive-for-beaverbuilder:last-of-type {
		display: block !important;
		width: 100%;
		height: auto !important;
		position: relative;
	}
	.fl-bbvm-content-scroller-for-beaverbuilder,
	.sticky-wrapper {
		display: none !important;
	}
	.fl-bbvm-content-scroller-for-beaverbuilder {
		display: none;
	}
	.fl-bbvm-content-scroller-content-responsive-wrapper {
		float: unset;
		position: relative;
		width: 100%;
		height: auto;
		clear: both;
		display: block;
		padding: 0;
	}
	.bbvm-content-scroller-item-responsive-wrapper {
		width: 100%;
	}
	.fl-bbvm-content-scroller-item {
		width: 100%;
	}
	.bbvm-content-scroller-item-responsive-wrapper {
		width: 100%;
	}
	.bbvm-content-scroller-item-responsive-wrapper {
		width: 100% !important;
	}
}
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-for-beaverbuilder {
		display: none !important;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-responsive-for-beaverbuilder {
		display: block !important;
	}
}
