<?php
class MediaRon_Blockquotes_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Blockquote', 'mediaron-bb-modules' ),
			'description'     => __( 'Add a Blockquote', 'mediaron-bb-modules' ),
			'category'        => __( 'Base', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/blockquotes/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/blockquotes/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => true, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_Blockquotes_Module', array(
	'general'       => array( // Tab
		'title'         => __('Settings', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Settings', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'blockquote_text' => array(
						'type' => 'textarea',
						'label' => __( 'Blockquote Text', 'mediaron-bb-modules' ),
						'rows' => '6'
					),
					'blockquote_attribution' => array(
						'type' => 'textarea',
						'label' => __( 'Blockquote Attribution', 'mediaron-bb-modules' ),
						'description' => __( 'May or may not be used depending on Blockquote style', 'mediaron-bb-modules' ),
						'rows' => '6'
					)
				)
			)
		)
	),
	'style'       => array( // Tab
		'title'         => __('Style', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'style'       => array( // Section
				'title'         => __('Style', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'blockquote_style' => array(
						'type'          => 'select',
						'label' => __( 'Blockquote Style Select', 'mediaron-bb-modules' ),
						'options' => array(
							'none' => __( 'None', 'mediaron-bb-modules' ),
							'enhanced' => __( 'Enhanced', 'mediaron-bb-modules' ),
							'background_quotes' => __( 'Background Quotes', 'mediaron-bb-modules' ),
							'left_border' => __( 'Left Border', 'mediaron-bb-modules' ),
							'right_border' => __( 'Right Border', 'mediaron-bb-modules' ),
							'top_bottom_border' => __( 'Top and Bottom Border', 'mediaron-bb-modules' ),
							'cite' => __( 'Cite', 'mediaron-bb-modules' ),
							'cite_border_effect' => __( 'Cite Border Effect', 'mediaron-bb-modules' ),
							'cite_animated_border' => __( 'Cite Animated Border', 'mediaron-bb-modules' ),
							'cite_scale' => __( 'Cite Scale', 'mediaron-bb-modules' ),
							'cite_brackets' => __( 'Cite Brackets', 'mediaron-bb-modules' ),
							'cite_icon' => __( 'Cite Icon', 'mediaron-bb-modules' )
						),
						'default' => 'none',
						'toggle' => array(
							'bold' => array( 'fields' => array( 'bold_quote_color', 'bold_background_color', 'bold_text_shadow_color' ) ),
							'enhanced' => array( 'fields' => array( 'enhanced_background_color', 'enhanced_quote_color', 'enhanced_text_color', 'enhanced_border_color', 'enhanced_gradient' ) ),
							'left_border' => array( 'fields' => array( 'border_type', 'border_width', 'background_color', 'text_color' ) ),
							'right_border' => array( 'fields' => array( 'border_type', 'border_width', 'background_color', 'text_color' ) ),
							'top_bottom_border' => array( 'fields' => array( 'top_bottom_border_color', 'top_bottom_border_color_hover', 'top_bottom_border_height', 'background_color', 'text_color' ) ),
							'cite' => array( 'fields' => array( 'cite_border_color', 'text_color' ) ),
							'cite_border_effect' => array( 'fields' => array( 'cite_border_color', 'background_color', 'text_color' ) ),
							'cite_animated_border' => array( 'fields' => array( 'cite_border_color', 'background_color', 'text_color' ) ),
							'cite_scale' => array( 'fields' => array( 'background_color', 'text_color' ) ),
							'cite_brackets' => array( 'fields' => array( 'cite_border_color', 'background_color', 'text_color' ) ),
							'cite_icon' => array( 'fields' => array( 'cite_border_color', 'background_color', 'text_color' ) ),
							'background_quotes' => array( 'fields' => array( 'background_quote_color', 'background_color', 'text_color' ) ),
						)
					),
					'background_quote_color' => array(
						'type' => 'color',
						'label' => __( 'Background Quote Color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'rgba(0, 0, 0, 1)'
					),
					'bold_quote_color' => array(
						'type' => 'color',
						'label' => __( 'Bold Quote Color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'rgba(206, 255, 246, 0.8)'
					),
					'bold_text_shadow_color' => array(
						'type' => 'color',
						'label' => __( 'Text Shadow Color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'rgba(206, 255, 246, 0.2)'
					),
					'bold_background_color' => array(
						'type' => 'color',
						'label' => __( 'Background Color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'enhanced_gradient' => array(
						'type' => 'gradient',
						'label' => __( 'Container Gradient', 'mediaron-bb-modules' ),
					),
					'enhanced_background_color' => array(
						'type' => 'color',
						'label' => __( 'Background Color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
					),
					'enhanced_quote_color' => array(
						'type' => 'color',
						'label' => __( 'Enhanced Quote Color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'rgba(0,0,0,1)',
					),
					'enhanced_text_color' => array(
						'type' => 'color',
						'label' => __( 'Enhanced Text Color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => '000000',
					),
					'enhanced_border_color' => array(
						'type' => 'color',
						'label' => __( 'Enhanced Border Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000',
					),
					'font_heading' => array(
						'type'          => 'font',
						'label'         => __( 'Heading Font', 'mediaron-bb-modules' ),
						'default'       => array(
							'family'        => 'Montserrat',
							'weight'        => 700
						)
					),
					'font_size' => array(
						'type'          => 'unit',
						'label'         => __( 'Heading Font Size', 'mediaron-bb-modules' ),
						'description' => 'px',
						'default' => '32',
						'responsive' => true,
					),
					'font_attribution' => array(
						'type'          => 'font',
						'label'         => __( 'Attribution Font', 'mediaron-bb-modules' ),
						'default'       => array(
							'family'        => 'Oswald',
							'weight'        => 400
						)
					),
					'font_size_attribution' => array(
						'type'          => 'unit',
						'label'         => __( 'Attribution Font Size', 'mediaron-bb-modules' ),
						'description' => 'px',
						'default' => '24',
						'responsive' => true,
					),
					'border_type' => array(
						'type' => 'select',
						'label' => __( 'Border Type', 'mediaron-bb-modules' ),
						'options' => array(
							'color' => __( 'Color', 'mediaron-bb-modules' ),
							'gradient' => __( 'Gradient', 'mediaron-bb-modules' ),
						),
						'toggle' => array(
							'color' => array( 'fields' => array( 'border_background_color' ) ),
							'gradient' => array( 'fields' => array( 'border_background_gradient' ) ),
						)
					),
					'border_background_color' => array(
						'type' => 'color',
						'label' => __( 'Border Background Color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => '333333',
					),
					'border_background_gradient' => array(
						'type' => 'gradient',
						'label' => __( 'Border Background Gradient', 'mediaron-bb-modules' ),
					),
					'border_width' => array(
						'type' => 'unit',
						'label' => __( 'Border Width', 'mediaron-bb-modules' ),
						'description' => 'px',
						'default' => '30'
					),
					'top_bottom_border_color' => array(
						'type' => 'color',
						'label' => __( 'Border Color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'FAFAFA',
					),
					'top_bottom_border_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Border Color on Hover', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'FFFFFF',
					),
					'top_bottom_border_height' => array(
						'type' => 'unit',
						'label' => __( 'Border Height', 'mediaron-bb-modules' ),
						'default' => '2',
					),
					'cite_border_color' => array(
						'type' => 'color',
						'label' => __( 'Cite Border Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '757575',
					),
					'background_color' => array(
						'type' => 'color',
						'label' => __( 'Background Color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'FFFFFF',
					),
					'text_color' => array(
						'type' => 'color',
						'label' => __( 'Text Color', 'mediaron-bb-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => '000000',
					),
					'blockquote_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Blockquote Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'max_width' => array(
						'type' => 'unit',
						'label' => __( 'Max Width', 'mediaron-bb-modules' ),
						'responsive' => true,
						'default' => '50',
						'description' => '%'
					)
				)
			)
		)
	),
) );
