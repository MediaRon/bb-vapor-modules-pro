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
	echo do_shortcode(
		sprintf(
			'[ld_course_info %s]',
			! empty( $settings->user_id ) ? 'user_id="' . $settings->user_id . '"' : ''
		)
	);
	?>
</div>
