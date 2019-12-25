<?php
/**
 * LearnDash Course Info
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-course-info-wrapper">
	<?php
	$module->sync_settings();
	add_filter( 'learndash_ld_course_list_shortcode_defaults', array( 'BBVapor_LearnDash_Course_Info', 'bbvm_course_info_filter' ) );
	echo do_shortcode(
		sprintf(
			'[ld_course_info %s %s %s %s %s %s %s]',
			! empty( $settings->user_id ) ? 'user_id="' . $settings->user_id . '"' : '',
			'orderby="' . $settings->orderby . '"',
			'order="' . $settings->order . '"',
			'registered_num="' . $settings->num . '"',
			'registered_show_thumbnail="' . $settings->show_thumbnail . '"',
			'progress_num="' . $settings->course_progress . '"',
			'quiz_num="' . $settings->course_quizzes . '"'
		)
	);
	remove_filter( 'learndash_ld_course_list_shortcode_defaults', array( 'BBVapor_LearnDash_Course_Info', 'bbvm_course_info_filter' ) );
	?>
</div>

