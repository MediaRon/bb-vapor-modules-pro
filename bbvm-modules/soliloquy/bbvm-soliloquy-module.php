<?php // phpcs:ignore
class BBVapor_Soliloquy_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Soliloquy', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Soliloquy for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'External Plugins', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/soliloquy/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/soliloquy/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => true, // Defaults to false and can be omitted.
			)
		);
	}
}
/**
 * Register the module and its form settings.
 */
$sliders_array = array( '0' => __( 'Select a slider', 'bb-vapor-modules-pro' ) );
$sliders       = Soliloquy::get_instance()->get_sliders();
if ( ! empty( $sliders ) ) {
	foreach ( $sliders as $slider ) {
		$sliders_array[ $slider['id'] ] = $slider['config']['title'];
	}
}
FLBuilder::register_module(
	'BBVapor_Soliloquy_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Slider Select', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'slider' => array(
							'type'    => 'select',
							'label'   => __( 'Select a slider', 'bb-vapor-modules-pro' ),
							'options' => $sliders_array,
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
						'max_height'              => array(
							'type'        => 'unit',
							'label'       => __( 'Max height of slider', 'bb-vapor-modules-pro' ),
							'description' => 'px',
						),
						'max_width'               => array(
							'type'        => 'unit',
							'label'       => __( 'Max width of slider', 'bb-vapor-modules-pro' ),
							'description' => 'px',
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
