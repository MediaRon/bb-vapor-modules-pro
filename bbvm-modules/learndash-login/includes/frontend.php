<?php
/**
 * LearnDash Login
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-login-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[learndash_login %s %s %s]',
			! empty( $settings->user_id ) ? 'user_id="' . $settings->user_id . '"' : '',
			! empty( $settings->login_label ) ? 'login_label="' . $settings->login_label . '"' : '',
			! empty( $settings->logout_label ) ? 'logout_label="' . $settings->logout_label . '"' : ''
		)
	);
	learndash_load_login_modal_html();
	?>
</div>
