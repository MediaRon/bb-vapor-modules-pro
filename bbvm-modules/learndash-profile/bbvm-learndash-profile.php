<?php //phpcs:ignore
class BBVapor_LearnDash_Profile extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Profile', 'bb-vapor-modules-pro' ),
				'description'     => __( 'LearnDash Profile', 'bb-vapor-modules-pro' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-profile/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-profile/',
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
	'BBVapor_LearnDash_Profile',
	array(
		'options' => array(
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'orderby' => array(
							'type'    => 'select',
							'label'   => __( 'Order By', 'bb-vapor-modules-pro' ),
							'default' => 'name',
							'options' => array(
								'none'     => __( 'None', 'bb-vapor-modules-pro' ),
								'id'       => __( 'ID', 'bb-vapor-modules-pro' ),
								'author'   => __( 'Author', 'bb-vapor-modules-pro' ),
								'title'    => __( 'Title', 'bb-vapor-modules-pro' ),
								'name'     => __( 'Name', 'bb-vapor-modules-pro' ),
								'date'     => __( 'Date', 'bb-vapor-modules-pro' ),
								'modified' => __( 'Modified', 'bb-vapor-modules-pro' ),
							),
						),
						'order'   => array(
							'type'    => 'select',
							'label'   => __( 'Order', 'bb-vapor-modules-pro' ),
							'default' => 'ASC',
							'options' => array(
								'ASC'  => __( 'A-Z', 'bb-vapor-modules-pro' ),
								'DESC' => __( 'Z-A', 'bb-vapor-modules-pro' ),
							),
						),
						'expand'   => array(
							'type'    => 'select',
							'label'   => __( 'Expand All', 'bb-vapor-modules-pro' ),
							'default' => 'false',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules-pro' ),
								'true'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
						'profile_link'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Profile Link', 'bb-vapor-modules-pro' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules-pro' ),
								'true'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
						'show_header'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Header', 'bb-vapor-modules-pro' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules-pro' ),
								'true'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
						'show_quizzes'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Quizzes', 'bb-vapor-modules-pro' ),
							'default' => 'true',
							'options' => array(
								'false' => __( 'No', 'bb-vapor-modules-pro' ),
								'true'  => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
						'show_search'   => array(
							'type'    => 'select',
							'label'   => __( 'Show Search', 'bb-vapor-modules-pro' ),
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
		'image'   => array(
			'title'    => __( 'Profile Image', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Profile Image', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'profile_appearance' => array(
							'type'    => 'select',
							'label'   => __( 'Appearance', 'bb-vapor-modules-pro' ),
							'default' => 'circular',
							'options' => array(
								'circular' => __( 'Circular', 'bb-vapor-modules-pro' ),
								'square'   => __( 'Square', 'bb-vapor-modules-pro' ),
							),
						),
						'profile_border'     => array(
							'type'  => 'border',
							'label' => __( 'Border', 'bb-vapor-modules-pro' ),
						),
						'profile_width'      => array(
							'type'    => 'unit',
							'label'   => __( 'Image Width', 'bb-vapor-modules-pro' ),
							'default' => 150,
							'slider'  => array(
								'min'  => 25,
								'max'  => 150,
								'step' => 5,
							),
						),
					),
				),
			),
		),
	)
);
