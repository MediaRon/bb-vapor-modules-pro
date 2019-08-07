<?php
/**
 * Vapor Module Icons.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.2.6
 */

/**
 * Main plugin class for Adding Icons.
 */
class BBVM_Icons {

	/**
	 * Function that registers Line Icons.
	 *
	 * @since 1.2.6
	 */
	public function register_icons() {

		// Update initially.
		$line_icons = get_option( 'bbvm_enabled_icons', 0 );

		if ( 0 === $line_icons ) {
			$dir = FLBuilderModel::get_cache_dir( 'icons' );
			$src = BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'includes/icons/';
			$dst = $dir['path'];
			$this->recurse_copy( $src, $dst );

			$enabled_icons = FLBuilderModel::get_enabled_icons();

			$folders = glob( BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'includes/icons/*' );
			foreach ( $folders as $folder ) {
				$folder = trailingslashit( $folder );
				$key    = basename( $folder );
				if ( is_array( $enabled_icons ) && ! in_array( $key, $enabled_icons, true ) ) {
					$enabled_icons[] = $key;
				}
			}
			FLBuilderModel::update_admin_settings_option( '_fl_builder_enabled_icons', $enabled_icons, true );

			update_option( 'bbvm_enabled_icons', 1 );
		}
	}

	/**
	 * Function that renders recurse copy for Icons
	 *
	 * @since 1.2.6
	 * @param array $src an array to get the src.
	 * @param array $dst an object to get destination of the file.
	 */
	private function recurse_copy( $src, $dst ) {
		$dir = opendir( $src );

		// Create directory if not exist. Removed @mkdir( $dst );.
		if ( ! is_dir( $dst ) ) {
			mkdir( $dst );
		}

		while ( false !== ( $file = readdir( $dir ) ) ) { // phpcs:ignore
			if ( ( '.' !== $file ) && ( '..' !== $file ) ) {
				if ( is_dir( $src . '/' . $file ) ) {
					$this->recurse_copy( $src . '/' . $file, $dst . '/' . $file );
				} else {
					copy( $src . '/' . $file, $dst . '/' . $file );
				}
			}
		}
		closedir( $dir );
	}
}

$bbvm_icons = new BBVM_Icons();
$bbvm_icons->register_icons();
