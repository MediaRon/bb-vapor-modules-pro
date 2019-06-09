<?php
// Headline block or inline
?>
.fl-node-<?php echo esc_html( $id ); ?> h1,
.fl-node-<?php echo esc_html( $id ); ?> h2,
.fl-node-<?php echo esc_html( $id ); ?> h3,
.fl-node-<?php echo esc_html( $id ); ?> h4,
.fl-node-<?php echo esc_html( $id ); ?> h5,
.fl-node-<?php echo esc_html( $id ); ?> h6 {
	position: relative;
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
// Line Separator.
if ( 'line' === $settings->separator_type && 'double' !== $settings->line_type ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h1:after,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h2:after,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h3:after,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h4:after,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h5:after,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h6:after {
		content: '';
		display: block;
		width: 100%;
		border-bottom: <?php echo absint( $settings->line_height ); ?>px <?php echo esc_html( $settings->line_type ); ?> <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->line_color ) ); ?>;
	}
	<?php
endif;
if ( 'line' === $settings->separator_type && 'double' === $settings->line_type ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h1,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h2,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h3,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h4,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h5,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h6 {
		padding-bottom: <?php echo absint( ( $settings->line_height * 2 ) ); ?>px;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h1:before,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h2:before,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h3:before,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h4:before,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h5:before,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h6:before {
		content: '';
		display: block;
		position: absolute;
		bottom: 0px;
		width: 100%;
		border-bottom: <?php echo absint( $settings->line_height ); ?>px solid <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->line_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h1:after,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h2:after,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h3:after,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h4:after,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h5:after,
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-advanced-headings-for-beaverbuilder h6:after {
		content: '';
		display: block;
		position: absolute;
		bottom: -10px;
		width: 100%;
		border-bottom: <?php echo absint( $settings->line_height ); ?>px solid <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->line_color ) ); ?>;
	}
	<?php
endif;
