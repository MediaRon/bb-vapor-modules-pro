<?php //phpcs:ignore
class BBVapor_Marquee extends FLBuilderModule {

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Marquee', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Marquee', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Text', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/marquee/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/marquee/',
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
	'BBVapor_Marquee',
	array(
		'post_select' => array(
			'title' => __( 'Post Select', 'bb-vapor-modules-pro' ),
			'file'  => FL_BUILDER_DIR . 'includes/loop-settings.php',
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
