<?php
/**
 * Instagram Slideshow Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.6.5
 */

?>
<div class="fl-bbvm-circular-carousel-wrapper">
	<div class="bbvm-circular-carousel">
		<div class="fl-node-circular-carousel-slideshow owl-carousel owl-theme">
		<?php
		foreach ( $settings->circles as $key => $circle ) {
			?>
			<div class="bbvm-circular-carousel-slide">
					<div class="bbvm-circular-carousel-slide-front">
						<?php echo wp_kses_post( $circle->text_content ); ?>
					</div>
			</div><!-- .circular-carousel-slide -->
			<?php
		}
		?>
		</div><!-- fl-node-circular-carousel -->
	</div>
</div>
