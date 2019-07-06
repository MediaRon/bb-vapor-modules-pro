<div class="fl-bbvm-content-scroller-for-beaverbuilder">
	<div class="fl-bbvm-content-scroller-items">
		<?php
		$form_settings = $settings->scroller_content;
		foreach ( $form_settings as $form_setting ) :
			?>
			<div class="fl-bbvm-content-scroller-item">
				<div class="bbvm-content-scroller-item-wrapper" style="background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $form_setting->background_color_left ) ); ?>; padding: 40px;">
					<div class="bbvm-content-scroller-item bbvm-content-scroller-bg" style="background-image: url(<?php echo esc_url( $form_setting->background_photo_left_src ); ?>); background-size: cover"></div>
				</div>
				<div class="bbvm-content-scroller-item fl-bbvm-content-scroller-content-wrapper">
					<?php
					$form_settings_content = $settings->scroller_content;
					foreach ( $form_settings_content as $form_content ) {
						?>
						<div class="bbvm-content-scroller-content" data-background="<?php echo esc_url( $form_content->background_photo_left_src ); ?>" data-color="<?php echo esc_attr( BBVapor_Modules_Pro::get_color( $form_content->background_color_left ) ); ?>" style="color: #000; background-color: <?php echo esc_attr( BBVapor_Modules_Pro::get_color( $form_content->background_color_right ) ); ?>;">
						<?php
						echo wp_kses_post( $form_content->content );
						echo '</div>';
					}
					?>
				</div>
			</div>
			<?php
			break;
		endforeach;
		?>
	</div><!-- .fl-bbvm-content-scroller-items -->
</div><!-- .fl-bbvm-content-scroller-for-beaverbuilder -->
