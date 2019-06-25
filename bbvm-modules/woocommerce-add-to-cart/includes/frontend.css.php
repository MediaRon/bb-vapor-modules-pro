<?php

// Text Color
$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
if ( 6 === strlen( $text_color ) ) {
	$text_color = '#' . $text_color;
}
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-woocommerce-add-to-cart-for-beaverbuilder,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-woocommerce-add-to-cart-for-beaverbuilder a {
	color: <?php echo esc_html( $text_color ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-woocommerce-add-to-cart-for-beaverbuilder i.icon-before {
	margin-right: 8px;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-woocommerce-add-to-cart-for-beaverbuilder i.icon-after {
	margin-left: 8px;
}
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'text_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-woocommerce-add-to-cart-for-beaverbuilder, .fl-node-$id .fl-bbvm-woocommerce-add-to-cart-for-beaverbuilder a",
	)
);
