<?php //phpcs:ignore
class BBVapor_LearnDash_Topics extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Topics', 'bb-vapor-modules-pro' ),
				'description'     => __( 'LearnDash Topics', 'bb-vapor-modules-pro' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-topics/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-topics/',
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
	'BBVapor_LearnDash_Topics',
	array(
		'learndash'  => array(
			'title' => __( 'LearnDash Options', 'bb-vapor-modules-pro' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'options'    => array(
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'container' => array(
					'title'  => __( 'Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'category_selector' => array(
							'type'    => 'select',
							'label'   => __( 'Display a Category Dropdown', 'bb-vapor-modules-pro' ),
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
		'styles'     => array(
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'icon' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'background_color'       => array(
							'type'        => 'color',
							'label'       => __( 'Topic Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha'  => true,
							'show_remove' => true,
						),
						'background_color_hover' => array(
							'type'        => 'color',
							'label'       => __( 'Topic Background Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha'  => true,
							'show_remove' => true,
						),
						'anchor_color'           => array(
							'type'        => 'color',
							'label'       => __( 'Topic Link Color', 'bb-vapor-modules-pro' ),
							'show_alpha'  => true,
							'show_remove' => true,
						),
						'anchor_color_hover'     => array(
							'type'        => 'color',
							'label'       => __( 'Topic Link Color on Hover', 'bb-vapor-modules-pro' ),
							'show_alpha'  => true,
							'show_remove' => true,
						),
						'border'                 => array(
							'type'  => 'border',
							'label' => __( 'Topic Item Border', 'bb-vapor-modules-pro' ),
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
						'topic_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Topic Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
