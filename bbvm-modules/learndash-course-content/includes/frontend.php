<?php
/**
 * LearnDash Course Content
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-course-content-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[course_content %s num="false"]',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : ''
		)
	);
	?>
</div>
