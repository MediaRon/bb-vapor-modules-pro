<?php
class BBVapor_Gist_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Gist', 'bb-vapor-modules' ),
			'description'     => __( 'Gists for Beaver Builder', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/gist/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/gist/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Gist_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Gist', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'gist' => array(
						'type'          => 'text',
						'label'         => __( 'Enter Your Gist URL Here', 'bb-vapor-modules' ),
						'default'       => '',
					),
					'gist_caption' => array(
						'type'          => 'text',
						'label'         => __( 'Gist Caption', 'bb-vapor-modules' ),
						'default'       => '',
					),
					'show_meta' => array(
						'type'          => 'select',
						'label'         => __( 'Show Meta?', 'bb-vapor-modules' ),
						'default'       => 'yes',
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
							'no' => __( 'No', 'bb-vapor-modules' )
						)
					),
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
					'gist_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select a Padding', 'bb-vapor-modules' ),
					),
					'gist_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Background Color', 'bb-vapor-modules' ),
						'default' => '#FFFFFF',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'gist_text_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Text Color', 'bb-vapor-modules' ),
						'default' => '#000000',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'gist_border_radius' => array(
						'type' => 'unit',
						'label' => __( 'Select a Border Radius', 'bb-vapor-modules' ),
						'description' => __( 'Useful if you have selected a padding and background color', 'bb-vapor-modules' ),
						'default' => '0',
					),
					'gist_typography' => array(
						'type' => 'typography',
						'label' => __( 'Typography', 'bb-vapor-modules' ),
						'preview'    => array(
							'type'	    => 'css',
							'selector'  => '.fl-bbvm-gist-for-beaverbuilder figcaption',
						),
					)
				)
			)
		)
	)
) );
