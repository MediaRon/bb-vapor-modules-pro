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
							'type'  => 'text',
							'label' => __( 'Pricing Table Title', 'bb-vapor-modules-pro' ),
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
						'pricing_table_title_align'      => array(
							'type'       => 'align',
							'label'      => __( 'Title Alignment', 'bb-vapor-modules-pro' ),
							'default'    => 'center',
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
		'style'   => array(
			'title'    => __( 'Style', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'style' => array(
					'title'  => __( 'Style', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'blockquote_style'              => array(
							'type'    => 'select',
							'label'   => __( 'Blockquote Style Select', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'                 => __( 'None', 'bb-vapor-modules-pro' ),
								'enhanced'             => __( 'Enhanced', 'bb-vapor-modules-pro' ),
								'background_quotes'    => __( 'Background Quotes', 'bb-vapor-modules-pro' ),
								'left_border'          => __( 'Left Border', 'bb-vapor-modules-pro' ),
								'right_border'         => __( 'Right Border', 'bb-vapor-modules-pro' ),
								'top_bottom_border'    => __( 'Top and Bottom Border', 'bb-vapor-modules-pro' ),
								'cite'                 => __( 'Cite', 'bb-vapor-modules-pro' ),
								'cite_border_effect'   => __( 'Cite Border Effect', 'bb-vapor-modules-pro' ),
								'cite_animated_border' => __( 'Cite Animated Border', 'bb-vapor-modules-pro' ),
								'cite_scale'           => __( 'Cite Scale', 'bb-vapor-modules-pro' ),
								'cite_brackets'        => __( 'Cite Brackets', 'bb-vapor-modules-pro' ),
								'cite_icon'            => __( 'Cite Icon', 'bb-vapor-modules-pro' ),
							),
							'default' => 'none',
							'toggle'  => array(
								'bold'                 => array(
									'fields' => array(
										'bold_quote_color',
										'bold_background_color',
										'bold_text_shadow_color',
									),
								),
								'enhanced'             => array(
									'fields' => array(
										'enhanced_background_color',
										'enhanced_quote_color',
										'enhanced_text_color',
										'enhanced_border_color',
										'enhanced_gradient',
									),
								),
								'left_border'          => array(
									'fields' => array(
										'border_type',
										'border_width',
										'background_color',
										'text_color',
									),
								),
								'right_border'         => array(
									'fields' => array(
										'border_type',
										'border_width',
										'background_color',
										'text_color',
									),
								),
								'top_bottom_border'    => array(
									'fields' => array(
										'top_bottom_border_color',
										'top_bottom_border_color_hover',
										'top_bottom_border_height',
										'background_color',
										'text_color',
									),
								),
								'cite'                 => array(
									'fields' => array(
										'cite_border_color',
										'text_color',
									),
								),
								'cite_border_effect'   => array(
									'fields' => array(
										'cite_border_color',
										'background_color',
										'text_color',
									),
								),
								'cite_animated_border' => array(
									'fields' => array(
										'cite_border_color',
										'background_color',
										'text_color',
									),
								),
								'cite_scale'           => array(
									'fields' => array(
										'background_color',
										'text_color',
									),
								),
								'cite_brackets'        => array(
									'fields' => array(
										'cite_border_color',
										'background_color',
										'text_color',
									),
								),
								'cite_icon'            => array(
									'fields' => array(
										'cite_border_color',
										'background_color',
										'text_color',
									),
								),
								'background_quotes'    => array(
									'fields' => array(
										'background_quote_color',
										'background_color',
										'text_color',
									),
								),
							),
						),
						'background_quote_color'        => array(
							'type'       => 'color',
							'label'      => __( 'Background Quote Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'rgba(0, 0, 0, 1)',
						),
						'bold_quote_color'              => array(
							'type'       => 'color',
							'label'      => __( 'Bold Quote Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'rgba(206, 255, 246, 0.8)',
						),
						'bold_text_shadow_color'        => array(
							'type'       => 'color',
							'label'      => __( 'Text Shadow Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'rgba(206, 255, 246, 0.2)',
						),
						'bold_background_color'         => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'enhanced_gradient'             => array(
							'type'  => 'gradient',
							'label' => __( 'Container Gradient', 'bb-vapor-modules-pro' ),
						),
						'enhanced_background_color'     => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'enhanced_quote_color'          => array(
							'type'       => 'color',
							'label'      => __( 'Enhanced Quote Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'rgba(0,0,0,1)',
						),
						'enhanced_text_color'           => array(
							'type'       => 'color',
							'label'      => __( 'Enhanced Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => '000000',
						),
						'enhanced_border_color'         => array(
							'type'       => 'color',
							'label'      => __( 'Enhanced Border Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'font_heading'                  => array(
							'type'    => 'font',
							'label'   => __( 'Heading Font', 'bb-vapor-modules-pro' ),
							'default' => array(
								'family' => 'Montserrat',
								'weight' => 700,
							),
						),
						'font_size'                     => array(
							'type'        => 'unit',
							'label'       => __( 'Heading Font Size', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '32',
							'responsive'  => true,
						),
						'font_attribution'              => array(
							'type'    => 'font',
							'label'   => __( 'Attribution Font', 'bb-vapor-modules-pro' ),
							'default' => array(
								'family' => 'Oswald',
								'weight' => 400,
							),
						),
						'font_size_attribution'         => array(
							'type'        => 'unit',
							'label'       => __( 'Attribution Font Size', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '24',
							'responsive'  => true,
						),
						'border_type'                   => array(
							'type'    => 'select',
							'label'   => __( 'Border Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'color'    => __( 'Color', 'bb-vapor-modules-pro' ),
								'gradient' => __( 'Gradient', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'color'    => array(
									'fields' => array(
										'border_background_color',
									),
								),
								'gradient' => array(
									'fields' => array(
										'border_background_gradient',
									),
								),
							),
						),
						'border_background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Border Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => '333333',
						),
						'border_background_gradient'    => array(
							'type'  => 'gradient',
							'label' => __( 'Border Background Gradient', 'bb-vapor-modules-pro' ),
						),
						'border_width'                  => array(
							'type'        => 'unit',
							'label'       => __( 'Border Width', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '30',
						),
						'top_bottom_border_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Border Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'FAFAFA',
						),
						'top_bottom_border_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Border Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'top_bottom_border_height'      => array(
							'type'    => 'unit',
							'label'   => __( 'Border Height', 'bb-vapor-modules-pro' ),
							'default' => '2',
						),
						'cite_border_color'             => array(
							'type'       => 'color',
							'label'      => __( 'Cite Border Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '757575',
						),
						'background_color'              => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'text_color'                    => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => '000000',
						),
						'blockquote_padding'            => array(
							'type'       => 'dimension',
							'label'      => __( 'Blockquote Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'max_width'                     => array(
							'type'        => 'unit',
							'label'       => __( 'Max Width', 'bb-vapor-modules-pro' ),
							'responsive'  => true,
							'default'     => '50',
							'description' => '%',
						),
					),
				),
			),
		),
	)
);
