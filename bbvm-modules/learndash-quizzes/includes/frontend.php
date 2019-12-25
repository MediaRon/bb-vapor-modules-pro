<?php
/**
 * LearnDash Quizzes
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-quizzes-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[ld_quiz_list %s %s %s %s %s %s %s %s]',
			'num="' . $settings->num_quizzes . '"',
			'order="' . $settings->term_order . '"',
			'orderby="' . $settings->term_orderby . '"',
			'col="' . $settings->col . '"',
			'progress_bar="' . $settings->progress_bar . '"',
			'show_thumbnail="' . $settings->show_thumbnail . '"',
			'show_content="' . $settings->show_content . '"',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : ''
		)
	);
	?>
</div>
