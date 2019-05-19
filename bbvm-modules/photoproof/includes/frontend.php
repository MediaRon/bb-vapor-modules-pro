<div class="fl-bbvm-photoproof-for-beaverbuilder">
	<?php
	if( 'slider' === $settings->album_type ) {
		?>
		[a13fe-slider id="<?php echo absint( $settings->album ); ?>" autoplay="<?php echo esc_attr( $settings->slider_autoplay ); ?>" texts="<?php echo esc_attr( $settings->slider_texts ); ?>" socials="<?php echo esc_attr( $settings->slider_social ); ?>" ratio="<?php echo esc_attr( $settings->slider_ratio ); ?>" window_high="<?php echo esc_attr( $settings->slider_window_high ); ?>" thumbs="<?php echo esc_attr( $settings->slider_thumbs ); ?>"]
		<?php
	}
	if( 'scroller' === $settings->album_type ) {
		?>
		[a13fe-scroller id="<?php echo absint( $settings->album ); ?>" autoplay="<?php echo esc_attr( $settings->scroller_autoplay ); ?>" texts="<?php echo esc_attr( $settings->scroller_texts ); ?>" socials="<?php echo esc_attr( $settings->scroller_social ); ?>" ratio="<?php echo esc_attr( $settings->scroller_ratio ); ?>" window_high="<?php echo esc_attr( $settings->scroller_window_high ); ?>" effect="<?php echo esc_attr( $settings->scroller_effect ); ?>" parallax="<?php echo esc_attr( $settings->scroller_parallax ); ?>"]
		<?php
	}
	if( 'gallery' === $settings->album_type ) {
		?>
		[a13fe-gallery id="<?php echo absint( $settings->album ); ?>" columns="<?php echo absint( $settings->gallery_columns ); ?>" margin="<?php echo absint( $settings->gallery_margin ); ?>px" ratio="<?php echo esc_attr( $settings->gallery_ratio ); ?>" filter="<?php echo esc_attr( $settings->gallery_filter ); ?>" lightbox="<?php echo esc_attr( $settings->gallery_lightbox ); ?>" hover_effect="<?php echo esc_attr( $settings->gallery_hover_effect ); ?>" cover="<?php echo esc_attr( $settings->gallery_cover ); ?>" cover_hover="<?php echo esc_attr( $settings->gallery_cover_hover ); ?>" cover_color="<?php echo esc_attr( $settings->gallery_cover_color ); ?>" texts="<?php echo esc_attr( $settings->gallery_texts ); ?>" texts_hover="<?php echo esc_attr( $settings->gallery_texts_hover ); ?>" texts_position="<?php echo esc_attr( $settings->gallery_texts_position ); ?>" gradient="<?php echo esc_attr( $settings->gallery_gradient ); ?>" gradient_hover="<?php echo esc_attr( $settings->gallery_gradient_hover ); ?>" socials="<?php echo esc_attr( $settings->gallery_socials ); ?>" ]
		<?php
	}
	?>
</div>