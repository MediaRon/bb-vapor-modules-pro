<?php
/**
 * Instagram Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
if ( typeof jQuery != 'undefined' ) {
	var $load_more = jQuery('.load-more');
	var ajax_url = $load_more.attr('data-ajax-url');
	var instagram_user_id = $load_more.attr('data-user-id');
	var instagram_token = $load_more.attr('data-access-token');
	var instagram_count = $load_more.attr('data-feed-count');
	var instagram_lightbox = $load_more.attr('data-lightbox');
	var instagram_background = $load_more.attr('data-background');

	var grid = false;
	$load_more.click( function(e) {
		e.preventDefault();
		var instagram_api = $load_more.attr('href');
		jQuery.post( ajax_url, {action: 'load_more_instagram', instagram_api: instagram_api, user_id: instagram_user_id, token: instagram_token, count: instagram_count, lightbox: instagram_lightbox, background_image: instagram_background }, function( response ) {
			jQuery('.fl-node-<?php echo esc_html( $id ); ?> .fl-node-instafeed').append(response.html);

			// Init lightbox
			if ( 'on' == instagram_lightbox && typeof jQuery.fn.magnificPopup != 'undefined'  ) {
				jQuery('.bbvm-instagram-lightbox').magnificPopup({
					type: 'image',
					closeOnContentClick: true,
					closeBtnInside: false,
					removalDelay: 300,
					mainClass: 'bbvm-mfp-fade',
					zoom: {
						enabled: false
					}
				});
			}
			if( false == response.pagination ) {
				$load_more.remove();
			} else {
				$load_more.attr('href', response.pagination_url );
			}
			if ( typeof Macy != 'undefined' ) {
				bbvm_instagram_init_macy();
			}
		}, 'json' );
	});
}
