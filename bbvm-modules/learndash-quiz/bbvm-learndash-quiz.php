<?php //phpcs:ignore
class BBVapor_LearnDash_Quiz extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'LearnDash Quiz', 'bb-vapor-modules-pro' ),
				'description'     => __( 'LearnDash Quiz', 'bb-vapor-modules-pro' ),
				'category'        => __( 'LearnDash', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/learndash-quiz/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/learndash-quiz/',
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
	'BBVapor_LearnDash_Quiz',
	array(
		'learndash' => array(
			'title' => __( 'LearnDash Options', 'bb-vapor-modules-pro' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'button'    => array(
			'title'    => __( 'Button', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'options' => array(
					'title'  => __( 'Button Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button_align'           => array(
							'type'    => 'align',
							'label'   => __( 'Button Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'left',
						),
						'label_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Button Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'text_color'             => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'text_color_hover'       => array(
							'type'       => 'color',
							'label'      => __( 'Text Color on Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'background_color_hover' => array(
							'type'       => 'color',
							'label'      => __( 'Background Color on Hover', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'button_border'          => array(
							'type'  => 'border',
							'label' => __( 'Border', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
