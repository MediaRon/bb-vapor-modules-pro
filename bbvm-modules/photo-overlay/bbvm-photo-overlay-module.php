<?php // phpcs:ignore
class BBVapor_Photo_Overlay_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Photo Overlay', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add an overlay to a photo', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/photo-overlay/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/photo-overlay/',
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
	'BBVapor_Photo_Overlay_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Overlay Photo', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'overlay_photo'     => array(
							'type'        => 'photo',
							'label'       => __( 'Photo to be Overlayed', 'bb-vapor-modules-pro' ),
							'show_remove' => false,
						),
						'overlay_link'      => array(
							'type'  => 'link',
							'label' => __( 'Overlay Link', 'bb-vapor-modules-pro' ),
						),
						'overlay_text'      => array(
							'type'        => 'text',
							'label'       => __( 'Overlay Text', 'bb-vapor-modules-pro' ),
							'placeholder' => __( 'Text to overlay photo', 'bb-vapor-modules-pro' ),
							'description' => __( 'Text to overlay the photo.', 'bb-vapor-modules-pro' ),
							'help'        => __( 'Text to overlay the photo.', 'bb-vapor-modules-pro' ),
						),
						'overlay_text_icon' => array(
							'type'        => 'icon',
							'label'       => __( 'Icon', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
					),
				),
			),
		),
		'overlay' => array(
			'title'    => __( 'Overlay Style', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'overlay' => array(
					'title'  => __( 'Overlay Style', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'overlay_type'             => array(
							'type'    => 'select',
							'label'   => __( 'Select an Overlay Type', 'bb-vapor-modules-pro' ),
							'default' => 'horizontal',
							'options' => array(
								'none'       => __( 'Select an overlay type', 'bb-vapor-modules-pro' ),
								'horizontal' => __( 'Horizontal', 'bb-vapor-modules-pro' ),
								'full'       => __( 'Full Overlay', 'bb-vapor-modules-pro' ),
							),
							'toggle'  => array(
								'horizontal' => array(
									'fields' => array(
										'horizontal_overlay_type',
										'animation',
									),
								),
								'full'       => array(
									'fields' => array( 'animation' ),
								),
							),
						),
						'horizontal_overlay_type'  => array(
							'type'    => 'select',
							'label'   => 'Select an overlay position',
							'options' => array(
								'top'    => __( 'Top', 'bb-vapor-modules-pro' ),
								'middle' => __( 'Middle', 'bb-vapor-modules-pro' ),
								'bottom' => __( 'Bottom', 'bb-vapor-modules-pro' ),
							),
						),
						'animation'                => array(
							'type'    => 'select',
							'label'   => __( 'Select an animation', 'bb-vapor-modules-pro' ),
							'options' => array(
								'regular' => __( 'No animation', 'bb-vapor-modules-pro' ),
								'fade'    => __( 'Fade in', 'bb-vapor-modules-pro' ),
							),
						),
						'overlay_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'overlay_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Background Color', 'bb-vapor-modules-pro' ),
							'default'    => '#FF0000',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'overlay_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Select a Text Color', 'bb-vapor-modules-pro' ),
							'default'    => '#FFFFFF',
							'show_reset' => true,
						),
						'overlay_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'bb-vapor-modules-pro' ),
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-overlay-text',
							),
							'responsive' => true,
						),
					),
				),
			),
		),
	)
);
