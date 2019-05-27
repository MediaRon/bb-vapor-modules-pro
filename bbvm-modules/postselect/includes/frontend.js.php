var bbvm_post_tax_<?php echo absint( $id ); ?> = "<?php echo esc_js( $settings->taxonomy_select ); ?>";
var bbvm_post_term_<?php echo absint( $id ); ?> = "<?php echo esc_js( $settings->terms_select ); ?>";

jQuery( 'body' ).unbind( "change" );
jQuery( 'body' ).on('change', '.bbvm-post-select, .bbvm-taxonomy-select', function( e ) {

		if ( jQuery( '.bbvm-post-select :selected' ).val() != '0' ) {
			if( 'undefined' === jQuery( '.bbvm-taxonomy-select :selected' ).val() ) {
				var taxonomy = bbvm_post_tax_<?php echo absint( $id ); ?>;
			} else {
				var taxonomy = jQuery( '.bbvm-taxonomy-select :selected' ).val();
			}
			if( undefined === jQuery( '.bbvm-term-select :selected' ).val() ) {
				var term = bbvm_post_term_<?php echo absint( $id ); ?>;
			} else {
				var term = jQuery( '.bbvm-term-select :selected' ).val();
			}
		} else {
			var taxonomy = 0;
			var term = 0;
		}
		jQuery.post( bbvm_beaver_builder_ajax_url, { action: 'bbvm_bb_get_data', post_type: jQuery( '.bbvm-post-select :selected' ).val(), taxonomy: taxonomy, term: term }, function( response ) {
		jQuery( '.bbvm-taxonomy-select' ).html( response.taxonomies );
		jQuery( '.bbvm-taxonomy-select option' ).each( function() {
			if( $(this).val() == response.taxonomy ) {
				$( this ).attr( 'selected', 'selected' );
				return;
			}
		} );
		jQuery.post( bbvm_beaver_builder_ajax_url, { action: 'bbvm_bb_get_terms', post_type: jQuery( '.bbvm-post-select :selected' ).val(), taxonomy: response.taxonomy }, function( response ) {
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