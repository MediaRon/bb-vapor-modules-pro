<?php //phpcs:ignore
class BBVapor_LearnDash_Course_Status extends FLBuilderModule {

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Course Status', 'bb-vapor-modules-pro' ),
				'description'     => __( 'LearnDash Course Status', 'bb-vapor-modules-pro' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-course-status/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-course-status/',
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
	'BBVapor_LearnDash_Course_Status',
	array(
		'learndash' => array(
			'title' => __( 'LearnDash Options', 'bb-vapor-modules-pro' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'content'   => array(
			'title'    => __( 'Content', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'options' => array(
					'title'  => __( 'Content', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'course_complete_content'   => array(
							'type'  => 'editor',
							'label' => __( 'Course Complete Content', 'bb-vapor-modules-pro' ),
						),
						'course_inprogress_content' => array(
							'type'  => 'editor',
							'label' => __( 'Course In Progress Content', 'bb-vapor-modules-pro' ),
						),
						'course_notstarted_content' => array(
							'type'  => 'editor',
							'label' => __( 'Course Not Started Content', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'options'   => array(
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'options' => array(
					'title'  => __( 'Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'course_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Content Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'course_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
