<div class="fl-bbvm-category-grid-for-beaverbuilder">
	<?php
	if ( 'taxonomy' === $settings->category_options ) :
		$terms = get_terms(
			array(
				'taxonomy' => $settings->taxonomy_select,
				'orderby'  => $settings->term_orderby,
				'order'    => $settings->term_order,
				'number'   => $settings->term_number,
			)
		);
	else :
		$terms = array();
		foreach ( $settings as $key => $setting ) {
			if ( 'custom' === substr( $key, 0, 6 ) ) {
				preg_match( '/_tax_([-_A-Za-z]+)$/', $key, $bbvm_matches );
				if ( isset( $bbvm_matches[1] ) ) {
					$bbvm_taxonomy = $bbvm_matches[1];
					$terms_array   = explode( ',', $setting );
					if ( ! empty( $terms_array ) ) {
						foreach ( $terms_array as $bbvm_term ) {
							$bbvm_term_result = get_term_by( 'id', $bbvm_term, $bbvm_taxonomy );
							if ( false === $bbvm_term_result ) {
								continue;
							}
							if ( ! is_wp_error( $bbvm_term_result ) || ! empty( $bbvm_term_result ) ) {
								$terms[] = $bbvm_term_result;
							}
						}
					}
				}
			}
		}
	endif;
	if ( ! empty( $terms ) ) {
		echo '<ul>';
		$bg_count = 0;
		$settings->category_gallery = array_values( is_array( $settings->category_gallery ) ? $settings->category_gallery : array() );
		foreach ( $terms as $bbvm_term ) {
			?>
			<li
				<?php

				if ( 'gallery' === $settings->image_type ) {
					if ( ! empty( $settings->category_gallery ) ) {
						$gallery_items = $settings->category_gallery;
						if ( ! isset( $gallery_items[ $bg_count ] ) ) {
							$bg_count = 0;
						}
						if ( isset( $gallery_items[ $bg_count ] ) ) {
							$attachment_info = $gallery_items[ $bg_count ];
							$bg_count++;
							$image     = wp_get_attachment_image_src( $attachment_info, 'large', false );
							$image_url = $image[0];
							echo sprintf( ' style="background-image: url(%s);"', esc_url( $image_url ) );
						}
					} else {
						echo sprintf( ' style="background-image: url(%s);"', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/category-grid/includes/default-alex-knight-1438228-unsplash.jpg' ) );
					}
				} elseif ( 'acf' === $settings->image_type ) {
					$acf_field        = $settings->acf_field;
					$background_array = get_field(
						$acf_field,
						$bbvm_term
					);
					if ( is_array( $background_array ) && ! empty( $background_array ) ) {
						$image     = wp_get_attachment_image_src( $background_array['id'], 'large', false );
						$image_url = $image[0];
						echo sprintf( ' style="background-image: url(%s);"', esc_url( $image_url ) );
					} else {
						echo sprintf( ' style="background-image: url(%s);"', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/category-grid/includes/default-alex-knight-1438228-unsplash.jpg' ) );
					}
				} elseif ( 'custom' === $settings->image_type ) {
					$custom        = $settings->meta_key;
					$category_meta = get_term_meta( $bbvm_term->term_id, $custom, true );
					if ( empty( $category_meta ) ) {
						echo sprintf( ' style="background-image: url(%s);"', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/category-grid/includes/default-alex-knight-1438228-unsplash.jpg' ) );
					} else {
						if ( filter_var( $category_meta, FILTER_VALIDATE_INT ) ) {
							$image     = wp_get_attachment_image_src( $category_meta, 'large', false );
							$image_url = $image[0];
						} else {
							$image_url = $category_meta;
						}
						echo sprintf( ' style="background-image: url(%s);"', esc_url( $image_url ) );
					}
				} else {
					echo sprintf( ' style="background-image: url(%s);"', esc_url( BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/category-grid/includes/default-alex-knight-1438228-unsplash.jpg' ) );
				}
				?>
			>
				<?php
				if ( 'yes' === $settings->link_category ) {
					printf( '<a class="link-full" href="%s"></a>', esc_url( get_term_link( $bbvm_term ) ) );
				}
				?>
				<?php
				printf( '<div class="bbvm-category">%s</div>', esc_html( $bbvm_term->name ) );
				?>
				<?php
				if ( 'yes' === $settings->show_button ) {
					?>
					<div class="grid-category-button">
						<a href="<?php echo esc_url( get_term_link( $bbvm_term ) ); ?>"><?php echo esc_html( $settings->button_text ); ?></a>
					</div>
					<?php
				}
				?>
			</li>
			<?php
		}
		echo '</ul>';
	}
	?>
</div>
