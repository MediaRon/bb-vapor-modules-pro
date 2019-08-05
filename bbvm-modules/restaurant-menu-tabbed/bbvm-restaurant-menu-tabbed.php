<?php // phpcs:ignore
class BBVapor_Restaurant_Menu_Tabbed_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Restaurant Tabbed Menu', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add a tabbed menu for a restaurant', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Restaurant', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/restaurant-menu-tabbed/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/restaurant-menu-tabbed/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		$this->add_css( 'jquery-magnificpopup' );
		$this->add_js( 'bbvm-restaurant-items-for-beaver-builder', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/restaurant-menu-tabbed/js/frontend.js', array( 'jquery', 'jquery-magnificpopup' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION );
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_settings_form(
	'mrbb_restaurant_menu_item',
	array(
		'title' => __( 'Add Menu Item', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' > array(
				'title'    => __( 'General', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => '',
						'fields' => array(
							'restaurant_menu_item_has_photo' => array(
								'type'    => 'select',
								'label'   => __( 'Enable a menu item photo', 'bb-vapor-modules-pro' ),
								'default' => 'yes',
								'options' => array(
									'no'  => __( 'No', 'bb-vapor-modules-pro' ),
									'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								),
								'toggle' => array(
									'yes' => array(
										'fields' => array( 'restaurant_menu_item_photo', 'restaurant_menu_item_photo_size' ),
									),
								),
							),
							'restaurant_menu_item_photo' => array(
								'type'  => 'photo',
								'label' => __( 'Enter a menu item photo (optional)', 'bb-vapor-modules-pro' ),
							),
							'restaurant_menu_item_photo_size' => array(
								'type'    => 'photo-sizes',
								'label'   => __( 'Select a Photo Size', 'bb-vapor-modules-pro' ),
								'default' => 'medium',
							),
							'restaurant_menu_item_title' => array(
								'type'  => 'text',
								'label' => __( 'Enter a menu item title', 'bb-vapor-modules-pro' ),
							),
							'restaurant_menu_item_icon_select' => array(
								'type'    => 'select',
								'label'   => __( 'Enable menu item icon', 'bb-vapor-modules-pro' ),
								'options' => array(
									'none'  => __( 'None', 'bb-vapor-modules-pro' ),
									'icon'  => __( 'Icon', 'bb-vapor-modules-pro' ),
									'photo' => __( 'Photo', 'bb-vapor-modules-pro' ),
								),
								'toggle'  => array(
									'icon'  => array(
										'fields' => array( 'restaurant_menu_item_icon', 'restaurant_menu_item_icon_color' ),
									),
									'photo' => array(
										'fields' => array( 'restaurant_menu_item_icon_photo' ),
									),
								),
							),
							'restaurant_menu_item_icon'  => array(
								'type'  => 'icon',
								'label' => __( 'Enter a menu item icon', 'bb-vapor-modules-pro' ),
							),
							'restaurant_menu_item_icon_color' => array(
								'type'  => 'color',
								'label' => __( 'Enter a menu item icon color', 'bb-vapor-modules-pro' ),
							),
							'restaurant_menu_item_icon_photo' => array(
								'type'  => 'photo',
								'label' => __( 'Enter a menu item icon photo', 'bb-vapor-modules-pro' ),
							),
							'restaurant_menu_item_description' => array(
								'type'  => 'text',
								'label' => __( 'Enter a menu item description or leave blank for no description', 'bb-vapor-modules-pro' ),
							),
							'restaurant_menu_item_price' => array(
								'type'  => 'text',
								'label' => __( 'Enter a price or leave blank for no price', 'bb-vapor-modules-pro' ),
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
FLBuilder::register_settings_form(
	'mrbb_restaurant_menu_tab',
	array(
		'title' => __( 'Add Tab', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'General', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => '',
						'fields' => array(
							'menu_tab_name'        => array(
								'type'  => 'text',
								'label' => __( 'Add a Tab Item Name', 'bb-vapor-modules-pro' ),
							),
							'menu_show_by_default' => array(
								'type'    => 'select',
								'label'   => __( 'Show Tab by Default', 'bb-vapor-modules-pro' ),
								'options' => array(
									'no'  => __( 'No', 'bb-vapor-modules-pro' ),
									'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								),
								'default' => 'no',
							),
							'menu_item_category'   => array(
								'type'  => 'text',
								'label' => __( 'Category name', 'bb-vapor-modules-pro' ),
							),
							'menu_item_category_description' => array(
								'type'  => 'text',
								'label' => __( 'Category description or leave blank for no description', 'bb-vapor-modules-pro' ),
							),
							'menu_item_form'       => array(
								'type'         => 'form',
								'label'        => __( 'Menu Item', 'bb-vapor-modules-pro' ),
								'form'         => 'mrbb_restaurant_menu_item',
								'multiple'     => true,
								'preview_text' => 'restaurant_menu_item_title',
							),
						),
					),
				),
			),
		),
	)
);
FLBuilder::register_module(
	'BBVapor_Restaurant_Menu_Tabbed_Module',
	array(
		'general'    => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Restaurant Menu', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'menu_item_form' => array(
							'type'         => 'form',
							'label'        => __( 'Menu Tab', 'bb-vapor-modules-pro' ),
							'form'         => 'mrbb_restaurant_menu_tab',
							'preview_text' => 'menu_tab_name',
							'multiple'     => true,
						),
						'image_photo'    => array(
							'type'    => 'select',
							'label'   => __( 'Display Menu Item Photo', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'image_size'     => array(
							'type'        => 'unit',
							'label'       => 'Menu Item Image Size',
							'description' => 'px',
							'default'     => '150',
							'responsive'  => true,
						),
						'image_type'     => array(
							'type'    => 'select',
							'label'   => __( 'Menu Item Image Type', 'bb-vapor-modules-pro' ),
							'default' => 'square',
							'options' => array(
								'square'   => __( 'Square', 'bb-vapor-modules-pro' ),
								'circular' => __( 'Circular', 'bb-vapor-modules-pro' ),
							),
						),
						'image_lightbox' => array(
							'type'    => 'select',
							'label'   => __( 'Popup Menu Item Image in Lightbox', 'bb-vapor-modules-pro' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
						),
					),
				),
			),
		),
		'tabs'       => array(
			'title'    => __( 'Tabs', 'bbvm-bb-module' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Tabs', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'tab_min_width'                 => array(
							'type'        => 'unit',
							'label'       => __( 'Tab Min Width', 'bb-vapor-modules-pro' ),
							'responsive'  => true,
							'default'     => '200',
							'description' => 'px',
						),
						'tab_text_color'                => array(
							'type'    => 'color',
							'label'   => __( 'Tab Text Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'tab_text_color_hover'          => array(
							'type'    => 'color',
							'label'   => __( 'Tab Text Color on Hover', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'tab_background_color'          => array(
							'type'    => 'color',
							'label'   => __( 'Tab Background Color', 'bb-vapor-modules-pro' ),
							'default' => 'FFFFFF',
						),
						'tab_background_color_hover'    => array(
							'type'    => 'color',
							'label'   => __( 'Tab Background Color Hover/Active', 'bb-vapor-modules-pro' ),
							'default' => 'a72c31',
						),
						'tab_border_bottom_width'       => array(
							'type'    => 'unit',
							'label'   => __( 'Tab Border Bottom Width', 'bb-vapor-modules-pro' ),
							'default' => '1',
						),
						'tab_border_bottom_width_color' => array(
							'type'    => 'color',
							'label'   => __( 'Tab Border Bottom Width Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'tab_padding'                   => array(
							'type'       => 'dimension',
							'label'      => __( 'Tab Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'tab_sticky'                    => array(
							'type'    => 'select',
							'label'   => __( 'Tabs Are Sticky?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
					),
				),
			),
		),
		'typography' => array(
			'title'    => __( 'Typography', 'bbvm-bb-module' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Typography', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'tab_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Tab Typography', 'bb-vapor-modules-pro' ),
						),
						'category_typography' => array(
							'type'    => 'typography',
							'label'   => __( 'Category Typography', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-restaurant-menu-items-heading',
							),
						),
						'category_description_typography'  => array(
							'type'    => 'typography',
							'label'   => __( 'Category Description Typography', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-restaurant-menu-items-description',
							),
						),
						'menu_item_typography'             => array(
							'type'    => 'typography',
							'label'   => __( 'Menu Item Typography', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.menu-item-title',
							),
						),
						'menu_item_description_typography' => array(
							'type'    => 'typography',
							'label'   => __( 'Menu Item Description Typography', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.menu-item-description',
							),
						),
						'menu_item_price_typography'       => array(
							'type'    => 'typography',
							'label'   => __( 'Menu Item Price Typography', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.menu-item-price',
							),
						),
					),
				),
			),
		),
		'spacing'    => array(
			'title'    => __( 'Spacing', 'bbvm-bb-module' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Spacing', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'category_padding'             => array(
							'type'       => 'dimension',
							'label'      => __( 'Category Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'category_description_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Category Description Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'menu_item_padding'            => array(
							'type'       => 'dimension',
							'label'      => __( 'Menu Item Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'separators' => array(
			'title'    => __( 'Separators', 'bbvm-bb-module' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Separators', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'category_separator'         => array(
							'type'    => 'select',
							'label'   => __( 'Select category separator', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'  => __( 'None', 'bb-vapor-modules-pro' ),
								'line'  => __( 'line', 'bb-vapor-modules-pro' ),
								'image' => __( 'image', 'bb-vapor-modules-pro' ),
							),
							'default' => 'none',
							'toggle'  => array(
								'line' => array(
									'fields' => array( 'category_separator_line', 'category_separator_line_height', 'category_separator_line_color', 'category_seperator_margin' ),
								),
								'image' => array(
									'fields' => array( 'category_separator_line_image', 'category_separator_line_height', 'category_seperator_margin' ),
								),
							),
						),
						'category_separator_line'        => array(
							'type'    => 'select',
							'label'   => __( 'Line type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'single' => __( 'Single line', 'bb-vapor-modules-pro' ),
								'double' => __( 'Double line', 'bb-vapor-modules-pro' ),
							),
						),
						'category_separator_line_color'  => array(
							'type'  => 'color',
							'label' => __( 'Category line color', 'bb-vapor-modules-pro' ),
						),
						'category_separator_line_image'  => array(
							'type'  => 'photo',
							'label' => __( 'Line background image', 'bb-vapor-modules-pro' ),
						),
						'category_separator_line_height' => array(
							'type'        => 'unit',
							'label'       => __( 'Line height', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '1',
						),
						'category_seperator_margin'      => array(
							'type'  => 'dimension',
							'label' => __( 'Margin', 'bb-vapor-modules-pro' ),
						),
						'item_separator'                 => array(
							'type'    => 'select',
							'label'   => __( 'Select item separator', 'bb-vapor-modules-pro' ),
							'default' => 'line',
							'options' => array(
								'none'   => __( 'None', 'bb-vapor-modules-pro' ),
								'line'   => __( 'Solid line', 'bb-vapor-modules-pro' ),
								'dashed' => __( 'Dashed line', 'bb-vapor-modules-pro' ),
								'dotted' => __( 'Dotted line', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'line'   => array(
									'fields' => array( 'item_separator_line_height', 'item_separator_line_color' ),
								),
								'dashed' => array(
									'fields' => array( 'item_separator_line_height', 'item_separator_line_color' ),
								),
								'dotted' => array(
									'fields' => array( 'item_separator_line_height', 'item_separator_line_color' ),
								),
							),
						),
						'item_separator_line_color'      => array(
							'type'    => 'color',
							'label'   => __( 'Item line color', 'bb-vapor-modules-pro' ),
							'default' => 'EEEEEE',
						),
						'item_separator_line_height'     => array(
							'type'        => 'unit',
							'label'       => __( 'Line height', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '2',
						),
					),
				),
			),
		),
	)
);
