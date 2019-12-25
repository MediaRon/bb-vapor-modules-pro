<?php
/**
 * LearnDash User Points
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-user-points-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[ld_user_course_points %s]',
			! empty( $settings->user_id ) ? 'user_id="' . $settings->user_id . '"' : ''
		)
	);
	?>
</div>
