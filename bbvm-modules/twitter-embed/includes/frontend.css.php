<?php
// Show hide meta
if ( 'no' === $settings->show_meta ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-gist-for-beaverbuilder .gist-meta {
		display: none;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-gist-for-beaverbuilder .gist-file {
		margin-bottom: 0;
	}
	<?php
endif;
// Background Color
$background_color = isset( $settings->gist_background_color ) ? esc_attr( $settings->gist_background_color ) : 'FFFFFF';
$background_color = BBVapor_Modules_Pro::get_color( $background_color );

// Text Color
$text_color = isset( $settings->gist_text_color ) ? esc_attr( $settings->gist_text_color ) : '000000';
$text_color = BBVapor_Modules_Pro::get_color( $text_color );

// Padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'gist_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-gist-for-beaverbuilder",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'gist_padding_top',
			'padding-right'  => 'gist_padding_right',
			'padding-bottom' => 'gist_padding_bottom',
			'padding-left'   => 'gist_padding_left',
		),
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-gist-for-beaverbuilder {
	background-color: <?php echo esc_html( $background_color ); ?>;
	color: <?php echo esc_html( $text_color ); ?>;
	border-radius: <?php echo absint( $settings->gist_border_radius ); ?>px;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-gist-for-beaverbuilder figcaption {
	font-size: 13px;
	padding-bottom: 1em;
	padding-top: 0.5em;
	text-align: center;
}
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'gist_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-gist-for-beaverbuilder figcaption",
	)
);
