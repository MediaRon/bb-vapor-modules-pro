var mediaron_tax = "<?php echo esc_js( $settings->taxonomy_select ); ?>";
var mediaron_term = "<?php echo esc_js( $settings->terms_select ); ?>";

jQuery( 'body' ).on('change', '.mediaron-post-select, .mediaron-taxonomy-select', function( e ) {
		if( undefined === jQuery( '.mediaron-taxonomy-select :selected' ).val() ) {
			var taxonomy = mediaron_tax;
		} else {
			var taxonomy = jQuery( '.mediaron-taxonomy-select :selected' ).val()
		}
		if( undefined === jQuery( '.mediaron-term-select :selected' ).val() ) {
			var term = mediaron_term;
		} else {
			var term = jQuery( '.mediaron-term-select :selected' ).val()
		}
		jQuery.post( mediarion_beaver_builder_ajax_url, { action: 'mediaron_bb_get_data', post_type: jQuery( '.mediaron-post-select :selected' ).val(), taxonomy: taxonomy, term: term }, function( response ) {
		jQuery( '.mediaron-taxonomy-select' ).html( response.taxonomies );
		jQuery( '.mediaron-taxonomy-select option' ).each( function() {
			if( $(this).val() == response.taxonomy ) {
				$( this ).attr( 'selected', 'selected' );
				return;
			}
		} );
		jQuery.post( mediarion_beaver_builder_ajax_url, { action: 'mediaron_bb_get_terms', post_type: jQuery( '.mediaron-post-select :selected' ).val(), taxonomy: response.taxonomy }, function( response ) {
			jQuery( '.mediaron-term-select' ).html( response );
			jQuery( '.mediaron-term-select option' ).each( function() {
				if( $(this).val() == term ) {
					$( this ).attr( 'selected', 'selected' );
					return;
				}
			} );
		} );
	},'json' );
} );