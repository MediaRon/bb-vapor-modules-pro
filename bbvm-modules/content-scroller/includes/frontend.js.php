var bbvm_content_scroller_elements = document.getElementsByClassName('bbvm-content-scroller-content');
var bbvm_content_scroller_arrayLength = bbvm_content_scroller_elements.length;
var bbvm_content_scroller_sticky = new Waypoint.Sticky({
	element: jQuery('#content-scroller')[0],
});

for (var i = 0; i < bbvm_content_scroller_arrayLength; i++) {
	new Waypoint({
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

		if ( jQuery( element ).hasClass('count-<?php echo count( $settings->scroller_content ); ?>') ) {
			jQuery('.fl-bbvm-content-scroller-for-beaverbuilder').hide();
			jQuery('.fl-bbvm-content-scroller-responsive-for-beaverbuilder:last').show();
		}
	}
	});

}
jQuery( '.fl-bbvm-content-scroller-waypoint' ).each( function() {
	new Waypoint({
		element: jQuery( this )[0],
		handler: function(direction) {
			if ( 'down' === direction ) {
				return;
			}
			var element = this.element;
			jQuery('.fl-bbvm-content-scroller-for-beaverbuilder').show();
			jQuery('.fl-bbvm-content-scroller-responsive-for-beaverbuilder').hide();
		}
	});
});
