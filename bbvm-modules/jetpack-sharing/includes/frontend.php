<?php
if ( defined( 'JETPACK__PLUGIN_DIR' ) ) {
	include_once JETPACK__PLUGIN_DIR . '/modules/sharedaddy/sharing-sources.php';
}
?>
<?php if ( function_exists( 'sharing_display' ) ) : ?>
	<?php
	global $mrbb_jetpack_sharing_settings;
	$mrbb_jetpack_sharing_settings = $settings;
	?>
	<?php
	if ( ! function_exists( 'mrbb_jetpack_sharing' ) ) {
		function mrbb_jetpack_sharing( $show, $post ) {
			return true;
		}
	}
	if ( ! function_exists( 'mrbb_jetpack_sharing_headline' ) ) {
		function mrbb_jetpack_sharing_headline( $label, $sharing, $label_escaped ) {
			global $mrbb_jetpack_sharing_settings;
			if ( 'yes' === $mrbb_jetpack_sharing_settings->show_headline ) {
				return sprintf( '<h3 class="sd-title">%s</h3>', esc_html( $mrbb_jetpack_sharing_settings->sharing_headline ) );
			} else {
				return '';
			}
			return '';
		}
	}
	if ( ! function_exists( 'mrbb_jetpack_sharing_button_display' ) ) {
		function mrbb_jetpack_sharing_button_display( $option ) {
			global $mrbb_jetpack_sharing_settings;
			if ( isset( $option['global']['button_style'] ) ) {
				$option['global']['button_style'] = $mrbb_jetpack_sharing_settings->sharing_display;
			}
			return $option;
		}
	}
	if ( ! function_exists( 'mrbb_jetpack_sharing_titles' ) ) {
		function mrbb_jetpack_sharing_titles( $title, $object, $id, $args ) {
			global $mrbb_jetpack_sharing_settings;
			if ( 'icons' === $mrbb_jetpack_sharing_settings->sharing_display || 'official' === $mrbb_jetpack_sharing_settings->sharing_display ) {
				return $title;
			}
			$shortname = $object->shortname;
			switch ( $shortname ) {
				case 'twitter':
					$title = $mrbb_jetpack_sharing_settings->twitter;
					break;
				case 'facebook':
					$title = $mrbb_jetpack_sharing_settings->facebook;
					break;
				case 'pinterest':
					$title = $mrbb_jetpack_sharing_settings->pinterest;
					break;
				case 'email':
					$title = $mrbb_jetpack_sharing_settings->email;
					break;
				case 'jetpack-whatsapp':
					$title = $mrbb_jetpack_sharing_settings->whatsapp;
					break;
				case 'pocket':
					$title = $mrbb_jetpack_sharing_settings->pocket;
					break;
				case 'print':
					$title = $mrbb_jetpack_sharing_settings->print;
					break;
				case 'reddit':
					$title = $mrbb_jetpack_sharing_settings->reddit;
					break;
				case 'linkedin':
					$title = $mrbb_jetpack_sharing_settings->linkedin;
					break;
				case 'telegram':
					$title = $mrbb_jetpack_sharing_settings->telegram;
					break;
				case 'skype':
					$title = $mrbb_jetpack_sharing_settings->skype;
					break;
				case 'tumblr':
					$title = $mrbb_jetpack_sharing_settings->tumblr;
					break;
			}
			return $title;
		}
	}
	if ( ! function_exists( 'mrbb_jetpack_sharing_classes' ) ) {
		function mrbb_jetpack_sharing_classes( $classes, $object, $id, $args ) {
			$no_popups = array( 'print', 'email' );
			if ( in_array( $object->shortname, $no_popups ) ) {
				return $classes;
			}
			$classes[] = 'share-press-this';
			return $classes;
		}
	}
	?>
	<div class="fl-bbvm-jetpack-sharing-for-beaverbuilder">
		<?php
		add_filter( 'jetpack_sharing_headline_html', 'mrbb_jetpack_sharing_headline', 20, 3 );
		add_filter( 'sharing_show', 'mrbb_jetpack_sharing', 20, 2 );
		add_filter( 'option_sharing-options', 'mrbb_jetpack_sharing_button_display', 100 );
		add_filter( 'jetpack_sharing_display_text', 'mrbb_jetpack_sharing_titles', 10, 4 );
		add_filter( 'jetpack_sharing_display_classes', 'mrbb_jetpack_sharing_classes', 10, 4 );
		wp_enqueue_style( 'sharing', WP_SHARING_PLUGIN_URL . 'sharing.css', false, JETPACK__VERSION );
		if ( 'yes' === $settings->load_css ) {
			wp_print_styles( 'sharing' );
		}
		if ( 'yes' === $settings->load_css ) {
			wp_print_styles( 'social-logos' );
		}
		wp_enqueue_script(
			'sharing-js',
			Jetpack::get_file_url_for_environment(
				'_inc/build/sharedaddy/sharing.min.js',
				'_inc/build/sharedaddy/sharing.min.js'
			),
			array( 'jquery' ),
			'4',
			true
		);
		if ( 'official' === $settings->sharing_display ) {
			wp_enqueue_script(
				'sharedaddy',
				Jetpack::get_file_url_for_environment(
					'modules/sharedaddy/sharing.js',
					'modules/sharedaddy/sharing.js'
				),
				array( 'jquery' ),
				'4',
				true
			);
		}
		add_action( 'wp_footer', 'sharing_add_footer' );
		echo sharing_display(); // phpcs:ignore
		remove_filter( 'sharing_show', 'mrbb_jetpack_sharing', 20, 2 );
		remove_filter( 'jetpack_sharing_headline_html', 'mrbb_jetpack_sharing_headline', 20, 3 );
		remove_filter( 'option_sharing-options', 'mrbb_jetpack_sharing_button_display', 100 );
		remove_filter( 'jetpack_sharing_display_text', 'mrbb_jetpack_sharing_titles', 10, 4 );
		remove_filter( 'jetpack_sharing_display_classes', 'mrbb_jetpack_sharing_classes', 10, 4 );
		?>
	</div>
	<?php
endif;
