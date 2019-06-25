<?php // phpcs:ignore
class BBVapor_Unordered_List_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Unordered List', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add Unordered List', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => __( 'Vapor', 'bb-vapor-modules-pro' ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/unordered-list/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/unordered-list/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
FLBuilder::register_settings_form(
	'mrbb_list',
	array(
		'title' => __( 'Add List Item', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'General', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => __( 'Add List Content', 'bb-vapor-modules-pro' ),
						'fields' => array(
							'list_content' => array(
								'type'  => 'editor',
								'label' => __( 'List Content', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
	)
);
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Unordered_List_Module',
	array(
		'general'    => array( // Tab
			'title'    => __( 'Settings', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'Settings', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'list_entries' => array(
							'type'         => 'form',
							'form'         => 'mrbb_list',
							'label'        => __( 'List Content', 'bb-vapor-modules-pro' ),
							'multiple'     => true,
							'preview_text' => 'list_content',
						),
					),
				),
			),
		),
		'styles'     => array( // Tab
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'list_style'               => array(
							'type'    => 'select',
							'options' => array(
								'none'            => __( 'None', 'bb-vapor-modules-pro' ),
								'icon'            => __( 'Icon', 'bb-vapor-modules-pro' ),
								'circular'        => __( 'Circular', 'bb-vapor-modules-pro' ),
								'square'          => __( 'Square', 'bb-vapor-modules-pro' ),
								'bar'             => __( 'Bar', 'bb-vapor-modules-pro' ),
								'hover'           => __( 'Hover Effects', 'bb-vapor-modules-pro' ),
								'list_background' => __( 'List Full Width', 'bb-vapor-modules-pro' ),
							),
							'default' => 'none',
							'toggle'  => array(
								'icon'            => array( 'fields' => array( 'list_icon', 'list_icon_size', 'list_icon_color' ) ),
								'circular'        => array( 'fields' => array( 'background_color', 'hover_color', 'item_size', 'top_offset' ) ),
								'square'          => array( 'fields' => array( 'background_color', 'hover_color', 'item_size', 'top_offset' ) ),
								'bar'             => array( 'fields' => array( 'background_color', 'hover_color', 'bar_width', 'bar_height', 'top_offset', 'allow_spinning_animation' ) ),
								'hover'           => array( 'fields' => array( 'background_color', 'background_hover_color', 'text_color', 'text_color_hover', 'border_bottom_color', 'border_bottom_size', 'hover_padding' ) ),
								'list_background' => array( 'fields' => array( 'background_color', 'text_color', 'border_bottom_color', 'border_bottom_size', 'hover_padding' ) ),
							),
						),
						'list_icon'                => array(
							'type'        => 'icon',
							'show_remove' => 'true',
							'label'       => __( 'List Item Icon', 'bb-vapor-modules-pro' ),
						),
						'list_icon_size'           => array(
							'type'    => 'unit',
							'label'   => __( 'List Item Icon Size', 'bb-vapor-modules-pro' ),
							'default' => '16',
						),
						'list_icon_color'          => array(
							'type'    => 'color',
							'label'   => __( 'List Item Icon Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'background_color'         => array(
							'type'    => 'color',
							'label'   => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'hover_color'              => array(
							'type'    => 'color',
							'label'   => __( 'Hover Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'background_hover_color'   => array(
							'type'    => 'color',
							'label'   => __( 'Hover Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'text_color'               => array(
							'type'    => 'color',
							'label'   => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'text_color_hover'         => array(
							'type'    => 'color',
							'label'   => __( 'Text Hover Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'border_bottom_color'      => array(
							'type'    => 'color',
							'label'   => __( 'Border Bottom Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'border_bottom_size'       => array(
							'type'    => 'unit',
							'label'   => __( 'Border Bottom Size', 'bb-vapor-modules-pro' ),
							'default' => '2',
						),
						'hover_padding'            => array(
							'type'       => 'dimension',
							'label'      => __( 'Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'item_size'                => array(
							'type'    => 'unit',
							'label'   => __( 'Item Size', 'bb-vapor-modules-pro' ),
							'default' => '16',
						),
						'bar_width'                => array(
							'type'    => 'unit',
							'label'   => __( 'Bar Width', 'bb-vapor-modules-pro' ),
							'default' => '16',
						),
						'bar_height'               => array(
							'type'    => 'unit',
							'label'   => __( 'Bar Height', 'bb-vapor-modules-pro' ),
							'default' => '5',
						),
						'allow_spinning_animation' => array(
							'type'    => 'select',
							'label'   => __( 'Spin on Hover?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'top_offset'               => array(
							'type'        => 'unit',
							'label'       => __( 'Top Offset', 'bb-vapor-modules-pro' ),
							'default'     => '0',
							'description' => __( 'Adjust the top offset according to your font size', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'typography' => array( // Tab
			'title'    => __( 'Typography', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'Typography', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'list_typography' => array(
							'type'  => 'typography',
							'label' => __( 'List Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
