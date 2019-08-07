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
	 * Initialize Timeline.
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
			'general'    => array(
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
							'button_link_color'         => array(
								'type'        => 'color',
								'label'       => __( 'Button Link Color', 'bb-vapor-modules-pro' ),
								'show_alpha ' => true,
								'show_reset'  => true,
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
							'date_typography'     => array(
								'type'  => 'typography',
								'label' => __( 'Date Typography', 'bb-vapor-modules-pro' ),
							),
							'content_typography'  => array(
								'type'  => 'typography',
								'label' => __( 'Content Typography', 'bb-vapor-modules-pro' ),
							),
							'category_typography' => array(
								'type'  => 'typography',
								'label' => __( 'Category Typography', 'bb-vapor-modules-pro' ),
							),
							'link_typography'     => array(
								'type'  => 'typography',
								'label' => __( 'Link Typography', 'bb-vapor-modules-pro' ),
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
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Timeline', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'timeline'       => array(
							'type'         => 'form',
							'form'         => 'bbvm_timeline',
							'label'        => __( 'Timeline', 'bb-vapor-modules-pro' ),
							'multiple'     => true,
							'preview_text' => 'text',
						),
						'timeline_color' => array(
							'type'       => 'color',
							'label'      => __( 'Timeline Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
						),
						'hide_category'  => array(
							'label'   => __( 'Hide Categories', 'bb-vapor-modules-pro' ),
							'type'    => 'select',
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
						),
						'hide_date'      => array(
							'label'   => __( 'Hide Date', 'bb-vapor-modules-pro' ),
							'type'    => 'select',
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
						),
						'hide_button'    => array(
							'label'   => __( 'Hide Button', 'bb-vapor-modules-pro' ),
							'type'    => 'select',
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
	)
);
