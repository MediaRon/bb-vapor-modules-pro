<?php // phpcs:ignore
class BBVapor_Instagram_Module extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		/**
		 * Class constructor.
		 */
		parent::__construct(
			array(
				'name'            => __( 'Instagram', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add an Instagram Feed', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/instagram/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/instagram/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);

		add_action( 'wp_ajax_load_more_instagram', array( $this, 'ajax_load_more_instagram' ) );
		add_action( 'wp_ajax_nopriv_load_more_instagram', array( $this, 'ajax_load_more_instagram' ) );
	}

	/**
	 * Ajax call for loading more photos from Instagram.
	 */
	public function ajax_load_more_instagram() {
		$instagram_api    = esc_url_raw( filter_input( INPUT_POST, 'instagram_api' ) );
		$user_id          = sanitize_text_field( filter_input( INPUT_POST, 'user_id' ) );
		$token            = sanitize_text_field( filter_input( INPUT_POST, 'token' ) );
		$count            = sanitize_text_field( filter_input( INPUT_POST, 'count' ) );
		$lightbox         = sanitize_text_field( filter_input( INPUT_POST, 'lightbox' ) );
		$background_image = sanitize_text_field( filter_input( INPUT_POST, 'background_image' ) );
		$response         = wp_remote_get( esc_url_raw( $instagram_api ) );
		$response_json    = wp_remote_retrieve_body( $response );
		$instagram_json   = json_decode( $response_json );
		ob_start();
		foreach ( $instagram_json->data as $key => $user_data ) {
			?>
			<div class="instagram-card">
				<div class="instagram-image">
				<?php
				if ( 'on' === $background_image ) :
					$instagram_background_image_css = sprintf( 'style="background-image: url(%s); background-size: cover; background-position: center center;"', esc_url( $user_data->images->standard_resolution->url ) );
					if ( 'on' === $lightbox ) :
						?>
						<a class="bbvm-ig-bgimage bbvm-instagram-lightbox" href="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>" <?php echo $instagram_background_image_css; // phpcs:ignore ?>></a>
						<?php
					else :
						?>
						<a class="bbvm-ig-bgimage" href="<?php echo esc_url( $user_data->link ); ?>" <?php echo $instagram_background_image_css; // phpcs:ignore ?>></a>
						<?php
					endif;
					?>
					<?php
					else :
						?>
						<?php
						if ( 'on' === $lightbox ) :
							?>
							<a class="bbvm-instagram-lightbox" href="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>"><img src="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>" /></a>
							<?php
						else :
							?>
							<a href="<?php echo esc_url( $user_data->link ); ?>"><img src="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>" /></a>
							<?php
						endif;
						?>
						<?php
					endif;
					?>
				</div>
				<div class="instagram-meta">
					<span class="instagram-likes"><?php esc_html_e( 'Likes:', 'bb-vapor-modules-pro' ); ?> <?php echo esc_html( $user_data->likes->count ); ?></span><span class="instagram-comments"><?php echo esc_html_e( 'Comments:', 'bb-vapor-modules-pro' ); ?> <?php echo esc_html( $user_data->comments->count ); ?></span>
				</div>
				<p class="instagram-caption"><?php echo esc_html( $user_data->caption->text ); ?></p>
			</div>
			<?php
		}

		$return                   = array();
		$return['html']           = ob_get_clean();
		$return['pagination']     = isset( $instagram_json->pagination->next_max_id ) ? true : false;
		$return['pagination_url'] = '';
		$return['instagram_json'] = $instagram_json;

		// Get pagination information.
		if ( isset( $instagram_json->pagination->next_max_id ) ) {
			$sig_response = wp_remote_get( esc_url_raw( sprintf( 'https://mediaron.com/instagram/getsig.php?user_id=%s&token=%s&max_id=%s&feed_count=%s', $user_id, $token, $instagram_json->pagination->next_max_id, $count ) ) );

			$sig                      = wp_remote_retrieve_body( $sig_response );
			$return['pagination_url'] = esc_url_raw( sprintf( 'https://api.instagram.com/v1/users/%d/media/recent?access_token=%s&sig=%s&count=%d&max_id=%s', $user_id, $token, $sig, $count, $instagram_json->pagination->next_max_id ) );
		}
		die( wp_json_encode( $return ) );
	}

	/**
	 * Enqueue Masonry and Popup scripts.
	 */
	public function enqueue_scripts() {
		if ( $this->settings && 'masonry' === $this->settings->layout ) {
			$this->add_js( 'macy', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/instagram/js/macy.js', array( 'jquery' ), '20190411', true );
			$this->add_js( 'macy-init', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/instagram/js/macy-init.js', array( 'jquery' ), '20190411', true );
		}
		if ( $this->settings && 'yes' === $this->settings->lightbox ) {
			$this->add_css( 'jquery-magnificpopup' );
			$this->add_js( 'bbvm-instagram-lightbox', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/instagram/js/lightbox.js', array( 'jquery', 'jquery-magnificpopup' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Instagram_Module',
	array(
		'general'    => array(
			'title'    => __( 'Instagram', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Instagram Settings', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'items_show'                    => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Instagram Photos to Show', 'bb-vapor-modules-pro' ),
							'default' => '10',
						),
						'layout'                        => array(
							'type'        => 'select',
							'label'       => __( 'Display Options', 'bb-vapor-modules-pro' ),
							'options'     => array(
								'card'    => __( 'Card', 'bb-vapor-modules-pro' ),
								'masonry' => __( 'Masonry', 'bb-vapor-modules-pro' ),
							),
							'default'     => 'card',
							'toggle'      => array(
								'card' => array(
									'fields' => array(
										'card_columns',
									),
								),
							),
							'description' => __( 'You may need to save and refresh to see the new layout.', 'bb-vapor-modules-pro' ),
						),
						'lightbox'                      => array(
							'type'    => 'select',
							'label'   => __( 'Pop Up Images in a Lightbox', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'card_columns'                  => array(
							'type'    => 'select',
							'label'   => __( 'Number of Card Columns', 'bb-vapor-modules-pro' ),
							'options' => array(
								'1' => '1',
								'2' => '2',
								'3' => '3',
								'4' => '4',
							),
							'default' => '3',
						),
						'load_images_background_image'  => array(
							'type'    => 'select',
							'label'   => __( 'Load Images as a Background Image', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
							'help'    => __( 'This option is useful for Grid layouts', 'bb-vapor-modules-pro' ),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'background_min_height',
									),
								),
							),
						),
						'background_min_height_desktop' => array(
							'type'        => 'unit',
							'label'       => __( 'Background Image Minimum Height on Desktop', 'bb-vapor-modules-pro' ),
							'default'     => '350',
							'description' => 'px',
						),
						'background_min_height_tablet'  => array(
							'type'        => 'unit',
							'label'       => __( 'Background Image Minimum Height on Tablet', 'bb-vapor-modules-pro' ),
							'default'     => '300',
							'description' => 'px',
						),
						'background_min_height_mobile'  => array(
							'type'        => 'unit',
							'label'       => __( 'Background Image Minimum Height on Mobile', 'bb-vapor-modules-pro' ),
							'default'     => '300',
							'description' => 'px',
						),
						'show_likes_comments'           => array(
							'type'    => 'select',
							'label'   => __( 'Show Likes and Comments?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'show_caption'                  => array(
							'type'    => 'select',
							'label'   => __( 'Show Caption?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'card_padding'                  => array(
							'type'       => 'dimension',
							'label'      => __( 'Card Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'card_background_color'         => array(
							'type'       => 'color',
							'label'      => __( 'Card Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'card_text_color'               => array(
							'type'       => 'color',
							'label'      => __( 'Card Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'max_image_width'               => array(
							'type'        => 'unit',
							'label'       => __( 'Max Card Width', 'bb-vapor-modules-pro' ),
							'responsive'  => true,
							'default'     => '1000',
							'description' => __( 'Can override your column width settings', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'typography' => array(
			'title'    => __( 'Typography', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'typography' => array(
					'title'  => __( 'Typography Settings', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'likes_comments_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Likes and Comments Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'caption_typography'        => array(
							'type'       => 'typography',
							'label'      => __( 'Caption Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'buttons'    => array(
			'title'    => __( 'Buttons', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'buttons' => array(
					'title'  => __( 'Button Settings', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'show_load_more_button'      => array(
							'type'        => 'select',
							'label'       => __( 'Show Load More Button', 'bb-vapor-modules-pro' ),
							'options'     => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default'     => 'yes',
							'description' => __( 'Showing Load More is not recommended for the Masonry layout', 'bb-vapor-modules-pro' ),
						),
						'show_follow_us_button'      => array(
							'type'    => 'select',
							'label'   => __( 'Show Follow Us Button', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'load_more_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Show More Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'load_more_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Show More Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'load_more_text'             => array(
							'type'    => 'text',
							'label'   => __( 'Load More Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Load More...', 'bb-vapor-modules-pro' ),
						),
						'follow_background_color'    => array(
							'type'       => 'color',
							'label'      => __( 'Follow Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '408bd1',
						),
						'follow_text_color'          => array(
							'type'       => 'color',
							'label'      => __( 'Show More Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'follow_text'                => array(
							'type'    => 'text',
							'label'   => __( 'Follow Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Follow on Instagram', 'bb-vapor-modules-pro' ),
						),
						'follow_icon'                => array(
							'type'        => 'icon',
							'label'       => __( 'Follow Icon', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
					),
				),
			),
		),
	)
);
