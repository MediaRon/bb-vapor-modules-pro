<?php
/**
 * Block settings for inserting saved rows.
 *
 * Block settings for inserting saved rows.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules Pro
 * @since 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access.' );
}
/**
 * Initialize REST API, scripts, and block for saved rows.
 *
 * @package BB Vapor Modules
 */
class BBVM_Row_Block {

	/**
	 * Class constructor
	 */
	public function __construct() {
		$this->register_block();
	}

	/**
	 * Register the block for rows.
	 */
	public function register_block() {
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}
		wp_register_script(
			'bbvapor-row-block',
			BBVAPOR_PRO_BEAVER_BUILDER_URL . 'dist/blocks.build.js',
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
			BBVAPOR_PRO_BEAVER_BUILDER_VERSION,
			true
		);
		wp_localize_script(
			'bbvapor-row-block',
			'bb_vapor',
			array(
				'rest_url'   => get_rest_url(),
				'rest_nonce' => wp_create_nonce( 'wp_rest' ),
			)
		);
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'bbvapor-row-block', 'bb-vapor-modules-pro' );
		}
		register_block_type(
			'bbvapor/row-block',
			array(
				'attributes'      => array(),
				'render_callback' => array( $this, 'frontend' ),
				'editor_script'   => 'bbvapor-row-block',
			)
		);
	}
}
