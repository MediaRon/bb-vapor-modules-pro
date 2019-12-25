<?php
/**
 * LearnDash Topics
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Topics List Styles.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld-item-list-item-preview {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->topic_background_color ) ); ?>;
	overflow: hidden;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld-item-list-item-preview:hover {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->topic_background_color_hover ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-name {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->topic_anchor_color ) ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-name:hover {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->topic_anchor_color_hover ) ); ?>;
}
<?php
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'border',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'topic_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item .ld-item-name",
	)
);
// Grid styling.
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld_course_grid article {
	text-align: <?php echo esc_html( $settings->grid_alignment ); ?>;
	<?php if ( ! empty( $settings->grid_background_color ) ) : ?>
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->grid_background_color ) ); ?>;
	<?php endif; ?>
}
<?php if ( ! empty( $settings->grid_progress_inactive ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld_course_grid article .ld-progress-bar {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->grid_progress_inactive ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->grid_progress_active ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld_course_grid article .ld-progress-bar-percentage {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->grid_progress_active ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->button_background_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld_course_grid article .ld_course_grid_button .btn {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_background_color ) ); ?>;
	padding: 10px 20px;
}
<?php endif; ?>
<?php if ( ! empty( $settings->button_background_color_hover ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld_course_grid article .ld_course_grid_button .btn:hover {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_background_color_hover ) ); ?>;
	padding: 10px 20px;
}
<?php endif; ?>
<?php if ( ! empty( $settings->button_text_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld_course_grid article .ld_course_grid_button .btn {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color ) ); ?>;
	padding: 10px 20px;
	text-decoration: none;
}
<?php endif; ?>
<?php if ( ! empty( $settings->button_text_color_hover ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld_course_grid article .ld_course_grid_button .btn:hover {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_text_color_hover ) ); ?>;
	padding: 10px 20px;
	text-decoration: none;
}
<?php endif; ?>
<?php if ( ! empty( $settings->percentage_text_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld_course_grid article .ld-progress-stats .ld-progress-percentage {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->percentage_text_color ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->progress_text_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld_course_grid article .ld-progress-steps {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->progress_text_color ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->course_price_heading ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .ld_course_grid article .ld_course_grid_price {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->course_price_heading ) ); ?>;
	padding: 15px 0;
}
<?php endif; ?>
<?php
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .ld_course_grid article .ld_course_grid_button .btn",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'grid_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .ld_course_grid article",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'image_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .ld_course_grid article a img",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'grid_padding',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .ld_course_grid article",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'grid_padding_top',
			'padding-right'  => 'grid_padding_right',
			'padding-bottom' => 'grid_padding_bottom',
			'padding-left'   => 'grid_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'category_selector_padding',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper #ld_topic_categorydropdown",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'category_selector_padding_top',
			'padding-right'  => 'category_selector_padding_right',
			'padding-bottom' => 'category_selector_padding_bottom',
			'padding-left'   => 'category_selector_padding_left',
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'price_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .ld_course_grid article .ld_course_grid_price",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .ld_course_grid article .ld_course_grid_button .btn",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'percentage_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .ld_course_grid article .ld-progress-stats .ld-progress-percentage",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'progress_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .ld_course_grid article .ld-progress-steps",
	)
);
// Pagination Styles.
?>
<?php if ( ! empty( $settings->pager_background ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .learndash-pager {
	background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->pager_background ) ); ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->pager_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .learndash-pager,
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper .learndash-pager a {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->pager_color ) ); ?>;
}
<?php endif; ?>
<?php
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pager_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .learndash-pager",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pager_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .learndash-pager",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pager_padding',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .learndash-pager",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'pager_padding_top',
			'padding-right'  => 'pager_padding_right',
			'padding-bottom' => 'pager_padding_bottom',
			'padding-left'   => 'pager_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'pager_margin',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper .learndash-pager",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'pager_margin_top',
			'margin-right'  => 'pager_margin_right',
			'margin-bottom' => 'pager_margin_bottom',
			'margin-left'   => 'pager_margin_left',
		),
	)
);
// Title styles.
?>
<?php if ( ! empty( $settings->title_color ) ) : ?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-topics-wrapper article .entry-title {
	color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->title_color ) ); ?>;
}
<?php endif; ?>
<?php
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper article .entry-title",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_padding',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper article .entry-title",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'title_padding_top',
			'padding-right'  => 'title_padding_right',
			'padding-bottom' => 'title_padding_bottom',
			'padding-left'   => 'title_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_margin',
		'selector'     => ".fl-node-$id .bbvm-learndash-topics-wrapper article .entry-title",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'title_margin_top',
			'margin-right'  => 'title_margin_right',
			'margin-bottom' => 'title_margin_bottom',
			'margin-left'   => 'title_margin_left',
		),
	)
);
