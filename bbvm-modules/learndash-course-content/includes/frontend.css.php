<?php
/**
 * LearnDash Course Content
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Course Content Styles.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-content-wrapper .ld-section-heading h2, .fl-node-$id .bbvm-learndash-course-content-wrapper .ld-section-heading",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_padding',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-item-list .ld-section-heading",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'heading_padding_top',
			'padding-right'  => 'heading_padding_right',
			'padding-bottom' => 'heading_padding_bottom',
			'padding-left'   => 'heading_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_margin',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-item-list .ld-section-heading",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'heading_margin_top',
			'margin-right'  => 'heading_margin_right',
			'margin-bottom' => 'heading_margin_bottom',
			'margin-left'   => 'heading_margin_left',
		),
	)
);
if ( ! empty( $settings->heading_color ) ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .ld-section-heading h2 {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->heading_color ) ); ?>;
	}
<?php endif; ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .ld-item-list-item-preview .ld-section-heading h2 {
	width: 100%;
}
<?php
// Bar styles.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'course_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-content-wrapper .ld-item-list-item-preview .ld-item-title",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'course_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item",
	)
);
if ( ! empty( $settings->course_color ) ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .ld-item-list-item-preview .ld-item-title {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-title .ld-item-components {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->course_color_hover ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .ld-item-list-item-preview .ld-item-title:hover {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_color_hover ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-title .ld-item-components:hover {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_color_hover ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->course_background_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .ld-item-list-item-preview {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_background_color ) ); ?>;
		transition: background-color 0.5s ease;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->course_background_color_hover ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .ld-item-list-item-preview:hover {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_background_color_hover ) ); ?>;
		transition: background-color 0.5s ease;
	}
<?php endif; ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-item-list-item {
	overflow: hidden;
}
<?php
// Course Expand Options.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'expand_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-content-wrapper .ld-item-list-items .ld-expand-button .ld-text",
	)
);
?>
<?php if ( ! empty( $settings->expand_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .ld-item-list-items .ld-expand-button .ld-text {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->expand_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .ld-item-list-items .ld-expand-button .ld-icon-arrow-down {
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->expand_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->arrow_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-item-list-items .ld-expand-button.ld-button-alternate .ld-icon {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->arrow_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->accent_background_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-section-heading .ld-expand-button {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->accent_background_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-table-list .ld-table-list-header {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->accent_background_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->accent_text_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-section-heading .ld-expand-button {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->accent_text_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-table-list .ld-table-list-header {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->accent_text_color ) ); ?>;
	}
<?php endif; ?>
