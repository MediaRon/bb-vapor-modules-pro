jQuery( document ).ready( function( $ ) {

		alert('hi');
		$('.nav-tab-wrapper .nav-tab').on('click', function( e ) {
			e.preventDefault();
			$( '.nav-tab-wrapper .nav-tab' ).removeClass( 'nav-tab-active' );
			$(e.currentTarget).addClass('nav-tab-active');
			var url_params = wpAjax.unserialize(e.target.href);
			var url = location.protocol + '//' + location.host + location.pathname;
			url += '?page=' + url_params.page + '&tab=' + url_params.tab;
			if (window.location.href != url) {
				history.pushState('', document.title, url);
			}

			// Show Tab content
			$( '.tab-content' ).addClass( 'hide' );
			$( '#' + url_params.tab ).removeClass( 'hide' ).addClass( 'show' );
		} );

		window.onpopstate = e => {
			__register_advanced_on_pop_state(e);
		};
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
				$first_item.removeClass( 'hide' ).addClass('show').trigger('click');
			}
		}


		$( '.wrap' ).show();

} );