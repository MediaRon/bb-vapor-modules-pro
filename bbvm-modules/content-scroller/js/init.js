var bbvm_content_scroller_elements = document.getElementsByClassName('bbvm-content-scroller-content');
var bbvm_content_scroller_arrayLength = bbvm_content_scroller_elements.length;
var bbvm_content_scroller_sticky = jQuery('.fl-bbvm-content-scroller-for-beaverbuilder');
if ( bbvm_content_scroller_sticky.length > 0 ) {
	new Waypoint.Sticky({
		element: bbvm_content_scroller_sticky[0],
	});
}

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

		if ( jQuery( element ).hasClass('count-' + jQuery('.fl-bbvm-content-scroller-for-beaverbuilder:first .bbvm-content-scroller-content').length ) ) {
			jQuery('.fl-bbvm-content-scroller-for-beaverbuilder').hide();
			jQuery('.fl-bbvm-content-scroller-responsive-for-beaverbuilder:last').show();
		}

	}
	});

}