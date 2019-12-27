<?php
/**
 * LearnDash Profile
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Image Styles.
?>
<?php if ( 'square' === $settings->profile_appearance ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-profile-avatar {
	border-radius: 0;
}
<?php endif; ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-profile-summary .ld-profile-card .ld-profile-avatar {
	width: <?php echo absint( $settings->profile_width ); ?>px;
	height: <?php echo absint( $settings->profile_width ); ?>px;
}
<?php
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'profile_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-profile-summary .ld-profile-card .ld-profile-avatar",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'course_title',
		'selector'     => ".fl-node-$id .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-course-title, .fl-node-$id .bbvm-learndash-profile-wrapper .wpProQuiz_modal_window #wpProQuiz_user_content h2",
	)
);
?>
<?php if ( ! empty( $settings->stats_text_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .ld-profile-stats,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .ld-profile-stats .ld-profile-stat span,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .ld-section-heading h3 {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->stats_text_color ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->search_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-section-heading .ld-search-prompt,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .ld-search-prompt .ld-icon-search,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-section-heading .ld-search-prompt:hover,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .ld-search-prompt .ld-icon-search:hover {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->search_color ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->accent_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-item-list-actions .ld-expand-button,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-expand-button,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-table-list-header,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .wpProQuiz_modal_window #wpProQuiz_overlay_close,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper #wpProQuiz_user_content table.wp-list-table thead th,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-button:not(.ld-js-register-account):not(.learndash-link-previous-incomplete):not(.ld-button-transparent),
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-button:hover:not(.ld-js-register-account):not(.learndash-link-previous-incomplete):not(.ld-button-transparent) {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->accent_color ) ); ?> !important;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-course-title,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-course-title:hover,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-icon-certificate {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->accent_color ) ); ?> !important;
}
<?php endif; ?>
<?php if ( ! empty( $settings->accent_text_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-item-list-actions .ld-expand-button,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-item-list .ld-expand-button,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper #wpProQuiz_user_content a,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-button:not(.ld-js-register-account):not(.learndash-link-previous-incomplete):not(.ld-button-transparent) {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->accent_text_color ) ); ?>;
	font-weight: 700;
}
<?php endif; ?>
<?php if ( ! empty( $settings->course_progress_complete_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-progress .ld-progress-bar .ld-progress-bar-percentage {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_progress_complete_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-progress .ld-progress-heading .ld-progress-stats .ld-progress-percentage {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_progress_complete_color ) ); ?>;
	font-weight: 700;
}
<?php endif; ?>
<?php if ( ! empty( $settings->course_progress_incomplete_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-profile-wrapper .learndash-wrapper .ld-progress .ld-progress-bar {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_progress_incomplete_color ) ); ?>;
}
<?php endif; ?>
