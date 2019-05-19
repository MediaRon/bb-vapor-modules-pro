<?php
class BBVapor_Simple_Separator_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Simple Separator', 'bb-vapor-modules' ),
			'description'     => __( 'Simple Separator for Beaver Builder', 'bb-vapor-modules' ),
			'category'        => __( 'Separators/Spacers', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/simple-separator/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/simple-separator/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Simple_Separator_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __( 'Separator', 'bb-vapor-modules' ), // Section Title
				'fields'        => array( // Section Fields
					'height' => array(
						'type'          => 'unit',
						'label'         => __( 'Height of Separator', 'bb-vapor-modules' ),
						'description'   => 'px',
						'default'       => '2',
					),
					'color' => array(
						'type'          => 'color',
						'label'         => __( 'Color of Separator', 'bb-vapor-modules' ),
						'default'       => '000000',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'width' => array(
						'type'          => 'unit',
						'label'         => __( 'Width of Separator', 'bb-vapor-modules' ),
						'default'       => '100',
						'description'   => '%'
					),
					'height' => array(
						'type'          => 'unit',
						'label'         => __( 'Height of Separator', 'bb-vapor-modules' ),
						'default'       => '2',
						'description'   => 'px'
					),
					'style' => array(
						'type'          => 'select',
						'label'         => __( 'Separator style', 'bb-vapor-modules' ),
						'default'       => 'solid',
						'options'       => array(
							'solid'  => __( 'Solid', 'bb-vapor-modules' ),
							'dashed' => __( 'Dashed', 'bb-vapor-modules' ),
							'dotted' => __( 'Dotted', 'bb-vapor-modules' ),
							'double' => __( 'Double', 'bb-vapor-modules' ),
						)
					),

				)
			)
		)
	),
) );
