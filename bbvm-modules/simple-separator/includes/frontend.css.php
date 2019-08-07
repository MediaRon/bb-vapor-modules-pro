<?php
/**
 * Simple Separator Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-simple-separator {
	clear: both;
	width: <?php echo absint( $settings->width ); ?>%;
	border-top-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->color ) ); ?>;
	border-top-style: <?php echo esc_html( $settings->style ); ?>;
	border-top-width: <?php echo absint( $settings->height ); ?>px;
	background: transparent;
}
