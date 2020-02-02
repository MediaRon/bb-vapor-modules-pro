<?php // phpcs:ignore
class BBVapor_Button_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Button', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add a Button', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/button/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/button/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Button_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'General', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button_id'                        => array(
							'type'    => 'text',
							'label'   => __( 'Unique Button ID for Styling', 'bb-vapor-modules-pro' ),
							'default' => 'button_id_' . rand(0,10000), // phpcs:ignore
						),
						'button_text'                      => array(
							'type'        => 'text',
							'label'       => __( 'Button Text', 'bb-vapor-modules-pro' ),
							'preview'     => array(
								'type'     => 'text',
								'selector' => '.bbvm-button span',
							),
							'connections' => array( 'string' ),
						),
						'button_link'                      => array(
							'type'        => 'link',
							'label'       => __( 'Button Link', 'bb-vapor-modules-pro' ),
							'preview'     => array( 'type' => 'none' ),
							'connections' => array( 'url' ),
						),
						'button_icon'                      => array(
							'type'        => 'icon',
							'label'       => __( 'Button Icon', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
							'preview'     => array(
								'type' => 'none',
							),
						),
						'button_background_type'           => array(
							'type'    => 'select',
							'label'   => __( 'Button Background Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'transparent' => __( 'Transparent', 'bb-vapor-modules-pro' ),
								'color'       => __( 'Color', 'bb-vapor-modules-pro' ),
								'gradient'    => __( 'Gradient', 'bb-vapor-modules-pro' ),
							),
							'default' => 'transparent',
							'preview' => array( 'type' => 'none' ),
							'toggle'  => array(
								'color'       => array(
									'fields' => array(
										'button_background_color',
										'button_background_color_hover',
										'button_border',
									),
								),
								'gradient'    => array(
									'fields' => array(
										'button_background_gradient',
										'button_background_gradient_hover',
										'button_border',
									),
								),
								'transparent' => array(
									'fields' => array(
										'button_style',
										'button_style_hover',
										'button_style_border_color',
										'button_style_border_color_hover',
									),
								),
							),
						),
						'button_text_color'                => array(
							'type'    => 'color',
							'label'   => __( 'Button Text Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-button span',
								'property' => 'color',
							),
						),
						'button_text_color_hover'          => array(
							'type'    => 'color',
							'label'   => __( 'Button Text Color on Hover', 'bb-vapor-modules-pro' ),
							'default' => '000000',
							'preview' => array(
								'type' => 'none',
							),
						),
						'button_background_color'          => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'FFFFFF',
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-button-for-beaverbuilder-wrapper .fl-bbvm-button-for-beaverbuilder.bbvm-button',
								'property' => 'background-color',
							),
						),
						'button_background_color_hover'    => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Hover Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'FFFFFF',
							'preview'    => array(
								'type' => 'none',
							),
						),
						'button_background_gradient'       => array(
							'type'    => 'gradient',
							'label'   => __( 'Button Background Gradient', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-button-for-beaverbuilder',
								'property' => 'background-image',
							),
						),
						'button_background_gradient_hover' => array(
							'type'    => 'gradient',
							'label'   => __( 'Button Background Hover Gradient', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type' => 'none',
							),
						),
						'button_style'                     => array(
							'type'    => 'select',
							'label'   => __( 'Button Style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'      => __( 'None', 'bb-vapor-modules-pro' ),
								'iris'      => __( 'Iris', 'bb-vapor-modules-pro' ),
								'ferdinand' => __( 'Ferdinand', 'bb-vapor-modules-pro' ),
								'francisco' => __( 'Francisco', 'bb-vapor-modules-pro' ),
								'prospero'  => __( 'Prospero', 'bb-vapor-modules-pro' ),
								'sebastion' => __( 'Sebastian', 'bb-vapor-modules-pro' ),
								'stephano'  => __( 'Stephano', 'bb-vapor-modules-pro' ),
								'trinculo'  => __( 'Trinculo', 'bb-vapor-modules-pro' ),
								'valentine' => __( 'Valentine', 'bb-vapor-modules-pro' ),
							),
							'preview' => array( 'type' => 'none' ),
						),
						'button_style_hover'               => array(
							'type'    => 'select',
							'label'   => __( 'Button Style Hover', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'      => __( 'None', 'bb-vapor-modules-pro' ),
								'iris'      => __( 'Iris', 'bb-vapor-modules-pro' ),
								'ferdinand' => __( 'Ferdinand', 'bb-vapor-modules-pro' ),
								'francisco' => __( 'Francisco', 'bb-vapor-modules-pro' ),
								'prospero'  => __( 'Prospero', 'bb-vapor-modules-pro' ),
								'sebastion' => __( 'Sebastian', 'bb-vapor-modules-pro' ),
								'stephano'  => __( 'Stephano', 'bb-vapor-modules-pro' ),
								'trinculo'  => __( 'Trinculo', 'bb-vapor-modules-pro' ),
								'valentine' => __( 'Valentine', 'bb-vapor-modules-pro' ),
							),
							'preview' => array( 'type' => 'none' ),
						),
						'button_border'                    => array(
							'type'    => 'border',
							'label'   => __( 'Button Border', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'property' => 'border',
								'selector' => '.fl-bbvm-button-for-beaverbuilder',
							),
						),
						'button_style_border_color'        => array(
							'type'    => 'color',
							'label'   => __( 'Button Style Border Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-button-for-beaverbuilder',
								'property' => 'border-color',
							),
						),
						'button_style_border_color_hover'  => array(
							'type'    => 'color',
							'label'   => __( 'Button Style Border Color Hover', 'bb-vapor-modules-pro' ),
							'default' => '000000',
							'preview' => array( 'type' => 'none' ),
						),
					),
				),
			),
		),
		'styles'  => array(
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button_alignment'  => array(
							'type'    => 'align',
							'label'   => __( 'Button Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'center',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-button-for-beaverbuilder-wrapper',
								'property' => 'text-align',
							),
						),
						'button_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-button-for-beaverbuilder.bbvm-button',
								'property' => 'padding',
								'unit'     => 'px',
							),
						),
						'button_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Button Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-button-for-beaverbuilder.bbvm-button',
							),
						),
						'button_margin'     => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-button-for-beaverbuilder.bbvm-button',
								'property' => 'margin',
								'unit'     => 'px',
							),
						),
						'button_radius'     => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Radius', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-button-for-beaverbuilder.bbvm-button',
								'property' => 'border-radius',
								'unit'     => 'px',
							),
						),
						'button_min_width'  => array(
							'type'        => 'unit',
							'label'       => __( 'Button Min Width', 'bb-vapor-modules-pro' ),
							'default'     => '0',
							'responsive'  => true,
							'description' => 'px',
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-button-for-beaverbuilder.bbvm-button',
								'property' => 'min-width',
								'unit'     => 'px',
							),
						),
					),
				),
			),
		),
	)
);
