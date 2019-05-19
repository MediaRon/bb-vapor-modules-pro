<?php if ( 'separator_horizontal' === $settings->style ): ?>
	if( typeof move != undefined ) {
		var $horizontalSlider = jQuery('.fl-node-<?php echo $id; ?> .mediaron-horizontal-handle');
		$horizontalSlider.on('move', function( e ) {
			var offsetX = jQuery( '.fl-node-<?php echo $id; ?> .fl-mediaron-beforeafter-for-beaverbuilder figure' ).offset().left;
			var width = jQuery( '.fl-node-<?php echo $id; ?> .fl-mediaron-beforeafter-for-beaverbuilder figure' ).width();
			var offset = ((e.pageX-offsetX)/width) * 100;
			if( offset >= 0 && offset <= 100 ) {
				$horizontalSlider.css( 'left', offset + '%' );
				jQuery('.fl-node-<?php echo $id; ?> .fl-mediaron-beforeafter-for-beaverbuilder .before').css( 'width', offset + '%' );
			}
		});
	}
<?php endif; ?>
<?php if ( 'separator_vertical' === $settings->style ): ?>
	if( typeof move != undefined ) {
		var $verticalSlider = jQuery('.fl-node-<?php echo $id; ?> .mediaron-vertical-handle');
		$verticalSlider.on('move', function( e ) {
			var offsetY = jQuery( '.fl-node-<?php echo $id; ?> .fl-mediaron-beforeafter-for-beaverbuilder figure' ).offset().top;
			var height = jQuery( '.fl-node-<?php echo $id; ?> .fl-mediaron-beforeafter-for-beaverbuilder figure' ).height();
			var offset = ((e.pageY-offsetY)/height) * 100;
			if( offset >= 0 && offset <= 100 ) {
				$verticalSlider.css( 'top', offset + '%' );
				jQuery('.fl-node-<?php echo $id; ?> .fl-mediaron-beforeafter-for-beaverbuilder .before').css( 'height', offset + '%' );
			}
		});
	}
<?php endif; ?>
function mediaron_before_after_resize() {
	var win = jQuery(this);
	var figure = jQuery( '.fl-node-<?php echo $id; ?> .fl-mediaron-beforeafter-for-beaverbuilder figure.before-and-after' );
	var width = figure.css('width').replace('px', '');
	var height = figure.css('height').replace('px', '');
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
	mediaron_before_after_resize();
});
mediaron_before_after_resize();