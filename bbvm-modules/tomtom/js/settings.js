(function($){

	FLBuilder.registerModuleHelper('bbvm-tomtom', {
		init: function()
		{
			var form = $('.fl-builder-settings'),
				a = $('.fl-builder-bbvm-tomtom-settings').find('.fl-builder-settings-tabs a');
				a.on('click', this._open_location);
				var sidebarSelected = $('.fl-builder-bbvm-tomtom-settings').find('.fl-active:first');
				if ( sidebarSelected[0].hash === '#fl-builder-settings-tab-sidebar' ) {
					$('.fl-builder-bbvm-tomtom-settings').find("a[href='#fl-builder-settings-tab-sidebar']").trigger( 'click' );
				}
		},
		_open_location: function() {
			var form = $('.fl-builder-settings'),
				id   = form.data('node'),
				anchorHref = $(this).attr('href'),
				node = FLBuilder.preview.elements.node,
				entry = node.find('.bbvm-tomtom-map-sidebar .list-entry');
				
			if( anchorHref == '#fl-builder-settings-tab-sidebar' ){
				jQuery( '.fl-node-' + id + ' .location-wrapper' ).slideDown();
			} else {
				jQuery( '.fl-node-' + id + ' .location-wrapper' ).slideUp();
			}
		},
	});
})(jQuery);