<?php
class BBVapor_Instagram_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Instagram', 'bb-vapor-modules' ),
			'description'     => __( 'Add an Instagram Feed', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
			'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/instagram/',
			'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/instagram/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));

		add_action( 'wp_ajax_load_more_instagram', array( $this, 'ajax_load_more_instagram' ) );
		add_action( 'wp_ajax_nopriv_load_more_instagram', array( $this, 'ajax_load_more_instagram' ) );
	}
	public function ajax_load_more_instagram() {
		$instagram_api = esc_url_raw( $_POST['instagram_api'] );
		$user_id = sanitize_text_field( $_POST['user_id'] );
		$token = sanitize_text_field( $_POST['token'] );
		$count = sanitize_text_field( $_POST['count'] );
		$lightbox = sanitize_text_field( $_POST['lightbox'] );
		$background_image = sanitize_text_field( $_POST['background_image'] );
		$response = wp_remote_get( esc_url_raw( $instagram_api ) );
		$response_json = wp_remote_retrieve_body( $response );
		$instagramJSON = json_decode( $response_json );
		ob_start();
		foreach( $instagramJSON->data as $key => $user_data ) {
			?>
			<div class="instagram-card">
				<div class="instagram-image">
				<?php
					if ( 'on' === $background_image ) :
						$instagram_background_image_css = sprintf( 'style="background-image: url(%s); background-size: cover; background-position: center center;"', esc_url( $user_data->images->standard_resolution->url ) );
						if ( 'on' === $lightbox ) :
						?>
						<a class="bbvm-ig-bgimage bbvm-instagram-lightbox" href="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>" <?php echo $instagram_background_image_css; ?>></a>
						<?php
						else:
						?>
						<a class="bbvm-ig-bgimage" href="<?php echo esc_url( $user_data->link ); ?>" <?php echo $instagram_background_image_css; ?>></a>
						<?php
						endif; ?>
						<?php
					else:
					?>
						<?php
						if ( 'on' === $lightbox ) :
						?>
						<a class="bbvm-instagram-lightbox" href="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>"><img src="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>" /></a>
						<?php
						else:
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
					<span class="instagram-likes"><?php esc_html_e( 'Likes:', 'bb-vapor-modules' ); ?> <?php echo esc_html( $user_data->likes->count ); ?></span><span class="instagram-comments"><?php echo esc_html_e( 'Comments:', 'bb-vapor-modules' ); ?> <?php echo esc_html( $user_data->comments->count ); ?></span>
				</div>
				<p class="instagram-caption"><?php echo esc_html( $user_data->caption->text ); ?></p>
			</div>
			<?php
		}

		$return = array();
		$return['html'] = ob_get_clean();
		$return['pagination'] = isset( $instagramJSON->pagination->next_max_id ) ? true : false;
		$return['pagination_url'] = '';
		$return['instagram_json'] = $instagramJSON;

		// Get pagination information
		if( isset( $instagramJSON->pagination->next_max_id  ) ) {
			$sig_response = wp_remote_get( esc_url_raw( sprintf( 'https://mediaron.com/instagram/getsig.php?user_id=%s&token=%s&max_id=%s&feed_count=%s', $user_id, $token, $instagramJSON->pagination->next_max_id, $count ) ) );
			$sig = wp_remote_retrieve_body( $sig_response );
			$return['pagination_url'] = sprintf( 'https://api.instagram.com/v1/users/%d/media/recent?access_token=%s&sig=%s&count=%d&max_id=%s', $user_id, $token, $sig, $count, $instagramJSON->pagination->next_max_id );
		}
		die( json_encode( $return ) );
	}

	public function enqueue_scripts() {
		if ( $this->settings && 'masonry' === $this->settings->layout ) {
			$this->add_js('macy', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/instagram/js/macy.js', array('jquery'), '20190411', true );
			$this->add_js('macy-init', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/instagram/js/macy-init.js', array('jquery'), '20190411', true );
		}
		if ( $this->settings && 'yes' === $this->settings->lightbox ) {
			$this->add_css( 'jquery-magnificpopup' );
			$this->add_js('bbvm-instagram-lightbox', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/instagram/js/lightbox.js', array( 'jquery', 'jquery-magnificpopup' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION  );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Instagram_Module', array(
	'general'       => array( // Tab
		'title'         => __('Instagram', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Instagram Settings', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'items_show' => array(
						'type' => 'unit',
						'label' => __( 'Number of Instagram Photos to Show', 'bb-vapor-modules' ),
						'default' => '10'
					),
					'layout' => array(
						'type' => 'select',
						'label' => __( 'Display Options', 'bb-vapor-modules' ),
						'options' => array(
							'card' => __( 'Card', 'bb-vapor-modules' ),
							'masonry' => __( 'Masonry', 'bb-vapor-modules' ),
						),
						'default' => 'card',
						'toggle' => array(
							'card' => array( 'fields' => array( 'card_columns'  ) )
						),
						'description' => __( 'You may need to save and refresh to see the new layout.', 'bb-vapor-modules' ),
					),
					'lightbox' => array(
						'type' => 'select',
						'label' => __( 'Pop Up Images in a Lightbox', 'bb-vapor-modules' ),
						'options' => array(
							'no' => __( 'No', 'bb-vapor-modules' ),
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
						),
						'default' => 'no',
					),
					'card_columns' => array(
						'type' => 'select',
						'label' => __( 'Number of Card Columns', 'bb-vapor-modules' ),
						'options' => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
							'4' => '4',
						),
						'default' => '3'
					),
					'load_images_background_image' => array(
						'type' => 'select',
						'label' => __( 'Load Images as a Background Image', 'bb-vapor-modules' ),
						'options' => array(
							'no' => __( 'No', 'bb-vapor-modules' ),
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
						),
						'default' => 'no',
						'help' => __( 'This option is useful for Grid layouts', 'bb-vapor-modules' ),
						'toggle' => array(
							'yes' => array( 'fields' => array( 'background_min_height'))
						)
					),
					'background_min_height_desktop' => array(
						'type' => 'unit',
						'label' => __( 'Background Image Minimum Height on Desktop', 'bb-vapor-modules' ),
						'default' => '350',
						'description' => 'px',
					),
					'background_min_height_tablet' => array(
						'type' => 'unit',
						'label' => __( 'Background Image Minimum Height on Tablet', 'bb-vapor-modules' ),
						'default' => '300',
						'description' => 'px',
					),
					'background_min_height_mobile' => array(
						'type' => 'unit',
						'label' => __( 'Background Image Minimum Height on Mobile', 'bb-vapor-modules' ),
						'default' => '300',
						'description' => 'px',
					),
					'show_likes_comments' => array(
						'type' => 'select',
						'label' => __( 'Show Likes and Comments?', 'bb-vapor-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
							'no' => __( 'No', 'bb-vapor-modules' ),
						),
						'default' => 'yes',
					),
					'show_caption' => array(
						'type' => 'select',
						'label' => __( 'Show Caption?', 'bb-vapor-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
							'no' => __( 'No', 'bb-vapor-modules' ),
						),
						'default' => 'yes',
					),
					'card_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Card Padding', 'bb-vapor-modules' ),
						'responsive' => true,
					),
					'card_background_color' => array(
						'type' => 'color',
						'label' => __( 'Card Background Color', 'bb-vapor-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'card_text_color' => array(
						'type' => 'color',
						'label' => __( 'Card Text Color', 'bb-vapor-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'max_image_width' => array(
						'type' => 'unit',
						'label' => __( 'Max Card Width', 'bb-vapor-modules' ),
						'responsive' => true,
						'default' => '1000',
						'description' => __( 'Can override your column width settings', 'bb-vapor-modules' )
					)
				)
			)
		)
	),
	'typography'       => array( // Tab
		'title'         => __('Typography', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'typography'       => array( // Section
				'title'         => __('Typography Settings', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'likes_comments_typography' => array(
						'type' => 'typography',
						'label' => __( 'Likes and Comments Typography', 'bb-vapor-modules' ),
						'responsive' => true,
					),
					'caption_typography' => array(
						'type' => 'typography',
						'label' => __( 'Caption Typography', 'bb-vapor-modules' ),
						'responsive' => true,
					)
				)
			)
		)
	),
	'buttons'       => array( // Tab
		'title'         => __('Buttons', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'buttons'       => array( // Section
				'title'         => __('Button Settings', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'show_load_more_button' => array(
						'type' => 'select',
						'label' => __( 'Show Load More Button', 'bb-vapor-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
							'no' => __( 'No', 'bb-vapor-modules' )
						),
						'default' => 'yes',
						'description' => __( 'Showing Load More is not recommended for the Masonry layout', 'bb-vapor-modules' )
					),
					'show_follow_us_button' => array(
						'type' => 'select',
						'label' => __( 'Show Follow Us Button', 'bb-vapor-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
							'no' => __( 'No', 'bb-vapor-modules' )
						),
						'default' => 'yes'
					),
					'load_more_background_color' => array(
						'type' => 'color',
						'label' => __( 'Show More Background Color', 'bb-vapor-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'load_more_text_color' => array(
						'type' => 'color',
						'label' => __( 'Show More Text Color', 'bb-vapor-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'load_more_text' => array(
						'type' => 'text',
						'label' => __( 'Load More Text', 'bb-vapor-modules' ),
						'default' => __( 'Load More...', 'bb-vapor-modules' )
					),
					'follow_background_color' => array(
						'type' => 'color',
						'label' => __( 'Follow Background Color', 'bb-vapor-modules' ),
						'show_reset' => true,
						'default' => '408bd1'
					),
					'follow_text_color' => array(
						'type' => 'color',
						'label' => __( 'Show More Text Color', 'bb-vapor-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'follow_text' => array(
						'type' => 'text',
						'label' => __( 'Follow Text', 'bb-vapor-modules' ),
						'default' => __( 'Follow on Instagram', 'bb-vapor-modules' )
					),
					'follow_icon' => array(
						'type' => 'icon',
						'label' => __( 'Follow Icon', 'bb-vapor-modules' ),
						'show_remove'   => true
					)
				)
			)
		)
	)
)
);
