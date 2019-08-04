<?php // phpcs:ignore
class BBVapor_Animated_Headlines_Module extends FLBuilderModule {
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Animated Headlines', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Animated Headlines for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Text Effects', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . 'bbvm-modules/animated-headlines/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/animated-headlines/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		$this->add_css( 'animate-headline', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/animated-headlines/css/animate.css', array(), '3.7.0', 'all' );
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Animated_Headlines_Module',
	array(
		'general' => array( // Tab
			'title'    => __( 'General', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'general' => array( // Section
					'title'  => __( 'Headlines', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'headline_text'       => array(
							'type'  => 'text',
							'label' => __( 'Headline Text', 'bb-vapor-modules-pro' ),
						),
						'headline_tag'        => array(
							'type'    => 'select',
							'label'   => __( 'Headline Tag', 'bb-vapor-modules-pro' ),
							'options' => array(
								'h1' => 'H1',
								'h2' => 'H2',
								'h3' => 'H3',
								'h4' => 'H4',
								'h5' => 'H5',
								'h6' => 'H6',
							),
							'default' => 'h2',
						),
						'headline_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Headline Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'headline_margin'     => array(
							'type'       => 'dimension',
							'label'      => __( 'Headline Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'headline_text_color' => array(
							'type'    => 'color',
							'label'   => __( 'Headline Text Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'headline_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Headline Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
					),
				),
			),
		),
		'animations' => array( // Tab
			'title'    => __( 'Animations', 'bb-vapor-modules-pro' ), // Tab title
			'sections' => array( // Tab Sections
				'styles'       => array( // Section
					'title'  => __( 'Animations', 'bb-vapor-modules-pro' ), // Section Title
					'fields' => array( // Section Fields
						'animation_type'            => array(
							'type'    => 'select',
							'label'   => __( 'Headline Animation Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'       => __( 'None', 'bb-vapor-modules-pro' ),
								'color'      => __( 'Color', 'bb-vapor-modules-pro' ),
								'gradient'   => __( 'Gradient', 'bb-vapor-modules-pro' ),
								'bounce'     => __( 'Bounce', 'bb-vapor-modules-pro' ),
								'flash'      => __( 'Flash', 'bb-vapor-modules-pro' ),
								'pulse'      => __( 'Pulse', 'bb-vapor-modules-pro' ),
								'rubberBand' => __( 'Rubber Band', 'bb-vapor-modules-pro' ),
								'shake'      => __( 'Shake', 'bb-vapor-modules-pro' ),
								'swing'      => __( 'Swing', 'bb-vapor-modules-pro' ),
								'tada'       => __( 'Tada', 'bb-vapor-modules-pro' ),
								'wobble'     => __( 'Wobble', 'bb-vapor-modules-pro' ),
								'jello'      => __( 'Jello', 'bb-vapor-modules-pro' ),
								'heartBeat'  => __( 'Heartbeat', 'bb-vapor-modules-pro' ),

							),
							'toggle'  => array(
								'color' => array(
									'fields' => array(
										'original_color',
										'animated_color',
									),
								),
								'gradient' => array(
									'fields' => array(
										'gradient_color_first',
										'gradient_color_first_last',
									),
								),
							),
							'default' => 'none',
						),
						'original_color'            => array(
							'type'    => 'color',
							'label'   => __( 'Starting Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'animated_color' => array(
							'type'    => 'color',
							'label'   => __( 'Ending Color', 'bb-vapor-modules-pro' ),
							'default' => '333333',
						),
						'gradient_color_first'      => array(
							'type'    => 'color',
							'label'   => __( 'Gradient Color Beginning', 'bb-vapor-modules-pro' ),
							'default' => '000000',
						),
						'gradient_color_first_last' => array(
							'type'    => 'color',
							'label'   => __( 'Gradient Color End', 'bb-vapor-modules-pro' ),
							'default' => '333333',
						),
						'animation_duration'        => array(
							'type'    => 'unit',
							'label'   => __( 'Animation Duration in Seconds', 'bb-vapor-modules-pro' ),
							'default' => '5',
						),
					),
				),
			),
		),
	)
);
