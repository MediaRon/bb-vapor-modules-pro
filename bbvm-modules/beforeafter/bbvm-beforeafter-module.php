<?php // phpcs:ignore
class BBVapor_Before_After_Module extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Before and After', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Before and After', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/beforeafter/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/beforeafter/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		$this->add_js( 'jquery-movemove', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/beforeafter/js/jquery-mousemove.js', array( 'jquery' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, true );
		$this->add_js( 'bbvm-move-horizontal', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/beforeafter/js/move-horizontal.js', array( 'jquery-movemove' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, true );
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Before_After_Module',
	array(
		'general'         => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Before and After', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'image_before'               => array(
							'type'        => 'photo',
							'label'       => __( 'Before Photo', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
							'description' => __( 'Ensure the images are the same size', 'bb-vapor-modules-pro' ),
						),
						'image_after'                => array(
							'type'        => 'photo',
							'label'       => __( 'After Photo', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
							'description' => __( 'Ensure the images are the same size', 'bb-vapor-modules-pro' ),
						),
						'style'                      => array(
							'type'    => 'select',
							'label'   => __( 'Select a Style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'side'                 => __( 'Side to Side', 'bb-vapor-modules-pro' ),
								'fade'                 => __( 'Fade', 'bb-vapor-modules-pro' ),
								'hover'                => __( 'Hover', 'bb-vapor-modules-pro' ),
								'separator_vertical'   => __( 'Vertical Separator', 'bb-vapor-modules-pro' ),
								'separator_horizontal' => __( 'Horizontal Separator', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'hover'                => array( 'fields' => array( 'transition_delay' ) ),
								'fade'                 => array( 'fields' => array( 'transition_delay' ) ),
								'separator_horizontal' => array( 'fields' => array( 'separator_line_color', 'separator_background_color', 'separator_arrow_color', 'separator_style' ) ),
								'separator_vertical'   => array( 'fields' => array( 'separator_line_color', 'separator_background_color', 'separator_arrow_color', 'separator_style' ) ),
							),
						),
						'separator_line_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Separator Line Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'separator_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Separator Background Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'show_alpha' => true,
							'default'    => 'transparent',
						),
						'separator_arrow_color'      => array(
							'type'       => 'color',
							'label'      => __( 'Separator Arrow Color', 'bb-vapor-modules-pro' ),
							'show_reset' => true,
							'default'    => 'FFFFFF',
						),
						'separator_style'            => array(
							'type'    => 'select',
							'label'   => __( 'Separator Style', 'bb-vapor-modules-pro' ),
							'options' => array(
								'circular' => __( 'Circular', 'bb-vapor-modules-pro' ),
								'square'   => __( 'Square', 'bb-vapor-modules-pro' ),
							),
							'default' => 'circular',
						),
						'transition_delay'           => array(
							'type'    => 'unit',
							'label'   => __( 'Transition Delay in Seconds', 'bb-vapor-modules-pro' ),
							'default' => '5',
						),
					),
				),
			),
		),
		'beforeaftertext' => array(
			'title'    => __( 'Before & After Text', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'beforeaftertext' => array(
					'title'  => __( 'Before & After Text', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'show_before_after_text' => array(
							'type'    => 'select',
							'label'   => __( 'Show Before/After Text', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'yes',
						),
						'before_text'            => array(
							'type'    => 'text',
							'label'   => __( 'Before Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'Before', 'bb-vapor-modules-pro' ),
						),
						'after_text'             => array(
							'type'    => 'text',
							'label'   => __( 'After Text', 'bb-vapor-modules-pro' ),
							'default' => __( 'After', 'bb-vapor-modules-pro' ),
						),
						'text_color'             => array(
							'type'       => 'color',
							'label'      => __( 'Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'background_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules-pro' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'typography'             => array(
							'type'  => 'typography',
							'label' => __( 'Text Typography', 'bb-vapor-modules-pro' ),
						),
					),
				),
			),
		),
	)
);
