<?php
class BBVapor_Restaurant_Menu_Item_Add_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Restaurant Menu Item', 'mediaron-bb-modules' ),
			'description'     => __( 'Add menu item for a restaurant', 'mediaron-bb-modules' ),
			'category'        => __( 'Restaurant', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'bb-vapor-modules-pro' ),
			'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/restaurant-menu-item/',
			'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/restaurant-menu-item/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}

	public function enqueue_scripts() {
		if( $this->settings && ! empty( $this->settings->restaurant_menu_item_title ) ) {
			$this->add_css( 'jquery-magnificpopup' );
			$this->add_js('mediaron-restaurant-items-for-beaver-builder', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/restaurant-menu-item/js/frontend.js', array( 'jquery', 'jquery-magnificpopup' ), MEDIARON_BEAVER_BUILDER_VERSION  );
		}
	}
}
FLBuilder::register_module('BBVapor_Restaurant_Menu_Item_Add_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Add Restaurant Menu Item', 'mediaron-bb-modules'), // Section Title
				'fields' => array(
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
					'menu_item_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Menu Item Padding', 'mediaron-bb-modules' ),
						'responsive'  => true,
					)
				)
			)
		)
	),
) );
