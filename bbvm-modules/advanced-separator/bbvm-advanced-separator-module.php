<?php
class BBVapor_Advanced_Separator_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Advanced Separator', 'bb-vapor-modules' ),
			'description'     => __( 'Advanced Separator for Beaver Builder', 'bb-vapor-modules' ),
			'category'        => __( 'Separators/Spacers', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/advanced-separator/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/advanced-separator/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Advanced_Separator_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __( 'Separator', 'bb-vapor-modules' ), // Section Title
				'fields'        => array( // Section Fields
					'color' => array(
						'type'          => 'color',
						'label'         => __( 'Color of Separator', 'bb-vapor-modules' ),
						'default'       => '000000',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'style' => array(
						'type'          => 'select',
						'label'         => __( 'Separator style', 'bb-vapor-modules' ),
						'default'       => 'line',
						'options'       => array(
							'line'          => __( 'Line', 'bb-vapor-modules' ),
							'line_radius'   => __( 'Line With Radius', 'bb-vapor-modules' ),
							'line_icon'     => __( 'Line With Icon', 'bb-vapor-modules' ),
							'line_photo'    => __( 'Line With Photo', 'bb-vapor-modules' ),
							'line_content'  => __( 'Line With Content', 'bb-vapor-modules' ),
							'double'        => __( 'Double Line', 'bb-vapor-modules' ),
							'photo'         => __( 'Background Photo', 'bb-vapor-modules' ),
						),
						'toggle' => array(
							'line' => array(
								'fields' => array(
									'separator_height',
								)
							),
							'line_radius' => array(
								'fields' => array(
									'separator_height',
									'radius',
								)
							),
							'line_icon' => array(
								'fields' => array(
									'separator_height',
									'icon',
									'icon_size',
									'icon_style',
									'icon_color',
									'background_color',
								)
							),
							'line_content' => array(
								'fields' => array(
									'content',
									'content_typography',
									'separator_height',
									'content_color',
								)
							),
							'double' => array(
								'fields' => array(
									'separator_height',
									'double_margin',
									'border_thickness',
								)
							),
							'photo' => array(
								'fields' => array(
									'photo',
									'repeat',
									'separator_height',
								)
							),
							'line_photo' => array(
								'fields' => array(
									'style_photo',
									'separator_height',
									'photo_style',
									'photo_size',
								)
							),
						)
					),
					'separator_height' => array(
						'type'          => 'unit',
						'label'         => __( 'Separator height', 'bb-vapor-modules' ),
						'description'   => 'px',
						'default'       => '1',
					),
					'style_photo' => array(
						'type' => 'photo',
						'label' => __( 'Select a photo', 'bb-vapor-modules' ),
					),
					'photo_style' => array(
						'type' => 'select',
						'label' => __( 'Select a photo style', 'bb-vapor-modules' ),
						'options' => array(
							'simple' => __( 'Simple', 'bb-vapor-modules' ),
							'square' => __( 'Square', 'bb-vapor-modules' ),
							'circular' => __( 'Circular', 'bb-vapor-modules')
						)
					),
					'photo_size' => array(
						'type' => 'unit',
						'label' => __( 'Enter a photo size', 'bb-vapor-modules' ),
						'responsive' => true,
						'description' => 'px',
						'default' => '50'
					),
					'icon' => array(
						'type' => 'icon',
						'label' => __( 'Enter an icon', 'bb-vapor-modules' )
					),
					'icon_size' => array(
						'type' => 'unit',
						'label' => __( 'Enter an icon size', 'bb-vapor-modules' ),
						'default' => '24',
					),
					'icon_style' => array(
						'type' => 'select',
						'label' => __( 'Select an icon style', 'bb-vapor-modules' ),
						'options' => array(
							'simple' => __( 'Simple', 'bb-vapor-modules' ),
							'square' => __( 'Square', 'bb-vapor-modules' ),
							'circular' => __( 'Circular', 'bb-vapor-modules')
						)
					),
					'icon_color' => array(
						'type' => 'color',
						'label' => __( 'Enter an icon color', 'bb-vapor-modules' ),
						'default' => '000000',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'background_color' => array(
						'type' => 'color',
						'label' => __( 'Enter a background color', 'bb-vapor-modules' ),
						'default' => 'FFFFFF',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'radius' => array(
						'type'          => 'unit',
						'label'         => __( 'Enter a radius', 'bb-vapor-modules' ),
						'description'   => 'px',
						'default'       => '0'
					),
					'photo' => array(
						'type'          => 'photo',
						'label'         => __( 'Background Photo', 'bb-vapor-modules' ),
					),
					'repeat' => array(
						'type'          => 'select',
						'label'         => __( 'Repeat Options', 'bb-vapor-modules' ),
						'default'       => 'repeat-x',
						'options'       => array(
							'repeat'    => 'repeat',
							'repeat-y'  => 'repeat-y',
							'repeat-x'  => 'repeat-x',
							'no-repeat' => 'no-repeat'
						)
					),
					'double_margin' => array(
						'type'          => 'unit',
						'label'         => __( 'Margin between separators', 'bb-vapor-modules' ),
						'description'   => 'px',
						'default'       => '2',
					),
					'border_thickness' => array(
						'type'          => 'unit',
						'label'         => __( 'Thickness of separators', 'bb-vapor-modules' ),
						'description'   => 'px',
						'default'       => '1',
					),
					'content' => array(
						'type'          => 'text',
						'label'         => __( 'Separator Content', 'bb-vapor-modules' ),
						'default'       => '***',
					),
					'content_typography' => array(
						'type'          => 'typography',
						'label'         => __( 'Separator Content Typography', 'bb-vapor-modules' ),
						'responsive'    => true
					),
					'content_color' => array(
						'type'          => 'color',
						'label'         => __( 'Content Color', 'bb-vapor-modules' ),
						'default'       => '000000',
					),
				)
			)
		)
	),
) );
