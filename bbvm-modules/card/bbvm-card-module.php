<?php
class BBVapor_Card_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Card', 'bb-vapor-modules' ),
			'description'     => __( 'Add a card', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/card/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/card/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
FLBuilder::register_settings_form(
	'bbvm_icons', array(
		'title' => __( 'Add Icons', 'bb-vapor-modules' ),
		'tabs'  => array(
			'general'      => array(
				'title'         => __('General', 'bb-vapor-modules'),
				'sections'      => array(
					'general'       => array(
						'title'         => '',
						'fields'        => array(
							'icon_group'         => array(
								'type'          => 'icon',
								'label' => __( 'Select icon', 'bb-vapor-modules' )

							)
						),
					)
				)
			)
		)
	)
);
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Card_Module', array(
	'general'       => array( // Tab
		'title'         => __('Photo/Icon', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Card', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'photo_type' => array(
						'type'          => 'select',
						'label'         => __('Card photo type', 'bb-vapor-modules'),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'icon' => __( 'Icon', 'bb-vapor-modules' ),
							'photo' => __( 'Photo', 'bb-vapor-modules' )
						),
						'default' => 'icon',
						'toggle' => array(
							'icon' => array( 'fields' => array( 'icon', 'icon_color', 'icon_font_size', 'icon_background', 'icon_padding', 'icon_appearance', 'icon_color_hover', 'icon_background_hover' ) ),
							'photo' => array( 'fields' => array( 'photo', 'photo_size', 'photo_appearance' ) )
						)
					),
					'icon' => array(
						'type'          => 'form',
						'label'         => __('Icon', 'bb-vapor-modules'),
						'form' => 'bbvm_icons',
						'multiple'     => true,
						'preview_text'  => 'icon_group'
					),
					'icon_color' => array(
						'type'          => 'color',
						'label'         => __('Icon Color', 'bb-vapor-modules'),
						'default'       => '#000000',
						'show_reset' => true
					),
					'icon_color_hover' => array(
						'type'          => 'color',
						'label'         => __('Icon Color on Hover', 'bb-vapor-modules'),
						'default'       => '#000000',
						'show_reset' => true
					),
					'icon_font_size' => array(
						'type'          => 'unit',
						'label'         => __('Icon Font Size', 'bb-vapor-modules'),
						'default'       => '14',
						'description'   => 'px',
					),
					'icon_background' => array(
						'type'          => 'color',
						'label'         => __('Icon Background Color', 'bb-vapor-modules'),
						'default'       => '#FFFFFF',
						'show_reset' => true
					),
					'icon_background_hover' => array(
						'type'          => 'color',
						'label'         => __('Icon Background Color on Hover', 'bb-vapor-modules'),
						'default'       => '#FFFFFF',
						'show_reset' => true
					),
					'icon_padding' => array(
						'type'          => 'dimension',
						'label'         => __('Icon Padding', 'bb-vapor-modules'),
					),
					'icon_appearance' => array(
						'type' => 'select',
						'label' => __( 'Select an Icon Appearance', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'rounded' => __( 'Rounded', 'bb-vapor-modules' )
						)
					),
					'photo' => array(
						'type' => 'photo',
						'label' => __( 'Select a Photo', 'bb-vapor-modules' )
					),
					'photo_size' => array(
						'type' => 'unit',
						'label' => __( 'Select a Photo Size (height/width)', 'bb-vapor-modules' ),
						'default' => '200'
					),
					'photo_appearance' => array(
						'type' => 'select',
						'label' => __( 'Select a Photo Appearance', 'bb-vapor-modules' ),
						'options' => array(
							'square' => __( 'Square', 'bb-vapor-modules' ),
							'rounded' => __( 'Rounded', 'bb-vapor-modules' )
						)
					)
				)
			)
		)
	),
	'content'       => array( // Tab
		'title'         => __('Content', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'overlay'       => array( // Section
				'title'         => __('Content', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'display_heading' => array(
						'type'          => 'select',
						'label'         => __( 'Display a Heading', 'bb-vapor-modules' ),
						'default'       => 'yes',
						'options'       => array(
							'none'       => __( 'None', 'bb-vapor-modules' ),
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
						),
						'toggle' => array(
							'yes' => array(
								'fields'     => array( 'heading', 'heading_typography', 'heading_padding' ),
							)
						)
					),
					'heading' => array(
						'type'  => 'text',
						'label' => __( 'Enter a Heading', 'bb-vapor-modules' ),
					),
					'heading_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Enter a Heading Typography', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'heading_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Enter a Heading Padding', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'display_content' => array(
						'type'          => 'select',
						'label'         => __( 'Display Content', 'bb-vapor-modules' ),
						'default'       => 'yes',
						'options'       => array(
							'none'       => __( 'None', 'bb-vapor-modules' ),
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
						),
						'toggle' => array(
							'yes' => array(
								'fields'     => array( 'content', 'content_typography', 'content_padding' ),
							)
						)
					),
					'content' => array(
						'type'  => 'textarea',
						'label' => __( 'Enter Content', 'bb-vapor-modules' ),
					),
					'content_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Enter Content Typography', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'content_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Enter Content Padding', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'display_subheading' => array(
						'type'          => 'select',
						'label'         => __( 'Display Subheading', 'bb-vapor-modules' ),
						'default'       => 'none',
						'options'       => array(
							'none'       => __( 'None', 'bb-vapor-modules' ),
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
						),
						'toggle' => array(
							'yes' => array(
								'fields'     => array( 'subheading', 'subheading_typography', 'subheading_padding' ),
							)
						)
					),
					'subheading' => array(
						'type'  => 'text',
						'label' => __( 'Enter Subheading', 'bb-vapor-modules' ),
					),
					'subheading_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Enter Subheading Typography', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'subheading_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Enter Subheading Padding', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'display_subheading_text' => array(
						'type'          => 'select',
						'label'         => __( 'Display Subheading Text', 'bb-vapor-modules' ),
						'default'       => 'none',
						'options'       => array(
							'none'       => __( 'None', 'bb-vapor-modules' ),
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
						),
						'toggle' => array(
							'yes' => array(
								'fields'     => array( 'subheading_text', 'subheading_text_typography', 'subheading_text_padding' ),
							)
						)
					),
					'subheading_text' => array(
						'type'  => 'text',
						'label' => __( 'Enter Subheading Text', 'bb-vapor-modules' ),
					),
					'subheading_text_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Enter Subheading Text Typography', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'subheading_text_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Enter Subheading Text Padding', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'display_readmore_button' => array(
						'type'          => 'select',
						'label'         => __( 'Display Read More Button', 'bb-vapor-modules' ),
						'default'       => 'none',
						'options'       => array(
							'none'       => __( 'None', 'bb-vapor-modules' ),
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
						),
						'toggle' => array(
							'yes' => array(
								'fields'     => array( 'readmore_text', 'readmore_text_typography', 'readmore_text_padding', 'readmore_link' ),
							)
						)
					),
					'readmore_text' => array(
						'type'  => 'text',
						'label' => __( 'Enter Read More Text', 'bb-vapor-modules' ),
					),
					'readmore_link' => array(
						'type'  => 'link',
						'label' => __( 'Enter Read More Link', 'bb-vapor-modules' ),
					),
					'readmore_text_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Enter Read More Typography', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'readmore_text_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Enter Read More Padding', 'bb-vapor-modules' ),
						'responsive' => true
					),
				)
			)
		)
	),
	'styles'       => array( // Tab
		'title'         => __('Styles', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'overlay'       => array( // Section
				'title'         => __('Styles', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Padding', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'border' => array(
						'type'          => 'unit',
						'label'         => __( 'Border Width', 'bb-vapor-modules' ),
						'default' => '0',
					),
					'border_color' => array(
						'type'          => 'color',
						'label'         => __( 'Border Color', 'bb-vapor-modules' ),
						'default' => '#FFFFFF',
						'show_reset' => true
					),
					'border_color_hover' => array(
						'type'          => 'color',
						'label'         => __( 'Border Color on Hover', 'bb-vapor-modules' ),
						'default' => '#FFFFFF',
						'show_reset' => true
					),
					'border_radius' => array(
						'type'          => 'dimension',
						'label'         => __( 'Button Border Radius', 'bb-vapor-modules' ),
					),
					'text_color' => array(
						'type'          => 'color',
						'label'         => __( 'Text Color', 'bb-vapor-modules' ),
						'default' => '#000000',
						'show_reset' => true
					),
					'text_color_hover' => array(
						'type'          => 'color',
						'label'         => __( 'Text Color on Hover', 'bb-vapor-modules' ),
						'default' => '#000000',
						'show_reset' => true
					),
					'background_type' => array(
						'type'          => 'select',
						'label'         => __( 'Display a Background Type', 'bb-vapor-modules' ),
						'default'       => 'yes',
						'options'       => array(
							'none'       => __( 'None', 'bb-vapor-modules' ),
							'color' => __( 'Color', 'bb-vapor-modules' ),
							'gradient' => __( 'Gradient', 'bb-vapor-modules' ),
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
						'label'         => __( 'Display a Background Color', 'bb-vapor-modules' ),
						'default' => '#FFFFFF',
						'show_reset'         => true
					),
					'background_color_hover' => array(
						'type'          => 'color',
						'label'         => __( 'Display a Background Color on Hover', 'bb-vapor-modules' ),
						'default' => '#FFFFFF',
						'show_reset'         => true
					),
					'background_gradient' => array(
						'type'          => 'gradient',
						'label'         => __( 'Display a Gradient', 'bb-vapor-modules' ),
						'show_reset'         => true
					),
					'background_gradient_hover' => array(
						'type'          => 'gradient',
						'label'         => __( 'Display a Gradient on Hover', 'bb-vapor-modules' ),
						'show_reset'         => true
					),
					'text_shadow' => array(
						'type' => 'shadow',
						'label' => __( 'Text Shadow', 'bb-vapor-modules' ),
						'show_spread' => true,
					),
					'text_shadow_hover' => array(
						'type' => 'shadow',
						'label' => __( 'Text Shadow on Hover', 'bb-vapor-modules' ),
						'show_spread' => true,
					)
				)
			)
		)
	),
	'button_styles'       => array( // Tab
		'title'         => __('Button', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'overlay'       => array( // Section
				'title'         => __('Button', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'button_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Padding', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'button_margin' => array(
						'type'  => 'dimension',
						'label' => __( 'Margin', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'button_icon' => array(
						'type'  => 'icon',
						'label' => __( 'Icon', 'bb-vapor-modules' ),
					),
					'button_icon_display' => array(
						'type'  => 'select',
						'label' => __( 'Icon Position', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'before' => __( 'Before', 'bb-vapor-modules' ),
							'after' => __( 'After', 'mediarion-bb-modules' )
						),
						'default' => 'none'
					),
					'button_text_color' => array(
						'type'          => 'color',
						'label'         => __( 'Text Color', 'bb-vapor-modules' ),
						'default' => '#000000',
						'show_reset' => true
					),
					'button_text_color_hover' => array(
						'type'          => 'color',
						'label'         => __( 'Text Color on Hover', 'bb-vapor-modules' ),
						'default' => '#000000',
						'show_reset' => true
					),
					'button_background_type' => array(
						'type'          => 'select',
						'label'         => __( 'Display a Background Type', 'bb-vapor-modules' ),
						'default'       => 'yes',
						'options'       => array(
							'none'       => __( 'None', 'bb-vapor-modules' ),
							'color' => __( 'Color', 'bb-vapor-modules' ),
							'gradient' => __( 'Gradient', 'bb-vapor-modules' ),
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
						'label'         => __( 'Display a Background Color', 'bb-vapor-modules' ),
						'default' => '#FFFFFF',
						'show_reset'         => true
					),
					'button_background_color_hover' => array(
						'type'          => 'color',
						'label'         => __( 'Display a Background Color on Hover', 'bb-vapor-modules' ),
						'default' => '#FFFFFF',
						'show_reset'         => true
					),
					'button_color_gradient' => array(
						'type'          => 'gradient',
						'label'         => __( 'Display a Gradient', 'bb-vapor-modules' ),
						'show_reset'         => true
					),
					'button_color_gradient_hover' => array(
						'type'          => 'gradient',
						'label'         => __( 'Display a Gradient on Hover', 'bb-vapor-modules' ),
						'show_reset'         => true
					),
					'button_border' => array(
						'type'          => 'unit',
						'label'         => __( 'Button Border Width', 'bb-vapor-modules' ),
						'default' => '0',
					),
					'button_border_color' => array(
						'type'          => 'color',
						'label'         => __( 'Button Border Color', 'bb-vapor-modules' ),
						'default' => '#FFFFFF',
						'show_reset' => true
					),
					'button_border_radius' => array(
						'type'          => 'dimension',
						'label'         => __( 'Button Border Radius', 'bb-vapor-modules' ),
					),
				)
			)
		)
	)
) );
