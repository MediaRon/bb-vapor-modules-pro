<?php
$count = 1;
?>
<div class="fl-bbvm-content-scroller-for-beaverbuilder">
	<div class="fl-bbvm-content-scroller-items">
		<?php
		$form_settings = $settings->scroller_content;
		foreach ( $form_settings as $form_setting ) :
			?>
			<div class="fl-bbvm-content-scroller-item">
				<div class="bbvm-content-scroller-item-wrapper" style="background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $form_setting->background_color_left ) ); ?>; color: <?php echo esc_html( $form_setting->content_color ); ?>">
					<div class="bbvm-content-scroller-item bbvm-content-scroller-bg" style="background: url(<?php echo esc_url( $form_setting->background_photo_left_src ); ?>); background-size: cover"></div>
				</div>
				<div class="bbvm-content-scroller-item fl-bbvm-content-scroller-content-wrapper">
					<?php
					$form_settings_content = $settings->scroller_content;
					foreach ( $form_settings_content as $form_content ) {
						$maybe_video = wp_get_attachment_url( $form_content->video_left );
						?>
						<div class="bbvm-content-scroller-content count-<?php echo absint( $count ); ?>" data-background="<?php echo esc_url( $form_content->background_photo_left_src ); ?>"
						data-video="<?php echo $maybe_video ? esc_url( $maybe_video ) : ''; ?>" data-color="<?php echo esc_attr( BBVapor_Modules_Pro::get_color( $form_content->background_color_left ) ); ?>" style="background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $form_content->background_color_right ) ); ?>; color: <?php echo esc_attr( BBVapor_Modules_Pro::get_color( $form_content->content_color ) ); ?>; font-family: <?php echo esc_html( ( 'Default' === $form_content->typography->font_family ) ? 'inherit' : $form_content->typography->font_family ); ?>; font-size: <?php echo esc_html( ( empty( $form_content->typography->font_size->length ) ) ? '18' : $form_content->typography->font_size->length ); ?>px; line-height: <?php echo esc_html( ( empty( $form_content->typography->line_height->length ) ) ? '1.1' : $form_content->typography->line_height->length ); ?>; text-transform: <?php echo esc_html( ( empty( $form_content->typography->text_transform ) ) ? 'inherit' : $form_content->typography->text_transform ); ?>;">
						<?php
						$content = $form_content->content;
						if ( isset( $form_content->headline ) && is_array( $form_content->headline ) ) {
							ob_start();
							echo '<h2>';
							foreach ( $form_content->headline as $headline ) {
								$variable_headline = json_decode( $headline );
								?>
								<span style="display: inline-block; color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $variable_headline->headline_color ) ); ?>; font-size: <?php echo esc_html( ( empty( $variable_headline->headline_typography->font_size->length ) ) ? '32' : $variable_headline->headline_typography->font_size->length ); ?>px; font-family: <?php echo esc_html( ( 'Default' === $variable_headline->headline_typography->font_family ) ? 'inherit;' : $variable_headline->headline_typography->font_family ); ?>; line-height: <?php echo esc_html( ( empty( $variable_headline->headline_typography->line_height->length ) ) ? '1.1' : $variable_headline->headline_typography->line_height->length ); ?>; text-transform: <?php echo esc_html( ( empty( $variable_headline->headline_typography->text_transform ) ) ? 'inherit' : $variable_headline->headline_typography->text_transform ); ?>;"><?php echo esc_html( $variable_headline->headline ); ?></span>
								<?php
							}
							echo '</h2>';
							$headline_content = ob_get_clean();
							$content          = str_replace( '{headline}', $headline_content, $content );
						}
						echo wp_kses_post( $content );
						echo '</div>';
						$count++;
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
<div class="fl-bbvm-content-scroller-responsive-for-beaverbuilder" style="display: none;">
<?php
$form_settings_content = $settings->scroller_content;

$count = 1;
foreach ( $form_settings_content as $form_content ) {
	?>
	<div class="fl-bbvm-content-scroller-item-responsive count-<?php echo absint( $count ); ?>">
		<div class="bbvm-content-scroller-item-responsive-wrapper" style="background-color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $form_content->background_color_left ) ); ?>;">
			<div class="bbvm-content-scroller-item-responsive bbvm-content-scroller-bg-responsive" style="background: url(<?php echo esc_url( $form_content->background_photo_left_src ); ?>); background-size: cover"></div>
		</div>
		<div class="bbvm-content-scroller-item fl-bbvm-content-scroller-content-responsive-wrapper">
			<?php
			$form_settings_content = $settings->scroller_content;
			?>
			<div class="bbvm-content-scroller-content-responsive" style="background-color: <?php echo esc_attr( BBVapor_Modules_Pro::get_color( $form_content->background_color_right ) ); ?>; color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $form_content->content_color ) ); ?>; font-family: <?php echo esc_html( ( 'Default' === $form_content->typography->font_family ) ? 'inherit' : $form_content->typography->font_family ); ?>; font-size: <?php echo esc_html( ( empty( $form_content->typography->font_size->length ) ) ? '18' : $form_content->typography->font_size->length ); ?>px; line-height: <?php echo esc_html( ( empty( $form_content->typography->line_height->length ) ) ? '1.1' : $form_content->typography->line_height->length ); ?>; text-transform: <?php echo esc_html( ( empty( $form_content->typography->text_transform ) ) ? 'inherit' : $form_content->typography->text_transform ); ?>;">
			<?php
			$content = $form_content->content;
			if ( isset( $form_content->headline ) && is_array( $form_content->headline ) ) {

				ob_start();
				echo '<h2>';
				foreach ( $form_content->headline as $headline ) {
					$variable_headline = json_decode( $headline );
					?>
					<span style="display: inline-block; color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $variable_headline->headline_color ) ); ?>; font-size: <?php echo esc_html( ( empty( $variable_headline->headline_typography->font_size->length ) ) ? '32' : $variable_headline->headline_typography->font_size->length ); ?>px; font-family: <?php echo esc_html( ( 'Default' === $variable_headline->headline_typography->font_family ) ? 'inherit;' : $variable_headline->headline_typography->font_family ); ?>; line-height: <?php echo esc_html( ( empty( $variable_headline->headline_typography->line_height->length ) ) ? '1.1' : $variable_headline->headline_typography->line_height->length ); ?>; text-transform: <?php echo esc_html( ( empty( $variable_headline->headline_typography->text_transform ) ) ? 'inherit' : $variable_headline->headline_typography->text_transform ); ?>;"><?php echo esc_html( $variable_headline->headline ); ?></span>
					<?php
				}
				echo '</h2>';
				$headline_content = ob_get_clean();
				$content          = str_replace( '{headline}', $headline_content, $content );
			}

			echo wp_kses_post( $content );
			echo '</div>';
			?>
			</div>
	</div>
		<?php
		$count++;
}
?>
</div>
