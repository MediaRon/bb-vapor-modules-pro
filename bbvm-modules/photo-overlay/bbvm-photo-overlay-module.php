<?php
class BBVapor_Photo_Overlay_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Photo Overlay', 'bb-vapor-modules' ),
			'description'     => __( 'Add an overlay to a photo', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/photo-overlay/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/photo-overlay/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Photo_Overlay_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Overlay Photo', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'overlay_photo' => array(
						'type'          => 'photo',
						'label'         => __('Photo to be Overlayed', 'bb-vapor-modules'),
						'show_remove'   => false,
					),
					'overlay_link' => array(
						'type'          => 'link',
						'label'         => __('Overlay Link', 'bb-vapor-modules')
					),
					'overlay_text' => array(
						'type'          => 'text',
						'label'         => __( 'Overlay Text', 'bb-vapor-modules' ),
						'placeholder'   => __( 'Text to overlay photo', 'bb-vapor-modules' ),
						'description'   => __( 'Text to overlay the photo.', 'bb-vapor-modules' ),
						'help'          => __( 'Text to overlay the photo.', 'bb-vapor-modules' )
					),
					'overlay_text_icon' => array(
						'type'          => 'icon',
						'label'         => __( 'Icon', 'bb-vapor-modules' ),
						'show_remove'   => true
					),
				)
			)
		)
	),
	'overlay'       => array( // Tab
		'title'         => __('Overlay Style', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'overlay'       => array( // Section
				'title'         => __('Overlay Style', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'overlay_type' => array(
						'type'          => 'select',
						'label'         => __( 'Select an Overlay Type', 'bb-vapor-modules' ),
						'default'       => 'horizontal',
						'options'       => array(
							'none'       => __( 'Select an overlay type', 'bb-vapor-modules' ),
							'horizontal' => __( 'Horizontal', 'bb-vapor-modules' ),
							'full'       => __( 'Full Overlay', 'bb-vapor-modules' ),
						),
						'toggle' => array(
							'horizontal' => array(
								'fields'     => array( 'horizontal_overlay_type', 'animation' ),
							),
							'full' => array(
								'fields' => array( 'animation' ),
							)
						)
					),
					'horizontal_overlay_type' => array(
						'type'  => 'select',
						'label' => 'Select an overlay position',
						'options' => array(
							'top'    => __( 'Top', 'bb-vapor-modules' ),
							'middle' => __( 'Middle', 'bb-vapor-modules' ),
							'bottom' => __( 'Bottom', 'bb-vapor-modules' ),
						)
					),
					'animation' => array(
						'type' => 'select',
						'label' => __( 'Select an animation', 'bb-vapor-modules' ),
						'options' => array(
							'regular' => __( 'No animation', 'bb-vapor-modules' ),
							'fade'    => __( 'Fade in', 'bb-vapor-modules' ),
						)
					),
					'overlay_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select a Padding', 'bb-vapor-modules' ),
						'responsive'  => true,
					),
					'overlay_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Background Color', 'bb-vapor-modules' ),
						'default' => '#FF0000',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'overlay_text_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Text Color', 'bb-vapor-modules' ),
						'default' => '#FFFFFF',
						'show_reset'    => true,
					),
					'overlay_typography' => array(
						'type' => 'typography',
						'label' => __( 'Typography', 'bb-vapor-modules' ),
						'preview'    => array(
							'type'	    => 'css',
							'selector'  => '.fl-bbvm-overlay-text',
						),
						'responsive'  => true,
					)
				)
			)
		)
	)
) );
