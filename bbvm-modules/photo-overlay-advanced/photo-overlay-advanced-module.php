<?php
class MediaRon_Photo_Overlay_Advanced_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Photo Overlay Advanced', 'mediaron-bb-modules' ),
			'description'     => __( 'Add an overlay to a photo', 'mediaron-bb-modules' ),
			'category'        => __( 'Base', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/photo-overlay-advanced/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/photo-overlay-advanced/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_Photo_Overlay_Advanced_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Overlay Photo', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'overlay_photo' => array(
						'type'          => 'photo',
						'label'         => __('Photo to be Overlayed', 'mediaron-bb-modules'),
						'show_remove'   => false,
					),
					'overlay_link' => array(
						'type'          => 'link',
						'label'         => __('Overlay Link', 'mediaron-bb-modules')
					),
					'overlay_text' => array(
						'type'          => 'editor',
						'label'         => __( 'Overlay Text', 'mediaron-bb-modules' ),
						'placeholder'   => __( 'Text to overlay photo', 'mediaron-bb-modules' ),
						'description'   => __( 'Text to overlay the photo.', 'mediaron-bb-modules' ),
						'help'          => __( 'Text to overlay the photo.', 'mediaron-bb-modules' ),
						'wpautop'       => true
					),
					'overlay_behavior' => array(
						'type'          => 'select',
						'label'         => __( 'Overlay behavior', 'mediaron-bb-modules' ),
						'options' => array(
							'default' => __( 'Overlay on initial display', 'mediaron-bb-modules' ),
							'hover' => __( 'Overlay on hover', 'mediaron-bb-modules' ),
						)
					),
				)
			)
		)
	),
	'overlay'       => array( // Tab
		'title'         => __('Overlay Style', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'overlay'       => array( // Section
				'title'         => __('Overlay Style', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'overlay_type' => array(
						'type'          => 'select',
						'label'         => __( 'Select an Overlay Type', 'mediaron-bb-modules' ),
						'default'       => 'horizontal',
						'options'       => array(
							'none'       => __( 'Select an overlay type', 'mediaron-bb-modules' ),
							'horizontal' => __( 'Horizontal', 'mediaron-bb-modules' ),
							'full'       => __( 'Full Overlay', 'mediaron-bb-modules' ),
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
							'top'    => __( 'Top', 'mediaron-bb-modules' ),
							'middle' => __( 'Middle', 'mediaron-bb-modules' ),
							'bottom' => __( 'Bottom', 'mediaron-bb-modules' ),
						)
					),
					'max_width' => array(
						'type'  => 'unit',
						'label' => __( 'Select a max width for the image', 'mediaron-bb-modules' ),
						'description' => __( 'Select a max width if using the overlay or middle positions.', 'mediaron-bb-modules' ),
						'default' => 400,
					),
					'animation' => array(
						'type' => 'select',
						'label' => __( 'Select an animation', 'mediaron-bb-modules' ),
						'options' => array(
							'regular' => __( 'No animation', 'mediaron-bb-modules' ),
							'fade'    => __( 'Fade in', 'mediaron-bb-modules' ),
							'slideup' => __( 'Slide up', 'mediaron-bb-modules' ),
							'slidedown' => __( 'Slide down', 'mediaron-bb-modules' ),
							'slideleft' => __( 'Slide left', 'mediaron-bb-modules' ),
							'slideright' => __( 'Slide right', 'mediaron-bb-modules' )
						),
						'description' => __( 'For middle and full overlays, only fade will be able to be applied.', 'mediaron-bb-modules' ),
					),
					'animation_duration' => array(
						'type' => 'unit',
						'label' => __( 'Animation duraction in seconds', 'mediaron-bb-modules' ),
						'default' => '3'
					),
					'overlay_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select a Padding', 'mediaron-bb-modules' ),
						'responsive'  => true,
					),
					'overlay_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Background Color', 'mediaron-bb-modules' ),
						'default' => '#FF0000',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'overlay_text_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Text Color', 'mediaron-bb-modules' ),
						'default' => '#FFFFFF',
						'show_reset'    => true,
					),
					'overlay_typography' => array(
						'type' => 'typography',
						'label' => __( 'Typography', 'mediaron-bb-modules' ),
						'preview'    => array(
							'type'	    => 'css',
							'selector'  => '.fl-mediaron-overlay-text',
						),
						'responsive'  => true,
					)
				)
			)
		)
	)
) );
