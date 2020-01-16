(function($){

	FLBuilder.registerModuleHelper('bbvm-social-media-module', {

		init: function() {
			var form = $( '.fl-builder-settings:visible' ),
				orientation = form.find('select[name=orientation]'),
				fill = form.find('select[name=fill]'),
				size = form.find('select[name=icon_size]');
			orientation.on( 'change', this._change_orientation );
			fill.on( 'change', this._change_fill_color );
			size.on( 'change', this._change_icon_size );
		},

		_change_orientation: function() {
			var node = FLBuilder.preview.elements.node,
				wrapper = node.find('.bbvm-module-social-wrapper'),
				social = node.find( '.bbvm-module-social' ),
				form = $( '.fl-builder-settings:visible' ),
				orientation = form.find( 'select[name=orientation] :selected' ).val();

				social.removeClass( 'horizontal' ).removeClass( 'vertical' ).addClass( orientation );
		},
		_change_fill_color: function() {
			var node = FLBuilder.preview.elements.node,
				wrapper = node.find('.bbvm-module-social-wrapper'),
				social = node.find( '.bbvm-module-social' ),
				form = $( '.fl-builder-settings:visible' ),
				fill = form.find( 'select[name=fill] :selected' ).val();
				social.removeClass( 'black none white custom brand' ).addClass( fill );
		},
		_change_icon_size: function() {
			var node = FLBuilder.preview.elements.node,
				wrapper = node.find('.bbvm-module-social-wrapper'),
				social = node.find( '.bbvm-module-social li' ),
				form = $( '.fl-builder-settings:visible' ),
				size = form.find( 'select[name=icon_size] :selected' ).val();
				social.removeClass().addClass( 'bbvm-module-social-icon-' + size );
		}
	});

})(jQuery);
