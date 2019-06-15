<?php
class BBVapor_Category_Grid_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'        => __( 'Category Grid', 'bb-vapor-modules-pro' ),
				'description' => __( 'Category Grid', 'bb-vapor-modules-pro' ),
				'category'    => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'       => __( 'Vapor', 'bb-vapor-modules-pro' ),
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
			'title' => __( 'Category Selection', 'fl-builder' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'options'  => array( // Tab
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'image' => array( // Section
					'title'     => __( 'Image Selection', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'image_type' => array(
							'type'   => 'select',
							'label'   => __( 'Where are your images coming from?', 'bb-vapor-modules-pro' ),
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
						'default'    => 'gallery',
					),
					'acf_field' => array(
						'type'  => 'text',
						'label' => __( 'Enter Your ACF Custom Field Name Here', 'bb-vapor-modules-pro' ),
					),
					'custom'    => array(
						'type'  => 'text',
						'label' => __( 'Enter Your Custom Category Meta Name Here', 'bb-vapor-modules-pro' ),
					),
					'gallery'   => array(
						'type'        => 'gallery',
						'label'       => __( 'Enter Your Gallery Images Here', 'bb-vapor-modules-pro' ),
						'description' => __( 'Each category will be given a descending gallery image, and loop back if there are not enough images', 'bb-vapor-modules-pro' ),
					),

				),
				'box'   => array( // Section
					'title'  => __( 'Box Options', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'inner_margin'        => array(
							'type'        => 'dimension',
							'label'       => __( 'Inner Margin', 'bb-vapor-modules-pro' ),
							'description' => __( 'Recommended margin is 20', 'bb-vapor-modules-pro' ),
							'responsive'  => true,
						),
						'link_category'       => array(
							'type'    => 'select',
							'label'   => __( 'Link Entire Container to Category', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'category_text_color' => array(
							'type'    => 'color',
							'label'   => __( 'Category Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
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
								'inner_border' => __( 'Inner Border', 'bb-vapor-modules-pro' ),
								'no_border'    => __( 'No Border', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no_border',
							'toggle'  => array(
								'inner_border' => array(
									'fields' => array(
										'border_width',
										'border_color',
										'border_color_hover',
									),
								),
							),
						),
						'border_width'        => array(
							'type'        => 'unit',
							'label'       => __( 'Border Width', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '2',
						),
						'border_color'        => array(
							'type'    => 'color',
							'label'   => __( 'Border Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'border_color_hover'  => array(
							'type'    => 'color',
							'label'   => __( 'Border Hover Color', 'bb-vapor-modules-pro' ),
							'default' => '333333',
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
		'overlay'  => array( // Tab
			'title'    => __( 'Overlay', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'photo' => array( // Section
					'title'  => __( 'Overlay Options', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
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
		'button'   => array( // Tab
			'title'    => __( 'Button', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'button' => array( // Section
					'title'  => __( 'Button', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'button_text'               => array(
							'type'    => 'text',
							'label'   => __( 'Button Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'View', 'bb-vapor-modules-pro' ),
						),
						'button_background'         => array(
							'type'       => 'color',
							'label'      => __( 'Button Background', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => 'rgba(0,0,0,0)',
						),
						'button_background_hover'   => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => 'rgba(255,255,255,1)',
						),
						'button_color'              => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
							'show_alpha' => true,
						),
						'button_color_hover'        => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Hover Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => '000000',
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
