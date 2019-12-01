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
