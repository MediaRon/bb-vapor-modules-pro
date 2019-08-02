jQuery( document ).ready( function( $ ) {
	var bbvm_content_scroller_elements = document.getElementsByClassName('bbvm-content-scroller-content');
	var bbvm_content_scroller_arrayLength = bbvm_content_scroller_elements.length;
	var bbvm_content_scroller_sticky = jQuery('.fl-bbvm-content-scroller-for-beaverbuilder');
	var bbvm_content_scroller_waypoint = jQuery( '.fl-bbvm-content-scroller-for-beaverbuilder-waypoint:visible' );
	if ( bbvm_content_scroller_waypoint.length > 0 ) {
		var scroller_waypoint = new Waypoint( {
		element: jQuery( '.fl-bbvm-content-scroller-for-beaverbuilder-waypoint' )[0],
		handler: function( direction ) {
			if ( 'down' === direction ) {
				bbvm_content_scroller_sticky.addClass('stuck');
			} else {
				bbvm_content_scroller_sticky.removeClass('stuck');
			}
		}
	})
	}

	var itemWaypoint = new Array();
	for (var i = 0; i < bbvm_content_scroller_arrayLength; i++) {
		itemWaypoint[i] = new Waypoint({
		element: bbvm_content_scroller_elements[i],
		handler: function(direction) {
			jQuery( '.bbvm-content-scroller-bg video').remove();
			var element = this.element;
			var color = element.getAttribute( 'data-color' );
			var background =  element.getAttribute( 'data-background' );
			var video = jQuery.trim(element.getAttribute('data-video'));
			jQuery( '.bbvm-content-scroller-item-wrapper' ).css( 'backgroundColor', color );
			jQuery( '.bbvm-content-scroller-bg' ).css( 'background-image',"url(" + background + ")" );

			if ( '' !== video ) {
				var video = '<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">';
				video += '<source src="' + element.getAttribute( 'data-video' )+ '" type="video/mp4">';
				video += '</video>';
				jQuery( '.bbvm-content-scroller-bg' ).append( video );
				jQuery( '.bbvm-content-scroller-bg' ).css( 'background-image','none' );
			}

			if ( jQuery(element).is(':last-child') ) {
				if ( 'down' == direction ) {
					jQuery('.fl-bbvm-content-scroller-for-beaverbuilder').hide();
					jQuery('.fl-bbvm-content-scroller-responsive-for-beaverbuilder').show();
				} else {
					jQuery('.fl-bbvm-content-scroller-for-beaverbuilder').show();
					jQuery('.fl-bbvm-content-scroller-responsive-for-beaverbuilder').hide();
				}
			}

		}
		});

	}
} );
