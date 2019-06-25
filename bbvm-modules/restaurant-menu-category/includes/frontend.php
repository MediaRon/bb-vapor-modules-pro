<div class="bbvm-restaurant-menu-items-wrapper">
	<div class="bbvm-restaurant-heading">
		<h2 class="bbvm-restaurant-menu-items-heading" id="<?php echo esc_attr( sanitize_title( $settings->menu_item_category ) ); ?>">
		<?php echo esc_html( $settings->menu_item_category ); ?>
		</h2>
		<?php
		if ( ! empty( $settings->menu_item_category_description ) ) {
			printf( '<p class="bbvm-restaurant-menu-items-description">%s</p>', esc_html( $settings->menu_item_category_description ) );
		}
		if ( 'line' === $settings->category_separator || 'image' === $settings->category_separator ) {
			?>
			<hr />
			<?php
		}
		?>
	</div>
</div>
