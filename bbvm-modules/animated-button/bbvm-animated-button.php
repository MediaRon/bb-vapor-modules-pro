<?php
class BBVapor_Animated_Button_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Animated Button', 'bb-vapor-modules' ),
			'description'     => __( 'Add a Animated Button', 'bb-vapor-modules' ),
			'category'        => __( 'Base', 'bb-vapor-modules' ),
			'group'           => __( 'Vapor', 'mediarion-bb-modules' ),
			'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/animated-button/',
			'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/animated-button/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
	public function enqueue_scripts() {
		if( $this->settings ) {
			$this->add_css('mrbb-hover', BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/animated-button/css/hover-min.css', array(), BBVAPOR_BEAVER_BUILDER_VERSION, 'all' );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BBVapor_Animated_Button_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('General', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'button_id'         => array(
						'type'          => 'text',
						'label' => __( 'Unique Button ID for Styling', 'bb-vapor-modules' ),
						'default' => 'button_id_' . rand(0,10000),
					),
					'button_text'         => array(
						'type'          => 'text',
						'label' => __( 'Button Text', 'bb-vapor-modules' )
					),
					'button_link'         => array(
						'type'          => 'link',
						'label' => __( 'Button Link', 'bb-vapor-modules' )
					),
					'button_icon'         => array(
						'type'          => 'icon',
						'label' => __( 'Button Icon', 'bb-vapor-modules' ),
						'show_remove'   => true
					),
					'button_icon_location' => array(
						'type' => 'select',
						'label' => __( 'Icon Location', 'bb-vapor-modules' ),
						'options' => array(
							'before' => __( 'Before Button', 'bb-vapor-modules' ),
							'after' => __( 'After Button', 'bb-vapor-modules' )
						),
						'default' => 'before'
					),
					'button_text_color'         => array(
						'type'          => 'color',
						'label' => __( 'Button Text Color', 'bb-vapor-modules' ),
						'default' => '000000'
					),
					'button_text_color_hover'         => array(
						'type'          => 'color',
						'label' => __( 'Button Text Color on Hover', 'bb-vapor-modules' ),
						'default' => '000000'
					),
					'button_background_color' => array(
						'type' => 'color',
						'label' => __( 'Button Background Color', 'bb-vapor-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'button_background_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Background Hover Color', 'bb-vapor-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'button_style_border_color' => array(
						'type' => 'color',
						'label' => __( 'Button Style Border Color', 'bb-vapor-modules' ),
						'default' => '000000'
					),
					'button_style_border_color_hover' => array(
						'type' => 'color',
						'label' => __( 'Button Style Border Color Hover', 'bb-vapor-modules' ),
						'default' => '000000'
					)
				)
			)
		)
	),
	'animations'       => array( // Tab
		'title'         => __('Animations', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'animations'       => array( // Section
				'title'         => __('Animations', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'icon_animation'         => array(
						'type'          => 'select',
						'label' => __( 'Allow Icon Hover Animations', 'bb-vapor-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'bb-vapor-modules' ),
							'no' => __( 'No', 'bb-vapor-modules' ),
						),
						'default' => 'no',
						'toggle' => array( 'yes' => array( 'fields' => array( 'icon_animation_hover' ) ) )
					),
					'icon_animation_hover' => array(
						'type' => 'select',
						'label' => __( 'Icon Hover Animation Type', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'hvr-icon-back' => __( 'Icon Back', 'bb-vapor-modules' ),
							'hvr-icon-forward' => __( 'Icon Forward', 'bb-vapor-modules' ),
							'hvr-icon-down' => __( 'Icon Down', 'bb-vapor-modules' ),
							'hvr-icon-up' => __( 'Icon Up', 'bb-vapor-modules' ),
							'hvr-icon-spin' => __( 'Icon Spin', 'bb-vapor-modules' ),
							'hvr-icon-drop' => __( 'Icon Drop', 'bb-vapor-modules' ),
							'hvr-icon-fade' => __( 'Icon Fade', 'bb-vapor-modules' ),
							'hvr-icon-float-away' => __( 'Icon Float Away', 'bb-vapor-modules' ),
							'hvr-icon-sink-away' => __( 'Icon Sink Away', 'bb-vapor-modules' ),
							'hvr-icon-grow' => __( 'Icon Grow', 'bb-vapor-modules' ),
							'hvr-icon-shrink' => __( 'Icon Shrink', 'bb-vapor-modules' ),
							'hvr-icon-pulse' => __( 'Icon Pulse', 'bb-vapor-modules' ),
							'hvr-icon-pulse-grow' => __( 'Icon Pulse Grow', 'bb-vapor-modules' ),
							'hvr-icon-pulse-shrink' => __( 'Icon Pulse Shrink', 'bb-vapor-modules' ),
							'hvr-icon-push' => __( 'Icon Push', 'bb-vapor-modules' ),
							'hvr-icon-pop' => __( 'Icon Pop', 'bb-vapor-modules' ),
							'hvr-icon-bounce' => __( 'Icon Bounce', 'bb-vapor-modules' ),
							'hvr-icon-rotate' => __( 'Icon Rotate', 'bb-vapor-modules' ),
							'hvr-icon-grow-rotate' => __( 'Icon Grow Rotate', 'bb-vapor-modules' ),
							'hvr-icon-float' => __( 'Icon Float', 'bb-vapor-modules' ),
							'hvr-icon-sink' => __( 'Icon Sink', 'bb-vapor-modules' ),
							'hvr-icon-bob' => __( 'Icon Bob', 'bb-vapor-modules' ),
							'hvr-icon-hang' => __( 'Icon Hang', 'bb-vapor-modules' ),
							'hvr-icon-wobble-horizontal' => __( 'Icon Wobble Horizontal', 'bbvm-bb-modulues' ),
							'hvr-icon-wobble-vertical' => __( 'Icon Wobble Vertical', 'bb-vapor-modules' ),
							'hvr-icon-buzz' => __( 'Icon Buzz', 'bb-vapor-modules' ),
							'hvr-icon-buzz-out' => __( 'Icon Buzz Out', 'bb-vapor-modules' )
						),
						'default' => 'none'
					),
					'button_animation'         => array(
						'type'          => 'select',
						'label' => __( 'Button Animation Type', 'bb-vapor-modules' ),
						'options' => array(
							'2d' => __( '2D Transitions', 'bb-vapor-modules' ),
							'background' => __( 'Background Transitions', 'bb-vapor-modules' ),
							'border' => __( 'Border Transitions', 'bb-vapor-modules' ),
							'shadow_glow' => __( 'Shadow and Glow Transitions', 'bb-vapor-modules' ),
							'speech' => __( 'Speech Buttles', 'bb-vapor-modules' ),
							'curls' => __( 'Curls', 'bb-vapor-modules' ),
						),
						'default' => '2d',
						'toggle' => array(
							'2d' => array( 'fields' => array( 'animation_type_2d' ) ),
							'background' => array( 'fields' => array( 'animation_type_background', 'animation_type_background_color' ) ),
							'border' => array( 'fields' => array( 'animation_type_border' ) ),
							'shadow_glow' => array( 'fields' => array( 'shadow_and_glow', 'shadow_and_glow_color' ) ),
							'speech' => array( 'fields' => array( 'speech_bubble' ) ),
							'curls' => array( 'fields' => array( 'curls' ) ),
						)
					),
					'animation_type_2d' => array(
						'type' => 'select',
						'label' => __( '2D Animation Type', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'hvr-grow' => __( 'Grow', 'bb-vapor-modules' ),
							'hvr-shrink' => __( 'Shrink', 'bb-vapor-modules' ),
							'hvr-pulse' => __( 'Pulse', 'bb-vapor-modules' ),
							'hvr-pulse-grow' => __( 'Pulse Grow', 'bb-vapor-modules' ),
							'hvr-pulse-shrink' => __( 'Pulse Shrink', 'bb-vapor-modules' ),
							'hvr-push' => __( 'Push', 'bb-vapor-modules' ),
							'hvr-pop' => __( 'Pop', 'bb-vapor-modules' ),
							'hvr-bounce-in' => __( 'Bounce In', 'bb-vapor-modules' ),
							'hvr-bounce-out' => __( 'Bounce Out', 'bb-vapor-modules' ),
							'hvr-rotate' => __( 'Rotate', 'bb-vapor-modules' ),
							'hvr-grow-rotate' => __( 'Grow Rotate', 'bb-vapor-modules' ),
							'hvr-float' => __( 'Float', 'bb-vapor-modules' ),
							'hvr-sink' => __( 'Sink', 'bb-vapor-modules' ),
							'hvr-bob' => __( 'Bob', 'bb-vapor-modules' ),
							'hvr-hang' => __( 'Hang', 'bb-vapor-modules' ),
							'hvr-skew' => __( 'Skew', 'bb-vapor-modules' ),
							'hvr-skew-forward' => __( 'Skew Forward', 'bb-vapor-modules' ),
							'hvr-skew-backward' => __( 'Skew Backward', 'bb-vapor-modules' ),
							'hvr-wobble-horizontal' => __( 'Wobble Horizontal', 'bb-vapor-modules' ),
							'hvr-wobble-vertical' => __( 'Wobble Vertical', 'bb-vapor-modules' ),
							'hvr-wobble-to-bottom-right' => __( 'Wobble to Bottom Right', 'bb-vapor-modules' ),
							'hvr-wobble-to-top-right' => __( 'Wobble to Top Right', 'bb-vapor-modules' ),
							'hvr-wobble-top' => __( 'Wobble Top', 'bb-vapor-modules' ),
							'hvr-wobble-bottom' => __( 'Wobble Bottom', 'bb-vapor-modules' ),
							'hvr-wobble-skew' => __( 'Wobble Skew', 'bb-vapor-modules' ),
							'hvr-buzz' => __( 'Buzz', 'bb-vapor-modules' ),
							'hvr-buzz-out' => __( 'Buzz Out', 'bb-vapor-modules' ),
							'hvr-forward' => __( 'Forward', 'bb-vapor-modules' ),
							'hvr-backward' => __( 'Backward', 'bb-vapor-modules' ),
						),
						'default' => 'none'
					),
					'animation_type_background' => array(
						'type' => 'select',
						'label' => __( 'Animation Background', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'hvr-fade' => __( 'Fade', 'bb-vapor-modules' ),
							'hvr-back-pulse' => __( 'Pulse', 'bb-vapor-modules' ),
							'hvr-sweep-to-right' => __( 'Sweep to Right', 'bb-vapor-modules' ),
							'hvr-sweep-to-left' => __( 'Sweep to Left', 'bb-vapor-modules' ),
							'hvr-sweep-to-bottom' => __( 'Sweep to Bottom', 'bb-vapor-modules' ),
							'hvr-sweep-to-top' => __( 'Sweep to Top', 'bb-vapor-modules' ),
							'hvr-bounce-to-right' => __( 'Bounce to Right', 'bb-vapor-modules' ),
							'hvr-bounce-to-left' => __( 'Bounce to Left', 'bb-vapor-modules' ),
							'hvr-bounce-to-bottom' => __( 'Bounce to Bottom', 'bb-vapor-modules' ),
							'hvr-bounce-to-top' => __( 'Bounce to Top', 'bb-vapor-modules' ),
							'hvr-radial-out' => __( 'Radial Out', 'bb-vapor-modules' ),
							'hvr-radial-in' => __( 'Radial In', 'bb-vapor-modules' ),
							'hvr-rectangle-in' => __( 'Rectangle In', 'bb-vapor-modules' ),
							'hvr-rectangle-out' => __( 'Rectangle Out', 'bb-vapor-modules' ),
							'hvr-shutter-in-horizontal' => __( 'Shutter In Horizontal', 'bb-vapor-modules' ),
							'hvr-shutter-out-horizontal' => __( 'Shutter Out Horizontal', 'bb-vapor-modules' ),
							'hvr-shutter-in-vertical' => __( 'Shutter In Vertical', 'bb-vapor-modules' ),
							'hvr-shutter-out-vertical' => __( 'Shutter Out Vertical', 'bb-vapor-modules' )
						),
						'default' => 'none'
					),
					'animation_type_background_color' => array(
						'type' => 'color',
						'label' => __( 'Transition Color', 'bb-vapor-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'rgba(0,0,0,0.1)'
					),
					'animation_type_border' => array(
						'type' => 'select',
						'label' => __( 'Animation Border Type', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'hvr-border-fade' => __( 'Border Fade', 'bb-vapor-modules' ),
							'hvr-hollow' => __( 'Hollow', 'bb-vapor-modules' ),
							'hvr-trim' => __( 'Trim', 'bb-vapor-modules' ),
							'hvr-ripple-out' => __( 'Ripple Out', 'bb-vapor-modules' ),
							'hvr-ripple-in' => __( 'Ripple In', 'bb-vapor-modules' ),
							'hvr-outline-out' => __( 'Outline Out', 'bb-vapor-modules' ),
							'hvr-outline-in' => __( 'Outline In', 'bb-vapor-modules' ),
							'hvr-round-corners' => __( 'Rounded Corners', 'bb-vapor-modules' ),
							'hvr-underline-from-left' => __( 'Underline From Left', 'bb-vapor-modules' ),
							'hvr-underline-from-center' => __( 'Underline From Center', 'bb-vapor-modules' ),
							'hvr-underline-from-right' => __( 'Underline From Right', 'bb-vapor-modules' ),
							'hvr-reveal' => __( 'Reveal', 'bb-vapor-modules' ),
							'hvr-underline-reveal' => __( 'Underline Reveal', 'bb-vapor-modules' ),
							'hvr-overline-reveal' => __( 'Overline Reveal', 'bb-vapor-modules' ),
							'hvr-overline-from-left' => __( 'Overline From Left', 'bb-vapor-modules' ),
							'hvr-overline-from-center' => __( 'Overline From Center', 'bb-vapor-modules' ),
							'hvr-overline-from-right' => __( 'Overline From Right', 'bb-vapor-modules' ),
						),
						'default' => 'none'
					),
					'shadow_and_glow' => array(
						'type' => 'select',
						'label' => __( 'Shadow and Glow', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'hvr-shadow' => __( 'Shadow', 'bb-vapor-modules' ),
							'hvr-grow-shadow' => __( 'Grow Shadow', 'bb-vapor-modules' ),
							'hvr-float-shadow' => __( 'Float Shadow', 'bb-vapor-modules' ),
							'hvr-glow' => __( 'Glow', 'bb-vapor-modules' ),
							'hvr-shadow-radial' => __( 'Shadow Radial', 'bb-vapor-modules' ),
							'hvr-box-shadow-outset' => __( 'Box Shadow Outset', 'bb-vapor-modules' ),
							'hvr-box-shadow-inset' => __( 'Box Shadow Inset', 'bb-vapor-modules' ),
						),
						'default' => 'none'
					),
					'shadow_and_glow_color' => array(
						'type' => 'color',
						'label' => __( 'Shadow and Glow Color', 'bb-vapor-modules' ),
						'show_alpha' => true,
						'show_reset' => true,
						'default' => 'rgba(0, 0, 0, 0.5)'
					),
					'speech_bubble' => array(
						'type' => 'select',
						'label' => __( 'Speech Bubbles', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'hvr-bubble-top' => __( 'Bubble Top', 'bb-vapor-modules' ),
							'hvr-bubble-right' => __( 'Bubble Right', 'bb-vapor-modules' ),
							'hvr-bubble-bottom' => __( 'Bubble Bottom', 'bb-vapor-modules' ),
							'hvr-bubble-left' => __( 'Bubble Left', 'bb-vapor-modules' ),
							'hvr-bubble-float-top' => __( 'Bubble Float Top', 'bb-vapor-modules' ),
							'hvr-bubble-float-right' => __( 'Bubble Float Right', 'bb-vapor-modules' ),
							'hvr-bubble-float-bottom' => __( 'Bubble Float Bottom', 'bb-vapor-modules' ),
							'hvr-bubble-float-left' => __( 'Bubble Float Left', 'bb-vapor-modules' ),
						),
						'default' => 'none'
					),
					'curls' => array(
						'type' => 'select',
						'label' => __( 'Curls', 'bb-vapor-modules' ),
						'options' => array(
							'none' => __( 'None', 'bb-vapor-modules' ),
							'hvr-curl-top-left' => __( 'Curl Top Left', 'bb-vapor-modules' ),
							'hvr-curl-top-right' => __( 'Curl Top Right', 'bb-vapor-modules' ),
							'hvr-curl-bottom-right' => __( 'Curl Bottom Right', 'bb-vapor-modules' ),
							'hvr-curl-bottom-left' => __( 'Curl Bottom Left', 'bb-vapor-modules' ),
						),
						'default' => 'none'
					),
				)
			)
		)
	),
	'styles'       => array( // Tab
		'title'         => __('Styles', 'bb-vapor-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Styles', 'bb-vapor-modules'), // Section Title
				'fields'        => array( // Section Fields
					'button_alignment' => array(
						'type'  => 'align',
						'label' => __( 'Button Alignment', 'bb-vapor-modules' ),
						'default' => 'center'
					),
					'button_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Button Padding', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'button_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Button Typography', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'button_margin' => array(
						'type'  => 'dimension',
						'label' => __( 'Button Margin', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'button_radius' => array(
						'type'  => 'dimension',
						'label' => __( 'Button Radius', 'bb-vapor-modules' ),
						'responsive' => true
					),
					'button_min_width' => array(
						'type'  => 'unit',
						'label' => __( 'Button Min Width', 'bb-vapor-modules' ),
						'default' => '0',
						'responsive' => true
					),
				)
			)
		)
	),
) );
