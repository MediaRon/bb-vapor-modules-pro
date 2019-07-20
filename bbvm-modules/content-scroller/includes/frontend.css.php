@media only screen and (max-width: 800px) {
	.fl-bbvm-content-scroller-for-beaverbuilder {
		display: none !important;
	}
	.fl-bbvm-content-scroller-responsive-for-beaverbuilder {
		display: block !important;
		width: 100%;
		height: auto !important;
		position: relative;
	}
	.fl-bbvm-content-scroller-for-beaverbuilder {
		display: none;
	}
	.fl-bbvm-content-scroller-content-responsive-wrapper {
		float: unset;
		position: relative;
		width: auto;
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

.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-item {
	height: 100vh;
	top: 0;
	left: 0;
	width: 100%;
	z-index: 1000;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-item .bbvm-content-scroller-item {
	width: 50%;
	height: 100vh;
	float: right;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-content-scroller-item-responsive .bbvm-content-scroller-content-responsive {
	width: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-wrapper,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-responsive-wrapper {
	width: 50%;
	height: 100vh;
	top: 0;
	float: left;
}
.fl-node-<?php echo esc_html( $id ); ?> #content-scroller.stuck {
	position: fixed;
	top: 0;
	left: 0;
	z-index: 1000;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-wrapper .bbvm-content-scroller-item {
	width: 100%;
	height: 100vh;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-item-wrapper .bbvm-content-scroller-item.bbvm-content-scroller-bg {
}
.fl-node-<?php echo esc_html( $id ); ?>.stuck .bbvm-content-scroller-item-wrapper {
	position: fixed;
}
.fl-node-<?php echo esc_html( $id ); ?> .sticky-wrapper {
	position: relative;
	overflow-x: scroll;
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
	padding: 50vh 40px 50vh 40px;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-content-responsive {
	height: 100vh;
	width: 100%;
	padding: 25vh 40px 25vh 40px;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-content *,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-content-responsive * {
	text-align: center;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-bg-responsive {
	height: 100vh;
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
	z-index: 500;
	position: relative;
	height: auto !important;
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
