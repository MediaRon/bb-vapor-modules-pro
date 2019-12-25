<?php
/**
 * LearnDash Course Progress
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
