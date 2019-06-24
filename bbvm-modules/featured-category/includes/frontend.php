<div class="fl-bbvm-featured-category-for-beaverbuilder">
	<?php
	$selected_tax  = $settings->taxonomy_select;
	$selected_term = 'custom_term_tax_' . $selected_tax;
	if ( isset( $settings->{$selected_term} ) ) {
		$term_id                     = $settings->{$selected_term};
		$featured_category_term      = get_term( absint( $term_id ), $selected_tax, OBJECT );
		$featured_category_term_link = get_term_link( $featured_category_term, $settings->taxonomy_select );
		if ( ! is_wp_error( $featured_category_term_link ) ) {
			?>
			<div class="fl-bbvm-featured-category">
				<?php if ( 'yes' === $settings->link_category ) : ?>
				<a href="<?php echo esc_url( $featured_category_term_link ); ?>" class="fl-bbvm-featured-category-link-wrapper"></a>
				<?php endif; ?>
				<div class="fl-bbvm-featured-category-inner">
					<div class="fl-bbvm-featured-category-category">
						<?php
						if ( ! empty( $settings->category_title ) ) {
							echo esc_html( $settings->category_title );
						} else {
							echo esc_html( $featured_category_term->name );
						}
						?>
					</div>
					<?php
					if ( 'yes' === $settings->show_button ) :
						?>
							<div class="fl-bbvm-featured-category-button">
								<a href="<?php echo esc_url( $featured_category_term_link ); ?>"><?php echo esc_html( $settings->button_text ); ?></a>
							</div>
						<?php
					endif;
					?>
				</div>
			</div>
			<?php
		}
	}
	?>
</div>
