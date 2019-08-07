<?php
/**
 * FAQ Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

if ( 'yes' !== $settings->expanded ) :
	?>
	jQuery( document ).ready( function( $ ) {
		$( '.bbvm-faq-item .bbvm-faq-heading' ).toggle( function( e ) {
				e.preventDefault();
				$( this ).find('i').removeClass( 'fa-plus' ).addClass( 'fa-minus' );
				console.log( $( this ).siblings() );
				$( this ).siblings('.bbvm-faq-content').fadeIn('slow');
			},
			function( e ) {
				e.preventDefault();
				$( this ).find('i').removeClass( 'fa-minus' ).addClass( 'fa-plus' );
				$( this ).siblings('.bbvm-faq-content').fadeOut('slow');
			}
		);
	} );
	<?php
endif;
