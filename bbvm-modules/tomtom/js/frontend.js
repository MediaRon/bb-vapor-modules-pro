var bbvmTomTomMap;

( function( $ ) {
	bbvmTomTomMap = function( args ) {
		this.api = args.api_key;
		this.nodeClass = '.fl-node-' + args.id;
		this.latitude = args.center_lat;
		this.longitude = args.center_long;
		this.zoom = args.center_zoom;
		this.style = args.map_style;
		this.appearance = args.map_appearance;
		this.geolocation = args.allow_geolocation;
		this.geolocation_location = args.geolocation_location;
		this.fullscreen = args.allow_fullscreen;
		this.fullscreen_location = args.fullscreen_location;
		this.panzoom = args.allow_panzoom;
		this.panzoom_location = args.panzoom_location;
		this.bbvmTomTomMapInit();
	}
	bbvmTomTomMap.prototype = {
		bbvmTomTomMapInit: function() {
			var map = tt.map({
				key: this.api,
				container: jQuery( '' + this.nodeClass + ' .bbvm-tomtom-map .bbvm-map' )[0],
				style: 'custom' === this.appearance ? JSON.parse( this.style ) : this.appearance,
				center: [this.latitude, this.longitude],
				zoom: this.zoom,
				setMyLocationEnabled: true,
			});
			if ( 'yes' === this.fullscreen ) {
				map.addControl(new window.tt.FullscreenControl(), this.fullscreen_location);
			}
			if ( 'yes' === this.panzoom ) {
				map.addControl(new window.tt.NavigationControl(), this.panzoom_location);
			}
			
			if ( 'yes' === this.geolocation ) {
				map.addControl(new window.tt.GeolocateControl({
					positionOptions: {
						enableHighAccuracy: true
					},
					trackUserLocation: true
				 }), this.geolocation_location);
			}
		}
	};
})(jQuery);