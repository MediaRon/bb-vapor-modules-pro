<?php //phpcs:ignore
class BBVapor_LearnDash_Course_Content extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Course Content', 'bb-vapor-modules-pro' ),
				'description'     => __( 'LearnDash Course Content', 'bb-vapor-modules-pro' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/learndash-course-content/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-course-content/',
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
	'BBVapor_LearnDash_Course_Content',
	array(
		'learndash' => array(
			'title' => __( 'LearnDash Options', 'bb-vapor-modules-pro' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'options'   => array(
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'heading_color'                 => array(
							'type'       => 'color',
							'label'      => __( 'Heading Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-content-wrapper .ld-section-heading h2',
								'property' => 'color',
							),
						),
						'heading_typography'            => array(
							'type'      => 'typography',
							'label'     => __( 'Heading Typography', 'bb-vapor-modules-pro' ),
							'resonsive' => true,
							'preview'   => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-content-wrapper .ld-section-heading h2',
							),
						),
						'heading_padding'               => array(
							'type'      => 'dimension',
							'label'     => __( 'Heading Padding', 'bb-vapor-modules-pro' ),
							'resonsive' => true,
							'preview'   => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-item-list .ld-section-heading',
								'property' => 'padding',
							),
						),
						'heading_margin'                => array(
							'type'      => 'dimension',
							'label'     => __( 'Heading Margin', 'bb-vapor-modules-pro' ),
							'resonsive' => true,
							'preview'   => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-item-list .ld-section-heading',
								'property' => 'margin',
							),
						),
						'course_color'                  => array(
							'type'       => 'color',
							'label'      => __( 'Course Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-content-wrapper .ld-item-title',
								'property' => 'color',
							),
						),
						'course_color_hover'            => array(
							'type'       => 'color',
							'label'      => __( 'Course Text Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-content-wrapper .ld-item-title:hover',
								'property' => 'color',
							),
						),
						'course_typography'             => array(
							'type'       => 'typography',
							'label'      => __( 'Course Text Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-content-wrapper .ld-item-title',
								'property' => 'color',
							),
						),
						'course_background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Course Bar Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-content-wrapper .ld-item-list-item-preview',
								'property' => 'background-color',
							),
						),
						'course_background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Course Bar Background Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-content-wrapper .ld-item-list-item-preview:hover',
								'property' => 'background-color',
							),
						),
						'course_border'                 => array(
							'type'    => 'border',
							'label'   => __( 'Course Bar Border', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-learndash-course-content-wrapper .learndash-wrapper .ld-item-list .ld-item-list-item',
								'property' => 'border',
							),
						),
						'expand_color'                  => array(
							'type'       => 'color',
							'label'      => __( 'Expand Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'expand_typography'             => array(
							'type'       => 'typography',
							'label'      => __( 'Expand Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'arrow_color'                   => array(
							'type'       => 'color',
							'label'      => __( 'Expand Arrow Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'accent_background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Accent Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'accent_text_color'             => array(
							'type'       => 'color',
							'label'      => __( 'Accent Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
					),
				),
			),
		),
	)
);
