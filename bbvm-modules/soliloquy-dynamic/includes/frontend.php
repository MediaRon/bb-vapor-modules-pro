<div class="fl-bbvm-soliloquy-dynamic-for-beaverbuilder">
	<?php
	if ( 'acf' === $settings->source ) {
		if ( function_exists( 'get_field' ) ) {
			$post_id = absint( $settings->acf_page );
			$images = get_field( $settings->acf_custom_field, $post_id );
			if ( is_array( $images ) ) {
				$image_ids = array();
				foreach( $images as $image ) {
					$image_ids[] = $image['id'];
				}
				$image_string = implode(',', $image_ids );

				$args = array(
					'preloader' => 'true',
					'animate'   => 'false',
					'id'        => 'acf-images',
					'images'    => $image_string,
				);
				if ( 'yes' === $settings->enable_thumbnails ) {
					$args['thumbnails'] = true;
					$args['thumbnails_width']  = $settings->thumb_width;
					$args['thumbnails_height']  = $settings->thumb_height;
					$args['thumbnails_margin'] = $settings->thumb_margin;
					$args['thumbnails_min']    = $settings->thumb_num;
				} else {
					$args['thumbnails'] = false;
				}
				soliloquy_dynamic(
					$args
				);
			} else {
				echo '<p>' . __( 'No images found.', 'bb-vapor-modules-pro' ) . '</p>';
			}
		} else {
			echo '<p>' . __( 'Advanced Custom Fields is not installed.', 'bb-vapor-modules-pro' ) . '</p>';
		}
	} else if ( 'woocommerce' === $settings->source ) {
		if ( class_exists( 'WC_Product' ) ) {
			$product_id = absint( $settings->woocommerce_product );
			$product = wc_get_product( $product_id );
			$attachment_ids = $product->get_gallery_image_ids( $product_id);

			if ( ! empty( $attachment_ids ) ) {
				$image_ids = array();
				foreach( $attachment_ids as $attachment_id ) {
					$image_ids[] = $attachment_id;
				}
				$image_string = implode(',', $image_ids );

				$args = array(
					'preloader' => 'true',
					'animate'   => 'false',
					'id'        => 'woocommerce-images',
					'images'    => $image_string,
				);
				if ( 'yes' === $settings->enable_thumbnails ) {
					$args['thumbnails']        = 'true';
					$args['thumbnails_width']  = $settings->thumb_width;
					$args['thumbnails_height']  = $settings->thumb_height;
					$args['thumbnails_margin'] = $settings->thumb_margin;
					$args['thumbnails_min']    = $settings->thumb_num;
				} else {
					$args['thumbnails'] = false;
				}
				soliloquy_dynamic(
					$args
				);
			} else {
				echo '<p>' . __( 'No images found.', 'bb-vapor-modules-pro' ) . '</p>';
			}
		} else {
			echo '<p>' . __( 'WooCommerce is not installed.', 'bb-vapor-modules-pro' ) . '</p>';
		}
	}
	?>
</div>