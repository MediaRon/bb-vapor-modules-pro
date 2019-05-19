<?php
class MediaRon_Soliloquy_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'Soliloquy', 'mediaron-bb-modules' ),
			'description'     => __( 'Soliloquy for Beaver Builder', 'mediaron-bb-modules' ),
			'category'        => __( 'External Plugins', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/soliloquy/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/soliloquy/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => true, // Defaults to false and can be omitted.
		));

	}
}
/**
 * Register the module and its form settings.
 */
$sliders_array = array( '0' => __( 'Select a slider', 'mediaron-bb-modules' ) );
$sliders = Soliloquy::get_instance()->get_sliders();
if( ! empty( $sliders ) ) {
	foreach( $sliders as $slider ) {
		$sliders_array[$slider['id']] = $slider['config']['title'];
	}
}
FLBuilder::register_module('MediaRon_Soliloquy_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('Slider Select', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'slider' => array(
						'type'          => 'select',
						'label'         => __( 'Select a slider', 'mediaron-bb-modules' ),
						'options'       => $sliders_array
					),
				)
			),
		)
	),
	'options'       => array( // Tab
		'title'         => __('Options', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'options'       => array( // Section
				'title'         => __('General Options', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'show_arrows' => array(
						'type' => 'select',
						'label' => __( 'Show arrows always', 'mediaron-bb-modules' ),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' )
						),
						'default' => 'no'
					),
					'arrow_background' => array(
						'type' => 'color',
						'label' => __( 'Background color of the arrows', 'mediaron-bb-modules' ),
						'show_reset' => true,
					),
					'max_height' => array(
						'type' => 'unit',
						'label' => __( 'Max height of slider', 'mediaron-bb-modules' ),
						'description' => 'px'
					),
					'max_width' => array(
						'type' => 'unit',
						'label' => __( 'Max width of slider', 'mediaron-bb-modules' ),
						'description' => 'px'
					),
					'hide_pager' => array(
						'type' => 'select',
						'label' => __( 'Hide pager?', 'mediaron-bb-modules' ),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' )
						),
						'default' => 'no'
					),
					'hide_caption' => array(
						'type' => 'select',
						'label' => __( 'Hide caption?', 'mediaron-bb-modules' ),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' )
						),
						'default' => 'no'
					),
					'caption_background' => array(
						'type' => 'color',
						'label' => __( 'Background color of the caption', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'show_alpha' => true,
					),
					'caption_text_background' => array(
						'type' => 'color',
						'label' => __( 'Text color of the caption', 'mediaron-bb-modules' ),
						'show_reset' => true,
					),
					'caption_typography' => array(
						'type' => 'typography',
						'label' => __( 'Caption typography', 'mediaron-bb-modules' ),
					),
				)
			),
		)
	),
) );
