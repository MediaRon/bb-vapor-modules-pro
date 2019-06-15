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
		echo '<pre>' . print_r( $terms, true ) . '</pre>';
	endif;
	?>
	<?php
	echo '<pre>' . print_r( $settings, true ) . '</pre>';
	?>
</div>
