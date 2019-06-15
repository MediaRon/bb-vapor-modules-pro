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
		'general'       => array( // Tab
			'title'         => __( 'General', 'bb-vapor-modules-pro' ), // Tab title
			'sections'      => array( // Tab Sections
				'general'       => array( // Section
					'title'         => __('Category Selection', 'bb-vapor-modules-pro'), // Section Title
					'fields'        => array( // Section Fields
						'category_title' => array(
							'type' => 'text',
							'label' => __( 'Category Name', 'bb-vapor-modules-pro' ),
							'help' => __( 'Leave blank to use the default category name', 'bb-vapor-modules-pro' ),
							'default' => ''
						),
						'category_width' => array(
							'type' => 'unit',
							'label' => __( 'Category Title Max Width', 'bb-vapor-modules-pro' ),
							'help' => __( 'The maximum width of the category text. Default is 70%.', 'bb-vapor-modules-pro' ),
							'default' => '70',
							'responsive' => true,
							'description' => '%',
						),
						'category_title_padding' => array(
							'type' => 'dimension',
							'label' => __( 'Category Title Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'min_height' => array(
							'type'          => 'unit',
							'label'         => __( 'Item Height', 'bb-vapor-modules-pro' ),
							'default'       => '400',
							'responsive'    => true,
							'description'   => 'px',
						),
						'inner_margin' => array(
							'type' => 'dimension',
							'label' => __( 'Inner Margin', 'bb-vapor-modules-pro' ),
							'description' => __( 'Recommended margin is 20', 'bb-vapor-modules-pro' ),
							'responsive' => true
						),
						'link_category' => array(
							'type'          => 'select',
							'label'         => __( 'Link Entire Container to Category', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no' => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'category_text_color' => array(
							'type' => 'color',
							'label' => __( 'Category Color', 'bb-vapor-modules-pro' ),
							'default' => '000000'
						),
						'category_typography' => array(
							'type' => 'typography',
							'label' => __( 'Category Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true
						),
						'border_style' => array(
							'type'          => 'select',
							'label'         => __( 'Select Style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'inner_border' => __( 'Inner Border', 'bb-vapor-modules-pro' ),
								'no_border' => __( 'No Border', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no_border',
							'toggle' => array( 'inner_border' => array( 'fields' => array( 'border_width', 'border_color', 'border_color_hover' ) ) )
						),
						'border_width' => array(
							'type' => 'unit',
							'label' => __( 'Border Width', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default' => '2'
						),
						'border_color' => array(
							'type'          => 'color',
							'label'         => __( 'Border Color', 'bb-vapor-modules-pro' ),
							'default'       => '000000',
						),
						'border_color_hover' => array(
							'type'          => 'color',
							'label'         => __( 'Border Hover Color', 'bb-vapor-modules-pro' ),
							'default'       => '333333',
						),
						'category_padding' => array(
							'type'          => 'dimension',
							'label'         => __( 'Category Padding', 'bb-vapor-modules-pro' ),
							'responsive'    => true,
						),
						'show_button' => array(
							'type' => 'select',
							'label' => __( 'Show Button', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no' => __( 'No', 'bb-vapor-modules-pro' )
							),
							'default' => 'no',
							'toggle' => array(
								'yes' => array( 'tabs' => array( 'button' ) )
							)
						)
					)
				)
			)
		),
		'photo'       => array( // Tab
			'title'         => __('Background Photo', 'bb-vapor-modules-pro'), // Tab title
			'sections'      => array( // Tab Sections
				'photo'       => array( // Section
					'title'         => __('Background Photo', 'bb-vapor-modules-pro'), // Section Title
					'fields'        => array( // Section Fields
						'background_photo' => array(
							'type' => 'photo',
							'label' => __( 'Background Photo', 'bb-vapor-modules-pro' ),
							'show_remove'   => false,
						),
						'background_overlay' => array(
							'type'          => 'color',
							'label'         => __( 'Background Overlay', 'bb-vapor-modules-pro' ),
							'default'       => 'rgba(0,0,0,0.5)',
							'show_reset' => true,
							'show_alpha' => true,

						),
						'background_overlay_hover' => array(
							'type'          => 'color',
							'label'         => __( 'Background Overlay Hover', 'bb-vapor-modules-pro' ),
							'default'       => 'rgba(0,0,0,0.3)',
							'show_reset' => true,
							'show_alpha' => true,

						),
					)
				)
			)
		),
		'button'       => array( // Tab
			'title'         => __('Button', 'bb-vapor-modules-pro'), // Tab title
			'sections'      => array( // Tab Sections
				'button'       => array( // Section
					'title'         => __('Button', 'bb-vapor-modules-pro'), // Section Title
					'fields'        => array( // Section Fields
						'button_text' => array(
							'type' => 'text',
							'label' => __( 'Button Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'View', 'bb-vapor-modules-pro' ),
						),
						'button_background' => array(
							'type' => 'color',
							'label' => __( 'Button Background', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default' => 'rgba(0,0,0,0)'
						),
						'button_background_hover' => array(
							'type' => 'color',
							'label' => __( 'Button Background Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default' => 'rgba(255,255,255,1)'
						),
						'button_color' => array(
							'type' => 'color',
							'label' => __( 'Button Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default' => 'FFFFFF'
						),
						'button_color_hover' => array(
							'type' => 'color',
							'label' => __( 'Button Text Hover Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default' => '000000'
						),
						'button_border_color' => array(
							'type' => 'color',
							'label' => __( 'Button Border Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default' => '000000'
						),
						'button_border_color_hover' => array(
							'type' => 'color',
							'label' => __( 'Button Border Color on Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'button_border_width' => array(
							'type' => 'unit',
							'label' => __( 'Button Border Width', 'bb-vapor-modules-pro' ),
							'default' => '2',
						),
						'button_border_width_hover' => array(
							'type' => 'unit',
							'label' => __( 'Button Border Width on Hover', 'bb-vapor-modules-pro' ),
							'default' => '0',
						),
						'button_padding' => array(
							'type' => 'dimension',
							'label' => __( 'Button Padding', 'bb-vapor-modules-pro' ),
						),
						'button_typography' => array(
							'type' => 'typography',
							'label' => __( 'Button Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
