<?php // phpcs:ignore
class BBVapor_Button_Group_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Button Group', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add a Button Group', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/button-group/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/button-group/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		$this->add_css( 'mrbb-hover', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'css/hover-min.css', array(), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, 'all' );
	}
}
FLBuilder::register_settings_form(
	'mrbb_buttons',
	array(
		'title' => __( 'Add Button', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'Button', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => '',
						'fields' => array(
							'button_text'                => array(
								'type'  => 'text',
								'label' => __( 'Button Text', 'bb-vapor-modules-pro' ),
							),
							'button_link'                => array(
								'type'  => 'link',
								'label' => __( 'Button Link', 'bb-vapor-modules-pro' ),
							),
							'button_icon'                => array(
								'type'        => 'icon',
								'label'       => __( 'Button Icon', 'bb-vapor-modules-pro' ),
								'show_remove' => true,
							),
							'button_text_color'          => array(
								'type'    => 'color',
								'label'   => __( 'Button Text Color', 'bb-vapor-modules-pro' ),
								'default' => '000000',
							),
							'button_text_color_hover'    => array(
								'type'    => 'color',
								'label'   => __( 'Button Text Color on Hover', 'bb-vapor-modules-pro' ),
								'default' => '000000',
							),
							'button_background_type'     => array(
								'type'    => 'select',
								'label'   => __( 'Button Background Type', 'bb-vapor-modules-pro' ),
								'options' => array(
									'transparent' => __( 'Transparent', 'bb-vapor-modules-pro' ),
									'color'       => __( 'Color', 'bb-vapor-modules-pro' ),
									'gradient'    => __( 'Gradient', 'bb-vapor-modules-pro' ),
								),
								'default' => 'transparent',
								'toggle'  => array(
									'color'       => array(
										'fields' => array(
											'button_background_color',
											'button_background_color_hover',
											'border',
											'border_hover',
											'transition',
										),
									),
									'gradient'    => array(
										'fields' => array(
											'button_background_gradient',
											'button_background_gradient_hover',
											'border',
											'border_hover',
											'transition',
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
							'button_background_color'    => array(
								'type'       => 'color',
								'label'      => __( 'Button Background Color', 'bb-vapor-modules-pro' ),
								'show_alpha' => true,
								'show_reset' => true,
								'default'    => 'FFFFFF',
							),
							'button_background_color_hover' => array(
								'type'       => 'color',
								'label'      => __( 'Button Background Hover Color', 'bb-vapor-modules-pro' ),
								'show_alpha' => true,
								'show_reset' => true,
								'default'    => 'FFFFFF',
							),
							'button_background_gradient' => array(
								'type'  => 'gradient',
								'label' => __( 'Button Background Gradient', 'bb-vapor-modules-pro' ),
							),
							'button_background_gradient_hover' => array(
								'type'  => 'gradient',
								'label' => __( 'Button Background Hover Gradient', 'bb-vapor-modules-pro' ),
							),
							'button_style'               => array(
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
							),
							'button_style_hover'         => array(
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
							),
							'button_style_border_color'  => array(
								'type'    => 'color',
								'label'   => __( 'Button Style Border Color', 'bb-vapor-modules-pro' ),
								'default' => '000000',
							),
							'button_style_border_color_hover' => array(
								'type'    => 'color',
								'label'   => __( 'Button Style Border Color Hover', 'bb-vapor-modules-pro' ),
								'default' => '000000',
							),
							'border'                     => array(
								'type'  => 'border',
								'label' => __( 'Button Border', 'bb-vapor-modules-pro' ),
							),
							'border_hover'               => array(
								'type'  => 'border',
								'label' => __( 'Button Border on Hover', 'bb-vapor-modules-pro' ),
							),
							'transition'                 => array(
								'type'    => 'select',
								'label'   => __( 'Transition', 'bb-vapor-modules-pro' ),
								'options' => array(
									'none'                 => __( 'None', 'bb-vapor-modules-pro' ),
									'hvr-fade'             => __( 'Fade', 'bb-vapor-modules-pro' ),
									'hvr-back-pulse'       => __( 'Pulse', 'bb-vapor-modules-pro' ),
									'hvr-sweep-to-right'   => __( 'Sweep to Right', 'bb-vapor-modules-pro' ),
									'hvr-sweep-to-left'    => __( 'Sweep to Left', 'bb-vapor-modules-pro' ),
									'hvr-sweep-to-bottom'  => __( 'Sweep to Bottom', 'bb-vapor-modules-pro' ),
									'hvr-sweep-to-top'     => __( 'Sweep to Top', 'bb-vapor-modules-pro' ),
									'hvr-bounce-to-right'  => __( 'Bounce to Right', 'bb-vapor-modules-pro' ),
									'hvr-bounce-to-left'   => __( 'Bounce to Left', 'bb-vapor-modules-pro' ),
									'hvr-bounce-to-bottom' => __( 'Bounce to Bottom', 'bb-vapor-modules-pro' ),
									'hvr-bounce-to-top'    => __( 'Bounce to Top', 'bb-vapor-modules-pro' ),
									'hvr-radial-out'       => __( 'Radial Out', 'bb-vapor-modules-pro' ),
									'hvr-radial-in'        => __( 'Radial In', 'bb-vapor-modules-pro' ),
									'hvr-rectangle-in'     => __( 'Rectangle In', 'bb-vapor-modules-pro' ),
									'hvr-rectangle-out'    => __( 'Rectangle Out', 'bb-vapor-modules-pro' ),
									'hvr-shutter-in-horizontal' => __( 'Shutter In Horizontal', 'bb-vapor-modules-pro' ),
									'hvr-shutter-out-horizontal' => __( 'Shutter Out Horizontal', 'bb-vapor-modules-pro' ),
									'hvr-shutter-in-vertical' => __( 'Shutter In Vertical', 'bb-vapor-modules-pro' ),
									'hvr-shutter-out-vertical' => __( 'Shutter Out Vertical', 'bb-vapor-modules-pro' ),
								),
								'default' => 'none',
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
	'BBVapor_Button_Group_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'General', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button' => array(
							'type'         => 'form',
							'label'        => __( 'Button', 'bb-vapor-modules-pro' ),
							'form'         => 'mrbb_buttons',
							'multiple'     => true,
							'preview_text' => 'button_text',
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
						'button_alignment'        => array(
							'type'    => 'align',
							'label'   => __( 'Button Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'center',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-button-group-for-beaverbuilder',
								'property' => 'text-align',
							),
						),
						'button_alignment_tablet' => array(
							'type'    => 'align',
							'label'   => __( 'Button Alignment Tablet', 'bb-vapor-modules-pro' ),
							'default' => 'center',
							'preview' => array( 'type' => false ),
						),
						'button_alignment_mobile' => array(
							'type'    => 'align',
							'label'   => __( 'Button Alignment on Mobile', 'bb-vapor-modules-pro' ),
							'default' => 'center',
							'preview' => array( 'type' => false ),
						),
						'button_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-button-wrapper .bbvm-button',
								'property' => 'padding',
								'unit'     => 'px',
							),
						),
						'button_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Button Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-button-wrapper .bbvm-button',
							),
						),
						'button_margin'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-button-wrapper',
								'property' => 'margin',
								'unit'     => 'px',
							),
						),
						'button_radius'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Radius', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_min_width'        => array(
							'type'        => 'unit',
							'label'       => __( 'Button Min Width', 'bb-vapor-modules-pro' ),
							'default'     => '0',
							'responsive'  => true,
							'description' => 'px',
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.bbvm-button-wrapper .bbvm-button',
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
