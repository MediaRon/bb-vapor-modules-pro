<?php
/**
 * WooCommerce Featured Products.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

// Text Color.
$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
$text_color = BBVapor_Modules_Pro::get_color( $text_color )
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-woocommerce-featured-products-for-beaverbuilder {
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-product {
	display: flex;
	flex-wrap: wrap;
	align-items: flex-start;
	width: 33.33%;
	border: <?php echo absint( $settings->border_width ); ?>px solid #<?php echo esc_html( $settings->border_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-product div {
	width: 100%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-show-details {
	align-self: flex-end;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-image {
	align-self: flex-start;
	text-align: center;
	border-bottom: <?php echo absint( $settings->border_width ); ?>px solid #<?php echo esc_html( $settings->border_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-image img {
	padding-bottom: 20px;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-show-details-button {
	background: #<?php echo esc_html( $settings->show_details_background_color ); ?>;
	color: #<?php echo esc_html( $settings->show_details_color ); ?>;
	cursor: pointer;
	border-top: <?php echo absint( $settings->border_width ); ?>px solid #<?php echo esc_html( $settings->border_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-show-details-button:hover,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-show-details-button:hover a {
	background: #<?php echo esc_html( $settings->show_details_background_color_hover ); ?>;
	color: #<?php echo esc_html( $settings->show_details_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-show-details-button a {
	display: block;
	background: #<?php echo esc_html( $settings->show_details_background_color ); ?>;
	color: #<?php echo esc_html( $settings->show_details_color ); ?>;
	width: 100%;
	height: 100%;
	text-decoration: none;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-show-details-button a:hover {
	background: #<?php echo esc_html( $settings->show_details_background_color_hover ); ?>;
	color: #<?php echo esc_html( $settings->show_details_color_hover ); ?>;
	text-decoration: none;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-show-details-button.active {
	border-bottom: <?php echo absint( $settings->border_width ); ?>px solid #<?php echo esc_html( $settings->border_color ); ?>;
}

.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-show-details-button i {
	background: #<?php echo esc_html( $settings->show_details_icon_background_color ); ?>;
	padding: 2px;
	border-radius: <?php echo absint( $settings->show_details_icon_border_radius ); ?>px;
	color: #<?php echo esc_html( $settings->show_details_icon_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-show-details-button:hover i {
	background: #<?php echo esc_html( $settings->show_details_icon_background_color_hover ); ?>;
	color: #<?php echo esc_html( $settings->show_details_icon_color_hover ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-show-details-content {
	display: none;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-product .bbvm-woocommerce-title h2 {
	margin: 0;
	color: #<?php echo esc_html( $settings->title_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-product .bbvm-woocommerce-short-description {
	color: #<?php echo esc_html( $settings->short_description_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-product .bbvm-woocommerce-description {
	color: #<?php echo esc_html( $settings->description_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-product .bbvm-woocommerce-price {
	color: #<?php echo esc_html( $settings->price_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-product .bbvm-woocommerce-cart a.button,
.bbvm-bb-woocommerce-featured-product-popup .bbvm-woocommerce-cart a.button {
	background: #<?php echo esc_html( $settings->cart_background_color ); ?>;
	color: #<?php echo esc_html( $settings->cart_text_color ); ?>;
	margin-bottom: 15px;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-woocommerce-product .bbvm-woocommerce-cart a.button:hover,
.bbvm-bb-woocommerce-featured-product-popup .bbvm-woocommerce-cart a.button:hover {
	background: #<?php echo esc_html( $settings->cart_background_color_hover ); ?>;
	color: #<?php echo esc_html( $settings->cart_text_color_hover ); ?>;
}
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_typography',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-title h2",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'short_description_typography',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-short-description",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'description_typography',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-description",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'price_typography',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-price",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'show_details_typography',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-show-details .bbvm-woocommerce-show-details-button",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'card_typography',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-cart a.button,
		.bbvm-bb-woocommerce-featured-product-popup .bbvm-woocommere-cart a.button",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'show_details_content_typography',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-show-details-content,
		.bbvm-bb-woocommerce-featured-product-popup .swal2-content",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'show_details_content_heading_typography',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-show-details-content h3,
		.bbvm-bb-woocommerce-featured-product-popup h3",
	)
);
// Max Width.
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .bbvm-woocommerce-product",
		'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'width'  => $settings->item_width . '%',
			'margin' => '0 auto',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .bbvm-woocommerce-product",
		'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'width'  => $settings->item_width_medium . '%',
			'margin' => '0 auto',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .bbvm-woocommerce-product",
		'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
		'props'    => array(
			'width'  => $settings->item_width_responsive . '%',
			'margin' => '0 auto',
		),
	)
);
if ( 0 != $settings->item_max_width /* phpcs:ignore */ ) {
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .bbvm-woocommerce-product",
			'media'    => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
			'props'    => array(
				'max-width' => $settings->item_max_width . 'px',
			),
		)
	);
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .bbvm-woocommerce-product",
			'media'    => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
			'props'    => array(
				'max-width' => $settings->item_max_width_medium . 'px',
			),
		)
	);
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .bbvm-woocommerce-product",
			'media'    => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
			'props'    => array(
				'max-width' => $settings->item_max_width_responsive . 'px',
			),
		)
	);
}
// Padding and Margin.
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'item_margin',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'item_margin_top',
			'margin-right'  => 'item_margin_right',
			'margin-bottom' => 'item_margin_bottom',
			'margin-left'   => 'item_margin_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_padding',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-title h2",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'title_padding_top',
			'padding-right'  => 'title_padding_right',
			'padding-bottom' => 'title_padding_bottom',
			'padding-left'   => 'title_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'short_description_padding',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-short-description",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'short_description_padding_top',
			'padding-right'  => 'short_description_padding_right',
			'padding-bottom' => 'short_description_padding_bottom',
			'padding-left'   => 'short_description_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'description_padding',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-description, .bbvm-bb-woocommerce-featured-product-popup .bbvm-woocommerce-description",
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
		'setting_name' => 'price_padding',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-price",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'price_padding_top',
			'padding-right'  => 'price_padding_right',
			'padding-bottom' => 'price_padding_bottom',
			'padding-left'   => 'price_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'show_details_padding',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-show-details-button a",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'show_details_padding_top',
			'padding-right'  => 'show_details_padding_right',
			'padding-bottom' => 'show_details_padding_bottom',
			'padding-left'   => 'show_details_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'show_details_content_padding',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-show-details-content",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'show_details_content_padding_top',
			'padding-right'  => 'show_details_content_padding_right',
			'padding-bottom' => 'show_details_content_padding_bottom',
			'padding-left'   => 'show_details_content_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'item_margin',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'item_margin_top',
			'margin-right'  => 'item_margin_right',
			'margin-bottom' => 'item_margin_bottom',
			'margin-left'   => 'item_margin_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'cart_padding',
		'selector'     => ".fl-node-$id .bbvm-woocommerce-product .bbvm-woocommerce-cart a.button, .bbvm-bb-woocommerce-featured-product-popup .bbvm-woocommerce-cart a.button",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'cart_padding_top',
			'padding-right'  => 'cart_padding_right',
			'padding-bottom' => 'cart_padding_bottom',
			'padding-left'   => 'cart_padding_left',
		),
	)
);
