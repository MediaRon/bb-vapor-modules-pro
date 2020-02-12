<?php
/**
 * Button Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-map {
	width: <?php echo absint( $settings->width ) . esc_html( $settings->width_unit ); ?>;
	height: <?php echo absint( $settings->height ); ?>px;
}

