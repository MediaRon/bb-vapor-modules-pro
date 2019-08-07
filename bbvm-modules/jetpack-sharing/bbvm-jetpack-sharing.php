<?php // phpcs:ignore
class BBVapor_Jetpack_Sharing_Module extends FLBuilderModule {
	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Jetpack Sharing Icons', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Jetpack Sharing Icons for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'External Plugins', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/jetpack-sharing/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/jetpack-sharing/',
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
	'BBVapor_Jetpack_Sharing_Module',
	array(
		'general'       => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Jetpack Sharing Icons', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'show_headline'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Sharing Headline', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array(
									'tabs' => array(
										'headline',
									),
								),
							),
						),
						'load_css'        => array(
							'type'    => 'select',
							'label'   => __( 'Load CSS', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
							'help'    => __( 'Enable if you have one sharing option per page, otherwise leave off.', 'bb-vapor-modules-pro' ),
						),
						'sharing_display' => array(
							'type'    => 'select',
							'label'   => __( 'Button Style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'icon'      => __( 'Icons Only', 'bb-vapor-modules-pro' ),
								'icon-text' => __( 'Icon + Text', 'bb-vapor-modules-pro' ),
								'text'      => __( 'Text Only', 'bb-vapor-modules-pro' ),
								'official'  => __( 'Official Buttons', 'bb-vapor-modules-pro' ),
							),
							'default' => 'icon-text',
							'toggle'  => array(
								'icon-text' => array(
									'tabs'     => array(
										'button_text',
										'button_styles',
									),
									'sections' => array(
										'icon_styles',
									),
								),
								'text'      => array(
									'tabs' => array(
										'button_text',
										'button_styles',
									),
								),
							),
							'help'    => __( 'You may need to save and refresh to see the official buttons if that option is selected.', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'headline'      => array(
			'title'    => __( 'Headline', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'headline' => array(
					'title'  => __( 'Headline', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'sharing_headline'                 => array(
							'type'    => 'text',
							'label'   => __( 'Sharing Headline', 'bb-vapor-modules-pro' ),
							'default' => __( 'Share this:', 'bb-vapor-modules-pro' ),
						),
						'sharing_headline_color'           => array(
							'type'       => 'color',
							'label'      => __( 'Sharing Headline Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'sharing_headline_typography'      => array(
							'type'  => 'typography',
							'label' => __( 'Sharing Headline Typography', 'bb-vapor-modules-pro' ),
						),
						'sharing_headline_padding'         => array(
							'type'       => 'dimension',
							'label'      => __( 'Sharing Headline Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'sharing_headline_margin'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Sharing Headline Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'sharing_headline_show_top_border' => array(
							'type'    => 'select',
							'label'   => __( 'Show Top Border', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'sharing_headline_display'         => array(
							'type'    => 'select',
							'label'   => __( 'Display', 'bb-vapor-modules-pro' ),
							'options' => array(
								'inline' => __( 'Inline Block', 'bb-vapor-modules-pro' ),
								'block'  => __( 'Block', 'bb-vapor-modules-pro' ),
							),
							'default' => 'inline',
							'toggle'  => array( 'block' => array( 'fields' => array( 'sharing_headline_align' ) ) ),
							'help'    => __( 'Displaying as a block allows you to align the headline text.', 'bb-vapor-modules-pro' ),
						),
						'sharing_headline_align'           => array(
							'type'    => 'align',
							'label'   => __( 'Align', 'bb-vapor-modules-pro' ),
							'default' => 'left',
						),
					),
				),
			),
		),
		'button_text'   => array(
			'title'    => __( 'Button Text', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'button_text' => array(
					'title'  => __( 'Button Text', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'twitter'   => array(
							'type'    => 'text',
							'label'   => __( 'Twitter', 'bb-vapor-modules-pro' ),
							'default' => __( 'Twitter', 'bb-vapor-modules-pro' ),
						),
						'facebook'  => array(
							'type'    => 'text',
							'label'   => __( 'Facebook', 'bb-vapor-modules-pro' ),
							'default' => __( 'Facebook', 'bb-vapor-modules-pro' ),
						),
						'whatsapp'  => array(
							'type'    => 'text',
							'label'   => __( 'WhatsApp', 'bb-vapor-modules-pro' ),
							'default' => __( 'WhatsApp', 'bb-vapor-modules-pro' ),
						),
						'pocket'    => array(
							'type'    => 'text',
							'label'   => __( 'Pocket', 'bb-vapor-modules-pro' ),
							'default' => __( 'Pocket', 'bb-vapor-modules-pro' ),
						),
						'print'     => array(
							'type'    => 'text',
							'label'   => __( 'Print', 'bb-vapor-modules-pro' ),
							'default' => __( 'Print', 'bb-vapor-modules-pro' ),
						),
						'reddit'    => array(
							'type'    => 'text',
							'label'   => __( 'Reddit', 'bb-vapor-modules-pro' ),
							'default' => __( 'Reddit', 'bb-vapor-modules-pro' ),
						),
						'linkedin'  => array(
							'type'    => 'text',
							'label'   => __( 'LinkedIn', 'bb-vapor-modules-pro' ),
							'default' => __( 'LinkedIn', 'bb-vapor-modules-pro' ),
						),
						'telegram'  => array(
							'type'    => 'text',
							'label'   => __( 'Telegram', 'bb-vapor-modules-pro' ),
							'default' => __( 'Telegram', 'bb-vapor-modules-pro' ),
						),
						'skype'     => array(
							'type'    => 'text',
							'label'   => __( 'Skype', 'bb-vapor-modules-pro' ),
							'default' => __( 'Skype', 'bb-vapor-modules-pro' ),
						),
						'tumblr'    => array(
							'type'    => 'text',
							'label'   => __( 'Tumblr', 'bb-vapor-modules-pro' ),
							'default' => __( 'Tumblr', 'bb-vapor-modules-pro' ),
						),
						'pinterest' => array(
							'type'    => 'text',
							'label'   => __( 'Pinterest', 'bb-vapor-modules-pro' ),
							'default' => __( 'Pinterest', 'bb-vapor-modules-pro' ),
						),
						'email'     => array(
							'type'    => 'text',
							'label'   => __( 'Email', 'bb-vapor-modules-pro' ),
							'default' => __( 'Email', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'button_styles' => array(
			'title'    => __( 'Button Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'icon_styles'   => array(
					'title'  => __( 'Icon Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'icon_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Icon Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'icon_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Icon Color on Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'icon_size'        => array(
							'type'        => 'unit',
							'label'       => __( 'Icon Size', 'bb-vapor-modules-pro' ),
							'default'     => '18',
							'description' => 'px',
							'responsive'  => true,
						),
					),
				),
				'button_styles' => array(
					'title'  => __( 'Button Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button_typography'                => array(
							'type'       => 'typography',
							'label'      => __( 'Button Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_text_color'                => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'button_text_color_hover'          => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Color on Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'button_maybe_gradient'            => array(
							'type'    => 'select',
							'label'   => __( 'Button Background Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'color'    => __( 'Color', 'bb-vapor-modules-pro' ),
								'gradient' => __( 'Gradient', 'bb-vapor-modules-pro' ),
							),
							'default' => 'color',
							'toggle'  => array(
								'color'    => array(
									'fields' => array(
										'button_background_color',
										'button_background_color_hover',
									),
								),
								'gradient' => array( 'fields' => array( 'button_background_gradient', 'button_background_gradient_hover' ) ),
							),
						),
						'button_background_color'          => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'button_background_color_hover'    => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Color on Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'button_background_gradient'       => array(
							'type'  => 'gradient',
							'label' => __( 'Button Background Gradient', 'bb-vapor-modules-pro' ),
						),
						'button_background_gradient_hover' => array(
							'type'  => 'gradient',
							'label' => __( 'Button Background Gradient on Hover', 'bb-vapor-modules-pro' ),
						),
						'button_border'                    => array(
							'type'       => 'border',
							'label'      => __( 'Button Border', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_padding'                   => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_margin'                    => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
				'button_layout' => array(
					'title'  => __( 'Button Layout', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button_layout_type' => array(
							'type'    => 'select',
							'label'   => __( 'Button Layout Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'flex'   => __( 'Flex Layout', 'bb-vapor-modules-pro' ),
								'block'  => __( 'Block Layout', 'bb-vapor-modules-pro' ),
								'inline' => __( 'Inline Layout', 'bb-vapor-modules-pro' ),
							),
							'default' => 'inline',
							'toggle'  => array(
								'flex'  => array(
									'fields' => array(
										'flex_columns',
										'flex_layout_align',
									),
								),
								'block' => array(
									'fields' => array(
										'block_width',
										'block_align',
									),
								),
							),
						),
						'flex_columns'       => array(
							'type'    => 'select',
							'label'   => __( 'Number of Columns', 'bb-vapor-modules-pro' ),
							'options' => array(
								'1' => '1',
								'2' => '2',
								'3' => '3',
								'4' => '4',
								'5' => '5',
								'6' => '6',
							),
							'default' => '6',
							'help'    => __( 'Columns work best if there is no margin on the buttons.', 'bb-vapor-modules-pro' ),
						),
						'flex_layout_align'  => array(
							'type'    => 'align',
							'label'   => __( 'Align Button Text', 'bb-vapor-modules-pro' ),
							'values'  => array(
								'left'   => 'flex-start',
								'center' => 'center',
								'right'  => 'flex-end',
							),
							'default' => 'flex-start',
						),
						'block_width'        => array(
							'type'        => 'unit',
							'label'       => __( 'Block Width', 'bb-vapor-modules-pro' ),
							'description' => '%',
							'default'     => '100',
							'responsive'  => true,
						),
						'block_align'        => array(
							'type'    => 'align',
							'label'   => __( 'Block Align', 'bb-vapor-modules-pro' ),
							'values'  => array(
								'left'   => '5px auto 5px 0',
								'center' => '5px auto',
								'right'  => '5px 0 5px auto',
							),
							'default' => 'left',
						),
						'block_text_align'   => array(
							'type'    => 'align',
							'label'   => __( 'Block Text Align', 'bb-vapor-modules-pro' ),
							'values'  => array(
								'left'   => 'flex-start',
								'center' => 'center',
								'right'  => 'flex-end',
							),
							'default' => 'flex-start',
						),
					),
				),
			),
		),
	)
);
