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
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-coupon-wrapper {
	min-height: 400px;
	position: relative;
	border: <?php echo absint( $settings->outer_border ); ?>px <?php echo esc_html( $settings->outer_border_appearance ); ?> <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->outer_border_color ) ); ?>;
}
<?php
if ( ! empty( $settings->background_photo_src ) ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-coupon-wrapper {
		background: url('<?php echo esc_url( $settings->background_photo_src ); ?>') no-repeat center;
		background-size: cover;
	}
	<?php
}
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-coupon-wrapper:before {
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	content: ' ';
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_overlay ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon {
	position: absolute;
	width: 100%;
	height: 100%;
	border: <?php echo absint( $settings->inner_border ); ?>px <?php echo esc_html( $settings->inner_border_appearance ); ?> <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->inner_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-headline {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->sales_text_color ) ); ?>;
}
<?php
// Coupon Headline.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-headline {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->coupon_headline_color ) ); ?>;
}
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'coupon_headline_typography',
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-headline",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'sales_text_margin',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-headline",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'sales_text_margin_top',
			'margin-right'  => 'sales_text_margin_right',
			'margin-bottom' => 'sales_text_margin_bottom',
			'margin-left'   => 'sales_text_margin_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'sales_text_padding',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-headline",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'sales_text_padding_top',
			'padding-right'  => 'sales_text_padding_right',
			'padding-bottom' => 'sales_text_padding_bottom',
			'padding-left'   => 'sales_text_padding_left',
		),
	)
);

// Coupon text styles.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-text .bbvm-simple-coupon-wrapper span {
	display: inline-block;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->coupon_bg_color ) ); ?>;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->coupon_text_color ) ); ?>;
}
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'coupon_padding',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-wrapper span",
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
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-wrapper span",
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
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-wrapper span",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'coupon_typography',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-wrapper",
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
if ( 'block' === $settings->button_width ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-text .bbvm-simple-coupon-button a,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-text .bbvm-simple-coupon-button a:hover {
		display: block;
	}
	<?php
} else {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-text .bbvm-simple-coupon-button {
		text-align: center;
	}
	<?php
}
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

// Disclaimer Styles.
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'disclaimer_margin',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-disclaimer",
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
		'setting_name' => 'disclaimer_typography',
		'selector'     => ".fl-node-$id .bbvm-simple-coupon-text .bbvm-simple-coupon-disclaimer",
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-simple-coupon-text .bbvm-simple-coupon-disclaimer {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->disclaimer_color ) ); ?>;
}
<?php
