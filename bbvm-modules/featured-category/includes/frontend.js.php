jQuery( 'body' ).on('change', '.bbvm-post-select:visible, .bbvm-taxonomy-select:visible', { tax: '<?php echo esc_js( $settings->taxonomy_select ); ?>', term: <?php echo esc_js( $settings->terms_select ); ?>}, function( e ) {
		if ( jQuery( '.fl-lightbox-content .fl-builder-settings' ).data('node') !== '<?php echo $id; ?>' ) {
			return;
		}
		var bbvm_tax = e.data.tax;
		var bbvm_term = e.data.term;
		if ( jQuery( '.bbvm-post-select' ).val() != '0' ) {
			if( undefined == jQuery( '.bbvm-taxonomy-select:visible :selected' ).val() ) {
				var taxonomy = bbvm_tax;
			} else {
				if ( bbvm_tax == 0 ) {
					var taxonomy = jQuery( '.bbvm-taxonomy-select:visible :selected' ).val();
				} else {
					var taxonomy = bbvm_tax;
				}

			}
			if( undefined == jQuery( '.bbvm-term-select:visible :selected' ).val() ) {
				var term = bbvm_term;
			} else {
				if ( bbvm_term == 0 ) {
					var term = jQuery( '.bbvm-term-select:visible :selected' ).val();
				} else {
					var term = bbvm_term;
				}
			}
		} else {
			var taxonomy = 0;
			var term = 0;
		}

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