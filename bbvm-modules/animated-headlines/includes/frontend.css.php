.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h1,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h2,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h3,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h4,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h5,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h6 {
	animation-duration: <?php echo absint( $settings->animation_duration ); ?>s;
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->headline_text_color ) ); ?>;
}
<?php
if ( 'color' === $settings->animation_type ) :
	?>
@-webkit-keyframes bbvm_color_change-<?php echo esc_html( $id ); ?> {
	from { color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->original_color ) ); ?> }
	to { color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->animated_color ) ); ?> }
}
@-moz-keyframes bbvm_color_change-<?php echo esc_html( $id ); ?> {
	from { color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->original_color ) ); ?> }
	to { color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->animated_color ) ); ?> }
}
@-ms-keyframes bbvm_color_change-<?php echo esc_html( $id ); ?> {
	from { color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->original_color ) ); ?> }
	to { color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->animated_color ) ); ?> }
}
@-o-keyframes bbvm_color_change-<?php echo esc_html( $id ); ?> {
	from { color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->original_color ) ); ?> }
	to { color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->animated_color ) ); ?> }
}
@keyframes bbvm_color_change-<?php echo esc_html( $id ); ?> {
	from { color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->original_color ) ); ?> }
	to { color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->animated_color ) ); ?> }
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h1,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h2,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h3,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h4,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h5,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h6 {
	-webkit-animation: bbvm_color_change-<?php echo esc_html( $id ); ?> <?php echo absint( $settings->animation_duration ); ?>s infinite alternate;
	-moz-animation: bbvm_color_change-<?php echo esc_html( $id ); ?> <?php echo absint( $settings->animation_duration ); ?>s infinite alternate;
	-ms-animation: bbvm_color_change-<?php echo esc_html( $id ); ?> <?php echo absint( $settings->animation_duration ); ?>s infinite alternate;
	-o-animation: bbvm_color_change-<?php echo esc_html( $id ); ?> <?php echo absint( $settings->animation_duration ); ?>s infinite alternate;
	animation: bbvm_color_change-<?php echo esc_html( $id ); ?> <?php echo absint( $settings->animation_duration ); ?>s infinite alternate;
}
	<?php
endif;
if ( 'gradient' === $settings->animation_type ) :
	?>
@-webkit-keyframes bbvm_gradient_change-<?php echo esc_html( $id ); ?> {
	0%{ background-position:0% 50% }
	50%{ background-position:100% 50% }
	100%{ background-position:0% 50% }
}
@-moz-keyframes bbvm_gradient_change-<?php echo esc_html( $id ); ?> {
	0%{ background-position:0% 50% }
	50%{ background-position:100% 50% }
	100%{ background-position:0% 50% }
}
@-ms-keyframes bbvm_gradient_change-<?php echo esc_html( $id ); ?> {
	0%{ background-position:0% 50% }
	50%{ background-position:100% 50% }
	100%{ background-position:0% 50% }
}
@-o-keyframes bbvm_gradient_change-<?php echo esc_html( $id ); ?> {
	0%{ background-position:0% 50% }
	50%{ background-position:100% 50% }
	100%{ background-position:0% 50% }
}
@keyframes bbvm_gradient_change-<?php echo esc_html( $id ); ?> {
	0%{ background-position:0% 50% }
	50%{ background-position:100% 50% }
	100%{ background-position:0% 50% }
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h1,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h2,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h3,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h4,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h5,
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-headlines-for-beaverbuilder h6 {
	background-image: -webkit-linear-gradient(92deg, <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->gradient_color_first ) ); ?>, <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->gradient_color_first_last ) ); ?>);
	background-size: 400% 400%;
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	-webkit-animation: bbvm_gradient_change-<?php echo esc_html( $id ); ?> <?php echo absint( $settings->animation_duration ); ?>s infinite linear;
	-moz-animation: bbvm_gradient_change-<?php echo esc_html( $id ); ?> <?php echo absint( $settings->animation_duration ); ?>s infinite linear;
	-ms-animation: bbvm_gradient_change-<?php echo esc_html( $id ); ?> <?php echo absint( $settings->animation_duration ); ?>s infinite linear;
	-o-animation: bbvm_gradient_change-<?php echo esc_html( $id ); ?> <?php echo absint( $settings->animation_duration ); ?>s infinite linear;
	animation: bbvm_gradient_change-<?php echo esc_html( $id ); ?> <?php echo absint( $settings->animation_duration ); ?>s infinite linear;
}
	<?php
endif;
// Padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'headline_padding',
		'selector'     => ".fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h1, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h2, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h3, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h4, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h5, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h6",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'headline_padding_top',
			'padding-right'  => 'headline_padding_right',
			'padding-bottom' => 'headline_padding_bottom',
			'padding-left'   => 'headline_padding_left',
		),
	)
);
// Margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'headline_margin',
		'selector'     => ".fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h1, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h2, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h3, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h4, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h5, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h6",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'headline_margin_top',
			'margin-right'  => 'headline_margin_right',
			'margin-bottom' => 'headline_margin_bottom',
			'margin-left'   => 'headline_margin_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'headline_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h1, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h2, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h3, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h4, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h5, .fl-node-$id .fl-bbvm-headlines-for-beaverbuilder h6",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_typography',
		'selector'     => ".fl-node-$id .fl-bbvm-alerts-for-beaverbuilder .fl-bbvm-alert-button a",
	)
);
