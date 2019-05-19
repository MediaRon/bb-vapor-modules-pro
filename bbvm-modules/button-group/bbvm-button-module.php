<?php
class MediaRon_Button_Group_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Button Group', 'mediaron-bb-modules' ),
			'description'     => __( 'Add a Button Group', 'mediaron-bb-modules' ),
			'category'        => __( 'Base', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/button-group/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/button-group/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
FLBuilder::register_settings_form(
	'mrbb_buttons', array(
		'title' => __( 'Add Button', 'mediaron-bb-modules' ),
		'tabs'  => array(
			'general'      => array(
				'title'         => __('Button', 'mediaron-bb-modules'),
				'sections'      => array(
					'general'       => array(
						'title'         => '',
						'fields'        => array(
							'button_id'         => array(
								'type'          => 'text',
								'label' => __( 'Unique Button ID for Styling', 'mediaron-bb-modules' ),
								'default' => 'button_id_' . rand(0,10000),
							),
							'button_text'         => array(
								'type'          => 'text',
								'label' => __( 'Button Text', 'mediaron-bb-modules' )
							),
							'button_link'         => array(
								'type'          => 'link',
								'label' => __( 'Button Link', 'mediaron-bb-modules' )
							),
							'button_icon'         => array(
								'type'          => 'icon',
								'label' => __( 'Button Icon', 'mediaron-bb-modules' ),
								'show_remove'   => true
							),
							'button_text_color'         => array(
								'type'          => 'color',
								'label' => __( 'Button Text Color', 'mediaron-bb-modules' ),
								'default' => '000000'
							),
							'button_text_color_hover'         => array(
								'type'          => 'color',
								'label' => __( 'Button Text Color on Hover', 'mediaron-bb-modules' ),
								'default' => '000000'
							),
							'button_background_type'         => array(
								'type'          => 'select',
								'label' => __( 'Button Background Type', 'mediaron-bb-modules' ),
								'options' => array(
									'transparent' => __( 'Transparent', 'mediaron-bb-modules' ),
									'color' => __( 'Color', 'mediaron-bb-modules' ),
									'gradient' => __( 'Gradient', 'mediaron-bb-modules' )
								),
								'default' => 'transparent',
								'toggle' => array(
									'color' => array( 'fields' => array( 'button_background_color', 'button_background_color_hover' ) ),
									'gradient' => array( 'fields' => array( 'button_background_gradient', 'button_background_gradient_hover' ) ),
									'transparent' => array( 'fields' => array( 'button_style', 'button_style_hover', 'button_style_border_color', 'button_style_border_color_hover' ) )
								)
							),
							'button_background_color' => array(
								'type' => 'color',
								'label' => __( 'Button Background Color', 'mediaron-bb-modules' ),
								'show_alpha' => true,
								'show_reset' => true,
								'default' => 'FFFFFF'
							),
							'button_background_color_hover' => array(
								'type' => 'color',
								'label' => __( 'Button Background Hover Color', 'mediaron-bb-modules' ),
								'show_alpha' => true,
								'show_reset' => true,
								'default' => 'FFFFFF'
							),
							'button_background_gradient' => array(
								'type' => 'gradient',
								'label' => __( 'Button Background Gradient', 'mediaron-bb-modules' ),
							),
							'button_background_gradient_hover' => array(
								'type' => 'gradient',
								'label' => __( 'Button Background Hover Gradient', 'mediaron-bb-modules' ),
							),
							'button_style' => array(
								'type' => 'select',
								'label' => __( 'Button Style', 'mediaron-bb-modules' ),
								'options' => array(
									'none' => __( 'None', 'mediaron-bb-modules' ),
									'iris' => __( 'Iris', 'mediaron-bb-modules' ),
									'ferdinand' => __( 'Ferdinand', 'mediaron-bb-modules' ),
									'francisco' => __( 'Francisco', 'mediaron-bb-modules' ),
									'prospero' => __( 'Prospero', 'mediaron-bb-modules' ),
									'sebastion' => __( 'Sebastian', 'mediaron-bb-modules' ),
									'stephano' => __( 'Stephano', 'mediaron-bb-modules' ),
									'trinculo' => __( 'Trinculo', 'mediaron-bb-modules' ),
									'valentine' => __( 'Valentine', 'mediaron-bb-modules' ),
								)
							),
							'button_style_hover' => array(
								'type' => 'select',
								'label' => __( 'Button Style Hover', 'mediaron-bb-modules' ),
								'options' => array(
									'none' => __( 'None', 'mediaron-bb-modules' ),
									'iris' => __( 'Iris', 'mediaron-bb-modules' ),
									'ferdinand' => __( 'Ferdinand', 'mediaron-bb-modules' ),
									'francisco' => __( 'Francisco', 'mediaron-bb-modules' ),
									'prospero' => __( 'Prospero', 'mediaron-bb-modules' ),
									'sebastion' => __( 'Sebastian', 'mediaron-bb-modules' ),
									'stephano' => __( 'Stephano', 'mediaron-bb-modules' ),
									'trinculo' => __( 'Trinculo', 'mediaron-bb-modules' ),
									'valentine' => __( 'Valentine', 'mediaron-bb-modules' ),
								)
							),
							'button_style_border_color' => array(
								'type' => 'color',
								'label' => __( 'Button Style Border Color', 'mediaron-bb-modules' ),
								'default' => '000000'
							),
							'button_style_border_color_hover' => array(
								'type' => 'color',
								'label' => __( 'Button Style Border Color Hover', 'mediaron-bb-modules' ),
								'default' => '000000'
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
FLBuilder::register_module('MediaRon_Button_Group_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('General', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'button' => array(
						'type'          => 'form',
						'label'         => __('Button', 'mediaron-bb-modules'),
						'form' => 'mrbb_buttons',
						'multiple'     => true,
						'preview_text'  => 'button_text'
					),
				)
			)
		)
	),
	'styles'       => array( // Tab
		'title'         => __('Styles', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'button_alignment' => array(
						'type'  => 'align',
						'label' => __( 'Button Alignment', 'mediaron-bb-modules' ),
						'default' => 'center'
					),
					'button_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Button Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'button_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Button Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'button_margin' => array(
						'type'  => 'dimension',
						'label' => __( 'Button Margin', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'button_radius' => array(
						'type'  => 'dimension',
						'label' => __( 'Button Radius', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'button_min_width' => array(
						'type'  => 'unit',
						'label' => __( 'Button Min Width', 'mediaron-bb-modules' ),
						'default' => '0',
						'responsive' => true
					),
				)
			)
		)
	),
) );
