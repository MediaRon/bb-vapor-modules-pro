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
		foreach ( $terms as $bbvm_term ) {
			?>
			<li>
				<?php
				if ( 'yes' === $settings->link_category ) {
					printf( '<a class="link-full" href="%s">', esc_url( get_term_link( $bbvm_term ) ) );
				}
				?>
				<?php echo esc_html( $bbvm_term->name ); ?>
				<?php
				if ( 'yes' === $settings->link_category ) {
					echo '</a>';
				}
				?>
			</li>
			<?php
		}
		echo '</ul>';
	}
	echo '<pre>' . print_r( $terms, true ) . '</pre>';
	?>
	<?php
	echo '<pre>' . print_r( $settings, true ) . '</pre>';
	?>
</div>
