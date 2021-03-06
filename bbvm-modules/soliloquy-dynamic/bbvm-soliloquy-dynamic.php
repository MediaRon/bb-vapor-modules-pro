<?php // phpcs:ignore
class BBVapor_Soliloquy_Dynamic_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Soliloquy Dynamic Content', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Soliloquy Dynamic Content for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'External Plugins', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/soliloquy-dynamic/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/soliloquy-dynamic/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => true, // Defaults to false and can be omitted.
			)
		);
	}
}
FLBuilder::register_module(
	'BBVapor_Soliloquy_Dynamic_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Slider Select', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'source'              => array(
							'type'    => 'select',
							'label'   => __( 'Select a Source for Images', 'bb-vapor-modules-pro' ),
							'options' => array(
								'acf'         => __( 'Advanced Custom Fields', 'bb-vapor-modules-pro' ),
								'woocommerce' => __( 'WooCommerce', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'acf'         => array( 'fields' => array( 'acf_page', 'acf_custom_field' ) ),
								'woocommerce' => array( 'fields' => array( 'woocommerce_product' ) ),
							),
						),
						'acf_page'            => array(
							'type'    => 'unit',
							'label'   => __( 'Post or Page ID', 'bb-vapor-modules-pro' ),
							'default' => '0',
						),
						'acf_custom_field'    => array(
							'type'  => 'text',
							'label' => __( 'Custom Field Name', 'bb-vapor-modules-pro' ),
						),
						'woocommerce_product' => array(
							'type'   => 'suggest',
							'label'  => __( 'WooCommerce Product', 'bb-vapor-modules-pro' ),
							'action' => 'fl_as_posts',
							'data'   => 'product',
							'limit'  => 1,
						),
						'enable_thumbnails'   => array(
							'type'    => 'select',
							'label'   => __( 'Enable Thumbnails', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'thumb_width',
										'thumb_height',
										'thumb_margin',
									),
								),
							),
						),
						'thumb_width'         => array(
							'type'    => 'unit',
							'label'   => __( 'Thumbnail Width', 'bb-vapor-modules' ),
							'default' => 140,
						),
						'thumb_height'        => array(
							'type'    => 'unit',
							'label'   => __( 'Thumbnail Height', 'bb-vapor-modules' ),
							'default' => 140,
						),
						'thumb_margin'        => array(
							'type'    => 'unit',
							'label'   => __( 'Thumbnail Margin', 'bb-vapor-modules' ),
							'default' => 20,
						),
						'thumb_num'           => array(
							'type'    => 'unit',
							'label'   => __( 'Number of Thumbnails', 'bb-vapor-modules' ),
							'default' => 4,
						),
					),
				),
			),
		),
		'options' => array(
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'options' => array(
					'title'  => __( 'General Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'show_arrows'             => array(
							'type'    => 'select',
							'label'   => __( 'Show arrows always', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'arrow_background'        => array(
							'type'       => 'color',
							'label'      => __( 'Background color of the arrows', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'hide_pager'              => array(
							'type'    => 'select',
							'label'   => __( 'Hide pager?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'hide_caption'            => array(
							'type'    => 'select',
							'label'   => __( 'Hide caption?', 'bb-vapor-modules-pro' ),
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
						),
						'caption_background'      => array(
							'type'       => 'color',
							'label'      => __( 'Background color of the caption', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
						),
						'caption_text_background' => array(
							'type'       => 'color',
							'label'      => __( 'Text color of the caption', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
						),
						'caption_typography'      => array(
							'type'  => 'typography',
							'label' => __( 'Caption typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
