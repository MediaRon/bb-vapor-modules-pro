<?php
class BBVapor_Copyright_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Copyright', 'bb-vapor-modules' ),
			'description'     => __( 'Copyright for Beaver Builder', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/copyright/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/copyright/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}

	public function enqueue_scripts() {
		if( $this->settings && ! empty( $this->settings->copyright_site_field ) ) {
			$this->add_css('bbvm-copyright-for-beaver-builder', BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/copyright/css/frontend.css' );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Copyright_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Copyright', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'copyright_site_field' => array(
						'type'          => 'text',
						'label'         => __( 'Enter your site name', 'bb-vapor-modules' ),
						'default'       => get_bloginfo( 'sitename'),
					),
					'copyright_text_field' => array(
						'type'          => 'text',
						'label'         => __( 'Enter your copyright text', 'bb-vapor-modules' ),
						'default'       => __( 'Copyright', 'bb-vapor-modules' ),
					),
					'copyright_start_year' => array(
						'type'          => 'text',
						'label'         => __( 'Enter your start year (Leave blank for no start year)', 'bb-vapor-modules' ),
						'default'       => date('Y'),
					),
					'copyright_symbol' => array(
						'type'          => 'text',
						'label'         => __( 'Enter copyright symbol', 'bb-vapor-modules' ),
						'default'       => '&copy;',
					),
				)
			)
		)
	),
	'styles'       => array( // Tab
		'title'         => __('Styles', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Styles', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'copyright_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select a Padding', 'bb-vapor-modules' ),
					),
					'copyright_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Background Color', 'bb-vapor-modules' ),
						'default' => '#FFFFFF',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'copyright_text_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Text Color', 'bb-vapor-modules' ),
						'default' => '#000000',
						'show_reset'    => true,
					),
					'copyright_typography' => array(
						'type' => 'typography',
						'label' => __( 'Typography', 'bb-vapor-modules' ),
						'preview'    => array(
							'type'	    => 'css',
							'selector'  => '.fl-bbvm-copyright-for-beaverbuilder',
						),
					)
				)
			)
		)
	)
) );
