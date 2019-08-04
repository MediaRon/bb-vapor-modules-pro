<?php // phpcs:ignore
class BBVapor_EDD_Download_Count_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'EDD Download Count', 'bb-vapor-modules-pro' ),
				'description'     => __( 'EDD Download Count', 'bb-vapor-modules-pro' ),
				'category'        => __( 'EDD', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/edd-download-count/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/edd-download-count/',
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
	'BBVapor_EDD_Download_Count_Module',
	array(
		'general' => array( // Tab
			'title'    => __( 'General', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'EDD Download Count', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'download_text'    => array(
							'type'    => 'text',
							'label'   => __( 'Enter Download Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Downloads', 'bb-vapor-modules-pro' ),
						),
						'product'          => array(
							'type'   => 'suggest',
							'label'  => __( 'EDD Product', 'fl-builder' ),
							'action' => 'fl_as_posts', // Search posts.
							'data'   => 'download', // Slug of the post type to search.
							'limit'  => 1,
						),
						'text_color'       => array(
							'type'    => 'color',
							'label'   => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'typography'       => array(
							'type'  => 'typography',
							'label' => __( 'Text Typography', 'bb-vapor-modules-pro' ),
						),
						'padding'          => array(
							'type'  => 'dimension',
							'label' => __( 'Padding', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
