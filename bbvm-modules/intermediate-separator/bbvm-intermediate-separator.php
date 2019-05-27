<?php
class BBVapor_Intermediate_Separator_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Intermediate Separator', 'bb-vapor-modules-pro' ),
			'description'     => __( 'Intermediate Separator for Beaver Builder', 'bb-vapor-modules-pro' ),
			'category'        => __( 'Separators/Spacers', 'bb-vapor-modules-pro' ),
			'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
			'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/intermediate-separator/',
			'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/intermediate-separator/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Intermediate_Separator_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __( 'Separator', 'bb-vapor-modules-pro' ), // Section Title
				'fields'        => array( // Section Fields
					'color' => array(
						'type'          => 'color',
						'label'         => __( 'Color of Separator', 'bb-vapor-modules-pro' ),
						'default'       => '000000',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'style' => array(
						'type'          => 'select',
						'label'         => __( 'Separator style', 'bb-vapor-modules-pro' ),
						'default'       => 'content',
						'options'       => array(
							'content'    => __( 'Content', 'bb-vapor-modules-pro' ),
							'simple'     => __( 'Simple Line', 'bb-vapor-modules-pro' ),
							'full_width' => __( 'Full Width', 'bb-vapor-modules-pro' ),
							'double'     => __( 'Double Line', 'bb-vapor-modules-pro' ),
							'photo'      => __( 'Background Photo', 'bb-vapor-modules-pro' ),
						),
						'toggle' => array(
							'content' => array(
								'fields' => array(
									'content',
									'content_typography',
									'content_height',
								)
							),
							'simple' => array(
								'fields' => array(
									'separator_height',
								)
							),
							'full_width' => array(
								'fields' => array(
									'separator_height',
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
						)
					),
					'separator_height' => array(
						'type'          => 'unit',
						'label'         => __( 'Separator height', 'bb-vapor-modules-pro' ),
						'description'   => 'px',
						'default'       => '1',
					),
					'photo' => array(
						'type'          => 'photo',
						'label'         => __( 'Background Photo', 'bb-vapor-modules-pro' ),
					),
					'repeat' => array(
						'type'          => 'select',
						'label'         => __( 'Repeat Options', 'bb-vapor-modules-pro' ),
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
						'label'         => __( 'Margin between separators', 'bb-vapor-modules-pro' ),
						'description'   => 'px',
						'default'       => '2',
					),
					'border_thickness' => array(
						'type'          => 'unit',
						'label'         => __( 'Thickness of separators', 'bb-vapor-modules-pro' ),
						'description'   => 'px',
						'default'       => '1',
					),
					'content' => array(
						'type'          => 'text',
						'label'         => __( 'Separator Content', 'bb-vapor-modules-pro' ),
						'default'       => '***',
					),
					'content_typography' => array(
						'type'          => 'typography',
						'label'         => __( 'Separator Content Typography', 'bb-vapor-modules-pro' ),
					),
					'content_height' => array(
						'type'          => 'unit',
						'label'         => __( 'Content height', 'bb-vapor-modules-pro' ),
						'description'   => 'px',
						'default'       => '50',
					),
				)
			)
		)
	),
) );
