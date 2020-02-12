var bbvmTomTomMap;

( function( $ ) {
	bbvmTomTomMap = function( args ) {
		this.api = args.api_key;
		this.nodeClass = '.fl-node-' + args.id;
		this.latitude = args.center_lat;
		this.longitude = args.center_long;
		this.zoom = args.center_zoom;
		this.style = args.map_style;
		this.bbvmTomTomMapInit();
	}
	bbvmTomTomMap.prototype = {
		bbvmTomTomMapInit: function() {
			var map = tt.map({
				key: this.api,
				container: jQuery( '' + this.nodeClass + ' .bbvm-tomtom-map .bbvm-map' )[0],
				style: JSON.parse( this.style ),
				center: [this.latitude, this.longitude],
				zoom: this.zoom,
				setMyLocationEnabled: true,
			});
			map.addControl(new window.tt.FullscreenControl());
			map.addControl(new window.tt.NavigationControl());
			map.addControl(new window.tt.GeolocateControl({
				positionOptions: {
					enableHighAccuracy: true
				},
				trackUserLocation: true
			 }));
		}
	};
})(jQuery);