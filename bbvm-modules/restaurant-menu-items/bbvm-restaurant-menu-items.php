<?php
class BBVapor_Restaurant_Menu_Item_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Restaurant Menu', 'mediaron-bb-modules' ),
			'description'     => __( 'Add menu items for a restaurant', 'mediaron-bb-modules' ),
			'category'        => __( 'Restaurant', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'bb-vapor-modules-pro' ),
			'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/restaurant-menu-items/',
			'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/restaurant-menu-items/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));

		$this->add_css( 'jquery-magnificpopup' );
		$this->add_js('mediaron-restaurant-items-for-beaver-builder', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/restaurant-menu-items/js/frontend.js', array( 'jquery', 'jquery-magnificpopup' ), MEDIARON_BEAVER_BUILDER_VERSION );
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
FLBuilder::register_module('BBVapor_Restaurant_Menu_Item_Module', array(
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
					'menu_item_form'    => array( // Section Fields
						'type'         => 'form',
						'label'        => __( 'Menu Item', 'mediaron-bb-modules' ),
						'form'         => 'mrbb_restaurant_menu_item',
						'multiple'     => true,
					),
					'menu_item_form'    => array( // Section Fields
						'type'         => 'form',
						'label'        => __( 'Menu Item', 'mediaron-bb-modules' ),
						'form'         => 'mrbb_restaurant_menu_item',
						'multiple'     => true,
					),
					'image_photo' => array(
						'type'        => 'select',
						'label'       => __( 'Display Item Photo', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' )
						),
						'default'     => 'yes',
					),
					'image_size' => array(
						'type'        => 'unit',
						'label'       => 'Menu Image Size',
						'description' => 'px',
						'default'     => '150',
						'responsive'  => true,
					),
					'image_type' => array(
						'type'        => 'select',
						'label'       => __( 'Menu Image Type', 'mediaron-bb-modules' ),
						'default'     => 'square',
						'options' => array(
							'square' => __( 'Square', 'mediaron-bb-modules' ),
							'circular' => __( 'Circular', 'mediaron-bb-modules' ),
						)
					),
					'image_lightbox' => array(
						'type'        => 'select',
						'label'       => __( 'Popup Image in Lightbox', 'mediaron-bb-modules' ),
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
