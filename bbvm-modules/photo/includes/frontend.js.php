<?php
/**
 * Photo Module
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.7.0
 */

?>
if ( typeof jQuery != 'undefined' ) {
	<?php if ( 'lightbox' === $settings->photo_link_select ) : ?>
		jQuery('.fl-node-<?php echo esc_html( $id ); ?> .bbvm-photo-link-lightbox').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			closeBtnInside: false,
			removalDelay: 300,
			mainClass: 'bbvm-mfp-fade',
			zoom: {
				enabled: false
			},
			titleSrc: 'title'
		});
	<?php endif; ?>
}
function bbvm_photo_module_image_crop( args ) {
	var node = args.nodeID;
	var ratio = args.getValue();
	console.log( ratio );
	console.log( node );
}
