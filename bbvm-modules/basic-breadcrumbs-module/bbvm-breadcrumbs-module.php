<?php // phpcs:ignore
class BBVapor_Breadcrumbs_Module extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Breadcrumbs', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Breadcrumbs for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/basic-breadcrumbs-module/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/basic-breadcrumbs-module/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		$this->add_css( 'bbvm-breadcrumbs-for-beaver-builder', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/basic-breadcrumbs-module/css/frontend.css' );
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Breadcrumbs_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Breadcrumbs', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'breadcrumb_select_field' => array(
							'type'    => 'select',
							'label'   => __( 'Select Breadcrumb Service', 'bb-vapor-modules-pro' ),
							'default' => 'none',
							'options' => array(
								'none'             => __( 'No breadcrumbs', 'bb-vapor-modules-pro' ),
								'yoast'            => __( 'Yoast SEO', 'bb-vapor-modules-pro' ),
								'breadcrumb_navxt' => __( 'Breadcrumb NavXT', 'bb-vapor-modules-pro' ),
								'seopress'         => __( 'SEOPress', 'bb-vapor-modules-pro' ),
								'rankmath'         => __( 'Rank Math', 'bb-vapor-modules-pro' ),
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
						'breadcrumb_padding'          => array(
							'type'    => 'dimension',
							'label'   => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'      => 'css',
								'selector'  => '.fl-bbvm-breadcrumbs-for-beaverbuilder',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'breadcrumb_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Background Color', 'bb-vapor-modules-pro' ),
							'default'    => '#FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.fl-bbvm-breadcrumbs-for-beaverbuilder',
								'property'  => 'background-color',
								'important' => true,
							),
						),
						'breadcrumb_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Select a Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '#000000',
							'show_reset' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.fl-bbvm-breadcrumbs-for-beaverbuilder',
								'property'  => 'color',
								'important' => true,
							),
						),
						'breadcrumb_link_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Select a Link Color', 'bb-vapor-modules-pro' ),
							'default'    => '#000000',
							'show_reset' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.fl-bbvm-breadcrumbs-for-beaverbuilder a',
								'property'  => 'color',
								'important' => true,
							),
						),
						'breadcrumb_link_hover_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Link Hover Color', 'bb-vapor-modules-pro' ),
							'default'    => '#000000',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.fl-bbvm-breadcrumbs-for-beaverbuilder a:hover',
								'property'  => 'color',
								'important' => true,
							),
						),
						'breadcrumb_typography'       => array(
							'type'    => 'typography',
							'label'   => __( 'Typography', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-breadcrumbs-for-beaverbuilder',
							),
						),
					),
				),
			),
		),
	)
);
