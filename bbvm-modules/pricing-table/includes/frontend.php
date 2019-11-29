<?php
/**
 * Pricing Table Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.5.0
 */

?>
<div class="fl-bbvm-pricing-table">
	<?php
	if ( 'yes' === $settings->pricing_title_enable ) :
		?>
		<div class="bbvm-pricing-table-title">
			<?php echo esc_html( $settings->pricing_table_title ); ?>
		</div>
		<?php
	endif;
	$count       = 1;
	$total_count = count( $settings->items );
	?>
	<div class="bbvm-pricing-container bbvm-cols-<?php echo absint( $total_count ); ?>">
	<?php
	foreach ( $settings->items as $item ) :
		?>
		<div class="bbvm-pricing-table-column bbvm-col-<?php echo absint( $count ); ?>">
			<div class="bbvm-pricing-table-card">
				<?php
				if ( 'yes' === $item->display_featured ) :
					?>
					<div class="bbvm-pricing-table-featured">
						<?php
						echo wp_kses_post( $item->featured_title );
						?>
					</div>
					<?php
				endif;
				if ( 'yes' === $item->display_title ) :
					?>
					<div class="bbvm-pricing-table-title">
						<?php
						echo wp_kses_post( $item->item_title );
						?>
					</div>
					<?php
				endif;
				if ( 'yes' === $item->display_price ) :
					?>
					<div class="bbvm-pricing-table-price">
						<span class="bbvm-pricing-table-price-amount">
							<?php echo wp_kses_post( $item->item_price ); ?>
						</span>
						<span class="bbvm-pricing-table-price-duration">
							<?php echo wp_kses_post( $item->item_duration ); ?>
						</span>
					</div>
					<?php
				endif;
				if ( count( $item->features > 0 ) ) :
					echo '<ul class="bbvm-pricing-table-features">';
					$feature_count = 1;
					foreach ( $item->features as $feature ) :
						$odd = ( $feature_count % 2 === 0 ) ? false : true; // phpcs:ignore
						printf( '<li class="%s">%s</li>', ( $odd ) ? esc_attr( 'odd' ) : esc_attr( 'even' ), wp_kses_post( $feature ) );
						$feature_count++;
					endforeach;
					echo '</ul>';
				endif;
				?>
			</div><!-- .bbvm-pricing-table-card -->
		</div><!-- .bbvm-pricing-table-column -->
		<?php
		$count++;
		endforeach;
	?>
	</div><!-- .bbvm-pricing-container -->
</div>
