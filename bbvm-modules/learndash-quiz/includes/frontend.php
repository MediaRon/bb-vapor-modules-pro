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
	$maybe_quiz = get_queried_object_id();
	if ( 'sfwd-quiz' === get_post_type( $maybe_quiz ) ) {
		if ( ! empty( $settings->quiz_id ) ) {
			$maybe_quiz = $settings->quiz_id;
		}
	} else {
		$maybe_quiz = false;
	}

	echo do_shortcode(
		sprintf(
			'[ld_quiz %s %s]',
			$maybe_quiz ? 'quiz_id="' . $maybe_quiz . '"' : '',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : ''
		)
	);
	?>
</div>
