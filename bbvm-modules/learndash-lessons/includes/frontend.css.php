<?php
/**
 * LearnDash Lessons
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Lessons List Styles.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-lessons-wrapper .ld-item-list-item-preview {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color ) ); ?>;
	overflow: hidden;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-lessons-wrapper .ld-item-list-item-preview:hover {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-lessons-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-name {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->anchor_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-lessons-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-name:hover {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->anchor_color_hover ) ); ?>;
}
<?php
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'border',
		'selector'     => ".fl-node-$id .bbvm-learndash-lessons-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'lesson_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-lessons-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-name",
	)
);
