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
		'general'   => array(
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
						'select_countdown'  => array(
							'type'    => 'select',
							'label'   => __( 'Show a Countdown?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
							'toggle'  => array(
								'yes' => array(
									'tabs' => array(
										'countdown',
									),
								),
							),
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
						'sales_text'       => array(
							'type'        => 'text',
							'label'       => __( 'Sales Text', 'bb-vapor-modules-pro' ),
							'description' => __( 'Enter {bbvm_simple_coupon} into the text area below', 'bb-vapor-modules-pro' ),
						),
						'sales_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Sales Text Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'sales_text_color' => array(
							'type'       => 'color',
							'label'      => __( 'Sales Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
					),
				),
				'boxoptions' => array(
					'title'  => __( 'Coupon Box Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
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
		'countdown' => array(
			'title'    => __( 'Countdown', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Countdown', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'coupon_expires' => array(
							'type'  => 'date',
							'label' => __( 'Select an Expiration Date', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'cta'       => array(
			'title'    => __( 'Call to Action', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Call to Action', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'show_cta'                      => array(
							'type'    => 'select',
							'label'   => __( 'Show an Call to Action Button?', 'bb-vapor-modules-pro' ),
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
					),
				),
			),
		),
	)
);
