<?php
/**
 * WooCommerce Featured Category.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-woocommerce-featured-category-for-beaverbuilder">
	<?php if ( ! empty( $settings->category ) ) : ?>
		<?php
		$featured_category_term      = get_term( absint( $settings->category ), 'product_cat', OBJECT );
		$featured_category_term_link = get_term_link( $featured_category_term, 'product_cat' );
		if ( ! is_wp_error( $featured_category_term_link ) ) {
			?>
			<div class="fl-bbvm-woocommerce-featured-category">
				<?php if ( 'yes' === $settings->link_category ) : ?>
				<a href="<?php echo esc_url( $featured_category_term_link ); ?>" class="fl-bbvm-woocommerce-featured-category-link-wrapper"></a>
				<?php endif; ?>
				<div class="fl-bbvm-woocommerce-featured-category-inner">
					<div class="fl-bbvm-woocommerce-featured-category-category">
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
							<div class="fl-bbvm-woocommerce-featured-category-button">
								<a href="<?php echo esc_url( $featured_category_term_link ); ?>">View</a>
							</div>
						<?php
					endif;
					?>
				</div>
			</div>
			<?php
		}
	endif;
	?>
</div>
