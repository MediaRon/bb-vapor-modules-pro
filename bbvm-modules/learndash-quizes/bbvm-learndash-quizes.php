<?php //phpcs:ignore
class BBVapor_LearnDash_Quizes extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Quizes', 'bb-vapor-modules-pro' ),
				'description'     => __( 'LearnDash Quizes', 'bb-vapor-modules-pro' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-quizes/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-quizes/',
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
	'BBVapor_LearnDash_Quizes',
	array(
		'learndash'  => array(
			'title' => __( 'LearnDash Options', 'bb-vapor-modules-pro' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'styles'     => array(
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'icon' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'background_color'       => array(
							'type'        => 'color',
							'label'       => __( 'Quiz Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha'  => true,
							'show_remove' => true,
						),
						'background_color_hover' => array(
							'type'        => 'color',
							'label'       => __( 'Quiz Background Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha'  => true,
							'show_remove' => true,
						),
						'anchor_color'           => array(
							'type'        => 'color',
							'label'       => __( 'Quiz Link Color', 'bb-vapor-modules-pro' ),
							'show_alpha'  => true,
							'show_remove' => true,
						),
						'anchor_color_hover'     => array(
							'type'        => 'color',
							'label'       => __( 'Quiz Link Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha'  => true,
							'show_remove' => true,
						),
						'border'                 => array(
							'type'  => 'border',
							'label' => __( 'Quiz Item Border', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'typography' => array(
			'title'    => __( 'Typography', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'icon' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'quiz_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Quiz Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
