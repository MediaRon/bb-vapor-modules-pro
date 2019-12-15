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
	position: relative;
	border: <?php echo absint( $settings->outer_border ); ?>px <?php echo esc_html( $settings->outer_border_appearance ); ?> <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->outer_border_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon {
	min-height: 400px;
}
<?php
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .bbvm-advanced-coupon",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'min-height' => $settings->min_height . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .bbvm-advanced-coupon",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'min-height' => $settings->min_height_medium . 'px',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .bbvm-advanced-coupon",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'height' => $settings->min_height_responsive . 'px',
		),
	)
);
if ( ! empty( $settings->background_photo_src ) ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon {
		z-index: 1;
		background: url('<?php echo esc_url( $settings->background_photo_src ); ?>') no-repeat center;
		background-size: cover;
	}
	<?php
}
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-overlay {
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	content: ' ';
	z-index: 2;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_overlay ) ); ?>;
	border: <?php echo absint( $settings->inner_border ); ?>px <?php echo esc_html( $settings->inner_border_appearance ); ?> <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->inner_border_color ) ); ?>;
}
<?php if ( ! empty( $settings->inner_border ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon {
	padding: <?php echo absint( $settings->inner_border ); ?>px;
}
<?php endif; ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-content {
	position: relative;
	z-index: 1000;
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
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'coupon_box_padding',
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'coupon_box_padding_top',
			'padding-right'  => 'coupon_box_padding_right',
			'padding-bottom' => 'coupon_box_padding_bottom',
			'padding-left'   => 'coupon_box_padding_left',
		),
	)
);

// Top icon if available.
if ( 'icon' === $settings->photo_icon ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-icon span:before {
		display: inline-block;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-icon span:before {
		font-size: <?php echo absint( $settings->icon_size ); ?>px;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->icon_color ) ); ?>;
		<?php if ( 'rounded' === $settings->icon_display ) : ?>
		overflow: hidden;
		border-radius: 50%;
		<?php endif; ?>
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-icon {
		text-align: <?php echo esc_html( $settings->icon_align ); ?>;
	}
	<?php
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'icon_padding',
			'selector'     => ".fl-node-$id .bbvm-advanced-coupon-icon span:before",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'icon_padding_top',
				'padding-right'  => 'icon_padding_right',
				'padding-bottom' => 'icon_padding_bottom',
				'padding-left'   => 'icon_padding_left',
			),
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'icon_margin',
			'selector'     => ".fl-node-$id .bbvm-advanced-coupon-icon span:before",
			'unit'         => 'px',
			'props'        => array(
				'margin-top'    => 'icon_margin_top',
				'margin-right'  => 'icon_margin_right',
				'margin-bottom' => 'icon_margin_bottom',
				'margin-left'   => 'icon_margin_left',
			),
		)
	);
endif;

// Top Photo if Available.
if ( 'photo' === $settings->photo_icon ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-top-photo {
		text-align: <?php echo esc_html( $settings->top_photo_align ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-top-photo img {
		<?php if ( 'rounded' === $settings->top_photo_display ) : ?>
		overflow: hidden;
		border-radius: 50%;
		<?php endif; ?>
	}
	<?php
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'top_photo_border',
			'selector'     => ".fl-node-$id .bbvm-advanced-coupon-top-photo img",
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'top_photo_padding',
			'selector'     => ".fl-node-$id .bbvm-advanced-coupon-top-photo",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'top_photo_padding_top',
				'padding-right'  => 'top_photo_padding_right',
				'padding-bottom' => 'top_photo_padding_bottom',
				'padding-left'   => 'top_photo_padding_left',
			),
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'top_photo_margin',
			'selector'     => ".fl-node-$id .bbvm-advanced-coupon-top-photo",
			'unit'         => 'px',
			'props'        => array(
				'margin-top'    => 'top_photo_margin_top',
				'margin-right'  => 'top_photo_margin_right',
				'margin-bottom' => 'top_photo_margin_bottom',
				'margin-left'   => 'top_photo_margin_left',
			),
		)
	);
endif;

// Coupon description.
if ( 'yes' === $settings->enable_description ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-description {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->description_color ) ); ?>;
	}
	<?php
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'description_padding',
			'selector'     => ".fl-node-$id .bbvm-advanced-coupon-description",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'description_padding_top',
				'padding-right'  => 'description_padding_right',
				'padding-bottom' => 'description_padding_bottom',
				'padding-left'   => 'description_padding_left',
			),
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'description_margin',
			'selector'     => ".fl-node-$id .bbvm-advanced-coupon-description",
			'unit'         => 'px',
			'props'        => array(
				'margin-top'    => 'description_margin_top',
				'margin-right'  => 'description_margin_right',
				'margin-bottom' => 'description_margin_bottom',
				'margin-left'   => 'description_margin_left',
			),
		)
	);
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'description_typography',
			'selector'     => ".fl-node-$id .bbvm-advanced-coupon-description",
		)
	);
endif;

// Coupon Code Styles.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-code-wrapper {
	text-align: center;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-code-wrapper .bbvm-advanced-coupon-code {
	display: inline-block;
	background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->coupon_bg_color ) ); ?>;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->coupon_text_color ) ); ?>;
	padding: 10px 20px;
	border: 2px dashed #FF0000;
}
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'coupon_padding',
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-code-wrapper .bbvm-advanced-coupon-code",
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
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-code-wrapper",
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
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-code-wrapper .bbvm-advanced-coupon-code",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'coupon_typography',
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-code-wrapper",
	)
);

// CTA Styles.
// Button CTA.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-button a {
	display: inline-block;
	text-decoration: none;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_background_color ) ); ?>;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-button a:hover {
	display: inline-block;
	text-decoration: none;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_background_color_hover ) ); ?>;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color_hover ) ); ?>;
}
<?php
if ( 'block' === $settings->button_width ) {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-button a,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-button a:hover {
		display: block;
	}
	<?php
} else {
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-button {
		text-align: center;
	}
	<?php
}
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_padding',
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-button a",
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
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-button a",
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
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-button a, .fl-node-$id .bbvm-advanced-coupon-button a:hover",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_border',
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-button a, .fl-node-$id .bbvm-advanced-coupon-button a:hover",
	)
);

// Disclaimer styles.
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'disclaimer_padding',
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-disclaimer",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'disclaimer_padding_top',
			'margin-right'  => 'disclaimer_padding_right',
			'margin-bottom' => 'disclaimer_padding_bottom',
			'margin-left'   => 'disclaimer_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'disclaimer_margin',
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-disclaimer",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'disclaimer_margin_top',
			'margin-right'  => 'disclaimer_margin_right',
			'margin-bottom' => 'disclaimer_margin_bottom',
			'margin-left'   => 'disclaimer_margin_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'disclaimer_typography',
		'selector'     => ".fl-node-$id .bbvm-advanced-coupon-disclaimer",
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-advanced-coupon-disclaimer {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->disclaimer_color ) ); ?>;
}
