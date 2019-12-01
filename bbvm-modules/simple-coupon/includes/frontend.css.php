<?php
/**
 * Simple Coupon
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.5.5
 */

// Coupon Box Styles.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-text {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->box_background_color ) ); ?>;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->sales_text_color ) ); ?>;
}
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'box_padding',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'box_padding_top',
			'padding-right'  => 'box_padding_right',
			'padding-bottom' => 'box_padding_bottom',
			'padding-left'   => 'box_padding_left',
		),
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'box_border',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'sales_typography',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text",
	)
);

// Coupon text styles.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-text .bbvm-simple-coupon {
	display: inline-block;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->coupon_bg_color ) ); ?>;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->coupon_text_color ) ); ?>;
}
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'coupon_padding',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'coupon_padding_top',
			'padding-right'  => 'coupon_padding_right',
			'padding-bottom' => 'coupon_padding_bottom',
			'padding-left'   => 'coupon_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'coupon_margin',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'coupon_margin_top',
			'margin-right'  => 'coupon_margin_right',
			'margin-bottom' => 'coupon_margin_bottom',
			'margin-left'   => 'coupon_margin_left',
		),
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'coupon_border',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'coupon_typography',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon",
	)
);

// Button CTA.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-text .bbvm-simple-coupon-button a {
	display: inline-block;
	text-decoration: none;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_background_color ) ); ?>;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-text .bbvm-simple-coupon-button a:hover {
	display: inline-block;
	text-decoration: none;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_background_color_hover ) ); ?>;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color_hover ) ); ?>;
}
<?php
if ( 'block' === $settings->button_width ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-text .bbvm-simple-coupon-button a,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-text .bbvm-simple-coupon-button a:hover {
		display: block;
	}
	<?php
endif;
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_padding',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-button a",
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
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-button a",
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
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-button a, .fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-button a:hover",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_border',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-button a, .fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-button a:hover",
	)
);
if ( 'primary' === $settings->alert_style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-text * {
	color: #004085;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder {
	color: #004085;
	background-color: #cce5ff;
	border-color: #b8daff;
	position: relative;
	padding: .75rem 1.25rem;
	margin-bottom: 1rem;
	border: 1px solid transparent;
	border-radius: .25rem;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a {
	color: #004085;
	padding: 10px 20px;
	border: 2px solid #b8daff;
	border-radius: .50rem;
	background: #57a8fc;
	text-decoration: none;
	margin: 20px auto 0 auto;
	display: inline-block;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a:hover {
	background-color: #78b9fc;
}
	<?php
endif;
if ( 'secondary' === $settings->alert_style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-text * {
	color: #383d41;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder {
	color: #383d41;
	background-color: #e2e3e5;
	border-color: #d6d8db;
	position: relative;
	padding: .75rem 1.25rem;
	margin-bottom: 1rem;
	border: 1px solid transparent;
	border-radius: .25rem;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a {
	color: #383d41;
	padding: 10px 20px;
	border: 2px solid #d6d8db;
	border-radius: .50rem;
	background: #b2b3b6;
	text-decoration: none;
	margin: 20px auto 0 auto;
	display: inline-block;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a:hover {
	background-color: #a1a1a2;
}
	<?php
endif;
if ( 'success' === $settings->alert_style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-text * {
	color: #155724;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder {
	color: #155724;
	background-color: #d4edda;
	border-color: #c3e6cb;
	position: relative;
	padding: .75rem 1.25rem;
	margin-bottom: 1rem;
	border: 1px solid transparent;
	border-radius: .25rem;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a {
	color: #155724;
	padding: 10px 20px;
	border: 2px solid #c3e6cb;
	border-radius: .50rem;
	background: #a4eab5;
	text-decoration: none;
	margin: 20px auto 0 auto;
	display: inline-block;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a:hover {
	background-color: #6ce98a;
}
	<?php
endif;
if ( 'danger' === $settings->alert_style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-text * {
	color: #721c24;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder {
	color: #721c24;
	background-color: #f8d7da;
	border-color: #f5c6cb;
	position: relative;
	padding: .75rem 1.25rem;
	margin-bottom: 1rem;
	border: 1px solid transparent;
	border-radius: .25rem;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a {
	color: #721c24;
	padding: 10px 20px;
	border: 2px solid #f5c6cb;
	border-radius: .50rem;
	background: #f9a1a9;
	text-decoration: none;
	margin: 20px auto 0 auto;
	display: inline-block;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a:hover {
	background-color: #f5858f;
}
	<?php
endif;
if ( 'warning' === $settings->alert_style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-text * {
	color: #856404;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder {
	color: #856404;
	background-color: #fff3cd;
	border-color: #ffeeba;
	position: relative;
	padding: .75rem 1.25rem;
	margin-bottom: 1rem;
	border: 1px solid transparent;
	border-radius: .25rem;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a {
	color: #856404;
	padding: 10px 20px;
	border: 2px solid #ffeeba;
	border-radius: .50rem;
	background: #f9d86e;
	text-decoration: none;
	margin: 20px auto 0 auto;
	display: inline-block;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a:hover {
	background-color: #f5cb47;
}
	<?php
endif;
if ( 'info' === $settings->alert_style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-text * {
	color: #0c5460;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder {
	color: #0c5460;
	background-color: #d1ecf1;
	border-color: #bee5eb;
	position: relative;
	padding: .75rem 1.25rem;
	margin-bottom: 1rem;
	border: 1px solid transparent;
	border-radius: .25rem;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a {
	color: #0c5460;
	padding: 10px 20px;
	border: 2px solid #bee5eb;
	border-radius: .50rem;
	background: #84d9e9;
	text-decoration: none;
	margin: 20px auto 0 auto;
	display: inline-block;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a:hover {
	background-color: #69d2e5;
}
	<?php
endif;
if ( 'light' === $settings->alert_style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-text * {
	color: #818182;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder {
	color: #818182;
	background-color: #fefefe;
	border-color: #fdfdfe;
	position: relative;
	padding: .75rem 1.25rem;
	margin-bottom: 1rem;
	border: 1px solid transparent;
	border-radius: .25rem;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a {
	color: #818182;
	padding: 10px 20px;
	border: 2px solid #fdfdfe;
	border-radius: .50rem;
	background: #dcdcdc;
	text-decoration: none;
	margin: 20px auto 0 auto;
	display: inline-block;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a:hover {
	background-color: #d1cfcf;
}
	<?php
endif;
if ( 'dark' === $settings->alert_style ) :
	?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-text * {
	color: #1b1e21;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder {
	color: #1b1e21;
	background-color: #d6d8d9;
	border-color: #c6c8ca;
	position: relative;
	padding: .75rem 1.25rem;
	margin-bottom: 1rem;
	border: 1px solid transparent;
	border-radius: .25rem;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a {
	color: #1b1e21;
	padding: 10px 20px;
	border: 2px solid #c6c8ca;
	border-radius: .50rem;
	background: #bebfbf;
	text-decoration: none;
	margin: 20px auto 0 auto;
	display: inline-block;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a:hover {
	background-color: #a8a8a8;
}
	<?php
endif;
if ( 'custom' === $settings->alert_style ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-text * {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color ) ); ?>;
		position: relative;
		border: 1px solid transparent;
		border-radius: <?php echo absint( $settings->border_radius ); ?>px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color ) ); ?>;
		padding: 10px 20px;
		border: 2px solid <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_border_color ) ); ?>;
		border-radius: <?php echo absint( $settings->button_border_radius ); ?>px;
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_background_color ) ); ?>;
		text-decoration: none;
		margin: 20px auto 0 auto;
		display: inline-block;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a:hover {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_background_color_hover ) ); ?>;
	}
	<?php
	// Padding.
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'alert_padding',
			'selector'     => ".fl-node-$id .fl-bbvm-alerts-for-beaverbuilder",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'alert_padding_top',
				'padding-right'  => 'alert_padding_right',
				'padding-bottom' => 'alert_padding_bottom',
				'padding-left'   => 'alert_padding_left',
			),
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'button_padding',
			'selector'     => ".fl-node-$id .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'button_padding_top',
				'padding-right'  => 'button_padding_right',
				'padding-bottom' => 'button_padding_bottom',
				'padding-left'   => 'button_padding_left',
			),
		)
	);
endif;
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-icon {
	font-size: <?php echo absint( $settings->icon_size ); ?>px;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-alerts-for-beaverbuilder {
	text-align: <?php echo esc_html( $settings->alert_alignment ); ?>;
}
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'alert_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-alerts-for-beaverbuilder",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a",
	)
);
