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
				'partial_refresh' => true, // Defaults to false and can be omitted.
			)
		);

		$this->add_css( 'cssgram', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'css/cssgram/cssgram.min.css', array(), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, 'all' );
		$this->add_css( 'jquery-magnificpopup' );
		$this->add_js( 'jquery-magnificpopup' );
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Photo',
	array(
		'general'     => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general'   => array(
					'title'  => __( 'Photo', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'image'           => array(
							'type'        => 'photo',
							'label'       => __( 'Photo to display.', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
						'display_caption' => array(
							'type'    => 'select',
							'label'   => __( 'Display Caption?', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'tabs' => array(
										'caption',
									),
								),
							),
						),
						'display_title'   => array(
							'type'    => 'select',
							'label'   => __( 'Display Title?', 'bb-vapor-modules-pro' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'sections' => array(
										'image_title',
									),
								),
							),
						),
						'link_option'     => array(
							'type'    => 'select',
							'label'   => __( 'Enable a Photo Link?', 'bb-vapor-modules-pro' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'tabs' => array(
										'photo_link',
									),
								),
							),
						),
					),
				),
				'container' => array(
					'title'  => __( 'Container Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'container_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo-wrapper',
								'property' => 'background-color',
							),
						),
						'container_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Container Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'container_border'           => array(
							'type'    => 'border',
							'label'   => __( 'Container Border', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo-wrapper',
								'property' => 'border',
							),
						),
						'container_width'            => array(
							'type'    => 'select',
							'label'   => __( 'Container Width', 'bb-vapor-modules-pro' ),
							'default' => 'fit',
							'options' => array(
								'fit'        => __( 'Fit Content', 'bb-vapor-modules-pro' ),
								'full_width' => __( 'Full Width', 'bb-vapor-modules-pro' ),
							),
						),
						'container_alignment'        => array(
							'type'    => 'align',
							'label'   => __( 'Container Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'center',
						),
					),
				),
			),
		),
		'image_title' => array(
			'title'    => __( 'Title', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'caption' => array(
					'title'  => __( 'Title', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'title_custom'           => array(
							'type'        => 'text',
							'label'       => __( 'Title Text', 'bb-vapor-modules-pro' ),
							'placeholder' => __( 'Please enter a title', 'bb-vapor-modules-pro' ),
							'preview'     => array(
								'type'     => 'text',
								'selector' => '.bbvm-photo-title',
							),
						),
						'title_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo-title',
								'property' => 'padding',
							),
						),
						'title_margin'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo-title',
								'property' => 'margin',
							),
						),
						'title_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Background Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'title_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Select a Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'title_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'title_border'           => array(
							'type'    => 'border',
							'label'   => __( 'Border', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo-title',
							),
						),
					),
				),
			),
		),
		'caption'     => array(
			'title'    => __( 'Caption', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'caption'            => array(
					'title'  => __( 'Caption', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'caption_type'    => array(
							'type'    => 'select',
							'label'   => __( 'Caption Type', 'bb-vapor-modules-pro' ),
							'default' => 'caption',
							'options' => array(
								'alt'     => __( 'Alt Text', 'bb-vapor-modules-pro' ),
								'caption' => __( 'Image Caption', 'bb-vapor-modules-pro' ),
								'custom'  => __( 'Custom Caption', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'custom' => array(
									'fields' => array(
										'caption_custom',
									),
								),
							),
						),
						'caption_custom'  => array(
							'type'        => 'text',
							'label'       => __( 'Caption Text', 'bb-vapor-modules-pro' ),
							'placeholder' => __( 'Please enter a caption', 'bb-vapor-modules-pro' ),
							'preview'     => array(
								'type'     => 'text',
								'selector' => '.bbvm-photo-caption',
							),
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
								'below'   => array(
									'sections' => array(
										'caption_appearance',
									),
								),
							),
						),
					),
				),
				'caption_appearance' => array(
					'title'  => __( 'Appearance', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'caption_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figcaption',
								'property' => 'padding',
							),
						),
						'caption_margin'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figcaption',
								'property' => 'margin',
							),
						),
						'caption_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Background Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'caption_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Select a Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'caption_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'caption_border'           => array(
							'type'    => 'border',
							'label'   => __( 'Border', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figcaption',
							),
						),
					),
				),
				'overlay'            => array(
					'title'  => __( 'Overlay', 'bb-vapor-modules-pro' ),
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
						'overlay_behavior'         => array(
							'type'    => 'select',
							'label'   => __( 'Overlay behavior', 'bb-vapor-modules-pro' ),
							'options' => array(
								'default' => __( 'Overlay on initial display', 'bb-vapor-modules-pro' ),
								'hover'   => __( 'Overlay on hover', 'bb-vapor-modules-pro' ),
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
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figcaption',
								'property' => 'padding',
							),
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
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figcaption, .bbvm-photo figcaption *',
							),
						),
					),
				),
			),
		),
		'photo_link'  => array(
			'title'    => __( 'Photo Link', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'photo_link' => array(
					'title'  => __( 'Photo Link', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'photo_link_select'   => array(
							'type'    => 'select',
							'label'   => __( 'Link Type', 'bb-vapor-modules-pro' ),
							'default' => 'regular',
							'options' => array(
								'lightbox' => __( 'Lightbox', 'bb-vapor-modules-pro' ),
								'regular'  => __( 'Regular Link', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'regular'  => array(
									'fields' => array(
										'photo_url',
									),
								),
								'lightbox' => array(
									'fields' => array(
										'photo_lightbox_size',
									),
								),
							),
						),
						'photo_lightbox_size' => array(
							'type'    => 'photo-sizes',
							'label'   => __( 'Photo Size For Lightbox', 'bb-vapor-modules-pro' ),
							'default' => 'large',
						),
						'photo_url'           => array(
							'type'          => 'link',
							'label'         => __( 'Photo Link', 'bb-vapor-modules-pro' ),
							'show_target'   => true,
							'show_nofollow' => true,
						),
					),
				),
			),
		),
		'effects'     => array(
			'title'    => __( 'Effects', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'overlay' => array(
					'title'  => __( 'Image Effects', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'filter_type'        => array(
							'type'    => 'select',
							'label'   => __( 'Select a Filter', 'bb-vapor-modules-pro' ),
							'default' => 'none',
							'options' => array(
								'none'      => __( 'No Filter', 'bb-vapor-modules-pro' ),
								'_1977'     => __( '1977', 'bb-vapor-modules-pro' ),
								'aden'      => __( 'Aden', 'bb-vapor-modules-pro' ),
								'brannan'   => __( 'Brannan', 'bb-vapor-modules-pro' ),
								'clarendon' => __( 'Clarendon', 'bb-vapor-modules-pro' ),
								'earlybird' => __( 'Early Bird', 'bb-vapor-modules-pro' ),
								'gingham'   => __( 'Gingham', 'bb-vapor-modules-pro' ),
								'hudson'    => __( 'Hudson', 'bb-vapor-modules-pro' ),
								'inkwell'   => __( 'Inkwell', 'bb-vapor-modules-pro' ),
								'kelvin'    => __( 'Kelvin', 'bb-vapor-modules-pro' ),
								'lark'      => __( 'Lark', 'bb-vapor-modules-pro' ),
								'lofi'      => __( 'Lo-Fi', 'bb-vapor-modules-pro' ),
								'maven'     => __( 'Maven', 'bb-vapor-modules-pro' ),
								'mayfair'   => __( 'Mayfair', 'bb-vapor-modules-pro' ),
								'moon'      => __( 'Moon', 'bb-vapor-modules-pro' ),
								'nashville' => __( 'Nashville', 'bb-vapor-modules-pro' ),
								'perpetua'  => __( 'Perpetua', 'bb-vapor-modules-pro' ),
								'reyes'     => __( 'Reyes', 'bb-vapor-modules-pro' ),
								'rise'      => __( 'Rise', 'bb-vapor-modules-pro' ),
								'slumber'   => __( 'Slumber', 'bb-vapor-modules-pro' ),
								'stinson'   => __( 'Stinson', 'bb-vapor-modules-pro' ),
								'Toaster'   => __( 'Toaster', 'bb-vapor-modules-pro' ),
								'valencia'  => __( 'Valencia', 'bb-vapor-modules-pro' ),
								'walden'    => __( 'Walden', 'bb-vapor-modules-pro' ),
								'Willow'    => __( 'Willow', 'bb-vapor-modules-pro' ),
								'xpro2'     => __( 'X-pro II', 'bb-vapor-modules-pro' ),
							),
						),
						'background_image'   => array(
							'type'        => 'select',
							'label'       => __( 'Make Photo a Background Image?', 'bb-vapor-modules-pro' ),
							'default'     => 'no',
							'options'     => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'      => array(
								'yes' => array(
									'fields' => array(
										'photo_min_height',
									),
								),
							),
							'description' => __( 'It is not recommended to do a circular appearance with a background image', 'bb-vapor-modules-pro' ),
						),
						'photo_min_height'   => array(
							'type'         => 'unit',
							'label'        => __( 'Minimum Height of Photo', 'bb-vapor-modules-pro' ),
							'default'      => 500,
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figure',
								'property' => 'min-height',
							),
							'units'        => array( 'px', 'vh', '%' ),
							'default_unit' => 'px',
						),
						'image_appearance'   => array(
							'type'        => 'select',
							'label'       => __( 'Image Appearance', 'bb-vapor-modules-pro' ),
							'default'     => 'none',
							'options'     => array(
								'appearance-none'     => __( 'None', 'bb-vapor-modules-pro' ),
								'appearance-circular' => __( 'Circular (in beta)', 'bb-vapor-modules-pro' ),
							),
							'description' => __( 'More effects will be added over time', 'bb-vapor-modules-pro' ),
						),
						'image_align'        => array(
							'type'    => 'align',
							'label'   => __( 'Image Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'center',
						),
						'image_border_color' => array(
							'type'  => 'color',
							'label' => __( 'Image Border Color', 'bb-vapor-modules-pro' ),
						),
						'image_border_type'  => array(
							'type'    => 'select',
							'label'   => __( 'Image Border Type', 'bb-vapor-modules-pro' ),
							'default' => 'none',
							'options' => array(
								'none'   => __( 'None', 'bb-vapor-modules-pro' ),
								'solid'  => __( 'Solid', 'bb-vapor-modules-pro' ),
								'dashed' => __( 'Dashed', 'bb-vapor-modules-pro' ),
								'dotted' => __( 'Dotted', 'bb-vapor-modules-pro' ),
								'double' => __( 'Double', 'bb-vapor-modules-pro' ),
							),
						),
						'image_border_width' => array(
							'type'    => 'unit',
							'label'   => __( 'Image Border Width', 'bb-vapor-modules-pro' ),
							'default' => 0,
						),
					),
				),
			),
		),
	)
);
