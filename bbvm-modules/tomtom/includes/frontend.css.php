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
	position: relative;
	width: <?php echo absint( $settings->width ) . esc_html( $settings->width_unit ); ?>;
	height: <?php echo absint( $settings->height ); ?>px;
}
.fl-node-<?php echo esc_html( $id ); ?> .mapboxgl-marker {
	position: relative;
}
#marker {
	display: block;
	position: absolute;
	width: 20px;
	height: 20px;
	background: red;
}
.mapboxgl-popup-close-button {
	color: #a11d21;
	margin: 0;
	line-height: 1.0;
	text-align: right;
	padding: 5px;
}
.mapboxgl-popup-close-button:hover {
	background: #a11d21;
	color: #FFF;
}

