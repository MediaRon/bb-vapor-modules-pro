jQuery( document ).ready( function( $ ) {

		__register_advanced_on_pop_state( {} );

		function __register_advanced_on_pop_state( e ) {
			// Parse URL into an object with query params
			var url = wpAjax.unserialize(window.location.href);

			// If option in query var, click it
			if ('tab' in url) {
				$('*[data-tab-name="' + url.tab + '"]').trigger('click');
			} else {
				// We are on the main tab with no options - click it if not active
				var $first_item = $($('*[data-tab-name]')[0]);
				$first_item.removeClass( 'hide' ).addClass('show');
			}
		}

		$( '.wrap' ).show();

		// Toggle options for main screen
		$( '#toggle-on' ).on( 'click', function( e ) {
			$( '#tab-welcome input[type="checkbox"' ).attr( 'checked', 'checked' );
		} );
		// Toggle options for main screen
		$( '#toggle-off' ).on( 'click', function( e ) {
			$( '#tab-welcome input[type="checkbox"' ).removeAttr( 'checked', 'checked' );
		} );

} );