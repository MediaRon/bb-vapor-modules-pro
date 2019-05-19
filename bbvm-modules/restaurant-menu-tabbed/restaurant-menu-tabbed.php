<?php
class MediaRon_Restaurant_Menu_Tabbed_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Restaurant Tabbed Menu', 'mediaron-bb-modules' ),
			'description'     => __( 'Add a tabbed menu for a restaurant', 'mediaron-bb-modules' ),
			'category'        => __( 'Restaurant', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/restaurant-menu-tabbed/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/restaurant-menu-tabbed/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));

	}

	public function enqueue_scripts() {
		if ( $this->settings && !empty( $this->settings->menu_item_form ) ) {
			$this->add_css( 'jquery-magnificpopup' );
			$this->add_js('mediaron-restaurant-items-for-beaver-builder', MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/restaurant-menu-tabbed/js/frontend.js', array( 'jquery', 'jquery-magnificpopup' ), MEDIARON_BEAVER_BUILDER_VERSION );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_settings_form(
	'mrbb_restaurant_menu_item', array(
		'title' => __( 'Add Menu Item', 'mediaron-bb-modules' ),
		'tabs'  => array(
			'general'      => array(
				'title'         => __('General', 'mediaron-bb-modules'),
				'sections'      => array(
					'general'       => array(
						'title'         => '',
						'fields'        => array(
							'restaurant_menu_item_has_photo'         => array(
								'type'          => 'select',
								'label'         => __('Enable a menu item photo', 'mediaron-bb-modules'),
								'default'       => 'yes',
								'options'       => array(
									'no'       => __( 'No', 'mediaron-bb-modules' ),
									'yes'       => __( 'Yes', 'mediaron-bb-modules' ),
								),
								'toggle' => array(
									'yes' => array(
										'fields' => array( 'restaurant_menu_item_photo', 'restaurant_menu_item_photo_size' ),
									),
								),
							),
							'restaurant_menu_item_photo'         => array(
								'type'          => 'photo',
								'label'         => __('Enter a menu item photo (optional)', 'mediaron-bb-modules')
							),
							'restaurant_menu_item_photo_size' => array(
								'type'          => 'photo-sizes',
								'label'         => __('Select a Photo Size', 'mediaron-bb-modules'),
								'default'       => 'medium'
							),
							'restaurant_menu_item_title'         => array(
								'type'          => 'text',
								'label'         => __('Enter a menu item title', 'mediaron-bb-modules')
							),
							'restaurant_menu_item_icon_select'         => array(
								'type'          => 'select',
								'label'         => __('Enable menu item icon', 'mediaron-bb-modules'),
								'options'       => array(
									'none'       => __( 'None', 'mediaron-bb-modules' ),
									'icon'       => __( 'Icon', 'mediaron-bb-modules' ),
									'photo'      => __( 'Photo', 'mediaron-bb-modules' ),
								),
								'toggle' => array(
									'icon' => array(
										'fields'     => array( 'restaurant_menu_item_icon', 'restaurant_menu_item_icon_color' ),
									),
									'photo' => array(
										'fields' => array( 'restaurant_menu_item_icon_photo' ),
									)
								)
							),
							'restaurant_menu_item_icon'         => array(
								'type'          => 'icon',
								'label'         => __('Enter a menu item icon', 'mediaron-bb-modules')
							),
							'restaurant_menu_item_icon_color'         => array(
								'type'          => 'color',
								'label'         => __('Enter a menu item icon color', 'mediaron-bb-modules')
							),
							'restaurant_menu_item_icon_photo'         => array(
								'type'          => 'photo',
								'label'         => __('Enter a menu item icon photo', 'mediaron-bb-modules')
							),
							'restaurant_menu_item_description'         => array(
								'type'          => 'text',
								'label'         => __('Enter a menu item description or leave blank for no description', 'mediaron-bb-modules')
							),
							'restaurant_menu_item_price'         => array(
								'type'          => 'text',
								'label'         => __('Enter a price or leave blank for no price', 'mediaron-bb-modules')
							)
						)
					),
				)
			)
		)
	)
);
/**
 * Register the module and its form settings.
 */
FLBuilder::register_settings_form(
	'mrbb_restaurant_menu_tab', array(
		'title' => __( 'Add Tab', 'mediaron-bb-modules' ),
		'tabs'  => array(
			'general'      => array(
				'title'         => __('General', 'mediaron-bb-modules'),
				'sections'      => array(
					'general'       => array(
						'title'         => '',
						'fields'        => array(
							'menu_tab_name'         => array(
								'type'          => 'text',
								'label'         => __('Add a Tab Item Name', 'mediaron-bb-modules'),
							),
							'menu_show_by_default'         => array(
								'type'          => 'select',
								'label'         => __('Show Tab by Default', 'mediaron-bb-modules'),
								'options' => array(
									'no' => __( 'No', 'mediaron-bb-modules' ),
									'yes' => __( 'Yes', 'mediaron-bb-modules' ),
								),
								'default' => 'no'
							),
							'menu_item_category'    => array( // Section Fields
								'type'         => 'text',
								'label'        => __( 'Category name', 'mediaron-bb-modules' ),
							),
							'menu_item_category_description'    => array( // Section Fields
								'type'         => 'text',
								'label'        => __( 'Category description or leave blank for no description', 'mediaron-bb-modules' ),
							),
							'menu_item_form'    => array( // Section Fields
								'type'         => 'form',
								'label'        => __( 'Menu Item', 'mediaron-bb-modules' ),
								'form'         => 'mrbb_restaurant_menu_item',
								'multiple'     => true,
								'preview_text' => 'restaurant_menu_item_title',
							),
						)
					),
				)
			)
		)
	)
);
FLBuilder::register_module('MediaRon_Restaurant_Menu_Tabbed_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Restaurant Menu', 'mediaron-bb-modules'), // Section Title
				'fields' => array(
					'menu_item_form'    => array( // Section Fields
						'type'         => 'form',
						'label'        => __( 'Menu Tab', 'mediaron-bb-modules' ),
						'form'         => 'mrbb_restaurant_menu_tab',
						'preview_text' => 'menu_tab_name',
						'multiple'     => true,
					),
					'image_photo' => array(
						'type'        => 'select',
						'label'       => __( 'Display Menu Item Photo', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' )
						),
						'default'     => 'yes',
					),
					'image_size' => array(
						'type'        => 'unit',
						'label'       => 'Menu Item Image Size',
						'description' => 'px',
						'default'     => '150',
						'responsive'  => true,
					),
					'image_type' => array(
						'type'        => 'select',
						'label'       => __( 'Menu Item Image Type', 'mediaron-bb-modules' ),
						'default'     => 'square',
						'options' => array(
							'square' => __( 'Square', 'mediaron-bb-modules' ),
							'circular' => __( 'Circular', 'mediaron-bb-modules' ),
						)
					),
					'image_lightbox' => array(
						'type'        => 'select',
						'label'       => __( 'Popup Menu Item Image in Lightbox', 'mediaron-bb-modules' ),
						'default'     => 'no',
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
						)
					),
				)
			),
		)
	),
	'tabs' => array(
		'title' => __( 'Tabs', 'mediaron-bb-module' ),
		'sections' => array(
			'general' => array(
				'title'         => __('Tabs', 'mediaron-bb-modules'), // Section Title
				'fields' => array(
					'tab_min_width' => array(
						'type' => 'unit',
						'label' => __( 'Tab Min Width', 'mediaron-bb-modules' ),
						'responsive' => true,
						'default' => '200',
						'description' => 'px',
					),
					'tab_text_color' => array(
						'type' => 'color',
						'label' => __( 'Tab Text Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'tab_text_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Tab Text Color on Hover', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'tab_background_color' => array(
						'type' => 'color',
						'label' => __( 'Tab Background Color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF'
					),
					'tab_background_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Tab Background Color Hover/Active', 'mediaron-bb-modules' ),
						'default' => 'a72c31'
					),
					'tab_border_bottom_width' => array(
						'type' => 'unit',
						'label' => __( 'Tab Border Bottom Width', 'mediaron-bb-modules' ),
						'default' => '1'
					),
					'tab_border_bottom_width_color' => array(
						'type' => 'color',
						'label' => __( 'Tab Border Bottom Width Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'tab_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Tab Padding', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
					'tab_sticky' => array(
						'type' => 'select',
						'label' => __( 'Tabs Are Sticky?', 'mediaron-bb-modules' ),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => 'yes'
					),
				)
			)
		)
	),
	'typography' => array(
		'title' => __( 'Typography', 'mediaron-bb-module' ),
		'sections' => array(
			'general' => array(
				'title'         => __('Typography', 'mediaron-bb-modules'), // Section Title
				'fields' => array(
					'tab_typography' => array(
						'type' => 'typography',
						'label' => __( 'Tab Typography', 'mediaron-bb-modules' ),
					),
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
					'menu_item_typography' => array(
						'type' => 'typography',
						'label' => __( 'Menu Item Typography', 'mediaron-bb-modules' ),
						'preview'    => array(
							'type'	    => 'css',
							'selector'  => '.menu-item-title',
						),
					),
					'menu_item_description_typography' => array(
						'type' => 'typography',
						'label' => __( 'Menu Item Description Typography', 'mediaron-bb-modules' ),
						'preview'    => array(
							'type'	    => 'css',
							'selector'  => '.menu-item-description',
						),
					),
					'menu_item_price_typography' => array(
						'type' => 'typography',
						'label' => __( 'Menu Item Price Typography', 'mediaron-bb-modules' ),
						'preview'    => array(
							'type'	    => 'css',
							'selector'  => '.menu-item-price',
						),
					)
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
					'menu_item_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Menu Item Padding', 'mediaron-bb-modules' ),
						'responsive'  => true,
					)
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
						'default' => 'none',
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
					'item_separator'         => array(
						'type'          => 'select',
						'label'         => __('Select item separator', 'mediaron-bb-modules'),
						'default'       => 'line',
						'options'       => array(
							'none'       => __( 'None', 'mediaron-bb-modules' ),
							'line'       => __( 'Solid line', 'mediaron-bb-modules' ),
							'dashed'     => __( 'Dashed line', 'mediaron-bb-modules' ),
							'dotted'     => __( 'Dotted line', 'mediaron-bb-modules' )
						),
						'toggle' => array(
							'line' => array(
								'fields'     => array( 'item_separator_line_height', 'item_separator_line_color' ),
							),
							'dashed' => array(
								'fields'     => array( 'item_separator_line_height', 'item_separator_line_color' ),
							),
							'dotted' => array(
								'fields'     => array( 'item_separator_line_height', 'item_separator_line_color' ),
							),
						)
					),
					'item_separator_line_color' => array(
						'type' => 'color',
						'label' => __( 'Item line color', 'mediaron-bb-modules' ),
						'default' => 'EEEEEE',
					),
					'item_separator_line_height'  => array(
						'type'        => 'unit',
						'label'       => __( 'Line height', 'mediaron-bb-modules' ),
						'description' => 'px',
						'default'     => '2',
					),
				),
			)
		)
	)
) );
