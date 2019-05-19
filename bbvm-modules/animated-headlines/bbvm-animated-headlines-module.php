<?php
class MediaRon_Animated_Headlines_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Animated Headlines', 'mediaron-bb-modules' ),
			'description'     => __( 'Animated Headlines for Beaver Builder', 'mediaron-bb-modules' ),
			'category'        => __( 'Base', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/animated-headlines/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/animated-headlines/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}

	public function enqueue_scripts() {
		if ( $this->settings && 'none' !== $this->settings->animation_type ) {
			$this->add_css('animate-headline', MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/animated-headlines/css/animate.css', array(), '3.7.0', 'all' );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_Animated_Headlines_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Headlines', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'headline_text' => array(
						'type' => 'text',
						'label' => __( 'Headline Text', 'mediaron-bb-modules' ),
					),
					'headline_tag' => array(
						'type' => 'select',
						'label' => __( 'Headline Tag', 'mediaron-bb-modules' ),
						'options' => array(
							'h1' => 'H1',
							'h2' => 'H2',
							'h3' => 'H3',
							'h4' => 'H4',
							'h5' => 'H5',
							'h6' => 'H6',
						),
						'default' => 'h2'
					),
					'headline_padding' => array(
						'type' => 'dimension',
						'label' => __( 'Headline Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'headline_margin' => array(
						'type' => 'dimension',
						'label' => __( 'Headline Margin', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'headline_text_color' => array(
						'type' => 'color',
						'label' => __( 'Headline Text Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'headline_typography' => array(
						'type' => 'typography',
						'label' => __( 'Headline Typography', 'mediaron-bb-modules' ),
						'responsive' => true,
					),
				)
			)
		)
	),
	'animations'       => array( // Tab
		'title'         => __('Animations', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Animations', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'animation_type' => array(
						'type' => 'select',
						'label' => __( 'Headline Animation Type', 'mediaron-bb-modules' ),
						'options' => array(
							'none' => __( 'None', 'mediaron-bb-modules' ),
							'color' => __( 'Color', 'mediaron-bb-modules' ),
							'gradient' => __( 'Gradient', 'mediaron-bb-modules' ),
							'bounce' => __( 'Bounce', 'mediaron-bb-modules' ),
							'flash' => __( 'Flash', 'mediaron-bb-modules' ),
							'pulse' => __( 'Pulse', 'mediaron-bb-modules' ),
							'rubberBand' => __( 'Rubber Band', 'mediaron-bb-modules' ),
							'shake' => __( 'Shake', 'mediaron-bb-modules' ),
							'swing' => __( 'Swing', 'mediaron-bb-modules' ),
							'tada' => __( 'Tada', 'mediaron-bb-modules' ),
							'wobble' => __( 'Wobble', 'mediaron-bb-modules' ),
							'jello' => __( 'Jello', 'mediaron-bb-modules' ),
							'heartBeat' => __( 'Heartbeat', 'mediaron-bb-modules' )

						),
						'toggle' => array(
							'color' => array( 'fields' => array( 'original_color', 'animated_color' ) ),
							'gradient' => array( 'fields' => array( 'gradient_color_first', 'gradient_color_first_last' ) )
						),
						'default' => 'none'
					),
					'original_color' => array(
						'type' => 'color',
						'label' => __( 'Starting Color', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'animated_color' => array(
						'type' => 'color',
						'label' => __( 'Ending Color', 'mediaron-bb-modules' ),
						'default' => '333333'
					),
					'gradient_color_first' => array(
						'type' => 'color',
						'label' => __( 'Gradient Color Beginning', 'mediaron-bb-modules' ),
						'default' => '000000'
					),
					'gradient_color_first_last' => array(
						'type' => 'color',
						'label' => __( 'Gradient Color End', 'mediaron-bb-modules' ),
						'default' => '333333'
					),
					'animation_duration' => array(
						'type' => 'unit',
						'label' => __( 'Animation Duration in Seconds', 'mediaron-bb-modules' ),
						'default' => '5'
					)
				)
			)
		),
	),
) );
