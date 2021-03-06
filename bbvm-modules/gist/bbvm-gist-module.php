<?php // phpcs:ignore
class BBVapor_Gist_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Gist', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Gists for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/gist/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/gist/',
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
	'BBVapor_Gist_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Gist', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'gist'         => array(
							'type'    => 'text',
							'label'   => __( 'Enter Your Gist URL Here', 'bb-vapor-modules-pro' ),
							'default' => '',
						),
						'gist_caption' => array(
							'type'    => 'text',
							'label'   => __( 'Gist Caption', 'bb-vapor-modules-pro' ),
							'default' => '',
						),
						'show_meta'    => array(
							'type'    => 'select',
							'label'   => __( 'Show Meta?', 'bb-vapor-modules-pro' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
		'styles'  => array(
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'gist_padding'          => array(
							'type'  => 'dimension',
							'label' => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
						),
						'gist_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Background Color', 'bb-vapor-modules-pro' ),
							'default'    => '#FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'gist_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Select a Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '#000000',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'gist_border_radius'    => array(
							'type'        => 'unit',
							'label'       => __( 'Select a Border Radius', 'bb-vapor-modules-pro' ),
							'description' => __( 'Useful if you have selected a padding and background color', 'bb-vapor-modules-pro' ),
							'default'     => '0',
						),
						'gist_typography'       => array(
							'type'    => 'typography',
							'label'   => __( 'Typography', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-gist-for-beaverbuilder figcaption',
							),
						),
					),
				),
			),
		),
	)
);
