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
						'calendar_name'     => array(
							'type'  => 'text',
							'label' => __( 'Calendly Calendar Name', 'bb-vapor-modules-pro' ),
						),
						'calendar_type'     => array(
							'type'    => 'select',
							'label'   => __( 'Embed Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'inline'    => __( 'Inline', 'bb-vapor-modules-pro' ),
								'popup'     => __( 'Popup Widget', 'bb-vapor-modules-pro' ),
								'popuptext' => __( 'Popup Text Link', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'fields' => array(
									'popup' => array(
										'popup_button_text',
										'popup_button_background_color',
										'popup_button_text_color',
									),
								),
							),
						),
						'popup_button_text' => array(
							'type'    => 'text',
							'label'   => __( 'Popup Button Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Schedule time with me', 'bb-vapor-modules-pro' ),
						),
						'popup_button_background_color' => array(
							'type'    => 'color',
							'label'   => __( 'Popup Button Background Color', 'bb-vapor-modules-pro' ),
							'default' => '00A2FF',
						),
						'popup_button_text_color' => array(
							'type'    => 'color',
							'label'   => __( 'Popup Button Text Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'hide_page_details' => array(
							'type'    => 'select',
							'label'   => __( 'Hide Page Details', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'background_color'  => array(
							'type'    => 'color',
							'label'   => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'text_color'        => array(
							'type'    => 'color',
							'label'   => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'default' => '4D5055',
						),
						'button_color'      => array(
							'type'    => 'color',
							'label'   => __( 'Button and Link Color', 'bb-vapor-modules-pro' ),
							'default' => '00A2FF',
						),
					),
				),
			),
		),
	)
);
