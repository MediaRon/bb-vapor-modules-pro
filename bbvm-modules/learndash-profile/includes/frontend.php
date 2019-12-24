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
			'[ld_profile %s %s]',
			'order="' . $settings->order . '"',
			'orderby="' . $settings->orderby . '"'
		)
	);
	?>
</div>
