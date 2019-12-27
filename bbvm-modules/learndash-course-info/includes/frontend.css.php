<?php
/**
 * LearnDash Course Info
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Course Info Styles.
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'thumbnail_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-info-wrapper .ld-course-info-my-courses img",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'border',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-info-wrapper",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-info-wrapper .ld-entry-title.entry-title",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'content_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-info-wrapper, .fl-node-$id .bbvm-learndash-course-info-wrapper .ld_course_info_mycourses_list h4, .fl-node-$id .bbvm-learndash-course-info-wrapper #course_progress_details h4, .fl-node-$id .bbvm-learndash-course-info-wrapper #quiz_progress_details h4",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_padding',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-info-wrapper .ld-entry-title.entry-title",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'heading_padding_top',
			'padding-right'  => 'heading_padding_right',
			'padding-bottom' => 'heading_padding_bottom',
			'padding-left'   => 'heading_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_margin',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-info-wrapper .ld-entry-title.entry-title",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'heading_margin_top',
			'margin-right'  => 'heading_margin_right',
			'margin-bottom' => 'heading_margin_bottom',
			'margin-left'   => 'heading_margin_left',
		),
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-info-wrapper .ld-course-info-my-courses img {
	max-width: <?php echo absint( $settings->thumbnail_width ); ?>px;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-info-wrapper .ld-course-info-my-courses,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-info-wrapper .ld-course-registered-pager-container,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-info-wrapper .course_progress_details,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-info-wrapper #ld_course_info_mycourses_list,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-info-wrapper .quiz_progress_details {
	text-align: <?php echo esc_html( $settings->alignment ); ?>;
}
<?php if ( ! empty( $settings->heading_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-info-wrapper .ld-entry-title.entry-title a,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-info-wrapper .ld-entry-title.entry-title a:hover {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->heading_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->content_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-info-wrapper {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->content_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->background_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-info-wrapper {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color ) ); ?>;
		padding: 20px;
	}
<?php endif; ?>
