<?php // phpcs:ignore
class BBVapor_Simple_Spacer_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Simple Spacer', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Simple Spacer for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Separators/Spacers', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/simple-spacer/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/simple-spacer/',
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
	'BBVapor_Simple_Spacer_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Spacer', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'spacer' => array(
							'type'        => 'unit',
							'label'       => __( 'Height of Spacer', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '10',
							'responsive'  => true,
						),
					),
				),
			),
		),
	)
);
