<?php //phpcs:ignore
class BBVapor_Advanced_Coupon extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Advanced Coupon', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Advanced Coupon', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/advanced-coupon/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/advanced-coupon/',
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
	'BBVapor_Advanced_Coupon',
	array(
		'container'  => array(
			'title'    => __( 'Coupon Container', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Coupon Container', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'background_photo'        => array(
							'type'        => 'photo',
							'label'       => __( 'Background Photo', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
						'background_overlay'      => array(
							'type'       => 'color',
							'label'      => __( 'Background Overlay', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => '4f4f4f',
						),
						'outer_border'            => array(
							'type'    => 'unit',
							'label'   => __( 'Outer Border Width', 'bb-vapor-modules-pro' ),
							'default' => 8,
						),
						'outer_border_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Outer Border Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'db7367',
						),
						'outer_border_appearance' => array(
							'type'    => 'select',
							'label'   => __( 'Outer Border Appearance', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'   => __( 'None', 'bb-vapor-modules-pro' ),
								'solid'  => __( 'Solid', 'bb-vapor-modules-pro' ),
								'dashed' => __( 'Dashed', 'bb-vapor-modules-pro' ),
								'dotted' => __( 'Dotted', 'bb-vapor-modules-pro' ),
								'double' => __( 'Double', 'bb-vapor-modules-pro' ),
							),
							'default' => 'solid',
						),
						'inner_border'            => array(
							'type'    => 'unit',
							'label'   => __( 'Inner Border Width', 'bb-vapor-modules-pro' ),
							'default' => 10,
						),
						'inner_border_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Inner Border Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => '32383e',
						),
						'inner_border_appearance' => array(
							'type'    => 'select',
							'label'   => __( 'Inner Border Appearance', 'bb-vapor-modules-pro' ),
							'default' => 'dashed',
							'options' => array(
								'none'   => __( 'None', 'bb-vapor-modules-pro' ),
								'solid'  => __( 'Solid', 'bb-vapor-modules-pro' ),
								'dashed' => __( 'Dashed', 'bb-vapor-modules-pro' ),
								'dotted' => __( 'Dotted', 'bb-vapor-modules-pro' ),
								'double' => __( 'Double', 'bb-vapor-modules-pro' ),
							),
						),
						'coupon_box_padding'      => array(
							'type'       => 'dimension',
							'label'      => __( 'Coupon Box Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'headline'   => array(
			'title'    => __( 'Coupon Headline', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'headline' => array(
					'title'  => __( 'Coupon Headline', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'coupon_headline'            => array(
							'type'    => 'text',
							'label'   => __( 'Coupon Headline', 'bb-vapor-modules-pro' ),
							'default' => __( 'Huge Discount on All Our Products', 'bb-vapor-modules-pro' ),
						),
						'coupon_headline_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Headline Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'coupon_headline_typography' => array(
							'type'      => 'typography',
							'label'     => __( 'Headline Typography', 'bb-vapor-modules-pro' ),
							'resonsive' => true,
						),
						'coupon_headline_padding'    => array(
							'type'      => 'dimension',
							'label'     => __( 'Headline Padding', 'bb-vapor-modules-pro' ),
							'resonsive' => true,
						),
						'coupon_headline_margin'     => array(
							'type'      => 'dimension',
							'label'     => __( 'Headline Margin', 'bb-vapor-modules-pro' ),
							'resonsive' => true,
						),
					),
				),
			),
		),
		'cta'        => array(
			'title'    => __( 'Call to Action', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Call to Action', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'show_cta'                      => array(
							'type'    => 'select',
							'label'   => __( 'Show a Call to Action Button?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'button_text',
										'button_link',
										'button_icon',
										'button_background_color',
										'button_background_color_hover',
										'button_text_color',
										'button_text_color_hover',
										'button_width',
										'button_padding',
										'button_margin',
										'button_typography',
										'button_border',
									),
								),
							),
							'default' => 'no',
						),
						'button_text'                   => array(
							'type'  => 'text',
							'label' => __( 'Button Text', 'bb-vapor-modules-pro' ),
						),
						'button_link'                   => array(
							'type'  => 'link',
							'label' => __( 'Button URL', 'bb-vapor-modules-pro' ),
						),
						'button_icon'                   => array(
							'type'        => 'icon',
							'label'       => __( 'Select an Icon', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
						'button_background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'button_background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Hover Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'button_text_color'             => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'button_text_color_hover'       => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Hover Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'button_icon'                   => array(
							'type'        => 'icon',
							'label'       => __( 'Select an Icon', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
						'button_width'                  => array(
							'type'    => 'select',
							'label'   => __( 'Button Width', 'bb-vapor-modules-pro' ),
							'options' => array(
								'inline' => __( 'Inline Centered', 'bb-vapor-modules-pro' ),
								'block'  => __( 'Full Width', 'bb-vapor-modules-pro' ),
							),
						),
						'button_padding'                => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_margin'                 => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_typography'             => array(
							'type'       => 'typography',
							'label'      => __( 'Button Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_border'                 => array(
							'type'  => 'border',
							'label' => __( 'Button Border', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'disclaimer' => array(
			'title'    => __( 'Disclaimer', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Disclaimer', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'show_disclaimer'       => array(
							'type'    => 'select',
							'label'   => __( 'Show a Disclaimer?', 'bb-vapor-modules-pro' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'disclaimer_text',
										'disclaimer_typography',
										'disclaimer_color',
										'disclaimer_margin',
									),
								),
							),
						),
						'disclaimer_text'       => array(
							'type'        => 'text',
							'label'       => __( 'Enter Disclaimer Text', 'bb-vapor-modules-pro' ),
							'description' => __( 'HTML allowed', 'bb-vapor-modules-pro' ),
						),
						'disclaimer_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Disclaimer Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'disclaimer_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Disclaimer Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'disclaimer_margin'     => array(
							'type'       => 'dimension',
							'label'      => __( 'Disclaimer Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
