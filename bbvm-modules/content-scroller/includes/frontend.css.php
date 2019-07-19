@media only screen and (max-width: 600px) {
	.fl-bbvm-content-scroller-content-responsive-wrapper {
		width: 100%;
		height: 100vh !important;
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
	display: flex;
	align-items: center;
	flex-wrap: wrap;
	justify-content: center;
	height: 100%;
	width: 100%;
	padding: 50vh 20px 50vh 20px;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-content-responsive {
	display: flex;
	align-items: center;
	flex-wrap: wrap;
	justify-content: center;
	height: 100vh;
	width: 100%;
	padding: 25vh 20px 25vh 20px;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-content *,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-content-scroller-content-responsive * {
	width: 100%;
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
	z-index: 1000000;
}
.stuck .bbvm-content-scroller-item-wrapper {
	position: fixed;
	top: 0;
	left: 0;
	height: 100vh;
	width: 50%;
	float: left;
	z-index: 1000;
}
.stuck .bbvm-content-scroller-item {
	z-index: 1000000;
}
.sticky-wrapper {
	z-index: 1000000;
	position: relative;
	height: auto !important;
}
<?php
/*
$bbvm_count = 0;
foreach ( $settings->headlines as $headline ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-variable-headline-<?php echo absint( $bbvm_count ); ?> {
		color: #<?php echo esc_html( $headline->headline_color ); ?>;
	}
	<?php
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $headline,
			'setting_name' => 'headline_typography',
			'selector'     => ".fl-node-$id .bbvm-variable-headline-$bbvm_count",
		)
	);
	$bbvm_count++;
}
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'headline_margin',
		'selector'     => ".fl-node-$id .fl-bbvm-variable-headings-for-beaverbuilder {$settings->headline_tag}",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'headline_margin_top',
			'margin-right'  => 'headline_margin_right',
			'margin-bottom' => 'headline_margin_bottom',
			'margin-left'   => 'headline_margin_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'headline_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-variable-headings-for-beaverbuilder {$settings->headline_tag}",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'headline_padding_top',
			'padding-right'  => 'headline_padding_right',
			'padding-bottom' => 'headline_padding_bottom',
			'padding-left'   => 'headline_padding_left',
		),
	)
);
*/