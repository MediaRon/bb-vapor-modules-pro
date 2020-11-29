<?php // phpcs:ignore
class BBVapor_Jetpack_Related_Posts_Module extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Jetpack Related Posts', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Jetpack Related Posts for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'External Plugins', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/jetpack-related-posts/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/jetpack-related-posts/',
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
	'BBVapor_Jetpack_Related_Posts_Module',
	array(
		'general'    => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Jetpack Related Posts', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'title'           => array(
							'type'    => 'text',
							'label'   => __( 'Enter Related Post Title', 'bb-vapor-modules-pro' ),
							'default' => __( 'Related Posts', 'bb-vapor-modules-pro' ),
						),
						'items'           => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Items', 'bb-vapor-modules-pro' ),
							'default' => '3',
							'slider'  => array(
								'min'  => 1,
								'max'  => 6,
								'step' => 1,
							),
						),
						'layout'          => array(
							'type'    => 'select',
							'label'   => __( 'Related Posts Layout', 'bb-vapor-modules-pro' ),
							'options' => array(
								'grid' => __( 'Grid', 'bb-vapor-modules-pro' ),
								'list' => __( 'List', 'bb-vapor-modules-pro' ),
							),
							'default' => 'grid',
						),
						'show_title'      => array(
							'type'    => 'select',
							'label'   => __( 'Show Title?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array( 'fields' => array( 'headline_title' ) ),
							),
						),
						'show_thumbnails' => array(
							'type'    => 'select',
							'label'   => __( 'Show Thumbnails?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
							'toggle'  => array(
								'yes' => array( 'fields' => array( 'fallback_image' ) ),
							),
						),
						'fallback_image'  => array(
							'type'        => 'photo',
							'label'       => __( 'Fallback Image', 'bb-vapor-modules-pro' ),
							'description' => __( 'Recommended image size is 320x200', 'bb-vapor-modules-pro' ),
						),
						'show_date'       => array(
							'type'    => 'select',
							'label'   => __( 'Show Date?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'show_context'    => array(
							'type'    => 'select',
							'label'   => __( 'Show Context?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
					),
				),
			),
		),
		'styles'     => array(
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'heading_color'         => array(
							'type'    => 'color',
							'label'   => __( 'Heading Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'text_color'            => array(
							'type'    => 'color',
							'label'   => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'title_color'           => array(
							'type'    => 'color',
							'label'   => __( 'Title Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'related_posts_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'related_posts_margin'  => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'typography' => array(
			'title'    => __( 'Typography', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Typography', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'heading_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Heading Typography', 'bb-vapor-modules-pro' ),
						),
						'link_typography'    => array(
							'type'  => 'typography',
							'label' => __( 'Link Typography', 'bb-vapor-modules-pro' ),
						),
						'excerpt_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Excerpt Typography', 'bb-vapor-modules-pro' ),
						),
						'date_typography'    => array(
							'type'  => 'typography',
							'label' => __( 'Date Typography', 'bb-vapor-modules-pro' ),
						),
						'context_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Context Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
add_post_type_support( 'page', 'excerpt' );
