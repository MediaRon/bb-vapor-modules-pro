function mediaron_woocommerce_featured_products_show_details(product_id) {
	if ( jQuery( '.fl-mediaron-woocommerce-featured-products-for-beaverbuilder #mediaron-woocommerce-product-' + product_id + ' .mediaron-woocommerce-show-details-button' ).hasClass('active' ) ) {
		jQuery( '.fl-mediaron-woocommerce-featured-products-for-beaverbuilder #mediaron-woocommerce-product-' + product_id + ' .mediaron-woocommerce-show-details-button' ).removeClass('active');
		jQuery( '.fl-mediaron-woocommerce-featured-products-for-beaverbuilder #mediaron-woocommerce-product-' + product_id + ' .mediaron-woocommerce-show-details-button i' ).removeClass().addClass('fas fa-plus');
		jQuery( '.fl-mediaron-woocommerce-featured-products-for-beaverbuilder #mediaron-woocommerce-product-' + product_id + ' .mediaron-woocommerce-show-details-content' ).slideUp();
	} else {
		jQuery( '.fl-mediaron-woocommerce-featured-products-for-beaverbuilder #mediaron-woocommerce-product-' + product_id + ' .mediaron-woocommerce-show-details-button' ).addClass('active');
		jQuery( '.fl-mediaron-woocommerce-featured-products-for-beaverbuilder #mediaron-woocommerce-product-' + product_id + ' .mediaron-woocommerce-show-details-button i' ).removeClass().addClass('fas fa-minus');
		jQuery( '.fl-mediaron-woocommerce-featured-products-for-beaverbuilder #mediaron-woocommerce-product-' + product_id + ' .mediaron-woocommerce-show-details-content' ).slideDown();
	}
}
function mediaron_woocommerce_featured_products_show_details_lightbox(product_id) {
	if ( typeof Swal != 'undefined' ) {
		var dom_html = jQuery( '.fl-mediaron-woocommerce-featured-products-for-beaverbuilder #mediaron-woocommerce-product-' + product_id + ' .mediaron-woocommerce-show-details-content' ).html();
		Swal.fire({
			html: dom_html,
			showCloseButton: true,
			type: 'info',
			showConfirmButton: false,
			customClass: 'mediaron-bb-woocommerce-featured-product-popup'
		});
	}
}