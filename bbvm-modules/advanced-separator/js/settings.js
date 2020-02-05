function bbvm_advanced_separator_gradient_changed( args ) {
	var form = jQuery( '.fl-builder-settings:visible' );
	form.find( 'input[name=gradient_color_middle]' ).trigger('bbvmLineGradientUpdate');
	form.find( 'input[name=gradient_color_left]' ).trigger('bbvmLineGradientUpdate');
	form.find( 'input[name=gradient_color_right]' ).trigger('bbvmLineGradientUpdate');
}
function bbvm_advanced_separator_color_helper( color ) {
	if ( '' === color ) {
		return 'inherit';
	}
	if ( 6 === color.length ) {
		return '#' + color;
	} else {
		return color;
	}
	return color;
}
(function($){

	FLBuilder.registerModuleHelper('bbvm-advanced-separator-module', {

		init: function() {
			var form = $( '.fl-builder-settings:visible' ),
				separatorStyle = form.find( 'input[name=style]' ),
				gradientColorMiddle = form.find( 'input[name=gradient_color_middle]' );
				gradientColorMiddle.on( 'bbvmLineGradientUpdate', this._set_gradient_line_background );
				var gradientColorLeft = form.find( 'input[name=gradient_color_left]' );
				gradientColorLeft.on( 'bbvmLineGradientUpdate', this._set_gradient_line_background );
				var gradientColorRight = form.find( 'input[name=gradient_color_right]' );
				gradientColorRight.on( 'bbvmLineGradientUpdate', this._set_gradient_line_background );
		},

		_set_gradient_line_background: function() {
			var node = FLBuilder.preview.elements.node,
				item = node.find( '.fl-bbvm-advanced-separator' ),
				form = $( '.fl-builder-settings:visible' ),
				gradient_style_middle = bbvm_advanced_separator_color_helper( form.find( 'input[name=gradient_color_middle]' ).val() ),
				gradient_style_left = bbvm_advanced_separator_color_helper( form.find( 'input[name=gradient_color_left]' ).val() ),
				gradient_style_right = bbvm_advanced_separator_color_helper( form.find( 'input[name=gradient_color_right]' ).val() );
				node.find('.fl-bbvm-advanced-separator' ).css( 'backgroundImage', 'linear-gradient(90deg, ' + gradient_style_left + ', ' + gradient_style_middle + ' 50%, ' + gradient_style_right );
				
		}
	});

})(jQuery);
