( function( $ ) {
	var api_key = '<?php echo esc_js( get_option( 'bbvm_tomtom', '' ) ); ?>';
	var args = {
		id: '<?php echo esc_js( $id ); ?>',
		api_key: api_key,
		center_lat: '<?php echo esc_js( $settings->latitude ); ?>',
		center_long: '<?php echo esc_js( $settings->longitude ); ?>',
		center_zoom: '<?php echo esc_js( $settings->zoom_level ); ?>',
	};
	new bbvmTomTomMap( args );
} )(jQuery);
