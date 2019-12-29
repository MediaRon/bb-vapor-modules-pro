<?php //phpcs:ignore
class BBVapor_LearnDash_Messages extends FLBuilderModule {

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Messages', 'bb-vapor-modules-pro' ),
				'description'     => __( 'LearnDash Messages', 'bb-vapor-modules-pro' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-messages/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-messages/',
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
	'BBVapor_LearnDash_Messages',
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
						'visitor_content' => array(
							'type'  => 'editor',
							'label' => __( 'Visitor Content', 'bb-vapor-modules-pro' ),
						),
						'student_content' => array(
							'type'  => 'editor',
							'label' => __( 'Student Content', 'bb-vapor-modules-pro' ),
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
						'course_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Content Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'course_typography'  => array(
							'type'  => 'typography',
							'label' => __( 'Content Typography', 'bb-vapor-modules-pro' ),
						),
						'heading_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Heading Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
