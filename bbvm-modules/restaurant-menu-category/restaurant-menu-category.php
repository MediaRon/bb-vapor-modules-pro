<?php
class MediaRon_Restaurant_Menu_Category extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Restaurant Category', 'mediaron-bb-modules' ),
			'description'     => __( 'Add menu category for a restaurant', 'mediaron-bb-modules' ),
			'category'        => __( 'Restaurant', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/restaurant-menu-category/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/restaurant-menu-category/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));

	}
}
FLBuilder::register_module('MediaRon_Restaurant_Menu_Category', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Restaurant Menu', 'mediaron-bb-modules'), // Section Title
				'fields' => array(
					'menu_item_category'    => array( // Section Fields
						'type'         => 'text',
						'label'        => __( 'Category name', 'mediaron-bb-modules' ),
					),
					'menu_item_category_description'    => array( // Section Fields
						'type'         => 'text',
						'label'        => __( 'Category description or leave blank for no description', 'mediaron-bb-modules' ),
					),
				)
			),
		)
	),
	'typography' => array(
		'title' => __( 'Typography', 'mediaron-bb-module' ),
		'sections' => array(
			'general' => array(
				'title'         => __('Typography', 'mediaron-bb-modules'), // Section Title
				'fields' => array(
					'category_typography' => array(
						'type' => 'typography',
						'label' => __( 'Category Typography', 'mediaron-bb-modules' ),
						'preview'    => array(
							'type'	    => 'css',
							'selector'  => '.mediaron-restaurant-menu-items-heading',
						),
					),
					'category_description_typography' => array(
						'type' => 'typography',
						'label' => __( 'Category Description Typography', 'mediaron-bb-modules' ),
						'preview'    => array(
							'type'	    => 'css',
							'selector'  => '.mediaron-restaurant-menu-items-description',
						),
					),
				)
			)
		)
	),
	'spacing' => array(
		'title' => __( 'Spacing', 'mediaron-bb-module' ),
		'sections' => array(
			'general' => array(
				'title'         => __('Spacing', 'mediaron-bb-modules'), // Section Title
				'fields' => array(
					'category_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Category Padding', 'mediaron-bb-modules' ),
						'responsive'  => true,
					),
					'category_description_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Category Description Padding', 'mediaron-bb-modules' ),
						'responsive'  => true,
					),
				)
			)
		)
	),
	'separators' => array(
		'title' => __( 'Separators', 'mediaron-bb-module' ),
		'sections' => array(
			'general' => array(
				'title'         => __('Separators', 'mediaron-bb-modules'), // Section Title
				'fields' => array(
					'category_separator'         => array(
						'type'          => 'select',
						'label'         => __('Select category separator', 'mediaron-bb-modules'),
						'options'       => array(
							'none'       => __( 'None', 'mediaron-bb-modules' ),
							'line'       => __( 'line', 'mediaron-bb-modules' ),
							'image'      => __( 'image', 'mediaron-bb-modules' ),
						),
						'toggle' => array(
							'line' => array(
								'fields'     => array( 'category_separator_line', 'category_separator_line_height', 'category_separator_line_color', 'category_seperator_margin' ),
							),
							'image' => array(
								'fields' => array( 'category_separator_line_image', 'category_separator_line_height', 'category_seperator_margin' ),
							)
						)
					),
					'category_separator_line'         => array(
						'type'          => 'select',
						'label'         => __('Line type', 'mediaron-bb-modules'),
						'options'       => array(
							'single'       => __( 'Single line', 'mediaron-bb-modules' ),
							'double'      => __( 'Double line', 'mediaron-bb-modules' ),
						),
					),
					'category_separator_line_color' => array(
						'type' => 'color',
						'label' => __( 'Category line color', 'mediaron-bb-modules' ),
					),
					'category_separator_line_image'    => array(
						'type' => 'photo',
						'label' => __( 'Line background image', 'mediaron-bb-modules' ),
					),
					'category_separator_line_height'  => array(
						'type'        => 'unit',
						'label'       => __( 'Line height', 'mediaron-bb-modules' ),
						'description' => 'px',
						'default'     => '1',
					),
					'category_seperator_margin'   => array(
						'type' => 'dimension',
						'label' => __( 'Margin', 'mediaron-bb-modules' ),
					),
				),
			)
		)
	)
) );
