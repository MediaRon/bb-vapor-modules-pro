<?php
class MediaRon_WooCommerce_Featured_Products_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Featured Products', 'mediaron-bb-modules' ),
			'description'     => __( 'Featured Products', 'mediaron-bb-modules' ),
			'category'        => __( 'WooCommerce', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/woocommerce-featured-products/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/woocommerce-featured-products/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}

	public function enqueue_scripts() {
		if ( $this->settings && 'lightbox' === $this->settings->show_details_behavior ) {
			$this->add_js('swal', MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/woocommerce-featured-products/js/sweetalert.min.js', array( 'jquery' ), MEDIARON_BEAVER_BUILDER_VERSION, true );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_WooCommerce_Featured_Products_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Featured Products', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'products' => array(
						'type' => 'suggest',
						'label' => __( 'WooCommerce Products', 'mediaron-bb-modules' ),
						'action'        => 'fl_as_posts',
						'data'          => 'product',
						'limit'         => 6,
					),
					'photo_size' => array(
						'type'          => 'photo-sizes',
						'label'         => __( 'Photo Sizes to Use', 'mediaron-bb-modules' ),
						'default'       => 'large',
					),
					'item_width' => array(
						'type'          => 'unit',
						'label'         => __( 'Item Width', 'mediaron-bb-modules' ),
						'default'       => '33',
						'responsive'    => true,
						'description'   => '%',
					),
					'item_max_width' => array(
						'type'          => 'unit',
						'label'         => __( 'Item Max Width', 'mediaron-bb-modules' ),
						'default'       => 0,
						'responsive'    => true,
						'description'   => 'px',
						'help'          => __( 'Enter 0 for no max width', 'mediaron-bb-modules' ),
					),
					'border_width' => array(
						'type'          => 'unit',
						'label'         => __( 'Border Width', 'mediaron-bb-modules' ),
						'default'       => '1',
					),
					'border_color' => array(
						'type'          => 'color',
						'label'         => __( 'Border Color', 'mediaron-bb-modules' ),
						'default'       => '000000',
					),
					'item_margin' => array(
						'type'          => 'dimension',
						'label'         => __( 'Item Margin', 'mediaron-bb-modules' ),
						'responsive'    => true,
					),
					'currenty_locale' => array(
						'type'          => 'text',
						'label'         => __( 'Currency Locale', 'mediaron-bb-modules' ),
						'default'       => 'en_US',
					),
					'show_title' => array(
						'type'          => 'select',
						'label'         => __( 'Show Title', 'mediaron-bb-modules' ),
						'default'       => 'yes',
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' )
						),
						'default' => 'yes'
					),
					'show_short_description' => array(
						'type'          => 'select',
						'label'         => __( 'Show Short Description', 'mediaron-bb-modules' ),
						'default'       => 'yes',
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' )
						),
						'default' => 'yes',
						'toggle' => array( 'yes' => array( 'fields' => array( 'short_description_trim_words' ) ) ),
					),
					'short_description_trim_words' => array(
						'type' => 'unit',
						'label' => __( 'Trim Words Length', 'mediaron-bb-modules' ),
						'default' => '200',
					),
					'show_description' => array(
						'type'          => 'select',
						'label'         => __( 'Show Description', 'mediaron-bb-modules' ),
						'default'       => 'yes',
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' )
						),
						'default' => 'yes'
					),
					'show_view_details' => array(
						'type'          => 'select',
						'label'         => __( 'Show View Details', 'mediaron-bb-modules' ),
						'default'       => 'yes',
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' )
						),
						'default' => 'yes'
					),
				)
			)
		)
	),
	'typography'       => array( // Tab
		'title'         => __('Typography', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'typography'       => array( // Section
				'title'         => __('Typography', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'title_typography' => array(
						'type' => 'typography',
						'label' => __( 'Title Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'short_description_typography' => array(
						'type' => 'typography',
						'label' => __( 'Short Description Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'description_typography' => array(
						'type' => 'typography',
						'label' => __( 'Description Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'price_typography' => array(
						'type' => 'typography',
						'label' => __( 'Price Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'show_details_typography' => array(
						'type' => 'typography',
						'label' => __( 'Show Details Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'show_details_content_typography' => array(
						'type' => 'typography',
						'label' => __( 'Show Details Content Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'show_details_content_heading_typography' => array(
						'type' => 'typography',
						'label' => __( 'Show Details Heading Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
				)
			)
		)
	),
	'colorspadding'       => array( // Tab
		'title'         => __('Colors and Padding', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'colors'       => array( // Section
				'title'         => __('Colors and Padding', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'item_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Item Margin', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'title_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Title Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'description_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Description Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'short_description_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Short Description Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'price_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Price Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'show_details_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Show Details Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'show_details_content_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Show Details Content Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'title_color' => array(
						'type' => 'color',
						'label' => __( 'Title Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'description_color' => array(
						'type' => 'color',
						'label' => __( 'Description Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'short_description_color' => array(
						'type' => 'color',
						'label' => __( 'Short Description Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'price_color' => array(
						'type' => 'color',
						'label' => __( 'Price Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
				)
			)
		)
	),
	'details'       => array( // Tab
		'title'         => __('Details', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'details'       => array( // Section
				'title'         => __('Details Button', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'show_details_text' => array(
						'type' => 'text',
						'label' => __( 'Show Details Text', 'mediaron-bb-modules' ),
						'default' => __( 'Show Details', 'mediaron-bb-modules' ),
					),
					'show_details_behavior' => array(
						'type' => 'select',
						'label' => __( 'Button Behavior', 'mediaron-bb-modules' ),
						'options' => array(
							'link' => __( 'Link to Product Page', 'mediaron-bb-modules' ),
							'slidedown' => __( 'Slide Down to Show More Details', 'mediaron-bb-modules' ),
							'lightbox' => __( 'Use a Lightbox to Show More Details', 'mediaron-bb-modules' ),
						),
						'default' => 'link'
					),
					'show_details_color' => array(
						'type' => 'color',
						'label' => __( 'Show Details Text Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'show_details_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Show Details Text Hover Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'show_details_background_color' => array(
						'type' => 'color',
						'label' => __( 'Show Details Background Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'show_details_background_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Show Details Background Hover Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'show_details_icon' => array(
						'type' => 'icon',
						'label' => __( 'Show Details Icon', 'mediaron-bb-modules' ),
						'show_remove' => true,
						'default' => 'fas fa-plus',
					),
					'show_details_icon_color' => array(
						'type' => 'color',
						'label' => __( 'Show Details Icon Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'show_details_icon_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Show Details Icon Hover Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'show_details_icon_background_color' => array(
						'type' => 'color',
						'label' => __( 'Show Details Icon Background Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'show_details_icon_background_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Show Details Icon Background Hover Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'show_details_icon_border_radius' => array(
						'type' => 'unit',
						'label' => __( 'Show Details Icon Border Radius', 'mediaron-bb-modules' ),
						'default' => '5'
					),
				)
			)
		)
	),
	'cart'       => array( // Tab
		'title'         => __('Cart', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'cart'       => array( // Section
				'title'         => __('Add to Cart', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'cart_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Cart Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'cart_background_color' => array(
						'type' => 'color',
						'label' => __( 'Cart Background Color', 'mediaron-bb-modules' ),
						'default' => 'ebe9eb'
					),
					'cart_background_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Cart Background Hover Color', 'mediaron-bb-modules' ),
						'default' => 'dfdcde'
					),
					'cart_text_color' => array(
						'type' => 'color',
						'label' => __( 'Cart Text Color', 'mediaron-bb-modules' ),
						'default' => '515151'
					),
					'cart_text_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Cart Text Hover Color', 'mediaron-bb-modules' ),
						'default' => '515151'
					),
					'card_typography' => array(
						'type' => 'typography',
						'label' => __( 'Cart Typography', 'mediaron-bb-modules' )
					)
				)
			)
		)
	),
) );
