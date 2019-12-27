<?php
/**
 * LearnDash Course Status
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'course_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-messages-wrapper",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-messages-wrapper h1, .fl-node-$id .bbvm-learndash-messages-wrapper h2, .fl-node-$id .bbvm-learndash-messages-wrapper h3, .fl-node-$id .bbvm-learndash-messages-wrapper h4, .fl-node-$id .bbvm-learndash-messages-wrapper h5, .fl-node-$id .bbvm-learndash-messages-wrapper h6",
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-messages-wrapper * {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_color ) ); ?>;
}
