<div class="fl-bbvm-beforeafter-for-beaverbuilder">
	<?php
	if ( 'hover' === $settings->style ) {
		?>
		<div class="beforeafter-wrapper">
			<figure>
				<div class="before">
					<img src=<?php echo esc_url( $settings->image_before_src ); ?> />
					<div class="text-before"><?php echo esc_html( $settings->before_text ); ?></div>
				</div>
				<div class="after">
					<img src=<?php echo esc_url( $settings->image_after_src ); ?> />
					<div class="text-after"><?php echo esc_html( $settings->after_text ); ?></div>
				</div>
			</figure>
		</div>
		<?php
	}
	?>
	<?php
	if ( 'fade' === $settings->style ) {
		?>
		<div class="beforeafter-wrapper">
			<?php
			$image  = wp_get_attachment_image_src( $settings->image_before, 'large' );
			$width  = 0;
			$height = 0;
			if ( false !== $image ) {
				$width  = $image[1];
				$height = $image[2];
			}
			?>
			<figure style="width: <?php echo absint( $width ); ?>px; height: <?php echo absint( $height ); ?>px; max-width: 100%;" class="before-and-after">
				<div class="before">
					<img src=<?php echo esc_url( $settings->image_before_src ); ?> />
					<div class="text-before"><?php echo esc_html( $settings->before_text ); ?></div>
				</div>
				<div class="after">
					<img src=<?php echo esc_url( $settings->image_after_src ); ?> />
					<div class="text-after"><?php echo esc_html( $settings->after_text ); ?></div>
				</div>
			</figure>
		</div>
		<?php
	}
	?>
	<?php
	if ( 'side' === $settings->style ) {
		?>
		<div class="beforeafter-wrapper">
			<figure>
				<div class="before">
					<img src=<?php echo esc_url( $settings->image_before_src ); ?> />
					<div class="text-before"><?php echo esc_html( $settings->before_text ); ?></div>
				</div>
				<div class="after">
					<img src=<?php echo esc_url( $settings->image_after_src ); ?> />
					<div class="text-after"><?php echo esc_html( $settings->after_text ); ?></div>
				</div>
			</figure>
		</div>
		<?php
	}
	?>
	<?php
	if ( 'separator_horizontal' === $settings->style ) {
		?>
		<div class="beforeafter-wrapper">
			<?php
			$image  = wp_get_attachment_image_src( $settings->image_before, 'large' );
			$width  = 0;
			$height = 0;
			if ( false !== $image ) {
				$width = $image[1];
				$height = $image[2];
			}
			?>
			<figure style="width: <?php echo absint( $width ); ?>px; height: <?php echo absint( $height ); ?>px; max-width: 100%; max-height: auto;" class="before-and-after">
				<div class="before">
					<div class="text-before"><?php echo esc_html( $settings->before_text ); ?></div>
				</div>
				<div class="after">
					<div class="text-after"><?php echo esc_html( $settings->after_text ); ?></div>
				</div>
				<div class="bbvm-horizontal-handle">
					<span class="circle">
						<span class="left-arrow"><i class="fas fa-arrow-left"></i></span><span class="right-arrow"><i class="fas fa-arrow-right"></i></span>
					</span>
				</div>
			</figure>
		</div>
		<?php
	}
	?>
	<?php
	if ( 'separator_vertical' === $settings->style ) {
		?>
		<div class="beforeafter-wrapper">
			<?php
			$image  = wp_get_attachment_image_src( $settings->image_before, 'large' );
			$width  = 0;
			$height = 0;
			if ( false !== $image ) {
				$width  = $image[1];
				$height = $image[2];
			}
			?>
			<figure style="width: <?php echo absint( $width ); ?>px; height: <?php echo absint( $height ); ?>px;  max-width: 100%; max-height: auto;" class="before-and-after">
				<div class="before">
					<div class="text-before"><?php echo esc_html( $settings->before_text ); ?></div>
				</div>
				<div class="after">
					<div class="text-after"><?php echo esc_html( $settings->after_text ); ?></div>
				</div>
				<div class="bbvm-vertical-handle">
					<span class="circle">
						<span class="left-arrow"><i class="fas fa-arrow-up"></i></span><span class="right-arrow"><i class="fas fa-arrow-down"></i></span>
					</span>
				</div>
			</figure>
		</div>
		<?php
	}
	?>
</div>
