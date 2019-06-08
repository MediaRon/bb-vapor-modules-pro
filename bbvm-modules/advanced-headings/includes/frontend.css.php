<?php
// Headline block or inline
?>
.fl-node-<?php echo esc_html( $id ); ?> h1,
.fl-node-<?php echo esc_html( $id ); ?> h2,
.fl-node-<?php echo esc_html( $id ); ?> h3,
.fl-node-<?php echo esc_html( $id ); ?> h4,
.fl-node-<?php echo esc_html( $id ); ?> h5,
.fl-node-<?php echo esc_html( $id ); ?> h6 {
	display: <?php echo 'inline' === $settings->headline_style ? 'inline-block' : 'block'; ?>;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->headline_color ) ); ?>
}
<?php
// Headline Description
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'description_typography',
		'selector'     => ".fl-node-$id .description",
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .description {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->description_color ) ); ?>
}
<?php
if ( 'normal' === $settings->headline_select ) {
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'headline_typography',
			'selector'     => ".fl-node-$id .headline-normal",
		)
	);
} else {
	$bbvm_count = 0;
	foreach ( $settings->headlines as $headline ) {
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .bbvm-variable-headline-<?php echo absint( $bbvm_count ); ?> {
			color: #<?php echo esc_html( $headline->headline_color ); ?>;
		}
		<?php
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $headline,
				'setting_name' => 'headline_typography',
				'selector'     => ".fl-node-$id .bbvm-variable-headline-$bbvm_count",
			)
		);
		$bbvm_count++;
	}
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'headline_margin',
			'selector'     => ".fl-node-$id .fl-bbvm-variable-headings-for-beaverbuilder {$settings->headline_tag}",
			'unit'         => 'px',
			'props'        => array(
				'margin-top'    => 'headline_margin_top',
				'margin-right'  => 'headline_margin_right',
				'margin-bottom' => 'headline_margin_bottom',
				'margin-left'   => 'headline_margin_left',
			),
		)
	);
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'headline_padding',
			'selector'     => ".fl-node-$id .fl-bbvm-variable-headings-for-beaverbuilder {$settings->headline_tag}",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'headline_padding_top',
				'padding-right'  => 'headline_padding_right',
				'padding-bottom' => 'headline_padding_bottom',
				'padding-left'   => 'headline_padding_left',
			),
		)
	);
}
