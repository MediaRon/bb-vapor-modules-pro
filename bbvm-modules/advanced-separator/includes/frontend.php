<?php
/**
 * Advanced Separator module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

if ( 'double' === $settings->style || 'photo' === $settings->style || 'line' === $settings->style || 'line_gradient' === $settings->style ) :
	?>
<hr class="fl-bbvm-advanced-separator" />
	<?php
endif;

if ( 'line_radius' === $settings->style ) :
	?>
<div class="fl-bbvm-advanced-separator-radius"></div>
	<?php
endif;

if ( 'line_icon' === $settings->style || 'line_photo' === $settings->style || 'line_content' === $settings->style ) :
	?>
	<div class="fl-bbvm-advanced-separator-wrapper">
		<?php
		$height          = $settings->separator_height;
		$background      = BBVapor_Modules_Pro::get_color( $settings->color );
		$icon_background = BBVapor_Modules_Pro::get_color( $settings->background_color );
		?>
		<div class="fl-bbvm-advanced-separator-line" style="height: <?php echo absint( $height ); ?>px; background: <?php echo esc_html( $background ); ?>;"></div>
		<?php
		$styles = array();
		if ( 'line_icon' === $settings->style ) {
			if ( 'square' === $settings->icon_style ) {
				$styles[] = 'background: ' . esc_html( $icon_background );
				$styles[] = 'padding: 15px';
			} elseif ( 'circular' === $settings->icon_style ) {
				$styles[] = 'background: ' . esc_html( $icon_background );
				$styles[] = 'padding: 15px';
				$styles[] = 'border-radius: 50%';
			}
		}
		?>
		<div class="fl-bbvm-advanced-separator-icon" style="<?php echo implode( ';', $styles ); ?>"> <?php //phpcs:ignore ?>
		<?php
		if ( 'line_icon' === $settings->style ) {
			$icon_color = BBVapor_Modules_Pro::get_color( $settings->icon_color );
			printf( '<i class="%s" style="color: %s; font-size: %spx"></i>', esc_attr( $settings->icon ), esc_html( $icon_color ), absint( $settings->icon_size ) );
		} elseif ( 'line_photo' === $settings->style ) {
			$styles = array();
			if ( 'square' === $settings->photo_style ) {
				$styles[] = 'background: ' . esc_html( $icon_background );
			} elseif ( 'circular' === $settings->photo_style ) {
				$styles[] = 'background: ' . esc_html( $icon_background );
				$styles[] = 'border-radius: 100%';
			}
			printf( '<img src="%s" style="%s" />', esc_url( $settings->style_photo_src ), implode( ';', $styles ) ); //phpcs:ignore
		} elseif ( 'line_content' === $settings->style ) {
			printf( '<div class="line-content">%s</div>', wp_kses_post( $settings->content ) );
		}
		?>
		</div>
		<div class="fl-bbvm-advanced-separator-line" style="height: <?php echo absint( $height ); ?>px; background: <?php echo esc_html( $background ); ?>;"></div>
	</div>
	<?php
endif;
