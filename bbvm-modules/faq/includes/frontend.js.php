<?php
if( 'yes' !== $settings->expanded ) :
?>
jQuery( document ).ready( function( $ ) {
	$( '.mediaron-faq-item .mediaron-faq-heading' ).toggle( function( e ) {
			e.preventDefault();
			$( this ).find('i').removeClass( 'fa-plus' ).addClass( 'fa-minus' );
			console.log( $( this ).siblings() );
			$( this ).siblings('.mediaron-faq-content').fadeIn('slow');
		},
		function( e ) {
			e.preventDefault();
			$( this ).find('i').removeClass( 'fa-minus' ).addClass( 'fa-plus' );
			$( this ).siblings('.mediaron-faq-content').fadeOut('slow');
		}
	);
} );
<?php
endif;
?>