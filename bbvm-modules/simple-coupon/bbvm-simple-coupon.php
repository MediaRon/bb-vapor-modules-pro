<?php //phpcs:ignore
class BBVapor_Simple_Coupon extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Simple Coupon', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Simple Coupon', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/simple-coupon/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/simple-coupon/',
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
	'BBVapor_Simple_Coupon',
	array(
		'general'    => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general'    => array(
					'title'  => __( 'General', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'coupon_code'       => array(
							'type'        => 'text',
							'label'       => __( 'Coupon Code', 'bb-vapor-modules-pro' ),
							'description' => __( 'Enter {bbvm_simple_coupon} into the text area below', 'bb-vapor-modules-pro' ),
						),
						'coupon_bg_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Coupon Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'coupon_text_color' => array(
							'type'       => 'color',
							'label'      => __( 'Coupon Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
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
				'sales'      => array(
					'title'  => __( 'Sales Text', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'sales_text'         => array(
							'type'  => 'text',
							'label' => __( 'Sales Headline', 'bb-vapor-modules-pro' ),
						),
						'sales_typography'   => array(
							'type'       => 'typography',
							'label'      => __( 'Sales Headline Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'sales_text_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Sales Headline Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'sales_text_margin'  => array(
							'type'       => 'dimension',
							'label'      => __( 'Sales Headline Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'sales_text_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Sales Headline Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
				'boxoptions' => array(
					'title'  => __( 'Coupon Box Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'box_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Coupon Box Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'box_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Coupon Box Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'box_border'           => array(
							'type'  => 'border',
							'label' => __( 'Coupon Box Border', 'bb-vapor-modules-pro' ),
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
