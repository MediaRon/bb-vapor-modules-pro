<?php
class MediaRon_WooCommerce_Add_To_Cart_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Add Cart', 'mediaron-bb-modules' ),
			'description'     => __( 'Add Cart', 'mediaron-bb-modules' ),
			'category'        => __( 'WooCommerce', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/woocommerce-add-to-cart/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/woocommerce-add-to-cart/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_WooCommerce_Add_To_Cart_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Copyright', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'text' => array(
						'type' => 'text',
						'label' => __( 'Add to Cart Text', 'mediaron-bb-modules' ),
						'default' => __( 'Cart', 'mediaron-bb-modules' ),
					),
					'icon' => array(
						'type'          => 'icon',
						'label'         => __( 'Enter Your Cart Icon', 'mediaron-bb-modules' ),
						'show_remove'   => true,
					),
					'icon_position' => array(
						'type'          => 'select',
						'label'         => __( 'Enter Your Icon Location', 'mediaron-bb-modules' ),
						'options' => array(
							'before_text' => __( 'Before Text', 'mediaron-bb-modules' ),
							'after_text' => __( 'After Text', 'mediaron-bb-modules' )
						)
					),
					'text_color' => array(
						'type' => 'color',
						'label' => __( 'Text Color', 'mediaron-bb-modles' ),
						'show_reset'    => true,
						'default' => '000000'
					),
					'text_typography' => array(
						'type' => 'typography',
						'label' => __( 'Text Typography', 'mediaron-bb-modles' ),
					)
				)
			)
		)
	),
) );
