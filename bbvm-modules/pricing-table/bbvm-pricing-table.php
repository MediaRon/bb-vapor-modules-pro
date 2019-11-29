<?php //phpcs:ignore
class BBVapor_Pricing_Table extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Pricing Table', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add a Pricing Table', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/pricing-table/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/pricing-table/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => true, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the item addition form settings.
 */
FLBuilder::register_settings_form(
	'bbvm_pricing_table_item',
	array(
		'title' => __( 'Add Item', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general'        => array(
				'title'    => __( 'General', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'featured'   => array(
						'title'  => __( 'Featured Title', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'display_featured' => array(
								'type'    => 'select',
								'options' => array(
									'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
									'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								),
								'label'   => __( 'Show a Featured Title?', 'bb-vapor-modules-pro' ),
								'default' => 'no',
								'toggle'  => array(
									'yes' => array(
										'fields' => array(
											'featured_title',
										),
										'tabs'   => array(
											'featured_tab',
										),
									),
								),
							),
							'featured_title'   => array(
								'type'        => 'text',
								'connections' => array( 'string', 'html', 'url' ),
								'label'       => __( 'Enter a Title', 'bb-vapor-modules-pro' ),
								'description' => __( 'Featured, Best Value, Discounted, etc.', 'bb-vapor-modules-pro' ),
							),
						),
					),
					'item_title' => array(
						'title'  => __( 'Item Title', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'display_title' => array(
								'type'    => 'select',
								'options' => array(
									'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
									'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								),
								'label'   => __( 'Show an Item Title?', 'bb-vapor-modules-pro' ),
								'default' => 'yes',
								'toggle'  => array(
									'yes' => array(
										'fields' => array(
											'item_title',
										),
										'tabs'   => array(
											'item_title_tab',
										),
									),
								),
							),
							'item_title'    => array(
								'type'        => 'text',
								'connections' => array( 'string', 'html', 'url' ),
								'label'       => __( 'Enter an Item Title', 'bb-vapor-modules-pro' ),
								'description' => __( 'Basic, Pro, Premium, Lifetime, etc.', 'bb-vapor-modules-pro' ),
							),
						),
					),
					'price'      => array(
						'title'  => __( 'Price', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'display_price' => array(
								'type'    => 'select',
								'options' => array(
									'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
									'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								),
								'label'   => __( 'Show Price?', 'bb-vapor-modules-pro' ),
								'default' => 'yes',
								'toggle'  => array(
									'yes' => array(
										'fields' => array(
											'item_price',
											'item_duration',
										),
										'tabs'   => array(
											'item_price_tab',
										),
									),
								),
							),
							'item_price'    => array(
								'type'        => 'text',
								'connections' => array( 'string', 'html' ),
								'label'       => __( 'Price', 'bb-vapor-modules-pro' ),
							),
							'item_duration' => array(
								'type'        => 'text',
								'connections' => array( 'string', 'html' ),
								'placeholder' => __( 'Per month, Lifetime, Per year...', 'bb-vapor-modules-pro' ),
								'label'       => __( 'Duration', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
			'featured_tab'   => array(
				'title'    => __( 'Featured Title', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'featured_styles' => array(
						'title'  => __( 'Featured Styles', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'featured_background_color' => array(
								'type'       => 'color',
								'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
								'show_alpha' => true,
								'show_reset' => true,
							),
							'featured_text_color'       => array(
								'type'       => 'color',
								'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
								'show_reset' => true,
							),
							'featured_padding'          => array(
								'type'       => 'dimension',
								'label'      => __( 'Padding', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
							'featured_typography'       => array(
								'type'       => 'typography',
								'label'      => __( 'Typography', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
						),
					),
				),
			),
			'item_title_tab' => array(
				'title'    => __( 'Item Title', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'item_title' => array(
						'title'  => __( 'Item Title', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'item_background_color' => array(
								'type'       => 'color',
								'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
								'show_alpha' => true,
								'show_reset' => true,
							),
							'item_text_color'       => array(
								'type'       => 'color',
								'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
								'show_reset' => true,
							),
							'item_padding'          => array(
								'type'       => 'dimension',
								'label'      => __( 'Padding', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
							'item_typography'       => array(
								'type'       => 'typography',
								'label'      => __( 'Typography', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
						),
					),
				),
			),
			'item_price_tab' => array(
				'title'    => __( 'Item Price', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'item_price' => array(
						'title'  => __( 'Item Price', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'price_background_color' => array(
								'type'       => 'color',
								'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
								'show_alpha' => true,
								'show_reset' => true,
							),
							'price_text_color'       => array(
								'type'       => 'color',
								'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
								'show_reset' => true,
							),
							'price_padding'          => array(
								'type'       => 'dimension',
								'label'      => __( 'Padding', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
							'price_typography'       => array(
								'type'       => 'typography',
								'label'      => __( 'Typography', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
						),
					),
				),
			),
			'features'       => array(
				'title'    => __( 'Features', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'features' => array(
						'title'  => __( 'Features', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'features' => array(
								'type'        => 'text',
								'label'       => __( 'Feature', 'bb-vapor-modules-pro' ),
								'description' => __( 'Enter one feature.', 'bb-vapor-modules-pro' ),
								'multiple'    => true,
							),
						),
					),
				),
			),
			'button'         => array(
				'title'    => __( 'Button', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'button'            => array(
						'title'  => __( 'Button Attributes', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'button_text'   => array(
								'type'        => 'text',
								'label'       => __( 'Button Text', 'bb-vapor-modules-pro' ),
								'connections' => array( 'string', 'html' ),
							),
							'button_url'    => array(
								'type'          => 'link',
								'label'         => __( 'Button URL', 'bb-vapor-modules-pro' ),
								'connections'   => array( 'string', 'html', 'url' ),
								'show_target'   => true,
								'show_nofollow' => true,
							),
							'show_icon'     => array(
								'type'    => 'select',
								'label'   => __( 'Show an Icon?', 'bb-vapor-modules-pro' ),
								'default' => 'no',
								'options' => array(
									'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
									'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								),
								'toggle'  => array(
									'yes' => array(
										'fields' => array(
											'button_icon',
											'icon_position',
										),
									),
								),
							),
							'button_icon'   => array(
								'type'  => 'icon',
								'label' => __( 'Choose an Icon', 'bb-vapor-modules-pro' ),
							),
							'icon_position' => array(
								'type'    => 'select',
								'label'   => __( 'Choose an Icon Location', 'bb-vapor-modules-pro' ),
								'options' => array(
									'before' => __( 'Before Text', 'bb-vapor-modules-pro' ),
									'after'  => __( 'After Text', 'bb-vapor-modules-pro' ),
								),
							),
						),
					),
					'button_appearance' => array(
						'title'  => __( 'Button Appearance', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'button_background_select' => array(
								'type'    => 'select',
								'label'   => __( 'Button Appearance', 'bb-vapor-modules-pro' ),
								'options' => array(
									'flat'        => __( 'Flat', 'bb-vapor-modules-pro' ),
									'gradient'    => __( 'Gradient', 'bb-vapor-modules-pro' ),
									'transparent' => __( 'Transparent', 'bb-vapor-modules-pro' ),
								),
								'default' => 'flat',
								'toggle'  => array(
									'gradient' => array(
										'fields' => array(
											'button_gradient',
											'button_gradient_hover',
										),
									),
									'flat'     => array(
										'fields' => array(
											'button_background',
											'button_background_hover',
										),
									),
								),
							),
							'button_gradient'          => array(
								'type'  => 'gradient',
								'label' => __( 'Button Gradient', 'bb-vapor-modules-pro' ),
							),
							'button_gradient_hover'    => array(
								'type'  => 'gradient',
								'label' => __( 'Button Gradient on Hover', 'bb-vapor-modules-pro' ),
							),
							'button_background'        => array(
								'type'       => 'color',
								'label'      => __( 'Button Background', 'bb-vapor-modules-pro' ),
								'show_alpha' => true,
								'show_reset' => true,
							),
							'button_background_hover'  => array(
								'type'       => 'color',
								'label'      => __( 'Button Background on Hover', 'bb-vapor-modules-pro' ),
								'show_alpha' => true,
								'show_reset' => true,
							),
							'button_text_color'        => array(
								'type'       => 'color',
								'label'      => __( 'Button Text Color', 'bb-vapor-modules-pro' ),
								'show_alpha' => true,
								'show_reset' => true,
							),
							'button_text_color_hover'  => array(
								'type'       => 'color',
								'label'      => __( 'Button Text Color on Hover', 'bb-vapor-modules-pro' ),
								'show_alpha' => true,
								'show_reset' => true,
							),
							'button_typography'        => array(
								'type'       => 'typography',
								'label'      => __( 'Button Typography', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
						),
					),
					'button_options'    => array(
						'title'  => __( 'Button Options', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'button_padding' => array(
								'type'       => 'dimension',
								'label'      => __( 'Button Padding', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
							'button_margin'  => array(
								'type'       => 'dimension',
								'label'      => __( 'Button Margin', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
							'button_border'  => array(
								'type'       => 'border',
								'label'      => __( 'Button Border', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
						),
					),
				),
			),
			'styles'         => array(
				'title'    => __( 'Styles', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'styles' => array(
						'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'item_padding'          => array(
								'type'       => 'dimension',
								'label'      => __( 'Item Overall Padding', 'bb-vapor-modules-pro' ),
								'responsive' => true,
							),
							'item_background_color' => array(
								'type'       => 'color',
								'label'      => __( 'Item Background Color', 'bb-vapor-modules-pro' ),
								'show_alpha' => true,
								'show_reset' => true,
							),
						),
					),
				),
			),
		),
	)
);
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Pricing_Table',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'General', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'pricing_title_enable'           => array(
							'type'    => 'select',
							'label'   => __( 'Enable a Pricing Table Title', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'pricing_table_title',
										'pricing_table_title_color',
										'pricing_table_title_background',
										'pricing_table_title_border',
										'pricing_table_title_padding',
										'pricing_table_title_typography',
									),
								),
							),
						),
						'pricing_table_title'            => array(
							'type'        => 'text',
							'label'       => __( 'Pricing Table Title', 'bb-vapor-modules-pro' ),
							'connections' => array( 'string', 'html' ),
						),
						'pricing_table_title_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Pricing Table Title Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '#FFFFFF',
							'show_reset' => true,
						),
						'pricing_table_title_background' => array(
							'label'      => __( 'Title Background Color', 'bb-vapor-modules-pro' ),
							'type'       => 'color',
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => '#17283d',
						),
						'pricing_table_title_border'     => array(
							'type'       => 'border',
							'label'      => __( 'Title Border', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'pricing_table_title_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Title Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'pricing_table_title_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Title Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'items'   => array(
			'title'    => __( 'Items', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'style' => array(
					'title'  => __( 'Items', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'items' => array(
							'type'         => 'form',
							'form'         => 'bbvm_pricing_table_item',
							'preview_text' => 'title',
							'label'        => __( 'Item', 'bb-vapor-modules-pro' ),
							'multiple'     => true,
							'limit'        => 6,
						),
					),
				),
			),
		),
		'styles'  => array(
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'features' => array(
					'title'  => __( 'Features', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'odd_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Odd Color Background', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'odd_color_text'  => array(
							'type'       => 'color',
							'label'      => __( 'Odd Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'even_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Even Color Background', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'even_color_text' => array(
							'type'       => 'color',
							'label'      => __( 'Even Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'feature_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Feature Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'feature_border'  => array(
							'type'       => 'border',
							'label'      => __( 'Feature Border', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
