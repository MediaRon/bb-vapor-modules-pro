<?php
class MediaRon_WooCommerce_Featured_Category_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Featured Category', 'mediaron-bb-modules' ),
			'description'     => __( 'Featured Category', 'mediaron-bb-modules' ),
			'category'        => __( 'WooCommerce', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/woocommerce-featured-category/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/woocommerce-featured-category/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_WooCommerce_Featured_Category_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Featured Category', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'category' => array(
						'type' => 'suggest',
						'label' => __( 'WooCommerce Category', 'mediaron-bb-modules' ),
						'action'        => 'fl_as_terms',
						'data'          => 'product_cat',
						'limit'         => 1,
					),
					'category_title' => array(
						'type' => 'text',
						'label' => __( 'WooCommerce Category Name', 'mediaron-bb-modules' ),
						'help' => __( 'Leave blank to use the default WooCommerce category name', 'mediaron-bb-modules' ),
						'default' => ''
					),
					'category_width' => array(
						'type' => 'unit',
						'label' => __( 'Category Title Max Width', 'mediaron-bb-modules' ),
						'help' => __( 'The maximum width of the category text. Default is 70%.', 'mediaron-bb-modules' ),
						'default' => '70',
						'responsive' => true,
						'description' => '%',
					),
					'category_title_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Category Title Padding', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'min_height' => array(
						'type'          => 'unit',
						'label'         => __( 'Item Height', 'mediaron-bb-modules' ),
						'default'       => '400',
						'responsive'    => true,
						'description'   => 'px',
					),
					'inner_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Inner Margin', 'mediaron-bb-modules' ),
						'description' => __( 'Recommended margin is 20', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'link_category' => array(
						'type'          => 'select',
						'label'         => __( 'Link Entire Container to Category', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'no',
					),
					'category_text_color' => array(
						'type' => 'color',
						'label' => __( 'Category Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'category_typography' => array(
						'type' => 'typography',
						'label' => __( 'Category Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'border_style' => array(
						'type'          => 'select',
						'label'         => __( 'Select Style', 'mediaron-bb-modules' ),
						'options' => array(
							'inner_border' => __( 'Inner Border', 'mediaron-bb-modules' ),
							'no_border' => __( 'No Border', 'mediaron-bb-modules' ),
						),
						'default' => 'no_border',
						'toggle' => array( 'inner_border' => array( 'fields' => array( 'border_width', 'border_color', 'border_color_hover' ) ) )
					),
					'border_width' => array(
						'type' => 'unit',
						'label' => __( 'Border Width', 'mediaron-bb-modules' ),
						'description' => 'px',
						'default' => '2'
					),
					'border_color' => array(
						'type'          => 'color',
						'label'         => __( 'Border Color', 'mediaron-bb-modules' ),
						'default'       => '000000',
					),
					'border_color_hover' => array(
						'type'          => 'color',
						'label'         => __( 'Border Hover Color', 'mediaron-bb-modules' ),
						'default'       => '333333',
					),
					'category_padding' => array(
						'type'          => 'dimension',
						'label'         => __( 'Category Padding', 'mediaron-bb-modules' ),
						'responsive'    => true,
					),
					'show_button' => array(
						'type' => 'select',
						'label' => __( 'Show Button', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' )
						),
						'default' => 'no',
						'toggle' => array(
							'yes' => array( 'tabs' => array( 'button' ) )
						)
					)
				)
			)
		)
	),
	'photo'       => array( // Tab
		'title'         => __('Background Photo', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'photo'       => array( // Section
				'title'         => __('Background Photo', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'background_photo' => array(
						'type' => 'photo',
						'label' => __( 'Background Photo', 'mediaron-bb-modules' ),
						'show_remove'   => false,
					),
					'background_overlay' => array(
						'type'          => 'color',
						'label'         => __( 'Background Overlay', 'mediaron-bb-modules' ),
						'default'       => 'rgba(0,0,0,0.5)',
						'show_reset' => true,
						'show_alpha' => true,

					),
					'background_overlay_hover' => array(
						'type'          => 'color',
						'label'         => __( 'Background Overlay Hover', 'mediaron-bb-modules' ),
						'default'       => 'rgba(0,0,0,0.3)',
						'show_reset' => true,
						'show_alpha' => true,

					),
				)
			)
		)
	),
	'button'       => array( // Tab
		'title'         => __('Button', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'button'       => array( // Section
				'title'         => __('Button', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'button_background' => array(
						'type' => 'color',
						'label' => __( 'Button Background', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'show_alpha' => true,
						'default' => 'rgba(0,0,0,0)'
					),
					'button_background_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Background Hover', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'show_alpha' => true,
						'default' => 'rgba(255,255,255,1)'
					),
					'button_color' => array(
						'type' => 'color',
						'label' => __( 'Button Text Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'button_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Text Hover Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'button_border_color' => array(
						'type' => 'color',
						'label' => __( 'Button Border Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'button_border_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Border Color on Hover', 'mediaron-bb-modules' ),
						'show_reset' => true,
					),
					'button_border_width' => array(
						'type' => 'unit',
						'label' => __( 'Button Border Width', 'mediaron-bb-modules' ),
						'default' => '2',
					),
					'button_border_width_hover' => array(
						'type' => 'unit',
						'label' => __( 'Button Border Width on Hover', 'mediaron-bb-modules' ),
						'default' => '0',
					),
					'button_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Button Padding', 'mediaron-bb-modules' ),
					),
					'button_typography' => array(
						'type' => 'typography',
						'label' => __( 'Button Typography', 'mediaron-bb-modules' ),
					)
				)
			)
		)
	),
) );
