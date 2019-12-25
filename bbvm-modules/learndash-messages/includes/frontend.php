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
<div class="bbvm-learndash-messages-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[visitor %s %s]%s[/visitor]',
			! empty( $settings->user_id ) ? 'user_id="' . $settings->user_id . '"' : '',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : '',
			wp_kses_post( $settings->visitor_content )
		)
	);
	echo do_shortcode(
		sprintf(
			'[student %s %s]%s[/student]',
			! empty( $settings->user_id ) ? 'user_id="' . $settings->user_id . '"' : '',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : '',
			wp_kses_post( $settings->student_content )
		)
	);
	?>
</div>
