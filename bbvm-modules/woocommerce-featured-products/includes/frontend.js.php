function bbvm_woocommerce_featured_products_show_details(product_id) {
	if ( jQuery( '.fl-bbvm-woocommerce-featured-products-for-beaverbuilder #bbvm-woocommerce-product-' + product_id + ' .bbvm-woocommerce-show-details-button' ).hasClass('active' ) ) {
		jQuery( '.fl-bbvm-woocommerce-featured-products-for-beaverbuilder #bbvm-woocommerce-product-' + product_id + ' .bbvm-woocommerce-show-details-button' ).removeClass('active');
		jQuery( '.fl-bbvm-woocommerce-featured-products-for-beaverbuilder #bbvm-woocommerce-product-' + product_id + ' .bbvm-woocommerce-show-details-button i' ).removeClass().addClass('fas fa-plus');
		jQuery( '.fl-bbvm-woocommerce-featured-products-for-beaverbuilder #bbvm-woocommerce-product-' + product_id + ' .bbvm-woocommerce-show-details-content' ).slideUp();
	} else {
		jQuery( '.fl-bbvm-woocommerce-featured-products-for-beaverbuilder #bbvm-woocommerce-product-' + product_id + ' .bbvm-woocommerce-show-details-button' ).addClass('active');
		jQuery( '.fl-bbvm-woocommerce-featured-products-for-beaverbuilder #bbvm-woocommerce-product-' + product_id + ' .bbvm-woocommerce-show-details-button i' ).removeClass().addClass('fas fa-minus');
		jQuery( '.fl-bbvm-woocommerce-featured-products-for-beaverbuilder #bbvm-woocommerce-product-' + product_id + ' .bbvm-woocommerce-show-details-content' ).slideDown();
	}
}
function bbvm_woocommerce_featured_products_show_details_lightbox(product_id) {
	if ( typeof Swal != 'undefined' ) {
		var dom_html = jQuery( '.fl-bbvm-woocommerce-featured-products-for-beaverbuilder #bbvm-woocommerce-product-' + product_id + ' .bbvm-woocommerce-show-details-content' ).html();
		Swal.fire({
			html: dom_html,
			showCloseButton: true,
			type: 'info',
			showConfirmButton: false,
			customClass: 'bbvm-bb-woocommerce-featured-product-popup'
		});
	}
}
<?php
