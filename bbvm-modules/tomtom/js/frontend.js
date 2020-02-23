var bbvmTomTomMap;
var bbvm_tomtom_map;

(function ($) {
	bbvmTomTomMap = function (args) {
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
		this.panzoom_locatsion = args.panzoom_location;
		this.markers = args.markers;
		this.bbvmTomTomMapInit();
	}
	bbvmTomTomMap.prototype = {
		bbvmTomTomMapInit: function () {
		var bbvm_tomtom_map = window.tt.map({
			key: this.api,
			container: jQuery( this.nodeClass + ' .bbvm-tomtom-map')[0],
			style: 'custom' === this.appearance ? JSON.parse(this.style) : this.appearance,
			center: [this.latitude, this.longitude],
			zoom: this.zoom,
		});
			// Add markers.
			if( ( this.markers ).length > 0 ) {
				for( i = 0; i < ( this.markers ).length ; i++ ) {
					console.log( this.markers[i] );
					var longlat = [
						Number(this.markers[i].latitude),
						Number(this.markers[i].longitude),
					];
					var element = document.createElement('div');
					element.id = 'marker';
					var marker = new tt.Marker({element: element}).setLngLat(longlat).setPopup(new tt.Popup({offset: 35}).setHTML('<strong>'+ this.markers[i].name +'</strong><br />' + this.markers[i].location + '<br /><a href="tel:' + this.markers[i].phone + '">' + this.markers[i].phone + '</a><br />' + '<a target="_blank" href="' + this.markers[i].link_url + '">' + this.markers[i].link_text+ '</a>' ) ).addTo(bbvm_tomtom_map);
				}
			}
			if ('yes' === this.fullscreen) {
				bbvm_tomtom_map.addControl(new window.tt.FullscreenControl(), this.fullscreen_location);
			}
			if ('yes' === this.panzoom) {
				bbvm_tomtom_map.addControl(new window.tt.NavigationControl(), this.panzoom_location);
			}

			if ('yes' === this.geolocation) {
				bbvm_tomtom_map.addControl(new window.tt.GeolocateControl({
					positionOptions: {
						enableHighAccuracy: true
					},
					trackUserLocation: true
				}), this.geolocation_location);
			}
		}
	};
})(jQuery);