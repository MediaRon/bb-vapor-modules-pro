var $load_more = jQuery('.load-more');
var ajax_url = $load_more.attr('data-ajax-url');
var instagram_user_id = $load_more.attr('data-user-id');
var instagram_token = $load_more.attr('data-access-token');
var instagram_count = $load_more.attr('data-feed-count');
var grid = false;
$load_more.click( function(e) {
	e.preventDefault();
	var instagram_api = $load_more.attr('href');
	jQuery.post( ajax_url, {action: 'load_more_instagram', instagram_api: instagram_api, user_id: instagram_user_id, token: instagram_token, count: instagram_count }, function( response ) {
		jQuery('.fl-node-<?php echo $id; ?> .fl-node-instafeed').append(response.html);
		if( false == response.pagination ) {
			$load_more.remove();
		} else {
			$load_more.attr('href', response.pagination_url );
		}
	}, 'json' );
});