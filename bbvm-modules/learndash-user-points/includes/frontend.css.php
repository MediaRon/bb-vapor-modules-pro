<?php
/**
 * LearnDash User Points
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// User Points styles.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'course_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-user-points-wrapper",
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-user-points-wrapper {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_color ) ); ?>;
}
