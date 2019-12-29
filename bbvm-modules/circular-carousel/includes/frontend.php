<?php
/**
 * Circular Carousel Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.8
 */

?>
<div class="fl-bbvm-circular-carousel-wrapper">
	<div class="bbvm-circular-carousel">
		<div class="fl-node-circular-carousel-slideshow owl-carousel owl-theme">
		<?php
		$count = 1;
		foreach ( $settings->circles as $key => $circle ) {
			?>
			<div class="bbvm-circular-carousel-slide slide-<?php echo absint( $count ); ?>">
				<div class="flip-card">
					<div class="flip-card-inner">
						<div class="bbvm-circular-carousel-slide-front">
							<?php
							if ( 'yes' === $circle->show_link ) :
								echo BBVapor_Modules_Pro::get_starting_anchor( $circle, 'card_link', 'bbvm-carousel-link' ); // phpcs:ignore
								echo '</a>';
							endif;
							?>
							<div class="bbvm-carousel-content"><?php echo wp_kses_post( $circle->text_content ); ?></div>
						</div>
						<div class="bbvm-circular-carousel-slide-back">
							<?php
							if ( 'yes' === $circle->show_link ) :
								echo BBVapor_Modules_Pro::get_starting_anchor( $circle, 'card_link', 'bbvm-carousel-link' ); // phpcs:ignore
								echo '</a>';
							endif;
							?>
							<div class="bbvm-carousel-content"><?php echo wp_kses_post( $circle->back_text_content ); ?></div>
						</div>
					</div>
				</div>
			</div><!-- .circular-carousel-slide -->
			<?php
			++$count;
		}
		?>
		</div><!-- fl-node-circular-carousel -->
	</div>
</div>
