<?php
/**
 * User Profile Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
jQuery(document).ready(function ($) {
	$('.fl-node-<?php echo esc_html( $id ); ?> .mpp-gutenberg-tab').on('click', function (e) {
		$('.mpp-author-tabs li').removeClass('active');
		$(this).addClass('active');
		var $tabs = $('.mpp-tab').removeClass('mpp-tab-active');
		var new_tab = $(this).data('tab');
		$('.' + new_tab).addClass('mpp-tab-active');
	});
});
