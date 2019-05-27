jQuery( 'body' ).on('change', '.bbvm-post-select:visible, .bbvm-taxonomy-select:visible', { tax: '<?php echo esc_js( isset( $settings->taxonomy_select ) ? $settings->taxonomy_select : 0 ); ?>', term: '<?php echo esc_js( isset( $settings->terms_select ) ? $settings->terms_select : 0 ); ?>'}, function( e ) {
		if ( jQuery( '.fl-lightbox-content .fl-builder-settings' ).data('node') !== '<?php echo $id; ?>' ) {
			return;
		}
		var taxonomy = e.data.tax;
		var term = e.data.term;

		jQuery.post( bbvm_beaver_builder_ajax_url, { action: 'bbvm_featured_bb_get_data', post_type: jQuery( '.bbvm-post-select:visible :selected' ).val(), taxonomy: taxonomy, term: term }, function( response ) {
		jQuery( '.bbvm-taxonomy-select:first' ).html( response.taxonomies );
		jQuery( '.bbvm-taxonomy-select:first option' ).each( function() {
			if( $(this).val() == response.taxonomy ) {
				$( this ).attr( 'selected', 'selected' );
				return;
			}
		} );
		jQuery.post( bbvm_beaver_builder_ajax_url, { action: 'bbvm_featured_bb_get_terms', post_type: jQuery( '.bbvm-post-select:first :selected' ).val(), taxonomy: response.taxonomy }, function( response ) {
			jQuery( '.bbvm-term-select:first' ).html( response );
			jQuery( '.bbvm-term-select:first option' ).each( function() {
				if( $(this).val() == term ) {
					$( this ).attr( 'selected', 'selected' );
					return;
				}
			} );
		} );
	},'json' );
} );