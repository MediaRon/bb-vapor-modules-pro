<?php // phpcs:ignore
class BBVapor_WooCommerce_Add_To_Cart_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Add Cart', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add Cart', 'bb-vapor-modules-pro' ),
				'category'        => __( 'WooCommerce', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/woocommerce-add-to-cart/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/woocommerce-add-to-cart/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_WooCommerce_Add_To_Cart_Module',
	array(
		'general' => array( // Tab
			'title'    => __( 'General', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'Cart', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'text'            => array(
							'type'    => 'text',
							'label'   => __( 'Add to Cart Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Cart', 'bb-vapor-modules-pro' ),
						),
						'icon'            => array(
							'type'        => 'icon',
							'label'       => __( 'Enter Your Cart Icon', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
						'icon_position'   => array(
							'type'    => 'select',
							'label'   => __( 'Enter Your Icon Location', 'bb-vapor-modules-pro' ),
							'options' => array(
								'before_text' => __( 'Before Text', 'bb-vapor-modules-pro' ),
								'after_text'  => __( 'After Text', 'bb-vapor-modules-pro' ),
							),
						),
						'text_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bbvm-bb-modles' ),
							'show_reset' => true,
							'default'    => '000000',
						),
						'text_typography' => array(
							'type'  => 'typography',
							'label' => __( 'Text Typography', 'bbvm-bb-modles' ),
						),
					),
				),
			),
		),
	)
);
