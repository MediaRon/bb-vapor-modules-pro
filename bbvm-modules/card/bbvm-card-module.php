<?php // phpcs:ignore
class BBVapor_Card_Module extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Card', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add a card', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/card/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/card/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
FLBuilder::register_settings_form(
	'bbvm_icons',
	array(
		'title' => __( 'Add Icons', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'General', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => '',
						'fields' => array(
							'icon_group' => array(
								'type'  => 'icon',
								'label' => __( 'Select icon', 'bb-vapor-modules-pro' ),
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
	'BBVapor_Card_Module',
	array(
		'general'       => array(
			'title'    => __( 'Photo/Icon', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Card', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'photo_type'            => array(
							'type'    => 'select',
							'label'   => __( 'Card photo type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'  => __( 'None', 'bb-vapor-modules-pro' ),
								'icon'  => __( 'Icon', 'bb-vapor-modules-pro' ),
								'photo' => __( 'Photo', 'bb-vapor-modules-pro' ),
							),
							'default' => 'icon',
							'toggle'  => array(
								'icon'  => array(
									'fields' => array(
										'icon',
										'icon_color',
										'icon_font_size',
										'icon_background',
										'icon_padding',
										'icon_appearance',
										'icon_color_hover',
										'icon_background_hover',
									),
								),
								'photo' => array(
									'fields' => array(
										'photo',
										'photo_size',
										'photo_appearance',
									),
								),
							),
						),
						'icon'                  => array(
							'type'         => 'form',
							'label'        => __( 'Icon', 'bb-vapor-modules-pro' ),
							'form'         => 'bbvm_icons',
							'multiple'     => true,
							'preview_text' => 'icon_group',
						),
						'icon_color'            => array(
							'type'       => 'color',
							'label'      => __( 'Icon Color', 'bb-vapor-modules-pro' ),
							'default'    => '#000000',
							'show_reset' => true,
						),
						'icon_color_hover'      => array(
							'type'       => 'color',
							'label'      => __( 'Icon Color on Hover', 'bb-vapor-modules-pro' ),
							'default'    => '#000000',
							'show_reset' => true,
						),
						'icon_font_size'        => array(
							'type'        => 'unit',
							'label'       => __( 'Icon Font Size', 'bb-vapor-modules-pro' ),
							'default'     => '14',
							'description' => 'px',
						),
						'icon_background'       => array(
							'type'       => 'color',
							'label'      => __( 'Icon Background Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
						),
						'icon_background_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Icon Background Color on Hover', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
						),
						'icon_padding'          => array(
							'type'  => 'dimension',
							'label' => __( 'Icon Padding', 'bb-vapor-modules-pro' ),
						),
						'icon_appearance'       => array(
							'type'    => 'select',
							'label'   => __( 'Select an Icon Appearance', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'    => __( 'None', 'bb-vapor-modules-pro' ),
								'rounded' => __( 'Rounded', 'bb-vapor-modules-pro' ),
							),
						),
						'photo'                 => array(
							'type'  => 'photo',
							'label' => __( 'Select a Photo', 'bb-vapor-modules-pro' ),
						),
						'photo_size'            => array(
							'type'    => 'unit',
							'label'   => __( 'Select a Photo Size (height/width)', 'bb-vapor-modules-pro' ),
							'default' => '200',
						),
						'photo_appearance'      => array(
							'type'    => 'select',
							'label'   => __( 'Select a Photo Appearance', 'bb-vapor-modules-pro' ),
							'options' => array(
								'square'  => __( 'Square', 'bb-vapor-modules-pro' ),
								'rounded' => __( 'Rounded', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
		'content'       => array(
			'title'    => __( 'Content', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'overlay' => array(
					'title'  => __( 'Content', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'display_heading'            => array(
							'type'    => 'select',
							'label'   => __( 'Display a Heading', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'none' => __( 'None', 'bb-vapor-modules-pro' ),
								'yes'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'heading',
										'heading_typography',
										'heading_padding',
									),
								),
							),
						),
						'heading'                    => array(
							'type'  => 'text',
							'label' => __( 'Enter a Heading', 'bb-vapor-modules-pro' ),
						),
						'heading_typography'         => array(
							'type'       => 'typography',
							'label'      => __( 'Enter a Heading Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'heading_padding'            => array(
							'type'       => 'dimension',
							'label'      => __( 'Enter a Heading Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'display_content'            => array(
							'type'    => 'select',
							'label'   => __( 'Display Content', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'none' => __( 'None', 'bb-vapor-modules-pro' ),
								'yes'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'content',
										'content_typography',
										'content_padding',
									),
								),
							),
						),
						'content'                    => array(
							'type'  => 'textarea',
							'label' => __( 'Enter Content', 'bb-vapor-modules-pro' ),
						),
						'content_typography'         => array(
							'type'       => 'typography',
							'label'      => __( 'Enter Content Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'content_padding'            => array(
							'type'       => 'dimension',
							'label'      => __( 'Enter Content Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'display_subheading'         => array(
							'type'    => 'select',
							'label'   => __( 'Display Subheading', 'bb-vapor-modules-pro' ),
							'default' => 'none',
							'options' => array(
								'none' => __( 'None', 'bb-vapor-modules-pro' ),
								'yes'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'subheading',
										'subheading_typography',
										'subheading_padding',
									),
								),
							),
						),
						'subheading'                 => array(
							'type'  => 'text',
							'label' => __( 'Enter Subheading', 'bb-vapor-modules-pro' ),
						),
						'subheading_typography'      => array(
							'type'       => 'typography',
							'label'      => __( 'Enter Subheading Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'subheading_padding'         => array(
							'type'       => 'dimension',
							'label'      => __( 'Enter Subheading Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'display_subheading_text'    => array(
							'type'    => 'select',
							'label'   => __( 'Display Subheading Text', 'bb-vapor-modules-pro' ),
							'default' => 'none',
							'options' => array(
								'none' => __( 'None', 'bb-vapor-modules-pro' ),
								'yes'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'subheading_text',
										'subheading_text_typography',
										'subheading_text_padding',
									),
								),
							),
						),
						'subheading_text'            => array(
							'type'  => 'text',
							'label' => __( 'Enter Subheading Text', 'bb-vapor-modules-pro' ),
						),
						'subheading_text_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Enter Subheading Text Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'subheading_text_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Enter Subheading Text Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'display_readmore_button'    => array(
							'type'    => 'select',
							'label'   => __( 'Display Read More Button', 'bb-vapor-modules-pro' ),
							'default' => 'none',
							'options' => array(
								'none' => __( 'None', 'bb-vapor-modules-pro' ),
								'yes'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'readmore_text',
										'readmore_text_typography',
										'readmore_text_padding',
										'readmore_link',
									),
								),
							),
						),
						'readmore_text'              => array(
							'type'  => 'text',
							'label' => __( 'Enter Read More Text', 'bb-vapor-modules-pro' ),
						),
						'readmore_link'              => array(
							'type'  => 'link',
							'label' => __( 'Enter Read More Link', 'bb-vapor-modules-pro' ),
						),
						'readmore_text_typography'   => array(
							'type'       => 'typography',
							'label'      => __( 'Enter Read More Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'readmore_text_padding'      => array(
							'type'       => 'dimension',
							'label'      => __( 'Enter Read More Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'styles'        => array(
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'overlay' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'padding'                   => array(
							'type'       => 'dimension',
							'label'      => __( 'Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'border'                    => array(
							'type'    => 'unit',
							'label'   => __( 'Border Width', 'bb-vapor-modules-pro' ),
							'default' => '0',
						),
						'border_color'              => array(
							'type'       => 'color',
							'label'      => __( 'Border Color', 'bb-vapor-modules-pro' ),
							'default'    => '#FFFFFF',
							'show_reset' => true,
						),
						'border_color_hover'        => array(
							'type'       => 'color',
							'label'      => __( 'Border Color on Hover', 'bb-vapor-modules-pro' ),
							'default'    => '#FFFFFF',
							'show_reset' => true,
						),
						'border_radius'             => array(
							'type'  => 'dimension',
							'label' => __( 'Button Border Radius', 'bb-vapor-modules-pro' ),
						),
						'text_color'                => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'text_color_hover'          => array(
							'type'       => 'color',
							'label'      => __( 'Text Color on Hover', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'background_type'           => array(
							'type'    => 'select',
							'label'   => __( 'Display a Background Type', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'none'     => __( 'None', 'bb-vapor-modules-pro' ),
								'color'    => __( 'Color', 'bb-vapor-modules-pro' ),
								'gradient' => __( 'Gradient', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'color'    => array(
									'fields' => array(
										'background_color',
										'background_color_hover',
									),
								),
								'gradient' => array(
									'fields' => array(
										'background_gradient',
										'background_gradient_hover',
									),
								),

							),
						),
						'background_color'          => array(
							'type'       => 'color',
							'label'      => __( 'Display a Background Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
						),
						'background_color_hover'    => array(
							'type'       => 'color',
							'label'      => __( 'Display a Background Color on Hover', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
						),
						'background_gradient'       => array(
							'type'       => 'gradient',
							'label'      => __( 'Display a Gradient', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'background_gradient_hover' => array(
							'type'       => 'gradient',
							'label'      => __( 'Display a Gradient on Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'text_shadow'               => array(
							'type'        => 'shadow',
							'label'       => __( 'Text Shadow', 'bb-vapor-modules-pro' ),
							'show_spread' => true,
						),
						'text_shadow_hover'         => array(
							'type'        => 'shadow',
							'label'       => __( 'Text Shadow on Hover', 'bb-vapor-modules-pro' ),
							'show_spread' => true,
						),
					),
				),
			),
		),
		'button_styles' => array(
			'title'    => __( 'Button', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'overlay' => array(
					'title'  => __( 'Button', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button_padding'                => array(
							'type'       => 'dimension',
							'label'      => __( 'Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_margin'                 => array(
							'type'       => 'dimension',
							'label'      => __( 'Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_icon'                   => array(
							'type'  => 'icon',
							'label' => __( 'Icon', 'bb-vapor-modules-pro' ),
						),
						'button_icon_display'           => array(
							'type'    => 'select',
							'label'   => __( 'Icon Position', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'   => __( 'None', 'bb-vapor-modules-pro' ),
								'before' => __( 'Before', 'bb-vapor-modules-pro' ),
								'after'  => __( 'After', 'bb-vapor-modules-pro' ),
							),
							'default' => 'none',
						),
						'button_text_color'             => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'button_text_color_hover'       => array(
							'type'       => 'color',
							'label'      => __( 'Text Color on Hover', 'bb-vapor-modules-pro' ),
							'default'    => '#000000',
							'show_reset' => true,
						),
						'button_background_type'        => array(
							'type'    => 'select',
							'label'   => __( 'Display a Background Type', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'none'     => __( 'None', 'bb-vapor-modules-pro' ),
								'color'    => __( 'Color', 'bb-vapor-modules-pro' ),
								'gradient' => __( 'Gradient', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'color'    => array(
									'fields' => array(
										'button_background_color',
										'button_background_color_hover',
									),
								),
								'gradient' => array(
									'fields' => array(
										'button_color_gradient',
										'button_color_gradient_hover',
									),
								),
							),
						),
						'button_background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Display a Background Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
						),
						'button_background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Display a Background Color on Hover', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
						),
						'button_color_gradient'         => array(
							'type'       => 'gradient',
							'label'      => __( 'Display a Gradient', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'button_color_gradient_hover'   => array(
							'type'       => 'gradient',
							'label'      => __( 'Display a Gradient on Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'button_border'                 => array(
							'type'    => 'unit',
							'label'   => __( 'Button Border Width', 'bb-vapor-modules-pro' ),
							'default' => '0',
						),
						'button_border_color'           => array(
							'type'       => 'color',
							'label'      => __( 'Button Border Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
						),
						'button_border_radius'          => array(
							'type'  => 'dimension',
							'label' => __( 'Button Border Radius', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
