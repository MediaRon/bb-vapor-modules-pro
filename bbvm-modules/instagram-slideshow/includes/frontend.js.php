<?php
/**
 * Instagram Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.6.5
 */

?>
if ( typeof jQuery != 'undefined' ) {

	jQuery( '.fl-node-<?php echo esc_html( $id ); ?> .owl-carousel' ).owlCarousel(
		{
			margin: 10,
			loop: <?php echo 'yes' === $settings->slide_loop ? 'true' : 'false'; ?>,
			autoWidth: false,
			items: <?php echo absint( $settings->items ); ?>,
			center: false,
			dots: <?php echo 'yes' === $settings->show_nav_bullets ? 'true' : 'false'; ?>,
			nav: <?php echo 'yes' === $settings->show_nav_buttons ? 'true' : 'false'; ?>,
			autoHeight: <?php echo 'yes' === $settings->auto_height ? 'true' : 'false'; ?>,
			autoplay: <?php echo 'yes' === $settings->auto_play ? 'true' : 'false'; ?>,
			autoplayHoverPause: true,
			autoplayTimeout: <?php echo absint( $settings->slide_duration ); ?>,
			autoplayHoverPause: <?php echo 'yes' === $settings->pause_hover ? 'true' : 'false'; ?>,
			animateIn: '<?php echo esc_js( $settings->animation ); ?>',
			navText: ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>'],
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav: <?php echo 'yes' === $settings->show_nav_buttons ? 'true' : 'false'; ?>
				},
				600:{
					items: <?php echo $settings->items > 1 ? absint( $settings->items -1 ) : absint( $settings->items ); ?>,
					nav: <?php echo 'yes' === $settings->show_nav_buttons ? 'true' : 'false'; ?>
				},
				1000:{
					items: <?php echo absint( $settings->items ); ?>,
					nav: <?php echo 'yes' === $settings->show_nav_buttons ? 'true' : 'false'; ?>,
					loop:<?php echo 'yes' === $settings->slide_loop ? 'true' : 'false'; ?>
				}
			}
		}
	);
	<?php if ( 'yes' === $settings->lightbox ) : ?>
		jQuery('.fl-node-<?php echo esc_html( $id ); ?> .bbvm-instagram-lightbox').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			closeBtnInside: false,
			removalDelay: 300,
			mainClass: 'bbvm-mfp-fade',
			zoom: {
				enabled: false
			}
		});
	<?php endif; ?>
}
