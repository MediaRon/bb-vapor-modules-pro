<?php
/**
 * Before and After Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<?php if ( 'separator_horizontal' === $settings->style ) : ?>
	if( typeof move != undefined ) {
		var $horizontalSlider = jQuery('.fl-node-<?php echo esc_html( $id ); ?> .bbvm-horizontal-handle');
		$horizontalSlider.on('move', function( e ) {
			var offsetX = jQuery( '.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure' ).offset().left;
			var width = jQuery( '.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure' ).width();
			var offset = ((e.pageX-offsetX)/width) * 100;
			if( offset >= 0 && offset <= 100 ) {
				$horizontalSlider.css( 'left', offset + '%' );
				jQuery('.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .before').css( 'width', offset + '%' );
			}
		});
	}
<?php endif; ?>
<?php if ( 'separator_vertical' === $settings->style ) : ?>
	if( typeof move != undefined ) {
		var $verticalSlider = jQuery('.fl-node-<?php echo esc_html( $id ); ?> .bbvm-vertical-handle');
		$verticalSlider.on('move', function( e ) {
			var offsetY = jQuery( '.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure' ).offset().top;
			var height = jQuery( '.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure' ).height();
			var offset = ((e.pageY-offsetY)/height) * 100;
			if( offset >= 0 && offset <= 100 ) {
				$verticalSlider.css( 'top', offset + '%' );
				jQuery('.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder .before').css( 'height', offset + '%' );
			}
		});
	}
<?php endif; ?>
function bbvm_before_after_resize() {
	var win = jQuery(this);
	var figure = jQuery( '.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-beforeafter-for-beaverbuilder figure.before-and-after' );
	var img = figure.find( 'img:first' );
	if ( 0 === img.length ) {
		return;
	}
	var width = img.width();
	var height = img.height();
	var ratio = 0;
	if( height > width ) {
		ratio = height / width;
	} else {
		ratio = width / height;
	}
	var max_height = 0;
	if( ratio > 0 ) {
		max_height = ( jQuery(window).width() / ratio )
	} else {
		max_height = ( jQuery(window).width() * ratio )
	}
	figure.css('max-height', Math.floor( max_height ) + 'px' )
}
jQuery(window).on('resize', function(){
	bbvm_before_after_resize();
});
bbvm_before_after_resize();
