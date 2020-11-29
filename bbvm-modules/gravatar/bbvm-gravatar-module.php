<?php // phpcs:ignore
class BBVapor_Gravatar_Module extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Gravatar', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add Gravatar', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/gravatar/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/gravatar/',
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
	'BBVapor_Gravatar_Module',
	array(
		'general' => array(
			'title'    => __( 'Settings', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Settings', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'gravatar_type'     => array(
							'type'    => 'select',
							'label'   => __( 'Gravatar Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'user_id' => __( 'User ID', 'bb-vapor-modules-pro' ),
								'email'   => __( 'Email Address', 'bb-vapor-modules-pro' ),
							),
							'default' => 'email',
							'toggle'  => array(
								'user_id' => array(
									'fields' => array(
										'user_id',
									),
								),
								'email'   => array(
									'fields' => array(
										'email_address',
										'avatar_link',
									),
								),
							),
						),
						'user_id'           => array(
							'type'    => 'unit',
							'label'   => __( 'User ID', 'bb-vapor-modules-pro' ),
							'default' => '0',
						),
						'email_address'     => array(
							'type'    => 'text',
							'label'   => __( 'Email Address', 'bb-vapor-modules-pro' ),
							'default' => '',
						),
						'avatar_size'       => array(
							'type'    => 'unit',
							'label'   => __( 'Avatar Size', 'bb-vapor-modules-pro' ),
							'default' => '100',
						),
						'avatar_type'       => array(
							'type'    => 'select',
							'label'   => __( 'Avatar Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'square'   => __( 'Square', 'bb-vapor-modules-pro' ),
								'circular' => __( 'Circular', 'bb-vapor-modules-pro' ),
							),
							'default' => 'square',
						),
						'avatar_title'      => array(
							'type'    => 'text',
							'label'   => __( 'Avatar Title', 'bb-vapor-modules-pro' ),
							'default' => '',
						),
						'avatar_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Avatar Title Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'avatar_align'      => array(
							'type'    => 'align',
							'label'   => __( 'Avatar Align', 'bb-vapor-modules-pro' ),
							'default' => 'center',
						),
						'avatar_link'       => array(
							'type'    => 'select',
							'label'   => __( 'Link to Gravatar Profile', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
					),
				),
			),
		),
	)
);
