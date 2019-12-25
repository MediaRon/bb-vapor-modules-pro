<?php //phpcs:ignore
class BBVapor_LearnDash_Lessons extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Lessons', 'bb-vapor-modules-pro' ),
				'description'     => __( 'LearnDash Lessons', 'bb-vapor-modules-pro' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-lessons/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-lessons/',
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
	'BBVapor_LearnDash_Lessons',
	array(
		'learndash'  => array(
			'title' => __( 'LearnDash Options', 'bb-vapor-modules-pro' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'options'      => array(
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'user_lessons'              => array(
							'type'    => 'select',
							'label'   => __( 'Show User Lessons Only', 'bb-vapor-modules-pro' ),
							'default' => 'false',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules-pro' ),
								'true'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
						'category_selector'         => array(
							'type'    => 'select',
							'label'   => __( 'Display a Category Dropdown', 'bb-vapor-modules-pro' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules-pro' ),
								'true'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'true' => array(
									'fields' => array(
										'category_selector_padding',
									),
								),
							),
						),
						'category_selector_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Category Selector Paddig', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'grid_options' => array(
			'title'    => __( 'Grid Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'col'            => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Columns', 'bb-vapor-modules-pro' ),
							'default' => 1,
							'help'    => __( 'Requires the LearnDash grid add-on', 'bb-vapor-modules-pro' ),
							'slider'  => array(
								'min'  => 1,
								'max'  => 7,
								'step' => 1,
							),
						),
						'progress_bar'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Progress Bar', 'bb-vapor-modules-pro' ),
							'default' => 'false',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules-pro' ),
								'true'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'help'    => __( 'Requires the LearnDash grid add-on', 'bb-vapor-modules-pro' ),
						),
						'show_content'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Content', 'bb-vapor-modules-pro' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules-pro' ),
								'true'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
						'show_thumbnail' => array(
							'type'    => 'select',
							'label'   => __( 'Show Thumbnail', 'bb-vapor-modules-pro' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules-pro' ),
								'true'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
		'styles'       => array(
			'title'    => __( 'Default Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Default Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'lesson_background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Lesson Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'lesson_background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Lesson Background Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'lesson_anchor_color'           => array(
							'type'       => 'color',
							'label'      => __( 'Lesson Link Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'lesson_anchor_color_hover'     => array(
							'type'       => 'color',
							'label'      => __( 'Lesson Link Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'border'                        => array(
							'type'  => 'border',
							'label' => __( 'Lesson Item Border', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'grid_styles'  => array(
			'title'    => __( 'Grid Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'grid'   => array(
					'title'  => __( 'Grid', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'grid_alignment'        => array(
							'type'    => 'align',
							'label'   => __( 'Grid Item Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'center',
						),
						'grid_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Grid Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'grid_border'           => array(
							'type'  => 'border',
							'label' => __( 'Grid Border', 'bb-vapor-modules-pro' ),
						),
						'grid_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Grid Item Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
					),
				),
				'image'  => array(
					'title'  => __( 'Image', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'image_border' => array(
							'type'  => 'border',
							'label' => __( 'Image Border', 'bb-vapor-modules-pro' ),
						),
					),
				),
				'button' => array(
					'title'  => __( 'Button', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button_background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'button_background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'button_text_color'             => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'button_text_color_hover'       => array(
							'type'       => 'color',
							'label'      => __( 'Button Text Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'button_border'                 => array(
							'type'  => 'border',
							'label' => __( 'Button Border', 'bb-vapor-modules-pro' ),
						),
					),
				),
				'colors' => array(
					'title'  => __( 'Colors', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'grid_progress_inactive' => array(
							'type'       => 'color',
							'label'      => __( 'Progress Bar Inactive Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'grid_progress_active'   => array(
							'type'       => 'color',
							'label'      => __( 'Progress Bar Active Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'percentage_text_color'  => array(
							'type'       => 'color',
							'label'      => __( 'Percentage Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'progress_text_color'    => array(
							'type'       => 'color',
							'label'      => __( 'Progress Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'lesson_price_heading'   => array(
							'type'       => 'color',
							'label'      => __( 'Lesson Heading Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'percentage_text_color'  => array(
							'type'       => 'color',
							'label'      => __( 'Percentage Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'progress_text_color'    => array(
							'type'       => 'color',
							'label'      => __( 'Progress Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'lesson_price_heading'   => array(
							'type'       => 'color',
							'label'      => __( 'Lesson Heading Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
					),
				),
			),
		),
		'pagination'   => array(
			'title'    => __( 'Pagination', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Pagination', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'pager_background' => array(
							'type'       => 'color',
							'label'      => __( 'Pager Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'pager_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Pager Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'pager_border'     => array(
							'type'  => 'border',
							'label' => __( 'Pager Border', 'bb-vapor-modules-pro' ),
						),
						'pager_typography' => array(
							'type'      => 'typography',
							'label'     => __( 'Pager Typography', 'bb-vapor-modules-pro' ),
							'resonsive' => true,
						),
						'pager_padding'    => array(
							'type'      => 'dimension',
							'label'     => __( 'Pager Padding', 'bb-vapor-modules-pro' ),
							'resonsive' => true,
						),
						'pager_margin'     => array(
							'type'      => 'dimension',
							'label'     => __( 'Pager Margin', 'bb-vapor-modules-pro' ),
							'resonsive' => true,
						),
					),
				),
			),
		),
		'typography'   => array(
			'title'    => __( 'Typography', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'typography' => array(
					'title'  => __( 'Typography', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'lesson_typography'     => array(
							'type'       => 'typography',
							'label'      => __( 'Lesson Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'price_typography'      => array(
							'type'       => 'typography',
							'label'      => __( 'Lesson Heading Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_typography'     => array(
							'type'       => 'typography',
							'label'      => __( 'Button Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'percentage_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Percentage Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'progress_typography'   => array(
							'type'       => 'typography',
							'label'      => __( 'Progress Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
