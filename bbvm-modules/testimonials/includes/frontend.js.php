if( typeof jQuery.fn.owlCarousel !== 'undefined' ) {
	jQuery(".fl-node-<?php echo $id; ?> .owl-carousel").owlCarousel( {
	loop:<?php echo 'yes' === $settings->slide_loop ? 'true' : 'false'; ?>,
		margin:10,
	nav:<?php echo 'yes' === $settings->show_nav_buttons ? 'true' : 'false'; ?>,
	dots: <?php echo 'yes' === $settings->show_nav_bullets ? 'true' : 'false'; ?>,
	autoHeight: <?php echo 'yes' === $settings->auto_height ? 'true' : 'false'; ?>,
	items: 1,
	autoplay: <?php echo 'yes' === $settings->auto_play ? 'true' : 'false'; ?>,
	autoplayTimeout: <?php echo absint( $settings->slide_duration ); ?>,
	autoplayHoverPause: <?php echo 'yes' === $settings->pause_hover ? 'true' : 'false'; ?>,
	animateIn: '<?php echo esc_js( $settings->animation ); ?>',
	navText: ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>'],
	} );
}