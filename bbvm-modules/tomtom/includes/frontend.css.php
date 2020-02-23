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
.fl-node-<?php echo esc_html( $id ); ?> .bbvm-tomtom-map-wrapper {
	position: relative;
	width: <?php echo absint( $settings->width ) . esc_html( $settings->width_unit ); ?>;
	height: <?php echo absint( $settings->height ); ?>px;
}
.fl-node-<?php echo esc_html( $id ); ?> .mapboxgl-marker {
	position: relative;
}
<?php
if ( 'yes' === $settings->sidebar ) :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-map {
		bottom: 0;
		left: 25%;
		position: absolute;
		top: 0;
		width: 75%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-tomtom-map-sidebar {
		border: 1px solid #000;
		height: 100%;
		left: 0;
		overflow-y: scroll;
		position: absolute;
		top: 0;
		width: 25%;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .city {
		margin: 0;
		padding: 15px 20px;
		background: #ebebeb;
		font-size: 1.0em;
		cursor: pointer;
		font-weight: 700;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .city:hover {
		background: #dddfe0
	}
	.fl-node-<?php echo esc_html( $id ); ?> .location-wrapper .list-entry {
		margin: 0;
		padding: 15px 20px;
		border-bottom: 1px solid #707070;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-tomtom-map-sidebar {
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->sidebar_background ) ); ?>;
		height: 100%;
		left: 0;
		overflow-y: scroll;
		position: absolute;
		top: 0;
		width: 25%;
	}
	<?php
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'sidebar_border',
			'selector'     => ".fl-node-$id .bbvm-tomtom-map-sidebar",
		)
	);
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .city {
		margin: 0;
		padding: 15px 20px;
		color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->heading_color ) ); ?>;
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->heading_background_color ) ); ?>;
		font-size: 1.0em;
		cursor: pointer;
		font-weight: 700;
	}
	.fl-node-<?php echo esc_html( $id ); ?> .city:hover {
		background: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $settings->heading_background_color_hover ) ); ?>;
	}
	<?php
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'heading_border',
			'selector'     => ".fl-node-$id .city",
		)
	);
	?>
	<?php
else :
	?>
	.fl-node-<?php echo esc_html( $id ); ?> .bbvm-map {
		bottom: 0;
		left: 0;
		position: absolute;
		top: 0;
		width: 100%;
	}
	<?php
endif;
?>
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

