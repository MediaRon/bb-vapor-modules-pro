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
$map_strip = array( "\r\n", "\n", "\r", '<br/>', '<br>' );
switch ( $map_appearance ) {
	case 'day':
	case 'bw':
	case 'night':
		$file = BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/tomtom/schemes/' . $map_appearance . '.json';
		if ( file_exists( $file ) ) {
			ob_start();
			include $file;
			$map_json = json_decode( ob_get_clean() );
			$map_json = wp_json_encode( $map_json, 0, 100000 );
		}
		break;
	case 'custom':
		$map_json = json_decode( $settings->map_json_raw );
		$map_json = wp_json_encode( $map_json, 0, 2000 );
		break;
}
?>
( function ( $ ) {
	var api_key = '<?php echo esc_js( get_option( 'bbvm_tomtom', '' ) ); ?>';
	var args    = {
		id: '<?php echo esc_js( $id ); ?>',
		api_key: api_key,
		center_lat: '<?php echo esc_js( $settings->latitude ); ?>',
		center_long: '<?php echo esc_js( $settings->longitude ); ?>',
		center_zoom: '<?php echo esc_js( $settings->zoom_level ); ?>',
		map_style: '<?php echo $map_json; ?>',
	};
	new bbvmTomTomMap( args );
} )( jQuery );
