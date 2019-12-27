<?php
/**
 * LearnDash Course Payments
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// Course Payment styles.
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'course_typography',
		'selector'     => ".fl-node-$id .bbvm-learndash-payments-wrapper .learndash_checkout_buttons input",
	)
);
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-payments-wrapper .learndash_checkout_buttons {
	text-align: <?php echo esc_html( $settings->alignment ); ?>;
}
<?php if ( ! empty( $settings->button_background_color ) ) : ?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-payments-wrapper .learndash_checkout_buttons input,
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-payments-wrapper .learndash_checkout_buttons input:hover {
		background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->button_background_color ) ); ?>;
		padding: 10px 20px;
		border: 0;
	}
<?php endif; ?>
.jq-dropdown-menu input[type='submit'],
.jq-dropdown-menu input:hover[type='submit'],
.learndash_checkout_button a,
.learndash_checkout_button a:hover {
	background-color: inherit;
	color: #000 !important;
	padding: 0px 20px !important;
	text-align: center;
	border: 0 !important;
	font-size: 18px !important;
	cursor: pointer;
}
