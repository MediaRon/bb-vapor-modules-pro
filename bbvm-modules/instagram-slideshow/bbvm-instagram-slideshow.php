<?php // phpcs:ignore
class BBVapor_Instagram_Slideshow extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		/**
		 * Class constructor.
		 */
		parent::__construct(
			array(
				'name'            => __( 'Instagram Slideshow', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add an Instagram Slideshow', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/instagram-slideshow/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/instagram-slideshow/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);

		$this->add_js( 'slick', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'js/slick/slick.min.js', array( 'jquery' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, true );
		$this->add_css( 'slick', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'js/slick/slick.css', array(), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, 'all' );
		$this->add_css( 'slick-theme', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'js/slick/slick-theme.css', array( 'slick' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, 'all' );
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Instagram_Slideshow',
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
