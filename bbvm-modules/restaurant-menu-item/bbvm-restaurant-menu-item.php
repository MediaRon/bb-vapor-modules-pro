<?php // phpcs:ignore
class BBVapor_Restaurant_Menu_Item_Add_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Restaurant Menu Item', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add menu item for a restaurant', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Restaurant', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/restaurant-menu-item/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/restaurant-menu-item/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);

		$this->add_css( 'jquery-magnificpopup' );
		$this->add_js( 'bbvm-restaurant-items-for-beaver-builder', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/restaurant-menu-item/js/frontend.js', array( 'jquery', 'jquery-magnificpopup' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION );
	}
}
FLBuilder::register_module(
	'BBVapor_Restaurant_Menu_Item_Add_Module',
	array(
		'general'    => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Add Restaurant Menu Item', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'restaurant_menu_item_title'       => array(
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
									'fields' => array(
										'restaurant_menu_item_icon',
										'restaurant_menu_item_icon_color',
									),
								),
								'photo' => array(
									'fields' => array( 'restaurant_menu_item_icon_photo' ),
								),
							),
						),
						'restaurant_menu_item_icon'        => array(
							'type'  => 'icon',
							'label' => __( 'Enter a menu item icon', 'bb-vapor-modules-pro' ),
						),
						'restaurant_menu_item_icon_color'  => array(
							'type'  => 'color',
							'label' => __( 'Enter a menu item icon color', 'bb-vapor-modules-pro' ),
						),
						'restaurant_menu_item_icon_photo'  => array(
							'type'  => 'photo',
							'label' => __( 'Enter a menu item icon photo', 'bb-vapor-modules-pro' ),
						),
						'restaurant_menu_item_description' => array(
							'type'  => 'text',
							'label' => __( 'Enter a menu item description or leave blank for no description', 'bb-vapor-modules-pro' ),
						),
						'restaurant_menu_item_price'       => array(
							'type'  => 'text',
							'label' => __( 'Enter a price or leave blank for no price', 'bb-vapor-modules-pro' ),
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
						'menu_item_padding' => array(
							'type'       => 'dimension',
							'label'      => __( 'Menu Item Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
