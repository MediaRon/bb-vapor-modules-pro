jQuery( document ).ready( function( $ ) {
	var $window = $(window);
	var bbvm_content_scroller_elements = document.getElementsByClassName('bbvm-content-scroller-content');
	var bbvm_content_scroller_arrayLength = bbvm_content_scroller_elements.length;
	var bbvm_content_scroller_sticky = jQuery('.fl-bbvm-content-scroller-for-beaverbuilder');
	var bbvm_content_scroller_elements_responsive = document.getElementsByClassName('bbvm-content-scroller-bg-responsive');
	var bbvm_content_scroller_responsive = jQuery( '.fl-bbvm-content-scroller-responsive-for-beaverbuilder' );
	var bbvm_content_scroller_responsive_arrayLength = bbvm_content_scroller_responsive.find( '.bbvm-content-scroller-bg-responsive' ).length;
	bbvm_content_scroller_sticky.addClass('bbvm-fade-in');
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
		});
	}

	var resposiveWaypoint = new Array();
	for ( var i = 0; i < bbvm_content_scroller_responsive_arrayLength; i++) {
		resposiveWaypoint[i] = new Waypoint({
			element: bbvm_content_scroller_elements_responsive[i],
			handler: function( direction) {
				var element = jQuery( this.element );
				for( var i = 1; i < ( bbvm_content_scroller_responsive_arrayLength + 1); i++ ) {
					if ( element.hasClass( 'count-' + i ) ) {
						var background =  element.data( 'background' );
						element.animate({opacity: 0}, 0).css( 'background-image',"url(" + background + ")" ).animate({opacity: 1}, 1500 );
					}
				}
			}
		})
	}

	$window.scroll(function() {
		if ( $window.scrollTop() == 0 ) {
			var element = jQuery( bbvm_content_scroller_elements[0] );
			var background = element.data('background');
			jQuery( '.bbvm-content-scroller-bg' ).css( 'background-image',"url(" + background + ")" );
		}
	});

	var bbvm_content_scroller_refresh = false;
	var bbvm_content_scroller_bg_refresh = false;
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
			if ( jQuery( '.bbvm-content-scroller-bg').css('background-image' ) !== 'url("' + background + '")' && ! bbvm_content_scroller_bg_refresh ) {
				bbvm_content_scroller_bg_refresh = true;
				jQuery( '.bbvm-content-scroller-bg' ).animate({opacity: 0}, 0).css( 'background-image',"url(" + background + ")" ).animate({opacity: 1}, 500, function() {
					bbvm_content_scroller_bg_refresh = false;
				});

			}

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
					jQuery('.fl-bbvm-content-scroller-for-beaverbuilder').removeClass('bbvm-fade-in' ).show().css( 'opacity', 1 );
					jQuery('.fl-bbvm-content-scroller-responsive-for-beaverbuilder').hide();
				}
				if ( jQuery('.fl-bbvm-content-scroller-responsive-for-beaverbuilder').is(':hidden' ) ) {
					jQuery('.fl-bbvm-content-scroller-for-beaverbuilder').addClass('stuck');
					if ( ! bbvm_content_scroller_refresh ) {
						bbvm_content_scroller_refresh = true;
						setTimeout( function() { Waypoint.refreshAll() }, 500 );
					}
				}



			}
		},
		offset: 0 == i ? -100 : 100,
		});

	}

} );
