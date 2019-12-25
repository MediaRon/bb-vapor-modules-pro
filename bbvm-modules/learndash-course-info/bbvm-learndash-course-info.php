<?php //phpcs:ignore
class BBVapor_LearnDash_Course_Info extends FLBuilderModule {

	/**
	 * Holds the settings object.
	 *
	 * @var array $filter_settings Settings object.
	 */
	private static $filter_settings = null;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Course Info', 'bb-vapor-modules-pro' ),
				'description'     => __( 'LearnDash Course Info', 'bb-vapor-modules-pro' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-course-info/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-course-info/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}

	/**
	 * Populate the settings variable.
	 */
	public function sync_settings() {
		self::$filter_settings = $this->settings;
	}

	/**
	 * Filter for course info.
	 *
	 * @param array $args Shortcode attributes.
	 *
	 * @return array Modified arguments.
	 */
	public static function bbvm_course_info_filter( $args ) {
		$show = array();
		if ( 'yes' === self::$filter_settings->show_courses ) {
			$show[] = 'registered';
		}
		if ( 'yes' === self::$filter_settings->show_progress ) {
			$show[] = 'course';
		}
		if ( 'yes' === self::$filter_settings->show_quizzes ) {
			$show[] = 'quiz';
		}
		$args['type'] = $show;
		return $args;
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_LearnDash_Course_Info',
	array(
		'learndash' => array(
			'title' => __( 'LearnDash Options', 'bb-vapor-modules-pro' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'options'   => array(
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'options' => array(
					'title'  => __( 'Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'show_courses'     => array(
							'type'    => 'select',
							'label'   => __( 'Show Courses', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'num',
									),
								),
							),
						),
						'num'              => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Courses', 'bb-vapor-modules-pro' ),
							'default' => 50,
						),
						'show_progress'    => array(
							'type'    => 'select',
							'label'   => __( 'Show Course Progress', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'course_progress',
									),
								),
							),
						),
						'course_progress'  => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Course Progress Items', 'bb-vapor-modules-pro' ),
							'default' => 50,
						),
						'show_quizzes'     => array(
							'type'    => 'select',
							'label'   => __( 'Show Quizzes', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'course_quizzes',
									),
								),
							),
						),
						'course_quizzes'   => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Quiz Items', 'bb-vapor-modules-pro' ),
							'default' => 50,
						),
						'alignment'        => array(
							'type'    => 'align',
							'label'   => __( 'Content Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'left',
						),
						'show_thumbnail'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Thumbnail', 'bb-vapor-modules-pro' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules-pro' ),
								'true'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'true' => array(
									'fields' => array(
										'thumbnail_width',
										'thumbnail_border',
									),
								),
							),
						),
						'thumbnail_width'  => array(
							'type'    => 'unit',
							'label'   => __( 'Thumbnail Max Width', 'bb-vapor-modules-pro' ),
							'default' => 250,
						),
						'thumbnail_border' => array(
							'type'  => 'border',
							'label' => __( 'Thumbnail Border', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
