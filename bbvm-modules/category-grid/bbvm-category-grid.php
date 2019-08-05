<?php //phpcs:ignore
class BBVapor_Category_Grid_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'        => __( 'Category Grid', 'bb-vapor-modules-pro' ),
				'description' => __( 'Category Grid', 'bb-vapor-modules-pro' ),
				'category'    => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'       => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'         => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/category-grid/',
				'url'         => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/category-grid/',
			)
		);
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Category_Grid_Module',
	array(
		'category' => array(
			'title' => __( 'Category Selection', 'bb-vapor-modules-pro' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'options'  => array(
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'image' => array(
					'title'  => __( 'Image Selection', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'image_type'       => array(
							'type'    => 'select',
							'label'   => __( 'Where are your images coming from?', 'bb-vapor-modules-pro' ),
							'default' => 'gallery',
							'options' => array(
								'acf'     => __( 'Advanced Custom Fields', 'bb-vapor-modules-pro' ),
								'custom'  => __( 'Category Meta', 'bb-vapor-modules-pro' ),
								'gallery' => __( 'A Gallery of Images', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'acf'     => array(
									'fields' => array(
										'acf_field',
									),
								),
								'custom'  => array(
									'fields' => array(
										'meta_key',
									),
								),
								'gallery' => array(
									'fields' => array(
										'category_gallery',
									),
								),
							),
						),
						'acf_field'        => array(
							'type'  => 'text',
							'label' => __( 'Enter Your ACF Custom Field Name Here', 'bb-vapor-modules-pro' ),
						),
						'meta_key'         => array(
							'type'  => 'text',
							'label' => __( 'Enter Your Custom Category Meta Name Here', 'bb-vapor-modules-pro' ),
						),
						'category_gallery' => array(
							'type'        => 'multiple-photos',
							'label'       => __( 'Enter Your Gallery Images Here', 'bb-vapor-modules-pro' ),
							'description' => __( 'Each category will be given a ascending gallery image, and loop back if there are not enough images', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
					),
				),
				'grid'  => array(
					'title'  => __( 'Grid Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'min_width'  => array(
							'type'       => 'unit',
							'label'      => __( 'Minimum Width of the Category Column', 'bb-vapor-modules-pro' ),
							'default'    => '290',
							'responsive' => true,
						),
						'min_height' => array(
							'type'       => 'unit',
							'label'      => __( 'Minimum Height of the Category Box', 'bb-vapor-modules-pro' ),
							'default'    => '400',
							'responsive' => true,
						),
					),
				),
			),
		),
		'box'      => array(
			'title'    => __( 'Box Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'box' => array(
					'title'  => __( 'Box Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'link_category'       => array(
							'type'    => 'select',
							'label'   => __( 'Link Entire Container to Category', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'category_text_color' => array(
							'type'       => 'color',
							'label'      => __( 'Category Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'category_text_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Category Color on Hover', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'category_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Category Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'border_style' => array(
							'type'    => 'select',
							'label'   => __( 'Select Style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'outer_border' => __( 'Outer Border', 'bb-vapor-modules-pro' ),
								'no_border'    => __( 'No Border', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no_border',
							'toggle'  => array(
								'outer_border' => array(
									'fields' => array(
										'outer_border',
									),
								),
							),
						),
						'outer_border'        => array(
							'type'  => 'border',
							'label' => __( 'Border', 'bb-vapor-modules-pro' ),
						),
						'category_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Category Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'show_button'         => array(
							'type'    => 'select',
							'label'   => __( 'Show Button', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
							'toggle'  => array(
								'yes' => array(
									'tabs' => array(
										'button',
									),
								),
							),
						),
					),
				),
			),
		),
		'overlay'  => array(
			'title'    => __( 'Overlay', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'photo' => array(
					'title'  => __( 'Overlay Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'background_overlay'       => array(
							'type'       => 'color',
							'label'      => __( 'Background Overlay', 'bb-vapor-modules-pro' ),
							'default'    => 'rgba(0,0,0,0.5)',
							'show_reset' => true,
							'show_alpha' => true,

						),
						'background_overlay_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Background Overlay Hover', 'bb-vapor-modules-pro' ),
							'default'    => 'rgba(0,0,0,0.3)',
							'show_reset' => true,
							'show_alpha' => true,

						),
					),
				),
			),
		),
		'button'   => array(
			'title'    => __( 'Button', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'button' => array(
					'title'  => __( 'Button', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button_text'               => array(
							'type'    => 'text',
							'label'   => __( 'Button Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'View Category', 'bb-vapor-modules-pro' ),
						),
						'button_background'         => array(
							'type'       => 'color',
							'label'      => __( 'Button Background', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => 'FFFFFF',
						),
						'button_background_hover'   => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => '000000',
						),
						'button_color'              => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => '000000',
							'show_alpha' => true,
						),
						'button_color_hover'        => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Hover Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => 'FFFFFF',
						),
						'button_border_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Button Border Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => '000000',
						),
						'button_border_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Button Border Color on Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => '000000',
						),
						'button_border_width'       => array(
							'type'        => 'unit',
							'label'       => __( 'Button Border Width', 'bb-vapor-modules-pro' ),
							'default'     => '2',
							'description' => 'px',
						),
						'button_border_width_hover' => array(
							'type'        => 'unit',
							'label'       => __( 'Button Border Width on Hover', 'bb-vapor-modules-pro' ),
							'default'     => '0',
							'description' => 'px',
						),
						'button_padding'            => array(
							'type'  => 'dimension',
							'label' => __( 'Button Padding', 'bb-vapor-modules-pro' ),
						),
						'button_typography'         => array(
							'type'  => 'typography',
							'label' => __( 'Button Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
