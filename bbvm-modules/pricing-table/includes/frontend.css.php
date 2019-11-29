<?php
/**
 * Pricing Table Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.5.0
 */

?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-table-title {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->pricing_table_title_color ) ); ?>;
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->pricing_table_title_background ) ); ?>;
	text-align: <?php echo esc_html( $settings->pricing_table_title_align ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container {
	display: flex;
	justify-content: space-between;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-6 .bbvm-pricing-table-column {
	width: 16%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-5 .bbvm-pricing-table-column {
	width: 20%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-4 .bbvm-pricing-table-column {
	width: 25%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-3 .bbvm-pricing-table-column {
	width: 33%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-2 .bbvm-pricing-table-column {
	width: 50%;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-pricing-container.bbvm-cols-1 .bbvm-pricing-table-column {
	width: 100%;
}
<?php
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pricing_table_title_border',
		'selector'     => ".fl-node-$id .bbvm-pricing-table-title",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pricing_table_title_padding',
		'selector'     => ".fl-node-$id .bbvm-pricing-table-title",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'pricing_table_title_padding_top',
			'padding-right'  => 'pricing_table_title_padding_right',
			'padding-bottom' => 'pricing_table_title_padding_bottom',
			'padding-left'   => 'pricing_table_title_padding_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pricing_table_title_typography',
		'selector'     => ".fl-node-$id .bbvm-pricing-table-title",
	)
);
