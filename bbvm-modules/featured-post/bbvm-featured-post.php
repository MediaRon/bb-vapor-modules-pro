<?php // phpcs:ignore
class BBVapor_Featured_Post extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Featured Post', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Featured Post for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/featured-post/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/featured-post/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
FLBuilder::register_module(
	'BBVapor_Featured_Post',
	array(
		'post_select' => array(
			'title' => __( 'Post Select', 'bb-vapor-modules-pro' ),
			'file'  => FL_BUILDER_DIR . 'includes/loop-settings.php',
		),
		'display'     => array(
			'title'    => __( 'Display', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'featured' => array(
					'title'  => __( 'Featured Image', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'display_featured_image' => array(
							'type'    => 'select',
							'label'   => __( 'Display Featured Image?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'featured_image_type',
									),
								),
							),
						),
						'featured_image_type'    => array(
							'type'    => 'select',
							'label'   => __( 'Featured Image Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'featured' => __( 'Featured Image', 'bb-vapor-modules-pro' ),
								'gravatar' => __( 'Gravatar', 'bb-vapor-modules-pro' ),
							),
							'default' => 'featured',
							'toggle'  => array(
								'gravatar' => array( 'fields' => array( 'gravatar_size' ) ),
							),
						),
					),
				),
				'category' => array(
					'title'  => __( 'Category', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'display_category' => array(
							'type'    => 'select',
							'label'   => __( 'Display Category?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'category_name' ),
									'tabs'   => array( 'category' ),
								),
							),
						),
						'category_name'    => array(
							'type'    => 'text',
							'label'   => __( 'Category Name', 'bb-vapor-modules-pro' ),
							'default' => 'Featured',
						),
					),
				),
				'readmore' => array(
					'title'  => __( 'Read More', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'display_continue_reading' => array(
							'type'    => 'select',
							'label'   => __( 'Display Read More Link?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'continue_reading' ),
									'tabs'   => array( 'read_more' ),
								),
							),
						),
						'continue_reading'         => array(
							'type'    => 'text',
							'label'   => __( 'Read More	 Text', 'bb-vapor-modules-pro' ),
							'default' => 'Read More →',
						),
					),
				),
			),
		),
		'category'    => array(
			'title'    => __( 'Category Display', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'category_display' => array(
					'title'  => __( 'Category Display', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'category_padding'          => array(
							'type'  => 'dimension',
							'label' => __( 'Padding', 'bb-vapor-modules-pro' ),
						),
						'category_color'            => array(
							'type'       => 'color',
							'label'      => __( 'Category Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'category_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Category Background', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'category_border'           => array(
							'type'  => 'border',
							'label' => __( 'Category Border', 'bb-vapor-modules-pro' ),
						),
						'category_link_display'     => array(
							'type'    => 'select',
							'label'   => __( 'Show Category Link', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'category_link',
									),
								),
							),
						),
						'category_link'             => array(
							'type'  => 'link',
							'label' => __( 'Category Link', 'bb-vapor-modules-pro' ),
						),
						'category_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Category Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'post_text'   => array(
			'title'    => __( 'Title Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'post_text_options' => array(
					'title'  => __( 'Title Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'title_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Title Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'title_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Title Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'title_typography'  => array(
							'type'       => 'typography',
							'label'      => __( 'Title Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'read_more'   => array(
			'title'    => __( 'Read More Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'read_more_options' => array(
					'title'  => __( 'Read More Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'read_more_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Read More Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'read_more_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Read More Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'read_more_typography'  => array(
							'type'       => 'typography',
							'label'      => __( 'Read More Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
