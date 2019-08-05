<?php // phpcs:ignore
class BBVapor_WooCommerce_Featured_Products_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Featured Products', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Featured Products', 'bb-vapor-modules-pro' ),
				'category'        => __( 'WooCommerce', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/woocommerce-featured-products/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/woocommerce-featured-products/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}

	public function enqueue_scripts() {
		if ( $this->settings && 'lightbox' === $this->settings->show_details_behavior ) {
			$this->add_js( 'swal', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/woocommerce-featured-products/js/sweetalert.min.js', array( 'jquery' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, true );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_WooCommerce_Featured_Products_Module',
	array(
		'general'       => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Featured Products', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'products'                     => array(
							'type'   => 'suggest',
							'label'  => __( 'WooCommerce Products', 'bb-vapor-modules-pro' ),
							'action' => 'fl_as_posts',
							'data'   => 'product',
							'limit'  => 6,
						),
						'photo_size'                   => array(
							'type'    => 'photo-sizes',
							'label'   => __( 'Photo Sizes to Use', 'bb-vapor-modules-pro' ),
							'default' => 'large',
						),
						'item_width'                   => array(
							'type'        => 'unit',
							'label'       => __( 'Item Width', 'bb-vapor-modules-pro' ),
							'default'     => '33',
							'responsive'  => true,
							'description' => '%',
						),
						'item_max_width'               => array(
							'type'        => 'unit',
							'label'       => __( 'Item Max Width', 'bb-vapor-modules-pro' ),
							'default'     => 0,
							'responsive'  => true,
							'description' => 'px',
							'help'        => __( 'Enter 0 for no max width', 'bb-vapor-modules-pro' ),
						),
						'border_width'                 => array(
							'type'    => 'unit',
							'label'   => __( 'Border Width', 'bb-vapor-modules-pro' ),
							'default' => '1',
						),
						'border_color'                 => array(
							'type'    => 'color',
							'label'   => __( 'Border Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'item_margin'                  => array(
							'type'       => 'dimension',
							'label'      => __( 'Item Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'currenty_locale'              => array(
							'type'    => 'text',
							'label'   => __( 'Currency Locale', 'bb-vapor-modules-pro' ),
							'default' => 'en_US',
						),
						'show_title'                   => array(
							'type'    => 'select',
							'label'   => __( 'Show Title', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'show_short_description'       => array(
							'type'    => 'select',
							'label'   => __( 'Show Short Description', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array( 'yes' => array( 'fields' => array( 'short_description_trim_words' ) ) ),
						),
						'short_description_trim_words' => array(
							'type'    => 'unit',
							'label'   => __( 'Trim Words Length', 'bb-vapor-modules-pro' ),
							'default' => '200',
						),
						'show_description'             => array(
							'type'    => 'select',
							'label'   => __( 'Show Description', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'show_view_details'            => array(
							'type'    => 'select',
							'label'   => __( 'Show View Details', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
					),
				),
			),
		),
		'typography'    => array(
			'title'    => __( 'Typography', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'typography' => array(
					'title'  => __( 'Typography', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'title_typography'                => array(
							'type'       => 'typography',
							'label'      => __( 'Title Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'short_description_typography'    => array(
							'type'       => 'typography',
							'label'      => __( 'Short Description Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'description_typography'          => array(
							'type'       => 'typography',
							'label'      => __( 'Description Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'price_typography'                => array(
							'type'       => 'typography',
							'label'      => __( 'Price Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'show_details_typography'         => array(
							'type'       => 'typography',
							'label'      => __( 'Show Details Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'show_details_content_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Show Details Content Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'show_details_content_heading_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Show Details Heading Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'colorspadding'  => array(
			'title'    => __( 'Colors and Padding', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'colors' => array(
					'title'  => __( 'Colors and Padding', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'item_margin'                  => array(
							'type'       => 'dimension',
							'label'      => __( 'Item Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'title_padding'                => array(
							'type'       => 'dimension',
							'label'      => __( 'Title Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'description_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Description Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'short_description_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Short Description Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'price_padding'                => array(
							'type'       => 'dimension',
							'label'      => __( 'Price Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'show_details_padding'         => array(
							'type'       => 'dimension',
							'label'      => __( 'Show Details Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'show_details_content_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Show Details Content Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'title_color'                  => array(
							'type'       => 'color',
							'label'      => __( 'Title Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'description_color'            => array(
							'type'       => 'color',
							'label'      => __( 'Description Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'short_description_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Short Description Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'price_color'                  => array(
							'type'       => 'color',
							'label'      => __( 'Price Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
					),
				),
			),
		),
		'details'       => array(
			'title'    => __( 'Details', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'details' => array(
					'title'  => __( 'Details Button', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'show_details_text'               => array(
							'type'    => 'text',
							'label'   => __( 'Show Details Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Show Details', 'bb-vapor-modules-pro' ),
						),
						'show_details_behavior'           => array(
							'type'    => 'select',
							'label'   => __( 'Button Behavior', 'bb-vapor-modules-pro' ),
							'options' => array(
								'link'      => __( 'Link to Product Page', 'bb-vapor-modules-pro' ),
								'slidedown' => __( 'Slide Down to Show More Details', 'bb-vapor-modules-pro' ),
								'lightbox'  => __( 'Use a Lightbox to Show More Details', 'bb-vapor-modules-pro' ),
							),
							'default' => 'link',
						),
						'show_details_color'              => array(
							'type'       => 'color',
							'label'      => __( 'Show Details Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'show_details_color_hover'        => array(
							'type'       => 'color',
							'label'      => __( 'Show Details Text Hover Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'show_details_background_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Show Details Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'show_details_background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Show Details Background Hover Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'show_details_icon'               => array(
							'type'        => 'icon',
							'label'       => __( 'Show Details Icon', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
							'default'     => 'fas fa-plus',
						),
						'show_details_icon_color'         => array(
							'type'       => 'color',
							'label'      => __( 'Show Details Icon Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'show_details_icon_color_hover'   => array(
							'type'       => 'color',
							'label'      => __( 'Show Details Icon Hover Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'show_details_icon_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Show Details Icon Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'show_details_icon_background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Show Details Icon Background Hover Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'show_details_icon_border_radius' => array(
							'type'    => 'unit',
							'label'   => __( 'Show Details Icon Border Radius', 'bb-vapor-modules-pro' ),
							'default' => '5',
						),
					),
				),
			),
		),
		'cart'          => array(
			'title'    => __( 'Cart', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'cart' => array(
					'title'  => __( 'Add to Cart', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'cart_padding'                => array(
							'type'       => 'dimension',
							'label'      => __( 'Cart Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'cart_background_color'       => array(
							'type'    => 'color',
							'label'   => __( 'Cart Background Color', 'bb-vapor-modules-pro' ),
							'default' => 'ebe9eb',
						),
						'cart_background_color_hover' => array(
							'type'    => 'color',
							'label'   => __( 'Cart Background Hover Color', 'bb-vapor-modules-pro' ),
							'default' => 'dfdcde',
						),
						'cart_text_color'             => array(
							'type'    => 'color',
							'label'   => __( 'Cart Text Color', 'bb-vapor-modules-pro' ),
							'default' => '515151',
						),
						'cart_text_color_hover'       => array(
							'type'    => 'color',
							'label'   => __( 'Cart Text Hover Color', 'bb-vapor-modules-pro' ),
							'default' => '515151',
						),
						'card_typography'             => array(
							'type'  => 'typography',
							'label' => __( 'Cart Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
