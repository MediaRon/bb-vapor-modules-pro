<?php
/**
 * LearnDash Profile
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-profile-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[ld_profile %s %s %s %s %s %s %s]',
			'order="' . $settings->order . '"',
			'orderby="' . $settings->orderby . '"',
			'expand_all="' . $settings->expand . '"',
			'profile_link="' . $settings->profile_link . '"',
			'show_header="' . $settings->show_header . '"',
			'show_quizzes="' . $settings->show_quizzes . '"',
			'show_search="' . $settings->show_search . '"'
		)
	);
	?>
</div>
