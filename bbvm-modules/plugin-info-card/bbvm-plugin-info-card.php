<?php // phpcs:ignore
class BBVapor_Plugin_Info_card extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Plugin Info Card', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Plugin Info Card module for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'External Plugins', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/plugin-info-card/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/plugin-info-card/',
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
	'BBVapor_Plugin_Info_card',
	array(
		'general'    => array(
			'title'    => __( 'Options', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Options', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'asset_type' => array(
							'type'    => 'select',
							'label'   => __( 'Plugin', 'bb-vapor-modules-pro' ),
							'options' => array(
								'plugin' => __( 'Plugin', 'bb-vapor-modules-pro' ),
								'theme'  => __( 'Theme', 'bb-vapor-modules-pro' ),
							),
							'default' => 'plugin',
						),
						'slug'       => array(
							'type'    => 'text',
							'label'   => __( 'Plugin or Theme Slug', 'bb-vapor-modules-pro' ),
							'default' => __( 'wp-plugin-info-card', 'bb-vapor-modules-pro' ),
							'help'    => __( 'Can be comma separated.', 'bb-vapor-modules-pro' ),
						),
						'multi'      => array(
							'type'    => 'select',
							'label'   => __( 'Output Multiple Items', 'bb-vapor-modules-pro' ),
							'options' => array(
								'true'  => __( 'Yes', 'bb-vapor-modules-pro' ),
								'false' => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'false',
							'help'    => __( 'If you comma-separate slugs, this option will output all items instead of selecting the card randomly', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
		'appearance' => array(
			'title'    => __( 'Appearance', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Appearance', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'appearance' => array(
							'type'    => 'select',
							'label'   => __( 'Color Scheme', 'bb-vapor-modules-pro' ),
							'options' => array(
								'scheme1'  => __( 'Scheme 1', 'bb-vapor-modules-pro' ),
								'scheme2'  => __( 'Scheme 2', 'bb-vapor-modules-pro' ),
								'scheme3'  => __( 'Scheme 3', 'bb-vapor-modules-pro' ),
								'scheme4'  => __( 'Scheme 4', 'bb-vapor-modules-pro' ),
								'scheme5'  => __( 'Scheme 5', 'bb-vapor-modules-pro' ),
								'scheme6'  => __( 'Scheme 6', 'bb-vapor-modules-pro' ),
								'scheme7'  => __( 'Scheme 7', 'bb-vapor-modules-pro' ),
								'scheme8'  => __( 'Scheme 8', 'bb-vapor-modules-pro' ),
								'scheme9'  => __( 'Scheme 9', 'bb-vapor-modules-pro' ),
								'scheme10' => __( 'Scheme 10', 'bb-vapor-modules-pro' ),
								'scheme11' => __( 'Scheme 11', 'bb-vapor-modules-pro' ),
								'scheme12' => __( 'Scheme 12', 'bb-vapor-modules-pro' ),
								'scheme13' => __( 'Scheme 13', 'bb-vapor-modules-pro' ),
								'scheme14' => __( 'Scheme 14', 'bb-vapor-modules-pro' ),
								'custom'   => __( 'Custom', 'bb-vapor-modules-pro' ),
							),
							'default' => 'scheme1',
							'toggle'  => array(
								'custom' => array(
									'tabs' => 'colors',
								),
							),
						),
						'layout'     => array(
							'type'    => 'select',
							'label'   => __( 'Layout', 'bb-vapor-modules-pro' ),
							'options' => array(
								'card'      => __( 'Card', 'bb-vapor-modules-pro' ),
								'wordpress' => __( 'WordPress', 'bb-vapor-modules-pro' ),
								'large'     => __( 'Large Card', 'bb-vapor-modules-pro' ),
								'flex'      => __( 'Flex Layout', 'bb-vapor-modules-pro' ),
							),
							'default' => 'card',
						),
						'align'      => array(
							'type'    => 'select',
							'label'   => __( 'Align', 'bb-vapor-modules-pro' ),
							'options' => array(
								'left'   => __( 'left', 'bb-vapor-modules-pro' ),
								'center' => __( 'Center', 'bb-vapor-modules-pro' ),
								'right'  => __( 'Right', 'bb-vapor-modules-pro' ),
								'wide'   => __( 'Wide Layout', 'bb-vapor-modules-pro' ),
								'full'   => __( 'Full Width Layout', 'bb-vapor-modules-pro' ),
							),
							'default' => 'full',
						),
					),
				),
			),
		),
		'colors'     => array(
			'title'    => __( 'Colors', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Colors', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'text_color'                => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'color',
								'selector' => '.wp-pic.custom .wp-pic-no-plugin, .entry .wp-pic.custom p, .wp-pic.custom p, .wp-pic.custom .wp-pic-back a:not(.wp-pic-page):hover, .wp-pic.custom .wp-pic-back p, .wp-pic.custom:not(.wordpress) .wp-pic-author a, .wp-pic.custom .wp-pic-dl-link, .wp-pic.custom a.wp-pic-name, .wp-pic.custom .wp-pic-front a.wp-pic-name, .wp-pic.custom .wp-pic-flip .wp-pic-face.wp-pic-back, .wp-pic.custom .wp-pic-bar span, .wp-pic.custom .wp-pic-bar a, .wp-pic.custom .wp-pic-back a:not(.wp-pic-page), .wp-pic.custom .wp-pic-asset-bg-title, .wp-pic.custom .wp-pic-download-link span, .wp-pic.custom .wp-pic-download, .wp-pic.custom .wp-pic-page, .wp-pic.custom a.wp-pic-page',
							),
						),
						'bar_color'                 => array(
							'type'       => 'color',
							'label'      => __( 'Bar', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'background-color',
								'selector' => '.wp-pic.custom .wp-pic-bar, .wp-pic.custom .wp-pic-bar span:after, .wp-pic.custom .wp-pic-bar a:after',
							),
						),
						'background_color'          => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'background-color',
								'selector' => '.wp-pic.custom > div> div',
							),
						),
						'bar_text_color'            => array(
							'type'       => 'color',
							'label'      => __( 'Bar Item Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'      => 'css',
								'property'  => 'color',
								'selector'  => '.wp-pic.custom .wp-pic-rating, .wp-pic.custom .wp-pic-downloaded, .wp-pic.custom .wp-pic-requires',
								'important' => true,
							),
						),
						'bar_item_color'            => array(
							'type'       => 'color',
							'label'      => __( 'Bar Item Emphasis Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'      => 'css',
								'property'  => 'color',
								'selector'  => '.wp-pic.custom .wp-pic-bar em',
								'important' => true,
							),
						),
						'download_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Download Bar Text Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'      => 'css',
								'property'  => 'color',
								'selector'  => '.wp-pic-download-link span',
								'important' => true,
							),
						),
						'download_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Download Bar Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'property' => 'background-color',
								'selector' => '.wp-pic.custom .wp-pic-download, .wp-pic.custom .wp-pic-asset-bg, .wp-pic.custom a.wp-pic-page, .wp-pic.custom.flex .wp-pic-download-link span',
							),
						),
					),
				),
			),
		),
	)
);
