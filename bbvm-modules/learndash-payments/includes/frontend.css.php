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
?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-learndash-payments-wrapper .learndash_checkout_buttons {
	text-align: <?php echo esc_html( $settings->alignment ); ?>;
}
