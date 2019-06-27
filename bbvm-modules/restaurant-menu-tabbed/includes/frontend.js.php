<?php
// phpcs:ignorefile
?>
jQuery( '.bbvm-restaurant-menu-tabs ul li a' ).each( function() {
	if ( jQuery( this ).data('default') == 'yes' ) {
		var item = jQuery( this ).data('item');
		jQuery( '#' + item ).css( 'display', 'block' );
	}
	return;
} );
jQuery( '.bbvm-restaurant-menu-tabs ul li a' ).on( 'click', function(e ) {
	e.preventDefault();
	jQuery( '.bbvm-restaurant-menu-items-wrapper' ).css( 'display', 'none' );
	var item = jQuery( this ).data('item');
	jQuery( '.bbvm-restaurant-menu-tabs ul li' ).removeClass('active');
	jQuery( this ).parent().addClass('active');
	jQuery( '#' + item ).css( 'display', 'block' );
} );