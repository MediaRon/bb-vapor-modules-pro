<?php
/**
 * LearnDash Quiz Module
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-quiz-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[ld_quiz %s %s]',
			! empty( $settings->quiz_id ) ? 'quiz_id="' . $settings->quiz_id . '"' : '',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : ''
		)
	);
	?>
</div>
