<?php
/**
 * LearnDash Login
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Login styles.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'label_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-login-wrapper",
	)
);
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_border',
		'selector'     => ".fl-node-$id .bbvm-learndash-login-wrapper .learndash-wrapper .ld-button",
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-login-wrapper .learndash-wrapper .ld-button {
	margin: <?php echo esc_html( $settings->placement ); ?>;
}
<?php if ( ! empty( $settings->text_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-login-wrapper .learndash-wrapper .ld-button {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->text_color_hover ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-login-wrapper .learndash-wrapper .ld-button:hover {
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->text_color_hover ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->background_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-login-wrapper .learndash-wrapper .ld-button {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color ) ); ?>;
	}
<?php endif; ?>
<?php if ( ! empty( $settings->background_color_hover ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-login-wrapper .learndash-wrapper .ld-button:hover {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->background_color_hover ) ); ?>;
	}
<?php endif; ?>
