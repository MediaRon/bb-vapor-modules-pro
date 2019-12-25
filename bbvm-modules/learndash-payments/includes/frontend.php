<?php
/**
 * LearnDash Course Payments
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-payments-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[learndash_payment_buttons %s]',
			! empty( $settings->course_id ) ? 'course_id="' . $settings->course_id . '"' : ''
		)
	);
	?>
</div>
