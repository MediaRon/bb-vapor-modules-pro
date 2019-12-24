<?php
/**
 * LearnDash Quizes
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-quizes-wrapper">
	<?php
	echo do_shortcode(
		sprintf(
			'[ld_quiz_list %s %s %s]',
			'num="' . $settings->num_courses . '"',
			'order="' . $settings->term_order . '"',
			'orderby="' . $settings->term_orderby . '"'
		)
	);
	?>
</div>
