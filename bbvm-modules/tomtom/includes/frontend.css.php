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
<?php
$count = 0;
foreach ( $settings->markers as $marker ) {
	if ( ! empty( $marker->marker_icon_src ) ) {
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .marker-<?php echo absint( $count ); ?> {
			display: block;
			position: absolute;
			width: 32px;
			height: 32px;
			background-image: url(<?php echo esc_url( $marker->marker_icon_src ); ?>);
			background-size: cover;
			background-repeat: no-repeat;
		}
		<?php
	} else {
		?>
		.fl-node-<?php echo esc_html( $id ); ?> .marker-<?php echo absint( $count ); ?> {
			display: block;
			position: absolute;
			width: 20px;
			height: 32px;
			background-image: url(<?php echo esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/tomtom/includes/location-pin.png' ); ?>);
			background-size: cover;
			background-repeat: no-repeat;
		}
		<?php
	}
	?>
	<?php
	$count++;
}
?>
.mapboxgl-popup-close-button {
	position: absolute;
	color: #a11d21;
	margin: 0;
	line-height: 1.0;
	padding: 5px;
	top: 0;
	right: 0;
}
.mapboxgl-popup-close-button:hover {
	position: absolute;
	background: #a11d21;
	color: #FFF;
}

