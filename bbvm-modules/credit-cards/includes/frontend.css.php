<?php
/**
 * Credit Cards Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

$align  = isset( $settings->align ) ? $settings->align : 'center';
$margin = '0 auto';
if ( 'left' === $align ) {
	$margin = '0';
} elseif ( 'right' === $align ) {
	$margin = '0 0 0 auto';
}
$size           = isset( $settings->size ) ? $settings->size : 'medium';
$card_max_width = '96px';
if ( 'small' === $size ) {
	$card_max_width = '60px';
} elseif ( 'large' === $size ) {
	$card_max_width = '128px';
}
?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-credit-cards-for-beaverbuilder {
	text-align: <?php echo esc_html( $align ); ?>;
}
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-credit-cards-for-beaverbuilder img {
	display: <?php echo esc_html( ( 'stacked' === $settings->appearance ) ? 'block' : 'inline' ); ?>;
	margin: <?php echo esc_html( $margin ); ?>;
	max-width: <?php echo esc_html( $card_max_width ); ?>;
}
