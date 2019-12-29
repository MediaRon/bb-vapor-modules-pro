<?php
/**
 * LearnDash Certificates
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Course Certificate.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'label_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-certificates-wrapper #learndash_course_certificate a",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-certificates-wrapper #learndash_course_certificate a",
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-certificates-wrapper #learndash_course_certificate {
	text-align: <?php echo esc_html( $settings->button_align ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-certificates-wrapper #learndash_course_certificate a {
	display: inline-block;
	padding: 10px 20px;
}
<?php if ( ! empty( $settings->text_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-certificates-wrapper #learndash_course_certificate a {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->text_color_hover ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-certificates-wrapper #learndash_course_certificate a:hover {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color_hover ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->background_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-certificates-wrapper #learndash_course_certificate a {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->background_color_hover ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-certificates-wrapper #learndash_course_certificate a:hover {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color_hover ) ); ?>;
	}
<?php endif; ?>
