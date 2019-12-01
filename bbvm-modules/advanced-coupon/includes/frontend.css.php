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
		'setting_name' => 'coupon_headline_padding',
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-headline",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'coupon_headline_padding_top',
			'padding-right'  => 'coupon_headline_padding_right',
			'padding-bottom' => 'coupon_headline_padding_bottom',
			'padding-left'   => 'coupon_headline_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'coupon_headline_margin',
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-headline",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'coupon_headline_margin_top',
			'margin-right'  => 'coupon_headline_margin_right',
			'margin-bottom' => 'coupon_headline_margin_bottom',
			'margin-left'   => 'coupon_headline_margin_left',
		),
	)
);
