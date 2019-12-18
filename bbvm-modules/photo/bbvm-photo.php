<?php // phpcs:ignore
class BBVapor_Photo extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Photo', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add a photo to your site', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/photo/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/photo/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Photo',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Photo', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'image'    => array(
							'type'        => 'photo',
							'label'       => __( 'Photo to display.', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
						'display_caption'     => array(
							'type'    => 'select',
							'label'   => __( 'Display Caption?', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
						'display_title'     => array(
							'type'    => 'select',
							'label'   => __( 'Display Title?', 'bb-vapor-modules-pro' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
						'display_image_effects' => array(
							'type'    => 'select',
							'label'   => __( 'Display Image Effects?', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
						'background_image'     => array(
							'type'    => 'select',
							'label'   => __( 'Make Photo a Background Image?', 'bb-vapor-modules-pro' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle' => array(
								'yes' => array(
									'fields' => array(
										'photo_min_height',
									),
								),
							),
						),
						'photo_min_height' => array(
							'type'         => 'unit',
							'label'        => __( 'Minimum Height of Photo', 'bb-vapor-modules-pro' ),
							'default'      => 500,
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo',
								'property' => 'text-align',
							),
							'units'        => array( 'px', 'vh', '%' ),
							'default_unit' => 'px',
						),
					),
				),
			),
		),
		'caption' => array(
			'title'    => __( 'Caption', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Caption', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'caption_type'   => array(
							'type'    => 'select',
							'label'   => __( 'Caption Type', 'bb-vapor-modules-pro' ),
							'default' => 'caption',
							'options' => array(
								'alt'     => __( 'Alt Text', 'bb-vapor-modules-pro' ),
								'caption' => __( 'Image Caption', 'bb-vapor-modules-pro' ),
								'custom'  => __( 'Custom Caption', 'bb-vapor-modules-pro' ),
							),
							'toggle' => array(
								'custom' => array(
									'fields' => array(
										'caption_custom',
									),
								),
							),
						),
						'caption_custom' => array(
							'type'        => 'text',
							'label'       => __( 'Caption Text', 'bb-vapor-modules-pro' ),
							'placeholder' => __( 'Please enter a caption', 'bb-vapor-modules-pro' ),
						),
						'caption_display' => array(
							'type'    => 'select',
							'label'   => __( 'Caption Display', 'bb-vapor-modules-pro' ),
							'default' => 'below',
							'options' => array(
								'below'   => __( 'Below Image', 'bb-vapor-modules-pro' ),
								'overlay' => __( 'Overlay Image', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'overlay' => array(
									'sections' => array(
										'overlay',
									),
								),
							),
						),
					),
				),
			),
		),
		'overlay' => array(
			'title'    => __( 'Overlay Style', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'overlay' => array(
					'title'  => __( 'Overlay Style', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'overlay_type'             => array(
							'type'    => 'select',
							'label'   => __( 'Select an Overlay Type', 'bb-vapor-modules-pro' ),
							'default' => 'horizontal',
							'options' => array(
								'none'       => __( 'Select an overlay type', 'bb-vapor-modules-pro' ),
								'horizontal' => __( 'Horizontal', 'bb-vapor-modules-pro' ),
								'full'       => __( 'Full Overlay', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'horizontal' => array(
									'fields' => array(
										'horizontal_overlay_type',
										'animation',
									),
								),
								'full'       => array(
									'fields' => array(
										'animation',
									),
								),
							),
						),
						'horizontal_overlay_type'  => array(
							'type'    => 'select',
							'label'   => 'Select an overlay position',
							'options' => array(
								'top'    => __( 'Top', 'bb-vapor-modules-pro' ),
								'middle' => __( 'Middle', 'bb-vapor-modules-pro' ),
								'bottom' => __( 'Bottom', 'bb-vapor-modules-pro' ),
							),
						),
						'max_width'                => array(
							'type'        => 'unit',
							'label'       => __( 'Select a max width for the image', 'bb-vapor-modules-pro' ),
							'description' => __( 'Select a max width if using the overlay or middle positions.', 'bb-vapor-modules-pro' ),
							'default'     => 400,
						),
						'animation'                => array(
							'type'        => 'select',
							'label'       => __( 'Select an animation', 'bb-vapor-modules-pro' ),
							'options'     => array(
								'regular'    => __( 'No animation', 'bb-vapor-modules-pro' ),
								'fade'       => __( 'Fade in', 'bb-vapor-modules-pro' ),
								'slideup'    => __( 'Slide up', 'bb-vapor-modules-pro' ),
								'slidedown'  => __( 'Slide down', 'bb-vapor-modules-pro' ),
								'slideleft'  => __( 'Slide left', 'bb-vapor-modules-pro' ),
								'slideright' => __( 'Slide right', 'bb-vapor-modules-pro' ),
							),
							'description' => __( 'For middle and full overlays, only fade will be able to be applied.', 'bb-vapor-modules-pro' ),
						),
						'animation_duration'       => array(
							'type'    => 'unit',
							'label'   => __( 'Animation duraction in seconds', 'bb-vapor-modules-pro' ),
							'default' => '3',
						),
						'overlay_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'overlay_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Background Color', 'bb-vapor-modules-pro' ),
							'default'    => '#FF0000',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'overlay_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Select a Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '#FFFFFF',
							'show_reset' => true,
						),
						'overlay_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
