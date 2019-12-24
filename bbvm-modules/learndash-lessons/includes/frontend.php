<?php
/**
 * LearnDash Lessons
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

?>
<div class="bbvm-learndash-lessons-wrapper">
	<?php
	$terms_categories = '';
	$terms_tags       = '';
	$taxonomies       = get_object_taxonomies( 'sfwd-lessons', 'objects' );
	foreach ( $taxonomies as $bbvm_tax ) {
		$key = 'include_term_tax_' . $bbvm_tax->name;
		if ( isset( $settings->{$key} ) ) {
			if ( 'ld_lesson_category' === $bbvm_tax->name ) {
				$terms_categories = $settings->{$key};
			} elseif ( 'ld_lesson_tag' === $bbvm_tax->name ) {
				$terms_tags = $settings->{$key};
			}
		}
	}
	echo do_shortcode(
		sprintf(
			'[ld_lesson_list %s %s %s %s %s %s]',
			! empty( $term_tags ) ? 'lesson_tag_id="' . $terms_tags . '"' : '',
			! empty( $term_categories ) ? 'lesson_cat="' . $terms_categories . '"' : '',
			'num="' . $settings->num_courses . '"',
			'lesson_categoryselector="' . $settings->category_selector . '"',
			'order="' . $settings->term_order . '"',
			'orderby="' . $settings->term_orderby . '"'
		)
	);
	?>
</div>
