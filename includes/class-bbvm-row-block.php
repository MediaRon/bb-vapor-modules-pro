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

		// Rest API.
		add_action( 'rest_api_init', array( $this, 'register_rest' ) );

	}

	/**
	 * Registers a REST call for the avatar.
	 */
	public function register_rest() {
		register_rest_route(
			'bbvapor/v1',
			'/get_rows/',
			array(
				'methods'  => 'POST',
				'callback' => array( $this, 'get_saved_rows' ),
			)
		);
		register_rest_route(
			'bbvapor/v1',
			'/get_row_content/',
			array(
				'methods'  => 'POST',
				'callback' => array( $this, 'get_row_content' ),
			)
		);
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
				'attributes'      => array(
					'row'   => array(
						'type'    => 'string',
						'default' => '',
					),
					'title' => array(
						'type'    => 'string',
						'default' => '',
					),
				),
				'render_callback' => array( $this, 'frontend' ),
				'editor_script'   => 'bbvapor-row-block',
			)
		);
	}

	/**
	 * Returns a list of saved rows from Beaver Builder.
	 */
	public function get_saved_rows() {
		if ( current_user_can( 'edit_posts' ) ) {
			// Get BB Rows.
			$posts = get_posts(
				array(
					'post_type'      => 'fl-builder-template',
					'post_status'    => 'publish',
					'posts_per_page' => 100,
					'tax_query'      => array( // phpcs:ignore
						array(
							'taxonomy' => 'fl-builder-template-type',
							'field'    => 'slug',
							'terms'    => 'row',
						),
					),
					'orderby'        => 'name',
					'order'          => 'ASC',
				)
			);
			return $posts;
		} else {
			return new \WP_Error( 'vapor_invalid_permissions', __( 'You do not have the correct permissions to edit this post.', 'bb-vapor-modules-pro' ), array( 'status' => 403 ) );
		}
	}

	public function get_row_content( $request ) {
		$row_id = absint( isset( $request['id'] ) ? $request['id'] : 0 );
		$post   = get_post( $row_id );
		return $post->post_title;
	}

	/**
	 * Outputs the block content on the front-end
	 *
	 * @param array $attributes Array of attributes.
	 */
	public function frontend( $attributes ) {
		if ( is_admin() ) {
			return;
		}

		ob_start();
		echo do_shortcode( sprintf( '[fl_builder_insert_layout id="%d"]', $attributes['row'] ) );
		return ob_get_clean();
	}
}
