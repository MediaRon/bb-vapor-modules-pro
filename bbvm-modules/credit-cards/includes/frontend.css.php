<?php
/**
 * Credit Cards Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

// Align.
$align = isset( $settings->align ) ? $settings->align : 'center';
$margin = '0 auto';
if ( 'left' === $align ) {
	$margin = '0';
} elseif ( 'right' === $align ) {
	$margin = '0 0 0 auto';
}
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-credit-cards-for-beaverbuilder {
	text-align: <?php echo esc_html( $align ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-credit-cards-for-beaverbuilder img {
	display: <?php echo esc_html( ( 'stacked' === $settings->appearance ) ? 'block' : 'inline' ); ?>;
	margin: <?php echo esc_html( $margin ); ?>;
}
