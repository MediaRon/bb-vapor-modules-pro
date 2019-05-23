<?php

// Text Color
$category_text_color = isset( $settings->category_text_color ) ? esc_attr( $settings->category_text_color ) : '000000';
if ( 6 === strlen( $category_text_color ) ) {
	$category_text_color = '#' . $category_text_color;
}
$background_overlay = isset( $settings->background_overlay ) ? esc_attr( $settings->background_overlay ) : '000000';
if ( 6 === strlen( $background_overlay ) ) {
	$background_overlay = '#' . $background_overlay;
}
$background_overlay_hover = isset( $settings->background_overlay_hover ) ? esc_attr( $settings->background_overlay_hover ) : '000000';
if ( 6 === strlen( $background_overlay_hover ) ) {
	$background_overlay_hover = '#' . $background_overlay_hover;
}
$button_background = isset( $settings->button_background ) ? esc_attr( $settings->button_background ) : '000000';
if ( 6 === strlen( $button_background ) ) {
	$button_background = '#' . $button_background;
}
$button_background_hover = isset( $settings->button_background_hover ) ? esc_attr( $settings->button_background_hover ) : '000000';
if ( 6 === strlen( $button_background_hover ) ) {
	$button_background_hover = '#' . $button_background_hover;
}
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-for-beaverbuilder {
	background-image: url(<?php echo esc_url( $settings->background_photo_src ); ?>);
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center center;
	position: relative;
	display: flex;
	transition: 0.5s;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-for-beaverbuilder:after {
	position: absolute;
	width: 100%;
	height: 100%;
	content: '';
	display: block;
	background: <?php echo $background_overlay; ?>;
	z-index: 1;
	transition: background-color 0.5s ease;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-for-beaverbuilder:hover:after {
	background: <?php echo $background_overlay_hover; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category {
	width: 100%;
	margin: 20px;
	box-sizing: border-box;
	position: relative;
	z-index: 2;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-link-wrapper {
	position: absolute;
	display: block;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 3;
}
<?php
if ( 'inner_border' === $settings->border_style ) {
	?>
	.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category {
		border: <?php echo absint( $settings->border_width ); ?>px solid #<?php echo esc_html( $settings->border_color ); ?>;
	}
	.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-for-beaverbuilder:hover .fl-bbvm-woocommerce-featured-category {
		border: <?php echo absint( $settings->border_width ); ?>px solid #<?php echo esc_html( $settings->border_color_hover ); ?>;
	}
	<?php
}
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-inner {
	width: 100%;
	height: 100%;
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	align-items: center;
	position: relative;
	bottom: 0;
	left: 0;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-category {
	color: #<?php echo esc_html( $settings->category_text_color ); ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-button a {
	position: absolute;
	bottom: 0;
	right: 0;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-button a {
	background: <?php echo $button_background; ?>;
	color: #<?php echo $settings->button_color; ?>;
	text-decoration: none;
	border-left: <?php echo absint( $settings->button_border_width ); ?>px solid #<?php echo $settings->button_border_color; ?>;
	border-top: <?php echo absint( $settings->button_border_width ); ?>px solid #<?php echo $settings->button_border_color; ?>;
	<?php if ( 'no_border' === $settings->border_style ) : ?>
		border-right: <?php echo absint( $settings->button_border_width ); ?>px solid #<?php echo $settings->button_border_color; ?>;
		border-bottom: <?php echo absint( $settings->button_border_width ); ?>px solid #<?php echo $settings->button_border_color; ?>;
	<?php endif; ?>
}
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-button a:hover {
	background: <?php echo $button_background_hover; ?>;
	color: #<?php echo $settings->button_color_hover; ?>;
	text-decoration: none;
	border-left: <?php echo absint( $settings->button_border_width_hover ); ?>px solid #<?php echo $settings->button_border_color; ?>;
	border-top: <?php echo absint( $settings->button_border_width_hover ); ?>px solid #<?php echo $settings->button_border_color_hover; ?>;
	<?php if ( 'no_border' === $settings->border_style ) : ?>
		border-right: <?php echo absint( $settings->button_border_width_hover ); ?>px solid #<?php echo $settings->button_border_color_hover; ?>;
		border-bottom: <?php echo absint( $settings->button_border_width_hover ); ?>px solid #<?php echo $settings->button_border_color_hover; ?>;
	<?php endif; ?>
}
<?php if ( 'yes' === $settings->link_category ) : ?>
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-for-beaverbuilder:hover .fl-bbvm-woocommerce-featured-category-button a {
	background: <?php echo $button_background_hover; ?>;
	color: #<?php echo $settings->button_color_hover; ?>;
	text-decoration: none;
	<?php if ( empty( $settings->button_border_color_hover ) ): ?>
	border: 0;
	<?php else: ?>
	border-left: <?php echo absint( $settings->button_border_width_hover ); ?>px solid #<?php echo $settings->button_border_color_hover; ?> !important;
	border-top: <?php echo absint( $settings->button_border_width_hover ); ?>px solid #<?php echo $settings->button_border_color_hover; ?> !important;
	<?php if ( 'no_border' === $settings->border_style ) : ?>
		border-right: <?php echo absint( $settings->button_border_width_hover ); ?>px solid #<?php echo $settings->button_border_color_hover; ?> !important;
		border-bottom: <?php echo absint( $settings->button_border_width_hover ); ?>px solid #<?php echo $settings->button_border_color_hover; ?> !important;
	<?php endif; ?>
	<?php endif; ?>
}
<?php endif; ?>
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-for-beaverbuilder {
	min-height: <?php echo absint( $settings->min_height ) . 'px'; ?>;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-category {
	width: 70%;
	align-self: flex-end;
}
<?php
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-woocommerce-featured-category-category",
	'media' => 'default', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'width' => $settings->category_width . '%'
	),
) );
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-woocommerce-featured-category-category",
	'media' => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'width' => $settings->category_width_medium . '%'
	),
) );
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-woocommerce-featured-category-category",
	'media' => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'width' => $settings->category_width_responsive . '%'
	),
) );
?>
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-button {
	text-align: center;
	width: 30%;
}
.fl-node-<?php echo $id; ?> .fl-bbvm-woocommerce-featured-category-button a {
	display: inline-block;
}
<?php
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-woocommerce-featured-category-for-beaverbuilder",
	'media' => 'medium', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'min-height' => $settings->min_height_medium . 'px',
	),
) );
FLBuilderCSS::rule( array(
	'selector' => ".fl-node-$id .fl-bbvm-woocommerce-featured-category-for-beaverbuilder",
	'media' => 'responsive', // Optional. Can be `default`, `medium`, `responsive` or a custom statement.
	'props' => array(
		'min-height' => $settings->min_height_responsive . 'px',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'category_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-woocommerce-featured-category-category",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'category_padding_top',
		'padding-right'  => 'category_padding_right',
		'padding-bottom' => 'category_padding_bottom',
		'padding-left' 	 => 'category_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'category_title_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-woocommerce-featured-category-category",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'category_title_padding_top',
		'padding-right'  => 'category_title_padding_right',
		'padding-bottom' => 'category_title_padding_bottom',
		'padding-left' 	 => 'category_title_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'button_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-woocommerce-featured-category-button a",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'button_padding_top',
		'padding-right'  => 'button_padding_right',
		'padding-bottom' => 'button_padding_bottom',
		'padding-left' 	 => 'button_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'inner_margin',
	'selector' 	=> ".fl-node-$id .fl-bbvm-woocommerce-featured-category",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'inner_margin_top',
		'margin-right'  => 'inner_margin_right',
		'margin-bottom' => 'inner_margin_bottom',
		'margin-left' 	 => 'inner_margin_left',
	),
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'category_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-woocommerce-featured-category-category",
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'button_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-woocommerce-featured-category-button a",
) );
?>
