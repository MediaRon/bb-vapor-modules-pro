<?php
class MediaRon_Before_After_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Before and After', 'mediaron-bb-modules' ),
			'description'     => __( 'Before and After', 'mediaron-bb-modules' ),
			'category'        => __( 'Base', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/beforeafter/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/beforeafter/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}

	public function enqueue_scripts() {
		if( $this->settings && ( 'separator_horizontal' === $this->settings->style || 'separator_vertical' === $this->settings->style ) ) {
			$this->add_js('jquery-movemove', MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/beforeafter/js/jquery-mousemove.js', array( 'jquery' ), MEDIARON_BEAVER_BUILDER_VERSION, true );
			$this->add_js('mediaron-move-horizontal', MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/beforeafter/js/move-horizontal.js', array( 'jquery-movemove' ), MEDIARON_BEAVER_BUILDER_VERSION, true );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_Before_After_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Before and After', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'image_before' => array(
						'type'          => 'photo',
						'label'         => __( 'Before Photo', 'mediaron-bb-modules' ),
						'show_remove' => true,
						'description' => __( 'Ensure the images are the same size', 'mediaron-bb-modules' )
					),
					'image_after' => array(
						'type'          => 'photo',
						'label'         => __( 'After Photo', 'mediaron-bb-modules' ),
						'show_remove' => true,
						'description' => __( 'Ensure the images are the same size', 'mediaron-bb-modules' )
					),
					'style' => array(
						'type'          => 'select',
						'label'         => __( 'Select a Style', 'mediaron-bb-modules' ),
						'options' => array(
							'side' => __( 'Side to Side', 'mediaron-bb-modules' ),
							'fade' => __( 'Fade', 'mediaron-bb-modules' ),
							'hover' => __( 'Hover', 'mediaron-bb-modules' ),
							'separator_vertical' => __( 'Vertical Separator', 'mediaron-bb-modules' ),
							'separator_horizontal' => __( 'Horizontal Separator', 'mediaron-bb-modules' )
						),
						'toggle' => array(
							'hover' => array( 'fields' => array( 'transition_delay' ) ),
							'fade' => array( 'fields' => array( 'transition_delay' ) ),
							'separator_horizontal' => array( 'fields' => array( 'separator_line_color', 'separator_background_color', 'separator_arrow_color', 'separator_style' ) ),
							'separator_vertical' => array( 'fields' => array( 'separator_line_color', 'separator_background_color', 'separator_arrow_color', 'separator_style' ) )
						)
					),
					'separator_line_color' => array(
						'type' => 'color',
						'label' => __( 'Separator Line Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'separator_background_color' => array(
						'type' => 'color',
						'label' => __( 'Separator Background Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'show_alpha' => true,
						'default' => 'transparent'
					),
					'separator_arrow_color' => array(
						'type' => 'color',
						'label' => __( 'Separator Arrow Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'separator_style' => array(
						'type' => 'select',
						'label' => __( 'Separator Style', 'mediaron-bb-modules' ),
						'options' => array(
							'circular' => __( 'Circular', 'mediaron-bb-modules' ),
							'square' => __( 'Square', 'mediaron-bb-modules' )
						),
						'default' => 'circular'
					),
					'transition_delay' => array(
						'type' => 'unit',
						'label' => __( 'Transition Delay in Seconds', 'mediaron-bb-modules' ),
						'default' => '5'
					),
				)
			)
		)
	),
	'beforeaftertext'       => array( // Tab
		'title'         => __('Before & After Text', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'beforeaftertext'       => array( // Section
				'title'         => __('Before & After Text', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'show_before_after_text' => array(
						'type' => 'select',
						'label' => __( 'Show Before/After Text', 'mediaron-bb-modules' ),
						'options' => array(
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
							'no' => __( 'No', 'mediaron-bb-modules' ),
						),
						'default' => 'yes'
					),
					'before_text' => array(
						'type' => 'text',
						'label' => __( 'Before Text', 'mediaron-bb-modules' ),
						'default' => __( 'Before', 'mediaron-bb-modules' ),
					),
					'after_text' => array(
						'type' => 'text',
						'label' => __( 'After Text', 'mediaron-bb-modules' ),
						'default' => __( 'After', 'mediaron-bb-modules' )
					),
					'text_color' => array(
						'type' => 'color',
						'label' => __( 'Text Color', 'mediaron-bb-modules' ),
						'default' => '000000',
						'show_reset' => true,
					),
					'background_color' => array(
						'type' => 'color',
						'label' => __( 'Background Color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF',
						'show_reset' => true,
						'show_alpha' => true
					),
					'typography' => array(
						'type' => 'typography',
						'label' => __( 'Text Typography', 'mediaron-bb-modules' )
					)
				)
			)
		)
	),
) );
