.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h1,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h2,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h3,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h4,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h5,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h6
 {
	animation-duration: <?php echo absint( $settings->animation_duration ); ?>s;
	color: #<?php echo $settings->headline_text_color; ?>;
}
<?php
if ( 'color' === $settings->animation_type ):
?>
@-webkit-keyframes bbvm_color_change-<?php echo $id; ?> {
	from { color: #<?php echo $settings->original_color; ?> }
	to { color: #<?php echo $settings->animated_color; ?> }
}
@-moz-keyframes bbvm_color_change-<?php echo $id; ?> {
	from { color: #<?php echo $settings->original_color; ?> }
	to { color: #<?php echo $settings->animated_color; ?> }
}
@-ms-keyframes bbvm_color_change-<?php echo $id; ?> {
	from { color: #<?php echo $settings->original_color; ?> }
	to { color: #<?php echo $settings->animated_color; ?> }
}
@-o-keyframes bbvm_color_change-<?php echo $id; ?> {
	from { color: #<?php echo $settings->original_color; ?> }
	to { color: #<?php echo $settings->animated_color; ?> }
}
@keyframes bbvm_color_change-<?php echo $id; ?> {
	from { color: #<?php echo $settings->original_color; ?> }
	to { color: #<?php echo $settings->animated_color; ?> }
}
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h1,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h2,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h3,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h4,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h5,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h6 {
	-webkit-animation: bbvm_color_change-<?php echo $id; ?> <?php echo absint( $settings->animation_duration ); ?>s infinite alternate;
	-moz-animation: bbvm_color_change-<?php echo $id; ?> <?php echo absint( $settings->animation_duration ); ?>s infinite alternate;
	-ms-animation: bbvm_color_change-<?php echo $id; ?> <?php echo absint( $settings->animation_duration ); ?>s infinite alternate;
	-o-animation: bbvm_color_change-<?php echo $id; ?> <?php echo absint( $settings->animation_duration ); ?>s infinite alternate;
	animation: bbvm_color_change-<?php echo $id; ?> <?php echo absint( $settings->animation_duration ); ?>s infinite alternate;
}
<?php
endif;
if ( 'gradient' === $settings->animation_type ):
?>
@-webkit-keyframes bbvm_gradient_change-<?php echo $id; ?> {
	from { -webkit-filter: hue-rotate(0deg); }
	to { -webkit-filter: hue-rotate(-360deg); }
}
@-moz-keyframes bbvm_gradient_change-<?php echo $id; ?> {
	from { -webkit-filter: hue-rotate(0deg); }
	to { -webkit-filter: hue-rotate(-360deg); }
}
@-ms-keyframes bbvm_gradient_change-<?php echo $id; ?> {
	from { -webkit-filter: hue-rotate(0deg); }
	to { -webkit-filter: hue-rotate(-360deg); }
}
@-o-keyframes bbvm_gradient_change-<?php echo $id; ?> {
	from { -webkit-filter: hue-rotate(0deg); }
	to { -webkit-filter: hue-rotate(-360deg); }
}
@keyframes bbvm_gradient_change-<?php echo $id; ?> {
	from { -webkit-filter: hue-rotate(0deg); }
	to { -webkit-filter: hue-rotate(-360deg); }
}
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h1,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h2,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h3,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h4,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h5,
.fl-node-<?php echo $id; ?> .fl-bbvm-headlines-for-beaverbuilder h6 {
	background-image: -webkit-linear-gradient(92deg, #<?php echo $settings->gradient_color_first; ?>, #<?php echo $settings->gradient_color_first_last; ?>);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	-webkit-animation: bbvm_gradient_change-<?php echo $id; ?> <?php echo absint( $settings->animation_duration ); ?>s infinite linear;
	-moz-animation: bbvm_gradient_change-<?php echo $id; ?> <?php echo absint( $settings->animation_duration ); ?>s infinite linear;
	-ms-animation: bbvm_gradient_change-<?php echo $id; ?> <?php echo absint( $settings->animation_duration ); ?>s infinite linear;
	-o-animation: bbvm_gradient_change-<?php echo $id; ?> <?php echo absint( $settings->animation_duration ); ?>s infinite linear;
	animation: bbvm_gradient_change-<?php echo $id; ?> <?php echo absint( $settings->animation_duration ); ?>s infinite linear;
}
<?php
endif;
// Padding
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'headline_padding',
	'selector' 	=> ".fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h1, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h2, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h3, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h4, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h5, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h6",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'headline_padding_top',
		'padding-right'  => 'headline_padding_right',
		'padding-bottom' => 'headline_padding_bottom',
		'padding-left' 	 => 'headline_padding_left',
	),
) );
// Margin
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'headline_margin',
	'selector' 	=> ".fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h1, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h2, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h3, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h4, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h5, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h6",
	'unit'		=> 'px',
	'props'		=> array(
		'margin-top' 	 => 'headline_margin_top',
		'margin-right'  => 'headline_margin_right',
		'margin-bottom' => 'headline_margin_bottom',
		'margin-left' 	 => 'headline_margin_left',
	),
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'headline_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h1, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h2, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h3, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h4, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h5, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h6",
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'button_typography',
	'selector' 	=> ".fl-node-$id .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a",
) );