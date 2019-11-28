<?php //phpcs:ignore
class BBVapor_Columns extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Columns', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add Columns', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/columns/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/columns/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => true, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Columns',
	array(
		'general' => array(
			'title'    => __( 'Settings', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Settings', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'column_count' => array(
							'type'    => 'select',
							'label'   => __( 'Number of Columns', 'bb-vapor-modules-pro' ),
							'options' => array(
								'1',
								'2',
								'3',
								'4',
								'5',
								'6',
							),
							'default' => '1',
						),
						'content'      => array(
							'type'  => 'editor',
							'label' => __( 'Enter your text here.', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'style'   => array(
			'title'    => __( 'Style', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'style' => array(
					'title'  => __( 'Style', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'background_color'    => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'text_color'          => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'padding'             => array(
							'type'       => 'dimension',
							'label'      => __( 'Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'typography'          => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'column_gap'          => array(
							'type'        => 'unit',
							'label'       => __( 'Column Gap', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => 25,
							'slider'      => array(
								'min'  => 0,
								'max'  => 300,
								'step' => 5,
							),
						),
						'column_border_width' => array(
							'type'        => 'unit',
							'label'       => __( 'Border Width', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => 0,
							'slider'      => array(
								'min'  => 0,
								'max'  => 20,
								'step' => 1,
							),
						),
						'column_border_color' => array(
							'type'       => 'color',
							'label'      => __( 'Border Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'rgba(0,0,0,0)',
						),
					),
				),
			),
		),
	)
);
