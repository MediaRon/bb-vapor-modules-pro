<?php // phpcs:ignore
class BBVapor_Copyright_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Copyright', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Copyright for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/copyright/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/copyright/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		$this->add_css( 'bbvm-copyright-for-beaver-builder', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/copyright/css/frontend.css' );
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Copyright_Module',
	array(
		'general' => array( // Tab
			'title'    => __( 'General', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'Copyright', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'copyright_site_field' => array(
							'type'    => 'text',
							'label'   => __( 'Enter your site name', 'bb-vapor-modules-pro' ),
							'default' => get_bloginfo( 'sitename' ),
						),
						'copyright_text_field' => array(
							'type'    => 'text',
							'label'   => __( 'Enter your copyright text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Copyright', 'bb-vapor-modules-pro' ),
						),
						'copyright_start_year' => array(
							'type'    => 'text',
							'label'   => __( 'Enter your start year (Leave blank for no start year)', 'bb-vapor-modules-pro' ),
							'default' => date( 'Y' ),
						),
						'copyright_symbol'     => array(
							'type'    => 'text',
							'label'   => __( 'Enter copyright symbol', 'bb-vapor-modules-pro' ),
							'default' => '&copy;',
						),
					),
				),
			),
		),
		'styles'  => array( // Tab
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'styles' => array( // Section
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'copyright_padding'          => array(
							'type'  => 'dimension',
							'label' => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
						),
						'copyright_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Background Color', 'bb-vapor-modules-pro' ),
							'default'    => '#FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'copyright_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Select a Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '#000000',
							'show_reset' => true,
						),
						'copyright_typography'       => array(
							'type'    => 'typography',
							'label'   => __( 'Typography', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-copyright-for-beaverbuilder',
							),
						),
					),
				),
			),
		),
	)
);
