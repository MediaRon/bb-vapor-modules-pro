<?php
class BBVapor_Gravatar_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Gravatar', 'bb-vapor-modules' ),
			'description'     => __( 'Add Gravatar', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/gravatar/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/gravatar/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Gravatar_Module', array(
		'general'       => array( // Tab
			'title'         => __('Settings', 'bb-vapor-modules'), // Tab title
			'sections'      => array( // Tab Sections
				'general'       => array( // Section
					'title'         => __('Settings', 'bb-vapor-modules'), // Section Title
					'fields'        => array( // Section Fields
						'gravatar_type' => array(
							'type'          => 'select',
							'label'         => __('Gravatar Type', 'bb-vapor-modules'),
							'options' => array(
								'user_id' => __( 'User ID', 'bb-vapor-modules' ),
								'email' => __( 'Email Address', 'bb-vapor-modules' ),
							),
							'default' => 'email',
							'toggle' => array(
								'user_id' => array( 'fields' => array( 'user_id' ) ),
								'email' => array( 'fields' => array( 'email_address', 'avatar_link' ) )
							)
						),
						'user_id' => array(
							'type' => 'unit',
							'label' => __( 'User ID', 'bb-vapor-modules' ),
							'default' => '0',
						),
						'email_address' => array(
							'type' => 'text',
							'label' => __( 'Email Address', 'bb-vapor-modules' ),
							'default' => '',
						),
						'avatar_size' => array(
							'type' => 'unit',
							'label' => __( 'Avatar Size', 'bb-vapor-modules' ),
							'default' => '100',
						),
						'avatar_type' => array(
							'type' => 'select',
							'label' => __( 'Avatar Type', 'bb-vapor-modules' ),
							'options' => array(
								'square' => __( 'Square', 'bb-vapor-modules' ),
								'circular' => __( 'Circular', 'bb-vapor-modules' )
							),
							'default' => 'square'
						),
						'avatar_title' => array(
							'type' => 'text',
							'label' => __( 'Avatar Title', 'bb-vapor-modules' ),
							'default' => '',
						),
						'avatar_typography' => array(
							'type' => 'typography',
							'label' => __( 'Avatar Title Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'avatar_align' => array(
							'type' => 'align',
							'label' => __( 'Avatar Align', 'bb-vapor-modules' ),
							'default' => 'center',
						),
						'avatar_link' => array(
							'type' => 'select',
							'label' => __( 'Link to Gravatar Profile', 'bb-vapor-modules' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules' ),
								'no' => __( 'No', 'bb-vapor-modules' )
							),
							'default' => 'no'
						),
					)
				)
			)
		),
	)
);
