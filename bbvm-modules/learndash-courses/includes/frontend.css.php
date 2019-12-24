<?php
/**
 * LearnDash Courses
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Course List Styles default styles.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld-item-list-item-preview {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_background_color ) ); ?>;
	overflow: hidden;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld-item-list-item-preview:hover {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_background_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-name {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_anchor_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-name:hover {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_anchor_color_hover ) ); ?>;
}
<?php
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'border',
		'selector'     => ".fl-node-$id .bbvm-learndash-courses-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'course_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-courses-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-name",
	)
);
// Grid styling.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld_course_grid article {
	text-align: <?php echo esc_html( $settings->grid_alignment ); ?>;
	<?php if ( ! empty( $settings->grid_background_color ) ) : ?>
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->grid_background_color ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->grid_progress_inactive ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld_course_grid article .ld-progress-bar {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->grid_progress_inactive ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->grid_progress_active ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld_course_grid article .ld-progress-bar-percentage {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->grid_progress_active ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->button_background_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld_course_grid article .ld_course_grid_button .btn {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_background_color ) ); ?>;
	padding: 10px 20px;
}
<?php endif; ?>
<?php if ( ! empty( $settings->button_background_color_hover ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld_course_grid article .ld_course_grid_button .btn:hover {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_background_color_hover ) ); ?>;
	padding: 10px 20px;
}
<?php endif; ?>
<?php if ( ! empty( $settings->button_text_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld_course_grid article .ld_course_grid_button .btn {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color ) ); ?>;
	padding: 10px 20px;
}
<?php endif; ?>
<?php if ( ! empty( $settings->button_text_color_hover ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld_course_grid article .ld_course_grid_button .btn:hover {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color_hover ) ); ?>;
	padding: 10px 20px;
}
<?php endif; ?>
<?php if ( ! empty( $settings->percentage_text_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld_course_grid article .ld-progress-stats .ld-progress-percentage {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->percentage_text_color ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->progress_text_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld_course_grid article .ld-progress-steps {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->progress_text_color ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->course_price_heading ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-courses-wrapper .ld_course_grid article .ld_course_grid_price {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_price_heading ) ); ?>;
	padding: 15px 0;
}
<?php endif; ?>
<?php
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-courses-wrapper .ld_course_grid article .ld_course_grid_button .btn",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'grid_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-courses-wrapper .ld_course_grid article",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'image_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-courses-wrapper .ld_course_grid article a img",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'grid_padding',
		'selector'     => ".fl-node-$id .bbvm-learndash-courses-wrapper .ld_course_grid article",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'grid_padding_top',
			'padding-right'  => 'grid_padding_right',
			'padding-bottom' => 'grid_padding_bottom',
			'padding-left'   => 'grid_padding_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'price_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-courses-wrapper .ld_course_grid article .ld_course_grid_price",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-courses-wrapper .ld_course_grid article .ld_course_grid_button .btn",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'percentage_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-courses-wrapper .ld_course_grid article .ld-progress-stats .ld-progress-percentage",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'progress_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-courses-wrapper .ld_course_grid article .ld-progress-steps",
	)
);
