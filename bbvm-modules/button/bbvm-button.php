<?php
class BBVapor_Button_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Button', 'bb-vapor-modules' ),
			'description'     => __( 'Add a Button', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/button/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/button/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Button_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('General', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'button_id'         => array(
						'type'          => 'text',
						'label' => __( 'Unique Button ID for Styling', 'bb-vapor-modules' ),
						'default' => 'button_id_' . rand(0,10000),
					),
					'button_text'         => array(
						'type'          => 'text',
						'label' => __( 'Button Text', 'bb-vapor-modules' )
					),
					'button_link'         => array(
						'type'          => 'link',
						'label' => __( 'Button Link', 'bb-vapor-modules' )
					),
					'button_icon'         => array(
						'type'          => 'icon',
						'label' => __( 'Button Icon', 'bb-vapor-modules' ),
						'show_remove'   => true
					),
					'button_text_color'         => array(
						'type'          => 'color',
						'label' => __( 'Button Text Color', 'bb-vapor-modules' ),
						'default' => '000000'
					),
					'button_text_color_hover'         => array(
						'type'          => 'color',
						'label' => __( 'Button Text Color on Hover', 'bb-vapor-modules' ),
						'default' => '000000'
					),
					'button_background_type'         => array(
						'type'          => 'select',
						'label' => __( 'Button Background Type', 'bb-vapor-modules' ),
						'options' => array(
							'transparent' => __( 'Transparent', 'bb-vapor-modules' ),
							'color' => __( 'Color', 'bb-vapor-modules' ),
							'gradient' => __( 'Gradient', 'bb-vapor-modules' )
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
						'label' => __( 'Button Background Color', 'bb-vapor-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'button_background_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Background Hover Color', 'bb-vapor-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'button_background_gradient' => array(
						'type' => 'gradient',
						'label' => __( 'Button Background Gradient', 'bb-vapor-modules' ),
					),
					'button_background_gradient_hover' => array(
						'type' => 'gradient',
						'label' => __( 'Button Background Hover Gradient', 'bb-vapor-modules' ),
					),
					'button_style' => array(
						'type' => 'select',
						'label' => __( 'Button Style', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'iris' => __( 'Iris', 'bb-vapor-modules' ),
							'ferdinand' => __( 'Ferdinand', 'bb-vapor-modules' ),
							'francisco' => __( 'Francisco', 'bb-vapor-modules' ),
							'prospero' => __( 'Prospero', 'bb-vapor-modules' ),
							'sebastion' => __( 'Sebastian', 'bb-vapor-modules' ),
							'stephano' => __( 'Stephano', 'bb-vapor-modules' ),
							'trinculo' => __( 'Trinculo', 'bb-vapor-modules' ),
							'valentine' => __( 'Valentine', 'bb-vapor-modules' ),
						)
					),
					'button_style_hover' => array(
						'type' => 'select',
						'label' => __( 'Button Style Hover', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'iris' => __( 'Iris', 'bb-vapor-modules' ),
							'ferdinand' => __( 'Ferdinand', 'bb-vapor-modules' ),
							'francisco' => __( 'Francisco', 'bb-vapor-modules' ),
							'prospero' => __( 'Prospero', 'bb-vapor-modules' ),
							'sebastion' => __( 'Sebastian', 'bb-vapor-modules' ),
							'stephano' => __( 'Stephano', 'bb-vapor-modules' ),
							'trinculo' => __( 'Trinculo', 'bb-vapor-modules' ),
							'valentine' => __( 'Valentine', 'bb-vapor-modules' ),
						)
					),
					'button_style_border_color' => array(
						'type' => 'color',
						'label' => __( 'Button Style Border Color', 'bb-vapor-modules' ),
						'default' => '000000'
					),
					'button_style_border_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Style Border Color Hover', 'bb-vapor-modules' ),
						'default' => '000000'
					)
				)
			)
		)
	),
	'styles'       => array( // Tab
		'title'         => __('Styles', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Styles', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'button_alignment' => array(
						'type'  => 'align',
						'label' => __( 'Button Alignment', 'bb-vapor-modules' ),
						'default' => 'center'
					),
					'button_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Button Padding', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'button_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Button Typography', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'button_margin' => array(
						'type'  => 'dimension',
						'label' => __( 'Button Margin', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'button_radius' => array(
						'type'  => 'dimension',
						'label' => __( 'Button Radius', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'button_min_width' => array(
						'type'  => 'unit',
						'label' => __( 'Button Min Width', 'bb-vapor-modules' ),
						'default' => '0',
						'responsive' => true
					),
				)
			)
		)
	),
) );
