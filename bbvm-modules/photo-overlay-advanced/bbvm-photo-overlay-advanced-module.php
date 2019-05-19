<?php
class BBVapor_Photo_Overlay_Advanced_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Photo Overlay Advanced', 'bb-vapor-modules-pro' ),
			'description'     => __( 'Add an overlay to a photo', 'bb-vapor-modules-pro' ),
			'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
			'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
			'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/photo-overlay-advanced/',
			'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/photo-overlay-advanced/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Photo_Overlay_Advanced_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Overlay Photo', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'overlay_photo' => array(
						'type'          => 'photo',
						'label'         => __('Photo to be Overlayed', 'bb-vapor-modules-pro'),
						'show_remove'   => false,
					),
					'overlay_link' => array(
						'type'          => 'link',
						'label'         => __('Overlay Link', 'bb-vapor-modules-pro')
					),
					'overlay_text' => array(
						'type'          => 'editor',
						'label'         => __( 'Overlay Text', 'bb-vapor-modules-pro' ),
						'placeholder'   => __( 'Text to overlay photo', 'bb-vapor-modules-pro' ),
						'description'   => __( 'Text to overlay the photo.', 'bb-vapor-modules-pro' ),
						'help'          => __( 'Text to overlay the photo.', 'bb-vapor-modules-pro' ),
						'wpautop'       => true
					),
					'overlay_behavior' => array(
						'type'          => 'select',
						'label'         => __( 'Overlay behavior', 'bb-vapor-modules-pro' ),
						'options' => array(
							'default' => __( 'Overlay on initial display', 'bb-vapor-modules-pro' ),
							'hover' => __( 'Overlay on hover', 'bb-vapor-modules-pro' ),
						)
					),
				)
			)
		)
	),
	'overlay'       => array( // Tab
		'title'         => __('Overlay Style', 'bb-vapor-modules-pro'), // Tab title
		'sections'      => array( // Tab Sections
			'overlay'       => array( // Section
				'title'         => __('Overlay Style', 'bb-vapor-modules-pro'), // Section Title
				'fields'        => array( // Section Fields
					'overlay_type' => array(
						'type'          => 'select',
						'label'         => __( 'Select an Overlay Type', 'bb-vapor-modules-pro' ),
						'default'       => 'horizontal',
						'options'       => array(
							'none'       => __( 'Select an overlay type', 'bb-vapor-modules-pro' ),
							'horizontal' => __( 'Horizontal', 'bb-vapor-modules-pro' ),
							'full'       => __( 'Full Overlay', 'bb-vapor-modules-pro' ),
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
							'top'    => __( 'Top', 'bb-vapor-modules-pro' ),
							'middle' => __( 'Middle', 'bb-vapor-modules-pro' ),
							'bottom' => __( 'Bottom', 'bb-vapor-modules-pro' ),
						)
					),
					'max_width' => array(
						'type'  => 'unit',
						'label' => __( 'Select a max width for the image', 'bb-vapor-modules-pro' ),
						'description' => __( 'Select a max width if using the overlay or middle positions.', 'bb-vapor-modules-pro' ),
						'default' => 400,
					),
					'animation' => array(
						'type' => 'select',
						'label' => __( 'Select an animation', 'bb-vapor-modules-pro' ),
						'options' => array(
							'regular' => __( 'No animation', 'bb-vapor-modules-pro' ),
							'fade'    => __( 'Fade in', 'bb-vapor-modules-pro' ),
							'slideup' => __( 'Slide up', 'bb-vapor-modules-pro' ),
							'slidedown' => __( 'Slide down', 'bb-vapor-modules-pro' ),
							'slideleft' => __( 'Slide left', 'bb-vapor-modules-pro' ),
							'slideright' => __( 'Slide right', 'bb-vapor-modules-pro' )
						),
						'description' => __( 'For middle and full overlays, only fade will be able to be applied.', 'bb-vapor-modules-pro' ),
					),
					'animation_duration' => array(
						'type' => 'unit',
						'label' => __( 'Animation duraction in seconds', 'bb-vapor-modules-pro' ),
						'default' => '3'
					),
					'overlay_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
						'responsive'  => true,
					),
					'overlay_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Background Color', 'bb-vapor-modules-pro' ),
						'default' => '#FF0000',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'overlay_text_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Text Color', 'bb-vapor-modules-pro' ),
						'default' => '#FFFFFF',
						'show_reset'    => true,
					),
					'overlay_typography' => array(
						'type' => 'typography',
						'label' => __( 'Typography', 'bb-vapor-modules-pro' ),
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
