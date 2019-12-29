<?php
/**
 * LearnDash User Status
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-user-status-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[learndash_user_status %s]',
			! empty( $settings->user_id ) ? 'user_id="' . $settings->user_id . '"' : ''
		)
	);
	?>
</div>
