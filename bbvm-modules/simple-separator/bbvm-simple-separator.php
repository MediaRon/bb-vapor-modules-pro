<?php // phpcs:ignore
class BBVapor_Simple_Separator_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Simple Separator', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Simple Separator for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Separators/Spacers', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/simple-separator/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/simple-separator/',
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
	'BBVapor_Simple_Separator_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Separator', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'height' => array(
							'type'        => 'unit',
							'label'       => __( 'Height of Separator', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '2',
						),
						'color'  => array(
							'type'       => 'color',
							'label'      => __( 'Color of Separator', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'width'  => array(
							'type'        => 'unit',
							'label'       => __( 'Width of Separator', 'bb-vapor-modules-pro' ),
							'default'     => '100',
							'description' => '%',
						),
						'height' => array(
							'type'        => 'unit',
							'label'       => __( 'Height of Separator', 'bb-vapor-modules-pro' ),
							'default'     => '2',
							'description' => 'px',
						),
						'style'  => array(
							'type'    => 'select',
							'label'   => __( 'Separator style', 'bb-vapor-modules-pro' ),
							'default' => 'solid',
							'options' => array(
								'solid'  => __( 'Solid', 'bb-vapor-modules-pro' ),
								'dashed' => __( 'Dashed', 'bb-vapor-modules-pro' ),
								'dotted' => __( 'Dotted', 'bb-vapor-modules-pro' ),
								'double' => __( 'Double', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
	)
);
