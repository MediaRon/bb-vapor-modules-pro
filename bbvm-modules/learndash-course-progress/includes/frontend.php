<?php
/**
 * LearnDash Course Progress
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-course-progress-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[learndash_course_progress %s %s]',
			! empty( $settings->user_id ) ? 'user_id="' . $settings->user_id . '"' : '',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : ''
		)
	);
	?>
</div>

