<?php
/**
 * LearnDash Course Progress
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Course Progress Styles.
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'border',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-progress-wrapper .ld-progress",
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-progress-wrapper .ld-progress-heading",
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'padding',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-progress-wrapper .ld-progress",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'padding_top',
			'padding-right'  => 'padding_right',
			'padding-bottom' => 'padding_bottom',
			'padding-left'   => 'padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'margin',
		'selector'     => ".fl-node-$id .bbvm-learndash-course-progress-wrapper .ld-progress",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'margin_top',
			'margin-right'  => 'margin_right',
			'margin-bottom' => 'margin_bottom',
			'margin-left'   => 'margin_left',
		),
	)
);
?>
<?php if ( ! empty( $settings->background_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-progress-wrapper .ld-progress {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->completed_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-progress-wrapper .ld-progress-bar .ld-progress-bar-percentage {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->completed_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-progress-wrapper .learndash-wrapper .ld-progress .ld-progress-heading .ld-progress-stats .ld-progress-percentage {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->completed_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->incomplete_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-progress-wrapper .learndash-wrapper.learndash-widget .ld-progress .ld-progress-bar {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->incomplete_color ) ); ?>;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-course-progress-wrapper .ld-progress-heading .ld-progress-steps {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->incomplete_color ) ); ?>;
	}
<?php endif; ?>
