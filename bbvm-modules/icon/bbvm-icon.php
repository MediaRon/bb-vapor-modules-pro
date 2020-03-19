<?php // phpcs:ignore
class BBVapor_Icon extends FLBuilderModule {

	/**
	 * Class Constructor.
	 *
	 * @credit PowerPack for inspiration.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Icon', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add an icon to your site', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/icon/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/icon/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => true, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Icon',
	array(
		'general'        => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'icon' => array(
					'title'  => __( 'Icon/Image', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'icon_photo' => array(
							'type'    => 'select',
							'label'   => __( 'Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'icon'  => __( 'Icon', 'bb-vapor-modules-pro' ),
								'photo' => __( 'Photo', 'bb-vapor-modules-pro' ),
							),
							'default' => 'icon',
							'toggle'  => array(
								'icon'  => array(
									'fields' => array(
										'icon',
									),
									'tabs'   => array(
										'icon_styles',
									),
								),
								'photo' => array(
									'fields' => array(
										'image',
									),
									'tabs'   => array(
										'image_styles',
									),
								),
							),
						),
						'icon'       => array(
							'type'        => 'icon',
							'label'       => __( 'Icon', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
						'image'      => array(
							'type'        => 'photo',
							'label'       => __( 'Image', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
							'help'        => __( 'Please select a square image for best results.', 'bb-vapor-modules-pro' ),
						),
						'size'       => array(
							'type'       => 'unit',
							'label'      => __( 'Size', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'default'    => 30,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.bbvm-icon img,.bbvm-icon i',
										'property' => 'font-size',
										'unit'     => 'px',
									),
									array(
										'selector' => '.bbvm-icon img,.bbvm-icon i',
										'property' => 'max-width',
										'unit'     => 'px',
									),
									array(
										'selector' => '.bbvm-icon img,.bbvm-icon i',
										'property' => 'max-height',
										'unit'     => 'px',
									),
									array(
										'selector' => '.bbvm-icon img,.bbvm-icon i',
										'property' => 'min-height',
										'unit'     => 'px',
									),
									array(
										'selector' => '.bbvm-icon img,.bbvm-icon i',
										'property' => 'min-width',
										'unit'     => 'px',
									),
								),
							),
						),
						'link'       => array(
							'type'          => 'link',
							'label'         => __( 'Link', 'bb-vapor-modules-pro' ),
							'show_target'   => true,
							'show_nofollow' => true,
						),
					),
				),
				'text' => array(
					'title'  => __( 'Text', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'text' => array(
							'type'    => 'editor',
							'label'   => __( 'Content', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'text',
								'selector' => '.bbvm-text',
							),
						),
					),
				),
			),
		),
		'icon_styles'    => array(
			'title'    => __( 'Icon Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'icon_styles' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'icon_color'                  => array(
							'type'       => 'color',
							'label'      => __( 'Icon Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'color',
								'selector' => '.bbvm-icon i',
							),
						),
						'icon_color_hover'            => array(
							'type'       => 'color',
							'label'      => __( 'Icon Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'color',
								'selector' => '.bbvm-icon i:hover',
							),
						),
						'icon_background_type'        => array(
							'type'    => 'select',
							'label'   => __( 'Background Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'     => __( 'None', 'bb-vapor-modules-pro' ),
								'color'    => __( 'Color', 'bb-vapor-modules-pro' ),
								'gradient' => __( 'Gradient', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'color'    => array(
									'fields' => array(
										'icon_background_color',
										'icon_background_color_hover',
									),
								),
								'gradient' => array(
									'fields' => array(
										'icon_gradient_color',
										'icon_gradient_color_hover',
									),
								),
							),
							'default' => 'none',
						),
						'icon_padding'                => array(
							'type'       => 'dimension',
							'label'      => __( 'Icon Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'padding',
								'selector' => '.bbvm-icon i',
							),
						),
						'icon_appearance'             => array(
							'type'    => 'select',
							'label'   => __( 'Icon Appearance', 'bb-vapor-modules-pro' ),
							'options' => array(
								'square' => __( 'Square', 'bb-vapor-modules-pro' ),
								'circle' => __( 'Circular', 'bb-vapor-modules-pro' ),
							),
						),
						'icon_background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Icon Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'background',
								'selector' => '.bbvm-icon i',
							),
						),
						'icon_background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Icon Background Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'background',
								'selector' => '.bbvm-icon i:hover',
							),
						),
						'icon_gradient_color'         => array(
							'type'    => 'gradient',
							'label'   => __( 'Icon Background Gradient Color', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'property' => 'background',
								'selector' => '.bbvm-icon i',
							),
						),
						'icon_gradient_color_hover'   => array(
							'type'    => 'gradient',
							'label'   => __( 'Icon Background Gradient on Hover', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'property' => 'background',
								'selector' => '.bbvm-icon i:hover',
							),
						),
					),
				),
			),
		),
		'image_styles'   => array(
			'title'    => __( 'Image Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'icon_styles' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'image_background_type'        => array(
							'type'    => 'select',
							'label'   => __( 'Background Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'     => __( 'None', 'bb-vapor-modules-pro' ),
								'color'    => __( 'Color', 'bb-vapor-modules-pro' ),
								'gradient' => __( 'Gradient', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'color'    => array(
									'fields' => array(
										'image_background_color',
										'image_background_color_hover',
									),
								),
								'gradient' => array(
									'fields' => array(
										'image_gradient_color',
										'image_gradient_color_hover',
									),
								),
							),
							'default' => 'none',
						),
						'image_padding'                => array(
							'type'       => 'dimension',
							'label'      => __( 'Image Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'padding',
								'selector' => '.bbvm-icon img',
							),
						),
						'image_appearance'             => array(
							'type'    => 'select',
							'label'   => __( 'Image Appearance', 'bb-vapor-modules-pro' ),
							'options' => array(
								'square' => __( 'Square', 'bb-vapor-modules-pro' ),
								'circle' => __( 'Circular', 'bb-vapor-modules-pro' ),
							),
						),
						'image_background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Image Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'background-color',
								'selector' => '.bbvm-icon img',
							),
						),
						'image_background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Image Background Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'background-color',
								'selector' => '.bbvm-icon img:hover',
							),
						),
						'image_gradient_color'         => array(
							'type'    => 'gradient',
							'label'   => __( 'Image Background Gradient Color', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'property' => 'background',
								'selector' => '.bbvm-icon img',
							),
						),
						'image_gradient_color_hover'   => array(
							'type'    => 'gradient',
							'label'   => __( 'Image Background Gradient on Hover', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'property' => 'background',
								'selector' => '.bbvm-icon img:hover',
							),
						),
					),
				),
			),
		),
		'general_styles' => array(
			'title'    => __( 'General Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general_styles' => array(
					'title'  => __( 'General Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'vertical_alignment' => array(
							'type'    => 'select',
							'label'   => __( 'Vertical Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'top',
							'options' => array(
								'top'    => __( 'Top', 'bb-vapor-modules-pro' ),
								'middle' => __( 'Middle', 'bb-vapor-modules-pro' ),
								'bottom' => __( 'Bottom', 'bb-vapor-modules-pro' ),
							),
						),
						'alignment'          => array(
							'type'    => 'align',
							'label'   => __( 'Horizontal Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'left',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-icon-wrapper',
								'property' => 'justify-content',
							),
							'values'  => array(
								'left'   => 'flex-start',
								'center' => 'center',
								'right'  => 'flex-end',
							),
						),
						'spacing'            => array(
							'type'    => 'unit',
							'label'   => __( 'Text Spacing', 'bb-vapor-modules-pro' ),
							'unit'    => 'px',
							'slider'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 1,
							),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-text',
								'property' => 'padding-left',
								'unit'     => 'px',
							),
							'default' => 0,
						),
						'text_color'         => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-text',
								'property' => 'color',
							),
						),
						'text_typography'    => array(
							'type'       => 'typography',
							'label'      => __( 'Text Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-text',
							),
						),
					),
				),
			),
		),
	)
);
