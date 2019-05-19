<?php
class MediaRon_FAQ_Module extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
			'name'            => __( 'FAQ', 'mediaron-bb-modules' ),
			'description'     => __( 'Add a FAQ', 'mediaron-bb-modules' ),
			'category'        => __( 'Base', 'mediaron-bb-modules' ),
			'group'           => __( 'MediaRon Modules', 'mediarion-bb-modules' ),
			'dir'             => MEDIARON_BEAVER_BUILDER_DIR . 'mediaron-modules/faq/',
			'url'             => MEDIARON_BEAVER_BUILDER_URL . 'mediaron-modules/faq/',
			'editor_export'   => true, // Defaults to true and can be omitted.
			'enabled'         => true, // Defaults to true and can be omitted.
			'partial_refresh' => false, // Defaults to false and can be omitted.
		));
	}
}
FLBuilder::register_settings_form(
	'mrbb_faq', array(
		'title' => __( 'Add FAQ', 'mediaron-bb-modules' ),
		'tabs'  => array(
			'general'      => array(
				'title'         => __('FAQ', 'mediaron-bb-modules'),
				'sections'      => array(
					'general'       => array(
						'title'         => '',
						'fields'        => array(
							'faq'         => array(
								'type'          => 'text',
								'label' => __( 'FAQ Item', 'mediaron-bb-modules' ),
							),
							'faq_text'         => array(
								'type'          => 'editor',
								'label' => __( 'FAQ Answer', 'mediaron-bb-modules' )
							),
						),
					)
				)
			)
		)
	)
);
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MediaRon_FAQ_Module', array(
	'general'       => array( // Tab
		'title'         => __('General', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __('General', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'faq' => array(
						'type'          => 'form',
						'label'         => __('FAQ', 'mediaron-bb-modules'),
						'form' => 'mrbb_faq',
						'multiple'     => true,
						'preview_text'  => 'faq'
					),
					'toc' => array(
						'type'          => 'select',
						'label'         => __('Display Table of Contents', 'mediaron-bb-modules'),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' ),
						),
						'default' => 'yes',
					),
					'expanded' => array(
						'type'          => 'select',
						'label'         => __('Answers Expanded?', 'mediaron-bb-modules'),
						'options' => array(
							'no' => __( 'No', 'mediaron-bb-modules' ),
							'yes' => __( 'Yes', 'mediaron-bb-modules' )
						),
						'default' => 'yes'
					),
				)
			)
		)
	),
	'styles'       => array( // Tab
		'title'         => __('Styles', 'mediaron-bb-modules'), // Tab title
		'sections'      => array( // Tab Sections
			'styles'       => array( // Section
				'title'         => __('Styles', 'mediaron-bb-modules'), // Section Title
				'fields'        => array( // Section Fields
					'toc_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Table of Contents Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'question_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Question Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'question_color' => array(
						'type'  => 'color',
						'label' => __( 'Question Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'question_background_color' => array(
						'type'  => 'color',
						'label' => __( 'Question Background Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'question_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Question Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'question_margin' => array(
						'type'  => 'dimension',
						'label' => __( 'Question Margin', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'question_radius' => array(
						'type'  => 'dimension',
						'label' => __( 'Question Radius', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'question_border_bottom' => array(
						'type'  => 'unit',
						'label' => __( 'Question Border Bottom', 'mediaron-bb-modules' ),
						'default' => '1',
					),
					'question_border_color' => array(
						'type'  => 'color',
						'label' => __( 'Question Border Bottom Color', 'mediaron-bb-modules' ),
						'default' => 'FFFFFF',
					),
					'answer_typography' => array(
						'type'  => 'typography',
						'label' => __( 'Answer Typography', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'answer_color' => array(
						'type'  => 'color',
						'label' => __( 'Answer Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => '000000'
					),
					'answer_background_color' => array(
						'type'  => 'color',
						'label' => __( 'Answer Background Color', 'mediaron-bb-modules' ),
						'show_reset' => true,
						'default' => 'FFFFFF'
					),
					'answer_padding' => array(
						'type'  => 'dimension',
						'label' => __( 'Answer Padding', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'answer_margin' => array(
						'type'  => 'dimension',
						'label' => __( 'Answer Margin', 'mediaron-bb-modules' ),
						'responsive' => true
					),
					'answer_radius' => array(
						'type'  => 'dimension',
						'label' => __( 'Answer Radius', 'mediaron-bb-modules' ),
						'responsive' => true
					),
				)
			)
		)
	),
) );
