<?php
/**
 * LearnDash Courses
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-courses-wrapper">
	<?php
	$terms_categories = '';
	$terms_tags       = '';
	$taxonomies       = get_object_taxonomies( 'sfwd-courses', 'objects' );
	foreach ( $taxonomies as $bbvm_tax ) {
		$key = 'include_term_tax_' . $bbvm_tax->name;
		if ( isset( $settings->{$key} ) ) {
			if ( 'ld_course_category' === $bbvm_tax->name ) {
				$terms_categories = $settings->{$key};
			} elseif ( 'ld_course_tag' === $bbvm_tax->name ) {
				$terms_tags = $settings->{$key};
			}
		}
	}
	echo do_shortcode(
		sprintf(
			'[ld_course_list %s %s %s %s %s %s %s %s %s %s %s]',
			( ! empty( $terms_tags ) ) ? 'course_tag_id="' . $terms_tags . '"' : '',
			( ! empty( $terms_categories ) ) ? 'course_cat="' . $terms_categories . '"' : '',
			'num="' . $settings->num_courses . '"',
			'mycourses="' . $settings->user_courses . '"',
			'col="' . $settings->col . '"',
			'course_categoryselector="' . $settings->category_selector . '"',
			'order="' . $settings->term_order . '"',
			'orderby="' . $settings->term_orderby . '"',
			'progress_bar="' . $settings->progress_bar . '"',
			'show_thumbnail="' . $settings->show_thumbnail . '"',
			'show_content="' . $settings->show_content . '"'
		)
	);
	?>
</div>
