<?php
if( 'double' == $settings->style || 'photo' == $settings->style || 'line' == $settings->style ):
?>
<hr class="fl-bbvm-advanced-separator" />
<?php
endif;
if( 'line_radius' == $settings->style ):
?>
<div class="fl-bbvm-advanced-separator-radius"></div>
<?php
endif;
if( 'line_icon' == $settings->style || 'line_photo' == $settings->style || 'line_content' == $settings->style ):
?>
<div class="fl-bbvm-advanced-separator-wrapper">
	<?php
	$height = absint( $settings->separator_height );
	$background = (6 == strlen( $settings->color ) ) ? '#' . $settings->color : $settings->color;
	$icon_background = (6 == strlen( $settings->background_color ) ) ? '#' . $settings->background_color : $settings->background_color;
	?>
	<div class="fl-bbvm-advanced-separator-line" style="height: <?php echo $height; ?>px; background: <?php echo $background; ?>;"></div>
	<?php
	$styles = array();
	if( 'line_icon' == $settings->style ) {
		if ( 'square' == $settings->icon_style ) {
			$styles[] = 'background: ' . $icon_background;
			$styles[] = 'padding: 15px';
		} else if( 'circular' == $settings->icon_style ) {
			$styles[] = 'background: ' . $icon_background;
			$styles[] = 'padding: 15px';
			$styles[] = 'border-radius: 50%';
		}
	}
	?>
	<div class="fl-bbvm-advanced-separator-icon" style="<?php echo implode( ';', $styles ); ?>">
	<?php
	if( 'line_icon' == $settings->style ) {
		$icon_color = (6 == strlen( $settings->icon_color ) ) ? '#' . $settings->icon_color : $settings->icon_color;
		printf( '<i class="%s" style="color: %s; font-size: %spx"></i>', $settings->icon, $icon_color, absint( $settings->icon_size ) );
	} else if( 'line_photo' == $settings->style ) {
		$styles = array();
		if ( 'square' == $settings->photo_style ) {
			$styles[] = 'background: ' . $icon_background;
		} else if( 'circular' == $settings->photo_style ) {
			$styles[] = 'background: ' . $icon_background;
			$styles[] = 'border-radius: 100%';
		}
		printf( '<img src="%s" style="%s" />', $settings->style_photo_src, implode( ';', $styles ) );
	} else if( 'line_content' == $settings->style ) {
		printf( '<div class="line-content">%s</div>', $settings->content );
	}
	?>
	</div>
	<div class="fl-bbvm-advanced-separator-line" style="height: <?php echo $height; ?>px; background: <?php echo $background; ?>;"></div>
</div>
<?php
endif;