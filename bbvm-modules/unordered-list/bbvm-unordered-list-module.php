<?php
class MediaRon_Unordered_List_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Unordered List', 'mediaron-bb-modules' ),
			'description'     => __( 'Add Unordered List', 'mediaron-bb-modules' ),
			'category'        => __( 'Base', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/unordered-list/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/unordered-list/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
FLBuilder::register_settings_form(
	'mrbb_list', array(
		'title' => __( 'Add List Item', 'mediaron-bb-modules' ),
		'tabs'  => array(
			'general'      => array(
				'title'         => __('General', 'mediaron-bb-modules'),
				'sections'      => array(
					'general'       => array(
						'title'         => __( 'Add List Content', 'mediaron-bb-modules' ),
						'fields'        => array(
							'list_content'         => array(
								'type'          => 'editor',
								'label' => __( 'List Content', 'mediaron-bb-modules' )
							),
						)
					)
				),
			),
		)
	)
);
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_Unordered_List_Module', array(
	'general'       => array( // Tab
		'title'         => __('Settings', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Settings', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'list_entries' => array(
						'type'          => 'form',
						'form'          => 'mrbb_list',
						'label'         => __( 'List Content', 'mediaron-bb-modules' ),
						'multiple'      => true,
						'preview_text'  => 'list_content',
					)
				)
			)
		)
	),
	'styles'       => array( // Tab
		'title'         => __('Styles', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'list_style' => array(
						'type'          => 'select',
						'options' => array(
							'none' => __( 'None', 'mediaron-bb-modules' ),
							'icon' => __( 'Icon', 'mediaron-bb-modules' ),
							'circular' => __( 'Circular', 'mediaron-bb-modules' ),
							'square' => __( 'Square', 'mediaron-bb-modules' ),
							'bar' => __( 'Bar', 'mediaron-bb-modules' ),
							'hover' => __( 'Hover Effects', 'mediaron-bb-modules' ),
							'list_background' => __( 'List Full Width', 'mediaron-bb-modules' ),
						),
						'default' => 'none',
						'toggle' => array(
							'icon' => array( 'fields' => array( 'list_icon', 'list_icon_size', 'list_icon_color' ) ),
							'circular' => array( 'fields' => array( 'background_color', 'hover_color', 'item_size', 'top_offset' ) ),
							'square' => array( 'fields' => array( 'background_color', 'hover_color', 'item_size', 'top_offset' ) ),
							'bar' => array( 'fields' => array( 'background_color', 'hover_color', 'bar_width', 'bar_height', 'top_offset', 'allow_spinning_animation' ) ),
							'hover' => array( 'fields' => array( 'background_color', 'background_hover_color', 'text_color', 'text_color_hover', 'border_bottom_color', 'border_bottom_size', 'hover_padding' ) ),
							'list_background' => array( 'fields' => array( 'background_color', 'text_color', 'border_bottom_color', 'border_bottom_size', 'hover_padding' ) )
						)
					),
					'list_icon' => array(
						'type' => 'icon',
						'show_remove' => 'true',
						'label' => __( 'List Item Icon', 'mediaron-bb-modules' ),
					),
					'list_icon_size' => array(
						'type' => 'unit',
						'label' => __( 'List Item Icon Size', 'mediaron-bb-modules' ),
						'default' => '16'
					),
					'list_icon_color' => array(
						'type' => 'color',
						'label' => __( 'List Item Icon Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'background_color' => array(
						'type' => 'color',
						'label' => __( 'Background Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'hover_color' => array(
						'type' => 'color',
						'label' => __( 'Hover Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'background_hover_color' => array(
						'type' => 'color',
						'label' => __( 'Hover Color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'text_color' => array(
						'type' => 'color',
						'label' => __( 'Text Color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'text_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Text Hover Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'border_bottom_color' => array(
						'type' => 'color',
						'label' => __( 'Border Bottom Color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'border_bottom_size' => array(
						'type' => 'unit',
						'label' => __( 'Border Bottom Size', 'mediaron-bb-modules' ),
						'default' => '2'
					),
					'hover_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Padding', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'item_size' => array(
						'type' => 'unit',
						'label' => __( 'Item Size', 'mediaron-bb-modules' ),
						'default' => '16'
					),
					'bar_width' => array(
						'type' => 'unit',
						'label' => __( 'Bar Width', 'mediaron-bb-modules' ),
						'default' => '16'
					),
					'bar_height' => array(
						'type' => 'unit',
						'label' => __( 'Bar Height', 'mediaron-bb-modules' ),
						'default' => '5'
					),
					'allow_spinning_animation' => array(
						'type' => 'select',
						'label' => __( 'Spin on Hover?', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'no'
					),
					'top_offset' => array(
						'type' => 'unit',
						'label' => __( 'Top Offset', 'mediaron-bb-modules' ),
						'default' => '0',
						'description' => __( 'Adjust the top offset according to your font size', 'mediaron-bb-modules' )
					),

				)
			)
		),
	),
	'typography'       => array( // Tab
		'title'         => __('Typography', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Typography', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'list_typography' => array(
						'type'          => 'typography',
						'label' => __( 'List Typography', 'mediaron-bb-modules' )
					),
				)
			)
		),
	),
) );
