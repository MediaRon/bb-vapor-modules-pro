<?php
class BBVapor_Instagram_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Instagram', 'bb-vapor-modules' ),
			'description'     => __( 'Add an Instagram Feed', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/instagram/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/instagram/',
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
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $instagram_api );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		$response = curl_exec($ch);
		$instagramJSON = json_decode( $response );
		ob_start();
		foreach( $instagramJSON->data as $key => $user_data ) {
			?>
			<div class="instagram-card">
				<div class="instagram-image">
					<a href="<?php echo esc_url( $user_data->link ); ?>"><img src="<?php echo esc_url( $user_data->images->standard_resolution->url ); ?>" /></a>
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
			$sig = bbvm_instagram_get_sig( $user_id, $token, $instagramJSON->pagination->next_max_id, $count );
			$return['pagination_url'] = sprintf( 'https://api.instagram.com/v1/users/%d/media/recent?access_token=%s&sig=%s&count=%d&max_id=%s', $user_id, $token, $sig, $count, $instagramJSON->pagination->next_max_id );
		}
		die( json_encode( $return ) );
	}

	public function enqueue_scripts() {
		if ( $this->settings && 'masonry' === $this->settings->layout ) {
			$this->add_js('macy', BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/instagram/js/macy.js', array('jquery'), '20190411', true );
			$this->add_js('macy-init', BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/instagram/js/macy-init.js', array('jquery'), '20190411', true );
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
