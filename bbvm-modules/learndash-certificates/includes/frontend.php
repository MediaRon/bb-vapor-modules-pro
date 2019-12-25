<?php
/**
 * LearnDash Certificates
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-certificates-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[ld_course_certificate %s]',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : ''
		)
	);
	?>
</div>
