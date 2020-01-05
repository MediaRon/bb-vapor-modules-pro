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
		'container'   => array(
			'title'    => __( 'Container', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Coupon Container', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'min_height'              => array(
							'type'       => 'unit',
							'label'      => __( 'Minimum Height', 'bb-vapor-modules-pro' ),
							'default'    => 400,
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.bbvm-advanced-coupon',
								'property'  => 'min-height',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'background_photo'        => array(
							'type'        => 'photo',
							'label'       => __( 'Background Photo', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.bbvm-advanced-coupon',
								'property'  => 'background-image',
								'important' => true,
							),
						),
						'background_overlay'      => array(
							'type'       => 'color',
							'label'      => __( 'Background Overlay', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => '4f4f4f',
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.bbvm-advanced-coupon-overlay',
								'property'  => 'background-color',
								'important' => true,
							),
						),
						'outer_border'            => array(
							'type'    => 'unit',
							'label'   => __( 'Outer Border Width', 'bb-vapor-modules-pro' ),
							'default' => 8,
							'preview' => array(
								'type'      => 'css',
								'selector'  => '.fl-bbvm-advanced-coupon-wrapper',
								'property'  => 'border-width',
								'important' => true,
								'unit'      => 'px',
							),
						),
						'outer_border_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Outer Border Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => '000000',
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-advanced-coupon-wrapper',
								'property' => 'border-color',
							),
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
							'default' => 'dashed',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-advanced-coupon-wrapper',
								'property' => 'border-style',
							),
						),
						'inner_border'            => array(
							'type'    => 'unit',
							'label'   => __( 'Inner Border Width', 'bb-vapor-modules-pro' ),
							'default' => 10,
							'preview' => array(
								'type'      => 'css',
								'selector'  => '.bbvm-advanced-coupon-overlay',
								'property'  => 'border-width',
								'important' => true,
								'unit'      => 'px',
							),
						),
						'inner_border_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Inner Border Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'FFFFFF',
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-advanced-coupon-overlay',
								'property' => 'border-color',
							),
						),
						'inner_border_appearance' => array(
							'type'    => 'select',
							'label'   => __( 'Inner Border Appearance', 'bb-vapor-modules-pro' ),
							'default' => 'solid',
							'options' => array(
								'none'   => __( 'None', 'bb-vapor-modules-pro' ),
								'solid'  => __( 'Solid', 'bb-vapor-modules-pro' ),
								'dashed' => __( 'Dashed', 'bb-vapor-modules-pro' ),
								'dotted' => __( 'Dotted', 'bb-vapor-modules-pro' ),
								'double' => __( 'Double', 'bb-vapor-modules-pro' ),
							),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-advanced-coupon-overlay',
								'property' => 'border-style',
							),
						),
						'coupon_box_padding'      => array(
							'type'       => 'dimension',
							'label'      => __( 'Coupon Box Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-advanced-coupon',
								'property' => 'padding',
								'unit'     => 'px',
							),
						),
					),
				),
			),
		),
		'icon'        => array(
			'title'    => __( 'Photo/Icon', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'icon' => array(
					'title'  => __( 'Coupon Photo/Icon', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'photo_icon'        => array(
							'type'    => 'select',
							'default' => 'none',
							'label'   => __( 'Show a Coupon Icon/Photo', 'bb-vapor-modules-pro' ),
							'options' => array(
								'photo' => __( 'Photo', 'bb-vapor-modules-pro' ),
								'icon'  => __( 'Icon', 'bb-vapor-modules-pro' ),
								'none'  => __( 'None', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'photo' => array(
									'fields' => array(
										'top_photo',
										'top_photo_align',
										'top_photo_link',
										'top_photo_display',
										'top_photo_padding',
										'top_photo_margin',
										'top_photo_border',
									),
								),
								'icon'  => array(
									'fields' => array(
										'icon_size',
										'icon',
										'icon_align',
										'icon_color',
										'icon_display',
										'icon_padding',
										'icon_margin',
									),
								),
							),
						),
						'top_photo'         => array(
							'type'        => 'photo',
							'label'       => __( 'Photo', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
						'top_photo_link'    => array(
							'type'          => 'link',
							'label'         => __( 'Photo Link', 'bb-vapor-modules-pro' ),
							'responsive'    => true,
							'show_target'   => true,
							'show_nofollow' => true,
							'preview'       => array(),
						),
						'top_photo_align'   => array(
							'type'    => 'align',
							'label'   => __( 'Photo Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'center',
							'preview' => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.bbvm-advanced-coupon-top-photo',
										'property' => 'text-align',
									),
								),
							),

						),
						'top_photo_display' => array(
							'type'    => 'select',
							'default' => 'square',
							'label'   => __( 'Photo Display', 'bb-vapor-modules-pro' ),
							'options' => array(
								'square'  => __( 'Square/Rectangular', 'bb-vapor-modules-pro' ),
								'rounded' => __( 'Rounded', 'bb-vapor-modules-pro' ),
							),
						),
						'top_photo_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Photo Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.bbvm-advanced-coupon-top-photo',
										'property' => 'padding',
										'unit'     => 'px',
									),
								),
							),
						),
						'top_photo_margin'  => array(
							'type'       => 'dimension',
							'label'      => __( 'Photo Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.bbvm-advanced-coupon-top-photo',
										'property' => 'margin',
										'unit'     => 'px',
									),
								),
							),
						),
						'top_photo_border'  => array(
							'type'       => 'border',
							'label'      => __( 'Photo Border', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.bbvm-advanced-coupon-top-photo img',
										'property' => 'border',
									),
								),
							),
						),
						'icon_size'         => array(
							'type'    => 'unit',
							'label'   => __( 'Icon Size', 'bb-vapor-modules-pro' ),
							'default' => 40,
							'preview' => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.bbvm-advanced-coupon-icon span:before',
										'property' => 'font-size',
										'unit'     => 'px',
									),
								),
							),
						),
						'icon'              => array(
							'type'        => 'icon',
							'label'       => __( 'Select an Icon', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
						'icon_align'        => array(
							'type'    => 'align',
							'label'   => __( 'Icon Alignment', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.bbvm-advanced-coupon-icon',
										'property' => 'text-align',
									),
								),
							),
						),
						'icon_color'        => array(
							'type'       => 'color',
							'label'      => __( 'Icon Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.bbvm-advanced-coupon-icon span:before',
										'property' => 'color',
									),
								),
							),
						),
						'icon_display'      => array(
							'type'    => 'select',
							'default' => 'square',
							'label'   => __( 'Icon Appearance', 'bb-vapor-modules-pro' ),
							'options' => array(
								'square'  => __( 'Square/Rectangular', 'bb-vapor-modules-pro' ),
								'rounded' => __( 'Rounded', 'bb-vapor-modules-pro' ),
							),
						),
						'icon_padding'      => array(
							'type'       => 'dimension',
							'label'      => __( 'Icon Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.bbvm-advanced-coupon-icon',
										'property' => 'padding',
										'unit'     => 'px',
									),
								),
							),
						),
						'icon_margin'       => array(
							'type'       => 'dimension',
							'label'      => __( 'Icon Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.bbvm-advanced-coupon-icon',
										'property' => 'margin',
										'unit'     => 'px',
									),
								),
							),
						),
					),
				),
			),
		),
		'headline'    => array(
			'title'    => __( 'Headline', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'headline' => array(
					'title'  => __( 'Coupon Headline', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'enable_headline'            => array(
							'type'    => 'select',
							'default' => 'yes',
							'label'   => __( 'Display a Coupon Headline', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'coupon_headline',
										'coupon_headline_color',
										'coupon_headline_typography',
										'coupon_headline_padding',
										'coupon_headline_margin',
									),
								),
							),
						),
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
							'type'       => 'typography',
							'label'      => __( 'Headline Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'coupon_headline_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Headline Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'coupon_headline_margin'     => array(
							'type'       => 'dimension',
							'label'      => __( 'Headline Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'description' => array(
			'title'    => __( 'Description', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'headline' => array(
					'title'  => __( 'Coupon Description', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'enable_description'     => array(
							'type'    => 'select',
							'default' => 'no',
							'label'   => __( 'Display a Coupon Description', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'description',
										'description_color',
										'description_typography',
										'description_padding',
										'description_margin',
									),
								),
							),
						),
						'description'            => array(
							'type'  => 'editor',
							'label' => __( 'Coupon Description', 'bb-vapor-modules-pro' ),
						),
						'description_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Description Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'description_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Description Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'description_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Description Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'description_margin'     => array(
							'type'       => 'dimension',
							'label'      => __( 'Description Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'coupon'      => array(
			'title'    => __( 'Coupon', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'headline' => array(
					'title'  => __( 'Coupon', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'enable_coupon'     => array(
							'type'    => 'select',
							'default' => 'yes',
							'label'   => __( 'Display a Coupon', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'coupon_code',
										'coupon_bg_color',
										'coupon_text_color',
										'coupon_padding',
										'coupon_margin',
										'coupon_border',
										'coupon_typography',
									),
								),
							),
						),
						'coupon_code'       => array(
							'type'    => 'text',
							'label'   => __( 'Coupon Code', 'bb-vapor-modules-pro' ),
							'default' => 'XJTXU',
						),
						'coupon_bg_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Coupon Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'coupon_text_color' => array(
							'type'       => 'color',
							'label'      => __( 'Coupon Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'coupon_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Coupon Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'coupon_margin'     => array(
							'type'       => 'dimension',
							'label'      => __( 'Coupon Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'coupon_border'     => array(
							'type'  => 'border',
							'label' => __( 'Coupon Border', 'bb-vapor-modules-pro' ),
						),
						'coupon_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Coupon Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'cta'         => array(
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
		'disclaimer'  => array(
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
										'disclaimer_padding',
									),
								),
							),
						),
						'disclaimer_text'       => array(
							'type'        => 'textarea',
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
						'disclaimer_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Disclaimer Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
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
