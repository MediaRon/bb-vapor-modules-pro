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
			<div class="circular-carousel-slide">
				<div class="circular-carousel-content">
					<div class="circular-carousel-content-front">
						Test Content
					</div>
					<div class="circular-carousel-content-back">
						Back Content
					</div>
				</div>
			</div><!-- .circular-carousel-slide -->
			<?php
		}
		?>
		</div><!-- fl-node-circular-carousel -->
	</div>
</div>
