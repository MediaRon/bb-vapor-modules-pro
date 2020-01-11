(function($){

	FLBuilder.registerModuleHelper('bbvm-button', {

		init: function() {
			var form = $( '.fl-builder-settings:visible' ),
				text = form.find( 'input[name=button_text]' ),
				icon = form.find( 'input[name=button_icon]' ),
				link = form.find( 'input[name=button_link]' );
			link.on( 'keyup', this._previewIcon );
			text.on( 'keyup', this._previewIcon );
			icon.on( 'change', this._previewIcon );
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
