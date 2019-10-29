<?php // phpcs:ignore
class BBVapor_Credit_Cards_Module extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Credit Cards', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Credit Cards module for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/credit-cards/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/credit-cards/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}
}
FLBuilder::register_settings_form(
	'bbvm_credit_cards',
	array(
		'title' => __( 'Add Credit Card Option', 'bb-vapor-modules-pro' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'Credit Card', 'bb-vapor-modules-pro' ),
				'sections' => array(
					'general' => array(
						'title'  => '',
						'fields' => array(
							'credit_cards' => array(
								'type'    => 'select',
								'options' => array(
									'amex'       => __( 'American Express', 'bb-vapor-modules-pro' ),
									'cirrus'     => __( 'Cirrus', 'bb-vapor-modules-pro' ),
									'dc'         => __( 'Diners Club', 'bb-vapor-modules-pro' ),
									'discover'   => __( 'Discover', 'bb-vapor-modules-pro' ),
									'maestro'    => __( 'Maestro', 'bb-vapor-modules-pro' ),
									'mastercard' => __( 'Mastercard', 'bb-vapor-modules-pro' ),
									'paypal'     => __( 'PayPal', 'bb-vapor-modules-pro' ),
									'sage'       => __( 'Sage', 'bb-vapor-modules-pro' ),
									'shopify'    => __( 'Shopify', 'bb-vapor-modules-pro' ),
									'skrill'     => __( 'Skrill', 'bb-vapor-modules-pro' ),
									'visa'       => __( 'Visa', 'bb-vapor-modules-pro' ),
									'wu'         => __( 'Western Union', 'bb-vapor-modules-pro' ),
									'worldpay'   => __( 'WorldPay', 'bb-vapor-modules-pro' ),
								),
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
	'BBVapor_Credit_Cards_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Credit Cards', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'creditcard' => array(
							'type'         => 'form',
							'label'        => __( 'Credit Card', 'bb-vapor-modules-pro' ),
							'form'         => 'bbvm_credit_cards',
							'multiple'     => true,
							'preview_text' => 'credit_cards',
						),
						'appearance' => array(
							'type'    => 'select',
							'label'   => __( 'Appearance', 'bb-vapor-modules-pro' ),
							'options'  => array(
								'stacked' => __( 'Stacked', 'bb-vapor-modules-pro' ),
								'inline'  => __( 'Inline', 'bb-vapor-modules-pro' ),
							),
							'default' => 'inline',
						),
						'align' => array(
							'type'    => 'align',
							'label'   => __( 'Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'center',
						),
					),
				),
			),
		),
	)
);
