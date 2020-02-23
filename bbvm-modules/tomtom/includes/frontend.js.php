<?php
/**
 * Front-end JS for TomTom Map
 *
 * @package BB Vapor Modules Pro
 *
 * @since 2.2.0
 */

$map_appearance = $settings->map_style;
$map_json       = '';
$map_strip      = array( "\r\n", "\n", "\r", '<br/>', '<br>' );
switch ( $map_appearance ) {
	case 'custom':
		$map_json = json_decode( $settings->map_json_raw );
		$map_json = wp_json_encode( $map_json, 0, 2000 );
		break;
	default:
		break;
}
?>
( function ( $ ) {
	var markers = new Array();
	<?php
	foreach ( $settings->markers as $marker ) {
		?>
		var location = [];
		location['latitude'] = '<?php echo esc_js( $marker->latitude ); ?>';
		location['longitude'] = '<?php echo esc_js( $marker->longitude ); ?>';
		location['show_info'] = '<?php echo esc_js( $marker->show_info ); ?>';
		location['marker_icon'] = '<?php echo esc_js( $marker->marker_icon_src ); ?>';
		location['name'] = '<?php echo esc_js( $marker->location_name ); ?>';
		location['location'] = '<?php echo esc_js( $marker->location ); ?>';
		location['phone'] = '<?php echo esc_js( $marker->phone ); ?>';
		location['show_link'] = '<?php echo esc_js( $marker->show_link ); ?>';
		location['link_text'] = '<?php echo esc_js( $marker->link_text ); ?>';
		location['link_url'] = '<?php echo esc_js( $marker->link_url ); ?>';
		markers.push( location );
		<?php
	}
	?>
	var api_key = '<?php echo esc_js( get_option( 'bbvm_tomtom', '' ) ); ?>';
	var args    = {
		id: '<?php echo esc_js( $id ); ?>',
		api_key: api_key,
		center_lat: '<?php echo esc_js( $settings->latitude ); ?>',
		center_long: '<?php echo esc_js( $settings->longitude ); ?>',
		center_zoom: '<?php echo esc_js( $settings->zoom_level ); ?>',
		map_style: '<?php echo $map_json; ?>', <?php // phpcs:ignore ?>
		map_appearance: '<?php echo esc_js( $settings->map_style ); ?>',
		allow_geolocation: '<?php echo esc_js( $settings->geolocation ); ?>',
		allow_fullscreen: '<?php echo esc_js( $settings->fullscreen ); ?>',
		allow_panzoom: '<?php echo esc_js( $settings->pan_zoom ); ?>',
		panzoom_location: '<?php echo esc_js( $settings->pan_zoom_location ); ?>',
		geolocation_location: '<?php echo esc_js( $settings->geolocation_location ); ?>',
		fullscreen_location: '<?php echo esc_js( $settings->fullscreen_location ); ?>',
		markers: markers,
	};
	new bbvmTomTomMap( args );
} )( jQuery );
