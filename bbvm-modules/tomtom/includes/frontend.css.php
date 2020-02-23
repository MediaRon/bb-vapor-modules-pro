<?php
/**
 * TomTom Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.2.0
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
.fl-node-<?php echo esc_html( $id ); ?> #marker {
	display: block;
	position: absolute;
	width: 20px;
	height: 32px;
	background-image: url(<?php echo esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/tomtom/includes/location-pin.png' ); ?>);
	background-size: cover;
	background-repeat: no-repeat;
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

