(function($){

	FLBuilder.registerModuleHelper('bbvm-button', {

		init: function() {
			var form = $( '.fl-builder-settings:visible' ),
				text = form.find( 'input[name=button_text]' ),
				icon = form.find( 'input[name=button_icon]' ),
				transparent = form.find('select[name=button_style]'),
				transparent_hover = form.find('select[name=button_style_hover]'),
				background_options = form.find('select[name=button_background_type]'),
				bgColor = form.find( 'input[name=button_background_color]' ),
				link = form.find( 'input[name=button_link]' );
			link.on( 'keyup', this._previewIcon );
			text.on( 'keyup', this._previewIcon );
			icon.on( 'change', this._previewIcon );
			transparent.on( 'change', this._preview_border );
			transparent_hover.on( 'change', this._preview_border );
			background_options.on( 'change', this._preview_border );
			bgColor.on( 'change', this._preview_border );
		},

		_preview_border: function() {
			var node = FLBuilder.preview.elements.node,
				wrap = node.find( '.fl-bbvm-button-for-beaverbuilder-wrapper' ),
				link = node.find( '.fl-bbvm-button-for-beaverbuilder-wrapper a' ),
				item = node.find( '.fl-bbvm-button-for-beaverbuilder' ),
				form = $( '.fl-builder-settings:visible' ),
				button_style = form.find( 'select[name=button_style] :selected' ).val(),
				background_type = form.find( 'select[name=button_background_type] :selected' ).val();
				if ( 'transparent' === background_type ) {
					link.removeClass();
					link.removeAttr( 'style' );
					link.addClass( button_style + ' transparent fl-bbvm-button-for-beaverbuilder bbvm-button');
					link.css( 'background-color', 'transparent' );
					link.css( 'background-image', 'none' );
					link.css( 'border', 'none' );
				} else if ('color' === background_type ) {
					link.removeClass();
					link.removeAttr( 'style' );
					var bgColor = form.find('input[name=button_background_color]').val();
					if ( '' !== bgColor && bgColor.indexOf( 'rgb' ) < 0 ) {
						bgColor = '#' + bgColor;
					}
					link.css( 'background-image', 'none' );
					link.addClass( 'fl-bbvm-button-for-beaverbuilder bbvm-button');
					item.css( 'background-color', bgColor );
				} else {
					link.removeAttr( 'style' );
					link.css( 'background-color', 'transparent' );
					link.removeClass();
					link.addClass( 'fl-bbvm-button-for-beaverbuilder bbvm-button');
				}
				
		},
		_previewIcon: function() {
			var node = FLBuilder.preview.elements.node,
				wrap = node.find( '.fl-bbvm-button-for-beaverbuilder-wrapper' ),
				link = node.find( '.fl-bbvm-button-for-beaverbuilder-wrapper a' ),
				form = $( '.fl-builder-settings:visible' ),
				text = form.find( 'input[name=button_text]' ).val(),
				icon = form.find( 'input[name=button_icon]' ).val();

			node.find( '.fl-bbvm-button-for-beaverbuilder-wrapper i' ).remove();
			wrap.removeClass( 'bbvm-button-has-icon' );

			if ( '' !== icon ) {
				wrap.addClass( 'bbvm-button-has-icon' );

				link.prepend( '<i class="bbvm-button-icon bbvm-button-icon-before ' + icon + '"></i>' );

				if ( '' === text ) {
					link.find( '.bbvm-button-icon' ).css( 'margin', '0' );
				}
			}
		},
	});

})(jQuery);
