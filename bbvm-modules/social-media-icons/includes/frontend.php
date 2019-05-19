<?php
/**
 * Get list of SVG icons available.
 *
 * Get list of SVG icons available.
 *
 * @since 1.0.0
 *
 * Forked from twentyseventeen `twentyseventeen_social_links_icons`
 */
if ( ! function_exists( 'bbvapor_modules_beaver_builder_social_get_icons' ) ):
function bbvapor_modules_beaver_builder_social_get_icons() {
	// Supported social links icons.
	$social_links_icons = array(
		'amazon.com'      => 'amazon',
		'behance.net'     => 'behance',
		'blogger.com'     => 'blogger',
		'codepen.io'      => 'codepen',
		'dribbble.com'    => 'dribble',
		'dropbox.com'     => 'dropbox',
		'eventbrite.com'  => 'eventbrite',
		'facebook.com'    => 'facebook',
		'flickr.com'      => 'flickr',
		'feed'            => 'feed',
		'foursquare.com'  => 'foursquare',
		'ghost.org'       => 'ghost',
		'github.com'      => 'github',
		'github.io'       => 'github',
		'plus.google.com' => 'google-plus',
		'google.com'      => 'google',
		'instagram.com'   => 'instagram',
		'linkedin.com'    => 'linkedin',
		'mailto'          => 'mail',
		'medium.com'      => 'medium',
		'path.com'        => 'path',
		'pinterest.com'   => 'pinterest-alt',
		'getpocket.com'   => 'pocket',
		'polldaddy.com'   => 'polldaddy',
		'reddit.com'      => 'reddit',
		'skype.com'       => 'skype',
		'spotify.com'     => 'spotify',
		'squarespace.com' => 'squarespace',
		'stumbleupon.com' => 'stumbleupon',
		'telegram.org'    => 'telegram',
		'tumblr.com'      => 'tumblr-alt',
		'twitch.tv'       => 'twitch',
		'twitter.com'     => 'twitter-alt',
		'vimeo.com'       => 'vimeo',
		'xanga.com'       => 'xanga',
		'wordpress.org'   => 'wordpress',
		'wordpress.com'   => 'wordpress',
		'youtu.be'        => 'youtube',
		'youtube.com'     => 'youtube'
	);
	/**
	 * Filter Social Icons.
	 *
	 * @since 1.0.0
	 *
	 * @param array $social_links_icons
	 */
	return apply_filters( 'bbvm_beaver_builder_social_icons', $social_links_icons );
}
endif;

/**
 * Return SVG markup.
 *
 * Forked from twentyseventeen `twentyseventeen_get_svg`
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
if ( ! function_exists( 'bbvapor_modules_beaver_builder_social_get_svg' ) ):
function bbvapor_modules_beaver_builder_social_get_svg( $args = array(), $settings ) {

	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'social-menu-icons' );
	}
	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'social-menu-icons' );
	}
	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
		'fallback'    => false,
	);
	// Parse args.
	$args = wp_parse_args( $args, $defaults );
	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';
	// Set ARIA.
	$aria_labelledby = '';
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';
		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	/* Get Fill/Text Color */
	$css = array();
	if ( isset( $settings->fill ) && 'custom' === $settings->fill) {

		if( 6 === strlen( $settings->fill_custom ) ) {
			$fill_color = '#' . $settings->fill_custom;
		} else {
			$fill_color = $settings->fill_custom;
		}
		$css[] = sprintf( 'fill: %s', $fill_color );
	} else {
		if( isset( $settings->fill ) ) {
			if( 'brand' !== $settings->fill && 'custom' !== $settings->fill ) {
				$fill_color = '#' . $settings->fill;
				$css[] = sprintf( 'fill: %s', $fill_color );
			}
		}
	}
	$css = implode( ';', $css );
	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img" style="' . esc_attr( $css ) . '">';
	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';
		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}
	/*
	* Display the icon.
	*
	* The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	*
	* See https://core.trac.wordpress.org/ticket/38387.
	*/
	$svg .= ' <use href="#' . esc_html( $args['icon'] ) . '" xlink:href="#' . esc_html( $args['icon'] ) . '"></use> ';
	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}
	$svg .= '</svg>';
	return $svg;
}
endif;

/**
 * Include SVG file in the footer.
 *
 * Include SVG file in the footer.
 *
 * @since 1.1.0
 *
 * Forked from twentyseventeen `twentyseventeen_include_svg_icons`
 */
add_action( 'wp_footer', 'bbvapor_modules_beaver_builder_social_include_svg', 9999 );
if ( ! function_exists( 'bbvapor_modules_beaver_builder_social_include_svg' ) ):
function bbvapor_modules_beaver_builder_social_include_svg() {
	// Define SVG sprite file.
	$path = BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/social-media-icons/includes/social-logos.svg';

	/**
	 * Filter Social Icons Sprite.
	 *
	 * @since 1.1.0
	 *
	 * @param string Absolute directory path to SVG sprite
	 */
	$svg_icons = apply_filters( 'bbvapor_modules_beaver_builder_social_icons_sprite', $path );

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		echo '<div style="position: absolute; height: 0; width: 0; overflow: hidden;">';
		require_once( $svg_icons );
		echo '</div>';
	}
}
endif;

// Output Icons
$maybe_icons = bbvapor_modules_beaver_builder_social_get_icons();
if ( isset( $settings->social_form ) ) {
	$fill = '';
	if( isset( $settings->fill ) ) {
		if( 'custom' == $settings->fill || 'brand' == $settings->fill ) {
			$fill = $settings->fill;
		}
	}
	$icon_size = '24';
	if( isset( $settings->icon_size ) ) {
		$icon_size = $settings->icon_size;
	}
	$orientation = 'horizontal';
	if( isset( $settings->orientation ) ) {
		$orientation = $settings->orientation;
	}

	$background_styles = [];
	$background_color = 'FFFFFF';
	if( 'color' === $settings->background_select ) {
		$background_color = $settings->background_color;
		if( 6 === strlen( $background_color ) ) {
			$background_color = '#' . $background_color;
		}
		$background_styles[] = 'background-color: ' . $background_color . ';';
	} else if( 'gradient' === $settings->background_select ) {
		$background_styles[] = 'background-image: ' . FLBuilderColor::gradient( $settings->background_gradient) . ';';

	}

	$background_gradient = '';
	echo '<div class="bbvm-module-social-wrapper" style="' . implode( ' ', $background_styles ) . '">';
	echo '<ul class="bbvm-module-social ' . esc_attr( $fill ) . ' ' . esc_attr( $orientation ) . '">';

	foreach( $settings->social_form as $index => $params ) {
		$url = $params->social_share_type;
		$alt = $params->social_share_text;
		foreach( $maybe_icons as $attr => $value ) {
			if ( false !== strpos( $url, $attr ) ) {
				printf( '<li class="bbvm-module-social-icon-%s"><a href="%s" target="_blank" rel="noopener">%s</a></li>', esc_attr( $icon_size ), esc_url( $url ),bbvapor_modules_beaver_builder_social_get_svg( array( 'icon' => $value ), $settings ) );
			}
		}
	}
	echo '</ul>';
	echo '</div>';
}