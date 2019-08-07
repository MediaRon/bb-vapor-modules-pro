<?php
/**
 * EDD Download Count Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

// Background Color.
$background_color = isset( $settings->background_color ) ? esc_attr( $settings->background_color ) : 'FFFFFF';
$background_color = BBVapor_Modules_Pro::get_color( $background_color );

// Text Color.
$text_color = isset( $settings->text_color ) ? esc_attr( $settings->text_color ) : '000000';
$text_color = BBVapor_Modules_Pro::get_color( $text_color );
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-download-count-for-beaverbuilder {
	background-color: <?php echo esc_html( $background_color ); ?>;
	color: <?php echo esc_html( $text_color ); ?>;
}
<?php
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'padding',
		'selector'     => ".fl-node-$id .fl-bbvm-download-count-for-beaverbuilder",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'padding_top',
			'padding-right'  => 'padding_right',
			'padding-bottom' => 'padding_bottom',
			'padding-left'   => 'padding_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'typography',
		'selector'     => ".fl-node-$id .fl-bbvm-download-count-for-beaverbuilder",
	)
);
