<?php //phpcs:ignore
class BBVapor_Advanced_Separator_Module extends FLBuilderModule {

	/**
	 * Module constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Advanced Separator', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Advanced Separator for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Separators/Spacers', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/advanced-separator/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/advanced-separator/',
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
	'BBVapor_Advanced_Separator_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Separator', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'color'                 => array(
							'type'       => 'color',
							'label'      => __( 'Color of Separator', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector'  => 'hr.fl-bbvm-advanced-separator:before',
										'property'  => 'background-color',
										'important' => true,
									),
									array(
										'selector'  => '.fl-bbvm-advanced-separator-line',
										'property'  => 'background-color',
										'important' => true,
									),
								),
							),
						),
						'style'                 => array(
							'type'    => 'select',
							'label'   => __( 'Separator style', 'bb-vapor-modules-pro' ),
							'default' => 'line',
							'options' => array(
								'line'          => __( 'Line', 'bb-vapor-modules-pro' ),
								'line_radius'   => __( 'Line With Radius', 'bb-vapor-modules-pro' ),
								'line_icon'     => __( 'Line With Icon', 'bb-vapor-modules-pro' ),
								'line_photo'    => __( 'Line With Photo', 'bb-vapor-modules-pro' ),
								'line_content'  => __( 'Line With Content', 'bb-vapor-modules-pro' ),
								'line_gradient' => __( 'Line With Gradient Background', 'bb-vapor-modules-pro' ),
								'double'        => __( 'Double Line', 'bb-vapor-modules-pro' ),
								'photo'         => __( 'Background Photo', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'line'          => array(
									'fields' => array(
										'separator_height',
									),
								),
								'line_radius'   => array(
									'fields' => array(
										'separator_height',
										'radius',
									),
								),
								'line_icon'     => array(
									'fields' => array(
										'separator_height',
										'icon',
										'icon_size',
										'icon_style',
										'icon_color',
										'background_color',
									),
								),
								'line_gradient' => array(
									'fields' => array(
										'separator_height',
										'gradient_color_left',
										'gradient_color_center',
										'gradient_color_right',
									),
								),
								'line_content'  => array(
									'fields' => array(
										'content',
										'content_typography',
										'separator_height',
										'content_color',
									),
								),
								'double'        => array(
									'fields' => array(
										'separator_height',
										'double_margin',
										'border_thickness',
									),
								),
								'photo'         => array(
									'fields' => array(
										'photo',
										'repeat',
										'separator_height',
									),
								),
								'line_photo'    => array(
									'fields' => array(
										'style_photo',
										'separator_height',
										'photo_style',
										'photo_size',
									),
								),
							),
						),
						'separator_height'      => array(
							'type'        => 'unit',
							'label'       => __( 'Separator height', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '1',
							'preview'     => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector'  => 'hr.fl-bbvm-advanced-separator',
										'property'  => 'height',
										'unit'      => 'px',
										'important' => true,
									),
									array(
										'selector'  => 'hr.fl-bbvm-advanced-separator:before',
										'property'  => 'height',
										'unit'      => 'px',
										'important' => true,
									),
									array(
										'selector' => '.fl-bbvm-advanced-separator-radius',
										'property' => 'height',
										'unit'     => 'px',
									),
									array(
										'selector'  => '.fl-bbvm-advanced-separator-line',
										'property'  => 'height',
										'unit'      => 'px',
										'important' => true,
									),
								),
							),
						),
						'gradient_color_left'   => array(
							'type'       => 'color',
							'label'      => __( 'Gradient Left Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'rgba(255,255,255,0)',
							'preview' => array(
								'type'     => 'callback',
								'callback' => 'bbvm_advanced_separator_gradient_changed',
							),
						),
						'gradient_color_middle' => array(
							'type'       => 'color',
							'label'      => __( 'Gradient Middle Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'ffa801',
							'preview'    => array(
								'type'     => 'callback',
								'callback' => 'bbvm_advanced_separator_gradient_changed',
							),
						),
						'gradient_color_right'  => array(
							'type'       => 'color',
							'label'      => __( 'Gradient Right Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'rgba(255,255,255,0)',
							'preview' => array(
								'type'     => 'callback',
								'callback' => 'bbvm_advanced_separator_gradient_changed',
							),
						),
						'style_photo'           => array(
							'type'  => 'photo',
							'label' => __( 'Select a photo', 'bb-vapor-modules-pro' ),
						),
						'photo_style'           => array(
							'type'    => 'select',
							'label'   => __( 'Select a photo style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'simple'   => __( 'Simple', 'bb-vapor-modules-pro' ),
								'square'   => __( 'Square', 'bb-vapor-modules-pro' ),
								'circular' => __( 'Circular', 'bb-vapor-modules-pro' ),
							),
						),
						'photo_size'            => array(
							'type'        => 'unit',
							'label'       => __( 'Enter a photo size', 'bb-vapor-modules-pro' ),
							'responsive'  => true,
							'description' => 'px',
							'default'     => '50',
							'preview'     => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector'  => '.fl-bbvm-advanced-separator-icon img',
										'property'  => 'height',
										'important' => true,
										'unit'      => 'px',
									),
									array(
										'selector'  => '.fl-bbvm-advanced-separator-icon img',
										'property'  => 'width',
										'unit'      => 'px',
										'important' => true,
									),
								),
							),
						),
						'icon'                  => array(
							'type'  => 'icon',
							'label' => __( 'Enter an icon', 'bb-vapor-modules-pro' ),
						),
						'icon_size'             => array(
							'type'    => 'unit',
							'label'   => __( 'Enter an icon size', 'bb-vapor-modules-pro' ),
							'default' => '24',
							'preview' => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector'  => '.fl-bbvm-advanced-separator-icon i',
										'property'  => 'font-size',
										'unit'      => 'px',
										'important' => true,
									),
								),
							),
						),
						'icon_style'            => array(
							'type'    => 'select',
							'label'   => __( 'Select an icon style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'simple'   => __( 'Simple', 'bb-vapor-modules-pro' ),
								'square'   => __( 'Square', 'bb-vapor-modules-pro' ),
								'circular' => __( 'Circular', 'bb-vapor-modules-pro' ),
							),
						),
						'icon_color'            => array(
							'type'       => 'color',
							'label'      => __( 'Enter an icon color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector'  => '.fl-bbvm-advanced-separator-icon i',
										'property'  => 'color',
										'important' => true,
									),
								),
							),
						),
						'background_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Enter a background color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector'  => '.fl-bbvm-advanced-separator-icon i',
										'property'  => 'background-color',
										'important' => true,
									),
								),
							),
						),
						'radius'                => array(
							'type'        => 'unit',
							'label'       => __( 'Enter a radius', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '0',
							'preview'     => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.fl-bbvm-advanced-separator-radius',
										'property' => 'border-radius',
										'unit'     => 'px',
									),
								),
							),
						),
						'photo'                 => array(
							'type'  => 'photo',
							'label' => __( 'Background Photo', 'bb-vapor-modules-pro' ),
						),
						'repeat'                => array(
							'type'    => 'select',
							'label'   => __( 'Repeat Options', 'bb-vapor-modules-pro' ),
							'default' => 'repeat-x',
							'options' => array(
								'repeat'    => 'repeat',
								'repeat-y'  => 'repeat-y',
								'repeat-x'  => 'repeat-x',
								'no-repeat' => 'no-repeat',
							),
						),
						'double_margin'         => array(
							'type'        => 'unit',
							'label'       => __( 'Margin between separators', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '2',
						),
						'border_thickness'      => array(
							'type'        => 'unit',
							'label'       => __( 'Thickness of separators', 'bb-vapor-modules-pro' ),
							'description' => 'px',
							'default'     => '1',
						),
						'content'               => array(
							'type'    => 'text',
							'label'   => __( 'Separator Content', 'bb-vapor-modules-pro' ),
							'default' => '***',
							'preview' => array(
								'type'     => 'text',
								'selector' => '.line-content',
							),
						),
						'content_typography'    => array(
							'type'       => 'typography',
							'label'      => __( 'Separator Content Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.line-content',
									),
								),
							),
						),
						'content_color'         => array(
							'type'    => 'color',
							'label'   => __( 'Content Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
							'preview' => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector'  => '.line-content',
										'property'  => 'color',
										'important' => true,
									),
								),
							),
						),
					),
				),
			),
		),
	)
);
