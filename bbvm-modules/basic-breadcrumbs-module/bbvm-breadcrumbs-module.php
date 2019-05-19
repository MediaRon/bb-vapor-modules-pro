<?php
class BBVapor_Breadcrumbs_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Breadcrumbs', 'bb-vapor-modules' ),
			'description'     => __( 'Breadcrumbs for Beaver Builder', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/basic-breadcrumbs-module/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/basic-breadcrumbs-module/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
	public function enqueue_scripts() {
		if( $this->settings && 'none' !== $this->settings->breadcrumb_select_field ) {
			$this->add_css('bbvm-breadcrumbs-for-beaver-builder', BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/basic-breadcrumbs-module/css/frontend.css' );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Breadcrumbs_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Breadcrumbs', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'breadcrumb_select_field' => array(
						'type'          => 'select',
						'label'         => __( 'Select Breadcrumb Service', 'bb-vapor-modules' ),
						'default'       => 'none',
						'options'       => array(
							'none'                  => __( 'No breadcrumbs', 'bb-vapor-modules' ),
							'yoast'                 => __( 'Yoast SEO', 'bb-vapor-modules' ),
							'breadcrumb_navxt'      => __( 'Breadcrumb NavXT', 'bb-vapor-modules' ),
							'seopress'              => __( 'SEOPress', 'bb-vapor-modules' ),
							'rankmath'              => __( 'Rank Math', 'bb-vapor-modules' ),
						),
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
					'breadcrumb_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Select a Padding', 'bb-vapor-modules' ),
					),
					'breadcrumb_background_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Background Color', 'bb-vapor-modules' ),
						'default' => '#FFFFFF',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'breadcrumb_text_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Text Color', 'bb-vapor-modules' ),
						'default' => '#000000',
						'show_reset'    => true,
					),
					'breadcrumb_link_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Link Color', 'bb-vapor-modules' ),
						'default' => '#000000',
						'show_reset'    => true,
					),
					'breadcrumb_link_hover_color' => array(
						'type' => 'color',
						'label' => __( 'Select a Link Hover Color', 'bb-vapor-modules' ),
						'default' => '#000000',
						'show_reset'    => true,
						'show_alpha'    => true
					),
					'breadcrumb_typography' => array(
						'type' => 'typography',
						'label' => __( 'Typography', 'bb-vapor-modules' ),
						'preview'    => array(
							'type'	    => 'css',
							'selector'  => '.fl-bbvm-breadcrumbs-for-beaverbuilder',
						),
					)
				)
			)
		)
	)
) );
