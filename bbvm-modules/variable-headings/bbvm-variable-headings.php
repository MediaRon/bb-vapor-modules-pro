<?php
class BBVapor_Variable_Headings_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Variable Headings', 'bb-vapor-modules-pro' ),
			'description'     => __( 'Variable Headings for Beaver Builder', 'bb-vapor-modules-pro' ),
			'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
			'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
			'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/variable-headings/',
			'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/variable-headings/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Variable_Headings_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Headlines', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'headline_tag' => array(
						'type' => 'select',
						'label' => __( 'Headline Tag', 'bb-vapor-modules-pro' ),
						'options' => array(
							'h1' => 'H1',
							'h2' => 'H2',
							'h3' => 'H3',
							'h4' => 'H4',
							'h5' => 'H5',
							'h6' => 'H6',
						),
						'default' => 'h2'
					),
					'headline_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Headline Padding', 'bb-vapor-modules-pro' ),
						'responsive' => true
					),
					'headline_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Headline Margin', 'bb-vapor-modules-pro' ),
						'responsive' => true
					),
				)
			)
		)
	),
) );
