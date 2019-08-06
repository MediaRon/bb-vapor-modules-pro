<?php //phpcs:ignore
/**
 * Timeline
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.3
 * Credit: https://www.florin-pop.com/blog/2019/04/how-to-create-a-timeline-with-react/
 */

/**
 * Timeline
 *
 * @package BB Vapor Modules
 */
class BBVapor_Timeline_Module extends FLBuilderModule {
	/**
	 * Initialize Advanced Headings.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Timeline', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Timeline', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/timeline/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/timeline/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
FLBuilder::register_settings_form(
	'bbvm_timeline',
	array(
		'title' => __( 'Timeline', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'General', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => __( 'Add Headline Text', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'text'                      => array(
								'type'    => 'text',
								'label'   => __( 'Timeline Text', 'bb-vapor-modules-pro' ),
								'default' => '',
							),
							'date'                      => array(
								'type'  => 'date',
								'label' => __( 'Date', 'bb-vapor-modules-pro' ),
							),
							'category'                  => array(
								'type'  => 'text',
								'label' => __( 'Category Name', 'bb-vapor-modules-pro' ),
							),
							'category_text_color'       => array(
								'type'       => 'color',
								'label'      => __( 'Category Text Color', 'bb-vapor-modules-pro' ),
								'show_reset' => true,
								'show_alpha' => true,
								'default'    => '',
							),
							'category_background_color' => array(
								'type'       => 'color',
								'label'      => __( 'Category Background Color', 'bb-vapor-modules-pro' ),
								'show_reset' => true,
								'show_alpha' => true,
							),
							'text_color'                => array(
								'type'       => 'color',
								'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
								'show_reset' => true,
								'show_alpha' => true,
							),
							'background_color'          => array(
								'type'       => 'color',
								'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
								'show_reset' => true,
								'show_alpha' => true,
							),
							'button_text'               => array(
								'type'  => 'text',
								'label' => __( 'Button Text', 'bb-vapor-modules-pro' ),
							),
							'button_link'               => array(
								'type'          => 'link',
								'label'         => __( 'Button Link', 'bb-vapor-modules-pro' ),
								'show_target'   => true,
								'show_nofollow' => true,
							),
						),
					),
				),
			),
			'typography' => array(
				'title'    => __( 'Typography', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => __( 'Typography', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'date_typography' => array(
								'type'  => 'typography',
								'label' => __( 'Date Typography', 'bb-vapor-modules-pro' ),
							),
							'content_typography' => array(
								'type'  => 'typography',
								'label' => __( 'Content Typography', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
	)
);
FLBuilder::register_module(
	'BBVapor_Timeline_Module',
	array(
		'general'     => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Timeline', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'timeline'            => array(
							'type'         => 'form',
							'form'         => 'bbvm_timeline',
							'label'        => __( 'Timeline', 'bb-vapor-modules-pro' ),
							'multiple'     => true,
							'preview_text' => 'text',
						),
					),
				),
			),
		),
		'description' => array(
			'title'    => __( 'Description', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'description' => array(
					'title'  => __( 'Description', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'description'            => array(
							'type'  => 'editor',
							'label' => __( 'Heading Description', 'bb-vapor-modules-pro' ),
						),
						'description_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Description Text Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => '000000',
						),
						'description_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Description Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'separator'   => array(
			'title'    => __( 'Separator', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'description' => array(
					'title'  => __( 'Separator', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'separator_type'          => array(
							'type'    => 'select',
							'label'   => __( 'Separator Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'line'         => __( 'Simple Line', 'bb-vapor-modules-pro' ),
								'line_radius'  => __( 'Line With Radius' ),
								'line_icon'    => __( 'Line With Icon', 'bb-vapor-modules-pro' ),
								'line_photo'   => __( 'Line With Photo', 'bb-vapor-modules-pro' ),
								'line_content' => __( 'Line With Content', 'bb-vapor-modules-pro' ),
								'photo'        => __( 'Background Image', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'line'         => array(
									'fields' => array(
										'line_type',
										'line_color',
										'line_height',
									),
								),
								'line_radius'  => array(
									'fields' => array(
										'line_color',
										'line_height',
										'line_radius',
									),
								),
								'line_icon'    => array(
									'fields' => array(
										'line_color',
										'line_height',
										'icon',
										'icon_size',
										'icon_style',
										'icon_color',
										'icon_background_color',
									),
								),
								'line_photo'   => array(
									'fields' => array(
										'style_photo',
										'line_height',
										'photo_style',
										'photo_size',
										'line_color',
									),
								),
								'line_content' => array(
									'fields' => array(
										'line_color',
										'line_content',
										'line_content_typography',
										'line_height',
										'line_content_color',
									),
								),
								'photo'        => array(
									'fields' => array(
										'background_photo',
										'line_height',
									),
								),
							),
							'default' => 'line',
						),
						'style_photo'             => array(
							'type'  => 'photo',
							'label' => __( 'Select a photo', 'bb-vapor-modules-pro' ),
						),
						'photo_style'             => array(
							'type'    => 'select',
							'label'   => __( 'Select a photo style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'simple'   => __( 'Simple', 'bb-vapor-modules-pro' ),
								'square'   => __( 'Square', 'bb-vapor-modules-pro' ),
								'circular' => __( 'Circular', 'bb-vapor-modules-pro' ),
							),
						),
						'photo_size'              => array(
							'type'        => 'unit',
							'label'       => __( 'Enter a photo size', 'bb-vapor-modules-pro' ),
							'responsive'  => true,
							'description' => 'px',
							'default'     => '50',
						),
						'background_photo'        => array(
							'type'  => 'photo',
							'label' => __( 'Background Photo', 'bb-vapor-modules-pro' ),
						),
						'line_content'            => array(
							'type'    => 'text',
							'label'   => __( 'Separator Content', 'bb-vapor-modules-pro' ),
							'default' => '***',
						),
						'line_content_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Content Color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'line_content_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Separator Content Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'line_height'             => array(
							'type'        => 'unit',
							'label'       => __( 'Height of Separator', 'bb-vapor-modules-pro' ),
							'default'     => '2',
							'description' => 'px',
						),
						'icon'                    => array(
							'type'  => 'icon',
							'label' => __( 'Enter an icon', 'bb-vapor-modules-pro' ),
						),
						'icon_size'               => array(
							'type'    => 'unit',
							'label'   => __( 'Enter an icon size', 'bb-vapor-modules-pro' ),
							'default' => '24',
						),
						'icon_style'              => array(
							'type'    => 'select',
							'label'   => __( 'Select an icon style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'simple'   => __( 'Simple', 'bb-vapor-modules-pro' ),
								'square'   => __( 'Square', 'bb-vapor-modules-pro' ),
								'circular' => __( 'Circular', 'bb-vapor-modules-pro' ),
							),
						),
						'icon_color'              => array(
							'type'       => 'color',
							'label'      => __( 'Enter an icon color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'icon_background_color'   => array(
							'type'       => 'color',
							'label'      => __( 'Enter a background color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'line_radius'             => array(
							'type'    => 'unit',
							'label'   => __( 'Radius of Separator', 'bb-vapor-modules-pro' ),
							'default' => '5',
						),
						'line_type'               => array(
							'type'    => 'select',
							'label'   => __( 'Line Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'solid'  => __( 'Solid', 'bb-vapor-modules-pro' ),
								'dashed' => __( 'Dashed', 'bb-vapor-modules-pro' ),
								'dotted' => __( 'Dotted', 'bb-vapor-modules-pro' ),
								'double' => __( 'Double', 'bb-vapor-modules-pro' ),
							),
							'default' => 'solid',
						),
						'line_color'              => array(
							'type'       => 'color',
							'label'      => __( 'Line Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => '000000',
						),
					),
				),
			),
		),
	)
);
