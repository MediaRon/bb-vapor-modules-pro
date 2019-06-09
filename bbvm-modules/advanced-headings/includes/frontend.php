<div class="fl-bbvm-advanced-headings-for-beaverbuilder">
	<?php
	echo sprintf( '<%s class="bbvm-advanced-headline">', esc_html( $settings->headline_tag ) );
	if ( 'normal' === $settings->headline_select ) {
		echo sprintf( '<span>%s</span>', esc_html( $settings->headline ) );
	} else {
		$bbvm_count = 0;
		foreach ( $settings->headlines as $headline ) {
			printf( '<span class="bbvm-variable-headline-%d">', absint( $bbvm_count ) );
			echo esc_html( $headline->headline ) . ' ';
			echo '</span>';
			$bbvm_count++;
		}
	}
	echo sprintf( '</%s>', esc_html( $settings->headline_tag ) );
	if ( 'line_icon' === $settings->separator_type || 'line_photo' === $settings->separator_type || 'line_content' === $settings->separator_type ) :
		?>
		<div class="fl-bbvm-advanced-separator-wrapper">
		<?php
		$height          = $settings->line_height;
		$background      = BBVapor_Modules_Pro::get_color( $settings->line_color );
		$icon_background = esc_html( BBVapor_Modules_Pro::get_color( $settings->icon_background_color ) )
		?>
		<div class="fl-bbvm-advanced-separator-line" style="height: <?php echo absint( $height ); ?>px; background: <?php echo esc_html( $background ); ?>;"></div>
		<?php
		$styles = array();
		if ( 'line_icon' === $settings->separator_type ) {
			if ( 'square' === $settings->icon_style ) {
				$styles[] = 'background: ' . $icon_background;
				$styles[] = 'padding: 15px';
			} elseif ( 'circular' === $settings->icon_style ) {
				$styles[] = 'background: ' . $icon_background;
				$styles[] = 'padding: 15px';
				$styles[] = 'border-radius: 50%';
			}
		}
		?>
		<div class="fl-bbvm-advanced-separator-icon" style="<?php echo esc_attr( implode( ';', $styles ) ); ?>">
		<?php
		if ( 'line_icon' === $settings->separator_type ) {
			$icon_color = BBVapor_Modules_Pro::get_color( $settings->icon_color );
			printf( '<i class="%s" style="color: %s; font-size: %spx"></i>', esc_attr( $settings->icon ), esc_html( $icon_color ), absint( $settings->icon_size ) );
		} elseif ( 'line_photo' === $settings->separator_type ) {
			$styles = array();
			if ( 'square' === $settings->photo_style ) {
				$styles[] = 'background: ' . $icon_background;
			} elseif ( 'circular' === $settings->photo_style ) {
				$styles[] = 'background: ' . $icon_background;
				$styles[] = 'border-radius: 100%';
			}
			printf( '<img src="%s" style="%s" />', esc_url( $settings->style_photo_src ), esc_attr( implode( ';', $styles ) ) );
		} elseif ( 'line_content' === $settings->style ) {
			printf( '<div class="line-content">%s</div>', wp_kses_post( $settings->content ) );
		}
		?>
		</div>
		<div class="fl-bbvm-advanced-separator-line" style="height: <?php echo absint( $height ); ?>px; background: <?php echo esc_html( $background ); ?>;"></div>
		</div><!-- .fl-bbvm-advanced-separator-wrapper -->
		<?php
	endif;

	// Description.
	if ( 'yes' === $settings->headline_description ) {
		echo '<div class="description">';
		echo wp_kses_post( $settings->description );
		echo '</div>';
	}
	?>
</div>
