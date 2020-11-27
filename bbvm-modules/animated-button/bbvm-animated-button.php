<?php // phpcs:ignore
class BBVapor_Animated_Button_Module extends FLBuilderModule {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Animated Button', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Add a Animated Button', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/animated-button/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/animated-button/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
		$this->add_css( 'mrbb-hover', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'css/hover-min.css', array(), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, 'all' );
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Animated_Button_Module',
	array(
		'general'    => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'General', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button_id'                       => array(
							'type'    => 'text',
							'label'   => __( 'Unique Button ID for Styling', 'bb-vapor-modules-pro' ),
							'default' => 'button_id_' . rand( 0, 10000 ), // phpcs:ignore
						),
						'button_text'                     => array(
							'type'    => 'text',
							'label'   => __( 'Button Text', 'bb-vapor-modules-pro' ),
							'preview' => array(
								'type'     => 'text',
								'selector' => '.fl-bbvm-animated-button-for-beaverbuilder-wrapper span',
							),
						),
						'button_link'                     => array(
							'type'    => 'link',
							'label'   => __( 'Button Link', 'bb-vapor-modules-pro' ),
							'preview' => array(),
						),
						'button_icon'                     => array(
							'type'        => 'icon',
							'label'       => __( 'Button Icon', 'bb-vapor-modules-pro' ),
							'show_remove' => true,
						),
						'button_icon_location'            => array(
							'type'    => 'select',
							'label'   => __( 'Icon Location', 'bb-vapor-modules-pro' ),
							'options' => array(
								'before' => __( 'Before Button', 'bb-vapor-modules-pro' ),
								'after'  => __( 'After Button', 'bb-vapor-modules-pro' ),
							),
							'default' => 'before',
						),
						'button_text_color'               => array(
							'type'    => 'color',
							'label'   => __( 'Button Text Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
							'preview' => array(
								'type'      => 'css',
								'selector'  => '.bbvm-button',
								'property'  => 'color',
								'important' => true,
							),
						),
						'button_text_color_hover'         => array(
							'type'    => 'color',
							'label'   => __( 'Button Text Color on Hover', 'bb-vapor-modules-pro' ),
							'default' => '000000',
							'preview' => array(
								'type'      => 'css',
								'selector'  => '.bbvm-button:hover',
								'property'  => 'color',
								'important' => true,
							),
						),
						'button_background_color'         => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'FFFFFF',
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.bbvm-button',
								'property'  => 'background-color',
								'important' => true,
							),
						),
						'button_background_color_hover'   => array(
							'type'       => 'color',
							'label'      => __( 'Button Background Hover Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'FFFFFF',
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.bbvm-button:hover',
								'property'  => 'background-color',
								'important' => true,
							),
						),
						'button_style_border_color'       => array(
							'type'    => 'color',
							'label'   => __( 'Button Style Border Color', 'bb-vapor-modules-pro' ),
							'default' => '000000',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-button',
								'property' => 'border-color',
							),
						),
						'button_style_border_color_hover' => array(
							'type'    => 'color',
							'label'   => __( 'Button Style Border Color Hover', 'bb-vapor-modules-pro' ),
							'default' => '000000',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-button:hover',
								'property' => 'border-color',
							),
						),
					),
				),
			),
		),
		'animations' => array(
			'title'    => __( 'Animations', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'animations' => array(
					'title'  => __( 'Animations', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'icon_animation'                  => array(
							'type'    => 'select',
							'label'   => __( 'Allow Icon Hover Animations', 'bb-vapor-modules-pro' ),
							'options' => array(
								'yes' => __( 'Yes', 'bb-vapor-modules-pro' ),
								'no'  => __( 'No', 'bb-vapor-modules-pro' ),
							),
							'default' => 'no',
							'toggle'  => array(
								'yes' => array(
									'fields' => array(
										'icon_animation_hover',
									),
								),
							),
						),
						'icon_animation_hover'            => array(
							'type'    => 'select',
							'label'   => __( 'Icon Hover Animation Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'                     => __( 'None', 'bb-vapor-modules-pro' ),
								'hvr-icon-back'            => __( 'Icon Back', 'bb-vapor-modules-pro' ),
								'hvr-icon-forward'         => __( 'Icon Forward', 'bb-vapor-modules-pro' ),
								'hvr-icon-down'            => __( 'Icon Down', 'bb-vapor-modules-pro' ),
								'hvr-icon-up'              => __( 'Icon Up', 'bb-vapor-modules-pro' ),
								'hvr-icon-spin'            => __( 'Icon Spin', 'bb-vapor-modules-pro' ),
								'hvr-icon-drop'            => __( 'Icon Drop', 'bb-vapor-modules-pro' ),
								'hvr-icon-fade'            => __( 'Icon Fade', 'bb-vapor-modules-pro' ),
								'hvr-icon-float-away'      => __( 'Icon Float Away', 'bb-vapor-modules-pro' ),
								'hvr-icon-sink-away'       => __( 'Icon Sink Away', 'bb-vapor-modules-pro' ),
								'hvr-icon-grow'            => __( 'Icon Grow', 'bb-vapor-modules-pro' ),
								'hvr-icon-shrink'          => __( 'Icon Shrink', 'bb-vapor-modules-pro' ),
								'hvr-icon-pulse'           => __( 'Icon Pulse', 'bb-vapor-modules-pro' ),
								'hvr-icon-pulse-grow'      => __( 'Icon Pulse Grow', 'bb-vapor-modules-pro' ),
								'hvr-icon-pulse-shrink'    => __( 'Icon Pulse Shrink', 'bb-vapor-modules-pro' ),
								'hvr-icon-push'            => __( 'Icon Push', 'bb-vapor-modules-pro' ),
								'hvr-icon-pop'             => __( 'Icon Pop', 'bb-vapor-modules-pro' ),
								'hvr-icon-bounce'          => __( 'Icon Bounce', 'bb-vapor-modules-pro' ),
								'hvr-icon-rotate'          => __( 'Icon Rotate', 'bb-vapor-modules-pro' ),
								'hvr-icon-grow-rotate'     => __( 'Icon Grow Rotate', 'bb-vapor-modules-pro' ),
								'hvr-icon-float'           => __( 'Icon Float', 'bb-vapor-modules-pro' ),
								'hvr-icon-sink'            => __( 'Icon Sink', 'bb-vapor-modules-pro' ),
								'hvr-icon-bob'             => __( 'Icon Bob', 'bb-vapor-modules-pro' ),
								'hvr-icon-hang'            => __( 'Icon Hang', 'bb-vapor-modules-pro' ),
								'hvr-icon-wobble-horizontal' => __( 'Icon Wobble Horizontal', 'bbvm-bb-modulues' ),
								'hvr-icon-wobble-vertical' => __( 'Icon Wobble Vertical', 'bb-vapor-modules-pro' ),
								'hvr-icon-buzz'            => __( 'Icon Buzz', 'bb-vapor-modules-pro' ),
								'hvr-icon-buzz-out'        => __( 'Icon Buzz Out', 'bb-vapor-modules-pro' ),
							),
							'default' => 'none',
						),
						'button_animation'                => array(
							'type'    => 'select',
							'label'   => __( 'Button Animation Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'2d'          => __( '2D Transitions', 'bb-vapor-modules-pro' ),
								'background'  => __( 'Background Transitions', 'bb-vapor-modules-pro' ),
								'border'      => __( 'Border Transitions', 'bb-vapor-modules-pro' ),
								'shadow_glow' => __( 'Shadow and Glow Transitions', 'bb-vapor-modules-pro' ),
								'speech'      => __( 'Speech Buttles', 'bb-vapor-modules-pro' ),
								'curls'       => __( 'Curls', 'bb-vapor-modules-pro' ),
							),
							'default' => '2d',
							'toggle'  => array(
								'2d'          => array( 'fields' => array( 'animation_type_2d' ) ),
								'background'  => array( 'fields' => array( 'animation_type_background', 'animation_type_background_color' ) ),
								'border'      => array( 'fields' => array( 'animation_type_border' ) ),
								'shadow_glow' => array( 'fields' => array( 'shadow_and_glow', 'shadow_and_glow_color' ) ),
								'speech'      => array( 'fields' => array( 'speech_bubble' ) ),
								'curls'       => array( 'fields' => array( 'curls' ) ),
							),
						),
						'animation_type_2d'               => array(
							'type'    => 'select',
							'label'   => __( '2D Animation Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'                    => __( 'None', 'bb-vapor-modules-pro' ),
								'hvr-grow'                => __( 'Grow', 'bb-vapor-modules-pro' ),
								'hvr-shrink'              => __( 'Shrink', 'bb-vapor-modules-pro' ),
								'hvr-pulse'               => __( 'Pulse', 'bb-vapor-modules-pro' ),
								'hvr-pulse-grow'          => __( 'Pulse Grow', 'bb-vapor-modules-pro' ),
								'hvr-pulse-shrink'        => __( 'Pulse Shrink', 'bb-vapor-modules-pro' ),
								'hvr-push'                => __( 'Push', 'bb-vapor-modules-pro' ),
								'hvr-pop'                 => __( 'Pop', 'bb-vapor-modules-pro' ),
								'hvr-bounce-in'           => __( 'Bounce In', 'bb-vapor-modules-pro' ),
								'hvr-bounce-out'          => __( 'Bounce Out', 'bb-vapor-modules-pro' ),
								'hvr-rotate'              => __( 'Rotate', 'bb-vapor-modules-pro' ),
								'hvr-grow-rotate'         => __( 'Grow Rotate', 'bb-vapor-modules-pro' ),
								'hvr-float'               => __( 'Float', 'bb-vapor-modules-pro' ),
								'hvr-sink'                => __( 'Sink', 'bb-vapor-modules-pro' ),
								'hvr-bob'                 => __( 'Bob', 'bb-vapor-modules-pro' ),
								'hvr-hang'                => __( 'Hang', 'bb-vapor-modules-pro' ),
								'hvr-skew'                => __( 'Skew', 'bb-vapor-modules-pro' ),
								'hvr-skew-forward'        => __( 'Skew Forward', 'bb-vapor-modules-pro' ),
								'hvr-skew-backward'       => __( 'Skew Backward', 'bb-vapor-modules-pro' ),
								'hvr-wobble-horizontal'   => __( 'Wobble Horizontal', 'bb-vapor-modules-pro' ),
								'hvr-wobble-vertical'     => __( 'Wobble Vertical', 'bb-vapor-modules-pro' ),
								'hvr-wobble-to-bottom-right' => __( 'Wobble to Bottom Right', 'bb-vapor-modules-pro' ),
								'hvr-wobble-to-top-right' => __( 'Wobble to Top Right', 'bb-vapor-modules-pro' ),
								'hvr-wobble-top'          => __( 'Wobble Top', 'bb-vapor-modules-pro' ),
								'hvr-wobble-bottom'       => __( 'Wobble Bottom', 'bb-vapor-modules-pro' ),
								'hvr-wobble-skew'         => __( 'Wobble Skew', 'bb-vapor-modules-pro' ),
								'hvr-buzz'                => __( 'Buzz', 'bb-vapor-modules-pro' ),
								'hvr-buzz-out'            => __( 'Buzz Out', 'bb-vapor-modules-pro' ),
								'hvr-forward'             => __( 'Forward', 'bb-vapor-modules-pro' ),
								'hvr-backward'            => __( 'Backward', 'bb-vapor-modules-pro' ),
							),
							'default' => 'none',
						),
						'animation_type_background'       => array(
							'type'    => 'select',
							'label'   => __( 'Animation Background', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'                     => __( 'None', 'bb-vapor-modules-pro' ),
								'hvr-fade'                 => __( 'Fade', 'bb-vapor-modules-pro' ),
								'hvr-back-pulse'           => __( 'Pulse', 'bb-vapor-modules-pro' ),
								'hvr-sweep-to-right'       => __( 'Sweep to Right', 'bb-vapor-modules-pro' ),
								'hvr-sweep-to-left'        => __( 'Sweep to Left', 'bb-vapor-modules-pro' ),
								'hvr-sweep-to-bottom'      => __( 'Sweep to Bottom', 'bb-vapor-modules-pro' ),
								'hvr-sweep-to-top'         => __( 'Sweep to Top', 'bb-vapor-modules-pro' ),
								'hvr-bounce-to-right'      => __( 'Bounce to Right', 'bb-vapor-modules-pro' ),
								'hvr-bounce-to-left'       => __( 'Bounce to Left', 'bb-vapor-modules-pro' ),
								'hvr-bounce-to-bottom'     => __( 'Bounce to Bottom', 'bb-vapor-modules-pro' ),
								'hvr-bounce-to-top'        => __( 'Bounce to Top', 'bb-vapor-modules-pro' ),
								'hvr-radial-out'           => __( 'Radial Out', 'bb-vapor-modules-pro' ),
								'hvr-radial-in'            => __( 'Radial In', 'bb-vapor-modules-pro' ),
								'hvr-rectangle-in'         => __( 'Rectangle In', 'bb-vapor-modules-pro' ),
								'hvr-rectangle-out'        => __( 'Rectangle Out', 'bb-vapor-modules-pro' ),
								'hvr-shutter-in-horizontal' => __( 'Shutter In Horizontal', 'bb-vapor-modules-pro' ),
								'hvr-shutter-out-horizontal' => __( 'Shutter Out Horizontal', 'bb-vapor-modules-pro' ),
								'hvr-shutter-in-vertical'  => __( 'Shutter In Vertical', 'bb-vapor-modules-pro' ),
								'hvr-shutter-out-vertical' => __( 'Shutter Out Vertical', 'bb-vapor-modules-pro' ),
							),
							'default' => 'none',
						),
						'animation_type_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Transition Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'rgba(0,0,0,0.1)',
						),
						'animation_type_border'           => array(
							'type'    => 'select',
							'label'   => __( 'Animation Border Type', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'                     => __( 'None', 'bb-vapor-modules-pro' ),
								'hvr-border-fade'          => __( 'Border Fade', 'bb-vapor-modules-pro' ),
								'hvr-hollow'               => __( 'Hollow', 'bb-vapor-modules-pro' ),
								'hvr-trim'                 => __( 'Trim', 'bb-vapor-modules-pro' ),
								'hvr-ripple-out'           => __( 'Ripple Out', 'bb-vapor-modules-pro' ),
								'hvr-ripple-in'            => __( 'Ripple In', 'bb-vapor-modules-pro' ),
								'hvr-outline-out'          => __( 'Outline Out', 'bb-vapor-modules-pro' ),
								'hvr-outline-in'           => __( 'Outline In', 'bb-vapor-modules-pro' ),
								'hvr-round-corners'        => __( 'Rounded Corners', 'bb-vapor-modules-pro' ),
								'hvr-underline-from-left'  => __( 'Underline From Left', 'bb-vapor-modules-pro' ),
								'hvr-underline-from-center' => __( 'Underline From Center', 'bb-vapor-modules-pro' ),
								'hvr-underline-from-right' => __( 'Underline From Right', 'bb-vapor-modules-pro' ),
								'hvr-reveal'               => __( 'Reveal', 'bb-vapor-modules-pro' ),
								'hvr-underline-reveal'     => __( 'Underline Reveal', 'bb-vapor-modules-pro' ),
								'hvr-overline-reveal'      => __( 'Overline Reveal', 'bb-vapor-modules-pro' ),
								'hvr-overline-from-left'   => __( 'Overline From Left', 'bb-vapor-modules-pro' ),
								'hvr-overline-from-center' => __( 'Overline From Center', 'bb-vapor-modules-pro' ),
								'hvr-overline-from-right'  => __( 'Overline From Right', 'bb-vapor-modules-pro' ),
							),
							'default' => 'none',
						),
						'shadow_and_glow'                 => array(
							'type'    => 'select',
							'label'   => __( 'Shadow and Glow', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'                  => __( 'None', 'bb-vapor-modules-pro' ),
								'hvr-shadow'            => __( 'Shadow', 'bb-vapor-modules-pro' ),
								'hvr-grow-shadow'       => __( 'Grow Shadow', 'bb-vapor-modules-pro' ),
								'hvr-float-shadow'      => __( 'Float Shadow', 'bb-vapor-modules-pro' ),
								'hvr-glow'              => __( 'Glow', 'bb-vapor-modules-pro' ),
								'hvr-shadow-radial'     => __( 'Shadow Radial', 'bb-vapor-modules-pro' ),
								'hvr-box-shadow-outset' => __( 'Box Shadow Outset', 'bb-vapor-modules-pro' ),
								'hvr-box-shadow-inset'  => __( 'Box Shadow Inset', 'bb-vapor-modules-pro' ),
							),
							'default' => 'none',
						),
						'shadow_and_glow_color'           => array(
							'type'       => 'color',
							'label'      => __( 'Shadow and Glow Color', 'bb-vapor-modules-pro' ),
							'show_alpha' => true,
							'show_reset' => true,
							'default'    => 'rgba(0, 0, 0, 0.5)',
						),
						'speech_bubble'                   => array(
							'type'    => 'select',
							'label'   => __( 'Speech Bubbles', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'                    => __( 'None', 'bb-vapor-modules-pro' ),
								'hvr-bubble-top'          => __( 'Bubble Top', 'bb-vapor-modules-pro' ),
								'hvr-bubble-right'        => __( 'Bubble Right', 'bb-vapor-modules-pro' ),
								'hvr-bubble-bottom'       => __( 'Bubble Bottom', 'bb-vapor-modules-pro' ),
								'hvr-bubble-left'         => __( 'Bubble Left', 'bb-vapor-modules-pro' ),
								'hvr-bubble-float-top'    => __( 'Bubble Float Top', 'bb-vapor-modules-pro' ),
								'hvr-bubble-float-right'  => __( 'Bubble Float Right', 'bb-vapor-modules-pro' ),
								'hvr-bubble-float-bottom' => __( 'Bubble Float Bottom', 'bb-vapor-modules-pro' ),
								'hvr-bubble-float-left'   => __( 'Bubble Float Left', 'bb-vapor-modules-pro' ),
							),
							'default' => 'none',
						),
						'curls'                           => array(
							'type'    => 'select',
							'label'   => __( 'Curls', 'bb-vapor-modules-pro' ),
							'options' => array(
								'none'                  => __( 'None', 'bb-vapor-modules-pro' ),
								'hvr-curl-top-left'     => __( 'Curl Top Left', 'bb-vapor-modules-pro' ),
								'hvr-curl-top-right'    => __( 'Curl Top Right', 'bb-vapor-modules-pro' ),
								'hvr-curl-bottom-right' => __( 'Curl Bottom Right', 'bb-vapor-modules-pro' ),
								'hvr-curl-bottom-left'  => __( 'Curl Bottom Left', 'bb-vapor-modules-pro' ),
							),
							'default' => 'none',
						),
					),
				),
			),
		),
		'styles'     => array(
			'title'    => __( 'Styles', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'styles' => array(
					'title'  => __( 'Styles', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'button_alignment'  => array(
							'type'    => 'align',
							'label'   => __( 'Button Alignment', 'bb-vapor-modules-pro' ),
							'default' => 'center',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-bbvm-animated-button-for-beaverbuilder-wrapper',
								'property' => 'text-align',
							),
						),
						'button_padding'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Padding', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-button',
								'property' => 'padding',
								'unit'     => 'px',
							),
						),
						'button_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Button Typography', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-button',
							),
						),
						'button_margin'     => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Margin', 'bb-vapor-modules-pro' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-button',
								'property' => 'margin',
								'unit'     => 'px',
							),
						),
						'button_radius'     => array(
							'type'       => 'dimension',
							'label'      => __( 'Button Radius', 'bb-vapor-modules-pro' ),
							'responsive' => true,
						),
						'button_min_width'  => array(
							'type'       => 'unit',
							'label'      => __( 'Button Min Width', 'bb-vapor-modules-pro' ),
							'default'    => '0',
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-button',
								'property' => 'min-width',
								'unit'     => 'px',
							),
						),
					),
				),
			),
		),
	)
);
