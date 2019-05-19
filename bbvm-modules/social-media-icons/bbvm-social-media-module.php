<?php
class BBVapor_Social_Media_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Social Media Icons', 'bb-vapor-modules' ),
			'description'     => __( 'Adds social media icons', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/social-media-icons/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/social-media-icons/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_settings_form(
	'bbvm_social_form', array(
		'title' => __( 'Add Social Media URL', 'bb-vapor-modules' ),
		'tabs'  => array(
			'general'      => array(
				'title'         => __('General', 'fl-builder'),
				'sections'      => array(
					'general'       => array(
						'title'         => '',
						'fields'        => array(
							'social_share_type'         => array(
								'type'          => 'text',
								'label'         => __('Enter Social Media URL', 'fl-builder')
							),
							'social_share_text'         => array(
								'type'          => 'text',
								'label'         => __('Enter Alt Text', 'fl-builder')
							)
						)
					),
				)
			)
		)
	)
);
FLBuilder::register_module('BBVapor_Social_Media_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Add Social Icons', 'bb-vapor-modules'), // Section Title
				'fields' => array(
					'social_form'    => array( // Section Fields
						'type'         => 'form',
						'label'        => __( 'Social Item', 'bb-vapor-modules' ),
						'form'         => 'bbvm_social_form',
						'preview_text' => 'social_share_type',
						'multiple'     => true,
					),
				)
			),
		)
	),
	'styles' => array(
		'title' => __( 'Styles', 'bbvm-bb-module' ),
		'sections' => array(
			'general' => array(
				'title'         => __('Style', 'bb-vapor-modules'), // Section Title
				'fields' => array(
					'padding' => array(
						'type'        => 'dimension',
						'label'       => __( 'Padding', 'bb-vapor-modules' ),
						'description' => 'px',
						'responsive'  => true,
					),
					'orientation'    => array( // Section Fields
						'type'         => 'select',
						'label'        => __( 'Orientation', 'bb-vapor-modules' ),
						'default' => 'horizontal',
						'options' => array(
							'horizontal'  => __( 'Horizontal', 'bb-vapor-modules' ),
							'vertical' => __( 'Vertical', 'bb-vapor-modules' ),
						),
					),
					'background_select'    => array( // Section Fields
						'type'         => 'select',
						'label'        => __( 'Background Type', 'bb-vapor-modules' ),
						'default' => 'color',
						'options' => array(
							'color'  => __( 'Color', 'bb-vapor-modules' ),
							'gradient' => __( 'Gradient', 'bb-vapor-modules' ),
							'photo' => __( 'Photo', 'bb-vapor-modules' ),
						),
						'toggle' => array(
							'color' => array( 'fields' => array( 'background_color' ) ),
							'gradient' => array( 'fields' => array( 'background_gradient' ) ),
							'photo' => array( 'fields' => array( 'background_image', 'background_overlay' ) )
						)
					),
					'background_image' => array(
						'type'          => 'photo',
						'label'         => __('Background Image', 'bb-vapor-modules'),
					),
					'background_overlay' => array(
						'type' => 'color',
						'label' => 'Background Overlay',
						'show_reset' => true,
						'show_alpha' => true
					),
					'background_color' => array(
						'type'          => 'color',
						'label'         => __( 'Background Color', 'bb-vapor-modules' ),
						'default'       => 'FFFFFF',
						'show_reset'    => true,
						'show_alpha'    => true,
					),
					'background_gradient' => array(
						'type'          => 'gradient',
						'label'         => __( 'Gradient Background Color', 'bb-vapor-modules' ),
						'preview' => array(
							'type'     => 'css',
							'selector' => '.bbvm-module-social-wrapper',
							'property' => 'background-image',
						)
					),
					'fill'    => array( // Section Fields
						'type'         => 'select',
						'label'        => __( 'Fill Color', 'bb-vapor-modules' ),
						'default' => 'none',
						'options' => array(
							'none'  => __( 'Select a color', 'bb-vapor-modules' ),
							'FFFFFF' => __( 'White', 'bb-vapor-modules' ),
							'000000' => __( 'Black', 'bb-vapor-modules' ),
							'brand' => __( 'Brand Colors', 'bb-vapor-modules' ),
							'custom' => __( 'Custom', 'bb-vapor-modules' )
						),
						'toggle' => array(
							'custom' => array(
								'fields'     => array( 'fill_custom' ),
							)
						)
					),
					'fill_custom'    => array( // Section Fields
						'type'         => 'color',
						'label'        => __( 'Custom Fill Color', 'bb-vapor-modules' ),
						'default' => '333333',
						'show_reset' => true,
						'show_alpha' => true
					),
					'icon_size' => array(
						'type'        => 'select',
						'label'       => __( 'Icon Size', 'bb-vapor-modules' ),
						'description' => 'px',
						'default' => '24',
						'options' => array(
							'12' => '12px',
							'18' => '18px',
							'24' => '24px',
							'36' => '36px',
							'48' => '48px'
						)
					),
				)
			)
		)
	)
) );
