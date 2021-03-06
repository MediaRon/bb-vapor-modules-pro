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
				'permissions_callback' => '__return_true',
			)
		);
		register_rest_route(
			'bbvapor/v1',
			'/get_modules/',
			array(
				'methods'  => 'POST',
				'callback' => array( $this, 'get_saved_modules' ),
				'permissions_callback' => '__return_true',
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
		wp_register_style(
			'bbvapor-editor-script',
			BBVAPOR_PRO_BEAVER_BUILDER_URL . 'dist/blocks.editor.build.css',
			array(),
			BBVAPOR_PRO_BEAVER_BUILDER_VERSION,
			'all'
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
					'html'  => array(
						'type'    => 'string',
						'default' => '',
					),
					'align' => array(
						'type'    => 'string',
						'default' => 'full',
					),
				),
				'render_callback' => array( $this, 'frontend' ),
				'editor_script'   => 'bbvapor-row-block',
				'editor_style'    => 'bbvapor-editor-script',
			)
		);

		register_block_type(
			'bbvapor/module-block',
			array(
				'attributes'      => array(
					'row'   => array(
						'type'    => 'string',
						'default' => '',
					),
					'align' => array(
						'type'    => 'string',
						'default' => 'full',
					),
				),
				'render_callback' => array( $this, 'frontend' ),
				'editor_script'   => 'bbvapor-row-block',
				'editor_style'    => 'bbvapor-editor-script',
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

	/**
	 * Returns a list of saved rows from Beaver Builder.
	 */
	public function get_saved_modules() {
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
							'terms'    => 'module',
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

	/**
	 * Retrieves a post title for displaying.
	 *
	 * @param array $request The request for the REST API.
	 *
	 * @return string The HTML for the row template.
	 */
	public function get_row_content( $request ) {
		$row_id = absint( isset( $request['id'] ) ? $request['id'] : 0 );
		ob_start();
		add_filter( 'fl_builder_render_assets_inline', '__return_true' );
		do_action( 'wp_head' );
		FLBuilder::render_query(
			array(
				'post_type' => 'fl-builder-template',
				'p'         => $row_id,
			)
		);
		do_action( 'wp_footer' );
		return ob_get_clean();
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

		return sprintf( '[fl_builder_insert_layout id="%d"]', $attributes['row'] );
	}
}
