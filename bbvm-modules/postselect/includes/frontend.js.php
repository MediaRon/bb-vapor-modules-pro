var bbvm_tax = "<?php echo esc_js( $settings->taxonomy_select ); ?>";
var bbvm_term = "<?php echo esc_js( $settings->terms_select ); ?>";

jQuery( 'body' ).on('change', '.bbvm-post-select, .bbvm-taxonomy-select', function( e ) {
		if( undefined === jQuery( '.bbvm-taxonomy-select :selected' ).val() ) {
			var taxonomy = bbvm_tax;
		} else {
			var taxonomy = jQuery( '.bbvm-taxonomy-select :selected' ).val()
		}
		if( undefined === jQuery( '.bbvm-term-select :selected' ).val() ) {
			var term = bbvm_term;
		} else {
			var term = jQuery( '.bbvm-term-select :selected' ).val()
		}
		jQuery.post( mediarion_beaver_builder_ajax_url, { action: 'bbvm_bb_get_data', post_type: jQuery( '.bbvm-post-select :selected' ).val(), taxonomy: taxonomy, term: term }, function( response ) {
		jQuery( '.bbvm-taxonomy-select' ).html( response.taxonomies );
		jQuery( '.bbvm-taxonomy-select option' ).each( function() {
			if( $(this).val() == response.taxonomy ) {
				$( this ).attr( 'selected', 'selected' );
				return;
			}
		} );
		jQuery.post( mediarion_beaver_builder_ajax_url, { action: 'bbvm_bb_get_terms', post_type: jQuery( '.bbvm-post-select :selected' ).val(), taxonomy: response.taxonomy }, function( response ) {
			jQuery( '.bbvm-term-select' ).html( response );
			jQuery( '.bbvm-term-select option' ).each( function() {
				if( $(this).val() == term ) {
					$( this ).attr( 'selected', 'selected' );
					return;
				}
			} );
		} );
	},'json' );
} );