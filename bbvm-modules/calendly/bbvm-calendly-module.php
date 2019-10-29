<?php // phpcs:ignore
class BBVapor_Calendly_Module extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Calendly', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Calendly for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/calendly/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/calendly/',
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
	'BBVapor_Calendly_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Calendly', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'calendar_name' => array(
							'type'  => 'text',
							'label' => __( 'Calendly Calendar Name', 'bb-vapor-modules-pro' ),
						),
						'calendar_type' => array(
							'type'    => 'select',
							'label'   => __( 'Embed Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'inline'    => __( 'Inline', 'bb-vapor-modules-pro' ),
								'popup'     => __( 'Popup Widget', 'bb-vapor-modules-pro' ),
								'popuptext' => __( 'Popup Text Link', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
	)
);
