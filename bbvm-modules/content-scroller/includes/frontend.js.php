var elements = document.getElementsByClassName('bbvm-content-scroller-content');
var arrayLength = elements.length;
var sticky = new Waypoint.Sticky({
  element: jQuery('#content-scroller')[0],
})
for (var i = 0; i < arrayLength; i++) {
    var waypoint = new Waypoint({
	element: elements[i],
	handler: function(direction) {

		var element = this.element;
		var color = element.getAttribute( 'data-color' );
		var background =  element.getAttribute( 'data-background' );
		jQuery( '.bbvm-content-scroller-item-wrapper' ).css( 'backgroundColor', color );
		jQuery( '.bbvm-content-scroller-bg' ).css( 'background-image',"url(" + background + ")" );
		jQuery('#content-scroller').addClass('stuck');
		if(jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height()) {
			jQuery('#content-scroller').removeClass('stuck');
			jQuery('.fl-bbvm-content-scroller-for-beaverbuilder').hide();
		} else {
			jQuery('.fl-bbvm-content-scroller-for-beaverbuilder').show();
		}
	}
	});

}
