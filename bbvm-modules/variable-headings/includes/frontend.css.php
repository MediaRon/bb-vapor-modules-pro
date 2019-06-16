<?php
$bbvm_count = 0;
foreach( $settings->headlines as $headline ) {
	?>
	.fl-node-<?php echo $id; ?> .bbvm-variable-headline-<?php echo $bbvm_count; ?> {
		color: #<?php echo $headline->headline_color; ?>;
	}
	<?php
	FLBuilderCSS::typography_field_rule( array(
		'settings'	=> $headline,
		'setting_name' 	=> 'headline_typography',
		'selector' 	=> ".fl-node-$id .bbvm-variable-headline-$bbvm_count"
	) );
	$bbvm_count += 1;
}
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'headline_margin',
	'selector' 	=> ".fl-node-$id .fl-bbvm-variable-headings-for-beaverbuilder {$settings->headline_tag}",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'headline_margin_top',
		'margin-right'  => 'headline_margin_right',
		'margin-bottom' => 'headline_margin_bottom',
		'margin-left' 	 => 'headline_margin_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'headline_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-variable-headings-for-beaverbuilder {$settings->headline_tag}",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'headline_padding_top',
		'padding-right'  => 'headline_padding_right',
		'padding-bottom' => 'headline_padding_bottom',
		'padding-left' 	 => 'headline_padding_left',
	),
) );