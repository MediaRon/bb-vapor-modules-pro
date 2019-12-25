<?php
/**
 * LearnDash Course Status
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-course-status-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[course_complete %s %s]%s[/course_complete]',
			! empty( $settings->user_id ) ? 'user_id="' . $settings->user_id . '"' : '',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : '',
			wp_kses_post( $settings->course_complete_content )
		)
	);
	echo do_shortcode(
		sprintf(
			'[course_inprogress %s %s]%s[/course_inprogress]',
			! empty( $settings->user_id ) ? 'user_id="' . $settings->user_id . '"' : '',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : '',
			wp_kses_post( $settings->course_inprogress_content )
		)
	);
	echo do_shortcode(
		sprintf(
			'[course_notstarted %s %s]%s[/course_notstarted]',
			! empty( $settings->user_id ) ? 'user_id="' . $settings->user_id . '"' : '',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : '',
			wp_kses_post( $settings->course_notstarted_content )
		)
	);
	?>
</div>

