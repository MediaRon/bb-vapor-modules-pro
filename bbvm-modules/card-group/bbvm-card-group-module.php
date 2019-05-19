<?php
class BBVapor_Card_Group_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Card Group', 'mediaron-bb-modules' ),
			'description'     => __( 'Card Group', 'mediaron-bb-modules' ),
			'category'        => __( 'Base', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'bb-vapor-modules-pro' ),
			'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/card-group/',
			'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/card-group',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
FLBuilder::register_settings_form(
	'mrbb_card_group_icons', array(
		'title' => __( 'Add Icons', 'mediaron-bb-modules' ),
		'tabs'  => array(
			'general'      => array(
				'title'         => __('General', 'mediaron-bb-modules'),
				'sections'      => array(
					'general'       => array(
						'title'         => '',
						'fields'        => array(
							'icon_group'         => array(
								'type'          => 'icon',
								'label' => __( 'Select icon', 'mediaron-bb-modules' )

							)
						),
					)
				)
			)
		)
	)
);
FLBuilder::register_settings_form(
	'mrbb_card_group', array(
		'title' => __( 'Add a Card', 'mediaron-bb-modules' ),
		'tabs'  => array(
			'general'       => array( // Tab
				'title'         => __('Photo/Icon', 'mediaron-bb-modules'), // Tab title
				'sections'      => array( // Tab Sections
					'general'       => array( // Section
						'title'         => __('Card', 'mediaron-bb-modules'), // Section Title
						'fields'        => array( // Section Fields
							'photo_type' => array(
								'type'          => 'select',
								'label'         => __('Card photo type', 'mediaron-bb-modules'),
								'options' => array(
									'none' => __( 'None', 'mediaron-bb-modules' ),
									'icon' => __( 'Icon', 'mediaron-bb-modules' ),
									'photo' => __( 'Photo', 'mediaron-bb-modules' )
								),
								'default' => 'icon',
								'toggle' => array(
									'icon' => array( 'fields' => array( 'icon', 'icon_color', 'icon_font_size', 'icon_background', 'icon_padding', 'icon_appearance', 'icon_color_hover', 'icon_background_hover' ) ),
									'photo' => array( 'fields' => array( 'photo', 'photo_size', 'photo_appearance' ) )
								)
							),
							'icon' => array(
								'type'          => 'form',
								'label'         => __('Icon', 'mediaron-bb-modules'),
								'form' => 'mrbb_card_group_icons',
								'multiple'     => true,
								'preview_text'  => 'icon_group'
							),
							'icon_color' => array(
								'type'          => 'color',
								'label'         => __('Icon Color', 'mediaron-bb-modules'),
								'default'       => '#000000',
								'show_reset' => true
							),
							'icon_color_hover' => array(
								'type'          => 'color',
								'label'         => __('Icon Color on Hover', 'mediaron-bb-modules'),
								'default'       => '#000000',
								'show_reset' => true
							),
							'icon_font_size' => array(
								'type'          => 'unit',
								'label'         => __('Icon Font Size', 'mediaron-bb-modules'),
								'default'       => '14',
								'description'   => 'px',
							),
							'icon_background' => array(
								'type'          => 'color',
								'label'         => __('Icon Background Color', 'mediaron-bb-modules'),
								'default'       => '#FFFFFF',
								'show_reset' => true
							),
							'icon_background_hover' => array(
								'type'          => 'color',
								'label'         => __('Icon Background Color on Hover', 'mediaron-bb-modules'),
								'default'       => '#FFFFFF',
								'show_reset' => true
							),
							'icon_padding' => array(
								'type'          => 'dimension',
								'label'         => __('Icon Padding', 'mediaron-bb-modules'),
							),
							'icon_appearance' => array(
								'type' => 'select',
								'label' => __( 'Select an Icon Appearance', 'mediaron-bb-modules' ),
								'options' => array(
									'none' => __( 'None', 'mediaron-bb-modules' ),
									'rounded' => __( 'Rounded', 'mediaron-bb-modules' )
								)
							),
							'photo' => array(
								'type' => 'photo',
								'label' => __( 'Select a Photo', 'mediaron-bb-modules' )
							),
							'photo_size' => array(
								'type' => 'unit',
								'label' => __( 'Select a Photo Size (height/width)', 'mediaron-bb-modules' ),
								'default' => '200'
							),
							'photo_appearance' => array(
								'type' => 'select',
								'label' => __( 'Select a Photo Appearance', 'mediaron-bb-modules' ),
								'options' => array(
									'square' => __( 'Square', 'mediaron-bb-modules' ),
									'rounded' => __( 'Rounded', 'mediaron-bb-modules' )
								)
							)
						)
					)
				)
			),
			'content'       => array( // Tab
				'title'         => __('Content', 'mediaron-bb-modules'), // Tab title
				'sections'      => array( // Tab Sections
					'overlay'       => array( // Section
						'title'         => __('Content', 'mediaron-bb-modules'), // Section Title
						'fields'        => array( // Section Fields
							'display_heading' => array(
								'type'          => 'select',
								'label'         => __( 'Display a Heading', 'mediaron-bb-modules' ),
								'default'       => 'yes',
								'options'       => array(
									'none'       => __( 'None', 'mediaron-bb-modules' ),
									'yes' => __( 'Yes', 'mediaron-bb-modules' ),
								),
								'toggle' => array(
									'yes' => array(
										'fields'     => array( 'heading', 'heading_typography', 'heading_padding' ),
									)
								)
							),
							'heading' => array(
								'type'  => 'text',
								'label' => __( 'Enter a Heading', 'mediaron-bb-modules' ),
							),
							'heading_typography' => array(
								'type'  => 'typography',
								'label' => __( 'Enter a Heading Typography', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'heading_padding' => array(
								'type'  => 'dimension',
								'label' => __( 'Enter a Heading Padding', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'display_content' => array(
								'type'          => 'select',
								'label'         => __( 'Display Content', 'mediaron-bb-modules' ),
								'default'       => 'yes',
								'options'       => array(
									'none'       => __( 'None', 'mediaron-bb-modules' ),
									'yes' => __( 'Yes', 'mediaron-bb-modules' ),
								),
								'toggle' => array(
									'yes' => array(
										'fields'     => array( 'content', 'content_typography', 'content_padding' ),
									)
								)
							),
							'content' => array(
								'type'  => 'textarea',
								'label' => __( 'Enter Content', 'mediaron-bb-modules' ),
							),
							'content_typography' => array(
								'type'  => 'typography',
								'label' => __( 'Enter Content Typography', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'content_padding' => array(
								'type'  => 'dimension',
								'label' => __( 'Enter Content Padding', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'display_subheading' => array(
								'type'          => 'select',
								'label'         => __( 'Display Subheading', 'mediaron-bb-modules' ),
								'default'       => 'none',
								'options'       => array(
									'none'       => __( 'None', 'mediaron-bb-modules' ),
									'yes' => __( 'Yes', 'mediaron-bb-modules' ),
								),
								'toggle' => array(
									'yes' => array(
										'fields'     => array( 'subheading', 'subheading_typography', 'subheading_padding' ),
									)
								)
							),
							'subheading' => array(
								'type'  => 'text',
								'label' => __( 'Enter Subheading', 'mediaron-bb-modules' ),
							),
							'subheading_typography' => array(
								'type'  => 'typography',
								'label' => __( 'Enter Subheading Typography', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'subheading_padding' => array(
								'type'  => 'dimension',
								'label' => __( 'Enter Subheading Padding', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'display_subheading_text' => array(
								'type'          => 'select',
								'label'         => __( 'Display Subheading Text', 'mediaron-bb-modules' ),
								'default'       => 'none',
								'options'       => array(
									'none'       => __( 'None', 'mediaron-bb-modules' ),
									'yes' => __( 'Yes', 'mediaron-bb-modules' ),
								),
								'toggle' => array(
									'yes' => array(
										'fields'     => array( 'subheading_text', 'subheading_text_typography', 'subheading_text_padding' ),
									)
								)
							),
							'subheading_text' => array(
								'type'  => 'text',
								'label' => __( 'Enter Subheading Text', 'mediaron-bb-modules' ),
							),
							'subheading_text_typography' => array(
								'type'  => 'typography',
								'label' => __( 'Enter Subheading Text Typography', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'subheading_text_padding' => array(
								'type'  => 'dimension',
								'label' => __( 'Enter Subheading Text Padding', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'display_readmore_button' => array(
								'type'          => 'select',
								'label'         => __( 'Display Read More Button', 'mediaron-bb-modules' ),
								'default'       => 'none',
								'options'       => array(
									'none'       => __( 'None', 'mediaron-bb-modules' ),
									'yes' => __( 'Yes', 'mediaron-bb-modules' ),
								),
								'toggle' => array(
									'yes' => array(
										'fields'     => array( 'readmore_text', 'readmore_text_typography', 'readmore_text_padding', 'readmore_link' ),
									)
								)
							),
							'readmore_text' => array(
								'type'  => 'text',
								'label' => __( 'Enter Read More Text', 'mediaron-bb-modules' ),
							),
							'readmore_link' => array(
								'type'  => 'link',
								'label' => __( 'Enter Read More Link', 'mediaron-bb-modules' ),
							),
							'readmore_text_typography' => array(
								'type'  => 'typography',
								'label' => __( 'Enter Read More Typography', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'readmore_text_padding' => array(
								'type'  => 'dimension',
								'label' => __( 'Enter Read More Padding', 'mediaron-bb-modules' ),
								'responsive' => true
							),
						)
					)
				)
			),
			'styles'       => array( // Tab
				'title'         => __('Styles', 'mediaron-bb-modules'), // Tab title
				'sections'      => array( // Tab Sections
					'overlay'       => array( // Section
						'title'         => __('Styles', 'mediaron-bb-modules'), // Section Title
						'fields'        => array( // Section Fields
							'padding' => array(
								'type'  => 'dimension',
								'label' => __( 'Padding', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'border' => array(
								'type'          => 'unit',
								'label'         => __( 'Border Width', 'mediaron-bb-modules' ),
								'default' => '0',
							),
							'border_color' => array(
								'type'          => 'color',
								'label'         => __( 'Border Color', 'mediaron-bb-modules' ),
								'default' => '#FFFFFF',
								'show_reset' => true
							),
							'border_color_hover' => array(
								'type'          => 'color',
								'label'         => __( 'Border Color on Hover', 'mediaron-bb-modules' ),
								'default' => '#FFFFFF',
								'show_reset' => true
							),
							'border_radius' => array(
								'type'          => 'dimension',
								'label'         => __( 'Button Border Radius', 'mediaron-bb-modules' ),
							),
							'text_color' => array(
								'type'          => 'color',
								'label'         => __( 'Text Color', 'mediaron-bb-modules' ),
								'default' => '#000000',
								'show_reset' => true
							),
							'text_color_hover' => array(
								'type'          => 'color',
								'label'         => __( 'Text Color on Hover', 'mediaron-bb-modules' ),
								'default' => '#000000',
								'show_reset' => true
							),
							'background_type' => array(
								'type'          => 'select',
								'label'         => __( 'Display a Background Type', 'mediaron-bb-modules' ),
								'default'       => 'yes',
								'options'       => array(
									'none'       => __( 'None', 'mediaron-bb-modules' ),
									'color' => __( 'Color', 'mediaron-bb-modules' ),
									'gradient' => __( 'Gradient', 'mediaron-bb-modules' ),
								),
								'toggle' => array(
									'color' => array(
										'fields'     => array( 'background_color', 'background_color_hover' ),
									),
									'gradient' => array(
										'fields'     => array( 'background_gradient', 'background_gradient_hover' ),
									)

								)
							),
							'background_color' => array(
								'type'          => 'color',
								'label'         => __( 'Display a Background Color', 'mediaron-bb-modules' ),
								'default' => '#FFFFFF',
								'show_reset'         => true
							),
							'background_color_hover' => array(
								'type'          => 'color',
								'label'         => __( 'Display a Background Color on Hover', 'mediaron-bb-modules' ),
								'default' => '#FFFFFF',
								'show_reset'         => true
							),
							'background_gradient' => array(
								'type'          => 'gradient',
								'label'         => __( 'Display a Gradient', 'mediaron-bb-modules' ),
								'show_reset'         => true
							),
							'background_gradient_hover' => array(
								'type'          => 'gradient',
								'label'         => __( 'Display a Gradient on Hover', 'mediaron-bb-modules' ),
								'show_reset'         => true
							),
							'text_shadow' => array(
								'type' => 'shadow',
								'label' => __( 'Text Shadow', 'mediaron-bb-modules' ),
								'show_spread' => true,
							),
							'text_shadow_hover' => array(
								'type' => 'shadow',
								'label' => __( 'Text Shadow on Hover', 'mediaron-bb-modules' ),
								'show_spread' => true,
							)
						)
					)
				)
			),
			'button_styles'       => array( // Tab
				'title'         => __('Button', 'mediaron-bb-modules'), // Tab title
				'sections'      => array( // Tab Sections
					'overlay'       => array( // Section
						'title'         => __('Button', 'mediaron-bb-modules'), // Section Title
						'fields'        => array( // Section Fields
							'button_padding' => array(
								'type'  => 'dimension',
								'label' => __( 'Padding', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'button_margin' => array(
								'type'  => 'dimension',
								'label' => __( 'Margin', 'mediaron-bb-modules' ),
								'responsive' => true
							),
							'button_icon' => array(
								'type'  => 'icon',
								'label' => __( 'Icon', 'mediaron-bb-modules' ),
							),
							'button_icon_display' => array(
								'type'  => 'select',
								'label' => __( 'Icon Position', 'mediaron-bb-modules' ),
								'options' => array(
									'none' => __( 'None', 'mediaron-bb-modules' ),
									'before' => __( 'Before', 'mediaron-bb-modules' ),
									'after' => __( 'After', 'bb-vapor-modules-pro' )
								),
								'default' => 'none'
							),
							'button_text_color' => array(
								'type'          => 'color',
								'label'         => __( 'Text Color', 'mediaron-bb-modules' ),
								'default' => '#000000',
								'show_reset' => true
							),
							'button_text_color_hover' => array(
								'type'          => 'color',
								'label'         => __( 'Text Color on Hover', 'mediaron-bb-modules' ),
								'default' => '#000000',
								'show_reset' => true
							),
							'button_background_type' => array(
								'type'          => 'select',
								'label'         => __( 'Display a Background Type', 'mediaron-bb-modules' ),
								'default'       => 'yes',
								'options'       => array(
									'none'       => __( 'None', 'mediaron-bb-modules' ),
									'color' => __( 'Color', 'mediaron-bb-modules' ),
									'gradient' => __( 'Gradient', 'mediaron-bb-modules' ),
								),
								'toggle' => array(
									'color' => array(
										'fields'     => array( 'button_background_color', 'button_background_color_hover' ),
									),
									'gradient' => array(
										'fields'     => array( 'button_color_gradient', 'button_color_gradient_hover' ),
									)

								)
							),
							'button_background_color' => array(
								'type'          => 'color',
								'label'         => __( 'Display a Background Color', 'mediaron-bb-modules' ),
								'default' => '#FFFFFF',
								'show_reset'         => true
							),
							'button_background_color_hover' => array(
								'type'          => 'color',
								'label'         => __( 'Display a Background Color on Hover', 'mediaron-bb-modules' ),
								'default' => '#FFFFFF',
								'show_reset'         => true
							),
							'button_color_gradient' => array(
								'type'          => 'gradient',
								'label'         => __( 'Display a Gradient', 'mediaron-bb-modules' ),
								'show_reset'         => true
							),
							'button_color_gradient_hover' => array(
								'type'          => 'gradient',
								'label'         => __( 'Display a Gradient on Hover', 'mediaron-bb-modules' ),
								'show_reset'         => true
							),
							'button_border' => array(
								'type'          => 'unit',
								'label'         => __( 'Button Border Width', 'mediaron-bb-modules' ),
								'default' => '0',
							),
							'button_border_color' => array(
								'type'          => 'color',
								'label'         => __( 'Button Border Color', 'mediaron-bb-modules' ),
								'default' => '#FFFFFF',
								'show_reset' => true
							),
							'button_border_radius' => array(
								'type'          => 'dimension',
								'label'         => __( 'Button Border Radius', 'mediaron-bb-modules' ),
							),
						)
					)
				)
			)
		)
	)
);
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Card_Group_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Card', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'card' => array(
						'type'          => 'form',
						'label'         => __('Card', 'mediaron-bb-modules'),
						'form' => 'mrbb_card_group',
						'multiple'     => true,
						'preview_text'  => 'heading'
					),
					'columns' => array(
						'type' => 'select',
						'label' => __( 'Maximum Number of Columns', 'mediaron-bb-modules' ),
						'options' => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
							'4' => '4',
							'5' => '5',
							'6' => '6',
						),
						'default' => '3',
					),
					'card_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Card Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					)
				)
			)
		)
	),
) );